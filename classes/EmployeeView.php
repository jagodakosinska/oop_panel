<?php

class EmployeeView extends Employee{


    public function showEmployees(){
    $result = $this->get_employees();
    echo "First Name:" . $result[0]['fname'];
    }
}