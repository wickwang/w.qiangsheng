-- MySQL dump 10.13  Distrib 5.5.13, for Win32 (x86)
--
-- Host: localhost    Database: magicfirm
-- ------------------------------------------------------
-- Server version	5.5.13-log

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
-- Table structure for table `admin_category`
--

DROP TABLE IF EXISTS `admin_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_category`
--

LOCK TABLES `admin_category` WRITE;
/*!40000 ALTER TABLE `admin_category` DISABLE KEYS */;
INSERT INTO `admin_category` VALUES (1,'全局图文管理'),(2,'系统设置');
/*!40000 ALTER TABLE `admin_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_item`
--

DROP TABLE IF EXISTS `admin_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_category_id` int(11) DEFAULT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `url` varchar(1000) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `module` varchar(500) DEFAULT NULL,
  `is_enabled` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `admin_category_id` (`admin_category_id`),
  CONSTRAINT `admin_item_fk` FOREIGN KEY (`admin_category_id`) REFERENCES `admin_category` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_item`
--

LOCK TABLES `admin_item` WRITE;
/*!40000 ALTER TABLE `admin_item` DISABLE KEYS */;
INSERT INTO `admin_item` VALUES (1,1,' 图片广告位管理','/admin.php/image_box',NULL,'image_box',1),(2,1,' 静态文本框管理','/admin.php/text_box',NULL,'text_box',1),(3,1,'幻灯片关联','/admin.php/slideshow_item',NULL,'slideshow_item',1),(4,2,'系统设置','/admin.php/setting_general',NULL,'setting_general',1);
/*!40000 ALTER TABLE `admin_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_user`
--

DROP TABLE IF EXISTS `admin_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_user`
--

LOCK TABLES `admin_user` WRITE;
/*!40000 ALTER TABLE `admin_user` DISABLE KEYS */;
INSERT INTO `admin_user` VALUES (1,'admin','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8',NULL);
/*!40000 ALTER TABLE `admin_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `box_type`
--

DROP TABLE IF EXISTS `box_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `box_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `box_type`
--

LOCK TABLES `box_type` WRITE;
/*!40000 ALTER TABLE `box_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `box_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalogue`
--

DROP TABLE IF EXISTS `catalogue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalogue` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(4) DEFAULT NULL COMMENT '1 frontend message, 2 backend admin',
  `name` varchar(100) NOT NULL DEFAULT '',
  `description` varchar(255) DEFAULT NULL,
  `source_lang` varchar(100) NOT NULL DEFAULT '',
  `target_lang` varchar(100) NOT NULL DEFAULT '',
  `date_created` int(11) NOT NULL DEFAULT '0',
  `date_modified` int(11) NOT NULL DEFAULT '0',
  `author` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogue`
--

LOCK TABLES `catalogue` WRITE;
/*!40000 ALTER TABLE `catalogue` DISABLE KEYS */;
INSERT INTO `catalogue` VALUES (1,1,'messages.en','English - 前台','zh-cn','en',0,0,''),(2,NULL,'messages','简体中文 - 前台','zh-cn','zh-cn',0,0,''),(3,1,'messages.zh-cn','简体中文 - 前台','en','zh-cn',0,0,''),(5,2,'sf_admin.zh-cn','简体中文 - 后台','en','zh-cn',0,0,''),(6,2,'sf_admin.en','English - 后台','zh-cn','en',0,0,''),(7,NULL,'sf_admin','简体中文 - 后台','zh-cn','zh-cn',0,0,'');
/*!40000 ALTER TABLE `catalogue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config`
--

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` VALUES (1,'db_version','0'),(2,'release_db_version',NULL);
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image_box`
--

DROP TABLE IF EXISTS `image_box`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image_box` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `box_type_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `image_src` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `box_type_id` (`box_type_id`),
  CONSTRAINT `image_box_fk1` FOREIGN KEY (`box_type_id`) REFERENCES `box_type` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image_box`
--

LOCK TABLES `image_box` WRITE;
/*!40000 ALTER TABLE `image_box` DISABLE KEYS */;
/*!40000 ALTER TABLE `image_box` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_event_id` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `log_event_id` (`log_event_id`),
  CONSTRAINT `log_fk1` FOREIGN KEY (`log_event_id`) REFERENCES `log_event` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_event`
--

DROP TABLE IF EXISTS `log_event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) DEFAULT NULL COMMENT 'general log, security log, etc...',
  `source1` varchar(500) DEFAULT NULL,
  `source2` varchar(500) DEFAULT NULL,
  `action` varchar(500) DEFAULT NULL COMMENT 'update,delete,etc...',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_event`
--

LOCK TABLES `log_event` WRITE;
/*!40000 ALTER TABLE `log_event` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mail_message`
--

DROP TABLE IF EXISTS `mail_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mail_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` longblob NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mail_message`
--

LOCK TABLES `mail_message` WRITE;
/*!40000 ALTER TABLE `mail_message` DISABLE KEYS */;
/*!40000 ALTER TABLE `mail_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting_general`
--

DROP TABLE IF EXISTS `setting_general`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setting_general` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `system_email_smtp_host` varchar(255) DEFAULT NULL,
  `system_email_smtp_port` int(11) DEFAULT NULL,
  `system_email_smtp_use_ssl` tinyint(4) DEFAULT NULL,
  `system_email_smtp_username` varchar(255) DEFAULT NULL,
  `system_email_smtp_password` varchar(255) DEFAULT NULL,
  `system_email_from_accout` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting_general`
--

LOCK TABLES `setting_general` WRITE;
/*!40000 ALTER TABLE `setting_general` DISABLE KEYS */;
INSERT INTO `setting_general` VALUES (1,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `setting_general` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slideshow`
--

DROP TABLE IF EXISTS `slideshow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slideshow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `image_width` int(11) DEFAULT NULL,
  `image_height` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slideshow`
--

LOCK TABLES `slideshow` WRITE;
/*!40000 ALTER TABLE `slideshow` DISABLE KEYS */;
INSERT INTO `slideshow` VALUES (1,'首页幻灯片',710,380);
/*!40000 ALTER TABLE `slideshow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slideshow_item`
--

DROP TABLE IF EXISTS `slideshow_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slideshow_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slideshow_id` int(11) DEFAULT NULL,
  `title` varchar(20) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `image_token` varchar(255) DEFAULT NULL,
  `description` text,
  `position` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `slideshow_id` (`slideshow_id`),
  CONSTRAINT `slideshow_item_fk` FOREIGN KEY (`slideshow_id`) REFERENCES `slideshow` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slideshow_item`
--

LOCK TABLES `slideshow_item` WRITE;
/*!40000 ALTER TABLE `slideshow_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `slideshow_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `text_box`
--

DROP TABLE IF EXISTS `text_box`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `text_box` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `box_type_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` text,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `text_box_type_id` (`box_type_id`),
  CONSTRAINT `text_box_fk` FOREIGN KEY (`box_type_id`) REFERENCES `box_type` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `text_box`
--

LOCK TABLES `text_box` WRITE;
/*!40000 ALTER TABLE `text_box` DISABLE KEYS */;
/*!40000 ALTER TABLE `text_box` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trans_unit`
--

DROP TABLE IF EXISTS `trans_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trans_unit` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL DEFAULT '1',
  `id` varchar(255) NOT NULL DEFAULT '',
  `source` text NOT NULL,
  `target` text NOT NULL,
  `comments` text,
  `date_added` int(11) NOT NULL DEFAULT '0',
  `date_modified` int(11) NOT NULL DEFAULT '0',
  `author` varchar(255) DEFAULT '',
  `translated` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`msg_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trans_unit`
--

LOCK TABLES `trans_unit` WRITE;
/*!40000 ALTER TABLE `trans_unit` DISABLE KEYS */;
INSERT INTO `trans_unit` VALUES (3,5,'3','Edit','编辑','',0,0,'',1),(4,5,'','Delete','删除','',0,0,'',1),(5,5,'','New','新建','',0,0,'',1),(7,5,'','Save','保存','',0,0,'',1),(8,5,'','Reset','重置','',0,0,'',1),(9,5,'','Filter','过滤','',0,0,'',1),(10,5,'','Actions','操作','',0,0,'',1),(11,5,'','Save and add','保存并继续添加','',0,0,'',1),(12,5,'','Choose an action','选择一个操作','',0,0,'',1),(13,5,'','go','确定','',0,0,'',1),(15,5,'','result','结果','',0,0,'',1),(16,5,'','No result','没有结果','',0,0,'',1),(17,5,'','page','页数','',0,0,'',1),(20,5,'','Title','标题','',0,0,'',1),(21,5,'','Body','内容','',0,0,'',1),(56,5,'','The item was created successfully.','内容创建成功。','',0,0,'',1),(57,5,'','The item was updated successfully.','内容已更新。','',0,0,'',1),(58,5,'','The item was deleted successfully.','内容已删除。','',0,0,'',1),(59,5,'','The item was created successfully. You can add another one below.','内容已创建，将继续创建新内容。','',0,0,'',1),(60,5,'','The item was updated successfully. You can add another one below.','内容已更新，将继续创建新内容。','',0,0,'',1),(61,5,'','You must at least select one item.','至少要选择一项。','',0,0,'',1),(62,5,'','You must select an action to execute on the selected items.','请选取一个针对该条目的操作。','',0,0,'',1),(63,5,'','A problem occurs when deleting the selected items as some items do not exist anymore.','不能删除不存在的条目。','',0,0,'',1),(64,5,'','The selected items have been deleted successfully.','选定的条目已删除。','',0,0,'',1),(65,5,'','A problem occurs when deleting the selected items.','在删除过程中发生错误。','',0,0,'',1),(66,5,'','(page %%page%%/%%nb_pages%%)','(页码 %%page%%/%%nb_pages%%)','',0,0,'',1),(67,5,'','[0] no result|[1] 1 result|(1,+Inf] %1% results','[0] 没有结果|[1] 1 个结果|(1,+Inf] %1% 个结果','',0,0,'',1),(68,5,'','File is too large','文件太大','',0,0,'',1),(69,5,'','Server error. Upload directory isn\'t writable.','服务器错误，上传目录不可写。','',0,0,'',1),(70,5,'','No files were uploaded.','没有文件被上传。','',0,0,'',1),(71,5,'','File is empty','文件是空的。','',0,0,'',1),(72,5,'','Disallowed file type.','无效的文件类型。','',0,0,'',1),(73,5,'','Could not save uploaded file.The upload was cancelled, or server error encountered','不能保存上传的文件。上传被取消,或服务器遇到错误','',0,0,'',1),(74,5,'','remove the current file','移除当前文件','',0,0,'',1),(75,5,'','Position was update successfully.','位置更新成功。','',0,0,'',1),(77,5,'','Back to list','返回列表','',0,0,'',1);
/*!40000 ALTER TABLE `trans_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-02-15 17:06:41
