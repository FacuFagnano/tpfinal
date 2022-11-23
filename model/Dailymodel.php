<?php

class DailyModel {
    
    private $database;
    private $logger;

    public function __construct($database,$logger) {
        $this->database = $database;
        $this->logger = $logger;
    }

    public function getDaily(){
        $sql = 'SELECT * from usersdaily ud INNER JOIN daily d on d.dailyId = ud.DailyIdTable where ud.`UserIdTable` = '  . $_SESSION["logueado"] . ' ';
        
        return $this->database->query($sql);
    }

    public function getDailyHome(){
        $sql = 'SELECT*from usersdaily ud INNER JOIN daily d on d.dailyId = ud.DailyIdTable';
        
        return $this->database->query($sql);
    }
   


}