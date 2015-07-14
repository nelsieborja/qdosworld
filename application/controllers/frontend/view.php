<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends CI_Controller {
	
	public function __construct()
    {
		 parent::__construct();
		 
		// Load model, library
		$this->load->model($this->config->item('frontend_folder').'Product_model', 'product');
		$this->load->library('Breadcrumb');
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
		$res = $this->product->get($id);
		
		if (!$res) {
			show_error('Product not found!');
		}
		
		$row = $res[0];
		// $this->load->library('Debug', $row);
		

		if ($row['description']) {
			$row['description'] = preg_replace(array("/\r\n|\r|\n/"), array("<br/>"), $row['description']);
		}
		if ($row['specs']) {
			$row['specs'] = preg_replace(array("/\r\n|\r|\n/"), array("<br/>"), $row['specs']);
		}
		if ($row['images']) {
			$row['images'] = explode(",", $row['images']);
		}
		
		$data = $row;
		
		$breadcrumb = $this->breadcrumb->generate();
		
		$this->load->view($this->config->item('frontend_folder').'layout/header', array('breadcrumb' => $breadcrumb));
		$this->load->view($this->config->item('frontend_folder').'view', array('product' => $data));
		$this->load->view($this->config->item('frontend_folder').'layout/footer');
	}
}
