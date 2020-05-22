<?php
class Stores{   

	public $id;

	private $conn;


	public function __construct($db){
		$this->conn = $db;
	}	


	function get_all_tag(){
		$query_get_all_tag = " SELECT * from tags ";
		$stmt2 = $this->conn->prepare($query_get_all_tag);	
		$stmt2->execute();		
		return $stmt2;	
	}


	function readAll(){	
		//$query_read_all = "SELECT st.s_id `stores_id`,so.name `store_name`,so.Address `store_address` , group_concat(t.name separator ',') `tag_name`,so.google_map_url `gps` FROM storesXtags st LEFT JOIN tags t ON st.t_id = t.id LEFT JOIN stores so on so.id = st.s_id GROUP BY st.s_id ORDER BY count(st.s_id) DESC" ;

		$query_read_all = "" ;
		$query_read_part1 = "SELECT st.s_id `stores_id`,so.name `store_name`,so.Address `store_address` , group_concat(t.name separator ',') `tag_name`,so.google_map_url `gps` FROM storesXtags st LEFT JOIN tags t ON st.t_id = t.id LEFT JOIN stores so on so.id = st.s_id ";
		$query_read_part2 = "GROUP BY st.s_id ORDER BY count(st.s_id) DESC ";
		$query_id = $this->id;

		if ($query_id == 0){
			$query_where = "";
			$query_read_all = $query_read_part1.$query_read_part2 ;

		}else{
			$query_where = " where st.s_id = $query_id ";
			$query_read_all =  $query_read_part1.$query_where.$query_read_part2 ; 
		}



		$stmt = $this->conn->prepare($query_read_all);	
		$stmt->execute();
		return $stmt;
		
	}


}
?>