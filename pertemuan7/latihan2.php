<?php 

// Cek apakah tidak ada data di $_GET

if ( !isset($_GET["nama"]) || 
	 !isset($_GET["asal"]) ||
	 !isset($_GET["penulis"]) ||
	 !isset($_GET["harga"]) ||
	 !isset($_GET["gambar"])

	) {

	// Redirect

	header("Location: latihan1.php");
	exit;
}

 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Detail Buku</title>

	<style>
		
		img {
			max-width: 200px;
		}
	</style>
</head>
<body>

	<ul>
		<li> <img src="img/<?= $_GET["gambar"]; ?>"> </li>
		<li> <?= $_GET["nama"]; ?> </li>
		<li> <?= $_GET["asal"]; ?> </li>
		<li> <?= $_GET["penulis"]; ?> </li>
		<li> <?= $_GET["harga"]; ?> </li>
	</ul>



<a href="latihan1.php"> Kembali Kehalaman Daftar Buku </a>

</body>
</html>