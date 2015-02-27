-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 27, 2015 at 02:31 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_dhezign_apotik`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
`no_urut` int(5) NOT NULL,
  `kode_brg` varchar(100) NOT NULL,
  `kode_lokasi` varchar(100) NOT NULL,
  `nama_brg` varchar(200) NOT NULL,
  `hrg_beli` double NOT NULL,
  `hrg_jual` double NOT NULL,
  `qty` double NOT NULL,
  `jns_brg` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=595 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`no_urut`, `kode_brg`, `kode_lokasi`, `nama_brg`, `hrg_beli`, `hrg_jual`, `qty`, `jns_brg`) VALUES
(2, '90793AJ41100', 'L01-01-01-0', 'caplang', 26974, 32500, 46, 'obat mahal'),
(3, '90793AJ41300', 'L01-01-01-0', 'sidomuncul', 31292, 38000, 78, 'obat mahal'),
(4, '90793AJ41400', 'L01-01-01-0', 'tolakangin', 29019, 36000, 78, 'obat mahal'),
(5, '90793AJ41600', 'L01-01-01-0', 'oksadon', 28996, 35000, 78, 'obat mahal'),
(6, '90793AJ80100', 'L01-01-01-0', 'parachetamol', 22689, 31000, 12, 'Obat generic');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE IF NOT EXISTS `barang_keluar` (
`kode_trans` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_brg` varchar(100) NOT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `jml` varchar(25) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`kode_trans`, `tanggal`, `kode_brg`, `nama_brg`, `jml`) VALUES
(2, '2014-06-25', '002', 'Buku Tulis Sinar Dunia', '7'),
(3, '2014-06-25', '001', 'Pepsodent', '5'),
(4, '2014-06-10', '003', 'Sikat Gigi Formula', '5'),
(5, '2014-06-17', '001', 'Pepsodent', '5'),
(7, '2014-06-19', '001', 'Pepsodent', '5'),
(8, '2014-06-20', '005', 'Buku Gambar Sinar Dunia', '5'),
(9, '2014-06-25', '3', '90793AJ41000', '2'),
(10, '2014-06-25', '1', 'lki00lk-09', '1'),
(11, '2014-06-25', '1', 'lki00lk-09', '5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
 ADD PRIMARY KEY (`no_urut`), ADD KEY `no_urut` (`no_urut`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
 ADD PRIMARY KEY (`kode_trans`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
MODIFY `no_urut` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=595;
--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
MODIFY `kode_trans` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
