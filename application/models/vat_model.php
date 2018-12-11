<?php

class Vat_model extends CI_Model {
    
    public function __construct(){
        
    }
    
    public function calculate_vat($price, $vat_rate){
        
        $price_excluding_vat = $price / ($vat_rate + 1);
        
        $vat = $price_excluding_vat - $vat;
        
        return $value;
        
    }
    
    public function get_vat(){
        
        $vat_percentage = 20; //percentage value
            
        $vat_decimal = $vat_percentage / 100; //convert to decimal
        
        return $vat_decimal;
        
    }
}

?>