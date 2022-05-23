-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Bulan Mei 2022 pada 18.28
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ideamart`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `firstname` varchar(225) NOT NULL,
  `lastname` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `login_type` varchar(25) NOT NULL,
  `pertanyaan_validasi` varchar(225) NOT NULL,
  `answer_validation` varchar(255) NOT NULL,
  `profile_picture` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `firstname`, `lastname`, `phone`, `email`, `username`, `password`, `login_type`, `pertanyaan_validasi`, `answer_validation`, `profile_picture`) VALUES
(1, 'admin', 'ideamart', '08312347581', 'admin.ideamart@gmail.com', 'Admin1', 'dd94709528bb1c83d08f3088d4043f4742891f4f', 'Admin', '', '', ''),
(2, 'admin', 'ideamart', '08312347581', 'admin.ideamart@gmail.com', 'Admin2', 'eca881133b2ddb9cf426aad2eda9c21845b0881f', 'Admin', '', '', ''),
(3, 'admin', 'ideamart', '08312347581', 'admin.ideamart@gmail.com', 'Admin3', 'ded094acee6a984ccda168d02978b948a925e3ba', 'Admin', '', '', ''),
(57, 'rikujoo', 'sukojah', '08312347581', 'apacoba@gmail.com', 'testing', '78108ec11c12df8365bfb486fe0e4b9898e0facb', 'Mahasiswa', '', '', ''),
(58, 'rishuzuki', 'sukuji', '08312347876', 'wibudess@gmail.com', 'mister72', '14f33cb5794ed10a8a90bae3c7025cfd293ef7ab', 'Dosen', '', '', ''),
(60, 'rikujoo', 'jotaro', '08312347867', 'apacoba@gmail.com', 'madafaka', '887d711541fe5087b435dd039c975c297bcf1953', 'Mahasiswa', 'Apa warna kesukaan kamu', 'Merah', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
