<?php

class Employee extends Employee_M
{

    var $valid;
    var $displayer;

    public function __construct()
    {
        parent::__construct();
        $this->displayer = new Displayer();
        $this->valid = new Validator();
    }

    public function show_employees()
    {
        $template_name = 'views/employee/list.php';
        $data['page_title'] = "Lista pracowników";
        $data['all_employees'] = $this->get_all();

        $this->displayer->load_view($data, $template_name);
    }


    public function show_employee($id)
    {
        
        $template_name = 'views/employee/item.php';
        $data['cont'] = $this->get_cont_by_uid($id);
        $data['emp'] = $this->get_by_id($id);
        // dump($data['cont']['uid']);
        $this->displayer->load_view($data, $template_name);
    }

    public function add_employee($p)
    {
        $template_name = 'views/employee/form.php';
        $data['page_title'] = "Dodaj Pracownika";
        $data['emp'] = '';
        $data['submit'] = 'insert_emp';
        $data['value'] = 'Dodaj';
        $data['errors'] = $p['errors'];
        $data['emp'] = isset($p['emp']) && !empty($p['emp']) ? $p['emp'] : $data['emp'];
        $this->displayer->load_view($data, $template_name);
    }

    public function create_employee($arr)
    {
        $res = $this->valid->valid_employee($arr['emp']);
        if ($res['status'] === true) {
            $id = $this->insert_employee($res);
            $this->show_employee($id);
        } else {
            $arr['errors'] = $res['data'];
            $this->add_employee($arr);
        }
    }

    public function edit_employee($p)
    {
        // dump($p);
        $template_name = 'views/employee/form.php';
        $data['page_title'] = "Edycja Pracownika";
        $id = isset($p['edit_emp']) ? $p['edit_emp'] : $p['id'] ;
        $data['submit']  = 'update_emp';
        $data['value'] = 'Edytuj';
        $data['errors'] = $p['errors'];
        $data['emp'] = isset($p['emp']) && !empty($p['emp']) ? $p['emp'] : $this->get_by_id($id);
        $this->displayer->load_view($data, $template_name);
    }

    public function set_employee($arr)
    {
        $id = $arr['id'];
        $res = $this->valid->valid_employee($arr['emp']);
        if ($res['status'] === true) {
            $this->update_employee($id, $res['data']);
            $this->show_employee($id);
        } else {
            $arr['errors'] = $res['data'];
            $this->edit_employee($arr);
        }
    }
}
