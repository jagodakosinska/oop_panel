<?php

class Displayer{
    public function __construct()
    {
    }
    

    public function load_view($data, $template_name) {
        
        include($template_name);
        
    }

    function check_form($key, $arr) {
        if(is_array($arr)) {
            return isset($arr[$key]) ? $arr[$key] : '';
        
        } elseif(is_object($arr)) {
            return isset($arr->{$key}) ? $arr->{$key} : '';
        }
    }
}