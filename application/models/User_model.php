<?php
	/**
	 * 
	 */
	class User_model extends CI_Model
	{
		
		public function __construct()
		{
			$this->load->database();
		}


	  var $table = "tabel_user"; 
      var $select_column = array("idUser", "name", "email", "address","location","phoneNumber","createdAt","status");  
      var $order_column = array(null, "name", "email", "address","location","phoneNumber","createdAt","status"); 

      function make_query()  
      {  
      		$this->db->select($this->select_column);  
           $this->db->from($this->table); 
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("name", $_POST["search"]["value"]);  
                $this->db->or_like("email", $_POST["search"]["value"]);  
                $this->db->or_like("address", $_POST["search"]["value"]);  
                $this->db->or_like("location", $_POST["search"]["value"]);  
                $this->db->or_like("phoneNumber", $_POST["search"]["value"]);  
                $this->db->or_like("createdAt", $_POST["search"]["value"]);  
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

      function action()  
      {  
          $id=$_POST["id"];
          $status=$_POST["status"];
          if($status==-1 or $status==0 ){
              $data = array( 
                'status'  =>  1
              );
          }elseif ($status==1 ) {
            $data = array( 
                'status'  =>  -1
              );
          }
          $this->db->where('idUser', $id);
          $this->db->update('tabel_user', $data);
          return true; 
          }  

      function statistics (){
       $data['allusers'] =$this->db->count_all("tabel_user");
       $data['notactive'] =$this->db->where('status',0)->from("tabel_user")->count_all_results();
       $data['active'] =$this->db->where('status',1)->from("tabel_user")->count_all_results();
       $data['banned'] =$this->db->where('status',-1)->from("tabel_user")->count_all_results();
       return $data;
      }

    //--------------------------
    //--------------------------
    //User Model
    //--------------------------
    //--------------------------

      public function get_user()
      {

        $id=$this->session->userdata('user_id'); 
        $this->db->where('tabel_user.status !=','-1');
        $this->db->where('tabel_user.idUser',$id);
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

    public function update_User(){

        $id=$this->session->userdata('user_id');
        $subscribe='';
        if($_POST['subscribe']){

          foreach ($_POST['subscribe'] as $sub) {
            $subscribe.=$sub.'-';
          }
        }
        $data = array( 
          'name' =>  $_POST['name'],
          'phoneNumber' =>  $_POST['phone'].'',
          'address' =>  $_POST['address'].'',
          'location' =>  $_POST['location'].'',
          'subscribes' => $subscribe.''
        );

        $this->db->where('idUser',$id);
        $this->db->update($this->table, $data);
        return true;
    }

    public function update_pwd(){

        $id=$this->session->userdata('user_id');
        $data = array( 
          'password' => md5($_POST['pwd'])
        );

        $this->db->where('idUser',$id);
        $this->db->update($this->table, $data);
        return true;
    }   

}
