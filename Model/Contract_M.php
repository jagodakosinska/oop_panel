<?php

class Contract_M extends Database
{



    public function __construct()
    {
        parent::connect();
    }

    public function get_all()
    {
        $month = $_SESSION['month'];
        // dump($month);
        $year = $_SESSION['year'];
        $sql = "SELECT * FROM `contract` WHERE MONTH(`bdate`)=$month AND YEAR(`bdate`)=$year";
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

    function insert_contract($arr, $task)
    {

        $month = $this->check_period($arr['bdate']);
        $num = $this->get_next_number($month);
        $arr['number'] = $num;
        $arr['full_number'] = $task . '/' . $num . '/' . $month . '/' .  date('Y');
        $key = array_keys($arr);
        $val = array_values($arr);
        $sql = "INSERT INTO `contract` (" . implode(', ', $key) . ") "
            . "VALUES ('" . implode("', '", $val) . "')";
        $res = $this->conn->query($sql);
        $id = $this->conn->insert_id;
        return $id;
    }

    function check_period($bdate)
    {
        $act_month = $_SESSION['month'];
        $selected_month = date('m', strtotime($bdate));
        return $act_month !== $selected_month ? $selected_month : $act_month;
    }

    function get_next_number($month)
    {
        $sql = "SELECT MAX(`number`) as max FROM `contract` WHERE MONTH(`bdate`)=$month";
        $result = $this->conn->query($sql);
        $res = $result->fetch_assoc();
        $number = is_null($res['max']) ? 0 : $res['max'];
        return $number + 1;
    }

    public function update_contract($id, $arr){
      
        $res = [];
        foreach ($arr as $key => $value) {
            $res['data'][] = "`" . $key . "`= '" . $value . "'";
        }
        $res = join(', ', $res['data']);
        $sql = "UPDATE `contract` SET $res WHERE id=$id";
        $res = $this->conn->query($sql);
        return $res;
    }
}
