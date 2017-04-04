<?php

/* 

trawl through the database and get a list of all the categories
then update the category tables. easy

*/

$main_cat = array();
$sub_cat = array();



include('connection.php');

$check_statement = $conn->prepare("SELECT * FROM courses");
$check_statement->execute();
		
//get the rows
$result = $check_statement->fetchAll();


if (count($result)== 0){
	echo ('didnt find any');
}else{
	foreach ($result as $row){
		
	if (!(in_array($row['main_cat'], $main_cat))) {
		array_push($main_cat,$row['main_cat']);
		insert_main($row['main_cat'],$conn);
	}
	
	if (!(in_array($row['sub_cat'], $sub_cat))) {
		array_push($sub_cat,$row['sub_cat']);
		//$sub_cat[$row['main_cat']]= $row['sub_cat'];
		insert_sub($row['sub_cat'],$row['main_cat'],$conn);
	}
	
		
	} //end for each
	
	var_dump ($main_cat);
	echo "<br>";
	echo "<br>";
	echo "<br>";
	
	var_dump ($sub_cat);
	
	
	
	
	
}// end if	
	
function insert_main($main,$conn){
	
	
	$stmt = $conn->prepare("
		INSERT INTO main_cat 
		(name) 
		VALUES 
		(:name)
		");
	
		$stmt->bindParam(":name", $main, PDO::PARAM_STR);
		
		
		
		$stmt->execute();
	
	
	
}

function insert_sub($sub,$main,$conn){
	
	
	$stmt = $conn->prepare("
		INSERT INTO sub_cat 
		(name,main) 
		VALUES 
		(:name,:main)
		");
	
		$stmt->bindParam(":name", $sub, PDO::PARAM_STR);
		$stmt->bindParam(":main", $main, PDO::PARAM_STR);
		
		
		$stmt->execute();
	
	
	
}

	


?>