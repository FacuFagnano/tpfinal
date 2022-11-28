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
}