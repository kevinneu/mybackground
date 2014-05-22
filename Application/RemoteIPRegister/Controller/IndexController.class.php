<?php
namespace RemoteIPRegister\Controller;
use Think\Controller;

function get_real_ip() {
	return $_SERVER['HTTP_X_FORWARDED_FOR'];
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
	else if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	}
	else if (!empty($_SERVER['REMOTE_ADDR'])) {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	else {
		$ip = None;
	}

	return $ip;
}

class IndexController extends Controller {
	public function index() {
		$db = M('remoteip');
				$data = array(
			    'ip' => '127.0.0.1',
			    'devicename' => 'test',
			    'devicedescription' => 'test description',
			    'lastupdate' => time()
				);
		$db->save($data);
		

	}

	public function registerIP() {
		if (!IS_POST) {
			//TODO:
		    echo 'Bad Parameters';
		}
		$devicename = I('post.devicename');
		$devicedescription = I('post.devicedescription');

		$clientip = get_real_ip();

		$db = M('remoteip');

		$device = $db->where(array('devicename' => $devicename))->find();

		if (!device) {
			//有记录，更新

		}
		else {
			//无记录，添加
			$data = array(
			    'ip' => $clientip,
			    'devicename' => $devicename,
			    'devicedescription' => $devicedescription,
			    'lastupdate' => time()
				);

			$db->save($data);
		}

		if (None == $clientip) {
			echo 'known ip';
		}
		else {
			echo $clientip;
		}
	}


}

?>