<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enter Restaurant Data</title>
</head>
<?php include 'dataConnection.php';?>
<body> 
<?php include 'menuFood.php'; ?>
<?php

	$f = $_POST["Foodname"];
	$p = $_POST["Price"];
	$r = $_POST["RName"];
		
	$query = "insert into Food (Id, Foodname, Price, RName) values 
            ('', '$f', '$p', '$r')" 
	or die(mysqli_connect_error());

    // to run sql query in database
    $result = mysqli_query($link, $query);

    //Check whether the insert was successful or not
	if($result) {
        echo("Your Purchase successfully");
    }else {
        die("Your Insert failed" . mysqli_error($link));
    }
?>
</body>
</html>