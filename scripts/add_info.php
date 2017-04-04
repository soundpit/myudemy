<?php

error_reporting(E_ERROR | E_PARSE);

if (isset($_POST['id']))	{
	//echo $_POST['id'];
}else{
	echo "no id";
	die();
}

//now get the course info. :)

include('connection.php');

$statement = $conn->prepare("select `url`,`duration` from courses where id = :id");
$statement->bindParam(':id',$_POST['id'],PDO::PARAM_STR);
$statement->execute();
$row = $statement->fetch();

//echo "nope!";
//exit;

if ($row['duration'] > 0){
	echo "allready full";
	exit;
}



$url =  $row['url'];

$contents = file_get_contents($url);

if (!$contents){
	
	return "contents";
	exit;
}else{
	//echo "contents here!";
	//echo "<br><br>";
}

//now to get the parts i need
$dom = new DOMDocument;
$dom->loadHTML($contents);
$xpath = new DOMXPath($dom);

$results = $xpath->query("//*[@class='curriculum-header-length']");

//echo trim($results[0]->nodeValue);



//this is where the update stuff went. 
//all i need is the duration. i will convert that to string.
//then convert that back to time.
//split the string into an array



$time =  explode(':',trim($results[0]->nodeValue));

//check length
if (sizeof($time) == 2){
	//add another 00 to the front
	array_unshift($time,"00");
};

//now calculate seconds
$seconds = $time[2];
$minutes = $time[1] * 60;
$hours .= $time[0] * 3600;

$total_seconds = $seconds + $minutes + $hours;

echo $total_seconds;

//$timestamp = strtotime($yourdatetime);

//You can then feed it into the date function:

//echo '<br>Hours: ' . date('h', $timestamp);  // Hours: 04
//echo '<br>Minutes: ' . date('i', $timestamp); // Minutes: 04
//echo '<br>Seconds: ' . date('s', $timestamp); // Seconds: 07




//prepare a statement
$stmt = $conn->prepare("
UPDATE courses SET 
duration = :duration
WHERE id=:id
");

$stmt->bindParam(":duration", $total_seconds, PDO::PARAM_INT);
$stmt->bindParam(":id", $_POST['id'], PDO::PARAM_STR);

$stmt->execute();



?>