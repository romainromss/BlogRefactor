--
-- Host: 127.0.0.1    Database: blog
-- ------------------------------------------------------

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
-- Table structure for table "comments"
--

DROP TABLE IF EXISTS comments;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE comments (
  id int(11) NOT NULL AUTO_INCREMENT,
  post_id int(10) DEFAULT NULL,
  author varchar(255) DEFAULT NULL,
  comment text DEFAULT NULL,
  comment_at datetime DEFAULT NULL,
  validated tinyint(3) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "comments"
--


INSERT INTO comments VALUES (1,1,'romain','ddeddededededde','2017-12-18 09:31:06',1),(2,2,'vff','ccc','2017-12-27 20:39:09',1),(3,2,'romain','ertz','2018-01-25 18:02:25',1),(4,1,'Xennef','Pas mal cet article, je connaissais  pas l\'histoire.','2017-12-27 23:22:34',1),(5,4,'Charlie','comprends rien a ce qu\'il y a écrit','2017-12-28 09:10:01',1),(6,4,'test','test2','2017-12-28 14:07:10',0),(7,1,'qwee','ddfdd','2018-01-18 20:14:56',1),(8,1,'eeeee','eerer','2017-12-28 16:43:15',1),(9,1,'test 4 ','rrererer','2017-12-28 18:23:19',0),(10,1,'ffff','fvvv','2018-01-29 13:40:22',1),(11,1,'gino','Lorem ipsum blabla','2018-01-18 20:15:01',1),(15,30,'vvfvf','vfvfvfv','2018-01-22 22:38:46',1),(16,30,'romain','cyc<ycy<c<cyxcxycy<c','2018-01-25 14:24:37',1),(17,30,'gino','dfdfdsdsgbfsgfsvfvcdscs','2018-01-25 13:43:38',1),(18,28,'dddd','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque placerat eros urna,','2018-01-25 13:42:46',1),(19,36,'romain','test','2018-01-29 13:39:49',1),(20,36,'romain','ffffdfdasf','2018-01-29 13:39:40',1),(21,36,'romain','ffffdfdasf','2018-01-29 13:39:37',1),(22,1,'romain','eerrt','2018-01-29 13:40:20',1),(23,40,'romain','vvvfvfvafdvcds','2018-01-29 14:50:41',1),(24,42,'romain','fvvfsvvyvfvydvdsvds','2018-01-30 16:11:39',1);

--
-- Table structure for table "posts"
--

DROP TABLE IF EXISTS posts;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `chapo` longtext DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `creation_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "posts"
--

INSERT INTO posts VALUES (1,'L\'histoire de la Cryptomonnaie','L\'histoire de la cryptomonnaie est en fait assez courte. Oui, nous avons eu des systèmes de monnaie numérique avant que ces cryptomonnaies existaient,mais ils ne sont pas la même chose.\r\n','Les anciennes versions de monnaies numériques étaient strictement centralisée, alors que ces nouvelles formes de crypto-monnaie,\r\ncomme Bitcoin et Ethereum, sont décentralisées dans leur nature.\r\nMaintenant, ce qui est vraiment intéressant dans les cryptomonnaies est qu\'ils ont jamais été destinées à inventer comme ils sont connus aujourd\'hui.\r\nTout cela a commencé avec le Bitcoin tristement célèbre et un homme nommé Satoshi Nakamoto.\r\n\r\nL\'objectif de Nakamoto au commencement était rien de plus que de créer un système informatique de trésorerie pairs à pairs (P2P) .\r\nLes gens avaient longtemps essayé de créer une sorte de système de l\'argent numérique en ligne, mais avaient toujours échoué en raison des problèmes avec la centralisation.\r\nSatoshi Nakamoto savait qu\'une autre tentative de construction d\'un système de trésorerie centralisé en ligne ne ferait qu\'un échec de plus,\r\nil a donc décidé de créer un système de trésorerie numérique qui avait pas d\'autorité centralisée.\r\n\r\nEt ainsi vint la naissance du Bitcoin.\r\nOui, Satoshi Nakamoto a inventé le Bitcoin, la première forme décentralisée de l\'argent numérique qui n\'avait pas d\'administration centrale ou d\'un organisme de contrôle.\r\nBitcoin devait être la propriété de l\'ensemble de la communauté Bitcoin. (source: Prizm, steemit)','Jean','2017-11-29 14:25:27','2018-01-29 14:29:19','1517232559_1.jpg'),(2,'Wifi en avion : le haut débit arrive','De nos jours, on se connecte tous à internet et cette habitude est devenue quasiment indispensable pour bon nombre d’entre nous. S’il est relativement facile de trouver un point d’accès wifi gratuit en ville, c’est une autre histoire dans les transports.\r\n\r\nLa question qu’on peut se poser est la suivante. Y a-t-il du wifi dans l’avion ? La réponse est oui. Ce service n’est pas encore très courant dans le transport aérien, mais ça risque enfin de changer ! Le wifi en avion va se démocratiser.\r\n\r\nIl est déjà possible d’avoir une connexion internet à bord de certains avions. Les compagnies aériennes qui proposent du wifi dans l’avion sont de plus en plus nombreuses, mais malheureusement pour le moment le débit est plutôt faible et le coût du pass ou à l’heure assez élevé.','Wifi gratuit en avion\r\nS’il est souvent payant et même réservé à la première classe, le wifi gratuit en avion existe aussi. Il est possible d’utiliser gratuitement internet chez les compagnies Qantas, SAS, et Turkish Airlines, mais seulement en classe business. Par contre, Norwegian et JetBlue proposent le service à tous les passagers. La mise en place se fait aussi petit à petit sur les vols low cost de Ryanair et Vueling. Comme ça peut changer, le mieux à faire et de vous renseigner auprès de votre compagnie avant votre voyage.\r\n\r\nWifi en avion pour tous en 2017 ?\r\nIl faudra encore attendre un peu pour avoir du haut débit, mais c’est en préparation. L’entreprise Thales va le proposer en Amérique du Nord dès 2017 via son service FlytLIVE qui fonctionnera grâce à deux satellites de SES. Puis, un autre satellite géostationnaire baptisé SES-17 viendra s’ajouter au dispositif pour étendre encore plus la couverture. Normalement, d’ici 2025 les trois quarts des avions seront capables de proposer du haut débit en vol et cela dans le monde entier. Il sera alors possible de regarder des films en streaming, jouer à des jeux en ligne ou faire toute autre activité qui demande une bonne connexion réseau comme si vous étiez chez vous. Le rêve non ? En pouvant avoir accès à vos occupations favorites une chose est certaine, c’est que le voyage passera plus vite et vous trouverez toujours quelque chose à faire pour vous divertir.\r\n\r\nRappel sur la sécurité\r\nIl est toujours bon de rappeler les règles de sécurité lorsqu’on se connecte sur un hotspot public. Cela vaut aussi pour la borne wifi en avion qui ne demande pas d’identification personnelle en général. Même si ici le risque reste limité, car seul un autre passager pourrait essayer de vous voler des informations.\r\nPour éviter cela, vérifier bien que vous vous connectez en HTTPS lorsque vous devez rentrer un mot de passe. C’est généralement le cas sur les sites de boite mail et tous les sites sérieux. Si vous pouvez, évitez de faire des achats en ligne lors de votre vol. Si vous devez quand même utiliser votre carte bleue vérifiez bien que le site est sécurisé et sûr.\r\nUn utilisateur averti en vaut deux !\r\nsource :(blogdegeek)','Albert','2017-11-29 14:25:47','2018-01-29 14:36:58','1517233018_2.jpg'),(3,'Faille Spectre et Meltdown : Intel recommande de ne pas installer ses patchs','Aussi incroyable que cela puisse paraitre, Intel a fait un communiqué hier, pour prévenir les Intégrateurs, fournisseurs de service cloud, fabricants, vendeurs de logiciels et bien entendu les utilisateurs finaux qu’il ne faut pas déployer ou utiliser la mise à jour du firmware pour les processeurs.','En effet, de nombreux utilisateurs se sont plain de redémarrage intempestif suite à l’installation de ce patch.\r\n\r\nSur son blog, Intel explique avoir identifié la « root cause» et ont commencé à déployer le patch mis à jour pour leurs partenaires afin d’effectuer des tests. Si les tests sont concluants, alors cette nouvelle mise à jour sera rendue disponible.\r\n\r\nLinus Torvalds s’en est pris ouvertement à Intel et à ses patchs qu’il qualifie, entre autres de « poubelle ». Ce n’est d’ailleurs pas la première fois que le créateur du noyau Linux s’en prend au fondeur sur sa communication autour des failles Meltdown/Spectre.\r\nVous l’aurez donc compris, pour le moment, évitez de mettre à jour vos firmwares, même si ils ont déjà été poussé par DELL, HP, Lenovo et bien d’autres.\r\n\r\nsource:(tech2tech)','Georges','2017-11-29 14:25:50','2018-01-29 14:45:55','1517233555_3.jpg'),(28,'La neutralité du Net, c’est quoi ? Est-elle en danger ?','L’agence fédérale américaine des communications devrait renoncer jeudi à une règle qui garantit le traitement égal des flux de données transmis sur les réseaux.\r\n\r\nL’Agence fédérale des communications américaine (FCC) se prononce jeudi sur un projet d’abrogation de la règle assurant la \"neutralité du net\", estimant qu’elle est un frein aux investissements alors que ses détracteurs craignent la création d’un \"internet à deux vitesses\". Mais de quoi s’agit-il exactement ?','L’agence fédérale américaine des communications devrait renoncer jeudi à une règle qui garantit le traitement égal des flux de données transmis sur les réseaux.\r\n\r\nL’Agence fédérale des communications américaine (FCC) se prononce jeudi sur un projet d’abrogation de la règle assurant la \"neutralité du net\", estimant qu’elle est un frein aux investissements alors que ses détracteurs craignent la création d’un \"internet à deux vitesses\". Mais de quoi s’agit-il exactement ?','Romain','2018-01-18 13:43:39','2018-01-29 14:39:39','1517233179_28.jpeg');


--
-- Table structure for table "users"
--

DROP TABLE IF EXISTS users;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE users (
  id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  password varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  email_token varchar(255) DEFAULT NULL,
  register_at datetime NOT NULL,
  connection_at datetime DEFAULT NULL,
  rank tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "users"
--

INSERT INTO users VALUES (8,'$2y$12$H7d/KjB4sWlsCnrlnVHR2uzHOpVhM50WFbDSP8Af/dVDcoVe3.0VC','admin.test@blog.com',NULL,'2018-01-04 10:04:33',NULL,2),(66,'$2y$12$5rFnjk3TzdZkiiNPvW/RDuFT8PdsyUUtKhu3..7bzWE0LKb51/.lS','test@blog.com',NULL,'2018-01-28 17:17:00',NULL,1),(71,'$2y$12$255mUws1dmzCIGPat1a2TuxPZqk6KZXSnIWscV2mzZfbqQ58dciB.','admin.local@blog.com',NULL,'2018-02-01 14:57:12',NULL,3);

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-01 15:00:36
