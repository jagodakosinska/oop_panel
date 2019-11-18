<?php

include 'config.php';
include 'database.php';

include('classes/employee.php');
include('classes/displayer.php');
include('classes/validator.php');


//=================  settings ===============
$database = new Database();
$db = $database->getConnection();

$emp = new Employee($db);
$displayer = new Displayer();
$valid = new Validator();

$p = array_merge($_POST, $_GET);
$p['errors'] = [];
$list_employee = empty($p);
$show_employee = isset($p['show_emp']) && is_numeric($p['show_emp']);
$edit_employee = isset($p['edit_emp']) && is_numeric($p['edit_emp']);
$update_employee = isset($p['update_emp']) && isset($p['id']) && is_numeric($p['id']);
$add_new_employee = isset($p['add_emp']);
$insert_employee = isset($p['insert_emp']) && $p['insert_emp'] === 'Dodaj';
// without view




if ($update_employee) {
    $id = $p['id'];
    $arr = $valid->valid_employee($p['emp']);
    if ($arr['status'] === true) {
        $emp->update_emp($id, $arr['data']);
        $show_employee = true;
    $p['show_emp'] = $p['id'];
    }else{
        $p['edit_emp'] = $p['id'];
        $p['errors'] = $arr['data'];
        $edit_employee = true;
    }
    
} elseif ($insert_employee) {
    $arr = $valid->valid_employee($p['emp']);
    $res = $emp->insert_emp($arr);
    $show_employee = true;
    $p['show_emp'] = $res['id'];
}

// var_dump($_POST);
// var_dump($show_employee);
// die;

// with view
include "views/header.php";
include "views/menu.php";

// ================   Employee 
if ($list_employee) {
    $template_name = 'views/employee/list.php';
    $data['page_title'] = "Lista pracowników";
    $data['all_employee'] = $emp->get_all();
    $displayer->load_view($data, $template_name);
} elseif ($show_employee) {
    $template_name = 'views/employee/item.php';
    $id = $p['show_emp'];
    $data['emp'] = $emp->get_by_id($id);
    $data['emp'] =  $data['emp'][0];
    $displayer->load_view($data, $template_name);
} elseif ($edit_employee) {
    $template_name = 'views/employee/form.php';
    $data['page_title'] = "Edycja Pracownika";
    $id = $p['edit_emp'];
    $data['submit']  = 'update_emp';
    $data['value'] = 'Edytuj';
    $data['errors'] = $p['errors'];
    // $data['emp'] = ;
    $data['emp'] = isset($p['emp']) && empty($p['emp']) ? $p['emp'] :  $emp->get_by_id($id)[0];
    $displayer->load_view($data, $template_name);
} elseif ($add_new_employee) {
    $template_name = 'views/employee/form.php';
    $data['emp'] = '';
    $data['submit'] = 'insert_emp';
    $data['value'] = 'Dodaj';
    $data['page_title'] = "Dodaj Pracownika";
    $displayer->load_view($data, $template_name);
}







include("views/footer.php");
// $test = new Widok();
// echo "\r\n";
// echo $test->languange;

// $test->write_sth(20, "dupa");


// $widoczek = new Widok2();
// echo $widoczek->languange;
// $widoczek->tego_tam_nie_ma();
// $widoczek->cos();
// $widoczek->write_sth(1, "23");

// $var = $widoczek->get_from_db_and_display();
// $widoczek->display_data($var, 'views/employee/list.php');

// $widoczek2 = new Widok2();

// $widoczek2->languange;
