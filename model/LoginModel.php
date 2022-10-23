<?php

class LoginModel {

    private $database;
    private $results;

    public function __construct($database) {
        $this->database = $database;
        $this->results = $this->getUsers();
    }

    public function getUsers() {
        $sql = "SELECT * FROM user";
        $this->database->query($sql);
    }

    public function login($email, $pass) {
        foreach ($this->results as $result) {
            if ($result["EMAIL"] == $email && $result["PASSWORD"] == $pass){
                $_SESSION["log"]=1;
                Redirect::doIt("/");
            }
        }
    }

}