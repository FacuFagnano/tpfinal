<?php

class ArticleModel {
    
    private $database;
    private $logger;

    public function __construct($database, $logger) {
        $this->database = $database;
        $this->logger = $logger;
    }

    public function getArticles($sectionId){
        $sql = 'SELECT * FROM articles WHERE idSectionTable = '. $sectionId . ' AND idNoteStatusTable = 3';
        return $this->database->query($sql);
    }

    public function finalArticle($idArticles){
        $sql = "SELECT * FROM articles WHERE idArticles = " . $idArticles . " AND idNoteStatusTable = 3";
        return $this->database->query($sql);
    }


    public function getNotasSession(){
        $sql = 'SELECT * from articles a INNER JOIN notestatus n on a.idArticles = n.idNoteStatus';
        return $this->database->query($sql);
    }

    public function getDailySession(){
        $sql = 'SELECT * from edition e INNER JOIN daily d on d.dailyId = e.editionId';
        return $this->database->query($sql);
    }

    public function getPendingArticles(){
        $sql = 'SELECT * FROM articles WHERE `idNoteStatusTable` =1;';
        return $this->database->query($sql);
    }
    public function downloadArticlesById($id){
        $this->logger->info("dentro de get articulo");
        $sql = "SELECT * FROM `articles` WHERE idArticles = $id";
        $this->logger->info("$sql");
            
        return $this->database->query($sql);
    }
}