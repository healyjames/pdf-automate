<?php
class Get_data_model extends CI_Model {

    //__construct() forces data to be given to the object at instantiation time
    public function __construct(){
            
        //load the database library
        $this->load->database();
        
        //This will make the database class available through the '$this->db' object
        
    }
    
    /**
    
    This function connects to the database and retrieves a set of results
    
    It accepts a paramater $table to search through a specific table, a $select which can be used to pass through a certain SQL SELECT statement and a $visa_id which can be used to search for a specific record in the table.
    
    If an ID has been passed to this function, the SELECT statement will change because we don't want to CONCAT() any results are calculate any prices.
    
    */
    
    
    public function get_data($table){
        
        $this->db->select('*');
        $query = $this->db->get($table);
        
        if($joins === FALSE && $where === FALSE && $match === FALSE){
            
            $this->db->select($select);
            $this->db->from($from);
            
            $query = $this->db->get();
            return $query->result_array();
            
            
            
            
        }else if($joins != FALSE && $where === FALSE  && $match === FALSE) {
            
            $this->db->select($select);
            $this->db->from($from);
            
            foreach($joins as $join){
                $this->db->join($join[0], $join[1], $join[2]);
            }
            
            $query = $this->db->get();
            return $query->result_array();
            
            
            
            
        }else{
            
            $this->db->select($select);
            $this->db->from($from);
            
            foreach($joins as $join){
                $this->db->join($join[0], $join[1], $join[2]);
            }
            
            $this->db->where($where, $match);
            
            $query = $this->db->get();
            return $query->row_array();
            
        }
    }
    
    public function get_formatted_data(){
        
        $this->db->select("v.visa_id , v.country_id, v.purpose, v.visatype, CONCAT(v.processingtime_tvc, ' ', f1.format_type) AS 'processingtime_tvc', v.processingtime_embassy, CONCAT(v.validity, ' ', f2.format_type) AS 'validity', CONCAT(v.stay, ' ', f3.format_type) AS 'stay', v.entries, v.embassy_fee, v.date_created, v.date_updated, c.country_id, c.country, p.price_id, p.visa_id, p.price_band_id, p.variable_service_fee, p.additional_fee, p.additional_fee_vat, pb.price_band_id, pb.price");
        
        $this->db->from("visas v");
        
        $this->db->join('countries c', 'c.country_id = v.country_id', 'INNER');
        $this->db->join('prices p', 'p.visa_id = v.visa_id', 'INNER');
        $this->db->join('price_bands pb', 'pb.price_band_id = p.price_band_id', 'INNER');
        $this->db->join('formats f1', 'v.processingtime_tvc_format_id = f1.format_id', 'INNER');
        $this->db->join('formats f2', 'v.processingtime_tvc_format_id = f2.format_id', 'INNER');
        $this->db->join('formats f3', 'v.processingtime_tvc_format_id = f3.format_id', 'INNER');
        
        $query = $this->db->get();
        return $query->result_array();
        
    }
    
}

?>