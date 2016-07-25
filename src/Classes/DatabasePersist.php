<?php

namespace Xmlparser\src\Classes;

use Doctrine\ORM\EntityManager;
use Xmlparser\src\Entity\Label;
use Xmlparser\src\Entity\Manufacturers;
use Xmlparser\src\Entity\Track;

class DatabasePersist implements PersistInterface
{
    /**
     * @var array
     */
    private $data;

    /**
     * Entity name that we will persist the data inside it
     * @var string
     */
    private $entityName;

    /**
     * the main EntityManager from Doctrine
     * @var EntityManager
     */
    private $entityManager;

    /**
     * The time in which this object will start to execute (to help for performance check)
     * @var int
     */
    private $startExecutionTime;

    /**
     * Number of xml nodes that will be processed and persisted the same time
     * @var int
     */
    private $rowsPerInsert;

    /**
     * @var int
     */
    private $lastInserted;

    /**
     * DatabasePersist constructor.
     * @param string $entityName
     * @param EntityManager $entityManager
     */
    public function __construct($entityName, $entityManager)
    {
        $this->entityName = $entityName;
        $this->entityManager = $entityManager;
        $this->startExecutionTime = microtime(true);
    }

    /**
     * @return int
     */
    public function getLastInserted()
    {
        return $this->lastInserted;
    }
    
    /**
     * This method will get the data from the parser to prepare to before sending it to the persistence.
     * @param array $data
     * @param int $rowsPerInsert
     */
    public function prepare($data, $rowsPerInsert)
    {
        $this->data = $data;
        $this->rowsPerInsert = $rowsPerInsert;

        switch ($this->entityName) {
            case 'Label':
                foreach ($this->data as $dataItem) {
                    $label = new Label();
                    $label->setGvlId($dataItem['ID']);
                    $label->setLabelCode($dataItem['Labelcode']);
                    $label->setLabelName($dataItem['Labelname']);
                    $label->setLabelShortName($dataItem['Labelshortname']);
                    $label->setGvlMandant($dataItem['GvlMandant']);
                    $label->setMusikHerkunft($dataItem['MusikHerkunft']);
                    $label->setGvlUseLimits($dataItem['GvlUseLimits']);
                    $this->persist($label);
                }
                break;
            case 'Track':
                foreach ($this->data as $dataItem) {
                    $track = new Track();
                    $track->setTrkManr($dataItem['TRK_MANR']);
                    $track->setTrkTrack($dataItem['TRK_TRACK']);
                    $track->setLblLabelcode($dataItem['LBL_LABELCODE']);
                    $track->setLblLabel($dataItem['LBL_LABEL']);
                    $track->setTrkIsrc($dataItem['TRK_ISRC']);
                    $track->setTrkCatalogno($dataItem['TRK_CATALOGNO']);
                    $track->setTrkEan($dataItem['TRK_EAN']);
                    $track->setTrkReleaseDate($dataItem['TRK_RELEASE_DATE']);
                    $track->setTrkComposer($dataItem['TRK_COMPOSER']);
                    $this->persist($track);
                }
                break;
            case 'Manufacturer':
                foreach ($this->data as $dataItem) {
                    $manufacturer = new Manufacturers();
                    $manufacturer->setGvlCode($dataItem['GvlCode']);
                    $manufacturer->setName1($dataItem['Name1']);
                    $manufacturer->setName2($dataItem['Name2']);
                    $manufacturer->setName3($dataItem['Name3']);
                    $manufacturer->setStreet($dataItem['Street']);
                    $manufacturer->setCountryCode($dataItem['CountryCode']);
                    $manufacturer->setZip($dataItem['Zip']);
                    $manufacturer->setLocation($dataItem['Location']);
                    $manufacturer->setPostBox($dataItem['Postbox']);
                    $manufacturer->setPhone($dataItem['Phone']);
                    $manufacturer->setFax($dataItem['Fax']);
                    $manufacturer->setIfpiAccount($dataItem['IfpiAccount']);
                    $this->persist($manufacturer);
                }
                break;
        }
    }

    /**
     * The main method which will actually persist the nodes to the Database in this case.
     * @param mixed $entityToPersist
     */
    public function persist($entityToPersist)
    {
        $this->entityManager->persist($entityToPersist);
        $this->lastInserted = $entityToPersist->getId();

        if (is_int($this->lastInserted / $this->rowsPerInsert)) {
            $this->entityManager->flush();
            $this->entityManager->clear();
            echo "Number of $this->entityName that created so far is : " . $this->lastInserted . ' [' . (microtime(true) - $this->startExecutionTime) . '] seconds' . "\n";
        } else if(count($this->data) != $this->rowsPerInsert) {
            $this->entityManager->flush();
            $this->entityManager->clear();
            echo "Number of $this->entityName that created so far is : " . $this->lastInserted . ' [' . (microtime(true) - $this->startExecutionTime) . '] seconds' . "\n";
        }
    }
}