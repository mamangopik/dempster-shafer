/*
SQLyog Professional
MySQL - 8.0.30 : Database - spdempstershaferv1
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `tingkat` varchar(250) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

/*Data for the table `admin` */

insert  into `admin`(`id_admin`,`nama`,`username`,`password`,`email`,`nohp`,`tingkat`) values 
(1,'Admin','admin','admin','admin@gmail.com','081290522','admin'),
(2,'dr. Azizman Saad, Sp.P (K)','pakar','pakar','pakar@gmail.com','081290522','dokter');

/*Table structure for table `diagnosa` */

DROP TABLE IF EXISTS `diagnosa`;

CREATE TABLE `diagnosa` (
  `id_diagnosa` int NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(50) NOT NULL,
  `gejala` text NOT NULL,
  `penyakit` varchar(250) NOT NULL,
  `nilai` varchar(50) NOT NULL,
  `persentase` varchar(50) NOT NULL,
  PRIMARY KEY (`id_diagnosa`)
) ENGINE=InnoDB AUTO_INCREMENT=426 DEFAULT CHARSET=utf8mb3;

/*Data for the table `diagnosa` */

insert  into `diagnosa`(`id_diagnosa`,`tanggal`,`gejala`,`penyakit`,`nilai`,`persentase`) values 
(416,'30-10-2023<br>09:13:34 AM','1. Terdapat bintik-bintik kecil berwarna hitam (lubang hitam) dibagian kulit buah, baik buah yang sudah dipetik atau buah yang masih dipohon<br>2. Ditemukan larva pada kelopak bunga<br>','Ulat','0','0%'),
(417,'30-10-2023<br>09:15:28 AM','1. Terdapat bintik-bintik kecil berwarna hitam (lubang hitam) dibagian kulit buah, baik buah yang sudah dipetik atau buah yang masih dipohon<br>2. Ditemukan larva pada kelopak bunga<br>','Ulat','0','0%'),
(418,'30-10-2023<br>09:16:46 AM','1. Terdapat bintik-bintik kecil berwarna hitam (lubang hitam) dibagian kulit buah, baik buah yang sudah dipetik atau buah yang masih dipohon<br>2. Ditemukan larva pada kelopak bunga<br>','Ulat','0','0%'),
(419,'30-10-2023<br>09:18:13 AM','1. Terdapat bintik-bintik kecil berwarna hitam (lubang hitam) dibagian kulit buah, baik buah yang sudah dipetik atau buah yang masih dipohon<br>2. Ditemukan larva pada kelopak bunga<br>','Ulat','0','0%'),
(420,'30-10-2023<br>09:18:22 AM','1. Bunga dan buah layu<br>2. Terdapat lubang dan kotoran pada  kelopak bunga dan buah<br>3. Ditemukan larva pada kelopak bunga<br>','Ulat','1','100%'),
(421,'30-10-2023<br>04:35:04 PM','1. Muncul bintik-bintik berwarna hitam<br>2. Bunga dan buah layu<br>3. Terdapat lubang dan kotoran pada  kelopak bunga dan buah<br>','Ulat','1','100%'),
(422,'30-10-2023<br>04:35:11 PM','1. Muncul bintik-bintik berwarna hitam<br>2. Bunga dan buah layu<br>3. Terdapat lubang dan kotoran pada  kelopak bunga dan buah<br>','Ulat','1','100%'),
(423,'30-10-2023<br>04:37:10 PM','1. Terdapat luka berwarna cokelat pada permukaan kulit buah<br>2. Terdapat bintik-bintik kecil kecokelatan, kering, timbul dan kasar jika diraba di batang atau sulur<br>3. Ditemukan larva pada kelopak bunga<br>','Ulat','1','100%'),
(424,'30-10-2023<br>04:41:57 PM','1. Terdapat lubang dan kotoran pada  kelopak bunga dan buah<br>2. Ditemukan larva pada kelopak bunga<br>','Ulat','1','100%'),
(425,'30-10-2023<br>04:42:42 PM','1. Muncul bintik-bintik berwarna hitam<br>2. Bunga dan buah layu<br>','Tungau','0.6','60%');

/*Table structure for table `ds_aturan` */

DROP TABLE IF EXISTS `ds_aturan`;

CREATE TABLE `ds_aturan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_penyakit` int NOT NULL,
  `id_gejala` int NOT NULL,
  `ds` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_penyakit` (`id_penyakit`),
  KEY `id_gejala` (`id_gejala`),
  CONSTRAINT `ds_aturan_ibfk_1` FOREIGN KEY (`id_penyakit`) REFERENCES `ds_penyakit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ds_aturan_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `ds_gejala` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb3;

/*Data for the table `ds_aturan` */

insert  into `ds_aturan`(`id`,`id_penyakit`,`id_gejala`,`ds`) values 
(1,1,1,1),
(27,1,2,0.75),
(28,1,3,0.75),
(29,1,4,0.5),
(30,1,5,1),
(31,9,5,1),
(32,2,6,1),
(33,2,7,1),
(34,3,8,0.5),
(35,6,8,0.5),
(36,3,9,1),
(37,4,10,0.75),
(38,4,11,1),
(39,5,12,0.5),
(40,6,13,0.5),
(41,6,14,1),
(42,7,15,1),
(43,7,16,0.5),
(44,8,17,0.5),
(45,8,18,0.75),
(46,9,19,0.5),
(47,9,20,1),
(48,9,21,1);

/*Table structure for table `ds_gejala` */

DROP TABLE IF EXISTS `ds_gejala`;

CREATE TABLE `ds_gejala` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(5) NOT NULL,
  `nama` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;

/*Data for the table `ds_gejala` */

insert  into `ds_gejala`(`id`,`kode`,`nama`) values 
(1,'G01','Terdapat bintik-bintik kecil berwarna hitam (lubang hitam) dibagian kulit buah, baik buah yang sudah dipetik atau buah yang masih dipohon'),
(2,'G02','Terdapat bercak lebar dan basah di permukaan buah'),
(3,'G03','Buah membusuk'),
(4,'G04','Buah gugur dari pohon'),
(5,'G05','Jika buah dibelah akan dijumpai ulat atau larva berwarna putih keruh'),
(6,'G06','Pada kulit buah terdapat kotoran berwarna cokelat kemerahan hingga hitam'),
(7,'G07','Permukaan kulit buah terlihat kering akibat bekas rautan'),
(8,'G08','Ukuran buah terlihat lebih kecil dari biasanya dan mengerucut'),
(9,'G09','Pada permukaan buah muda terdapat jamur embun hitam'),
(10,'G10','Batang atau sulur yang tidak terkena matahari langsung berwarna kusam'),
(11,'G11','Pada batang atau sulur terdapat sisik berwarna kusam abu-abu'),
(12,'G12','Batang atau sulur berubah menjadi warna kuning da nada kutu pada batang atau sulur'),
(13,'G13','Buah menguning atau berubah warna'),
(14,'G14','Terdapat warna putih pada kulit buah dan batang atau sulur yang jika dipegang meninggalkan serbuk ditangan'),
(15,'G15','Terdapat bintik-bintik halus kecoklatan pada batang atau sulur'),
(16,'G16','Terdapat luka berwarna cokelat pada permukaan kulit buah'),
(17,'G17','Terdapat bintik-bintik kecil kecokelatan, kering, timbul dan kasar jika diraba di batang atau sulur'),
(18,'G18','Muncul bintik-bintik berwarna hitam'),
(19,'G19','Bunga dan buah layu'),
(20,'G20','Terdapat lubang dan kotoran pada  kelopak bunga dan buah'),
(21,'G21','Ditemukan larva pada kelopak bunga');

/*Table structure for table `ds_penyakit` */

DROP TABLE IF EXISTS `ds_penyakit`;

CREATE TABLE `ds_penyakit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kett` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

/*Data for the table `ds_penyakit` */

insert  into `ds_penyakit`(`id`,`kode`,`nama`,`kett`) values 
(1,'P1','Lalat Buah','1. Pada daerah endemik lalat buah, tempatkan perangkap menggunakan methyl eugenol. <br>2. Buah yang busuk akibat serangan lalat buah segera dipetik kemudian dikubur atau dibakar. <br>3. Pengendalian kimiawi dapat dilakukan dengan menggunakan insektisida berbahan aktif deltametrin, antara lain Decis 25EC, Amicis 25EC, Sidacis 25EC, atau Percis 30EC. <br>4. musuh alami berupa parasitoid (Biosteres sp dan Opius sp) dan predator semut, lebah, laba-laba, kumbang tanah (Pramudi & Rosa, 2016)'),
(2,'P2','Thrips','Melakukan pengamatan rutin terhadap tanaman, bagian tanaman yang terserang segera dipotong dan dibakar, penggunaan insektisida berbahan aktif profenofos atau karbosulfan'),
(3,'P3','Kutu Daun','1. Menyemprotkan insektisida dengan dosis 1-2 ml/liter dengan interval waktu seminggu sekali pada batang atau sulur yang diserang.<br>2. Musuh alami kutu daun yaitu ada Hymenopteran parasitoid (tawon).'),
(4,'P4','Kutu Sisik','Menyemprotkan insektisida dengan dosis 1-2 ml/liter air seminggu sekali pada sela-sela tanaman yang ternaungi atau tidak terkena sinar matahari secara langsung.'),
(5,'P5','Kutu Batok','Menyemprotkan insektisida dengan dosis 1-2 cc/liter air dengan interval waktu seminggu sekali pada batang atau cabang yang diserang hama'),
(6,'P6','Kutu Putih','1. Kultur teknis. <br>2. Sanitasi kebun dan gulma lainnya. <br>3. Gunakan pestisida organik yakni antuss dengan dosis 5- 10 cc/liter dengan cara disemprotkan pada tanaman yang terjangkit oleh kutu putih. <br>4. Secara biologi pengendalian dapat dilakukan dengan menggunakan serangga predator Cryptolamus montrouzieri dan jamur entomopatogen Beauveria bassiana.'),
(7,'P7','Kepik','Melakukan pengamatan rutin terhadap tanaman, bagian tanaman yang terserang segera dipotong dan dibakar, penggunaan insektisida berbahan aktif profenofos atau karbosulfan.'),
(8,'P8','Tungau','1. Menyemprotkan Omite dengan dosis 1-2 gr/liter dan dilakukan 2-3 kali seminggu. <br>2. Secara biologi dapat menggunakan musuh alami serangga predator dari famili Phytoseiidae, Cunaxidae dan Cheyletidae Coccinellidae, dan Chrysophidai.'),
(9,'P9','Ulat','Melakukan pengamatan rutin terhadap tanaman, bagian tanaman yang terserang ulat segera dipotong, penggunaan insektisida berbahan aktif profenofos atau karbosulfan.');

/*Table structure for table `pakar` */

DROP TABLE IF EXISTS `pakar`;

CREATE TABLE `pakar` (
  `id_pakar` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(35) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_pakar`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `pakar` */

insert  into `pakar`(`id_pakar`,`nama`,`no_hp`,`email`,`alamat`) values 
(1,'Toyib','081313322304','mcooper@sample.com','DOKTER HAMA Pest Control, Jl. Puspowarno Tengah VIII No.23, Salamanmloyo, Kec. Semarang Barat, Kota Semarang, Jawa Tengah 50149 \r\nGoogle Map : https://shorturl.at/bsuIV'),
(2,'Rido','081313322304','mcooper@sample.com','DOKTER HAMA Pest Control, Jl. Puspowarno Tengah VIII No.23, Salamanmloyo, Kec. Semarang Barat, Kota Semarang, Jawa Tengah 50149 \r\nGoogle Map : https://shorturl.at/bsuIV');

/*Table structure for table `pasien` */

DROP TABLE IF EXISTS `pasien`;

CREATE TABLE `pasien` (
  `id_pasien` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `id_admin` int NOT NULL,
  PRIMARY KEY (`id_pasien`),
  KEY `id_admin` (`id_admin`),
  CONSTRAINT `pasien_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;

/*Data for the table `pasien` */

insert  into `pasien`(`id_pasien`,`nama`,`tgl_lahir`,`id_admin`) values 
(19,'rikko','2020-09-10',2),
(20,'dewita','2020-09-11',2),
(21,'indah','2020-09-30',2);

/*Table structure for table `riwayat` */

DROP TABLE IF EXISTS `riwayat`;

CREATE TABLE `riwayat` (
  `id_riwayat` int NOT NULL AUTO_INCREMENT,
  `id_pasien` int NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `gejala` text NOT NULL,
  `penyakit` varchar(200) NOT NULL,
  `nilai` varchar(20) NOT NULL,
  `persentase` varchar(20) NOT NULL,
  PRIMARY KEY (`id_riwayat`),
  KEY `id_pasien` (`id_pasien`),
  CONSTRAINT `riwayat_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3;

/*Data for the table `riwayat` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
