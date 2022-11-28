<?php

class VerifyNotesModel
{
    private $database;
    private $logger;

    public function __construct($database, $logger){
        $this->database = $database;
        $this->logger = $logger;
    }

    public function getNotesToVerify() {
        $sql = "SELECT * FROM articles WHERE idNoteStatusTable = 1";
        $this->logger->info("esto tiene que devolver algo: " . json_encode($this->database->query($sql)));
        return $this->database->query($sql);
    }

    public function finalArticle($idArticles){
        $sql = "SELECT * FROM articles WHERE idArticles = " . $idArticles . "";
        return $this->database->query($sql);
    }

    public function noteSendToPost($idArticle){
        $sql = "UPDATE `articles` SET `idNoteStatusTable` = 3 WHERE idArticles = " . $idArticle . "";
        $this->logger->info("esto lo hago");
        $this->logger->info("noteSend : " . json_encode($this->database->execute($sql)));
        $this->database->execute($sql);
    }

    public function noteBackToWriter($idArticle){
        $sql = "UPDATE `articles` SET `idNoteStatusTable` = 2 WHERE idArticles =" . $idArticle . "";
        $this->logger->info("noteNOTSend : " . json_encode($this->database->execute($sql)));
        $this->database->execute($sql);
    }

    public function getNotesBackToWriter(){
        $sql = "SELECT * FROM articles WHERE idNoteStatusTable = 2";
        $this->logger->info("esto tiene que devolver algo: " . json_encode($this->database->query($sql)));
        return $this->database->query($sql);
    }

}