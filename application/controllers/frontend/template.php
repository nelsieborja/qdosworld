<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller {

	public function categoryList()
	{
		$this->load->view($this->config->item('frontend_folder').'layout/template/categorylist');
	}
	public function categoryLists()
	{
		$this->load->view($this->config->item('frontend_folder').'layout/template/categorylists');
	}
	public function productList()
	{
		$this->load->view($this->config->item('frontend_folder').'layout/template/productlist');
	}
	public function productView()
	{
		$this->load->view($this->config->item('frontend_folder').'layout/template/productview');
	}
}
