
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guests extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->model('Guest_model');
			 $this->load->library("pagination");
		}
//getting latests requests, sponsor requests and adverts
		public function index()
		{
			$data['posts']=$this->Guest_model->getLatest();
			
			$data['sponsors']=$this->Guest_model->getSponsor();
			
			$adverts['ads']=$this->Guest_model->get_adverts();

			if(($data['posts'])==FALSE){
				$this->load->view('user_layouts/header');
				//$this->load->view('user_layouts/banner');
				//if($adverts['ads']!=false)
					//$this->load->view('user_layouts/slider',$adverts);
				$this->load->view('user_layouts/search_panel');
				$this->load->view('guest/index',$data);
				$this->load->view('user_layouts/footer');
				return true;
			}
			$this->load->view('user_layouts/header');
			//$this->load->view('user_layouts/banner');
			//if($adverts['ads']!=false)
			//$this->load->view('user_layouts/slider',$adverts);
			$this->load->view('user_layouts/search_panel');
			$this->load->view('user_layouts/categories');
			$this->load->view('user_layouts/feuturedAds',$adverts);
			$this->load->view('guest/index',$data);
			$this->load->view('user_layouts/footer');
			
		}


	public function getCategory($cat,$rowno = 0)
		{

			// Row per page
		    $rowperpage = 10;

		    // Row position
		    if($rowno != 0){
		      $rowno = ($rowno-1) * $rowperpage;
		    }

			$data=$this->Guest_model->get_category($rowno,$rowperpage,$cat);
			

		    // All records count
    		$allcount =$this->Guest_model->count_posts();

    		// Get records
    		$users_record =$data;

		    // Pagination Configuration
		    $config['base_url'] = base_url().'allPosts';
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

		    $data['sponsors']=$this->Guest_model->getSponsor();
			if(($data['sponsors'])==FALSE){
				//show_404();
			}
			$adverts['ads']=$this->Guest_model->get_adverts();
			
		    	$this->load->view('user_layouts/header');
			//$this->load->view('user_layouts/banner');
			
			$this->load->view('user_layouts/search_panel');
			//$this->load->view('user_layouts/categories');
			//$this->load->view('user_layouts/feuturedAds',$adverts);
			if(!empty($adverts)){
				$this->load->view('user_layouts/feuturedAds',$adverts);
			}
			$this->load->view('guest/index',$data);
			$this->load->view('user_layouts/footer');
		}

//searching or getting allposts
		public function search($order,$rowno=0)
		{
			// Row per page
		    $rowperpage = 1;
		    // Row position
		    if($rowno != 0){
		      $rowno = ($rowno-1) * $rowperpage;
		    }

			$data=$this->Guest_model->search_posts($rowno,$rowperpage,$order);
			
		    // All records count
    		$allcount =$data['count'][0];
//die(print_r($allcount ));
    		// Get records
    		$users_record =$data['posts'];


		    // Pagination Configuration
		    $config['base_url'] = base_url().'searchposts/'.$order;
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
		    
		    $data['sponsors']=$this->Guest_model->getSponsor();
			if(($data['sponsors'])==FALSE){
				//show_404();
			}
			$adverts['ads']=$this->Guest_model->get_adverts();
			
		    	$this->load->view('user_layouts/header');
			//$this->load->view('user_layouts/banner');
			if(!empty($adverts)){
				//$this->load->view('user_layouts/slider',$adverts);
			}
			$this->load->view('user_layouts/search_panel');
			//$this->load->view('user_layouts/categories');
			$this->load->view('user_layouts/feuturedAds',$adverts);
			$this->load->view('guest/index',$data);
			$this->load->view('user_layouts/footer');
		}

		public function getall($order,$rowno=0)
		{
			// Row per page
		    $rowperpage = 1;
		    // Row position
		    if($rowno != 0){
		      $rowno = ($rowno-1) * $rowperpage;
		    }

			$data=$this->Guest_model->all_posts($rowno,$rowperpage,$order);
			
		    // All records count
    		$allcount =$data['count'][0];
			//die(print_r($allcount ));
    		// Get records
    		$users_record =$data['posts'];


		    // Pagination Configuration
		    $config['base_url'] = base_url().'allPosts/'.$order;
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
		    
		    $data['sponsors']=$this->Guest_model->getSponsor();
			if(($data['sponsors'])==FALSE){
				//show_404();
			}
			$adverts['ads']=$this->Guest_model->get_adverts();
			
		    	$this->load->view('user_layouts/header');
			//$this->load->view('user_layouts/banner');
			if(!empty($adverts)){
				//$this->load->view('user_layouts/slider',$adverts);
			}
			$this->load->view('user_layouts/search_panel');
			//$this->load->view('user_layouts/categories');
			$this->load->view('user_layouts/feuturedAds',$adverts);
			$this->load->view('guest/index',$data);
			$this->load->view('user_layouts/footer');
		}

		

//open single post
		public function openPost($postID){
			$logged=$this->session->userdata('logged_in'); 
			
			if($logged){
				$id=$this->session->userdata('user_id');
				$unRead=$this->Guest_model->check_post($id,$postID);
				if($unRead){
					$this->Guest_model->read_post($id,$postID);
					$_SESSION['notification']=$_SESSION['notification']-1;
				}
			}

			$data['post']=$this->Guest_model->getPost($postID);
			if(($data['post'])==FALSE){
				show_404();
			}
			//$adverts['ads']=$this->Guest_model->get_adverts();
			//die($data['post']);
			$this->load->view('user_layouts/header');
			//$this->load->view('user_layouts/search_panel.php');
			//$this->load->view('user_layouts/categories.php');
			//$this->load->view('user_layouts/banner');
			//$this->load->view('user_layouts/slider',$adverts);
			$this->load->view('guest/post',$data);
			$this->load->view('user_layouts/footer');

		}
}
