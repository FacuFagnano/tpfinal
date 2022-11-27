<?php

class PendingArticleModel
{
    private $database;
    private $logger;

    public function __construct($database, $logger) {
        $this->database = $database;
        $this->logger = $logger;
    }

    public function getPendingArticles(){
        $sql = 'SELECT * FROM articles WHERE `idNoteStatusTable` =1;';
        return $this->database->query($sql);
    }
    public function getPendingArticlesById($id){
        $this->logger->info("dentro de get articulo");
        $sql = "SELECT * FROM `articles` WHERE idArticles = $id";
        $this->logger->info("$sql");
            
        return $this->database->query($sql);
    }
}