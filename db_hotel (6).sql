-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 29 Mar 2022 pada 16.10
-- Versi Server: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas_hotel`
--

CREATE TABLE `fasilitas_hotel` (
  `id_fasilitas` int(60) NOT NULL,
  `fasilitas_hotel` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `fasilitas_hotel`
--

INSERT INTO `fasilitas_hotel` (`id_fasilitas`, `fasilitas_hotel`, `keterangan`, `gambar`) VALUES
(36, 'kolam renang', 'memiliki ukuran yang sangat luas , bersih bisa bersantai di pinggir kolam.', 'elbriakolamrenang.jpg'),
(37, 'Restaurant Indonesia', 'memiliki menu yang bervariatif , bersih, makanan yang lezat, dan untuk sarapan gratis makan di sini', 'restoran.jpg'),
(38, 'Spa', 'Tenaga ahli yang siap melayani pemesanan spa anda', 'spa.jpg'),
(39, 'Ruang Meeting', 'Kapasitas 12 orang di lengkapi dengan berbagai keperluan untuk presentasi', 'meeting-room.jpg'),
(40, 'Playground', 'Dengan lantai yang empuk sehingga sangat aman untuk anak-anak', 'playground.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_fasilitas`
--

CREATE TABLE `gambar_fasilitas` (
  `id_gambar` int(60) NOT NULL,
  `id_kamar` int(60) NOT NULL,
  `gambar_fasilitas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `gambar_fasilitas`
--

INSERT INTO `gambar_fasilitas` (`id_gambar`, `id_kamar`, `gambar_fasilitas`) VALUES
(33, 15, 'dapur.jpg'),
(34, 15, 'kamarmandi.jpg'),
(35, 15, 'livingroom.jpg'),
(36, 15, 'ruangmakan.jpg'),
(37, 16, 'dapur.jpg'),
(38, 16, 'kamarmandi.jpg'),
(39, 16, 'livingroom.jpg'),
(40, 16, 'ruangmakan.jpg'),
(41, 17, 'kamarmandi.jpg'),
(42, 17, 'livingroom.jpg'),
(43, 17, 'ruangmakan.jpg'),
(47, 18, 'kamarmandi.jpg'),
(48, 18, 'livingroom.jpg'),
(49, 18, 'ruangmakan.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_pekerja`
--

CREATE TABLE `login_pekerja` (
  `id_login` int(60) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','resepsionis') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `login_pekerja`
--

INSERT INTO `login_pekerja` (`id_login`, `nama`, `username`, `password`, `level`) VALUES
(1, 'llham Ramadan', 'ilham', '123', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_user`
--

CREATE TABLE `login_user` (
  `id_user` int(60) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `id_akun` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `login_user`
--

INSERT INTO `login_user` (`id_user`, `nama_user`, `id_akun`, `password`) VALUES
(1, 'ismael bin laden', 'mael', '534a0b7aa872ad1340d0071cbfa38697'),
(2, 'ilham ramadan', 'ilham', '827ccb0eea8a706c4c34a16891f84e7b'),
(5, 'mariska rahma yuniarti', 'mariska', '202cb962ac59075b964b07152d234b70'),
(6, 'biawak betina', 'biawak', '4021e43ba174730d91b9eca862f9aa97'),
(8, 'lanapomed', 'lana', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pesanan` int(60) NOT NULL,
  `id_user` int(60) NOT NULL,
  `id_kamar` int(60) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `nama_tamu` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` int(16) NOT NULL,
  `tipe_kamar` varchar(255) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date NOT NULL,
  `jumlah_kamar` int(10) NOT NULL,
  `Jam_pesan` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pesanan`, `id_user`, `id_kamar`, `nama_pemesan`, `nama_tamu`, `email`, `no_hp`, `tipe_kamar`, `tgl_masuk`, `tgl_keluar`, `jumlah_kamar`, `Jam_pesan`) VALUES
(29304996, 6, 15, 'juned', 'ilham', 'barudigantinich@gmail.com', 8979283, 'Superior', '2022-03-26', '2022-03-27', 2, '22:28:52'),
(29305000, 2, 15, 'ilham ramadan', 'jamettekudasai', 'ilhamjuniordasilva32@gmail.com', 21312312, 'Deluxe', '2022-03-26', '2022-03-27', 1, '00:00:00'),
(29305003, 1, 18, 'ismael bin laden', 'juned', 'ilhamjuniordasilva32@gmail.com', 983983, 'Superior', '2022-03-26', '2022-03-27', 1, '00:00:00'),
(29305004, 1, 18, 'ismael bin laden', 'juned', 'ilhamjuniordasilva32@gmail.com', 983983, 'Superior', '2022-03-26', '2022-03-27', 1, '00:00:00'),
(29305005, 1, 15, 'ismael bin laden', 'anggit', 'ilhamjuniordasilva32@gmail.com', 27, 'Deluxe', '2022-03-27', '2022-03-31', 1, '00:00:00'),
(29305006, 1, 15, 'ismael bin laden', 'juned', 'ilhamjuniordasilva32@gmail.com', 89615672, 'Deluxe', '2022-03-28', '2022-03-29', 1, '00:00:00'),
(29305007, 2, 15, 'ilham ramadan', 'jamettekudasai', 'ilhamjuniordasilva32@gmail.com', 9897876, 'Deluxe', '2022-03-28', '2022-03-29', 1, '00:00:00'),
(29305008, 2, 16, 'ilham ramadan', 'jamettekudasai', 'ilhamjuniordasilva32@gmail.com', 98938473, 'Superior', '2022-03-27', '2022-03-28', 1, '07:21:30'),
(29305009, 2, 18, 'ilham ramadan', 'juki', 'ilhamjuniordasilva32@gmail.com', 9892732, 'Superior', '2022-03-27', '2022-03-28', 1, '02:23:00'),
(29305010, 2, 17, 'ilham ramadan', 'anggit', 'ilhamjuniordasilva32@gmail.com', 23123213, 'Deluxe', '2022-03-27', '2022-03-28', 1, '14:28:59'),
(29305011, 1, 15, 'ismael bin laden', 'juned', 'ilhamjuniordasilva32@gmail.com', 23123123, 'Deluxe', '2022-03-27', '2022-03-28', 1, '17:40:56'),
(29305012, 1, 18, 'ismael bin laden', 'anggit', 'ilhamjuniordasilva32@gmail.com', 324234, 'Superior', '2022-03-27', '2022-03-28', 1, '18:29:18'),
(29305013, 2, 17, 'ilham ramadan', 'anggit', 'ilhambagas32@yahoo.com', 213213, 'Deluxe', '2022-03-27', '2022-03-29', 1, '19:09:29'),
(29305014, 2, 15, 'ilham ramadan', 'jamettekudasai', 'ilhamjuniordasilva32@gmail.com', 9283983, 'Deluxe', '2022-03-27', '2022-03-28', 1, '21:39:34'),
(29305015, 2, 15, 'ilham ramadan', 'maellle', 'mailfitrienaena@gmail.com', 9989389, 'Deluxe', '2022-03-28', '2022-03-29', 1, '07:49:57'),
(29305016, 2, 15, 'ilham ramadan', 'iawdopawdkpawo', 'ilhamjuniordasilva32@gmail.com', 3994939, 'Deluxe', '2022-03-28', '2022-03-29', 1, '07:54:20'),
(29305017, 1, 15, 'suma', 'suma', 'sumaaln31@gmail.com', 2147483647, 'Deluxe', '2022-03-29', '2022-03-30', 1, '10:02:23'),
(29305018, 1, 15, 'ismael bin laden', 'maellle', 'ilhambagas32@yahoo.com', 864324689, 'Deluxe', '2022-03-29', '2022-03-30', 1, '13:17:27'),
(29305019, 1, 15, 'ismael bin laden', 'elbrianosatan', 'ilhamgansbet@gmail.com', 138, 'Deluxe', '2022-03-28', '2022-03-28', 1, '18:14:54'),
(29305020, 1, 15, 'ismael bin laden', 'maellle', 'ilhamjuniordasilva32@gmail.com', 9384938, 'Deluxe', '2022-03-28', '2022-03-29', 1, '20:07:47'),
(29305021, 6, 15, 'biawak betina', 'biawakwati', 'ilhamjuniordasilva32@gmail.com', 92923928, 'Deluxe', '2022-03-28', '2022-03-29', 1, '23:56:59'),
(29305022, 6, 15, 'biawak betina nih', 'jamettekudasai', 'ilhamjuniordasilva32@gmail.com', 9984948, 'Deluxe', '2022-03-29', '2022-03-30', 1, '00:04:46'),
(29305023, 6, 15, 'biawak betina', 'jamettekudasai', 'ilhamjuniordasilva32@gmail.com', 93948394, 'Deluxe', '2022-03-29', '2022-03-30', 1, '00:45:44'),
(29305024, 6, 16, 'biawak betina', 'akbar', 'ilhamjuniordasilva32@gmail.com', 9283928, 'Superior', '2022-03-29', '2022-03-30', 1, '00:58:47'),
(29305025, 8, 16, 'lanapomed', 'junedd', 'ilhamjuniordasilva32@gmail.com', 54645654, 'Superior', '2022-03-29', '2022-03-30', 1, '13:56:19'),
(29305026, 5, 16, 'mariska rahma yuniarti', 'junedd', 'ilhamjuniordasilva32@gmail.com', 9349304, 'Superior', '2022-03-29', '2022-03-30', 1, '16:13:17'),
(29305027, 2, 16, 'ilham ramadan', 'juki', 'ilhamjuniordasilva32@gmail.com', 90213913, 'Superior', '2022-03-29', '2022-03-30', 1, '16:48:09'),
(29305028, 5, 17, 'mariska rahma yuniarti', 'juned', 'ilhamjuniordasilva32@gmail.com', 1, 'Deluxe', '2022-03-29', '2022-03-30', 1, '16:48:44'),
(29305029, 8, 16, 'lanapomed', 'jamettekudasai', 'ilhamjuniordasilva32@gmail.com', 34234234, 'Superior', '2022-03-29', '2022-03-30', 1, '16:51:53'),
(29305030, 5, 17, 'mariska rahma yuniarti', 'anggit', 'ilhamjuniordasilva32@gmail.com', 93849383, 'Deluxe', '2022-03-29', '2022-03-30', 1, '16:53:05'),
(29305031, 5, 16, 'mariska rahma yuniarti', 'jamettekudasai', 'ilhamjuniordasilva32@gmail.com', 9384834, 'Superior', '2022-03-29', '2022-03-30', 1, '16:54:20'),
(29305032, 1, 16, 'ismael bin laden', 'maellle', 'ilhamjuniordasilva32@gmail.com', 409405495, 'Superior', '2022-03-29', '2022-03-30', 1, '17:17:19'),
(29305033, 6, 15, 'ilham ramadans', 'rahma mariska', 'ilhamjuniordasilva32@gmail.com', 898983, 'Deluxe', '2022-03-29', '2022-03-29', 1, '20:31:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kamar`
--

CREATE TABLE `tb_kamar` (
  `id_kamar` int(60) NOT NULL,
  `nama_kamar` varchar(255) NOT NULL,
  `tipe_kamar` varchar(255) NOT NULL,
  `harga_kamar` int(60) NOT NULL,
  `desk_singkat` text NOT NULL,
  `desk_kamar` text NOT NULL,
  `gambar_kamar` varchar(255) NOT NULL,
  `jumlah_kamar` int(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_kamar`
--

INSERT INTO `tb_kamar` (`id_kamar`, `nama_kamar`, `tipe_kamar`, `harga_kamar`, `desk_singkat`, `desk_kamar`, `gambar_kamar`, `jumlah_kamar`) VALUES
(15, 'Cantigi Deluxer rooms', 'Deluxe', 678300, 'Setiap kamar dilengkapi dengan kamar master King-sized Kamar mandi Living room Meja makan        Dapur', '<li><a><i class=\"icons fa-solid fa-tv\"></i></a></li>\r\n<li><a><i class=\"icons fa-solid fa-mug-saucer\"></i></a></li>\r\n<li><a><i class=\"icons fas fa-wind\"></i></a></li>\r\n<li><a><i class=\"icons fa-solid fa-wifi\"></i></a></li>\r\n<li><a><i class=\"icons fas fa-shower\"></i></a></li>\r\n<li><a><i class=\"icons fas fa-sink\"></i></a></li>\r\n<li><a><i class=\"icons fa-solid fa-utensils\"></i></a></li>', 'cantigi.jpg', 15),
(16, 'Cantigi', 'Superior', 788900, 'Setiap kamar dilengkapi dengan kamar master Double Medium-sized Kamar mandi Living room Meja makan Dapur', '<li><a><i class=\"icons fa-solid fa-tv\"></i></a></li>\r\n<li><a><i class=\"icons fa-solid fa-mug-saucer\"></i></a></li>\r\n<li><a><i class=\"icons fas fa-wind\"></i></a></li>\r\n<li><a><i class=\"icons fa-solid fa-wifi\"></i></a></li>\r\n<li><a><i class=\"icons fas fa-shower\"></i></a></li>\r\n<li><a><i class=\"icons fas fa-sink\"></i></a></li>\r\n<li><a><i class=\"icons fa-solid fa-utensils\"></i></a></li>', 'cantigi-superior.jpg', 12),
(17, 'Cendana', 'Deluxe', 456800, 'Setiap kamar dilengkapi dengan : kamar master, medium-sized Kamar mandiLiving room', '<li><a><i class=\"icons fa-solid fa-tv\"></i></a></li>\r\n<li><a><i class=\"icons fa-solid fa-mug-saucer\"></i></a></li>\r\n<li><a><i class=\"icons fas fa-wind\"></i></a></li>\r\n<li><a><i class=\"icons fa-solid fa-wifi\"></i></a></li>\r\n<li><a><i class=\"icons fas fa-shower\"></i></a></li>\r\n<li><a><i class=\"icons fa-solid fa-utensils\"></i></a></li>', 'cendana-deluxe.jpg', 18),
(18, 'Cendana', 'Superior', 566900, 'Setiap kamar dilengkapi dengan : kamar master, medium-sized Double Bed Kamar mandi Living room', '<li><a><i class=\"icons fa-solid fa-tv\"></i></a></li>\r\n<li><a><i class=\"icons fa-solid fa-mug-saucer\"></i></a></li>\r\n<li><a><i class=\"icons fas fa-wind\"></i></a></li>\r\n<li><a><i class=\"icons fa-solid fa-wifi\"></i></a></li>\r\n<li><a><i class=\"icons fas fa-shower\"></i></a></li>\r\n<li><a><i class=\"icons fa-solid fa-utensils\"></i></a></li>', 'cendana-superior.jpg', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kateg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_logo`
--

CREATE TABLE `tb_logo` (
  `id_logo` int(60) NOT NULL,
  `kategori` varchar(80) NOT NULL,
  `text_logo` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_profil`
--

CREATE TABLE `tb_profil` (
  `id_profil` int(60) NOT NULL,
  `kategori` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_profil`
--

INSERT INTO `tb_profil` (`id_profil`, `kategori`) VALUES
(1, 'logo'),
(2, 'tentang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tentang`
--

CREATE TABLE `tb_tentang` (
  `id_tentang` int(60) NOT NULL,
  `kategori` varchar(80) NOT NULL,
  `text_1` text NOT NULL,
  `text_2` text NOT NULL,
  `text_3` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_tentang`
--

INSERT INTO `tb_tentang` (`id_tentang`, `kategori`, `text_1`, `text_2`, `text_3`, `gambar`) VALUES
(1, 'tentang', 'Tentang Kami', 'Elbria hotel di kawasan pegunungan dieng yang menyuguhkan pemandangan pegunungan bromo, mudahnya akses memberikan ketenangan bagi tamu yang ingin menginap', 'Berdiri pada tahun 2013 kami sudah berpengalaman dalama berbagai macam dunia penginapan, kami memberikan servis yang sangat baik karena kami di awasi oleh hotel-hotel lain yang sudah terlebih dahulu muncul, kami sharing bersama hotel2 tersebut, sehigga menjadikan pengunjung hotel mendapatkan experiens yang sangat baik', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_kamar`
--

CREATE TABLE `tipe_kamar` (
  `id_tipe` int(60) NOT NULL,
  `tipe_kamar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tipe_kamar`
--

INSERT INTO `tipe_kamar` (`id_tipe`, `tipe_kamar`) VALUES
(2, 'Deluxe'),
(20, 'Superior'),
(21, 'Xtralarge'),
(22, 'Xtrax');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `gambar_fasilitas`
--
ALTER TABLE `gambar_fasilitas`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `id_kamar` (`id_kamar`);

--
-- Indexes for table `login_pekerja`
--
ALTER TABLE `login_pekerja`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `login_user`
--
ALTER TABLE `login_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `pemesanan_ibfk_3` (`tipe_kamar`),
  ADD KEY `id_kamar` (`id_kamar`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `tipe_kamar` (`tipe_kamar`),
  ADD KEY `nama_kamar` (`nama_kamar`);

--
-- Indexes for table `tb_logo`
--
ALTER TABLE `tb_logo`
  ADD PRIMARY KEY (`id_logo`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`id_profil`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `tb_tentang`
--
ALTER TABLE `tb_tentang`
  ADD PRIMARY KEY (`id_tentang`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  ADD PRIMARY KEY (`id_tipe`),
  ADD KEY `tipe_kamar` (`tipe_kamar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  MODIFY `id_fasilitas` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `gambar_fasilitas`
--
ALTER TABLE `gambar_fasilitas`
  MODIFY `id_gambar` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `login_pekerja`
--
ALTER TABLE `login_pekerja`
  MODIFY `id_login` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `login_user`
--
ALTER TABLE `login_user`
  MODIFY `id_user` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pesanan` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29305034;
--
-- AUTO_INCREMENT for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  MODIFY `id_kamar` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tb_logo`
--
ALTER TABLE `tb_logo`
  MODIFY `id_logo` int(60) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id_profil` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_tentang`
--
ALTER TABLE `tb_tentang`
  MODIFY `id_tentang` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  MODIFY `id_tipe` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `gambar_fasilitas`
--
ALTER TABLE `gambar_fasilitas`
  ADD CONSTRAINT `gambar_fasilitas_ibfk_1` FOREIGN KEY (`id_kamar`) REFERENCES `tb_kamar` (`id_kamar`);

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`tipe_kamar`) REFERENCES `tb_kamar` (`tipe_kamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_4` FOREIGN KEY (`id_kamar`) REFERENCES `tb_kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_5` FOREIGN KEY (`id_user`) REFERENCES `login_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tb_kamar`
--
ALTER TABLE `tb_kamar`
  ADD CONSTRAINT `tb_kamar_ibfk_1` FOREIGN KEY (`tipe_kamar`) REFERENCES `tipe_kamar` (`tipe_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_logo`
--
ALTER TABLE `tb_logo`
  ADD CONSTRAINT `tb_logo_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `tb_profil` (`kategori`);

--
-- Ketidakleluasaan untuk tabel `tb_tentang`
--
ALTER TABLE `tb_tentang`
  ADD CONSTRAINT `tb_tentang_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `tb_profil` (`kategori`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
