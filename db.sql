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
  `first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,  
  `last_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50)  CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cercle_id` int(11) NOT NULL,
  `logins` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `last_login` int(10) UNSIGNED,
  PRIMARY KEY  (`id`),
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

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,  
  `last_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50)  CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cercle_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
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
  `type` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `body` LONGTEXT NOT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`author_id`) REFERENCES users(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `comiteemembers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cercle_id` int(11) NOT NULL,
  `function` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci,  
  `last_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `picture_link` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `gsm_number` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `mail_address` varchar(200)  CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`cercle_id`) REFERENCES cercles(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `vlecks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ordre_id` int(11) NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,  
  `last_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`ordre_id`) REFERENCES ordres(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `formquestions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form_slug` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `body` TEXT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `formanswers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form_slug`varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `question_id` int(11) NOT NULL,
  `body` TEXT NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`question_id`) REFERENCES questions(`id`)
)  ENGINE=MyISAM DEFAULT CHARSET=utf8;
  
INSERT INTO `cercles` (`name`, `description`, `logo_link`, `website_url`) VALUES('ACE', 'Association des Cercles Etudiants', 'public/images/logoACE.jpg', 'http://www.ace-ulb.be');
INSERT INTO `cercles` (`name`, `description`, `logo_link`, `website_url`) VALUES('AGRO', 'Cercle des BioIngénieurs', 'public/images/logos/agro.png', 'http://www.cercle-agro.be/');
INSERT INTO `cercles` (`name`, `description`, `logo_link`, `website_url`) VALUES('CARé', 'Cercle des Architectes Réunis', 'public/images/logos/care.jpg', 'http://www.facebook.com/groups/400216605564/');
INSERT INTO `cercles` (`name`, `description`, `logo_link`, `website_url`) VALUES('CD', 'Cercle de Droit', 'public/images/logos/cd.png', 'http://www.cerclededroit.be/');
INSERT INTO `cercles` (`name`, `description`, `logo_link`, `website_url`) VALUES('CdH', "Cercle d'Histoire", 'public/images/logos/cdh.png', 'http://www.cerclehistoire.be');
INSERT INTO `cercles` (`name`, `description`, `logo_link`, `website_url`) VALUES('CdS', 'Cercle des Sciences', 'public/images/logos/cds.jpg', 'http://www.cercledessciences.be');
INSERT INTO `cercles` (`name`, `description`, `logo_link`, `website_url`) VALUES('CEBULB', "Cercle des Étudiants Borains de l'ULB", 'public/images/logos/cebulb.png', 'http://www.cebulb.be');
INSERT INTO `cercles` (`name`, `description`, `logo_link`, `website_url`) VALUES('CECS', 'Cercle des Étudiants du Centre et ses Sympathisants', 'public/images/logos/cecs.jpg', 'https://sites.google.com/site/cecsulb/');
INSERT INTO `cercles` (`name`, `description`, `logo_link`, `website_url`) VALUES('CELB', 'Cercle des Étudiants Luxembourgeois à Bruxelles', 'public/images/logos/celb.jpg', 'http://www.celb.lu');
INSERT INTO `cercles` (`name`, `description`, `logo_link`, `website_url`) VALUES('CePHA', 'Cercle des Étudiants en Pharmacie', 'public/images/logos/cepha.jpg', 'http://dev.ulb.ac.be/student/cepha/');
INSERT INTO `cercles` (`name`, `description`, `logo_link`, `website_url`) VALUES('CGEO', 'Cercle de Géographie et de Géologie', 'public/images/logos/cgeo.jpg', 'http://www.cgeo.be');
INSERT INTO `cercles` (`name`, `description`, `logo_link`, `website_url`) VALUES('CHAA', "Cercle d'Histoire de l'Art et Archéologie", 'public/images/logos/chaa.png', 'http://www.chaa.be');
INSERT INTO `cercles` (`name`, `description`, `logo_link`, `website_url`) VALUES('Chimacienne', 'Cercle de la Chimacienne de Bruxelles', 'public/images/logos/chimacienne.png', 'http://chimacienne-bxl.e-monsite.com/');
INSERT INTO `cercles` (`name`, `description`, `logo_link`, `website_url`) VALUES('CI', 'Cercle Informatique', 'public/images/logos/ci.jpg', 'http://www.cerkinfo.be');
INSERT INTO `cercles` (`name`, `description`, `logo_link`, `website_url`) VALUES('CIGA', 'Cercle des Infirmiers Gradués et Accoucheuses', 'public/images/logos/ciga.png', 'http://www.ulb.ac.be/students/ciga/');
INSERT INTO `cercles` (`name`, `description`, `logo_link`, `website_url`) VALUES('CJC', 'Cercle de Journalisme et Communication', 'public/images/logos/cjc.jpg', 'http://www.cjculb.be');
INSERT INTO `cercles` (`name`, `description`, `logo_link`, `website_url`) VALUES('CK', 'Cercle de Kinésithérapie', 'public/images/logos/ck.png', 'http://www.cerclekine.be');
INSERT INTO `cercles` (`name`, `description`, `logo_link`, `website_url`) VALUES('CM', 'Cercle de Médecine', 'public/images/logos/cm.png', 'http://www.cercle-medecine.be');
INSERT INTO `cercles` (`name`, `description`, `logo_link`, `website_url`) VALUES('CP', 'Cercle Polytechnique', 'public/images/logos/cp.png', 'http://www.cerclepolytechnique.be');
INSERT INTO `cercles` (`name`, `description`, `logo_link`, `website_url`) VALUES('CPL', 'Cercle de Philosophie et Lettres', 'public/images/logos/cpl.jpg', 'http://www.cercle-philo.be');
INSERT INTO `cercles` (`name`, `description`, `logo_link`, `website_url`) VALUES('CPS', 'Cercle des Étudiants en Sciences Politiques et Sociales', 'public/images/logos/cps.png', 'http://www.cpsulb.be');
INSERT INTO `cercles` (`name`, `description`, `logo_link`, `website_url`) VALUES('CPSY', 'Cercle de Psychologie', 'public/images/logos/cpsy.png', 'http://www.students-psycho.site.ulb.ac.be/CPSY/');
INSERT INTO `cercles` (`name`, `description`, `logo_link`, `website_url`) VALUES('CROM', 'Cercle de Romanes', 'public/images/logos/crom.png', 'http://www.romanes.be');
INSERT INTO `cercles` (`name`, `description`, `logo_link`, `website_url`) VALUES('CS', 'Cercle Solvay', 'public/images/logos/cs.png', 'http://www.cercle-solvay.be');
INSERT INTO `cercles` (`name`, `description`, `logo_link`, `website_url`) VALUES('FRONTA', 'Cercle La Frontalière', 'public/images/logos/fronta.png', 'http://www.lafronta.be');
INSERT INTO `cercles` (`name`, `description`, `logo_link`, `website_url`) VALUES('ISEP', "Cercle d'Éducation Physique", 'public/images/logos/isep.png', 'http://sites.google.com/site/cercleisep/');
INSERT INTO `cercles` (`name`, `description`, `logo_link`, `website_url`) VALUES('La LUX', 'Cercle des Étudiants de la Province du Luxembourg', 'public/images/logos/lux.jpg', 'http://www.luxbxl.be');
INSERT INTO `cercles` (`name`, `description`, `logo_link`, `website_url`) VALUES('Librex', 'Cercle du Libre Examen', 'public/images/logos/librex.png', 'http://www.librex.be');
INSERT INTO `cercles` (`name`, `description`, `logo_link`, `website_url`) VALUES('Namuroise', 'Cercle de la Namuroise de Bruxelles', 'public/images/logos/nam.jpg', 'http://www.namuroise-bxl.be');
INSERT INTO `cercles` (`name`, `description`, `logo_link`, `website_url`) VALUES('Semeur', 'Cercle des étudiants du pays de Charleroi et de Thudinie', 'public/images/logos/semeur.png', 'http://www.lesemeur.be');
