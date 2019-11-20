<?php
declare(strict_types = 1);


include 'config.php';
include 'autoloader.php';


function dump($val){
echo '<pre>';
var_dump($val);
echo '</pre>';
}
//=================  settings ===============

$emp = new Employee();
$cont = new Contract();
$displayer = new Displayer();
$valid = new Validator();

$p = array_merge($_POST, $_GET);

$list_employee = empty($p);
$show_employee = isset($p['show_emp']) && is_numeric($p['show_emp']);
$edit_employee = isset($p['edit_emp']) && is_numeric($p['edit_emp']);
$update_employee = isset($p['update_emp']) && isset($p['id']) && is_numeric($p['id']);
$add_new_employee = isset($p['add_emp']);
$insert_employee = isset($p['insert_emp']) && $p['insert_emp'] === 'Dodaj';

$contract_show_list = isset($p['show_cont_list']);
$contract_show_item = isset($p['show_cont_item']) && is_numeric($p['show_cont_item']);
$p['errors'] = [];

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
    if ($arr['status'] === true) {
        $id = $emp->insert_emp($arr);
        $show_employee = true;
        $p['show_emp'] = $id;
    }else{
        // $p['update_emp'] = $p['id'];
        $p['errors'] = $arr['data'];
        $add_new_employee = true;
    }
 
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
    $data['all_employees'] = $emp->get_all();
    $displayer->load_view($data, $template_name);
} elseif ($show_employee) {
    $template_name = 'views/employee/item.php';
    $id = $p['show_emp'];
    $data['emp'] = $emp->get_by_id($id);
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
    $data['page_title'] = "Dodaj Pracownika";
    $data['emp'] = '';
    $data['submit'] = 'insert_emp';
    $data['value'] = 'Dodaj';
    $data['errors'] = $p['errors'];
    $data['emp'] = isset($p['emp']) && empty($p['emp']) ? $p['emp'] : $data['emp'];
    $displayer->load_view($data, $template_name);
}

if ($contract_show_list) {
    $template_name = 'views/contract/list.php';
    $data['page_title'] = "Lista umów";
    $data['all_contracts'] = $cont->get_all();
    $displayer->load_view($data, $template_name);
} elseif($contract_show_item){
    $template_name = 'views/contract/item.php';
    $id = $p['show_cont_item'];
    $data['cont'] = $cont->get_by_id($id);
    $uid =  $data['cont']['uid'];
    $data['emp'] = $emp->get_by_id($uid);
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
