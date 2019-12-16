<?php
    include '../dataConnection.php';
    include '../selectDB.php'; 
?>
<?php
$sql = "
INSERT INTO User (UserName, Password, Address, Phone, Email, Role) 
VALUES 
    ('Ali', '123', 'UMP-Gambang', '011487598', 'Ali@ubung.com', 'Customer'),
    ('Kishno', '123', 'UMP-Gambang', '011487598', 'Kishno@ubung.com', 'Customer'),
    ('Zarif', '123', 'UMP-Gambang', '011487598', 'Zarif@ubung.com', 'Customer'),
    ('Chen', '123', 'UMP-Gambang', '011487598', 'Chen@ubung.com', 'Customer')
";
if (mysqli_query($link, $sql)) {
    echo "Customers inserted successfully<br>";
} else {
    echo 'Error inserting customers: ' . mysqli_error($link) . "<br>";
}
?>