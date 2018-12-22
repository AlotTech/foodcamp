-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 24, 2018 at 02:41 AM
-- Server version: 10.2.3-MariaDB-log
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodcampa`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_kuliner`
--

CREATE TABLE `detail_kuliner` (
  `id` int(11) NOT NULL,
  `kuliner_id` int(11) NOT NULL,
  `resep` text DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_kuliner`
--

INSERT INTO `detail_kuliner` (`id`, `kuliner_id`, `resep`, `foto`) VALUES
(1, 14, '<p><strong>Bahan-bahan:</strong></p>\r\n\r\n<ul>\r\n	<li>5 batang kacang panjang, iris tipis</li>\r\n	<li>5 lembar kol, iris tipis</li>\r\n	<li>1 buah mentimun, iris tipis</li>\r\n	<li>1 buah terong lalap/bulat, iris tipis</li>\r\n	<li>1 genggam tauge segar</li>\r\n	<li>1 genggam daun kemangi</li>\r\n	<li>2 sdm bawang goreng</li>\r\n	<li>3 sdm air asam jawa</li>\r\n</ul>\r\n\r\n<p><strong>Bumbu sambal:</strong></p>\r\n\r\n<ul>\r\n	<li>2 siung bawang putih</li>\r\n	<li>5 buah cabai rawit merah</li>\r\n	<li>5 cm kencur</li>\r\n	<li>3 sdm kacang tanah</li>\r\n	<li>3 sdm gula jawa, sisir</li>\r\n	<li>1/2 sdt terasi bakar</li>\r\n	<li>garam secukupnya</li>\r\n</ul>\r\n\r\n<p><strong>Cara membuat:</strong></p>\r\n\r\n<ol>\r\n	<li>Ulek bumbu sambal hingga halus, atau tidak terlalu halus juga tidak apa-apa, sesuai selera. Tuang air asam jawa dan aduk hingga menjadi bumbu kental.</li>\r\n	<li>Campur dengan sayuran mentah sambil sesekali dibejek atau dipenyet hingga agak layu.</li>\r\n	<li>Sajikan di piring dengan taburan bawang goreng dan kerupuk.</li>\r\n</ol>\r\n', '7e61f14829898d2c55333a580ab05be0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `etnis`
--

CREATE TABLE `etnis` (
  `id` int(11) NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `kode` varchar(10) DEFAULT NULL,
  `lokasi` varchar(45) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etnis`
--

INSERT INTO `etnis` (`id`, `provinsi_id`, `nama`, `kode`, `lokasi`, `detail`, `foto`) VALUES
(1, 1, 'Suku Aceh ', '', '', 'Suku Aceh adalah nama sebuah suku penduduk asli yang mendiami wilayah pesisir dan sebagian pedalaman Provinsi Aceh, Indonesia. Suku Aceh mayoritas beragama Islam.[6] Suku Aceh mempunyai beberapa nama lain yaitu Lam Muri, Lambri, Akhir, Achin, Asji, A-tse dan Atse.[7][8] Bahasa yang dituturkan adalah bahasa Aceh, yang merupakan bagian dari rumpun bahasa Melayu-Polinesia Barat dan berkerabat dekat dengan bahasa Cham yang dipertuturkan di Vietnam dan Kamboja.[6][9] Suku Aceh sesungguhnya merupakan keturunan berbagai suku, kaum, dan bangsa yang menetap di tanah Aceh. Pengikat kesatuan budaya suku Aceh terutama ialah dalam bahasa, agama, dan adat khas Aceh', 'e204d89add45c3b7cc5de6cf4dc7e377.jpg'),
(2, 2, 'Suku Batak', '', '', 'Suku Batak merupakan salah satu suku bangsa terbesar di Indonesia. Nama ini merupakan sebuah tema kolektif untuk mengidentifikasikan beberapa suku bangsa yang bermukim dan berasal dari Pantai Barat dan Pantai Timur di Provinsi Sumatera Utara. Suku bangsa yang dikategorikan sebagai Batak adalah Toba, Karo, Pakpak, Simalungun, Angkola, dan Mandailing. Batak adalah rumpun suku-suku yang mendiami sebagian besar wilayah Sumatera Utara. Namun sering sekali orang menganggap penyebutan Batak hanya pada suku Toba padahal Batak tidak diwakili oleh suku Toba. Sehingga tidak ada budaya dan bahasa Batak tetapi budaya dan bahasa Toba, Karo, Simalungun dan suku-suku lain yang serumpun.', 'e204d89add45c3b7cc5de6cf4dc7e377.jpg'),
(3, 3, 'Minangkabau', '', '', 'Minangkabau atau disingkat Minang merujuk pada entitas kultural dan geografis yang ditandai dengan penggunaan bahasa, adat yang menganut sistem kekerabatan matrilineal, dan identitas agama Islam. Secara geografis, Minangkabau meliputi daratan Sumatera Barat, separuh daratan Riau, bagian utara Bengkulu, bagian barat Jambi, pantai barat Sumatera Utara, barat daya Aceh, dan Negeri Sembilan di Malaysia.[3] Dalam percakapan awam, orang Minang seringkali disamakan sebagai orang Padang, merujuk pada nama ibu kota provinsi Sumatera Barat Kota Padang. Namun, mereka biasanya akan menyebut kelompoknya dengan sebutan urang awak, bermaksud sama dengan orang Minang itu sendiri.', 'e204d89add45c3b7cc5de6cf4dc7e377.jpg'),
(4, 6, 'Palembang', '', '', 'Suku Melayu Palembang atau yang lebih dikenal dengan Suku Palembang adalah salah satu suku Melayu yang terletak di wilayah Kota Palembang dan sekitarnya. Suku Palembang juga merupakan salah satu kelompok etnis terdekat dari Suku Komering. Suku Palembang di Palembang semakin lama semakin berkurang, tetapi di Tepian Sungai Musi masih banyak ditemukan suku Palembang. Suku Palembang bahasanya mirip dengan Bahasa Melayu Jambi dengan Suku Melayu Bengkulu yang kata-katanya berakhiran dengan kata o', 'e204d89add45c3b7cc5de6cf4dc7e377.jpg'),
(5, 4, 'Suku Akit', '', '', 'Suku Akit berasal dari kata rakik atau rakit, yaitu alat transportasi air, karena kehidupan mereka lebih banyak berada di perairan laut dan muara-muara sungai. Pada zaman dahulu rumah mereka didirikan diatas rakit-rakit yang mudah dipindah-pindahkan dari satu tepian ke tepian lain. Pada masa sekarang mereka berdiam disekitar kepenghuluan hutan panjang, kecamatan Rupat di pulau Rupat, Kabupaten Bengkalis', 'e204d89add45c3b7cc5de6cf4dc7e377.jpg'),
(6, 11, 'Suku Betawi', '', '', 'Suku Betawi merupakan suku asli daerah ibukota Jakarta, suku betawi juga tetap memegang teguh adat-istiadat mereka dan memeliharanya dengan baik. Kata Betawi digunakan untuk menyatakan suku asli yang menghuni Jakarta dan bahasa Melayu Kreol yang digunakannya, dan kebudayaan Melayunya. Kata Betawi berasal dari kata \"Batavia\" yaitu nama lain dari Jakarta pada masa Hindia Belanda, kemudian penggunaan kata Betawi sebagai sebuah suku yang termuda, diawali dengan pendirian sebuah organisasi bernama Perkoempoelan Kaoem Betawi yang lahir pada tahun 1923.', 'e204d89add45c3b7cc5de6cf4dc7e377.jpg'),
(7, 16, 'Baduy', '', '', 'Sebutan \"Baduy\" merupakan sebutan yang diberikan oleh penduduk luar kepada kelompok masyarakat tersebut, berawal dari sebutan para peneliti Belanda yang agaknya mempersamakan mereka dengan kelompok Arab Badawi yang merupakan masyarakat yang berpindah-pindah (nomaden). Kemungkinan lain adalah karena adanya Sungai Baduy dan Gunung Baduy yang ada di bagian utara dari wilayah tersebut. Mereka sendiri lebih suka menyebut diri sebagai urang Kanekes atau \"orang Kanekes\" sesuai dengan nama wilayah mereka, atau sebutan yang mengacu kepada nama kampung mereka seperti Urang Cibeo (Garna, 1993).', 'e204d89add45c3b7cc5de6cf4dc7e377.jpg'),
(8, 12, 'Sunda', '', '', 'Suku Sunda adalah kelompok etnis yang berasal dari bagian barat pulau Jawa, Indonesia, dengan istilah Tatar Pasundan yang mencakup wilayah administrasi provinsi Jawa Barat, Banten, Jakarta, Lampung dan wilayah barat Jawa Tengah (Banyumasan). Orang Sunda tersebar diberbagai wilayah Indonesia, dengan provinsi Banten dan Jawa Barat sebagai wilayah utamanya.', 'e204d89add45c3b7cc5de6cf4dc7e377.jpg'),
(9, 34, 'Asmat', '', '', 'Suku Asmat adalah sebuah suku di Papua. Suku Asmat dikenal dengan hasil ukiran kayunya yang unik. Populasi suku Asmat terbagi dua yaitu mereka yang tinggal di pesisir pantai dan mereka yang tinggal di bagian pedalaman. Kedua populasi ini saling berbeda satu sama lain dalam hal dialek, cara hidup, struktur sosial dan ritual. Populasi pesisir pantai selanjutnya terbagi ke dalam dua bagian yaitu suku Bisman yang berada di antara sungai Sinesty dan sungai Nin serta suku Simai.', 'e204d89add45c3b7cc5de6cf4dc7e377.jpg'),
(10, 25, 'Minahasa', '', '', 'Minahasa (dahulu disebut Tanah Malesung) adalah kawasan semenanjung yang berada di provinsi Sulawesi Utara, Indonesia. Kawasan ini terletak di bagian timur laut pulau Sulawesi. Minahasa juga terkenal akan tanahnya yang subur yang menjadi rumah tinggal untuk berbagai variasi tanaman dan binatang, darat maupun laut. Terdapat berbagai tumbuhan seperti kelapa dan kebun-kebun cengkeh, dan juga berbagai variasi buah-buahan dan sayuran. Fauna Sulawesi Utara mencakup antara lain binatang langka seperti burung Maleo, Kuskus, Babirusa, Anoa dan Tangkasi (Tarsius Spectrum).', 'e204d89add45c3b7cc5de6cf4dc7e377.jpg'),
(11, 16, 'Suku Melayu', '', '', '', 'e204d89add45c3b7cc5de6cf4dc7e377.jpg'),
(12, 28, 'Suku Buton', '', '', '', 'e204d89add45c3b7cc5de6cf4dc7e377.jpg'),
(13, 27, 'Suku Bugis', '', '', '', 'e204d89add45c3b7cc5de6cf4dc7e377.jpg'),
(14, 26, 'Suku Donggala', '', '', '', 'e204d89add45c3b7cc5de6cf4dc7e377.jpg'),
(15, 7, 'Suku Krui', '', '', '', 'e204d89add45c3b7cc5de6cf4dc7e377.jpg'),
(16, 32, 'Jawa', '', '', '', 'e204d89add45c3b7cc5de6cf4dc7e377.jpg'),
(17, 34, 'Suku kamoro', '', '', '', 'e204d89add45c3b7cc5de6cf4dc7e377.jpg'),
(18, 4, 'Suku rokan hilir', '', '', '', 'e204d89add45c3b7cc5de6cf4dc7e377.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jam_buka`
--

CREATE TABLE `jam_buka` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `hari` int(1) DEFAULT NULL,
  `jam_buka` time DEFAULT NULL,
  `jam_tutup` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jam_buka`
--

INSERT INTO `jam_buka` (`id`, `store_id`, `hari`, `jam_buka`, `jam_tutup`) VALUES
(10, 11, 2, '09:30:00', '23:00:00'),
(11, 11, 3, '10:00:00', '22:00:00'),
(14, 24, 2, '12:45:00', '12:45:00'),
(15, 24, 3, '12:45:00', '12:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `kuliner`
--

CREATE TABLE `kuliner` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `etnis_id` int(11) NOT NULL,
  `jenis_kuliner` varchar(1) DEFAULT NULL,
  `st_halal` int(1) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `aktif` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuliner`
--

INSERT INTO `kuliner` (`id`, `user_id`, `nama`, `etnis_id`, `jenis_kuliner`, `st_halal`, `detail`, `aktif`) VALUES
(1, 1, 'Tempoyak', 4, '1', 1, 'Masakan yang berasal dari buah durian yang difermentasi. Tempoyak, Bawang merah, Cabe merah, Gula pasir, Garam, Tomat merah, Minyak goreng, Teri basah (optional). Palembang, Sumatera, Kalimantan.', 1),
(2, 1, 'Kasuami', 12, '1', 1, 'Panganan ini dibuat dari kaopi (ubi kayu/ketela pohon/ ubi kayu) dikukus dan dibuat seperti tumpeng mini. Kaopi/Singkong. Sulawesi Tenggara (Buton, Muna, Wakatobi).', 1),
(3, 1, 'Burasa', 13, '1', 1, 'Panganan ini biasa dikenal juga dengan lapat atau lontong bersantan. Kenapa burasa karena dimaknai dengan beras ada rasa. Beras, daun salam, santan kelapa, garam, daun pisang, dan tali untuk pengikat. Sulawesi Selatan.', 1),
(4, 1, 'Sop Kaledo', 14, '1', 1, 'Sop kaki lembu donggala. Menjadi sajian kehormatan pada kala itu hingga saat ini. Daging lembu donggala dan tulang kaki, cabai, asam jawa, serai, jahe, garam, jeruk nipis, dan penyedap rasa. Palu, Sulawesi Tengah.', 1),
(5, 1, 'Pepes Pendap', 15, '1', 1, 'Salah satu makanan favorit Ir. Soekarno ketika beliau berkunjung ke bengkulu. Ikan pendap, cabai, bawang, lengkuas, kunyit, asam, kemiri, ketumbar, bumbu rempah, dan parutan kelapa. Bengkulu', 1),
(6, 1, 'Nasi Grombyang', 16, '1', 1, 'Nasi campur dengan irisan daging kerbau dan kuah lebih banyak sehingga kelihatan bergoyang-goyang (dalam bahasa jawa grombyang-grombyang). Daging sanding lamur, iga sapi, serai, daun salam, garam, gula merah, daun bawang, dan bumbu rempah. Jawa Tengah.', 1),
(7, 1, 'Sate Ulat Sagu', 17, '3', 1, 'Termasuk jenis makanan ekstrim, jika kita belum pernah mencicipinya. Makanan ini memberikan energid an kolesterol yang rendah. Ulat sagu ini berasal dari pohon agu yang dibiarkan membusuk, lalu ulat sagu pun muncul. Ulat sagu, tusukan sate, sambal kecap, sambal kacang, dan acar. Papua', 1),
(8, 1, 'Sate Matang', 1, '3', 1, 'Sate Matang ini tidak hanya disajikan dengan bumbu kacang saja, namun juga selalu disajikan bersama dengan nasi dan kuah soto. Dalam kuah soto tersebut biasanya juga berisi potongan kentang dan daging sehingga terasa lebih gurih. Ketumbar, bawang merah, bawang putih, batang serai, jahe, lengkuas, kunyit, kemiri, garam, gula merah, dan minyak goreng. Aceh.', 1),
(9, 1, 'Natinombur', 2, '1', 2, 'Ikan bakar yang disajikan dengan kuah kental penuh bumbu. ikan mas, perasan jeruk, garam, bumbu rempah. Tapanuli.', 1),
(10, 1, 'Dendeng Batokok', 3, '1', 1, 'Dibuat dari irisan tipis dan lebar daging sapi yang dikeringkan lalu digoreng kering. bumbu baladonya bukan memakai cabai merah, namun memakai cabai hijau yang diiris kasar dan daging sapi setelah diiris tipis melebar lalu dipukul-pukul dengan batu cobek supaya dagingnya menjadi lembut. Daging sapi, asam jawa, daun kunyit, daun jeruk, daun salam, kunyit, lengkuas, bawang putih, garam, gula merah, bumbu rempah. Padang, Sumatera Barat. Padang, Sumatera Barat.', 1),
(11, 1, 'Pempek', 4, '1', 1, 'Cita rasanya yang khas, dengan tekstur yang kenyal dan rasanya yang gurih dan saus cuko yang khas menambah cita rasa yang lezat. ikan tenggiri, tepung sagu, telur, garam, air, gula merah, asam jawa, cuka putih, timun, mie kuning. Sumatera selatan.', 1),
(12, 1, 'Kerak Telor', 6, '1', 1, 'dimasak dengan tanpa minyak goreng, dimasak dengan wajan normal yang dibalik 180 derajat, dengan dibakar menggunakan bara. beras ketan putih, telur ayam, ebi, bawang goreng, bumbu halus (kelapa sangrai, cabai merah, kencur, jahe, merica, garam, gula pasir). Jakarta', 1),
(13, 1, 'Jojorong', 7, '1', 1, 'Kue jojorong banyak yang ilang seperti kue purti malu. Bentuk kuenya yang unik dengan teksturnya yang lembut dan berisi lelehan gula merah. tepung kanji, tepung beras, gula merah, air daun suji, pandan, santan encer, dan garam. Banten.', 1),
(14, 1, 'Karedok', 8, '1', 1, 'Sayuran segar yang diiris, dipotong dan dicincang kasar dan dicampurkan dengan saus kacang gurih serta pelengkap sajian karedok. Pembuatannya sangat praktis dan mudah sehingga memungkinkan bagi anda vegetarian untuk menghadirkan karedok ini kapan saja. sayuran (kol, tauge, wortel, timun, daun kemangi, kacang panjang), bumbu kacang. Jawa barat.', 2),
(15, 1, 'Ikan Selais Asap', 18, '1', 1, 'Daging ikan selais asap rasanya renyah dan khas. disajikan dengan sambal merah yang pedas. ikan selais, minyak goreng dan bumbu balado. Akit, riau', 1);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `category` varchar(45) DEFAULT NULL,
  `event` varchar(45) DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `created_at` int(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `category`, `event`, `updated_by`, `created_at`) VALUES
(1, 'Store', '[Update] Gubuk Makan Mang Engking', 'Admin', 1537362428);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m140209_132017_init', 1532193397),
('m140403_174025_create_account_table', 1532193399),
('m140504_113157_update_tables', 1532193404),
('m140504_130429_create_token_table', 1532193406),
('m140830_171933_fix_ip_field', 1532193407),
('m140830_172703_change_account_table_name', 1532193407),
('m141222_110026_update_ip_field', 1532193408),
('m141222_135246_alter_username_length', 1532193409),
('m150614_103145_update_social_account_table', 1532193412),
('m150623_212711_fix_username_notnull', 1532193412),
('m151218_234654_add_timezone_to_profile', 1532193413),
('m160929_103127_add_last_login_at_to_user_table', 1532193413);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`) VALUES
(1, 'Rizky Arinugraha', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `kode` varchar(45) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id`, `nama`, `kode`, `foto`) VALUES
(1, 'ACEH', '11', '219bc28001df28cbe483ae735f0f1e31.jpg'),
(2, 'SUMATERA UTARA', '12', ''),
(3, 'SUMATERA BARAT', '13', ''),
(4, 'RIAU', '14', ''),
(5, 'JAMBI', '15', ''),
(6, 'SUMATERA SELATAN', '16', ''),
(7, 'BENGKULU', '17', ''),
(8, 'LAMPUNG', '18', ''),
(9, 'KEPULAUAN BANGKA BELITUNG', '19', ''),
(10, 'KEPULAUAN RIAU', '21', ''),
(11, 'DKI JAKARTA', '31', ''),
(12, 'JAWA BARAT', '32', ''),
(13, 'JAWA TENGAH', '33', ''),
(14, 'DI YOGYAKARTA', '34', ''),
(15, 'JAWA TIMUR', '35', ''),
(16, 'BANTEN', '36', ''),
(17, 'BALI', '51', ''),
(18, 'NUSA TENGGARA BARAT', '52', ''),
(19, 'NUSA TENGGARA TIMUR', '53', ''),
(20, 'KALIMANTAN BARAT', '61', ''),
(21, 'KALIMANTAN TENGAH', '62', ''),
(22, 'KALIMANTAN SELATAN', '63', ''),
(23, 'KALIMANTAN TIMUR', '64', ''),
(24, 'KALIMANTAN UTARA', '65', ''),
(25, 'SULAWESI UTARA', '71', ''),
(26, 'SULAWESI TENGAH', '72', ''),
(27, 'SULAWESI SELATAN', '73', ''),
(28, 'SULAWESI TENGGARA', '74', ''),
(29, 'GORONTALO', '75', ''),
(30, 'SULAWESI BARAT', '76', ''),
(31, 'MALUKU', '81', ''),
(32, 'MALUKU UTARA', '82', ''),
(33, 'PAPUA BARAT', '91', ''),
(34, 'PAPUA', '94', '');

-- --------------------------------------------------------

--
-- Table structure for table `rating_kuliner`
--

CREATE TABLE `rating_kuliner` (
  `id` int(11) NOT NULL,
  `rating` float DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `kuliner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `social_account`
--

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `telepon` varchar(45) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `harga_min` int(11) DEFAULT NULL,
  `harga_max` int(11) DEFAULT NULL,
  `lokasi` text DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `aktif` int(1) DEFAULT 2,
  `update_by` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `user_id`, `nama`, `telepon`, `alamat`, `harga_min`, `harga_max`, `lokasi`, `foto`, `aktif`, `update_by`) VALUES
(1, 1, 'Harum Manis', '+6221 57941727', 'Apartemen Pavilion, Pavilion Apartment, Jalan K.H. Mas Mansyur Kav. 24, Jakarta Pusat', 25000, NULL, NULL, '', 2, NULL),
(2, 1, 'Dapur Solo', '+6221 7222311', 'Jalan Panglima Polim Raya No.1, Kebayoran Baru, Jakarta Selatan', 25000, NULL, NULL, '', 2, NULL),
(3, 1, 'Marco Padang Grill', '+6221 5203221', 'Setiabudi One, Setiabudi One, 1st Floor, Unit B 212 - 216, Jalan H.R. Rasuna Said, Kav. 62, Kuningan, Jakarta Selatan', 25000, NULL, NULL, '', 2, NULL),
(4, 1, 'Pondok Wong Palembang', '+6221 3865758', 'Jalan Veteran I No.12, Gambir, Jakarta Pusat', 25000, NULL, NULL, '', 2, NULL),
(5, 1, 'Bebek Bengil', '+6221 3918016', 'The Ubud Building, Jalan H. Agus Salim No. 132, Jakarta Pusat', 30000, NULL, NULL, '', 2, NULL),
(6, 1, 'Mbah Jingkrak', '+6221 5252605', 'Jalan Setiabudi Tengah No. 11, Setiabudi, Jakarta Selatan', 30000, NULL, NULL, '', 2, NULL),
(7, 1, 'Dapur Sunda', '+6221 5227558', 'Setiabudi One Building Lt. 1 No. A 202-B 203, Jalan H.R Rasuna Said Kav. 62, Jakarta Selatan', 30000, NULL, NULL, '', 2, NULL),
(8, 1, 'Puang Oca', '+6221 57853680', 'Komplek Lapangan Tembak, Jalan Gelora, Jakarta Pusat', 30000, NULL, NULL, '', 2, NULL),
(9, 1, 'Lara Djonggrang', '+6221 3153252', 'Jalan Teuku Cik Ditiro No.4, RT.3/RW.2, Gondangdia, Menteng, Jakarta Pusat', 30000, NULL, '-6.354075945731032,106.84439655035408', '', 2, NULL),
(11, 1, 'Gubuk Makan Mang Engking', '021-777825025', 'Jl. Lingkar Utara', 100000, 200000, '-6.348701801844414,106.83139320104988', 'b2bca63ccdb2288390be7667c6310819.png', 1, NULL),
(24, 1, 'BBB', '', '', NULL, NULL, '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `store_kuliner`
--

CREATE TABLE `store_kuliner` (
  `id` int(11) NOT NULL,
  `kuliner_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `store_kuliner`
--

INSERT INTO `store_kuliner` (`id`, `kuliner_id`, `store_id`) VALUES
(1, 4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`user_id`, `code`, `created_at`, `type`) VALUES
(1, 'oV5LtOAjz3r19lzh4DZdFHG0zuFmnL5X', 1532193500, 0),
(10, 'm9GIcbB-NdI6GjwxWU--3NnSeoCO7TaD', 1533541598, 0),
(11, 'yOzGRUlEg9G3WObD1PnhEarFo19godpa', 1533541850, 0),
(12, 'bRp6r9V6LhR4AjlEWQpa63roTyrFSySp', 1533541889, 0),
(13, '3w3i39C3NG3WNTQ-Fv8UYG-wPsajK5-M', 1533541928, 0),
(14, 'GBZ2Xv-cE9eSMc1XCKZNYkijsOQkLwgc', 1533541965, 0),
(15, 'oQ3Q_1SGDnidvHGne5uo3P4WiePa46Xc', 1537509345, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT 0,
  `last_login_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`) VALUES
(1, 'admin', 'vpsnode212@gmail.com', '$2y$12$kgR/xHS3KMPgbxTtUe3od.6Rjt//bUc9dKR9oYgquBUdz3d3M9mau', 'Ef3CtElCNZpQtubx9Uednn1C_bkikfzj', NULL, NULL, NULL, '::1', 1532193500, 1532193500, 0, 1537530760),
(10, 'riyan', 'whyriaan@mail.com', '$2y$12$gtPbatK3lRkWD3BcJH0p4u4nLE06L3khbgewCSUwXLLSSm0TAUfI.', '-l_7i8PbpG8P1QizQhalPu-0680VOss4', NULL, NULL, NULL, '::1', 1533541597, 1533541597, 0, NULL),
(11, 'wahyu', 'whyyu@mail.com', '$2y$12$bVGdnkfjbaXExJdhCp.jzOr8f.A5l6PYPdo3gE9NfKOSrcfvuLL3a', '7yDzfi-2QfHUseIgRNVkfK15ykEFsCqA', NULL, NULL, NULL, '::1', 1533541850, 1533541850, 0, NULL),
(12, 'wahyus', 'whyyusa@mail.com', '$2y$12$Mkly7VoH7xJEuAwm/XKvYuu73vcyyJjw.E6W2zDkLVFtX.38gfxom', 'GEOqFLqUFexY3QKL5EDx2UGaJjVUERot', NULL, NULL, NULL, '::1', 1533541889, 1533541889, 0, NULL),
(13, 'adaw', 'wada@mail.com', '$2y$12$lTz63k5T5.Xe7cjxKWF2n.s7jp3Voek.h1svGqewUeGwQ5LMa0QJe', 'GFyzkJLWMm2Lae7XjCKNeYZaJqME81gG', NULL, NULL, NULL, '::1', 1533541927, 1533541927, 0, NULL),
(14, 'adawdad', 'dadad@mail.com', '$2y$12$I9qsIzrD4keVnBtg7Q8GMOo2c42p7aFaKWNcmhGOy2kEL/BI1KFUS', 'v6gqH-oaf_XZvstqe1XpF141EYK41v4B', NULL, NULL, NULL, '::1', 1533541965, 1533541965, 0, NULL),
(15, 'ari', 'nyanyantaro@gmail.com', '$2y$12$.7YAkn2LESSxuJWqz/wsnuIeuR6zDuF7Rk6RWIXx6iCWnUzo0zhie', 'LsIRiJpob2u3Jv_Dkw9QwJyMfWi1bB20', NULL, NULL, NULL, '::1', 1537509345, 1537509345, 0, 1537712944);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_fcamp`
-- (See below for the actual view)
--
CREATE TABLE `vw_fcamp` (
`kulinerid` int(11)
,`kuliner` varchar(45)
,`provinsiid` int(11)
,`provinsi` varchar(45)
,`etnisid` int(11)
,`etnis` varchar(45)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_fcamp`
--
DROP TABLE IF EXISTS `vw_fcamp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_fcamp`  AS  select `c`.`id` AS `kulinerid`,`c`.`nama` AS `kuliner`,`a`.`id` AS `provinsiid`,`a`.`nama` AS `provinsi`,`b`.`id` AS `etnisid`,`b`.`nama` AS `etnis` from ((`provinsi` `a` join `etnis` `b` on(`a`.`id` = `b`.`provinsi_id`)) join `kuliner` `c` on(`c`.`etnis_id` = `b`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_kuliner`
--
ALTER TABLE `detail_kuliner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_makanan_makanan1_idx` (`kuliner_id`);

--
-- Indexes for table `etnis`
--
ALTER TABLE `etnis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_etnis_provinsi1_idx` (`provinsi_id`);

--
-- Indexes for table `jam_buka`
--
ALTER TABLE `jam_buka`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jam_buka_store1` (`store_id`);

--
-- Indexes for table `kuliner`
--
ALTER TABLE `kuliner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_makanan_etnis_idx` (`etnis_id`),
  ADD KEY `fk_kuliner_user1_idx` (`user_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating_kuliner`
--
ALTER TABLE `rating_kuliner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rating_kuliner_user1_idx` (`user_id`),
  ADD KEY `fk_rating_kuliner_kuliner1_idx` (`kuliner_id`);

--
-- Indexes for table `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_store_user1_idx` (`user_id`);

--
-- Indexes for table `store_kuliner`
--
ALTER TABLE `store_kuliner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sk_kuliner` (`kuliner_id`),
  ADD KEY `fk_sk_store` (`store_id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_kuliner`
--
ALTER TABLE `detail_kuliner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `etnis`
--
ALTER TABLE `etnis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jam_buka`
--
ALTER TABLE `jam_buka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kuliner`
--
ALTER TABLE `kuliner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `rating_kuliner`
--
ALTER TABLE `rating_kuliner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `store_kuliner`
--
ALTER TABLE `store_kuliner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_kuliner`
--
ALTER TABLE `detail_kuliner`
  ADD CONSTRAINT `fk_detail_kuliner_kuliner` FOREIGN KEY (`kuliner_id`) REFERENCES `kuliner` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `etnis`
--
ALTER TABLE `etnis`
  ADD CONSTRAINT `fk_etnis_provinsi1` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `jam_buka`
--
ALTER TABLE `jam_buka`
  ADD CONSTRAINT `fk_jam_buka_store1` FOREIGN KEY (`store_id`) REFERENCES `store` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `kuliner`
--
ALTER TABLE `kuliner`
  ADD CONSTRAINT `fk_kuliner_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_makanan_daerah` FOREIGN KEY (`etnis_id`) REFERENCES `etnis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rating_kuliner`
--
ALTER TABLE `rating_kuliner`
  ADD CONSTRAINT `fk_rating_kuliner_kuliner1` FOREIGN KEY (`kuliner_id`) REFERENCES `kuliner` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rating_kuliner_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `store_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `store_kuliner`
--
ALTER TABLE `store_kuliner`
  ADD CONSTRAINT `store_kuliner_ibfk_1` FOREIGN KEY (`kuliner_id`) REFERENCES `kuliner` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `store_kuliner_ibfk_2` FOREIGN KEY (`store_id`) REFERENCES `store` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
