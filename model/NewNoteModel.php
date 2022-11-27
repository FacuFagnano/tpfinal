<?php

class NewNoteModel{
    private $database;
    private $logger;

    public function __construct($database, $logger){
        $this->database = $database;
        $this->logger = $logger;
    }

    public function getNotes() {
        $sql = "SELECT * FROM articles";
        $this->database->query($sql);
    }

    public function sendNoteToVerify($title, $image, $note, $section){
        $sql = "INSERT INTO articles(`articleTitle`, `articleContent`, `articleImage`, `articleEditorComment`,`idSectionTable`,`idNoteStatusTable`) 
                VALUES ('$title','$note','$image', ' ', '$section', 1)";
        if(!$this->alreadyExist($title)){
            $this->database->execute($sql);
            return true;
        } else {
            $this->logger->info("Se metió al else del título");
            return false;
        }
    }

    public function alreadyExist($title){
        $sql = "SELECT * FROM articles WHERE articleTitle LIKE '$title'";
        $result = $this->database->query($sql);
        return $result;
    }


}    