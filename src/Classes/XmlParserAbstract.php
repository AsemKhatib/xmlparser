<?php

namespace Xmlparser\src\Classes;

abstract class XmlParserAbstract
{
    /**
     * Will hold the persist method that injected to the object to use it during parsing
     * @var  PersistInterface
     */
    protected $persistMethod;

    /**
     * Will hold the main data array which contain collection of arrays to be sent for persistence
     * @var array
     */
    protected $data = array();

    /**
     * An array to hold the data temporally before injecting it inside $this->data array
     * @var array
     */
    protected $tempData = array();

    /**
     * The first tag/element that will be used to guide the parser where to start parsing
     * @var string
     */
    protected $startTag;

    /**
     * An array that will hold all the sub elements inside the main node that we will try to parse
     * @var array
     */
    protected $subElementsArray;

    /**
     * A full xml file path that will be parsed , Example : /var/www/public/xmlparser/Xml/whatever.xml :)
     * @var string
     */
    protected $xmlFullPath;

    /**
     * Number of xml nodes that will be processed and persisted the same time
     * @var int
     */
    protected $rowsPerInsert;

    /**
     * XmlParserAbstract constructor.
     * @param string $startTag
     * @param array $subElementsArray
     * @param string $xmlFullPath
     * @param int $rowsPerInsert
     * @param PersistInterface $persistMethod
     */
    public function __construct($startTag, $subElementsArray, $xmlFullPath, $rowsPerInsert, PersistInterface $persistMethod)
    {
        $this->startTag = $startTag;
        $this->subElementsArray = $subElementsArray;
        $this->xmlFullPath = $xmlFullPath;
        $this->rowsPerInsert = $rowsPerInsert;
        $this->persistMethod = $persistMethod;
    }

    abstract function parseXML();

    /**
     * This method with process the rest of the data inside $this->data that could not be done in the last loop
     */
    protected function processDataLeftover()
    {
        if(($this->persistMethod->getLastInserted() > $this->rowsPerInsert) && ($this->rowsPerInsert > 1)) {
            $this->persistMethod->prepare($this->data, $this->rowsPerInsert);
            $this->data = null;
        }
    }
}