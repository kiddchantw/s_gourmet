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

		// echo "$delete_tagname";

		$return_message ="";
		try {
			$delete_tagname = $this->name;
			$query_delete  = 
			"delete from  tags where name = '".$delete_tagname."'";
				
			$result_row = $this->conn->exec($query_delete);
			// echo "testRow: ".$result_row;

			// $stmt = $this->conn->prepare($query_delete);
			// $stmt->execute();
			// $result_row = $stmt->rowCount();

			if ($result_row == 0) {
				$return_message = "delete tag not happen " ;
			}else{
				$return_message = "delete tag succuess: " ;
			}


		} catch ( PDOException $e) {
			// echo $e->getMessage();
			// $return_message = "something error";
			$return_message = $e->getMessage();
		}
		return $return_message;

	}	

	
	

}
?>