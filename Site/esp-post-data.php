<?php
	include_once('esp-database.php');
	$api_key_value = "tPmAT5Ab3j7F9";
	$api_key= $accx = $accy = $accz = $minaccx = $minaccy = $minaccz= $maxaccx = $maxaccy = $maxaccz = $rmsx = $rmsy = $rmsz ="";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$api_key = test_input($_POST["api_key"]);
		if($api_key == $api_key_value) {
			$accx = test_input($_POST["accx"]);
			$accy = test_input($_POST["accy"]);
			$accz = test_input($_POST["accz"]);
			$minaccx = test_input($_POST["minaccx"]);
			$minaccy = test_input($_POST["minaccy"]);
			$minaccz = test_input($_POST["minaccz"]);
			$maxaccx = test_input($_POST["maxaccx"]);
			$maxaccy = test_input($_POST["maxaccy"]);
			$maxaccz = test_input($_POST["maxaccz"]);
			$rmsx = test_input($_POST["rmsx"]);
			$rmsy = test_input($_POST["rmsy"]);
			$rmsz = test_input($_POST["rmsz"]);
			$result = insertReading($accx, $accy, $accz, $minaccx, $minaccy, $minaccz, $maxaccx, $maxaccy, $maxaccz, $rmsx, $rmsy, $rmsz);
			echo $result;
		}
		else {
			echo "Wrong API Key provided.";
		}
	}
	else {
		echo "No data posted with HTTP POST.";
	}
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
