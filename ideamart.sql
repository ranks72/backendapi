-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Apr 2022 pada 07.48
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
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `category` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id_category`, `category`) VALUES
(1, 'Pengelola'),
(2, 'Media Sosial'),
(3, 'Organitation Belonging'),
(4, 'Administrasi'),
(5, 'Event'),
(6, 'Pengembangan Diri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `menu`) VALUES
(1, 'Mandatory'),
(2, 'Choice-Based');

-- --------------------------------------------------------

--
-- Struktur dari tabel `question`
--

CREATE TABLE `question` (
  `id_question` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `question` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `question`
--

INSERT INTO `question` (`id_question`, `id_category`, `question`) VALUES
(1, 1, 'Pusat Karier memiliki visi dan misi yang jelas\r\n'),
(2, 1, 'Tujuan dari Pusat Karier telah difahami dengan baik oleh seluruh pengguna layanan\r\n'),
(3, 1, 'Pusat Karier memberikan layanan konsisten dengan tujuan\r\n'),
(4, 1, 'Informasi layanan Pusat Karier mudah diakses\r\n'),
(5, 2, 'Konten Media Pusat Karier informatif\r\n'),
(6, 2, 'Presentasi Media Pusat Karier Menarik\r\n'),
(7, 2, 'Konten Media Pusat Karier mudah difahami\r\n'),
(8, 2, 'Konten Media Pusat Karier sesuai dengan kebutuhan karier\r\n'),
(9, 3, 'Saya senang mengikuti sosial media Pusat Karier\r\n'),
(10, 3, 'Saya akan merekomendasikan teman untuk menjadi pengikut sosial media Pusat Karier \r\n'),
(11, 3, 'Pusat Karier memberikan layanan yang saya butuhkan untuk mempersiapkan karier di industri \r\n'),
(12, 3, 'Pusat Karier memberikan layanan yang saya butuhkan untuk mempersiapkan karier sebagai wirausaha \r\n'),
(13, 3, 'Pusat Karier memberikan layanan yang saya butuhkan untuk mempersiapkan karier untuk studi lanjut\r\n'),
(14, 4, 'Prosedur kerjasama sudah dapat dipahami dengan baik\r\n'),
(15, 4, 'Admin Pusat Karier cepat menanggapi e-mail yang masuk \r\n'),
(16, 4, 'Pusat Karier mengurus persuratan yang dibutuhkan dengan cepat\r\n'),
(17, 5, 'Kegiatan yang dibuat Pusat Karier sesuai dengan kebutuhan mahasiswa dan alumni\r\n'),
(18, 5, 'Kegiatan yang diadakan pusat karier relevan dengan perkembangan dunia karier masa kini \r\n'),
(19, 5, 'Kegiatan Pusat Karier dapat meningkatkan kemampuan mahasiswa/alumni untuk lebih siap memasuki dunia karier\r\n'),
(20, 5, 'Variasi kegiatan Pusat Karier memberikan saya motivasi untuk mempersiapkan karier yang excellent\r\n'),
(21, 5, 'Narasumber kegiatan Pusat Karier adalah mereka yang profesional di bidangnya\r\n'),
(22, 5, 'Sertifikat keikutsertaan kegiatan Pusat Karier diterima tepat pada waktunya \r\n'),
(23, 5, 'Saya senang mengikuti kegiatan Pusat Karier\r\n'),
(24, 6, 'Saya mendapatkan manfaat dari kegiatan yang diselenggarakan Pusat Karier\r\n'),
(25, 6, 'Saya senang dengan kesempatan yang diberikan Pusat Karier dalam program terstrukturnya\r\n'),
(26, 6, 'Saya mendapatkan alternatif yang cukup memadai untuk meningkatkan pengetahuan dan kompetensi yang saya inginkan\r\n'),
(27, 6, 'Saya termotivasi untuk mengembangkan keterampilan baru setelah mengikuti kegiatan Pusat Karier\r\n'),
(28, 7, 'Data tracer study mudah diakses prodi\r\n'),
(29, 7, 'Pusat Karier merespon cepat kebutuhan data \r\n'),
(30, 7, 'Pusat Karier memberikan data yang dibutuhkan\r\n'),
(31, 7, 'Pusat Karier memberikan data yang dapat dipertanggungjawabkan\r\n'),
(32, 7, 'Pusat Karier memberikan data yang akurat\r\n'),
(33, 8, 'Prosedur kerjasama media partner dapat difahami dengan baik\r\n'),
(34, 8, 'Pusat Karier menawarkan kerjasama media partner yang fair\r\n'),
(35, 8, 'Kerjasama sebaaai media partner dengan Pusat Karier memberikan pengaruh positif terhdap kegiatan yang diselenggarakan\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `result`
--

CREATE TABLE `result` (
  `id_result` int(11) NOT NULL,
  `result` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `result`
--

INSERT INTO `result` (`id_result`, `result`) VALUES
(1, 'Sangat Setuju'),
(2, 'Setuju'),
(3, 'Tidak Setuju'),
(4, 'Sangat Tidak Setuju');

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
(58, 'rishuzuki', 'sukuji', '08312347876', 'wibudess@gmail.com', 'mister72', '14f33cb5794ed10a8a90bae3c7025cfd293ef7ab', 'Dosen', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`);

--
-- Indeks untuk tabel `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id_result`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `result`
--
ALTER TABLE `result`
  MODIFY `id_result` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
