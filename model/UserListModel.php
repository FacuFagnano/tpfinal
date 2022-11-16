<?php

class UserListModel {
    
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function getUsersList() {
        $sql = "SELECT * FROM user";
        return $this->database->query($sql);
    }
}