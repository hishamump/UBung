<?php
include '../dataConnection.php';
include '../selectDB.php';
?>

<?php
//==================================Announcement
$sql = "DROP TABLE Announcement";
if (mysqli_query($link, $sql)) {
    echo "Announcement dropped successfully<br>";
} else {
    echo 'Error dropping Announcement: ' . mysqli_error($link) . "<br>";
}
?>