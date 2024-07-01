-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 03:53 PM
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
-- Table structure for table `ds_aturan`
--

CREATE TABLE `ds_aturan` (
  `id` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL,
  `ds` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ds_aturan`
--

INSERT INTO `ds_aturan` (`id`, `id_penyakit`, `id_gejala`, `ds`) VALUES
(1, 1, 1, 0.5),
(27, 1, 2, 1),
(28, 1, 3, 0.75),
(29, 1, 4, 0.75),
(30, 1, 5, 0.5),
(31, 1, 6, 1),
(50, 2, 1, 0.5),
(51, 2, 7, 1),
(52, 2, 8, 0.5),
(53, 3, 1, 0.5),
(54, 3, 3, 0.75),
(55, 3, 10, 1),
(56, 4, 11, 1),
(57, 4, 12, 0.75),
(58, 4, 13, 1),
(59, 5, 11, 1),
(60, 5, 14, 0.75),
(61, 6, 1, 0.5),
(62, 6, 11, 1),
(63, 6, 16, 1),
(64, 7, 1, 0.5),
(65, 7, 11, 1),
(66, 7, 17, 1),
(67, 7, 18, 0.5),
(68, 7, 1, 0.5),
(69, 7, 11, 1),
(70, 7, 17, 1),
(71, 7, 18, 0.5),
(72, 8, 11, 1),
(73, 8, 19, 0.5),
(74, 8, 20, 0.75),
(75, 9, 1, 0.5),
(76, 9, 6, 1),
(77, 9, 21, 0.75),
(78, 9, 22, 0.5),
(79, 9, 23, 1),
(80, 9, 24, 1),
(81, 9, 1, 0.5),
(82, 9, 6, 1),
(83, 9, 21, 0.75),
(84, 9, 22, 0.5),
(85, 9, 23, 1),
(86, 9, 24, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ds_aturan`
--
ALTER TABLE `ds_aturan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penyakit` (`id_penyakit`),
  ADD KEY `id_gejala` (`id_gejala`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ds_aturan`
--
ALTER TABLE `ds_aturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ds_aturan`
--
ALTER TABLE `ds_aturan`
  ADD CONSTRAINT `ds_aturan_ibfk_1` FOREIGN KEY (`id_penyakit`) REFERENCES `ds_penyakit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ds_aturan_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `ds_gejala` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
