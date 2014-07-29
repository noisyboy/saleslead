CREATE DATABASE  IF NOT EXISTS `sl` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sl`;
-- MySQL dump 10.13  Distrib 5.5.38, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: sl
-- ------------------------------------------------------
-- Server version	5.5.38-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `areas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `area` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` VALUES (8,'LUZON'),(9,'VISAYAS'),(10,'MINDANAO');
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assigned_roles`
--

DROP TABLE IF EXISTS `assigned_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assigned_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `assigned_roles_user_id_foreign` (`user_id`),
  KEY `assigned_roles_role_id_foreign` (`role_id`),
  CONSTRAINT `assigned_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `assigned_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assigned_roles`
--

LOCK TABLES `assigned_roles` WRITE;
/*!40000 ALTER TABLE `assigned_roles` DISABLE KEYS */;
INSERT INTO `assigned_roles` VALUES (3,1,5),(4,2,8);
/*!40000 ALTER TABLE `assigned_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
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
  KEY `contacts_created_by_foreign` (`created_by`),
  CONSTRAINT `contacts_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (1,1,'ZAI FOO','52','REN','CIE','BAUTISTA','ENGINEER',NULL,'2014-07-29 03:14:02','2014-07-29 03:14:02');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (1,'ADMIN');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emails`
--

DROP TABLE IF EXISTS `emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emails` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contact_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `emails_contact_id_foreign` (`contact_id`),
  CONSTRAINT `emails_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emails`
--

LOCK TABLES `emails` WRITE;
/*!40000 ALTER TABLE `emails` DISABLE KEYS */;
/*!40000 ALTER TABLE `emails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_06_24_103308_create_contacts_table',1),('2014_06_25_035934_create_phone_types_table',1),('2014_06_25_083447_create_contact_phones_table',1),('2014_06_25_143829_create_contact_emails_table',1),('2014_06_26_032708_create_projects_table',1),('2014_06_26_034208_create_area_table',1),('2014_06_26_045648_create_regions_table',1),('2014_06_26_104935_add_project_address_on_projects_table',1),('2014_06_27_100816_create_project_contractor_groups_table',1),('2014_06_27_113937_create_project_contacts_table',1),('2014_06_28_030443_create_project_classifications_table',1),('2014_06_28_041719_create_project_categories_table',1),('2014_06_30_014940_create_sub_categories_table',1),('2014_06_30_033657_create_project_stages_table',1),('2014_06_30_035640_create_project_statuses_table',1),('2014_06_30_063204_add_project_details_on_project_table',1),('2014_07_02_055648_create_departments_table',1),('2014_07_04_012330_create_users_table',1),('2014_07_24_064550_add_created_by_on_contants_table',1),('2014_07_24_091024_add_created_by_on_project_table',1),('2014_07_26_012825_entrust_setup_tables',1),('2014_07_29_134617_add_assigned_to_in_projects',2),('2014_07_29_142335_create_project_status_on_app',3),('2014_07_29_143124_add_project_app_status_on_project',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1,5),(2,2,5),(3,3,5),(4,4,5),(5,5,5),(6,6,5),(7,7,5),(8,8,5);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'manage_areas','Manage Areas','2014-07-26 04:27:48','2014-07-26 04:27:48'),(2,'manage_regions','Manage Regions','2014-07-26 04:27:48','2014-07-26 04:27:48'),(3,'manage_contractorgroups','Manage Contractor Groups','2014-07-26 04:27:48','2014-07-26 04:27:48'),(4,'manage_projectclassifications','Manage Project Classifications','2014-07-26 04:27:48','2014-07-26 04:27:48'),(5,'manage_projectcategories','Manage Project Categories','2014-07-26 04:27:48','2014-07-26 04:27:48'),(6,'manage_projectsubcategories','Manage Project Sub Categories','2014-07-26 04:27:48','2014-07-26 04:27:48'),(7,'manage_projectstages','Manage Project Stages','2014-07-26 04:27:48','2014-07-26 04:27:48'),(8,'manage_projectstatuses','Manage Project Statuses','2014-07-26 04:27:48','2014-07-26 04:27:48');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phone_types`
--

DROP TABLE IF EXISTS `phone_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phone_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phone_types`
--

LOCK TABLES `phone_types` WRITE;
/*!40000 ALTER TABLE `phone_types` DISABLE KEYS */;
INSERT INTO `phone_types` VALUES (1,'HOME'),(2,'WORK'),(3,'MOBILE'),(4,'OTHER');
/*!40000 ALTER TABLE `phone_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phones`
--

DROP TABLE IF EXISTS `phones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_type_id` int(10) unsigned NOT NULL,
  `contact_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `phones_phone_type_id_foreign` (`phone_type_id`),
  KEY `phones_contact_id_foreign` (`contact_id`),
  CONSTRAINT `phones_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`),
  CONSTRAINT `phones_phone_type_id_foreign` FOREIGN KEY (`phone_type_id`) REFERENCES `phone_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phones`
--

LOCK TABLES `phones` WRITE;
/*!40000 ALTER TABLE `phones` DISABLE KEYS */;
/*!40000 ALTER TABLE `phones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_app_statuses`
--

DROP TABLE IF EXISTS `project_app_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_app_statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_app_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_app_statuses`
--

LOCK TABLES `project_app_statuses` WRITE;
/*!40000 ALTER TABLE `project_app_statuses` DISABLE KEYS */;
INSERT INTO `project_app_statuses` VALUES (1,'CREATED'),(2,'ASSIGNED'),(3,'CLOSED');
/*!40000 ALTER TABLE `project_app_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_categories`
--

DROP TABLE IF EXISTS `project_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_categories`
--

LOCK TABLES `project_categories` WRITE;
/*!40000 ALTER TABLE `project_categories` DISABLE KEYS */;
INSERT INTO `project_categories` VALUES (1,'Building');
/*!40000 ALTER TABLE `project_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_classifications`
--

DROP TABLE IF EXISTS `project_classifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_classifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_classification` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_classifications`
--

LOCK TABLES `project_classifications` WRITE;
/*!40000 ALTER TABLE `project_classifications` DISABLE KEYS */;
INSERT INTO `project_classifications` VALUES (1,'New Construction'),(2,'Repainting');
/*!40000 ALTER TABLE `project_classifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_contacts`
--

DROP TABLE IF EXISTS `project_contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_contacts` (
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
  KEY `project_contacts_contractor_group_id_foreign` (`contractor_group_id`),
  CONSTRAINT `project_contacts_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`),
  CONSTRAINT `project_contacts_contractor_group_id_foreign` FOREIGN KEY (`contractor_group_id`) REFERENCES `project_contractor_groups` (`id`),
  CONSTRAINT `project_contacts_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_contacts`
--

LOCK TABLES `project_contacts` WRITE;
/*!40000 ALTER TABLE `project_contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_contractor_groups`
--

DROP TABLE IF EXISTS `project_contractor_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_contractor_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contractor_group` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_contractor_groups`
--

LOCK TABLES `project_contractor_groups` WRITE;
/*!40000 ALTER TABLE `project_contractor_groups` DISABLE KEYS */;
INSERT INTO `project_contractor_groups` VALUES (1,'Contractor'),(2,'Main developer');
/*!40000 ALTER TABLE `project_contractor_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_stages`
--

DROP TABLE IF EXISTS `project_stages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_stages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_stage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_stages`
--

LOCK TABLES `project_stages` WRITE;
/*!40000 ALTER TABLE `project_stages` DISABLE KEYS */;
INSERT INTO `project_stages` VALUES (1,'Bidding','bidding');
/*!40000 ALTER TABLE `project_stages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_statuses`
--

DROP TABLE IF EXISTS `project_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_statuses`
--

LOCK TABLES `project_statuses` WRITE;
/*!40000 ALTER TABLE `project_statuses` DISABLE KEYS */;
INSERT INTO `project_statuses` VALUES (1,'ongioing','on going\r\n');
/*!40000 ALTER TABLE `project_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_sub_categories`
--

DROP TABLE IF EXISTS `project_sub_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_sub_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_sub_category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `project_category_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project_sub_categories_project_category_id_foreign` (`project_category_id`),
  CONSTRAINT `project_sub_categories_project_category_id_foreign` FOREIGN KEY (`project_category_id`) REFERENCES `project_categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_sub_categories`
--

LOCK TABLES `project_sub_categories` WRITE;
/*!40000 ALTER TABLE `project_sub_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_sub_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
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
  KEY `projects_status_id_foreign` (`status_id`),
  CONSTRAINT `projects_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `project_app_statuses` (`id`),
  CONSTRAINT `projects_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`),
  CONSTRAINT `projects_assigned_by_foreign` FOREIGN KEY (`assigned_by`) REFERENCES `users` (`id`),
  CONSTRAINT `projects_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `users` (`id`),
  CONSTRAINT `projects_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `projects_project_category_id_foreign` FOREIGN KEY (`project_category_id`) REFERENCES `project_categories` (`id`),
  CONSTRAINT `projects_project_classification_id_foreign` FOREIGN KEY (`project_classification_id`) REFERENCES `project_classifications` (`id`),
  CONSTRAINT `projects_project_stage_id_foreign` FOREIGN KEY (`project_stage_id`) REFERENCES `project_stages` (`id`),
  CONSTRAINT `projects_project_status_id_foreign` FOREIGN KEY (`project_status_id`) REFERENCES `project_statuses` (`id`),
  CONSTRAINT `projects_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (2,1,2,1,'SAMPLE PROJECT','5268 DIESEL ST. PALANAN MAKATI CITY',1,8,1,1,0,1,'sample',1,2,'2014-07-27 19:46:22','2014-07-29 07:02:32');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `region` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `area_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `regions_area_id_foreign` (`area_id`),
  CONSTRAINT `regions_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regions`
--

LOCK TABLES `regions` WRITE;
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;
INSERT INTO `regions` VALUES (1,'Manila',8);
/*!40000 ALTER TABLE `regions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (5,'ADMIN','2014-07-27 06:58:59','2014-07-27 07:40:34'),(8,'AAA','2014-07-27 07:18:52','2014-07-27 07:36:34'),(9,'SUPERVISOR','2014-07-27 19:02:12','2014-07-27 19:05:46');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
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
  KEY `users_department_id_foreign` (`department_id`),
  CONSTRAINT `users_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Rencie','Agbin','Bautista','4107M',1,'admin','$2y$10$Owk34JTCDJ/ynNdnu1nz..4GUtOS7ldWo6WjKEAEma1KfcAAVix0W',1,'rencie.bautista@yahoo.com','rFhH9To1vKnBBTcdXlKDIMJiofBV1DnBjmAPk6u3QVIbf9mLB92IsJExZB0e','2014-07-26 04:27:48','2014-07-29 07:19:30'),(2,'Donato','Javid','Aldea','2',1,'don','$2y$10$bkrNNK6XR9/.wsf/4n0FeeNY82qYxZEhL.ZwkubCv8HjuCIQMLTW.',1,'donato@yahoo.com','9iiBRbckRvqkep3J5AGtYRE7T4EEvuxEdi3s9DrO0PLYOju5wkFEColnYvSa','2014-07-29 03:06:55','2014-07-29 07:00:18');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-07-29 23:25:32
