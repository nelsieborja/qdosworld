<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

	var $tbl = 'category';
	
	public function __construct()
	{
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
	
	public function get_by_parent($id = NULL)
	{		
		if (!$id) {
			return false;
		}

		return $this->get(array('parent_category' => $id));
	}

	public function get_by_name($name = NULL)
	{		
		if (!$name) {
			return false;
		}

		return $this->get(array('name' => $name));
	}
	
	public function get_by_url($url = NULL)
	{		
		if (!$url) {
			return false;
		}

		return $this->get(array('url' => $url));
	}
	
	public function get_in_asc()
	{		
		return $this->get(array(), 0, array('id' => 'asc'));
	}

}