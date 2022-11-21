<?php

class SectionModel{
    private $database;
    private $logger;

    public function __construct($database, $logger) {
        $this->database = $database;
        $this->logger = $logger;
    }

    public function getSection(){
        $sql = 'SELECT * FROM section';
        return $this->database->query($sql);
    }

}