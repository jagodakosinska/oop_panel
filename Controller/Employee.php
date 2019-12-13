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

    public function validation_data($arr)
    {

        $res = $this->valid->valid_employee($arr);
        return $res;
    }


    public function displayer($data, $template_name)
    {
        $this->displayer->load_view($data, $template_name);
    }

    public function show_employees()
    {
        $template_name = 'views/employee/list.php';
        $data['page_title'] = "Lista pracowników";
        $data['all_employees'] = $this->get_employees();
        $this->displayer($data, $template_name);
    }


    public function show_employee($id)
    {
        $template_name = 'views/employee/item.php';
        $data['emp'] = $this->get_by_id($id);
        $this->displayer($data, $template_name);
    }

    public function show_form($p)
    {
        $template_name = 'views/employee/form.php';
        $data['page_title'] = "Dodaj Pracownika";
        $data['emp'] = '';
        $data['submit'] = 'insert_emp';
        $data['value'] = 'Dodaj';
        $data['errors'] = $p['errors'];
        $data['emp'] = isset($p['emp']) && !empty($p['emp']) ? $p['emp'] : $data['emp'];
        // dump($p);
        $this->displayer($data, $template_name);
    }

    public function create_employee($arr)
    {
        $res = $this->validation_data($arr['emp']);

        if ($res['status'] === true) {
            $id = $this->set_employee($res);
            $this->show_employee($id);
        } else {
            $arr['errors'] = $res['data'];

            $this->show_form($arr);
        }
    }

    // if ($update_employee) {
    //     $id = $p['id'];
    //     $arr = $valid->valid_employee($p['emp']);
    //     if ($arr['status'] === true) {
    //         $emp->update_emp($id, $arr['data']);
    //         $show_employee = true;
    //     $p['show_emp'] = $p['id'];
    //     }else{
    //         $p['edit_emp'] = $p['id'];
    //         $p['errors'] = $arr['data'];
    //         $edit_employee = true;
    //     }
    // ================   Employee 
    // if ($edit_employee) {
    //     $template_name = 'views/employee/form.php';
    //     $data['page_title'] = "Edycja Pracownika";
    //     $id = $p['edit_emp'];
    //     $data['submit']  = 'update_emp';
    //     $data['value'] = 'Edytuj';
    //     $data['errors'] = $p['errors'];
    //     // $data['emp'] = ;
    //     $data['emp'] = isset($p['emp']) && empty($p['emp']) ? $p['emp'] :  $emp->get_by_id($id)[0];
    //     $displayer->load_view($data, $template_name);
    // } elseif ($add_new_employee) {
    //     $template_name = 'views/employee/form.php';
    //     $data['page_title'] = "Dodaj Pracownika";
    //     $data['emp'] = '';
    //     $data['submit'] = 'insert_emp';
    //     $data['value'] = 'Dodaj';
    //     $data['errors'] = $p['errors'];
    //     $data['emp'] = isset($p['emp']) && empty($p['emp']) ? $p['emp'] : $data['emp'];
    //     $displayer->load_view($data, $template_name);
    // }


}
