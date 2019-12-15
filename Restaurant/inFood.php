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
    <?php include 'menuFood.php';?>
    <form action="readFoodForm.php" method="POST">  
        <table>
            <tr>
                <td>Food Name:</td>
                <td><input type="text" name="Foodname"></td>
            </tr>
			<tr>
                <td>Price:</td>
                <td><input type="floatval" name="Price"></td>
            </tr>
			<tr>
                <td>Restaurant Name:</td>
                <td><input type="text" name="Restaurantname"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Submit"></td>
                <td></td>
            </tr>
        </table>
    </form>
</body>
</html>