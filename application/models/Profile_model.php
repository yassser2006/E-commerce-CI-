<?php
	/**
	 * 
	 */
	class Profile_model extends CI_Model
	{
		
		public function __construct()
		{
			$this->load->database();
      $this->load->library('Uuid');
		}


	    var $table = "tabel_posting";
      var $select_column = array("name","tabel_offer.idPosting", "tabel_offer.idUser", "idOffer", "tabel_offer.createdAt","message");  
      var $order_column  = array(null,"title", "description", "url", "createdAt",null); 

      public function get_All_Posts($rowno,$rowperpage)
      {

      	$id=$this->session->userdata('user_id'); 
        $this->db->select(array('tabel_posting.idPosting','title','minimumBudget','maximumBudget','requestCategory','productCategory','postingDate','tabel_posting.location','promotedAt','verification','complete','verifMessage'));
        $this->db->where('tabel_posting.complete !=','-1');
    		$this->db->where('tabel_posting.idUser',$id);
    		$this->db->join('tabel_user','tabel_posting.idUser = tabel_user.idUser');
    		$tempdb = clone $this->db;
        $this->db->from($this->table);
  	    $this->db->limit($rowperpage, $rowno);   
  	    $query = $this->db->get();
    		if ($query->num_rows() > 0) {
    			foreach ($query->result() as $row) {
              		$data['posts'][] = $row;
          }
          $data['count'][0]=$tempdb->from($this->table)->count_all_results();
          return $data;
    		}
    		return false;
      }

      

      public function get_All_Subscribes($rowno,$rowperpage)
      {

        $id=$this->session->userdata('user_id'); 
        $this->db->where('tabel_posting.complete','0');
        $this->db->where('tabel_posting.verification','1');
        $this->db->where('tabel_notification.idUser',$id);
        $this->db->join('tabel_notification','tabel_posting.idPosting = tabel_notification.idPosting');
        $tempdb = clone $this->db;
        $this->db->from($this->table);
        $this->db->limit($rowperpage, $rowno);   
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
                  $data['posts'][] = $row;
                }
          $data['count'][0]=$tempdb->from($this->table)->count_all_results();
          return $data;
        }
        return false;
      }

      


    public function delete_Post(){
      $id=$this->session->userdata('user_id'); 

        
      $data = array( 
        'complete' =>  '-1'
      );
      $this->db->where('tabel_posting.idUser',$id);
      $this->db->join('tabel_user','tabel_posting.idUser = tabel_user.idUser');
      $this->db->update($this->table, $data);
      return true;
    }

    public function promote_Post($idPosting){

      $id=$this->session->userdata('user_id');
      $data = array( 
        'promotedAt' =>  date('Y-m-d H:i:s')
      );
      $lastWeek= date('Y-m-d H:i:s', strtotime('-1 week'));
      $this->db->where('tabel_posting.promotedAt <',$lastWeek);
      $this->db->where('tabel_posting.idUser',$id);
      $this->db->where('tabel_posting.idPosting',$idPosting);
      $this->db->join('tabel_user','tabel_posting.idUser = tabel_user.idUser');
      $this->db->update($this->table, $data);
      return true;
    }


    

   public function update_Post($min,$max,$idPosting){

        $id=$this->session->userdata('user_id');
        $data = array( 
          'title' =>  $_POST['title'],
          'description' =>  $_POST['description'],
          'minimumBudget' =>  $min,
          'maximumBudget' =>  $max,
          'verification' =>  0,
          'verifMessage' => '',
          'location' => $_POST['location'],
          'productCategory' =>  $_POST['productCategory'],
          'requestCategory' =>  $_POST['requestCategory']
        );

        $this->db->where('tabel_posting.idUser',$id);
        $this->db->where('tabel_posting.idPosting',$idPosting);
        $this->db->join('tabel_user','tabel_posting.idUser = tabel_user.idUser');
        $this->db->update($this->table, $data);
        return true;
    }

    public function insert_Post($min,$max){
        
        $id=$this->session->userdata('user_id'); 
        $idPosting = $this->uuid->v4();
        $idPosting = str_replace('-', '', $idPosting);
        $data = array( 
          'idPosting' => $idPosting,
          'idUser' => $id,
          'title' =>  $_POST['title'],
          'promotedAt' =>  date('Y-m-d H:i:s'),
          'description' =>  $_POST['description'],
          'minimumBudget' =>  $min,
          'maximumBudget' =>  $max,
          'location' => $_POST['location'],
          'productCategory' =>  $_POST['productCategory'],
          'requestCategory' =>  $_POST['requestCategory']
        );
        $this->db->insert($this->table, $data);
        return $idPosting;
    }

    public function make_notification($idPosting){
      $id=$this->session->userdata('user_id');

      $this->db->select('idUser');
      $this->db->where('idUser !=',$id);
      $this->db->like('subscribes',$_POST['location']);
      $this->db->from('tabel_user');  
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
                  $this->db->insert('tabel_notification',array(
                    'idUser'=>$row->idUser,
                    'idPosting' =>$idPosting
                  ));
          }
          return $data;
      }

    }

     public function get_post($postId)
      {

        $id=$this->session->userdata('user_id'); 
        $this->db->where('tabel_posting.complete','0');
        $this->db->where('tabel_posting.idUser',$id);
        $this->db->where('tabel_posting.idPosting',$postId);
        $this->db->from($this->table); 
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
              $data[] = $row;
          }
         return $data;
        }
        return false;
      }

     
}