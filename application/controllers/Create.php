<?php

class Create extends CI_Controller {
    
    public function __construct(){
            
            parent::__construct();
            $this->load->model('insert_data_model');
            $this->load->helper('url_helper');
            
        }
    
    /**
    
    This functions sets up the form for the 'Create Visa' page.
    It sets out a few form validations rules to ensure the user has inputted all the necassary data
    
    On submit it then navigates to a succes page
    
    */

	public function index(){
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $data['title'] = "Add A New  Visa Price";
        
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('purpose', 'Purpose', 'required');
        $this->form_validation->set_rules('visatype', 'Type of visa', 'required');
        $this->form_validation->set_rules('processingtime', 'Processing time', 'required');
        $this->form_validation->set_rules('embassyfee', 'Embassy Fee', 'required');
        $this->form_validation->set_rules('servicefee', 'Service Fee', 'required');
        
        if ($this->form_validation->run() === FALSE){
            
            $this->load->view('templates/header', $data);
            $this->load->view('create/index', $data);
            $this->load->view('templates/form', $data);
            $this->load->view('templates/footer', $data);
            
        }else {
            
            $data['message'] = "You have successfully added a new record to the database.";
            
            $this->insert_data_model->set_data();
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/success', $data);
            $this->load->view('templates/footer', $data);
            
        }
	} 
}