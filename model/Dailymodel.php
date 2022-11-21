<?php

class DailyModel {
    
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }
}