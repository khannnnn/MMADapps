<?php
class Control
{

	function __construct()
	{
		require 'model.php';
		$this->obj = new Model();
	}

	function createDataBase($servername, $username, $password, $dbname){
		$conn = new mysqli($servername, $username, $password);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "CREATE DATABASE $dbname";
		if ($conn->query($sql) === TRUE) {
		    echo "Database created successfully";
		} else {
		    echo "Error creating database: " . $conn->error;
		}

		$conn->close();
	}

	function createTable($servername, $username, $password, $dbname, $tablename){
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "CREATE TABLE $tablename (
		ID INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		Name VARCHAR(256) NOT NULL,
		Mobile int(11) NOT NULL,
		Address TEXT
		)";

		if ($conn->query($sql) === TRUE) {
		    echo "Table $tablename created successfully";
		} else {
		    echo "Error creating table: " . $conn->error;
		}

		$conn->close();
	}

	function insertData($name, $mobile, $address){
		$this->obj->insertData($name, $mobile, $address);
	}

	function fetchAllData(){
		$arr = array();
		$data = $this->obj->fetchAllData();
		if (!empty($data)) {
			return json_encode($data);
		}
		else{
			return json_encode($arr['error'] = 'Table is empaty.');
		}
	}
}
?>