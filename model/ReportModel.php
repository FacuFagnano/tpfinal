<?php

class ReportModel {
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function getCountUser() {
        $sql = 'SELECT count(*) as CantidadUsuario FROM `user`';
       
        return $this->database->query($sql);
    }

    public function getCountdailys() {
        $sql = 'SELECT count(*) as CantidadDiario FROM `daily`';
       
        return $this->database->query($sql);
    }

    public function getCountSalesDailys() {
        $sql = 'SELECT count(*) as CantidadDeVentas FROM `usersdaily`;';
       
        return $this->database->query($sql);
    }
}