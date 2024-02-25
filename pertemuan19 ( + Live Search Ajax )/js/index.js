
// Memilih Atau Menandai Element Yang Dibutuhkan / Dipanggil Untuk Eksekusi fungsi
var keyword = document.getElementById('keyword');
var tombolcari = document.getElementById('tombolcari');
var conten = document.getElementById('conten');


// Menambahkan Event Ketika Kolom Search Diisi Oleh user
keyword.addEventListener('keyup', function () {

	// Membuat Objek AJAX
	var ajax = new XMLHttpRequest();

	// Menyiapkan Kesiapan AJAX
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4 && ajax.status == 200 ) {
			conten.innerHTML = ajax.responseText;
		}
	}

    // Mengeksekusi AJAX
	ajax.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true );
	ajax.send();
    
} );