-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 22, 2020 at 07:03 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_siecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'Admin Adriano', 'adminweb', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank`
--

CREATE TABLE IF NOT EXISTS `tbl_bank` (
  `id_bank` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(100) NOT NULL,
  `nama_pemilik` varchar(250) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  PRIMARY KEY (`id_bank`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_bank`
--

INSERT INTO `tbl_bank` (`id_bank`, `nama_bank`, `nama_pemilik`, `no_rekening`, `gambar`) VALUES
(1, 'BCA', 'Muhamad Rezki', '64534242342', 'aa9d3ec4243250956a314578ff477f1b.png'),
(2, 'Mandiri', 'Muhamad Rezki', '24523523523', 'ef548aea6b56db9a723f9c7ac91d46da.png'),
(3, 'BRI', 'Muhamad Rezki', '345353453234', '778473b7e82f9e47ba2c284eb60a6dfb.png'),
(4, 'BRI Syariah', 'Muhamad Rezki', '9823745235224', 'b8a5a05025b265f80b85ec7f2494e367.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE IF NOT EXISTS `tbl_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(6, 'Ciput'),
(7, 'Handshock'),
(8, 'Hijab'),
(9, 'Baju'),
(10, 'Anak-Anak');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kota`
--

CREATE TABLE IF NOT EXISTS `tbl_kota` (
  `id_kota` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kota` varchar(100) NOT NULL,
  `ongkir` int(10) NOT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_kota`
--

INSERT INTO `tbl_kota` (`id_kota`, `nama_kota`, `ongkir`) VALUES
(2, 'Rembang', 30000),
(3, 'Sleman', 30000),
(4, 'Bantul', 28000),
(5, 'Magelang', 32000),
(6, 'Klaten', 28000),
(7, 'Malang', 30000),
(8, 'Dumai', 28000),
(9, 'Pekanbaru', 28000),
(10, 'Medan', 30000),
(11, 'Jakarta', 28000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE IF NOT EXISTS `tbl_pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `kode_transaksi` bigint(15) NOT NULL,
  `tanggal_byr` date NOT NULL,
  `jumlah_byr` int(11) NOT NULL,
  `nama_bank` varchar(25) NOT NULL,
  `no_rek` varchar(24) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id_pembayaran`, `kode_transaksi`, `tanggal_byr`, `jumlah_byr`, `nama_bank`, `no_rek`, `atas_nama`) VALUES
(12, 20180923002, '2018-09-24', 150000, 'Mandiri', '1982374867213', 'Muhamad Rezki'),
(13, 20180923003, '2018-09-24', 500000, 'Mandiri', '1982374867213', 'Muhamad Rezki'),
(14, 20180926001, '2018-09-26', 500000, 'Mandiri', '1982374867213', 'Muhamad Rezki'),
(15, 20181005001, '2018-10-26', 150000, 'Mandiri', '1982374867213', 'Muhamad Rezki'),
(16, 20190308001, '2019-03-14', 100000, '88876', '87t877', 'mmm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesan`
--

CREATE TABLE IF NOT EXISTS `tbl_pesan` (
  `id_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `hp` bigint(15) NOT NULL,
  `alamat` text NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id_pesan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_pesan`
--

INSERT INTO `tbl_pesan` (`id_pesan`, `nama`, `email`, `hp`, `alamat`, `pesan`, `tanggal`, `status`) VALUES
(1, 'Muhammad Roziqin', 'roziqin_iqin@yahoo.com', 85648105447, 'Desa Pulo Dk Gayam RT 01 RW 04 Rembang', 'Mencoba Halaman Hubungi Kami', '2014-07-08', 1),
(2, 'Muhammad Roziqin', 'roziqin_iqin@yahoo.com', 85648105447, 'Rembang', 'Tes Komentar hubungi Kami', '2014-08-21', 1),
(3, 'Muhammad Imam Sulkarnaen', 'imam@gmail.com', 8493579345793, 'Jogja', 'Mau Tanya Cara Beli Di Toko adriano online shop', '2014-10-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesan_terkirim`
--

CREATE TABLE IF NOT EXISTS `tbl_pesan_terkirim` (
  `id_pesan_terkirim` int(11) NOT NULL AUTO_INCREMENT,
  `kepada` varchar(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi_pesan_terkirim` text NOT NULL,
  PRIMARY KEY (`id_pesan_terkirim`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_pesan_terkirim`
--

INSERT INTO `tbl_pesan_terkirim` (`id_pesan_terkirim`, `kepada`, `judul`, `isi_pesan_terkirim`) VALUES
(10, 'celcosiven@gmail.com', 'fhdhd', 'undefined'),
(11, 'celcosiven@gmail.com', 'asdfafas', 'fafafaf'),
(12, 'celcosiven@gmail.com', 'asdada', 'undefined'),
(13, 'celcosiven@gmail.com', '23424', 'undefined');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE IF NOT EXISTS `tbl_produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` bigint(15) NOT NULL,
  `stok` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `kode_produk`, `nama_produk`, `harga`, `stok`, `deskripsi`, `gambar`, `kategori_id`) VALUES
(8, 'BMW00001', 'Ciput 1', 36000, 100, '( harap dibaca sebelum transaksi )<br>- Selisih WARNA pasti ada dikarenakan perbedaan pada masing masing layar PENGGUNA ( system kalibrasi warna yg berbeda pd tiap alat ).<br>- Barang yang sudah dibeli tidak dapat dikembalikan.<br>- Pengiriman H+1 setelah invoice masuk.<br>- Keterlambatan pengiriman masing masing kurir BUKAN menjadi tanggung jawab PENJUAL.<br><br>Selamat berbelanja.', '0f1965857a2199d0daade6e164464060.jpg', 6),
(9, 'BMW00002', 'Baju Anak', 56000, 100, '( harap dibaca sebelum transaksi )<br>- Selisih WARNA pasti ada dikarenakan perbedaan pada masing masing layar PENGGUNA ( system kalibrasi warna yg berbeda pd tiap alat ).<br>- Barang yang sudah dibeli tidak dapat dikembalikan.<br>- Pengiriman H+1 setelah invoice masuk.<br>- Keterlambatan pengiriman masing masing kurir BUKAN menjadi tanggung jawab PENJUAL.<br><br>Selamat berbelanja.', '4b80d78397b4ec50b44dd3d373adddfc.jpg', 10),
(10, 'BMW00003', 'Baju Anak 2', 56000, 100, '( harap dibaca sebelum transaksi )<br>- Selisih WARNA pasti ada dikarenakan perbedaan pada masing masing layar PENGGUNA ( system kalibrasi warna yg berbeda pd tiap alat ).<br>- Barang yang sudah dibeli tidak dapat dikembalikan.<br>- Pengiriman H+1 setelah invoice masuk.<br>- Keterlambatan pengiriman masing masing kurir BUKAN menjadi tanggung jawab PENJUAL.<br><br>Selamat berbelanja.', '501c02e37e0c2078f4273d66370b13c1.jpg', 10),
(11, 'BMW00004', 'Ciput 2', 36000, 100, '( harap dibaca sebelum transaksi )<br>- Selisih WARNA pasti ada dikarenakan perbedaan pada masing masing layar PENGGUNA ( system kalibrasi warna yg berbeda pd tiap alat ).<br>- Barang yang sudah dibeli tidak dapat dikembalikan.<br>- Pengiriman H+1 setelah invoice masuk.<br>- Keterlambatan pengiriman masing masing kurir BUKAN menjadi tanggung jawab PENJUAL.<br><br>Selamat berbelanja.', '02dbb89731edd8bc3b57c54a9073e4c4.jpg', 6),
(12, 'BMW00005', 'Handshock 1', 56000, 100, '( harap dibaca sebelum transaksi )<br>- Selisih WARNA pasti ada dikarenakan perbedaan pada masing masing layar PENGGUNA ( system kalibrasi warna yg berbeda pd tiap alat ).<br>- Barang yang sudah dibeli tidak dapat dikembalikan.<br>- Pengiriman H+1 setelah invoice masuk.<br>- Keterlambatan pengiriman masing masing kurir BUKAN menjadi tanggung jawab PENJUAL.<br><br>Selamat berbelanja.', '74464d5c70f3327005a10859479b62c3.jpg', 7),
(13, 'BMW00006', 'Baju wanita 1', 56000, 99, '( harap dibaca sebelum transaksi )<br>- Selisih WARNA pasti ada dikarenakan perbedaan pada masing masing layar PENGGUNA ( system kalibrasi warna yg berbeda pd tiap alat ).<br>- Barang yang sudah dibeli tidak dapat dikembalikan.<br>- Pengiriman H+1 setelah invoice masuk.<br>- Keterlambatan pengiriman masing masing kurir BUKAN menjadi tanggung jawab PENJUAL.<br><br>Selamat berbelanja.', 'b188dd58c94176ca46927b4726c8cbeb.jpg', 9),
(14, 'BMW00007', 'Baju wanita 2', 80000, 100, '( harap dibaca sebelum transaksi )<br>- Selisih WARNA pasti ada dikarenakan perbedaan pada masing masing layar PENGGUNA ( system kalibrasi warna yg berbeda pd tiap alat ).<br>- Barang yang sudah dibeli tidak dapat dikembalikan.<br>- Pengiriman H+1 setelah invoice masuk.<br>- Keterlambatan pengiriman masing masing kurir BUKAN menjadi tanggung jawab PENJUAL.<br><br>Selamat berbelanja.', '8e19ec11de2bca0884f009c94dd01ba4.jpg', 9),
(15, 'BMW00008', 'Ciput 3', 36000, 99, '( harap dibaca sebelum transaksi )<br>- Selisih WARNA pasti ada dikarenakan perbedaan pada masing masing layar PENGGUNA ( system kalibrasi warna yg berbeda pd tiap alat ).<br>- Barang yang sudah dibeli tidak dapat dikembalikan.<br>- Pengiriman H+1 setelah invoice masuk.<br>- Keterlambatan pengiriman masing masing kurir BUKAN menjadi tanggung jawab PENJUAL.<br><br>Selamat berbelanja.', 'ada280001349a1efefefb8b455fd0c06.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE IF NOT EXISTS `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `kode_transaksi` bigint(15) NOT NULL,
  `tanggal` date NOT NULL,
  `bank_id` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_users`, `kode_transaksi`, `tanggal`, `bank_id`, `status`) VALUES
(19, 6, 20180923001, '2018-09-23', 4, 3),
(20, 6, 20180923002, '2018-09-23', 4, 1),
(21, 7, 20180923003, '2018-09-23', 4, 1),
(22, 7, 20180923004, '2018-09-23', 4, 3),
(23, 6, 20180926001, '2018-09-26', 2, 1),
(24, 6, 20180926002, '2018-09-26', 4, 0),
(25, 6, 20181005001, '2018-10-05', 4, 2),
(26, 6, 20181007001, '2018-10-07', 4, 0),
(27, 6, 20181007002, '2018-10-07', 4, 0),
(28, 6, 20181012001, '2018-10-12', 4, 0),
(29, 6, 20190308001, '2019-03-08', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_transaksi_detail` (
  `id_transaksi_detail` int(11) NOT NULL AUTO_INCREMENT,
  `kode_transaksi` bigint(15) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(25) NOT NULL,
  `harga` bigint(15) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id_transaksi_detail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `tbl_transaksi_detail`
--

INSERT INTO `tbl_transaksi_detail` (`id_transaksi_detail`, `kode_transaksi`, `kode_produk`, `nama_produk`, `harga`, `jumlah`) VALUES
(25, 20180923001, 'AMX00007', 'Easy Polo Black Edition', 16000, 1),
(26, 20180923002, 'AMX00006', 'Easy Polo Black Edition', 26000, 1),
(27, 20180923002, 'AMX00002', 'Easy Polo Black Edition', 56000, 1),
(28, 20180923003, 'AMX00003', 'Produk Ketiga', 56000, 1),
(29, 20180923004, 'AMX00002', 'Easy Polo Black Edition', 56000, 1),
(30, 20180923004, 'AMX00005', 'Easy Polo Black Edition', 36000, 1),
(31, 20180926001, 'AMX00006', 'Easy Polo Black Edition', 26000, 1),
(32, 20180926002, 'AMX00007', 'Easy Polo Black Edition', 16000, 4),
(33, 20181005001, 'AMX00006', 'Easy Polo Black Edition', 26000, 1),
(34, 20181007001, 'AMX00006', 'Easy Polo Black Edition', 26000, 1),
(35, 20181007001, 'AMX00005', 'Easy Polo Black Edition', 36000, 2),
(36, 20181007002, 'AMX00006', 'Easy Polo Black Edition', 26000, 1),
(37, 20181007002, 'AMX00002', 'Easy Polo Black Edition', 56000, 1),
(38, 20181012001, 'BMW00006', 'Baju wanita 1', 56000, 1),
(39, 20190308001, 'BMW00008', 'Ciput 3', 36000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_users` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kode_pos` varchar(6) NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_users`, `username`, `email`, `password`, `nama_users`, `phone`, `alamat`, `provinsi`, `kota`, `kode_pos`) VALUES
(6, 'mhmdrzki', 'celcosiven@gmail.com', '0de26253504e26205a09f7965614ed29', 'Muhamad Rezkii', '085263014677', 'JL.GARUDA SAKTII', 'Riau', 'Malang', '281882'),
(7, 'rororoy21', 'muhamad.rezki@students.uin-suska.ac.id', '0de26253504e26205a09f7965614ed29', 'Muhamad Rezki', '085263014676', 'JL. MERPATI SAKTI', 'Riau', 'Malang', '281881'),
(8, 'mitha21', 'mitha@gmail.com', '0de26253504e26205a09f7965614ed29', 'Mitha', '085263014676', 'JL. BULUH CINA', 'Riau', 'Malang', '210849');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
