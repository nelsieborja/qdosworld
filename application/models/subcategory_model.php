<?php
class Subcategory_model extends CI_Model {

	public function __construct()
	{
			// Call the CI_Model constructor
			parent::__construct();
	}

	public function get_by_category($category_id)
	{
		$query = $this->db->get_where('subcategory', array('category_id' => $category_id));
		return $query->result_array();
	}

}