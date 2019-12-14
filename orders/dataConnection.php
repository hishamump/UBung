<?php
//Connect to the database server.
    $link = mysqli_connect("localhost", "root", "", "ubung");

    if (!$link) {
        die('Could not connect: ' . mysqli_connect_error());
    }
?>