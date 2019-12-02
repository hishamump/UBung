<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View User Data</title>
</head>
<?php include 'dataConnection.php'; ?>

<body>
    <?php include 'menu.php'; ?>
    <?php
    $submit = '';
    if (isset($_POST['submit'])) {
        $submit = $_POST["submit"];
    }
    $uid = 0;
    if (isset($_GET['id'])) {
        $uid = $_GET["id"];
    }    
    if ($submit == 'Update'){
        $uid = $_POST["id"];
        //Collect and save updateed information
        $title="";
        if (isset($_POST['title'])){
            foreach ($_POST['title'] as $selectedTitle){
            $title  = $title . "," . $selectedTitle;
            }
        }
        $title = ltrim($title, ',');
    
        $hobby = "";
        if (isset($_POST['title'])){        
            foreach ($_POST["hobby"] as $selectedHobby) {
                $hobby = $hobby . "," . $selectedHobby;
            }
        }
        $hobby = ltrim($hobby, ',');
    
        $name = $_POST["name"];
        $age = $_POST["age"];
        $gender = $_POST["gender"];
        $comments = $_POST["comments"];        
        
        $strSQL = "UPDATE user SET UName='$name', Age=$age, Gender='$gender', Title='$title', Hobby='$hobby', Comments='$comments' WHERE id=$uid";
        $result = mysqli_query($link, $strSQL);
        if($result) 
        {
            echo("Data updated successfully");
        }
        else 
        {
            die("Update failed" . mysqli_error($link));
        }
    }


    if ($uid > 0) {
        $query = "SELECT * FROM user where Id = $uid " or die(mysqli_connect_error());

        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
    ?>
    <h3>Update <?php echo $row["UName"] ?> Data</h3>
    <form action="update.php" method="POST">
        <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" value ='<?php echo $row["UName"] ?>'></td>
            </tr>
            <tr>
                <td>Age:</td>
                <td><input type="text" name="age" value='<?php  echo $row["Age"] ?>'></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <input type="radio" name="gender" value="Male" <?php echo isChecked($row["Gender"], "M")?>>Male
                    <input type="radio" name="gender" value="Female" <?php echo isChecked($row["Gender"], "F")?>>Female
                </td>
            </tr>
            <tr>
                <td>Title:</td>
                <td>
                    <input type="checkbox" name="title[]" value="Prof" <?php echo isSelected($row["Title"], "Prof", "checked")?>>Prof
                    <input type="checkbox" name="title[]" value="Dr" <?php echo isSelected($row["Title"], "Dr", "checked")?>>Dr
                </td>
            </tr>
            <tr>
                <td>Hobby:</td>
                <td>
                    <select name="hobby[]" multiple>
                        <option value="reading" <?php echo isSelected($row["Hobby"], "reading")?>>reading</option>
                        <option value="swiming" <?php echo isSelected($row["Hobby"], "swiming")?>>swiming</option>
                        <option value="basketball" <?php echo isSelected($row["Hobby"], "basketball")?>>basketball</option>
                        <option value="football" <?php echo isSelected($row["Hobby"], "football")?>>football</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Comments:</td>
                <td><textarea name="comments" cols="30" rows="10"><?php echo $row["Comments"] ?></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Update"></td>
                <td></td>
            </tr>
        </table>
        <input type="hidden" id="" name="id" value='<?php echo $row["Id"]?>'>
    </form>
    <?php 
        }else{
            echo '<p style="background-color: #F0CCC4">User not found</p>';
        }
    }else{
        echo '<p style="background-color: #F0CCC4">Please provide user id</p>';
    }

    function isChecked($value, $compare){
        if ($value == $compare){
            return "checked";
        }else{
            return "";
        }
    }    

    function isSelected($value, $compare, $word = ''){
        if ($word == ''){
            $word = 'selected';
        }
        if (strpos($value, $compare) !== false){
            return $word;
        }else{
            return "";
        }
    } 
    mysqli_close($link);
    ?>
</body>

</html>