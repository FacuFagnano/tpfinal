<?php

class adminModel {
    
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }
}