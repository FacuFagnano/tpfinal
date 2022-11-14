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

    public function insertarSuscripcion(){
        $query = "INSERT INTO `content` (`id_con`, `id_con_user`, `id_con_publications`, `id_con_section`) VALUES ('3', '5', '1', '3')"; // revisar tabla y valor
        $this->database->execute($query);
    }
}