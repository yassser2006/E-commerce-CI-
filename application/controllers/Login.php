
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->model('Login_model');
			$this->load->library('Uuid');
			$this->load->database();
		}

		public function index()
		{
			$logged=$this->session->userdata('logged_in'); 
			$level_id=$this->session->userdata('user_level'); 
			$ss=$this->ck_login->check_login($logged,$level_id);
			if($ss=='Admin')
			{
				redirect('home');
	  		}
	  		elseif($ss=='User')
	  		{
	  			redirect('');
	  		}else
	  		{
				$this->load->view('login/login.php');
			}
			
		}

		public function log_in()
		{
			$logged=$this->session->userdata('logged_in'); 
			$level_id=$this->session->userdata('user_level'); 
			$ss=$this->ck_login->check_login($logged,$level_id);
			if(!$ss)
			{
				$this->form_validation->set_rules('email','E-mail','required|valid_email');
				$this->form_validation->set_rules('inputPassword','Password','required|min_length[8]|max_length[200]');
				if($this->form_validation->run() === FALSE){
					$this->load->view('login/login.php');
				//	redirect('signin');
				}else{
					//get the username data 
					$email=$_POST['email'];
					//get and encrypt the password
					$pw=md5($_POST['inputPassword']);
					//get the luser id
					$data=$this->Login_model->login($email,$pw);
					if($data){
						$status=$data->row(0)->status;
						if($status=='1'){$status='Ok';}
						if($status=='0'){$status='Waiting Verification';
							$this->session->set_flashdata('verify','Waiting Verify');
							//die(($this->session->flashdata('verify')));
						}
						if($status=='-1'){$status='reject';
							$this->session->set_flashdata('rejected','Your account is Rejected');
							redirect('signin');
							return true;
						}
						$id=$data->row(0)->idUser;
						$subscribes = $this->Login_model->get_subscribes($id);
						$notification = $this->Login_model->count_notification($subscribes,$id);
						//die(print_r($notification));
						$user_data= array(
							'user_id' => $data->row(0)->idUser,
							'user_name' =>$data->row(0)->name,
							'user_level' =>$data->row(0)->level,
							'status' =>$status,
							'email' =>$email,
							'notification' =>$notification['notifications'],
							'logged_in'=>true
						);
						$this->session->set_userdata($user_data);
						//set message for logged in
						$this->session->set_flashdata('user_loggedin','You are logged in');
						redirect('home');
					}else{
						$this->session->set_flashdata('login_failed','Check Your E-mail and Password');
						redirect('signin');
					}
					

				}
			}
			else
			{
				redirect('');
			}
		}

		public function log_out(){
			//unset user data
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('user_name');
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('notification');
			$this->session->unset_userdata('status');
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_level');
			$this->session->set_flashdata('user_logged_out','Logged Out');
			redirect('');
		}

		public function signup(){
			$logged=$this->session->userdata('logged_in'); 
			$level_id=$this->session->userdata('user_level'); 
			$ss=$this->ck_login->check_login($logged,$level_id);
			if($ss=='Admin')
			{
				redirect('home');
	  		}
	  		elseif($ss=='User')
	  		{
	  			redirect('');
	  		}else
	  		{
				$this->load->view('user_layouts/header');
				$this->load->view('profile/new_user');
				$this->load->view('user_layouts/footer');
			}
		}

		public function creat_user(){
			$logged=$this->session->userdata('logged_in'); 
			$level_id=$this->session->userdata('user_level'); 
			$ss=$this->ck_login->check_login($logged,$level_id);
			if($ss=='Admin')
			{
				redirect('home');
	  		}
	  		elseif($ss=='User')
	  		{
	  			redirect('');
	  		}else
	  		{

				$id = $this->uuid->v4();
      			$id = str_replace('-', '', $id);
      			$this->form_validation->set_message('valid_ip', 'The %s is already exist');
				$this->form_validation->set_rules('name','User Name','required');
				$this->form_validation->set_rules('email','E-mail','required|valid_email');
				$this->form_validation->set_rules('pwd','Password','required|min_length[8]');
				$this->form_validation->set_rules('cpwd','Confirm Password','required|matches[pwd]');
				$dublicated=$this->db->where('email',$_POST['email'])->from('tabel_user')->count_all_results();
				if($dublicated){
					$this->form_validation->set_rules('email','E-mail','valid_ip');
				}
				if($this->form_validation->run() === FALSE){
					$this->load->view('user_layouts/header');
					$this->load->view('profile/new_user');
					$this->load->view('user_layouts/footer');
				}else{					
					
					$data['posts'] = $this->Login_model->new_User($id);
					if(!$data){
						show_404();
					}
			    	redirect('signin');
				}
			}
		}

//checking for notification on (header javascript) to be put into user dropbox
	public function check_notification(){
		$logged=$this->session->userdata('logged_in');
        if($logged){
        	$id=$this->session->userdata('user_id');
			$subscribes = $this->Login_model->get_subscribes($id);
			$data  = $this->Login_model->count_notification($subscribes,$id);
			$this->output->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
       			->set_output(json_encode($data));
       	}else{
       		return false;
       	}

	}

	
}
