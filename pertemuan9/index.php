<?php 

require 'function.php';

$mahasiswa = query("SELECT * FROM mahasiswa");

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Admin</title>

	<style>
		img {
			max-width: 80px;
		}
	</style>
</head>
<body>


<h1> Daftar Mahasiwa </h1>

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
			<a href="">Ubah </a> |
			<a href="">Hapus </a>
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






</body>
</html>