/*
 Navicat Premium Data Transfer

 Source Server         : truong-blockchain
 Source Server Type    : MySQL
 Source Server Version : 100136
 Source Host           : localhost:3306
 Source Schema         : blockchain_server

 Target Server Type    : MySQL
 Target Server Version : 100136
 File Encoding         : 65001

 Date: 18/12/2019 11:36:16
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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of auction_histories
-- ----------------------------
INSERT INTO `auction_histories` VALUES (1, 1585.4545, '0x7fa55cf74e28dde06565d80f58db0d9c44560b9bb30f61d638abad85e4da8cee', NULL, 0, 1, 2, NULL, '2019-12-18 00:00:00', '2019-12-18 00:00:00');

-- ----------------------------
-- Table structure for auctions
-- ----------------------------
DROP TABLE IF EXISTS `auctions`;
CREATE TABLE `auctions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `auction_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of auctions
-- ----------------------------
INSERT INTO `auctions` VALUES (1, 'We are charity, fundraising, NGO organizations. Our activities are taken place around the world.', 'Vestibulum id ligula porta felis euismod semper. Donec ullamcorper nulla non metus auctor fringilla. Maecenas sed diam eget risus varius blandit sit amet non magna. Donec ullamcorper nulla non metus auctor fringilla. Nullam quis risus eget urna mollis ornare vel eu leo. Aenean lacinia bibendum nulla sed consectetur.', '2019-12-18 00:00:00', '2019-12-18 00:00:00', 18000, 'At the Auction of the Ruby Slippers', 'https://image.businessinsider.com/5d7fbe202e22af1fe5293ca0?width=1100&format=jpeg&auto=webp', 'The domes that West is building in Calabasas, which were reportedly inspired by the dome homes in Star War’s fictional planet “Tatooine.” | Courtesy of Los Angeles County Public Works', 'Kanye West', '0xaDE77C46Bab809E7cab3b0C4930d58f0F88bDaE9', '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283', '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283', 'new', 0, NULL, '2019-12-18 00:00:00', '2019-12-18 00:00:00');

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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of donate_activities
-- ----------------------------
INSERT INTO `donate_activities` VALUES (1, '1Sponsor meals for 50 children for 1 full year.', NULL, 0, NULL, '2019-12-18 00:00:00', '2019-12-18 00:00:00');
INSERT INTO `donate_activities` VALUES (2, 'Sponsor mid-day meals for one month.', NULL, 0, NULL, '2019-12-18 00:00:00', '2019-12-18 00:00:00');
INSERT INTO `donate_activities` VALUES (3, 'You can donate clothes, blankets and ect...', NULL, 0, NULL, '2019-12-18 00:00:00', '2019-12-18 00:00:00');
INSERT INTO `donate_activities` VALUES (4, 'You can donate food material like rice, veggies.', NULL, 0, NULL, '2019-12-18 00:00:00', '2019-12-18 00:00:00');

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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of donate_categories
-- ----------------------------
INSERT INTO `donate_categories` VALUES (1, 'Food Pantries', NULL, 0, NULL, NULL, NULL);
INSERT INTO `donate_categories` VALUES (2, 'Soup Kitchens', NULL, 0, NULL, NULL, NULL);
INSERT INTO `donate_categories` VALUES (3, 'Food Banks', NULL, 0, NULL, '2019-12-18 00:00:00', '2019-12-18 00:00:00');

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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of donate_histories
-- ----------------------------
INSERT INTO `donate_histories` VALUES (1, 350, '0x7fa55cf74e28dde06565d80f58db0d9c44560b9bb30f61d638abad85e4da8cee', NULL, 0, 1, 1, NULL, '2019-12-18 00:00:00', '2019-12-18 00:00:00');

-- ----------------------------
-- Table structure for donates
-- ----------------------------
DROP TABLE IF EXISTS `donates`;
CREATE TABLE `donates`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `donate_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `donate_detail` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `donate_start_time` timestamp(0) NULL DEFAULT NULL,
  `donate_end_time` timestamp(0) NULL DEFAULT NULL,
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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of donates
-- ----------------------------
INSERT INTO `donates` VALUES (1, 'Supply Quality Foods To Africa\'s Village Area', 'We are charity, non-profit, fundraising, NGO organizations. Our activities are taken place around the world, let contribute to them with us', '2019-12-18 00:00:00', '2019-12-18 00:00:00', 18000, 1000.564, '0xaDE77C46Bab809E7cab3b0C4930d58f0F88bDaE9', '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283', '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283', 'new', 0, 3, NULL, '2019-12-18 00:00:00', '2019-12-18 00:00:00');

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of join_auctions_activities
-- ----------------------------
INSERT INTO `join_auctions_activities` VALUES (1, 1, 1, NULL, '2019-12-18 00:00:00', '2019-12-18 00:00:00');
INSERT INTO `join_auctions_activities` VALUES (2, 1, 2, NULL, '2019-12-18 00:00:00', '2019-12-18 00:00:00');
INSERT INTO `join_auctions_activities` VALUES (3, 1, 3, NULL, '2019-12-18 00:00:00', '2019-12-18 00:00:00');
INSERT INTO `join_auctions_activities` VALUES (4, 1, 4, NULL, '2019-12-18 00:00:00', '2019-12-18 00:00:00');

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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of join_auctions_locations
-- ----------------------------
INSERT INTO `join_auctions_locations` VALUES (1, 1, 1, NULL, '2019-12-18 00:00:00', '2019-12-18 00:00:00');

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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of join_donates_activities
-- ----------------------------
INSERT INTO `join_donates_activities` VALUES (1, 1, 1, NULL, '2019-12-18 00:00:00', '2019-12-18 00:00:00');
INSERT INTO `join_donates_activities` VALUES (2, 1, 2, NULL, '2019-12-18 00:00:00', '2019-12-18 00:00:00');
INSERT INTO `join_donates_activities` VALUES (3, 1, 3, NULL, '2019-12-18 00:00:00', '2019-12-18 00:00:00');
INSERT INTO `join_donates_activities` VALUES (4, 1, 4, NULL, '2019-12-18 00:00:00', '2019-12-18 00:00:00');

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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of join_donates_locations
-- ----------------------------
INSERT INTO `join_donates_locations` VALUES (1, 1, 3, NULL, '2019-12-18 00:00:00', '2019-12-18 00:00:00');

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
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

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
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of join_products_stores
-- ----------------------------
INSERT INTO `join_products_stores` VALUES (4, 1, NULL, NULL);
INSERT INTO `join_products_stores` VALUES (4, 2, NULL, NULL);
INSERT INTO `join_products_stores` VALUES (4, 3, NULL, NULL);
INSERT INTO `join_products_stores` VALUES (4, 4, NULL, NULL);

-- ----------------------------
-- Table structure for join_users_transactions
-- ----------------------------
DROP TABLE IF EXISTS `join_users_transactions`;
CREATE TABLE `join_users_transactions`  (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `join_users_transactions_user_id_foreign`(`user_id`) USING BTREE,
  INDEX `join_users_transactions_transaction_id_foreign`(`transaction_id`) USING BTREE,
  CONSTRAINT `join_users_transactions_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `join_users_transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for locations
-- ----------------------------
DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `location_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of locations
-- ----------------------------
INSERT INTO `locations` VALUES (1, 'Alaska', NULL, '2019-12-18 00:00:00', '2019-12-18 00:00:00');
INSERT INTO `locations` VALUES (2, 'California', NULL, '2019-12-18 00:00:00', '2019-12-18 00:00:00');
INSERT INTO `locations` VALUES (3, 'New York', NULL, '2019-12-18 00:00:00', '2019-12-18 00:00:00');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_16_060533_create_donate_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_12_16_151855_create_auction_table', 1);
INSERT INTO `migrations` VALUES (6, '2019_12_16_160934_create_product_table', 1);
INSERT INTO `migrations` VALUES (7, '2019_12_16_160947_create_order_table', 1);
INSERT INTO `migrations` VALUES (8, '2019_12_17_160947_create_store_table', 1);

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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

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
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_detail` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `product_price` double NOT NULL,
  `product_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 'Meat Products', NULL, 34, 'https://www.rednewswire.com/wp-content/uploads/2018/04/frozenmeat1.jpeg', NULL, NULL, NULL);
INSERT INTO `products` VALUES (2, 'Chicken Products', NULL, 15, 'https://nationalpostcom.files.wordpress.com/2018/04/gettyimages-98130644.jpg', NULL, NULL, NULL);
INSERT INTO `products` VALUES (3, 'Waitrose Homebaking', NULL, 78, 'https://www.britishcornershop.co.uk/img/cat/134.jpg', NULL, NULL, NULL);
INSERT INTO `products` VALUES (4, 'Seafood', NULL, 28, 'https://www.britishcornershop.co.uk/img/cat/60.jpg', NULL, NULL, NULL);
INSERT INTO `products` VALUES (5, 'Cooking Chocolate', NULL, 3.29, 'https://www.britishcornershop.co.uk/img/thumb/QWOP3224.jpg', NULL, NULL, NULL);
INSERT INTO `products` VALUES (6, 'Browse Waitrose Cereals', NULL, 32.29, 'https://www.britishcornershop.co.uk/img/cat/142.jpg', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for red_invoices
-- ----------------------------
DROP TABLE IF EXISTS `red_invoices`;
CREATE TABLE `red_invoices`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `district` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `city` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `taxCode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of red_invoices
-- ----------------------------
INSERT INTO `red_invoices` VALUES (1, 'K.O.I The International Company', '9682 Wakehurst Avenue Arlington Heights, IL, 60004', 'Ward 1', 'Ho Chi Minh', NULL, NULL, '2019-12-18 00:00:00', '2019-12-18 04:11:26');

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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'System Admin', 'web', '2019-12-18 02:59:12', '2019-12-18 02:59:12');
INSERT INTO `roles` VALUES (2, 'User', 'web', '2019-12-18 02:59:13', '2019-12-18 02:59:13');
INSERT INTO `roles` VALUES (3, 'Homeless', 'web', '2019-12-18 02:59:14', '2019-12-18 02:59:14');
INSERT INTO `roles` VALUES (4, 'Store', 'web', '2019-12-18 02:59:14', '2019-12-18 02:59:14');

-- ----------------------------
-- Table structure for stores
-- ----------------------------
DROP TABLE IF EXISTS `stores`;
CREATE TABLE `stores`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `district` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `city` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `logoUrl` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `red_invoice_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `stores_red_invoice_id_foreign`(`red_invoice_id`) USING BTREE,
  CONSTRAINT `stores_red_invoice_id_foreign` FOREIGN KEY (`red_invoice_id`) REFERENCES `red_invoices` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of stores
-- ----------------------------
INSERT INTO `stores` VALUES (1, 'K.O.I The', '521 Hồ Tùng Mậu, D1, Ward 1, HCM', 'Ward 1', 'Ho Chi Minh', '3388869944', 'http://localhost:8888/assets/images/upload/kamereo-e1567336128154.png', 1, NULL, '2019-12-18 00:00:00', '2019-12-18 04:24:50');

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
  `price` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fee` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tax` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `detail` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `note` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `access_key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `birthday` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `score` int(11) NULL DEFAULT NULL,
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
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE,
  INDEX `users_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, '$2y$10$unyfhStzjNhB0mkyzkQj2.N5bANh7r3C.DqDJWtY1dke899/ota.u', 'admin', '$2y$10$HsGwWzosePdJ4Z2NTXzh8OlvWjtHsGvJ.Y49QjYTx4.lSvEW6z/Q6', 'System Admin', '0900000000', '16-01-1996', NULL, 'admin@admin.com', NULL, NULL, 0, NULL, 'krsXI', NULL, NULL, 0, 0, '2019-12-18 00:00:00', NULL, 0, 1, 1, 'siCt7E5aS3', '2019-12-18 00:00:00', '2019-12-18 00:00:00', NULL);
INSERT INTO `users` VALUES (2, '$2y$10$G5CgR/hQvBi8jtRjcvoRteigjvoTenSRBZ218ILiaLHu9wi/m/JAu', 'user', '$2y$10$bZ5MiWI19i0eYGvgQ1FReeFATG/TpGd6wjtO22Cxs.UhPt.RZTMcG', 'User', '0900000000', '16-01-1996', NULL, 'user@admin.com', NULL, NULL, 0, NULL, 'zjfUC', NULL, NULL, 0, 0, '2019-12-18 00:00:00', NULL, 0, 1, 2, 'xH19ARz16O', '2019-12-18 00:00:00', '2019-12-18 00:00:00', NULL);
INSERT INTO `users` VALUES (3, '$2y$10$2vUIfnu.M5.SilFD2iPnA.dmEuPCdU03h7NWxHq2/ZG9fYuUgzNrO', 'homeless', '$2y$10$ajhDlcMtI5kDlwQ0s/nhIuNQLFlWEhd8a3oauvK9C5uStHARkKX8u', 'Homeless', '0900000000', '16-01-1996', NULL, 'homeless@admin.com', NULL, NULL, 0, NULL, '3BZiQ', NULL, NULL, 0, 0, '2019-12-18 00:00:00', NULL, 0, 1, 3, 'cBvoc5oDon', '2019-12-18 00:00:00', '2019-12-18 00:00:00', NULL);
INSERT INTO `users` VALUES (4, '$2y$10$3xo2XY0Q6vDq4KSX3yFd7.WoqirrhebYveeEIw.qgT/nH0m7.pb6e', 'store', '$2y$10$CsDpieIB.Db0KxmlMRulxO3Hs2k2CsaYHrDy.Gr8UkeNTwm2aVIsC', 'Store', '0900000000', '16-01-1996', NULL, 'store@admin.com', NULL, NULL, 0, NULL, 'lCYwM', NULL, NULL, 0, 0, '2019-12-18 00:00:00', NULL, 0, 1, 4, 'bbO9PcyEBA', '2019-12-18 00:00:00', '2019-12-18 00:00:00', NULL);

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
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `wallets_user_id_foreign`(`user_id`) USING BTREE,
  CONSTRAINT `wallets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
