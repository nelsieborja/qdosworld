<?php 
class Debug{
		
	function Debug($str = '', $is_die = true) {
		print "<pre>";
		print_r($str);
		print "</pre><br/>----------------------------<br/>";
		if ($is_die) die;
	}

}