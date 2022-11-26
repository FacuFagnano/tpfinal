<?php

class LoginModel {

    private $database;
    private $logger;
    private $rolUser;

    public function __construct($database, $logger) {
        $this->database = $database;
        $this->logger = $logger;
    }

    public function getUsers($email) {
        $sql = "SELECT * FROM password WHERE EMAIL = '$email'";
        return $this->database->query($sql);
    }

    public function getRol($rol) {
        $sql = "SELECT ROL FROM user WHERE ID = '$rol'";
        return $this->database->query($sql);
    }


    public function passwordValidation($userInPasswordTable, $password){
        foreach ($userInPasswordTable as $result) {
           
            #? Le asigna en el session el id del usuario logueado.
            //$this->logger->info("Estoy en el Login model: ". json_encode($result));
            if (password_verify($password, $result["PASS"]) && $result["VALIDATED_STATUS"] == 1) {
                return true;
            } else {
                return false;
            }

        }
    }

/*    public function borrar($valor){
        $query = "DELETE FROM `sesion` WHERE `sesion`.`valor` = '$valor'"; // revisar tabla y valor
        return $this->database->execute($query);
    }*/

  /*  public function hash($valor){
        $query = "SELECT `HASH_VALIDATOR` FROM `password` WHERE `HASH_VALIDATOR` = 100"; // revisar tabla y valor
        return $this->database->execute($query);
    }*/

    
}