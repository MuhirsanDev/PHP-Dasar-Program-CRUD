<?php 

// array
// membuat array

// $hari = array ("Senin", "Selasa", "Rabu");
// $bulan = ["Januari", "Februari", "Maret"];
// $arr = [100, "Teks", true];


// Menampilkan array 
// Versi Debuging


// var_dump ($hari);
// echo "<br>";
// print_r($bulan);

// Menampilkan 1 element pada array

// echo $arr[0];


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Latihan 1</title>
 	<style>
 		
 		.kotak {

 			width: 30px;
 			height: 30px;
 			background-color: salmon;
 			text-align: center;
 			line-height: 30px;
 			margin: 3px;
 			float: left;
 			transition: 1s;
 		}

 		.kotak:hover {

 			transform: rotate(360deg);
 			border-radius: 50px;
 		}

 		.clear {
 			clear: both;
 		}


 	</style>
 </head>
 <body>


<?php 

	$angka =[

		[1,2,3],
		[4,5,6],
		[7,8,9,]
	];

 ?>

<?php foreach ($angka as $a ): ?>

	<?php foreach ($a as $b): ?>

 <div class="kotak"> <?= $b; ?> </div>

<?php endforeach; ?>

<div class="clear"></div>


<?php endforeach; ?>


 </body>
 </html>