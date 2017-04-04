<?php

//connects to the database

$db_name = "***";
$db_user = "***";
$db_pass = "***";
$db_server = "***";

try {
	$conn = new PDO("mysql:host=$db_server;dbname=$db_name",$db_user,$db_pass);
	//echo ('connected successfully2');
	//set some attributes
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch( PDOException $e){
	echo $e->getMessage();
}

?>