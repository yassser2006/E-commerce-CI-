
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//This is admin Panel for Controling Advertsment

class Adverts extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->model('Advert_model');
			$logged=$this->session->userdata('logged_in'); 
		   	$level_id=$this->session->userdata('user_level'); 
			$ss=$this->ck_login->check_login($logged,$level_id);
			if($ss=='Admin'){

			}elseif($ss=='User'){
	  			redirect('');
	  		}else
	  		{
	  			redirect('signin');
	  		}
		}

	public function index()
	{
	
		$this->load->view('layouts/header.php');
		$this->load->view('adverts/index.php');
		$this->load->view('layouts/footer.php');
		
	}

	//Get Adverts to be showen at the Admin Panel
	public function get_ads()
		{
		
		  $draw = intval($this->input->post("draw"));
	      $start = intval($this->input->post("start"));
	      $length = intval($this->input->post("length"));

		  $query=$this->Advert_model->make_datatables($start ,$length);

	      $data = [];
	      foreach($query as $r) {
	           $data[] = array(
	           	'<img onClick="img1_click(this.id)" id="'.$r->idAds.'" src="'.base_url().'assets/images/ads/'.$r->idAds.'" alt="'.$r->title.'" class="img-thumbnail" width="50" height="35" />', 
	                $r->title,
	                $r->description,
	                $r->url,
	                $r->createdAt,
	            '<div class="btn-group">
                <div class="btn-group hidden-nav-xs">
                  <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
                    Action
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu text-left">
                    <li><a onClick="reply_click()" id="'.$r->idAds.'" name="edit" href="#">Edit</a></li>
                    <li><a onClick="reply_click()" id="'.$r->idAds.'" name="delete" href="#">Delete</a></li>
                  </ul>
                </div>
              	</div>
	                '
	           );
	      }
	      	$result = array(
	             "draw" => $draw,
	             "recordsTotal"     =>     $this->Advert_model->get_all_data(),  
	             "recordsFiltered"  =>     $this->Advert_model->get_filtered_data(),  
	             "data"             =>     $data  
	            );
      	echo json_encode($result);
     	exit();
    
	  }

	//getting data to edit panel
    public function edit()
	{
		$data['advs']=$this->Advert_model->get_adv($_POST['id']);
		if(empty($data['advs'])){
			show_404();
		}
		$this->load->view('adverts/edit.php', $data);
 		
	}

	public function delete()
	{
		
			$data['ads']=$this->Advert_model->delete();
			if(($data['ads'])==FALSE){
				show_404();
			}
		
	}
//update data on the edit panel
	public function update()
	{
			$this->form_validation->set_rules('title','Title','required');
			$this->form_validation->set_rules('description','Description','required|min_length[20]|max_length[200]');
			$this->form_validation->set_rules('url','Url','required|valid_url');
			if($this->form_validation->run() === FALSE){
				$data['advs']=$this->Advert_model->get_adv($_POST['id']);
				$this->load->view('layouts/header');
				$this->load->view('adverts/edit.php', $data);
				$this->load->view('layouts/footer');
			}else{
				//$img=$_FILES['userfile']['name'];
				//return  $img;
				//if(!$this->form_validation->run() === FALSE){
					$id=$_POST['id'];
					$config['upload_path']='./assets/images/ads/';
					$config['allowed_types']='jpg|png|jepg';
					$config['file_name'] = $id;
					$config['max_size']='4096';
					$config['max_width']='1000';
					$config['max_height']='1000';
					$config['overwrite'] = TRUE;
					$this->load->library('upload', $config);
					if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
					if(!$this->upload->do_upload()){
						$errors= array('error' => $this->upload->display_errors());
						$post_image='noimage.jpg';
						echo $this->upload->display_errors();

					}else{
						$data= array('upload_data' => $this->upload->data());
						$post_image=$_FILES['userfile']['name'];
					}
				//}else{
					$this->Advert_model->update_adv();
					
				//}
				
				redirect('adverts');
			}
		
	}

	//showing create panel
  	public function create()
		{
			$this->load->view('adverts/create.php');
		}
	//inserting data from create panel
	public function insert()
	{
		
		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('description','Description','required|min_length[20]|max_length[200]');
		$this->form_validation->set_rules('url','Url','required|valid_url');
		
		if($this->form_validation->run() === FALSE){
			$this->load->view('layouts/header');
			$this->load->view('adverts/create.php');
			$this->load->view('layouts/footer');
		}else{

			$id=$this->Advert_model->insert_adv();
			$config['upload_path']='./assets/images/ads/';
			$config['allowed_types']='jpg|png|jepg';
			$config['file_name'] = $id;
			$config['max_size']='4096';
			$config['max_width']='1000';
			$config['max_height']='1000';
			$this->load->library('upload', $config);
			if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
			if(!$this->upload->do_upload()){
				$errors= array('error' => $this->upload->display_errors());
				$post_image='noimage.jpg';
				echo $this->upload->display_errors();
			}else{
				$data= array('upload_data' => $this->upload->data());
				$post_image=$_FILES['userfile'][$id.'.jpg'];
			}
			
			redirect('adverts');
		}
		
	}
}