
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profiles_Offers extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->model('Offer_model');
			$this->load->library("pagination");
			$this->load->library("Pdf");
			$this->load->library('Uuid');
			$logged=$this->session->userdata('logged_in'); 
			$status=$this->session->userdata('status');
		    if(!$logged){
		    	redirect('signin');
		    }else{
		    	if($status=='Waiting Verification') redirect('');
			}
		}

	public function allMyOffers($rowno=0)
	{
			// Row per page
		    $rowperpage = 2;

		    // Row position
		    if($rowno != 0){
		      $rowno = ($rowno-1) * $rowperpage;
		    }

			$data=$this->Offer_model->get_All_Offers($rowno,$rowperpage);
			//die(print_r($data));
			if((!$data)){
				$this->load->view('user_layouts/header');
				$this->load->view('profile/my_offers',$data);
				$this->load->view('user_layouts/footer');
				return true;
			}

		    // All records count
    		$allcount =$data['count'][0];
    		//die(print_r($allcount));
    		// Get records
    		$users_record =$data['posts'];

		    // Pagination Configuration
		    $config['base_url'] = base_url().'allMyOffers';
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
		$this->load->view('profile/my_offers',$data);
		$this->load->view('user_layouts/footer');
	}
	
//all offer for a certain post of mine
	public function post_offers($postId,$rowno=0)
	{
			
			$rowperpage = 2;

		    // Row position
		    if($rowno != 0){
		      $rowno = ($rowno-1) * $rowperpage;
		    }

			$data=$this->Offer_model->get_post_Offers($postId,$rowno,$rowperpage);
			if(!$data){
				$this->load->view('user_layouts/header');
				$this->load->view('profile/post_offers',$data);
				$this->load->view('user_layouts/footer');
				return true;
			}

		    // All records count
    		$allcount =$data['count'][0];
    		// Get records
    		$users_record =$data['posts'];

		    // Pagination Configuration
		    $config['base_url'] = base_url().'postOffer/'.$postId;
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
		    $data['accepted']=$data['count1'][0];
		    //die(($data['accepted'][0]));
		$this->load->view('user_layouts/header');
		$this->load->view('profile/post_offers',$data);
		$this->load->view('user_layouts/footer');
	}
//do accept the offer and mark it the post as sold
	public function accept_offer($offerId)
	{
			
		$data=$this->Offer_model->accept_Offer($offerId);
		if(!$data){
			show_404();
		}
	    redirect($_SERVER['HTTP_REFERER']);
	}
//Download my owen offer
	public function read_own_offer($id){

		if($this->Offer_model->check_own_offer($id)){
			$this->load->helper('download');
			$data = file_get_contents(base_url('assets/offers/' . $id));
			force_download($id.'.pdf', $data);
			//redirect('offers');
		}else{

		}
	}
//download and mark my offer as read
	public function read_coming_offer($id){
		if($this->Offer_model->check_coming_offer($id)){
			$this->load->helper('download');
			$data = file_get_contents(base_url('assets/offers/' . $id));
			force_download($id.'.pdf', $data);
		//redirect('offers');
		}else{
		}
	}

	public function make_offer()
	{

        $idOffer = $this->uuid->v4();
        $idOffer = str_replace('-', '', $idOffer);
		
		$id=$this->session->userdata('user_id');
		$config['upload_path']='./assets/offers/';
		$config['allowed_types']='pdf';
		$config['file_name'] = $idOffer;
		//$config['max_size']='4096';
		//$config['max_width']='1000';
		//$config['max_height']='1000';
		$config['overwrite'] = TRUE;
		$this->load->library('upload', $config);
		if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
		if(!$this->upload->do_upload()){
			$errors= array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('Upload',$this->upload->display_errors());
			redirect('showpost/'.$_POST['idPost']);
		}else{
			$data= array('upload_data' => $this->upload->data());
			$post_image=$_FILES['userfile']['name'];
			$this->Offer_model->insert_Offer($idOffer);
		}
		
		//Do FPDF here
		//$this->creat_offer_pdf($min,$idOffer);
	    redirect('allMyOffers');
		}
/*
	public function creat_offer_pdf($min,$idOffer)
	{
	  $id=$this->session->userdata('user_id');
	  $name=$this->session->userdata('user_name');
	  $email=$this->session->userdata('email');
	  $pdf = new FPDF('l','cm','A4');
	  $pdf->AliasNbPages();
	  $pdf->AddPage();
	  $pdf->SetMargins(1,2,1);

	  //HEADER
	  $pdf->SetFont('Arial','B',16);
	  $pdf->Cell(27.8,1,'Offer from '.$name,'LTR',1,'C',0);
	  $pdf->Ln(0.01);
	  $pdf->SetFont('Arial','B',10);
	  $pdf->Cell(27.8,0.7,'About this Post'.$_POST['title'],'LBR',1,'C',0);

	  // DETAIL ORDER
	  $pdf->Ln(0.4);
	  $pdf->SetFont('Arial','B',10);
	  $pdf->Cell(14,0.7,'   Offer Poster         :     '.$name,0,0,'L',0);
	  $pdf->Ln(0.4);
	  $pdf->Cell(14,0.7,'   Offer E-mail         :     '.$email,0,0,'L',0);
	  $pdf->Ln(0.4);
	  $pdf->Cell(14,0.7,'   Phone Number    :     '.$name,0,0,'L',0);
	  $pdf->Ln(0.4);
	  $pdf->Cell(14,0.7,'   Location              :     '.$name,0,0,'L',0);
	  $pdf->Ln(0.8);
	  $pdf->SetFont('Arial','B',12);
	  $pdf->Cell(14,0.7,'   Price Offered  :   '.$min ,0,0,'L',0);
	  $pdf->Ln(0.6);
	  $pdf->Cell(14,0.7,'   Offer Date       :   '.date('Y-m-d'),0,0,'L',0);
	  $pdf->Ln(0.6);
	  $pdf->Cell(14,0.7,'   Message         :   '.$_POST['message'],0,0,'L',0);

	  // HEADER TABLED ITEM
	  $pdf->Ln(2.5);
	  $pdf->Cell(4,0,$pdf->Image('./assets/images/temp/'.$idOffer.'.png',1.6,$pdf->GetY(),-1200),0,0,'C',0);

	  $pdf->SetY(18.9);
	  $pdf->SetFont('Arial','I',8);
	  $pdf->Cell(0,0,'Tgl.Cetak '.DATE("d/m/Y H:m.s"),0,1,'L');
	  $pdf->Cell(0,0,'Pages '.$pdf->PageNo().'/{nb}',0,0,'C',0);


	  $pdf->SetTitle('Offer for a request');
	  $pdf->SetAuthor($name);
	  $pdf->Output('F',"./assets/offers/".$idOffer.".pdf");
	  $pdf->Output('D',"Offer.pdf");
	}*/
}
