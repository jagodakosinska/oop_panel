<?php

class Contract extends Database{

    var $db = null;

public function __construct()
{
    $this->db = $this->connect();
}

public function get_all()
    {
        $sql = "SELECT * FROM `contract`";
        $result = $this->db->query($sql);
        $res = array();
        if ($result->num_rows > 0) {
            while ($res[] = $result->fetch_assoc()) { }
        }
        return $res;
    }

    public function get_by_id($id)
    {

        $sql = "SELECT * FROM `contract` WHERE id=$id";
        $result = $this->db->query($sql);
        $res = array();
        if ($result->num_rows > 0) {
            while ($res[] = $result->fetch_assoc()) { }
        }
        return $res[0];
    }

}