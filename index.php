<?php
// declare(strict_types = 1);

include 'config.php';
include 'database.php';
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
$bill = new Bill();
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

$p['errors'] = [];

if(isset($p['change_year'])){
    $api->change_year($p['change_year']);
}

if(isset($p['change_month'])){
    $api->change_month($p['change_month']);
}

//Employee


if(isset($p['show_emp'])) {
    $emp->show_employees();
}
if(isset($p['show_emp']) && is_numeric($p['show_emp'])) {
    $emp->show_employee($p['show_emp']);
}

if(isset($p['add_emp'])) {
    $emp->add_employee($p);
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
    $contract->add_contract($p);
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

//Bill

if(isset($p['show_bills'])){
    $bill->show_bills();
}

if(isset($p['show_bill_item']) && is_numeric($p['show_bill_item'])) {
    $bill->show_bill($p['show_bill_item']);
}

if(isset($p['add_bill'])){
    $bill->add_bill($p);
}

if(isset($p['insert_bill']) && $p['insert_bill'] === 'Dodaj'){
    $bill->create_bill($p);
}

if(isset($p['delete_bill']) && is_numeric($p['delete_bill'])){
    $bill->delete_bill($p['delete_bill']);
}

include("views/footer.php");
