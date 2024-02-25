<?php

// Koneksi Kedalam database Yang Dituju
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// Fungsi Untuk Mencari Data Di Database
function query($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}


// Function Untuk Fitur Tambah Peserta
function tambah($data)
{
	global $conn;

	// berfungsi Untuk Mengambil Data dari Setiap Element Dalam Form
	$nama = htmlspecialchars($data["nama"]);
	$nrp = htmlspecialchars($data["nrp"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);


	// Function Untuk Upload Gambar
	$gambar = upload(); {
		if (!$gambar) {
			return false;
		}
	}

	// Fungsi Untuk Query Insert Data / Menambah Data Baru Kedalam Database
	$query = "INSERT INTO mahasiswa
			  VALUES 
				('', '$nama', '$nrp', '$email', '$jurusan', '$gambar') 
				";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}


// Function Untuk Upload Data 
function upload()
{

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];


	// Fungsi Untuk Mengecek Apakah Gambar Sudah Dipilih Atau Belum
	if ($error === 4) {
		echo "<script>
				alert('Silahkan Pilih Gambar Terlebih Dahulu !');
			  </script>";
		return false;
	}


	// Fungsi Untuk Mengecek Jenis Ekstensi Gambar Apasaja Yang Diperbolehkan !
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script> 
				alert ('File Yang Anda Pilih Bukanlah Gambar !');
				</script> ";
		return false;
	}


	// Fungsi Untuk Membatasi Ukuran / Size Gambar (1 TB)
	if ($ukuranFile > 10000000) {
		echo "<script> 
			alert ('Ukuran Gambar Yang Anda Pilih Terlalu Besar !');
			 </script> ";
	}


	// Fungsi Untuk Membuat Nama Baru Ketika User Melakukan Update / Perubahan Data 
	// Jika User Merubah Gambar Maka Nama Gambar Pada Databse Akan Di Generate Secara Random

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;


	// Fungsi Untuk Mengecek Gambar Apakah Berhasil Diupdate Kedatabase Atau Tidak !
	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
	return $namaFileBaru;
}

// Function Untuk Menghapus Data Pada Database
function hapus($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
	return mysqli_affected_rows($conn);
}


// Function Untuk Merubah / Update Data Pada Database
function ubah($data)
{
	global $conn;

	// Berfungsi Untuk Merubah Setiap Data Dari Tiap Element Dalam Form
	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$nrp = htmlspecialchars($data["nrp"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);


	// Fungsi Untuk Menegecek Apakah User Memilih Gambar Baru Atau Masih Menggunakan Gambar Lama
	if ($_FILES['gambar']['error'] === 4) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}


	// Fungsi Untuk Merubah / Update Data Ke Database
	$query = "UPDATE mahasiswa SET
			 nama ='$nama',
			 nrp = '$nrp',
			 email = '$email',
			 jurusan = '$jurusan',
			 gambar = '$gambar'
			 WHERE id = $id
			";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}


// Fungsi Untuk Kolom Input Pencarian / Search Yang Akan Mencari Ke Dalam Database
function cari($keyword)
{
	$query = "SELECT * FROM mahasiswa
				WHERE
				nama LIKE '%$keyword%' OR 
				nrp LIKE '%$keyword%' OR
				email LIKE '%$keyword%' OR
				jurusan LIKE '%$keyword%'
				";

	return query($query);
}


// Fungsi Untuk Melakukan Registrasi
function registrasi($data)
{
	global $conn;
	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);


	// Fungsi Untuk Mengecek Apakah Username Sudah Ada Yang Menggunakan Atau Belum 
	// Jika Username Sudah Terdaftar Pada Database Maka User Baru Harus Memilih Username Lain

	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
	if (mysqli_fetch_assoc($result)) {
		echo "<script>
		alert('Username Sudah Terdaftar, Silahkan Gunakan Username Lain !');
		</script>";
		return false;
	}


	// Fungsi Untuk Menegecek Password Yang Diinput Sudah Benar Atau Belum
	if ($password !== $password2) {
		echo "<script>
		alert('Confirm Password Tidak Sesuai !');
		</script>";
		return false;
	}


	// Fungsi Untuk Mengenkripsi Password Saat Ketika Disimpan Ke Database Berubah Menjadi Karakter Unik
	$password = password_hash($password, PASSWORD_DEFAULT);

	// Fungsi Untuk Menambahkan Password Kedalam Database
	mysqli_query($conn, "INSERT user VALUES('', '$username', '$password') ");
	return mysqli_affected_rows($conn);
}
