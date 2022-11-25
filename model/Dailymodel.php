<?php

class DailyModel {
    
    private $database;
    private $logger;

    public function __construct($database,$logger) {
        $this->database = $database;
        $this->logger = $logger;
    }

    public function getDaily(){
        $sql = 'SELECT * from usersdaily ud INNER JOIN daily d on d.dailyId = ud.dailyIdTable where ud.`userIdTable` = '  . $_SESSION["logueado"] . ' ';
        return $this->database->query($sql);
    }

    public function getDailyNotLogin(){
        $sql = 'SELECT * from daily';
        return $this->database->query($sql);
    }

    public function getSubscription() {
        $sql = 'SELECT * from usersdaily ud INNER JOIN daily d on d.dailyId = ud.dailyIdTable where ud.`userIdTable` = '  . $_SESSION["logueado"] . ' ';
        return $this->database->query($sql);
    }
   


}