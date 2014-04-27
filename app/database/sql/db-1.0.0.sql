/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cinemadb` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `cinemadb`;

/*Table structure for table `cinemas` */

DROP TABLE IF EXISTS `cinemas`;

CREATE TABLE `cinemas` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
  `geo` VARCHAR(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_cinemas_name` (`name`)
) ENGINE=INNODB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `cinemas` */

INSERT  INTO `cinemas`(`id`,`name`,`address`,`geo`,`created_at`,`updated_at`) VALUES (1,'Cinema1','Address1','Geo1','2014-04-27 17:19:47','2014-04-27 17:19:47'),(2,'Cinema2','Address2','Geo2','2014-04-27 17:20:13','2014-04-27 17:20:13'),(3,'Cinema3','Address3','Geo3','2014-04-27 17:20:25','2014-04-27 17:20:25'),(4,'Cinema4','Address4','Geo4','2014-04-27 17:21:01','2014-04-27 17:21:01'),(5,'Cinema5','Address5','Geo5','2014-04-27 17:21:11','2014-04-27 17:21:11'),(6,'Cinema6','Address6','Geo6','2014-04-27 17:21:20','2014-04-27 17:21:20'),(7,'Cinema7','Address7','Geo7','2014-04-27 17:21:30','2014-04-27 17:21:30'),(8,'Cinema8','Address8','Geo8','2014-04-27 17:21:40','2014-04-27 17:21:40'),(9,'Cinema9','Address9','Geo9','2014-04-27 17:21:49','2014-04-27 17:21:49'),(10,'Cinema10','Address10','Geo10','2014-04-27 17:22:01','2014-04-27 17:22:01'),(11,'Cinema11','Address11','Geo11','2014-04-27 17:22:09','2014-04-27 17:22:09'),(12,'Cinema12','Address12','Geo12','2014-04-27 17:22:19','2014-04-27 17:22:19'),(13,'Cinema13','Address13','Geo13','2014-04-27 17:22:28','2014-04-27 17:22:28'),(14,'Cinema14','Address14','Geo14','2014-04-27 17:22:37','2014-04-27 17:22:37'),(15,'Cinema15','Address15','Geo15','2014-04-27 17:22:45','2014-04-27 17:22:45'),(16,'Cinema16','Address16','Geo16','2014-04-27 17:22:53','2014-04-27 17:22:53'),(17,'Cinema17','Address17','Geo17','2014-04-27 17:23:01','2014-04-27 17:23:01'),(18,'Cinema18','Address18','Geo18','2014-04-27 17:23:09','2014-04-27 17:23:09'),(19,'Cinema19','Address19','Geo19','2014-04-27 17:23:18','2014-04-27 17:23:18'),(20,'Cinema20','Address20','Geo20','2014-04-27 17:23:27','2014-04-27 17:23:27');

/*Table structure for table `movies` */

DROP TABLE IF EXISTS `movies`;

CREATE TABLE `movies` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(30) COLLATE utf8_unicode_ci NOT NULL,
  `year` INT(4) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_movies_title` (`title`)
) ENGINE=INNODB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `movies` */

INSERT  INTO `movies`(`id`,`title`,`year`,`created_at`,`updated_at`) VALUES (1,'Title1',2014,'2014-04-27 17:24:02','2014-04-27 17:24:02'),(2,'Title2',2014,'2014-04-27 17:24:07','2014-04-27 17:24:07'),(3,'Title3',2014,'2014-04-27 17:24:12','2014-04-27 17:24:12'),(4,'Title4',2014,'2014-04-27 17:24:21','2014-04-27 17:24:21'),(5,'Title5',2014,'2014-04-27 17:24:25','2014-04-27 17:24:25'),(6,'Title6',2014,'2014-04-27 17:24:29','2014-04-27 17:24:29'),(7,'Title7',2014,'2014-04-27 17:24:35','2014-04-27 17:24:35'),(8,'Title8',2014,'2014-04-27 17:24:48','2014-04-27 17:24:48'),(9,'Title9',2014,'2014-04-27 17:24:53','2014-04-27 17:24:53'),(10,'Title10',2014,'2014-04-27 17:24:57','2014-04-27 17:24:57'),(11,'Title11',2014,'2014-04-27 17:25:02','2014-04-27 17:25:02'),(12,'Title12',2014,'2014-04-27 17:25:06','2014-04-27 17:25:06'),(13,'Title13',2014,'2014-04-27 17:25:11','2014-04-27 17:25:11'),(14,'Title14',2014,'2014-04-27 17:25:15','2014-04-27 17:25:15'),(15,'Title15',2014,'2014-04-27 17:25:19','2014-04-27 17:25:19'),(16,'Title16',2014,'2014-04-27 17:25:22','2014-04-27 17:25:22'),(17,'Title17',2014,'2014-04-27 17:25:26','2014-04-27 17:25:26'),(18,'Title18',2014,'2014-04-27 17:25:30','2014-04-27 17:25:30'),(19,'Title19',2014,'2014-04-27 17:25:34','2014-04-27 17:25:34'),(20,'Title20',2014,'2014-04-27 17:25:39','2014-04-27 17:25:39');

/*Table structure for table `moviesessions` */

DROP TABLE IF EXISTS `moviesessions`;

CREATE TABLE `moviesessions` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `movie_id` INT(11) UNSIGNED NOT NULL,
  `cinema_id` INT(11) UNSIGNED NOT NULL,
  `datetime` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_moviesessions_mcd` (`movie_id`,`cinema_id`,`datetime`),
  KEY `FK_cinemas_cinema_id` (`cinema_id`),
  CONSTRAINT `FK_cinemas_cinema_id` FOREIGN KEY (`cinema_id`) REFERENCES `cinemas` (`id`),
  CONSTRAINT `FK_movies_movie_id` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`)
) ENGINE=INNODB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `moviesessions` */

INSERT  INTO `moviesessions`(`id`,`movie_id`,`cinema_id`,`datetime`,`created_at`,`updated_at`) VALUES (1,1,1,'2014-04-28 15:00:00','2014-04-27 17:27:38','2014-04-27 17:27:38'),(2,2,1,'2014-04-28 15:00:00','2014-04-27 17:27:42','2014-04-27 17:27:42'),(3,3,1,'2014-04-28 15:00:00','2014-04-27 17:27:46','2014-04-27 17:27:46'),(4,4,1,'2014-04-28 15:00:00','2014-04-27 17:27:58','2014-04-27 17:27:58'),(5,5,1,'2014-04-28 15:00:00','2014-04-27 17:28:01','2014-04-27 17:28:01'),(6,6,1,'2014-04-28 15:00:00','2014-04-27 17:28:05','2014-04-27 17:28:05'),(7,8,1,'2014-04-28 15:00:00','2014-04-27 17:28:08','2014-04-27 17:28:08'),(8,9,1,'2014-04-28 15:00:00','2014-04-27 17:28:12','2014-04-27 17:28:12'),(9,10,1,'2014-04-28 15:00:00','2014-04-27 17:28:15','2014-04-27 17:28:15'),(10,11,1,'2014-04-28 15:00:00','2014-04-27 17:28:19','2014-04-27 17:28:19'),(11,12,1,'2014-04-28 15:00:00','2014-04-27 17:28:23','2014-04-27 17:28:23'),(12,13,1,'2014-04-28 15:00:00','2014-04-27 17:28:26','2014-04-27 17:28:26'),(13,14,1,'2014-04-28 15:00:00','2014-04-27 17:28:29','2014-04-27 17:28:29'),(14,15,1,'2014-04-28 15:00:00','2014-04-27 17:28:32','2014-04-27 17:28:32'),(15,16,1,'2014-04-28 15:00:00','2014-04-27 17:28:36','2014-04-27 17:28:36'),(16,17,1,'2014-04-28 15:00:00','2014-04-27 17:28:40','2014-04-27 17:28:40'),(17,18,1,'2014-04-28 15:00:00','2014-04-27 17:28:43','2014-04-27 17:28:43'),(18,19,1,'2014-04-28 15:00:00','2014-04-27 17:28:48','2014-04-27 17:28:48'),(19,20,1,'2014-04-28 15:00:00','2014-04-27 17:28:52','2014-04-27 17:28:52');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(20) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` VARCHAR(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` VARCHAR(80) COLLATE utf8_unicode_ci NOT NULL,
  `username` VARCHAR(11) COLLATE utf8_unicode_ci NOT NULL,
  `password` VARCHAR(60) COLLATE utf8_unicode_ci NOT NULL,
  `active` TINYINT(1) NOT NULL DEFAULT '0',
  `remember_token` VARCHAR(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_users_email` (`email`),
  UNIQUE KEY `UK_users_username` (`username`)
) ENGINE=INNODB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

INSERT  INTO `users`(`id`,`first_name`,`last_name`,`email`,`username`,`password`,`active`,`remember_token`,`created_at`,`updated_at`) VALUES (1,'George','Sayegh','george.sayegh@digitalpacific.com.au','admin','$2y$10$BULWJBk4Kw3GI6ySQSKzZu/ewy6kesxod2efl7g5ovV7qghUWv28e',1,'','2014-04-27 08:59:30','2014-04-27 14:05:28');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
