<?php
    include '../dataConnection.php';
    include '../selectDB.php'; 
?>
<?php
$sql = "
INSERT INTO User (UserName, Password, Address, Phone, Email, Role, Status) 
VALUES ('Admin', '123', 'UMP-Gambang', '011487598', 'admin@ubung.com', 'Admin', 1) 
";
if (mysqli_query($link, $sql)) {
    echo "Admin added successfully<br>";
} else {
    echo 'Error add admin: ' . mysqli_error($link) . "<br>";
}
?>