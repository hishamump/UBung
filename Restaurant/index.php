<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Restaurant Data</title>
</head>
<?php include 'dataConnection.php';?>
<body>
    <?php include 'menu.php';?>
    <form action="readForm.php" method="POST">  
        <table>
            <tr>
                <td>Restaurant Name:</td>
                <td><input type="text" name="Rname"></td>
            </tr>
			<tr>
                <td>Name:</td>
                <td><input type="text" name="Name"></td>
            </tr>
			<tr>
                <td>Email:</td>
                <td><input type="text" name="email"></td>
            </tr>
			<tr>
                <td>Phone:</td>
                <td><input type="text" name="phone"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Submit"></td>
                <td></td>
            </tr>
        </table>
    </form>
</body>
</html>