<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		require('frontend/offers.php');
		$offers = new Offers();
		$data = $offers->index();
		// $this->load->library('Debug', $data);

		$this->load->view($this->config->item('frontend_folder').'layout/header');
		$this->load->view($this->config->item('frontend_folder').'home', array('products' => $data));
		$this->load->view($this->config->item('frontend_folder').'layout/footer');
	}
}
