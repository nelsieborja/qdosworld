<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	public function index()
	{
		// Load models, library
		$this->load->model('Category_model', 'category');
		$this->load->model('Subcategory_model', 'subcategory');
		$this->load->library('Messenger');
		
		$data = array();
		
		// Get categories
		$res = $this->category->get();
		if (!$res) {
			$this->messenger->error('No categories added yet');
		}
		
		foreach($res as $row){
			// Get sub-categories
			$sub_res = $this->subcategory->get_by_category($row['id']);
			if ($sub_res) {
				$row['subcategories'] = $sub_res;
			}

			$data[] = $row;
		}
		
		$this->messenger->success('', $data);
	}
}
