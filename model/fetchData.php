<?php
/*
*/



//json ok
$rawtxt2 = file_get_contents("foodtest001.json");
$json2 = json_decode($rawtxt2, true);
$mapifno = $json2["features"];

//v1 print ok
/*
foreach($mapifno as $key=>$value) {
	$index = $key ;
	var_dump($mapifno[$index]["properties"]["Title"]);
	echo "<br>";
	$mapURL = $mapifno[$index]["properties"]["Google Maps URL"];
	var_dump($mapURL);
	echo "<br>";
	$cid = parse_url($mapURL,PHP_URL_QUERY);
// var_dump($cid);
	parse_str($cid, $cidurl);
	var_dump($cidurl["cid"]);
// var_dump($_SERVER["QUERY_STRING"]);
// parse_url($mapURL,$_SERVER["cid"]) ;
// $_SERVER =  mapURL
	// echo $_GET["cid"] ;
	echo "<br>";
	var_dump($mapifno[$index]["properties"]["Location"]["Address"]);
	echo "<br>";
	var_dump($mapifno[$index]["properties"]["Location"]["Geo Coordinates"]["Latitude"]);
	echo "<br>";
	var_dump($mapifno[$index]["properties"]["Location"]["Geo Coordinates"]["Longitude"]);
	echo "<br>";echo "<br>";




}
*/


//v2 

$servername = "127.0.0.1";
$username = "root";
$password = "1234";
$dbname = "dbtest002";


try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	echo " db connect successfully";
	echo "<br>";
	echo "<br>";
	foreach ($mapifno as $key => $value) {
		$index = $key;
		$storesTitile = $mapifno[$index]["properties"]["Title"];
		trim($storesTitile,'' );
		var_dump($storesTitile);
		echo "<br>";
		$mapURL = $mapifno[$index]["properties"]["Google Maps URL"];
		var_dump($mapURL);
		echo "<br>";
		$cid = parse_url($mapURL, PHP_URL_QUERY);
		// var_dump($cid);
		parse_str($cid, $cidurl);
		$cid =  $cidurl["cid"];
		var_dump($cidurl["cid"]);
		// var_dump($_SERVER["QUERY_STRING"]);
		// parse_url($mapURL,$_SERVER["cid"]) ;
		// $_SERVER =  mapURL
		// echo $_GET["cid"] ;
		echo "<br>";
		$storesAddress = $mapifno[$index]["properties"]["Location"]["Address"];
		var_dump($storesAddress);
		echo "<br>";
		$storesLatitude = $mapifno[$index]["properties"]["Location"]["Geo Coordinates"]["Latitude"];
		var_dump($storesLatitude);
		echo "<br>";
		$storesLongitude = $mapifno[$index]["properties"]["Location"]["Geo Coordinates"]["Longitude"];
		var_dump($storesLongitude);
		echo "<br>";
		echo "<br>";
		$sql = "insert into stores (cid, name,Address,Latitude,Longitude,google_map_url) values ('$cid','$storesTitile','$storesAddress','$storesLatitude','$storesLongitude','$mapURL') on duplicate key update cid=$cid ";
		// $sql = "insert into stores (cid, name,Address,Latitude,Longitude,google_map_url) values ('10769310045630248032','Coffee Cafe 咖啡珈琲(巴黎小餐館)','700台湾台南市中西區樹林街二段290號','22.9865020','120.2014060','http://maps.google.com/?cid=10769310045630248032') on duplicate key update cid='10769310045630248032' ";

		// $sql = "insert into stores (cid, name,Address,Latitude,Longitude,google_map_url) values ($cid,$storesTitile,$storesAddress,$storesLatitude,$storesLongitude,$mapURL) on duplicate key update cid=$cid)";
		$conn->exec($sql);
	}
} catch (PDOException $e) {
	echo $sql . "<br>" . $e->getMessage();
}


echo "<br>";
echo "<br>";
