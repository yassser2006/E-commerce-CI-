<?php
	/**
	 * 
	 */
	class Advert_model extends CI_Model
	{
		
		public function __construct()
		{
			$this->load->database();
      $this->load->library('Uuid');
		}


	  var $table = "tabel_ads"; 
      var $select_column = array("idAds","title", "description", "url", "createdAt");  
      var $order_column  = array(null,"title", "description", "url", "createdAt",null); 

      function make_query()  
      {  
      		$this->db->select($this->select_column);  
           $this->db->from($this->table); 
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("title", $_POST["search"]["value"]);  
                $this->db->or_like("description", $_POST["search"]["value"]); 
                $this->db->or_like("url", $_POST["search"]["value"]);  
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

      function delete()  
      {  
          $id=$_POST["id"];
          $filename='assets/images/ads/';
        
          unlink($filename.$id.'.png');
          $this->db->delete($this->table,array('idAds'=>$id));
			return true;
	  }

	  public function get_adv($id){
				$this->db->where('idAds',$id);
				$query=$this->db->get('tabel_ads');
				if ($query->num_rows() > 0) {
					foreach ($query->result() as $row) {
						$data[] = $row;
					}

					return $data;
				}
				return true;
		}

    public function update_adv(){
      $data = array( 
          'title' =>  $_POST['title'],
          'description' =>  $_POST['description'],
          'url' => $_POST['url']
      );
      $this->db->where('idAds', $_POST['id']);
      $this->db->update('tabel_ads', $data);
      return true;
    }

    public function insert_adv(){

      $id = $this->uuid->v4();
      $id = str_replace('-', '', $id);
      $data = array( 
          'idAds' => $id,
          'title' =>  $_POST['title'],
          'description' =>  $_POST['description'],
          'url' => $_POST['url']
      );
      $this->db->insert('tabel_ads', $data);
      return $id;
    }
}