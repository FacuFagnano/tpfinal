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
        $sql = "INSERT INTO user(`NAME`, `LASTNAME`, `GEOPOSITION`, `ROL`, `ESTATE`) 
                VALUES ('$name','$lastname','$geoposition','1','1')";
        $sql2 = "INSERT INTO password (`ID_PASS`, `PASS`, `HASH_VALIDATOR`, `EMAIL`)
                VALUES (LAST_INSERT_ID(), '$password', 100,  '$email')";

        if(!$this->verificarCuenta($email)){
            $this->database->execute($sql);
            $this->database->execute($sql2);
            return true;
        }
        return false;

    }

    public function verificarCuenta($email){
        $sql = "SELECT * FROM PASSWORD WHERE EMAIL like '%$email%'";
        $resultado = $this->database->query($sql);

        return $resultado;
    }
}
    /*public function getPresentaciones() {
        $sql = 'SELECT * FROM presentaciones';
        return $this->database->query($sql);
    }*/
/*

    }*/
