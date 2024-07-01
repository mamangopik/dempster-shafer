<?php 
include '../controller/c_Gejala.php';

$nama = $_POST['nama'];
$kategori = $_POST['kategori'];

$insert = new Gejala;
$insert->InsertGejala($nama,$kategori);
header('location: ../admin/gejala.php')
?>