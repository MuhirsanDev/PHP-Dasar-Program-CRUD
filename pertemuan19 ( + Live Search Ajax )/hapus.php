<?php

// Fitur Sesion, Dimana User Yang Ingin Melakuakan DELETE Data Harus Melakukan Login Dahulu
// URL Tidak Bisa Dirubah Oleh User Yang Ingin Masuk Kedalam System Tanpa Login 
// Jika User Memodifikasi URL Maka User Akan Langsung Ditolak Oleh System Dan Akan Langsung Diarahkan Ke Login Page

session_start();

if (!isset($_SESSION["login"])) {
	header("location:login.php");
	exit;
}


// Fungsi Melakukan Request / Derect Kedalam Halaman Fungsi Yang Sudah Dibuat
require 'function.php';


// Fungsi Untuk Melakukan Penghapusan Data Pada Data Yang Pilih
$id = $_GET["id"];
if (hapus($id) > 0) {
	echo " 
			<script> 
				alert ('Data Berhasil Dihapus');
				document.location.href = 'index.php';
			</script>
			";
} else {
	echo "
			<script> 
				alert ('Data Gagal Dihapus !');
				document.location.href = 'index.php';
			</script>
			";
}
