<?php  
include "../controller/c_Hama.php";

$hapus = new Penyakit;

$id = $_GET['id'];
if (!empty($id)) {
	$hapus->HapusPenyakit($id);
	header('location: ../admin/hama.php');
} else {
	header('location: ../admin/hama.php');
}
?>