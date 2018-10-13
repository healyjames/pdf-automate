<?php
class Records extends CI_Controller {

        public function __construct(){
            
            parent::__construct();
            $this->load->model('database_model');
            $this->load->helper('url_helper');
            
        }

        public function index(){
            
            $data['price'] = $this->database_model->getRecords();
            $data['title'] = 'The Travel Visa Company Staff - Pricing';
            
            $this->load->view('templates/header', $data);
            $this->load->view('records/index', $data);
            $this->load->view('templates/footer');
            
        }
    
        public function create(){
            
            $this->load->helper('form');
            $this->load->library('form_validation');
            
            $data['title'] = 'Create New Visa Price';
            
            $this->form_validation->set_rules('country', 'Country', 'required');
            $this->form_validation->set_rules('purpose', 'Purpose', 'required');
            $this->form_validation->set_rules('visatype', 'Type of visa', 'required');
            $this->form_validation->set_rules('processing', 'Processing time', 'required');
            $this->form_validation->set_rules('embassyfee', 'Embassy Fee', 'required');
            $this->form_validation->set_rules('servicefee', 'Service Fee', 'required');
            
        if ($this->form_validation->run() === FALSE){
            
            $this->load->view('templates/header', $data);
            $this->load->view('records/create');
            $this->load->view('templates/footer');

        }else{
            
        $this->database_model->setRecords();
        $this->load->view('records/success');
            
            
        }
    }
    
    public function update(){
        
    }
    
    public function delete(){
        
    }
}