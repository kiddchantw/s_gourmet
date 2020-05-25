<?php
class tags{   

	public $name;

	public function __construct($db){
		$this->conn = $db;
	}	
	

	public function addTag(){
		// echo "addtag <br>";
		$return_message ="";
		try {
			$add_tagname = $this->name;
			$query_insert  = "insert into tags (`name`) values ('".$add_tagname."')";
			$stmt = $this->conn->prepare($query_insert);
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




}
?>