<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {
	
	var $tbl = 'product';
	
	public function __construct()
	{
			// Call the CI_Model constructor
			parent::__construct();
	}
	
	public function get($where = array(), $limit = 0, $order = array('id' => 'desc'))
	{
		foreach($where as $key => $val) {
			$this->db->where($key, $val);
		}

		if ($limit) {
			$this->db->limit($limit);
		}
		
		foreach($order as $key => $val) {
			$this->db->order_by($key, $val);
		}
		
		$query = $this->db->get($this->tbl);
		return $query->result_array();
	}
	
	public function get_by_id($id = NULL)
	{		
		if (!$id) {
			return false;
		}

		return $this->get(array('id' => $id));
	}

	public function get_search($search = NULL)
	{
		if (!$search) {
			return false;
		}
		
		return $this->get(NULL, NULL, 'desc', $search);
	}

	public function get_by_category($category_id = NULL)
	{
		if (!$category_id) {
			return false;
		}
		
		if (is_array($category_id)) {
			return $this->get_by_categories($category_id);
		}
		
		return $this->get(NULL, $category_id);
	}

	public function get_by_categories($category_id_ids = NULL)
	{
		if (!$category_id_ids) {
			return false;
		}
		
		$this->db->where_in('category_id', $category_id_ids);
		$this->db->order_by('id', 'desc');
		
        $query = $this->db->get($this->tbl);
		return $query->result_array();
	}

	public function get_latest($limit = 6)
	{
		$this->db->limit($limit);
		$this->db->where('isoffer', '0');
		$this->db->where('discount', '');
		$this->db->order_by('id', 'desc');
		
        $query = $this->db->get($this->tbl);
		return $query->result_array();
	}

	public function get_offers($limit = 6)
	{
		$this->db->where('isoffer', 1);
		$this->db->limit($limit);
		$this->db->order_by('id', 'desc');
		
        $query = $this->db->get($this->tbl);
		return $query->result_array();
	}

	public function get_discounted($limit = 12)
	{
		$this->db->where('discount !=', '');
		$this->db->limit($limit);
		$this->db->order_by('id desc', 'discount desc');
		
        $query = $this->db->get($this->tbl);
		return $query->result_array();
	}

}