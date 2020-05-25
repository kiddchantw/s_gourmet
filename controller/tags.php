<?php
class tags{   

	public $name;


	public function __construct($db){
		$this->conn = $db;
	}	
	

	public function addTag()
	{
		// echo "addtag <br>";
		try {
			$add_tagname = $this->name;
		// echo "$add_tagname";
			$query_insert  = "insert into tags (`name`) values ('".$add_tagname."')";
		// echo "$query_insert";
			$stmt = $this->conn->prepare($query_insert);
			$stmt->execute();
		} catch ( PDOException $e) {
			echo $e->getMessage();
		}
		
		// if($stmt->execute()){
			// return true;
		// }
		// return false;
	}
}
?>