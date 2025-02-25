-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2025 at 11:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpusnisa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `password` varchar(25) NOT NULL,
  `kode_admin` varchar(12) NOT NULL,
  `no_tlp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama_admin`, `password`, `kode_admin`, `no_tlp`) VALUES
(3, 'admin', 'admin', 'admin', '08123');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `cover` varchar(255) NOT NULL,
  `id_buku` varchar(20) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` date NOT NULL,
  `jumlah_halaman` int(11) NOT NULL,
  `buku_deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`cover`, `id_buku`, `kategori`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `jumlah_halaman`, `buku_deskripsi`) VALUES
('654e62742ef40.jpg', 'bis02', 'bisnis', 'Digital Marketing Strategy', 'Simon kings north', '-', '2023-11-11', 250, 'Belajar strategi pemasaran digital'),
('654e4dc4dc0c6.jpg', 'fil01', 'filsafat', 'Filosofi Teras', 'Henry Manampiring ', 'Kompas', '2018-11-26', 320, 'Filosofi Teras adalah sebuah buku pengantar filsafat Stoa yang dibuat khusus sebagai panduan moral anak muda. Buku ini ditulis untuk menjawab permasalahan tentang tingkat kekhawatiran yang cukup tinggi dalam skala nasional, terutama yang dialami oleh anak muda.'),
('654e4f5e85f75.jpg', 'fil02', 'filsafat', 'Sejarah dunia yang disembunyikan ', 'Jonathan Black ', '-', '2007-11-10', 633, 'Banyak orang mengatakan bahwa sejarah ditulis oleh para pemenang. Hal ini sama sekali tak mengejutkan alias wajar belaka. Tetapi, bagaimana jika sejarahâ€”atau apa yang kita ketahui sebagai sejarahâ€”ditulis oleh orang yang salah? '),
('654e48e1a1680.jpg', 'inf01', 'informatika', 'Dasar dasar pemrogramman web', 'Sandhika Galih ', 'Inkara', '2023-10-18', 414, 'Website di era sekarang sudah menjadi kebutuhan utama yang tidak bisa diabaikan. Seluruh sektor bisnis atau edukasi dapat memanfaatkan website sebagai alat untuk promosi, tukar informasi, dan lainnya. Berdasarkan data dari World Wide Web Technology Surveys, dari seluruh website yang aktif, 88.2% menggunakan HTML dan 95.6% menggunakan CSS. Buku ini membahas tuntas mengenai HTML dan CSS sebagai fondasi dalam pembuatan website serta dilengkapi dengan Studi Kasus yang Relevan dan sesuai trend.'),
('654e4a1c80441.jpg', 'inf02', 'informatika', 'Kursus Mandiri Python', 'Budi Raharjo', 'Informatika', '2022-05-10', 550, 'Belajar pemrogramman python dengan 5 tahapan yaitu : \r\n1. Dasar dasar python\r\n2. PBO(OOP)\r\n3. Eksplorasi Pustaka\r\n4. SQL &amp; MySql\r\n5. Pemrogramman GUI'),
('654e4b44d4d0e.png', 'inf03', 'informatika', 'Pemrogramman Javascript Dan NodeJS untuk teknologi web', 'Budi Raharjo', 'Informatika', '2022-09-16', 500, 'Panduan membuat sistem aplikasi berbasis web dengan javascript dan nodeJs'),
('654e4c1154bdd.jpg', 'inf04', 'informatika', 'Panduan Dasar ubuntu untuk pemula', 'Muhammad Ulil Fahri', 'Informatika', '2017-11-10', 404, 'Panduan awal ubuntu untuk pemula'),
('654e4cd06e0de.jpeg', 'inf05', 'informatika', 'Belajar dasar Pemrogramman C++', 'Muhammad Taufik Dwi Putra', 'Informatika', '2018-11-10', 512, 'Panduan dasar belajar pemrogramman C++ untuk pemula'),
('67b7d05d9b520.jpg', 'nov01', 'novel', 'Percy Jackson &amp; The Olympians: Lightning Thief', 'Rick Riordan', 'Sinar Star Book', '2011-09-22', 416, 'Percy Jackson, seorang remaja yang menemukan jati dirinya sebagai putra dewa Poseidon. Percy harus menghadapi petualangan melawan monster dan dewa-dewi Olimpus. '),
('67b7d359dba0d.jpg', 'nov02', 'novel', 'Percy Jackson &amp; The Olympians: The Sea of Monsters', 'Rick Riordan', 'Sinar Star Book', '2006-04-01', 320, 'Kau pikir hidupku kembali tenang setelah berhasil mencegah perang besar antar dewa? Tentu saja tidak. Aku terus dihantui mimpi tentang Grover, sahabat satirku, yang sepertinya hendak dinikahi paksa oleh Cyclops jahat. Lalu, aku membakar gimnasium sekolah tanpa sengaja—salahkan para raksasa! Perkemahan Blasteran bahkan menghadapi serangan dari banteng-banteng yang suka bikin gosong orang.\r\n\r\nNah, kabur dari perkemahan demi menyelamatkan Grover, itu baru menegangkan! Terutama karena kami harus mengarungi Laut Para Monster yang menyamar menjadi Segitiga Bermuda, yang mengisap apa pun yang melintas di atasnya. Aku dan Annabeth bahkan sempat tersesat di sebuah pulau, dimana aku dikutuk menjadi.. Tidak mau bilang. Kejadian traumatis.\r\n\r\nMana ramalan mengerikannya, kau bilang? Baiklah, katanya salah satu anak dari Dewa Tiga Besar akan menimbulkan perang terbesar dalam sejarah ketika menginjak usia 16 tahun. Yang kemungkinan besar adalah aku. Yang berarti semua dewa kini berminat untuk membinasakanku.'),
('67b7d4d747ed6.jpg', 'nov03', 'novel', 'Percy Jackson &amp; The Olympians: The Tintan&#039;s Curse', 'Rick Riordan', 'Sinar Star Book', '2007-04-24', 312, 'Aku tidak menyukai para Pemburu Artemis. Mereka angkuh, galak, dan benci lelaki. Lebih tidak suka lagi karena mereka berhasil merekrut Bianca di Angelo, blasteran baru. Dia sangat egois karena tega meninggalkan adiknya, Nico, sendirian. Ya, ya, tahu apa aku tentang isi hati para gadis? Tapi, alasan utama aku kesal adalah karena Annabeth sepertinya tertarik untuk ber—ah, membahasnya pun aku malas. Maaf malah curhat. Ayo bahas teror mengerikan yang sudah menjadi menu harian para pahlawan.\r\n\r\nAnnabeth diculik Manticore, Dewi Artemis disekap, dan ada monster purba yang entah berkeliaran di mana, siap untuk mendatangkan kiamat bagi para dewa. Ramalan sama sekali tidak mencerahkan. Menyebut-nyebut tentang Kutukan Bangsa Titan, ditutup dengan kalimat penyemangat, Dan, seorang akan binasa di tangan orang tuanya. Aku benci ramalan. Terutama yang bilang aku akan tewas, dalam berbagai cara.\r\n\r\nPercy Jackson,\r\nSetelah disuruh Athena jauh-jauh dari putrinya, Gunung Olympus.'),
('67b7d59c37e8f.jpg', 'nov04', 'novel', 'Percy Jackson &amp; The Olympians: The Battle Of The Labyrinth', 'Rick Riordan', 'Sinar Star Book', '2006-05-06', 344, 'asuk sekolah baru, bertemu gadis manusia yang bisa melihat menembus Kabut, dan lagi-lagi dituduh membakar gedung sekolah. Awal petualangan yang menjanjikan, bukan?\r\n\r\nMisi teranyar: menjelajahi Labirin ciptaan Daedalus, pencipta terhebat dalam sejarah. Variasi teror: terancam gila, tersesat selamanya, bertemu monster dan kemungkinan besar—lagi-lagi—berakhir tewas, dan salah langkah akan mengakibatkan Kronos, sang Raja Titan, mendapatkan kembali sosoknya yang sejati. Yang berarti perang terakbar Titan versus dewa-dewi resmi dimulai.\r\n\r\nKenapa aku tidak kabur saja? Karena Perkemahan Blasteran akan diserang pasukan Kronos. Dan, aku tidak ingin kehilangan keluarga dan tempat yang sudah kuanggap rumah. Hancur beserta nafas terakhir seorang pahlawan. Aku sudah bosan. Ramalan ini semakin lama semakin tidak kreatif. Topiknya itu-itu saja. Maut, kematian, kehancuran. Mungkin sudah saatnya Apollo pensiun sebagai dewa ramalan?\r\n\r\nPercy Jackson,\r\nGagal tidur dan berakhir melamun, Labirin Daedalus.'),
('67b7d6524af4e.jpg', 'nov05', 'novel', 'Percy Jackson &amp; The Olympians: The Last Olympians', 'Rick Riordan', 'Sinar Star Book', '2009-05-05', 364, 'Typhon, monster yang paling kuat dan ditakuti para dewa, bebas. Dan, dengan penuh semangat ingin membinasakan Olympus. Bahkan meski semua dewa menyatukan kekuatan pun, mereka masih tidak bisa membunuhnya, hanya sekadar.. memperlambat. Jadi, apa yang mereka harapkan? Kami, para demigod fana, membantu? Mungkin saja. Sebagai camilan si monster, kalau-kalau dia lapar.\r\n\r\nMaaf, aku stres. Biasalah, ramalan membahas kematianku lagi: Satu pilihan akan mengakhiri usianya. Kalau kau saja jenuh apalagi aku. Masalahnya, yang menunggu bukan saja akhir dari Olympus, melainkan akhir dari peradaban dunia. Nah, aku kan tidak boleh egois dan coba-coba kabur.\r\n\r\nSemoga saja aku selamat. Kalau aku tidak muncul lagi untuk berkabar, berarti aku, yah, lenyap. Mati. Binasa. Jadi, sampai jumpa atau, selamat tinggal.'),
('67b7d6e7bd82a.jpg', 'nov06', 'novel', 'Percy Jackson &amp; The Olympians: The Chalice of the Gods', 'Rick Riordan', 'Sinar Star Book', '2023-09-26', 288, 'The Chalice of the Gods mengisahkan kehidupan Percy Jackson saat menjadi mahasiswa dan mendaftar perguruan tinggi. Buku ini berlatar setelah kehidupan Percy Jackson dalam seri The Heroes of Olympus, tetapi sebelum The Trials of Apollo. \r\n'),
('654e63b7841f5.jpg', 'sai01', 'sains', 'Cosmos', 'Karl sagan', '-', '2016-12-18', 488, 'Buku â€œKOSMOSâ€ adalah salah satu buku sains yang paling laris sepanjang sejarah. Dengan prosa jernih yang memukau, ahli astronomi Carl Sagan mengungkapkan alam semesta yang dihuni oleh suatu bentuk kehidupan yang baru saja mulai berpetualang menjelajahi luasnya antariksa.'),
('654e64ee16c9a.jpg', 'sai02', 'sains', 'Kanker : Biografi suatu penyakit', 'Siddhartha mukherjee', '-', '2020-04-16', 682, 'kanker bukan hanya satu penyakit, melainkan banyak penyakit dengan ciri sama: pertumbuhan sel tak terkendali. Melawan kanker seolah melawan tubuh yang berkhianat: sel-sel kita sendiri yang berubah jadi ganas dan lepas kendali.');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kategori_buku`
--

INSERT INTO `kategori_buku` (`kategori`) VALUES
('bisnis'),
('filsafat'),
('informatika'),
('novel'),
('sains');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `nisn` int(11) NOT NULL,
  `kode_member` varchar(12) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `tgl_pendaftaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`nisn`, `kode_member`, `nama`, `password`, `jenis_kelamin`, `kelas`, `jurusan`, `no_tlp`, `tgl_pendaftaran`) VALUES
(0, '2', 'annisa fairuz syahirah', '$2y$10$PnLFZyk8hJQu9c.jWBQlTOoq2vwOSMO4hgjmzK8diWNZxWlUOpFPG', '', '', '', '', '0000-00-00'),
(71123982, '1', 'ariel rafliansyah pasaribu\r\n', '$2y$10$Ms/Xx90z8eTuv6ymllu4DuD8lAEDwpQj4X5.3oGCDOSjgA24zwEly', 'Perempuan', 'XII', 'Rekayasa Perangkat Lunak', '08123456', '2001-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_buku` varchar(20) NOT NULL,
  `nisn` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_pengembalian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_buku`, `nisn`, `id_admin`, `tgl_peminjaman`, `tgl_pengembalian`) VALUES
(78, 'fil01', 71123982, 3, '2020-02-10', '2020-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `id_buku` varchar(20) NOT NULL,
  `nisn` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `buku_kembali` date NOT NULL,
  `keterlambatan` enum('YA','TIDAK') NOT NULL,
  `denda` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `password` varchar(25) NOT NULL,
  `kode_petugas` varchar(12) NOT NULL,
  `no_tlp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `nama_petugas`, `password`, `kode_petugas`, `no_tlp`) VALUES
(4, 'asa', 'asa', '4', '081234567'),
(99, 'pai', 'pai', '02', '123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_admin` (`kode_admin`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`kategori`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`nisn`),
  ADD UNIQUE KEY `kode_member` (`kode_member`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `id_peminjaman` (`id_peminjaman`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_petugas` (`kode_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `kategori_buku` (`kategori`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`nisn`) REFERENCES `member` (`nisn`),
  ADD CONSTRAINT `peminjaman_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`);

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `pengembalian_ibfk_3` FOREIGN KEY (`nisn`) REFERENCES `member` (`nisn`),
  ADD CONSTRAINT `pengembalian_ibfk_4` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
