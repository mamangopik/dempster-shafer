<?php 
include '../controller/c_Gejala.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$kategori = $_POST['kategori'];


$update = new Gejala;
$update->EditGejala($id, $nama,$kategori);

header('location: ../admin/gejala.php');
?>