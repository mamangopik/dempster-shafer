<?php
include "controller/c_Gejala.php";
$pt = new Gejala; 
$gejala=array('buah'=>array(),
              'batang'=>array(),
              'bunga'=>array(),
              'lainnya'=>array(),
            );
            include 'koneksi/koneksi.php';
            $query = mysqli_query($con, "SELECT COUNT(id_diagnosa) as jml_data FROM diagnosa");
            $hasil = mysqli_fetch_array($query);
            $jml_data = $hasil['jml_data'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dempster Shafer</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles -->
    <style>
      body {
        padding-top: 70px;
        /* Adjust the top padding based on your navbar height */
      }

      h1 {
        text-align: center;
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

      /* Hide the browser's default checkbox */
      .container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
      }

      /* Create a custom checkbox */
      .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #eee;
      }

      /* On mouse-over, add a grey background color */
      .container:hover input~.checkmark {
        background-color: #ccc;
      }

      /* When the checkbox is checked, add a blue background */
      .container input:checked~.checkmark {
        background-color: #2196F3;
      }

      /* Create the checkmark/indicator (hidden when not checked) */
      .checkmark:after {
        content: "";
        position: absolute;
        display: none;
      }

      /* Show the checkmark when checked */
      .container input:checked~.checkmark:after {
        display: block;
      }

      /* Style the checkmark/indicator */
      .container .checkmark:after {
        left: 9px;
        top: 5px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
      }


      /* Custom Navbar Color */
      .navbar-custom {
        background-color: #336699; /* Your desired color code */
        border-color: #336699; /* Optional: set the border color if needed */
      }

      /* Custom Navbar Text Color */
      .navbar-custom .navbar-brand,
      .navbar-custom .navbar-nav > li > a {
        color: #ffffff; /* Your desired text color */
      }

      /* Custom Navbar Text Color on Hover */
      .navbar-custom .navbar-nav > li > a:hover {
        color: #ffffff; /* Your desired text color on hover */
      }

      .footer {
        background-color: #336699;
        border-color: #336699;
        color: #ffffff;
      }
    </style>
  </head>

<body>
  <!-- Navigation -->

  <nav class="navbar navbar-default navbar-fixed-top navbar-custom ">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <a class="navbar-brand" href="#home">
            <img alt="Brand" src="assets/img/favicon.png" width='32px' height = '32px'>
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
              <a class="" href="index.php#beranda">Beranda</a>
            </li>
            <li>
              <a class="" href="index.php#diagnosa">Diagnosa</a>
            </li>
            <li>
              <a class="" href="index.php#hama">Hama</a>
            </li>
            <li>
              <a class="" href="index.php#pakar">Pakar</a>
            </li>
            <li>
              <a class="" href="login.php" target="blank">Login</a>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  

  <section class="page-section about-heading">
    <div class="container">
      <h1 class="site-heading text-left d-none d-lg-block">
        <span class="site-heading-upper text-primary mb-3">Diagnosa Hama Tanaman Buah Naga</span>
        <span class="site-heading-lower text-primary mb-3">Dempster Shafer</span>
      </h1>
      <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="assets/img/panduan.jpg" alt="" width="80%">
      <div class="about-heading-content">
        <div class="row">
          <div class="col-xl-9 col-lg-10 mx-auto">
            <div class="bg-faded rounded p-5">
              <h2 class="section-heading mb-4">
                <!-- <span class="section-heading-upper">Strong Coffee, Strong Roots</span> -->
                <span class="section-heading-lower">Panduan Tata Cara Diagnosa Penyakit</span>
              </h2>
              <p style="text-align: justify;">Dempster-Shafer adalah suatu teori matematika untuk pembuktian berdasarkan belief functions and plausible reasoning (fungsi kepercayaan dan pemikiran yang masuk akal), yang digunakan untuk mengkombinasikan potongan informasi yang terpisah (bukti) untuk mengkalkulasi kemungkinan dari suatu peristiwa.</p>

              <h3><span class="section-heading-upper">BAGAIMANA CARA MELAKUKAN DIAGNOSA PENYAKIT?</span></h3>
              <p class="mb-0">Diagnosa penyakit dapat dilakukan apabila telah menginput 2 gejala atau lebih, dikarenakan untuk mendiagnosa sebuah penyakit dibutuhkan minimal 2 buah gejala agar penyakit dapat didiagnosa.</p>

              <br>
              <h3><span class="section-heading-upper">BAGAIMANA JIKA GEJALA YANG ANDA RASAKAN TIDAK TERDAPAT DI SISTEM?</span></h3>
              <p class="mb-0">Pada saat ini hanya beberapa gejala dan tingkatan penyakit yang dapat didiagnosa oleh sistem, maka dari itu proses diagnosa penyakit hanya bisa dilakukan jika gejala dan penyakit sudah terdaftar pada sistem.</p>

              <br>
              <h3><span class="section-heading-upper">APAKAH DIAGNOSA PENYAKIT PADA SISTEM SUDAH 100% BENAR?</span></h3>
              <p class="mb-0">Diagnosa penyakit pada sistem dilakukan dengan perhitungan yang menggunakan metode <i>Dempster-Shafer</i> dengan nilai kepercayaan bersumber dari pakar/dokter ahli paru-paru, guna melakukan upaya penanganan dini terhadap penyakit tersebut. tetapi akan lebih baik jika melakukan konsultasi ulang bersama dokter ahli paru-paru, agar masalah yang anda hadapi dapat ditangani lebih baik.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php 
  include 'koneksi/koneksi.php';
  $query = mysqli_query($con, "SELECT COUNT(id_diagnosa) as jml_data FROM diagnosa");
  $hasil = mysqli_fetch_array($query);
  $jml_data = $hasil['jml_data'];
  ?>
</body>
<!-- Bootstrap JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- Custom JavaScript for Carousel and Smooth Scrolling -->
  <script>
    $(document).ready(function() {
      // Activate Carousel for Home Section
      $("#imageCarousel").carousel({
        interval: 2000
      });
      // Smooth Scrolling
      $(".scroll").on('click', function(event) {
        if (this.hash !== "") {
          event.preventDefault();
          var hash = this.hash;
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 500, function() {
            window.location.hash = hash;
          });
        }
      });
    });
  </script>
  <footer class="footer text-faded text-center py-5">
    <div class="container">
      <p >Total konsultasi : <?php echo $jml_data; ?> <br />Copyright &copy;2024 <a style="color:white;" href="">Dempster Shafer</a>
      </p>
    </div>
  </footer>
</html>
