<?php

class ValidarModel{
    private $database;

    public function __construct($database){
        $this->database = $database;
    }

    public function getLogin($email){
        return $this->database->query("SELECT email FROM sesion WHERE `email` = '$email'");
    
    }

    public function getLogin1(){
        return $this->database->query("SELECT * FROM user");
    
    }

    public function getUsuario($email){
        $SQL = "SELECT * FROM user WHERE email = '$email'";
        return $this->database->query($SQL);
    }
}    