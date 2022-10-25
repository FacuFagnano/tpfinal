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
        $sql2 = "INSERT INTO password (`ID`, `EMAIL`, `PASSWORD`) VALUES (LAST_INSERT_ID(), '$email', '$password')";

        if($this->verificarCuenta($email)){
            $this->database->execute($sql);
            $this->database->execute($sql2);
            return true;
        }
        return false;

    }

    public function verificarCuenta($email){
        $sql = "SELECT * FROM USER WHERE EMAIL like '%$email%'";
        $resultado = $this->database->query($sql);

        return sizeof($resultado) != 0;
    }
}
    /*public function getPresentaciones() {
        $sql = 'SELECT * FROM presentaciones';
        return $this->database->query($sql);
    }*/
/*

    }*/
