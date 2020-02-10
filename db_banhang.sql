/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.37-MariaDB : Database - db_banhang
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_banhang` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `db_banhang`;

/*Table structure for table `about` */

DROP TABLE IF EXISTS `about`;

CREATE TABLE `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `title` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `about` */

insert  into `about`(`id`,`image`,`active`,`title`,`content`,`created_at`,`updated_at`) values (1,'storage/images/about-01.jpg',1,'Our Story','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat consequat enim, non auctor massa ultrices non. Morbi sed odio massa. Quisque at vehicula tellus, sed tincidunt augue. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius egestas diam, eu sodales metus scelerisque congue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas gravida justo eu arcu egestas convallis. Nullam eu erat bibendum, tempus ipsum eget, dictum enim. Donec non neque ut enim dapibus tincidunt vitae nec augue. Suspendisse potenti. Proin ut est diam. Donec condimentum euismod tortor, eget facilisis diam faucibus et. Morbi a tempor elit.\r\n\r\nDonec gravida lorem elit, quis condimentum ex semper sit amet. Fusce eget ligula magna. Aliquam aliquam imperdiet sodales. Ut fringilla turpis in vehicula vehicula. Pellentesque congue ac orci ut gravida. Aliquam erat volutpat. Donec iaculis lectus a arcu facilisis, eu sodales lectus sagittis. Etiam pellentesque, magna vel dictum rutrum, neque justo eleifend elit, vel tincidunt erat arcu ut sem. Sed rutrum, turpis ut commodo efficitur, quam velit convallis ipsum, et maximus enim ligula ac ligula.\r\n\r\nAny questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879','2019-12-02 02:32:50','2019-12-12 09:32:57'),(2,'storage/images/about-02.jpg',1,'Our Mission','Mauris non lacinia magna. Sed nec lobortis dolor. Vestibulum rhoncus dignissim risus, sed consectetur erat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam maximus mauris sit amet odio convallis, in pharetra magna gravida. Praesent sed nunc fermentum mi molestie tempor. Morbi vitae viverra odio. Pellentesque ac velit egestas, luctus arcu non, laoreet mauris. Sed in ipsum tempor, consequat odio in, porttitor ante. Ut mauris ligula, volutpat in sodales in, porta non odio. Pellentesque tempor urna vitae mi vestibulum, nec venenatis nulla lobortis. Proin at gravida ante. Mauris auctor purus at lacus maximus euismod. Pellentesque vulputate massa ut nisl hendrerit, eget elementum libero iaculis.\r\n\r\nCreativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didn\'t really do it, they just saw something. It seemed obvious to them after a while.\r\n\r\n- Steve Job’s','2019-12-02 03:19:31','2019-12-02 03:29:23');

/*Table structure for table `contact` */

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` text COLLATE utf8_unicode_ci,
  `phone_number` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `contact` */

insert  into `contact`(`id`,`address`,`phone_number`,`email`,`created_at`,`updated_at`) values (1,'Xã Lai Vu - Huyện Kim Thành -Tỉnh Hải Dương','0974636884','contact@example.com',NULL,'2019-12-17 10:54:35');

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `address` int(11) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `customer` */

insert  into `customer`(`id`,`email`,`password`,`remember_token`,`name`,`phone_number`,`address`,`created_at`,`updated_at`) values (1,'nguyenducmanh811917@gmail.com','$2y$10$97VzMolgjD0HX.JLLSClju9kGm9j0b65e3/InlJsZ.gamixJIRn0q',NULL,NULL,NULL,NULL,'2019-11-20 09:54:20','2019-11-20 09:54:20');

/*Table structure for table `feedback` */

DROP TABLE IF EXISTS `feedback`;

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `feedback` */

insert  into `feedback`(`id`,`email`,`desc`,`created_at`,`updated_at`) values (1,'nguyenducmanh8197@gmail.com','1231231','2019-12-17 11:19:20','2019-12-17 11:19:20'),(2,'nguyenducmanh8197@gmail.com',NULL,'2019-12-17 11:23:35','2019-12-17 11:23:35');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

/*Table structure for table `order` */

DROP TABLE IF EXISTS `order`;

CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0-dat hang, 1- dang xu ly, 2- dang giao hang, 3 - thanh cong, -1 huy, 4 đã thanh toán',
  `order_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_desc` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `address_city` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payments` int(11) DEFAULT NULL COMMENT '0-thanh toán tiền mặt,1-thanh toán online',
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `stage_id` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `order` */

insert  into `order`(`id`,`customer_id`,`status`,`order_number`,`order_desc`,`created_time`,`updated_time`,`address_city`,`phone_number`,`payments`) values (54,15,3,'ORD-1912-0006','Ngõ 48/43 trần bình','2019-12-16 11:05:24','2019-12-16 11:34:03','HÀ nội','0974636884',NULL),(55,15,3,'ORD-1912-0007','123123','2019-12-16 11:28:54','2019-12-16 13:48:44','HÀ nội','0974636884',NULL),(56,15,3,'ORD-1912-0008','ZxZx','2019-12-16 17:09:15','2019-12-17 15:07:20','HÀ nội','0974636884',NULL),(57,15,3,'ORD-1912-0009','dc','2019-12-17 11:48:13','2019-12-17 15:05:59','HÀ nội','0974636884',NULL),(58,15,3,'ORD-2001-0001','111','2020-01-06 14:35:49','2020-01-06 14:36:16','HÀ nội','0974636884',NULL);

/*Table structure for table `order_detail` */

DROP TABLE IF EXISTS `order_detail`;

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `order_detail` */

insert  into `order_detail`(`id`,`product_id`,`order_id`,`size`,`quantity`,`price`,`created_time`,`updated_time`) values (48,48,54,27,3,10000000,NULL,NULL),(49,48,54,28,4,10000000,NULL,NULL),(50,47,54,27,3,13000000,NULL,NULL),(51,46,54,15,2,2000000,NULL,NULL),(52,37,55,11,5,2000000,NULL,NULL),(53,37,55,12,8,2000000,NULL,NULL),(54,51,56,23,5,3000000,NULL,NULL),(55,37,57,11,1,2000000,NULL,NULL),(56,38,58,11,11,500000,NULL,NULL),(57,38,58,13,12,500000,NULL,NULL);

/*Table structure for table `order_number` */

DROP TABLE IF EXISTS `order_number`;

CREATE TABLE `order_number` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_number` int(11) DEFAULT NULL,
  `month` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `order_number` */

insert  into `order_number`(`id`,`order_number`,`month`) values (3,1,'2001');

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_price_discount` float DEFAULT NULL,
  `product_image4` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_active` tinyint(1) DEFAULT '1',
  `product_category` int(11) DEFAULT NULL,
  `product_color` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_origin` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_title` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_desc` text COLLATE utf8_unicode_ci,
  `product_price` float DEFAULT NULL,
  `product_image` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_image2` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_image3` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `product_category` (`product_category`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`product_category`) REFERENCES `product_category` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product` */

insert  into `product`(`id`,`product_name`,`product_price_discount`,`product_image4`,`product_active`,`product_category`,`product_color`,`product_origin`,`product_title`,`product_desc`,`product_price`,`product_image`,`product_image2`,`product_image3`,`created_at`,`updated_at`) values (37,'FELPA CON CAPPUCCIO E ZIP STAMPA BANDANA',0,'storage/images/G9QW4TFI7IP_HN64C_0.jpg',1,1,'NERO','Made in Italy','Spedizione e resi gratuiti','Nella nuova collezione il DNA di Dolce&Gabbana è caratterizzato dalla stampa Bandana declinata nei colori del bianco e nero:\r\nFelpa con zip e cappuccio in cotone stampa Bandana:\r\n• Vestibilità regolare\r\n• Cappuccio con coulisse e finalini metallici logati\r\n• Fondo capo e polsini in maglia elastica\r\n• L\'articolo misura 72 cm dall\'attaccatura posteriore del collo sulla taglia 48 IT\r\n• Il modello è alto 185 cm e indossa la taglia 48 IT',2000000,'storage/images/G9QW4TFI7IP_HN64C_0.jpg','storage/images/G9QW4TFI7IP_HN64C_2.jpg','storage/images/G9QW4TFI7IP_HN64C_1.jpg','2019-12-16 10:22:57','2019-12-16 10:22:57'),(38,'T-SHIRT COTONE STAMPA STELLE COMETE',0,'storage/images/G9QF8TG7TRU_HA66B_3.jpg',1,1,'MULTICOLORE','Made in Italy','Spedizione e resi gratuiti','Nella collezione Millennials Star i protagonisti sono gli astri mescolati ad una nuova interpretazione grafica della stampa Leopardo per dar vita a capi contemporanei dall\'anima sportiva.\r\nT-shirt in jersey di cotone stampa Stelle Comete:\r\n• Vestibilità regolare\r\n• Scollo rotondo con etichetta logata\r\n• Maniche corte\r\n• L\'articolo misura 72 cm dall\'attaccatura posteriore del collo sulla taglia 48 IT\r\n• Il modello è alto 185 cm e indossa la taglia 48 IT',500000,'storage/images/G9QF8TG7TRU_HA66B_0.jpg','storage/images/G9QF8TG7TRU_HA66B_2.jpg','storage/images/G9QF8TG7TRU_HA66B_1.jpg','2019-12-16 10:24:37','2019-12-16 10:24:37'),(39,'CAMICIA MARTINI COTONE JACQUARD',0,'storage/images/G5EJ1TFJ5GE_W0800_4.jpg',1,1,'BIANCO','Made in Italy','Spedizione e resi gratuiti','Nella collezione DNA è la cura dei dettagli a fare la differenza. Modelli iconici vengono rinnovati con nuove proporzioni per guardare alle nuove generazioni e al loro modo di vivere le tradizioni.\r\nCamicia sartoriale realizzata in cotone jacquard floreale:\r\n• Fit Martini con vestibilità regolare\r\n• Colletto all\'italiana\r\n• Maniche lunghe\r\n• Chiusura con bottoni in madreperla\r\n• Carrè posteriore\r\n• L\'articolo misura 80 cm dall\'attaccatura posteriore del collo sulla taglia 40 IT\r\n• Il modello è alto 185 cm e indossa la taglia 40 IT',800000,'storage/images/G5EJ1TFJ5GE_W0800_0.jpg','storage/images/G5EJ1TFJ5GE_W0800_3.jpg','storage/images/G5EJ1TFJ5GE_W0800_1.jpg','2019-12-16 10:25:49','2019-12-16 10:25:49'),(40,'ZAINO SICILIA DNA IN NYLON CON LOGO GOMMATO',0,'storage/images/BM1601AZ675_80303_0.jpg',1,5,'Red','Made in Italy','Spedizione e resi gratuiti','Lo zaino sportivo della linea Sicilia Dna in nylon con logo a macroiniezione e riporti in vitello si distingue per la straordinaria capienza e vanta tasche esterne per un accesso agevole ai propri effetti personali:\r\n• Chiusura con coulisse e flap on top\r\n• Tasca piatta frontale con zip e targhetta logata gommata\r\n• Tasche laterali con zip cursore logato in galvanica palladio\r\n• Spallacci posteriori regolabili in nastro con attacchi in vitello\r\n• Fodera in nylon con tasca interna con zip, cursore logato e targhetta logata\r\n• Articolo dotato di dust bag logata\r\n• Misure: 28 x 44 x 29 cm',600000,'storage/images/BM1601AZ675_80303_0.jpg','storage/images/BM1601AZ675_80303_2.jpg','storage/images/BM1601AZ675_80303_1.jpg','2019-12-16 10:28:47','2019-12-16 10:28:47'),(41,'ZAINO SICILIA DNA IN NYLON CON LOGO GOMMATO WITE',450000,'storage/images/BM1601AZ675_80001_3.jpg',1,5,'WHITE','Made in Italy','Spedizione e resi gratuiti','Lo zaino sportivo della linea Sicilia Dna in nylon con logo a macroiniezione e riporti in vitello si distingue per la straordinaria capienza e vanta tasche esterne per un accesso agevole ai propri effetti personali:\r\n• Chiusura con coulisse e flap on top\r\n• Tasca piatta frontale con zip e targhetta logata gommata\r\n• Tasche laterali con zip cursore logato in galvanica palladio\r\n• Spallacci posteriori regolabili in nastro con attacchi in vitello\r\n• Fodera in nylon con tasca interna con zip, cursore logato e targhetta logata\r\n• Articolo dotato di dust bag logata\r\n• Misure: 28 x 44 x 29 cm',600000,'storage/images/BM1601AZ675_80001_0.jpg','storage/images/BM1601AZ675_80001_2.jpg','storage/images/BM1601AZ675_80001_1.jpg','2019-12-16 10:31:26','2019-12-16 10:31:26'),(42,'POCHETTE STAMPA DG LOGO',450000,'storage/images/BM1769AA881_HY92A_3.jpg',1,5,'Black','Made in Italy','Spedizione e resi gratuiti','Lspirato alla Logomania e alla riconoscibilità del brand, il tema DG LOGO è una proposta unisex di silhouettes sportive e modelli iconici. Pratica e leggera, la pochette realizzata in nylon stampa DG allover è pensata per le giornate offduty:\r\n• Chiusura on top con zip cursore logato\r\n• Tasca frontale con zip doppio cursore logato\r\n• Fodera in nylon\r\n• Articolo dotato di dust bag logata',500000,'storage/images/BM1769AA881_HY92A_0.jpg','storage/images/BM1769AA881_HY92A_2.jpg','storage/images/BM1769AA881_HY92A_1.jpg','2019-12-16 10:32:51','2019-12-16 10:32:51'),(43,'POCHETTE STAMPA DG LOGO RED',450000,'storage/images/BM1769AA881_HX92A_3.jpg',1,5,'Red','Made in Italy','Spedizione e resi gratuiti','Ispirato alla Logomania e alla riconoscibilità del brand, il tema DG LOGO è una proposta unisex di silhouettes sportive e modelli iconici. Pratica e leggera, la pochette realizzata in nylon stampa DG allover è pensata per le giornate offduty:\r\n• Chiusura on top con zip cursore logato\r\n• Tasca frontale con zip doppio cursore logato\r\n• Fodera in nylon\r\n• Articolo dotato di dust bag logata',500000,'storage/images/BM1769AA881_HX92A_0.jpg','storage/images/BM1769AA881_HX92A_2.jpg','storage/images/BM1769AA881_HX92A_1.jpg','2019-12-16 10:34:21','2019-12-16 10:34:21'),(44,'SNEAKER PORTOFINO IN NYLON CON LOGOTAPE',55000000,'storage/images/CS1772AJ993_8B956_3.jpg',1,3,'Black','Made in Italy','Spedizione e resi gratuiti','La sneaker della linea Portofino è realizzata in nylon con logotape stampato rifrangente:\r\n• Tomaia in nylon\r\n• Tallonetta a contrasto\r\n• Lacci piatti\r\n• Fussbett in vitello con etichetta logata\r\n• Suola in gomma\r\n• Fondo logato barocco\r\n• Packaging in tema con l\'articolo',6000000,'storage/images/CS1772AJ993_8B956_0.jpg','storage/images/CS1772AJ993_8B956_2.jpg','storage/images/CS1772AJ993_8B956_1.jpg','2019-12-16 10:36:21','2019-12-16 10:36:21'),(45,'SNEAKERS PORTOFINO IN PELLE',0,'storage/images/CK1587AH526_89926_3.jpg',1,3,'WHITE','Made in Italy','Questo articolo personalizzato non può essere reso.\r\nLa consegna avverrà in 4 settimane.','Dolce&Gabbana presenta il nuovo Sneaker Configurator #DGYOURSELF.\r\n\r\nPatch, simboli e scritte preferiti da Domenico e Stefano decoreranno la tua sneaker secondo la tua creatività.\r\nCrea la tua sneaker esclusiva e reinventa il tuo stile.\r\n\r\nSneakers della linea Portofino in vitello nappato con scritta Dolce&Gabbana nel tallone:\r\n• Tomaia in vitello\r\n• Lacci piatti\r\n• Fussbett in vitello con etichetta logata\r\n• Suola in gomma con spoiler in cuoio e logo microiniezione\r\n• Fondo logato',6000000,'storage/images/CK1587AH526_89926_0.jpg','storage/images/CK1587AH526_89926_2.jpg','storage/images/CK1587AH526_89926_1.jpg','2019-12-16 10:37:23','2019-12-16 10:37:23'),(46,'SNEAKER PORTOFINO IN VITELLO E VERNICE',0,'storage/images/CS1694AJ605_8D093_0.jpg',1,3,'NERO/BIANCO','Made in Italy','Ti ricordiamo che queste informazioni non si applicano in caso di preordini o di articoli personalizzati, per i quali troverai le informazioni su reso e tempistiche di spedizione nelle rispettive schede prodotto.','La sneaker della linea Portofino è realizzata in vernice e vitello con inserti in gomma. È caratterizzata da diverse fascette plastiche ferma lacci:\r\n• Tomaia in vitello e vernice\r\n• Lacci tubolari\r\n• Fussbett in pelle con etichetta logata\r\n• Suola in gomma\r\n• Fondo logato barocco\r\n• Packaging in tema con l\'articolo',2000000,'storage/images/CS1694AJ605_8D093_0.jpg','storage/images/CS1694AJ605_8D093_2.jpg','storage/images/CS1694AJ605_8D093_1 (1).jpg','2019-12-16 10:38:54','2019-12-16 10:38:54'),(47,'OROLOGIO ORO E MADREPERLA',0,'storage/images/WWJE1GWSB03_N0000_3.png',1,6,'NERO','Made in Italy','Lo splendore dell’oro, la magnificenza e l’opulenza del barocco siciliano hanno sempre intrigato e ispirato DOLCE&GABBANA, che interpreta il virtuosismo delle sue forme elaborate e sensuali per disegnare i gioielli e gli orologi di questa collezione.','Orologio della linea DG7 con cinturino in alligatore nero:\r\n• Materiale: oro rosa 18 kt inciso a mano - Dimensioni: diametro 40 mm - Vetro: “zaffiro” di forma convessa - Corona: oro rosa 18 kt incisa a mano\r\n• Impermeabilità: 3BAR/3ATM\r\n• Indici: in madreperla nera placcati oro rosa\r\n• Movimento meccanico automatico con una riserva di carica di 42h\r\n• Calibro: ETA 2892.A2 Swiss Made\r\n• Dimensioni: diametro 25,60 mm, h 3,80 mm\r\n• Frequenza del bilanciere: 28.800 oscillazioni ora (4 Hz)\r\n• Numero di rubini: 21\r\n• Chiusura: chiusura a scatto con pulsanti laterali in oro rosa 18kt incisa a mano.\r\n• Swissmade',13000000,'storage/images/WWJE1GWSB03_N0000_0.png','storage/images/WWJE1GWSB03_N0000_2.png','storage/images/WWJE1GWSB03_N0000_1.png','2019-12-16 10:41:27','2019-12-16 10:41:27'),(48,'OROLOGIO ORO E PAVÉ DI DIAMANTI',0,'storage/images/WWJE1GX5IDA_B0321_3.png',1,6,'BLU/ORO ROSA','Made in Italy','Lo stile del gentiluomo nella tradizione sartoriale siciliana identifica l’uomo DOLCE&GABBANA, un uomo alla ricerca dell’eleganza ma con un tocco innovativo.','Orologio della linea DG7 con cinturino in alligatore blu:\r\n• Materiale: oro rosa 18 kt - Dimensioni: diametro 40 mm - Vetro: “zaffiro” di forma convessa - Corona: oro rosa 18 kt con diamante a rosa\r\n• Impermeabilità: 3BAR/3ATM\r\n• Quadrante con pavè di 444 diamanti incolori, 0,97 ct circa range qualitativo: purezza VVS-VS, colore D-G.\r\n• Indici: 10 zaffiri blu baguette 0,98 ct circa\r\n• Movimento meccanico automatico con una riserva di carica di 42h\r\n• Massa oscillante personalizzata con Logo inciso in oro rosa 18kt\r\n• Calibro: ETA 2892.A2 Swiss Made\r\n• Dimensioni: diametro 25.60 mm, h 3.80 mm - Frequenza del bilanciere: 28.800 oscillazioni ora (4 Hz)\r\n• Numero di rubini: 21\r\n• Chiusura: a scatto con pulsanti laterali in oro rosa 18 kt',10000000,'storage/images/WWJE1GX5IDA_B0321_0.png','storage/images/WWJE1GX5IDA_B0321_2.png','storage/images/WWJE1GX5IDA_B0321_1.png','2019-12-16 11:03:34','2019-12-16 11:03:34'),(49,'OROLOGIO IN ORO CON RUBINI',0,'storage/images/WWEEGGWW045_8B267_3.png',1,6,'BORDEAUX','Made in Italy','Mr. Dolce e Mr. Gabbana hanno voluto creare una collezione elegante, riferendosi all’icona di stile degli anni ’60: Marcello Mastroianni.','Orologio della linea DG7 GEMS, con cinturino alligatore bordeaux:\r\n• Materiale: oro rosa 18 kt - Dimensioni: diametro 40 mm - Vetro: “zaffiro” di forma convessa - Corona: oro rosa 18 kt\r\n• Quadrante in oro bianco 18kt satinato\r\n• Gemme: 4 rubini rinserrati nel quadrante con un sistema assolutamente innovativo senza l’ausilio di griffes o castoni\r\n• Calibro: ETA 901.001 Swiss Made\r\n• Dimensioni: 3 mm x 15,15 mm, h 2,35 mm\r\n• Frequenza del quarzo: 32 768 Hz\r\n• Numero di rubini:3\r\n•Chiusura: a scatto con pulsanti laterali in oro rosa 18 kt\r\n• Swissmade',6000000,'storage/images/WWEEGGWW045_8B267_0.png','storage/images/WWEEGGWW045_8B267_2.png','storage/images/WWEEGGWW045_8B267_1.png','2019-12-16 10:44:08','2019-12-16 10:44:08'),(50,'CINTURA IN CUOIO CON LOGO DG INCROCIATO',0,'storage/images/BC4400AV479_80051_0.jpg',1,8,'MARRONE','Made in Italy','Ti ricordiamo che queste informazioni non si applicano in caso di preordini o di articoli personalizzati, per i quali troverai le informazioni su reso e tempistiche di spedizione nelle rispettive schede prodotto.','Cintura in cuoio con logo DG incrociato in metallo galvanizzato rutenio:\r\n• Asta in altezza 35 mm\r\n• Fibbia logo in metallo galvanizzato rutenio\r\n• Chiusura a funghetto sotto fibbia\r\n• Made in Italy',3000000,'storage/images/BC4400AV479_80051_0.jpg','storage/images/BC4400AV479_80051_2.jpg','storage/images/BC4400AV479_80051_1.jpg','2019-12-16 10:46:11','2019-12-16 10:46:11'),(51,'CINTURA IN CUOIO CON LOGO DG',1000000,'storage/images/BC4247AI894_8S077_0.jpg',1,8,'BLUE','Made in Italy','Spedizione e resi gratuiti','<h3><strong>Cintura in cuoio bottalato con logo DG in metallo galvanizzato in palladio:</strong></h3>\r\n\r\n<h3><strong>&bull; Asta in altezza 35 mm</strong></h3>\r\n\r\n<h3><strong>&bull; Fibbia logo in metallo galvanizzato palladio</strong></h3>\r\n\r\n<h3><strong>&bull; Chiusura a funghetto sotto fibbia &bull; Made in Italy</strong></h3>\r\n\r\n<p>&nbsp;</p>',3000000,'storage/images/BC4247AI894_8S077_0.jpg','storage/images/BC4247AI894_8S077_2.jpg','storage/images/BC4247AI894_8S077_1.jpg','2019-12-17 15:08:24','2019-12-17 15:08:24');

/*Table structure for table `product_category` */

DROP TABLE IF EXISTS `product_category`;

CREATE TABLE `product_category` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_category` */

insert  into `product_category`(`id`,`name`,`code`,`active`,`created_at`,`updated_at`) values (1,'Quần áo','men',1,'2019-10-21 10:34:13','2019-12-13 17:21:19'),(3,'Giầy','shoes',1,'2019-10-21 10:34:13','2019-11-22 09:23:20'),(5,'Cặp & Ví','bag',1,'2019-10-21 10:34:13','2019-12-16 11:02:43'),(6,'Đồng hồ','watches',1,'2019-10-21 10:34:13','2019-11-22 09:23:41'),(8,'Khác','other',1,'2019-11-22 09:24:36','2019-11-22 09:24:36');

/*Table structure for table `product_detail` */

DROP TABLE IF EXISTS `product_detail`;

CREATE TABLE `product_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_detail` */

insert  into `product_detail`(`id`,`product_id`,`size_id`,`quantity`) values (72,51,22,10),(73,51,23,5),(74,51,24,10),(75,51,25,10),(76,51,26,10),(77,50,22,20),(78,50,23,20),(79,50,24,20),(80,50,25,20),(81,50,26,20),(82,49,27,30),(83,49,28,30),(84,49,29,30),(85,48,27,12),(86,48,28,6),(87,48,29,10),(88,47,27,2),(89,47,28,5),(90,47,29,5),(91,46,15,13),(92,46,16,15),(93,46,18,15),(94,46,17,15),(95,46,19,15),(96,45,15,40),(97,45,16,30),(98,45,17,30),(99,45,18,30),(100,45,19,30),(101,45,21,30),(102,44,15,10),(103,44,17,10),(104,44,18,10),(105,44,21,10),(106,43,10,10),(107,43,11,10),(108,43,13,10),(109,43,14,10),(110,42,10,6),(111,42,12,6),(112,42,14,6),(113,41,10,10),(114,41,12,10),(115,41,13,10),(116,41,14,10),(117,40,10,10),(118,40,11,10),(119,40,14,10),(120,39,10,21),(121,39,11,21),(122,39,13,21),(123,39,12,21),(124,39,14,21),(125,38,11,29),(126,38,12,40),(127,38,13,28),(128,38,14,40),(129,37,11,24),(130,37,12,22),(131,37,13,30),(132,37,14,30);

/*Table structure for table `product_size` */

DROP TABLE IF EXISTS `product_size`;

CREATE TABLE `product_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_size` */

insert  into `product_size`(`id`,`name`,`active`,`created_at`,`updated_at`) values (10,'Size S',1,'2019-12-16 10:18:52','2019-12-16 10:18:52'),(11,'Size M',1,'2019-12-16 10:19:00','2019-12-16 10:19:00'),(12,'Size L',1,'2019-12-16 10:19:07','2019-12-16 10:19:07'),(13,'Size XL',1,'2019-12-16 10:19:15','2019-12-16 10:19:15'),(14,'Size XXL',1,'2019-12-16 10:19:22','2019-12-16 10:19:22'),(15,'Size 36',1,'2019-12-16 10:19:29','2019-12-16 10:19:29'),(16,'Size 37',1,'2019-12-16 10:19:37','2019-12-16 10:19:37'),(17,'Size 38',1,'2019-12-16 10:19:44','2019-12-16 10:19:44'),(18,'Size 39',1,'2019-12-16 10:19:51','2019-12-16 10:19:51'),(19,'Size 40',1,'2019-12-16 10:19:57','2019-12-16 10:19:57'),(21,'Size 41',1,'2019-12-16 10:20:16','2019-12-16 10:20:16'),(22,'Size 80cm',1,'2019-12-16 10:48:52','2019-12-16 10:48:52'),(23,'Size 90cm',1,'2019-12-16 10:49:03','2019-12-16 10:49:03'),(24,'Size 100cm',1,'2019-12-16 10:49:10','2019-12-16 10:49:10'),(25,'Size 110cm',1,'2019-12-16 10:49:17','2019-12-16 10:49:17'),(26,'Size 120cm',1,'2019-12-16 10:49:24','2019-12-16 10:49:24'),(27,'Size 40mm',1,'2019-12-16 10:56:10','2019-12-16 10:56:10'),(28,'Size 36mm',1,'2019-12-16 10:56:17','2019-12-16 10:56:17'),(29,'Size 44mm',1,'2019-12-16 10:56:29','2019-12-16 10:56:37');

/*Table structure for table `slide` */

DROP TABLE IF EXISTS `slide`;

CREATE TABLE `slide` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `image` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `slide` */

insert  into `slide`(`id`,`image`,`title`,`content`,`active`,`created_at`,`updated_at`) values (3,'storage/images/dolce-and-gabbana-christmas-take-over-2019-top-banner-01.jpg','CHRISTMAS MARKET','<p>This holiday season Dolce&amp;Gabbana has prepared an exclusive festive atmosphere.</p>\r\n\r\n<p>Explore the most awaited time of year.</p>',1,'2019-12-31 10:22:53','2019-12-31 10:22:53'),(4,'storage/images/dolce-and-gabbana-man-SS20-dna-collection-banner-online-store-cover-02.jpg','THE CHRISTMAS CLASSICS','Discover the essential pieces for a new look',1,'2019-12-17 15:51:23','2019-12-17 15:51:23'),(5,'storage/images/dolce-and-gabbana-woman-accessories-configuratore-sicily-online-store-cover-02.jpg','CREATE YOUR OWN SICILY BAG','Personalize your bag with special paintings and your initials',1,'2019-12-17 15:51:50','2019-12-17 15:51:50');

/*Table structure for table `stage` */

DROP TABLE IF EXISTS `stage`;

CREATE TABLE `stage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `stage` */

insert  into `stage`(`id`,`name`,`active`,`created_at`,`updated_at`) values (1,'dang ship',1,'2019-12-03 14:08:50','0000-00-00 00:00:00');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(1) DEFAULT NULL COMMENT '1:admin',
  `phone_number` int(20) DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`image`,`name`,`email`,`type`,`phone_number`,`address`,`email_verified_at`,`active`,`password`,`remember_token`,`created_at`,`updated_at`) values (15,'storage/images/78703895_246579119636980_4700317401634308096_o.jpg','Nguyễn Đức Mạnh','nguyenducmanh8197@gmail.com',1,974636884,'Hà nội',NULL,1,'$2y$10$4JRkjnlpNGRQUQmjhJX5O.WGzi8ZbkDqPItWCzGzgGxMm3lWEzp86',NULL,'2019-11-23 08:31:17','2019-12-31 10:40:21'),(16,'storage/images/80346427_1447205498769223_9108026077325819904_n.jpg','Mạnh Nguyễn','nguyenducmanh81917@gmail.com',0,NULL,NULL,NULL,1,'$2y$10$Rh8rjkG62CTQpwnO9uOqpuNSjaLI3W0tYsy77FHh.u/hvIXfj/3Pi',NULL,'2019-12-13 13:22:51','2019-12-31 10:22:03');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
