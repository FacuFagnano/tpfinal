<?php

class ValidarModel{
    private $database;
    private $logger;

    public function __construct($database, $logger){
        $this->database = $database;
        $this->logger = $logger;
    }

    public function getValidar($email){
        return $this->database->query("SELECT email FROM sesion WHERE `email` = '$email'");
    }

    public function hashCleaner($email){
        $sql = "UPDATE PASSWORD SET HASH_VALIDATOR='0' WHERE `email` = '$email'";
        $this->database->execute($sql);
    }

    public function activateAccount($code, $email){
        $data = $this->getValidar($email);
        foreach ($data as $result) {
            if ($result["HASH_VALIDATOR"] == $code) {
                $this->hashCleaner($email);
                return true;
            }
        }
    }
}    