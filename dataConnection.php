<?php
//Connect to the database server.
    $link = mysqli_connect("localhost", "root", "", "", "3307") or die(mysqli_connect_error());

    //Select the database.
    mysqli_select_db($link, "UBung") or die(mysqli_error($link));

?>