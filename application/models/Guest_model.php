<?php
	/**
	 * 
	 */
	class Guest_model extends CI_Model
	{
		
		public function __construct()
		{
			$this->load->database();
		}


	  var $table = "tabel_posting"; 
      var $select_column = array("idAds","title", "description", "url", "createdAt");  
      var $order_column  = array(null,"title", "description", "url", "createdAt",null); 

      public function search_posts($rowno,$rowperpage,$order)
      {
  	    if($_POST){

  	      	if($_POST['location']!='All')
      			{
      				$this->db->like('location',$_POST['location']);
              //die($_POST['location']=='Sumatera Selatan');
      			}

      	    if($_POST['category']!='All')
      			{
      				$this->db->where('productCategory',$_POST['category']);
      			}

      			if($_POST['budget']!='')
      			{
      				$min=$_POST['budget'];
      				$min=str_replace("Rp ","",$min);
      				$min=str_replace(",","",$min);
      				$this->db->where('minimumBudget <=',$min);
      			}
      			$this->db->where('requestCategory',$_POST['requestCategory'][0]);
            
            $user_data= array(
              'location' => $_POST['location'],
              'category' =>$_POST['category'],
              'budget' => $_POST['budget'],
              'requestCategory' =>$_POST['requestCategory'][0]
            );
            $this->session->set_userdata($user_data);
            
    		}else{

          $location=$this->session->userdata('location'); 
          $category=$this->session->userdata('category'); 
          $budget=$this->session->userdata('budget'); 
          $requestCategory=$this->session->userdata('requestCategory'); 
          if($location!='All')
            {
              $this->db->like('location',$_POST['location']);
              //die($_POST['location']=='Sumatera Selatan');
            }

            if($category!='All')
            {
              $this->db->where('productCategory',$_POST['category']);
            }

            if($budget!='')
            {
              $min=$budget;
              $min=str_replace("Rp ","",$min);
              $min=str_replace(",","",$min);
              $this->db->where('minimumBudget <=',$min);
            }
            $this->db->where('requestCategory',$requestCategory);
        }

        if($order=='recent')
        $this->db->order_by("promotedAt", "desc");
        if($order=='pricehl')
        $this->db->order_by("maximumBudget", "desc");
        if($order=='pricelh')
        $this->db->order_by("maximumBudget", "asce");
        $this->db->where('verification',1);
        $this->db->where('complete',0);
        $tempdb = clone $this->db;
    		$this->db->from($this->table);
    	  $this->db->limit($rowperpage, $rowno);   
    	  $query = $this->db->get();

    		if ($query->num_rows() > 0) {
    			foreach ($query->result() as $row) {
              		$data['posts'] []= $row;
              	}
          $data['count'][0]=$tempdb->from($this->table)->count_all_results();
          return $data;
    		}
    		return false;
  	    
  	 
  	    return $query->result_array();
      }

      public function all_posts($rowno,$rowperpage,$order)
      {
        
        if($order=='recent')
        $this->db->order_by("promotedAt", "desc");
        if($order=='pricehl')
        $this->db->order_by("maximumBudget", "desc");
        if($order=='pricelh')
        $this->db->order_by("maximumBudget", "asce");
        $this->db->where('verification',1);
        $this->db->where('complete',0);
        $tempdb = clone $this->db;
        $this->db->from($this->table);
        $this->db->limit($rowperpage, $rowno);   
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
                  $data['posts'] []= $row;
                }
          $data['count'][0]=$tempdb->from($this->table)->count_all_results();
          return $data;
        }
        return false;
        
     
        return $query->result_array();
      }

      public function getPost($id){
      	//increment the views with 1
        $this->db->where('idPosting', $id);
        $this->db->set('views', 'views+1', FALSE);
        $this->db->update($this->table);

        
        //getting the post for the Guest and the user
      	$this->db->where('idPosting',$id);
        $this->db->select(array('idPosting','tabel_posting.location','name','title','postingDate','description','views','minimumBudget','maximumBudget','requestCategory','productCategory','phoneNumber','tabel_posting.idUser'));
        //$this->db->where('verification',1);
        $this->db->where('complete !=',-1);
      	$this->db->join('tabel_user','tabel_posting.idUser = tabel_user.idUser');
      	$query=$this->db->get($this->table);
        if ($query->num_rows() > 0) {

          foreach ($query->result() as $row) {
           $data = $row;
          }
         // die(print_r($data));
          return $data;
        }
        return false;
      }

      public function getSponsor(){

      	$this->db->limit(10,0);
      	$this->db->where('sponsorTime >', '0');
        $this->db->where('verification',1);
        $this->db->where('complete',0);
      	$this->db->order_by("sponsorDate", "desc");
      	$query=$this->db->get($this->table);
        $data=array();
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
          	if($row->sponsorDate>date('Y-m-d H:i:s', strtotime('-'.$row->sponsorTime.' day'))){
          		$data[] = $row;
          	}else{
        		$this->db->where('idPosting',$row->idPosting);
        		$this->db->update($this->table, array('sponsorTime' => 0 ));
          	}
           
          }
          return $data;
        }
        return false;

      }

      public function get_category($rowno,$rowperpage,$cat){
        $this->db->limit($rowperpage,$rowno);
        $this->db->order_by("promotedAt", "desc");
        $this->db->where('verification',1);
        $this->db->where('complete',0);
        $this->db->where('productCategory',$cat);
        $query=$this->db->get($this->table);
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
           $data[] = $row;
          }
          return $data;
        }
        return false;
      }

      public function getLatest(){
        /*if($order=='recent')
        $this->db->order_by("promotedAt", "desc");
        if($order=='pricehl')
        $this->db->order_by("maximumBudget", "desc");
        if($order=='pricelh')
        $this->db->order_by("maximumBudget", "asce");*/
      	$this->db->limit(10,0);
        $this->db->where('verification',1);
        $this->db->where('complete',0);
      	$query=$this->db->get($this->table);
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
           $data[] = $row;
          }
          return $data;
        }
        return false;
      }

      public function get_adverts(){
      	$this->db->limit(4,0);
      	$this->db->order_by("createdAt", "desc");
      	$query=$this->db->get("tabel_ads");
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
           $data[] = $row;
          }
          return $data;
        }
        return false;
      }

	public function count_posts()
      {
	    if($_POST){

	      	if($_POST['location']!='All')
			{
				$this->db->where('location',$_POST['location']);
			}

	      	if($_POST['category']!='All')
			{
				$this->db->where('productCategory',$_POST['category']);
			}
			if($_POST['budget']!='')
			{
				$min=$_POST['budget'];
				$min=str_replace("Rp ","",$min);
				$min=str_replace(",","",$min);
				$this->db->where('minimumBudget <=',$min);
			}
			//die(print_r($_POST));
			$this->db->where('requestCategory',$_POST['requestCategory'][0]);
  		}
      $this->db->where('verification',1);
      $this->db->where('complete',0);
  		$this->db->from($this->table);  
  	    $query = $this->db->get();
  		if ($query->num_rows() > 0) {
              return $query->num_rows();
  		}
	    
	 
	    return 1;
      }

      public function check_post($userId,$postId){
      	$this->db->where('tabel_notification.idPosting',$postId);
 		     $this->db->where('tabel_notification.idUser',$userId);
        $this->db->where('tabel_notification.status',0);
      	$query=$this->db->get("tabel_notification");
        if ($query->num_rows() > 0) {
          return true;
        }
        return false;
      }

      public function read_post($userId,$postId){

		    $data = array( 
		          'status' =>  '1'
		      );
      	$this->db->where('tabel_notification.idPosting',$postId);
 		    $this->db->where('tabel_notification.idUser',$userId);
 		    $this->db->update('tabel_notification', $data);

        return true;
      }

     
}