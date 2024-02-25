<?php 

function salam ($waktu, $nama) {
	return " Selamat $waktu, $nama !";
}


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title> Latihan function </title>
 </head>
 <body>
 <h1> <?php echo salam ("Malam", "Muhirsan"); ?></h1>
 </body>
 </html>