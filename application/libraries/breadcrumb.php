<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Breadcrumb {
	
	var $parents	= array();
	var $breadcrumb		= array();
	var $url			= '';
	
	public function __construct()
    {
		$this->obj =& get_instance();
		$this->obj->load->helper('url');
		$this->obj->load->model($this->obj->config->item('frontend_folder').'Category_model','category');
		
		// Defaults
		$this->breadcrumb = array(
			anchor(base_url(), 'home')
		);
	}
	
	public function generate($category_id = NULL)
    {
		// If category id is provided, need to manually fetch breadcrumb from DB; usually for product view only
		if ($category_id) {
		
			// Manually add "products" link
			$this->parents[] = "products";
			
			// Get parent
			$this->getParent($category_id);
			
			// Finally, add passed category
			$this->parents[] = $category_id;
			
			$this->loopGenerate($this->parents);
			
		} else {
			$segments = $this->obj->uri->segment_array();
			$this->loopGenerate($segments, false);
		}
		
		return $this->breadcrumb;
	}
	
	private function loopGenerate($segments, $all_anchor = true)
    {
		if (!$all_anchor) {
			// Remove last item from array
			$last_segments = array_pop($segments);
		}
		
		foreach ($segments as $segment) {
			$this->url .= $segment.'/';
			$name = $this->getName($segment);
			if ($name) {
				$this->breadcrumb[] = anchor(base_url().$this->url, $name);
			}
		}
		
		if (!$all_anchor) {
			// Add removed last item from array as plain text
			$name = $this->getName($last_segments);
			if ($name) {
				$this->breadcrumb[] = $name;
			}
		}
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
	
	private function getParent($id)
    {
		$res = $this->obj->category->get($id);
		// If result not empty and has parent
		if ($res && $parent_id = $res[0]['parent_category']) {
			$this->parents[] = $parent_id;
			
			$this->getParent($parent_id);
		}
	}

}