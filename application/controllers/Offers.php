
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offers extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->model('Offer_model');
			
			$this->load->helper('url','download');
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
			
				$data=$this->Offer_model->statistics();
				$this->load->view('layouts/header.php');
				$this->load->view('offers/index.php',$data);
				$this->load->view('layouts/footer.php');
			
		}

	public function get_offer()
		{

			  $draw = intval($this->input->post("draw"));
		      $start = intval($this->input->post("start"));
		      $length = intval($this->input->post("length"));


		     // $query = $this->db->get("tabel_user");
			  $query=$this->Offer_model->make_datatables($start ,$length);

				
		      $data = [];


		      foreach($query as $r) {
		      	
		           $data[] = array(
		                $r->name,
		                $r->title,
		                $r->createdAt,
		                $r->readAt,
		            '<div class="btn-group">
	                <div class="btn-group hidden-nav-xs">
	                  <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
	                    Action
	                    <span class="caret"></span>
	                  </button>
	                  <ul class="dropdown-menu text-left">
	                    <li><a onClick="reply_click()" id="'.$r->idOffer.'" name="actiond" href="'.base_url().'offaction/'.$r->idOffer.'">Download PDf</a></li>
	                    <li><a onClick="reply_click()" id="'.$r->idOffer.'" name="delete" href="#">Delete</a></li>
	                    
	                  </ul>
	                </div>
	              	</div>
		                '
		           );
		      }


		      	$result = array(
		               "draw" => $draw,
		                "recordsTotal"     =>     $this->Offer_model->get_all_data(),  
		                "recordsFiltered"  =>     $this->Offer_model->get_filtered_data(),  
		                "data"             =>     $data  
		            );


		      	echo json_encode($result);
		      	exit();
		 
	   }


//download offer at admin panel
		public function action($id)
		{
	
				$this->load->helper('download');
				$data = file_get_contents(base_url('assets/offers/' . $id));
				force_download($id.'.pdf', $data);
				//redirect('offers');
		}

	   public function delete()
		{
				$data['offer']=$this->Offer_model->delete();
				if(($data['offer'])==FALSE){
					show_404();
				}
				return true;
		}
//statistics for admin 
		public function restatic()
		{
				$data=$this->Offer_model->statistics();
				$this->output->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
       			->set_output(json_encode($data));
		
		}
}