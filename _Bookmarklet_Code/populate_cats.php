<?php

//gets the value of the main cat...checks it and then adds it if it exists

//ok it works...but
//it adds them all. so not sure how do fix it

function check_main ($conn,$main_cat){
	
	$check_statement = $conn->prepare("SELECT * FROM main_cat WHERE name ='$main_cat'");
	$check_statement->execute();
		
	//get the rows
	$result = $check_statement->fetchAll();

	if (count($result)== 0){
		//didn't find any..so add it
		insert_main($main_cat,$conn);
		
	}else{
		// do nothing because it is already there
	}
 }//end check main
 
 function check_sub ($conn,$sub_cat,$main_cat){
	
	$check_statement = $conn->prepare("SELECT * FROM sub_cat WHERE name ='$sub_cat'");
	$check_statement->execute();
		
	//get the rows
	$result = $check_statement->fetchAll();

	if (count($result)== 0){
		//didn't find any..so add it
		insert_sub($sub_cat,$main_cat,$conn);
		
	}else{
		// do nothing because it is already there
	}
 }//end check main

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