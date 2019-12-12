<?php

class EmployeeView extends Employee
{

    var $displayer;
    var $empContr;

    public function __construct()
    {
        parent::__construct();
        $this->displayer = new Displayer();
        $this->empContr = new EmployeeContr();

    }

    public function displayer($data, $template_name)
    {
        $this->displayer->load_view($data, $template_name);
    }

    public function show_employees()
    {
        $template_name = 'views/employee/list.php';
        $data['page_title'] = "Lista pracowników";
        // $data['all_employees'] = $this->get_employees();
        $data['all_employees'] = $this->empContr->show_employees();
        $this->displayer($data, $template_name);
    }


    public function show_employee($id)
    {
        $template_name = 'views/employee/item.php';
        // $data['emp'] = $this->get_by_id($id);
        $data['emp'] = $this->empContr->show_employee($id);
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
}
