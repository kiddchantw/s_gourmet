<?php
class tags{   

	public $name;

	private $conn;

	public function __construct($db){
		$this->conn = $db;
	}	
	

	public function addTag(){
		$return_message ="";
		try {
			$add_tagname = $this->name;
			//$query_insert  = "insert into tags (`name`) values ('".$add_tagname."')";
			$query_insert  = "insert into tags (`name`) values (:name_add)";
			$stmt = $this->conn->prepare($query_insert);
			$stmt->bindParam(':name_add', $add_tagname);
			$stmt->execute();
			$return_message = "add tag succuess";
		} catch ( PDOException $e) {
			// echo $e->getMessage();
			// $return_message = "something error";
			$return_message = $e->getMessage();
		}
		return $return_message;
	}


	public function deleteTag(){

		$return_message ="";
		$delete_tagname = $this->name;

		echo "$delete_tagname";

		$return_message ="";
		try {
			$delete_tagname = $this->name;
			$query_insert  = 
			"delete from  tags where name = '".$delete_tagname."'";
			$stmt = $this->conn->prepare($query_insert);
			$stmt->execute();
			var_dump($stmt->num_rows);

			$return_message = "delete tag succuess: row" .$stmt->num_rows;
		} catch ( PDOException $e) {
			// echo $e->getMessage();
			// $return_message = "something error";
			$return_message = $e->getMessage();
		}
		return $return_message;

	}	

	

	function responseMessage($msg){
		$posts_array = [];
		$post_data = [
			'action' => "add tag name",
			'message' => $msg
		];
		array_push($posts_array, $post_data);
		echo json_encode($posts_array);
		exit;
	}


}
?>