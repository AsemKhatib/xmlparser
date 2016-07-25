<?php

namespace Xmlparser\src\Classes;

class XmlReaderObj extends XmlParserAbstract
{
    /**
     * XmlReaderObj constructor.
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
     * The main parsing method that will create the XMLReader parser and loop throw the data inside it.
     */
    public function parseXML()
    {
        $reader = new \XMLReader();
        if (!$reader->open($this->xmlFullPath)) {
            die("Failed to open $this->xmlFullPath");
        }

        $doc = new \DOMDocument;

        while ($reader->read() && $reader->name !== $this->startTag);
        while ($reader->name === $this->startTag)
        {
            $node = simplexml_import_dom($doc->importNode($reader->expand(), true));
            $this->makeItArray($node);
            $this->data[] = $this->tempData;
            $this->tempData = null;

            if(count($this->data) == $this->rowsPerInsert) {
                $this->persistMethod->prepare($this->data, $this->rowsPerInsert);
                $this->data = null;
            }
            $reader->next($this->startTag);
        }

        $this->processDataLeftover();
        $reader->close();
    }

    /**
     * Convert the SimpleXmlElement Object to an array (to Unify the way the persistence get the data)
     * @param mixed $node
     * @return void
     */
    private function makeItArray($node)
    {
        foreach ($this->subElementsArray as $item) {
            if($node->$item){
                $this->tempData[$item] = (string)$node->$item;
            }
        }
    }
}