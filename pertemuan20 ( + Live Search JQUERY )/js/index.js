$(document).ready(function() {
	
	// Mengilangkan Tombol Cari / Search Data, Karena Sekarang Sudah secara Otomatis Dicarikan Data Oleh JQUERY
	$('#tombolcari').hide();



	// Buat Event Ketika User Akan Melakukan Pencarian Data
	// Ketika User Menginput Keyword Pencarian Maka JQUERY Akan Secara Otomatis Mencari Data Yang Sama

	$('#keyword').on('keyup', function() {

	// Menampilkan Animasi Loading Ketika User Sedang Melakukan Pencarian
	$('.loader').show();

	// AJAX MENGGUNAKAN .lOAD ( tidak bisa menambahkan animasi loading jika menggunakan .LOAD )
	// $('#conten').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

	// AJAX MENGGUNAKAN .GET
	$.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function (data) {

		// Akan Menampilkan Animasi Loading Ketika User Melakukan Pencarian
		$('#conten').html(data);

		// Animasi Loading Akan Hilang Setelah Data Yang Dicari User Ditampilkan
		$('.loader').hide ();
	
	});

})

});