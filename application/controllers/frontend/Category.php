<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	
	var $childs = array();
	
	public function __construct()
    {
		 parent::__construct();
	}
	
	public function index()
	{
		// Get last URI as current category
		$current_category = $this->uri->segment($this->uri->total_segments());
		
		// Check if category page, then load categories instead of products
		if ($this->uri->total_segments() == 1 && $current_category == 'c') {
			// $this->load->view($this->config->item('frontend_folder').'main', array('page' => 'home'));
		
		// Show products
		} elseif ($this->uri->total_segments() >= 1 && $current_category != 'c') {
			$this->viewProducts($current_category);

		// Show not found page
		} else {
			show_404();
		}
	}
	
	public function viewProducts($current_category = NULL)
	{
		if (!$current_category) {
			show_404();
		}
		
		$data = array();
		
		// Get ID first
		$res = $this->category->get_by_url($current_category);
		if (!$res || !isset($res[0]['id'])) {
			show_404();
		}
		
		// Check if category has children, then need to also get children's products
		$this->getChildren($res[0]['id']);
		if ($this->childs) {
			$current_category = array_unique($this->childs);
		}
		
		$this->load->library('producttpl');

		$this->load->view($this->config->item('frontend_folder').'main', array(
			'page' => 'product', 
			'menu' => $this->menu->get(),
			'products_tpl' => $this->producttpl->generate(product_conversion($this->product->get_by_category($current_category)))
		));
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
