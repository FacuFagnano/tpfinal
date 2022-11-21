<?php

class ContentModel {
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function getContent() {
        $sql = 'SELECT * FROM publications p INNER JOIN section s on s.id = p.id_section';
        return $this->database->query($sql);
    }
}