<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model {
	
	var $tbl = 'cart';
	
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
	
	public function get_by_signupid($signup_id = NULL)
	{
		if (!$signup_id) {
			return false;
		}

		return $this->get(array('signup_id' => $signup_id));
	}

}