<?php 

require 'function.php';



// cek tombol submit sudah ditekan belum
if ( isset($_POST["submit"]) ) {



// cek apakah data berhasil ditambahkan atau tidak
if (tambah( $_POST) > 0 ) {
	echo " 
			<script> 
				alert ('Data Added Successfully');
				document.location.href = 'index.php';
			</script>
			";

} 	else {
		echo "
			<script> 
				alert ('Data Failed to Add');
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
	<link rel="stylesheet" type="text/css" href="style/tambah.css">
</head>
<body>


<h1>Tambah Data Mahasiswa</h1>

	<form action="" method="post">
		<ul>
			<li>
				<label for="nama"> Nama :</label>
				<input type="text" name="nama" id="nama" placeholder="Masukan Nama Anda" required> 
			</li>
			<br>
			<li>
				<label for="nrp"> NRP :</label>
				<input type="text" name="nrp" id="nrp" required>
			</li>
			<br>
			<li>
				<label for="email"> Email :</label>
				<input type="email" name="email" id="email" placeholder="Masukan Email Anda" required>
			</li>
			<br>
			<li>
				<label for="jurusan"> Jurusan :</label>
				<input type="text" name="jurusan" id="jurusan" placeholder="Masukan Jurusan Anda" required>
			</li>
			<br>
			<li>
				<label for="gambar"> Gambar :</label>
				<input type="text" name="gambar" id="gambar" placeholder="Masukan Gambar Anda" required>
			</li>
			<br>
			<li>
				<button  type="submit" name="submit">Tambah Data</button>
			</li>


		</ul>
	



	</form>


</body>
</html>