<?php
include '../dataConnection.php';
include '../selectDB.php';
?>

<?php
//==================================Service
$sql = "ALTER TABLE Service
        ADD  DispatcherId INT NOT NULL";
if (mysqli_query($link, $sql)) {
    echo "DispatcherId column addedd to Service table successfully<br>";
} else {
    echo 'Error adding DispatcherId column: ' . mysqli_error($link) . "<br>";
}

//Please continue adding your tables' scripts here
//And finally we close the connection to the MySQL server
mysqli_close($link);
?>