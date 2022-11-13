<?php

class SuscripcionModel {
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    // Hay que definir los paquete por cada usuario y reflejarlo en la vista.

    public function getContent() {
        $sql = 'SELECT * FROM content';
        return $this->database->query($sql);
    }
}