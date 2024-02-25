<?php

// Fitur Sesion, Dimana User Yang Ingin Masuk Kedalam Halaman Utama Diwajibkan Untuk Melakukan Login
// URL Tidak Bisa Dirubah Oleh User Yang Ingin Masuk Kedalam System Tanpa Login 
// Jika User Memodifikasi URL Maka User Akan Langsung Ditolak Oleh System Dan Akan Langsung Diarahkan Ke Login Page

session_start();
if (isset($_SESSION["login"])) {
	header("location:index.php");
	exit;
}

// Fungsi Melakukan Request / Derect Kedalam Halaman Fungsi Yang Sudah Dibuat
require 'function.php';


// Fungsi Untuk Tombol Login Ketika Ditekan Akan Mengirimkan Data Kedatabase
if (isset($_POST["login"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");


	// Fungsi Untuk Cek Username Apakah Yang Diiput Sama Dengan Yang Terdaftar Didatabase Atau tidak
	if (mysqli_num_rows($result) === 1) {

		// Fungsi Untuk Cek Password Apakah Yang Diiput Sama Dengan Yang Terdaftar Didatabase Atau tidak
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {


			// SETTING SESION ( Melakukan Sett Sesion Agar Halaman Yang Pertama Tampil Adalah Halam Ini)
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
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="style/login.css">
</head>

<body>

	<div class="container">

		<h1>Login</h1>

		<!-- Menampilakan Pesan Kesalahan Jika Input Username / Password Yang Diinput User Tidak Valid Dengan Data Yang Ada Pada Database -->
		<?php if (isset($error)) : ?>
			<p> Invalid Username / Password ! </p>
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
				<li>
					<button type="submit" name="register"> <a href="registrasi.php">Registration</a> </button>
				</li>
			</ul>
		</form>
	</div>
</body>

</html>