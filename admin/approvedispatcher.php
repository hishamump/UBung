<?php include '../header.php'; ?>
<?php CheckRole(ADMIN) ?>
<?php

if (isset($_GET['id']) && isset($_GET['a'])) {
    $uid = $_GET["id"];
    $approve = $_GET["a"];
    if ($approve == 0 or $approve == 1) {
        $strSQL = "UPDATE user SET Status=$approve WHERE id=$uid";
        $result = mysqli_query($link, $strSQL);
    }
}
$query = "SELECT * FROM user WHERE Role = '" . DESPATCHER . "'" or die(mysqli_connect_error());
$result = mysqli_query($link, $query);

?>
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Approve Dispatcher Request</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width: 20%">User Name</th>
                        <th style="width: 30%">Address</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>User Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </tfoot>

                <tbody>
                    <?php while ($result && $row = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?php echo $row["UserName"] ?></td>
                            <td><?php echo $row["Address"] ?></td>
                            <td><?php echo $row["Email"] ?></td>
                            <td>
                                <?php if (isset($row["Status"]) && (int)$row["Status"] === 0) { ?>
                                    <button class="btn btn-primary" onclick="window.location.href = 'approvedispatcher.php?id=<?php echo $row["Id"] ?>&a=1';">Approve</button>
                                <?php
                                } elseif ((int)$row["Status"] === 1) { ?>
                                    <button class="btn btn-warning" onclick="window.location.href = 'approvedispatcher.php?id=<?php echo $row["Id"] ?>&a=0';">Reject</button>

                                <?php } else { ?>
                                    <button class="btn btn-primary" onclick="window.location.href = 'approvedispatcher.php?id=<?php echo $row["Id"] ?>&a=1';">Approve</button>
                                    <button class="btn btn-warning" onclick="window.location.href = 'approvedispatcher.php?id=<?php echo $row["Id"] ?>&a=0';">Reject</button>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>

<?php include '../footer.php'; ?>