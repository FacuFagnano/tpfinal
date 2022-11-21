<?php

class ContentModel {
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function getContent() {
        $sql = 'SELECT * FROM articles a INNER JOIN section s on s.idSection = a.idArticles';
        return $this->database->query($sql);
    }
}