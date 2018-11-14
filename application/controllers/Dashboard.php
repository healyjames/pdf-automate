<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct(){
            
            parent::__construct();
            $this->load->model('get_data_model');
            $this->load->helper('url_helper');
            
        }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->db->order_by("country", "asc");
        
        $data['result'] = $this->get_data_model->get_data();
        $data['title'] = "Home";
        
        $this->load->view('templates/header', $data);
		$this->load->view('dashboard', $data);
        $this->load->view('templates/footer', $data);
	}
}
