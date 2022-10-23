<?php

class ContentModel {
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function getContent() {
        $sql = 'SELECT * FROM content';
        return $this->database->query($sql);
    }
}