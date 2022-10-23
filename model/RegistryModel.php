<?php

class RegistryModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function getUsers()
    {
        $sql = "SELECT * FROM user";
        $this->database->query($sql);
    }

    public function alta($name, $lastname, $password, $email, $geoposition)
    {
        $sql = "INSERT INTO user(`NOMBRE`, `APELLIDO`, `PASSWORD`, `EMAIL`, `GEOPOSITION`, `ROL`, `ESTADO`) 
                VALUES ('$name','$lastname','$password','$email','$geoposition','1','1')";
        $this->database->execute($sql);
    }
}
    /*public function getPresentaciones() {
        $sql = 'SELECT * FROM presentaciones';
        return $this->database->query($sql);
    }*/
/*

    }*/
