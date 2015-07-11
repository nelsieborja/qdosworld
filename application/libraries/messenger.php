<?php 
class Messenger{
		
	function success($msg = '', $data = array()) {
		die(json_encode(
			array(
				'status'	=> 'SUCCESS',
				'data'		=> $data,
				'msg'		=> $msg
			)
		));
	}
	
	function error($msg = '', $data = array()) {
		die(json_encode(
			array(
				'status'	=> 'ERROR',
				'data'		=> $data,
				'msg'		=> $msg
			)
		));
	}
	
}