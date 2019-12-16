<?php

class Employee_M extends Database
{
    
    
    public function __construct()
    {
      parent::connect();
    }

    public function get_all()
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

    public function get_by_id($id)
    {
        $sql = "SELECT * FROM employee WHERE id=$id";
        $result = $this->conn->query($sql);
        $res = array();
        if ($result->num_rows > 0) {
            while ($res[] = $result->fetch_assoc()) { }
        }
        return $res[0];
    }

    public function insert_employee($arr)
    {
        $arr = explode(', ', $arr['data']);
        $data = [];
        foreach ($arr as $item) {
            $item = trim($item);
            preg_match("@`(.*?)`.?=.?'(.*?)'@", $item, $rg);
            if (isset($rg[1])) {
                $data[$rg[1]] = $rg[2];
            }
        }

        $key = array_keys($data);
        $val = array_values($data);
        $sql = "INSERT INTO `employee` (" . implode(', ', $key) . ") "
            . "VALUES ('" . implode("', '", $val) . "')";
        $this->conn->query($sql);
        $sql2 = 
        $id = $this->conn->insert_id;
        return $id;
    }

    public function update_employee($id, $arr)
    {
        $sql = "UPDATE `employee` SET $arr WHERE id=$id";
        $res = $this->conn->query($sql);
        return $res;
    }

}
