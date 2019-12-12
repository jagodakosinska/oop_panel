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


}
