<?php 

// $mahasiswa = [

// 	["Muhirsan", "01202972", "muhirsan@gmail.com", "Teknik Komputer"],
// 	["Sandhika", "01284872", "sandhika@gmail.com", "Teknik Industri"],


// ];


// array Assosiative

$books = [
				[

				"nama" => "NUNCHI", 
				"asal" => "Korea",
				"penulis" => "Euny Hong",
				"harga" => "4.000.000",
				"gambar" => "nunchi.jpg"
			],

			[
				"nama" => "Kecerdasan Emosional", 
				"asal" => "Amerika Serikat",
				"penulis" => "Daniel Goleman",
				"harga" => "6.000.000",
				"gambar" => "kecerdasanemosional.jpg"
			],

			[
				"nama" => "Pagi Di Amerika", 
				"asal" => "Indonesia",
				"penulis" => "Hikmat Darmawan",
				"harga" => "2.000.000",
				"gambar" => "pagidiamerika.jpg"
			],

			[
				"nama" => "Dream Walker", 
				"asal" => "Korea",
				"penulis" => "Yeo Hui Xuan",
				"harga" => "8.000.000",
				"gambar" => "dreamwalker.jpg"
			],

			[
				"nama" => "Laut Bercerita", 
				"asal" => "Indonesia",
				"penulis" => "Lela S. Chudori",
				"harga" => "1.000.000",
				"gambar" => "lautbercerita.jpg"
			],

			[
				"nama" => "Novel Selamat Tinggal", 
				"asal" => "Indonesia",
				"penulis" => "Tere Liye",
				"harga" => "2.000.000",
				"gambar" => "novelselamattinggal.jpg"
			],

			[
				"nama" => "Lukacita", 
				"asal" => "Inggris",
				"penulis" => "Valerie Patkar",
				"harga" => "1.500.000",
				"gambar" => "lukacita.jpg"
			],

			[
				"nama" => "The Things You Can See Only You Slow Down", 
				"asal" => "Korea",
				"penulis" => "Haemin Sunin",
				"harga" => "3.500.000",
				"gambar" => "thethings.jpg"
			],

			[
				"nama" => "Black Showman", 
				"asal" => "Japan",
				"penulis" => "Keigo Higashino",
				"harga" => "1.100.000",
				"gambar" => "blacksnowman.jpg"
			],

			[
				"nama" => "Almond", 
				"asal" => "Japan",
				"penulis" => "Pyung",
				"harga" => "4.600.000",
				"gambar" => "almond.jpg"
			],

			[
				"nama" => "Bicara Itu Ada Seninya", 
				"asal" => "Korea",
				"penulis" => "Oh Su Hyuang",
				"harga" => "1.100.000",
				"gambar" => "bicaraadaseninya.jpg"
			],

			[
				"nama" => "Shaka Oh Shaka", 
				"asal" => "Japan",
				"penulis" => "Jocelyn Suherman",
				"harga" => "1.800.000",
				"gambar" => "shakaohshaka.jpg"
			],

			[
				"nama" => "You Do You", 
				"asal" => "Amerika Serikat",
				"penulis" => "Fellexandro Ruby",
				"harga" => "4.500.000",
				"gambar" => "youdoyou.jpg"
			],

			[
				"nama" => "Sapiens", 
				"asal" => "Japan",
				"penulis" => "Yuval Noah Harari",
				"harga" => "1.500.000",
				"gambar" => "sapiens.jpg"
			]
		];

 ?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> Daftar Buku </title>
		<style>
			
			img {
				
				max-width: 150px;
				
			}
		</style>

	</head>
	<body>
	<h1> Daftar Buku </h1>

	<?php foreach ($books as $book) : ?>

		<ul>
			<li> <img src="img/<?= $book["gambar"]; ?> "> </li>
			<li> Nama : <?= $book ["nama"]; ?> </li>
			<li> Asal : <?= $book ["asal"]; ?> </li>
			<li> Penulis : <?= $book ["penulis"]; ?> </li>
			<li> Harga : <?= $book ["harga"]; ?> </li>
		</ul>

		<?php endforeach; ?>

	</body>
	</html>