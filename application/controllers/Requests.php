
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requests extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->model('Request_model');
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
			$data=$this->Request_model->statistics();
			$this->load->view('layouts/header.php');
			$this->load->view('requests/index.php',$data);
			$this->load->view('layouts/footer.php');
		}

	public function get_request()
		{
			  $draw = intval($this->input->post("draw"));
		      $start = intval($this->input->post("start"));
		      $length = intval($this->input->post("length"));


		     // $query = $this->db->get("tabel_user");
			  $query=$this->Request_model->make_datatables($start ,$length);

		      $data = [];


		      foreach($query as $r) {
		      	$vbutton='';
		      	if($r->verification==1){$verification='Verified';}
		        elseif($r->verification==0){$verification='Unverified';}
		        elseif($r->verification==-1){$verification='Rejected';}
		        else{
						$verification='Wronge';
		        }

		        if($r->complete==0){$complete='Available';}
		        elseif($r->complete==-1){$complete='Removed';}
		        elseif($r->complete==1){$complete='Sold';}
		        else{
						$complete='Wronge';
		        }

		           $data[] = array(
		                $r->name,
		                $r->title,
		                $r->postingDate,
		                $r->productCategory,
		                $r->promotedAt,
		                $verification,
		                $complete,
		                $r->sponsorTime,
		            '<div class="btn-group">
	                <div class="btn-group hidden-nav-xs">
	                  <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
	                    Action
	                    <span class="caret"></span>
	                  </button>
	                  <ul class="dropdown-menu text-left">
	                  '.$vbutton.'
	                  <li><a onClick="reply_click()" id="'.$r->idPosting.'" name="detail" href="#">Details</a></li>
	                  <li><a onClick="reply_click()" id="'.$r->idPosting.'" name="delete" href="#">Delete</a></li>
	                  <li><a onClick="reply_click()" id="'.$r->idPosting.'" name="show" href="#">Sponsor</a></li>
	                    
	                  </ul>
	                </div>
	              	</div>
		                '
		           );
		      }


		      	$result = array(
		               "draw" => $draw,
		                "recordsTotal"     =>     $this->Request_model->get_all_data(),  
		                "recordsFiltered"  =>     $this->Request_model->get_filtered_data(),  
		                "data"             =>     $data  
		            );


		      	echo json_encode($result);
		      	exit();

	   }

	     public function action()
		{		
				$data['request']=$this->Request_model->verify_request();
				if(empty($data['request'])){
					show_404();
				}
				return true;

		}

	   public function delete()
		{
				$data['request']=$this->Request_model->delete();
				if(($data['request'])==FALSE){
					show_404();
				}
		}


	public function details()
	{
	
				$data['requests']=$this->Request_model->get_request();
				
				if(($data['requests'])==FALSE){
					show_404();
				}
				foreach ($data['requests'] as $row) {
		          $r= $row;
		          $r->minimumBudget=number_format($r->minimumBudget);
		          $r->maximumBudget=number_format($r->maximumBudget);
		         }
				$this->output->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
       			->set_output(json_encode($r));
	}

	public function make_sponsor(){
		$data=$this->Request_model->make_Sponsor();
		redirect('requests');

	}

	public function restatic()
		{
				$data=$this->Request_model->statistics();
				$this->output->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
       			->set_output(json_encode($data));
		}
}