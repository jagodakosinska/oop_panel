<?php
class Validator
{



    function valid_employee()
    {
      
        $err = [];
        // $format = 'Y-m-d';
        $fname = trim($_POST['fname']);
        if(empty($fname)) $err[] = 'Imię nie może być puste';
        $lname = trim($_POST['lname']);
        if(empty($lname)) $err[] = 'Nazwisko nie może być puste';
        $birth_place = trim($_POST['birth_place']);
        if(empty($birth_place)) $err[] = 'Miejsce urodzenia nie może być puste';
        $birth_date = $this->valid_date($_POST['birth_date']);
        if(empty($birth_date)) $err[] = 'Data urodzenia nie może być pusta';
       // $birth_date = $this->validat_date($birth_date, $format) ? $birth_date : '';
        $city = trim($_POST['city']);
        if(empty($city)) $err[] = 'Miasto nie może być puste';
        $street = trim($_POST['street']);
        if(empty($street)) $err[] = 'Ulica nie może być pusta';
        $street_nr = trim($_POST['street_nr']);
        if(empty($street_nr)) $err[] = 'Numer domu nie może być pusty';
        $home_nr = trim($_POST['home_nr']);
        $zip = trim($_POST['zip']);
        if(empty($zip)) $err[] = 'Kod pocztowy nie może być pusty';

        if(count($err) !== 0){
            $res = ['status' => false, 'data' => $err];
        } else {
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
            $res = ['status', 'data'];
            $res['status'] = true;
            foreach($arr as $key => $value){
                $res ['data'] = "`" . $key . "`= '" . $value . "'";
            }
            $res['data'] = join(', ', $res['data']);

            
        }
        
        // var_dump($res);
        // die;
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
