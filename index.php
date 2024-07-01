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
  <script type="text/javascript">
    function tampilkanwaktu() { //fungsi ini akan dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik    
      var waktu = new Date(); //membuat object date berdasarkan waktu saat 
      var sh = waktu.getHours() + ""; //memunculkan nilai jam, //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length    //ambil nilai menit
      var sm = waktu.getMinutes() + ""; //memunculkan nilai detik    
      var ss = waktu.getSeconds() + ""; //memunculkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
      document.getElementById("clock").innerHTML = (sh.length == 1 ? "0" + sh : sh) + ":" + (sm.length == 1 ? "0" + sm : sm) + ":" + (ss.length == 1 ? "0" + ss : ss);
    }
  </script>
  <body>
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
              <a class="scroll" href="#beranda">Beranda</a>
            </li>
            <li>
              <a class="scroll" href="#diagnosa">Diagnosa</a>
            </li>
            <li>
              <a class="scroll" href="#hama">Hama</a>
            </li>
            <li>
              <a class="scroll" href="#pakar">Pakar</a>
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
    <div class="container">
      <!-- Home Section with Image Carousel -->
      <section id="beranda" class="container">
        <h1>Selamat Datang di Dempster Shafer</h1>
        <div class="row">
            <div class ="col-md-12" >
                <div class="jumbotron">
                    <h2 class="section-heading mb-4">
                    <span class="section-heading-upper">Apa itu</span>
                    <span class="section-heading-lower">Dempster Shafer ?</span>
                    </h2>
                    <p >Dempster-Shafer adalah suatu teori matematika untuk pembuktian berdasarkan belief functions and plausible reasoning (fungsi kepercayaan dan pemikiran yang masuk akal), yang digunakan untuk mengkombinasikan potongan informasi yang terpisah (bukti) untuk mengkalkulasi kemungkinan dari suatu peristiwa.</p>
                    <div class="intro-button mx-auto">
                    <h2>
                        <a class="btn btn-primary btn-xl scroll" href="#diagnosa" rel="noopener">DIAGNOSA SEKARANG</a>
                    </h2>
                    <h2>
                        <a class="btn btn-primary btn-xl scroll" href="panduan.php" rel="noopener">INFORMASI LEBIH LANJUT</a>
                    </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Image Carousel -->
        <div class = "container-fluid" >
        <div id="imageCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    <img src="assets/img/slideshow/1.png" alt="Slide 1" class="img-responsive">
                </div>
                <div class="item">
                    <img src="assets/img/slideshow/2.png" alt="Slide 2" class="img-responsive" >
                </div>
                <div class="item">
                    <img src="assets/img/slideshow/3.png" alt="Slide 3" class="img-responsive" >
                </div>
                <div class="item">
                    <img src="assets/img/slideshow/4.png" alt="Slide 4" class="img-responsive" >
                </div>
                <!-- <div class="item">
                    <img src="assets/img/slideshow/5.png" alt="Slide 5" class="img-responsive" style="width: 100%;">
                </div> -->
            </div>
        </div>
        </div>
      </section>
      <br>
      <br>
      <!-- Diagnose Section -->
      <section id="diagnosa" class="container">
        <br>
        <br>
        <br>
        <br>
        <h1>Diagnosa</h1>
        <!-- Your diagnose section content goes here -->
        <section class="page-section about-heading">
          <br />
          <div class="container">
            <div class="about-heading-content">
              <div class="row">
                <div class="col-xl-9 col-lg-10 mx-auto">
                  <div class="bg-faded rounded p-5"> <?php
                $data = $pt->TampilSemuaWeb();
                $i=0;$j=0;$k=0;$l=0;
                foreach($data as $d){ ?> <?php
                  if($d['kategori']==1){
                    $gejala['buah'][$i]= array('nama'=>$d['nama'],'id'=>$d['id'],'kode'=>$d['kode']);
                    $i++;
                  }
                  if($d['kategori']==2){
                    $gejala['batang'][$j]= array('nama'=>$d['nama'],'id'=>$d['id'],'kode'=>$d['kode']);
                    $j++;
                  }
                  if($d['kategori']==3){
                    $gejala['bunga'][$k]= array('nama'=>$d['nama'],'id'=>$d['id'],'kode'=>$d['kode']);
                    $k++;
                  }
                  if($d['kategori']==4){
                    $gejala['lainnya'][$l]= array('nama'=>$d['nama'],'id'=>$d['id'],'kode'=>$d['kode']);
                    $l++;
                  }
                  ?> <?php } ?> <form method="post" action="hasil.php">
                      <h2>Gajala Pada Buah</h2>
                      <hr> <?php
              foreach($gejala['buah'] as $gj_buah){
              ?> <label class="container"> <?php print $gj_buah['nama'] ?> <a href="gallery.php?kode=
																					
																											
																												<?php print $gj_buah['kode'] ?>&gejala=
																					
																											
																												<?php print $gj_buah['nama'] ?>" target="_blank">contoh </a>
                        <input type="checkbox" name='gejala[]' value='
																					
																											
																												<?php print $gj_buah['id']?>'>
                        <span class="checkmark"></span>
                      </label> <?php
              }
              ?> <?php if($l>0){?> <br>
                      <hr> <?php }?> <h2>Gajala Pada Batang</h2>
                      <hr> <?php
              foreach($gejala['batang'] as $gj_batang){
              ?> <label class="container"> <?php print $gj_batang['nama'] ?> <input type="checkbox" name='gejala[]' value='
																									
																															
																																<?php print $gj_batang['id']?>'>
                        <a href="gallery.php?kode=
																										
																																
																																	<?php print $gj_batang['kode'] ?>&gejala=
																										
																																
																																	<?php print $gj_batang['nama'] ?>" target="_blank">contoh </a>
                        <span class="checkmark"></span>
                      </label> <?php
              }
              ?> <?php if($l>0){?> <br>
                      <hr> <?php }?> <h2>Gajala Pada Bunga</h2>
                      <hr> <?php
              foreach($gejala['bunga'] as $gj_bunga){
              ?> <label class="container"> <?php print $gj_bunga['nama'] ?> <a href="gallery.php?kode=
																													
																																			
																																				<?php print $gj_bunga['kode'] ?>&gejala=
																													
																																			
																																				<?php print $gj_bunga['nama'] ?>" target="_blank">contoh </a>
                        <input type="checkbox" name='gejala[]' value='
																													
																																			
																																				<?php print $gj_bunga['id'] ?>'>
                        <span class="checkmark"></span>
                      </label> <?php
              }
              ?> <?php if($l>0){?> <br>
                      <hr> <?php }?> <?php if($l>0){?> <h2>Gajala Lainnya</h2>
                      <hr> <?php }?> <?php
              foreach($gejala['lainnya'] as $gj_lainnya){
              ?> <label class="container"> <?php print $gj_lainnya['nama'] ?> <a href="http://localhost/DEMPSTER-SHAFER/gallery.php?kode=
																																	
																																							
																																								<?php print $gj_lainnya['kode'] ?>&gejala=
																																	
																																							
																																								<?php print $gj_lainnya['nama'] ?>" target="_blank">contoh </a>
                        <input type="checkbox" name='gejala[]' value='
																																	
																																							
																																								<?php print $gj_lainnya['id'] ?>'>
                        <span class="checkmark"></span>
                      </label> <?php
              }
              ?> <?php if($l>0){?> <br>
                      <hr> <?php }?> <button type="submit" value="Diagnosa Penyakit" class="btn btn-success text-white">Diagnosa</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </section>
      <!-- Pests Section -->
      <section id="hama" class="container">
        <h1>HAMA BUAH NAGA</h1>
        <!-- Your pests section content goes here -->
        <div class="col-xl-9 col-lg-10 mx-auto">
                      <div class="bg-faded rounded p-5">
                        <h3>
                          <span class="section-heading-upper">1. LALAT BUAH (Bactrocera dorsalis)</span>
                        </h3>
                        <p class="mb-0" style="text-align: justify;"> Lalat buah menyerang buah naga dengan meletakkan telur pada jaringan dibawah kulit buah. Kemudian telur akan menetas menjadi larva dan mulai memakan daging buah sampai terjadi proses pembusukan. Apabila serangan lalat buah berat dan meluas maka dapat menyebabkan gagal panen. Lalat buah adalah salah satu hama yang berpotensi sangat merugikan produksi buah-buahan dan sayuran, baik secara kuantitas maupun kualitas.
                        <p>
                          <center>
                            <img class="rounded" style="" src="assets/img/lalat.png" width="50%" alt="">
                          </center>
                        <h3>
                          <span class="section-heading-upper">2. Thrips</span>
                        </h3>
                        <p class="mb-0" style="text-align: justify;"> Thrips melukai buah saat mereka makan. Thrips merupakan serangga yang merusak tanaman dengan menghisap cairan batang tanaman buah naga. Serangan yang serius akan menyebabkan tanaman tidak bereproduksi dan cabang jugs mati
                        <p>
                          <center>
                            <img class="rounded" style="" src="assets/img/thrips.png" width="50%" alt="">
                          </center>
                        <h3>
                          <span class="section-heading-upper">3. Kutu Daun</span>
                        </h3>
                        <p class="mb-0" style="text-align: justify;"> Kutu daun bersifat vivipara, yang berarti melahirkan. Mereka memiliki tonjolan diujung abdomen yang disebut cornicles, beberapa memiliki sayap, tetapi sebagian tidak bersayap. Mereka bertubuh lunak, bergerak lambat, serangga penghisap dan mengeluarkan embun madu yang disebut melon yang menjadi tempat berkembang biaknya jamur jelaga. Kutu daun menyerang tanaman buah naga dengan menghisap cairan pada batang atau sulur yang menyebabkan batang atau sulur berubah warna menjadi kuning.
                        <p>
                          <center>
                            <img class="rounded" style="" src="assets/img/kutu-daun.png" width="50%" alt="">
                          </center>
                        <h3>
                          <span class="section-heading-upper">4. Kutu Sisik</span>
                        </h3>
                        <p class="mb-0" style="text-align: justify;"> Kutu sisik biasanya menyukai bagian batang atau sulur yang tidak terkena sinar matahari langsung dan batang yang diserang kutu sisik menyebabkan timbul warna kusam. Kutu sisik juga memakan getah tanaman dan juga menghasilkan embun madu.
                        <p>
                          <center>
                            <img class="rounded" style="" src="assets/img/kutu-sisik.png" width="50%" alt="">
                          </center>
                        <h3>
                          <span class="section-heading-upper">5. Kutu Batok</span>
                        </h3>
                        <p class="mb-0" style="text-align: justify;"> Biasanya hama ini menyerang tanaman buah naga dengan cara menghisap cairan pada batang atau cabang, sehingga dapat menyebabkan cabang berubah warna menjadi kuning.
                        <p>
                          <center>
                            <img class="rounded" style="" src="assets/img/kutu-batok.png" width="50%" alt="">
                          </center>
                        <h3>
                          <span class="section-heading-upper">6. Kutu Putih</span>
                        </h3>
                        <p class="mb-0" style="text-align: justify;"> Kutu putih ditemukan dikulit buah maupun sisik. Adapun ciri-ciri buah naga yang terserang kutu putih yaitu: terdapat lapisan lilin berwarna putih. Kutu putih mengundang semut. Semut-semut tersebut bahkan melindungi kutu putih dari para predator.
                        <p>
                          <center>
                            <img class="rounded" style="" src="assets/img/kutu-putih.png" width="50%" alt="">
                          </center>
                        <h3>
                          <span class="section-heading-upper">7. Kepik </span>
                        </h3>
                        <p class="mb-0" style="text-align: justify;"> Hama kepik hitam biasanya menusuk buah yang mengakibatkan buah berkualitas buruk dan memungkinkan bakteri dan jamur masuk ke dalam buah. Kepik hitam juga dapat merusak batang atau sulur, kerusakan ini dipresentasikan sebagai luka tusuk yang dalam. Telur hama kepik hitam diletakkan berjajar sepanjang batang, pada buah, atau pada gulma sekitar tanaman
                        <p>
                          <center>
                            <img class="rounded" style="" src="assets/img/kepik.png" width="50%" alt="">
                          </center>
                        <h3>
                          <span class="section-heading-upper">8. Tungau</span>
                        </h3>
                        <p class="mb-0" style="text-align: justify;"> Hama tungau akan menyerang kulit batang atau sulur yang merusak jaringan klorofil yang berfungsi untuk asimilasi dari hijau menjadi cokelat.
                        <p>
                          <center>
                            <img class="rounded" style="" src="assets/img/tungau.png" width="50%" alt="">
                          </center>
                        <h3>
                          <span class="section-heading-upper">9. Ulat</span>
                        </h3>
                        <p class="mb-0" style="text-align: justify;"> Hama ulat biasanya merusak bunga pada tanaman buah naga. Hama ulat yang menyerang buah naga dari yang awalnya berwarna putih kehijauan, hingga tua dengan garis putih memanjang saat dewasa. Ulat menggunakan bagian mulutnya untuk memakan bunga. Akibat dari serangan tersebut menyebabkan tanaman buah naga bunga layu dan tidak bisa berbuah segar.
                        <p>
                          <center>
                            <img class="rounded" style="" src="assets/img/ulat.png" width="50%" alt="">
                          </center>
                      </div>

      </section>
      <!-- Experts Section -->
      <section id="pakar" class="container">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <h1>Pakar Kami</h1>
        <!-- Your experts section content goes here -->
          <br>
          <br>
          <div class="container">
            <div class="row"> <?php 
            include 'koneksi/koneksi.php';
            $query = mysqli_query($con, "SELECT * FROM pakar");
            while($d = mysqli_fetch_array($query)){
                $alamat = preg_replace('/((http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?)/', '
																																																																											
																																																																												<a href="\1">\1</a>', $d['alamat']);
            ?> <div class="col-md-12">
                <div class="card h-100">
                  <div class="jumbotron">
                    <div class="card-body">
                      <h4 class="card-title" style="text-align:center"> <?php echo $d['nama']; ?> </h4>
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                          <label>No. HP</label>
                          <span>: <?php echo $d['no_hp']; ?> </span>
                        </li>
                        <li class="list-group-item">
                          <label>Email</label>
                          <span>: <?php echo $d['email']; ?> </span>
                        </li>
                        <li class="list-group-item">
                          <label>Alamat</label>
                          <span>: <?php echo $alamat; ?> </span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div> <?php } ?> </div>
          </div>
      </section>
    </div>
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