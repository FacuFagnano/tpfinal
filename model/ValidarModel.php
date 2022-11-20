<?php

class ValidarModel{
    private $database;
    private $logger;

    public function __construct($database, $logger){
        $this->database = $database;
        $this->logger = $logger;
    }

    public function getValidar($email){
        $sql = "SELECT * FROM password WHERE email = '$email'";
        return $this->database->query($sql);
    }

    public function hashCleaner($email){
        $sql = "UPDATE PASSWORD SET HASH_VALIDATOR='0' WHERE `email` = '$email'";
        $sql2 = "UPDATE PASSWORD SET VALIDATED_STATUS=1 WHERE `email` = '$email'";
        $this->database->execute($sql);
        $this->database->execute($sql2);
    }

    public function activateAccount($code, $email){
        $data = $this->getValidar($email);
        foreach ($data as $result) {
            if ($result["HASH_VALIDATOR"] == $code) {
                $this->hashCleaner($email);
                return true;
            }
        }
        return false;
    }
}    