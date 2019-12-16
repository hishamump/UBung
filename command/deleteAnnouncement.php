<?php
include '../dataConnection.php';
include '../selectDB.php';
?>

<?php
//==================================Announcement
$sql = "DELETE FROM Announcement";
if (mysqli_query($link, $sql)) {
    echo "Announcement data deleted successfully<br>";
} else {
    echo 'Error deleting Announcement data: ' . mysqli_error($link) . "<br>";
}
?>