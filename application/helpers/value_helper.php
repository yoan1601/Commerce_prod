<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!function_exists("booleanValue")){
    function booleanValue($bool){
        if($bool===0){
            return "non";
        }
        return "oui";
    }
}