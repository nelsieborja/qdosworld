<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Debug {
	
	public function __construct($str = '', $is_die = true)
    {
        print "<pre>";
		print_r($str);
		print "</pre><br/>----------------------------<br/>";
		if ($is_die) die;
    }

}