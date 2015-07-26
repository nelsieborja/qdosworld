<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function home()
	{
		$this->load->view($this->config->item('frontend_folder').'pages/home');
	}
	
}
