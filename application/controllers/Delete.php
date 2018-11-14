<?php
class Delete extends CI_Controller {
    
    public function __construct(){
            
        parent::__construct();
        $this->load->model(array('delete_data_model', 'get_data_model'));
        $this->load->helper(array('url_helper', 'url', 'form'));
            
    }

	public function index(){
        
        $id = $this->uri->segment(2);
        
        if($id === NULL){
            show_404();
        }else{
            
            $this->load->library('form_validation');
            
            $data['title'] = "Delete";
            $data['result'] = $this->get_data_model->get_data($id);
            
            if(!isset($_POST['submit'])){
                
                $this->load->view('templates/header', $data);
                $this->load->view('delete/index', $data);
                $this->load->view('templates/footer', $data); 
                
            }else{
                
                $data['message'] = "You have successfully deleted a record in the database.";
                $data['title'] = "Success!";
                
                $this->delete_data_model->delete_data($id);
                
                $this->load->view('templates/header', $data);
                $this->load->view('templates/success', $data);
                $this->load->view('templates/footer', $data);
                
            }
            
        }
	}
}
