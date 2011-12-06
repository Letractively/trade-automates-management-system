<?php
class DaoProducts extends CI_Model {
	
	private $productTable= 'products';
	
	function __construct(){
		parent::__construct();
	}
//	function DaoProducts(){
//		parent::Model();
//	}
//	function Product(){
//		parent::Model();
//	}
	
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
	
	function save($person){
		$this->db->insert($this->productTable, $person);
		return $this->db->insert_id();
	}
	
	function update($id, $person){
		$this->db->where('id', $id);
		$this->db->update($this->productTable, $person);
	}
	
	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete($this->productTable);
	}
}
?>