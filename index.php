<?php
session_start();
if (!isset($_SESSION['username'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	unset($_SESSION['success']);
	header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Home Page</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success">
				<h3>
					<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);
						?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
			<?php

				include 'selectDB.php';

				$name = $_SESSION['username'];
				// Attempt select query execution with order by clause
				$sql = "SELECT role FROM User WHERE username = '$name' ";

				if ($result = mysqli_query($link, $sql)) {
					if (mysqli_num_rows($result) == 1) {
						// Close result set
						mysqli_free_result($result);
						header("Location: dashboard.php");
					} else {
						echo "No records matching your query were found.";
					}
				} else {
					echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
				}

				// Close connection
				mysqli_close($link);
				?>
			<p> <a href="index.php?logout='1'" style="color: red;">Logout</a> </p>
		<?php endif ?>
	</div>
	<p>Demo<p>
</body>
</html>