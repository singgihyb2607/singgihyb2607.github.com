-- phpMyAdmin SQL Dump
-- version 2.11.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 01, 2014 at 02:31 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bidan2`
--

-- --------------------------------------------------------

--
-- Table structure for table `anak`
--

CREATE TABLE IF NOT EXISTS `anak` (
  `id_bayi_baru_lahir2` int(11) NOT NULL auto_increment,
  `Jenis_kelamin` varchar(20) NOT NULL,
  `tanggal_lahir` varchar(30) NOT NULL,
  `panjang` varchar(20) NOT NULL,
  `berat` varchar(20) NOT NULL,
  `denyut_nadi` varchar(20) NOT NULL,
  `lingkar_kepala` varchar(20) NOT NULL,
  `lingkar_dada` varchar(20) NOT NULL,
  `lingkar_lengan` varchar(20) NOT NULL,
  `respirasi` varchar(20) NOT NULL,
  `suhu` varchar(20) NOT NULL,
  `umur` varchar(100) NOT NULL,
  `bidan` varchar(100) NOT NULL,
  `keadaan_bayi` varchar(100) NOT NULL,
  `bln` varchar(100) NOT NULL,
  `id_pasien` int(12) NOT NULL,
  PRIMARY KEY  (`id_bayi_baru_lahir2`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `anak`
--

INSERT INTO `anak` (`id_bayi_baru_lahir2`, `Jenis_kelamin`, `tanggal_lahir`, `panjang`, `berat`, `denyut_nadi`, `lingkar_kepala`, `lingkar_dada`, `lingkar_lengan`, `respirasi`, `suhu`, `umur`, `bidan`, `keadaan_bayi`, `bln`, `id_pasien`) VALUES
(31, 'perempuan', '', '1', '1', '1', '1', '1', '1', '1', '1', '2014', 'Administrator', 'Normal', '04', 42),
(34, 'perempuan', '', '22', '22', '22', '22', '22', '22', '22', '22', '2014', 'Administrator', 'Normal', '06', 53),
(33, 'perempuan', '', '22', '22', '222', '22', '22', '22', '22', '22', '2014', 'Administrator', 'Normal', '06', 42),
(35, 'perempuan', '', '22', '22', '22', '22', '22', '22', '22', '22', '2014', 'Administrator', 'Normal', '06-14', 48),
(36, 'perempuan', '', '1', '1', '1', '1', '22', '22', '22', '22', '2014', 'yunita ardiyanto', 'Normal', '06-14', 45);

-- --------------------------------------------------------

--
-- Table structure for table `auto_complete`
--

CREATE TABLE IF NOT EXISTS `auto_complete` (
  `auto_complete` varchar(100) NOT NULL,
  `id_com` int(12) NOT NULL auto_increment,
  PRIMARY KEY  (`id_com`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `auto_complete`
--

INSERT INTO `auto_complete` (`auto_complete`, `id_com`) VALUES
('Susukan', 1),
('', 2),
('Aceh', 3);

-- --------------------------------------------------------

--
-- Table structure for table `gangrep`
--

CREATE TABLE IF NOT EXISTS `gangrep` (
  `id_gangrep` int(11) NOT NULL auto_increment,
  `keluhan` varchar(50) NOT NULL,
  `tekanandarah` varchar(20) NOT NULL,
  `tekanannadi` varchar(20) NOT NULL,
  `respirasi` varchar(20) NOT NULL,
  `suhu` varchar(20) NOT NULL,
  `bidan` varchar(50) NOT NULL,
  `id_pasien` int(12) NOT NULL,
  PRIMARY KEY  (`id_gangrep`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `gangrep`
--

INSERT INTO `gangrep` (`id_gangrep`, `keluhan`, `tekanandarah`, `tekanannadi`, `respirasi`, `suhu`, `bidan`, `id_pasien`) VALUES
(13, 'zz', 'zz', 'zz', 'zz', 'zz', 'Administrator', 42),
(14, 'xx', 'xx', 'xx', 'xx', 'xx', 'Administrator', 42),
(15, '22', '22', '22', '22', '22', 'Administrator', 53);

-- --------------------------------------------------------

--
-- Table structure for table `hamil`
--

CREATE TABLE IF NOT EXISTS `hamil` (
  `id_hamil` int(11) NOT NULL auto_increment,
  `tanggalperiksa` varchar(30) NOT NULL,
  `HPHT` varchar(30) NOT NULL,
  `HPL` varchar(30) NOT NULL,
  `hamil_ke` int(11) NOT NULL,
  `bidan` varchar(50) NOT NULL,
  `umur_kehamilan` varchar(20) NOT NULL,
  `bln` varchar(100) NOT NULL,
  `id_pasien` int(12) NOT NULL,
  `tekanan` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_hamil`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=137 ;

--
-- Dumping data for table `hamil`
--

INSERT INTO `hamil` (`id_hamil`, `tanggalperiksa`, `HPHT`, `HPL`, `hamil_ke`, `bidan`, `umur_kehamilan`, `bln`, `id_pasien`, `tekanan`) VALUES
(135, '06/19/2014', '31/12/2016', '08-10-2017', 10, 'yunita ardiyanto', '-6', '06-14', 42, '11'),
(129, '05/12/2014', '31/12/2016', '08-10-2017', 10, 'Administrator', '-6', '05', 53, '15'),
(130, '05/13/2014', '31/12/2016', '08-10-2017', 10, 'Administrator', '-6', '05', 56, '2'),
(136, '06/12/2014', '31/12/2016', '08-10-2017', 10, 'yunita ardiyanto', '-6', '06-14', 48, '13');

-- --------------------------------------------------------

--
-- Table structure for table `kb`
--

CREATE TABLE IF NOT EXISTS `kb` (
  `id_kb` int(11) NOT NULL auto_increment,
  `lama_pengguna` varchar(20) NOT NULL,
  `keluhan` varchar(50) NOT NULL,
  `tanggal_pemasangan` varchar(30) NOT NULL,
  `tanggal_kontrol` varchar(30) NOT NULL,
  `tanggal_penggantian` varchar(30) NOT NULL,
  `bidan` varchar(20) NOT NULL,
  `jenis_kb` varchar(100) NOT NULL,
  `bln` varchar(100) NOT NULL,
  `id_pasien` int(12) NOT NULL,
  PRIMARY KEY  (`id_kb`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `kb`
--

INSERT INTO `kb` (`id_kb`, `lama_pengguna`, `keluhan`, `tanggal_pemasangan`, `tanggal_kontrol`, `tanggal_penggantian`, `bidan`, `jenis_kb`, `bln`, `id_pasien`) VALUES
(21, 'zz', 'zz', '04/02/2014', '04/15/2014', '04/29/2014', '\r\n  Administrator', 'IUD', '\r\n  04', 42),
(22, '1', 'zzzzzzzz', '06/25/2014', '06/26/2014', '06/30/2014', '\r\n  Administrator', 'IUD', '\r\n  06', 56);

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan`
--

CREATE TABLE IF NOT EXISTS `kunjungan` (
  `id_kunjungan` int(12) NOT NULL auto_increment,
  `tanggal` date NOT NULL,
  `keluhan` varchar(100) NOT NULL,
  `pergerakan` varchar(100) NOT NULL,
  `tekanan_darah` varchar(100) NOT NULL,
  `tekanan_nadi` varchar(100) NOT NULL,
  `respirasi` varchar(100) NOT NULL,
  `suhu` varchar(100) NOT NULL,
  `leoI` varchar(20) NOT NULL,
  `leoII` varchar(20) NOT NULL,
  `leoIII` varchar(20) NOT NULL,
  `tekanan_hb` varchar(10) NOT NULL,
  `berat` varchar(100) NOT NULL,
  `tinggi` varchar(100) NOT NULL,
  `LILA` varchar(100) NOT NULL,
  `kepala` varchar(100) NOT NULL,
  `muka` varchar(100) NOT NULL,
  `mata` varchar(100) NOT NULL,
  `mulut` varchar(100) NOT NULL,
  `hidung` varchar(100) NOT NULL,
  `id_hamil` int(12) NOT NULL,
  `ke` varchar(100) NOT NULL,
  `telinga` varchar(100) NOT NULL,
  `leher` varchar(100) NOT NULL,
  `payudara` varchar(100) NOT NULL,
  `abdoman` varchar(100) NOT NULL,
  `jam` time NOT NULL,
  `umur` varchar(100) NOT NULL,
  `kondisi` varchar(100) NOT NULL,
  `catatan` text NOT NULL,
  PRIMARY KEY  (`id_kunjungan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;

--
-- Dumping data for table `kunjungan`
--

INSERT INTO `kunjungan` (`id_kunjungan`, `tanggal`, `keluhan`, `pergerakan`, `tekanan_darah`, `tekanan_nadi`, `respirasi`, `suhu`, `leoI`, `leoII`, `leoIII`, `tekanan_hb`, `berat`, `tinggi`, `LILA`, `kepala`, `muka`, `mata`, `mulut`, `hidung`, `id_hamil`, `ke`, `telinga`, `leher`, `payudara`, `abdoman`, `jam`, `umur`, `kondisi`, `catatan`) VALUES
(65, '2014-05-12', 'Mual\r\n ', 'joiik\r\n ', 'dfshuh\r\n ', 'uihiugytf', 'uho', 'jiujh', '1 Jari Bawah Pusat', 'Punggung Kanan', 'Presentasi Kepala', 'hjgkjn', 'jknhbhjb', 'klmjnh\r\n ', 'jmnjmkm', 'Mesochepal', 'Simetris', 'Simetris', 'Bersih\r\n ', 'Simetris', 0, '', 'Simetris', 'Tidak_ada_benjolan', 'Simetris', 'Lineanigra', '13:54:17', '4', '', ''),
(64, '2014-05-12', 'Mual\r\n ', '\r\n ', '\r\n ', '', '', '', '1 Jari Bawah Pusat', 'Punggung Kanan', 'Presentasi Kepala', '', '', '\r\n ', '', 'Mesochepal', 'Simetris', 'Simetris', 'Bersih\r\n ', 'Simetris', 0, '', 'Simetris', 'Tidak_ada_benjolan', 'Simetris', 'Lineanigra', '13:53:47', '4', '', ''),
(63, '2014-05-12', 'Mual\r\n ', '\r\n ', '\r\n ', '', '', '', '1 Jari Bawah Pusat', 'Punggung Kanan', 'Presentasi Kepala', '', '', '\r\n ', '', 'Mesochepal', 'Simetris', 'Simetris', 'Bersih\r\n ', 'Simetris', 0, '', 'Simetris', 'Tidak_ada_benjolan', 'Simetris', 'Lineanigra', '13:52:42', '4', '', ''),
(62, '2014-05-12', 'Perut Kencang-Kencang\r\n ', 'bgvbgb\r\n ', 'njn\r\n ', 'gguh', 'gubh', 'ugbhjkn', '1 Jari Bawah Pusat', 'Punggung Kanan', 'Presentasi Kepala', 'gbhjbj', 'njnj', 'jnj\r\n ', 'bgg', 'Mesochepal', 'Simetris', 'Simetris', 'Bersih\r\n ', 'Simetris', 124, '', 'Simetris', 'Tidak_ada_benjolan', 'Simetris', 'Lineanigra', '11:36:29', '4', '', ''),
(61, '2014-05-12', 'kaki bengkak\r\n ', '21\r\n ', '100/70\r\n ', '80', '76', '36', '1 Jari Bawah Pusat', 'Punggung Kanan', 'Presentasi Kepala', '77', '78', '156\r\n ', '25', 'Mesocnepal', 'Simetris', 'Simetris', 'Bersih\r\n ', 'Simetris', 119, '', 'Simetris', 'Tidak_ada_benjolan', 'Simetris', 'Lineanigra', '10:28:38', '22', '', ''),
(60, '2014-05-12', 'dfd\r\n ', '21\r\n ', '100/70\r\n ', '80', '76', '36', '1 Jari Bawah Pusat', 'Punggung Kanan', 'Presentasi Kepala', '77', '78', '156\r\n ', '25', 'Mesocnepal', 'Simetris', 'Simetris', 'Bersih\r\n ', 'Simetris', 119, '', 'Simetris', 'Tidak_ada_benjolan', 'Simetris', 'Lineanigra', '11:26:19', '4', '', ''),
(59, '2014-07-01', 'kaki', '21\r\n ', '100/70', '80', '76', '36', '1 Jari Bawah Pusat', 'Punggung Kanan', 'Presentasi Kepala', '80', '78', '156', '25', 'Mesocnepal', 'Simetris', 'Simetris', 'Bersih', 'Simetris', 0, '', 'Simetris', 'Tidak_ada_benjolan', 'Simetris', 'Lineanigra', '12:35:41', '4', 'Waspada', ''),
(58, '2014-05-12', 'hhjh\r\n ', 'ghbb\r\n ', 'hhkh\r\n ', 'jhgyg', 'vvhhb', 'jbkjnjkn', '1 Jari Bawah Pusat', 'Punggung Kanan', 'Presentasi Kepala', 'hbhkjn', 'jnnklmk', 'hbhvbj\r\n ', 'nnnn', 'Mesocnepal', 'Simetris', 'Simetris', 'Bersih\r\n ', 'Simetris', 124, '', 'Simetris', 'Tidak_ada_benjolan', 'Simetris', 'Lineanigra', '09:32:37', '23', '', ''),
(55, '2014-05-12', 'dfz\r\n ', 'jnjnj\r\n ', 'df\r\n ', 'f', 'hhkj', 'nkjn', '1 Jari Bawah Pusat', 'Punggung Kanan', 'Presentasi Kepala', 'jnjn', 'nkkm', 'mkmk\r\n ', 'njnjb', 'Mesocnepal', 'Simetris', 'Simetris', 'Bersih\r\n ', 'Simetris', 121, '', 'Simetris', 'Tidak_ada_benjolan', 'Simetris', 'Lineanigra', '00:00:00', '4', '', ''),
(56, '2014-05-12', 'Gkkjk\r\n ', 'jnnk\r\n ', 'jh\r\n ', 'jjkl', 'kkmkm', 'mmkm', '1 Jari Bawah Pusat', 'Punggung Kanan', 'Presentasi Kepala', 'jnkjn', 'ml,l,l,', 'hgbhhg\r\n ', 'ggjkk', 'Mesocnepal', 'Simetris', 'Simetris', 'Bersih\r\n ', 'Simetris', 121, '', 'Simetris', 'Tidak_ada_benjolan', 'Simetris', 'Lineanigra', '07:07:28', '4', '', ''),
(66, '2014-05-12', 'Muntah', '\r\n ', '', '', '', '', '1 Jari Bawah Pusat', 'Punggung Kanan', 'Presentasi Kepala', '', '', '', '', 'Mesocnepal', 'Simetris', 'Simetris', 'Bersih', 'Simetris', 121, '', 'Simetris', 'Tidak_ada_benjolan', 'Simetris', 'Lineanigra', '17:08:20', '2014', '', ''),
(67, '2014-05-12', 'Mual\r\n ', '\r\n ', '\r\n ', '', '', '', '1 Jari Bawah Pusat', 'Punggung Kanan', 'Presentasi Kepala', '', '', '\r\n ', '', 'Mesochepal', 'Simetris', 'Simetris', 'Bersih\r\n ', 'Simetris', 123, '', 'Simetris', 'Tidak_ada_benjolan', 'Simetris', 'Lineanigra', '13:57:28', '4', '', ''),
(69, '2014-05-12', 'Mual\r\n ', '\r\n ', '\r\n ', '', '', '', '1 Jari Bawah Pusat', 'Punggung Kanan', 'Presentasi Kepala', '', '', '\r\n ', '', 'Mesochepal', 'Simetris', 'Simetris', 'Bersih\r\n ', 'Simetris', 123, '', 'Simetris', 'Tidak_ada_benjolan', 'Simetris', 'Lineanigra', '15:55:09', '', '', ''),
(70, '2014-05-12', 'Mual\r\n ', '\r\n ', '\r\n ', '', '', '', '1 Jari Bawah Pusat', 'Punggung Kanan', 'Presentasi Kepala', '', '', '\r\n ', '', 'Mesochepal', 'Simetris', 'Simetris', 'Bersih\r\n ', 'Simetris', 123, '', 'Simetris', 'Tidak_ada_benjolan', 'Simetris', 'Lineanigra', '15:56:26', '', '', ''),
(71, '2014-05-12', 'Mual', '\r\n ', '', '', '', '', '1 Jari Bawah Pusat', 'Punggung Kanan', 'Presentasi Kepala', '', '', '', '', 'Mesocnepal', 'Simetris', 'Simetris', 'Bersih', 'Simetris', 123, '', 'Simetris', 'Tidak_ada_benjolan', 'Simetris', 'Lineanigra', '16:28:44', '22', '', ''),
(72, '2014-05-12', 'Muntah', '\r\n ', '', '', '', '', '1 Jari Bawah Pusat', 'Punggung Kanan', 'Presentasi Kepala', '', '', '', '', 'Mesocnepal', 'Simetris', 'Simetris', 'Bersih', 'Simetris', 124, '', 'Simetris', 'Tidak_ada_benjolan', 'Simetris', 'Lineanigra', '17:09:07', '22', '', ''),
(73, '2014-05-12', 'Perut Kencang-Kencang\r\n ', '\r\n ', '\r\n ', '', '', '', '1 Jari Bawah Pusat', 'Punggung Kanan', 'Presentasi Kepala', '', '', '\r\n ', '', 'Mesochepal', 'Simetris', 'Simetris', 'Bersih\r\n ', 'Simetris', 123, '', 'Simetris', 'Tidak_ada_benjolan', 'Simetris', 'Lineanigra', '16:35:08', '22', '', ''),
(75, '2014-05-13', 'Mual\r\n ', '\r\n ', '\r\n ', '', '', '', '1 Jari Bawah Pusat', 'Punggung Kanan', 'Presentasi Kepala', '', '', '\r\n ', '', 'Mesochepal', 'Simetris', 'Simetris', 'Bersih\r\n ', 'Simetris', 121, '', 'Simetris', 'Tidak_ada_benjolan', 'Simetris', 'Lineanigra', '06:06:45', '23', '', ''),
(76, '2014-07-01', 'Mual', '\r\n ', '', '', '', '', '1 Jari Bawah Pusat', 'Punggung Kanan', 'Presentasi Kepala', '', '', '', '', 'Mesocnepal', 'Simetris', 'Simetris', 'Bersih', 'Simetris', 130, '', 'Simetris', 'Tidak_ada_benjolan', 'Simetris', 'Lineanigra', '11:36:14', '23', 'Normal', '<p>dfghjvnjn</p>'),
(77, '2014-06-12', 'Mual\r\n ', '\r\n ', '\r\n ', '', '', '', '1 Jari Bawah Pusat', 'Punggung Kanan', 'Presentasi Kepala', '', '', '\r\n ', '', 'Mesochepal', 'Simetris', 'Simetris', 'Bersih\r\n ', 'Simetris', 129, '', 'Simetris', 'Tidak_ada_benjolan', 'Simetris', 'Lineanigra', '09:23:44', '22', '', ''),
(78, '2014-07-01', 'Mual', '2\r\n ', '11', '1', '1', '23', '1 Jari Bawah Pusat', 'Punggung Kanan', 'Presentasi Kepala', '1', '2', '2', '2', 'Mesocnepal', 'Simetris', 'Simetris', 'Bersih', 'Simetris', 136, '', 'Simetris', 'Tidak_ada_benjolan', 'Simetris', 'Lineanigra', '12:58:12', '22', 'Waspada', '<p>zzzzzzzzzzzzzzz</p>'),
(79, '2014-07-01', 'Mual\r\n ', '2\r\n ', '2\r\n ', '2', '2', '2', '1 Jari Bawah Pusat', 'Punggung Kanan', 'Presentasi Kepala', '2', '2', '2\r\n ', '2', 'Mesochepal', 'Simetris', 'Simetris', 'Bersih\r\n ', 'Simetris', 135, '', 'Simetris', 'Tidak_ada_benjolan', 'Simetris', 'Lineanigra', '00:00:00', '22', 'Normal', '<p>zzzzzzzzzzzzz</p>'),
(90, '2014-07-01', 'Mual\r\n ', '2\r\n ', '2\r\n ', '2', '2', '2', '1 Jari Bawah Pusat', 'Punggung Kanan', 'Presentasi Kepala', '2', '2', '2\r\n ', '2', 'Mesochepal', 'Simetris', 'Simetris', 'Bersih\r\n ', 'Simetris', 130, '', 'Simetris', 'Tidak_ada_benjolan', 'Simetris', 'Lineanigra', '00:00:00', '23', 'Waspada', '<p>Silahkan Tulis Pesan Disini</p>'),
(91, '2014-07-01', 'Mual\r\n ', '2\r\n ', '3\r\n ', '2', '2', '2', '1 Jari Bawah Pusat', 'Punggung Kanan', 'Presentasi Kepala', '3', '4', '5\r\n ', '6', 'Mesochepal', 'Simetris', 'Simetris', 'Bersih\r\n ', 'Simetris', 129, '', 'Simetris', 'Tidak_ada_benjolan', 'Simetris', 'Lineanigra', '00:00:00', '22', 'Waspada', '<p>gggggggggg</p>'),
(88, '2014-07-01', 'Mual\r\n ', '2\r\n ', '3\r\n ', '3', '3', '2', '1 Jari Bawah Pusat', 'Punggung Kanan', 'Presentasi Kepala', '2', '22', '2\r\n ', '2', 'Mesochepal', 'Simetris', 'Simetris', 'Bersih\r\n ', 'Simetris', 136, '', 'Simetris', 'Tidak_ada_benjolan', 'Simetris', 'Lineanigra', '00:00:00', '22', 'Normal', '<p>Silahkan Tulis Pesan Disini</p>'),
(89, '2014-07-01', 'Mual\r\n ', '\r\n ', '2\r\n ', '2', '2', '2', '1 Jari Bawah Pusat', 'Punggung Kanan', 'Presentasi Kepala', '2', '2', '2\r\n ', '2', 'Mesochepal', 'Simetris', 'Simetris', 'Bersih\r\n ', 'Simetris', 130, '', 'Simetris', 'Tidak_ada_benjolan', 'Simetris', 'Lineanigra', '00:00:00', '23', 'Waspada', '<p>Silahkan Tulis Pesan Disini</p>');

-- --------------------------------------------------------

--
-- Table structure for table `mainmenu`
--

CREATE TABLE IF NOT EXISTS `mainmenu` (
  `id_main` int(5) NOT NULL auto_increment,
  `nama_menu` varchar(50) character set latin1 collate latin1_general_ci default NULL,
  `link` varchar(100) character set latin1 collate latin1_general_ci default NULL,
  `aktif` enum('Y','N') NOT NULL default 'Y',
  `adminmenu` enum('Y','N') NOT NULL,
  PRIMARY KEY  (`id_main`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `mainmenu`
--

INSERT INTO `mainmenu` (`id_main`, `nama_menu`, `link`, `aktif`, `adminmenu`) VALUES
(68, 'pelayanan', NULL, 'N', 'N'),
(61, 'Pelayanan', '', 'N', 'Y'),
(63, 'User', '?module=user', 'N', 'Y'),
(64, 'Memo', '?module=memo', 'N', 'Y'),
(65, 'Laporan Pasien', '?module=laporan', 'N', 'Y'),
(67, 'Kunjungan', '?module=kunjungan', 'Y', 'N'),
(69, 'Memo', '?module=memo', 'N', 'N'),
(70, 'Laporan Pasien', '?module=laporan', 'N', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `memo`
--

CREATE TABLE IF NOT EXISTS `memo` (
  `id_memo` int(11) NOT NULL auto_increment,
  `isi` varchar(200) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pelayanan` varchar(100) NOT NULL,
  `nomor_telepon` varchar(100) NOT NULL,
  `kode_pos` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `jk` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_memo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `memo`
--

INSERT INTO `memo` (`id_memo`, `isi`, `nama`, `alamat`, `tanggal`, `email`, `pelayanan`, `nomor_telepon`, `kode_pos`, `nik`, `pekerjaan`, `jk`) VALUES
(1, '<p>aaaaaaaaaaaaa</p>', 'aaaaa', 'aaaa', '06/04/2014', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
  `id_pasien` int(11) NOT NULL auto_increment,
  `nama` varchar(25) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `alamat` varchar(30) default NULL,
  `no_telp` varchar(20) default NULL,
  `bidan` varchar(15) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `rt` varchar(20) NOT NULL,
  `rw` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `tanggallahir` varchar(50) NOT NULL,
  `pend_terakhir` varchar(10) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `suami` varchar(100) NOT NULL,
  `no_telp_suami` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_pasien`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama`, `jk`, `alamat`, `no_telp`, `bidan`, `kelurahan`, `rt`, `rw`, `kecamatan`, `kota`, `tanggallahir`, `pend_terakhir`, `agama`, `suami`, `no_telp_suami`) VALUES
(42, 'aaaaaaaaa', 'perempuan', 'assssss', 'assss', 'Administrator', 'kel.saaaaa', 'RTsa)', 'RW()', 'kac.', 'kota', '29-05-1992', 'SMA', 'Islam', 'assaasasasasas', 'assssssss'),
(45, 'arifin', 'laki-laki', 'sasasa', 'sassasa', 'Administrator', 'kel.asasasas', 'RT(as)', 'RW(assa)', 'kac.sasas', 'kota.sasassasass', '12-04-1991', '', 'Islam', 'ZZ', 'ZZzzzz'),
(48, 'goesman', 'perempuan', 'ddsds', '098766555e', 'Administrator', 'kel.sdsd', 'RT(6)', 'RW(6)', 'kac.fgfgfg', 'kotafgfgfg', '10-02-1992', '', 'Islam', 'dvxcxcxcx', '099877765655445'),
(53, 'eky', 'perempuan', 'jambi', '099878978', 'Administrator', 'kel.jnj', 'RT()', 'RW()', 'kec.', 'kota.', '19-12-1992', 'SD', 'Islam', 'asjndjsnfkjdmsf', '078898980'),
(56, 'hana', '', 'hdkjkasjdka', '085727337330', 'Administrator', 'kel.', 'RT()', 'RW()', 'kec.', 'kota.', '13-12-1991', 'S2', 'Islam', 'dono', '0987987909');

-- --------------------------------------------------------

--
-- Table structure for table `persalinan`
--

CREATE TABLE IF NOT EXISTS `persalinan` (
  `id_persalinan` int(4) NOT NULL auto_increment,
  `tanggalkontraksi` varchar(30) NOT NULL,
  `tanggalpersalinan` varchar(30) NOT NULL,
  `keluhan` varchar(100) NOT NULL,
  `bidan` varchar(50) NOT NULL,
  `jam` varchar(100) NOT NULL,
  `jenis_persalinan` varchar(100) NOT NULL,
  `keadaan_ibu` varchar(100) NOT NULL,
  `bln` varchar(100) NOT NULL,
  `id_pasien` int(12) NOT NULL,
  PRIMARY KEY  (`id_persalinan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `persalinan`
--

INSERT INTO `persalinan` (`id_persalinan`, `tanggalkontraksi`, `tanggalpersalinan`, `keluhan`, `bidan`, `jam`, `jenis_persalinan`, `keadaan_ibu`, `bln`, `id_pasien`) VALUES
(63, '06/03/2014', '06/23/2014', 'xxxxxxx', 'Administrator', '21:30', 'Persalinan_Presipitatus', 'Otopsi_Verbal', '06-14', 45);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `id_pesan` int(10) NOT NULL auto_increment,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `isi` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_pesan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `nama`, `alamat`, `tanggal`, `isi`, `agama`) VALUES
(1, 'sasa', '', '29 March 2014', '<p>asasasas</p>', ''),
(2, 'dsdsds', 'dsdd', '29 March 2014', '<p>sssdsdsds</p>', ''),
(3, 'daadad', 'dad', '04/01/2014', '<p>jsdbssdsdsdsds</p>', ''),
(5, 'sdfghj', 'dfghj,', '04/09/2014', '<p>zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz</p>', ''),
(6, 'Yunita Ardiyanto', 'Susukan', '04/16/2014', '<p>asssssssssssssssssssssssssss</p>', ''),
(7, 'Yunita Ardiyanto', 'Susukan', '04/23/2014', '<p>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>', '');

-- --------------------------------------------------------

--
-- Table structure for table `suami`
--

CREATE TABLE IF NOT EXISTS `suami` (
  `id_suami` int(11) NOT NULL,
  `Nama` varchar(20) NOT NULL,
  `Umur` varchar(20) NOT NULL,
  `Suku/Bangsa` varchar(20) NOT NULL,
  `Pendidikan_terakhir` varchar(20) NOT NULL,
  `Pekerjaan` varchar(20) NOT NULL,
  `Agama` varchar(20) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `No.Telp` varchar(20) NOT NULL,
  PRIMARY KEY  (`id_suami`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suami`
--


-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE IF NOT EXISTS `submenu` (
  `id_sub` int(5) NOT NULL auto_increment,
  `nama_sub` varchar(50) character set latin1 collate latin1_general_ci default NULL,
  `link_sub` varchar(100) character set latin1 collate latin1_general_ci default NULL,
  `id_main` int(5) NOT NULL,
  `id_submain` int(11) NOT NULL,
  `aktif` enum('Y','N') NOT NULL default 'Y',
  `adminsubmenu` enum('Y','N') NOT NULL,
  PRIMARY KEY  (`id_sub`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id_sub`, `nama_sub`, `link_sub`, `id_main`, `id_submain`, `aktif`, `adminsubmenu`) VALUES
(55, 'Kunjungan', '?module=kunjungan', 61, 0, 'Y', 'Y'),
(54, 'Ibu Hamil', '?module=ibuhalil', 61, 0, 'Y', ''),
(42, 'Persalinan', '?module=persalinan', 61, 0, 'N', 'Y'),
(46, 'Ibu Hamil', '?module=ibuhamil', 61, 0, 'N', 'Y'),
(47, 'Bayi Baru Lahir', '?module=bayilahir', 61, 0, 'N', 'Y'),
(51, 'Keluarga Brencana', '?module=kb', 61, 0, 'N', 'Y'),
(52, 'Gangguan Reproduksi', '?module=gangrep', 61, 0, 'N', 'Y'),
(56, 'Persalinan', '?module=persalinan', 68, 0, 'N', 'N'),
(57, 'Ibu Hamil', '?module=ibuhamil', 68, 0, 'N', 'N'),
(58, 'Bayi Baru Lahir', '?module=bayilahir', 68, 0, 'N', 'N'),
(59, 'Keluarga Brencana', '?module=kb', 68, 0, 'N', 'N'),
(60, 'Gangguan Reproduksi', '?module=gangrep', 68, 0, 'N', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `password` varchar(50) collate latin1_general_ci NOT NULL,
  `id_user` int(11) NOT NULL auto_increment,
  `username` varchar(50) collate latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) collate latin1_general_ci NOT NULL,
  `email` varchar(100) collate latin1_general_ci NOT NULL,
  `no_telp` varchar(20) collate latin1_general_ci NOT NULL,
  `level` varchar(20) collate latin1_general_ci NOT NULL default 'user',
  `blokir` enum('Y','N') collate latin1_general_ci NOT NULL default 'N',
  `id_session` varchar(100) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`password`, `id_user`, `username`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`, `id_session`) VALUES
('21232f297a57a5a743894a0e4a801fc3', 1, 'admin', 'Administrator', 'admin@detik.com', '08238923848', 'admin', 'N', '9cf96e8d2c73f68243b09e8f7998ab05'),
('29d1e2357d7c14db51e885053a58ec67', 2, 'dokter', 'dokter ani', 'doter@gmail.com', '12345789', 'admin', 'N', '7s9nmrkecs5qhr5pslf9bjqcq2'),
('f879ecd6773f6972e38f42cb9ee0d46d', 3, 'ardiyanto', 'yunita ardiyanto', 'yunitadian22@gmail.com', '09876543', 'user', 'N', '2ccb5d214a87456c6f3ee52ee0af71ad');
