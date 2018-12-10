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
            
            $v_select =
                "v.visa_id , v.country_id, c.country, v.purpose,
                v.visatype, v.processingtime_tvc,
                f1.format_id AS 'processingtime_tvc_format_id',
                f1.format_type AS 'processingtime_tvc_format',
                v.processingtime_embassy, v.validity,
                f2.format_id AS 'validity_format_id',
                f2.format_type AS 'validity_format',
                v.stay, f3.format_id AS 'stay_format_id',
                f3.format_type AS 'stay_format', v.entries,
                v.embassy_fee, v.date_created, v.date_updated,
                c.country_id, c.country, p.price_id, p.visa_id,
                p.price_band_id, p.variable_service_fee,
                p.additional_fee, p.additional_fee_vat,
                pb.price_band_id, pb.price";
        
            $v_from = 'visas v';
            $v_joins =
                array(array('countries c', 'c.country_id = v.country_id', 'INNER'),
                array('prices p', 'p.visa_id = v.visa_id', 'INNER'),
                array('price_bands pb', 'pb.price_band_id = p.price_band_id', 'INNER'),
                array('formats f1', 'v.processingtime_tvc_format_id = f1.format_id', 'INNER'),
                array('formats f2', 'v.validity_format_id = f2.format_id', 'INNER'),
                array('formats f3', 'v.stay_format_id = f3.format_id', 'INNER'));

            $v_where = 'v.visa_id';
            $v_match = $id;
            
            
            
            
            $data['visa'] = $this->get_data_model->get_data($v_select, $v_from, $v_joins, $v_where, $v_match);
            $data['price_bands'] = $this->get_data_model->get_data('*', 'price_bands');
            $data['formats'] = $this->get_data_model->get_data('*', 'formats');
            $data['title'] = "Update Record";
            $data['id'] = $id;
            $data['vat_rate'] = 1.2;
        

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