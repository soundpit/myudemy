<?php
include ('connection.php');

$checked = $_POST['whole_word'];

if ($checked === "true"){
	//crete the query
	$query =  "WHERE (title regexp '[[:<:]]".$_POST['query']."[[:>:]]' OR tutor regexp '[[:<:]]".$_POST['query']."[[:>:]]')";
}else{
	//submit the LIKE query
	$query =  "WHERE (title LIKE '%" . $_POST['query'] .  "%' OR tutor LIKE '%" . $_POST['query'] .  "%')";
}

//Manage sort order and display direction
$sort = $_POST['sort'];
$direction = $_POST['direction'];


if ($direction == "asc"){
	$direction = "ASC";
}else{
	$direction = "DESC";
}

//build the query
$sql = "SELECT * FROM courses $query ORDER BY $sort $direction";

//execute the statement and store the results
$check_statement = $conn->prepare($sql);
$check_statement->execute();
$result = $check_statement->fetchAll();

//check if results and loop through them to build the ouptut html
if (count($result)== 0){
	echo ('Couldn\'t find any courses.');
}else{
	foreach ($result as $row){
		echo build_block($row);
	} //end for each
}// end if

function build_block($row){
	
	$id = $row['id'];
	
	$build = 'scripts/get_details.php?url='.$row['url'].'';
	$block = "<div class='col-lg-3 col-md-4 col-sm-6 box'>";
	$block .= "<div class='inner_box clearfix shadow'>";
	$block .= "<a href='".$row['url']."' class='center-block' target='_blank'><img src='".$row['image']."'></a>";
	$block .= "<p class='title'><strong>".$row['title']."</strong></p>";
	$block .= "<p class='tutor'>".$row['tutor']."</p>";
	
	//now for the duration..convert it back.
	$time = $row['duration'];

	
	$hours = floor($time/3600);
	$minutes = floor(($time - ($hours * 3600)) /60);

	if ($hours < 2){
		$name = "hr";
	}else{
		$name = "hrs";
	}
	
	if ($minutes < 2){
		$namem = "min";
	}else{
		$namem = "mins";
	}
	
	$block .= "<p class='duration'>Duration: $hours$name, $minutes$namem</p>";
	$block .= "<input type='hidden' value='".$row['id']."' class='hidden_input' >";
	$block .= "</div>";
	$block .= "</div>";
	
	return $block;
}; // end build block