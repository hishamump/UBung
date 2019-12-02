<?php
//First, connect to the MySQL server.

$link = mysqli_connect("localhost", "root", "", "", "3307");
if (!$link) {
    die('Could not connect: ' . mysqli_connect_error());
}

mysqli_select_db($link, "mydb") or die(mysqli_connect_error());

//Then, create a database named �mydatabase�.
$sql = "CREATE TABLE User (
    Id INT AUTO_INCREMENT, 
    UName VARCHAR(100), 
    Age INT, 
    Gender VARCHAR(1), 
    Title VARCHAR(10), 
    Hobby VARCHAR(100), 
    Comments VARCHAR(100), 
    Address VARCHAR(100), 
    PRIMARY KEY(Id))";


if (mysqli_query($link, $sql)) {
    echo "Table User created successfully\n";
} else {
    echo 'Error creating table: ' . mysqli_error($link) . "\n";
}

//And finally we close the connection to the MySQL server
mysqli_close($link);
?>
