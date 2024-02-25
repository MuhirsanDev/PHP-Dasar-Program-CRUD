<?php 

// array ( Variabel yang memiliki banyak nilai )
// element pada array boleh memiliki tipe data yang berbeda
// pasangan antara key dan value
// key nya adalah index yang dimulai dari 0




//membuat array - cara lama

$hari = array ("Senin", "Selasa", "Rabu");


// cara baru
$bulan = ["Januari", "Februari", "Maret"];

$arr1 = [123, "Muhirsan", false];


// menampilkan array
// var_dump()
//print_r()
 
// var_dump($hari);

// echo "<br>";

// print_r($bulan);

// echo "<br>";


// menampilkan 1 element pada array

// echo $arr1[1];

// echo "<br>";

// echo $bulan [1];





// menambahkan element baru pada array


var_dump($hari);

$hari[] = "Kamis";

echo "<br>";

var_dump($hari);





























 ?>