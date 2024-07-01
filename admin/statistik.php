<?php include "_header.php";

include "../controller/c_Riwayat.php";
$r = new Riwayat();

$data = $r->TampilSemua();
?>



<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<script src="../assetsA/assets/libs/plotly/plotly.min.js"></script>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-12">
                <h4 class="page-title">Statistik</h4>
                <div class="d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Statistik</li>
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
            <div id="pie"></div>
        </div>
        <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <div class="jumbotron">
                    <div class="container">
                        <h2>Total Diagnosa</h2>
                        <h1 id="tdiagnosa" class="bg btn-outline-primary"><?php echo count($data); ?></h1>
                    </div>
                </div>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <div class="jumbotron">
                    <div class="container">
                        <h2>Hama Terdata</h2>
                        <h1 id="thama" class="bg btn-outline-primary">50</h1>
                    </div>
                </div>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <div class="jumbotron">
                    <div class="container">
                        <h2>Gejala Terdata</h2>
                        <h1 id="tgejala" class="bg btn-outline-primary">50</h1>
                    </div>
                </div>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <div class="jumbotron">
                    <div class="container">
                        <h2>Total Pakar</h2>
                        <h1 id="tpakar" class="bg btn-outline-primary">50</h1>
                    </div>
                </div>
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


<?php
if (!isset($data)) {
} else {
    $penyakit = [];
    $i = 0;
    foreach ($data as $d) {
        $i++;
        array_push($penyakit,$d["penyakit"]);
    }
    // var_dump($penyakit);
    // Count occurrences of each item
    $counts = array_count_values($penyakit);
    var_dump($counts);
    echo $counts["Ulat"];

    // Calculate the total number of items
    $total = count($penyakit);

    // Calculate the percentage for each item
    $percentages = [];
    foreach ($counts as $key => $value) {
        $percentages[$key] = ($value / $total) * 100;
    }

    
}
?>
<script>

var label_data=[];
var label_nilai=[];
var data = [{
  values: label_nilai,
  labels: label_data,
  type: 'pie'
}];

<?php
// Output the results
foreach ($percentages as $key => $percentage) {
        echo "label_data.push('$key'+' ('+$counts[$key]+' diagnosa )');\n";
        echo "label_nilai.push(parseFloat($percentage).toFixed(1));\n";
        // echo "$key: $percentage%\n";
}
?>

var layout = {
    paper_bgcolor:"#FFF3",
    title:'Persentase Riwayat Diagnosa',
    font: {size: 18}
};

var config = {responsive: true};

Plotly.newPlot('pie', data, layout,config);

</script>