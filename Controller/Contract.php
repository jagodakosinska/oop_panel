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
        // dump($data['emp']);
        $this->displayer($data, $template_name);
    }

    public function show_form($p){
        $template_name = 'views/contract/form.php';
        $data['page_title'] = "Dodaj Umowę";
        $data['cont'] = '';
        $data['submit'] = 'insert_cont';
        $data['value'] = 'Dodaj';
        $data['errors'] = $p['errors'];
        $data['cont'] = isset($p['cont']) && !empty($p['cont']) ? $p['cont'] : $data['cont'];
        // dump($p);
        $this->displayer($data, $template_name);
    }

    public function create_contract($arr){
        $res = $this->validation_data($arr['cont']);
        if ($res['status'] === true) {
            $id = $this->Contract_M->insert_contract($res);
            $this->show_contract($id);
        } else {
            $arr['errors'] = $res['data'];
            $this->show_form($arr);
        }
    }
}
