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
    public function getArticleById($id){
        $this->logger->info("dentro de get articulo");
        $sql = "SELECT * FROM `articles` WHERE idArticles = $id";
        $this->logger->info("$sql");
            
        return $this->database->query($sql);
    }
}