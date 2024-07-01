<?php include '_header.php'; 

include "../controller/c_Admin.php";
$p = new Admin;
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
                <h4 class="page-title">Data Pakar</h4>
                <div class="d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pakar</li>
                    </ol>
                </div>
            </div>
            <div class="col-7">
                <div class="text-right upgrade-btn">
                    <a href="tpakar.php" class="btn btn-danger text-white"><i class="mdi mdi-plus"></i> Tambah Pakar</a>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="bootstrap-data-table" class="table table-hover table-bordered">
                                <thead style="background-color: #336699; color: #ffffff;">
                                  <tr>
                                    <th style="color: white;" width="5%">No</th>
                                    <th style="color: white;">Nama</th>
                                    <th style="color: white;">Email</th>
                                    <th style="color: white;">No Hp</th>
                                    <th style="color: white;">Alamat</th>
                                    <th style="color: white;" width="8%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $data = $p->GetPakarAll();
                                if (!isset($data)) {
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php
                                } else {
                                    $i=0;
                                foreach($data as $d){ 
                                    $i++;
                                    $alamat = preg_replace('/((http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?)/', '<a href="\1">\1</a>', $d['alamat']);
                                    ?>
                                    <tr>
                                        <td><?php print $i; ?></td>
                                        <td><?php print $d['nama']; ?></td>
                                        <td><?php print $d['email']; ?></td>
                                        <td><?php print $d['no_hp']; ?></td>
                                        <td><?php print $alamat; ?></td>
                                        <td>
                                            <a href="epakar.php?id_pakar=<?php print $d['id_pakar']; ?>" class="btn btn-info btn-simple btn-xs text-white" title="Edit Data Dokter"><i class="mdi mdi-lead-pencil"></i></a>

                                            <a onclick="if (! confirm('Apakah anda yakin akan menghapus Pakar dari daftar ?')) { return false; }" href="../ProsesA/d_pakar.php?id_pakar=<?php print $d['id_pakar']; ?>" class="btn btn-danger btn-simple btn-xs text-white" title="Hapus Dokter"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                <?php }} ?>
                            </tbody>
                        </table>
                    </tbody>
                </table>
                <h5>
                Klik Link Ini Untuk Short URL Google Map Anda : <a href="https://www.shorturl.at/">https://www.shorturl.at/</a>
                </h5>
            </div>
        </div>
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
