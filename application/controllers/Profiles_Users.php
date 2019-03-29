
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profiles_Users extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->model('User_model');
			$this->load->library("pagination");
			$this->load->library("Pdf");
			$logged=$this->session->userdata('logged_in'); 
		    if(!$logged){
		    	redirect('signin');
		    }
		}

	public function index()
	{	
		
		$id=$this->session->userdata('user_id'); 
		$data['posts'] = $this->User_model->get_user();
		if(!$data){
			//show_404();
		}
		
	    $this->load->view('user_layouts/header');
		$this->load->view('profile/my_account',$data);
		$this->load->view('user_layouts/footer');
	}



	public function edit_account()
	{
			
		$data['posts'] = $this->User_model->get_user();
		if(!$data){
			show_404();
		}
	    $this->load->view('user_layouts/header');
		$this->load->view('profile/edit_user',$data);
		$this->load->view('user_layouts/footer');
	}

	public function edit_password()
	{
	    $this->load->view('user_layouts/header');
		$this->load->view('profile/edit_pwd');
		$this->load->view('user_layouts/footer');
	}
	
	public function update_account()
	{
		$this->form_validation->set_message('valid_ip', 'The %s is wrong');
		$this->form_validation->set_rules('name','User Name','required');
	
		if($this->form_validation->run() === FALSE){
			$data['posts'] = $this->User_model->get_user();
			if(!$data){
				show_404();
			}
		    $this->load->view('user_layouts/header');
			$this->load->view('profile/edit_user',$data);
			$this->load->view('user_layouts/footer');
		}else{
					$id=$this->session->userdata('user_id');
					$config['upload_path']='./assets/images/users/';
					$config['allowed_types']='jpg|png|jepg';
					$config['file_name'] = $id;
					$config['max_size']='4096';
					$config['max_width']='1000';
					$config['max_height']='1000';
					$config['overwrite'] = TRUE;
					$this->load->library('upload', $config);
					if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
					if(!$this->upload->do_upload()){
					}else{
						$data= array('upload_data' => $this->upload->data());
						$post_image=$_FILES['userfile']['name'];
					}

			$data['posts'] = $this->User_model->update_User();
			if(!$data){
				show_404();
			}
	    redirect('profile');
		}
	}

	public function update_password()
	{
		$this->form_validation->set_message('valid_ip', 'The %s is wrong');
		$this->form_validation->set_rules('opwd','Old Password','required');
		$this->form_validation->set_rules('pwd','Password','required|min_length[8]');
		$this->form_validation->set_rules('cpwd','Confirm Password','required|matches[pwd]');

		$data['posts'] = $this->User_model->get_user();
		if($_POST['opwd']!=''&&$data['posts'][0]->password!=md5($_POST['opwd'])){
			$this->form_validation->set_rules('vpwd','Old Password','valid_ip');
		}
		
		if($this->form_validation->run() === FALSE){
			$data['posts'] = $this->Profile_model->get_user();
			if(!$data){
				show_404();
			}
		    $this->load->view('user_layouts/header');
			$this->load->view('profile/edit_pwd',$data);
			$this->load->view('user_layouts/footer');
		}else{
			$data['posts'] = $this->User_model->update_pwd();
			if(!$data){
				show_404();
			}
	    	redirect('account');
		}
	}

}
