<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offers extends CI_Controller {
	
	public function __construct()
    {
		 parent::__construct();
		 
		// Load model, library
		$this->load->model($this->config->item('frontend_folder').'Product_model', 'product');
		// $this->load->library('Messenger');
	}
	
	public function index()
	{
		$data = array();
		
		// Get offers
		$res = $this->product->get_offers(4);
	
		if (!$res) {
			$res = $this->product->get_discounted(4);
		}
		
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
		
		return $data;
	}
}