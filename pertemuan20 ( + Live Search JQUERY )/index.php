<?php

// Fitur Sesion, Dimana User Yang Ingin Masuk Kedalam Halaman Utama Harus Melakukan Login Dahulu
// URL Tidak Bisa Dirubah Oleh User Yang Ingin Masuk Kedalam System Tanpa Login 
// Jika User Memodifikasi URL Maka User Akan Langsung Ditolak Oleh System Dan Akan Langsung Diarahkan Ke Login Page

session_start();

if (!isset($_SESSION["login"])) {
    header("location:login.php");
    exit;
}

// Fungsi Melakukan Request / Derect Kedalam Halaman Fungsi Yang Sudah Dibuat
require 'function.php';


// FITUR PAGINATION / Membagi Tabel Atau Tampilan Web Menjadi Beberapa Bagian
// - Konfigurasi / Setting Terlebih Dahulu Halaman Mana Yang Akan Dibagi Kebeberapa Bagian

$jumlahDataPerhalaman = 5;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;


// Fungsi Untuk Menampilkan Data Pada Database Berdasarkan Dengan Item Terbaru Yang Dinuat
$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC LIMIT $awalData, $jumlahDataPerhalaman");


// Fungsi Untuk Confirm Tombol Cari sudah Diklik Atau Belum
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Admin</title>
    <link rel="stylesheet" type="text/css" href="style/main.css">
    <link rel="stylesheet" type="text/css" href="style/cari.css">
    <style>
    .loader {
        width: 100px;
        position: absolute;
        top: 150px;
        z-index: -1;
        display: none;

    }
    </style>
</head>

<body>
    <h1> Daftar Mahasiwa </h1>

    <a href="tambah.php"> + Tambah Daftar Data Mahasiswa </a>
    <br><br>

    <a href="logout.php">Logout</a>
    <br><br>
    <form action="" method="post">

        <input type="text" name="keyword" size="20" autofocus placeholder="Search Data ... " autocomplete="off"
            id="keyword">
        <button type="submit" name="cari" id="tombolcari"> Search Data </button>

        <img src="GIF/loader.gif" class="loader">
    </form>
    <br>
    <br>
    <div id="conten">
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

            <!-- Fungsi Untuk Membuat No Tabel Secara Otomatis Dan Berurutan -->
            <?php $i = $awalData + 1; ?>
            <?php foreach ($mahasiswa as $row) : ?>

            <tr>
                <td><?= $i  ?> </td>
                <td>
                    <a href="ubah.php?id=<?= $row["id"]; ?> "> Ubah </a> |
                    <a href="hapus.php?id=<?= $row["id"]; ?> "
                        onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini !'); "> Hapus </a>
                </td>
                <td><img src="img/<?= $row["gambar"]; ?>"></td>
                <td><?= $row["nrp"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["jurusan"]; ?></td>
            </tr>

            <?php $i++; ?>

            <?php endforeach; ?>
        </table>
    </div>
    <br>
    <br>
    <center>

        <!-- Membauat Navigasi Untuk Perpindah Halaman / Atribut -->

        <?php if ($halamanAktif > 1) : ?>
        <a href="?halaman= <?= $halamanAktif - 1; ?> ">&laquo;</a>
        <?php endif; ?>


        <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
        <?php if ($i == $halamanAktif) : ?>
        <a href="?halaman= <?= $i; ?> " style="font-weight: bold; color: black;"> <?= $i; ?> </a>

        <?php else : ?>
        <a href="?halaman=<?= $i ?>"> <?= $i; ?> </a>
        <?php endif; ?>
        <?php endfor; ?>


        <?php if ($halamanAktif < $jumlahHalaman) : ?>
        <a href="?halaman= <?= $halamanAktif + 1; ?> ">&raquo;</a>
        <?php endif; ?>

        <br>
        <br>
        <a href="index.php"> Back To Top </a>
    </center>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/index.js"></script>
</body>

</html>