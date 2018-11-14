<?php
class Insert_data_model extends CI_Model {

    //__construct() forces data to be given to the object at instantiation time
    public function __construct(){
            
        //load the database library
        $this->load->database();
        
        //This will make the database class available through the '$this->db' object
        
    }
    
    public function setup_data_format(){
        
        $validity_format = NULL;
        $stay_format = NULL;
        
        $total = $this->input->post('embassyfee') + $this->input->post('servicefee') + $this->input->post('additionalfee');
        
        if(isset($_POST['validity-format'])){
            $validity_format = $_POST['validity-format'];
        }
        if(isset($_POST['stay-format'])){
            $stay_format = $_POST['stay-format'];
        }
        
        return array("total" => $total, "validity_format" => $validity_format, "stay_format" => $stay_format);
        
    }
    
    public function insert_data(){
        
        $format = $this->setup_data_format();
        
        $data = array(
        'country' => $this->input->post('country'),
        'purpose' => $this->input->post('purpose'),
        'visatype' => $this->input->post('visatype'),
        'processingtime' => $this->input->post('processingtime') . " Days",
        'validity' => $this->input->post('validity') . " " . $format['validity_format'],
        'stay' => $this->input->post('stay') . " " . $format['stay_format'],
        'entries' => $this->input->post('entries'),
        'embassyfee' => $this->input->post('embassyfee'),
        'servicefee' => $this->input->post('servicefee'),
        'additionalfee' => $this->input->post('additionalfee'),
        'total' => $format['total'],
        'date_updated' => date('Y-m-d H:i:s')
    );
        
        return $data;
        
    }
    
    public function set_data(){
        
        $data = $this->insert_data();
        
        return $this->db->insert('visas', $data);
        
    }
    
    public function update_data($id){
            
            $data = $this->insert_data();
        
            $this->db->where('visa_id', $id);
            return $this->db->update('visas', $data);
    }
}

?>