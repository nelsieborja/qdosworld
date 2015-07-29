<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('public_url()')) {
	function public_url() {
		return base_url().'public/frontend/';
	}
}

if (!function_exists('generate_url()')) {
	function generate_url($str) {
		return preg_replace(array("/[\s\+\/]/", "/\&/", "/\'+[a-z]/", "/\+/"), array("-", "and", ""), strtolower($str));
	}
}

if (!function_exists('product_conversion()')) {
	function product_conversion($products = array(), $isFullName = false) {
		$converted = array();
		
		foreach($products as $product) {	
			if ($product['description']) {
				$product['description'] = preg_replace(array("/\r\n|\r|\n/"), array("<br/>"), $product['description']);
			}
			
			if ($product['specs']) {
				$product['specs'] = preg_replace(array("/\r\n|\r|\n/"), array("<br/>"), $product['specs']);
			}
			
			if ($product['images']) {
				$product['images'] = explode(",", $product['images']);
				list($file, $ext) = explode(".", $product['images'][0]);
				
				$filename = FCPATH.'public/frontend/products/'.$file.'-thumbnail.'.$ext;
				if (file_exists($filename)) {
					$product['thumbnail'] = $file.'-thumbnail.'.$ext;
				}
			}
			
			if (!isset($product['url']) || !$product['url']) {
				$product['url'] = generate_url($product['name']).'-'.$product['id'];
			}
			
			if (!$isFullName && (strlen($product['name']) > 35)) {
				$product['name'] = substr($product['name'], 0, 33).'...';
			}
			
			$converted[] = $product;
		}
		return $converted;
	}
}