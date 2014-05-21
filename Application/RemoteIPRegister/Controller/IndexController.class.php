<?php
namespace RemoteIPRegister\Controller;
use Think\Controller;

function get_real_ip() {
	return $_SERVER['HTTP_X_FORWARDED_FOR'];
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
	else if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		echo '111';
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	}
	else if (!empty($_SERVER['REMOTE_ADDR'])) {
		$ip = $_SERVER['REMOTE_ADDR'];
		echo '333';
	}
	else {
		$ip = None;
	}

	return $ip;
}

class IndexController extends Controller {
	public function index() {
	}

	public function registerIP() {
		if (!IS_POST) {
			//TODO:
		}
	}


}

?>