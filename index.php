<?php
declare(strict_types = 1);

include 'config.php';
include 'autoloader.php';

//Supporting functions
function dump($val){
echo '<pre>';
var_dump($val);
echo '</pre>';
}


// Create New Instance
$emp = new Employee();
$contr = new Contract();



$p = array_merge($_POST, $_GET);

//Include Views
include "views/header.php";
include "views/menu.php";



if(empty($p)) {
    $emp->show_all();
}


$p['errors'] = [];

if(isset($p['show_emp']) && is_numeric($p['show_emp'])) {
    $emp->show_employee($p['show_emp']);
}

if(isset($p['add_emp'])) {
    $emp->show_form($p);
}

if(isset($p['insert_emp']) && $p['insert_emp'] === 'Dodaj'){
    // dump($p['emp']);
$emp->create_employee($p);
}

if(isset($p['edit_emp']) && is_numeric($p['edit_emp'])){
    $emp->edit_employee($p);
}

if(isset($p['update_emp']) && isset($p['id']) && is_numeric($p['id'])){
    $emp->set_employee($p);
}
if(isset($p['show_contracts'])){
    $contr->show_all();
}

if(isset($p['show_cont_item']) && is_numeric($p['show_cont_item'])){
    $contr->show_contract($p["show_cont_item"]);
}

include("views/footer.php");













