-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.1.16-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win32
-- HeidiSQL Versi:               9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- membuang struktur untuk table matdis_replica.histories
CREATE TABLE IF NOT EXISTS `histories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_apps` enum('preposisi','modulo') NOT NULL,
  `app_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel matdis_replica.histories: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `histories` DISABLE KEYS */;
/*!40000 ALTER TABLE `histories` ENABLE KEYS */;

-- membuang struktur untuk table matdis_replica.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel matdis_replica.migrations: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- membuang struktur untuk table matdis_replica.modulo
CREATE TABLE IF NOT EXISTS `modulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel matdis_replica.modulo: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `modulo` DISABLE KEYS */;
/*!40000 ALTER TABLE `modulo` ENABLE KEYS */;

-- membuang struktur untuk table matdis_replica.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel matdis_replica.password_resets: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- membuang struktur untuk table matdis_replica.preposisi
CREATE TABLE IF NOT EXISTS `preposisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `soal` text NOT NULL,
  `jawaban` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel matdis_replica.preposisi: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `preposisi` DISABLE KEYS */;
/*!40000 ALTER TABLE `preposisi` ENABLE KEYS */;

-- membuang struktur untuk table matdis_replica.table_kebenaran
CREATE TABLE IF NOT EXISTS `table_kebenaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_hukum` varchar(50) DEFAULT NULL,
  `variable_1` varchar(50) DEFAULT NULL,
  `variable_2` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel matdis_replica.table_kebenaran: ~47 rows (lebih kurang)
/*!40000 ALTER TABLE `table_kebenaran` DISABLE KEYS */;
INSERT INTO `table_kebenaran` (`id`, `nama_hukum`, `variable_1`, `variable_2`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'De Morgan', '{-}{(}{p}{^}{q}{)}', '{-}{p}{V}{-}{q}', 1, '2018-12-26 21:56:05', '2018-12-26 21:56:06'),
	(2, 'De Morgan', '{-}{(}{p}{V}{q}{)}', '{-}{p}{^}{-}{q}', 1, '2018-12-26 21:56:05', '2018-12-26 21:56:06'),
	(3, 'De Morgan', '{-}{(}{q}{^}{p}{)}', '{-}{q}{V}{-}{p}', 1, '2018-12-26 21:56:05', '2018-12-26 21:56:06'),
	(4, 'De Morgan', '{-}{(}{q}{V}{p}{)}', '{-}{q}{^}{-}{p}', 1, '2018-12-26 21:56:05', '2018-12-26 21:56:06'),
	(5, 'Dristributif', '{p}{V}{(}{q}{^}{r}{)}', '{(}{p}{V}{q}{)}{^}{(}{p}{V}{r}{)}', 1, '2018-12-26 21:56:05', '2018-12-26 21:56:06'),
	(6, 'Dristributif', '{p}{^}{(}{q}{V}{r}{)}', '{(}{p}{^}{q}{)}{V}{(}{p}{^}{r}{)}', 1, '2018-12-26 21:56:05', '2018-12-26 21:56:06'),
	(7, 'Asosiatif', '{p}{V}{(}{q}{V}{r}{)}', '{(}{p}{V}{q}){V}{r}{)}', 1, '2018-12-26 21:58:47', '2018-12-26 21:58:47'),
	(8, 'Asosiatif', '{p}{^}{(}{q}{^}{r}{)}', '{(}{p}{^}{q}{)}{^}{r}{)}', 1, '2018-12-26 21:58:40', '2018-12-26 21:58:41'),
	(9, 'Asosiatif', '{(}{p}{V}{q}){V}{r}{)}', '{p}{V}{(}{q}{V}{r}{)}', 1, '2018-12-26 21:58:47', '2018-12-26 21:58:47'),
	(10, 'Asosiatif', '{(}{p}{^}{q}{)}{^}{r}{)}', '{p}{^}{(}{q}{^}{r}{)}', 1, '2018-12-26 21:58:40', '2018-12-26 21:58:41'),
	(11, 'Komutatif', '{p}{V}{q}', '{q}{V}{p}', 1, '2018-12-26 21:58:49', '2018-12-26 21:58:49'),
	(12, 'Komutatif', '{p}{^}{q}', '{q}{^}{p}', 1, '2018-12-26 21:58:49', '2018-12-26 21:58:48'),
	(13, 'Komutatif', '{q}{V}{p}', '{p}{V}{q}', 0, '2018-12-26 21:58:49', '2018-12-26 21:58:49'),
	(14, 'Komutatif', '{q}{^}{p}', '{p}{^}{q}', 0, '2018-12-26 21:58:49', '2018-12-26 21:58:48'),
	(15, 'Absorpsi', '{p}{V}{(}{p}{^}{q}{)}', '{p}', 1, '2018-12-26 21:58:49', '2018-12-26 21:58:49'),
	(16, 'Absorpsi', '{p}{^}{(}{p}{V}{q}{)}', '{p}', 1, '2018-12-26 21:58:49', '2018-12-26 21:58:49'),
	(17, 'Absorpsi', '{q}{V}{(}{q}{^}{p}{)}', '{q}', 1, '2018-12-26 21:58:49', '2018-12-26 21:58:49'),
	(18, 'Absorpsi', '{q}{^}{(}{q}{V}{p}{)}', '{q}', 1, '2018-12-26 21:58:49', '2018-12-26 21:58:49'),
	(19, 'Indenponten', '{p}{^}{p}', '{p}', 1, '2018-12-26 21:58:50', '2018-12-26 21:58:50'),
	(20, 'Indenponten', '{p}{V}{p}', '{p}', 1, '2018-12-26 21:58:50', '2018-12-26 21:58:50'),
	(21, 'Indenponten', '{q}{^}{q}', '{q}', 1, '2018-12-26 21:58:50', '2018-12-26 21:58:50'),
	(22, 'Indenponten', '{q}{V}{q}', '{q}', 1, '2018-12-26 21:58:50', '2018-12-26 21:58:50'),
	(23, 'Indenponten', '{r}{^}{r}', '{r}', 1, '2018-12-26 21:58:50', '2018-12-26 21:58:50'),
	(24, 'Indenponten', '{r}{V}{r}', '{r}', 1, '2018-12-26 21:58:50', '2018-12-26 21:58:50'),
	(25, 'Negasi Ganda', '{-}{(}{-}{p}{)}', '{p}', 1, '2018-12-26 21:58:50', '2018-12-26 21:58:50'),
	(26, 'Negasi Ganda', '{-}{(}{-}{q}{)}', '{q}', 1, '2018-12-26 21:58:50', '2018-12-26 21:58:50'),
	(27, 'Negasi Ganda', '{-}{(}{-}{r}{)}', '{r}', 1, '2018-12-26 21:58:50', '2018-12-26 21:58:50'),
	(28, 'Dominasi', '{p}{^}{F}', '{F}', 1, '2018-12-26 21:58:51', '2018-12-26 21:58:51'),
	(29, 'Dominasi', '{p}{V}{T}', '{T}', 1, '2018-12-26 21:58:51', '2018-12-26 21:58:51'),
	(30, 'Dominasi', '{q}{^}{F}', '{F}', 1, '2018-12-26 21:58:51', '2018-12-26 21:58:51'),
	(31, 'Dominasi', '{q}{V}{T}', '{T}', 1, '2018-12-26 21:58:51', '2018-12-26 21:58:51'),
	(32, 'Dominasi', '{r}{^}{F}', '{F}', 1, '2018-12-26 21:58:51', '2018-12-26 21:58:51'),
	(33, 'Dominasi', '{r}{V}{T}', '{T}', 1, '2018-12-26 21:58:51', '2018-12-26 21:58:51'),
	(34, 'Negasi', '{p}{V}{-}{p}', '{T}', 1, '2018-12-26 21:58:51', '2018-12-26 21:58:51'),
	(35, 'Negasi', '{p}{^}{-}{p}', '{F}', 1, '2018-12-26 21:58:51', '2018-12-26 21:58:51'),
	(36, 'Negasi', '{q}{V}{-}{q}', '{T}', 1, '2018-12-26 21:58:51', '2018-12-26 21:58:51'),
	(37, 'Negasi', '{q}{^}{-}{q}', '{F}', 1, '2018-12-26 21:58:51', '2018-12-26 21:58:51'),
	(38, 'Negasi', '{r}{V}{-}{r}', '{T}', 1, '2018-12-26 21:58:51', '2018-12-26 21:58:51'),
	(39, 'Negasi', '{r}{^}{-}{r}', '{F}', 1, '2018-12-26 21:58:51', '2018-12-26 21:58:51'),
	(40, 'Identitas', '{p}{V}{F}', '{p}', 1, '2018-12-26 21:58:52', '2018-12-26 21:58:52'),
	(41, 'Identitas', '{p}{^}{T}', '{p}', 1, '2018-12-26 21:58:52', '2018-12-26 21:58:52'),
	(42, 'Identitas', '{q}{V}{F}', '{q}', 1, '2018-12-26 21:58:52', '2018-12-26 21:58:52'),
	(43, 'Identitas', '{q}{^}{T}', '{q}', 1, '2018-12-26 21:58:52', '2018-12-26 21:58:52'),
	(44, 'Identitas', '{r}{V}{F}', '{r}', 1, '2018-12-26 21:58:52', '2018-12-26 21:58:52'),
	(45, 'Identitas', '{r}{^}{T}', '{r}', 1, '2018-12-26 21:58:52', '2018-12-26 21:58:52'),
	(46, 'Negasi', '{-}{(}{p}{)}', '{-}{p}', 1, '2018-12-26 21:58:52', '2018-12-26 21:58:52'),
	(47, 'Negasi', '{-}{(}{q}{)}', '{-}{q}', 1, '2018-12-26 21:58:52', '2018-12-26 21:58:52');
/*!40000 ALTER TABLE `table_kebenaran` ENABLE KEYS */;

-- membuang struktur untuk table matdis_replica.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci,
  `thumbs` text COLLATE utf8mb4_unicode_ci,
  `nim` text COLLATE utf8mb4_unicode_ci,
  `gender` enum('P','L') COLLATE utf8mb4_unicode_ci DEFAULT 'L',
  `full_name` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel matdis_replica.users: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `images`, `thumbs`, `nim`, `gender`, `full_name`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Fiqi', 'admin@gmail.com', '$2y$10$/UyB9/6sbcjLJGkvD593a.IOZ1t5WDWnUliFiS04Sbc5kI.wIH35W', 'http://matdis.com/photos/1/fiqi.jpg', 'http://matdis.com/photos/1/thumbs/fiqi.jpg', 'A11.2017.10825', 'L', 'Fiqi Arifianto', NULL, '2018-10-03 07:20:54', '2018-12-26 09:20:07');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
