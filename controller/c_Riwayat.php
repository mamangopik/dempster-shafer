<?php 
/**
 * 
 */
class Riwayat
{
	
	function TampilSemua()
	{
		include '../koneksi/koneksi.php';
		$query = mysqli_query($con, "SELECT * from diagnosa");
		$i = 0;
		while($d = mysqli_fetch_array($query))
		{
			$data[$i]['id_diagnosa'] = $d['id_diagnosa'];
			$data[$i]['tanggal'] = $d['tanggal'];
			$data[$i]['gejala'] = $d['gejala'];
			$data[$i]['penyakit'] = $d['penyakit'];
			$data[$i]['nilai'] = $d['nilai'];
			$data[$i]['persentase'] = $d['persentase'];
			$i++;
		}
		return $data;
	}

	function Hapus($id_diagnosa)
	{
		try{
			include '../koneksi/koneksi.php';
			$query = mysqli_query($con, "DELETE FROM diagnosa WHERE id_diagnosa = '$id_diagnosa'");
		}
		catch(Exception $e){
			$con = mysqli_connect("localhost","root","","spdempstershaferv1");
			if(mysqli_connect_errno($con)){
				echo "Failed to connect to MySQL : ".mysqli_connect_error();
			}
			else{
				echo "";
				$query = mysqli_query($con, "DELETE FROM diagnosa WHERE id_diagnosa = '$id_diagnosa'");
			}
		}
	}

	function Count(){
		include 'koneksi/koneksi.php';
		$query = mysqli_query($con, "SELECT COUNT(id_diagnosa) as jml_data FROM diagnosa");
		$hasil = mysqli_fetch_array($query);
		$jml_data = $hasil['jml_data'];
		return $jml_data;
	}
}
//error_reporting(0);
 ?>