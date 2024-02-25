<?php

// Fungsi Melakukan Request / Derect Kedalam Halaman Fungsi Yang Sudah Dibuat
require '../function.php';

// Mencari Persamaan Data Ketika Input Search Diisi Oleh User
$keyword = $_GET["keyword"];
$query = "SELECT * FROM mahasiswa
	WHERE
	nama LIKE '%$keyword%' OR 
	nrp LIKE '%$keyword%' OR
	email LIKE '%$keyword%' OR
	jurusan LIKE '%$keyword%'
	";

$mahasiswa = query($query);

?>

<!-- Memilih Apasaja Yang Akan Dicarikan Persamaan Karakter Oleh AJAX / Pilih Ruang Lingkup Nya  -->
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

    <?php $i = +1; ?>
    <?php foreach ($mahasiswa as $row) : ?>
        <tr>
            <td><?= $i  ?> </td>
            <td>
                <a href="ubah.php?id=<?= $row["id"]; ?> "> Ubah </a> |
                <a href="hapus.php?id=<?= $row["id"]; ?> " onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini !'); "> Hapus </a>
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