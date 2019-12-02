<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View User Data</title>
</head>
<?php include 'dataConnection.php';?>
<body>
    <?php include 'menu.php';?>
    <form action="readForm.php" method="POST">  
        <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Age:</td>
                <td><input type="text" name="age" id=""></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <input type="radio" name="gender" value="Male">Male
                    <input type="radio" name="gender" value="Female">Female
                </td>
            </tr>
            <tr>
                <td>Title:</td>
                <td>
                    <input type="checkbox" name="title[]" value="Prof">Prof
                    <input type="checkbox" name="title[]" value="Dr">Dr
                </td>
            </tr>
            <tr>
                <td>Hobby:</td>
                <td>
                    <select name="hobby[]" multiple>
                        <option value="reading">reading</option>
                        <option value="swiming">swiming</option>
                        <option value="basketball">basketball</option>
                        <option value="football">football</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Comments:</td>
                <td><textarea name="comments" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Submit"></td>
                <td></td>
            </tr>
        </table>
    </form>
</body>
</html>