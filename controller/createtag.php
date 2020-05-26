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

$newTag = new Tags($db);
$dataInput = file_get_contents('php://input');
$jsonInput = json_decode($dataInput,true);
$tagname = $jsonInput["tagname"];

$resultMessage = "";

if (empty($tagname)){
	http_response_code(403);  
	$message ="please insert new tag name";
	responseMessage("add tag ",$message);
}

$newTag->name = $tagname;
$resultMessage = $newTag->addTag();
responseMessage("add tag ",$resultMessage);


//show response body
function responseMessage($act,$msg){
	$arrayResponse = [];
	$elementResponse = [
		'action' => $act ,
		'message' => $msg
	];
	array_push($arrayResponse, $elementResponse);
	echo json_encode($arrayResponse);
	exit;
}



?>