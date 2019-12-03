<?php
//Connect to the database server.
    $link = mysqli_connect("localhost", "root", "", "", "3306");

    if (!$link) {
        die('Could not connect: ' . mysqli_connect_error());
    }
?>