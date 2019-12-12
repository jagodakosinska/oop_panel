<?php

class Employee extends Database
{
    
    
    public function __construct()
    {
      parent::connect();
    //   var_dump($this->conn);
    }

    protected function get_employees()
    {
        $sql = "SELECT * FROM employee";
        $result = $this->conn->query($sql);
        $res = array();
        if ($result->num_rows > 0) {
            while ($res[] = $result->fetch_assoc()) { }
        }
        return $res;
        // mysqli_fetch_all()
    }

    }

    // var $db = null;

    // public function __construct()
    // {
    //     $this->db = $this->connect();
    // }


    // public function get_all()
    // {

    //     $sql = "SELECT * FROM employee";
    //     $result = $this->db->query($sql);
    //     $res = array();
    //     if ($result->num_rows > 0) {
    //         while ($res[] = $result->fetch_assoc()) { }
    //     }
    //     return $res;
    // }

    // public function get_by_id($id)
    // {

    //     $sql = "SELECT * FROM employee WHERE id=$id";
    //     $result = $this->db->query($sql);
    //     $res = array();
    //     if ($result->num_rows > 0) {
    //         while ($res[] = $result->fetch_assoc()) { }
    //     }
    //     return $res[0];
    // }

    // public function update_emp($id, $arr)
    // {
    //     $sql = "UPDATE `employee` SET $arr WHERE id=$id";
    //     $res = $this->db->query($sql);
    //     return $res;
    // }
    // public function insert_emp($arr)
    // {

    //     $arr = explode(', ', $arr['data']);
    //     $data = [];
    //     foreach ($arr as $item) {
    //         $item = trim($item);
    //         preg_match("@`(.*?)`.?=.?'(.*?)'@", $item, $rg);
    //         if (isset($rg[1])) {
    //             $data[$rg[1]] = $rg[2];
    //         }
    //     }

    //     $key = array_keys($data);
    //     $val = array_values($data);
    //     $sql = "INSERT INTO `employee` (" . implode(', ', $key) . ") "
    //         . "VALUES ('" . implode("', '", $val) . "')";
    //     $this->db->query($sql);
    //     $id = $this->db->insert_id();
    //     return $id;
    // }
}
