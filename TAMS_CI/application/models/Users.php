<?php
class Users extends CI_Model {
	
	private $TableName= 'users';
	
	function __construct()
	{
		parent::__construct();
	}
	
	function list_all()
	{
		return $this->db->get($this->TableName);
	}
	
	function count_all()
	{
		return $this->db->count_all($this->TableName);
	}
	
	// Returns paged list
	//
	// limit 		- max elements in list
	// begin 		- element into sorted list
	// column_name 	- column name for order by
	// order		- should contain only two values: ASC | DESC
	function get_paged_list($limit = 10, $offset = 0, $column_name = 'id', $order='ASC')
	{
		$query = sprintf("SELECT tams.users.id, RoleName, Name, Surname, Login, Password, Email, Balance 
						  FROM tams.users INNER JOIN tams.roles ON tams.users.role = tams.roles.id
						  ORDER BY tams.users.%s %s LIMIT 0%s OFFSET 0%s",
		mysql_real_escape_string($column_name),
		mysql_real_escape_string($order),
		mysql_real_escape_string($limit),
		mysql_real_escape_string($offset));
		
		return $this->db->query($query);
	}
	
	function get_by_id($id)
	{
		$this->db->where('id', $id);
		return $this->db->get($this->TableName);
	}
		
	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->TableName);
	}

	// TODO: insert, update

}
?>