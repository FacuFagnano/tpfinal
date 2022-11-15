<?php
#* ------------------------------------------------ ↓↓ OBJETO MODEL PARA REGISTRAR UN USUARIO ↓↓ -----------------------------------------------
class RegistryModel{
    private $database;
    private $logger;

    public function __construct($database, $logger){
        $this->database = $database;
        $this->logger = $logger;
    }

    public function getUsers(){
        $sql = "SELECT * FROM user";
        $this->database->query($sql);
    }
#! ---------------------------------------------------------- ↓↓ ALTA DE USUARIO ↓↓ -----------------------------------------------------------
    public function alta($name, $lastname, $password, $email, $geoposition, $hash_validate){
        $sql = "INSERT INTO user(`NAME`, `LASTNAME`, `GEOPOSITION`, `ROL`, `ESTATE`) 
                VALUES ('$name','$lastname','$geoposition','1','1')";

        $sql2 = "INSERT INTO password (`ID_PASS`, `PASS`, `HASH_VALIDATOR`, `EMAIL`)
                VALUES (LAST_INSERT_ID(), '$password', '$hash_validate',  '$email')";

        if(!$this->verificarCuenta($email)){ #? si es un 1 (quiere decir que no esta en la base de datos), ejecuta las querys. Si es un null (esta en la base de datos), no las ejecuta.
            $this->database->execute($sql);
            $this->database->execute($sql2);
            $this->logger->info("El usuario: " . $email . " ha sido registrado exitosamente.");
            return true;
        }
        $this->logger->error("El usuario no se pudo registrar exitosamente." . "\n" . "El usuario: " . $email . " ya se encuentra en la base de datos.");
        return false;
    }


    public function verificarCuenta($email){
        $sql = "SELECT * FROM PASSWORD WHERE EMAIL like '%$email%'"; #? verificamos que el mail no se encuentra ya en la base de datos.
        $resultado = $this->database->query($sql);#? retorna un 1 si no encuentra nada
        return $resultado;
    }
}
