<?php

class SuscripcionModel {
    private $database;
    private $logger;

    public function __construct($database,$logger) {
        $this->database = $database;
        $this->logger = $logger;
    }

    // Hay que definir los paquete por cada usuario y reflejarlo en la vista.

    public function getSubscription() {
        $sql = 'SELECT * from usersdaily ud INNER JOIN daily d on d.dailyId = ud.dailyIdTable where ud.`userIdTable` = '  . $_SESSION["logueado"] . ' ';
        return $this->database->query($sql);
    }
    public function getNotSubscription() {
        $sql = 'SELECT *  from daily where dailyId not in (SELECT dailyIdTable  FROM usersdaily WHERE userIdTable = '  . $_SESSION["logueado"] . ' )';
        return $this->database->query($sql);
    }

    public function unsubscribe($user, $daily){
        $this->logger->info("Este es el user: " . $user . " y este es el daily: " . $daily);
        $query = "DELETE FROM usersDaily WHERE userIdTable = $user and dailyIdTable = $daily";
        $this->database->execute($query);
    }

    public function insertNewSubscription($user, $daily){
        $query = "INSERT INTO `usersdaily` (`userIdTable`, `dailyIdTable`) VALUES ('$user', '$daily')";
        $this->database->execute($query);
    }
}