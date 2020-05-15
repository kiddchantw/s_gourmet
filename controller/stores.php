<?php
class Stores{   

	private $conn;

	public function __construct($db){
		$this->conn = $db;
	}	


	function get_all_tag(){
		// $sql_get_all_tag = "select name `tagName` from tags";
		$stmt2 = $this->conn->prepare(" SELECT * from tags ");	
		$stmt2->execute();			
		// $result = $stmt2->get_result();		
		// var_dump($result->num_rows);
		// echo $stmt2->fetchColumn();

		$resultRow = $stmt2->rowCount();
		// var_dump($resultRow);
		// echo "<br>";
		if($resultRow > 0){
			$posts_array = [];
			while($row = $stmt2->fetch(PDO::FETCH_ASSOC)){
				$post_data = [
					'id' => $row['id'],
					'name' => $row['name'],
					'badget_type' => $row['badget_type']
				];
				array_push($posts_array, $post_data);
			}

		}
		echo json_encode($posts_array);



		// $result = $stmt2->fetch(PDO::FETCH_ASSOC);
		// var_dump($result);
		//$result2 = $stmt2->bind_result($name);		
		//return $result2;	
		//var_dump ($stmt2->fetch());

	}

	function readAll(){	
		$query_readall = "select st.s_id `stores_id`,so.name `store_name` , group_concat(t.name separator ',') `tag_name` from storesXtags st left join tags t on st.t_id = t.id left join stores so on so.id = st.s_id group by st.s_id order by count(st.s_id)" ;
		$stmt = $this->conn->prepare($query_readall);	

	// if($this->id) {		
	// 	$stmt = $this->conn->prepare($query_readall);

	// 	$stmt->bind_param("i", $this->id);	
	// 	echo "1";				
	// } else {
	// $query_readall = "select st.s_id `stores_id`,so.name `store_name` , group_concat(t.name separator ',') `tag_name` from storesXtags st left join tags t  on st.t_id = t.id left join stores so on so.id = st.s_id group by st.s_id order by count(st.s_id);";

	// 	$stmt = $this->conn->prepare($query_readall);	
	// 	echo "2";				

	// }		
		$stmt->execute();			
		var_dump($stmt);
		
		$result = $stmt->get_result();		
		return $result;	
	// if($stmt->rowCount() > 0){
		// while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

		// 		}
	// }
	}


}
?>