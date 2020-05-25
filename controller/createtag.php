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

$posts_array = [];
$result_message = "";
if(!empty($tagname)){
	$new_tag_item->name = $tagname;
	$result_message = $new_tag_item->addTag();

	$post_data = [
		'action' => "add tag name",
		'message' => $result_message
	];
	array_push($posts_array, $post_data);
}else{
	$post_data = [
		'action' => "add tag name",
		'message' => "please insert new tag name"
	];
	array_push($posts_array, $post_data);
}
echo json_encode($posts_array);


?>