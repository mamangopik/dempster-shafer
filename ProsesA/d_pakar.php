<?php 
include '../controller/c_Admin.php';
$hapus = new Admin;

$id_pakar = $_GET['id_pakar'];
echo $id_pakar;
if (!empty($id_pakar)) {
	$hapus->HapusPakar($id_pakar);
	header('location: ../admin/pakar.php');
} else {
	header('location: ../admin/pakar.php');
}
?>