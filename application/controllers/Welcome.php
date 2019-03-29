<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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

	public function __construct()
		{
			parent::__construct();
			$this->load->model('Welcome_model');
		}

	public function index()
	{
		
		
		$logged=$this->session->userdata('logged_in'); 
	   	$level_id=$this->session->userdata('user_level'); 
		$ss=$this->ck_login->check_login($logged,$level_id);
		if($ss){
			if($ss=='Admin'){
				$data=$this->Welcome_model->count_all_tables();
				$this->load->view('layouts/header');
				$this->load->view('welcome_message',$data);
				$this->load->view('layouts/footer');
			}
			elseif($ss=='User')
	  		{
	  			redirect('');
	  		}
	  		else
	  		{
	  			redirect('signin');
	  		}
		}else{
			redirect('signin');
		}
	}

	public function error_page(){
		$this->load->view('cust_error/error_404');
	}
	
}
