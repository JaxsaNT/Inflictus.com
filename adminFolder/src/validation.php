<?php
namespace Normann;
class validation {
   
    private $error = array();
    
    public function integer($number, $min, $max) {
        if(!filter_var($number, FILTER_VALIDATE_INT)){
            $this->error[] = "$number, isn't a valid number";
        }
        else if($number > $max || $number < $min){
            $this->error[] = "The number must be between $min and $max";
        }
    }
    
    public function isInteger($number) {
        if(!is_numeric($number)){
            $this->error[] = "$number, isn't a number";
        }
    }
    
    public function decimal($number){
        if(!filter_var($number,FILTER_VALIDATE_FLOAT)){
            $this->error[] = "$number, isn't a decimal";
        }
    }
    
    public function string_length($string, $min, $max){
        if(strlen($string) >= $max){
            $this->error[] = "Too many characters, $max is the maximum amount";
        }
        if(strlen($string) <= $min){
            $this->error[] = "Not enough characters, $min is the minimum amount";
        }
    }
    
    public function email($email){
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $this->error[] = "$email, isn't a valid email!";
        }
    }
    
    public function password_checker($password, $passwordrepeat){
        if($password != $passwordrepeat){ 
            $this->error[] = "The password doesn't match"; 
        } 
    }
    
    public function check_empty($data, $fields)
    {
        foreach ($fields as $value) {
            if (empty($data[$value])) {
                $this->error[] = "$value field empty";
            }
        } 
    }
    
    
    public function error(){
        if(!empty($this->error)){
            return $this->error;
        }
    }
}
