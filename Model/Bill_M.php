<?php


class Bill_M extends Database
{

   
    public function __construct()
    {
        parent::connect();
    }

    public function get_all()
    {
        $sql = "SELECT * FROM bill";
        $result = $this->conn->query($sql);
        $res = array();
        if ($result->num_rows > 0) {
            while ($res[] = $result->fetch_assoc()) { }
        }
        return $res;
     
    }


    function get_by_id($id)
    {
        $sql = "SELECT * FROM bill WHERE id=$id";
        $result = $this->conn->query($sql);
        $res = array();
        if ($result->num_rows > 0) {
            while ($res[] = $result->fetch_assoc()) { }
        }
        return $res[0];
    }

    public function show_by_bill_id($id){
        $sql = "SELECT * FROM contract WHERE bill=$id";
        $result = $this->conn->query($sql);
        $res = array();
        if ($result->num_rows > 0) {
            while ($res[] = $result->fetch_assoc()) { }
        }
        return $res[0];
    }


    function delete($id){
        $sql = "SELECT id FROM contract WHERE bill=$id";
        $result = $this->conn->query($sql);
        $res = array();
        if ($result->num_rows > 0) {
            while ($res[] = $result->fetch_assoc()) { }
        }
        $sql1 = "UPDATE contract SET bill=null WHERE bill=$id";
        $this->conn->query($sql1);
        $sql2 = "DELETE FROM bill WHERE id=$id";
        $this->conn->query($sql2);
        return $res[0]['id'];
    }

   public function insert_bill($arr){
    $key = array_keys($arr);
    $val = array_values($arr);
    $sql = "INSERT INTO `bill` (" . implode(', ', $key) . ") "
        . "VALUES ('" . implode("', '", $val) . "')";
    $this->conn->query($sql);
    $id = $this->conn->insert_id;
    return $id;

    }


    public function update_contract_bill($bill_id, $cont_id)
    {
        $sql = "UPDATE contract SET bill=$bill_id WHERE id=$cont_id";
        $this->conn->query($sql);
    }
        
    public function update_bill_number($id){
        $res = $this->show_by_bill_id($id);
        if(!is_null($res)){
            $num = $res['number'] . '/' . date('m') . '/' .  date('Y');
            $sql = "UPDATE bill SET full_number='$num' WHERE id=$id";
            $this->conn->query($sql);
        } else {
            return null;
        }
    }


}