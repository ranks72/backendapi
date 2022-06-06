-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jun 2022 pada 13.34
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
(6, 'Pengembangan Diri'),
(10, 'pilihan-life'),
(11, 'pilihan-life');

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `feedback` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `id_user`, `id_category`, `feedback`) VALUES
(1, 2, 1, 'Biasalffah'),
(2, 3, 1, 'saya.sudah mengisi'),
(3, 1, 1, ''),
(4, 20, 1, 'saya dana'),
(5, 22, 1, 'saya dana 7'),
(6, 22, 3, 'category 3 jawaban dana7'),
(7, 24, 1, 'dans 8 pengelola'),
(8, 24, 3, 'organisasi dans8\n'),
(9, 26, 1, 'dans 11 pengelola'),
(10, 26, 3, 'dans11 administrasi'),
(11, 27, 1, 'dans12 pengelola'),
(12, 28, 1, 'dans 13 pengelola'),
(13, 28, 3, 'dan13 adminstrasi\n'),
(14, 29, 1, 'dans15 pengelola\n'),
(15, 29, 3, 'dans15 organisasi'),
(16, 30, 1, 'dans17 pengelola\n'),
(17, 30, 3, 'dans17 organisasi'),
(18, 31, 1, 'dans18 pengelola'),
(19, 31, 2, 'dans18 medsos'),
(20, 31, 3, 'dans18 organisasi\n'),
(21, 31, 4, 'dans18 administrasi\n'),
(22, 31, 5, 'dans18 event\n'),
(23, 31, 6, 'dans18  pengembangan\n');

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
-- Struktur dari tabel `survey`
--

CREATE TABLE `survey` (
  `id_survey` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `id_result` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `survey`
--

INSERT INTO `survey` (`id_survey`, `id_user`, `id_question`, `id_result`) VALUES
(1, 1, 1, 2),
(2, 3, 1, 2),
(3, 2, 1, 3),
(4, 2, 2, 4),
(5, 2, 3, 3),
(6, 2, 4, 2),
(7, 2, 4, 2),
(8, 3, 2, 3),
(9, 3, 3, 4),
(10, 3, 4, 1),
(11, 1, 2, 1),
(12, 1, 3, 1),
(13, 1, 4, 1),
(14, 20, 1, 4),
(15, 20, 2, 3),
(16, 20, 3, 4),
(17, 20, 4, 4),
(18, 22, 1, 1),
(19, 22, 2, 2),
(20, 22, 3, 2),
(21, 22, 4, 4),
(22, 22, 10, 1),
(23, 22, 11, 2),
(24, 22, 12, 4),
(25, 22, 13, 1),
(26, 22, 14, 3),
(27, 24, 1, 1),
(28, 24, 2, 2),
(29, 24, 3, 3),
(30, 24, 4, 4),
(31, 24, 13, 1),
(32, 24, 14, 1),
(33, 25, 1, 1),
(34, 25, 3, 3),
(35, 25, 15, 2),
(36, 25, 16, 4),
(37, 25, 17, 3),
(38, 26, 1, 1),
(39, 26, 2, 2),
(40, 26, 3, 3),
(41, 26, 4, 4),
(42, 26, 13, 1),
(43, 26, 14, 2),
(44, 27, 1, 1),
(45, 27, 2, 2),
(46, 27, 3, 3),
(47, 27, 4, 4),
(48, 28, 1, 1),
(49, 28, 2, 2),
(50, 28, 3, 3),
(51, 28, 4, 3),
(52, 28, 13, 1),
(53, 28, 14, 3),
(54, 29, 1, 1),
(55, 29, 2, 2),
(56, 29, 3, 3),
(57, 29, 4, 4),
(58, 29, 13, 2),
(59, 29, 14, 4),
(60, 30, 1, 1),
(61, 30, 2, 2),
(62, 30, 3, 3),
(63, 30, 4, 4),
(64, 30, 10, 1),
(65, 30, 11, 2),
(66, 30, 12, 3),
(67, 30, 13, 4),
(68, 30, 14, 4),
(69, 31, 1, 1),
(70, 31, 2, 2),
(71, 31, 3, 3),
(72, 31, 4, 4),
(73, 31, 5, 1),
(74, 31, 6, 2),
(75, 31, 7, 3),
(76, 31, 8, 4),
(77, 31, 9, 2),
(78, 31, 10, 1),
(79, 31, 11, 2),
(80, 31, 12, 3),
(81, 31, 13, 4),
(82, 31, 14, 2),
(83, 31, 15, 1),
(84, 31, 16, 3),
(85, 31, 17, 4),
(86, 31, 18, 1),
(87, 31, 19, 2),
(88, 31, 20, 3),
(89, 31, 21, 4),
(90, 31, 22, 2),
(91, 31, 23, 1),
(92, 31, 24, 4),
(93, 31, 25, 2),
(94, 31, 26, 4);

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
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`);

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
-- Indeks untuk tabel `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id_survey`);

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
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
-- AUTO_INCREMENT untuk tabel `survey`
--
ALTER TABLE `survey`
  MODIFY `id_survey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
