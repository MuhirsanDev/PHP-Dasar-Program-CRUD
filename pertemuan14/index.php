<?php 


// menghubungkan dengan halaman function

require 'function.php';

// menampilkan data pada database berdasarkan dengan item terbaru yang di buat

$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC");



// tombol cari diklik

if (isset($_POST["cari"]) ) {

	$mahasiswa = cari ($_POST["keyword"]);


	}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Admin</title>
	<link rel="stylesheet" type="text/css" href="style/main.css">
	<link rel="stylesheet" type="text/css" href="style/cari.css">
</head>
<body>


<h1> Daftar Mahasiwa </h1>


<a href="tambah.php"> + Tambah Daftar Data Mahasiswa </a>
<br><br><br>

<form action="" method="post">

	<input type="text" name="keyword" size="20" autofocus placeholder="Search Data ... " autocomplete="off">
	<button type="submit" name="cari"> Search Data </button>
	
</form>
<br>
<table border="1" cellpadding="10" cellspacing="0">
	
	<tr>
		 <th> No. </th>
		 <th> Aksi </th>
		 <th> Gambar </th>
		 <th> NRP </th>
		 <th> Nama </th>
		 <th> Email </th>
		 <th> Jurusan </th>

	</tr>

<?php $urut = 1 ?>

<?php foreach ( $mahasiswa as $row ): ?>

	<tr>
		
		<td><?= $urut  ?> </td>

		<td>
			<a href="ubah.php?id=<?= $row["id"]; ?> "> Ubah </a> |

			<a href="hapus.php?id=<?= $row["id"]; ?> " onclick="return confirm('Are You Sure You Want to Delete This Data !'); "> Hapus </a>
		</td>

		<td><img src="img/<?= $row["gambar"]; ?>"></td>
		<td><?= $row["nrp"]; ?></td>
		<td><?= $row["nama"]; ?></td>
		<td><?= $row["email"]; ?></td>
		<td><?= $row["jurusan"]; ?></td>

	</tr>

<?php $urut++; ?>

<?php endforeach; ?>

</table>

<br><br><br>
<center><a href="index.php"> Lihat Semua Daftar Mahasiswa </a></center>

</body>
</html>
