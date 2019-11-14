<?php

include 'config.php';
include 'database.php';

include('controllers/employee.php');
include('controllers/displayer.php');



//=================  settings ===============
$database = new Database();
$db = $database->getConnection();

$emp = new Employee($db);
$displayer = new Displayer();


$p = array_merge($_POST, $_GET);

$list_employee = empty($p);
$show_employee = isset($p['show_emp']) && is_numeric($p['show_emp']);
$edit_employee = isset($p['edit_emp']) && is_numeric($p['edit_emp']);
$update_employee = isset($p['update_emp']) && isset($p['id']) && is_numeric($p['id']);
$add_new_employee = isset($p['add_emp']);
// without view


// function check_form($key, $arr) {
//     if(is_array($arr)) {
//         return isset($arr[$key]) ? $arr[$key] : '';
//     }
//     }

if ($update_employee) {
    $id = $p['id'];
    $emp->update_emp($id);
    $show_employee = true;
    $p['show_emp'] = $p['id'];
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
    $data['emp'] = $emp->get_by_id($id);
    $data['emp'] =  $data['emp'][0];
    $displayer->load_view($data, $template_name);
} elseif ($add_new_employee) { 
    $template_name = 'views/employee/form.php';
    $data['emp'] = '';
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
