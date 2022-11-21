<?php
    class EdicionModel {
    
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }


    public function getNotasSession(){
        $sql = 'SELECT * from articles a INNER JOIN notestatus n on a.idArticles = n.idNoteStatus';
        return $this->database->query($sql);
    }

    public function getDailySession(){
        $sql = 'SELECT * from edition e INNER JOIN daily d on d.dailyId = e.id_edition';
        return $this->database->query($sql);
    }

    public function getEdition(){
        $sql = 'SELECT * from edition';
        return $this->database->query($sql);

    }
}