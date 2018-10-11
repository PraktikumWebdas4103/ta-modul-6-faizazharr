-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Okt 2018 pada 18.05
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `posting`
--

CREATE TABLE `posting` (
  `nim` varchar(10) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `post` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `nama` varchar(35) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `hobi` varchar(50) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`nama`, `nim`, `password`, `kelas`, `jenis_kelamin`, `hobi`, `fakultas`, `alamat`) VALUES
('faiz', '6701170116', '37693cfc748049e45d87b8c7d8b9aacd', 'D3MI-41-01', 'LAKI-LAKI', 'Desain', 'Fakultas Ilmu Terapan', 'JL LAWU BANGSRI KARANGPANDAN'),
('afrizal', '6701170117', '37693cfc748049e45d87b8c7d8b9aacd', 'D3MI-41-01', 'LAKI-LAKI', 'Desain', 'Fakultas Ilmu Terapan', 'JL LAWU BANGSRI KARANGPANDAN');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `posting`
--
ALTER TABLE `posting`
  ADD KEY `fk_nim` (`nim`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`nim`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `posting`
--
ALTER TABLE `posting`
  ADD CONSTRAINT `fk_nim` FOREIGN KEY (`nim`) REFERENCES `users` (`NIM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
