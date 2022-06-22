-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Des 2019 pada 14.13
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `administrasi`
--

CREATE TABLE `administrasi` (
  `ID_Pasien` varchar(4) NOT NULL,
  `ID_Dokter` varchar(4) NOT NULL,
  `ID_Kamar` varchar(4) NOT NULL,
  `ID_Obat` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `administrasi`
--

INSERT INTO `administrasi` (`ID_Pasien`, `ID_Dokter`, `ID_Kamar`, `ID_Obat`) VALUES
('P001', 'D001', 'K001', 'O001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `ID_Dokter` varchar(4) NOT NULL,
  `Nama_Dokter` varchar(30) NOT NULL,
  `Spesialis` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`ID_Dokter`, `Nama_Dokter`, `Spesialis`) VALUES
('D001', 'dr. T. M. Hafidh Rafif, S.T., ', 'Sakit Hati'),
('D002', 'dr. Abdullah', 'penyakit dalam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `ID_Kamar` varchar(4) NOT NULL,
  `Nama_Kamar` varchar(10) NOT NULL,
  `Kelas_Kamar` varchar(10) NOT NULL,
  `stok` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`ID_Kamar`, `Nama_Kamar`, `Kelas_Kamar`, `stok`) VALUES
('K001', 'Tulip 1', 'VVIP', 0),
('K002', 'Tulip 2', 'VVIP', 1),
('K003', 'Tulip 3', 'VVIP', 1),
('K004', 'Tulip 4', 'VVIP', 1),
('K005', 'Tulip 5', 'VVIP', 1),
('K006', 'Mawar 1', 'VIP', 1),
('K007', 'Mawar 2', 'VIP', 1),
('K008', 'Mawar 3', 'VIP', 1),
('K009', 'Mawar 4', 'VIP', 1),
('K010', 'Mawar 5', 'VIP', 1),
('K011', 'Anggrek 2', 'VIP', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `ID_Obat` varchar(4) NOT NULL,
  `Nama_Obat` varchar(20) NOT NULL,
  `Jenis_Obat` varchar(15) NOT NULL,
  `stok` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`ID_Obat`, `Nama_Obat`, `Jenis_Obat`, `stok`) VALUES
('O001', 'Paracetemol', 'Tablet', 20),
('O002', 'sanmol', 'Kapsul', 6),
('O009', 'amoxiclin', 'Kapsul', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `ID_Pasien` varchar(4) NOT NULL,
  `Nama_Pasien` varchar(30) NOT NULL,
  `JK` varchar(2) NOT NULL,
  `Alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `Umur` int(3) NOT NULL,
  `Penyakit` varchar(30) NOT NULL,
  `ID_Dokter` varchar(4) NOT NULL,
  `ID_Kamar` varchar(4) NOT NULL,
  `ID_Obat` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`ID_Pasien`, `Nama_Pasien`, `JK`, `Alamat`, `tgl_lahir`, `Umur`, `Penyakit`, `ID_Dokter`, `ID_Kamar`, `ID_Obat`) VALUES
('P001', 'Hafidh', 'LK', 'Hagu Selatan', '2019-12-09', 19, 'Hati', 'D001', 'K001', 'O001'),
('P002', 'Fakhrurrazi', 'LK', 'cunda', '2000-08-26', 19, 'Tipes', 'D002', 'K002', 'O001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(11, 'admin', '$2y$10$vQ5hyVl9rgopbR0jjWCGIen0KeQ6bOOFIQceZZIyPgQN1fFtD4M9C');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `administrasi`
--
ALTER TABLE `administrasi`
  ADD KEY `ID_Dokter` (`ID_Dokter`),
  ADD KEY `ID_Pasien` (`ID_Pasien`),
  ADD KEY `ID_Kamar` (`ID_Kamar`),
  ADD KEY `ID_Obat` (`ID_Obat`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`ID_Dokter`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`ID_Kamar`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`ID_Obat`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`ID_Pasien`),
  ADD KEY `ID_Kamar` (`ID_Kamar`),
  ADD KEY `ID_Obat` (`ID_Obat`),
  ADD KEY `ID_Dokter` (`ID_Dokter`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `administrasi`
--
ALTER TABLE `administrasi`
  ADD CONSTRAINT `administrasi_ibfk_1` FOREIGN KEY (`ID_Dokter`) REFERENCES `dokter` (`ID_Dokter`),
  ADD CONSTRAINT `administrasi_ibfk_2` FOREIGN KEY (`ID_Pasien`) REFERENCES `pasien` (`ID_Pasien`),
  ADD CONSTRAINT `administrasi_ibfk_3` FOREIGN KEY (`ID_Kamar`) REFERENCES `kamar` (`ID_Kamar`),
  ADD CONSTRAINT `administrasi_ibfk_4` FOREIGN KEY (`ID_Obat`) REFERENCES `obat` (`ID_Obat`);

--
-- Ketidakleluasaan untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_ibfk_2` FOREIGN KEY (`ID_Kamar`) REFERENCES `kamar` (`ID_Kamar`),
  ADD CONSTRAINT `pasien_ibfk_3` FOREIGN KEY (`ID_Obat`) REFERENCES `obat` (`ID_Obat`),
  ADD CONSTRAINT `pasien_ibfk_4` FOREIGN KEY (`ID_Dokter`) REFERENCES `dokter` (`ID_Dokter`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
