<?php
class Validator
{


    function valid_employee($emp)
    {
        $err = [];
        // $format = 'Y-m-d';
        $fname = trim($emp['fname']);
        if (empty($fname)) $err[] = 'Imię nie może być puste';
        $lname = trim($emp['lname']);
        if (empty($lname)) $err[] = 'Nazwisko nie może być puste';
        $birth_place = trim($emp['birth_place']);
        if (empty($birth_place)) $err[] = 'Miejsce urodzenia nie może być puste';
        $birth_date = $this->valid_date($emp['birth_date']);
        if (empty($birth_date)) $err[] = 'Data urodzenia nie może być pusta';
        // $birth_date = $this->validat_date($birth_date, $format) ? $birth_date : '';
        $city = trim($emp['city']);
        if (empty($city)) $err[] = 'Miasto nie może być puste';
        $street = trim($emp['street']);
        $street_nr = trim($emp['street_nr']);
        if (empty($street_nr)) $err[] = 'Numer domu nie może być pusty';
        $home_nr = trim($emp['home_nr']);
        $zip = trim($emp['zip']);
        if (empty($zip)) $err[] = 'Kod pocztowy nie może być pusty';
        $cost_pcent = trim($emp['cost_pcent']);
        if (empty($cost_pcent)) $err[] = 'Proszę wybrać koszty';
        $bank_transfer = trim($emp['bank_transfer']);
        if (!isset($bank_transfer)) $err[] = 'Proszę wybrać formę zapłaty';
        $task_contract = trim($emp['task_contract']);
        if (empty($task_contract)) $err[] = 'Proszę wybrać rodzaj umowy';
        $res = [];
        $res['status'] = true;
        $res['data'] = [];
        if (count($err)) {
            $res['status'] = false;
            $res['data'] = $err;
            return $res;
        }
        $arr = [
            'fname' => $fname,
            'lname' => $lname,
            'birth_place' => $birth_place,
            'birth_date' => $birth_date,
            'city' => $city,
            'street' => $street,
            'street_nr' => $street_nr,
            'home_nr' => $home_nr,
            'zip' => $zip,
            'cost_pcent' => $cost_pcent,
            'bank_transfer' => $bank_transfer,
            'task_contract' => $task_contract,

        ];

        foreach ($arr as $key => $value) {
            $res['data'][] = "`" . $key . "`= '" . $value . "'";
        }
        $res['data'] = join(', ', $res['data']);
        return $res;
    }


    public function valid_contract($cont)
    {
        $err = [];
        // $format = 'Y-m-d';
        $bdate = trim($cont['bdate']);
        if (empty($bdate)) $err[] = 'Data rozpoczęcia nie może być pusta';
        $edate = trim($cont['edate']);
        if (empty($edate)) $err[] = 'Data zakończenia nie może być pusta';
        $title = trim($cont['title']);
        if (empty($title)) $err[] = 'Tytuł nie może być pusty';
        $uid = trim($cont['uid']);
        if (empty($uid)) $err[] = 'Nie ma takiego pracownika';
        $task = trim($cont['task']);
        if (empty($task)) $err[] = 'Nie wybrano rodzaju umowy';

        $res = [];
        $res['status'] = true;
        $res['data'] = [];
        if (count($err)) {
            $res['status'] = false;
            $res['data'] = $err;
            return $res;
        }
        $arr = [
            'bdate' => $bdate,
            'edate' => $edate,
            'title' => $title,
            'uid' => $uid
        ];

        $res['data'] = $arr;
        $res['task'] = $task;
        return $res;
    }



    function valid_date($date)
    {
        $date = trim($date);
        $format = 'Y-m-d';
        $res = date($format, strtotime($date));
        return $res;
        // $d = DateTime::createFromFormat($format, $date);
        // return $d && $d->format($format) === $date;
    }


    function valid_bill($bill)
    {


        $err = [];
        // $format = 'Y-m-d';
        $bill_date = trim($bill['bill_date']);
        if (empty($bill_date)) $err[] = 'Data nie może być pusta';
        $netto = trim($bill['netto']);
        if (empty($netto)) $err[] = 'Kwota netto nie może być pusta';
        $cont_id = trim($bill['cont_id']);
        if (empty($cont_id)) $err[] = 'Nie ma takiego pracownika';
        $cost_pcent = trim($bill['cost_pcent']);
        $bank_transfer = trim($bill['bank_transfer']);


        $res = [];
        $res['status'] = true;
        $res['data'] = [];
        if (count($err)) {
            $res['status'] = false;
            $res['data'] = $err;
            return $res;
        }
        $arr = [
            'bill_date' => $bill_date,
            'netto' => $netto,
            'cost_pcent' => $cost_pcent,
            'bank_transfer' => $bank_transfer,
        ];

        $res['data'] = $arr;
        $res['cont_id'] = $cont_id;
        return $res;
    }
}
