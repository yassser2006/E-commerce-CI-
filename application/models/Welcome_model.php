<?php
	/**
	 * 
	 */
	class Welcome_model extends CI_Model
	{
		
		public function __construct()
		{
			$this->load->database();
		}

		public function count_all_tables() {
			$data = [];
			$data['users']= $this->db->count_all("tabel_user");
			$data['offers']=$this->db->count_all("tabel_offer");
			$data['posts']= $this->db->count_all("tabel_posting");
			$data['ads']= $this->db->count_all("tabel_ads");
			return $data;
		}
	}