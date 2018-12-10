<?php
class Insert_data_model extends CI_Model {

    //__construct() forces data to be given to the object at instantiation time
    public function __construct(){
            
        //load the database library
        $this->load->database();
        
        //This will make the database class available through the '$this->db' object
        
    }
    
    /**
    This class takes data from a form and returns a data array
    */
    public function visa_data(){
        
        $data = array(
        'country_id' => $this->input->post('country'),
        'purpose' => $this->input->post('purpose'),
        'visatype' => $this->input->post('visatype'),
        'processingtime_tvc' => $this->input->post('processingtime_tvc'),
        'processingtime_tvc_format_id' => $this->input->post('processingtime_tvc_format'),
        'processingtime_embassy' => $this->input->post('processingtime_embassy'),
        'validity' => $this->input->post('validity'),
        'validity_format_id' => $this->input->post('validity_format'),
        'stay' => $this->input->post('stay'),
        'stay_format_id' => $this->input->post('stay_format'),
        'entries' => $this->input->post('entries'),
        'embassy_fee' => $this->input->post('embassy_fee'),
        'date_updated' => date('Y-m-d H:i:s')
    );
        
        return $data;
        
    }
    
    public function price_data($visa_id){
        
        $data = array(
        'visa_id' => $visa_id,
        'price_band_id' => $this->input->post('band_list'),
        'variable_service_fee' => $this->input->post('service_fee'),
        'additional_fee' => $this->input->post('additional_fee'),
            
        //Because PHP assumes '0' to be NULL we need to check if the vat value is NULL, in which case we change it to a 0 to send to the database
        'additional_fee_vat' =>  (!empty($this->input->post('vat'))) ? $this->input->post('vat') : 0
    );
        
        return $data;
        
    }
    
    
    /**
    This class sets up an update SQL query using the data from the insert_data() function
    */
    public function update_data($table, $data, $id){
            
            $this->db->where('visa_id', $id);
            return $this->db->update($table, $data);
        
    }
    
    
    
    
    
    
    public function set_data($table, $data){
        
        return $this->db->insert($table, $data);
        
    }
    
    
    
    
    
    
    
    
    
}

?>