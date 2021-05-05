-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Bulan Mei 2021 pada 17.59
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_profile`
--

CREATE TABLE `akun_profile` (
  `id_profile` int(11) NOT NULL,
  `username` varchar(75) NOT NULL,
  `password` varchar(70) NOT NULL,
  `level` enum('pusat','korwil','anggota','calon_anggota') NOT NULL,
  `status_account` enum('active','inactive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `photo` varchar(75) DEFAULT NULL,
  `gender` enum('P','L') NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `id_cabang` int(11) DEFAULT NULL,
  `tempat_lahir` varchar(40) NOT NULL,
  `cv` varchar(40) NOT NULL,
  `link_wawancara` varchar(50) NOT NULL,
  `link_sharing` varchar(50) NOT NULL,
  `tgl_wawancara` date NOT NULL,
  `tgl_sharing` date NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `asal` varchar(50) NOT NULL,
  `reason_join` text NOT NULL,
  `bukti_follow` enum('Sudah','Belum') NOT NULL,
  `bukti_bayar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun_profile`
--

INSERT INTO `akun_profile` (`id_profile`, `username`, `password`, `level`, `status_account`, `created_at`, `photo`, `gender`, `full_name`, `id_cabang`, `tempat_lahir`, `cv`, `link_wawancara`, `link_sharing`, `tgl_wawancara`, `tgl_sharing`, `tanggal_lahir`, `asal`, `reason_join`, `bukti_follow`, `bukti_bayar`) VALUES
(1, 'lusi', '$2y$10$VxjO.cX5XbsnXJ1vF6Atf.sbBrkjfcdiFWPjYCexjsJ2UNGp5UONG', 'pusat', 'active', '2021-04-25 15:45:15', 'logo.png', 'P', 'Lusi Tiana ', 5, 'Sidoarjo', '', '', '', '0000-00-00', '0000-00-00', '2021-03-11', 'TNI', 'tauk ah', 'Sudah', ''),
(8, 'lina', '$2y$10$YtP8IBJFa8eFaUynStzu0eH.rhdUgYs6Zk9A7qLyndeU7Ktx0of62', 'anggota', 'active', '2021-05-01 04:40:28', 'vaksinasi_covid4.jpeg', 'P', 'Maylina Triyas Putri', 8, 'Batu', '', '', '', '0000-00-00', '0000-00-00', '2018-01-23', 'SMPN 1 Ngantang', '', 'Sudah', ''),
(13, 'lucyana', '$2y$10$5ONo6E4a0x8FZL182Alw2uT.APBcM1u/T8Mnb7KZKW7AByA5XODt6', 'korwil', 'active', '2021-04-14 17:30:57', 'coba.jpeg', 'P', 'tiana', 11, 'surabaya', '', '', '', '0000-00-00', '0000-00-00', '2018-01-01', 'smk suhat malang', '', 'Sudah', ''),
(14, 'viayuli', '$2y$10$RTaXERqBLoy6845zGAVIbeLRE6z6r0kQWaEmEItjgxGSG5c1Jr8By', 'korwil', 'active', '2021-04-26 01:12:04', 'me_Ulvia_Yulianti6.jpeg', 'P', 'viayuli', 8, 'Malang', '', '', '', '0000-00-00', '0000-00-00', '2018-01-17', 'Polinema', '', 'Sudah', ''),
(16, '123456', '$2y$10$QDYlP7uz4TaWaI8in0n9zOrJaGzDRFWiBi9k9j68bLRoqx231OqJG', 'calon_anggota', NULL, '2021-05-02 06:45:12', NULL, 'P', 'via', NULL, 'Malang', '', '', '', '0000-00-00', '0000-00-00', '2021-04-12', '', '', 'Sudah', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_donasi`
--

CREATE TABLE `data_donasi` (
  `Id_donasi` int(11) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `nama_donatur` varchar(50) NOT NULL,
  `bukti_donasi` varchar(50) NOT NULL,
  `tgl_donasi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Lunas','Belum Lunas','Kadaluwarsa') CHARACTER SET utf8mb4 NOT NULL,
  `jml_donasi` int(50) NOT NULL,
  `id_cabang` int(11) DEFAULT NULL,
  `id_profile` int(11),
  `status_verif` enum('baru','belum verifikasi') DEFAULT 'belum verifikasi',
  `email_donatur` varchar(50) NOT NULL,
  `telp_donatur` varchar(50) NOT NULL,
  `tipe` enum('anggota','non anggota') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_donasi`
--

INSERT INTO `data_donasi` (`Id_donasi`, `no_rekening`, `nama_donatur`, `bukti_donasi`, `tgl_donasi`, `status`, `jml_donasi`, `id_cabang`, `id_profile`, `status_verif`, `email_donatur`, `telp_donatur`, `tipe`) VALUES
(2, '42701007477501', 'Lusi Tiana  Trisila', '', '2021-04-11 17:00:00', 'Lunas', 25000000, 13, 2, 'belum verifikasi', '', '', NULL),
(4, '44801004376502', 'Putri Soekarno Ningrat', '', '2021-04-16 17:00:00', 'Lunas', 130000000, 14, NULL, 'belum verifikasi', '', '', NULL),
(10, '44801004374500', 'Ulvia Yulianti', '', '2021-04-26 17:00:00', 'Lunas', 400000, 8, NULL, 'baru', '', '', NULL),
(16, '83921083031', 'Daffa', 'cuka1.jpeg', '2021-05-02 03:36:19', 'Lunas', 0, NULL, NULL, 'belum verifikasi', 'ulvia.yulianti@yahoo.co.id', '081390682636', NULL),
(17, '83921083031', 'Ita', 'cuka2.jpeg', '2021-05-01 17:00:00', 'Lunas', 0, NULL, NULL, 'belum verifikasi', 'ulvia.yulianti@yahoo.co.id', '081390682636', NULL),
(18, '83921083031', 'Ita lina', '20945831.jpg', '2021-05-01 17:00:00', 'Lunas', 200000, NULL, NULL, 'belum verifikasi', 'ulvia.yulianti@yahoo.co.id', '081390682636', NULL),
(24, '23131389138319', 'Daffa elek', 'logo4.png', '2021-05-03 17:00:00', 'Lunas', 20000, 8, 14, 'baru', 'ulvia.yulianti@gmail.com', '892390132', 'non anggota'),
(27, '93213813', '', 'tokped9.jpeg', '2021-05-03 17:00:00', 'Lunas', 900000, 8, 14, 'baru', '', '', NULL),
(29, '39213819203082', '', 'Screenshot_2021-03-09_1359393.png', '2021-05-03 17:00:00', 'Lunas', 80000, 8, 14, 'baru', '', '', NULL),
(31, '80238129', '', 'logo7.png', '2021-05-03 17:00:00', 'Lunas', 9000, 8, 14, 'baru', '', '', NULL),
(34, '08398284108', 'Ulvia Cantik', 'logo8.png', '2021-05-03 17:00:00', 'Lunas', 9000, 8, 14, 'baru', 'ulvia.yulianti@gmail.com', '892390132', 'non anggota'),
(36, '392183192381', '', 'kas-masuk8.jpg', '2021-05-03 17:00:00', 'Lunas', 9000, 8, 14, 'baru', '', '', NULL),
(38, '23131389138319', '', 'logo10.png', '2021-05-03 17:00:00', 'Lunas', 80000, 8, 8, 'belum verifikasi', '', '', NULL),
(39, '9809880890', '', 'hadist5.jpg', '2021-05-03 17:00:00', 'Lunas', 90000, 8, 8, 'belum verifikasi', '', '', NULL),
(40, '23131389138319', '', 'logo11.png', '2021-05-03 17:00:00', 'Lunas', 9000, 8, 8, 'belum verifikasi', '', '', NULL),
(41, '389213897', '', 'me_Ulvia_Yulianti9.jpeg', '2021-05-04 17:00:00', 'Lunas', 90000, 8, 14, 'baru', '', '', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_informasiprofile`
--

CREATE TABLE `data_informasiprofile` (
  `id_informasiprofile` int(15) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_profile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_informasiprofile`
--

INSERT INTO `data_informasiprofile` (`id_informasiprofile`, `telp`, `address`, `email`, `update_at`, `id_profile`) VALUES
(1, '0836728361', 'Ngantang ', 'ulvia.yulinati@gmail.com', '2021-04-01 15:19:01', 1),
(2, '087817381718', 'Jalan Binuaoa', 'ulvia.yulianti@gmail.com', '2021-05-02 06:45:12', 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kegiatan`
--

CREATE TABLE `data_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `id_cabang` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tema` varchar(20) NOT NULL,
  `textbox` text NOT NULL,
  `namaberkas` varchar(255) DEFAULT NULL,
  `id_profile` int(11) NOT NULL,
  `gambar` varchar(75) NOT NULL,
  `tanggal_kegiatan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tanggal_berakhir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('expired','draft','publish') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_kegiatan`
--

INSERT INTO `data_kegiatan` (`id_kegiatan`, `id_cabang`, `deskripsi`, `judul`, `tema`, `textbox`, `namaberkas`, `id_profile`, `gambar`, `tanggal_kegiatan`, `tanggal_berakhir`, `status`, `created_at`) VALUES
(2, 24, '', 'Peduli Warga Tertinggal, Ayu Maulida Bikin Gerakan \'Senyum Desa\'', 'Sosial', '<p>Dara manis kelahiran Surabaya, 11 Juli 1997 itu mengakui ia dan teman-temannya tak hanya sekadar berbagi uang atau pun sembako saja.</p>\r\n\r\n<p>Tapi, Ayuma juga terjun ke desa untuk mengajar, memberikan cek kesehatan gratis, membangun taman bacaan, berbagi sembako, membuka pandangan dan wawasan kepada wanita di desa yang ia kunjungi.</p>\r\n\r\n<p>&quot;Nah wanita disini khususnya ibu muda. Kenapa? Karena di desa masih tinggi tingkat pernikahan dini. Kita mencoba menekan tingkat pernikahan dini di desa tersebut dengan mereka membuka mindset (pola pikir) mereka,&quot; jelasnya.</p>\r\n\r\n<p>Setelah membuka pola pikir dan wawasan kepada wanita di desa, wanita bernama lengkap Raden Roro&nbsp;<a href=\"https://www.tribunnews.com/tag/ayu-maulida-putri\">Ayu Maulida Putri</a>&nbsp;itu senang karena wanita di desa mulai punya keinginan untuk meraih cita-cita dan menyelesaikan pendidikan 12 tahun.</p>\r\n\r\n<p>Ayu Maulida berharap apa yang ia ceritakan ini bisa membuka mata dermawan dan relawan, agar bisa berbuat kebaikan kepada masyarakat yang ada di Desa.</p>\r\n\r\n<p><br />\r\n<br />\r\nArtikel ini telah tayang di&nbsp;<a href=\"https://www.tribunnews.com/\">Tribunnews.com</a>&nbsp;dengan judul Peduli Warga Tertinggal, Ayu Maulida Bikin Gerakan &#39;Senyum Desa&#39;,&nbsp;<a href=\"https://www.tribunnews.com/seleb/2020/10/11/peduli-warga-tertinggal-ayu-maulida-bikin-gerakan-senyum-desa\">https://www.tribunnews.com/seleb/2020/10/11/peduli-warga-tertinggal-ayu-maulida-bikin-gerakan-senyum-desa</a>.<br />\r\n<br />\r\nEditor: Hendra Gunawan</p>\r\n', '160431443_2492336261061182_1881958843682797811_o.jpg', 13, '', '2021-04-20 15:40:14', '2021-04-21 17:00:00', 'publish', '2021-04-20 15:40:14'),
(8, 13, '', 'Mendes PDTT Apresiasi Program Senyum Desa Milik Puteri Indonesia 2020  Artikel ini telah tayang di K', 'Budaya', '<p>KOMPAS.com - Menteri Desa, Pembangunan Daerah Tertinggal, dan Transmigrasi (Mendes PDTT) Abdul Halim Iskandar atau yang biasa disapa Gus Menteri, mengaku salut pada program Senyum Desa yang diusung Puteri Indonesia 2020 Raden Roro Ayu Maulida Putri. Hal tersebut ditunjukkan Gus Menteri melalui unggahan akun Instagramnya. Pria kelahiran Jombang tersebut mengunggah foto Ayu, disertai ucapan selamat. &ldquo;Selamat buat Arek Suroboyo @ayumaulida97 sebagai Puteri Indonesia 2020. Saya salut atas program Senyum Desa yang diadvokasi Ayu Maulida, semoga ke depan bisa bersinergi membangun masyarakat desa,&rdquo; Tulis Gus Menteri, dalam akun Instagramnya. Untuk diketahui, program Senyum Desa merupakan kegiatan sosial mengajar di pelosok desa, edukasi hidup sehat, dan pelatihan kewirausahaan. Pada kegiatan tersebut, Ayu dan teman-teman akan terjun membantu pendidikan anak, dan pemberdayaan perempuan di desa-desa tertinggal. Gus Menteri pun ingin menggandeng Ayu untuk membangun masyarakat desa melalui program tersebut.<br />\r\n<br />\r\nArtikel ini telah tayang di&nbsp;<a href=\"https://www.kompas.com/\">Kompas.com</a>&nbsp;dengan judul &quot;Mendes PDTT Apresiasi Program Senyum Desa Milik Puteri Indonesia 2020&quot;, Klik untuk baca:&nbsp;<a href=\"https://nasional.kompas.com/read/2020/03/07/13251611/mendes-pdtt-apresiasi-program-senyum-desa-milik-puteri-indonesia-2020\">https://nasional.kompas.com/read/2020/03/07/13251611/mendes-pdtt-apresiasi-program-senyum-desa-milik-puteri-indonesia-2020</a>.<br />\r\nPenulis : Inadha Rahma Nidya<br />\r\nEditor : Mikhael Gewati<br />\r\n<br />\r\nDownload aplikasi&nbsp;<a href=\"https://www.kompas.com/\">Kompas.com</a>&nbsp;untuk akses berita lebih mudah dan cepat:<br />\r\nAndroid:&nbsp;<a href=\"https://bit.ly/3g85pkA\">https://bit.ly/3g85pkA</a><br />\r\niOS:&nbsp;<a href=\"https://apple.co/3hXWJ0L\">https://apple.co/3hXWJ0L</a></p>\r\n', '5.jpg', 13, '', '2021-04-20 15:40:32', '2021-04-13 17:00:00', 'publish', '2021-04-20 15:40:32'),
(9, 11, '', 'Kelola Gerakan Sosial Senyum Desa, Ini yang Dilakukan Puteri Indonesia 2020 Ayu Maulida di Pedesaan', 'Peduli Lingkungan', '<p>&quot;Untuk para wanita, khususnya ibu muda, kami berikan pemahaman karena di desa masih cukup tinggi tingkat pernikahan dini,&quot; ucapnya.</p>\r\n\r\n<p>Perempuan bernama lengkap Raden Roro <a href=\"https://wartakota.tribunnews.com/tag/ayu-maulida\" title=\"Ayu Maulida\">Ayu&nbsp;Maulida</a> Putri itu senang karena wanita di desa mulai punya keinginan meraih cita-cita tinggi dan menyelesaikan pendidikan minimal 12 tahun.</p>\r\n\r\n<p>&quot;Semoga mereka semangat ikut berbuat kebaikan,&quot; ujar <a href=\"https://wartakota.tribunnews.com/tag/ayu-maulida\" title=\"Ayu Maulida\">Ayu&nbsp;Maulida</a>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Selama ini fokus gerakan banyak untuk masyarakat kota. Sementara saudara kita di desa jauh tertinggal,&quot; kata&nbsp;<a href=\"https://wartakota.tribunnews.com/tag/ayu-maulida\" title=\"Ayu Maulida\">Ayu&nbsp;Maulida</a>&nbsp;di&nbsp;kanal YouTube &#39;Jadi PNS&#39;, Minggu (11/10/2020).</p>\r\n\r\n<p>Dari awalnya hanya berkumpul,&nbsp;<a href=\"https://wartakota.tribunnews.com/tag/ayu-maulida\" title=\"Ayu Maulida\">Ayu&nbsp;Maulida</a>&nbsp;dan teman-temannya&nbsp;sepakat membuat yayasan hingga menjadi gerakan sosial.</p>\r\n\r\n<p>Dara manis kelahiran Surabaya, Jawa Timur, 11 Juli 1997, itu terjun ke desa untuk mengajar, memberi layanan kesehatan gratis, membangun taman bacaan hingga berbagi sembako.</p>\r\n\r\n<p><br />\r\n<br />\r\nArtikel ini telah tayang di&nbsp;<a href=\"https:\">Wartakotalive</a>&nbsp;dengan judul Kelola Gerakan Sosial Senyum Desa, Ini yang Dilakukan Puteri Indonesia 2020 Ayu Maulida di Pedesaan,&nbsp;<a href=\"https://wartakota.tribunnews.com/2020/10/11/kelola-gerakan-sosial-senyum-desa-ini-yang-dilakukan-puteri-indonesia-2020-ayu-maulida-di-pedesaan\">https://wartakota.tribunnews.com/2020/10/11/kelola-gerakan-sosial-senyum-desa-ini-yang-dilakukan-puteri-indonesia-2020-ayu-maulida-di-pedesaan</a>.<br />\r\nPenulis: Arie Puji Waluyo<br />\r\nEditor: Irwan Wahyu Kintoko</p>\r\n', '122222468_2390467944581348_999330608173839914_o.jpg', 13, '', '2021-04-20 15:40:49', '2021-04-22 17:00:00', 'publish', '2021-04-20 15:40:49'),
(21, 17, '', 'Hari Ini dilaksankan Pemiliha Ketua Edit', 'Pemilihan Ketua Edit', '<p> </p>\r\n\r\n<p>\" cols=\" 10\" rows=\"2\"></p>\r\n\r\n<p>\" cols=\" 10\" rows=\"2\"></p>\r\n\r\n<p>\" cols=\" 10\" rows=\"2\"></p>\r\n', '607fa6dd247ef.jpg', 13, '', '2021-04-21 04:20:08', '2021-04-21 17:00:00', 'draft', '2021-04-21 04:20:08'),
(68, 11, '', 'yoi', 'coba', '<p>hellow</p>\r\n', 'ai-artificial-intelligence-machine-learning-background_127544-40926.jpg', 13, '', '2021-04-23 19:08:00', '2021-04-24 17:00:00', 'publish', '2021-04-23 19:08:00'),
(71, 8, 'Event github', 'Belajar MYSQL', '', '', NULL, 1, '', '2021-04-26 09:53:38', '2021-04-26 09:53:38', 'draft', '2021-04-26 09:53:38'),
(72, 8, 'Analisis data', 'Mencoba mentransformasikan permasalahan terhadap query', '', '', NULL, 13, '', '2021-04-26 09:53:38', '2021-04-26 09:53:38', 'publish', '2021-04-26 09:53:38'),
(73, 8, 'Teest', 'Ulvia Tuman', '', '', '', 14, '', '2021-04-26 16:07:57', '0000-00-00 00:00:00', 'expired', '2021-04-26 16:07:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_keuangan`
--

CREATE TABLE `data_keuangan` (
  `id_keuangan` int(11) NOT NULL,
  `id_cabang` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `tgl_bayar` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `judul` varchar(75) NOT NULL,
  `bukti_bayar` varchar(75) NOT NULL,
  `no_rekening` varchar(75) NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `tanggal_laporan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jenis_keuangan` enum('masuk','keluar') NOT NULL,
  `status` enum('lunas','belum lunas') NOT NULL,
  `nominal` int(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tipe` varchar(50) NOT NULL,
  `status_verif` enum('baru','belum verifikasi') DEFAULT 'belum verifikasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_keuangan`
--

INSERT INTO `data_keuangan` (`id_keuangan`, `id_cabang`, `id_profile`, `tgl_bayar`, `judul`, `bukti_bayar`, `no_rekening`, `deskripsi`, `tanggal_laporan`, `jenis_keuangan`, `status`, `nominal`, `created_at`, `tipe`, `status_verif`) VALUES
(1, 18, 1, '2021-04-27 23:42:58', 'Setoran Modal', '', '', 'setoran kas', '2021-03-24 11:46:24', 'masuk', 'lunas', 20000000, '2021-05-01 03:45:20', 'Rekening', 'belum verifikasi'),
(21, 8, 8, '2021-05-03 10:31:51', 'cabang malang', 'tokped5.jpeg', '879777777', 'bayar malang bln jan', '2021-05-03 03:31:51', 'masuk', 'lunas', 800000, '2021-05-03 03:31:51', '', 'baru'),
(22, 8, 14, '2021-05-03 12:21:35', 'Makan sapi', 'floow1.jpg', '910920192', 'bayar makanan', '2021-05-03 05:21:35', 'masuk', 'lunas', 200000, '2021-05-03 05:21:35', '', 'baru'),
(23, 8, 14, '2021-05-04 00:00:00', 'Bayar Bulan des', 'hadist3.jpg', '8934810', 'bayar bulan ini yaa', '2021-05-04 16:27:42', 'masuk', 'lunas', 9000, '2021-05-04 16:27:42', '', 'belum verifikasi'),
(24, 8, 14, '2021-05-04 00:00:00', 'Bayar Bulan des', 'hadist4.jpg', '83921313823', 'bayar bulan januari', '2021-05-04 16:44:12', 'masuk', 'lunas', 90000, '2021-05-04 16:44:12', '', 'belum verifikasi'),
(25, 8, 14, '2021-05-04 00:00:00', 'Bayar Kas Bulan September', 'kas-masuk7.jpg', '83921381', 'kas masuk', '2021-05-04 16:44:49', 'masuk', 'lunas', 9021319, '2021-05-04 16:44:49', '', 'belum verifikasi'),
(27, 8, 8, '2021-05-05 00:00:00', 'Makan sapi', 'Screenshot_2021-03-09_1359397.png', '8992173', 'hai', '2021-05-05 10:18:22', 'masuk', 'lunas', 90000, '2021-05-05 10:18:22', '', 'belum verifikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_cabang`
--

CREATE TABLE `master_cabang` (
  `id_cabang` int(11) NOT NULL,
  `name_cabang` varchar(100) NOT NULL,
  `status_cabang` enum('active','inactive') NOT NULL,
  `photo` varchar(75) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_cabang`
--

INSERT INTO `master_cabang` (`id_cabang`, `name_cabang`, `status_cabang`, `photo`, `id_profile`, `created_at`) VALUES
(1, 'Bali ', 'active', '1200px-Coat_of_arms_of_Bali.png', 0, '2021-04-11 13:06:38'),
(2, 'Bangkalan', 'active', 'Lambang_Bangkalan.png', 0, '2021-04-11 13:07:06'),
(3, 'Bandung ', 'active', 'Kota_Bandung.png', 0, '2021-04-11 13:10:04'),
(4, 'Gresik', 'active', 'download_(1).png', 0, '2021-04-11 13:04:11'),
(5, 'Jambi baru', 'active', 'download.png', 0, '2021-04-11 13:08:04'),
(6, 'Kalimantan Barat', 'inactive', 'Coat_of_arms_of_West_Kalimantan.png', 0, '2021-04-11 13:05:27'),
(7, 'Kediri', 'active', 'Lambang_Kota_Kediri.png', 0, '2021-04-11 12:58:27'),
(8, 'Malang', 'active', 'Logo_Kota_Malang_color.png', 0, '2021-04-11 13:05:54'),
(9, 'Pamekasan', 'active', 'Lambang_Daerah_Kab__Pamekasan,_Jawa_Timur.png', 0, '2021-04-11 13:04:58'),
(11, 'Surabaya', 'active', 'word-image1.png', 0, '2021-04-11 13:09:47'),
(12, 'Yogyakarta', 'active', 'Daerah_Istimewa_Jogjakarta-logo-19A73BFE95-seeklogo.png', 0, '2021-04-11 13:17:01'),
(13, 'Sidoarjo', 'active', 'Coat_of_Arms_of_Sidoarjo_Regency.png', 0, '2021-04-11 13:17:35'),
(14, 'Sumatra Selatan', 'active', 'Lambang-Propinsi-Sulawesi-Selatan-min.png', 0, '2021-04-11 13:19:23'),
(16, 'Padang ', 'active', 'Logo_Padang_thumb.png', 0, '2021-04-11 13:19:49'),
(17, 'Jakarta Selatan', 'active', 'da866c7b79d2e6b261455e6b66f7766e.jpg', 0, '2021-04-11 13:20:34'),
(18, 'Bogor', 'active', 'Bogor_coa.png', 0, '2021-04-11 13:20:57'),
(20, 'Bondowoso baru', 'active', 'Lambang_Bondowoso_(1).png', 0, '2021-04-11 13:21:47'),
(22, 'Banjarmasin', 'active', 'Logo-Banjarmasin-Kota-Banjarmasin-Kalimantan-Selatan-1140x1581.png', 0, '2021-04-11 13:22:18'),
(24, 'Aceh', 'active', 'PANCACITA_ACEH-logo-300CE47472-seeklogo_com.png', 0, '2021-04-11 13:23:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_notif`
--

CREATE TABLE `tbl_notif` (
  `id_notif` int(11) NOT NULL,
  `tema` varchar(200) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `name_cabang` varchar(200) NOT NULL,
  `pesan` varchar(100) NOT NULL,
  `tanggal_notifikasi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_read` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `id_cabang` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_notif`
--

INSERT INTO `tbl_notif` (`id_notif`, `tema`, `judul`, `name_cabang`, `pesan`, `tanggal_notifikasi`, `is_read`, `id_profile`, `id_cabang`, `id_kegiatan`) VALUES
(16, 'percobaan', 'hello', 'Dari Wilayah <br>', '<p>hallo</p>\r\n', '2021-04-23 19:05:54', 0, 0, 0, 0),
(17, 'coba', 'yoi', 'Dari Wilayah <br>11', '<p>hellow</p>\r\n', '2021-04-23 19:08:00', 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun_profile`
--
ALTER TABLE `akun_profile`
  ADD PRIMARY KEY (`id_profile`),
  ADD KEY `FK_akun_profile_master_cabang` (`id_cabang`);

--
-- Indeks untuk tabel `data_donasi`
--
ALTER TABLE `data_donasi`
  ADD PRIMARY KEY (`Id_donasi`),
  ADD KEY `FK_data_donasi_master_cabang` (`id_cabang`),
  ADD KEY `FK_data_donasi_akun_profile` (`id_profile`);

--
-- Indeks untuk tabel `data_informasiprofile`
--
ALTER TABLE `data_informasiprofile`
  ADD PRIMARY KEY (`id_informasiprofile`),
  ADD KEY `id_profile` (`id_profile`);

--
-- Indeks untuk tabel `data_kegiatan`
--
ALTER TABLE `data_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `FK_data_kegiatan_akun_profile` (`id_profile`),
  ADD KEY `id_cabang` (`id_cabang`) USING BTREE;

--
-- Indeks untuk tabel `data_keuangan`
--
ALTER TABLE `data_keuangan`
  ADD PRIMARY KEY (`id_keuangan`),
  ADD KEY `FK_data_keuangan_master_cabang` (`id_cabang`),
  ADD KEY `FK_data_keuangan_akun_profile` (`id_profile`);

--
-- Indeks untuk tabel `master_cabang`
--
ALTER TABLE `master_cabang`
  ADD PRIMARY KEY (`id_cabang`);

--
-- Indeks untuk tabel `tbl_notif`
--
ALTER TABLE `tbl_notif`
  ADD PRIMARY KEY (`id_notif`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun_profile`
--
ALTER TABLE `akun_profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `data_donasi`
--
ALTER TABLE `data_donasi`
  MODIFY `Id_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `data_informasiprofile`
--
ALTER TABLE `data_informasiprofile`
  MODIFY `id_informasiprofile` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_kegiatan`
--
ALTER TABLE `data_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `data_keuangan`
--
ALTER TABLE `data_keuangan`
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `master_cabang`
--
ALTER TABLE `master_cabang`
  MODIFY `id_cabang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tbl_notif`
--
ALTER TABLE `tbl_notif`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `akun_profile`
--
ALTER TABLE `akun_profile`
  ADD CONSTRAINT `FK_akun_profile_master_cabang` FOREIGN KEY (`id_cabang`) REFERENCES `master_cabang` (`id_cabang`);

--
-- Ketidakleluasaan untuk tabel `data_donasi`
--
ALTER TABLE `data_donasi`
  ADD CONSTRAINT `FK_data_donasi_master_cabang` FOREIGN KEY (`id_cabang`) REFERENCES `master_cabang` (`id_cabang`);

--
-- Ketidakleluasaan untuk tabel `data_informasiprofile`
--
ALTER TABLE `data_informasiprofile`
  ADD CONSTRAINT `FK_data_informasiprofile_akun_profile` FOREIGN KEY (`id_profile`) REFERENCES `akun_profile` (`id_profile`);

--
-- Ketidakleluasaan untuk tabel `data_kegiatan`
--
ALTER TABLE `data_kegiatan`
  ADD CONSTRAINT `data_kegiatan_ibfk_1` FOREIGN KEY (`id_cabang`) REFERENCES `master_cabang` (`id_cabang`),
  ADD CONSTRAINT `data_kegiatan_ibfk_2` FOREIGN KEY (`id_profile`) REFERENCES `akun_profile` (`id_profile`);

--
-- Ketidakleluasaan untuk tabel `data_keuangan`
--
ALTER TABLE `data_keuangan`
  ADD CONSTRAINT `FK_data_keuangan_akun_profile` FOREIGN KEY (`id_profile`) REFERENCES `akun_profile` (`id_profile`),
  ADD CONSTRAINT `FK_data_keuangan_master_cabang` FOREIGN KEY (`id_cabang`) REFERENCES `master_cabang` (`id_cabang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
