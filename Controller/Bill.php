<?php

class Bill extends Bill_M
{
    var $empM;
    var $contractM;
    var $contract;
    var $valid;
    var $displayer;


    public function __construct()
    {
        parent::__construct();
        $this->contract = new Contract();
        $this->empM = new Employee_M();
        $this->contractM = new Contract_M();
        $this->displayer = new Displayer();
        $this->valid = new Validator();
    }

    public function validation_data($arr)
    {

        $res = $this->valid->valid_bill($arr);
        return $res;
    }


    public function displayer($data, $template_name)
    {
        $this->displayer->load_view($data, $template_name);
    }


    public function show_bills()
    {
        $template_name = 'views/bill/list.php';
        $data['page_title'] = "Lista rachunków";
        $data['all_bills'] = $this->get_all();
        $this->displayer($data, $template_name);
    }

    function show_bill($id){
        $template_name = 'views/bill/item.php';
        $data['bill'] = $this->get_by_id($id);
        $data['contract'] = $this->show_by_bill_id($id);
        $uid = $data['contract']['uid'];
        $data['employee'] = $this->empM->get_by_id($uid);
        $this->displayer($data, $template_name);
    }

    function add_bill($p)
    {
        $template_name = 'views/bill/form.php';
        $data['page_title'] = "Dodaj Rachunek";
        $data['bill'] = '';
        $data['submit'] = 'insert_bill';
        $data['value'] = 'Dodaj';
        $data['bill'] = isset($p['bill']) ? $p['bill'] : $data['bill'];
        $data['cont_id'] = isset($p['add_bill']) ? $p['add_bill'] : $p['cont_id'];
        $data['cost_pcent'] = $p['cost_pcent'];
        $data['bank_transfer'] =$p['bank_transfer'];
        $data['errors'] = $p['errors'];
        $this->displayer($data, $template_name);
     
    }


    
    public function create_bill($arr){

    
        $res = $this->validation_data($arr['bill']);
     
        if ($res['status'] === true) {
            $id = $this->insert_bill($res['data']);
            $this->update_contract_bill($id, $res['cont_id']);
            $this->update_bill_number($id);
            $this->show_bill($id);
        } else {
            $arr['errors'] = $res['data'];
            $this->add_bill($arr);
        }
    }


    function delete_bill($id){
        $res = $this->delete($id);
        $this->contract->show_contract($res);
    }
}