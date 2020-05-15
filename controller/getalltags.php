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


$result = $tnstores->get_all_tag();

$resultRow = $result->rowCount();

// var_dump($resultRow);
// $stmt2 = $tnstores->conn->prepare(" SELECT * from tags ");	
// $stmt2->execute();			

// $resultRow = $stmt2->rowCount();

if($resultRow > 0){
	$posts_array = [];
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		$post_data = [
			'id' => $row['id'],
			'name' => $row['name'],
			'badget_type' => $row['badget_type']
		];
		array_push($posts_array, $post_data);
	}

}
echo json_encode($posts_array);




?>