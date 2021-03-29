<?php
	$servername = "database-tcciot.cfnvlqhkm2l0.us-east-2.rds.amazonaws.com";
	$dbname = "datatcc";
	$username = "tcc";
	$password = "tcciot2021";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT id, accx, accy, accz, rmsx, rmsy, rmsz, reading_time FROM SensorData order by reading_time desc limit 40 ";

	$result = $conn->query($sql);

	while ($data = $result->fetch_assoc()){
		$sensor_data[] = $data;
	}

	$readings_time = array_column($sensor_data, 'reading_time');
	
	foreach ($readings_time as $reading){
		
		$readings_time[$i] = date("Y-m-d H:i:s", strtotime("$reading - 3 hours"));
		$i += 1;
	
}
	
	$accx = json_encode(array_reverse(array_column($sensor_data, 'accx')), JSON_NUMERIC_CHECK);
	$accy = json_encode(array_reverse(array_column($sensor_data, 'accy')), JSON_NUMERIC_CHECK);
	$accz = json_encode(array_reverse(array_column($sensor_data, 'accz')), JSON_NUMERIC_CHECK);
	$rmsx = json_encode(array_reverse(array_column($sensor_data, 'rmsx')), JSON_NUMERIC_CHECK);
	$rmsy = json_encode(array_reverse(array_column($sensor_data, 'rmsy')), JSON_NUMERIC_CHECK);
	$rmsz = json_encode(array_reverse(array_column($sensor_data, 'rmsz')), JSON_NUMERIC_CHECK);
	$id = json_encode(array_reverse(array_column($sensor_data, 'id')), JSON_NUMERIC_CHECK);
	$reading_time = json_encode(array_reverse($readings_time), JSON_NUMERIC_CHECK);
	$result->free();
	$conn->close();
?>