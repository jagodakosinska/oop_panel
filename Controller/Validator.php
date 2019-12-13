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

        foreach ($arr as $key => $value) {
            $res['data'][] = "`" . $key . "`= '" . $value . "'";
        }
        $res['data'] = join(', ', $res['data']);
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
}
