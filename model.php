<?php
/**
* 
*/
class Model
{
	
	function __construct()
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "mmadDB";

		$this->conn = new mysqli($servername, $username, $password, $dbname);
		if ($this->conn->connect_error) {
		    die("Connection failed: " . $this->conn->connect_error);
		} 
	}

	function insertData($name, $mobile, $address){
		$sql = "INSERT INTO employee (Name, Mobile, Address)
		VALUES ('$name', '$mobile', '$address')";
		//echo $mobile;

		if ($this->conn->query($sql) === TRUE) {
		    //echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $this->conn->error;
		}
	}

	function fetchAllData(){
		$arr = array();
		$sql = "SELECT * from employee";

		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$arr[] = array(
					'name' => $row['Name'],
					'mobile' => $row['Mobile'],
					'address' => $row['Address']
				);
			}
			return $arr;
		}
	}
}
?>