<?php

class LoginModel {

    private $database;
    private $logger;

    public function __construct($database, $logger) {
        $this->database = $database;
        $this->logger = $logger;
    }

    public function getUsers($email) {
        $sql = "SELECT * FROM password WHERE email = '$email'";
        return $this->database->query($sql);
    }

    public function passwordValidation($userInPasswordTable, $password){
        foreach ($userInPasswordTable as $buscarArray) {
            #? Le asigna en el session el id del usuario logueado.
            $data['prueba'] = $buscarArray["ID_PASS"];

            $this->logger->info($buscarArray["PASS"]);
            if (password_verify($password, $buscarArray["PASS"])) {
                return true;
            } else {
                return false;
            }

        }
    }

    public function borrar($valor){
        $query = "DELETE FROM `sesion` WHERE `sesion`.`valor` = '$valor'"; // revisar tabla y valor
        return $this->database->execute($query);
    }

    public function hash($valor){
        $query = "SELECT `HASH_VALIDATOR` FROM `password` WHERE `HASH_VALIDATOR` = 100"; // revisar tabla y valor
        return $this->database->execute($query);
    }

    
}