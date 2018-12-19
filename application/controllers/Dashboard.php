<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct(){
            
            parent::__construct();
            $this->load->model(array('get_data_model', 'vat_model'));
            $this->load->helper('url_helper');
            
        }

	/**
	 
     Index Page for this controller.
     
     The select statement sets up all of the data to be retrieved from the database using aliases. It also uses the CONCAT() function in MySQL so that we can pair a result with its length of time e.g. '1' 'Day' or '3' 'Months'.
     
	 */
    
	public function index(){
        
        $this->db->order_by("country", "asc");
        
        $data['visas'] = $this->get_data_model->get_all_data_formatted();
        $data['title'] = "Home";
        $data['vat_rate'] = $this->vat_model->get_vat();
        
        
        
        $data['load_js'] = array('search-table.js','total-items.js','calculate-total-dashboard');
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav-bar', $data);
		$this->load->view('dashboard', $data);
        $this->load->view('templates/footer', $data);
        
        
        
	}
}
