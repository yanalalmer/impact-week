#
# SQL Export
# Created by Querious (201048)
# Created: 29 November 2018 at 16:56:05 CET
# Encoding: Unicode (UTF-8)
#


SET @PREVIOUS_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS;
SET FOREIGN_KEY_CHECKS = 0;


DROP TABLE IF EXISTS `comments`;
DROP TABLE IF EXISTS `posts`;
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `cities`;
DROP TABLE IF EXISTS `countries`;


CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


CREATE TABLE `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`),
  CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;


CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(128) DEFAULT NULL,
  `last_name` varchar(128) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `city_id` (`city_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;


CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `user_id` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;


CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `user_id` int(11) DEFAULT '0',
  `post_id` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;




SET FOREIGN_KEY_CHECKS = @PREVIOUS_FOREIGN_KEY_CHECKS;


SET @PREVIOUS_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS;
SET FOREIGN_KEY_CHECKS = 0;


LOCK TABLES `countries` WRITE;
ALTER TABLE `countries` DISABLE KEYS;
INSERT INTO `countries` (`id`, `country`, `created_at`, `updated_at`) VALUES 
	(1,'The Netherlands','2018-11-29 16:49:04','2018-11-29 16:49:04'),
	(2,'Germany','2018-11-29 16:49:08','2018-11-29 16:49:08'),
	(3,'Belgium','2018-11-29 16:49:19','2018-11-29 16:49:19');
ALTER TABLE `countries` ENABLE KEYS;
UNLOCK TABLES;


LOCK TABLES `cities` WRITE;
ALTER TABLE `cities` DISABLE KEYS;
INSERT INTO `cities` (`id`, `city`, `country_id`, `created_at`, `updated_at`) VALUES 
	(1,'Amsterdam',1,'2018-11-29 16:49:29','2018-11-29 16:49:29'),
	(2,'Nijmegen',1,'2018-11-29 16:52:24','2018-11-29 16:52:24'),
	(3,'Rotterdam',1,'2018-11-29 16:49:35','2018-11-29 16:49:35'),
	(4,'Utrecht',1,'2018-11-29 16:49:43','2018-11-29 16:49:43'),
	(5,'Berlin',2,'2018-11-29 16:49:48','2018-11-29 16:49:48'),
	(6,'Bruges',3,'2018-11-29 16:49:52','2018-11-29 16:49:52');
ALTER TABLE `cities` ENABLE KEYS;
UNLOCK TABLES;


LOCK TABLES `users` WRITE;
ALTER TABLE `users` DISABLE KEYS;
INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `city_id`, `created_at`, `updated_at`) VALUES 
	(1,'John','Doe','john@doe.com','admin123',1,'2018-11-29 16:50:13','2018-11-29 16:50:13'),
	(2,'Jane','Doe','jane@doe.com','jane123',1,'2018-11-29 16:50:26','2018-11-29 16:50:26'),
	(3,'Jack','O\'Hearts','jack@hearts.com','jack123',2,'2018-11-29 16:52:45','2018-11-29 16:52:45');
ALTER TABLE `users` ENABLE KEYS;
UNLOCK TABLES;


LOCK TABLES `posts` WRITE;
ALTER TABLE `posts` DISABLE KEYS;
INSERT INTO `posts` (`id`, `content`, `user_id`, `created_at`, `updated_at`) VALUES 
	(1,'Sample post',1,'2018-11-29 16:54:28','2018-11-29 16:54:28'),
	(2,'Another sample post',2,'2018-11-29 16:54:36','2018-11-29 16:54:36');
ALTER TABLE `posts` ENABLE KEYS;
UNLOCK TABLES;


LOCK TABLES `comments` WRITE;
ALTER TABLE `comments` DISABLE KEYS;
INSERT INTO `comments` (`id`, `content`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES 
	(1,'Test test test',2,2,'2018-11-29 16:54:48','2018-11-29 16:54:48'),
	(2,'Another test',3,1,'2018-11-29 16:54:56','2018-11-29 16:54:56'),
	(3,'Comment comment comment',1,2,'2018-11-29 16:55:10','2018-11-29 16:55:10'),
	(4,'Words words words',3,2,'2018-11-29 16:55:24','2018-11-29 16:55:24');
ALTER TABLE `comments` ENABLE KEYS;
UNLOCK TABLES;




SET FOREIGN_KEY_CHECKS = @PREVIOUS_FOREIGN_KEY_CHECKS;


