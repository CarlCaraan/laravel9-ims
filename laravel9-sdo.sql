-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for laravel9-sdo
CREATE DATABASE IF NOT EXISTS `laravel9-sdo` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `laravel9-sdo`;

-- Dumping structure for table laravel9-sdo.admin_site_infos
CREATE TABLE IF NOT EXISTS `admin_site_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `admin_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel9-sdo.admin_site_infos: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin_site_infos` DISABLE KEYS */;
INSERT INTO `admin_site_infos` (`id`, `admin_brand`, `footer`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'Copyright &copy; 2022 <strong>Division of Lagun</strong>a All Rights Reserved', NULL, NULL);
/*!40000 ALTER TABLE `admin_site_infos` ENABLE KEYS */;

-- Dumping structure for table laravel9-sdo.civil_service_infos
CREATE TABLE IF NOT EXISTS `civil_service_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT 'FK = user id',
  `cse_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cse_rating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cse_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Date of Examination',
  `cse_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Place of Examination',
  `cse_license_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cse_license_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel9-sdo.civil_service_infos: ~1 rows (approximately)
/*!40000 ALTER TABLE `civil_service_infos` DISABLE KEYS */;
INSERT INTO `civil_service_infos` (`id`, `user_id`, `cse_type`, `cse_rating`, `cse_date`, `cse_place`, `cse_license_number`, `cse_license_date`, `created_at`, `updated_at`) VALUES
	(109, 35, 'Driver\'s License', '22', '2022-10-13', 'Sta. Cruz Laguna', '5555-5555', '2022-10-13', '2022-10-13 12:33:37', '2022-10-13 12:33:37');
/*!40000 ALTER TABLE `civil_service_infos` ENABLE KEYS */;

-- Dumping structure for table laravel9-sdo.educational_infos
CREATE TABLE IF NOT EXISTS `educational_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT 'FK = user id',
  `elementary_school` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `elementary_course` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `elementary_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `elementary_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `elementary_units` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `elementary_graduated` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Year Graduated',
  `elementary_honors` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_school` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_course` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_units` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_graduated` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Year Graduated',
  `secondary_honors` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vocational_school` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vocational_course` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vocational_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vocational_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vocational_units` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vocational_graduated` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Year Graduated',
  `vocational_honors` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `college_school` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `college_course` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `college_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `college_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `college_units` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `college_graduated` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Year Graduated',
  `college_honors` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studies_school` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studies_course` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studies_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studies_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studies_units` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studies_graduated` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Year Graduated',
  `studies_honors` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel9-sdo.educational_infos: ~0 rows (approximately)
/*!40000 ALTER TABLE `educational_infos` DISABLE KEYS */;
INSERT INTO `educational_infos` (`id`, `user_id`, `elementary_school`, `elementary_course`, `elementary_from`, `elementary_to`, `elementary_units`, `elementary_graduated`, `elementary_honors`, `secondary_school`, `secondary_course`, `secondary_from`, `secondary_to`, `secondary_units`, `secondary_graduated`, `secondary_honors`, `vocational_school`, `vocational_course`, `vocational_from`, `vocational_to`, `vocational_units`, `vocational_graduated`, `vocational_honors`, `college_school`, `college_course`, `college_from`, `college_to`, `college_units`, `college_graduated`, `college_honors`, `studies_school`, `studies_course`, `studies_from`, `studies_to`, `studies_units`, `studies_graduated`, `studies_honors`, `created_at`, `updated_at`) VALUES
	(4, 35, 'Montesorri', 'n/a', '2013', '2016', 'n/a', '2016', 'none', 'Santa Maria Academy', 'ABM', '2017', '2019', 'n/a', '2019', 'none', 'none', 'none', 'none', 'none', 'n/a', 'none', 'none', 'Online', 'BSIT', '2019', '2023', '23', '2024', 'none', 'none', 'none', 'none', 'none', 'n/a', 'none', 'none', '2022-09-14 22:13:29', '2022-10-13 14:08:25');
/*!40000 ALTER TABLE `educational_infos` ENABLE KEYS */;

-- Dumping structure for table laravel9-sdo.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel9-sdo.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table laravel9-sdo.family_children_lists
CREATE TABLE IF NOT EXISTS `family_children_lists` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `family_id` int(11) DEFAULT NULL COMMENT 'FK = family id',
  `children_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `children_dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=243 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel9-sdo.family_children_lists: ~1 rows (approximately)
/*!40000 ALTER TABLE `family_children_lists` DISABLE KEYS */;
INSERT INTO `family_children_lists` (`id`, `family_id`, `children_name`, `children_dob`, `created_at`, `updated_at`) VALUES
	(242, 6, 'Rorod', '2022-10-13', '2022-10-13 13:46:21', '2022-10-13 13:46:21');
/*!40000 ALTER TABLE `family_children_lists` ENABLE KEYS */;

-- Dumping structure for table laravel9-sdo.family_infos
CREATE TABLE IF NOT EXISTS `family_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT 'FK = user id',
  `spouse_lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_mname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_ename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'extension name',
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_address` text COLLATE utf8mb4_unicode_ci,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_mname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_ename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'extension name',
  `mother_lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_mname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_maiden_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel9-sdo.family_infos: ~0 rows (approximately)
/*!40000 ALTER TABLE `family_infos` DISABLE KEYS */;
INSERT INTO `family_infos` (`id`, `user_id`, `spouse_lname`, `spouse_fname`, `spouse_mname`, `spouse_ename`, `occupation`, `employer_name`, `business_address`, `telephone`, `father_lname`, `father_fname`, `father_mname`, `father_ename`, `mother_lname`, `mother_fname`, `mother_mname`, `mother_maiden_name`, `created_at`, `updated_at`) VALUES
	(6, 35, 'Wans', 'Obi', 'Anakin', 'Sr.', 'Sleep Employed', 'n/a', 'n/a', 'n/a', 'Vader', 'Darth', 'Anakin', '', 'Mother L Name', 'M First Name', 'Mother M Name', 'Mother Maiden Name', '2022-09-14 22:13:29', '2022-10-13 12:22:55');
/*!40000 ALTER TABLE `family_infos` ENABLE KEYS */;

-- Dumping structure for table laravel9-sdo.learning_program_infos
CREATE TABLE IF NOT EXISTS `learning_program_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT 'FK = user id',
  `learning_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `learning_date_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `learning_date_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `learning_hours` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ld_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conducted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel9-sdo.learning_program_infos: ~0 rows (approximately)
/*!40000 ALTER TABLE `learning_program_infos` DISABLE KEYS */;
INSERT INTO `learning_program_infos` (`id`, `user_id`, `learning_title`, `learning_date_from`, `learning_date_to`, `learning_hours`, `ld_type`, `conducted_by`, `created_at`, `updated_at`) VALUES
	(4, 35, 'Business', '2022-09-16', '2022-09-16', '8', 'Online', 'Instructor', '2022-09-18 17:04:16', '2022-09-18 17:04:16');
/*!40000 ALTER TABLE `learning_program_infos` ENABLE KEYS */;

-- Dumping structure for table laravel9-sdo.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel9-sdo.migrations: ~23 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(12, '2014_10_12_000000_create_users_table', 1),
	(13, '2014_10_12_100000_create_password_resets_table', 1),
	(14, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
	(15, '2019_08_19_000000_create_failed_jobs_table', 1),
	(16, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(17, '2022_05_19_034819_create_sessions_table', 1),
	(18, '2022_07_05_090420_create_admin_site_infos_table', 1),
	(19, '2022_07_05_215005_create_user_site_infos_table', 1),
	(20, '2022_07_07_121632_create_user_herosections_table', 1),
	(21, '2022_07_08_125925_create_pending_user_emails_table', 1),
	(22, '2022_07_08_175947_create_user_inquiries_table', 1),
	(24, '2022_08_25_100710_create_personal_infos_table', 2),
	(26, '2022_09_09_202307_create_family_infos_table', 3),
	(27, '2022_09_10_123021_create_family_children_lists_table', 4),
	(28, '2022_09_12_131439_create_educational_infos_table', 5),
	(29, '2022_09_12_212045_create_civil_service_infos_table', 6),
	(32, '2022_09_13_140004_create_work_experience_infos_table', 7),
	(34, '2022_09_15_203314_create_voluntary_work_infos_table', 8),
	(37, '2022_09_16_201813_create_learning_program_infos_table', 9),
	(38, '2022_09_17_214659_create_other_skill_infos_table', 10),
	(40, '2022_09_25_150051_create_pds_form_lists_table', 11),
	(45, '2022_10_12_182623_create_service_records_table', 12),
	(46, '2022_10_12_202808_create_user_request_service_records_table', 12);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table laravel9-sdo.other_skill_infos
CREATE TABLE IF NOT EXISTS `other_skill_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT 'FK = user id',
  `special_skill` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recognition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel9-sdo.other_skill_infos: ~0 rows (approximately)
/*!40000 ALTER TABLE `other_skill_infos` DISABLE KEYS */;
INSERT INTO `other_skill_infos` (`id`, `user_id`, `special_skill`, `recognition`, `organization`, `created_at`, `updated_at`) VALUES
	(5, 35, 'Driving', 'Professional', 'Bus Company', '2022-09-20 12:45:09', '2022-09-20 12:45:09');
/*!40000 ALTER TABLE `other_skill_infos` ENABLE KEYS */;

-- Dumping structure for table laravel9-sdo.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel9-sdo.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('bannedefused@gmail.com', '$2y$10$JOGhJKIc0lM2W20pO7mi7u5dc3eBbI1F5iDc3f/ovJYOdjdXg1kGC', '2022-09-16 14:20:49');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table laravel9-sdo.pds_form_lists
CREATE TABLE IF NOT EXISTS `pds_form_lists` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT 'FK = user id',
  `pds_tracking_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pds_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pds_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pds_date_uploaded` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pds_filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pds_archived` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Yes / No',
  `pds_message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel9-sdo.pds_form_lists: ~2 rows (approximately)
/*!40000 ALTER TABLE `pds_form_lists` DISABLE KEYS */;
INSERT INTO `pds_form_lists` (`id`, `user_id`, `pds_tracking_no`, `pds_title`, `pds_status`, `pds_date_uploaded`, `pds_filename`, `pds_archived`, `pds_message`, `created_at`, `updated_at`) VALUES
	(42, 35, '1022-0000042', 'CS Form No. 212 Revised 2017', 'For Verification', '10/13/2022 - 04:47pm', '20221013164706test.pdf', 'No', '', '2022-10-02 08:51:40', '2022-10-13 16:47:06'),
	(43, 34, '1022-0000043', 'CS Form No. 212 Revised 2017', 'For Verification', '10/04/2022 - 12:35pm', '20221004123518test.pdf', 'No', '', '2022-10-04 12:35:02', '2022-10-05 10:13:04');
/*!40000 ALTER TABLE `pds_form_lists` ENABLE KEYS */;

-- Dumping structure for table laravel9-sdo.pending_user_emails
CREATE TABLE IF NOT EXISTS `pending_user_emails` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pending_user_emails_user_type_user_id_index` (`user_type`,`user_id`),
  KEY `pending_user_emails_email_index` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel9-sdo.pending_user_emails: ~2 rows (approximately)
/*!40000 ALTER TABLE `pending_user_emails` DISABLE KEYS */;
INSERT INTO `pending_user_emails` (`id`, `user_type`, `user_id`, `email`, `token`, `created_at`) VALUES
	(2, 'App\\Models\\User', 10, 'bannedefused6@gmail.com', '74b4eb472565e5daeb464b13f4a8ed35284a43ecd189bd21c0f06fc0bba21380', '2022-07-13 16:57:07'),
	(3, 'App\\Models\\User', 35, 'bannedefused32@gmail.com', '58ed16bbca0f7ff5776a555fa7808b7fae9280f79e603183c8ea88ebb3b4321b', '2022-09-29 09:47:54');
/*!40000 ALTER TABLE `pending_user_emails` ENABLE KEYS */;

-- Dumping structure for table laravel9-sdo.personal_access_tokens
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

-- Dumping data for table laravel9-sdo.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table laravel9-sdo.personal_infos
CREATE TABLE IF NOT EXISTS `personal_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT 'FK = user id',
  `cs_id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extension_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Date of Birth',
  `pob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Place of Birth',
  `civil_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gsis_id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagibig_id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `philhealth_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sss_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tin_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_employee_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `by_filipino` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `by_dual_citizenship` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `by_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `by_naturalization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `citizenship_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_house_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_subdivision` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_barangay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_house_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_subdivision` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_barangay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel9-sdo.personal_infos: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_infos` DISABLE KEYS */;
INSERT INTO `personal_infos` (`id`, `user_id`, `cs_id_no`, `middle_name`, `extension_name`, `dob`, `pob`, `civil_status`, `height`, `weight`, `blood_type`, `gsis_id_no`, `pagibig_id_no`, `philhealth_no`, `sss_no`, `tin_no`, `agency_employee_no`, `by_filipino`, `by_dual_citizenship`, `by_birth`, `by_naturalization`, `citizenship_country`, `r_house_no`, `r_subdivision`, `r_city`, `r_street`, `r_barangay`, `r_province`, `r_zip_code`, `p_house_no`, `p_subdivision`, `p_city`, `p_street`, `p_barangay`, `p_province`, `p_zip_code`, `telephone`, `mobile`, `contact_email`, `created_at`, `updated_at`) VALUES
	(8, 35, NULL, 'Sss', '', '2022-09-14', 'Ss', 'Married', '5\'6', '54kg', 'AB Normal Pro Max', 'F', 'H', 'H', 'i', 'J', 'K', 'Filipino', NULL, NULL, NULL, 'Philippines', '#137', 'Green Meadows', 'Santa Maria', 'P. Burgos', 'Brgy II', 'Laguna', '4022', '#136', 'Los Santos', 'New York City', 'Grove Street', 'Brgy I', 'Quezon', '4022', NULL, '09206551000', NULL, '2022-09-29 09:52:03', '2022-10-13 16:46:09');
/*!40000 ALTER TABLE `personal_infos` ENABLE KEYS */;

-- Dumping structure for table laravel9-sdo.service_records
CREATE TABLE IF NOT EXISTS `service_records` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `service_request_record_id` int(11) DEFAULT NULL COMMENT 'FK = user_request_service_records id',
  `sr_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sr_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sr_designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sr_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sr_place_of_assesment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sr_branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sr_leave_of_absence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sr_separation_date_caused` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel9-sdo.service_records: ~0 rows (approximately)
/*!40000 ALTER TABLE `service_records` DISABLE KEYS */;
/*!40000 ALTER TABLE `service_records` ENABLE KEYS */;

-- Dumping structure for table laravel9-sdo.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel9-sdo.sessions: ~4 rows (approximately)
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('HCcsPFWrUsdGAIOucjVUfAMS1b1YmdIaX6J0pima', 34, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQVBtcmlFb2FiMEtyVFRQV2FDa2RZTHVUU25SZ1k0cElyQXRpMVJMSSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MzQ7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wZHMvYWRtaW4vcGVuZGluZy92aWV3Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtOO30=', 1665755401),
	('ldbhyLXot3p7OpGnPY5sxMN1l7lxHgw6oI8njgxY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', 'YTozOntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6IkhQdUZDRm1FYXVseTBMU1h5ZTExU2JvWktRVGhJM2ZFN0NNQ2VJMmIiO30=', 1665651319),
	('lg2bfgrvXdkrqwzAmDkrbs0fV15R1EDtbUQsFNhZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', 'YTo0OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xvZ2luL2ZhY2Vib29rIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6InFVZ2hVZXVwa0Q2VGR0RFNBemh5TUVUejRQeTk5MjNmTjJiUjBkVkYiO3M6NToic3RhdGUiO3M6NDA6IjJraWZTd2JXb1pyQ1VYZ2tIRUxLc0xzdG11TWJhTGhlaXA4bUVCQlUiO30=', 1665755277),
	('QUjPu4srWwBizAbuQRA1yRuwzFbKdyavSejQG4jf', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', 'YTo1OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozODoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3Rlcm1zLW9mLXNlcnZpY2UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiOTFrc2lrWWJQU213ckc5MFd6SGt4VzYxVG95cGt3RFIwNUFreW9FNyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3N1Ym1pdC9wZGYiO31zOjU6InN0YXRlIjtzOjQwOiJ4R1l2eEpGZUZTdG1YeW9UTE5KMWhKSHF6ZWpJRnlXQmVKVkVRQzJCIjt9', 1665651356);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

-- Dumping structure for table laravel9-sdo.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Admin, Hr, User',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Local or Facebook, Google Identifier',
  `tracking_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'User Unique Id, xxxx-xxxxx',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_tracking_id_unique` (`tracking_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel9-sdo.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `first_name`, `last_name`, `gender`, `user_type`, `email`, `identifier`, `tracking_id`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
	(34, 'Admin', 'Account', 'Male', 'HR', 'womoves123@gmail.com', '7628534147221982', '2022-00034', '2022-08-25 22:22:44', NULL, NULL, NULL, NULL, NULL, NULL, '202210122013photo_1078846.jpg', '2022-08-25 22:22:44', '2022-10-12 20:13:11'),
	(35, 'User', 'Account', 'Male', 'User', 'bannedefused@gmail.com', 'local', '2022-00035', '2022-09-16 14:32:23', '$2y$10$FV.aLA4fjxetWjiN7j/lrOc8oX9z7vTke9tHrYDn5EiZKHZOyiByy', NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-14 21:33:30', '2022-10-12 20:15:58');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table laravel9-sdo.user_herosections
CREATE TABLE IF NOT EXISTS `user_herosections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel9-sdo.user_herosections: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_herosections` DISABLE KEYS */;
INSERT INTO `user_herosections` (`id`, `image`, `created_at`, `updated_at`) VALUES
	(2, '202208312104banner.jpg', '2022-08-31 21:04:35', '2022-08-31 21:04:35');
/*!40000 ALTER TABLE `user_herosections` ENABLE KEYS */;

-- Dumping structure for table laravel9-sdo.user_inquiries
CREATE TABLE IF NOT EXISTS `user_inquiries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel9-sdo.user_inquiries: ~3 rows (approximately)
/*!40000 ALTER TABLE `user_inquiries` DISABLE KEYS */;
INSERT INTO `user_inquiries` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
	(1, 'Peter Peter', 'bannedefused@gmail.com', 'asjkldhasdhjasjkd', '2022-07-14 22:41:31', '2022-07-14 22:41:31'),
	(2, 'Peter Peter', 'bannedefused@gmail.com', 'hi test jaskjdakjsdhjkas', '2022-07-15 20:43:07', '2022-07-15 20:43:07'),
	(4, 'John Doe', 'bannedefused@gmail.com', 'Message The message must be at least 12 characters', '2022-09-14 22:12:34', '2022-09-14 22:12:34');
/*!40000 ALTER TABLE `user_inquiries` ENABLE KEYS */;

-- Dumping structure for table laravel9-sdo.user_request_service_records
CREATE TABLE IF NOT EXISTS `user_request_service_records` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT 'FK = user id',
  `service_record_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel9-sdo.user_request_service_records: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_request_service_records` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_request_service_records` ENABLE KEYS */;

-- Dumping structure for table laravel9-sdo.user_site_infos
CREATE TABLE IF NOT EXISTS `user_site_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `footer` text COLLATE utf8mb4_unicode_ci,
  `user_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms` text COLLATE utf8mb4_unicode_ci,
  `privacy` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel9-sdo.user_site_infos: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_site_infos` DISABLE KEYS */;
INSERT INTO `user_site_infos` (`id`, `email`, `mobile`, `facebook_link`, `website_link`, `address`, `footer`, `user_brand`, `auth_brand`, `terms`, `privacy`, `created_at`, `updated_at`) VALUES
	(1, 'laguna@deped.gov.ph', '(049) 831-9062 | 831-9064', 'https://www.facebook.com/', 'sdo.com', 'DepEd Building, Provincial Capitol Compound, Santa Cruz, Laguna', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium dolor voluptatum numquam tempora delectus labore doloremque quisquam odio aut necessitatibus! Blanditiis vel error aut soluta obcaecati libero numquam a hic?', NULL, NULL, '<h2><strong>Terms and Conditions</strong></h2>\n\n                <p>Welcome to Division of Laguna!</p>\n\n                <p>These terms and conditions outline the rules and regulations for the use of School Division Office\'s Website, located at divisionoflaguna.com.edu.</p>\n\n                <p>By accessing this website we assume you accept these terms and conditions. Do not continue to use Division of Laguna if you do not agree to take all of the terms and conditions stated on this page.</p>\n\n                <p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: \'Client\', \'You\' and \'Your\' refers to you, the person log on this website and compliant to the Company’s terms and conditions. \'The Company\', \'Ourselves\', \'We\', \'Our\' and \'Us\', refers to our Company. \'Party\', \'Parties\', or \'Us\', refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client’s needs in respect of provision of the Company’s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p>\n\n                <h3><strong>Cookies</strong></h3>\n\n                <p>We employ the use of cookies. By accessing Division of Laguna, you agreed to use cookies in agreement with the School Division Office\'s Privacy Policy. </p>\n\n                <p>Most interactive websites use cookies to let us retrieve the user’s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p>\n\n                <h3><strong>License</strong></h3>\n\n                <p>Unless otherwise stated, School Division Office and/or its licensors own the intellectual property rights for all material on Division of Laguna. All intellectual property rights are reserved. You may access this from Division of Laguna for your own personal use subjected to restrictions set in these terms and conditions.</p>\n\n                <p>You must not:</p>\n                <ul>\n                    <li>Republish material from Division of Laguna</li>\n                    <li>Sell, rent or sub-license material from Division of Laguna</li>\n                    <li>Reproduce, duplicate or copy material from Division of Laguna</li>\n                    <li>Redistribute content from Division of Laguna</li>\n                </ul>\n\n                <p>This Agreement shall begin on the date hereof. Our Terms and Conditions were created with the help of the <a href=\'https://www.termsfeed.com/terms-conditions-generator/\'>TermsFeed Free Terms and Conditions Generator</a>.</p>\n\n                <p>Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. School Division Office does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of School Division Office,its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, School Division Office shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.</p>\n\n                <p>School Division Office reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.</p>\n\n                <p>You warrant and represent that:</p>\n\n                <ul>\n                    <li>You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;</li>\n                    <li>The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;</li>\n                    <li>The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy</li>\n                    <li>The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.</li>\n                </ul>\n\n                <p>You hereby grant School Division Office a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.</p>\n\n                <h3><strong>Hyperlinking to our Content</strong></h3>\n\n                <p>The following organizations may link to our Website without prior written approval:</p>\n\n                <ul>\n                    <li>Government agencies;</li>\n                    <li>Search engines;</li>\n                    <li>News organizations;</li>\n                    <li>Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and</li>\n                    <li>System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.</li>\n                </ul>\n\n                <p>These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party’s site.</p>\n\n                <p>We may consider and approve other link requests from the following types of organizations:</p>\n\n                <ul>\n                    <li>commonly-known consumer and/or business information sources;</li>\n                    <li>dot.com community sites;</li>\n                    <li>associations or other groups representing charities;</li>\n                    <li>online directory distributors;</li>\n                    <li>internet portals;</li>\n                    <li>accounting, law and consulting firms; and</li>\n                    <li>educational institutions and trade associations.</li>\n                </ul>\n\n                <p>We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of School Division Office; and (d) the link is in the context of general resource information.</p>\n\n                <p>These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party’s site.</p>\n\n                <p>If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to School Division Office. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.</p>\n\n                <p>Approved organizations may hyperlink to our Website as follows:</p>\n\n                <ul>\n                    <li>By use of our corporate name; or</li>\n                    <li>By use of the uniform resource locator being linked to; or</li>\n                    <li>By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party’s site.</li>\n                </ul>\n\n                <p>No use of School Division Office\'s logo or other artwork will be allowed for linking absent a trademark license agreement.</p>\n\n                <h3><strong>iFrames</strong></h3>\n\n                <p>Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.</p>\n\n                <h3><strong>Content Liability</strong></h3>\n\n                <p>We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.</p>\n\n                ', '<h3><strong>Your Privacy</strong></h3>\n\n                <p>Please read Privacy Policy</p>\n\n                <h3><strong>Reservation of Rights</strong></h3>\n\n                <p>We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it’s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.</p>\n\n                <h3><strong>Removal of links from our website</strong></h3>\n\n                <p>If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.</p>\n\n                <p>We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.</p>\n\n                <h3><strong>Disclaimer</strong></h3>\n\n                <p>To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:</p>\n\n                <ul>\n                    <li>limit or exclude our or your liability for death or personal injury;</li>\n                    <li>limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li>\n                    <li>limit any of our or your liabilities in any way that is not permitted under applicable law; or</li>\n                    <li>exclude any of our or your liabilities that may not be excluded under applicable law.</li>\n                </ul>\n\n                <p>The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.</p>\n\n                <p>As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p>', NULL, NULL);
/*!40000 ALTER TABLE `user_site_infos` ENABLE KEYS */;

-- Dumping structure for table laravel9-sdo.voluntary_work_infos
CREATE TABLE IF NOT EXISTS `voluntary_work_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT 'FK = user id',
  `organization_name_address` text COLLATE utf8mb4_unicode_ci,
  `voluntary_date_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voluntary_date_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voluntary_hours` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voluntary_jobtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel9-sdo.voluntary_work_infos: ~1 rows (approximately)
/*!40000 ALTER TABLE `voluntary_work_infos` DISABLE KEYS */;
INSERT INTO `voluntary_work_infos` (`id`, `user_id`, `organization_name_address`, `voluntary_date_from`, `voluntary_date_to`, `voluntary_hours`, `voluntary_jobtitle`, `created_at`, `updated_at`) VALUES
	(14, 35, 'Google', '2022-10-13', '2022-10-13', '1', 'Programmer', '2022-10-13 12:15:34', '2022-10-13 12:15:34');
/*!40000 ALTER TABLE `voluntary_work_infos` ENABLE KEYS */;

-- Dumping structure for table laravel9-sdo.work_experience_infos
CREATE TABLE IF NOT EXISTS `work_experience_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT 'FK = user id',
  `work_date_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_date_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_salary` double DEFAULT NULL,
  `salary_grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_of_appointment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gov_service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel9-sdo.work_experience_infos: ~0 rows (approximately)
/*!40000 ALTER TABLE `work_experience_infos` DISABLE KEYS */;
INSERT INTO `work_experience_infos` (`id`, `user_id`, `work_date_from`, `work_date_to`, `job_title`, `job_type`, `monthly_salary`, `salary_grade`, `status_of_appointment`, `gov_service`, `created_at`, `updated_at`) VALUES
	(26, 35, '2022-09-30', '2022-09-30', 'React Developer', 'IBM', 30000, '00-0', 'Pending', 'Yes', '2022-09-30 14:26:01', '2022-09-30 14:26:01');
/*!40000 ALTER TABLE `work_experience_infos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
