<?php
class Delete_data_model extends CI_Model{
    
    public function __construct(){
        
        $this->load->database();
        
    }

    
    public function delete_data($id){
        
        $this->db->where('visa_id', $id);
        $this->db->delete('visas');
        
    }
    
}


?>