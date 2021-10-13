<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="CSS_Files/signupc.css" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8"></script>
	<title>Canteen Records Handler</title>
</head>

<body>
	<?php

	$conn = mysqli_connect("localhost", "root", "", "canteen") or die("Can't Connect!");
	//If sign up button is clicked
	if (isset($_POST["btnsign"])) {
		$email = $_POST['email'];
		$name = $_POST['name'];
		$usname = $_POST['usname'];
		$pass = $_POST['pass'];
		//search if the username entered already exists
		$searus = "SELECT *FROM `Users` WHERE username = '$usname'";
		$resultsearus = mysqli_query($conn, $searus);
		$existsrowus = mysqli_num_rows($resultsearus);
		//search if the email id entered already exists
		$searem = "SELECT *FROM `Users` WHERE email = '$email;";
		$resultsearem = mysqli_query($conn, $searem);
		$existsrowem = mysqli_num_rows($resultsearem);

		if (($existsrowus == 0) && ($existsrowem == 0)) {
			$sql = "INSERT INTO `Users`(`id`,`name`,`username`,`email`,`password`,`wallet`)
		VALUES (NULL,'{$name}','{$usname}','{$email}','{$pass}',NULL)";
			$result = mysqli_query($conn, $sql);
			if ($result) {
	?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<strong>SUCCESSFUL!</strong> You have signed up!
				</div>
			<?php
			}
		} else if ($existsrowus > 0) {
			?>
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<strong>WARNING!</strong> Choose another username, this one is taken.
			</div>
		<?php
		} else if ($existsrowem > 0) {
		?>
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<strong>WARNING!</strong> An account for this email id already exists.
			</div>
			<?php
		}
	}
	if (isset($_POST["btnsignin"])) {
		$usname = $_POST['usname'];
		$pass = $_POST['pass'];
		//Check if the entered usname is email or not
		if (!filter_var($usname, FILTER_VALIDATE_EMAIL)) {
			$sql = "SELECT * FROM `Users` WHERE username = '$usname' AND password = '$pass'";
			$search = mysqli_query($conn, $sql);
			$existsrow = mysqli_num_rows($search);
			if ($existsrow == 0) {
			?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<strong>WARNING!</strong> Wrong Login Credentials!
				</div>
			<?php
			} else if ($existsrow == 1) {
				header("Location: mainpage.php");
			}
		}
		if (filter_var($usname, FILTER_VALIDATE_EMAIL)) {
			$sql = "SELECT * FROM `Users` WHERE email = '$usname' AND password = '$pass'";
			$search = mysqli_query($conn, $sql);
			$existsrow = mysqli_num_rows($search);
			if ($existsrow == 0) {
			?>

				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<strong>WARNING!</strong> Wrong Login Credentials!
				</div>
	<?php
			} else if ($existsrow == 1) {
				header("Location: mainpage.php");
			}
		}
	}

	?>
	<div class="bg" style="background-image:url(Images/background5.jpg)">
		<div class="form">
			<form class="login" action="" method="post">
				<i class="fa fa-user-circle" aria-hidden="true" style="color:black; font-size: 100px; margin-bottom: 20px;"></i>
				<input class="user-input" type="text" name="usname" placeholder="Username/Email-ID" required>
				<input class="user-input" type="password" name="pass" placeholder="Password" required>


				<div class="option1">
					<label class="remember-me"><input type="checkbox"><b>Remember Me</b></label>
					<a href="#"><b>Forgot Password?</b></a>
				</div>

				<input class="btn" type="submit" name="btnsignin" id="btnsignin" value="LOGIN">
				<div class="option2">
					<p>Not Registered yet?<a href="#">Create an account now</a></p>
				</div>
			</form>
			<form class="signup" action="" method="post" style = "margin:auto">
				<i class="fa fa-user-plus" aria-hidden="true" style="color:black; font-size: 100px; margin-bottom: 20px;"></i>
				<input class="user-input" type="email" name="email" placeholder="Email-ID" required>
				<input class="user-input" type="text" name="name" placeholder="Name" required>
				<input class="user-input" type="text" name="usname" placeholder="Username" required>
				<input class="user-input" type="password" name="pass" placeholder="Password" required>
				<input class="btn2" type="submit" name="btnsign" id="btnsign" value="SIGNUP">
				<div class="option2">
					<p>Registered Already?<a href="#">Sign In now</a></p>
				</div>
			</form>
		</div>
	</div>

	<script type="text/javascript">
		$('.option2 a').click(function() {
			$('form').animate({
				height: "toggle",
				opacity: "toggle"
			}, "slow");
		});
	</script>
</body>

</html>