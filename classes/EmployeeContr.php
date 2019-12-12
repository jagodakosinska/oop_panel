<?php

class EmployeeContr extends Employee
{

    var $empView;
    var $displayer;
    var $valid;
    var $p;
    

    public function __construct()
    {
        parent::__construct();
        // include 'autoloader.php';
        $this->empView = new EmployeeView();
        $this->displayer = new Displayer();
        $this->valid = new Validator();
        $this->p = array_merge($_POST, $_GET);
        // $this->p['errors'] = [];
    }

    public function validation_data()
    {

        $arr = $this->valid->valid_employee($this->p['emp']);
        return $arr;
    }

    public function displayer($data, $template_name)
    {
        $this->displayer->load_view($data, $template_name);
    }

    public function list_employees()
    {
        $template_name = 'views/employee/list.php';
        $data['page_title'] = "Lista pracowników";
        $data['all_employees'] = $this->empView->showEmployees();
        $this->displayer($data, $template_name);
    }

    public function show_employee($id = null)
    {
        if(is_null($id)){
            $id = $this->p['show_emp'];
        }
        $template_name = 'views/employee/item.php';
        $data['emp'] = $this->get_by_id($id);
        $this->displayer($data, $template_name);
    }

    public function add_new_employee()
    {
        $q = $this->p;
        $template_name = 'views/employee/form.php';
        $data['page_title'] = "Dodaj Pracownika";
        $data['emp'] = '';
        $data['submit'] = 'insert_emp';
        $data['value'] = 'Dodaj';
        $data['errors'] = $q['errors'];
        $data['emp'] = isset($q['emp']) && empty($q['emp']) ? $q['emp'] : $data['emp'];
        $this->displayer->load_view($data, $template_name);
    }

    public function create_employee()
    {
        $arr = $this->validation_data();
        if ($arr['status'] === true) {
            $id = $this->set_employee($arr);
            $this->show_employee($id);
        } else {
            $this->p['errors'] = $arr['data'];
            $this->add_new_employee();
        }
    }



    // $list_employee = empty($p);
    // $show_employee = isset($p['show_emp']) && is_numeric($p['show_emp']);
    // $edit_employee = isset($p['edit_emp']) && is_numeric($p['edit_emp']);
    // $update_employee = isset($p['update_emp']) && isset($p['id']) && is_numeric($p['id']);
    // $add_new_employee = isset($p['add_emp']);
    // $insert_employee = isset($p['insert_emp']) && $p['insert_emp'] === 'Dodaj';

    // without view

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
