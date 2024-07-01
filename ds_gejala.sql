-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 03:52 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spdempstershaferv1`
--

-- --------------------------------------------------------

--
-- Table structure for table `ds_gejala`
--

CREATE TABLE `ds_gejala` (
  `id` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `kategori` int(5) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ds_gejala`
--

INSERT INTO `ds_gejala` (`id`, `kode`, `nama`, `kategori`) VALUES
(1, 'G01', 'Kerusakan pada buah', 1),
(2, 'G02', 'Terdapat bintik-bintik kecil berwarna hitam (lubang \nhitam) dibagian kulit buah, baik buah yang sudah dipetik \natau buah yang masih dipohon', 1),
(3, 'G03', 'Terdapat bercak lebar dan basah di permukaan buah', 1),
(4, 'G04', 'Buah membusuk', 1),
(5, 'G05', 'Buah gugur dari pohon', 1),
(6, 'G06', 'Pada kulit buah terdapat kotoran berwarna cokelat kemerahan hingga hitam Jika buah dibelah akan dijumpai ulat berwarna putih \nkeruh', 1),
(7, 'G07', 'Permukaan kulit buah terlihat kering akibat bekas rautanPada kulit buah terdapat kotoran berwarna coklat \nkemerahan hingga hitam', 1),
(8, 'G08', 'Permukaan kulit buah terlihat kering akibat bekas rautan', 1),
(9, 'G09', 'Ukuran buah terlihat lebih kecil dari biasanya dan \nmengerucut', 1),
(10, 'G10', 'Pada permukaan buah muda terdapat embun jelaga \nhitam', 2),
(11, 'G11', 'Kerusakan pada batang atau sulur', 2),
(12, 'G12', 'Batang atau sulur yang tidak terkena matahari langsung \nberwarna kusam', 2),
(13, 'G13', 'Pada batang atau sulur terdapat sisik berwarna kusam \nabu-abu', 1),
(14, 'G14', 'Batang atau sulur berubah menjadi warna kuning dan \nada kutu pada batang atau sulur', 1),
(15, 'G15', 'Buah menguning atau berubah warna', 2),
(16, 'G16', 'Terdapat warna putih pada kulit buah dan batang atau \nsulur yang jika dipegang meninggalkan serbuk ditangan', 1),
(17, 'G17', 'Terdapat bintik-bintik halus kecoklatan di batang atau \nsulur akibat luka tusukan', 2),
(18, 'G18', 'Terdapat bintik-bintik berwarna cokelat pada permukaan \nkulit buah akibat luka tusukan', 1),
(19, 'G19', 'Terdapat bintik-bintik kecil kecokelatan, kering, timbul \ndan kasar jika diraba di batang atau sulur', 3),
(20, 'G20', 'Muncul bintik-bintik berwarna hitam', 3),
(21, 'G21', 'Kerusakan pada bunga', 3),
(22, 'G22', 'Bunga layu', 4),
(23, 'G23', ' Terdapat lubang dan kotoran pada kelopak bunga atau  buah', 4),
(24, 'G24', ' Ditemukan larva pada kelopak bunga', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ds_gejala`
--
ALTER TABLE `ds_gejala`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ds_gejala`
--
ALTER TABLE `ds_gejala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
