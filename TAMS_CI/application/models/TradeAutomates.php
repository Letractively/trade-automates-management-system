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
	
	function get_top_ta($quantity) {
		$query = sprintf("select 
								tams.trade_automats.id as 'id',
								tams.trade_automats.Type,
								tams.trade_automats.SellAmount,
                				tams.users.Name as 'Owner'
								FROM tams.trade_automats
                    		INNER JOIN
                    			tams.users
                    			ON
                    			tams.trade_automats.Owner = tams.users.id
								ORDER BY tams.trade_automats.SellAmount DESC LIMIT %s
		
		
		", mysql_real_escape_string($quantity));
		
		return $this->db->query($query);
	}
	function get_selling_list_by_ta_id($id) {
		$query = sprintf("select 
								tams.trade_automats.id as 'id',
								tams.trade_automats.Type,
								tams.tradelist.Quantity,
								tams.trade_automats.id,
								tams.products.Name,
								tams.products.Description,
								tams.products.Price,
								tams.products.Image
								FROM tams.trade_automats
							INNER JOIN
								tams.tradelist
								ON
								tams.trade_automats.id = tams.tradelist.AutomateId
                			INNER JOIN
								tams.products
								ON
								tams.tradelist.ProductId = tams.products.id
							WHERE tams.trade_automats.id= %s
                GROUP BY tams.products.id
		
		", mysql_real_escape_string($id));
		
		return $this->db->query($query);
		
	}
	
	function get_all_ta_transactions($id) {
		$query = sprintf("select 
								tams.trade_automats.id as 'taid',
								tams.transactions.id as 'id',
								tams.transactions.amount,
								tams.transactions.receivedMoney,
								tams.transactions.change,
								tams.products.Name,
								tams.products.Price,
								tams.products.Image
								FROM tams.trade_automats
							INNER JOIN
								tams.transactions
								ON
								tams.trade_automats.id = tams.transactions.automat
                			INNER JOIN
								tams.products
								ON
								tams.transactions.product = tams.products.id
							WHERE tams.trade_automats.id= %s
                GROUP BY tams.transactions.id
		
		", mysql_real_escape_string($id));
		
		return $this->db->query($query);
		
	}
	
	/* List all TA whos owner is $owner
	 *
	 * @author roman
	 */
	function list_all_by_owner ($owner, $limit = 10, $offset = 0, $column_name = 'id', $order='ASC')
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
							LEFT OUTER JOIN
							tams.location
							ON
							tams.trade_automats.Location = tams.location.id
							LEFT OUTER JOIN
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
							LEFT OUTER JOIN
							tams.location
							ON
							tams.trade_automats.Location = tams.location.id
							LEFT OUTER JOIN 
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
		$query = sprintf("select 
							tams.trade_automats.id, 
							tams.trade_automats.Type,
							tams.trade_automats.Owner,
							tams.trade_automats.Cash,
							tams.trade_automats.Service,
							tams.trade_automats.Location,
							tams.trade_automats.SellAmount,
							tams.trade_automats.RegistrationDate,
							tams.trade_automats.Status,
							tams.trade_automats.IsWorking,
							tams.status.NoGoods,
							tams.status.FullCashStorage,
							tams.status.Fault
							from 
							tams.trade_automats
							INNER JOIN 
							tams.status
							ON
							tams.trade_automats.Status = tams.status.id


							WHERE tams.trade_automats.id=%s",

		mysql_real_escape_string($id));
		
		return $this->db->query($query);
	}
		
	function TradeAutomatBelongToUser($UserID, $TradeAutomatID)
	{
		$query = sprintf("select * from trade_automats where Owner = %s and id = %s", 
		mysql_real_escape_string($UserID),
		mysql_real_escape_string($TradeAutomatID));
		return $this->db->query($query);
	}
	
	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->TableName);
	}

	function insert($id, $type, $Owner, $Service)
	{
		$query = sprintf("insert into trade_automats
				  (id, type, Owner, Service, RegistrationDate)
				  VALUES 
				  (%s, '%s', %s, %s, NOW())",
				  mysql_real_escape_string($id),
				  mysql_real_escape_string($type),
				  mysql_real_escape_string($Owner),
				  mysql_real_escape_string($Service));
		
		return $this->db->query($query);

	}

	// TODO: update

}
?>