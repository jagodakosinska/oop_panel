<?php

class Contract extends Contract_M
{
    var $empM;
    var $valid;
    var $displayer;


    public function __construct()
    {
        parent::__construct();
        $this->empM = new Employee_M();
        $this->displayer = new Displayer();
        $this->valid = new Validator();
    }

    public function validation_data($arr)
    {

        $res = $this->valid->valid_contract($arr);
        return $res;
    }


    public function displayer($data, $template_name)
    {
        $this->displayer->load_view($data, $template_name);
    }


    public function show_all()
    {
        $template_name = 'views/contract/list.php';
        $data['page_title'] = "Lista umów";
        $data['all_contracts'] = $this->get_all();
        $this->displayer($data, $template_name);
    }

    public function show_contract($id)
    {
        $template_name = 'views/contract/item.php';
        $data['cont'] = $this->get_by_id($id);
        $uid =  $data['cont']['uid'];
        $data['emp'] = $this->empM->get_by_id($uid);
        $this->displayer($data, $template_name);
    }

    public function add_contract($p)
    {
        $template_name = 'views/contract/form.php';
        $data['page_title'] = "Dodaj Umowę";
        $data['cont'] = '';
        $data['submit'] = 'insert_cont';
        $data['value'] = 'Dodaj';
        $data['errors'] = $p['errors'];
        $data['uid'] = $p['add_cont'];
        $data['task'] = $p['task_contract'];
        $data['cont'] = isset($p['cont']) && !empty($p['cont']) ? $p['cont'] : $data['cont'];
        $this->displayer($data, $template_name);
    }

    public function create_contract($arr)
    {
        $res = $this->validation_data($arr['cont']);
        if ($res['status'] === true) {
            $id = $this->insert_contract($res['data'], $res['task']);
            $this->show_contract($id);
        } else {
            $arr['errors'] = $res['data'];
            $this->add_contract($arr);
        }
    }

    public function edit_contract($p){
            $template_name = 'views/contract/form.php';
            $data['page_title'] = "Edycja Umowy";
            $data['id'] = isset($p['edit_cont'])  ? $p['edit_cont'] : $p['id'];
            $data['submit']  = 'update_cont';
            $data['value'] = 'Edytuj';
            $data['errors'] = $p['errors'];
            $data['uid'] = isset($p['cont']['uid']) ? $p['cont']['uid'] : $p['uid'];
            $data['task'] = 'brak';
            $data['cont'] = isset($p['cont']) && !empty($p['cont']) ? $p['cont'] : $this->get_by_id($data['id']);
            $this->displayer($data, $template_name);
    }

    public function set_contract($arr){
        $id = $arr['id'];
        $res = $this->validation_data($arr['cont']);
        if ($res['status'] === true) {
            $this->update_contract($id, $res['data']);
            $this->show_contract($id);
        } else {
            $arr['errors'] = $res['data'];
            $this->edit_contract($arr);
        }
    }

}
