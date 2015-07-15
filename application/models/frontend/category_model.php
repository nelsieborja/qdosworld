<?php
class Category_model extends CI_Model {

	var $tbl = 'category';
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get($id = NULL, $parent_category = NULL)
	{
		// $hook =& load_class('Hooks', 'core');
		// $hook->call_hook('HandleExceptions');
		
		if ($id) {
			$this->db->where('id', $id);
		}

		if ($parent_category) {
			$this->db->where('parent_category', $parent_category);
		}
		
		$query = $this->db->get($this->tbl);
		return $query->result_array();
	}

}