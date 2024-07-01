<?php
include "../controller/c_Hama.php";

$nama = $_POST['nama'];
$kett = $_POST['kett'];

$insert = new Penyakit;
$insert->InsertPenyakit($nama, $kett);
header('location: ../admin/hama.php')
?>