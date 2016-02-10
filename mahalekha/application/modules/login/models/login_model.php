<?php
class Login_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}
	
	function checkLogin($uname, $pword) {
		$uname = $uname;
		$pword = md5($pword);
		
		// get info from database
		$info = $this->db->get_where('user', array('uname' => $uname, 'pword' => $pword));
		
		if ($info->num_rows() == 1)
			return TRUE;
	}
	
	function getUserId($uname, $pword) {
		$q = $this->db->gget_where('user', array('uname' => $uname, 'pword' => $pword));
		
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row):
				$id = $row['id'];
			endforeach;
			
			return $id;
		}
	}
	
}