<?php
class Delete extends CI_Controller {
    
    public function __construct(){
            
        parent::__construct();
        $this->load->model(array('delete_data_model', 'get_data_model', 'vat_model'));
        $this->load->helper(array('url_helper', 'url', 'form'));
            
    }

	public function index(){
        
        $id = $this->uri->segment(2);
        
        if($id === NULL){
            show_404();
        }else{
            
            $this->load->library('form_validation');

            $data['visa'] = $this->get_data_model->get_data($id);
            $data['title'] = "Home";
            $data['vat_rate'] = $this->vat_model->get_vat();
            
            $data['title'] = "Delete";

            
            if(!isset($_POST['submit'])){
                
                $this->load->view('templates/header', $data);
                $this->load->view('templates/nav-bar', $data);
                $this->load->view('delete/index', $data);
                $this->load->view('templates/footer', $data); 
                
            }else{
                
                $data['message'] = "You have successfully deleted a record in the database.";
                $data['title'] = "Success!";
                
                $this->delete_data_model->delete_data('prices', 'visa_id', $id);
                $this->delete_data_model->delete_data('visas', 'visa_id', $id);
                
                $this->load->view('templates/header', $data);
                $this->load->view('templates/success', $data);
                $this->load->view('templates/footer', $data);
                
            }
            
        }
	}
}
