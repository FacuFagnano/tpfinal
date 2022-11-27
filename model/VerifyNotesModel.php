<?php

class verifyNotesModel
{
    private $database;
    private $logger;

    public function __construct($database, $logger){
        $this->database = $database;
        $this->logger = $logger;
    }

    public function getRol($rol) {
        $sql = "SELECT ROL FROM user WHERE ID = '$rol'";
        return $this->database->query($sql);
    }

    public function getNotesToVerify()
    {
        $sql = "SELECT * FROM articles WHERE idNoteStatusTable = 1";
        return $this->database->execute($sql);
    }



}