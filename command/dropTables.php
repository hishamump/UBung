<?php
include '../dataConnection.php';
include '../selectDB.php';
?>

<?php
//==================================Service
$sql = "DROP TABLE Service";
if (mysqli_query($link, $sql)) {
    echo "Service dropped successfully<br>";
} else {
    echo 'Error dropping Service: ' . mysqli_error($link) . "<br>";
}
//==================================Announcement
$sql = "DROP TABLE Announcement";
if (mysqli_query($link, $sql)) {
    echo "Announcement dropped successfully<br>";
} else {
    echo 'Error dropping Announcement: ' . mysqli_error($link) . "<br>";
}
//==================================Restaurant
$sql = "DROP TABLE Restaurant";
if (mysqli_query($link, $sql)) {
    echo "Restaurant dropped successfully<br>";
} else {
    echo 'Error dropping Restaurant: ' . mysqli_error($link) . "<br>";
}
//==================================Voucher
$sql = "DROP TABLE Voucher";
if (mysqli_query($link, $sql)) {
    echo "Voucher dropped successfully<br>";
} else {
    echo 'Error dropping Voucher: ' . mysqli_error($link) . "<br>";
}
//==================================OrderDetails
$sql = "DROP TABLE OrderDetails";
if (mysqli_query($link, $sql)) {
    echo "OrderDetails dropped successfully<br>";
} else {
    echo 'Error dropping OrderDetails: ' . mysqli_error($link) . "<br>";
}
//==================================DispatcherService
$sql = "DROP TABLE DispatcherService";
if (mysqli_query($link, $sql)) {
    echo "DispatcherService dropped successfully<br>";
} else {
    echo 'Error dropping DispatcherService: ' . mysqli_error($link) . "<br>";
}
//==================================DispatcherRating
$sql = "DROP TABLE DispatcherRating";
if (mysqli_query($link, $sql)) {
    echo "DispatcherRating dropped successfully<br>";
} else {
    echo 'Error dropping DispatcherRating: ' . mysqli_error($link) . "<br>";
}
//==================================Orders
$sql = "DROP TABLE Orders";
if (mysqli_query($link, $sql)) {
    echo "Orders dropped successfully<br>";
} else {
    echo 'Error dropping Orders: ' . mysqli_error($link) . "<br>";
}
//==================================Product
$sql = "DROP TABLE Product";
if (mysqli_query($link, $sql)) {
    echo "Product dropped successfully<br>";
} else {
    echo 'Error dropping Product: ' . mysqli_error($link) . "<br>";
}
//==================================User
$sql = "DROP TABLE User";
if (mysqli_query($link, $sql)) {
    echo "User dropped successfully<br>";
} else {
    echo 'Error dropping User: ' . mysqli_error($link) . "<br>";
}
//Please continue adding your tables' scripts here
//And finally we close the connection to the MySQL server
mysqli_close($link);
?>