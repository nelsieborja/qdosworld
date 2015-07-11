<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('public_url()')) {
	function public_url() {
		return base_url().'public/frontend/';
	}
}