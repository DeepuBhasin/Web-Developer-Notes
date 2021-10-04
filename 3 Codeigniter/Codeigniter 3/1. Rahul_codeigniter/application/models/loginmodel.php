<?php
	Class Loginmodel extends CI_Model{
		public function login_valid($username,$password){
			$query=$this->db->where(['uname'=>$username,'pword'=>$password])->get('users');
			if($query->num_rows()>0){
				return $query->row()->id;
				// return true ;
				
			}else{
				return false;
			}
		}
	}

?>