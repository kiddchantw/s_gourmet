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

// $tnstores->id = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';

$result2 = $tnstores->get_all_tag();

$result = $tnstores->readAll();




// echo "<br>";
// var_dump($result2->num_row);


// echo "<br>";
// var_dump($result->num_row)


// echo $result->num_rows;


// if($result->num_rows > 0) {    
//     $itemRecords=array();
//     $itemRecords["items"]=array(); 


//     while ($item = $result->fetch_assoc()) {    

//         extract($item); 
//         $itemDetails=array(
//             "id" => $id,
//             // "stores_id" => $stores_id,
//             // "store_name" =>  $store_name
//             //        
//         ); 
//        array_push($itemRecords["items"], $itemDetails);
//     }    
//     http_response_code(200);     
//     echo json_encode($itemRecords);
// }else{     
//     http_response_code(404);     
//     echo json_encode(
//         array("message" => "No item found.")
//     );
// } 

?>