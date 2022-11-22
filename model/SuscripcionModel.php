<?php

class SuscripcionModel {
    private $database;
    private $logger;

    public function __construct($database,$logger) {
        $this->database = $database;
        $this->logger = $logger;
    }

    // Hay que definir los paquete por cada usuario y reflejarlo en la vista.

    public function getSuscripcion() {
        $sql = 'SELECT * FROM usersdaily usd INNER JOIN user u on usd.userIdTable = u.ID 
        INNER JOIN daily d on d.dailyId = usd.idUsersDaily';
        return $this->database->query($sql);
    }
    public function getSuscripcionNuevas() {
        $sql = 'SELECT *  from daily where dailyId not in (SELECT DailyIdTable  FROM usersdaily )';
        return $this->database->query($sql);
    }

    public function bajaSuscripcion($user,$daily){
        $query = "DELETE FROM usersdaily WHERE UserIdTable = $user and DailyIdTable = $daily";
        $this->database->execute($query);
    }

    public function insertarSuscripcion($user,$daily){
        $query = "INSERT INTO `usersdaily` (`UserIdTable`, `DailyIdTable`) VALUES ('$user', '$daily')";
        $this->database->execute($query);
    }
}