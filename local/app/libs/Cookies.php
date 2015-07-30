<?php
namespace App\Libs;
use Request;
class Cookies{
	public function get(){
		$arr = array();
		foreach($_COOKIE as $one => $key){
			$one = (int)$one;
			if($one > 0){
				$arr[$one] = Request::cookie($one);
				Cookie($one, null, -1);
			}
		}

	$cook = serialize($arr);
	return $cook;
}
}