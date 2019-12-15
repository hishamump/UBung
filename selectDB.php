<?php
	include 'dbName.php';
 	include 'dataConnection.php';

	// to select the targeted database
	mysqli_select_db($link, DBNAME) or die(mysqli_error($link));
	
	if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution with order by clause
$sql = "SELECT * FROM user " ;
