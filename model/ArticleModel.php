<?php

class ArticleModel
{
    private $database;
    private $logger;

    public function __construct($database, $logger) {
        $this->database = $database;
        $this->logger = $logger;
    }

    public function getArticle(){
        $sql = 'SELECT * FROM article';
        return $this->database->query($sql);
    }
}