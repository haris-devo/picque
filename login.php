<?php
$con = mysqli_connect('localhost', 'root', '', 'web');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Login</title>
	<style>
		body {
			background: white;
			font-size: 18px;
			line-height: 22px;
			color: black;
			padding: 20px;
			background: aquamarine;

		}

		.login-form {
			display: flex;
			align-items: center;
			justify-content: center;
			position: relative;
			top: 30%;
			padding-top: 30px;
			margin: 50px auto;

		}

		.login-form form {
			height: 50vh;
			box-shadow: 13px 13px 20px aquamarine, 13px 13px 20px grey, 13px 13px 20px grey,
				-13px -13px 20px brown;

		}

		.login-form h1 {
			margin-bottom: 30px;
			text-align: center;
		}

		.login-form button {
			width: 100%;
			padding: 10px;
			margin-top: 20px;
			margin-left: 4px;
			margin-bottom: 10px;
			background: burlywood;
			color: black;
			border-radius: 20px;
			font-size: 20px;
			font-weight: bold;
			cursor: pointer;
			outline: none;
			transition: 0.6s;
		}

		.login-form button:hover {
			background: black;
			color: yellow;
			transform: translateY(-10px);
		}

		.login-form a {
			text-align: center;
			text-decoration: none;
			color: black;
			margin: 20px;
			padding: 5px;
		}

		.login-form a:hover {
			background: black;
			color: yellow;
		}

		h1 {
			font-style: bold;
		}

		form {
			position: relative;
			top: 30%;
			background: antiquewhite;
			color: black;
			padding: 80px 40px;
			border-radius: 10px;
			height: 40vh;

		}

		.login-form input {
			margin-bottom: 20px;
			width: 100%;

		}

		form input {
			border-radius: 20px;
			padding: 10px 7px;
			outline: none;
			text-align: center;
			display: block;
			align-items: center;
			justify-content: center;
			margin-top: 10px;
		}

		form textarea {
			width: 350px;
			height: 150px;
		}

		h2 {
			font-style: bold;
			font-size: 16px;
			margin: 10px 5px 15px 20px;
		}
	</style>
	<meta name="description" content="This  is a registration form. " />
	<link rel='stylesheet' href='style1.css' type='text/css' />
</head>

<body>
	<!--  -->
	<div class="login-form">
		<form action="login.php" method="post" enctype="multipart/form-data" name='registration'>
			<h1>Login</h1>
			<label for="username">Name: </label>
			<input type="text" name="name" placeholder=" Enter your name here" />
			<label for="passid">Password: </label>
			<input type="password" name="passid">
			<button type="submit" name="submit" value="Submit">Login</button>
			<a href="registration.php">Create a new Account</a>
		</form>
	</div>
</body>

</html>


<?php

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$password = $_POST['passid'];

	$selectdata = "select * from registration where name='$name' AND password = '$password'";
	$query = mysqli_query($con, $selectdata);
	if ($query) {
		$_SESSION['name'] = $name;
		echo "<script>window.open('index.php','_self')</script>";
	} else {
		echo "<script>alert(' Please Enter valid Login Data...')</script>";
	}
}
?>