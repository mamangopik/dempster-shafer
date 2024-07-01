<?php include '_header.php';

include "../controller/c_Admin.php";
$g = new Admin;
$g->GetRecordPakar($_GET['id_pakar']);
?>		
		<!-- ============================================================== -->
		<!-- Page wrapper  -->
		<!-- ============================================================== -->
		<div class="page-wrapper">
			<!-- ============================================================== -->
			<!-- Bread crumb and right sidebar toggle -->
			<!-- ============================================================== -->
			<div class="page-breadcrumb">
				<div class="row align-items-center">
					<div class="col-5">
						<h4 class="page-title">Manajemen Ubah Data Pakar</h4>
						<div class="d-flex align-items-center">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Beranda</a></li>
								<li class="breadcrumb-item" aria-current="page"><a href="pakar.php">Pakar</a></li>
								<li class="breadcrumb-item active" aria-current="page">Ubah Data Pakar</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<!-- ============================================================== -->
			<!-- End Bread crumb and right sidebar toggle -->
			<!-- ============================================================== -->
			<!-- ============================================================== -->
			<!-- Container fluid  -->
			<!-- ============================================================== -->
			<div class="container-fluid">
				<!-- ============================================================== -->
				<!-- Start Page Content -->
				<!-- ============================================================== -->
				<div class="row">
					<!-- Column -->
					<div class="col-lg-8 col-xlg-9 col-md-7">
						<div class="card">
							<div class="card-body">
								<form method="post" class="form-horizontal form-material" action="">
									<div class="form-group">
										<input type="hidden" value="<?php print $_GET['id_pakar'] ?>" name="id_pakar" />
										<label class="col-md-12">Nama Pakar</label>
										<div class="col-md-12">
											<input type="text" value="<?php print $g->nama; ?>" class="form-control form-control-line" name="nama" required="">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-12">Email</label>
										<div class="col-md-12">
											<input type="email" value="<?php print $g->email; ?>" class="form-control form-control-line" name="email">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-12">No HP</label>
										<div class="col-md-12">
											<input type="number" value="<?php print $g->no_hp; ?>" class="form-control form-control-line" name="no_hp">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-12">Alamat</label>
										<div class="col-md-12">
											<textarea class="form-control form-control-line" name="alamat"><?php print $g->alamat; ?></textarea>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-12">
											<button class="btn btn-success" type="submit" name="simpan">Ubah Data</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- Column -->
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- End PAge Content -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Right sidebar -->
		<!-- ============================================================== -->
		<!-- .right-sidebar -->
		<!-- ============================================================== -->
		<!-- End Right sidebar -->
		<!-- ============================================================== -->
	</div>
	<!-- ============================================================== -->
	<!-- End Container fluid  -->
	<!-- ============================================================== -->
<?php include '_footer.php'; ?>

<?php 
if(isset($_POST['simpan'])){
include "../koneksi/koneksi.php";
$id_pakar = $_POST['id_pakar'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$query = mysqli_query($con, "UPDATE pakar SET nama='$nama', email='$email', no_hp='$no_hp', alamat='$alamat' WHERE id_pakar='$id_pakar'");
echo"<script>window.location.replace('../admin/pakar.php');</script>";
}
?>