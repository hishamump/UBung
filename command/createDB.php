<?php 
    include '../dataConnection.php'; 
    include '../dbName.php';
?>
<?php
$sql = "CREATE DATABASE " . DBNAME;
if (mysqli_query($link, $sql)) {
    echo "Database " . DBNAME . " created successfully<br>";
} else {
    echo 'Error creating database: ' . mysqli_error($link) . "<br>";
}
mysqli_close($link);
?>
