<?php
class Product_model extends CI_Model {

	public function __construct()
	{
			// Call the CI_Model constructor
			parent::__construct();
	}

	public function get($category_id = NULL, $subcategory_id = NULL)
	{
		if ($category_id) {
			$this->db->where('category_id', $category_id);
		}
		if ($subcategory_id) {
			$this->db->where('subcategory_id', $subcategory_id);
		}
		
        $query = $this->db->get('product');
		return $query->result_array();
	}

}