<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	
	public function __construct()
    {
		 parent::__construct();
		 
		// Load models
		$this->load->model($this->config->item('frontend_folder').'product_model', 'product');
		$this->load->model($this->config->item('frontend_folder').'category_model', 'category');
		
		// Load menu library
		$this->load->library('menu');
	}
	
	public function index()
	{
		$data = array();
		
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
		
		$data = product_conversion($res, true);
		$data = $data[0];
		
		$this->load->view($this->config->item('frontend_folder').'main', array('page' => 'view', 'product' => $data, 'menu' => $this->menu->get()));
	}
	
}
