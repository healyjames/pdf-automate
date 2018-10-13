<?php
class Database_model extends CI_Model {

    //__construct() forces data to be given to the object at instantiation time
    public function __construct(){
            
        //load the database library
        $this->load->database();
        
        //This will make the database class available through the '$this->db' object
        
    }
    
    public function getRecords(){
        
        //'$this->db->get('visas')' builds a 'SELECT * FROM visas.price;' statement
        $query = $this->db->get('visas');
        
        //return array of results using the statement above
        return $query->result_array();
        
    }
    
    public function insertData(){
        
        $total = $this->input->post('embassyfee') + $this->input->post('servicefee') + $this->input->post('additionalfee');
        
        $data = array(
        'country' => $this->input->post('country'),
        'purpose' => $this->input->post('purpose'),
        'visatype' => $this->input->post('visatype'),
        'processingtime' => $this->input->post('processing'),
        'validity' => $this->input->post('validity'),
        'stay' => $this->input->post('stay'),
        'entries' => $this->input->post('entries'),
        'embassyfee' => $this->input->post('embassyfee'),
        'servicefee' => $this->input->post('servicefee'),
        'additionalfee' => $this->input->post('additionalfee'),
        'total' => $total
    );
        
        return $data;
        
    }
    
    public function setRecords(){
        
        $data = $this->insertData();
        
        return $this->db->insert('visas', $data);
        
    }
    
    public function updateRecords($id){
        
        //upate record
        $data = $this->insertData();
        
        //where id matches
        $this->db->where('visa_id', $id);
        
        return $this->db->update('visas', $data);
        
    }
    
    public function deleteRecords(){
        
    }
    
}

?>