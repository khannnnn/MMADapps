<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require 'control.php';
$obj = new Control();
$arr = array();

$data = json_decode(file_get_contents("php://input"));
$name = $data->name;
$mobile = $data->mobile;
$address = $data->address;
//$obj->insertData($name, $mobile, $address);
if (ctype_alpha(str_replace(' ', '', $name)) === true && $name != '') {
	if (strlen($mobile) == 10 ) {
		if ($address != '') {
			$obj->insertData($name, $mobile, $address);
			$data = 'Data Saved';
			$arr['success'] = $data;
			$arr['value'] = 1;
			echo json_encode($arr);
		}
		else{
			$data = 'Address should not empty';
			$arr['error'] = $data;
			$arr['value'] = 0;
			echo json_encode($arr);
		}
	}
	else{
		$data = 'Mobile should be number and 10 digits only.';
		$arr['error'] = $data;
		$arr['value'] = 0;
		echo json_encode($arr);
	}
	
}
else{
	$data = 'Name must contain letters and spaces only.';
	$arr['error'] = $data;
	$arr['value'] = 0;
	echo json_encode($arr);
}
?>