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
    // function valid_data()
    // {
    //     $this->form_validation->set_rules('bill[bill_date]', 'Data wystawienia', 'required|trim');
    //     $this->form_validation->set_rules('bill[netto]', 'Kwota netto', 'required|trim');
    //     $this->form_validation->set_rules('bill[uid]', '', 'required|numeric');
    //     $this->form_validation->set_rules('bill[cost_pcent]', '', 'required|numeric');
    //     $this->form_validation->set_rules('bill[bank_transfer]', '', 'required|numeric');
    //     if ($this->form_validation->run() !== false) {
    //         $data['form_data'] = $this->input->post('bill');
    //         $form_data = $data['form_data'];
    //         $arr = [
    //             'bill_date' => $form_data['bill_date'],
    //             'netto' => $form_data['netto'],
    //             'cost_pcent' => $form_data['cost_pcent'],
    //             'bank_transfer' => $form_data['bank_transfer'],
    //         ];
    //         return $arr;
    //     }
    //     return null;
    // }

    // function insert($arr){
    //     $this->db->insert('bill', $arr);
    //     $id = $this->db->insert_id();
    //     return $id;
    // }

    // function update_bill_number($id){
    //     $res = $this->Contract_M->show_by_bill_id($id);
    //     if(!is_null($res)){
    //         $num = $res->number . '/' . date('m') . '/' .  date('Y');
    //         $this->db->set('full_number', $num)->where('id', $id)->update('bill');
    //     } else {
    //         return null;
    //     }
    // }

    // function update_bill_pdf($id)
    // {
    //     $url_to_pdf = site_url("pdf/create_bill_pdf/{$id}");
    //     require dirname(dirname(__FILE__)) . '/third_party/pdf/vendor/autoload.php';
    //     $snappy = new Pdf('/usr/bin/xvfb-run /usr/bin/wkhtmltopdf --lowquality');
    //     $pdf_content = $snappy->getOutput($url_to_pdf);
    //     $this->db->set('pdf', $pdf_content)->where('id', $id)->update('bill');
    // }

  

}