<?php
class tags{   

	public $name;

	public function __construct($db){
		$this->conn = $db;
	}	
	
	public function addTag()
	{
		// echo "addtag <br>";
		$return_message ="";
		try {
			$add_tagname = $this->name;
		// echo "$add_tagname";
			$query_insert  = "insert into tags (`name`) values ('".$add_tagname."')";
		// echo "$query_insert";
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
}
?>