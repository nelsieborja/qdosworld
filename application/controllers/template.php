<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller {

	public function categorylist()
	{
		$this->load->view('layout/categorylist');
	}
}
