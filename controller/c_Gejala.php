<?php 
/**
 * 
 */
class Gejala
{

	function TampilSemua()
	{
		include "../koneksi/koneksi.php";
		$query = mysqli_query($con, "SELECT * from ds_gejala");
		$i = 0;
		while($d = mysqli_fetch_array($query))
		{
			$data[$i]['id'] = $d['id'];
			$data[$i]['nama'] = $d['nama'];
			$i++;
		}
		return $data;
	}

	function InsertGejala($nama,$kategori){
		include "../koneksi/koneksi.php";
		$query = mysqli_query($con, "INSERT INTO ds_gejala (nama,kategori)
			values('$nama',$kategori)");
	}

	function HapusGejala($id)
	{
		include "../koneksi/koneksi.php";
		mysqli_query($con, "DELETE FROM ds_gejala WHERE id = '$id'");
	}

	function EditGejala($id,$nama,$kategori)
	{
		include "../koneksi/koneksi.php";
		// $query = mysqli_query($con, "UPDATE ds_gejala set nama='$nama' WHERE id='$id'");
		$query = mysqli_query($con, "UPDATE ds_gejala SET nama='$nama', kategori='$kategori' WHERE id='$id'");

	}

	function TampilSatuData($id)
	{
		include "../koneksi/koneksi.php";
		$query = mysqli_query($con, "SELECT * FROM ds_gejala WHERE id = '$id'");
		$g = mysqli_fetch_object($query);
		$this->id = $g->id;
		$this->nama = $g->nama;
		$this->kategori = $g->kategori;
	}

	function TampilAngka()
	{
		include "../koneksi/koneksi.php";
		$query = mysqli_query($con, "SELECT max(id) as nilai FROM ds_gejala");
		$g = mysqli_fetch_object($query);
		$this->nilai = $g->nilai;
	}


	//bagian halaman utama
	function TampilSemuaWeb()
	{
		include "koneksi/koneksi.php";
		$query = mysqli_query($con, "SELECT * from ds_gejala");
		$i = 0;
		while($d = mysqli_fetch_array($query))
		{
			try{
				$data[$i]['id'] = $d['id'];
				$data[$i]['nama'] = $d['nama'];
				$data[$i]['kategori'] = $d['kategori'];
				$data[$i]['kode'] = $d['kode'];
				$i++;
			}catch(Exception $e){
				$data[$i]['id'] = $d['id'];
				$data[$i]['nama'] = $d['nama'];
				$i++;
			}
		}
		return $data;
	}
}
error_reporting(0);
?>