<?php
	/**
	 * 
	 */
	class Request_model extends CI_Model
	{
		
		public function __construct()
		{
			$this->load->database();
		}


	  var $table = "tabel_posting"; 
      var $select_column = array( "name","title", "postingDate","productCategory","promotedAt","verification","complete","sponsorTime","idPosting");  
      var $order_column  = array( "name","title", "postingDate","productCategory","promotedAt",null,null,null,null); 

      function make_query()  
      {  
      		$this->db->select($this->select_column);  
           $this->db->from($this->table); 
           $this->db->join('tabel_user','tabel_posting.idUser = tabel_user.idUser');
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("name", $_POST["search"]["value"]);  
                $this->db->or_like("title", $_POST["search"]["value"]);
                $this->db->or_like("postingDate", $_POST["search"]["value"]);
                $this->db->or_like("productCategory", $_POST["search"]["value"]);
                $this->db->or_like("promotedAt", $_POST["search"]["value"]);

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

      function make_datatables($start ,$length){  
           $this->make_query();  
           if($length != -1)  
           {  
                $this->db->limit($length, $start);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }

      function get_filtered_data(){  
           $this->make_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }

      function get_all_data()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table);  
           return $this->db->count_all_results();  
      }  

      function delete()  
      {  
          $id=$_POST["id"];
          $this->db->delete('tabel_offer',array('idPosting'=>$id));
          $this->db->delete($this->table,array('idPosting'=>$id));
			 return true;
	  }

	  public function verify_request(){

      $data = array( 
          'verification'  => $_POST['verify'] ,
          'verifMessage'  => $_POST['msg'] ,
          'verifDate'  => date('Y-m-d H:i:s')
      );
      $this->db->where('idPosting', $_POST['id']);
      $this->db->update($this->table, $data);
      return true;
    }

    public function get_request(){
      $id=$_POST['id'];
      $this->db->where('idPosting',$id);
      $this->db->join('tabel_user','tabel_user.idUser = tabel_posting.idUser');
      $query=$this->db->get($this->table);
      if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
           $data[] = $row;
         }
          return $data;
        }
        return false;
    }

    public function make_Sponsor(){

      $data = array( 
          'sponsorTime'  => $_POST['sponsor'] ,
          'sponsorDate'  => date('Y-m-d H:i:s') 
      );
      $this->db->where('idPosting', $_POST['id']);
      $this->db->update($this->table, $data);
      return true;
    }

    function statistics (){
   $data['allreqs'] =$this->db->count_all($this->table);
   $data['verified'] =$this->db->where('verification',1)->from($this->table)->count_all_results();
   $data['unverified'] =$this->db->where('verification',0)->from($this->table)->count_all_results();
   $data['rejected'] =$this->db->where('verification',-1)->from($this->table)->count_all_results();
   $data['removed'] =$this->db->where('complete',-1)->from($this->table)->count_all_results();
   $data['available'] =$this->db->where('complete',0)->from($this->table)->count_all_results();
   $data['sold'] =$this->db->where('complete',1)->from($this->table)->count_all_results();
   return $data;
  }
}