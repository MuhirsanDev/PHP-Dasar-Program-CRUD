<?php 

require 'function.php';


// ambil data di url

$id =$_GET["id"];



// query data mahasiswa berdasarkan id

$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];





// cek tombol submit sudah ditekan belum
if ( isset($_POST["submit"]) ) {



// cek apakah data berhasil diubah atau tidak
if (ubah( $_POST) > 0 ) {
	echo " 
			<script> 
				alert ('Data Changed Successfully');
				document.location.href = 'index.php';
			</script>
			";

} 	else {
		echo "
			<script> 
				alert (Data Changed Failed');
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
	<title>Edit Data Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="style/tambah.css">
</head>
<body>


<h1>Edit Data Mahasiswa</h1>

	<form action="" method="post">
		<input type="hidden" name="id" value="<?= $mhs["id"]; ?> ">
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
				<input type="text" name="gambar" id="gambar" placeholder="Masukan Gambar Anda" required value="<?= $mhs["gambar"]; ?> ">
			</li>
			<br>
			<li>
				<button  type="submit" name="submit">Edit Data</button>
			</li>


		</ul>

	</form>


</body>
</html>