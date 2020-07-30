<?php 
	include 'selectDB.php';
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$address = "";
	$phone    = "";
	$role    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($link, $_POST['username']);
		$email = mysqli_real_escape_string($link, $_POST['email']);
		$password_1 = mysqli_real_escape_string($link, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($link, $_POST['password_2']);
		$address = mysqli_real_escape_string($link, $_POST['address']);
		$phone = mysqli_real_escape_string($link, $_POST['phone']);
		$role = mysqli_real_escape_string($link, $_POST['role']);
	
		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
		if (empty($address)) { array_push($errors, "Address is required"); }
		if (empty($phone)) { array_push($errors, "Phone number is required"); }
		if (empty($role)) { array_push($errors, "Role is required"); }
		

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		if ($username == "Admin") {
			echo $username;
			$role = ADMIN;
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO User (UserName, Email, Password, Address, Phone, Role) 
					  VALUES('$username', '$email', '$password','$address','$phone', '$role')";

			if (mysqli_query($link, $query)) {
				$_SESSION['username'] = $username;
				$_SESSION['role'] = $role;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			} else {
				array_push($errors, 'Registration Error: ' . mysqli_error($link));
			}
		}
	}

	// ... 
	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($link, $_POST['username']);
		$password = mysqli_real_escape_string($link, $_POST['password']);
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM User WHERE UserName='$username' AND password='$password'  ";
			$results = mysqli_query($link, $query);

			if (mysqli_num_rows($results) == 1) {

				$row = mysqli_fetch_assoc($results);
				$_SESSION['username'] = $row['UserName'];
				$_SESSION['role'] = $row['Role'];
				$_SESSION['success'] = "Welcome";
				$_SESSION['UserId'] = $row['Id'];
				
				header('location: index.php');
			} else {
				array_push($errors, "Wrong username/password combination");
			}	
		}
	}

?>