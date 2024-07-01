<?php
error_reporting(0);
include "controller/c_Diagnosa.php";
$dg = new Diagnosa();
function getCertaintyDescription($percentage) {
    if ($percentage == 100) {
        return strtoupper("sangat pasti");
    } elseif ($percentage >= 75 && $percentage <= 99) {
        return strtoupper("pasti");
    } elseif ($percentage >= 50 && $percentage <= 74) {
        return strtoupper("cukup pasti");
    } else {
        return strtoupper("belum pasti");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistem Pakar Diagnosa Menggunakan Metode Dempster Shafer">
    <meta name="author" content="My Coding">
    <link rel="icon" type="image/png" sizes="16x16" href="assetsA/assets/images/Logo-SP.png">
    <!-- SEO -->
    <meta name="keywords" content="Sistem Pakar, Diagnosa Penyakit, Metode Dempster Shafer">
    <title>Dempster Shafer</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/business-casual.min.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 70px;
        /* Adjust the top padding based on your navbar height */
      }

      h1 {
        text-align: center;
      }


      body {
        background-color: #ECECEC;
      }

      .container {
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      /* Custom Navbar Color */
      .navbar-custom {
        background-color: #336699;
        /* Your desired color code */
        border-color: #336699;
        /* Optional: set the border color if needed */
      }

      /* Custom Navbar Text Color */
      .navbar-custom .navbar-brand,
      .navbar-custom .navbar-nav>li>a {
        color: #ffffff;
        /* Your desired text color */
      }

      /* Custom Navbar Text Color on Hover */
      .navbar-custom .navbar-nav>li>a:hover {
        color: #ffffff;
        /* Your desired text color on hover */
      }

      .footer {
        background-color: #336699;
        border-color: #336699;
        color: #ffffff;
      }
    </style>
    <script type="text/javascript">
      function tampilkanwaktu() { //fungsi ini akan dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik    
        var waktu = new Date(); //membuat object date berdasarkan waktu saat 
        var sh = waktu.getHours() + ""; //memunculkan nilai jam, //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length    //ambil nilai menit
        var sm = waktu.getMinutes() + ""; //memunculkan nilai detik    
        var ss = waktu.getSeconds() + ""; //memunculkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        document.getElementById("clock").innerHTML = (sh.length == 1 ? "0" + sh : sh) + ":" + (sm.length == 1 ? "0" + sm : sm) + ":" + (ss.length == 1 ? "0" + ss : ss);
      }
    </script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top navbar-custom ">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <a class="navbar-brand" href="#home">
                <img alt="Brand" src="assets/img/favicon.png" width='32px' height='32px'>
              </a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li>
                  <a class="scroll" href="index.php#beranda">Beranda</a>
                </li>
                <li>
                  <a class="scroll" href="index.php#diagnosa">Diagnosa</a>
                </li>
                <li>
                  <a class="scroll" href="index.php#hama">Hama</a>
                </li>
                <li>
                  <a class="scroll" href="index.php#pakar">Pakar</a>
                </li>
                <li>
                  <a class="scroll" href="login.php" target="blank">Login</a>
                </li>
              </ul>
            </div>
            <!-- /.navbar-collapse -->
          </div>
          <!-- /.container-fluid -->
        </nav>
        <!-- <br>
        <br>
        <br> -->
        <h1 class="site-heading text-center d-none d-lg-block">
          <span class="site-heading-upper text-primary mb-3">Diagnosa Hama Tanaman Buah Naga</span>
          <span class="site-heading-lower">Dempster Shafer</span>
        </h1>
        <div class="container">
            <div class = "row  mb-3">
            <section class="page-section about-heading">
          <p style="text-align: center;">
            <!-- <img src='assets/img/dokter.png' width='50%' style='float: right; margin-top: -30px;'> --> <?php
            include "koneksi/koneksi.php";

            if (isset($_POST["gejala"])) {
                if (
                    count($_POST["gejala"]) < 1
                ) { ?> <script language="JavaScript">
              alert('Gejala Hama Wajib Dipilih !');
              document.location = 'index.php#diagnosa'
            </script> <?php
                    /*echo "Pilih minimal 2 gejala";*/
                    /*echo "Pilih minimal 2 gejala";*/
                    } else {$sql =
                        "SELECT GROUP_CONCAT(b.id), a.ds
										FROM ds_aturan a
										JOIN ds_penyakit b ON a.id_penyakit=b.id
										WHERE a.id_gejala IN(" .
                        implode(",", $_POST["gejala"]) .
                        ") 
										GROUP BY a.id_gejala";
                    $result = mysqli_query($con, $sql);
                    $gejala = [];
                    while ($row = $result->fetch_row()) {
                        $gejala[] = $row;
                    }

                    //--- menentukan environement
                    $sql = "SELECT GROUP_CONCAT(id) FROM ds_penyakit";
                    $result = mysqli_query($con, $sql);
                    $row = $result->fetch_row();
                    $fod = $row[0];

                    //--- menentukan nilai densitas
                    $densitas_baru = []; // 1
                    while (!empty($gejala)) {
                        // 2
                        $densitas1[0] = array_shift($gejala); // 3
                        $densitas1[1] = [$fod, 1 - $densitas1[0][1]]; // 4
                        $densitas2 = []; // 5
                        if (empty($densitas_baru)) {
                            // 6
                            $densitas2[0] = array_shift($gejala); // 7
                        } else {
                            foreach ($densitas_baru as $k => $r) {
                                // 8
                                if ($k != "&theta;") {
                                    // 9
                                    $densitas2[] = [$k, $r];
                                    //var_dump(expression)				// 10
                                }
                            }
                        }
                        $theta = 1; // 11
                        foreach ($densitas2 as $d) {
                            $theta -= $d[1];
                        } // 12 & 13
                        $densitas2[] = [$fod, $theta]; // 14
                        $m = count($densitas2); // 15
                        $densitas_baru = []; // 16

                        $densitas_baru = $dg->perkaliantabel(
                            $m,
                            $densitas1,
                            $densitas2,
                            $densitas_baru
                        );
                        foreach ($densitas_baru as $k => $d) {
                            // 31
                            if ($k != "&theta;") {
                                // 32
                                $densitas_baru[$k] =
                                    $d /
                                    (1 -
                                        (isset($densitas_baru["&theta;"])
                                            ? $densitas_baru["&theta;"]
                                            : 0)); //33
                            }
                        }
                        //menampilkan array perhitungan
                        /*print_r($densitas_baru);*/
                    }

                    //--- perangkingan
                    unset($densitas_baru["&theta;"]); // 34
                    arsort($densitas_baru);
                    //menampilkan array perhitungan
                    /*print_r($densitas_baru);*/

                    //--- menampilkan hasil akhir
                    $codes = array_keys($densitas_baru);
                    $sql = "SELECT GROUP_CONCAT(nama) 
										FROM ds_penyakit 
										WHERE id IN('{$codes[0]}')";
                    $result = mysqli_query($con, $sql);
                    $row = $result->fetch_row();
                    // $densitas_baru = !is_nan(round($densitas_baru[$codes[0]]*100,2) ? round($densitas_baru[$codes[0]]*100,2) : 0);
                    // if (round($densitas_baru[$codes[0]]*100,2) < 80) {

                    if (is_nan(round($densitas_baru[$codes[0]] * 100, 2))) {
                        $nilai_persentase = 0;
                    } else {
                        $nilai_persentase = round(
                            $densitas_baru[$codes[0]] * 100,
                            2
                        );
                    }

                    if ($nilai_persentase < 80) {
                        echo "Tanaman tidak terdeteksi hama 
																				<br>
																					<br>"; ?> <img src='assets/img/dokter.png' width='50%' style='float: right; margin-top: -100px;'> <?php
                    } else {

                        if (is_nan(round($densitas_baru[$codes[0]] * 100, 2))) {
                            $total_hasil_kepercayaan = 0;
                        } else {
                            $total_hasil_kepercayaan = round(
                                $densitas_baru[$codes[0]] * 100,
                                2
                            );
                        }

                        // $total_hasil_kepercayaan = number_format($hasil_kepercayaan,0,',','.');
                        $hama = $row[0];
                        ?>
                        <div class="row">
                        <?php
                        echo "Terdeteksi Hama <b style='color:red'>{$row[0]}</b> dengan derajat kepercayaan <b>" .
                            $total_hasil_kepercayaan .'% ('.getCertaintyDescription($total_hasil_kepercayaan) .') '."</b><br>";
                        ?> </div>
                         
                        <div class="row">
                        <img style ="margin-left:5%;" src='assets/img/hasil/<?php echo $hama; ?>.png' alt="result" width='50%' style='float: right; margin-top: -50px;'>
                        </div>
                        <?php
                    }

                    //--- menampilkan keterangan dari penyakit
                    $queries = "SELECT kett FROM ds_penyakit WHERE nama = '$row[0]'";
                    $result = mysqli_query($con, $queries);
                    $value = mysqli_fetch_object($result);

                    if (is_nan(round($densitas_baru[$codes[0]] * 100, 2))) {
                        $nilai_persentase = 0;
                    } else {
                        $nilai_persentase = round(
                            $densitas_baru[$codes[0]] * 100,
                            2
                        );
                    }

                    if ($nilai_persentase < 80) {
                        # code...
                    } else {
                        echo "Solusi :
																										<br>" .
                            $value->kett .
                            "
																											<br>
																												<br>";
                    }

                    $gejala = "";

                    //--- menampilkan gejala yang dipilih
                    echo "Gejala yang dipilih :
																													<br>";
                    $i = 0;
                    foreach ($_POST["gejala"] as $item) {
                        $query = "SELECT nama FROM ds_gejala WHERE id = '$item'";
                        $result = mysqli_query($con, $query);
                        $value = mysqli_fetch_object($result);
                        $i++;
                        echo $i .
                            ". " .
                            $value->nama .
                            "
																														<br>";
                        //-- insert gejala
                        $gejala .=
                            $i .
                            ". " .
                            $value->nama .
                            "
																															<br>";
                    }
                    //-- insert penyakit
                    $penyakit = $row[0];
                    //--insert nilai

                    //-- insert persentase

                    if (is_nan(round($densitas_baru[$codes[0]] * 100, 2))) {
                        $persentase = "0%";
                        $nilai = 0;
                    } else {
                        $persentase =
                            round($densitas_baru[$codes[0]] * 100, 2) . "%";
                        $nilai = $densitas_baru[$codes[0]];
                    }
                    //-- insert tanggal sekarang
                    $tanggal =
                        date("d-m-Y") .
                        "
																																<br>" .
                        date("h:i:s A");

                    //--- memasukkan hasil diagnosa ke database
                    $input = mysqli_query(
                        $con,
                        "INSERT INTO diagnosa (tanggal, gejala, penyakit, nilai, persentase) values('$tanggal', '$gejala', '$penyakit', '$nilai', '$persentase')"
                    );
                    if (count($_POST["gejala"]) < 5) {
                        if (round($densitas_baru[$codes[0]] * 100, 2) < 80) {
                            echo "
																																	<br>
																																		<br>
																																			<br>";
                        }
                    }}
            } else {
                 ?> <script language="JavaScript">
              alert('Gejala Hama Wajib Dipilih !');
              document.location = 'index.php#diagnosa'
            </script> <?php
            }
            ?>
          </p>
        </section>
            </div>
        </div>
      </div>
    </div> <?php
    include "koneksi/koneksi.php";
    $query = mysqli_query(
        $con,
        "SELECT COUNT(id_diagnosa) as jml_data FROM diagnosa"
    );
    $hasil = mysqli_fetch_array($query);
    $jml_data = $hasil["jml_data"];
    ?> <footer class="footer text-faded text-center py-5">
      <div class="container">
        <p>Total konsultasi : <?php echo $jml_data; ?> <br />Copyright &copy;2024 <a style="color:white;" href="">Dempster Shafer</a>
        </p>
      </div>
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script type="text/javascript">

    </script>
  </body>
</html>