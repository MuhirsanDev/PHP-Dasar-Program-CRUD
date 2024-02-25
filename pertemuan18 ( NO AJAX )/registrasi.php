<?php

// Fungsi Melakukan Request / Derect Kedalam Halaman Fungsi Yang Sudah Dibuat
require 'function.php';


// Fungsi Yang Dilakukan Ketika User Menekan Tombol Registrasi 
// Jika User Sudah Menekan Tombol Registrasi Dan Berhasil Maka Data Akan Disimpan Ke Database

if (isset($_POST["register"])) {
	if (registrasi($_POST) > 0) {
		echo "<script>
		alert('Pengguna Baru Berhasil Ditambahkan');
		</script>";
	} else {
		echo mysqli_error($conn);
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Page</title>
	<link rel="stylesheet" type="text/css" href="style/registrasi.css">
</head>

<body>

	<div class="container">
		<h1>Registration</h1>

		<form action="" method="post">
			<ul>
				<li>
					<label form="username" for="username">Username :</label>
					<input type="text" name="username" id="username" required>
				</li>
				<li>
					<label form="password" for="password">Password :</label>
					<input type="password" name="password" id="password" required>
				</li>
				<li>
					<label form="password2" for="password2">Confirm Password :</label>
					<input type="password" name="password2" id="password2" required>
				</li>
				<li><button type="submit" name="register"> Registration </button></li>
			</ul>
		</form>
	</div>
</body>

</html>