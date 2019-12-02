<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enter User Data</title>
</head>
<?php include 'dataConnection.php';?>
<body>
<?php include 'menu.php'; ?>
<?php
    $Title="";
    foreach ($_POST["title"] as $selectedTitle){
       $Title  = $Title . "," . $selectedTitle;
    }
    $Title = ltrim($Title, ',');

    $Hobby = "";
    foreach ($_POST["hobby"] as $selectedHobby) {
        $Hobby = $Hobby . "," . $selectedHobby;
    }
    $Hobby = ltrim($Hobby, ',');

    $n = $_POST["name"];
    $a = $_POST["age"];
    $g = $_POST["gender"];
    $c = $_POST["comments"];
		
	$query = "insert into user (UName, Age, Gender, Title, Hobby, Comments) values 
            ('$n', $a, '$g', '$Title', '$Hobby',  '$c')" 
	or die(mysqli_connect_error());

    // to run sql query in database
    $result = mysqli_query($link, $query);

    //Check whether the insert was successful or not
	if($result) 
    {
        echo("Data inserted successfully");
    }
    else 
    {
        die("Insert failed" . mysqli_error($link));
    }
?>

<h2>Your Input:</h2>
    <table border="1">
        <tr>
            <td>Name:</td>
            <td>
                <?php
                    echo $_POST["name"];
                ?>
            </td>
        </tr>
        <tr>
            <td>Age:</td>
            <td>
                <?php
                    echo $_POST["age"];
                ?>
            </td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td>
                <?php
                    echo $_POST["gender"];
                ?>
            </td>
        </tr>
        <tr>
            <td>Title:</td>
            <td>
                <?php
                    foreach ($_POST["title"] as $checked)
                    {
                        echo $checked ."<br>";
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>Hobby:</td>
            <td>
                <?php
                    foreach ($_POST["hobby"] as $select)
                    {
                        echo $select ."<br>";
                    }
                ?>                
            </td>
        </tr>
        <tr>
            <td>Comments:</td>
            <td>
                <?php
                    echo $_POST["comments"];
                ?>
            </td>
        </tr>
    </table>
</body>
</html>