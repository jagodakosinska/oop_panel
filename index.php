<?php
// declare(strict_types = 1);

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
$contract = new Contract();
$api = new Api();
$displayer = new Displayer();


$p = array_merge($_POST, $_GET);
$api->session_data();


//Include Views
include "views/header.php";
$displayer->load_view($api->data, "views/menu.php");

if(empty($p)) {
    $displayer->load_view(null, "views/home.php");
}

//Employee

$p['errors'] = [];

if(isset($p['show_emp'])) {
    $emp->show_all();
}

if(isset($p['change_year'])){
    $api->change_year($p['change_year']);
}

if(isset($p['change_month'])){
    $api->change_month($p['change_month']);
}

if(isset($p['show_emp']) && is_numeric($p['show_emp'])) {
    $emp->show_employee($p['show_emp']);
}

if(isset($p['add_emp'])) {
    $emp->show_form($p);
}

if(isset($p['insert_emp']) && $p['insert_emp'] === 'Dodaj'){
$emp->create_employee($p);
}

if(isset($p['edit_emp']) && is_numeric($p['edit_emp'])){
    $emp->edit_employee($p);
}

if(isset($p['update_emp']) && isset($p['id']) && is_numeric($p['id'])){
    $emp->set_employee($p);
}


// Contract

if(isset($p['show_contracts'])){
    $contract->show_all();
}

if(isset($p['show_cont_item']) && is_numeric($p['show_cont_item'])){
    $contract->show_contract($p["show_cont_item"]);
}

if(isset($p['add_cont'])){
    $contract->show_form($p);
}


if(isset($p['insert_cont']) && $p['insert_cont'] === 'Dodaj'){
    $contract->create_contract($p);
}

if(isset($p['edit_cont'])){
    $contract->edit_contract($p);
}

if(isset($p['update_cont']) && $p['update_cont'] === 'Edytuj'){
    $contract->set_contract($p);
}


include("views/footer.php");













