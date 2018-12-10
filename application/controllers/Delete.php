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
            
            
            $select = "v.visa_id , v.country_id, v.purpose, v.visatype, CONCAT(v.processingtime_tvc, ' ', f1.format_type) AS 'processingtime_tvc', v.processingtime_embassy, CONCAT(v.validity, ' ', f2.format_type) AS 'validity', CONCAT(v.stay, ' ', f3.format_type) AS 'stay', v.entries, v.embassy_fee, v.date_created, v.date_updated, c.country_id, c.country, p.price_id, p.visa_id, p.price_band_id, p.variable_service_fee, p.additional_fee, p.additional_fee_vat, pb.price_band_id, pb.price";
        
            $from = 'visas v';
            $joins = array(array('countries c', 'c.country_id = v.country_id', 'INNER'),
                              array('prices p', 'p.visa_id = v.visa_id', 'INNER'),
                              array('price_bands pb', 'pb.price_band_id = p.price_band_id', 'INNER'),
                              array('formats f1', 'v.processingtime_tvc_format_id = f1.format_id', 'INNER'),
                              array('formats f2', 'v.validity_format_id = f2.format_id', 'INNER'),
                              array('formats f3', 'v.stay_format_id = f3.format_id', 'INNER'));
            
            $where = 'v.visa_id';
            $match = $id;

            $data['visa'] = $this->get_data_model->get_data($select, $from, $joins, $where, $match);
            $data['title'] = "Home";
            $data['vat_rate'] = 1.2;
            
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
