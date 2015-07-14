<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Breadcrumb {
		
	public function __construct()
    {
		$this->obj =& get_instance();
		$this->obj->load->helper('url');
		$this->obj->load->model($this->obj->config->item('frontend_folder').'Category_model','category');
	}
	
	public function generate()
    {
		$segments = $this->obj->uri->segment_array();
		
		// Remove last item from array
		$last_segments = array_pop($segments);
		
		$breadcrumb = array(
			anchor(base_url(), 'home')
		);
		$url = '';

		foreach ($segments as $segment) {
			$url .= $segment.'/';
			$name = $this->getName($segment);
			if ($name) {
				$breadcrumb[] = anchor(base_url().$url, $name);
			}
		}

		// Add removed last item from array as plain text
		$name = $this->getName($last_segments);
		if ($name) {
			$breadcrumb[] = $name;
		}
		
		return $breadcrumb;
	}
	
	private function getName($segment)
    {
		// Return if segment is not ID
		if (!preg_match("/\d/", $segment)) {
			return $segment;
		}
		
		$res = $this->obj->category->get($segment);
		if ($res) {
			return $res[0]['name'];
		}
		
		return false;
	}

}