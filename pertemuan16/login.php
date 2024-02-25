<?php  

session_start();

	if (isset($_SESSION["login"])) {
		
		header ("location:index.php");

		exit;
	}



require 'function.php';


// apakah tombol login sudah ditekan atau belum

if (isset($_POST["login"]) ) {

		$username = $_POST["username"];
		$password = $_POST["password"];


		$result = mysqli_query ($conn, "SELECT * FROM user WHERE username = '$username'");


	// cek username

	if (mysqli_num_rows($result) === 1) {
		
	// cek password

	$row = mysqli_fetch_assoc($result);

	if (password_verify($password, $row["password"]) ) {

		// set SESION

	$_SESSION["login"] = true;


		header("location:index.php");

		exit;
	}

}



$error = true;
	
}



?>






<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Login</title>
	<link rel="stylesheet" type="text/css" href="style/login.css">
</head>
<body>

<div class="container">
	<h1> Halaman Login</h1>

	<?php if (isset ($error) ): ?>

		<p> Username / Password Salah ! </p>
		
	<?php endif; ?>

	<form action="" method="post">

		<ul>
			<li>
				
				<label for="username"> Username : </label>
				<input type="text" id="username" name="username" required>

			</li>

			<li>
				
				<label for="password"> Password : </label>
				<input type="password" id="password" name="password" required>

			</li>

			<li>
				<button type="submit" name="login"> Login </button>
			</li>

		</ul>
		


	</form>

</div>
</body>
</html>