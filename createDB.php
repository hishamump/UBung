<?php
$link = mysqli_connect("localhost", "root", "", "", "3307");
if (!$link) {
    die('Could not connect: ' . mysqli_connect_error());
}
//==================================
$sql = "CREATE DATABASE UBung";
if (mysqli_query($link, $sql)) {
    echo "Database UBung created successfully\n";
} else {
    echo 'Error creating database: ' . mysqli_error($link) . "<br>";
}
mysqli_select_db($link, "UBung") or die(mysqli_connect_error());
//==================================User
$sql = "CREATE TABLE User (
    Id INT AUTO_INCREMENT, 
    UserName VARCHAR(100), 
    Password VARCHAR(100), 
    Address  VARCHAR(200),
    Phone VARCHAR(15), 
    Email VARCHAR(100), 
    Role VARCHAR(10), 
    Status BOOLEAN, 
    PRIMARY KEY(Id))";
if (mysqli_query($link, $sql)) {
    echo "Table User created successfully\n";
} else {
    echo 'Error creating table: ' . mysqli_error($link) . "<br>";
}
//==================================Service
$sql = "CREATE TABLE Service (
    Id INT AUTO_INCREMENT, 
    Name VARCHAR(100), 
    PRIMARY KEY(Id))";
if (mysqli_query($link, $sql)) {
    echo "Table Service created successfully\n";
} else {
    echo 'Error creating table: ' . mysqli_error($link) . "<br>";
}

//==================================Order
$sql = "CREATE TABLE Orders (
    Id INT AUTO_INCREMENT, 
    UserId INT NOT NULL, 
    RestaurantId INT NOT NULL, 
    DespatcherId  INT NOT NULL,
    Status BOOLEAN, 
    OrderDate DATE, 
    DeliveryDate DATE,  
    PRIMARY KEY(Id))";
if (mysqli_query($link, $sql)) {
    echo "Table Order created successfully\n";
} else {
    echo 'Error creating table: ' . mysqli_error($link) . "<br>";
}
// //==================================Anouncement
$sql = "CREATE TABLE Anouncement (
    Id INT AUTO_INCREMENT, 
    Title VARCHAR(100),
	Description VARCHAR(500),
    PRIMARY KEY(Id))";
if (mysqli_query($link, $sql)) {
    echo "Table Anouncement created successfully\n";
} else {
    echo 'Error creating table: ' . mysqli_error($link) . "<br>";
}

// //==================================Restaurant
$sql = "CREATE TABLE Restaurant (
    Id INT AUTO_INCREMENT, 
    Name VARCHAR(100), 
    OwnerId INT, 
    PRIMARY KEY(Id))";
if (mysqli_query($link, $sql)) {
    echo "Table Restaurant created successfully\n";
} else {
    echo 'Error creating table: ' . mysqli_error($link) . "<br>";
}

// //==================================Product
$sql = "CREATE TABLE Product (
    Id INT AUTO_INCREMENT, 
    Name VARCHAR(100), 
    RestaurantId INT, 
    Description VARCHAR(100), 
    Price Float,   
    FileUploads VARCHAR(100),
    PRIMARY KEY(Id))";
if (mysqli_query($link, $sql)) {
    echo "Table Product created successfully\n";
} else {
    echo 'Error creating table: ' . mysqli_error($link) . "<br>";
}

// //==================================Voucher
$sql = "CREATE TABLE Voucher(
    Id INT AUTO_INCREMENT, 
    UserId INT NOT NULL,
	OrderId INT NOT NULL,
    PRIMARY KEY(Id),
	FOREIGN KEY(UserId) REFERENCES User(Id),
	FOREIGN KEY(OrderId) REFERENCES Orders(Id))";
if (mysqli_query($link, $sql)) {
    echo "Table Voucher created successfully\n";
} else {
    echo 'Error creating table: ' . mysqli_error($link) . "<br>";
}
// //==================================OrderDetails
$sql = "CREATE TABLE OrderDetails (
    OrderId INT, 
    ProductId INT,
	Quantity INT NOT NULL,
	Price FLOAT, 
    PRIMARY KEY(OrderId, ProductId),
	FOREIGN KEY(OrderId) REFERENCES Orders(Id),
	FOREIGN KEY(ProductId) REFERENCES Product(Id))";
if (mysqli_query($link, $sql)) {
    echo "Table OrderDetails created successfully\n";
} else {
    echo 'Error creating table: ' . mysqli_error($link) . "<br>";
}



//Please continue adding your tables' scripts here
//And finally we close the connection to the MySQL server
mysqli_close($link);
?>
