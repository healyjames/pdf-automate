<?php

class Create extends CI_Controller {
    
    public function __construct(){
            
            parent::__construct();
            $this->load->model(array('insert_data_model', 'get_data_model'));
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
        $data['countries'] = $this->get_data_model->get_all_data('countries');
        $data['price_bands'] = $this->get_data_model->get_all_data('price_bands');
        $data['formats'] = $this->get_data_model->get_all_data('formats');
        
        $data['load_js'] = array('price-bands.js','auto-selector.js', 'show-hide.js', 'checked-value.js', 'calculate-vat.js','calculate-total.js');
        
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('purpose', 'Purpose', 'required');
        $this->form_validation->set_rules('visatype', 'Type of visa', 'required');
        $this->form_validation->set_rules('processingtime_tvc', 'Processing time', 'required');
        $this->form_validation->set_rules('embassy_fee', 'Embassy Fee', 'required');
        $this->form_validation->set_rules('additional_fee', 'Additional Fee', 'required');
        
        
        if ($this->form_validation->run() === FALSE){
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/nav-bar');
            $this->load->view('create/index', $data);
            $this->load->view('templates/footer');
            
        }else {
            
            $data['message'] = "You have successfully added a new record to the database.";
            
            $this->insert_data_model->set_data('visas', $this->insert_data_model->visa_data());
            $this->insert_data_model->set_data('prices', $this->insert_data_model->price_data($this->db->insert_id()));
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/success', $data);
            $this->load->view('templates/footer', $data);
            
        }
	} 
}