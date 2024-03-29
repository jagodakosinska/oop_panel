<?php

class Api
{


    public function __construct()
    { }

    public function set_userdata($data, $value = null)
    {
        if (is_array($data)) {
            foreach ($data as $key => &$value) {
                $_SESSION[$key] = $value;
            }

            return;
        }

        $_SESSION[$data] = $value;
    }

    public function unset_userdata($key)
    {
        if (is_array($key)) {
            foreach ($key as $k) {
                unset($_SESSION[$k]);
            }

            return;
        }

        unset($_SESSION[$key]);
    }


    public function session_data()
    {
       
        if (!isset($_SESSION['year'])) {
            $this->set_userdata('year', date('Y'));
        }

        if (!isset($_SESSION['month'])) {
            $this->set_userdata('month', date('n'));
        }
        if (!isset($_SESSION['params'])) {
            $arr = [
                'start_year' => date('Y') - 2,
                'end_year' => date('Y') + 1,
                'cost_percent' => 20,
                'tax_rate' => 18,
                'months' => [
                    '1' => 'styczeń',
                    '2' => 'luty',
                    '3' => 'marzec',
                    '4' => 'kwiecień',
                    '5' => 'maj',
                    '6' => 'czerwiec',
                    '7' => 'lipiec',
                    '8' => 'sierpień',
                    '9' => 'wrzesień',
                    '10' => 'październik',
                    '11' => 'listopad',
                    '12' => 'grudzień'
                ]
            ];
            $this->set_userdata('params', $arr);
        }


        $this->data = [
            'year' =>  $_SESSION['year'],
            'month' =>  $_SESSION['month'],
            'params' => $_SESSION['params'],

        ];


        return $this->data;
    }

    function change_year($year)
    {
        if (is_numeric($year)) {
            $this->set_userdata('year',  $year);
        }
    }


    function change_month($month)
    {
        if (is_numeric($month)) {
            $this->set_userdata('month',  $month);
        }
    }
   

    // if (!(isset($this->session->user) && $this->session->user['logged_in'])) {
    //     // redirect('login/login');
    // }



}
