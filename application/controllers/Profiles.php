
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profiles extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->model('Profile_model');
			$this->load->library("pagination");
			$this->load->library("Pdf");
			$this->load->database();
			$logged=$this->session->userdata('logged_in'); 
			$status=$this->session->userdata('status');
		    if(!$logged){
		    	redirect('signin');
		    }else{
		    	if($status=='Waiting Verification') redirect('');
			}
		}

	public function index($rowno=0)
	{
			// Row per page
		    $rowperpage = 2;

		    // Row position
		    if($rowno != 0){
		      $rowno = ($rowno-1) * $rowperpage;
		    }

			$data=$this->Profile_model->get_All_Posts($rowno,$rowperpage);
			if(empty($data)){
				$this->load->view('user_layouts/header');
				$this->load->view('profile/index');
				$this->load->view('user_layouts/footer');
				return true;
			}

		    // All records count
    		$allcount =$data['count'][0];

    		// Get records
    		$users_record =$data['posts'];

		    // Pagination Configuration
		    $config['base_url'] = base_url().'profile';
		    $config['use_page_numbers'] = TRUE;
		    $config['total_rows'] = $allcount;
		    $config['per_page'] = $rowperpage;
		    $config["first_tag_open"] = '<li>';
			$config["first_tag_close"] = '</li>';
			$config["last_tag_open"] = '<li>';
			$config["last_tag_close"] = '</li>';
			$config['next_link'] = '&gt;';
			$config["next_tag_open"] = '<li>';
			$config["next_tag_close"] = '</li>';
			$config["prev_link"] = "&lt;";
			$config["prev_tag_open"] = "<li>";
			$config["prev_tag_close"] = "</li>";
			$config["cur_tag_open"] = "<li class='active'><a href='#'>";
			$config["cur_tag_close"] = "</a></li>";
			$config["num_tag_open"] = "<li>";
			$config["num_tag_close"] = "</li>";
			$config["num_links"] = 1;  

		    // Initialize
		    $this->pagination->initialize($config);

		    // Initialize $data Array
		    $data['links'] = $this->pagination->create_links();
		    $data['posts'] = $users_record;
		    $data['row'] = $rowno;

		$this->load->view('user_layouts/header');
		$this->load->view('profile/index',$data);
		$this->load->view('user_layouts/footer');
	}

	public function delete_post($postId)
	{
			
		$data=$this->Profile_model->delete_Post($postId);
		if(!$data){
			show_404();
		}
	    redirect($_SERVER['HTTP_REFERER']);
	}

	public function promote_post($postId)
	{
			
		$data=$this->Profile_model->promote_Post($postId);
		if(!$data){
			show_404();
		}
	    redirect($_SERVER['HTTP_REFERER']);
	}

	

	public function insert_post()
	{		
	    $min=$_POST['minimumBudget'];
		$min=str_replace("Rp ","",$min);
		$min=str_replace(",","",$min);

		$max=$_POST['maximumBudget'];
		$max=str_replace("Rp ","",$max);
		$max=str_replace(",","",$max);
		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('description','Description','required|min_length[20]|max_length[200]');
		$this->form_validation->set_rules('minimumBudget','Minimum Budget','required');
		if($min>$max){
		$this->form_validation->set_rules('maximumBudget','Maximum Budget','required|greater_than[minimumBudget]');}
		if($this->form_validation->run() === FALSE){
		    $this->load->view('user_layouts/header');
			$this->load->view('profile/new_post');
			$this->load->view('user_layouts/footer');
		}else{

			$idPost = $this->Profile_model->insert_Post($min,$max);
			if(!$idPost){
				show_404();
			}
			$done=$this->Profile_model->make_notification($idPost);
	    	redirect('showpost/'.$idPost);
		}
	}

	public function make_post()
	{		

	   	$this->load->view('user_layouts/header');
		$this->load->view('profile/new_post');
		$this->load->view('user_layouts/footer');
	}
	//showing post to be updated
	public function show_post($postId)
	{
			
		$data['posts'] = $this->Profile_model->get_Post($postId);
		if(!$data){
			show_404();
		}
	    $this->load->view('user_layouts/header');
		$this->load->view('profile/edit_post',$data);
		$this->load->view('user_layouts/footer');
	}
//updating post after showing
	public function edit_post()
	{
		$min=$_POST['minimumBudget'];
		$min=str_replace("Rp ","",$min);
		$min=str_replace(",","",$min);

		$max=$_POST['maximumBudget'];
		$max=str_replace("Rp ","",$max);
		$max=str_replace(",","",$max);
		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('description','Description','required|min_length[20]|max_length[200]');
		$this->form_validation->set_rules('minimumBudget','Minimum Budget','required');
		//die($min.' - '.$max);
		if($min>$max){
		$this->form_validation->set_rules('maximumBudget','Maximum Budget','required|greater_than[minimumBudget]');}
		if($this->form_validation->run() === FALSE){
			$data['posts'] = $this->Profile_model->get_Post($_POST['id']);
			if(!$data){
				show_404();
			}
		    $this->load->view('user_layouts/header');
			$this->load->view('profile/edit_post',$data);
			$this->load->view('user_layouts/footer');
		}else{
			$data['posts'] = $this->Profile_model->update_Post($min,$max,$_POST['id']);
			if(!$data){
				show_404();
			}
	    redirect('profile');
		}
	}
//getting the posts that I'm supscribes
	public function all_my_subscribes($rowno=0)
	{
			// Row per page
		    $rowperpage = 1;

		    // Row position
		    if($rowno != 0){
		      $rowno = ($rowno-1) * $rowperpage;
		    }

			$data=$this->Profile_model->get_All_Subscribes($rowno,$rowperpage);
			if(!($data)){
				$this->load->view('user_layouts/header');
				$this->load->view('profile/post_sub',$data);
				$this->load->view('user_layouts/footer');
				return true;
			}

		    // All records count
    		$allcount =$data['count'][0];

    		// Get records
    		$users_record =$data['posts'];

		    // Pagination Configuration
		    $config['base_url'] = base_url().'subscriped';
		    $config['use_page_numbers'] = TRUE;
		    $config['total_rows'] = $allcount;
		    $config['per_page'] = $rowperpage;
		    $config["first_tag_open"] = '<li>';
			$config["first_tag_close"] = '</li>';
			$config["last_tag_open"] = '<li>';
			$config["last_tag_close"] = '</li>';
			$config['next_link'] = '&gt;';
			$config["next_tag_open"] = '<li>';
			$config["next_tag_close"] = '</li>';
			$config["prev_link"] = "&lt;";
			$config["prev_tag_open"] = "<li>";
			$config["prev_tag_close"] = "</li>";
			$config["cur_tag_open"] = "<li class='active'><a href='#'>";
			$config["cur_tag_close"] = "</a></li>";
			$config["num_tag_open"] = "<li>";
			$config["num_tag_close"] = "</li>";
			$config["num_links"] = 1;  

		    // Initialize
		    $this->pagination->initialize($config);

		    // Initialize $data Array
		    $data['links'] = $this->pagination->create_links();
		    $data['posts'] = $users_record;
		    $data['row'] = $rowno;

		$this->load->view('user_layouts/header');
		$this->load->view('profile/post_sub',$data);
		$this->load->view('user_layouts/footer');
	}

	
}
