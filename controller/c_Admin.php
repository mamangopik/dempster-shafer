<?php 
/**
 * 
 */
class Admin
{

	function GetRecordPakar($id_pakar)
	{
		include '../koneksi/koneksi.php';
		$query = mysqli_query($con, "SELECT * FROM pakar where id_pakar = '$id_pakar'");
		$p = mysqli_fetch_object($query);
		$this->id_pakar = $p->id_pakar;
		$this->nama = $p->nama;
		$this->email = $p->email;
		$this->no_hp = $p->no_hp;
		$this->alamat = $p->alamat;
	}

	function TampilDataAdmin($id_admin)
	{
		include '../koneksi/koneksi.php';
		$query = mysqli_query($con, "SELECT * FROM admin where id_admin = '$id_admin'");
		$p = mysqli_fetch_object($query);
		$this->id_admin = $p->id_admin;
		$this->nama = $p->nama;
		$this->username = $p->username;
		$this->password = $p->password;
		$this->email = $p->email;
		$this->nohp = $p->nohp;
	}

	function GetPakarAll()
	{
		include '../koneksi/koneksi.php';
		$query = mysqli_query($con, "SELECT * FROM pakar");
		$i = 0;
		while($d = mysqli_fetch_array($query))
		{
			$data[$i]['id_pakar'] = $d['id_pakar'];
			$data[$i]['nama'] = $d['nama'];
			$data[$i]['alamat'] = $d['alamat'];
			$data[$i]['email'] = $d['email'];
			$data[$i]['no_hp'] = $d['no_hp'];
			$i++;
		}
		return $data;
	}

	function HapusPakar($id_pakar)
	{	
		var_dump($id_pakar);
		try{
			include '../koneksi/koneksi.php';
			$query = mysqli_query($con, "DELETE FROM pakar WHERE id_pakar = '$id_pakar'");
		}
		catch(Exception $e){
			$con = mysqli_connect("localhost","root","","spdempstershaferv1");
			if(mysqli_connect_errno($con)){
				echo "Failed to connect to MySQL : ".mysqli_connect_error();
			}
			else{
				echo "";
				$query = mysqli_query($con, "DELETE FROM pakar WHERE id_pakar = '$id_pakar'");
			}
		}
	}

	function DokterSemua()
	{
		include '../koneksi/koneksi.php';
		$query = mysqli_query($con, "SELECT * FROM admin where tingkat = 'dokter'");
		$i = 0;
		while($d = mysqli_fetch_array($query))
		{
			$data[$i]['id_admin'] = $d['id_admin'];
			$data[$i]['username'] = $d['username'];
			$data[$i]['nama'] = $d['nama'];
			$data[$i]['password'] = $d['password'];
			$data[$i]['email'] = $d['email'];
			$data[$i]['nohp'] = $d['nohp'];
			$i++;
		}
		return $data;
	}

	function TambahDokter($nama, $username, $password, $email, $nohp, $tingkat)
	{
		include "../koneksi/koneksi.php";
		$query = mysqli_query($con, "INSERT INTO admin (nama, username, password, email, nohp, tingkat)
			values('$nama', '$username', '$password', '$email', '$nohp', '$tingkat')");
	}

	function UbahDokter($id_admin, $nama, $username, $password, $email, $nohp)
	{
		include "../koneksi/koneksi.php";
		$query = mysqli_query($con, "UPDATE admin set nama='$nama',username='$username',password='$password',email='$email',nohp='nohp' WHERE id_admin='$id_admin'");
	}

	function HapusDokter($id_admin)
	{
		include "../koneksi/koneksi.php";
		$query = mysqli_query($con, "DELETE FROM admin WHERE id_admin = '$id_admin'");
	}

	function Login($username, $password)
	{
		include '../koneksi/koneksi.php';
		$query = mysqli_query($con, "SELECT * FROM admin where username='$username' AND password='$password'");		
	}
}
error_reporting(0);
 ?>