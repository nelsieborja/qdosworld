<?php
class Category_model extends CI_Model {

	public function __construct()
	{
			// Call the CI_Model constructor
			parent::__construct();
			// $this->CI =& get_instance();
	}

	public function get()
	{
		// $hook =& load_class('Hooks', 'core');
		// $hook->call_hook('HandleExceptions');

		$query = $this->db->get('category');
		return $query->result_array();
	}

}