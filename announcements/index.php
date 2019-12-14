<?php include '../header.php';?>
<a href="add.php">New Announcement</a>
<?php
    $gender = 'M';
    if(isset($_POST['gender'])) {
        $gender = $_POST["gender"];
    }
    
    //SQL query
    $query = "SELECT * FROM Announcement" or die(mysqli_connect_error());

    $result = mysqli_query($link, $query);

    //Loop the recordset $rs
    echo "<table>";

    while ($row = mysqli_fetch_array($result)) {
        echo '
        
        <tr>
            <td><h3>Title:</h3></td>
            <td>' . $row["Title"] . '</td>
        </tr>
        <tr>
            <td><h3>Description:</h3></td>
            <td>' . $row["Description"] . '</td>
        </tr>  
        <tr>
            <td style="background-color:purple">
                <button onclick="window.location.href = \'aUpdate.php?id=' . $row["Id"] . '\';">Edit</button>
            </td>
            <td style="background-color:purple">
                <button onclick="window.location.href = \'aDelete.php?id=' . $row["Id"] . '\';">Delete</button>
            </td>
        </tr>                 
        <tr>
            <td colspan = "2" style="background-color:grey">&nbsp;</td>
        </tr>           
        ';
    }
    echo "</table>";

    //Check whether the insert was successful or not
    if (!$result) {
        die("Query failed" . mysqli_error($link));
    }


    //Close the database connection
    mysqli_close($link);
?>
    
<?php include '../footer.php';?>