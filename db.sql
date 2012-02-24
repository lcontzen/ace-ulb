SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
 
INSERT INTO `roles` (`id`, `name`, `description`) VALUES(1, 'login', 'Login privileges, granted after account confirmation');
INSERT INTO `roles` (`id`, `name`, `description`) VALUES(2, 'admin', 'Administrative user, has access to everything.');
 
CREATE TABLE IF NOT EXISTS `roles_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY  (`user_id`,`role_id`),
  KEY `fk_role_id` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
 
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL,
  `status` varchar(50)  CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_id` int(11) NOT NULL,
  `cercle_id` int(11) NOT NULL,
  `logins` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `last_login` int(10) UNSIGNED,
  PRIMARY KEY  (`id`),
  FOREIGN KEY (`person_id`) REFERENCES persons(`id`),
  FOREIGN KEY (`cercle_id`) REFERENCES cercles(`id`),
  UNIQUE KEY `uniq_username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
 
CREATE TABLE IF NOT EXISTS `user_tokens` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(40) NOT NULL,
  `type` varchar(100) NOT NULL,
  `created` int(10) UNSIGNED NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uniq_token` (`token`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
 
ALTER TABLE `roles_users`
  ADD CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
 
ALTER TABLE `user_tokens`
  ADD CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

CREATE TABLE IF NOT EXISTS `persons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,  
  `last_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50)  CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_id` int(11) NOT NULL,
  `cercle_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`person_id`) REFERENCES persons(`id`),
  FOREIGN KEY (`cercle_id`) REFERENCES cercles(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `cercles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,  
  `description` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `logo_link` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `website_url` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ordres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,  
  `description` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `logo_link` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cercle_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`cercle_id`) REFERENCES cercles(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `body` BLOB NOT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`author_id`) REFERENCES users(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`article_id`) REFERENCES articles(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`article_id`) REFERENCES articles(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `comitees_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `picture_link` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gsm_number` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mail_address` varchar(200)  CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`person_id`) REFERENCES persons(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `functions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cercle_id` int(11) NOT NULL,
  `comitees_member_id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`comitees_member_id`) REFERENCES comitees_members(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `vlecks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ordre_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`ordre_id`) REFERENCES ordres(`id`),
  FOREIGN KEY (`person_id`) REFERENCES persons(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
