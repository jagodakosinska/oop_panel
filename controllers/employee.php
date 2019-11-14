<?php

class Employee {
    

    var $db = null; 

    public function __construct($db){
        $this->conn = $db;
    }
    public function get_all() {
        
        $sql ="SELECT * FROM employee";
        $result = $this->conn->query($sql);
        $res = array();
        if($result->num_rows > 0){
            while($res[] = $result->fetch_assoc()){         }
        }
        return $res;
    }

    public function get_by_id($id){
 
        $sql ="SELECT * FROM employee WHERE id=$id";
        $result = $this->conn->query($sql);
        $res = array();
        if($result->num_rows > 0){
            while($res[] = $result->fetch_assoc()){         }
        }
        return $res;
    }

    public function update_emp($id){
        $sql ="UPDATE employee WHERE id=$id";
        $res = $this->conn->query($sql);
        return $res;
    }

}


