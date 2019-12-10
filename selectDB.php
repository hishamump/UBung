<?php
   // to make a connection with database
	$link = mysqli_connect("localhost", "root","","ubung", "3306") or die(mysqli_connect_error());

	// to select the targeted database
	mysqli_select_db($link, "ubung") or die(mysqli_error());
	
	if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution with order by clause
$sql = "SELECT * FROM users " ;
?>