/*
 Navicat MySQL Data Transfer

 Source Server         : PABE 2024
 Source Server Type    : MySQL
 Source Server Version : 100411 (10.4.11-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : pabe-assets

 Target Server Type    : MySQL
 Target Server Version : 100411 (10.4.11-MariaDB)
 File Encoding         : 65001

 Date: 20/06/2024 21:42:39
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for assets
-- ----------------------------
DROP TABLE IF EXISTS `assets`;
CREATE TABLE `assets`  (
  `assets_id` bigint NOT NULL AUTO_INCREMENT,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `assets_tag_id` bigint NULL DEFAULT NULL,
  `purchased_from` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `purchase_date` timestamp NULL DEFAULT NULL,
  `brand` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `cost` double NULL DEFAULT NULL,
  `model` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `serial_no` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `site_id` bigint NULL DEFAULT NULL,
  `location_id` bigint NULL DEFAULT NULL,
  `category_id` bigint NULL DEFAULT NULL,
  `department_id` bigint NULL DEFAULT NULL,
  `user_id` bigint NULL DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `delete` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`assets_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of assets
-- ----------------------------

-- ----------------------------
-- Table structure for assets_photos
-- ----------------------------
DROP TABLE IF EXISTS `assets_photos`;
CREATE TABLE `assets_photos`  (
  `assets_photo_id` bigint NOT NULL AUTO_INCREMENT,
  `assets_id` bigint NULL DEFAULT NULL,
  `assets_photo` blob NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `delete` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`assets_photo_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of assets_photos
-- ----------------------------

-- ----------------------------
-- Table structure for audits
-- ----------------------------
DROP TABLE IF EXISTS `audits`;
CREATE TABLE `audits`  (
  `audit_id` bigint NOT NULL AUTO_INCREMENT,
  `audit_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `last_audited_by` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `audit_date` date NULL DEFAULT NULL,
  `site_id` bigint NULL DEFAULT NULL,
  `location_id` bigint NULL DEFAULT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `map` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `action` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `delete` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`audit_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of audits
-- ----------------------------

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `category_id` bigint NOT NULL,
  `category` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `delete` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category
-- ----------------------------

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers`  (
  `customer_id` bigint NOT NULL AUTO_INCREMENT,
  `full_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `company` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `address1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `address2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `city` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `state` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `zip` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `country` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `phone` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `cell` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `delete` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`customer_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customers
-- ----------------------------

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department`  (
  `deparment_id` bigint NOT NULL,
  `deparment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `delete` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`deparment_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of department
-- ----------------------------

-- ----------------------------
-- Table structure for docs
-- ----------------------------
DROP TABLE IF EXISTS `docs`;
CREATE TABLE `docs`  (
  `docs_id` bigint NOT NULL AUTO_INCREMENT,
  `assets_id` bigint NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `file_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `uploaded_date` timestamp NULL DEFAULT NULL,
  `user_id` bigint NULL DEFAULT NULL,
  `delete` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`docs_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of docs
-- ----------------------------

-- ----------------------------
-- Table structure for events
-- ----------------------------
DROP TABLE IF EXISTS `events`;
CREATE TABLE `events`  (
  `event_id` bigint NOT NULL AUTO_INCREMENT,
  `assets_id` bigint NULL DEFAULT NULL,
  `event_date` date NULL DEFAULT NULL,
  `event_type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `person_id` bigint NULL DEFAULT NULL,
  `location_id` bigint NULL DEFAULT NULL,
  `site_id` bigint NULL DEFAULT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `due_date` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `expires` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `delete` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`event_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of events
-- ----------------------------

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for history
-- ----------------------------
DROP TABLE IF EXISTS `history`;
CREATE TABLE `history`  (
  `history_id` bigint NOT NULL AUTO_INCREMENT,
  `history_date` timestamp NULL DEFAULT NULL,
  `event` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `field` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `changed_from` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `changed_to` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `user_id` bigint NULL DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `delete` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`history_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of history
-- ----------------------------

-- ----------------------------
-- Table structure for leasing_customer
-- ----------------------------
DROP TABLE IF EXISTS `leasing_customer`;
CREATE TABLE `leasing_customer`  (
  `leasing_customer_id` bigint NOT NULL AUTO_INCREMENT,
  `full_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `company` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `address1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `address2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `city` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `state` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `zip` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `country` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `phone` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `cell` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `delete` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`leasing_customer_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of leasing_customer
-- ----------------------------

-- ----------------------------
-- Table structure for locations
-- ----------------------------
DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations`  (
  `location_id` bigint NOT NULL AUTO_INCREMENT,
  `site_id` bigint NULL DEFAULT NULL,
  `location` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `delete` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`location_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of locations
-- ----------------------------

-- ----------------------------
-- Table structure for maintenance
-- ----------------------------
DROP TABLE IF EXISTS `maintenance`;
CREATE TABLE `maintenance`  (
  `maintenance_id` bigint NOT NULL AUTO_INCREMENT,
  `assets_id` bigint NULL DEFAULT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `due_date` date NULL DEFAULT NULL,
  `maintenance_by` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `maintenance_status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `date_completed` date NULL DEFAULT NULL,
  `maintenance_cost` double NULL DEFAULT NULL,
  `repeating` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `frequency` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `delete` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`maintenance_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of maintenance
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for persons
-- ----------------------------
DROP TABLE IF EXISTS `persons`;
CREATE TABLE `persons`  (
  `person_id` bigint NOT NULL AUTO_INCREMENT,
  `full_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `employee_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `phone` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `site_id` bigint NULL DEFAULT NULL,
  `location_id` bigint NULL DEFAULT NULL,
  `department_id` bigint NULL DEFAULT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `delete` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`person_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of persons
-- ----------------------------

-- ----------------------------
-- Table structure for reservation
-- ----------------------------
DROP TABLE IF EXISTS `reservation`;
CREATE TABLE `reservation`  (
  `reservation_id` bigint NOT NULL AUTO_INCREMENT,
  `assets_id` bigint NULL DEFAULT NULL,
  `schedule_from` date NULL DEFAULT NULL,
  `schedule_to` date NULL DEFAULT NULL,
  `reserve_for` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `person_id` bigint NULL DEFAULT NULL,
  `site_id` bigint NULL DEFAULT NULL,
  `location_id` bigint NULL DEFAULT NULL,
  `customer_id` bigint NULL DEFAULT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `delete` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`reservation_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of reservation
-- ----------------------------

-- ----------------------------
-- Table structure for sites
-- ----------------------------
DROP TABLE IF EXISTS `sites`;
CREATE TABLE `sites`  (
  `site_id` bigint NOT NULL,
  `site` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `apt_suite` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `city` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `state` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `postal_code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `country` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `delete` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`site_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sites
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `user_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '0',
  PRIMARY KEY (`user_id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------

-- ----------------------------
-- Table structure for warranty
-- ----------------------------
DROP TABLE IF EXISTS `warranty`;
CREATE TABLE `warranty`  (
  `warranty_id` bigint NOT NULL AUTO_INCREMENT,
  `assets_id` bigint NULL DEFAULT NULL,
  `expiration_date` date NULL DEFAULT NULL,
  `length` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `delete` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`warranty_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of warranty
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
