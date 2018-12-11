<?php
class Get_data_model extends CI_Model {

    //__construct() forces data to be given to the object at instantiation time
    public function __construct(){
            
        //load the database library
        $this->load->database();
        
        //This will make the database class available through the '$this->db' object
        
    }
    
    
    
    /**
    
    This functions creates a 'SELECT * FROM ...' query.
    
    It takes a $table variable as a  paramater which is used to populate the FROM section of the SQL query.
    
    It then returns an array of results.
    
    */
    public function get_all_data($table){
        
        $query = $this->db->get($table);
        return $query->result_array();
        
    }
    
    
    /**
    
    This functions is used to extract all of the data associated to a particular visa.
    
    It will creat a 'SELECT * FROM ... WHERE ... = ...' query.
    
    It takes a $visa_id variable as a paramater which is used to populate the WHERE section of the SQL query.
    
    It then returns an array of results.
    
    */
    public function get_data($visa_id = FALSE){
        
        $this->db->from("visas v");
        $this->db->join('countries c', 'c.country_id = v.country_id', 'INNER');
        $this->db->join('prices p', 'p.visa_id = v.visa_id', 'INNER');
        $this->db->join('price_bands pb', 'pb.price_band_id = p.price_band_id', 'INNER');
        $this->db->join('formats f1', 'v.processingtime_tvc_format_id = f1.format_id', 'INNER');
        $this->db->join('formats f2', 'v.processingtime_tvc_format_id = f2.format_id', 'INNER');
        $this->db->join('formats f3', 'v.processingtime_tvc_format_id = f3.format_id', 'INNER');
            
        $this->db->where('v.visa_id', $visa_id);
        
        $query = $this->db->get();
        return $query->row_array();
          
    }
    
    
    
    /**
    
    This functions runs an SQL SELECT statement which finds all of the visa data in the database.
    
    It formats the SELECT statements (e.g. CONCAT(v.processingtime_tvc, ' ', f1.format_type) AS 'processingtime_tvc')
    
    It then returns an array of results.
    
    This function is used for the dashboard - allowing the data to display in a more readable manner.
    
    */
    public function get_all_data_formatted(){
        
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