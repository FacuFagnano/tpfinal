<?php

class SuscripcionModel {
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    // Hay que definir los paquete por cada usuario y reflejarlo en la vista.

    public function getSuscripcion() {
        $sql = 'SELECT * from publications p INNER JOIN section s on s.id=p.id_section';
        return $this->database->query($sql);
    }
    public function borrar($valor){
        $query = "DELETE FROM publications WHERE id_publications = $valor";//ELETE FROM `section` WHERE `section`.`id` = '$valor'"; // DELETE FROM publications WHERE id_section = (SELECT id from section where id = 1)revisar tabla y valor
        $this->database->execute($query);
    }

    public function insertarSuscripcion(){
        $query = "INSERT INTO `publications` (`id_publications`, `titulo_pub`, `descripcion`, `id_section`) VALUES ('3', 'Notebook 2 X1', 'des', '1')"; // revisar tabla y valor
        $this->database->execute($query);
    }
}