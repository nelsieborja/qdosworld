<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {
	
	var $menu = array();
	
	public function __construct()
    {
		 parent::__construct();
		 
		// Load model, library
		$this->load->model($this->config->item('frontend_folder').'Category_model', 'category');
		$this->load->library('Breadcrumb');
		$this->load->library('Messenger');
	}
	
	public function index()
	{
		$breadcrumb = $this->breadcrumb->generate();
		$this->get(false);
		
		$this->load->view($this->config->item('frontend_folder').'layout/header', array('breadcrumb' => $breadcrumb));
		$this->load->view($this->config->item('frontend_folder').'categories', array('categories' => $this->menu));
		$this->load->view($this->config->item('frontend_folder').'layout/footer');
	}
	
	public function get($request = true)
	{	
		// Get categories
		$res = $this->category->get();
	
		if (!$res) {
			$this->messenger->error('No categories added yet');
		}
		
		foreach($res as $row){
			$this->menu[$row['id']] = $row;
		}
		
		$added_as_children = array();
		foreach ($this->menu as $id => &$this->menu_item) { // note that we use a reference so we don't duplicate the array
			if (!empty($this->menu_item['parent_category'])) {
				$added_as_children[] = $id; // it should be removed from root, but we'll do that later

				if (!isset($this->menu[$this->menu_item['parent_category']]['children'])) {
					$this->menu[$this->menu_item['parent_category']]['children'] = array($id => &$this->menu_item); // & means we use the REFERENCE
				} else {
					$this->menu[$this->menu_item['parent_category']]['children'][$id] = &$this->menu_item; // & means we use the REFERENCE
				}
			}

			unset($this->menu_item['parent_category']); // we don't need parent_category any more
		}

		unset($this->menu_item); // unset the reference

		foreach ($added_as_children as $item_id) {
			unset($this->menu[$item_id]); // remove it from root so it's only in the ['children'] subarray
		}

		// $this->load->library('Debug', $this->menu);
		
		if ($request) {
			$this->messenger->success('', $this->menu);
		}
	}
}
