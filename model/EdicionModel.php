<?php
    class EdicionModel {
    
    private $database;
    private $logger;

    public function __construct($database, $logger) {
        $this->database = $database;
        $this->logger = $logger;
    }

    public function getEdition(){
        $sql = 'SELECT * FROM edition';
        return $this->database->query($sql);
    }
}