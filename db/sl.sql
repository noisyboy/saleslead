-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2014 at 01:17 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sl`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE IF NOT EXISTS `areas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `area` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `area`) VALUES
(8, 'LUZON'),
(9, 'VISAYAS'),
(10, 'MINDANAO');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_roles`
--

CREATE TABLE IF NOT EXISTS `assigned_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `assigned_roles_user_id_foreign` (`user_id`),
  KEY `assigned_roles_role_id_foreign` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `assigned_roles`
--

INSERT INTO `assigned_roles` (`id`, `user_id`, `role_id`) VALUES
(3, 1, 5),
(4, 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_by` int(10) unsigned NOT NULL,
  `company_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `related_to` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `contacts_company_name_first_name_last_name_index` (`company_name`,`first_name`,`last_name`),
  KEY `contacts_created_by_foreign` (`created_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `created_by`, `company_name`, `address`, `first_name`, `middle_name`, `last_name`, `title`, `related_to`, `created_at`, `updated_at`) VALUES
(1, 1, 'ZAI FOO', '52', 'RENCIE', 'AGBIN', 'BAUTISTA', 'ENGINEER', NULL, '2014-07-29 03:14:02', '2014-07-29 03:14:02'),
(2, 1, 'CHASE TECHNOLOGIES CORPORATION', '5268 DISEL ST. PALANAN MAKATI CITY', 'DONATO', 'JAVID', 'ALDEA', 'PROGRAMMER', NULL, '2014-07-30 00:14:22', '2014-07-30 00:14:22'),
(3, 1, 'CHASE TECHNOLOGIES CORPORATION', '5268 DISEL ST. PALANAN MAKATI CITY', 'RENCIE', 'AGBIN', 'BAUTISTA', 'MANAGER', NULL, '2014-07-31 00:24:59', '2014-07-31 00:24:59'),
(4, 2, 'CHASE TECHNOLOGIES CORPORATION', '5268 DISEL ST. PALANAN MAKATI CITY', 'JUAN', 'DELA', 'CRUZ', 'MANAGER', NULL, '2014-07-31 02:35:16', '2014-07-31 02:35:16');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department`) VALUES
(1, 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contact_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `emails_contact_id_foreign` (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_06_24_103308_create_contacts_table', 1),
('2014_06_25_035934_create_phone_types_table', 1),
('2014_06_25_083447_create_contact_phones_table', 1),
('2014_06_25_143829_create_contact_emails_table', 1),
('2014_06_26_032708_create_projects_table', 1),
('2014_06_26_034208_create_area_table', 1),
('2014_06_26_045648_create_regions_table', 1),
('2014_06_26_104935_add_project_address_on_projects_table', 1),
('2014_06_27_100816_create_project_contractor_groups_table', 1),
('2014_06_27_113937_create_project_contacts_table', 1),
('2014_06_28_030443_create_project_classifications_table', 1),
('2014_06_28_041719_create_project_categories_table', 1),
('2014_06_30_014940_create_sub_categories_table', 1),
('2014_06_30_033657_create_project_stages_table', 1),
('2014_06_30_035640_create_project_statuses_table', 1),
('2014_06_30_063204_add_project_details_on_project_table', 1),
('2014_07_02_055648_create_departments_table', 1),
('2014_07_04_012330_create_users_table', 1),
('2014_07_24_064550_add_created_by_on_contants_table', 1),
('2014_07_24_091024_add_created_by_on_project_table', 1),
('2014_07_26_012825_entrust_setup_tables', 1),
('2014_07_29_134617_add_assigned_to_in_projects', 2),
('2014_07_29_142335_create_project_status_on_app', 3),
('2014_07_29_143124_add_project_app_status_on_project', 4),
('2014_07_31_090829_create_table_for_project_contact_status', 5);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'manage_areas', 'Manage Areas', '2014-07-26 04:27:48', '2014-07-26 04:27:48'),
(2, 'manage_regions', 'Manage Regions', '2014-07-26 04:27:48', '2014-07-26 04:27:48'),
(3, 'manage_contractorgroups', 'Manage Contractor Groups', '2014-07-26 04:27:48', '2014-07-26 04:27:48'),
(4, 'manage_projectclassifications', 'Manage Project Classifications', '2014-07-26 04:27:48', '2014-07-26 04:27:48'),
(5, 'manage_projectcategories', 'Manage Project Categories', '2014-07-26 04:27:48', '2014-07-26 04:27:48'),
(6, 'manage_projectsubcategories', 'Manage Project Sub Categories', '2014-07-26 04:27:48', '2014-07-26 04:27:48'),
(7, 'manage_projectstages', 'Manage Project Stages', '2014-07-26 04:27:48', '2014-07-26 04:27:48'),
(8, 'manage_projectstatuses', 'Manage Project Statuses', '2014-07-26 04:27:48', '2014-07-26 04:27:48');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE IF NOT EXISTS `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES
(1, 1, 5),
(2, 2, 5),
(3, 3, 5),
(4, 4, 5),
(5, 5, 5),
(6, 6, 5),
(7, 7, 5),
(8, 8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE IF NOT EXISTS `phones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_type_id` int(10) unsigned NOT NULL,
  `contact_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `phones_phone_type_id_foreign` (`phone_type_id`),
  KEY `phones_contact_id_foreign` (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `phone_types`
--

CREATE TABLE IF NOT EXISTS `phone_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `phone_types`
--

INSERT INTO `phone_types` (`id`, `phone_type`) VALUES
(1, 'HOME'),
(2, 'WORK'),
(3, 'MOBILE'),
(4, 'OTHER');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_by` int(10) unsigned NOT NULL,
  `assigned_to` int(10) unsigned DEFAULT NULL,
  `assigned_by` int(10) unsigned DEFAULT NULL,
  `project_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `project_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `region_id` int(10) unsigned NOT NULL,
  `area_id` int(10) unsigned NOT NULL,
  `project_classification_id` int(10) unsigned NOT NULL,
  `project_category_id` int(10) unsigned NOT NULL,
  `project_sub_category_id` int(11) NOT NULL,
  `project_stage_id` int(10) unsigned NOT NULL,
  `project_details` text COLLATE utf8_unicode_ci NOT NULL,
  `project_status_id` int(10) unsigned NOT NULL,
  `status_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `projects_area_id_foreign` (`area_id`),
  KEY `projects_region_id_foreign` (`region_id`),
  KEY `projects_project_classification_id_foreign` (`project_classification_id`),
  KEY `projects_project_category_id_foreign` (`project_category_id`),
  KEY `projects_project_stage_id_foreign` (`project_stage_id`),
  KEY `projects_project_status_id_foreign` (`project_status_id`),
  KEY `projects_created_by_foreign` (`created_by`),
  KEY `projects_assigned_to_foreign` (`assigned_to`),
  KEY `projects_assigned_by_foreign` (`assigned_by`),
  KEY `projects_status_id_foreign` (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `created_by`, `assigned_to`, `assigned_by`, `project_name`, `project_address`, `region_id`, `area_id`, `project_classification_id`, `project_category_id`, `project_sub_category_id`, `project_stage_id`, `project_details`, `project_status_id`, `status_id`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 1, 'SAMPLE PROJECT', '5268 DIESEL ST. PALANAN MAKATI CITY', 1, 8, 1, 1, 0, 1, 'sample', 1, 2, '2014-07-27 19:46:22', '2014-07-29 07:02:32'),
(3, 2, NULL, NULL, 'NEW PROJECT', '5268 DIESEL ST. PALANAN MAKATI CITY', 1, 8, 1, 1, 0, 1, 'asdas', 1, 1, '2014-07-29 19:03:04', '2014-07-29 19:03:04');

-- --------------------------------------------------------

--
-- Table structure for table `project_app_statuses`
--

CREATE TABLE IF NOT EXISTS `project_app_statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_app_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `project_app_statuses`
--

INSERT INTO `project_app_statuses` (`id`, `project_app_status`) VALUES
(1, 'CREATED'),
(2, 'ASSIGNED'),
(3, 'CLOSED');

-- --------------------------------------------------------

--
-- Table structure for table `project_categories`
--

CREATE TABLE IF NOT EXISTS `project_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `project_categories`
--

INSERT INTO `project_categories` (`id`, `project_category`) VALUES
(1, 'Building');

-- --------------------------------------------------------

--
-- Table structure for table `project_classifications`
--

CREATE TABLE IF NOT EXISTS `project_classifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_classification` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `project_classifications`
--

INSERT INTO `project_classifications` (`id`, `project_classification`) VALUES
(1, 'New Construction'),
(2, 'Repainting');

-- --------------------------------------------------------

--
-- Table structure for table `project_contacts`
--

CREATE TABLE IF NOT EXISTS `project_contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(10) unsigned NOT NULL,
  `contact_id` int(10) unsigned NOT NULL,
  `contractor_group_id` int(10) unsigned NOT NULL,
  `role` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `project_contacts_project_id_foreign` (`project_id`),
  KEY `project_contacts_contact_id_foreign` (`contact_id`),
  KEY `project_contacts_contractor_group_id_foreign` (`contractor_group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `project_contacts`
--

INSERT INTO `project_contacts` (`id`, `project_id`, `contact_id`, `contractor_group_id`, `role`, `created_at`, `updated_at`) VALUES
(6, 2, 1, 1, 'programmer', '2014-07-31 02:34:15', '2014-07-31 02:34:15'),
(7, 2, 4, 1, 'manager', '2014-07-31 02:35:30', '2014-07-31 02:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `project_contact_statuses`
--

CREATE TABLE IF NOT EXISTS `project_contact_statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_contact_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `project_contact_statuses`
--

INSERT INTO `project_contact_statuses` (`id`, `project_contact_status`) VALUES
(1, 'FOR APPROVAL'),
(2, 'APPROVED'),
(3, 'DENIED');

-- --------------------------------------------------------

--
-- Table structure for table `project_contractor_groups`
--

CREATE TABLE IF NOT EXISTS `project_contractor_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contractor_group` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `project_contractor_groups`
--

INSERT INTO `project_contractor_groups` (`id`, `contractor_group`) VALUES
(1, 'Contractor'),
(2, 'Main developer');

-- --------------------------------------------------------

--
-- Table structure for table `project_stages`
--

CREATE TABLE IF NOT EXISTS `project_stages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_stage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `project_stages`
--

INSERT INTO `project_stages` (`id`, `project_stage`, `description`) VALUES
(1, 'Bidding', 'bidding');

-- --------------------------------------------------------

--
-- Table structure for table `project_statuses`
--

CREATE TABLE IF NOT EXISTS `project_statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `project_statuses`
--

INSERT INTO `project_statuses` (`id`, `project_status`, `description`) VALUES
(1, 'ongioing', 'on going\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `project_sub_categories`
--

CREATE TABLE IF NOT EXISTS `project_sub_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_sub_category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `project_category_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project_sub_categories_project_category_id_foreign` (`project_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `region` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `area_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `regions_area_id_foreign` (`area_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `region`, `area_id`) VALUES
(1, 'Manila', 8);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(5, 'ADMIN', '2014-07-27 06:58:59', '2014-07-27 07:40:34'),
(8, 'AAA', '2014-07-27 07:18:52', '2014-07-27 07:36:34'),
(9, 'SUPERVISOR', '2014-07-27 19:02:12', '2014-07-27 19:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ident` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department_id` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `users_department_id_foreign` (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `ident`, `department_id`, `username`, `password`, `active`, `email`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rencie', 'Agbin', 'Bautista', '4107M', 1, 'admin', '$2y$10$Owk34JTCDJ/ynNdnu1nz..4GUtOS7ldWo6WjKEAEma1KfcAAVix0W', 1, 'rencie.bautista@yahoo.com', 'igZUhbHR6Gj1dHg8s14UY8oeYr0a2JgYd5k25xtpv4avTxFP1LwjQM2m5ew8', '2014-07-26 04:27:48', '2014-07-31 02:34:24'),
(2, 'Donato', 'Javid', 'Aldea', '2', 1, 'don', '$2y$10$bkrNNK6XR9/.wsf/4n0FeeNY82qYxZEhL.ZwkubCv8HjuCIQMLTW.', 1, 'donato@yahoo.com', 'ANiLUhEI4qtVl3dV2LLE2Si479lS3KVvDzVcup1Yg8cJCnvf3DMyFomh1Do5', '2014-07-29 03:06:55', '2014-07-31 02:32:47');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
  ADD CONSTRAINT `assigned_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `assigned_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `emails`
--
ALTER TABLE `emails`
  ADD CONSTRAINT `emails_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `phones`
--
ALTER TABLE `phones`
  ADD CONSTRAINT `phones_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`),
  ADD CONSTRAINT `phones_phone_type_id_foreign` FOREIGN KEY (`phone_type_id`) REFERENCES `phone_types` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`),
  ADD CONSTRAINT `projects_assigned_by_foreign` FOREIGN KEY (`assigned_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `projects_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `projects_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `projects_project_category_id_foreign` FOREIGN KEY (`project_category_id`) REFERENCES `project_categories` (`id`),
  ADD CONSTRAINT `projects_project_classification_id_foreign` FOREIGN KEY (`project_classification_id`) REFERENCES `project_classifications` (`id`),
  ADD CONSTRAINT `projects_project_stage_id_foreign` FOREIGN KEY (`project_stage_id`) REFERENCES `project_stages` (`id`),
  ADD CONSTRAINT `projects_project_status_id_foreign` FOREIGN KEY (`project_status_id`) REFERENCES `project_statuses` (`id`),
  ADD CONSTRAINT `projects_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`),
  ADD CONSTRAINT `projects_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `project_app_statuses` (`id`);

--
-- Constraints for table `project_contacts`
--
ALTER TABLE `project_contacts`
  ADD CONSTRAINT `project_contacts_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`),
  ADD CONSTRAINT `project_contacts_contractor_group_id_foreign` FOREIGN KEY (`contractor_group_id`) REFERENCES `project_contractor_groups` (`id`),
  ADD CONSTRAINT `project_contacts_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `project_sub_categories`
--
ALTER TABLE `project_sub_categories`
  ADD CONSTRAINT `project_sub_categories_project_category_id_foreign` FOREIGN KEY (`project_category_id`) REFERENCES `project_categories` (`id`);

--
-- Constraints for table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `regions_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
