-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25 Des 2018 pada 09.22
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `user`, `pass`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `no_anggota` char(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` char(13) NOT NULL,
  `jl` enum('Laki-Laki','Perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`no_anggota`, `nama`, `alamat`, `no_hp`, `jl`) VALUES
('29302', 'laras', '  solo  ', '237505', 'Laki-Laki'),
('334', 'donny', '  tuban ', '334', 'Laki-Laki'),
('83038', 'dimas', 'jogja', '4880', 'Laki-Laki'),
('97407', 'embang', 'bayumangi', '9807530', 'Laki-Laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `kode_register` char(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `thn_terbit` int(4) NOT NULL,
  `jumlah` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`kode_register`, `judul`, `pengarang`, `penerbit`, `thn_terbit`, `jumlah`) VALUES
('141', 'konsep teknologiss', 'pak nhcsyah', 'if upn yk', 2018, 2),
('22', 'java', 'ifddd', 'pak simon', 2019, 1),
('293', 'masakan', 'ibu', 'rt5', 2019, 4),
('8293', 'algoritma', 'bu wilis', 'if upn yk', 2019, 4),
('840248', 'pengindraan jarak jauh', 'pak ricard', 'if upn yk', 2018, 4),
('8578', 'bahasa indonesia', 'bu yunli', 'if upn yk', 2019, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `denda`
--

CREATE TABLE `denda` (
  `id_denda` int(11) NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hist_pengembalian`
--

CREATE TABLE `hist_pengembalian` (
  `kode_pengembalian` int(11) NOT NULL,
  `anggota` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `petugas` varchar(50) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hist_pengembalian`
--

INSERT INTO `hist_pengembalian` (`kode_pengembalian`, `anggota`, `judul`, `petugas`, `tgl_pinjam`, `tgl_kembali`, `denda`) VALUES
(1, '236636', 'judul', 'raka', '0000-00-00', '2018-12-11', 6000),
(2, '236636', 'judul', 'raka', '2018-12-04', '2018-12-11', 6000),
(3, '236636', 'java', 'raka', '2018-12-10', '2018-12-04', 0),
(4, '236636', 'konsep teknologi', 'raka', '2018-12-13', '2018-12-19', 0),
(5, '236636', 'judul', 'raka', '2018-12-04', '2018-12-11', 6000),
(6, '236636', 'konsep teknologi', 'raka', '2018-12-13', '2018-12-19', 0),
(7, '236636', 'java', 'raka', '2018-12-10', '2018-12-04', 0),
(8, 'bima', 'konsep teknologi', 'hilmi', '2018-12-07', '2018-12-08', 4000),
(9, 'dimas', 'java', 'hilmi', '2018-12-12', '2018-12-10', 0),
(10, 'donnysyah', 'masakan', 'laode darlansyah', '2018-12-18', '2018-12-10', 1000),
(11, 'donny', 'java', 'hilmi', '2018-12-13', '2018-12-12', 14000),
(12, 'dimas', 'konsep teknologiss', 'hilmi', '2018-12-19', '2018-12-20', 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjam`
--

CREATE TABLE `peminjam` (
  `kode_pinjam` varchar(20) NOT NULL,
  `no_anggota` char(20) NOT NULL,
  `kode_petugas` char(20) DEFAULT NULL,
  `kode_register` char(20) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjam`
--

INSERT INTO `peminjam` (`kode_pinjam`, `no_anggota`, `kode_petugas`, `kode_register`, `tgl_pinjam`, `tgl_kembali`) VALUES
('25252', '29302', '03808', '141', '2018-12-10', '2018-12-13'),
('6363', '334', '03808', '22', '2018-12-12', '2018-12-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `kode_pengembalian` int(11) NOT NULL,
  `anggota` char(20) NOT NULL,
  `petugas` char(20) NOT NULL,
  `buku` char(20) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`kode_pengembalian`, `anggota`, `petugas`, `buku`, `tgl_pinjam`, `tgl_kembali`, `denda`) VALUES
(5, '83038', '03808', '22', '2018-12-10', '2018-12-12', 0),
(6, '334', '2536', '293', '2018-12-10', '2018-12-18', 1000),
(7, '29302', '2536', '22', '2018-12-10', '2018-12-06', 14000),
(8, '83038', '03808', '141', '2018-12-20', '2018-12-19', 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id_pengunjung` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `noHP` char(13) NOT NULL,
  `alamat` text NOT NULL,
  `tgl` date NOT NULL,
  `id_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `nama`, `jk`, `noHP`, `alamat`, `tgl`, `id_status`) VALUES
(7, 'anisass', 'Perempuan', '09393939', ' jembi  ', '2018-12-12', 1),
(8, 'adit', 'Laki-Laki', '98766', 'palempang ', '2018-11-12', 2),
(9, 'donny', 'Laki-Laki', '0330', 'tuban ', '2017-10-09', 1),
(10, 'lovita', 'Perempuan', '75795', ' semarang', '2018-11-15', 2),
(11, 'laras', 'Perempuan', '34743', ' selo', '2018-11-15', 1),
(14, 'mutuara', 'Perempuan', '03030', 'magelang ', '2018-11-15', 2),
(15, 'abika', 'Laki-Laki', '044984', 'bekasi ', '2011-04-16', 2),
(18, 'bima', 'Laki-Laki', '367306', 'samarinda ', '2018-11-17', 1),
(19, 'intan', 'Perempuan', 'y8y', ' jakrta', '2018-10-18', 2),
(20, 'riki', 'Laki-Laki', '9t9t9t', ' malang', '2012-11-23', 1),
(21, 'ambon', 'Laki-Laki', '95523', ' yogyakarta', '2018-01-10', 1),
(22, 'riki', 'Laki-Laki', '54859', ' kebumen', '2018-03-15', 6),
(23, 'tari', 'Perempuan', '96036', ' jakarta', '2018-04-20', 2),
(24, 'intan', 'Perempuan', '27843858', ' samarinda', '2018-04-13', 1),
(25, 'sari', 'Perempuan', '438585', ' palu', '2013-07-12', 2),
(26, 'adit', 'Laki-Laki', '23327', 'pelembang', '2018-08-14', 2),
(27, 'egif', 'Laki-Laki', '273484384', 'papua', '2014-06-13', 2),
(28, 'yogi', 'Laki-Laki', '24734854858', 'klaten', '2018-12-12', 2),
(29, 'bayu', 'Laki-Laki', '236274', 'surabaya', '2018-03-13', 2),
(30, 'jojon', 'Laki-Laki', '73738348', 'jakarta', '2018-08-15', 2),
(31, 'bela', 'Perempuan', '34734734743', 'manado', '2017-02-06', 2),
(32, 'yuyun', 'Perempuan', '44438458', 'makassar', '2018-05-24', 2),
(33, 'indah', 'Perempuan', '236236237', 'bogor', '2018-01-16', 6),
(34, 'iki', 'Perempuan', '236236327', 'manado', '2018-08-15', 2),
(35, 'lala', 'Perempuan', '233632', 'palu', '2018-08-09', 1),
(36, 'alfin', 'Laki-Laki', '0829299933', 'surabaya', '2018-11-06', 2),
(37, 'ruli', 'Perempuan', '3472277', 'cilacap', '2018-11-13', 2),
(38, 'arjun', 'Laki-Laki', '326326326', 'kendari', '2018-11-27', 1),
(39, 'geby', 'Perempuan', '326236326', 'solo', '2018-11-04', 2),
(40, 'yogi', 'Laki-Laki', '3474374', 'tegal', '2018-11-12', 1),
(41, 'mario', 'Laki-Laki', '4347347347', 'yogyakarta', '2018-11-06', 2),
(42, 'hilmi', 'Laki-Laki', '47347347437', 'madiun', '2018-11-12', 2),
(43, 'lisna', 'Perempuan', '74374377', 'kendari', '2018-11-05', 2),
(44, 'mona', 'Perempuan', '6332623626', 'kendari', '2018-11-05', 2),
(45, 'fatima', 'Perempuan', '362366236', 'kendari', '2018-11-13', 6),
(46, 'yuni', 'Perempuan', '2362366', 'yogyakarta', '2018-06-07', 2),
(47, 'chan', 'Perempuan', '236236326', 'kendari', '2018-11-12', 2),
(48, 'jonny', 'Laki-Laki', '326236236', 'jayapura', '2018-06-04', 2),
(49, 'yudis', 'Laki-Laki', '3437377', 'semarang', '2018-11-05', 2),
(50, 'aryo', 'Laki-Laki', '2366236', 'jakarta', '2018-11-13', 2),
(51, 'raka', 'Laki-Laki', '2366326', 'padang', '2018-06-06', 2),
(52, 'norman', 'Laki-Laki', '252366', 'madiun', '2018-07-16', 1),
(53, 'hermawan', 'Laki-Laki', '26636', 'bali', '2018-08-14', 2),
(54, 'melisa', 'Perempuan', '3266236', 'bali', '2018-09-11', 1),
(55, 'desinta', 'Perempuan', '3632626', 'magelang', '2018-08-07', NULL),
(56, 'asrul', 'Laki-Laki', '236326', 'kendari', '2018-09-11', 1),
(57, 'hanin', 'Perempuan', '23626326', 'yogyakarta', '2018-07-17', 1),
(58, 'egit', 'Laki-Laki', '2326262636', 'kendari', '2018-07-16', 1),
(59, 'egif', 'Laki-Laki', '2362623626', 'papua', '2018-08-14', 1),
(60, 'pipit', 'Perempuan', '2363636', 'semarang', '2018-07-17', 1),
(61, 'riki', 'Laki-Laki', '235236', 'bali', '2018-11-07', 1),
(62, 'via', 'Perempuan', '750175', 'yogyakarta', '2018-10-25', 6),
(63, 'darlan', 'Laki-Laki', '3244', ' kendari,raha', '2018-12-22', 7),
(64, 'tima', 'Perempuan', '32506', 'makassar ', '2018-12-20', 8),
(65, '25', 'Laki-Laki', '252', '252 ', '2018-12-12', 7),
(66, 'donny', 'Laki-Laki', '8042707', 'bandung ', '2015-12-03', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `kode_petugas` char(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jl` enum('Laki-Laki','Perempuan') NOT NULL,
  `no_hp` char(13) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`kode_petugas`, `nama`, `alamat`, `jl`, `no_hp`, `user`, `pass`) VALUES
('03808', 'hilmi', 'madiun', 'Laki-Laki', '2080238', 'hilmi', '$2y$10$niKQBT8bx5qXwDmr0kkvxecEmjAuHyu2bMXQUREbpbVl6tvw6M/zu'),
('2412', 'bima', 'samarinda', 'Laki-Laki', '8985619', 'bima', '$2y$10$3UWUJIqpkkku8MjyT/xxV.pSFtTw7R/vgmbtcOgk4KFgCFSwcQGUS'),
('2536', 'laode darlansyah', 'kendari ', 'Laki-Laki', '0250632', 'darlansyah', '$2y$10$auo4UFsTshTZIE8JMYOXmuLIH1Uf9tmkLe6c2SpUSU9m3xQAJ6LhC'),
('829', 'yudis', ' semarangsyah', 'Laki-Laki', '0320480', 'yudis', '$2y$10$Ni1QMHHsnKXVZ7HWsQZfKeRIxHEkLG/HEAGFYEFdsgNBGLXJTYHvu'),
('98301', 'raka', 'padang', 'Laki-Laki', '0571057', 'raka', '$2y$10$fL8Y9UKs3PHKLU2RN6jYZuG4Aag/1LOPADnGOzUwZzB69CjRXX5Zq');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'SMP'),
(2, 'SMA'),
(6, 'mahasiswasyahahah`'),
(7, 'umum'),
(8, 'tk'),
(9, 'bahasa jepan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`no_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode_register`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indexes for table `hist_pengembalian`
--
ALTER TABLE `hist_pengembalian`
  ADD PRIMARY KEY (`kode_pengembalian`);

--
-- Indexes for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`kode_pinjam`),
  ADD KEY `kode_petugas` (`kode_petugas`),
  ADD KEY `no_anggota` (`no_anggota`),
  ADD KEY `kode_register` (`kode_register`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`kode_pengembalian`),
  ADD KEY `anggota` (`anggota`),
  ADD KEY `petugas` (`petugas`),
  ADD KEY `petugas_2` (`petugas`),
  ADD KEY `buku` (`buku`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`),
  ADD KEY `status` (`id_status`),
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`kode_petugas`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hist_pengembalian`
--
ALTER TABLE `hist_pengembalian`
  MODIFY `kode_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `kode_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id_pengunjung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `peminjam`
--
ALTER TABLE `peminjam`
  ADD CONSTRAINT `peminjam_ibfk_1` FOREIGN KEY (`kode_petugas`) REFERENCES `petugas` (`kode_petugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjam_ibfk_2` FOREIGN KEY (`no_anggota`) REFERENCES `anggota` (`no_anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjam_ibfk_3` FOREIGN KEY (`kode_register`) REFERENCES `buku` (`kode_register`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`anggota`) REFERENCES `anggota` (`no_anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengembalian_ibfk_2` FOREIGN KEY (`petugas`) REFERENCES `petugas` (`kode_petugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengembalian_ibfk_3` FOREIGN KEY (`buku`) REFERENCES `buku` (`kode_register`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD CONSTRAINT `pengunjung_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`) ON DELETE SET NULL ON UPDATE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
