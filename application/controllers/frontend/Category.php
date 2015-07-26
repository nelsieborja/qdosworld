<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	
	var $childs = array();
	
	public function __construct()
    {
		 parent::__construct();
		 
		// Load model, library
		$this->load->model($this->config->item('frontend_folder').'Product_model', 'product');
		$this->load->model($this->config->item('frontend_folder').'Category_model', 'category');
	}
	
	public function index()
	{
		// Get last URI as current category
		$current_category_name = $this->uri->segment($this->uri->total_segments());
		
		// Check if category page, then load categories instead of products
		if ($this->uri->total_segments() == 1 && $current_category_name == 'c') {
			// $this->load->view($this->config->item('frontend_folder').'main', array('page' => 'home'));
		
		// Show products
		} elseif ($this->uri->total_segments() >= 1 && $current_category_name != 'c') {
			$this->viewProducts($current_category_name);

		// Show not found page
		} else {
			show_404();
		}
	}
	
	public function viewProducts($current_category_name = NULL)
	{
		if (!$current_category_name) {
			show_404();
		}
		
		$data = array();
		
		// Get ID first
		$id = $this->category->get_by_name($current_category_name);
		
		// Check if category has children, then need to also get children's products
		$this->getChildren($current_category_name);
		if ($this->childs) {
			$current_category_name = array_unique($this->childs);
		}
		
		$res = $this->product->get_by_category($current_category_name);
		if ($res) {
			foreach($res as $row){
				if ($row['description']) {
					$row['description'] = preg_replace(array("/\r\n|\r|\n/"), array("<br/>"), $row['description']);
				}
				if ($row['specs']) {
					$row['specs'] = preg_replace(array("/\r\n|\r|\n/"), array("<br/>"), $row['specs']);
				}
				if ($row['images']) {
					$row['images'] = explode(",", $row['images']);
				}
				
				$row['url'] = preg_replace(array("/[\,\'\"\:\;]/", "/[\s\+\/]/"), array("", "-"), strtolower($row['name'])).'-'.$row['id'];
				
				$data[$row['id']] = $row;
			}
		}
		
		$this->load->view($this->config->item('frontend_folder').'main', array('page' => 'product', 'products' => $data));
	}
	
	private function getChildren($parent_id)
    {
		$res = $this->category->get_by_parent($parent_id);
		if ($res) {
			foreach($res as $row){
				$this->childs[] = $row['id'];
				$this->getChildren($row['id']);
			}
		}
		$this->childs[] = $parent_id;
	}
}
