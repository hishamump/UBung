<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete User</title>
</head>
<?php include 'dataConnection.php'; ?>

<body>
    <?php include 'menu.php'; ?>
    <?php
    $uid = 0;
    if (isset($_GET['id'])) {
        $uid = $_GET["id"];
    }
    if ($uid > 0) {
        $query = "DELETE FROM user WHERE id = $uid"
            or die(mysqli_connect_error());
        // to run sql query in database
        $result = mysqli_query($link, $query);

        //Check whether the insert was successful or not
        if ($result) {
            echo ("User deleted successfully");
        } else {
            die("Deletion failed" . mysqli_error($link));
        }
    }
    ?>
</body>

</html>