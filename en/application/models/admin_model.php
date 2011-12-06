<?php

class Admin_model extends CI_Model {
	function __construct()
	{

	}
	public function verify_user($email, $password)
	{
		$q = $this
			->db
			->where('Email', $email)
			//->where('Role', '1')
			->where('Password', sha1($password))
			//->where('Password', $password)
			->limit(1)
			->get('users');
			

//		echo sha1('qwerty');
//		echo '</br>';
		if ($q->num_rows > 0)
		{
			//echo '<pre>';
			//print_r($q->row());
			//echo '</pre>';
			return $q->row();
		}
		return false;
	}
}
