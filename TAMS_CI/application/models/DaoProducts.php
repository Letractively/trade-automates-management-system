<?php
class DaoProducts extends CI_Model {
	
	private $productTable= 'products';
	
	function __construct(){
		parent::__construct();
	}
	
	function get_best_selling_products($quantity=10) {
		$query = sprintf("	select 
                SUM(tams.transactions.amount) as 'items_sold',
								tams.products.Name								
								FROM tams.transactions
                    INNER JOIN
                    tams.products
                    ON
                    tams.transactions.product = tams.products.id
							GROUP BY tams.transactions.product
                ORDER BY `items_sold` DESC ,Name ASC LIMIT %s",
		 mysql_real_escape_string($quantity));
		
		return $this->db->query($query);
	}
	function list_all(){
		$this->db->order_by('Name','asc');
		return $this->db->get($productTable);
	}
	
	function count_all(){
		return $this->db->count_all($this->productTable);
	}
	
	function get_paged_list($limit = 10, $offset = 0){
		$this->db->order_by('Name','asc');
		return $this->db->get($this->productTable, $limit, $offset);
	}
	
	function get_by_id($id){
		$this->db->where('id', $id);
		return $this->db->get($this->productTable);
	}
	
	function save($product){
		$this->db->insert($this->productTable, $product);
		return $this->db->insert_id();
	}
	
	function update($id, $product){
		$this->db->where('id', $id);
		$this->db->update($this->productTable, $product);
	}
	
	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete($this->productTable);
	}
}
?>