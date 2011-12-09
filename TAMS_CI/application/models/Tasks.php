<?php
class Tasks extends CI_Model {
	
	private $TableName= 'tasks';
	
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
	// offset 		- first element into sorted list
	// productID	- filter by product with such product ID. If not set - there will be no filtering by this param
	// automateID   - filter by product with such automate ID. If not set - there will be no filtering by this param
	// predicat 	- can be 'or'|'and'. Uses for filtering by productID, automateID. Default - and
	// column_name 	- column name for order by
	// order		- should contain only two values: ASC | DESC
	function get_paged_list($limit = 10, $offset = 0, $userID='', $automateID='', 
							$predicat='and', $column_name = 'id', $order='ASC')
	{
	    $condition = '';
		if($userID != '')
		{
			$condition = sprintf("where users.id=%s", $userID);
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
			
			$condition = sprintf("%s trade_automats.id=%s", $automateCond, $automateID);
		}
		
		$query = sprintf("select 
							tasks.CreationTime,
							location.city,
							location.street,
							location.coordinates,
							tasks.Description,
							users.name,
							trade_automats.id as 'TradeAutomatID',
							users.id as 'UserID'

							from 
							tasks
							INNER JOIN 
							trade_automats
							ON 
							tasks.TradeAutomatID=trade_automats.id
							LEFT OUTER JOIN 
							location
							ON
							trade_automats.location=location.id
							LEFT OUTER JOIN 
							users
							ON
							tasks.UserID = users.id
							%s
							ORDER BY tasks.%s %s LIMIT 0%s OFFSET 0%s",
							
		mysql_real_escape_string($condition),					
		mysql_real_escape_string($column_name),
		mysql_real_escape_string($order),
		mysql_real_escape_string($limit),
		mysql_real_escape_string($offset));
		
		return $this->db->query($query);
	}
	
	function get_by_id($id)
	{
		$query = sprintf("select * from Tasks where id = %s", mysql_real_escape_string($id));
		return $this->db->query($query);
	}
		
	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->TableName);
	}
	
	function insert($TradeAutomatID, $UserID, $Description)
	{
		$query = sprintf("insert into Tasks
						 (TradeAutomatID, UserID, Description, CreationTime)
						 VALUES
						 (%s, %s, '%s', NOW())",
						 mysql_real_escape_string($TradeAutomatID),
						 mysql_real_escape_string($UserID),
						 mysql_real_escape_string($Description));
						 
		return $this->db->query($query);
	}


	
	// TODO: insert, update

}
