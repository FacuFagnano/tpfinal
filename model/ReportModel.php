<?php

class ReportModel {
    private $database;
    private $logger;

    public function __construct($database, $logger) {
        $this->database = $database;
        $this->logger = $logger;
    }

    public function getCountUser() {
        $sql = 'SELECT count(*) as CantidadUsuario FROM `user`';
        return $this->database->query($sql);
    }

    public function getCountdailys() {
        $sql = 'SELECT count(*) as CantidadDiario FROM `daily`';
        return $this->database->query($sql);
    }

    public function getDailysNames(){
        $sql = 'SELECT dailyName FROM `daily`';
        $values = $this->database->query($sql);
        $dailysNames = new ArrayObject();
        for ($i=0; $i< sizeof($values); $i++){
            $value = $values[$i]["dailyName"];
            $dailysNames->append($value);
        }
        return $dailysNames;
    }

    public function getCountSalesDailys() {
        $sql = 'SELECT count(*) as CantidadDeVentas FROM `usersdaily`;';
        return $this->database->query($sql);
    }
}


