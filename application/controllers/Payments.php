
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->model('Payment_model');
			
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
			$data=$this->Payment_model->statistics();
			$this->load->view('layouts/header.php');
			$this->load->view('payments/index.php',$data);
			$this->load->view('layouts/footer.php');

		}

	public function get_payment()
		{
			  $draw = intval($this->input->post("draw"));
		      $start = intval($this->input->post("start"));
		      $length = intval($this->input->post("length"));


		     // $query = $this->db->get("tabel_user");
			  $query=$this->Payment_model->make_datatables($start ,$length);

		      $data = [];


		           
		      foreach($query as $r) {
		      	$vbutton='<li><a onClick="reply_click()" id="'.$r->idPayment.'" name="show" href="#">Verify</a></li>';
		      	if($r->verification==1){$verification='Verified';}
		        elseif($r->verification==0){$verification='Unverified';}
		        elseif($r->verification==-1){$verification='Rejected';}

		           $data[] = array(
		                '<img onClick="img1_click(this.id)" id="'.$r->idPayment.'" src="'.base_url().'assets/images/payments/'.$r->idPayment.'" alt="'.$r->name.'" class="img-thumbnail" width="50" height="35" />', 
		                $r->name,
		                $r->level,
		                $r->createdAt,
		                $verification,
		                $r->verifDate,
		                $r->verifMessage,
		            '<div class="btn-group">
	                <div class="btn-group hidden-nav-xs">
	                  <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
	                    Action
	                    <span class="caret"></span>
	                  </button>
	                  <ul class="dropdown-menu text-left">
	                    '.$vbutton.'
	                    <li><a onClick="reply_click()" id="'.$r->idPayment.'" name="delete" href="#">Delete</a></li>
	                    
	                  </ul>
	                </div>
	              	</div>
		                '
		           );
		      }


		      	$result = array(
		               "draw" => $draw,
		                "recordsTotal"     =>     $this->Payment_model->get_all_data(),  
		                "recordsFiltered"  =>     $this->Payment_model->get_filtered_data(),  
		                "data"             =>     $data  
		            );


		      	echo json_encode($result);
		      	exit();

	   }


	   public function delete()
		{
			$data['paymnt']=$this->Payment_model->delete();
			if(($data['payment'])==FALSE){
				show_404();
			}
		}

		public function verify()
		{
			$data['payment']=$this->Payment_model->verify_payment();
			if(($data['payment'])==FALSE){
				show_404();
			}
				return true;		
		}
//showing last message on box
	public function show()
	{
	
		$data['payments']=$this->Payment_model->get_payment();
				
		if(($data['payments'])==FALSE){
			show_404();
		}
		foreach ($data['payments'] as $row) {
		    $r= $row;
		}
		$this->output->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
       	->set_output(json_encode($r));
	}
//statistics for admin 
		public function restatic()
		{
			$data=$this->Payment_model->statistics();
			$this->output->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
       		->set_output(json_encode($data));
		}
}