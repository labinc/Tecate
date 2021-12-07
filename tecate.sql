-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.33 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para labinteractiva_tecate
CREATE DATABASE IF NOT EXISTS `labinteractiva_tecate` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `labinteractiva_tecate`;

-- Volcando estructura para tabla labinteractiva_tecate.answers
CREATE TABLE IF NOT EXISTS `answers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `statement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_id` bigint(20) unsigned DEFAULT NULL,
  `veracity` enum('Si','No') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `answers_question_id_foreign` (`question_id`),
  CONSTRAINT `answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla labinteractiva_tecate.answers: ~11 rows (aproximadamente)
DELETE FROM `answers`;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` (`id`, `statement`, `question_id`, `veracity`, `created_at`, `updated_at`) VALUES
	(1, '7.5%', 1, 'No', '2021-12-04 09:51:40', '2021-12-04 09:51:40'),
	(2, '4.5%', 1, 'Si', '2021-12-04 09:51:55', '2021-12-04 09:51:56'),
	(3, '4.0%', 1, 'No', '2021-12-04 09:52:11', '2021-12-04 09:52:12'),
	(4, '1°', 2, 'No', '2021-12-04 09:52:32', '2021-12-04 09:52:33'),
	(5, '3°', 2, 'No', '2021-12-04 09:52:48', '2021-12-04 09:52:48'),
	(6, '4°', 2, 'Si', '2021-12-04 09:53:02', '2021-12-04 09:53:03'),
	(7, '45° y 2 dedos de espuma', 3, 'Si', '2021-12-04 09:53:29', '2021-12-04 09:53:30'),
	(8, '46° y 1 dedos de espuma', 3, 'No', '2021-12-04 09:53:56', '2021-12-04 09:53:57'),
	(9, '45° y 3 dedos de espuma', 3, 'No', '2021-12-04 09:54:19', '2021-12-04 09:54:19'),
	(10, 'Larger', 4, 'No', '2021-12-04 09:54:34', '2021-12-04 09:54:35'),
	(11, 'Pale Ale', 4, 'No', '2021-12-04 09:54:51', '2021-12-04 09:54:52'),
	(12, 'Pilsner', 4, 'Si', '2021-12-04 09:55:08', '2021-12-04 09:55:09');
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;

-- Volcando estructura para tabla labinteractiva_tecate.batches
CREATE TABLE IF NOT EXISTS `batches` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `questions_answered` int(11) NOT NULL,
  `questions_right` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `batches_user_id_foreign` (`user_id`),
  CONSTRAINT `batches_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla labinteractiva_tecate.batches: ~0 rows (aproximadamente)
DELETE FROM `batches`;
/*!40000 ALTER TABLE `batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `batches` ENABLE KEYS */;

-- Volcando estructura para tabla labinteractiva_tecate.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla labinteractiva_tecate.migrations: ~7 rows (aproximadamente)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(2, '2021_11_11_000000_create_answers_table', 1),
	(3, '2021_11_11_000000_create_password_resets_table', 1),
	(4, '2021_11_11_000000_create_questions_table', 1),
	(5, '2021_11_11_000000_create_results_table', 1),
	(6, '2021_11_11_000000_create_rols_table', 1),
	(7, '2021_11_11_000000_create_users_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla labinteractiva_tecate.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla labinteractiva_tecate.password_resets: ~0 rows (aproximadamente)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla labinteractiva_tecate.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla labinteractiva_tecate.personal_access_tokens: ~0 rows (aproximadamente)
DELETE FROM `personal_access_tokens`;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Volcando estructura para tabla labinteractiva_tecate.questions
CREATE TABLE IF NOT EXISTS `questions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `statement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla labinteractiva_tecate.questions: ~4 rows (aproximadamente)
DELETE FROM `questions`;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` (`id`, `statement`, `state`, `created_at`, `updated_at`) VALUES
	(1, '¿Cuántos grados de alcohol contiene la cerveza del sabor balanceado?', 'Activo', '2021-12-04 09:49:00', '2021-12-04 09:49:00'),
	(2, '¿A cuántos centígrados se debe disfrutar una cerveza Tecate?', 'Activo', '2021-12-04 09:50:46', '2021-12-04 09:50:47'),
	(3, '¿Cómo se debe servir una Tecate y cuál es el punto perfecto de espuma?', 'Activo', '2021-12-04 09:50:47', '2021-12-04 09:50:48'),
	(4, '¿Qué tipo de cerveza es Tecate?', 'Activo', '2021-12-04 09:51:15', '2021-12-04 09:51:16');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;

-- Volcando estructura para tabla labinteractiva_tecate.results
CREATE TABLE IF NOT EXISTS `results` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `batch_id` bigint(20) unsigned DEFAULT NULL,
  `question_id` bigint(20) unsigned DEFAULT NULL,
  `answer_id` bigint(20) unsigned DEFAULT NULL,
  `score` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `results_question_id_foreign` (`question_id`),
  KEY `results_answer_id_foreign` (`answer_id`),
  KEY `results_user_id_foreign` (`batch_id`) USING BTREE,
  CONSTRAINT `results_answer_id_foreign` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`) ON DELETE SET NULL,
  CONSTRAINT `results_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`) ON DELETE SET NULL,
  CONSTRAINT `results_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla labinteractiva_tecate.results: ~0 rows (aproximadamente)
DELETE FROM `results`;
/*!40000 ALTER TABLE `results` DISABLE KEYS */;
/*!40000 ALTER TABLE `results` ENABLE KEYS */;

-- Volcando estructura para tabla labinteractiva_tecate.rols
CREATE TABLE IF NOT EXISTS `rols` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rols_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla labinteractiva_tecate.rols: ~2 rows (aproximadamente)
DELETE FROM `rols`;
/*!40000 ALTER TABLE `rols` DISABLE KEYS */;
INSERT INTO `rols` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator', NULL, '2021-12-03 07:35:20', '2021-12-03 07:35:21'),
	(2, 'Player', NULL, '2021-12-03 07:35:28', '2021-12-03 07:35:29');
/*!40000 ALTER TABLE `rols` ENABLE KEYS */;

-- Volcando estructura para tabla labinteractiva_tecate.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identification` bigint(20) NOT NULL DEFAULT '0',
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('Masculino','Femenino') COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `units` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol_id` bigint(20) unsigned DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_identification_unique` (`identification`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_rol_id_foreign` (`rol_id`),
  CONSTRAINT `users_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `rols` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla labinteractiva_tecate.users: ~0 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `identification`, `birthday`, `gender`, `phone`, `email`, `units`, `password`, `rol_id`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Super Admin', 987654321, NULL, 'Masculino', NULL, 'administrador@gmail.com', NULL, '$2y$10$/wPo/GYqjNpgwp4mLunaXubIFO1zFsPQ2NijBPl5ZP/04mUNJc8WK', 1, NULL, NULL, '2021-12-03 07:36:08', '2021-12-03 07:36:11'),
	(2, 'Nathan Drake', 577478474, '0', 'Masculino', 3127478748, 'nathan.drake@gmail.com', '12', '$2y$10$KMXiPQ7du2xGghuvrBK8W.lDQ8eLyox/TE5scLcCS4/8zFUCTPIjm', 2, NULL, NULL, '2021-12-04 05:55:40', '2021-12-04 05:55:40');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
