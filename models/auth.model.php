<?php

class AuthModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=TPE;charset=utf8', 'root', '');
    }

    
}