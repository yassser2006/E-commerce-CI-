<?php
	/**
	 * 
	 */
	class Offer_model extends CI_Model
	{
		
		public function __construct()
		{
			$this->load->database();
		}


	  var $table = "tabel_offer"; 
    var $select_column = array("idOffer","name", "title", "tabel_offer.createdAt","readAt");  
    var $order_column  = array("name", "title", "tabel_offer.createdAt","readAt"); 

    public function make_query()  
      {  
      		$this->db->select($this->select_column);  
           $this->db->from($this->table); 
           $this->db->join('tabel_user','tabel_offer.idUser = tabel_user.idUser');
           $this->db->join('tabel_posting','tabel_offer.idPosting = tabel_posting.idPosting');
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("name", $_POST["search"]["value"]);  
                $this->db->or_like("title", $_POST["search"]["value"]); 
                $this->db->or_like("tabel_offer.createdAt", $_POST["search"]["value"]); 
                $this->db->or_like("readAt", $_POST["search"]["value"]);  
           }  
             if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('createdAt', 'DESC');  
           }  
      } 

    public function make_datatables($start ,$length){  
           $this->make_query();  
           if($length != -1)  
           {  
                $this->db->limit($length, $start);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }

    public function get_filtered_data(){  
           $this->make_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }

    public function get_all_data()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table);  
           return $this->db->count_all_results();  
      }  

    public function delete()  
      {  
          $id=$_POST["id"];
          $this->db->delete($this->table,array('idOffer'=>$id));
			return true;
	  }


    public function get_offer($id){
        $this->db->where('idOffer',$id);
        $query=$this->db->get($this->table);
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
           $readAt = $row->readAt;
          }

          return $readAt;
        }
        return true;
    }

    public function statistics (){
     $data['alloffers'] =$this->db->count_all($this->table);
     $data['read'] =$this->db->where('readAt',null)->from($this->table)->count_all_results();
     return $data;
    }

    //--------------------------
    //--------------------------
    //User Model
    //--------------------------
    //--------------------------

    var $select_column_U = array("name","tabel_offer.idPosting", "tabel_offer.idUser", "idOffer", "tabel_offer.createdAt","message",'readAt','tabel_Posting.title','tabel_Posting.idPosting');  

    public function get_All_Offers($rowno,$rowperpage)
      {

        $id=$this->session->userdata('user_id'); 


        $this->db->select($this->select_column_U);
        $this->db->where('tabel_offer.idUser',$id);
        $this->db->order_by('tabel_offer.createdAt','desc');
        $this->db->join('tabel_user','tabel_offer.idUser = tabel_user.idUser');
        $this->db->join('tabel_Posting','tabel_Posting.idPosting = tabel_offer.idPosting');
        $tempdb = clone $this->db;
        $this->db->from($this->table);
          $this->db->limit($rowperpage, $rowno);   
          $query = $this->db->get();
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
                  $data[] = $row;
            $data['posts'][] = $row;
          }
          $data['count'][0]=$tempdb->from($this->table)->count_all_results();
          return $data;
        }
        return false;
      }

    public function get_post_Offers($postId,$rowno,$rowperpage)
      {

        $id=$this->session->userdata('user_id'); 
        $this->db->select($this->select_column_U);
        $this->db->where('tabel_offer.idPosting',$postId);
        //$this->db->where('tabel_offer.accepted','');
        $this->db->order_by('tabel_offer.createdAt','desc');
        $this->db->where('tabel_posting.idUser',$id);
        $this->db->join('tabel_user','tabel_offer.idUser = tabel_user.idUser');
        $this->db->join('tabel_posting','tabel_posting.idPosting = tabel_offer.idPosting');
        $tempdb = clone $this->db;
        $tempdb1 = clone $this->db;
        $this->db->from($this->table);
        $this->db->limit($rowperpage, $rowno);   
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
            $data[] = $row;
            $data['posts'][] = $row;
          }
          $data['count'][0]=$tempdb->from($this->table)->count_all_results();
          $data['count1'][0]=$tempdb1->where('tabel_offer.accepted','1')->from($this->table)->count_all_results();

          return $data;
        }
        return false;
      }

    public function accept_Offer($idOffer){

      $id=$this->session->userdata('user_id');

      $this->db->join('tabel_offer','tabel_posting.idPosting = tabel_offer.idPosting');
      $this->db->select('tabel_posting.idPosting');
      $this->db->where('tabel_offer.idOffer',$idOffer);
      $this->db->where('tabel_posting.idUser',$id);
      $this->db->where('tabel_posting.complete','0');
      $this->db->from("tabel_posting");
      $query=$this->db->get();
      if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
                  $idPosting= $row->idPosting;
          }
     
        $data = array( 
          'accepted' =>  '1'
        );

        $this->db->where('tabel_offer.idOffer',$idOffer);
        $this->db->where('tabel_offer.idPosting',$idPosting);
        $this->db->update($this->table, $data);

        $data = array( 
          'complete' =>  '1'
         );
        $this->db->where('tabel_posting.idPosting',$idPosting);
        $this->db->where('tabel_posting.idUser',$id);
        $this->db->update('tabel_posting', $data);
        return true;
      }else{
        show_404();
      }
      
    }

    public function check_own_offer($offer){

        $id=$this->session->userdata('user_id'); 
        $this->db->where('tabel_offer.idUser',$id);
        $this->db->where('idOffer',$offer);
        $query=$this->db->get($this->table);
        if ($query->num_rows() > 0) {
          return true;
        }
        return false;
    }
  
    public function check_coming_offer($offer){

        $id=$this->session->userdata('user_id'); 
        $this->db->where('tabel_posting.idUser',$id);
        $this->db->where('idOffer',$offer);
        $this->db->join('tabel_posting','tabel_posting.idPosting = tabel_offer.idPosting');
        $this->db->from($this->table);
        $query=$this->db->get();
        if ($query->num_rows() > 0) {
         foreach ($query->result() as $row) {
          if($row->readAt==null){
            $this->db->where('idOffer',$offer)->update($this->table,array('readAt' => date('Y-m-d H:i:s') ));
          }
        }
          return true;
        }
        return false;
    }

    public function insert_Offer($idOffer){
        
        $id=$this->session->userdata('user_id'); 
        $data = array( 
          'idOffer' => $idOffer,
          'idUser' => $id,
          'idPosting' =>  $_POST['idPost'],
          'createdAt' =>  date('Y-m-d H:i:s'),
          'message' =>  $_POST['message']
        );
        $this->db->insert($this->table, $data);
        return true;
    }

}