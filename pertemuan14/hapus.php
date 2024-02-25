<?php 

require 'function.php';


$id = $_GET["id"];


if (hapus ($id) > 0 ) {
	echo " 
			<script> 
				alert ('Data Deleted Successfully');
				document.location.href = 'index.php';
			</script>
			";

}  else {
		echo "
			<script> 
				alert ('Data Failed to Delete');
				document.location.href = 'index.php';
			</script>

			";
}

 ?>