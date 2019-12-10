<?php include 'dataConnection.php'; ?>
<?php
//==================================
$sql = "DROP DATABASE UBung";
if (mysqli_query($link, $sql)) {
    echo "Database UBung dropped successfully<br>";
} else {
    echo 'Error dropping database: ' . mysqli_error($link) . "<br>";
}
?>