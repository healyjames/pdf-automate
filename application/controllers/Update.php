<?php
class Update extends CI_Controller {
    
    public function __construct(){
            
        parent::__construct();
        $this->load->model(array('insert_data_model', 'get_data_model', 'vat_model'));
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
            
            $data['visa'] = $this->get_data_model->get_data($id);
            $data['price_bands'] = $this->get_data_model->get_all_data('price_bands');
            $data['formats'] = $this->get_data_model->get_all_data('formats');
            $data['title'] = "Update Record";
            $data['id'] = $id;
            $data['vat_rate'] = $this->vat_model->get_vat();
            
            $data['load_js'] = array('price-bands.js', 'service_fee_toggle.js', 'checked-value.js', 'additional_fee_vat_calculator.js','calculate-total.js', 'service_fee_vat_calculator.js', 'summary_calculator.js');
        

            $this->form_validation->set_rules('processingtime_tvc', 'Processing time', 'required');
            $this->form_validation->set_rules('embassy_fee', 'Embassy Fee', 'required');
            $this->form_validation->set_rules('service_fee', 'Service Fee', 'required');
        
            if($this->form_validation->run() === FALSE){
            
                $this->load->view('templates/header', $data);
                $this->load->view('templates/nav-bar');
                $this->load->view('update/index', $data);
                $this->load->view('templates/footer');
            
            }else{
                
                $data['message'] = "You have successfully updated a record in the database.";
                $data['title'] = "Success!";
            
                $this->insert_data_model->update_data('visas', $this->insert_data_model->visa_data(), $id);
                $this->insert_data_model->update_data('prices', $this->insert_data_model->price_data($id), $id);
                
                $this->load->view('templates/header', $data);
                $this->load->view('templates/success', $data);
                $this->load->view('templates/footer', $data);
                
                
                
            }
        }
	}
}