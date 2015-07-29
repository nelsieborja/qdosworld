<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticate extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');
		
		// Load messenger library
		$this->load->library('messenger');

		// Load auth model
		$this->load->model($this->config->item('frontend_folder').'auth_model', 'auth');
		$this->load->model($this->config->item('frontend_folder').'cart_model', 'cart');
	}
	
	// Check for user login process
	public function signin()
	{
		$this->form_validation->set_rules('username', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');//|min_length[6]
		
		if ($this->form_validation->run() === false) {
			if ($this->session->userdata('logged_in')) {
				$this->messenger->success();
			} else {
				$this->messenger->error(validation_errors());
			}
		}

		$data = array(
			'username' => $this->input->post('username')
			// 'password' => $this->encrypt->encode($this->input->post('password'))
		);
		
		$res = $this->auth->get($data, 1);
		if (!$res) {
			$this->messenger->error('Invalid Username or Password');
		}

		if ($this->input->post('password') != $this->encrypt->decode($res[0]['password'])) {
			$this->messenger->error('Invalid Username or Password');
		}

		// Remember me checks
		if ($this->input->post('remember_me')) {
			$this->input->set_cookie('username', $this->input->post('username'), strtotime('+1 year'));
			$this->input->set_cookie('password', $this->encrypt->encode($this->input->post('password')), strtotime('+1 year'));

		} else {
			delete_cookie('username');
			delete_cookie('password');
		}
		
		$logged_in_data = $res[0];
		$logged_in_data['cart'] = array();
		
		// Get cart details
		$cart = $this->cart->get_by_signupid($logged_in_data['id']);
		if ($cart) {
			$logged_in_data['cart'] = $cart;
		}
		
		// Add user data in session
		$this->session->set_userdata('logged_in', $logged_in_data);
		
		$this->messenger->success();
	}
	
	public function logout()
	{
		// print_r($this->session->userdata('logged_in'));die;
		// $this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect(base_url(), 'refresh');
	}
	
}
