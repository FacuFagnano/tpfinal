<?php

class EconomiaModel {
    
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }
}