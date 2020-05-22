<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once '../model/dbconfig.php';
include_once '../controller/stores.php';

$database = new Database();
$db = $database->dbConnection();


$tnstores = new Stores($db);

$tnstores->id = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';

$result = $tnstores->readAll();
$resultRow = $result->rowCount();
if($resultRow > 0){
	$posts_array = [];
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		$post_data = [
			'id' => $row['stores_id'],
			'name' => $row['store_name'],
			'address' => $row['store_address'],
			'tags' => $row['tag_name'],		
			'gps' => $row['gps']
		];
		array_push($posts_array, $post_data);
	}

}
echo json_encode($posts_array);







?>