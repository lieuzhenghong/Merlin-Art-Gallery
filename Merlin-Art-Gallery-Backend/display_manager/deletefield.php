<?php
	$mysqli = new mysqli("localhost", "root", "", "imageserver");
	if ($mysqli->connect_errno){
		printf('I cannot connect to the database  because: ' . $mysqli->connect_error);
		exit();
	}
	
	if(isset($_POST['pkey'])){
		$pkey = $_POST['pkey'];	
		$pkey = mysql_real_escape_string($pkey);
	}
	
	$sql = 'DELETE FROM setups WHERE pkey = '.$pkey.';';
	$result=$mysqli->query($sql); 
	if ($mysqli->error) { // add this check.
    	die('Invalid query: ' . $mysqli->error);
	}
	$location = "../../../images/";
	unlink($location.$pkey);
	
	while($row=$result->fetch_array()){ 
	
	}
	$result->free();
	$mysqli->close();
	
?>