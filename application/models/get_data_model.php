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
    It accepts a paramater $id which can be used to search for a specific record in the database
    
    */
    
    public function get_data($id = FALSE){
        
        if($id === FALSE){
            
            $query = $this->db->get('visas');
        
            return $query->result_array();
            
        }else{
        
        $query = $this->db->get_where('visas', array('visa_id' => $id));
        return $query->row_array();
        }
        
    }
    
}

?>