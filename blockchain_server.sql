/*
 Navicat Premium Data Transfer

 Source Server         : dbblockchain
 Source Server Type    : MySQL
 Source Server Version : 100136
 Source Host           : localhost:3306
 Source Schema         : homeless

 Target Server Type    : MySQL
 Target Server Version : 100136
 File Encoding         : 65001

 Date: 01/01/2020 09:28:14
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for auction_histories
-- ----------------------------
DROP TABLE IF EXISTS `auction_histories`;
CREATE TABLE `auction_histories`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `value` double NULL DEFAULT NULL,
  `hash` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `auction_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `auction_histories_auction_id_foreign`(`auction_id`) USING BTREE,
  INDEX `auction_histories_user_id_foreign`(`user_id`) USING BTREE,
  CONSTRAINT `auction_histories_auction_id_foreign` FOREIGN KEY (`auction_id`) REFERENCES `auctions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `auction_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC ;

-- ----------------------------
-- Records of auction_histories
-- ----------------------------
INSERT INTO `auction_histories` VALUES (1, 1585.4545, '0x7fa55cf74e28dde06565d80f58db0d9c44560b9bb30f61d638abad85e4da8cee', NULL, 0, 1, 2, NULL, '2019-12-30 00:00:00', '2019-12-30 00:00:00');

-- ----------------------------
-- Table structure for auctions
-- ----------------------------
DROP TABLE IF EXISTS `auctions`;
CREATE TABLE `auctions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `auction_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `auction_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `auction_detail` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `auction_start_time` timestamp(0) NULL DEFAULT NULL,
  `auction_end_time` timestamp(0) NULL DEFAULT NULL,
  `auction_raised` double NULL DEFAULT NULL,
  `product_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `product_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `product_detail` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `production_author` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `auction_address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `auction_private_key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `auction_public_key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `donate_status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC ;

-- ----------------------------
-- Records of auctions
-- ----------------------------
INSERT INTO `auctions` VALUES (1, 'Aid to the Earthquake Victims in the Kurdish Region', NULL, 'Vestibulum id ligula porta felis euismod semper. Donec ullamcorper nulla non metus auctor fringilla. Maecenas sed diam eget risus varius blandit sit amet non magna. Donec ullamcorper nulla non metus auctor fringilla. Nullam quis risus eget urna mollis ornare vel eu leo. Aenean lacinia bibendum nulla sed consectetur.', '2019-12-28 21:44:59', '2019-12-28 21:44:59', 7500, 'At the Auction of the Ruby Slippers', '\\assets\\images\\product\\img1.jpg', 'The domes that West is building in Calabasas, which were reportedly inspired by the dome homes in Star War’s fictional planet “Tatooine.” | Courtesy of Los Angeles County Public Works', 'Kanye West', '0xaDE77C46Bab809E7cab3b0C4930d58f0F88bDaE9', '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283', '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283', 'new', 0, NULL, NULL, NULL);
INSERT INTO `auctions` VALUES (2, 'Food Not Bombs - Perth', NULL, 'Vestibulum id ligula porta felis euismod semper. Donec ullamcorper nulla non metus auctor fringilla. Maecenas sed diam eget risus varius blandit sit amet non magna. Donec ullamcorper nulla non metus auctor fringilla. Nullam quis risus eget urna mollis ornare vel eu leo. Aenean lacinia bibendum nulla sed consectetur.', '2020-01-01 11:44:59', '2020-01-01 14:44:59', 5500, 'At the Auction of the Ruby Slippers', '\\assets\\images\\product\\img2.jpg', 'The domes that West is building in Calabasas, which were reportedly inspired by the dome homes in Star War’s fictional planet “Tatooine.” | Courtesy of Los Angeles County Public Works', 'Kanye West', '0xaDE77C46Bab809E7cab3b0C4930d58f0F88bDaE9', '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283', '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283', 'new', 0, NULL, NULL, NULL);
INSERT INTO `auctions` VALUES (3, 'Chicago Coalition for the Homeless', NULL, 'Vestibulum id ligula porta felis euismod semper. Donec ullamcorper nulla non metus auctor fringilla. Maecenas sed diam eget risus varius blandit sit amet non magna. Donec ullamcorper nulla non metus auctor fringilla. Nullam quis risus eget urna mollis ornare vel eu leo. Aenean lacinia bibendum nulla sed consectetur.', '2019-12-31 09:44:59', '2019-12-31 11:44:59', 1200, 'At the Auction of the Ruby Slippers', '\\assets\\images\\product\\img3.jpg', 'The domes that West is building in Calabasas, which were reportedly inspired by the dome homes in Star War’s fictional planet “Tatooine.” | Courtesy of Los Angeles County Public Works', 'Kanye West', '0xaDE77C46Bab809E7cab3b0C4930d58f0F88bDaE9', '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283', '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283', 'new', 0, NULL, NULL, NULL);
INSERT INTO `auctions` VALUES (4, 'New England Center and Home for Veterans', NULL, 'Vestibulum id ligula porta felis euismod semper. Donec ullamcorper nulla non metus auctor fringilla. Maecenas sed diam eget risus varius blandit sit amet non magna. Donec ullamcorper nulla non metus auctor fringilla. Nullam quis risus eget urna mollis ornare vel eu leo. Aenean lacinia bibendum nulla sed consectetur.', '2019-12-30 23:44:59', '2019-12-31 01:44:59', 9500, 'At the Auction of the Ruby Slippers', '\\assets\\images\\product\\img4.jpg', 'The domes that West is building in Calabasas, which were reportedly inspired by the dome homes in Star War’s fictional planet “Tatooine.” | Courtesy of Los Angeles County Public Works', 'Kanye West', '0xaDE77C46Bab809E7cab3b0C4930d58f0F88bDaE9', '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283', '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283', 'new', 0, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for donate_activities
-- ----------------------------
DROP TABLE IF EXISTS `donate_activities`;
CREATE TABLE `donate_activities`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `activity_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `activity_detail` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC ;

-- ----------------------------
-- Records of donate_activities
-- ----------------------------
INSERT INTO `donate_activities` VALUES (1, '1Sponsor meals for 50 children for 1 full year.', NULL, 0, NULL, '2019-12-30 00:00:00', '2019-12-30 00:00:00');
INSERT INTO `donate_activities` VALUES (2, 'Sponsor mid-day meals for one month.', NULL, 0, NULL, '2019-12-30 00:00:00', '2019-12-30 00:00:00');
INSERT INTO `donate_activities` VALUES (3, 'You can donate clothes, blankets and ect...', NULL, 0, NULL, '2019-12-30 00:00:00', '2019-12-30 00:00:00');
INSERT INTO `donate_activities` VALUES (4, 'You can donate food material like rice, veggies.', NULL, 0, NULL, '2019-12-30 00:00:00', '2019-12-30 00:00:00');

-- ----------------------------
-- Table structure for donate_categories
-- ----------------------------
DROP TABLE IF EXISTS `donate_categories`;
CREATE TABLE `donate_categories`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `category_detail` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC ;

-- ----------------------------
-- Records of donate_categories
-- ----------------------------
INSERT INTO `donate_categories` VALUES (1, 'Food Pantries', NULL, 0, NULL, NULL, NULL);
INSERT INTO `donate_categories` VALUES (2, 'Soup Kitchens', NULL, 0, NULL, NULL, NULL);
INSERT INTO `donate_categories` VALUES (3, 'Food Banks', NULL, 0, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for donate_histories
-- ----------------------------
DROP TABLE IF EXISTS `donate_histories`;
CREATE TABLE `donate_histories`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `value` double NULL DEFAULT NULL,
  `hash` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `donate_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `donate_histories_donate_id_foreign`(`donate_id`) USING BTREE,
  INDEX `donate_histories_user_id_foreign`(`user_id`) USING BTREE,
  CONSTRAINT `donate_histories_donate_id_foreign` FOREIGN KEY (`donate_id`) REFERENCES `donates` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `donate_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC ;

-- ----------------------------
-- Records of donate_histories
-- ----------------------------
INSERT INTO `donate_histories` VALUES (1, 350, '0x7fa55cf74e28dde06565d80f58db0d9c44560b9bb30f61d638abad85e4da8cee', NULL, 0, 6, 1, NULL, '2019-12-30 00:00:00', '2019-12-30 00:00:00');

-- ----------------------------
-- Table structure for donates
-- ----------------------------
DROP TABLE IF EXISTS `donates`;
CREATE TABLE `donates`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `donate_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `donate_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `donate_detail` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `donate_start_time` timestamp(0) NULL DEFAULT NULL,
  `donate_end_time` timestamp(0) NULL DEFAULT NULL,
  `donate_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `donate_goal` double NULL DEFAULT NULL,
  `donate_raised` double NULL DEFAULT NULL,
  `donate_address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `donate_private_key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `donate_public_key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `donate_status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `donates_category_id_foreign`(`category_id`) USING BTREE,
  CONSTRAINT `donates_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `donate_categories` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC ;

-- ----------------------------
-- Records of donates
-- ----------------------------
INSERT INTO `donates` VALUES (1, 'Saved by Soup - mental health help for homeless people', NULL, 'There are approximately 1600 Soup Kitchens in London. Between them, they have only one goal: To help the 180,000 people officially designated as homeless in our capital city (data from Shelter).', '2020-01-15 00:00:00', '2020-01-30 00:00:00', 'assets\\images\\portfolio\\img-1.jpg', 35000, 0, '0xaDE77C46Bab809E7cab3b0C4930d58f0F88bDaE9', '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283', '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283', 'new', 0, 2, NULL, NULL, NULL);
INSERT INTO `donates` VALUES (2, 'Crowdfunding to rebuild our homes destroyed in Portugal fire', NULL, 'Help us raise funds to rebuild homes and restore the lives of people ruined by the catastrophic wildfire that swept through rural Portugal, this October.', '2020-01-15 00:00:00', '2020-03-30 00:00:00', 'assets\\images\\portfolio\\img-2.jpg', 55000, 0, '0xaDE77C46Bab809E7cab3b0C4930d58f0F88bDaE9', '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283', '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283', 'new', 0, 1, NULL, NULL, NULL);
INSERT INTO `donates` VALUES (3, 'Operation Care Kit Detroit: Winter Homeless Survival Kit Drive', NULL, 'This year, we\'re extending our efforts to provide meals as they\'re donated. Learn more about our monetary donation methods below. Physical clothing drop off locations to be announced soon.', '2020-01-05 00:00:00', '2020-02-05 00:00:00', 'assets\\images\\portfolio\\img-3.jpg', 55000, 0, '0xaDE77C46Bab809E7cab3b0C4930d58f0F88bDaE9', '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283', '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283', 'new', 0, 3, NULL, NULL, NULL);
INSERT INTO `donates` VALUES (4, 'Supply Quality Foods To Africa\'s Village Area', NULL, 'We are charity, non-profit, fundraising, NGO organizations. Our activities are taken place around the world, let contribute to them with us', '2019-12-30 00:00:00', '2019-12-30 00:00:00', 'assets\\images\\portfolio\\img-1.jpg', 18000, 1000.564, '0xaDE77C46Bab809E7cab3b0C4930d58f0F88bDaE9', '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283', '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283', 'new', 0, 1, NULL, '2019-12-30 16:44:59', '2019-12-30 16:44:59');
INSERT INTO `donates` VALUES (5, 'Bishop O\'Byrne Housing Association', NULL, 'Our activities are taken place around the world, let contribute to them with us', '2019-12-30 00:00:00', '2019-12-30 00:00:00', 'assets\\images\\portfolio\\img-2.jpg', 9000, 2654.564, '0xaDE77C46Bab809E7cab3b0C4930d58f0F88bDaE9', '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283', '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283', 'new', 0, 2, NULL, '2019-12-30 16:44:59', '2019-12-30 16:44:59');
INSERT INTO `donates` VALUES (6, 'Chisholm Services for Children', NULL, 'Our activities are taken place around the world, let contribute to them with us', '2019-12-30 00:00:00', '2019-12-30 00:00:00', 'assets\\images\\portfolio\\img-3.jpg', 9000, 2654.564, '0xaDE77C46Bab809E7cab3b0C4930d58f0F88bDaE9', '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283', '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283', 'new', 0, 3, NULL, '2019-12-30 16:44:59', '2019-12-30 16:44:59');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC ;

-- ----------------------------
-- Table structure for join_auctions_activities
-- ----------------------------
DROP TABLE IF EXISTS `join_auctions_activities`;
CREATE TABLE `join_auctions_activities`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `auction_id` bigint(20) UNSIGNED NOT NULL,
  `activity_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `join_auctions_activities_auction_id_foreign`(`auction_id`) USING BTREE,
  INDEX `join_auctions_activities_activity_id_foreign`(`activity_id`) USING BTREE,
  CONSTRAINT `join_auctions_activities_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `donate_activities` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `join_auctions_activities_auction_id_foreign` FOREIGN KEY (`auction_id`) REFERENCES `auctions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC ;

-- ----------------------------
-- Records of join_auctions_activities
-- ----------------------------
INSERT INTO `join_auctions_activities` VALUES (1, 1, 1, NULL, '2019-12-30 00:00:00', '2019-12-30 00:00:00');
INSERT INTO `join_auctions_activities` VALUES (2, 1, 2, NULL, '2019-12-30 00:00:00', '2019-12-30 00:00:00');
INSERT INTO `join_auctions_activities` VALUES (3, 2, 3, NULL, '2019-12-30 00:00:00', '2019-12-30 00:00:00');
INSERT INTO `join_auctions_activities` VALUES (4, 1, 4, NULL, '2019-12-30 00:00:00', '2019-12-30 00:00:00');

-- ----------------------------
-- Table structure for join_auctions_locations
-- ----------------------------
DROP TABLE IF EXISTS `join_auctions_locations`;
CREATE TABLE `join_auctions_locations`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `auction_id` bigint(20) UNSIGNED NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `join_auctions_locations_auction_id_foreign`(`auction_id`) USING BTREE,
  INDEX `join_auctions_locations_location_id_foreign`(`location_id`) USING BTREE,
  CONSTRAINT `join_auctions_locations_auction_id_foreign` FOREIGN KEY (`auction_id`) REFERENCES `auctions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `join_auctions_locations_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC ;

-- ----------------------------
-- Records of join_auctions_locations
-- ----------------------------
INSERT INTO `join_auctions_locations` VALUES (1, 3, 1, NULL, '2019-12-30 00:00:00', '2019-12-30 00:00:00');

-- ----------------------------
-- Table structure for join_donates_activities
-- ----------------------------
DROP TABLE IF EXISTS `join_donates_activities`;
CREATE TABLE `join_donates_activities`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `donate_id` bigint(20) UNSIGNED NOT NULL,
  `activity_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `join_donates_activities_donate_id_foreign`(`donate_id`) USING BTREE,
  INDEX `join_donates_activities_activity_id_foreign`(`activity_id`) USING BTREE,
  CONSTRAINT `join_donates_activities_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `donate_activities` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `join_donates_activities_donate_id_foreign` FOREIGN KEY (`donate_id`) REFERENCES `donates` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC ;

-- ----------------------------
-- Records of join_donates_activities
-- ----------------------------
INSERT INTO `join_donates_activities` VALUES (1, 6, 1, NULL, '2019-12-30 00:00:00', '2019-12-30 00:00:00');
INSERT INTO `join_donates_activities` VALUES (2, 6, 2, NULL, '2019-12-30 00:00:00', '2019-12-30 00:00:00');
INSERT INTO `join_donates_activities` VALUES (3, 6, 3, NULL, '2019-12-30 00:00:00', '2019-12-30 00:00:00');
INSERT INTO `join_donates_activities` VALUES (4, 6, 4, NULL, '2019-12-30 00:00:00', '2019-12-30 00:00:00');

-- ----------------------------
-- Table structure for join_donates_locations
-- ----------------------------
DROP TABLE IF EXISTS `join_donates_locations`;
CREATE TABLE `join_donates_locations`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `donate_id` bigint(20) UNSIGNED NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `join_donates_locations_donate_id_foreign`(`donate_id`) USING BTREE,
  INDEX `join_donates_locations_location_id_foreign`(`location_id`) USING BTREE,
  CONSTRAINT `join_donates_locations_donate_id_foreign` FOREIGN KEY (`donate_id`) REFERENCES `donates` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `join_donates_locations_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC ;

-- ----------------------------
-- Records of join_donates_locations
-- ----------------------------
INSERT INTO `join_donates_locations` VALUES (1, 6, 3, NULL, '2019-12-30 00:00:00', '2019-12-30 00:00:00');

-- ----------------------------
-- Table structure for join_donates_users
-- ----------------------------
DROP TABLE IF EXISTS `join_donates_users`;
CREATE TABLE `join_donates_users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `hash` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `donate_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `join_donates_users_donate_id_foreign`(`donate_id`) USING BTREE,
  INDEX `join_donates_users_user_id_foreign`(`user_id`) USING BTREE,
  CONSTRAINT `join_donates_users_donate_id_foreign` FOREIGN KEY (`donate_id`) REFERENCES `donates` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `join_donates_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC ;

-- ----------------------------
-- Table structure for join_orders_products
-- ----------------------------
DROP TABLE IF EXISTS `join_orders_products`;
CREATE TABLE `join_orders_products`  (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` double NOT NULL DEFAULT 0,
  `price` double NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `join_orders_products_order_id_foreign`(`order_id`) USING BTREE,
  INDEX `join_orders_products_product_id_foreign`(`product_id`) USING BTREE,
  CONSTRAINT `join_orders_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `join_orders_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC ;

-- ----------------------------
-- Records of join_orders_products
-- ----------------------------
INSERT INTO `join_orders_products` VALUES (1, 1, 1, 15, NULL, NULL);
INSERT INTO `join_orders_products` VALUES (1, 2, 2, 10.36, NULL, NULL);
INSERT INTO `join_orders_products` VALUES (2, 3, 1, 15.36, NULL, NULL);
INSERT INTO `join_orders_products` VALUES (2, 4, 4, 15.36, NULL, NULL);
INSERT INTO `join_orders_products` VALUES (3, 1, 1, 67.36, NULL, NULL);
INSERT INTO `join_orders_products` VALUES (4, 2, 1, 64.36, NULL, NULL);

-- ----------------------------
-- Table structure for join_products_stores
-- ----------------------------
DROP TABLE IF EXISTS `join_products_stores`;
CREATE TABLE `join_products_stores`  (
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `join_products_stores_store_id_foreign`(`store_id`) USING BTREE,
  INDEX `join_products_stores_product_id_foreign`(`product_id`) USING BTREE,
  CONSTRAINT `join_products_stores_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `join_products_stores_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC ;

-- ----------------------------
-- Records of join_products_stores
-- ----------------------------
INSERT INTO `join_products_stores` VALUES (4, 1, NULL, NULL);
INSERT INTO `join_products_stores` VALUES (4, 2, NULL, NULL);
INSERT INTO `join_products_stores` VALUES (4, 3, NULL, NULL);
INSERT INTO `join_products_stores` VALUES (4, 4, NULL, NULL);

-- ----------------------------
-- Table structure for join_products_users
-- ----------------------------
DROP TABLE IF EXISTS `join_products_users`;
CREATE TABLE `join_products_users`  (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `join_products_users_user_id_foreign`(`user_id`) USING BTREE,
  INDEX `join_products_users_product_id_foreign`(`product_id`) USING BTREE,
  CONSTRAINT `join_products_users_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `join_products_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC ;

-- ----------------------------
-- Table structure for join_users_transactions
-- ----------------------------
DROP TABLE IF EXISTS `join_users_transactions`;
CREATE TABLE `join_users_transactions`  (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `join_users_transactions_user_id_foreign`(`user_id`) USING BTREE,
  INDEX `join_users_transactions_transaction_id_foreign`(`transaction_id`) USING BTREE,
  CONSTRAINT `join_users_transactions_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `join_users_transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC ;

-- ----------------------------
-- Records of join_users_transactions
-- ----------------------------
INSERT INTO `join_users_transactions` VALUES (24, 1, '2020-01-01 00:00:00', '2020-01-01 00:00:00', NULL);
INSERT INTO `join_users_transactions` VALUES (24, 2, '2020-01-01 00:00:00', '2020-01-01 00:00:00', NULL);

-- ----------------------------
-- Table structure for locations
-- ----------------------------
DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `location_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC ;

-- ----------------------------
-- Records of locations
-- ----------------------------
INSERT INTO `locations` VALUES (1, 'Alaska', 0, NULL, '2019-12-30 00:00:00', '2019-12-30 00:00:00');
INSERT INTO `locations` VALUES (2, 'California', 0, NULL, '2019-12-30 00:00:00', '2019-12-30 00:00:00');
INSERT INTO `locations` VALUES (3, 'New York', 0, NULL, '2019-12-30 00:00:00', '2019-12-30 00:00:00');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 302 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC ;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (126, '2019_12_17_160947_create_store_table', 1);
INSERT INTO `migrations` VALUES (295, '2014_10_12_000000_create_users_table', 2);
INSERT INTO `migrations` VALUES (296, '2014_10_12_100000_create_password_resets_table', 2);
INSERT INTO `migrations` VALUES (297, '2019_08_19_000000_create_failed_jobs_table', 2);
INSERT INTO `migrations` VALUES (298, '2019_12_16_060533_create_donate_table', 2);
INSERT INTO `migrations` VALUES (299, '2019_12_16_151855_create_auction_table', 2);
INSERT INTO `migrations` VALUES (300, '2019_12_16_160934_create_product_table', 2);
INSERT INTO `migrations` VALUES (301, '2019_12_16_160947_create_order_table', 2);

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_total` double NOT NULL DEFAULT 0,
  `order_tax` double NOT NULL DEFAULT 0,
  `order_address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hash` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC ;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (1, 75.56, 7.556, '0x5968b664460d17d35650932618eff7233d7401de', '0x6a0082aec4a0c999a0e5eb6bbcf71a43c3723be7bcdc999ff045dcd6bfe4ad93', NULL, NULL, NULL, NULL);
INSERT INTO `orders` VALUES (2, 150.46, 15.046, '0x5968b664460d17d35650932618eff7233d7401de', '0x6a0082aec4a0c999a0e5eb6bbcf71a43c3723be7bcdc999ff045dcd6bfe4ad93', NULL, NULL, NULL, NULL);
INSERT INTO `orders` VALUES (3, 97.76, 9.776, '0x5968b664460d17d35650932618eff7233d7401de', '0x6a0082aec4a0c999a0e5eb6bbcf71a43c3723be7bcdc999ff045dcd6bfe4ad93', NULL, NULL, NULL, NULL);
INSERT INTO `orders` VALUES (4, 67.41, 6.741, '0xda605fd5e003e6de0f33f6474080623fa6483e3e', '0x6a0082aec4a0c999a0e5eb6bbcf71a43c3723be7bcdc999ff045dcd6bfe4ad93', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC ;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sku` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_detail` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `product_price` double NOT NULL,
  `product_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC ;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 'Meat Products', 'ST1', NULL, 34, 'https://www.rednewswire.com/wp-content/uploads/2018/04/frozenmeat1.jpeg', NULL, NULL, NULL);
INSERT INTO `products` VALUES (2, 'Chicken Products', 'ST2', NULL, 15, 'https://nationalpostcom.files.wordpress.com/2018/04/gettyimages-98130644.jpg', NULL, NULL, NULL);
INSERT INTO `products` VALUES (3, 'Waitrose Homebaking', 'ST3', NULL, 78, 'https://www.britishcornershop.co.uk/img/cat/134.jpg', NULL, NULL, NULL);
INSERT INTO `products` VALUES (4, 'Seafood', 'ST4', NULL, 28, 'https://www.britishcornershop.co.uk/img/cat/60.jpg', NULL, NULL, NULL);
INSERT INTO `products` VALUES (5, 'Cooking Chocolate', 'ST5', NULL, 3.29, 'https://www.britishcornershop.co.uk/img/thumb/QWOP3224.jpg', NULL, NULL, NULL);
INSERT INTO `products` VALUES (6, 'Browse Waitrose Cereals', 'ST6', NULL, 32.29, 'https://www.britishcornershop.co.uk/img/cat/142.jpg', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC ;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'System Admin', 'web', '2019-12-30 16:44:56', '2019-12-30 16:44:56');
INSERT INTO `roles` VALUES (2, 'User', 'web', '2019-12-30 16:44:56', '2019-12-30 16:44:56');
INSERT INTO `roles` VALUES (3, 'Store', 'web', '2019-12-30 16:44:56', '2019-12-30 16:44:56');
INSERT INTO `roles` VALUES (4, 'Homeless', 'web', '2019-12-30 16:44:57', '2019-12-30 16:44:57');

-- ----------------------------
-- Table structure for transactions
-- ----------------------------
DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `hash` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `block` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `amount` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `price` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fee` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tax` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `detail` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `note` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `time_transaction` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC ;

-- ----------------------------
-- Records of transactions
-- ----------------------------
INSERT INTO `transactions` VALUES (1, NULL, NULL, 'get free token', '100', 'USD', NULL, NULL, NULL, NULL, NULL, 'pending', '2020-01-01 02:12:45', NULL, NULL, NULL);
INSERT INTO `transactions` VALUES (2, '0x63b57cc19e7b6a64cdf76f0b2d2846f1472cfd232b08e355f060b99a81060881', NULL, 'withdraw', '0.05', 'ETH', NULL, '0.0075', NULL, NULL, NULL, 'complete', '2020-01-01 02:13:17', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `birthday` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `score` int(11) NULL DEFAULT NULL,
  `access_key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email_verify` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `otp` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `otp_expired` timestamp(0) NULL DEFAULT NULL,
  `otp_verify` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `google_auth_verify` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `last_update_password` timestamp(0) NULL DEFAULT NULL,
  `last_local_login` timestamp(0) NULL DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username`) USING BTREE,
  INDEX `users_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC ;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', '$2y$10$0phssoVYcQpiLM708s8azeA0qunuV7wVy8nN.vcCn0vTQWTYczO2u', 'System Admin', '0900000000', '16-01-1996', NULL, 'admin@admin.com', NULL, NULL, '$2y$10$X20RveQ8U0h1N3fKwssK.OTrb.jumdlVRXX.EhUUw8eufSoiDge.i', 0, NULL, 'hu1MY', NULL, NULL, 0, 0, '2019-12-30 00:00:00', NULL, 0, 'Active', 1, 'CHLcYnkcppfsWOtP9JNBNCU3uyCqSQi0L1oa0ZufIZPfHUlPexdBAKWENcV2', '2019-12-30 00:00:00', '2019-12-30 00:00:00', NULL);
INSERT INTO `users` VALUES (2, 'user', '$2y$10$UfMn17mizJsKbWcAWRTTUOHJkPYkwDfMEROsvusrUR8copf2JIkpO', 'User', '0900000000', '16-01-1996', NULL, 'user@admin.com', NULL, NULL, '$2y$10$duehmNUDyQH8GZquqlMG4evjtVygvORrgxX1j8TbRNYFPhuIMYkEO', 0, NULL, '9Ie7W', NULL, NULL, 0, 0, '2019-12-30 00:00:00', NULL, 0, 'Active', 2, 'j6OOfovOT1', '2019-12-30 00:00:00', '2019-12-30 00:00:00', NULL);
INSERT INTO `users` VALUES (3, 'store', '$2y$10$mLFjUxDheuW3T.h9ng/hm.NSoq8E71rHK1rpp9EyfXasa5/eT3h66', 'Store', '0900000000', '16-01-1996', NULL, 'store@admin.com', NULL, NULL, '$2y$10$QwpzSxlfck22Ku008nISjOvUsXeRgi/Ts.MHnzyFYTkIYr53RWTOO', 0, NULL, 'emjJK', NULL, NULL, 0, 0, '2019-12-30 00:00:00', NULL, 0, 'Homeless Approve', 3, '4Jct6YLcXT', '2019-12-30 00:00:00', '2019-12-30 00:00:00', NULL);
INSERT INTO `users` VALUES (4, 'account00', '$2y$10$wvxZsQGxZm82dCihp3wUEuh.cBCZF.5umiQiZoSDHFn1EQohLs77y', 'account00', '0900000000', '16-01-1990', NULL, 'homeless@admin.com', NULL, NULL, '$2y$10$rPAZozRfeHvQVTztw627Ouf/Eu93i.WY6geuH4X4m1h88MEsriY1u', 0, NULL, 'HjgyD', NULL, NULL, 0, 0, '2019-12-30 00:00:00', NULL, 0, 'Active', 4, 'mH0DYy2MYC', '2019-12-30 00:00:00', '2019-12-30 00:00:00', NULL);
INSERT INTO `users` VALUES (5, 'account01', '$2y$10$DUpsUyWWyQJzZhwYq0oFOud9A4PdvxBCU2Xi4FVg6rqBJplbTp9Ka', 'account01', '0900000000', '16-01-1990', NULL, 'homeless@admin.com', NULL, NULL, '$2y$10$HeAfF6WWMmDkJOp6VSqaJe6NRmkSns.jP2YooGhAVZYezKV3.f8ZK', 0, NULL, 'EOnEt', NULL, NULL, 0, 0, '2019-12-30 00:00:00', NULL, 0, 'Active', 4, 'xVkeejlPAV', '2019-12-30 00:00:00', '2019-12-30 00:00:00', NULL);
INSERT INTO `users` VALUES (6, 'account02', '$2y$10$u9PgjKzb1XnZaP3ISBroReRESy0qPD6keip540d78H7RfUk55MDvi', 'account02', '0900000000', '16-01-1990', NULL, 'homeless@admin.com', NULL, NULL, '$2y$10$KQrn6gnGB5IO6nCbotTdje/b0K0ec.ZyxBh//t5IDBpx9vrYJ55p6', 0, NULL, '38989', NULL, NULL, 0, 0, '2019-12-30 00:00:00', NULL, 0, 'Active', 4, 'o8aOPw9sBQ', '2019-12-30 00:00:00', '2019-12-30 00:00:00', NULL);
INSERT INTO `users` VALUES (7, 'account03', '$2y$10$bMk9AcEIrcAfdspTyn3s7u0jCB7xzQ/AaWmahKc8nKnN8I0QYdLMi', 'account03', '0900000000', '16-01-1990', NULL, 'homeless@admin.com', NULL, NULL, '$2y$10$B5PfYPOu580WInMtKvUzu.RABmGmTP0EpHPZGzUp7FLGAkVA8hXGm', 0, NULL, 'IGSik', NULL, NULL, 0, 0, '2019-12-30 00:00:00', NULL, 0, 'Active', 4, '3aBJzb3rYO', '2019-12-30 00:00:00', '2019-12-30 00:00:00', NULL);
INSERT INTO `users` VALUES (8, 'account04', '$2y$10$crvRlbapkBrXhlquY9FORuWD1gcMj1Es3lx9Lb.tD5n/5QSeJZZ9G', 'account04', '0900000000', '16-01-1990', NULL, 'homeless@admin.com', NULL, NULL, '$2y$10$XKOrnoQteov7vc7xm1BYBuolMhvEYqBtFw0kQt0xON7P3.iBeSBL6', 0, NULL, 'p8Je6', NULL, NULL, 0, 0, '2019-12-30 00:00:00', NULL, 0, 'Active', 4, '9noSOEXtkt', '2019-12-30 00:00:00', '2019-12-30 00:00:00', NULL);
INSERT INTO `users` VALUES (9, 'account05', '$2y$10$7vQMNKpYETX6.vRjD/obHejDbrO3Mpizt7O0MWV2R4I2I0yb8LnXa', 'account05', '0900000000', '16-01-1990', NULL, 'homeless@admin.com', NULL, NULL, '$2y$10$ZpCyRJ6qNDpw1AixM8qdj.kFGuIfdT9hTcIZpPjkC74dyCCnn9iO2', 0, NULL, 'lKr1O', NULL, NULL, 0, 0, '2019-12-30 00:00:00', NULL, 0, 'Active', 4, 'TpKD0rMSaT', '2019-12-30 00:00:00', '2019-12-30 00:00:00', NULL);
INSERT INTO `users` VALUES (10, 'account06', '$2y$10$VXNaXLc3EdeLgCa4PNs8teM406vdw6/D/kFmL7n.oEq3X9kEDkHTC', 'account06', '0900000000', '16-01-1990', NULL, 'homeless@admin.com', NULL, NULL, '$2y$10$N83Kx8CmCe.zdnKQSifKV..BsJz5LPR.LenWK0Jfn4foZ/cD8c6Pm', 0, NULL, '7E9j7', NULL, NULL, 0, 0, '2019-12-30 00:00:00', NULL, 0, 'Active', 4, 'UJkfBFwvwY', '2019-12-30 00:00:00', '2019-12-30 00:00:00', NULL);
INSERT INTO `users` VALUES (11, 'account07', '$2y$10$tJdLw5WlEHV0uj.rSsIQNu2521XjIIuxaIRCTLs1f.qURSjIzWT26', 'account07', '0900000000', '16-01-1990', NULL, 'homeless@admin.com', NULL, NULL, '$2y$10$t1MeqIm4LJY.dIN2kd49eOo7YA67TIdQXod0FUsJSYEmpLdVV/.ei', 0, NULL, 'STIvI', NULL, NULL, 0, 0, '2019-12-30 00:00:00', NULL, 0, 'Active', 4, 'tOBsHfVRt6', '2019-12-30 00:00:00', '2019-12-30 00:00:00', NULL);
INSERT INTO `users` VALUES (12, 'account08', '$2y$10$RXGAr9owIgNK2Smx89sE4umqVi6LbnK38EPE2Mj0pqmRqEJkTqS1W', 'account08', '0900000000', '16-01-1990', NULL, 'homeless@admin.com', NULL, NULL, '$2y$10$jsUjtZV4sa6LF7pL7aOP8.Ihnf12xKs6aGQrDwjZCDwwMG/1p0uBm', 0, NULL, 'xzho5', NULL, NULL, 0, 0, '2019-12-30 00:00:00', NULL, 0, 'Active', 4, 'odnoibLEvF', '2019-12-30 00:00:00', '2019-12-30 00:00:00', NULL);
INSERT INTO `users` VALUES (13, 'account09', '$2y$10$nPVie6byFep1u/6BC3bvLe9d/apYjYydca0fstAJ2EzV/PGyDKmum', 'account09', '0900000000', '16-01-1990', NULL, 'homeless@admin.com', NULL, NULL, '$2y$10$Uku2L2Z66j62K2zOC2FZ3OKEBQLP3.dMwwZy8aK37LP7Xx4VEecHy', 0, NULL, 'Pwzj4', NULL, NULL, 0, 0, '2019-12-30 00:00:00', NULL, 0, 'Active', 4, 'vhPefHjSWz', '2019-12-30 00:00:00', '2019-12-30 00:00:00', NULL);
INSERT INTO `users` VALUES (14, 'account010', '$2y$10$eK3d45RZkdp8p9VHZ8LdHekvCsBED8lRjD4coMss7fFezlT2MU1He', 'account010', '0900000000', '16-01-1990', NULL, 'homeless@admin.com', NULL, NULL, '$2y$10$v5ViwPyfy6k0hYrhosJS2.ow9l8LfXh.9rvHVK80MAE5CI7TQBbF6', 0, NULL, 'AqgSL', NULL, NULL, 0, 0, '2019-12-30 00:00:00', NULL, 0, 'Active', 4, 'g7q9YShL23', '2019-12-30 00:00:00', '2019-12-30 00:00:00', NULL);
INSERT INTO `users` VALUES (15, 'account011', '$2y$10$gh0h.RtY1Nt7TRrfd6eEK.9yvWAwmM/v0B4ZfbPjr7qd59VyG8bPO', 'account011', '0900000000', '16-01-1990', NULL, 'homeless@admin.com', NULL, NULL, '$2y$10$GThsXQjiC2/qKcdjR7FxLOqYE0y4hekrBjZ0IIWGhNf6o3ogkANVS', 0, NULL, 'YVwpJ', NULL, NULL, 0, 0, '2019-12-30 00:00:00', NULL, 0, 'Active', 4, 'JaPR18da1U', '2019-12-30 00:00:00', '2019-12-30 00:00:00', NULL);
INSERT INTO `users` VALUES (16, 'account012', '$2y$10$mJrvBZCDgjtM/vLTo.k9Ge3RwAKey1hdSy5YWZpdXo76Cf5rVcfuG', 'account012', '0900000000', '16-01-1990', NULL, 'homeless@admin.com', NULL, NULL, '$2y$10$qI4vQUxPWTj5nfYT1gb4U.kwLDYB1GuT5F2dzX3bKcwHCXqTThhjW', 0, NULL, 'fXhhR', NULL, NULL, 0, 0, '2019-12-30 00:00:00', NULL, 0, 'Active', 4, 'wBHUPWL2l7', '2019-12-30 00:00:00', '2019-12-30 00:00:00', NULL);
INSERT INTO `users` VALUES (17, 'account013', '$2y$10$Kt73inTBmLO/YT9/tFLBXeSADug6dSwA8Y4eGAH2IIWOmL92oMMPy', 'account013', '0900000000', '16-01-1990', NULL, 'homeless@admin.com', NULL, NULL, '$2y$10$dpLjB48AxrKLhZ1PXlgr2.qfwncqYH5EI0wEzAM449B8Zo8Mxlea.', 0, NULL, 'z8Ttr', NULL, NULL, 0, 0, '2019-12-30 00:00:00', NULL, 0, 'Active', 4, 'HTFcwvX8yn', '2019-12-30 00:00:00', '2019-12-30 00:00:00', NULL);
INSERT INTO `users` VALUES (18, 'account014', '$2y$10$ulLTeXafLe4Wjta56cCpcuQU2algovWTV9F.wS4nz4gAjVv7aOafy', 'account014', '0900000000', '16-01-1990', NULL, 'homeless@admin.com', NULL, NULL, '$2y$10$U8K.UzRPX.m4TRaZ7VO1yOHigvpI0dTHcuhZOUbAmLwY6Un3iqE8S', 0, NULL, 'f9y3c', NULL, NULL, 0, 0, '2019-12-30 00:00:00', NULL, 0, 'Active', 4, 'bBJJG0dqon', '2019-12-30 00:00:00', '2019-12-30 00:00:00', NULL);
INSERT INTO `users` VALUES (19, 'account015', '$2y$10$xMbpbpJmberzVam7yVdf7exIBH1r7Cjn4nxYJXaICXBWN85bwGkGe', 'account015', '0900000000', '16-01-1990', NULL, 'homeless@admin.com', NULL, NULL, '$2y$10$UKEU0GKPsSKObfV8mgGrpuHgyWpX9Ti0c57r8Jy.83LzRyfDvHC5C', 0, NULL, 'MMNc5', NULL, NULL, 0, 0, '2019-12-30 00:00:00', NULL, 0, 'Active', 4, 'GBd8As6WBu', '2019-12-30 00:00:00', '2019-12-30 00:00:00', NULL);
INSERT INTO `users` VALUES (20, 'account016', '$2y$10$lFyRGxHQme//2DkxVPft0uB.nt.eY8ak3wGl.AlHzqru.uxOApdT6', 'account016', '0900000000', '16-01-1990', NULL, 'homeless@admin.com', NULL, NULL, '$2y$10$MQBVdNRcbAHtx2wV3BaQMOss9FrQZlkbA5YHmbcCyNJ1IRndaB7mO', 0, NULL, '5cvmz', NULL, NULL, 0, 0, '2019-12-30 00:00:00', NULL, 0, 'Active', 4, 'kzLI48ifIK', '2019-12-30 00:00:00', '2019-12-30 00:00:00', NULL);
INSERT INTO `users` VALUES (21, 'account017', '$2y$10$GHTNGSBMCOYxeGA/mbSNEuONSjE9sC4eM5Enw8mHEhEiMf9X6AaAm', 'account017', '0900000000', '16-01-1990', NULL, 'homeless@admin.com', NULL, NULL, '$2y$10$LBJPrCAvoZsLtJfECkk2xO8L2DLC5HuaMgH6L3wTaJf9lU0BfvuP6', 0, NULL, 'Usu8O', NULL, NULL, 0, 0, '2019-12-30 00:00:00', NULL, 0, 'Active', 4, 'JtphpV40DI', '2019-12-30 00:00:00', '2019-12-30 00:00:00', NULL);
INSERT INTO `users` VALUES (22, 'account018', '$2y$10$JgVsflP2nQUqz2D4pZXtAuXtyFvbG7Isulb.YWP6Aoh8BHxyvRLzG', 'account018', '0900000000', '16-01-1990', NULL, 'homeless@admin.com', NULL, NULL, '$2y$10$3/wD9Y9erECeI0hkleOqZ.siu0csdtIkIywafbwTGwsM0NgY2njsi', 0, NULL, 'biHvF', NULL, NULL, 0, 0, '2019-12-30 00:00:00', NULL, 0, 'Active', 4, '5HOuXfbd00', '2019-12-30 00:00:00', '2019-12-30 00:00:00', NULL);
INSERT INTO `users` VALUES (23, 'account019', '$2y$10$mn0POnw/2jH/bZSKQmr6su5ogCWb5PAUWg/FJfQv56o55Za/xjjCm', 'account019', '0900000000', '16-01-1990', NULL, 'homeless@admin.com', NULL, NULL, '$2y$10$iO.ooEaF4X80bYMeQqkS1ex2XSAqoaPaKnx2SdScGtHohAB7HvToy', 0, NULL, 'p4d6V', NULL, NULL, 0, 0, '2019-12-30 00:00:00', NULL, 0, 'Active', 4, 'KuKKFFRqAR', '2019-12-30 00:00:00', '2019-12-30 00:00:00', NULL);
INSERT INTO `users` VALUES (24, 'homeless1', '$2y$10$UK54xYOGUCnOncQg2d5r8.F5.B/5zeqTeI8MzrsbkoYHG2VCNctMq', NULL, NULL, '01/01/2020', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 0, 'Active', 4, 'GXfKqlbj5TYqoG9DpxE3XVZp43a4qI3w3xLzFNatWlnYAoToBkawauT4z5dZ', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for wallets
-- ----------------------------
DROP TABLE IF EXISTS `wallets`;
CREATE TABLE `wallets`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `chain_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `contract_address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pk` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `public_key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `wallets_user_id_foreign`(`user_id`) USING BTREE,
  CONSTRAINT `wallets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC ;

-- ----------------------------
-- Records of wallets
-- ----------------------------
INSERT INTO `wallets` VALUES (1, '0x35a7bbce80d11350de693716da6a4b25baa15c99', 'homeless', 'USD', NULL, NULL, '0x9218212624e1f8a368eafcb6b60bbbebfa78a8addcc8345a6cc3bd6026d3c97c', '0x0171fba45252827d8470541a6e45767fe23d41149bd7368bc014c32cba670aac106570a1a6a122604bbe7814aa860849eca88631ac8a439a1778c92ae1edf329', 4, NULL, NULL, NULL);
INSERT INTO `wallets` VALUES (2, '0x35a7bbce80d11350de693716da6a4b25baa15c99', 'homeless', 'USD', NULL, NULL, '0x9218212624e1f8a368eafcb6b60bbbebfa78a8addcc8345a6cc3bd6026d3c97c', '0x0171fba45252827d8470541a6e45767fe23d41149bd7368bc014c32cba670aac106570a1a6a122604bbe7814aa860849eca88631ac8a439a1778c92ae1edf329', 5, NULL, NULL, NULL);
INSERT INTO `wallets` VALUES (3, '0x35a7bbce80d11350de693716da6a4b25baa15c99', 'homeless', 'USD', NULL, NULL, '0x9218212624e1f8a368eafcb6b60bbbebfa78a8addcc8345a6cc3bd6026d3c97c', '0x0171fba45252827d8470541a6e45767fe23d41149bd7368bc014c32cba670aac106570a1a6a122604bbe7814aa860849eca88631ac8a439a1778c92ae1edf329', 6, NULL, NULL, NULL);
INSERT INTO `wallets` VALUES (4, '0x35a7bbce80d11350de693716da6a4b25baa15c99', 'homeless', 'USD', NULL, NULL, '0x9218212624e1f8a368eafcb6b60bbbebfa78a8addcc8345a6cc3bd6026d3c97c', '0x0171fba45252827d8470541a6e45767fe23d41149bd7368bc014c32cba670aac106570a1a6a122604bbe7814aa860849eca88631ac8a439a1778c92ae1edf329', 7, NULL, NULL, NULL);
INSERT INTO `wallets` VALUES (5, '0x35a7bbce80d11350de693716da6a4b25baa15c99', 'homeless', 'USD', NULL, NULL, '0x9218212624e1f8a368eafcb6b60bbbebfa78a8addcc8345a6cc3bd6026d3c97c', '0x0171fba45252827d8470541a6e45767fe23d41149bd7368bc014c32cba670aac106570a1a6a122604bbe7814aa860849eca88631ac8a439a1778c92ae1edf329', 8, NULL, NULL, NULL);
INSERT INTO `wallets` VALUES (6, '0x35a7bbce80d11350de693716da6a4b25baa15c99', 'homeless', 'USD', NULL, NULL, '0x9218212624e1f8a368eafcb6b60bbbebfa78a8addcc8345a6cc3bd6026d3c97c', '0x0171fba45252827d8470541a6e45767fe23d41149bd7368bc014c32cba670aac106570a1a6a122604bbe7814aa860849eca88631ac8a439a1778c92ae1edf329', 9, NULL, NULL, NULL);
INSERT INTO `wallets` VALUES (7, '0x35a7bbce80d11350de693716da6a4b25baa15c99', 'homeless', 'USD', NULL, NULL, '0x9218212624e1f8a368eafcb6b60bbbebfa78a8addcc8345a6cc3bd6026d3c97c', '0x0171fba45252827d8470541a6e45767fe23d41149bd7368bc014c32cba670aac106570a1a6a122604bbe7814aa860849eca88631ac8a439a1778c92ae1edf329', 10, NULL, NULL, NULL);
INSERT INTO `wallets` VALUES (8, '0x35a7bbce80d11350de693716da6a4b25baa15c99', 'homeless', 'USD', NULL, NULL, '0x9218212624e1f8a368eafcb6b60bbbebfa78a8addcc8345a6cc3bd6026d3c97c', '0x0171fba45252827d8470541a6e45767fe23d41149bd7368bc014c32cba670aac106570a1a6a122604bbe7814aa860849eca88631ac8a439a1778c92ae1edf329', 11, NULL, NULL, NULL);
INSERT INTO `wallets` VALUES (9, '0x35a7bbce80d11350de693716da6a4b25baa15c99', 'homeless', 'USD', NULL, NULL, '0x9218212624e1f8a368eafcb6b60bbbebfa78a8addcc8345a6cc3bd6026d3c97c', '0x0171fba45252827d8470541a6e45767fe23d41149bd7368bc014c32cba670aac106570a1a6a122604bbe7814aa860849eca88631ac8a439a1778c92ae1edf329', 12, NULL, NULL, NULL);
INSERT INTO `wallets` VALUES (10, '0x35a7bbce80d11350de693716da6a4b25baa15c99', 'homeless', 'USD', NULL, NULL, '0x9218212624e1f8a368eafcb6b60bbbebfa78a8addcc8345a6cc3bd6026d3c97c', '0x0171fba45252827d8470541a6e45767fe23d41149bd7368bc014c32cba670aac106570a1a6a122604bbe7814aa860849eca88631ac8a439a1778c92ae1edf329', 13, NULL, NULL, NULL);
INSERT INTO `wallets` VALUES (11, '0x35a7bbce80d11350de693716da6a4b25baa15c99', 'homeless', 'USD', NULL, NULL, '0x9218212624e1f8a368eafcb6b60bbbebfa78a8addcc8345a6cc3bd6026d3c97c', '0x0171fba45252827d8470541a6e45767fe23d41149bd7368bc014c32cba670aac106570a1a6a122604bbe7814aa860849eca88631ac8a439a1778c92ae1edf329', 14, NULL, NULL, NULL);
INSERT INTO `wallets` VALUES (12, '0x35a7bbce80d11350de693716da6a4b25baa15c99', 'homeless', 'USD', NULL, NULL, '0x9218212624e1f8a368eafcb6b60bbbebfa78a8addcc8345a6cc3bd6026d3c97c', '0x0171fba45252827d8470541a6e45767fe23d41149bd7368bc014c32cba670aac106570a1a6a122604bbe7814aa860849eca88631ac8a439a1778c92ae1edf329', 15, NULL, NULL, NULL);
INSERT INTO `wallets` VALUES (13, '0x35a7bbce80d11350de693716da6a4b25baa15c99', 'homeless', 'USD', NULL, NULL, '0x9218212624e1f8a368eafcb6b60bbbebfa78a8addcc8345a6cc3bd6026d3c97c', '0x0171fba45252827d8470541a6e45767fe23d41149bd7368bc014c32cba670aac106570a1a6a122604bbe7814aa860849eca88631ac8a439a1778c92ae1edf329', 16, NULL, NULL, NULL);
INSERT INTO `wallets` VALUES (14, '0x35a7bbce80d11350de693716da6a4b25baa15c99', 'homeless', 'USD', NULL, NULL, '0x9218212624e1f8a368eafcb6b60bbbebfa78a8addcc8345a6cc3bd6026d3c97c', '0x0171fba45252827d8470541a6e45767fe23d41149bd7368bc014c32cba670aac106570a1a6a122604bbe7814aa860849eca88631ac8a439a1778c92ae1edf329', 17, NULL, NULL, NULL);
INSERT INTO `wallets` VALUES (15, '0x35a7bbce80d11350de693716da6a4b25baa15c99', 'homeless', 'USD', NULL, NULL, '0x9218212624e1f8a368eafcb6b60bbbebfa78a8addcc8345a6cc3bd6026d3c97c', '0x0171fba45252827d8470541a6e45767fe23d41149bd7368bc014c32cba670aac106570a1a6a122604bbe7814aa860849eca88631ac8a439a1778c92ae1edf329', 18, NULL, NULL, NULL);
INSERT INTO `wallets` VALUES (16, '0x35a7bbce80d11350de693716da6a4b25baa15c99', 'homeless', 'USD', NULL, NULL, '0x9218212624e1f8a368eafcb6b60bbbebfa78a8addcc8345a6cc3bd6026d3c97c', '0x0171fba45252827d8470541a6e45767fe23d41149bd7368bc014c32cba670aac106570a1a6a122604bbe7814aa860849eca88631ac8a439a1778c92ae1edf329', 19, NULL, NULL, NULL);
INSERT INTO `wallets` VALUES (17, '0x35a7bbce80d11350de693716da6a4b25baa15c99', 'homeless', 'USD', NULL, NULL, '0x9218212624e1f8a368eafcb6b60bbbebfa78a8addcc8345a6cc3bd6026d3c97c', '0x0171fba45252827d8470541a6e45767fe23d41149bd7368bc014c32cba670aac106570a1a6a122604bbe7814aa860849eca88631ac8a439a1778c92ae1edf329', 20, NULL, NULL, NULL);
INSERT INTO `wallets` VALUES (18, '0x35a7bbce80d11350de693716da6a4b25baa15c99', 'homeless', 'USD', NULL, NULL, '0x9218212624e1f8a368eafcb6b60bbbebfa78a8addcc8345a6cc3bd6026d3c97c', '0x0171fba45252827d8470541a6e45767fe23d41149bd7368bc014c32cba670aac106570a1a6a122604bbe7814aa860849eca88631ac8a439a1778c92ae1edf329', 21, NULL, NULL, NULL);
INSERT INTO `wallets` VALUES (19, '0x35a7bbce80d11350de693716da6a4b25baa15c99', 'homeless', 'USD', NULL, NULL, '0x9218212624e1f8a368eafcb6b60bbbebfa78a8addcc8345a6cc3bd6026d3c97c', '0x0171fba45252827d8470541a6e45767fe23d41149bd7368bc014c32cba670aac106570a1a6a122604bbe7814aa860849eca88631ac8a439a1778c92ae1edf329', 22, NULL, NULL, NULL);
INSERT INTO `wallets` VALUES (20, '0x35a7bbce80d11350de693716da6a4b25baa15c99', 'homeless', 'USD', NULL, NULL, '0x9218212624e1f8a368eafcb6b60bbbebfa78a8addcc8345a6cc3bd6026d3c97c', '0x0171fba45252827d8470541a6e45767fe23d41149bd7368bc014c32cba670aac106570a1a6a122604bbe7814aa860849eca88631ac8a439a1778c92ae1edf329', 23, NULL, NULL, NULL);
INSERT INTO `wallets` VALUES (21, '0x35a7bbce80d11350de693716da6a4b25baa15c99', NULL, 'usd', NULL, NULL, '0x9218212624e1f8a368eafcb6b60bbbebfa78a8addcc8345a6cc3bd6026d3c97c', '0x0171fba45252827d8470541a6e45767fe23d41149bd7368bc014c32cba670aac106570a1a6a122604bbe7814aa860849eca88631ac8a439a1778c92ae1edf329', 24, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
