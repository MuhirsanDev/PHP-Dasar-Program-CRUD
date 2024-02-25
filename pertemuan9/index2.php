<?php 

// Koneksi Ke Database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");


// Ambil data dari tabel mahasiswa
$result = mysqli_query ($conn, "SELECT * FROM mahasiswa");


// ambil data mahasiswa dari object result
// mysqli_fetch_row() // mengembalikan array numerik
// mysqli_fetch_assoc() // mengembalikan array asosiative
// mysqli_fetch_array() // mengembalikan keduanya ( array numerik & array asosiative )
// mysqli_fetch_object() // mengembalikan object


/*while ( $mhs = mysqli_fetch_assoc($result) ) {

var_dump($mhs["nama"]);

}*/


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

<?php while ($row = mysqli_fetch_assoc($result)): ?>

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

<?php endwhile; ?>

</table>






</body>
</html>