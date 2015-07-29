<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct()
    {
		 parent::__construct();
		 
		 $this->load->library('producttpl');
	}
	
	public function index()
	{	
		$this->load->view($this->config->item('frontend_folder').'main', array(
			'page' => 'home', 
			'menu' => $this->menu->get(), 
			'latest_tpl' => $this->producttpl->generate(product_conversion($this->product->get_latest())),
			'offers_tpl' => $this->producttpl->generate(product_conversion($this->product->get_offers()))
		));
	}
}
