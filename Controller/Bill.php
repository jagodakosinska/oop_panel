<?php

class Bill extends Bill_M
{
    var $empM;
    var $contractM;
    var $contract;
    var $valid;
    var $displayer;


    public function __construct()
    {
        parent::__construct();
        $this->contract = new Contract();
        $this->empM = new Employee_M();
        $this->contractM = new Contract_M();
        $this->displayer = new Displayer();
        $this->valid = new Validator();
    }

    public function validation_data($arr)
    {

        $res = $this->valid->valid_contract($arr);
        return $res;
    }


    public function displayer($data, $template_name)
    {
        $this->displayer->load_view($data, $template_name);
    }


    public function show_bills()
    {
        $template_name = 'views/bill/list.php';
        $data['page_title'] = "Lista rachunków";
        $data['all_bills'] = $this->get_all();
        $this->displayer($data, $template_name);
    }

    function show_bill($id){
        $template_name = 'views/bill/item.php';
        $data['bill'] = $this->get_by_id($id);
        $data['contract'] = $this->show_by_bill_id($id);
        $uid = $data['contract']['uid'];
        $data['employee'] = $this->empM->get_by_id($uid);
        $this->displayer($data, $template_name);
    }

    // function add_new($uid, $bank_transfer, $cost_pcent)
    // {
    //     $data = $this->data;
    //     $data['form_data'] = $this->input->post('bill');
    //     $data['uid'] = $uid;
    //     $data['cost_pcent'] = $cost_pcent;
    //     $data['bank_transfer'] = $bank_transfer;
    //     $this->load_views($data, 'form');
    // }

    // function insert()
    // {
    //     $data = $this->data;
    //     $data['form_data'] = $this->input->post('bill');
    //     $data['uid'] =  $this->input->post('bill[uid]');
    //     $data['cost_pcent'] =  $this->input->post('bill[cost_pcent]');
    //     $data['bank_transfer'] =  $this->input->post('bill[bank_transfer]');

    //     if ($this->input->post('add_bill')) {
    //         $arr = $this->Bill_M->valid_data();
    //         if (!is_null($arr)) {
    //             $id = $this->Bill_M->insert($arr);
    //             $this->Contract_M->update_contract_bill($id, $data['uid']);
    //             $this->Bill_M->update_bill_number($id);
    //             $this->create_pdf($id);
    //             $this->session->set_flashdata('info', 'Utworzono nowy rachunek');
    //             redirect('home');
    //         }
    //         $this->session->set_flashdata('error', "Nie udało się dodać rachunku!");
    //     }
    //     $this->load_views($data, 'form');
    // }
    // function create_pdf($id)
    // {
    //     $this->Bill_M->update_bill_pdf($id);
    // }


    function delete_bill($id){
        $res = $this->delete($id);
        $this->contract->show_contract($res);
    }
}