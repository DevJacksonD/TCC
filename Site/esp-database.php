
<?php
	$servername = "database-tcciot.cfnvlqhkm2l0.us-east-2.rds.amazonaws.com";
	$dbname = "datatcc";
	$username = "tcc";
	$password = "tcciot2021";
	
	function insertReading($accx, $accy, $accz, $minaccx, $minaccy, $minaccz, $maxaccx, $maxaccy, $maxaccz, $rmsx, $rmsy, $rmsz) {
		global $servername, $username, $password, $dbname;
		

		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		
		$sql = "INSERT INTO SensorData (accx, accy, accz, minaccx, minaccy, minaccz, maxaccx, maxaccy, maxaccz, rmsx, rmsy, rmsz)
		VALUES ('" . $accx . "', '" . $accy . "', '" . $accz . "',  '" . $minaccx . "', '" . $minaccy . "', '" . $minaccz . "', '" . $maxaccx . "', '" . $maxaccy . "', '" . $maxaccz . "','" . $rmsx . "', '" . $rmsy . "', '" . $rmsz . "')";
		
		if ($conn->query($sql) === TRUE) {
			return "New record created successfully";
		}
		else {
			return "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}
	
	
	function getAllReadings($limit) {
		global $servername, $username, $password, $dbname;
		

		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		
		$sql = "SELECT id, accx, accy, accz, minaccx, minaccy, minaccz, maxaccx, maxaccy, maxaccz, rmsx, rmsy, rmsz, reading_time FROM SensorData order by reading_time desc limit " . $limit;
		if ($result = $conn->query($sql)) {
			return $result;
		}
		else {
			return false;
		}
		$conn->close();
	}
	function getLastReadings() {
		global $servername, $username, $password, $dbname;
		

		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		
		$sql = "SELECT id, accx, accy, accz, minaccx, minaccy, minaccz, maxaccx, maxaccy, maxaccz, rmsx, rmsy, rmsz, reading_time FROM SensorData order by reading_time desc limit " . $limit;
		if ($result = $conn->query($sql)) {
			return $result->fetch_assoc();
		}
		else {
			return false;
		}
		$conn->close();
	}
	
	
?>
