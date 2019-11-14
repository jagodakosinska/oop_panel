<?php

class Database {
    
var $server = 'localhost';
protected $username = 'root';
var $password = 'root';
var $dbname = 'contract';
var $conn;

// conection

public function getConnection(){
  
    $this->conn = null;
    $this->conn = new mysqli($this->server, $this->username, $this->password, $this->dbname);
    $this->conn->query('SET NAMES utf8mb4');
    return $this->conn;
}


// function __construct()
// {
//    $this->conn = new mysqli($this->server, $this->username, $this->password, $this->dbname);
//    $this->conn->query('SET NAMES utf8mb4');
// }


public function query($sql) {
    return $this->conn->query($sql);
}

public function esc_str ($str) {
    return $this->conn->escape_string($str);
}
/*
if($con->connect_error){
    die("Connection Fail: " . $con->connect_error);
} 
*/
}