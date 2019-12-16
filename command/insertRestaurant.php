<?php
include '../constants.php';
include '../dataConnection.php';
include '../selectDB.php';
?>
<?php
$owners = false;
$sql = "
INSERT INTO `User`(`UserName`, `Password`, Address, Phone, Email, Role) 
VALUES 
('Maxis','123', 'UMP', '01112345678', 'maxis@gmail.com', '" . OWNER . "'),
('Kukus','123', 'Highway', '01112345678', 'kukus@gmail.com', '" . OWNER . "')
 ";
if (mysqli_query($link, $sql)) {
    echo "Owners inserted successfully<br>";
    $owners = true;
} else {
    echo 'Error inserting owners: ' . mysqli_error($link) . "<br>";
}

if ($owners) {
    $idMaxis = 0;
    $idKukus = 0;
    $query = "SELECT * FROM User where UserName = 'Maxis' " or die(mysqli_connect_error());
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $idMaxis = $row["Id"];
    }

    $query = "SELECT * FROM User where UserName = 'Kukus' " or die(mysqli_connect_error());
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $idKukus = $row["Id"];
    }

    if ($idMaxis > 0 and $idKukus > 0) {
        $sql = "
        INSERT INTO `Restaurant`(`RName`, `OwnerId`) 
        VALUES 
            ('Maxis'," . $idMaxis . "),
            ('Nasi Kukus'," . $idKukus . ")
        ";
        if (mysqli_query($link, $sql)) {
            echo "Restaurants inserted successfully<br>";
        } else {
            echo 'Error inserting Restaurants: ' . mysqli_error($link) . "<br>";
        }
    }else{
        echo 'No proper owners found: ' . mysqli_error($link) . "<br>";
    }
}
?>