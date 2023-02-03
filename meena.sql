-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2019 at 04:27 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meena`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'First Name',
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Last Name',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin@email.com',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `firstname`, `lastname`, `email`, `password`, `remember_token`, `gender`, `phone`, `picture`, `address`, `city`, `country`, `created_at`, `updated_at`) VALUES
(1, 'First', 'Last', 'none@email.com', '$2y$12$sBG0inetRxeKx4QumyDcM.bL/dwm9AEX2eHy3.QAqEF0GpEtQ4.Q2', NULL, 'female', 'None', '81QUZTarZl4GmpTq8mesbzhaimxTX5sGT4B7WSu9.jpeg', 'Nikunja-2', 'Dhaka', 'Bangladesh', NULL, '2019-05-05 02:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `ages`
--

CREATE TABLE `ages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ages`
--

INSERT INTO `ages` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Below 18', NULL, NULL, NULL),
(2, '18 Or Above', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `content_type_id` int(11) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `category_id`, `content_type_id`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, NULL, '2019-05-05 01:42:37', '2019-05-05 01:42:37'),
(2, 2, 1, 2, NULL, '2019-05-05 02:11:32', '2019-05-05 02:11:32');

-- --------------------------------------------------------

--
-- Table structure for table `application_related_media`
--

CREATE TABLE `application_related_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_type_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_videographer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `videographer_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `videographer_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_publishment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `application_id` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `application_related_media`
--

INSERT INTO `application_related_media` (`id`, `title`, `media_type_id`, `name_videographer`, `videographer_phone`, `videographer_email`, `date_publishment`, `application_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Submission Title 1', '5', NULL, NULL, NULL, '1971-01-01', 1, NULL, '2019-05-05 01:42:37', '2019-05-05 01:42:37'),
(2, 'Submission Title 2', '10', NULL, NULL, NULL, '1972-01-01', 1, NULL, '2019-05-05 01:42:37', '2019-05-05 01:42:37'),
(3, 'Submission Title 3', '11', NULL, NULL, NULL, '2003-01-01', 1, NULL, '2019-05-05 01:42:37', '2019-05-05 01:42:37'),
(4, 'Submission Title 1', '10', 'Name Lead Videographer 1', '01000000001', 'leadvideographer1@email.com', '2001-01-01', 2, NULL, '2019-05-05 02:11:32', '2019-05-05 02:11:32'),
(5, 'Submission Title 2', '11', 'Name Lead Videographer 2', '01000000002', 'leadvideographer2@email.com', '2002-02-02', 2, NULL, '2019-05-05 02:11:32', '2019-05-05 02:11:32');

-- --------------------------------------------------------

--
-- Table structure for table `award_settings`
--

CREATE TABLE `award_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `current_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0000',
  `submission_deadline` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delay_submission_message` mediumtext COLLATE utf8mb4_unicode_ci,
  `first_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'first@email.com',
  `first_email_holder_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'first',
  `second_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'second@email.com',
  `second_email_holder_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'second',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `award_settings`
--

INSERT INTO `award_settings` (`id`, `current_year`, `submission_deadline`, `delay_submission_message`, `first_email`, `first_email_holder_name`, `second_email`, `second_email_holder_name`, `created_at`, `updated_at`) VALUES
(1, '1', '05/29/2019', 'An Error Message', 'momen@riseuplabs.com', 'Momen', 'nurulx0709@hotmail.com', 'Momen', NULL, '2019-05-05 02:14:36');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Print/Online Media', NULL, NULL, NULL),
(2, 'Visual Media', NULL, NULL, NULL),
(3, 'Radio', NULL, NULL, NULL),
(4, 'News Photography', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `content_types`
--

CREATE TABLE `content_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_types`
--

INSERT INTO `content_types` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Report\r\n                                            ', NULL, NULL, NULL),
(2, 'Creative', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media_files`
--

CREATE TABLE `media_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `media_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `application_related_media_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media_files`
--

INSERT INTO `media_files` (`id`, `media_file`, `application_related_media_id`, `created_at`, `updated_at`) VALUES
(1, 'photo/Print/Online Media//zqc2ulme0eIZooY7FZ57Dgx8b6XvBaJclAwTeFK7.jpeg', 1, '2019-05-05 01:42:37', '2019-05-05 01:42:37'),
(2, 'photo/Print/Online Media//b1yjMhlHjIXchzw1JSS1YSAWMRV1DHpNus4f2RDB.jpeg', 3, '2019-05-05 01:42:37', '2019-05-05 01:42:37');

-- --------------------------------------------------------

--
-- Table structure for table `media_links`
--

CREATE TABLE `media_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `media_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `application_related_media_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media_links`
--

INSERT INTO `media_links` (`id`, `media_link`, `application_related_media_id`, `created_at`, `updated_at`) VALUES
(1, 'https://2.com', 2, '2019-05-05 01:42:37', '2019-05-05 01:42:37'),
(2, 'https://3.com', 3, '2019-05-05 01:42:37', '2019-05-05 01:42:37'),
(3, 'http://1.com', 4, '2019-05-05 02:11:32', '2019-05-05 02:11:32'),
(4, 'http://2.com', 5, '2019-05-05 02:11:32', '2019-05-05 02:11:32');

-- --------------------------------------------------------

--
-- Table structure for table `media_types`
--

CREATE TABLE `media_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media_types`
--

INSERT INTO `media_types` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'News Reports', NULL, NULL, NULL),
(2, 'Investigative Reports', NULL, NULL, NULL),
(3, 'Post Editorials', NULL, NULL, NULL),
(4, 'Articles                              ', NULL, NULL, NULL),
(5, 'Features', NULL, NULL, NULL),
(6, 'Stories', NULL, NULL, NULL),
(7, 'Poems', NULL, NULL, NULL),
(8, 'Documentaries', NULL, NULL, NULL),
(9, 'Short film', NULL, NULL, NULL),
(10, 'Animations', NULL, NULL, NULL),
(11, 'Plays', NULL, NULL, NULL),
(12, 'Songs', NULL, NULL, NULL),
(13, 'Radio Dramas', NULL, NULL, NULL),
(14, 'Others', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(21, '2019_04_11_062143_create_admins_table', 1),
(54, '2019_04_27_080727_create_publishers_table', 3),
(168, '2019_04_17_063937_create_categories_table', 4),
(169, '2019_04_17_073055_create_media_types_table', 4),
(170, '2019_04_17_073126_create_ages_table', 4),
(171, '2019_04_17_081302_create_content_types_table', 4),
(172, '2019_04_19_164650_create_award_settings_table', 4),
(173, '2019_04_20_050152_create_years_table', 4),
(176, '2019_04_23_150128_create_photos_table', 4),
(177, '2019_04_23_150154_create_photo_files_table', 4),
(247, '2014_10_12_000000_create_users_table', 5),
(248, '2019_04_21_100243_create_applications_table', 5),
(249, '2019_04_21_110831_create_application_related_media_table', 5),
(250, '2019_04_27_094212_create_publishers_table', 5),
(251, '2019_04_29_043245_create_media_files_table', 5),
(252, '2019_04_29_043327_create_media_links_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `category_id` int(11) DEFAULT NULL,
  `content_type_id` int(11) DEFAULT NULL,
  `age_id` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `title`, `description`, `category_id`, `content_type_id`, `age_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Photo 1', NULL, NULL, NULL, NULL, NULL, '2019-05-05 02:04:43', '2019-05-05 02:04:58'),
(2, 'Photo 2', NULL, NULL, NULL, NULL, NULL, '2019-05-05 03:21:07', '2019-05-05 03:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `photo_files`
--

CREATE TABLE `photo_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photo_files`
--

INSERT INTO `photo_files` (`id`, `photo_path`, `photo_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'photo/archived//CBcsMhIeWjQdxzTeFr1e2shG12S6x9AiOeN5jroZ.jpeg', 1, NULL, '2019-05-05 02:04:44', '2019-05-05 02:04:58'),
(2, 'photo/archived//Auyhr0c4R6MRUOcaP7xK5UCU7JAdZudYYo4QaAL0.jpeg', 2, NULL, '2019-05-05 03:21:07', '2019-05-05 03:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `publisher_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `representative_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `representative_designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `representative_organization` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `representative_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `representative_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `application_related_media_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `publisher_name`, `representative_name`, `representative_designation`, `representative_organization`, `representative_phone`, `representative_email`, `application_related_media_id`, `created_at`, `updated_at`) VALUES
(1, 'Publisher Name 1', 'Contact Person 1 Name', 'Contact Person 1 Designation', 'Contact Person 1 Organization', '01000000001', NULL, 1, '2019-05-05 01:42:37', '2019-05-05 01:42:37'),
(2, 'Publisher Name 2', 'Contact Person 2 Name', 'Contact Person 2 Designation', 'Contact Person 2 Organization', NULL, 'ContactPerson2@email.com', 2, '2019-05-05 01:42:37', '2019-05-05 01:42:37'),
(3, 'Publisher Name 3', 'Contact Person 3 Name', 'Contact Person 3 Designation', 'Contact Person 3 Organization', '01000000003', 'ContactPerson3@email.com', 3, '2019-05-05 01:42:37', '2019-05-05 01:42:37'),
(4, 'Publisher Name 1', 'Contact Person 1 Name', 'Contact Person 1 Designation', 'Contact Person 1 Organization', '01000000001', 'ContactPerson1@email.com', 4, '2019-05-05 02:11:32', '2019-05-05 02:11:32'),
(5, 'Publisher Name 2', 'Contact Person 2 Name', 'Contact Person 2 Designation', 'Contact Person 2 Organization', '01000000002', 'ContactPerson2@email.com', 5, '2019-05-05 02:11:33', '2019-05-05 02:11:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'full_name',
  `birth_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_alt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci,
  `age_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `birth_date`, `email`, `phone`, `phone_alt`, `address`, `age_id`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Applicant Name', '1991-12-30', 'applicant@email.com', '01612989900', NULL, 'Applicant Address', 1, NULL, NULL, '2019-05-05 01:42:37', '2019-05-05 01:42:37'),
(2, 'Applicant Name 2', '2000-01-01', 'applicant2@email.com', '01622888990', NULL, 'Applicant 2 Address', 2, NULL, NULL, '2019-05-05 02:11:32', '2019-05-05 02:11:32');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2019', NULL, '2019-05-04 23:00:41', '2019-05-04 23:00:51'),
(2, '2018', NULL, '2019-05-05 02:12:16', '2019-05-05 02:12:16'),
(3, '2020', NULL, '2019-05-05 02:12:22', '2019-05-05 02:31:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ages`
--
ALTER TABLE `ages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_related_media`
--
ALTER TABLE `application_related_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `award_settings`
--
ALTER TABLE `award_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_types`
--
ALTER TABLE `content_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_files`
--
ALTER TABLE `media_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_links`
--
ALTER TABLE `media_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_types`
--
ALTER TABLE `media_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo_files`
--
ALTER TABLE `photo_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ages`
--
ALTER TABLE `ages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `application_related_media`
--
ALTER TABLE `application_related_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `award_settings`
--
ALTER TABLE `award_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `content_types`
--
ALTER TABLE `content_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `media_files`
--
ALTER TABLE `media_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `media_links`
--
ALTER TABLE `media_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `media_types`
--
ALTER TABLE `media_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `photo_files`
--
ALTER TABLE `photo_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
