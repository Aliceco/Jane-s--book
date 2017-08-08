/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : laravel54

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-08-08 22:42:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_permissions`;
CREATE TABLE `admin_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_permissions
-- ----------------------------
INSERT INTO `admin_permissions` VALUES ('1', 'system', '系统管理', '2017-07-31 15:30:13', '2017-07-31 15:30:13');
INSERT INTO `admin_permissions` VALUES ('2', 'posts', '文章管理', '2017-07-31 15:33:56', '2017-07-31 15:33:56');
INSERT INTO `admin_permissions` VALUES ('3', 'topic', '专题管理', '2017-07-31 15:35:08', '2017-07-31 15:35:08');
INSERT INTO `admin_permissions` VALUES ('4', 'notices', '通知管理', '2017-07-31 15:35:38', '2017-07-31 15:35:38');
INSERT INTO `admin_permissions` VALUES ('5', 'slide', '轮播图', '2017-08-04 13:47:24', '2017-08-04 13:47:24');

-- ----------------------------
-- Table structure for admin_permissions_role
-- ----------------------------
DROP TABLE IF EXISTS `admin_permissions_role`;
CREATE TABLE `admin_permissions_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_permissions_role
-- ----------------------------
INSERT INTO `admin_permissions_role` VALUES ('5', '1', '3', null, null);
INSERT INTO `admin_permissions_role` VALUES ('7', '1', '1', null, null);
INSERT INTO `admin_permissions_role` VALUES ('8', '1', '2', null, null);
INSERT INTO `admin_permissions_role` VALUES ('9', '1', '4', null, null);
INSERT INTO `admin_permissions_role` VALUES ('10', '2', '2', null, null);
INSERT INTO `admin_permissions_role` VALUES ('11', '1', '5', null, null);

-- ----------------------------
-- Table structure for admin_roles
-- ----------------------------
DROP TABLE IF EXISTS `admin_roles`;
CREATE TABLE `admin_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_roles
-- ----------------------------
INSERT INTO `admin_roles` VALUES ('1', 'admin', '系统超级管理员', '2017-07-31 15:37:22', '2017-07-31 15:37:22');
INSERT INTO `admin_roles` VALUES ('2', 'post-admin', '文章管理员', '2017-07-31 16:20:16', '2017-07-31 16:20:16');

-- ----------------------------
-- Table structure for admin_role_user
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_user`;
CREATE TABLE `admin_role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_role_user
-- ----------------------------
INSERT INTO `admin_role_user` VALUES ('1', '1', '1', null, null);
INSERT INTO `admin_role_user` VALUES ('3', '2', '2', null, null);

-- ----------------------------
-- Table structure for admin_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_users
-- ----------------------------
INSERT INTO `admin_users` VALUES ('1', 'admin', '$2y$10$g.eKpjpN0Eg245FZqCzK0.ma/oQJCjVjrQ0R8Ogjlj2VlHzK5XQDq', '2017-07-28 10:39:37', '2017-07-28 10:39:37');

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `post_id` int(11) NOT NULL DEFAULT '0',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES ('1', '2', '29', 'TEST第一条评价', '2017-07-21 16:13:07', '2017-07-21 16:13:07');
INSERT INTO `comments` VALUES ('2', '2', '29', 'assasasaassa', '2017-07-24 08:45:19', '2017-07-24 08:45:19');
INSERT INTO `comments` VALUES ('3', '2', '29', 'rtjstyjzethEHrz', '2017-07-24 09:07:22', '2017-07-24 09:07:22');
INSERT INTO `comments` VALUES ('4', '1', '29', '0000', '2017-07-27 14:36:09', '2017-07-27 14:36:09');

-- ----------------------------
-- Table structure for fans
-- ----------------------------
DROP TABLE IF EXISTS `fans`;
CREATE TABLE `fans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fan_id` int(11) NOT NULL DEFAULT '0',
  `star_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of fans
-- ----------------------------
INSERT INTO `fans` VALUES ('4', '2', '1', '2017-07-26 11:14:23', '2017-07-26 11:14:23');
INSERT INTO `fans` VALUES ('5', '1', '2', '2017-07-27 13:52:27', '2017-07-27 13:52:27');

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_reserved_at_index` (`queue`,`reserved_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('4', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('5', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('6', '2017_07_18_064151_create_posts_table', '1');
INSERT INTO `migrations` VALUES ('7', '2017_07_21_145254_create_comments_table', '2');
INSERT INTO `migrations` VALUES ('8', '2017_07_24_091105_create_zans_table', '3');
INSERT INTO `migrations` VALUES ('9', '2017_07_25_143831_create_fans_table', '4');
INSERT INTO `migrations` VALUES ('10', '2017_07_26_112212_create_topics_table', '5');
INSERT INTO `migrations` VALUES ('11', '2017_07_26_112448_create_post_topics_table', '5');
INSERT INTO `migrations` VALUES ('12', '2017_07_28_101030_create_admin_user_table', '6');
INSERT INTO `migrations` VALUES ('13', '2017_07_28_143509_alter_posts_table', '7');
INSERT INTO `migrations` VALUES ('14', '2017_07_29_094203_cerate_permission_and_roles', '8');
INSERT INTO `migrations` VALUES ('15', '2017_08_02_183757_create_notice_table', '9');
INSERT INTO `migrations` VALUES ('16', '2017_08_03_084408_create_jobs_table', '10');
INSERT INTO `migrations` VALUES ('17', '2017_08_04_115530_create_slide_table', '11');

-- ----------------------------
-- Table structure for notices
-- ----------------------------
DROP TABLE IF EXISTS `notices`;
CREATE TABLE `notices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `content` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of notices
-- ----------------------------
INSERT INTO `notices` VALUES ('3', '六一节快乐', '欢迎大家加入简书这么， 学习可以使我感到快乐，身体被学习日益掏空', '2017-08-03 08:54:45', '2017-08-03 08:54:45');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8mb4 NOT NULL DEFAULT '',
  `content` text CHARACTER SET utf8mb4 NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES ('33', '有些人不是离开了就能不爱了，不是不见了就能忘记了', '<p>有些人不是离开了就能不爱了，不是不见了就能忘记了，不是放手了就能不痛了，我徹底离开了那个有你在的城市，不再经过那个曾经一起走过的路口，甚至有一段时间徹底断了你的消息，卻在最后的最后，发现自己还是爱…这才明白，原來，</p><p><a href=\"http://www.duanwenxue.com/qinggan/aiqing/\">爱情</a></p><p>不是离得开，就能不爱的……</p><p><br></p>', '1', '2017-07-25 14:11:55', '2017-08-03 20:34:43', '1');
INSERT INTO `posts` VALUES ('35', '人世间有一种爱，没有奢求，没有谁对谁错，亦不怪缘浅情深', '<p>人世间有一种爱，没有奢求，没有谁对谁错，亦不怪缘浅情深。情有独钟无可厚非，相互的</p><p><a href=\"http://www.duanwenxue.com/qinggan/meiwen/\">欣赏</a></p><p>没有罪，无奈的转身也在情理之中。红尘中情为何物，缘为何来，莫问因由，“情”字本无解。只道是——相诉，是一腔智慧的互补；相映，是一阙</p><p><a href=\"http://www.duanwenxue.com/yuju/youmei/\">优美</a></p><p>的断章；相惜，是一种情意的升华；相念，是一份别样的美丽。</p><p><br></p>', '1', '2017-07-25 14:13:32', '2017-08-03 20:34:42', '1');
INSERT INTO `posts` VALUES ('36', '人生若只如初见，何事秋风悲画扇？', '<p><a href=\"http://www.duanwenxue.com/jingdian/ganwu/\">人生</a></p><p>若只如初见，何事秋风悲画扇？这寂落的秋，我没有颜色去画青帝眷恋的你，只有咯血染桃花，画着最沉重的梦。骊山语罢清宵半，泪雨零铃终不怨。曾经话尽夜半，清宵寒。如今泪雨哽塞，难回首。此生不怨，今世不悔，走过，遗忘了沿途的风景，带到奈何忘川的只你而已。</p><p><br></p>', '1', '2017-07-25 14:13:52', '2017-08-05 17:28:22', '0');

-- ----------------------------
-- Table structure for post_topics
-- ----------------------------
DROP TABLE IF EXISTS `post_topics`;
CREATE TABLE `post_topics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL DEFAULT '0',
  `topics_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of post_topics
-- ----------------------------
INSERT INTO `post_topics` VALUES ('1', '29', '1', '2017-07-21 10:20:14', '2017-07-21 10:20:14');
INSERT INTO `post_topics` VALUES ('2', '30', '2', '2017-07-21 10:20:14', '2017-07-21 10:20:14');
INSERT INTO `post_topics` VALUES ('3', '37', '1', '2017-07-27 14:44:48', '2017-07-27 14:44:48');
INSERT INTO `post_topics` VALUES ('4', '34', '3', '2017-08-01 17:00:00', '2017-08-01 17:00:00');

-- ----------------------------
-- Table structure for slide
-- ----------------------------
DROP TABLE IF EXISTS `slide`;
CREATE TABLE `slide` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `describe` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `url` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of slide
-- ----------------------------
INSERT INTO `slide` VALUES ('1', '1', '/storage/1502180391/RzDvlYGUt2KqtPec0gP7d2hnF0J9CSvpYUTxnG8W.jpeg', '1', '2017-08-08 16:19:51', '2017-08-08 16:19:51');
INSERT INTO `slide` VALUES ('10', '2', '/storage/1502181330/dto2AyYcIF7waMXsabXxALCAwSQxCvnxKsphGEgJ.jpeg', '2', '2017-08-08 16:35:30', '2017-08-08 16:35:30');
INSERT INTO `slide` VALUES ('11', '3', '/storage/1502181347/spnl6S2g7vPEXdscrVz8YRm8SKjQljLxduhhSO1C.jpeg', '3', '2017-08-08 16:35:47', '2017-08-08 16:35:47');

-- ----------------------------
-- Table structure for topics
-- ----------------------------
DROP TABLE IF EXISTS `topics`;
CREATE TABLE `topics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8mb4 NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of topics
-- ----------------------------
INSERT INTO `topics` VALUES ('1', '旅游', '2017-07-27 09:26:26', '2017-07-27 09:26:26');
INSERT INTO `topics` VALUES ('2', '经典', '2017-07-27 09:26:26', '2017-07-27 09:26:26');
INSERT INTO `topics` VALUES ('3', '学习', '2017-08-01 16:54:45', '2017-08-01 16:54:45');
INSERT INTO `topics` VALUES ('5', '唯美', '2017-08-01 21:19:23', '2017-08-01 21:19:23');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) CHARACTER SET utf8mb4 DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'test', '1633004849@qq.com', '/storage/f03835e21fcc91ed1b6fdd78d9fc369c/GKgHJDBl54RppPOV3P5cvQOfsngswTp7jS2RdQNS.jpeg', '$2y$10$vnEgCshhEAcBttFEQ0MyYO7V4okMtlfgeFErlwYsOSgjPLV5DVM7C', 'k00pmoTgJwrU17gLRrGtuTC8kLRo9E6LdMK5LMn9xiOtYRsN0VxQRp9BQpul', '2017-07-21 10:20:14', '2017-08-08 16:30:17');

-- ----------------------------
-- Table structure for user_notices
-- ----------------------------
DROP TABLE IF EXISTS `user_notices`;
CREATE TABLE `user_notices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `notices_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of user_notices
-- ----------------------------
INSERT INTO `user_notices` VALUES ('1', '1', '3');
INSERT INTO `user_notices` VALUES ('2', '2', '3');
INSERT INTO `user_notices` VALUES ('3', '1', '4');
INSERT INTO `user_notices` VALUES ('4', '2', '4');
INSERT INTO `user_notices` VALUES ('5', '1', '5');
INSERT INTO `user_notices` VALUES ('6', '2', '5');

-- ----------------------------
-- Table structure for zans
-- ----------------------------
DROP TABLE IF EXISTS `zans`;
CREATE TABLE `zans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `post_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of zans
-- ----------------------------
INSERT INTO `zans` VALUES ('1', '1', '29', '2017-07-27 14:35:56', '2017-07-27 14:35:56');
