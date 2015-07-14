<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {
	
	public function __construct()
    {
		 parent::__construct();
		 
		// Load model, library
		$this->load->model($this->config->item('frontend_folder').'Category_model', 'category');
		$this->load->library('Messenger');
	}
	
	public function index()
	{	
		// Get categories
		$res = $this->category->get();
	
		if (!$res) {
			$this->messenger->error('No categories added yet');
		}
		
		$menu = array();
		foreach($res as $row){
			$menu[$row['id']] = $row;
		}
		
		$added_as_children = array();
		foreach ($menu as $id => &$menu_item) { // note that we use a reference so we don't duplicate the array
			if (!empty($menu_item['parent_category'])) {
				$added_as_children[] = $id; // it should be removed from root, but we'll do that later

				if (!isset($menu[$menu_item['parent_category']]['children'])) {
					$menu[$menu_item['parent_category']]['children'] = array($id => &$menu_item); // & means we use the REFERENCE
				} else {
					$menu[$menu_item['parent_category']]['children'][$id] = &$menu_item; // & means we use the REFERENCE
				}
			}

			unset($menu_item['parent_category']); // we don't need parent_category any more
		}

		unset($menu_item); // unset the reference

		foreach ($added_as_children as $item_id) {
			unset($menu[$item_id]); // remove it from root so it's only in the ['children'] subarray
		}

		// $this->load->library('Debug', $menu);

		$this->messenger->success('', $menu);
	}
}
