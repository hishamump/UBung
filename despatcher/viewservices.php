<?php
ob_start();
?>
<?php include '../header.php';
$username = $_SESSION['username'];?>
<style>
table, td, th {  
  border: 1px solid #ddd;
  text-align: center;
}

table {
  border-collapse: collapse;
  width: 80%;
}

th, td {
  padding: 15px;
}
</style>
<h2>My Services</h2>
<table>
    <tr>
        <th>Dispatcher ID</th>
        <th>Service</th>
        <th>Username</th>
        <th>Action</th>
    </tr>
<?php
    $query = "SELECT * FROM user WHERE UserName = '$username';" or die(mysqli_connect_error());
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_array($result)){
        $userID = $row['Id'];
    }
    $query2 = "SELECT * FROM dispatcherservice INNER JOIN service ON dispatcherservice.ServiceId = service.Id INNER JOIN user ON dispatcherservice.DispatcherId = user.Id";
    $result = $link->query($query2);
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" . $row['DispatcherId'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['UserName'] . "</td>";
            echo "<td><button onclick='window.location.href=\"updateservices.php?id=" . $row['DispatcherId'] . "&sid=" . $row['ServiceId'] . "\"'>Edit</button>";
            echo "</tr>";
        }
    }
?>
</table>
<?php include '../footer.php';?>

