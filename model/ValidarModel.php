<?php

class ValidarModel{
    private $database;

    public function __construct($database){
        $this->database = $database;
    }

    public function getLogin($email){
        return $this->database->query("SELECT email FROM sesion WHERE `email` = '$email'");
    
    }

    public function validateUser(){

        $data = $this->getLogin();

        foreach ($data as $result) {

            if ($result["HASH_VALIDATE"] ==     100) {
                echo 'usuario validado';
                exit();
            }
        }
    
    }

    public function getUsuario($email){
        $SQL = "SELECT * FROM password WHERE email = '$email'";
        return $this->database->query($SQL);
    }
}    