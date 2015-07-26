<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	
	public function __construct()
    {
		 parent::__construct();
		 
		// Load model, library
		$this->load->model($this->config->item('frontend_folder').'Product_model', 'product');
		$this->load->model($this->config->item('frontend_folder').'Category_model', 'category');
	}
	
	public function index()
	{
		$this->load->view($this->config->item('frontend_folder').'main', array('page' => 'view'));
		
		/* $data = array();
		
		$details = explode('-', $this->uri->segment($this->uri->total_segments()));
		$id = array_pop($details);
		
		if (!preg_match("/\d/", $id)) {
			show_error('Product not found!');
		}
		
		// Get product
		$res = $this->product->get_by_id($id);
		
		if (!$res) {
			show_error('Product not found!');
		}
		
		$row = $res[0]; */
	}
	
}
