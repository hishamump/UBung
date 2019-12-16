<?php
    include '../dataConnection.php';
    include '../selectDB.php'; 
?>
<?php
// //==================================Anouncement
$sql = "CREATE TABLE Announcement (
    Id INT AUTO_INCREMENT, 
    Title VARCHAR(100),
	Description VARCHAR(500),
    Image VARCHAR(500),
    UserId INT NOT NULL,
    ADate DATETIME NOT NULL,
    PRIMARY KEY(Id))";
if (mysqli_query($link, $sql)) {
    echo "Table Announcement created successfully<br>";
} else {
    echo 'Error creating table: ' . mysqli_error($link) . "<br>";
}
?>