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
            if ($result["HASH_VALIDATE"] == 100) {
                echo 'usuario validado';
                exit();
            }
        }
    
    }

    #! VER EL TEMA VALIDACION. QUE PASA SI NO ENCUENTRA UN USUARIO EN LA TABLA PASSWORD? DEVOLVERIA UN DATO VACIO.
    public function getUsuario($email){
        $user = "SELECT * FROM password WHERE email = '$email'"; #* retorna un usuario que esta en la tabla password ya registrado.
        return $this->database->query($user);
    }
}    