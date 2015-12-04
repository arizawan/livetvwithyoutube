/*
 Navicat MySQL Data Transfer

 Source Server         : MAMP
 Source Server Type    : MySQL
 Source Server Version : 50542
 Source Host           : localhost
 Source Database       : 71livetv

 Target Server Type    : MySQL
 Target Server Version : 50542
 File Encoding         : utf-8

 Date: 04/07/2015 13:01:00 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `groups`
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `groups`
-- ----------------------------
BEGIN;
INSERT INTO `groups` VALUES ('1', 'gods', '{\"addups\":1,\"addself\":1,\"addbelows\":1,\"godemode\":1,\"accessfinance\":1,\"accessfinancereport\":1,\"exportfinancedata\":1,\"modifyfinance\":1,\"accessusers\":1,\"modifyusers\":1,\"exportusersdata\":1,\"accessbusiness\":1,\"accessbusinessreports\":1,\"exportbusiness\":1,\"modifybusiness\":1,\"accessbusinessdata\":1,\"modifybusinessdata\":1,\"exportbusinessdata\":1}', '2014-12-24 19:23:36', '2014-12-24 19:23:36');
COMMIT;

-- ----------------------------
--  Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `migrations`
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES ('2014_12_19_163951_create_videolist_table', '1'), ('2014_12_23_162714_create_schedule_table', '1'), ('2014_12_24_060739_create_tokens_table', '1'), ('2012_12_06_225921_migration_cartalyst_sentry_install_users', '2'), ('2012_12_06_225929_migration_cartalyst_sentry_install_groups', '2'), ('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot', '2'), ('2012_12_06_225988_migration_cartalyst_sentry_install_throttle', '2'), ('2014_12_26_075657_create_session_table', '3');
COMMIT;

-- ----------------------------
--  Table structure for `schedule`
-- ----------------------------
DROP TABLE IF EXISTS `schedule`;
CREATE TABLE `schedule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `updatedby` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `schedule`
-- ----------------------------
BEGIN;
INSERT INTO `schedule` VALUES ('1', 'Music Day 24', 'All day music channel', '2014-12-26', '2014-12-27', '0', '2', '2014-12-27 11:17:30', '2014-12-28 15:08:11'), ('2', 'NetTV24 Videos 1', 'Nothing', '2014-12-27', '2014-12-31', '0', '2', '2014-12-28 01:13:36', '2014-12-28 14:36:55'), ('3', 'Regular ', '', '2014-12-28', '2014-12-28', '0', '3', '2014-12-28 05:00:47', '2014-12-28 05:06:49'), ('4', 'sun day-trast', '', '2014-12-28', '2014-12-28', '0', '2', '2014-12-28 14:34:05', '2014-12-29 13:41:27'), ('5', 'Friday-suterday', 'one day', '2015-01-02', '2015-01-02', '1', '2', '2014-12-29 13:15:32', '2015-02-04 14:03:00'), ('6', 'Suterday-Sunday', 'One day', '2015-01-03', '2015-01-03', '0', '2', '2014-12-30 13:13:58', '2015-01-13 13:46:04'), ('7', 'Sunday-Mnday', 'One day', '2015-01-04', '2015-01-04', '0', '2', '2014-12-31 15:42:44', '2015-01-13 13:47:07'), ('8', 'Mnday-Tuestday ', 'One day', '2015-01-05', '2015-01-05', '0', '2', '2015-01-01 14:12:34', '2015-01-13 13:51:00'), ('9', 'Tuestday-Wednestday', 'oNE day', '2015-01-06', '2015-01-06', '0', '2', '2015-01-02 12:58:04', '2015-02-04 14:03:00'), ('10', 'Wednestday-thurstday', 'Oneday', '2015-01-07', '2015-01-07', '0', '2', '2015-01-04 13:46:32', '2015-01-13 13:50:24'), ('11', 'thurstday-Friday', 'One day', '2015-01-09', '2015-01-09', '0', '2', '2015-01-09 14:14:11', '2015-01-13 16:51:25');
COMMIT;

-- ----------------------------
--  Table structure for `sessions`
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `sessions`
-- ----------------------------
BEGIN;
INSERT INTO `sessions` VALUES ('bd14001c11d5e035a3caaf01f60e51c0f7462945', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMm9tSm1mcm1aZVVESWF4THBodTV6OFE5WExVSEdtMFd5Qk95cjZlTiI7czo1OiJmbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjE2OiJjYXJ0YWx5c3Rfc2VudHJ5IjthOjI6e2k6MDtpOjQ7aToxO3M6NjA6IiQyeSQxMCRYRFpza1cucHNWVWlSM0pTTldLSTVPLnpRVE1BSHpIZ0c4c1BZTUdNblRCa213amx3LnNYTyI7fXM6OToiX3NmMl9tZXRhIjthOjM6e3M6MToidSI7aToxNDI4MzkwMDU4O3M6MToiYyI7aToxNDI4Mzg5NDkyO3M6MToibCI7czoxOiIwIjt9fQ==', '1428390058');
COMMIT;

-- ----------------------------
--  Table structure for `throttle`
-- ----------------------------
DROP TABLE IF EXISTS `throttle`;
CREATE TABLE `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `throttle`
-- ----------------------------
BEGIN;
INSERT INTO `throttle` VALUES ('1', '1', null, '4', '0', '0', '2015-04-07 12:52:31', null, null), ('2', '3', null, '0', '0', '0', null, null, null), ('3', '2', '127.0.0.1', '4', '0', '0', '2014-12-26 21:21:07', null, null), ('4', '2', '202.4.173.61', '0', '0', '0', null, null, null), ('5', '2', '103.19.252.82', '0', '0', '0', null, null, null), ('6', '2', '103.15.141.134', '0', '0', '0', null, null, null), ('7', '2', '117.18.229.55', '0', '0', '0', null, null, null), ('8', '2', '103.230.6.194', '0', '0', '0', null, null, null), ('9', '4', '127.0.0.1', '0', '0', '0', null, null, null);
COMMIT;

-- ----------------------------
--  Table structure for `tokens`
-- ----------------------------
DROP TABLE IF EXISTS `tokens`;
CREATE TABLE `tokens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `api_token` varchar(96) COLLATE utf8_unicode_ci NOT NULL,
  `expires_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `client` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `tokens`
-- ----------------------------
BEGIN;
INSERT INTO `tokens` VALUES ('1', '1', 'd1313b37a2d07dc51999beaa0246058302552911d478d4692ba739714702f880', '2015-01-24 19:34:25', '||1||Chrome||||Win8.1|||||||1|1', '2014-12-24 19:34:25', '2014-12-24 19:34:25'), ('2', '2', '8b2cf71941bafa79a286ca638f43a42c5362c5b7aa77bdd9fe6abd01fd648442', '2015-01-24 22:37:44', '||1||Chrome||||Win8.1|||||||1|1', '2014-12-24 22:37:44', '2014-12-24 22:37:44'), ('3', '3', 'd39664b82cb551e58e7c7c702018dbddfb32ca065450f82ef3f30c9b17bc8957', '2015-01-24 23:54:08', '||1||Chrome||||Win8.1|||||||1|1', '2014-12-24 23:54:08', '2014-12-24 23:54:08');
COMMIT;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('2', 'admin@nettv24.tv', '$2y$10$gSWQjZkfTF.U4T9AAiBN.ONUM9zFGDTVm7zws0USTrkb/XijeUQge', null, '1', null, null, '2015-02-12 15:02:19', '$2y$10$BNSbeVjPTwnYeTSvhUxIueLUWZkIGRcD.MFARBL044mSjUB9uQTv6', null, 'Ratul', 'Ahmed', '2014-12-24 22:06:59', '2015-02-12 15:02:19'), ('4', 'rain@walker.com', '$2y$10$Vk9jE5mBBXjBfLd1zlIVE.ZJxvpl3qvOzYn1r1icgw.h.abuqjQG2', null, '1', null, null, '2015-04-07 12:54:07', '$2y$10$XDZskW.psVUiR3JSNWKI5O.zQTMAHzHgG8sPYMGMnTBkmwjlw.sXO', null, 'Rain', 'Walker', '2015-04-07 12:53:43', '2015-04-07 12:54:07');
COMMIT;

-- ----------------------------
--  Table structure for `users_groups`
-- ----------------------------
DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `users_groups`
-- ----------------------------
BEGIN;
INSERT INTO `users_groups` VALUES ('1', '1'), ('2', '1'), ('3', '1'), ('4', '1');
COMMIT;

-- ----------------------------
--  Table structure for `videolist`
-- ----------------------------
DROP TABLE IF EXISTS `videolist`;
CREATE TABLE `videolist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `updatedby` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `time` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `length` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=204 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `videolist`
-- ----------------------------
BEGIN;
INSERT INTO `videolist` VALUES ('136', '3 SONG NETTV24 x264', '1 documenry 2  music video', 'https://www.youtube.com/watch?v=8rgw-Hn9AMM&feature=youtu.be', 'https://i.ytimg.com/vi/8rgw-Hn9AMM/default.jpg', '1', '2', '2001', '07:23pm', '879', '11', '2015-01-04 13:55:29', '2015-01-12 08:22:36'), ('145', '2 SONG 1 DOCU  NETTV24 liza akash', '', 'https://www.youtube.com/watch?v=-iTYqG89L0Q&feature=youtu.be', 'https://i.ytimg.com/vi/-iTYqG89L0Q/default.jpg', '1', '2', '2010', '07:34pm', '752', '11', '2015-01-05 02:39:55', '2015-01-12 08:23:24'), ('146', 'anniversary 2014 ep 01 x264', '', 'https://www.youtube.com/watch?v=nevWZgnVMsU', 'https://i.ytimg.com/vi/nevWZgnVMsU/default.jpg', '1', '2', '2011', '02:05pm', '833', '11', '2015-01-05 03:46:06', '2015-01-13 02:26:07'), ('147', 'music video 09 song nettv24 tv', 'only music video_bd_nettv24_ a concern of poster multimedia production', 'https://www.youtube.com/watch?v=sAMJ6fAfs-w&feature=youtu.be', 'https://i.ytimg.com/vi/sAMJ6fAfs-w/default.jpg', '1', '2', '2012', '01:26pm', '2490', '11', '2015-01-05 17:04:43', '2015-01-13 02:25:40'), ('156', 'bna islamic program producer prosno mredha', '', 'https://www.youtube.com/watch?v=fpmdZTwSuaY&feature=youtu.be', 'https://i.ytimg.com/vi/fpmdZTwSuaY/default.jpg', '1', '2', '2021', '08:30pm', '1506', '11', '2015-01-07 14:44:05', '2015-01-12 08:26:34'), ('157', 'Bangladeshi Bangla/ Bengali Full Movie Sontan Amar Ohonkar 2013 New Bangla Movie Part-1', '', 'https://www.youtube.com/watch?v=HVDt_KitIjA', 'https://i.ytimg.com/vi/HVDt_KitIjA/default.jpg', '1', '2', '2022', '08:55pm', '7264', '11', '2015-01-09 14:15:00', '2015-01-12 08:27:40'), ('158', 'Bortoman[www.Moviemaat.com]', 'Click On This Link http://www.moviemaat.com to watch and download Bangla, Bengali, Hindi, Telegue, Bangla Drama Serial, Tv Shows, Single Natok And much more Enjoy....সবাইকে ওয়েব সাইটে ভিসিট করার জন্য অনুরুদ রহিল দন্নবাদ...।', 'https://www.youtube.com/watch?v=ny2lIqM3yRI', 'https://i.ytimg.com/vi/ny2lIqM3yRI/default.jpg', '1', '2', '2023', '6:20pm', '8589', '11', '2015-01-09 14:17:16', '2015-01-13 07:19:01'), ('159', 'Bangla Natok Sporsher Baire Tumi ft Tahsan', 'Bangla Natok Sporsher Baire Tumi ft TahsanStarring: Tahsan, Oporna Written, Screenplay and Direction: Imrayun Rafat', 'https://www.youtube.com/watch?v=W2rr-eOHX6c', 'https://i.ytimg.com/vi/W2rr-eOHX6c/default.jpg', '1', '2', '2024', '07:48pm', '2396', '11', '2015-01-09 14:22:54', '2015-01-13 08:47:30'), ('160', 'Shunchen Ekjon Radio Jokeyr Golpo Bangla Natok', 'Additional Information :bangla natok,bangla natok 2014,bangla eid natok 2014,bangla eid ul azha natok 2014,bangla eid ul adha natok 2014,bangla natok nil projapoti,bangla eid romantic natok 2014,bangla eid ul azha natok by apurbo 2014,bangla eid ul adha n', 'https://www.youtube.com/watch?v=dOsOAY1c4mI', 'https://i.ytimg.com/vi/dOsOAY1c4mI/default.jpg', '1', '2', '2025', '08:20pm', '2561', '11', '2015-01-09 14:26:51', '2015-01-13 08:48:21'), ('161', 'Bangla Natok Full Comedy Poribanu by ATM Shamsuzzaman,Shahed Sharif & Farhana mili', 'Bangla Natok Full Comedy Poribanu ATM Shamsuzzaman,Shahed Sharif & Farhana mili -------------------------------------------------------------------Facebook:- https://www.facebook.com/adeshbdTwitter :-https://www.twitter.com/adeshbdFree Web :- https://www.', 'https://www.youtube.com/watch?v=s9g0rwQKlvY', 'https://i.ytimg.com/vi/s9g0rwQKlvY/default.jpg', '1', '2', '2026', '10:20pm', '2700', '11', '2015-01-09 14:32:51', '2015-01-11 11:48:44'), ('162', 'Eishob Din Ratri 11', '', 'https://www.youtube.com/watch?v=4oo1KEbAl-w', 'https://i.ytimg.com/vi/4oo1KEbAl-w/default.jpg', '1', '2', '2027', '09:50pm', '12897', '11', '2015-01-09 14:47:09', '2015-01-13 08:49:41'), ('163', 'Bangladeshi Hot scene Movie Honeymoon( হানিমুন ) 2014 New Movie HD', '', 'https://www.youtube.com/watch?v=yTF7pBYuHHE', 'https://i.ytimg.com/vi/yTF7pBYuHHE/default.jpg', '1', '2', '2029', '11:00am', '6965', '11', '2015-01-09 22:36:19', '2015-01-10 23:59:02'), ('165', 'Bangla Full Movie Hitman By Shakib Khan & Apu Biswas হিটম্যান বাংলা মুভি', 'Movie Name: HitmanStarts: Shakib Khan, Apu Biswas, Joy, MishaDirected: Wazed Ali SumonCatagory: Bengali Movie SongsLaungage: BengaliYear: 2014', 'https://www.youtube.com/watch?v=aQC03gWxfq0', 'https://i.ytimg.com/vi/aQC03gWxfq0/default.jpg', '1', '2', '1001', '4:01 AM', '9013', '9', '2015-01-13 14:04:48', '2015-01-13 14:04:48'), ('166', 'Bangla Movie 2015 - Pipra Bidya - Full Movie - HD', 'Bangla Movie 2015 - Pipra Bidya - Full Movie - HDScript & Direction : Mostofa Sarwar FarukiCast : Nur Imran Mithu,Sheena Chohan,Sabbir Hasan Likhon,Mukit Jakariya,Mou Debnath.Additional Information :bangla movie,bangla movie 2015,bangla movie by mostofa s', 'https://www.youtube.com/watch?v=iBIEwJCzkoc', 'https://i.ytimg.com/vi/iBIEwJCzkoc/default.jpg', '1', '2', '1002', '6:30 AM', '6529', '9', '2015-01-13 14:07:44', '2015-01-13 14:07:44'), ('167', 'Alif Laila Full Bangla Part 01 By Islambangla', 'Alif Laila Full Sires in Bangla by nurislambangla.wordpress.com. This Sires is 15 Part Completed. so watch or download & enjoy.', 'https://www.youtube.com/watch?v=I_PY1RIY2f8', 'https://i.ytimg.com/vi/I_PY1RIY2f8/default.jpg', '1', '2', '1003', '7:18 AM', '13547', '9', '2015-01-13 14:29:06', '2015-01-13 14:29:06'), ('168', 'Bangla natok Shukh Tan Full part', 'http://shohelfilmscity.blogspot.gr/Natok: Shukh TanStar Cast: Mosharraf Karim, Monalisa Nd OthersDirector: Masud Sejan', 'https://www.youtube.com/watch?v=UTkoJNzk7MM', 'https://i.ytimg.com/vi/UTkoJNzk7MM/default.jpg', '1', '2', '1004', '11:08 AM', '7315', '9', '2015-01-13 14:34:03', '2015-01-13 14:34:03'), ('169', 'AQS EP 01', '', 'https://www.youtube.com/watch?v=tuAqqqQ2PpQ&feature=youtu.be', 'https://i.ytimg.com/vi/tuAqqqQ2PpQ/default.jpg', '1', '2', '1005', '1:09 PM', '741', '9', '2015-01-13 15:19:05', '2015-01-13 15:19:05'), ('170', '6 SONG + ADD ITALIAN CILT x264', '', 'https://www.youtube.com/watch?v=kQfXNh5gTx0&feature=youtu.be', 'https://i.ytimg.com/vi/kQfXNh5gTx0/default.jpg', '1', '2', '1006', '1:21 PM', '1881', '9', '2015-01-13 15:23:11', '2015-01-13 15:23:11'), ('171', 'anniversary 2014 ep 01 x264', '', 'https://www.youtube.com/watch?v=nevWZgnVMsU', 'https://i.ytimg.com/vi/nevWZgnVMsU/default.jpg', '1', '2', '1007', '1:52 PM', '833', '9', '2015-01-13 15:28:17', '2015-01-13 15:28:17'), ('172', 'Ki Prem Dekhaila Full DvdRip 720p HD Bangla Movie ft Bappy & Achol (2015)', 'Subscribe our channel : http://goo.gl/6bQnlp http://banglanewmoviehd.blogspot.com/Movie :Ki Prem DekhailaStarring  : Achol Akhi,Bappy Chowdhury,Nuton,Ali Raaj,Rebeka & Many MoreDirector :Md Songram', 'https://www.youtube.com/watch?v=CtCa36pMGFY', 'https://i.ytimg.com/vi/CtCa36pMGFY/default.jpg', '1', '2', '1008', '2:04 PM', '9731', '9', '2015-01-13 15:39:22', '2015-01-13 15:39:22'), ('173', 'Bangla New Movie 2014 \"Daring Lover\" Romantic Movie ft. Shakib Khan, Apu Biswas', 'Bangla New Movie 2014 \"Daring Lover\" Romantic Movie ft. Shakib Khan & Apu Biswas', 'https://www.youtube.com/watch?v=EvTfA7OW-SQ', 'https://i.ytimg.com/vi/EvTfA7OW-SQ/default.jpg', '1', '2', '1009', '4:48 PM', '9152', '9', '2015-01-13 15:48:42', '2015-01-13 15:48:42'), ('174', 'avi dr  iqbal x264', '', 'https://www.youtube.com/watch?v=D4AC754Dv9Y&feature=youtu.be', 'https://i.ytimg.com/vi/D4AC754Dv9Y/default.jpg', '1', '2', '1010', '11:00am', '526', '9', '2015-01-13 16:34:29', '2015-01-14 13:49:17'), ('175', 'Bangla Movie Bhalobasha Express Full DvdRip HD Ft Shakib Khan & Apu Biswas', 'Subscribe our channel : http://goo.gl/6bQnlp http://banglanewmoviehd.blogspot.com/Movie : Bhalobasha ExpressStarring  : Shakib Khan,Apu Biswas,Mim Chowdhury,Ahmed Shorif,Afjal Shorif,Dj Shuhel & Misha SowdagorDirector : Shafi Uddin Shafi', 'https://www.youtube.com/watch?v=EyaoLeMqYE8', 'https://i.ytimg.com/vi/EyaoLeMqYE8/default.jpg', '1', '2', '1011', '8:38 PM', '9179', '9', '2015-01-13 16:38:07', '2015-01-13 16:38:07'), ('176', 'Bangla Movie Hitman Full DvdRip 720p HD ft Shakib Khan & Apu Bswas', 'Subscribe our channel : http://goo.gl/6bQnlp http://banglanewmoviehd.blogspot.com/Movie : HitmanStarring  : Shakib Khan,Apu Biswas,Joy Chowdhury,Shirin Shila,Siba Sanu,DJ Shuhel,Kabila,Harun Kichingar & Misha ShuwdagorDirector : Wazed Ali Shumon', 'https://www.youtube.com/watch?v=EtovC16-Nfk', 'https://i.ytimg.com/vi/EtovC16-Nfk/default.jpg', '1', '2', '1012', '11:04 PM', '10222', '9', '2015-01-13 16:44:33', '2015-01-13 16:44:33'), ('178', 'Bangla Natok - উড়ে যায় বকপক্ষী by Humayun Ahmed - Part-1 (Episode: 1 to 5) HD', 'Bangla Natok \"UREY JAI BOKPOKKHI\" Episode 1 to 5 Serial Drama Starring:Shawon, Riaz, Shadhin Khasru, Faruk Ahmed, Dr. Enamul Haque, Masum Aziz, Dr. Ejaj, Ferdousi Ahmed Lina, Shabnam Swati, Salma Rozi, Saleh Ahmed and moreWritten and directed by: Humayun ', 'https://www.youtube.com/watch?v=311lXPLPDEY', 'https://i.ytimg.com/vi/311lXPLPDEY/default.jpg', '1', '2', '3001', '12:01 AM', '6269', '5', '2015-01-16 14:07:18', '2015-01-16 14:07:18'), ('179', 'anniversary 2014 ep 01 x264', '', 'https://www.youtube.com/watch?v=nevWZgnVMsU', 'https://i.ytimg.com/vi/nevWZgnVMsU/default.jpg', '1', '2', '3002', '1:44 AM', '833', '5', '2015-01-16 14:11:48', '2015-01-16 14:11:48'), ('180', 'Sob ShoKhirey Paar Koritey Nebo Ana Ana,Bangla Natok 2012', 'Sob ShoKhirey Paar Koritey Nebo Ana Ana,Bangla Natok 2012HD Quality VideoBabu, North Miami, FLCourtesy@http://www.JatRaBeLa.com', 'https://www.youtube.com/watch?v=Ask6O0ppecM', 'https://i.ytimg.com/vi/Ask6O0ppecM/default.jpg', '1', '2', '3003', '1:53 AM', '2567', '5', '2015-01-16 14:13:29', '2015-01-16 14:13:29'), ('181', 'music video 09 song nettv24 tv', 'only music video_bd_nettv24_ a concern of poster multimedia production', 'https://www.youtube.com/watch?v=sAMJ6fAfs-w&feature=youtu.be', 'https://i.ytimg.com/vi/sAMJ6fAfs-w/default.jpg', '1', '2', '3004', '2:25 AM', '2490', '5', '2015-01-16 14:16:06', '2015-01-16 14:16:06'), ('182', 'SoBinoey JanTey Chaii Bangla Natok, 2012', 'SoBinoey JanTey Chaii Bangla Natok, 2012HD Quality VideoBabu, North Miami, FLCourtesy@http://www.JatRaBeLa.com', 'https://www.youtube.com/watch?v=KJdeWPzkAjE', 'https://i.ytimg.com/vi/KJdeWPzkAjE/default.jpg', '1', '2', '3005', '3:06 AM', '3367', '5', '2015-01-16 14:19:11', '2015-01-16 14:19:11'), ('183', 'Big Boss Bangla Movie HD By Manna And Moushumi', 'Big Boss Bangla Movie HDArtist:Manna,Moushumi,Shahin Alam,Moyuri,Afjal Sharif,Jesmin,Rony,Don,Anowara,Rebeca,susoma,Nasir Khan,Kabila,Fokira,Shawon,Misha Soudagor,Mizu AhmedSinger:kumar Bishwajit,Monir Khan,Runa Laila,Baby Naznin,Onima De CostaSubscribe o', 'https://www.youtube.com/watch?v=kTVhLjPOEhU', 'https://i.ytimg.com/vi/kTVhLjPOEhU/default.jpg', '1', '2', '3006', '4:01 AM', '7470', '5', '2015-01-16 14:24:40', '2015-01-16 14:24:40'), ('184', 'Bangladeshi Bangla/ Bengali Full Movie Sontan Amar Ohonkar 2013 New Bangla Movie Part-1', '', 'https://www.youtube.com/watch?v=HVDt_KitIjA', 'https://i.ytimg.com/vi/HVDt_KitIjA/default.jpg', '1', '2', '3007', '6:05 AM', '7264', '5', '2015-01-16 14:26:20', '2015-01-16 14:26:20'), ('185', 'Bangla Movie Arman[www.Moviemaat.com]', 'http://www.moviemaat.com You Can Watch It And Download It On http://www.moviemaat.comWatch Download Old Latest 2012 And Beyond Bangla Movies, Indian Bangla Movies, Hindi Movies, Telegu, Bangla Drama Serial, Bangla Single Natok, Movies Videos, Hot Gorom Ma', 'https://www.youtube.com/watch?v=GFehgKClUUw', 'https://i.ytimg.com/vi/GFehgKClUUw/default.jpg', '1', '2', '3008', '8:06 AM', '8950', '5', '2015-01-16 14:29:51', '2015-01-16 14:29:51'), ('186', 'Bangla Eid Natok/Telefilm\" 2014 (Eid-Ul-Fitr) Noakhali To chittagong - A Journey Of Marriage', 'Eid Ul Fitr 2014 Bangla Comedy Natok Noakhali To chittagong - A Journey Of MarriageCast: Partho Barua,Aporna Ghosh,Hasan Azad,Mehrin Islam Nisha and so on.Director: Imraul Rafatbangla eid natok Noakhali To chittagong - A Journey Of Marriage,bangla eid ul ', 'https://www.youtube.com/watch?v=TeaX4z7TJRU', 'https://i.ytimg.com/vi/TeaX4z7TJRU/default.jpg', '1', '2', '3009', '10:35 AM', '1913', '5', '2015-01-16 14:32:47', '2015-01-16 14:32:47'), ('187', 'Bangla Natok Eid ul adha 2014 II Prem Kumar II Chanchal Chowdhury II  Very Romantic', 'Bangla Natok Eid ul adha | Prem Kumar By Chanchal Chowdhury Very Romantic', 'https://www.youtube.com/watch?v=dkm6OaqP5T0', 'https://i.ytimg.com/vi/dkm6OaqP5T0/default.jpg', '1', '2', '3010', '11:06 AM', '2837', '5', '2015-01-16 14:35:05', '2015-01-16 14:35:05'), ('188', 'Bibaho | Bangla Romantic comedy natok 2014   Zahid Hasan, Shohel Khan, Monmon', 'Bibaho | Bangla Romantic comedy natok 2014   Zahid Hasan, Shohel Khan, Monmon', 'https://www.youtube.com/watch?v=gRCoDAC9304', 'https://i.ytimg.com/vi/gRCoDAC9304/default.jpg', '1', '2', '3011', '11:53 AM', '2636', '5', '2015-01-16 14:38:13', '2015-01-16 14:38:13'), ('189', 'bna islamic program producer prosno mredha', '', 'https://www.youtube.com/watch?v=fpmdZTwSuaY&feature=youtu.be', 'https://i.ytimg.com/vi/fpmdZTwSuaY/default.jpg', '1', '2', '3012', '12:35 PM', '1506', '5', '2015-01-16 14:39:53', '2015-01-16 14:39:53'), ('190', 'ISLAMIC BANGLA JUMAR KHUTBA ABOUT RECENT TOPICS IN BANGLADESH BY PROFESSOR MUFTI KAZI IBRAHIMK', '', 'https://www.youtube.com/watch?v=1vKDjhBAVxw', 'https://i.ytimg.com/vi/1vKDjhBAVxw/default.jpg', '1', '2', '3013', '1:01 PM', '3293', '5', '2015-01-16 14:42:50', '2015-01-16 14:42:50'), ('191', 'NOSTO JIBON 1www MovieJogoth com', 'http://www.moviemaat.com', 'https://www.youtube.com/watch?v=x0HQ2l_ld7s', 'https://i.ytimg.com/vi/x0HQ2l_ld7s/default.jpg', '1', '2', '3014', '1:55 PM', '4297', '5', '2015-01-16 14:46:08', '2015-01-16 14:46:08'), ('192', 'Bangla movie  Shopner nayok', '', 'https://www.youtube.com/watch?v=G0eI9E3-dno', 'https://i.ytimg.com/vi/G0eI9E3-dno/default.jpg', '1', '2', '3015', '3:06 PM', '9502', '5', '2015-01-16 14:48:08', '2015-01-16 14:48:08'), ('193', 'Bangla Comedy Natok 2015 Zero Zero Action', 'bangla natok 2015,bangla new natok,bangla natok zero zero action,bangla comedy natok 2015 hd,bangla new natok 2015', 'https://www.youtube.com/watch?v=qJMxH8Vir4o', 'https://i.ytimg.com/vi/qJMxH8Vir4o/default.jpg', '1', '2', '3016', '5:04 PM', '2618', '5', '2015-01-16 14:51:33', '2015-01-16 14:51:33'), ('194', 'Boca GoeYenDa,Bangla Natok,2012', 'Boca GoeYenDa,Bangla Natok,2012HD Quality VideoBabu, North Miami, FLCourtesy@http://www.JatRaBeLa.com', 'https://www.youtube.com/watch?v=o8yEV5h5aZs', 'https://i.ytimg.com/vi/o8yEV5h5aZs/default.jpg', '1', '2', '3017', '5:47 PM', '2655', '5', '2015-01-16 14:55:07', '2015-01-16 14:59:22'), ('195', 'Bangla Movie BAI KENO ASHAMI[www.Moviemaat.com]', 'http://www.moviemaat.com You Can Watch It And Download It On http://www.moviemaat.comWatch Download Old Latest 2012 And Beyond Bangla Movies, Indian Bangla Movies, Hindi Movies, Telegu, Bangla Drama Serial, Bangla Single Natok, Movies Videos, Hot Gorom Ma', 'https://www.youtube.com/watch?v=9C3_2-mRRHg', 'https://i.ytimg.com/vi/9C3_2-mRRHg/default.jpg', '1', '2', '3018', '6:31 PM', '9203', '5', '2015-01-16 15:14:01', '2015-01-16 15:15:15'), ('196', 'Bangla Movie Arman[www.Moviemaat.com]', 'http://www.moviemaat.com You Can Watch It And Download It On http://www.moviemaat.comWatch Download Old Latest 2012 And Beyond Bangla Movies, Indian Bangla Movies, Hindi Movies, Telegu, Bangla Drama Serial, Bangla Single Natok, Movies Videos, Hot Gorom Ma', 'https://www.youtube.com/watch?v=GFehgKClUUw', 'https://i.ytimg.com/vi/GFehgKClUUw/default.jpg', '1', '2', '3019', '9:04 PM', '8950', '5', '2015-01-16 15:20:08', '2015-01-16 15:20:08'), ('197', 'Bangla New Natok Tumi Je Amar By Tisha & Chanchal Chowdhury', 'EW BANGLA MUSIC VIDEO 2014HRIDOY KHAN New Bangla Music Video HD 2014new bangladeshi bangla full hd video song 2014Antara New Bangla Music Video HD 2014Asif Akbar New Bangla Music VideoNew Bangla Full MovieGangster Returns Bangla MovieZiaul Faruq Apurba Ba', 'https://www.youtube.com/watch?v=2AIXGqsN1zU', 'https://i.ytimg.com/vi/2AIXGqsN1zU/default.jpg', '1', '2', '3020', '11:33 PM', '2723', '5', '2015-01-16 15:22:20', '2015-01-16 15:22:20'), ('198', 'NetTV24-', '', 'https://www.youtube.com/watch?v=Es-AR1jl9ZU&feature=youtu.be', 'https://i.ytimg.com/vi/Es-AR1jl9ZU/default.jpg', '1', '2', '1013', '1:55 AM', '3076', '9', '2015-02-02 14:41:01', '2015-02-02 14:41:01'), ('199', 'NetTV24-', '', 'https://www.youtube.com/watch?v=DtSSQg_I3uE&feature=youtu.be', 'https://i.ytimg.com/vi/DtSSQg_I3uE/default.jpg', '1', '2', '1014', '2:51 AM', '57', '9', '2015-02-02 14:45:22', '2015-02-02 14:45:22'), ('200', 'NetTV24-', '', 'https://www.youtube.com/watch?v=gy4gIZXShiw&feature=youtu.be', 'https://i.ytimg.com/vi/gy4gIZXShiw/default.jpg', '1', '2', '1015', '2:51 AM', '3324', '9', '2015-02-02 14:47:41', '2015-02-02 14:47:41'), ('201', '6 SONG + ADD ITALIAN CILT x264', '', 'https://www.youtube.com/watch?v=kQfXNh5gTx0&feature=youtu.be', 'https://i.ytimg.com/vi/kQfXNh5gTx0/default.jpg', '1', '2', '1016', '3:45 AM', '1881', '9', '2015-02-02 14:52:22', '2015-02-02 14:52:22'), ('202', 'Bangla Eid Natok 2014 II \'Meghla\' II Mehzabin II Eid Ul Adha II Romantic Comedy natok', '', 'https://www.youtube.com/watch?v=b4TSJQlLMbA', 'https://i.ytimg.com/vi/b4TSJQlLMbA/default.jpg', '1', '2', '1017', '4:10 AM', '3008', '9', '2015-02-02 14:56:06', '2015-02-02 14:56:06'), ('203', 'Bangla Eid Natok 2014 (Eid-Ul-Adha) - Vondo Jugol - ft. Nisho,Shokh', 'Bangla Eid Ul Adha/Azha Natok 2014 (Eid-Ul-Adha) - Vondo Jugol - ft. Nisho,ShokhDirector : Milon VottacharjoCast : Dr. Ezaz,Afran Nisho,Shokh...Additional Information :bangla natok,bangla eid natok 2014,bangla eid ul adha natok 2014,bangla eid natok by sh', 'https://www.youtube.com/watch?v=-L_Tow_w2_w', 'https://i.ytimg.com/vi/-L_Tow_w2_w/default.jpg', '1', '2', '1018', '5:00 AM', '3128', '9', '2015-02-02 14:57:49', '2015-02-02 14:57:49');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
