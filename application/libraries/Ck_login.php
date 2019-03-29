<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ck_login 
{
	function level_id(){  
	    $data = [
	      'ADMIN'=> "Admin-y583s682r-5889-5791-AE8F-347F25FC0172",
	      'USER'=> "User-y583s682r-262B-5EB7-B609-E89FC7DC9699"
	    ];
	      return $data;
	  }

	  public function check_login($logged,$level_id){  
	  	
	   	if($logged && in_array($level_id, $this->level_id())){
	   		if($level_id=='Admin-y583s682r-5889-5791-AE8F-347F25FC0172'){
	   			return 'Admin';
		   	}elseif($level_id=='User-y583s682r-262B-5EB7-B609-E89FC7DC9699'){
		   		return 'User';
		   	}
	   	}else{
	   		return false;
	   	}
	    
	  }
}