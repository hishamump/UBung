<?php
include '../constants.php';
include '../dataConnection.php';
include '../selectDB.php';
?>
<?php
    $idMaxis = 0;
    $idKukus = 0;
    $query = "SELECT * FROM Restaurant where RName = 'Maxis' " or die(mysqli_connect_error());
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $idMaxis = $row["Id"];
    }

    $query = "SELECT * FROM Restaurant where RName = 'Nasi Kukus' " or die(mysqli_connect_error());
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $idKukus = $row["Id"];
    }

    if ($idMaxis > 0 and $idKukus > 0) {
        $sql = "
            INSERT INTO `product`(`Name`, `RestaurantId`, `Description`, `Price`) 
            VALUES 
            ('Fried Chicken',1,'Delisious',5.5),
            ('Nasi Ayam',1,'Also Delisious', 4.5),
            ('Nasi goreng',1,'Very good', 3),
            ('Salad',1,'Sour',2),
            ('Soup',1,'Soft',1),
            ('Beef',2,'Delisious',5.5),
            ('Nasi Asam',2,'Also Delisious', 4.5),
            ('Asam Chicken',2,'Very good', 3),
            ('Salad',2,'Sweet',2),
            ('Soup',2,'Grainy',1)
        ";
        if (mysqli_query($link, $sql)) {
            echo "Products inserted successfully<br>";
        } else {
            echo 'Error inserting products: ' . mysqli_error($link) . "<br>";
        }
    }else{
        echo 'No proper restaurant found: ' . mysqli_error($link) . "<br>";
    }
?>