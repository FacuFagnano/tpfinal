<?php

class DailyModel {
    
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function getDaily(){
        $sql = 'SELECT * from usersdaily ud INNER JOIN daily d on d.dailyId = ud.DailyIdTable';
        return $this->database->query($sql);
    }


}