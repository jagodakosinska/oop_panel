<?php

class Database
{
    private $server = 'localhost';
    private $userName = 'root';
    private $password = 'root';
    private $dbName = 'contract';
    var $conn;

    // conection
    protected function connect()
    {
        $this->conn = new mysqli($this->server, $this->userName, $this->password, $this->dbName);
        $this->conn->query('SET NAMES utf8mb4');
        error_log('dupa');
        return $this->conn;
        

    }

    // public function query($sql)
    // {
    //     return $this->conn->query($sql);
    // }

    // public function esc_str($str)
    // {
    //     return $this->conn->escape_string($str);
    // }

    // public function insert_id()
    // {
    //     return $this->conn->insert_id;
    // }

    // public function error_nr()
    // {
    //     return $this->conn->errno;
    // }

    // public function error_info()
    // {
    //     return $this->conn->error;
    // }

    // public function fetch_assoc(){
    //     return $this->conn->fetch_assoc;
    // }
}

