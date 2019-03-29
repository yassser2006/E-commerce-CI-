<?php
	/**
	 * 
	 */
	class Payment_model extends CI_Model
	{
		
		public function __construct()
		{
			$this->load->database();
		}


	  var $table = "tabel_payment"; 
      var $select_column = array("idPayment","name","tabel_payment.level", "tabel_payment.createdAt","verification","verifMessage", "verifDate");  
      var $order_column  = array(null, "name","tabel_payment.level", "tabel_payment.createdAt","verification","verifMessage", "verifDate"); 

      function make_query()  
      {  
      		$this->db->select($this->select_column);  
           $this->db->from($this->table); 
           $this->db->join('tabel_user','tabel_payment.idUser = tabel_user.idUser');
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("name", $_POST["search"]["value"]);  
                $this->db->or_like("tabel_payment.level", $_POST["search"]["value"]); 
                $this->db->or_like("tabel_payment.createdAt", $_POST["search"]["value"]); 
                $this->db->or_like("verifDate", $_POST["search"]["value"]);  
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
          $filename='assets/images/payments/';
        
          unlink($filename.$id.'.png');

          $this->db->delete($this->table,array('idPayment'=>$id));
			return true;
	  }

    public function verify_payment(){
        $verify=$_POST['verify'];
        $msg=$_POST['msg'];

      $data = array( 
          'verification'  => $verify ,
          'verifMessage'=>$msg
      );
      $this->db->where('idPayment', $_POST['id']);
      $this->db->update($this->table, $data);
      return true;
    }

    public function get_payment(){
      $id=$_POST['id'];
      $this->db->where('idPayment',$id);
      $this->db->join('tabel_user','tabel_user.idUser = tabel_payment.idUser');
      $query=$this->db->get($this->table);
      if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
           $data[] = $row;
         }
          return $data;
        }
        return false;
    }

  function statistics (){
   $data['allpayments'] =$this->db->count_all($this->table);
   $data['verified'] =$this->db->where('verification',1)->from($this->table)->count_all_results();
   $data['unverified'] =$this->db->where('verification',0)->from($this->table)->count_all_results();
   $data['rejected'] =$this->db->where('verification',-1)->from($this->table)->count_all_results();
   return $data;
  }
}