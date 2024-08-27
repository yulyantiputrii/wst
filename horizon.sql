-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Des 2022 pada 05.24
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `horizon`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
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
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Site Administrator'),
(2, 'user', 'Regular User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 4),
(2, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
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
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'admin', NULL, '2022-11-11 10:06:40', 0),
(2, '::1', 'admin', NULL, '2022-11-11 10:07:15', 0),
(3, '::1', 'retnoekayanti15@gmail.com', 2, '2022-11-11 23:11:20', 1),
(4, '::1', 'yanuarmufid@gmail.com', 3, '2022-11-11 23:49:57', 1),
(5, '::1', 'yanuarmufid@gmail.com', 3, '2022-11-12 00:21:22', 1),
(6, '::1', 'yanuarmufid@gmail.com', 3, '2022-11-12 01:13:06', 1),
(7, '::1', 'retnoekayanti15@gmail.com', 2, '2022-11-12 01:24:04', 1),
(8, '::1', 'admin@gmail.com', 4, '2022-11-12 01:34:27', 1),
(9, '::1', 'retnoekayanti15@gmail.com', 2, '2022-11-12 01:39:37', 1),
(10, '::1', 'admin@gmail.com', 4, '2022-11-12 01:55:47', 1),
(11, '::1', 'retnoekayanti15@gmail.com', 2, '2022-11-12 06:45:06', 1),
(12, '::1', 'retnoekayanti15@gmail.com', 2, '2022-11-12 06:52:34', 1),
(13, '::1', 'admin@gmail.com', 4, '2022-11-12 07:08:22', 1),
(14, '::1', 'admin@gmail.com', 4, '2022-11-12 09:52:25', 1),
(15, '::1', 'admin@gmail.com', 4, '2022-11-12 20:23:13', 1),
(16, '::1', 'admin@gmail.com', 4, '2022-11-13 06:37:53', 1),
(17, '::1', 'admin@gmail.com', 4, '2022-11-13 19:32:39', 1),
(18, '::1', 'admin@gmail.com', 4, '2022-11-15 07:21:42', 1),
(19, '::1', 'admin@gmail.com', 4, '2022-11-15 20:20:30', 1),
(20, '::1', 'admin@gmail.com', 4, '2022-11-15 21:26:57', 1),
(21, '::1', 'admin@gmail.com', 4, '2022-11-17 05:56:51', 1),
(22, '::1', 'admin@gmail.com', 4, '2022-11-17 21:35:57', 1),
(23, '::1', 'admin@gmail.com', 4, '2022-11-26 22:45:11', 1),
(24, '::1', 'admin@gmail.com', 4, '2022-11-27 00:05:25', 1),
(25, '::1', 'admin@gmail.com', 4, '2022-12-01 23:50:18', 1),
(26, '::1', 'admin', NULL, '2022-12-02 06:11:31', 0),
(27, '::1', 'admin@gmail.com', 4, '2022-12-02 06:11:37', 1),
(28, '::1', 'admin@gmail.com', 4, '2022-12-02 10:01:02', 1),
(29, '::1', 'admin@gmail.com', 4, '2022-12-03 00:18:25', 1),
(30, '::1', 'retnoekayanti15@gmail.com', 2, '2022-12-03 00:19:45', 1),
(31, '::1', 'retnoekayanti15@gmail.com', 2, '2022-12-03 01:10:26', 1),
(32, '::1', 'admin@gmail.com', 4, '2022-12-03 01:12:43', 1),
(33, '::1', 'admin@gmail.com', 4, '2022-12-03 18:58:02', 1),
(34, '::1', 'admin@gmail.com', 4, '2022-12-03 19:00:06', 1),
(35, '::1', 'admin@gmail.com', 4, '2022-12-04 02:24:36', 1),
(36, '::1', 'admin@gmail.com', 4, '2022-12-04 05:37:18', 1),
(37, '::1', 'admin@gmail.com', 4, '2022-12-05 04:50:15', 1),
(38, '::1', 'admin@gmail.com', 4, '2022-12-05 18:47:35', 1),
(39, '::1', 'admin@gmail.com', 4, '2022-12-05 18:48:06', 1),
(40, '::1', 'admin@gmail.com', 4, '2022-12-05 20:48:24', 1),
(41, '::1', 'admin@gmail.com', 4, '2022-12-05 21:05:24', 1),
(42, '::1', 'admin@gmail.com', 4, '2022-12-05 21:46:34', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-user', 'Manage all user'),
(2, 'manage-transaction', 'Manage transaction');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
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
-- Struktur dari tabel `auth_tokens`
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
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(12) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `induk_kategori` varchar(255) NOT NULL,
  `deskripsi_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `induk_kategori`, `deskripsi_kategori`) VALUES
(8, 'Trekkingg', 'water', 'Trekking'),
(9, 'Snorkeling', 'water', 'Snorkeling'),
(10, 'Sembalun', 'hill', 'Sembalun');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tanggal_tour` date NOT NULL,
  `item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id`, `id_produk`, `tanggal_tour`, `item`) VALUES
(1, 4, 7, '2022-12-16', 2),
(2, 4, 11, '2022-12-29', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
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
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1668164329, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `sampul` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `deskripsi_produk`, `harga`, `sampul`, `created_at`, `updated_at`) VALUES
(6, 9, 'nama produk 1', '<p>EDIT Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos atque assumenda, nobis officiis quaerat aliquid natus fuga! Accusamus ab saepe voluptatum deserunt obcaecati vel, a eius fugiat! Quo laborum nulla veniam sapiente ad non dolores perspiciatis illum impedit, nesciunt minima atque accusamus culpa delectus alias quaerat. Illum deleniti architecto quod quos voluptates incidunt. Possimus eos rerum facere totam eum est odio pariatur obcaecati, impedit, quaerat excepturi qui, ut velit vero. Illum eligendi magnam quia sed architecto consequuntur porro dolore nam aliquam id, dignissimos laudantium adipisci et saepe blanditiis nihil nostrum incidunt facere similique illo sapiente commodi dolores. Cum, vel iste?</p>\r\n', '78', 'bimbingan 3.PNG', '0000-00-00 00:00:00', '2022-11-15 23:11:02'),
(7, 10, 'nama produk 2', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto ea reprehenderit quis exercitationem vel omnis aperiam odit maxime, perferendis necessitatibus accusantium quas dolorum delectus minima placeat sunt quisquam alias quo deleniti molestiae. Repellat dolores est obcaecati, placeat fugiat cupiditate recusandae odit mollitia perspiciatis possimus sapiente quidem, quae facere cumque nostrum?</p>\r\n', '30', 'b.jpg', '2022-11-15 08:16:53', '2022-11-15 09:14:38'),
(11, 8, 'nama produk 3', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti, quam laborum ratione veniam odit deleniti voluptas harum rem ipsum dolorem vero ad ex doloribus impedit quas nisi beatae ducimus debitis earum iure. Ducimus eligendi, sit aliquid eaque numquam voluptates minima, possimus atque modi id asperiores voluptate omnis necessitatibus quasi corrupti.</p>\r\n\r\n<p><img alt=\"\" src=\"https://images.unsplash.com/photo-1657214059175-53cb22261d38?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=435&amp;q=80\" style=\"height:400px; width:300px\" /></p>\r\n', '32', 'c.jpg', '2022-11-15 08:38:15', '2022-11-15 08:38:15'),
(12, 9, 'nama produk 4', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos atque assumenda, nobis officiis quaerat aliquid natus fuga! Accusamus ab saepe voluptatum deserunt obcaecati vel, a eius fugiat! Quo laborum nulla veniam sapiente ad non dolores perspiciatis illum impedit, nesciunt minima atque accusamus culpa delectus alias quaerat. Illum deleniti architecto quod quos voluptates incidunt. Possimus eos rerum facere totam eum est odio pariatur obcaecati, impedit, quaerat excepturi qui, ut velit vero. Illum eligendi magnam quia sed architecto consequuntur porro dolore nam aliquam id, dignissimos laudantium adipisci et saepe blanditiis nihil nostrum incidunt facere similique illo sapiente commodi dolores. Cum, vel iste?</p>\r\n', '100', 'a.jpg', '2022-11-15 09:07:23', '2022-11-15 09:07:23'),
(24, 10, 'nama produk 5', 'gaada', '70', '', '2022-11-21 03:53:50', '2022-11-21 03:53:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nilai_rating` int(11) NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `created_rating` datetime NOT NULL,
  `updated_rating` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rating`
--

INSERT INTO `rating` (`id_rating`, `id`, `id_produk`, `nilai_rating`, `komentar`, `created_rating`, `updated_rating`) VALUES
(11, 9, 6, 1, '', '2022-11-21 03:58:09', '2022-11-21 03:58:09'),
(12, 11, 6, 3, '', '2022-11-21 03:58:09', '2022-11-21 03:58:09'),
(13, 5, 7, 5, '', '2022-11-21 04:05:54', '2022-11-21 04:05:54'),
(14, 9, 7, 3, '', '2022-11-21 04:05:54', '2022-11-21 04:05:54'),
(15, 5, 11, 2, '', '2022-11-21 04:05:54', '2022-11-21 04:05:54'),
(16, 8, 11, 2, '', '2022-11-21 04:06:35', '2022-11-21 04:06:35'),
(17, 10, 11, 1, '', '2022-11-21 04:06:35', '2022-11-21 04:06:35'),
(18, 11, 11, 4, '', '2022-11-21 04:06:35', '2022-11-21 04:06:35'),
(19, 5, 12, 3, '', '2022-11-21 04:06:35', '2022-11-21 04:06:35'),
(20, 9, 12, 5, '', '2022-11-21 04:06:35', '2022-11-21 04:06:35'),
(21, 10, 12, 5, '', '2022-11-21 04:06:35', '2022-11-21 04:06:35'),
(22, 11, 12, 3, '', '2022-11-21 04:08:17', '2022-11-21 04:08:17'),
(23, 5, 24, 5, '', '2022-11-21 04:08:17', '2022-11-21 04:08:17'),
(24, 8, 24, 3, '', '2022-11-21 04:08:17', '2022-11-21 04:08:17'),
(25, 9, 24, 4, '', '2022-11-21 04:08:17', '2022-11-21 04:08:17'),
(26, 11, 24, 2, '', '2022-11-21 04:08:17', '2022-11-21 04:08:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `total_biaya` int(11) NOT NULL,
  `tanggal_tour` date NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `payment_method` enum('C','M') NOT NULL,
  `status_transaksi` varchar(255) NOT NULL,
  `va_number` char(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_produk`, `id`, `item`, `total_biaya`, `tanggal_tour`, `payment_type`, `payment_method`, `status_transaksi`, `va_number`, `bank`, `created_at`, `updated_at`) VALUES
(1, 6, 2, 2, 0, '2022-12-31', '', '', 'Unpaid', '', '', '2022-12-02 06:58:03', '2022-12-02 06:58:03'),
(2, 6, 3, 1, 0, '2023-01-03', '', '', 'Paid', '', '', '2022-12-02 06:58:03', '2022-12-02 06:58:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `phone_number`, `instagram`, `country`, `city`, `user_image`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'retnoekayanti15@gmail.com', 'reykayanti', 'Retno Ekayanti', '6289650017574', 'reykayanti', 'Indonesia', 'Depok', 'default.png', '$2y$10$73s6v4yRBnVu6Th8872Cg.lQBJ39vT.8YkKWPDe7JogW/LGuwPNBy', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-11 10:05:16', '2022-11-11 10:05:16', NULL),
(3, 'yanuarmufid@gmail.com', 'yanuar', NULL, NULL, NULL, NULL, NULL, 'default.png', '$2y$10$52pMFoIq6LV5YDLnW7M6xOxl5oFU1fxMWLb.k6CnlVX51Pd.AYDkC', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-11 23:36:23', '2022-11-11 23:36:23', NULL),
(4, 'admin@gmail.com', 'admin', 'Adminila', NULL, 'adminila_', NULL, NULL, 'default.png', '$2y$10$ZgbReWD18hilduLXuPN9DexZ3VHWd1fiIS0oaEsie6FR6WkIAVHGG', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-12 01:34:18', '2022-11-12 01:34:18', NULL),
(5, 'user1@gmail.com', 'user1', NULL, NULL, NULL, NULL, NULL, 'default.png', '', NULL, '2022-11-21 03:55:36', '2022-11-21 03:55:36', NULL, NULL, NULL, 0, 0, '2022-11-21 03:55:36', '2022-11-21 03:55:36', '2022-11-21 03:55:36'),
(8, 'user2@gmail.com', 'user2', NULL, NULL, NULL, NULL, NULL, 'default.png', '', NULL, '2022-11-21 03:56:40', '2022-11-21 03:56:40', NULL, NULL, NULL, 0, 0, '2022-11-21 03:56:40', '2022-11-21 03:56:40', '2022-11-21 03:56:40'),
(9, 'user3@gmail.com', 'user3', NULL, NULL, NULL, NULL, NULL, 'default.png', '', NULL, '2022-11-21 03:56:40', '2022-11-21 03:56:40', NULL, NULL, NULL, 0, 0, '2022-11-21 03:56:40', '2022-11-21 03:56:40', '2022-11-21 03:56:40'),
(10, 'user4@gmail.com', 'user4', NULL, NULL, NULL, NULL, NULL, 'default.png', '', NULL, '2022-11-21 03:57:10', '2022-11-21 03:57:10', NULL, NULL, NULL, 0, 0, '2022-11-21 03:57:10', '2022-11-21 03:57:10', '2022-11-21 03:57:10'),
(11, 'user5@gmail.com', 'user5', NULL, NULL, NULL, NULL, NULL, 'default.png', '', NULL, '2022-11-21 03:57:10', '2022-11-21 03:57:10', NULL, NULL, NULL, 0, 0, '2022-11-21 03:57:10', '2022-11-21 03:57:10', '2022-11-21 03:57:10');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
