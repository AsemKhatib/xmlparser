<?php

require_once 'bootstrap.php';

use Xmlparser\src\Classes\SaxParser;
use Xmlparser\src\Classes\XmlReaderObj;
use Xmlparser\src\Classes\DatabasePersist;

$subElementsArrayLabel = array(
    'ID',
    'Labelcode',
    'Labelname',
    'Labelshortname',
    'GvlMandant',
    'MusikHerkunft',
    'GvlUseLimits'
);

$subElementsArrayTrack = array(
    'TRK_MANR',
    'TRK_TRACK',
    'LBL_LABELCODE',
    'LBL_LABEL',
    'TRK_ISRC',
    'TRK_CATALOGNO',
    'TRK_EAN',
    'TRK_RELEASE_DATE',
    'TRK_COMPOSER'
);

$subElementsArrayManufacturer = array(
    'GvlCode',
    'Name1',
    'Name2',
    'Name3',
    'Street',
    'CountryCode',
    'Zip',
    'Location',
    'Postbox',
    'Phone',
    'Fax',
    'IfpiAccount'
);

$xmlFullPath = '/var/www/public/xmlparser/src/Xml/TrackList.xml';

// StartTag for SaxParser is the first element of the parent node while the StartTag
// for the XMLReader is the parent node itself

$startTag = $subElementsArrayTrack[0];
$entityName = 'Track';
$rowsPerInsert = 100;
$subElementsArray = $subElementsArrayTrack;

// Defining the Persisting method that we will use , Database Persistence in this case.
$persistMethod = new DatabasePersist($entityName, $entityManager);


// Instantiating XmlReader Object and then call the main method parseXML()
$xmlReader = new XmlReaderObj($entityName, $subElementsArray, $xmlFullPath, $rowsPerInsert, $persistMethod);
$xmlReader->parseXML();

/////////////////////////// OR ///////////////////////////
/////// Please use one method only and comment out ///////
/////// the other one if you don't want to use it  ///////
/////////////////////////// OR ///////////////////////////

// Instantiating SaxParser Object and then call the main method parseXML()
//$SaxParser = new SaxParser($startTag, $subElementsArray, $xmlFullPath, $rowsPerInsert, $persistMethod);
//$SaxParser->parseXML();

