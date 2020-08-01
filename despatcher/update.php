<?php include '../header.php'; ?>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="../index.php">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">OrderMain</li>
</ol>

<body>
    <?php
    $submit = '';
    if (isset($_POST['submit'])) {
        $submit = $_POST["submit"];
    }
    $uid = 0;
    if (isset($_GET['id'])) {
        $uid = $_GET["id"];
    }
    if ($submit == 'Update') {
        $uid = $_POST["id"];
        //Collect and save updateed information



        $name = $_POST["name"];
        $email = $_POST["email"];
        $status = $_POST["status"];

        $strSQL = "UPDATE user SET username='$name', email='$email', status='$status' WHERE id=$uid";

        $result = mysqli_query($link, $strSQL);
        if ($result) {
            echo ("Data updated successfully");
        } else {
            die("Update failed" . mysqli_error($link));
        }
    }


    if ($uid > 0) {
        $query = "SELECT * FROM user WHERE id = $uid " or die(mysqli_connect_error());

        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
    ?>
            <h3>Update <?php echo $row["UserName"] ?> Data</h3>
            <form action="update.php" method="POST">

                <div class="row">
                    <div class="col-md-2">
                        <h5>Name:</h5>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="name" value='<?php echo $row["UserName"]   ?>'>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <h5>Email:</h5>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="email" value='<?php echo $row["Email"] ?>'>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <h5>Status:</h5>
                    </div>
                    <div class="col-md-6">
                        <select name="status">
                            <option value="">Select...</option>
                            <option value="1" <?=$row['Status'] == '1' ? ' selected="selected"' : '';?>>Available</option>
                            <option value="0" <?=$row['Status'] == '0' ? ' selected="selected"' : '';?>>Not Available</option>
                        </select>
                    </div>
                </div>
                <input type="submit" name="submit" value="Update">
                <input type="hidden" id="" name="id" value='<?php echo $row["Id"] ?>'>
            </form>
    <?php
        } else {
            echo '<p style="background-color: #F0CCC4">User not found</p>';
        }
    } else {
        echo '<p style="background-color: #F0CCC4">Please provide user id</p>';
    }

    function isChecked($value, $compare)
    {
        if ($value == $compare) {
            return "checked";
        } else {
            return "";
        }
    }

    function isSelected($value, $compare, $word = '')
    {
        if ($word == '') {
            $word = 'selected';
        }
        if (strpos($value, $compare) !== false) {
            return $word;
        } else {
            return "";
        }
    }
    mysqli_close($link);
    ?>

    <?php include '../footer.php'; ?>
    