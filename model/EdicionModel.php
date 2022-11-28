<?php
    class EdicionModel {
    
    private $database;
    private $logger;

    public function __construct($database, $logger) {
        $this->database = $database;
        $this->logger = $logger;
    }

    public function getEdition($idDaily){
        $sql = 'SELECT * FROM edition WHERE idDailyTable = ' . $idDaily .' ';
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
}