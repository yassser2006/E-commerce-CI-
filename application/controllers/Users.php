
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->model('User_model');
			$this->load->helper('url');
			$logged=$this->session->userdata('logged_in'); 
			$level_id=$this->session->userdata('user_level'); 
			$ss=$this->ck_login->check_login($logged,$level_id);
			if($ss=='Admin'){
			}
			elseif($ss=='User')
	  		{
	  			redirect('');
	  		}
	  		else
	  		{
	  			redirect('signin');
	  		}
		}

	public function index()
		{
			$data=$this->User_model->statistics();
			$this->load->view('layouts/header.php');
			$this->load->view('users/index.php',$data);
			$this->load->view('layouts/footer.php');
		}

	public function get_users()
		{
			  $draw = intval($this->input->post("draw"));
		      $start = intval($this->input->post("start"));
		      $length = intval($this->input->post("length"));


		     // $query = $this->db->get("tabel_user");
			  $query=$this->User_model->make_datatables($start ,$length);

		      $data = [];


		      foreach($query as $r) {
		           if($r->status==1){$status='Active';$action='Ban';}
		           elseif($r->status==-1){$status='Banned';$action='Unban ';}
		           elseif($r->status==0){$status='Unactive';$action='Active';}else{
						$status='Wronge';
		           }
		           $img='./assets/images/users/'.$r->idUser.'.png';
                        if(!file_exists($img)){
                            $img='./assets/images/users/defaul_user.png';
                          //  die($img);
                        }
		           $data[] = array(
		           	'<img src="'.$img.'" class="img-thumbnail" width="50" height="35" />', 
		 
		                $r->name,
		                $r->email,
		                $r->address,
		                $r->location,
		                $r->phoneNumber,
		                $r->createdAt,
		                $status,
		                '<button onClick="reply_click()" type="button" style="width:65px;padding:0px;" name="'.$r->status.'" id="'.$r->idUser.'" class="btn btn-info ">'.$action.'</button>'
		           );
		      }


		      	$result = array(
		               "draw" => $draw,
		                "recordsTotal"     =>     $this->User_model->get_all_data(),  
		                "recordsFiltered"  =>     $this->User_model->get_filtered_data(),  
		                "data"             =>     $data  
		            );


		      	echo json_encode($result);
		      	exit();
	   }

	   public function action()
		{
				$data['user']=$this->User_model->action();
				if(($data['user'])==FALSE){
					show_404();
				}
				redirect('users');
		}

		public function restatic()
		{
				$data=$this->User_model->statistics();
				$this->output->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
       			->set_output(json_encode($data));
		}
}