<?php

class EmployeeView extends Employee{


    public function showEmployees(){
    $result = $this->get_employees();
    return $result;
    }
}