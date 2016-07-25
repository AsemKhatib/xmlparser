<?php

namespace Xmlparser\src\Classes;

interface PersistInterface
{
    public function prepare($data, $rowsPerInsert);
    public function persist($entityToPersist);
    public function getLastInserted();

}