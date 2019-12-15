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
<?php include 'menu.php'; ?>
<?php
    $Rname = $_POST["Rname"];
	$Name = $_POST["Name"];
    $email = $_POST["email"];
	$phone = $_POST["phone"];
		
	$query = "insert into Restaurant (Id, Rname, Name, email, phone) values 
            ('', '$Rname', '$Name', '$email', '$phone')" 
	or die(mysqli_connect_error());

    // to run sql query in database
    $result = mysqli_query($link, $query);

    //Check whether the insert was successful or not
	if($result) {
        echo("Data inserted successfully");
    }else {
        die("Insert failed!! " . mysqli_error($link));
    }
?>
</body>
</html>