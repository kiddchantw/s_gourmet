<?php 

$rawtxt2 = file_get_contents("foodtest001.json");
$json2 = json_decode($rawtxt2,true);
$mapifno = $json2["features"];

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

?>