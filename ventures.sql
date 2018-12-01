#
# SQL Export
# Created by Querious (201048)
# Created: 1 December 2018 at 04:34:03 CET
# Encoding: Unicode (UTF-8)
#


SET @PREVIOUS_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS;
SET FOREIGN_KEY_CHECKS = 0;


DROP TABLE IF EXISTS `comments`;
DROP TABLE IF EXISTS `posts`;
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `cities`;


CREATE TABLE `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;


CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(128) DEFAULT NULL,
  `last_name` varchar(128) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `city_id` (`city_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;


CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `user_id` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `allow_comments` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;


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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;




SET FOREIGN_KEY_CHECKS = @PREVIOUS_FOREIGN_KEY_CHECKS;


SET @PREVIOUS_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS;
SET FOREIGN_KEY_CHECKS = 0;


LOCK TABLES `cities` WRITE;
ALTER TABLE `cities` DISABLE KEYS;
INSERT INTO `cities` (`id`, `city`, `created_at`, `updated_at`) VALUES 
	(1,'Amsterdam','2018-11-29 16:49:29','2018-11-29 16:49:29'),
	(2,'Nijmegen','2018-11-29 16:52:24','2018-11-29 16:52:24'),
	(3,'Rotterdam','2018-11-29 16:49:35','2018-11-29 16:49:35'),
	(4,'Utrecht','2018-11-29 16:49:43','2018-11-29 16:49:43'),
	(5,'Berlin','2018-11-29 16:49:48','2018-11-29 16:49:48'),
	(6,'Bruges','2018-11-29 16:49:52','2018-11-29 16:49:52');
ALTER TABLE `cities` ENABLE KEYS;
UNLOCK TABLES;


LOCK TABLES `users` WRITE;
ALTER TABLE `users` DISABLE KEYS;
INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `city_id`, `user_type`, `created_at`, `updated_at`) VALUES 
	(1,'John','Doe','john@doe.com','admin123',1,0,'2018-11-29 16:50:13','2018-11-29 16:50:13'),
	(2,'Jane','Doe','jane@doe.com','jane123',1,0,'2018-11-29 16:50:26','2018-11-29 16:50:26'),
	(3,'Jack','O\'Hearts','jack@hearts.com','jack123',2,0,'2018-11-29 16:52:45','2018-11-29 16:52:45'),
	(8,'Elvis2','Costello','test@email.com','$2y$10$H2l29b450QcFtz2pmfsyquke02kZIewPxYaEO9Pu3d04QVHh9orfO',NULL,0,'2018-11-29 17:08:03','2018-12-01 03:08:59'),
	(10,'Newer','Account','sample@email.com','$2y$10$wUNC9fGzmaYmtnoORJFl.O5EiKXKJ25PVZCypKt7nS6.Up/DEEqYq',NULL,0,'2018-11-30 01:09:42','2018-11-30 01:23:35'),
	(11,'Admin','McAdmin','admin@admin.com','$2y$10$ppGIAxu4WC0TD..Jywwg9eMPJA76GkHQptPeT4xikfcaMkuJthJIa',3,1,'2018-11-30 21:09:10','2018-11-30 21:09:10');
ALTER TABLE `users` ENABLE KEYS;
UNLOCK TABLES;


LOCK TABLES `posts` WRITE;
ALTER TABLE `posts` DISABLE KEYS;
INSERT INTO `posts` (`id`, `content`, `user_id`, `created_at`, `updated_at`, `allow_comments`) VALUES 
	(1,'Sample post',1,'2018-11-29 16:54:28','2018-11-29 16:54:28',1),
	(2,'Another sample post',2,'2018-11-29 16:54:36','2018-11-29 16:54:36',1);
ALTER TABLE `posts` ENABLE KEYS;
UNLOCK TABLES;


LOCK TABLES `comments` WRITE;
ALTER TABLE `comments` DISABLE KEYS;
INSERT INTO `comments` (`id`, `content`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES 
	(1,'Test test test',2,2,'2018-11-29 16:54:48','2018-11-29 16:54:48'),
	(2,'Another test',3,1,'2018-11-29 16:54:56','2018-11-29 16:54:56'),
	(3,'Comment comment comment',1,2,'2018-11-29 16:55:10','2018-11-29 16:55:10'),
	(4,'Words words words',3,2,'2018-11-29 16:55:24','2018-11-29 16:55:24'),
	(11,'Test test test test tesaaa',8,2,'2018-12-01 02:51:03','2018-12-01 02:51:03');
ALTER TABLE `comments` ENABLE KEYS;
UNLOCK TABLES;




SET FOREIGN_KEY_CHECKS = @PREVIOUS_FOREIGN_KEY_CHECKS;


