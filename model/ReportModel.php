<?php

class ReportModel {
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function getCountUser() {
        $sql = 'SELECT * FROM `user`';
        return $this->database->query($sql);
    }
}