<?php

// Fitur Sesion, Dimana User Yang Ingin Menambah Data Ke System Diharuskan Login Terlebih Dahulu
// URL Tidak Bisa Dirubah Oleh User Yang Ingin Masuk Kedalam System Tanpa Login 
// Jika User Memodifikasi URL Maka User Akan Langsung Ditolak Oleh System Dan Akan Langsung Diarahkan Ke Login Page

session_start();

if (!isset($_SESSION["login"])) {
	header("location:login.php");
	exit;
}

// Fungsi Melakukan Request / Derect Kedalam Halaman Fungsi Yang Sudah Dibuat
require 'function.php';


// Fungsi Yang Dikirimkan Ketika Tombol Sumbit Ditekan
if (isset($_POST["submit"])) {

	// Fungsi Untuk Cek Apakah Data Yang ditambahkan Kedatabase Berhasil Atau Tidak
	if (tambah($_POST) > 0) {
		echo " 
			<script> 
				alert ('Data Berhasil Ditambahkan');
				document.location.href = 'index.php';
			</script>
			";
	} else {
		echo "
			<script> 
				alert ('Data Gagal Ditambahkan');
				document.location.href = 'index.php';
			</script>
			";
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tambah Data Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="style/add.css">
</head>

<body>
	<h1>Tambah Data Mahasiswa</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="nama"> Nama :</label>
				<input type="text" name="nama" id="nama" placeholder="Masukan Nama Anda" required autocomplete="off">
			</li>
			<br>
			<li>
				<label for="nrp"> NRP :</label>
				<input type="text" name="nrp" id="nrp" placeholder="Masukan NRP Anda" required autocomplete="off">
			</li>
			<br>
			<li>
				<label for="email"> Email :</label>
				<input type="email" name="email" id="email" placeholder="Masukan Email Anda" required autocomplete="off">
			</li>
			<br>
			<li>
				<label for="jurusan"> Jurusan :</label>
				<input type="text" name="jurusan" id="jurusan" placeholder="Masukan Jurusan Anda" required autocomplete="off">
			</li>
			<br>
			<li>
				<label for="gambar"> Gambar :</label>
				<input type="file" name="gambar" id="gambar" placeholder="Masukan Gambar Anda">
			</li>
			<br>
			<li>
				<button type="submit" name="submit">Tambah Data</button>
			</li>
		</ul>
	</form>
</body>

</html>