<?php

class Pdf
{
    var $empM;
    var $billM;
    var $contractM;
    var $displayer;


    public function __construct()
    {
   
        $this->empM = new Employee_M();
        $this->billM = new Bill_M();
        $this->contractM = new Contract_M();
        $this->displayer = new Displayer();
       
    }

        
    function show_contract_pdf($id)
    {
        $data['contract'] = $this->contractM->get_by_id($id);
        $uid = $data['contract']->uid;
        $data['employee'] = $this->empM->get_by_id($uid);
        $template_name = 'views/contract/pdf_contract.php';
        $this->displayer->load_view($data, $template_name);
        exit;
    }

    function display_contract_pdf($id)
    {
        $pdf = $this->contractM->get_by_id($id);
        $filename = str_replace('/', '_', $pdf['full_number']);
        header('Content-Type: application/pdf');
        header("Content-Disposition: attachment; filename='{$filename}.pdf'");
        echo $pdf['pdf'];
        exit();
    }
    
    function show_bill_pdf($id)
    {
        $data['bill'] = $this->billM->get_by_id($id);
        $data['contract'] = $this->billM->show_by_bill_id($id);
        $uid = $data['contract']->uid;
        $data['employee'] = $this->empM->get_by_id($uid);
        $template_name = 'views/bill/pdf_bill.php';;
        $this->displayer->load_view($data, $template_name);
      exit;
    }

    function display_bill_pdf($id)
    {
        $pdf = $this->billM->get_by_id($id);
        $filename = str_replace('/', '_', $pdf['full_number']);
        header('Content-Type: application/pdf');
        header("Content-Disposition: attachment; filename='{$filename}.pdf'");
        echo $pdf['pdf'];
        exit();
    }


}
