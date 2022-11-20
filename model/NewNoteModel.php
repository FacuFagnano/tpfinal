<?php

class NewNoteModel{
    private $database;
    private $logger;

    public function __construct($database, $logger){
        $this->database = $database;
        $this->logger = $logger;
    }

    public function getNotes() {
        $sql = "SELECT * FROM publications";
        $this->database->query($sql);
    }

    public function sendNoteToVerify($title, $image, $note, $section){
        $sql = "INSERT INTO publications(`titulo_pub`, `pub_img_url`, `descripcion`, `id_section`) 
                VALUES ('$title','$image','$note','$section')";
        if(!$this->alreadyExist($title)){
            $this->database->execute($sql);
            return true;
        } else {
            $this->logger->info("Se metió al else del título");
            return false;
        }
    }

    public function alreadyExist($title){
        $sql = "SELECT * FROM publications WHERE titulo_pub LIKE '$title'";
        $result = $this->database->query($sql);
        return $result;
    }


}    