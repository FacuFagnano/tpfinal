<?php

class TecnologiaModel {
    
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }
}