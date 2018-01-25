-- MySQL dump 10.16  Distrib 10.2.11-MariaDB, for osx10.13 (x86_64)
--
-- Host: 127.0.0.1    Database: blog
-- ------------------------------------------------------
-- Server version	10.2.11-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(10) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `comment_at` datetime DEFAULT NULL,
  `validated` tinyint(3) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `fk_post_id` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,1,'romain','ddeddededededde','2017-12-18 09:31:06',1),(2,2,'vff','ccc','2017-12-27 20:39:09',1),(3,2,'romain','ertz','2017-12-27 20:39:20',0),(4,1,'Xennef','Pas mal cet article, je connaissais  pas l\'histoire.','2017-12-27 23:22:34',1),(5,4,'Charlie','comprends rien a ce qu\'il y a écrit','2017-12-28 09:10:01',1),(6,4,'test','test2','2017-12-28 14:07:10',0),(7,1,'qwee','ddfdd','2018-01-18 20:14:56',1),(8,1,'eeeee','eerer','2017-12-28 16:43:15',1),(9,1,'test 4 ','rrererer','2017-12-28 18:23:19',0),(10,1,'ffff','fvvv','2018-01-09 12:53:52',0),(11,1,'gino','Lorem ipsum blabla','2018-01-18 20:15:01',1),(15,30,'vvfvf','vfvfvfv','2018-01-22 22:38:46',1);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `chapo` longtext DEFAULT 'NULL',
  `content` longtext DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `creation_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'L\'histoire de la Cryptomonnaie','L\'histoire de la cryptomonnaie est en fait assez courte. Oui, nous avons eu des systèmes de monnaie numérique avant que ces cryptomonnaies existaient,mais ils ne sont pas la même chose.\r\nddfdff','Les anciennes versions de monnaies numériques étaient strictement centralisée, alors que ces nouvelles formes de crypto-monnaie,\r\ncomme Bitcoin et Ethereum, sont décentralisées dans leur nature.\r\nMaintenant, ce qui est vraiment intéressant dans les cryptomonnaies est qu\'ils ont jamais été destinées à inventer comme ils sont connus aujourd\'hui.\r\nTout cela a commencé avec le Bitcoin tristement célèbre et un homme nommé Satoshi Nakamoto.\r\n\r\nL\'objectif de Nakamoto au commencement était rien de plus que de créer un système informatique de trésorerie pairs à pairs (P2P) .\r\nLes gens avaient longtemps essayé de créer une sorte de système de l\'argent numérique en ligne, mais avaient toujours échoué en raison des problèmes avec la centralisation.\r\nSatoshi Nakamoto savait qu\'une autre tentative de construction d\'un système de trésorerie centralisé en ligne ne ferait qu\'un échec de plus,\r\nil a donc décidé de créer un système de trésorerie numérique qui avait pas d\'autorité centralisée.\r\n\r\nEt ainsi vint la naissance du Bitcoin.\r\nOui, Satoshi Nakamoto a inventé le Bitcoin, la première forme décentralisée de l\'argent numérique qui n\'avait pas d\'administration centrale ou d\'un organisme de contrôle.\r\nBitcoin devait être la propriété de l\'ensemble de la communauté Bitcoin. (source: Prizm, steemit)','Jean','2017-11-29 14:25:27','2018-01-18 21:33:38','1516307618_1.jpg'),(2,'Article 2 yolo mdr','test 2t sdf sdf sqd fqsdf qsdfqsdkjhf qghslkjf hqzsldkjf hqsmdljf hqsmlkdf hjqsmlkd fjmqlksdj fmlqksd jfmlqskd jfmqlskd jfmqlskd j','Ut vitae nibh vel neque maximus interdum. Curabitur in felis nec felis efficitur porta. Nulla laoreet imperdiet purus et maximus. Cras id elementum ante. Pellentesque sed arcu mollis, cursus justo nec, dignissim felis. Nullam eleifend diam sit amet nunc sollicitudin, sodales ornare orci consequat. Duis blandit massa tellus, id vulputate tortor. ','Albert','2017-11-29 14:25:47','2018-01-18 21:19:00','1516306740_2.jpg'),(3,'Donnez des cours particuliers pour compléter vos revenus','Donnez des cours à domicile est une bonne solution si vous cherchez à gagner quelques centaines d’euros supplémentaires avec des horaires de travail flexibles ?\r\n\r\nSi vous possédez des qualités de compréhension et d’explication, vous ferez sûrement un(e) excellent(e) professeur à domicile.\r\n\r\nCela vous tente ? Découvrez les voies pour y arriver.','Les académies de cours à domicile\r\n\r\nIl existe en France de nombreuses entreprises qui proposent des cours de soutien scolaire à domicile. Elles servent d’intermédiaires entre les professeurs et les familles en demande de cours. Techniquement, vous serez employé(e) par les familles, mais l’entreprise se chargera de toutes les démarches administratives, vous fournira du matériel pédagogique et vous payera les heures de cours à un tarif défini à l’avance (généralement entre 10 et 20 euros de l’heure ; plus vos élèves sont à un niveau avancé de leur scolarité, plus votre salaire est élevé) ; elle agira également en tant que médiatrice en cas de problème entre vous et la famille.\r\nComment postuler ?\r\n\r\nIl suffit de taper sur Google « soutien scolaire à domicile » et vous tomberez sur un grand nombre de ces « académies ». La plupart d’entre elles ont une page web où elles détaillent leur processus de recrutement. Il vous faudra envoyer un dossier de candidature et passer un entretien, et en cas de sélection vous ferez partie de leur bassin de professeurs. A partir de là, il vous suffit de fournir à l’académie vos disponibilités horaires, et celle-ci vous appellera lorsqu’elle aura une demande de cours adaptée à votre profil.\r\nAvantages et inconvénients des académies de cours à domicile\r\n\r\nÉvidemment ces entreprises gardent une partie de l’argent payé par les familles, mais travailler avec elles a quand même plein d’avantages, surtout si vous débutez. Vous n’aurez pas besoin de chercher votre clientèle, vous aurez des supports pédagogiques, ce qui vous épargnera énormément de travail en termes de préparation de cours, et vous n’aurez pas à négocier votre salaire. Le seul problème, c’est que pour être sûres de pouvoir répondre à la demande des familles, elles ont plus de professeurs que le nécessaire, et vous fourniront donc souvent peu de cours par rapport à ce que vous souhaiteriez. Il arrive même que certaines ne vous appellent jamais ! Ceci dit, la plupart n’exigent pas l’exclusivité, ce qui vous permet de travailler pour plusieurs d’entre elles et en parallèle de donner des cours pour votre compte. En plus, lorsque vous les quittez, vous pouvez généralement garder les supports pédagogiques et vous en servir pour vos propres cours.\r\nDonner des cours à domicile pour votre propre compte\r\n\r\nIl vous faudra chercher vous-même vos élèves, ce que vous pouvez faire à partir de votre réseau personnel, d’annonces dans la rue (notamment près des établissements d’enseignement), ou sur des journaux et sites Internet. A vous de négocier le salaire, qui devra tenir compte de l’endroit où vous donnez les cours (si vous allez chez la famille, vous devriez toucher plus que si vous les donnez chez vous, car les frais et le temps de déplacement sont à prendre en compte) ; généralement les prix tournent aussi autour de 10 à 20 euros de l’heure. Enfin, à vous de préparer les cours ; il y a énormément de sites sur Internet où vous trouverez les ressources pédagogiques nécessaires, à commencer par celui de l’Éducation Nationale, Éduscol. Vous y passerez un peu de temps au début, mais avec un peu d’expérience et une fois que vous connaîtrez les programmes, cela ira de plus en plus vite.','Georges','2017-11-29 14:25:50','2018-01-18 21:16:08','1516306568_3.jpg'),(28,'La neutralité du Net, c’est quoi ? Est-elle en danger ?','L’agence fédérale américaine des communications devrait renoncer jeudi à une règle qui garantit le traitement égal des flux de données transmis sur les réseaux.\r\n\r\nL’Agence fédérale des communications américaine (FCC) se prononce jeudi sur un projet d’abrogation de la règle assurant la \"neutralité du net\", estimant qu’elle est un frein aux investissements alors que ses détracteurs craignent la création d’un \"internet à deux vitesses\". Mais de quoi s’agit-il exactement ?','L’agence fédérale américaine des communications devrait renoncer jeudi à une règle qui garantit le traitement égal des flux de données transmis sur les réseaux.\r\n\r\nL’Agence fédérale des communications américaine (FCC) se prononce jeudi sur un projet d’abrogation de la règle assurant la \"neutralité du net\", estimant qu’elle est un frein aux investissements alors que ses détracteurs craignent la création d’un \"internet à deux vitesses\". Mais de quoi s’agit-il exactement ?','Romain','2018-01-18 13:43:39','2018-01-18 21:16:20','1516306580_28.jpg'),(30,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque placerat eros urna,','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque placerat eros urna,','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque placerat eros urna,','rewa','2018-01-18 14:21:12','2018-01-24 19:40:21','1516819221_30.jpg');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_token` varchar(255) DEFAULT NULL,
  `register_at` datetime NOT NULL,
  `connection_at` datetime DEFAULT NULL,
  `rank` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (6,'$2y$12$Ht2gllTtaN7Fap9D8Fqj.eXPj/7epnNBfvbTPM.OJ0Y9bZLCYUWgC','romain.romss@gmail.com',NULL,'2018-01-03 16:41:34',NULL,3),(8,'$2y$12$H7d/KjB4sWlsCnrlnVHR2uzHOpVhM50WFbDSP8Af/dVDcoVe3.0VC','test@local.forum',NULL,'2018-01-04 10:04:33',NULL,1),(64,'$2y$12$jnaQIptsPJZFJGkmfemv0u1vAnZGjRD6qQfN703FlPlmoydIQMHNu','ffsf@srewewr.vom',NULL,'2018-01-17 09:37:36',NULL,1),(65,'$2y$12$ZEvzryEmI8amlVtQOdofE.gS9HpxfcIsQjSEHDfYsDqwoVZ7g257K','bla@gmail.com',NULL,'2018-01-17 11:14:32',NULL,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-24 23:07:10
