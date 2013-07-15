--------------------------------
-- Neville Install MySQL Script
-- 0.4 beta
--------------------------------
SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

--------------------------------
-- Table structure for `roles`
--------------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--------------------------------
-- Table structure for `roles_users`
--------------------------------
DROP TABLE IF EXISTS `roles_users`;
CREATE TABLE `roles_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `fk_role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--------------------------------
--  Table structure for `users`
--------------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(127) NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` char(64) NOT NULL,
  `last_login` int(10) unsigned DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_username` (`username`),
  UNIQUE KEY `uniq_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--------------------------------
-- Default User
--------------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'admin', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', null, '1', NOW(), NOW());
INSERT INTO `roles` VALUES ('1', 'admin', 'Access to everything.');
INSERT INTO `roles_users` VALUES ('1' , '1');
COMMIT;