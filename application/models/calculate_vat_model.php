<?php

class Calculate_vat_model extends CI_Model {
    
    public function __construct(){
        
    }
    
    public function calculate($target, $vat_rate){
        
        $value = $target * $vat_rate;
        
        return $value;
        
    }
}

?>