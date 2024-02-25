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


// Fungsi Untuk Mengambil Data Yang Akan Di UBAH Berdasarkan ID
$id = $_GET["id"];

// Melakukan Query Data Mahasiswa Berdasarkan ID
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];


// Fungsi Untuk Mengecek Tombol Submmit Sudah Ditekan Atau Belum Beserta Action Setelahnya
if (isset($_POST["submit"])) {


	// Fungsi Untuk Cek Data Apakah Data Yang Rubah/Update Sukses Dikirimkan Kedatabase Atau Tidak
	if (ubah($_POST) > 0) {
		echo " 
			<script> 
				alert ('Data Berhasil Di Update');
				document.location.href = 'index.php';
			</script>
			";
	} else {
		echo "
			<script> 
				alert (Data Gagal Di Update !');
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
	<title>Update Page</title>
	<link rel="stylesheet" type="text/css" href="style/add.css">
</head>

<body>

	<h1>Update Data Mahasiswa</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $mhs["id"]; ?> ">
		<input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?> ">
		<ul>
			<li>
				<label for="nama"> Nama :</label>
				<input type="text" name="nama" id="nama" placeholder="Masukan Nama Anda" required value="<?= $mhs["nama"]; ?> ">
			</li>
			<br>
			<li>
				<label for="nrp"> NRP :</label>
				<input type="text" name="nrp" id="nrp" required value="<?= $mhs["nrp"]; ?> ">
			</li>
			<br>
			<li>
				<label for="email"> Email :</label>
				<input type="email" name="email" id="email" placeholder="Masukan Email Anda" required value="<?= $mhs["email"]; ?> ">
			</li>
			<br>
			<li>
				<label for="jurusan"> Jurusan :</label>
				<input type="text" name="jurusan" id="jurusan" placeholder="Masukan Jurusan Anda" required value="<?= $mhs["jurusan"]; ?> ">
			</li>
			<br>
			<li>
				<label for="gambar"> Gambar :</label>
				<img src="img/<?= $mhs['gambar']; ?>" width="60">
				<br>
				<input type="file" name="gambar" id="gambar" placeholder="Masukan Gambar Anda ">
			</li>
			<br>
			<li>
				<button type="submit" name="submit">Edit Data</button>
			</li>
		</ul>
	</form>
</body>

</html>