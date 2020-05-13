<?php

// $servername = "127.0.0.1";
// $username = "root";
// $password = "1234";
// $dbname = "dbtest002";
// try {
// 	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// 	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// 	echo "Connected successfully";
// } catch(PDOException $e) {
// 	echo "Connection failed from db : " . $e->getMessage();
// }



class Database{

    protected $servername = "127.0.0.1";
    protected $username = "root";
    protected $password = "1234";
    protected $dbname = "dbtest002";

    public function dbConnection(){

        try {
            $conn = new PDO("mysql:host=".$this->servername.";dbname=".$this->dbname, $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {
            echo "Connection failed from gourmet : " . $e->getMessage();
            exit;
        }
    }

}

?>