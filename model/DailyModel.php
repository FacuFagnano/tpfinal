<?php

class DailyModel {
    
    private $database;
    private $logger;

    public function __construct($database, $logger) {
        $this->database = $database;
        $this->logger = $logger;
    }

    public function getDaily(){
        $sql = 'SELECT * FROM daily';
        return $this->database->query($sql);
    }
}