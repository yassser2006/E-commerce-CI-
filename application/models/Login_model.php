<?php
	/**
	 * 
	 */
	class Login_model extends CI_Model
	{
		
		public function __construct()
		{
			$this->load->database();
			$this->load->library('Uuid');
		}

		public function login($email,$pw){
			$this->db->where('email',$email);
			$this->db->where('password',$pw);
			$results=$this->db->get('tabel_user');
			if($results->num_rows() == 1){
				return $results;
			}else{
				return False;
			}
		}

	public function new_User($id){
		$ss=$this->ck_login->level_id();
		//die(print_r($_POST['subscribe']));
		$subscribe='';

		//die($subscribe);
        $data = array( 
          'idUser'=> $id,
          'name' =>  $_POST['name'],
		      'email' =>  $_POST['email'],
		      'password' =>  md5($_POST['pwd']),
          'level' => $ss['USER']
        );
        $this->db->insert('tabel_user', $data);
        return true;
    }

     public function get_subscribes($id){

          //$id=$this->session->userdata('user_id'); 
          $this->db->select('subscribes');
          $this->db->where('tabel_user.idUser',$id);
          $this->db->from('tabel_user');
          $query=$this->db->get();
          if ($query->num_rows() > 0) {
            $subscribes ='';
            $subscribe=array();
            foreach ($query->result() as $row) {
              $subscribes = $row->subscribes;
             // die(print_r($row));
            }
            //die(print_r($subscribes));
            $i=0;
            while(strlen($subscribes)>=1){
              $subscribe[$i] = substr($subscribes, 0, (stripos($subscribes, "-")));
              $subscribes = str_replace($subscribe[$i], '', $subscribes);
              $subscribes = substr($subscribes, 1); 
              $i++;
            } 
            return ($subscribe);
          }
          return false;
      }

      public function count_notification($subscribe,$id){

          //$id=$this->session->userdata('user_id'); 

          $this->db->where('tabel_notification.status',0);
          $this->db->where('tabel_notification.idUser',$id);
          $this->db->where('tabel_posting.idUser !=',$id);
          $this->db->where('tabel_posting.verification','1');
          $this->db->group_start();
          foreach ($subscribe as $sub) {
            $this->db->or_like('location',$sub);
          }
          $this->db->or_like('location','sijnuhbygvtfcrdxeszwaq');
         $this->db->group_end();
          $this->db->join('tabel_posting','tabel_posting.idPosting = tabel_notification.idPosting');
          $data['notifications']=$this->db->from('tabel_notification')->count_all_results();
        //die(print_r($data));
          return $data;
      }

}
