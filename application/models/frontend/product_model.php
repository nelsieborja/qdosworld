<?php
class Product_model extends CI_Model {
	
	var $tbl = 'product';
	
	public function __construct()
	{
			// Call the CI_Model constructor
			parent::__construct();
	}

	public function get($id = NULL, $category_id = NULL, $order_by = 'desc')
	{
		if ($id) {
			$this->db->where('id', $id);
		}
		if ($category_id) {
			$this->db->where('category_id', $category_id);
		}

		$this->db->order_by('id', $order_by);
		
        $query = $this->db->get($this->tbl);
		return $query->result_array();
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

	public function get_offers($limit = 10)
	{
		$this->db->where('isoffer', 1);
		$this->db->limit($limit);
		$this->db->order_by('id', 'desc');
		
        $query = $this->db->get($this->tbl);
		return $query->result_array();
	}

	public function get_discounted($limit = 10)
	{
		$this->db->where('discount !=', '');
		$this->db->limit($limit);
		$this->db->order_by('id desc', 'discount desc');
		
        $query = $this->db->get($this->tbl);
		return $query->result_array();
	}

}