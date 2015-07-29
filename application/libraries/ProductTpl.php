<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductTpl {
	
	public function __construct()
    {
		$this->obj =& get_instance();
	}
	
	public function generate($products)
	{
		$tpl = '';
		
		if (!$products) {
			return $tpl;
		}
		
		$tpl .= '<ul>';
		foreach($products as $row) {			
			$tpl .= '<li>';

			if (isset($row['thumbnail']) && $row['thumbnail']) {
				$tpl .= '<a href="/i/'.$row['url'].'" class="item">';
				$tpl .= '<img class="item-img" src="'.public_url().'/products/'.$row['thumbnail'].'" alt="" />';
				
			} else {
				$tpl .= '<a href="/i/'.$row['url'].'" class="item none">';
			}
			
			$tpl .= '</a>';
			$tpl .= '<span class="item-price abs">'.$row['price'].'<em>AED</em></span>';
			$tpl .= '<a class="btn-lg abs addcart-btn" data-addcart-id="'.$row['id'].'" data-addcart-img="'.public_url().'/products/'.((isset($row['thumbnail']) && $row['thumbnail'])?$row['thumbnail']:'default.png').'"><span class="glyphicon glyphicon-shopping-cart"></span></a>';
			$tpl .= '<p class="item-caption">'.$row['name'].'</p>';
			$tpl .= '</li>';
		}
		$tpl .= '</ul>';
		
		return $tpl;
	}
	
}
