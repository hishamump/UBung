<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<?php include 'dataConnection.php';?>
<body>
    <?php include 'menu.php';?>
    <br>
    <form action="" method="POST">
        <span>Filter By Gender:</span>
        <select name="gender" onchange="this.form.submit();">
            <option value="M" <?php echo isSelected("M") ?>>Male</option>
            <option value="F" <?php echo isSelected("F") ?>>Femal</option>
        </select>
    </form>
    <br>
    <?php
    $gender = 'M';
    if(isset($_POST['gender'])) {
        $gender = $_POST["gender"];
    }
    
    //SQL query
    $query = "SELECT * FROM user where Gender = '$gender' " or die(mysqli_connect_error());

    $result = mysqli_query($link, $query);

    //Loop the recordset $rs
    echo "<table border='1'>";

    while ($row = mysqli_fetch_array($result)) {
        echo '
        
        <tr>
            <td>Name:</td>
            <td>' . $row["UName"] . '</td>
        </tr>
        <tr>
        <td>Age:</td>
        <td>' . $row["Age"] . '</td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td>' . $row["Gender"] . '</td>
        </tr>
        <tr>
            <td>Title:</td>
            <td>' . $row["Title"] . '</td>
        </tr>
        <tr>
            <td>Hobby:</td>
            <td>' . $row["Hobby"] . '</td>
        </tr>
        <tr>
            <td>Comments:</td>
            <td>' . $row["Comments"] . '</td>
        </tr>  
        <tr>
            <td style="background-color:purple">
                <button onclick="window.location.href = \'update.php?id=' . $row["Id"] . '\';">Edit</button>
            </td>
            <td style="background-color:purple">
                <button onclick="window.location.href = \'delete.php?id=' . $row["Id"] . '\';">Delete</button>
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

    function isSelected($value){
        $gender = 'm';
        if(isset($_POST['gender'])) {
            $gender = $_POST["gender"];
        }
        if ($value == $gender){
            return "selected";
        }else{
            return "";
        }
    }    
    ?>
</body>

</html>