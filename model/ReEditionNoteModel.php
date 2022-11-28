<?php

class ReEditionNoteModel{
    private $database;
    private $logger;

    public function __construct($database, $logger){
        $this->database = $database;
        $this->logger = $logger;
    }

    public function getNotes()
    {
        $sql = "SELECT * FROM articles";
        return $this->database->query($sql);
    }

    public function getDailys()
    {
        $sql = "SELECT * FROM daily";
        return $this->database->query($sql);
    }

    public function getEditions()
    {
        $sql = "SELECT * FROM edition";
        return $this->database->query($sql);
    }

    public function getSections()
    {
        $sql = "SELECT * FROM section";
        return $this->database->query($sql);
    }

    public function getUser()
    {
        $id = $_SESSION["logueado"];
        $sql = "SELECT * FROM user WHERE ID = '$id'";
        return $this->database->query($sql);
    }

    public function sendNoteToVerify($title, $image, $note, $longitude, $latitude, $daily, $section, $edition, $idArticles){      
        $sql = "UPDATE `articles` SET `articleTitle`='$title', `articleContent`='$note', `articleImage`='$image', `articleLongitude`='$longitude', `articleLatitude`='$latitude', `articleEditorComment`=' ', `idDailyTable`='$daily', `idEditionTable`= '$edition', `idSectionTable` = '$section', `idNoteStatusTable`= 1 WHERE idArticles = '$idArticles'";

        if(!$this->alreadyExist($title, $daily, $edition)){
            $this->database->execute($sql);
            return true;
        } else {
            $this->logger->info("Se metió al else del título");
            return false;
        }
    }

    public function alreadyExist($title, $daily, $edition){
        $sql = "SELECT * FROM articles WHERE articleTitle LIKE '$title' AND idDailyTable LIKE '$daily' AND idEditionTable LIKE '$edition'";
        $result = $this->database->query($sql);
        return $result;
    }

    public function getLatitudeAndLongitude() {

    }

    public function getReEditionNoteById(){

    }

    public function finalArticle($idArticles){
        $sql = "SELECT * FROM articles WHERE idArticles = " . $idArticles . "";
        return $this->database->query($sql);
    }

}  