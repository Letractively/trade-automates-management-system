<?php
class TradeList extends CI_Model {
	
	private $TableName= 'tradelist';
	
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
	function get_paged_list($limit = 10, $offset = 0, $productID='id', $automateID='', 
							$predicat='and', $column_name = 'id', $order='ASC')
	{
	    $condition = '';
		if($productID != '')
		{
			$condition = sprintf("where tradelist.ProductId=%s", $productID);
		}
		if($automateID != '')
		{
			$automateCond='';
			if($condition != '')
			{
				$automateCond = sprintf("%s %s", $condition, $predicat);
			}
			else
			{
				$automateCond = 'where';
			}
			
			$condition = sprintf("%s tradelist.AutomateId=%s", $automateCond, $automateID);
		}
		
		$query = sprintf("select 
							tradelist.id,
							products.Name,
							products.Price,
							tradelist.Quantity,
							tradelist.ProductId,
							tradelist.AutomateId
							
							from tradelist INNER JOIN products ON tradelist.ProductId=products.id 
							%s
							ORDER BY tradelist.%s %s LIMIT 0%s OFFSET 0%s",
							
		mysql_real_escape_string($condition),					
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