<?php

namespace Xmlparser\src\Classes;

class SaxParser extends XmlParserAbstract
{
    /**
     * will hold the xml current element/node to help parser navigating inside the file.
     * @var string
     */
    private $currentElement;

    /**
     * Size of data chunk to read in each loop in bytes
     * @var int
     */
    private $chunkSize = 4096;

    /**
     * SaxParser constructor.
     * @param string $startTag
     * @param array $subElementsArray
     * @param string $xmlFullPath
     * @param int $rowsPerInsert
     * @param PersistInterface $persistMethod
     */
    public function __construct($startTag, $subElementsArray, $xmlFullPath, $rowsPerInsert, PersistInterface $persistMethod)
    {
        parent::__construct($startTag, $subElementsArray, $xmlFullPath, $rowsPerInsert, $persistMethod);
    }

    /**
     * Callback method to use when tags are open
     * @param $xmlParser
     * @param $tagName
     * @param $attributes
     * @return void
     */
    private function start($xmlParser, $tagName, $attributes)
    {
        if (!empty($tagName) && in_array($tagName, $this->subElementsArray)) {
            $this->currentElement = $tagName;
        }
    }

    /**
     * Callback method to use between the start and end of the tags
     * @param $xmlParser
     * @param $data
     * @return void
     */
    private function characterData($xmlParser, $data)
    {
        if (!empty(trim($data))) {
            if (in_array($this->currentElement, $this->subElementsArray)) {
                if ($this->currentElement == $this->startTag && !empty($this->tempData)) {
                    $this->data[] = $this->insertMissingElements($this->tempData);
                    $this->tempData = null;
                }
                $this->tempData[$this->currentElement] = trim($data);
            }
            if (count($this->data) == $this->rowsPerInsert) {
                $this->persistMethod->prepare($this->data, $this->rowsPerInsert);
                $this->data = null;
            }
        }
    }

    /**
     * Callback method to use when tags are closed
     * @param $xmlParser
     * @param $tagName
     * @return void
     */
    private function end($xmlParser, $tagName)
    {
        if (!empty($tagName) && in_array($tagName, $this->subElementsArray)) {
            $this->currentElement = null;
        }
    }

    /**
     * Check for missing elements inside the array and fill it with them to avoid having missing index
     * @param array $array
     * @return array
     */
    private function insertMissingElements($array)
    {
        foreach ($this->subElementsArray as $item) {
            if (!array_key_exists($item, $array)) {
                $array[$item] = '';
            }
        }
        return $array;
    }

    /**
     * The main parsing method that will create the XML parser and loop throw the data inside it.
     */
    public function parseXML()
    {
        $xmlParser = xml_parser_create();
        $parserClass = new $this($this->startTag, $this->subElementsArray, $this->xmlFullPath, $this->rowsPerInsert, $this->persistMethod);
        xml_set_object($xmlParser, $parserClass);
        xml_set_element_handler($xmlParser, "start", "end");
        xml_set_character_data_handler($xmlParser, "characterData");
        xml_parser_set_option($xmlParser, XML_OPTION_CASE_FOLDING, false);

        $fp = fopen($this->xmlFullPath, "r") or die("Error reading XML data.");
        while ($data = fread($fp, $this->chunkSize)) {
            xml_parse($xmlParser, $data, feof($fp)) or die(sprintf("XML error: %s at line %d",
                xml_error_string(xml_get_error_code($xmlParser)),
                xml_get_current_line_number($xmlParser)));
        }

        $this->processDataLeftover();
        
        fclose($fp);
        xml_parser_free($xmlParser);
    }
}