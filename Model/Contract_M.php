<?php

class Contract_M extends Database
{



    public function __construct()
    {
        parent::connect();
    }

    public function get_all()
    {
        $sql = "SELECT * FROM `contract`";
        $result = $this->conn->query($sql);
        $res = array();
        if ($result->num_rows > 0) {
            while ($res[] = $result->fetch_assoc()) { }
        }
        return $res;
    }

    public function get_by_id($id)
    {
        $sql = "SELECT * FROM `contract` WHERE id=$id";
        $result = $this->conn->query($sql);
        $res = array();
        if ($result->num_rows > 0) {
            while ($res[] = $result->fetch_assoc()) { }
        }
        return $res[0];
    }

    public function insert_contract($arr){
        // $month = $this->check_period($arr['bdate']);
        // $number = $this->set_number($month);
        // $num = $number->number + 1;
        // $arr['number'] = $num;
        // $arr['full_number'] = $task . '/' . $num . '/' . $month . '/' .  date('Y');
        // $this->db->insert('contract', $arr);
        // $id = $this->db->insert_id();
        // return $id;
    }


}
