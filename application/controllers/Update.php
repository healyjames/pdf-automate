<?php
class Update extends CI_Controller {
    
    public function __construct(){
            
        parent::__construct();
        $this->load->model(array('insert_data_model', 'get_data_model'));
        $this->load->helper(array('url_helper', 'url'));
            
    }

    /**
    
    This functions runs the get_params() method
    If there are no paramaters, it displays the 404 page (users should not be able to access /update but only access /update?visa_id=)
    
    */
	public function index(){
        
        $id = $this->uri->segment(2);
        
        if($id === NULL){
            show_404();
        }else{
        
            $this->load->helper('form');
            $this->load->library('form_validation');
        
            $data['title'] = "Add A New  Visa Price";
            $data['result'] = $this->get_data_model->get_data($id);
        
            $this->form_validation->set_rules('country', 'Country', 'required');
            $this->form_validation->set_rules('purpose', 'Purpose', 'required');
            $this->form_validation->set_rules('visatype', 'Type of visa', 'required');
            $this->form_validation->set_rules('processingtime', 'Processing time', 'required');
            $this->form_validation->set_rules('embassyfee', 'Embassy Fee', 'required');
            $this->form_validation->set_rules('servicefee', 'Service Fee', 'required');
        
            if($this->form_validation->run() === FALSE){
            
                $this->load->view('templates/header', $data);
                $this->load->view('update/index', $data);
                $this->load->view('templates/footer', $data);
            
            }else{
                
                $data['message'] = "You have successfully updated a record in the database.";
                $data['title'] = "Success!";
            
                $this->insert_data_model->update_data($id);
                
                $this->load->view('templates/header', $data);
                $this->load->view('templates/success', $data);
                $this->load->view('templates/footer', $data);
                
                
                
            }
        }
	}
}