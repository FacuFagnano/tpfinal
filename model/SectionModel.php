<?php

class SectionModel{
    private $database;
    private $logger;

    public function __construct($database, $logger) {
        $this->database = $database;
        $this->logger = $logger;
    }

    public function getSection($editionId){
        $sql = 'SELECT * FROM section WHERE idEditionTable = ' . $editionId . '';
        return $this->database->query($sql);
    }

}