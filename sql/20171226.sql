-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: blog
-- ------------------------------------------------------
-- Server version	5.7.17-log

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `auth_key` varchar(32) NOT NULL COMMENT '自动登录key',
  `password_hash` varchar(255) NOT NULL COMMENT '加密密码',
  `password_reset_token` varchar(255) DEFAULT NULL COMMENT '重置密码token',
  `email_validate_token` varchar(255) DEFAULT NULL COMMENT '邮箱验证token',
  `email` varchar(255) NOT NULL COMMENT '邮箱',
  `role` smallint(6) NOT NULL DEFAULT '10' COMMENT '角色等级',
  `status` smallint(6) NOT NULL DEFAULT '10' COMMENT '状态',
  `avatar` varchar(255) DEFAULT NULL COMMENT '头像',
  `vip_lv` int(11) DEFAULT '0' COMMENT 'vip等级',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=561 DEFAULT CHARSET=utf8 COMMENT='管理员表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (560,'admin','rEmHNlJgq_p6Ft4CTboiMS_kmhhgi7kg','$2y$13$YEPfVu.VSPRx6jPtDTCDBOWf/YRyQtc358JXIO8HXNc3evc/5faWy',NULL,NULL,'1111111111@qq.com',10,10,NULL,0,1512872818,1512872818);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cats`
--

DROP TABLE IF EXISTS `cats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cats` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `cat_name` varchar(255) DEFAULT NULL COMMENT '分类名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='分类表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cats`
--

LOCK TABLES `cats` WRITE;
/*!40000 ALTER TABLE `cats` DISABLE KEYS */;
INSERT INTO `cats` VALUES (1,'分类1'),(2,'分类2');
/*!40000 ALTER TABLE `cats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feeds`
--

DROP TABLE IF EXISTS `feeds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `post_id` int(11) DEFAULT NULL COMMENT '文章id',
  `content` varchar(255) NOT NULL COMMENT '内容',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COMMENT='聊天信息表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feeds`
--

LOCK TABLES `feeds` WRITE;
/*!40000 ALTER TABLE `feeds` DISABLE KEYS */;
INSERT INTO `feeds` VALUES (1,563,15,'厉害厉害',1512872818),(10,560,15,'            hhaha',1514135580),(11,560,15,'            hahha',1514135597),(12,560,15,'            hhhhhhh',1514135649),(13,560,15,'            kkkkk',1514137469),(14,560,17,'            aaaaaaaaaaaa',1514137478),(15,560,17,'            hhhhhhhhhhhhhhhh',1514137495),(16,560,17,'            hanan',1514174098),(17,563,17,'            哈哈哈',1514186346),(18,563,17,'            哈哈哈哈',1514186702),(19,563,17,'            奥',1514187147),(20,563,17,'            呵',1514187505),(21,563,17,'            哈哈',1514188441),(22,563,17,'            和',1514188519),(23,563,17,'          哈哈  ',1514188747),(24,563,17,'     哈哈哈      ',1514189568),(25,563,17,'            换行',1514189582),(26,563,17,'            i',1514189603),(27,563,17,'           哼 ',1514189953),(28,563,17,'哈哈哈\n            ',1514202638),(29,563,17,'哈哈哈\n            ',1514202956),(30,563,17,'哈哈哈\n            ',1514203048),(31,563,17,'哈哈哈\n            ',1514203583),(32,563,17,'哈哈哈\n            ',1514203713),(33,563,17,'哈哈哈\n            ',1514203713),(34,563,17,'\n            天啦',1514203730),(35,563,NULL,'\n           集合',1514205800),(36,563,NULL,'\n            开心',1514205823),(37,563,NULL,'开心\n            ',1514205863),(38,563,NULL,'哼\n            ',1514205869),(39,563,NULL,'哈哈哈\n            ',1514207217),(40,563,NULL,'\n            哈哈',1514207225),(41,563,NULL,'\n            哈哈',1514207286),(42,563,NULL,'\n          u额u恶黑家伙',1514207339),(43,563,NULL,'\n            和呢别的愤怒',1514207374),(44,563,NULL,'哼\n            ',1514207408),(45,563,NULL,'嘿嘿嘿\n            ',1514207487),(46,563,NULL,'\n            hahbahs',1514207572),(47,563,NULL,'\n            qwa',1514207850),(48,563,NULL,'heng\n            ',1514208011),(49,563,NULL,'\nhaha           ',1514208216);
/*!40000 ALTER TABLE `feeds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_extends`
--

DROP TABLE IF EXISTS `post_extends`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_extends` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `post_id` int(11) DEFAULT NULL COMMENT '文章id',
  `browser` int(11) DEFAULT '0' COMMENT '浏览量',
  `collect` int(11) DEFAULT '0' COMMENT '收藏量',
  `praise` int(11) DEFAULT '0' COMMENT '点赞',
  `comment` int(11) DEFAULT '0' COMMENT '评论',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COMMENT='文章扩展表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_extends`
--

LOCK TABLES `post_extends` WRITE;
/*!40000 ALTER TABLE `post_extends` DISABLE KEYS */;
INSERT INTO `post_extends` VALUES (38,9,23,0,0,0),(39,6,8,0,0,0),(40,10,1,0,0,0),(41,11,1,0,0,0),(42,12,7,0,0,0),(43,13,1,0,0,0),(44,14,16,0,0,0),(45,15,25,0,0,0),(46,16,2,0,0,0),(47,17,268,0,0,0),(48,18,31,0,0,0),(49,19,4,0,0,0),(50,20,14,0,0,0),(51,8,1,0,0,0),(52,21,4,0,0,0),(53,22,6,0,0,0);
/*!40000 ALTER TABLE `post_extends` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `summary` varchar(255) DEFAULT NULL COMMENT '摘要',
  `content` text COMMENT '内容',
  `label_img` varchar(255) DEFAULT NULL COMMENT '标签图',
  `cat_id` int(11) DEFAULT NULL COMMENT '分类id',
  `user_id` int(11) DEFAULT NULL COMMENT '用户id',
  `user_name` varchar(255) DEFAULT NULL COMMENT '用户名',
  `is_valid` tinyint(1) DEFAULT '0' COMMENT '是否有效：0-未发布 1-已发布',
  `created_at` int(11) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `idx_cat_valid` (`cat_id`,`is_valid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='文章主表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (6,'测试文章','测试一下文章','<p>测试一下文章</p>','/image/20171223/1514002527931465.jpg',0,563,'lymn',0,1514003020,1514003020),(9,'再次测试标签','哈哈哈哈','<p>哈哈哈哈</p>','/image/20171223/1514023875480320.jpg',1,563,'lymn',1,1514023895,1514023895),(10,'ha\'h\'ha\'ha','哈哈哈哈哈','<p>哈哈哈哈哈<br/></p>','',1,563,'lymn',1,1514105776,1514105776),(11,'hdnf','fnnfbg','<p>fnnfbg<br/></p>','/image/20171224/1514106101878278.png',1,563,'lymn',1,1514106121,1514106121),(12,'hhhhh','gggggggggggggggg','<p>gggggggggggggggg<br/></p>','/image/20171224/1514106347972432.jpg',1,563,'lymn',1,1514106352,1514106352),(13,'测试图片','测试图片1','<p>测试图片1</p>','/image/20171224/1514107675501492.jpg',1,563,'lymn',1,1514107687,1514107687),(15,'test写的','嘿嘿嘿','<p>嘿嘿嘿</p>','/image/20171224/1514124233122253.jpg',1,563,'lymn',1,1514124240,1514220268),(16,'hahahhha','hahhahha','<p>hahhahha</p>','/statics/image/20171225/1514174561726505.png',1,563,'lymn',1,1514174581,1514174581),(17,'kkkkk','kkkkkkkkkk','<p>kkkkkkkkkk</p>','/image/20171225/1514174669585146.jpg',1,563,'lymn',1,1514174677,1514174677),(21,'name写的','我写的哈哈哈name写的哈哈哈','<p>我写的哈哈哈</p><p>name写的哈哈哈</p>','/image/20171226/1514277879639237.jpg',2,564,'name',1,1514277887,1514277899);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `relation_post_tags`
--

DROP TABLE IF EXISTS `relation_post_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `relation_post_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `post_id` int(11) DEFAULT NULL COMMENT '文章ID',
  `tag_id` int(11) DEFAULT NULL COMMENT '标签ID',
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_id` (`post_id`,`tag_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COMMENT='文章和标签关系表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relation_post_tags`
--

LOCK TABLES `relation_post_tags` WRITE;
/*!40000 ALTER TABLE `relation_post_tags` DISABLE KEYS */;
INSERT INTO `relation_post_tags` VALUES (1,8,2),(2,8,3),(3,8,4),(4,9,2),(5,9,5),(6,9,6),(7,10,2),(8,11,7),(9,12,8),(10,13,9),(11,14,9),(17,15,10),(13,16,11),(14,17,11),(16,18,12),(18,19,10),(20,20,10),(22,21,13),(23,22,14);
/*!40000 ALTER TABLE `relation_post_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `tag_name` varchar(255) DEFAULT NULL COMMENT '标签名称',
  `post_num` int(11) DEFAULT '0' COMMENT '关联文章数',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tag_name` (`tag_name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='标签表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (2,'标签1',3),(3,'标签2',1),(4,'标签3',1),(5,'标签4',1),(6,'标签5',1),(7,'fnf',1),(8,'gb',1),(9,'img',2),(10,'test',5),(11,'hah',2),(12,'db',2),(13,'name',2),(14,'name2',1);
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `auth_key` varchar(32) NOT NULL COMMENT '自动登录key',
  `password_hash` varchar(255) NOT NULL COMMENT '加密密码',
  `password_reset_token` varchar(255) DEFAULT NULL COMMENT '重置密码token',
  `email_validate_token` varchar(255) DEFAULT NULL COMMENT '邮箱验证token',
  `email` varchar(255) NOT NULL COMMENT '邮箱',
  `role` smallint(6) NOT NULL DEFAULT '10' COMMENT '角色等级',
  `status` smallint(6) NOT NULL DEFAULT '10' COMMENT '状态',
  `avatar` varchar(255) DEFAULT NULL COMMENT '头像',
  `vip_lv` int(11) DEFAULT '0' COMMENT 'vip等级',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL,
  `sex` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=565 DEFAULT CHARSET=utf8 COMMENT='会员表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (560,'test','rEmHNlJgq_p6Ft4CTboiMS_kmhhgi7kg','$2y$13$YEPfVu.VSPRx6jPtDTCDBOWf/YRyQtc358JXIO8HXNc3evc/5faWy',NULL,NULL,'1111111111@qq.com',10,10,NULL,0,1512872818,1512872818,NULL),(561,'test_01','qiNQQTUFWKY6-9qDi9hJuUReeeyTHqWL','$2y$13$IELoaoRvrTHtMm.qtgpKBOINVOULejXDU2elpXMtXeqBt/qOcOyde',NULL,NULL,'12356@163.com',10,10,NULL,0,1512890153,1512890153,NULL),(562,'test_02','1gqzjDn4j-7B-DCklBe4nDCPS4kV3Qnr','$2y$13$xiFcpWW7hbo/9DJPyRWyM.yKi9AbMCymeCy.69cqVDZibaX8mx/2C',NULL,NULL,'12@163.com',10,10,NULL,0,1512905862,1512905862,NULL),(563,'lymn','5n2Avs4_4CHDFs9-r5F14mB5d1ZgoaQP','$2y$13$h.rDgrwV78NX9JejO3IRTeZtwAy8ur2u3VFGd/j4cYi2Y1u2mkr4S',NULL,NULL,'843214245@qq.com',10,10,NULL,0,1513857918,1514277359,NULL),(564,'1235','P4EMpqfCcWlrp7JvKGaKH90EMVmQreZz','$2y$13$QTe9.DxyJ8sOoObC4jIRtez0WiYI1GCJYqALrSb6lyLuC08ptwoye',NULL,NULL,'54356@qq.com',10,10,NULL,0,1514277864,1514278801,0);
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

-- Dump completed on 2017-12-26 17:57:56
