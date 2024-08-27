-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2022 at 03:49 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `horizoncollaborative`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Site Administrator'),
(2, 'user', 'Regular User');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 4),
(2, 2),
(2, 3),
(2, 10101),
(2, 10102),
(2, 10103),
(2, 10104),
(2, 10105);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'admin@gmail.com', 4, '2022-12-14 09:15:20', 1),
(2, '::1', 'admin@gmail.com', 4, '2022-12-14 18:56:49', 1),
(3, '::1', 'admin@gmail.com', 4, '2022-12-14 19:05:32', 1),
(4, '::1', 'user1@example.com', 10101, '2022-12-14 19:06:52', 1),
(5, '::1', 'yanuarmufid@gmail.com', 3, '2022-12-14 19:07:55', 1),
(6, '::1', 'user1@example.com', 10101, '2022-12-14 21:27:57', 1),
(7, '::1', 'admin@gmail.com', 4, '2022-12-14 21:36:39', 1),
(8, '::1', 'yanuarmufid@gmail.com', 3, '2022-12-14 21:41:41', 1),
(9, '::1', 'retnoekayanti15@gmail.com', 2, '2022-12-14 21:42:18', 1),
(10, '::1', 'retnoekayanti15@gmail.com', 2, '2022-12-14 21:43:27', 1),
(11, '::1', 'admin@gmail.com', 4, '2022-12-14 22:01:24', 1),
(12, '::1', 'user1@example.com', 10101, '2022-12-14 22:10:27', 1),
(13, '::1', 'yanuarmufid@gmail.com', 3, '2022-12-15 03:57:20', 1),
(14, '::1', 'admin@gmail.com', 4, '2022-12-15 06:30:27', 1),
(15, '::1', 'yanuarmufid@gmail.com', 3, '2022-12-15 10:54:33', 1),
(16, '::1', 'admin@gmail.com', 4, '2022-12-16 06:52:33', 1),
(17, '::1', 'user1@example.com', 10101, '2022-12-16 08:50:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `deskripsi_kategori` varchar(255) NOT NULL,
  `induk_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `deskripsi_kategori`, `induk_kategori`) VALUES
(1, 'Tour Harian', 'Merupakan paket tour singkat selama 1 hari', 'tour'),
(2, 'Paket Tour ', 'Merupakan paket tour selama lebih dari 1 hari', 'tour'),
(3, 'Trekking Harian', 'Merupakan paket trekking singkat selama 1 hari', 'trekking'),
(4, 'Paket Trekking ', 'Merupakan paket trekking selama lebih dari 1 hari', 'trekking');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `tanggal_tour` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1671029563, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prediksi`
--

CREATE TABLE `prediksi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `nilai_prediksi` float NOT NULL DEFAULT 0,
  `nilai_mae` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prediksi`
--

INSERT INTO `prediksi` (`id`, `id_user`, `id_produk`, `nilai_prediksi`, `nilai_mae`) VALUES
(0, 10101, 20101, 1.69408, 1.69408),
(0, 10101, 20105, 2.51412, 1.48588),
(0, 10101, 20104, 0.671273, 0.671273),
(0, 10101, 20103, 2.67395, 0.326046),
(0, 10101, 20102, 0.189699, 0.189699),
(0, 10102, 20103, 3.65168, 1.34832),
(0, 10102, 20101, 1.78492, 1.21508),
(0, 10102, 20104, 1.19293, 1.19293),
(0, 10102, 20105, 1.08281, 1.08281),
(0, 10102, 20102, -0.431321, 0.431321),
(0, 10103, 20104, -0.827365, 0.827365),
(0, 10103, 20103, 0.545957, 0.545957),
(0, 10103, 20102, 2.58646, 0.413537),
(0, 10103, 20105, 4.11849, 0.118494),
(0, 10103, 20101, 4.08351, 0.0835133),
(0, 10104, 20102, -0.938168, 0.938168),
(0, 10104, 20105, 0.436425, 0.436425),
(0, 10104, 20101, 0.409546, 0.409546),
(0, 10104, 20104, 2.73151, 0.268491),
(0, 10104, 20103, 4.26483, 0.264827),
(0, 10105, 20102, 1.59333, 1.59333),
(0, 10105, 20101, 4.02795, 0.972055),
(0, 10105, 20103, 0.863581, 0.863581),
(0, 10105, 20104, -0.76835, 0.76835),
(0, 10105, 20105, 3.84815, 0.151854);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `sampul` varchar(255) NOT NULL,
  `nilai_mae` float NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `deskripsi_produk`, `harga`, `sampul`, `nilai_mae`, `created_at`, `updated_at`) VALUES
(20101, 2, '2 Hari 1 Malam [Camping Desa Sembalun]', '<p>Kami menyediakan tour dengan waktu 2 hari 1 malam di daratan tinggi sembalun. Tour ini disajikan untuk anda yang ingin merasakan sensasi camping tapi males mendaki, paket trip ini menjadi solusi yang tepat.</p>\n\n<hr />\n<p><strong>Rencana Perjalanan&nbsp;</strong></p>\n\n<p>Day 1 :</p>\n\n<ul>\n	<li>Penjemputan di meeting point</li>\n	<li>Menuju Desa Sembalun</li>\n	<li>Mendirikan tenda</li>\n	<li>Menikmati suasana malam di camping ground</li>\n	<li>Makan malam</li>\n	<li>Istirahat</li>\n</ul>\n\n<p>Day 2 :</p>\n\n<ul>\n	<li>Bangun lebih pagi</li>\n	<li>Menikmati susana pagi Sembalun</li>\n	<li>Menuju Punck Sembalun</li>\n	<li>Petik strawberry</li>\n	<li>Sarapan di Kedai Sawah</li>\n	<li>Menuju Bukit Selong</li>\n	<li>Pengantaran ke meeting point</li>\n	<li>Sayonara see you next trip</li>\n</ul>\n\n<hr />\n<p>Paket ini memiliki include dan exclude tersendiri.</p>\n\n<p>Include :</p>\n\n<ul>\n	<li>Mobil + Driver</li>\n	<li>Tour Guide</li>\n	<li>Perlengkapan camping</li>\n	<li>Perlengkapan masak</li>\n	<li>Tiket petik strawberry</li>\n	<li>Kopi</li>\n	<li>Tiket masuk wisata</li>\n	<li>Parkir</li>\n</ul>\n\n<p>Exclude :</p>\n\n<ul>\n	<li>Makanan ringan</li>\n	<li>Tipping untuk tour guide</li>\n	<li>Kebutuhan pribadi</li>\n</ul>\n\n<hr />\n<p>Silahkan pesan paket tour mu sekarang dengan cara login terlebih dahulu kemudian isi form order yang ada di samping kanan.&nbsp;</p>\n\n<p>Jika ada pertanyaan, hubungi kami melalui WhatsApp kami yang berada di pojok kanan bawah.</p>\n', '470000', '62886f682fc2a (1).jpg', 0.874855, '0000-00-00 00:00:00', '2022-12-16 08:54:29'),
(20102, 2, 'Produk 2', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto ea reprehenderit quis exercitationem vel omnis aperiam odit maxime, perferendis necessitatibus accusantium quas dolorum delectus minima placeat sunt quisquam alias quo deleniti molestiae. Repellat dolores est obcaecati, placeat fugiat cupiditate recusandae odit mollitia perspiciatis possimus sapiente quidem, quae facere cumque nostrum? tets</p>\r\n', '250000', 'b.jpg', 0.71321, '2022-11-15 08:16:53', '2022-12-16 08:54:29'),
(20103, 3, 'Produk 3', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti, quam laborum ratione veniam odit deleniti voluptas harum rem ipsum dolorem vero ad ex doloribus impedit quas nisi beatae ducimus debitis earum iure. Ducimus eligendi, sit aliquid eaque numquam voluptates minima, possimus atque modi id asperiores voluptate omnis necessitatibus quasi corrupti.</p>\r\n\r\n<p><img alt=\"\" src=\"https://images.unsplash.com/photo-1657214059175-53cb22261d38?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=435&amp;q=80\" style=\"height:400px; width:300px\" /></p>\r\n', '375000', 'c.jpg', 0.669746, '2022-11-15 08:38:15', '2022-12-16 08:54:29'),
(20104, 1, 'Produk 4', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos atque assumenda, nobis officiis quaerat aliquid natus fuga! Accusamus ab saepe voluptatum deserunt obcaecati vel, a eius fugiat! Quo laborum nulla veniam sapiente ad non dolores perspiciatis illum impedit, nesciunt minima atque accusamus culpa delectus alias quaerat. Illum deleniti architecto quod quos voluptates incidunt. Possimus eos rerum facere totam eum est odio pariatur obcaecati, impedit, quaerat excepturi qui, ut velit vero. Illum eligendi magnam quia sed architecto consequuntur porro dolore nam aliquam id, dignissimos laudantium adipisci et saepe blanditiis nihil nostrum incidunt facere similique illo sapiente commodi dolores. Cum, vel iste?</p>\r\n', '450000', 'a.jpg', 0.745682, '2022-11-15 09:07:23', '2022-12-16 08:54:29'),
(20105, 2, 'Produk 5', '<p>Kami menyediakan tour dengan waktu 2 hari 1 malam di daratan tinggi sembalun. Tour ini disajikan untuk anda yang ingin merasakan sensasi camping tapi males mendaki, paket trip ini menjadi solusi yang tepat.</p>\n', '860000', 'c.jpg', 0.655093, '2022-11-21 03:53:50', '2022-12-16 08:54:29');

--
-- Triggers `produk`
--
DELIMITER $$
CREATE TRIGGER `tambah rating` AFTER INSERT ON `produk` FOR EACH ROW BEGIN
	INSERT INTO rating VALUES (null, null, NEW.id_produk, 0, null, NEW.created_at, NEW.updated_at);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `id_produk` int(11) NOT NULL,
  `nilai_rating` int(11) DEFAULT NULL,
  `komentar` varchar(255) DEFAULT NULL,
  `created_rating` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_rating` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id_rating`, `id`, `id_produk`, `nilai_rating`, `komentar`, `created_rating`, `updated_rating`) VALUES
(30132, 10102, 20101, 3, 'Memuaskan menurut saya, namun harganya cukup mahal hanya untuk camping', '2022-12-15 12:21:27', '2022-12-16 12:41:55'),
(30133, 10103, 20101, 4, 'tour guidenya ramah dan baik banget. perjalanan juga menyenangkan', '2022-12-15 12:21:27', '2022-12-16 12:40:27'),
(30134, 10105, 20101, 5, 'GA NYESEL TOUR DISINI!! Makasih horizon', '2022-12-15 12:21:27', '2022-12-16 12:41:10'),
(30135, 10103, 20102, 3, NULL, '2022-12-15 12:22:15', '2022-12-15 12:22:15'),
(30136, 10101, 20103, 3, NULL, '2022-12-15 12:23:11', '2022-12-15 12:23:11'),
(30137, 10102, 20103, 5, NULL, '2022-12-15 12:23:11', '2022-12-15 12:23:11'),
(30138, 10104, 20103, 4, NULL, '2022-12-15 12:23:11', '2022-12-15 12:23:11'),
(30139, 10104, 20104, 3, NULL, '2022-12-15 12:23:38', '2022-12-15 12:23:38'),
(30140, 10101, 20105, 4, NULL, '2022-12-15 12:24:28', '2022-12-15 12:24:28'),
(30141, 10103, 20105, 4, NULL, '2022-12-15 12:24:28', '2022-12-15 12:24:28'),
(30142, 10105, 20105, 4, NULL, '2022-12-15 12:24:28', '2022-12-15 12:24:28');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `total_biaya` int(11) NOT NULL,
  `tanggal_tour` date NOT NULL,
  `jenis_transaksi` varchar(255) NOT NULL,
  `status_transaksi` varchar(255) NOT NULL,
  `bukti_transaksi` varchar(255) NOT NULL,
  `status_tour` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `tambah rating trans` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
	INSERT INTO rating VALUES (null, NEW.id, NEW.id_produk, 0, null, NEW.created_at, NEW.updated_at);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `phone_number` varchar(14) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.png',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `birthday`, `phone_number`, `instagram`, `country`, `city`, `user_image`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'retnoekayanti15@gmail.com', 'reykayanti', 'Retno Ekayanti', NULL, '6289650017574', 'reykayanti', 'Indonesia', 'Depok', 'default.png', '$2y$10$73s6v4yRBnVu6Th8872Cg.lQBJ39vT.8YkKWPDe7JogW/LGuwPNBy', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-11 10:05:16', '2022-11-11 10:05:16', NULL),
(3, 'yanuarmufid@gmail.com', 'yanuar', NULL, NULL, NULL, NULL, NULL, NULL, 'default.png', '$2y$10$52pMFoIq6LV5YDLnW7M6xOxl5oFU1fxMWLb.k6CnlVX51Pd.AYDkC', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-11 23:36:23', '2022-11-11 23:36:23', NULL),
(4, 'admin@gmail.com', 'admin', 'Adminila', '2001-03-15', '6289650017574', 'adminila_', 'Indonesia', 'Depok', 'default.png', '$2y$10$ZgbReWD18hilduLXuPN9DexZ3VHWd1fiIS0oaEsie6FR6WkIAVHGG', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-12 01:34:18', '2022-11-12 01:34:18', NULL),
(10101, 'user1@example.com', 'usera', 'User Alfa', '1996-12-01', '6289650017574', 'useralfa12', 'Indonesia', 'Bogor', 'default.png', '$2y$10$73s6v4yRBnVu6Th8872Cg.lQBJ39vT.8YkKWPDe7JogW/LGuwPNBy', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-21 03:55:36', '2022-11-21 03:55:36', NULL),
(10102, 'user2@example.com', 'userb', 'User Bravo', NULL, NULL, NULL, NULL, NULL, 'default.png', '$2y$10$lk/KmFVyROM8ITG87h6NSO7O0RH9rJLo21KD1veDhlSCY.83dK2Sa', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-21 03:56:40', '2022-11-21 03:56:40', NULL),
(10103, 'user3@example.com', 'userc', 'User Charlie', NULL, NULL, NULL, NULL, NULL, 'default.png', '$2y$10$lk/KmFVyROM8ITG87h6NSO7O0RH9rJLo21KD1veDhlSCY.83dK2Sa', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-21 03:56:40', '2022-11-21 03:56:40', NULL),
(10104, 'user4@example.com', 'userd', 'User Delta', NULL, NULL, NULL, NULL, NULL, 'default.png', '$2y$10$lk/KmFVyROM8ITG87h6NSO7O0RH9rJLo21KD1veDhlSCY.83dK2Sa', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-21 03:57:10', '2022-11-21 03:57:10', NULL),
(10105, 'user5@example.com', 'usere', 'User Echo', NULL, NULL, NULL, NULL, NULL, 'default.png', '$2y$10$lk/KmFVyROM8ITG87h6NSO7O0RH9rJLo21KD1veDhlSCY.83dK2Sa', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-21 03:57:10', '2022-11-21 03:57:10', NULL),
(10106, 'user6@example.com', 'user6', NULL, NULL, NULL, NULL, NULL, NULL, 'default.png', '$2y$10$lk/KmFVyROM8ITG87h6NSO7O0RH9rJLo21KD1veDhlSCY.83dK2Sa', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-21 03:57:10', '2022-11-21 03:57:10', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20114;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30146;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8500400;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10107;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
