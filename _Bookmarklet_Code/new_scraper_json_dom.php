<?php

//increase max execution time of this script to 150 min:
ini_set('max_execution_time', 9000);
//increase Allowed Memory Size of this script:
ini_set('memory_limit','960M');


//decode the component
$dump = json_decode(($_GET['name']));

//include the connection
include('pdo_php.php');



try{
		
	//loop through the 16 records
	for  ($i=0;$i< count($dump);$i++){
		
	//declare the variables
	$title = $dump[$i][0];
	$tutor = $dump[$i][1];
	$url = $dump[$i][2];
	$image = $dump[$i][3];
	
	$url .= "overview";
	
	//checking for duplicates using url is iffy.
	//i might add a "overview" at the end.
		
			
	if (check_exists($conn,$url) === true){
		echo ("duplicate records!<br>");
	}else{
			
		//prepare a statement
		$stmt = $conn->prepare("
		INSERT INTO courses 
		(title,tutor,url,image) 
		VALUES 
		(:title,:tutor,:url,:image)
		");
	
		$stmt->bindParam(":title", $title, PDO::PARAM_STR);
		$stmt->bindParam(":tutor", $tutor, PDO::PARAM_STR);
		$stmt->bindParam(":url", $url, PDO::PARAM_STR);
		$stmt->bindParam(":image", $image, PDO::PARAM_STR);
	
		
		$stmt->execute();
			
		echo $title.'<br>';
		echo $tutor.'<br>';
		echo $url.'<br>';
		echo $image.'<br>';

		
		echo "success<br>";
		
		} //end else
} // end for 
	
}catch(PDOException $ex){
	echo $ex->getMessage();
}//end try/catch

		
function check_exists($conn,$url){
	
	//the first thing you do is check to see if
	//the record allready exists
	$check_statement = $conn->prepare("SELECT url FROM courses WHERE url=:url");
	$check_statement->bindParam(":url",$url,PDO::PARAM_STR);
	
	$check_statement->execute();
		
	//get the rows
	$result = $check_statement->fetchAll();	
	
	if (count($result)!= 0){
			return true;
	}else{
			return false;	
	}
		
}//end check exists
		



?>