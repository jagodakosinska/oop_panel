<?php

class EmployeeContr extends Employee
{

    var $empView;
    var $valid;
  
    

    public function __construct()
    {
        parent::__construct();
        $this->empView = new EmployeeView();
        $this->valid = new Validator();
    }

    public function validation_data($arr)
    {

        $res = $this->valid->valid_employee($arr);
        return $res;
    }


    public function create_employee($arr)
    {
        // dump($arr);
        $res = $this->validation_data($arr['emp']);
        
        if ($res['status'] === true) {
            $id = $this->set_employee($res);
            $this->empView->show_employee($id);
        } else {
            $arr['errors'] = $res['data'];
            
            $this->empView->show_form($arr);
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
