<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once '../model/dbconfig.php';
include_once '../controller/tags.php';

$database = new Database();
$db = $database->dbConnection();

$new_tag_item = new Tags($db);
$input_data = file_get_contents('php://input');
$input_json = json_decode($input_data,true);
$tagname = $input_json["tagname"];

$result_message = "";

if (empty($tagname)){
	// http_response_code(403);  
	exit("403");

	$message ="please insert new tag name";
	responseMessage("add tag name",$message);

}

$new_tag_item->name = $tagname;
$result_message = $new_tag_item->addTag();
responseMessage("add tag name",$result_message);

//show response body
function responseMessage($act,$msg){
	$posts_array = [];
	$post_data = [
		'action' => $act ,
		'message' => $msg
	];
	array_push($posts_array, $post_data);
	echo json_encode($posts_array);
	exit;

}



?>