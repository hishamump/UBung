<?php
//Connect to the database server.
    //Local
    $link = mysqli_connect("localhost", "root", "", "", "3306");

    //Server
    //$link = mysqli_connect("localhost", "ca17100", "ca17100", "ca17100");

    if (!$link) {
        die('Could not connect: ' . mysqli_connect_error());
    }
?>