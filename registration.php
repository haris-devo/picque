<?php
$con = mysqli_connect('localhost', 'root', '', 'web');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Registration form</title>
	<style>
		body {
			background: white;
			font-size: 18px;
			line-height: 22px;
			color: black;
			display: block;
			align-items: center;
			justify-content: center;

		}

		.regist-form {
			display: flex;
			align-items: center;
			justify-content: center;
			position: relative;
			top: 10%;
			padding-top: 10px;
			margin: 50px auto;
		}

		.regist-form form {
			height: 95vh;
			position: relative;
			top: 10%;
			background: aquamarine;
			color: black;
			padding: 30px 40px;
			border-radius: 10px;
			box-shadow: 13px 13px 20px #cbced1, 13px 13px 20px #cbced1, 13px 13px 20px #cbced1,
				-13px -13px 20px #ffffff;

		}

		.regist-form h1 {
			margin-bottom: 10px;
			text-align: center;
			background: antiquewhite;
			padding: 20px;
			border-radius: 20px;

		}


		.regist-form button {
			width: 100%;
			padding: 10px;
			margin-top: 30px;
			margin-left: 4px;
			margin-bottom: 10px;
			background: red;
			color: white;
			border-radius: 10px;
			font-size: 20px;
			font-weight: bold;
			cursor: pointer;
			outline: none;
			transition: 0.6s;
		}

		.regist-form button:hover {
			background: black;
			color: yellow;
			transform: translateY(-10px);
		}

		.regist-form a {
			text-align: center;
			text-decoration: none;
			color: black;
			margin: 20px;
			padding: 5px;
			transition: 0.5s;
		}

		.regist-form a:hover {
			background: black;
			color: yellow;
		}

		h1 {
			font-style: bold;
		}

		.regist-form input {
			margin-bottom: 20px;
			width: 100%;
			border-radius: 20px;
			padding: 10px 5px;
			outline: none;
			text-align: center;
			display: block;
			align-items: center;
			justify-content: center;
			margin-top: 3px;
			border: none;
		}

		input:focus {
			box-shadow: 13px 13px 20px #cbced1, 13px 13px 20px #cbced1, 13px 13px 20px #cbced1,
				-13px -13px 20px #ffffff;
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

	<script src="js.js">
		functionformValidation() {
			var passid = document.registration.passid;
			var uname = document.registration.name;
			var uadd = document.registration.address;
			var uemail = document.registration.email;
			var umsex = document.registration.gender;
			if (passid_validation(passid, 7, 16)) {
				if (allLetter(uname)) {
					if (alphanumeric(uadd)) {
						if (ValidateEmail(uemail)) {
							if (validsex(umsex)) {}
						}

					}
				}
			}
			return false;
		}

		functionuserid_validation(uid, mx, my) {
			varuid_len = uid.value.length;
			if (uid_len == 0 || uid_len >= my || uid_len < mx) {
				alert("User Id should not be empty / length be between " + mx + " to " + my);
				uid.focus();
				return false;
			}
			return true;
		}

		functionpassid_validation(passid, mx, my) {
			varpassid_len = passid.value.length;
			if (passid_len == 0 || passid_len >= my || passid_len < mx) {
				alert("Password should not be empty / length be between " + mx + " to " + my);
				passid.focus();
				return false;
			}
			return true;
		}
		functionallLetter(uname) {
			if (uname.value.match(letters)) {
				return true;
			} else {
				alert('Username must have alphabet characters only');
				uname.focus();
				return false;
			}
		}

		function alphanumeric(uadd) {
			if (uadd.value.match(letters)) {
				return true;
			} else {
				alert('User address must have alphanumeric characters only');
				uadd.focus();
				return false;
			}
		}
		functionValidateEmail(uemail) {
			if (uemail.value.match(mailformat)) {
				return true;
			} else {
				alert("You have entered an invalid email address!");
				uemail.focus();
				return false;
			}
		}
		functionvalidsex(umGender, ufsex) {
			x = 0;

			if (umGender.checked) {
				x++;
			}
			if (ufGender.checked) {
				x++;
			}
			if (x == 0) {
				alert('Select Male/Female');
				umGender.focus();
				return false;
			} else {
				alert('Form Successfully Submitted');
				window.location.reload()
				return true;
			}
		}
	</script>
</head>

<body>
	<!--  -->
	<div class="regist-form">
		<form action="registration.php" method="post" enctype="multipart/form-data" name='registration' onSubmit="return formValidation();">
			<h1>Registration Form</h1>
			<label for="username">Name: </label>
			<input type="text" name="name" placeholder=" Enter your name here" />
			<label for="passid">Password: </label>
			<input type="password" name="passid" size="15" placeholder="Enter password here" />
			<label for="passid">Confirm Password: </label>
			<input type="password" size="15" placeholder="Enter password here : " />
			<label for="address">Address:</label>
			<input type="text" name="address" size="50" placeholder="Enter your address" />
			<label for="email">Email: </label>
			<input type="text" name="email" size="30" placeholder="Enter your email" />
			<label for="text">Gender:(Choose one option)</label></li>

			<select name="gender">
				<option>Male</option>
				<option>Female</option>
			</select>

			<button type="submit" name="submit" value="Submit">Registor</button>
		</form>
	</div>

</body>

</html>


<?php

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$password = $_POST['passid'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];

	$insertdata = "INSERT INTO `registration`( `name`, `password`, `address`, `email`, `gender`) VALUES('$name','$password', '$address','$email' , '$gender'  )";

	$query = mysqli_query($con, $insertdata);

	if ($query) {
		echo "<script>window.open('index.php','_self')</script>";
	}
}
?>