<?php
class Delete_data_model extends CI_Model{
    
    public function __construct(){
        
        $this->load->database();
        
    }

    
    public function delete_data($table, $target, $id){
        
        $this->db->where($target, $id);
        $this->db->delete($table);
        
    }
    
}


?>