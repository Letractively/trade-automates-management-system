<?php
class Transactions extends CI_Model {
	
	private $TableName= 'transactions';
	
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
		$query = sprintf("select 
							tams.transactions.id, 
							tams.transactions.product as 'ProductID', 
							tams.products.name as 'ProductName', 
							tams.transactions.amount, 
							tams.transactions.receivedMoney, 
							tams.transactions.change, 
							tams.transactions.automat 
							
							from tams.transactions INNER JOIN tams.products 
							ON tams.transactions.product=tams.products.id
							ORDER BY tams.transactions.%s %s LIMIT 0%s OFFSET 0%s",
							
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