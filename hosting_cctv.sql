-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 12 Mar 2025 pada 10.58
-- Versi server: 5.7.44
-- Versi PHP: 8.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hosting_cctv`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `camera`
--

CREATE TABLE `camera` (
  `id` int(11) NOT NULL,
  `embed` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` enum('up','down') NOT NULL,
  `publish` enum('y','n') NOT NULL,
  `sort` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `camera`
--

INSERT INTO `camera` (`id`, `embed`, `description`, `status`, `publish`, `sort`, `ip`) VALUES
(1, 'https://www.youtube.com/embed/HaUjYIyDyeU', 'PELABUHAN PENYEBERANGAN <br> AIR PUTIH - SEI SELARI <br> (ANTRIAN MOBIL DEPAN)', 'up', 'y', '2', '10.10.30.18'),
(25, 'https://www.youtube.com/embed/vS8alUcCPxs', 'PELABUHAN PENYEBERANGAN <br> AIR PUTIH - SEI SELARI <br> (ANTRIAN MOBIL)', 'up', 'y', '1', '10.10.30.14'),
(26, 'https://www.youtube.com/embed/6ZOhqO7uD5M', 'PELABUHAN PENYEBERANGAN <br> AIR PUTIH - SEI SELARI <br> (ANTRIAN MOTOR)', 'up', 'y', '3', '10.10.30.15'),
(27, 'https://www.youtube.com/embed/m_q-cwVDiLQ', 'PELABUHAN PENYEBERANGAN <br> SEI SELARI - AIR PUTIH <br> (ANTRIAN MOTOR)', 'up', 'y', '4', '10.10.30.17'),
(28, 'https://www.youtube.com/embed/BtIuhcp-7cU', 'PELABUHAN PENYEBERANGAN <br> SEI SELARI - AIR PUTIH <br> (ANTRIAN MOBIL)', 'up', 'y', '5', '10.10.30.25'),
(29, 'https://www.youtube.com/embed/GE1rNHKZJmo', 'PELABUHAN PENYEBERANGAN <br> SEI SELARI - AIR PUTIH <br> (PARKIR INAP MOBIL)', 'up', 'y', '6', '10.10.30.16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `status`) VALUES
(1, 'cctvbks', '49477a98792ce189bd503e3f30a0950b', 'y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `message`
--

INSERT INTO `message` (`id`, `message`) VALUES
(1, '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `camera`
--
ALTER TABLE `camera`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `camera`
--
ALTER TABLE `camera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
