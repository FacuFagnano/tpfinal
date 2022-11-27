<?php

class UserListModel {
    
    private $database;
    private $logger;

    public function __construct($database,$logger) {
        $this->database = $database;
        $this->logger = $logger;
    }

    public function getUsersList() {
        $sql = "SELECT * FROM `user` u LEFT JOIN role r on r.ID_ROLE = u.ROL";
        $this->logger->info("Esto es respuesta userListModel" . json_encode($this->database->query($sql)));
        return $this->database->query($sql);
    }

    public function deleteUsers($user ) {
        $sql1 = "DELETE FROM user WHERE ID = $user";        
        $sql2 = "DELETE FROM password WHERE ID_PASS = $user";
        $this->database->execute($sql1);
        $this->database->execute($sql2);
    }

    public function getModifyUsers($user){
        $sql = "SELECT * FROM `user` u INNER JOIN role r on r.ID_ROLE = u.ROL where u.ID=$user";
        $this->logger->info("Esto es respuesta getModifyUsers" . json_encode($this->database->query($sql)));
        return $this->database->query($sql);
    }

    public function updateRole($codigo,$id) {
        $sql1 = "UPDATE `user` SET `ROL` = $codigo WHERE ID = $id";
        $this->database->execute($sql1);
    }
    


    
}