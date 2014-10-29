<?php

class DbConnection {

    private $server = 'localhost';
    private $user = 'root';
    private $password = 'intel';
    private $db_name = 'humanity-string';
 
    public function getServer() {
        return $this->server;
    }
 
    public function getUser() {
        return $this->user;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getDb_name() {
        return $this->db_name;
    }

}