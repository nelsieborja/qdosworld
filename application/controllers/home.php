<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view($this->config->item('frontend_folder').'main', array('page' => 'home'));
	}
}
