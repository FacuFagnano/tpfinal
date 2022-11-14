<?php

class SuscripcionModel {
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    // Hay que definir los paquete por cada usuario y reflejarlo en la vista.

    public function getSuscripcion() {
        $sql = 'SELECT * FROM section';
        return $this->database->query($sql);
    }
    public function borrar($valor){
        $query = "DELETE FROM `section` WHERE `section`.`id` = '$valor'"; // revisar tabla y valor
        $this->database->execute($query);
    }
}