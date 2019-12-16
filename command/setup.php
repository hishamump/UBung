<?php
    include '../dataConnection.php';
    include '../selectDB.php'; 
?>
<?php
$sql = "
INSERT INTO `User` (`UserName`, `Password`, `Address`, `Phone`, `Email`, `Role`, `Status`) 
VALUES (`Admin`, `123`, `UMP-Gambang`, `011487598`, `admin@ubung.com`, `Admin`, `1`) 
";
if (mysqli_query($link, $sql)) {
    echo "Table Announcement created successfully<br>";
} else {
    echo 'Error creating table: ' . mysqli_error($link) . "<br>";
}
?>