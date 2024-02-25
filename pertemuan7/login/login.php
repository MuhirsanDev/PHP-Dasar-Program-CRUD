<?php 

// cek tombol submit sudah diklik belum

if (isset($_POST["submit"]) ) {
	
	// cek username dan password

	if ($_POST["username"] == "admin" && $_POST["password"] == "123" ) {
	

	// jika benar, redirect kehalaman admin

	header("Location: admin.php");
	exit;

	} else {

	// jika salah, tampilkan pesan kesalahan

		$error = true;

	}


}

 ?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>

<h1>login Admin</h1>


	<?php if ( isset($error)) : ?>

<p style="color: red; font-style: italic;"> Username / Password Salah !</p>
	
	<?php endif; ?>



<ul>
<form action="" method="post">
	
	<li>
		<label for="username"> Username : </label>
		<input type="text" name="username" id="username">
	</li>
<br>
	<li>
		<label for="password"> Password : </label>
		<input type="password" name="password" id="password">
	</li>
<br>
	<li>
		<button type="submit" name="submit"> Kirim </button>
	</li>

</form>
</ul>

</body>
</html>