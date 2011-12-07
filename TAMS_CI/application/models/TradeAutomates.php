<?php
class TradeAutomates extends CI_Model {
	
	private $TableName= 'trade_automats';
	
	function __construct()
	{
		parent::__construct();
	}
	
	function list_all()
	{
		return $this->db->get($this->TableName);
	}
	
	/* List all TA whos owner is $owner
	 *
	 * @author roman
	 */
	function list_all_by_owner ($owner,$column_name = 'id', $order='ASC',$limit = 15, $offset = 0 )
	{
//		$this->db->where('Owner', $owner);
//		return $this->db->get($this->TableName);
	$query = sprintf("select 
							tams.trade_automats.id as 'TradeAutomatID', 
							tams.trade_automats.Type,
							tams.trade_automats.Owner as 'OwnerID',
							tams.users.Name    as  'OwnerName',
							tams.trade_automats.Location as 'LocationID',
							tams.location.city as 'City',
							tams.trade_automats.Cash,
							tams.trade_automats.Service,
							tams.trade_automats.SellAmount,
							tams.trade_automats.RegistrationDate,
							tams.trade_automats.Status as 'StatusID',
							tams.trade_automats.IsWorking,
							tams.status.NoGoods,
							tams.status.FullCashStorage,
							tams.status.Fault
							from 
							tams.trade_automats
							INNER JOIN
							tams.users
							ON
							tams.trade_automats.Owner = tams.users.id
							INNER JOIN
							tams.location
							ON
							tams.trade_automats.Location = tams.location.id
							INNER JOIN 
							tams.status
							ON
							tams.trade_automats.Status = tams.status.id


							WHERE Owner=%s
						ORDER BY `tams`.`trade_automats`.%s %s LIMIT 0%s OFFSET 0%s",

		mysql_real_escape_string($owner),
		mysql_real_escape_string($column_name),
		mysql_real_escape_string($order),
		mysql_real_escape_string($limit),
		mysql_real_escape_string($offset));
		
		return $this->db->query($query);
		
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
							tams.trade_automats.id as 'TradeAutomatID', 
							tams.trade_automats.Type,
							tams.trade_automats.Owner as 'OwnerID',
							tams.users.Name    as  'OwnerName',
							tams.trade_automats.Location as 'LocationID',
							tams.location.city as 'City',
							tams.trade_automats.Cash,
							tams.trade_automats.Service,
							tams.trade_automats.SellAmount,
							tams.trade_automats.RegistrationDate,
							tams.trade_automats.Status as 'StatusID',
							tams.trade_automats.IsWorking,
							tams.status.NoGoods,
							tams.status.FullCashStorage,
							tams.status.Fault
							from 
							tams.trade_automats
							INNER JOIN
							tams.users
							ON
							tams.trade_automats.Owner = tams.users.id
							INNER JOIN
							tams.location
							ON
							tams.trade_automats.Location = tams.location.id
							INNER JOIN 
							tams.status
							ON
							tams.trade_automats.Status = tams.status.id


						ORDER BY `tams`.`trade_automats`.%s %s LIMIT 0%s OFFSET 0%s",
							
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