CREATE DATABASE  IF NOT EXISTS `weixin` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `weixin`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 120.55.89.231    Database: weixin
-- ------------------------------------------------------
-- Server version	5.5.24-log

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
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classId` char(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `answerName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `classId` (`classId`),
  CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`classId`) REFERENCES `answerclass` (`classId`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer`
--

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` VALUES (11,'003','哪些行业会比较多的使用耐高温手套，行业之间有差别么？'),(32,'002','春季沙尘暴来时如何防护？'),(33,'002','防尘毒半面罩全面罩的使用误区有哪些？'),(34,'002','经常有人会提起1号虑盒或者5号虑盒这类，请问这个编号和我们的ABEK编号是怎么转换的'),(35,'002','为什么粮油仓储行业不合适使用自吸式防毒面具呢？'),(36,'002','雾霾天室内究竟需不需要戴口罩？'),(37,'002','油漆作业有哪些对人体的危害有毒物？'),(38,'002','中国国家定制的新雾霾防护口罩标准与我们工业口罩的标准有差别么？'),(39,'002','半面罩全面罩的滤毒盒罐主要填充物是什么？防毒原理是什么？'),(40,'002','代尔塔空气呼吸器的主要特点是什么？'),(41,'002','防护口罩有什么使用限制？具体多长时间更换一个？'),(42,'002','关于呼吸防护中很多专业术语，比如IDLH、STEL之类的可以详细解释一下吗？'),(43,'002','空气呼吸器常见故障原因及排除方法.'),(44,'002','口罩佩戴时间短可以直接用清水洗吗？'),(45,'002','滤罐防护气体所对应的专业释义是什么？'),(46,'002','有没有关于代尔塔口罩行业应用的推荐？'),(47,'002','电焊工行业护目镜正如何确选择和使用？'),(48,'002','特殊光辐射防护的护目镜不同涂层的区别是什么？'),(49,'002','耳塞佩戴不贴合是什么原因呢？'),(50,'002','听力防护产品中，SNR合NNR到底有什么区别？'),(51,'002','安全帽的主要分类？'),(52,'002','安全帽是如何运作来防止我们的头部受伤的？'),(53,'002','安全帽使用时有哪些误区会导致不安全因素？'),(54,'003','关于带电作业用绝缘手套于橡胶高低压绝缘手套有什么主要不同？'),(56,'003','手套中那些织物纤维都是英文，能说说都是什么意思么？'),(57,'003','如何有效防止手套外表面褪色？'),(58,'004','安全鞋鞋带为什么都是圆鞋带的？圆形鞋带太容易散开了。'),(59,'004','一款安全鞋价格为什么差这么多，山寨厂如何过的检测？'),(60,'004','怎么样才算一款真正的欧标鞋？'),(61,'004','安全鞋CE认证基本检测有哪些？'),(62,'004','安全鞋防刺穿是如何检测的？能防护钉子么？'),(63,'004','关于防静电安全鞋需要具备一定的绝缘性能是什么意思呢？'),(64,'004','普通安全鞋加了保暖措施能否在-40℃低温环境下使用？'),(65,'005','法兰绒和珊瑚绒两种面料的差别是什么'),(66,'005','什么是冬装保暖材料，目前有哪些保暖材料？'),(67,'005','什么是冬装涂层，不同的涂层制作一样么？'),(68,'005','防寒服的洗涤和保养技巧'),(69,'005','新雪丽保温材料有多温暖？说到保暖时什么是克罗值(Clo)，热重效率和热厚效率等？'),(70,'006','关于荧光服的等级，到底是说明了什么？'),(71,'006','体检在做放射性检查时，要穿防护服吗？'),(72,'006','我国的防化服标准是那些？与欧洲或者其他国家区别大么？'),(73,'006','有关气密防化服，镀铝隔热服使用期限，检验标准，检验方法等国标是否有明确的规定？具体国标有哪些标准？'),(74,'006','衣服中那些织物纤维都是英文，能说说都是什么意思么？'),(75,'007','高空作业安全绳如何使用？安全绳采用的结构有哪些？'),(76,'007','高空作业时一般需要匹配相对应的检查表，这个表一般是什么内容？'),(77,'007','生命线属于哪类锚固装置？'),(78,'007','速差器的一些标示说明？'),(79,'007','安全绳、安全钩怎样检查及报废？LA认证'),(80,'007','防坠落部件中金属件如何维护保养？'),(81,'007','防坠制动器工作原理是什么？主要使用注意事项？使用前需要检查吗？'),(82,'007','高处作业坠落的原因有哪些？'),(83,'007','高空作业防坠产品的欧洲标准有哪些？'),(84,'007','高空作业坠落的形式有哪些？是什么原因？应该用怎样的预防控制对策？'),(85,'008','钢铁工业作业中职业危害有哪些？怎么防护？'),(86,'008','关于废止LA的具体说明在哪儿找？后续应该怎么办呢？'),(87,'008','关于制药行业会有哪些主要的职业危害？'),(88,'008','接触石棉工作的危害和安全防护措施'),(89,'008','矿山有哪些安全标志？'),(90,'008','如何解读作业场所化学品安全标签？'),(91,'008','什么叫职业暴露？主要有哪些风险？'),(92,'008','医用X射线该如何防护？'),(93,'008','在一些标书中经常看见CCC、CQC、TUV、CSA认证，这些各是什么意思？'),(94,'008','检测报告封面上经常会出现一些缩写，分别代表什么含义？'),(95,'008','目前国内易发的职业病有哪些？怎么防护？'),(96,'008','全套个人防护装备在穿戴时是否有相应的次序？'),(97,'008','涉及危险化学品的混合物，安全许可证该如何办？'),(98,'003','2016新版EN388新标准有什么变化？有什么更优势的地方？'),(99,'004','DELTASPORT中宣传的PLYON中底是什么材质？有什么优点？'),(100,'002','防电弧和防静电有什么区别，电弧的威力大么？'),(101,'002','氩弧焊和电焊有什么不同？怎么选择防护的护目镜？'),(102,'002','佩戴防噪音耳塞时耳胀耳痒是什么原因？'),(103,'005','我看了最新的冬装里面有CORDURA这个面料，是什么产品'),(104,'005','代尔塔羽绒服里面怎么不是鹅绒的？'),(105,'007','水平生命线和速差器是否有质量保证？质保年检服务收费吗？如何编制年检计划？'),(106,'007','高处坠落具有什么特点？'),(107,'007','安全带有哪些分类，分别的是如何分类的，分别有什么特点？安全带D形环在CE的哪个条款中有什么力学的要求'),(108,'007','轨道生命线如何应对弯道和拱形的弯曲结构'),(109,'007','Vertic钢缆生命线系统可以应对哪些屋面系统？如何做到防渗漏的？'),(110,'007','对于拱形结构，使用Delta Vertic轨道生命线系统，如何有效在两个拱坡上实现有效防坠制动？'),(111,'007','什么是集体坠落防护？都有哪些产品？'),(112,'007','轨道系统使用一段时间是否要考虑磨损更换轨道？'),(113,'008','Delta-Vertic 有哪些成功案例？');
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `answerclass`
--

DROP TABLE IF EXISTS `answerclass`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answerclass` (
  `classId` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `className` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`classId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answerclass`
--

LOCK TABLES `answerclass` WRITE;
/*!40000 ALTER TABLE `answerclass` DISABLE KEYS */;
INSERT INTO `answerclass` VALUES ('002','头面听防护'),('003','手套'),('004','安全鞋'),('005','冬装'),('006','工装'),('007','防坠落'),('008','其它');
/*!40000 ALTER TABLE `answerclass` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `complain`
--

DROP TABLE IF EXISTS `complain`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `complain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buyWay` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `platform` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seller` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clientName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantify` int(11) NOT NULL,
  `batchNumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usedTimes` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `complain` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `files` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `writeTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `complain`
--

LOCK TABLES `complain` WRITE;
/*!40000 ALTER TABLE `complain` DISABLE KEYS */;
INSERT INTO `complain` VALUES (42,'网上','1052661752','1052661752','1052661752','1052661752','10526617521','1052661752@qq.com','1052661752',10,'1052661752',10,'1052661752','1052661752','42_0.jpg','2017-08-04 09:53:10'),(43,'线下','','红瑞风','A','abc','121347697989','1@qq.com','301102',1,'17/',60,'工地','开胶','43_0.jpg','2017-09-14 13:55:44'),(44,'线下','','代尔塔','代尔塔','12345678912','12345678912','sales@deltaplus.con.cn','WPOKER2 S3',1,'1',1,'工厂','产品说明书低级错误，错别字。图片右下角三包卡内容里，第一点“是具体穿着情况，包修。”此处“是”应该是“视”。','44_0.JPG','2017-12-22 00:03:28'),(45,'网上','淘宝','代尔塔旗舰店','飞龙机电','陈中升','15162771162','457159164@qq.com','WVEGAS WINTER S3',2,'GB 21148-2007',10,'我是一名车工，生产工程机械，车间常温','脱胶','45_0.jpeg,45_1.jpeg,45_2.png','2018-01-17 12:22:08'),(46,'线下','','上海子英劳动保护用品有限公司','秉浦机电贸易有限公司','何健刚','13002131778','2645403573@qq.com','301301',1,'17/168/CH021',0,'基建','40码鞋盒，43码鞋子','46_0.jpg','2018-03-02 16:15:01');
/*!40000 ALTER TABLE `complain` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guard`
--

DROP TABLE IF EXISTS `guard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guard` (
  `code` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `guardCategory` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guard`
--

LOCK TABLES `guard` WRITE;
/*!40000 ALTER TABLE `guard` DISABLE KEYS */;
INSERT INTO `guard` VALUES ('B01','工作帽','防头部脏污、擦伤、长发被绞碾'),('B02','安全帽','防御物体对头部造成冲击、剌穿、挤压等伤害'),('B03','防寒帽','防御头部或面部冻伤'),('B04','防冲击安全头盔','防止头部遭受猛烈撞击，供高速车辆驾驶者佩戴'),('B05','防尘口罩（防颗粒物呼吸器）','用于空气中含氧19.5%以上的粉尘作业环境，防止吸入一般性粉尘，防御颗粒物(如毒烟、毒雾)等危害呼吸系统或眼面部'),('B06','防毒面具','使佩戴者呼吸器官与周围大气隔离，由肺部控制或借助机械力通过导气管引入清洁空气供人体呼吸'),('B07','空气呼吸器','防止吸入对人体有害的毒气、烟雾、悬浮于空气中的有害污染物或在缺氧环境中使用'),('B08','自救器','体积小、携带轻便，供矿工个人短时间内使用。当煤矿井下发生事故时，矿工佩戴它可以通过充满有害气体的井巷，迅速离开灾区'),('B09','防水护目镜','在水中使用，防御水对眼部的伤害'),('B10','防冲击护目镜','防御铁屑、灰砂、碎石等物体飞溅对眼部产生的伤害'),('B11','防微波护目镜','屏蔽或衰减微波辐射，防御对眼部的微波伤害'),('B12','防放射性护目镜','防御X、Y射线、电子流等电离辐射物质对眼部的伤害'),('B13','防强光、紫外线、红外线护目镜或面罩','防止可见光、红外线、紫外线中的一种或几种对眼面的伤害'),('B14','防激光护目镜','以反射、吸收、光化等作用衰减或消除激光对人眼的危害'),('B15','焊接面罩','防御有害弧光、熔融金属飞溅或粉尘等有害因素对眼睛、面部（含颈部）的伤害'),('B16','防腐蚀液护目镜','防御酸、碱等有腐蚀性化学液体飞溅对人眼产生的伤害'),('B17','太阳镜','阻挡强烈的日光及紫外线，防止刺眼光线及眩目光线，提高视觉清晰度'),('B18','耳塞','防护暴露在强噪声环境中工作人员的听力受到损伤'),('B19','耳罩','适用于暴露在强噪声环境中的工作人员，保护听觉、避免噪声过度刺激，不适宜戴耳塞时使用'),('B20','防寒手套','防止手部冻伤'),('B21','防化学品手套','具有防毒性能，防御有毒物质伤害手部'),('B22','防微生物手套','防御微生物伤害手部'),('B23','防静电手套','防止静电积聚引起的伤害'),('B24','焊接手套','防御焊接作业的火花、熔融金属、高温金属、髙温辐射对手部的伤害'),('B25','防放射性手套','具有防放射性能，防御手部免受放射性伤害'),('B26','耐酸碱手套','用于接触酸(碱）时戴用，也适用于农、林、牧、渔各行业一般操作时戴用'),('B27','耐油手套','保护手部皮肤避免受油脂类物质的剌激'),('B28','防昆虫手套','防止手部遭受昆虫叮咬'),('B29','防振手套','具有衰减振动性能，保护手部免受振动伤害'),('B30','防机械伤害手套','保护手部免受磨损、切割、刺穿等机械伤害'),('B31','绝缘手套','使作业人员的手部与带电物体绝缘，免受电流伤害'),('B32','防水胶靴','防水、防滑和耐磨，适合工矿企业职工穿用的胶靴'),('B33','防寒鞋','鞋体结构与材料都具有防寒保暖作用，防止脚部冻伤'),('B34','隔热阻燃鞋','防御高温、熔融金属火花和明火等伤害'),('B35','防静电鞋','鞋底采用静电材料，能及时消除人体静电积累'),('B36','防化学品鞋（靴）','在有酸、碱及相关化学品作业中穿用，用各种材料或者复合型材料做成，保护脚或腿防止化学飞溅所带来的伤害'),('B37','耐油鞋','防止油污污染，适合脚部接触油类的作业人员'),('B38','防振鞋','衰减振动，防御振动伤害'),('B39','防砸鞋(靴）','保护足趾免受冲击或挤压伤害'),('B40','防滑鞋','防止滑倒，用于登高或在油渍、钢板、冰上等湿滑地面上行走'),('B41','防刺穿鞋','矿上、消防、工厂、建筑、林业等部门使用的防足底剌伤'),('B42','绝缘鞋','在电气设备上工作时作为辅助安全用具，防触电伤害'),('B43','耐酸碱鞋','用于涉及酸、碱的作业，防止酸、碱对足部造成伤害'),('B44','矿工靴','保护矿工在井下免受足部伤害'),('B45','焊接防护鞋','防御焊接作业的火花、熔融金属、高温金属、髙温辐射对足部的伤害'),('B46','一般防护服','以织物为面料，采用缝制工艺制作的，起一般性防护作用'),('B47','防尘服','透气（湿）性织物或材料制成的防止一般性粉尘对皮肤的伤害，能防止静电积聚'),('B48','防水服','以防水橡胶涂覆织物为面料防御水透过和漏入'),('B49','水上作业服','防止落水沉溺、便于救助'),('B50','潜水服','用于潜水作业'),('B51','防寒服','具有保暖性能，用于冬季室外作业职工或常年低温环境作业职工的防寒'),('B52','化学品防护服','防止危险化学品的飞溅和与人体接触对人体造成的危害'),('B53','阻燃防护服','用于作业人员从事有明火、散发火花、在熔融金属附近操作有辐射热和对流热的场合和在有易燃物质并有着火危险的场所穿用，在接触火焰及炽热物体后，一定时间内能阻止本身被点燃、有焰燃烧和阴燃'),('B54','防静电服','能及时消除本身静电积聚危害，用于可能引发电击、火灾及爆炸危险场所穿用'),('B55','焊接防护服','用于焊接作业，防止作业人员遭受熔融金属飞溅及其热伤害'),('B56','白帆布类隔热服','防止一般性热辐射伤害'),('B57','镀反射膜类隔热服','防止高热物质接触或强烈热辐射伤害'),('B58','热防护服','防御高温、高热、高湿度'),('B59','防放射性服','具有防放射性性能'),('B60','防酸(碱）服','用于从事酸（碱）作业人员穿用，具有防酸（碱）性能'),('B61','防油服','防御油污污染'),('B62','救生衣（圈）','防止落水沉溺，便于救助'),('B63','带电作业屏蔽服','在10KV～500KV电器设备上进行带电作业时，防护人体免受高压电场及电磁波的影响'),('B64','绝缘服','可防7000V以下高电压，用于带电作业时的身体防护'),('B65','防电弧服','碰到电弧爆炸或火焰的状况下，服装面料纤维会膨胀变厚，关闭布面的空隙，将人体与热隔绝并增加能源防护屏障，以致将伤害程度减至最低'),('B66','棉布工作服','有烧伤危险时穿用，防止烧伤伤害'),('B67','安全带','用于高处作业、攀登及悬吊作业，保护对象为体重及负重之和最大100kg的使用者。可减小从高处坠落时产生的冲击力、防止坠落者与地面或其他障碍物碰撞、有效控制整个坠落距离'),('B68','安全网','用来防止人、物坠落，或用来避免、减轻坠落物及物击伤害'),('B69','劳动护肤剂','涂抹在皮肤上，能阻隔有害因素'),('B70','普通防护装备','普通防护服、普通工作帽、普通工作鞋、劳动防护手套、雨衣、普通胶靴'),('B71','其他零星防护用品如披肩帽、鞋罩、围裙、套袖等','防尘、阻燃、防酸、防碱等'),('B72','多功能防护装备','同时具有多种防护功能的防护用品');
/*!40000 ALTER TABLE `guard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guard_product`
--

DROP TABLE IF EXISTS `guard_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guard_product` (
  `code_guard` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `product` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  KEY `code_guard` (`code_guard`),
  CONSTRAINT `guard_product_ibfk_1` FOREIGN KEY (`code_guard`) REFERENCES `guard` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guard_product`
--

LOCK TABLES `guard_product` WRITE;
/*!40000 ALTER TABLE `guard_product` DISABLE KEYS */;
INSERT INTO `guard_product` VALUES ('B02','DIAMOND V'),('B03','WINTER CAP'),('B04','GRANITE WIND'),('B06','M6300'),('B06','M9300 STRAP'),('B06','M6000 ABEK1'),('B07','VESCBA01'),('B10','KUNLUN'),('B15','LIPARI2 T5'),('B15','BARRIER'),('B17','KILAUEA MIRROR'),('B19','MAGNY COURS'),('B20','VV750'),('B21','VE510'),('B22','VE330BJ'),('B23','VE790'),('B24','CA515R'),('B26','PVCC400'),('B27','VE802'),('B29','VV904'),('B30','VV910'),('B32','AMAZONE S5'),('B34','FUSION S3 HRO HI'),('B36','AUSTIN'),('B45','FUSION S3 HRO HI'),('B46','MCVES'),('B46','MCPAN'),('B46','MCSAL'),('B46','M5COM'),('B46','M5GIL'),('B47','DT115'),('B48','EN850'),('B49','COMBI71'),('B51','NORDLAND'),('B51','LADUT'),('B52','DT300'),('B52','CO600'),('B53','MAIVE'),('B55','TONC3'),('B61','CO600'),('B67','ENKIT02'),('B67','HA641'),('B01','COLTAN 3/5/7'),('B01','COLTAN 3/5/7'),('B01','COLTAN 3/5/7'),('B02','ZIRCON1'),('B05','M1300VSC M1300VC'),('B05','M1200VSC M1200VC'),('B05','M1195B M1195BW'),('B06','M9000ABEK2 M9000ABEK2P3R'),('B10','EGONLM EGONYELLOW EGONCLEAR'),('B13','FUJI2GRADIENT FUJI2CLEAR'),('B13','EGONLM EGONYELLOW EGONCLEAR'),('B13','SALINA SMOKE'),('B16','GALERAS'),('B18','CONIC200 CONIC500'),('B28','VENICUT50'),('B31','GLE0 GLE1 GLE2 GLE3'),('B33','GARGAS2S1P GARGASWINTER'),('B35','MAUBEC3 SBEA'),('B36','LANTANAS1P HROHI KORANDAS3 HROHI'),('B37','KAMOGAS1HROHI NAVARAS1PHROHI'),('B38','OHIO2 S3 HRO'),('B39','MIAMIS1 MIAMIS1P'),('B39','GOUL2S1P MALIAS1 MALIA6KV'),('B40','D-SPIRTMESHS1P D-SPIRTSUEDES1P'),('B40','D-SPIRTMESHS1P D-SPIRTSUEDES1P'),('B41','GARGAS2S1P GARGASWINTER'),('B42','GOUL2S1P MALIAS1 MALIA6KV'),('B43','LANTANAS1P HROHI KORANDAS3 HROHI'),('B44','ONTARIOS1P LOFOTENS1P'),('B53','19N级隔热服'),('B54','CHEMISE FR'),('B57','19A级加强版隔热服'),('B58','19A级加强版隔热服'),('B60','COMBI80 COMBI081'),('B60','ALAIN ALEX'),('B66','AS100CEN');
/*!40000 ALTER TABLE `guard_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guard_standard`
--

DROP TABLE IF EXISTS `guard_standard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guard_standard` (
  `code_guard` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `standard` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `flag` char(1) COLLATE utf8_unicode_ci NOT NULL,
  KEY `code_guard` (`code_guard`),
  CONSTRAINT `guard_standard_ibfk_1` FOREIGN KEY (`code_guard`) REFERENCES `guard` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guard_standard`
--

LOCK TABLES `guard_standard` WRITE;
/*!40000 ALTER TABLE `guard_standard` DISABLE KEYS */;
INSERT INTO `guard_standard` VALUES ('B01','EN 812-2012 Industrial bump caps','E'),('B02','GB 2811-2007《安全帽》','G'),('B02','GB 2812-2006《安全帽测试方法》','G'),('B02','EN 397-2012 Industrial safety helmets','E'),('B02','EN 50365-2002 Electrically insulating helmets for use on low voltage','E'),('B03','GB 2811-2007《安全帽》','G'),('B03','EN 397-2012 Industrial safety helmets','E'),('B04','GB 811-1998 《摩托车乘员头盔》','G'),('B04','GB 24429-2009《运动头盔 自行车、滑板、轮滑运动头盔的安全要求和试验方法》','G'),('B04','EN 13087.5-2012 Protective helmets-Test methods-Part5 Retention system strength','E'),('B04','BS EN 443-2008 fireproof helmet, flame retardant helmet, fireman safety helmet','E'),('B05','GB 2626-2006《自吸过滤式防颗粒物呼吸器》 ','G'),('B05','GBT 18664-2002《呼吸防护用品的选择、使用与维护》','G'),('B05','BS EN 149-2001 Filtering half masks to protect against particules','E'),('B06','EN 136-1998 Full Face Mask','E'),('B06','EN 14387-2004 A1-2008 Respiratory protective devices Gas-filter and combined filtres','E'),('B06','EN 140-1998 Respiratory protective devices - Half masks and quarter masks','E'),('B06','GB 2890-2009《过滤式防毒面具通用技术条件》 ','G'),('B06','GBT 2891-1995《过滤式防毒面具 面罩能试验方法》 ','G'),('B06','GBT 2892-1995《过滤式防毒面具 滤毒罐能试验方法》 ','G'),('B07','GBT 16556-2007《自给开路式压缩空气呼吸器》','G'),('B07','GB 6220-2009《呼吸防护 长管呼吸器》 ','G'),('B07','BS EN 137-2006 Respiratory protective devices Self-containedopen-circuit compressed air breathing apparatus fullface mask','E'),('B07','EN 136-1998 Full Face Mask','E'),('B08','GB 8159-2011《矿用一氧化碳过滤式自救器》','G'),('B08','GB 24502-2009《煤矿用化学氧自救器》','G'),('B09','GB 14866-2006《个人用眼护具通用技术要求》','G'),('B09','BS EN 166-2002 Personal eye-protection - Specifications','E'),('B10','GB 14866-2006《个人用眼护具通用技术要求》','G'),('B10','BS EN 166-2002 Personal eye-protection - Specifications','E'),('B11','GB 14866-2006《个人用眼护具通用技术要求》','G'),('B11','BS EN 166-2002 Personal eye-protection - Specifications','E'),('B12','GB 14866-2006《个人用眼护具通用技术要求》','G'),('B12','BS EN 166-2002 Personal eye-protection - Specifications','E'),('B13','GB 14866-2006《个人用眼护具通用技术要求》','G'),('B13','BS EN 171-2002 Personal eye-protection — Infrared filters — Transmittance requirements and recommended use','E'),('B13','BS EN 170-2002 Personal eye protection UV filter','E'),('B14','GB 14866-2006《个人用眼护具通用技术要求》','G'),('B14','BS EN 166-2002 Personal eye-protection - Specifications','E'),('B15','GBT 3609.1-2008《职业眼面部防护 焊接防护 第1部分：焊接防护具》','G'),('B15','GBT 3609.2-2009《职业眼面部防护 焊接防护 第2部分：自动变光焊接滤光镜》','G'),('B15','EN 140-1998 Respiratory protective devices - Half masks and quarter masks','E'),('B15','BS EN 379-2003 Personal eye-protection - Automatic welding filters','E'),('B16','GB 14866-2006《个人用眼护具通用技术要求》','G'),('B16','BS EN 1731-2006 Personal eye protection Mesheye faceprotectors','E'),('B17','GB 14866-2006《个人用眼护具通用技术要求》','G'),('B17','BS EN 172-1995 Personal eye protection-Sunglare filtre for industrie use','E'),('B18','GBT 23466-2009《护听器的选择指南》','G'),('B18','BS EN 352-2-2002 Ear plug','E'),('B19','GBT 23466-2009《护听器的选择指南》','G'),('B19','BS EN 352-1-2002 Ear muffs','E'),('B20','GBT 12624-2009《劳动防护手套通用技术条件》','G'),('B20','EN 511-2006 Protective gloves against cold','E'),('B21','AQ 6102-2007《耐酸(碱)手套》','G'),('B21','EN 374-3-2003 Part 3 Determination of resistance to permeation by chemicals','E'),('B22','GB 10213-2006《一次性医用橡胶手套》','G'),('B22','BS EN 374-1-2003 Protective gloves against chemicals performancerequirements','E'),('B23','GBT 22845-2009《防静电手套》','G'),('B23','EN 1149-1 2006 Protective clothing —Electrostatic properties —','E'),('B24','AQ 6103-2007《焊工防护手套》','G'),('B24','BS EN 12477-2001 Incorporating Amendment Protectivegloves','E'),('B25','AQ 6104-2007《防X线手套》','G'),('B25','BS EN 374-1-2003 Protective gloves against chemicals performancerequirements','E'),('B26','AQ6102-2007《耐酸(碱)手套》','G'),('B26','EN 374-3-2003 Part 3 Determination of resistance to permeation by chemicals','E'),('B27','AQ 6101-2007《橡胶耐油手套》','G'),('B27','EN 374-3-2003 Part 3 Determination of resistance to permeation by chemicals','E'),('B28','GBT 12624-2009《劳动防护手套通用技术条件》','G'),('B28','EN 374-2-2003 Part 2 Determination of resistance to penetration','E'),('B29','LD 2-1991《防振手套一般技术条件》','G'),('B29','BS EN ISO 10819-2013 AC-2015 Hand-arm vibration —Measurement and evaluationof the vibration transmissibilityof gloves at the palm of thehand','E'),('B30','GB 24541-2009《手部防护机械危害防护手套》','G'),('B30','EN 388-2003 Protective gloves','E'),('B31','GBT 17622-2008《带电作业用绝缘手套》','G'),('B31','BS EN 60903-2003 Live working — Gloves of insulating material','E'),('B32','GB 21148-2007《个体防护装备 安全鞋》','G'),('B32','EN ISO 20345-2011 Personal protective equipment-safety footwear','E'),('B33','GBT 20098-2006《低温环境作业保护靴通用技术要求》','G'),('B33','EN ISO 20345-2011 Personal protective equipment-safety footwear','E'),('B34','GA 6-2004《消防员防护靴》','G'),('B34','EN ISO 20345-2011 Personal protective equipment-safety footwear','E'),('B35','GB 4385-1995《防静电鞋、导电鞋 技术要求》  ','G'),('B35','EN ISO 20345-2011 Personal protective equipment-safety footwear','E'),('B36','GB 20265-2006《耐化学品的工业模压塑料靴》','G'),('B36','GB 20266-2006《耐化学品的工业用橡胶靴》','G'),('B36','EN ISO 20345-2011 Personal protective equipment-safety footwear','E'),('B37','GB 16756-1997《耐油防护鞋通用技术条件》','G'),('B37','EN ISO 20345-2011 Personal protective equipment-safety footwear','E'),('B38','GB 21148-2007《个体防护装备 安全鞋》','G'),('B38','EN ISO 20345-2011 Personal protective equipment-safety footwear','E'),('B39','LD 50-1994 《保护足趾安全鞋(靴)》','G'),('B39','GB 21146-2007《个体防护装备 职业鞋》','G'),('B39','EN ISO 20345-2011 Personal protective equipment-safety footwear','E'),('B39','BS EN 12568-2010 foot and leg protector_requirements and test methos for toecaps and penetration resistant inserts','E'),('B40','GBT 28287-2012《足部防护 鞋防滑性测试方法》','G'),('B40','EN ISO 20345-2011 Personal protective equipment-safety footwear','E'),('B41','GB 21148-2007《个体防护装备 安全鞋》','G'),('B41','EN ISO 20345-2011 Personal protective equipment-safety footwear','E'),('B42','GB 12011-2009《足部防护：电绝缘鞋》 ','G'),('B42','BS EN 50321-1999 Electrically insulating footwear for working on low voltage installation','E'),('B43','GB 12018-1989《耐酸碱皮鞋》 ','G'),('B43','EN ISO 20345-2011 Personal protective equipment-safety footwear','E'),('B44','AQ 6105-2008《足部防护：矿工安全靴》','G'),('B44','EN ISO 20345-2011 Personal protective equipment-safety footwear','E'),('B45','LD 4-1991《焊接防护鞋》','G'),('B45','EN 20349-2011 Footwear protecting against thermal risks, molten metal splashes','E'),('B46','GBT 20097-2006《防护服一般要求》 ','G'),('B46','BS EN 340-2003 Protective clothing —General requirements','E'),('B47','GB 24539-2009《防护服装化学防护服通用技术要求》','G'),('B47','BS EN 13034-2005 Protective clothing against liquid chemicals Performance requirements chemical protective clothing','E'),('B48','GBT 23330-2009《服装 防雨性能要求》','G'),('B48','BS EN 343-2003 Protective clothing —Protection against rain','E'),('B49','GBT 20898.1-2007《浸水服 第1部分：常穿服安全要求》','G'),('B49','BS EN 342-2004 Protective clothing-Against cold','E'),('B50','GB 9953-1999《浸水保温服》','G'),('B50','BS EN 14225-2-2005 Diving suits - Wet suits - Requirements and test methods','E'),('B51','GBT 13459-2008《劳动防护服 防寒保暖要求》','G'),('B51','BS EN 342-2004 Protective clothing-Against cold','E'),('B51','DS EN 14058-2004 Protective Clothing - Garment For Protection Against Cool Environments','E'),('B52','GB 24539-2009《防护服装化学防护服通用技术要求》','G'),('B52','GBT 24536-2009《防护服装 化学防护服的选择、使用和维护》','G'),('B52','BS EN 943-1-2002 Protectiveclothing against liquid gaseouschemicals, including liquid aerosols solidparticles Performancerequirements non-ventilatedgas-tight','E'),('B52','BS EN 943-2-2002 Protective clothing against liquid gaseouschemicals, including liquid aerosols solidparticles Performancere','E'),('B53','GA 634-2006《消防员隔热防护服》','G'),('B53','GB 8965.1-2009《防护服装 阻燃防护 第1部分：阻燃服》','G'),('B53','EN ISO 14116-2015 Protective clothing -- Protection against heat and flame -- Limited flame spread materials, material assemblies and clothing','E'),('B53','BS EN 532-1995 Protective clothing. Protection against heat and flame. Test method for limited flame spread','E'),('B54','GB 12014-2009《防静电工作服》 ','G'),('B54','EN 1149-5 2006 Protective clothing —Electrostatic properties','E'),('B55','GB 8965.2-2007《防护服装 阻燃防护 第2部分：焊接服》','G'),('B55','BS EN 470-1-1995 Protective clothing for welding and allied','E'),('B56','GBT 23463-2009《防护服装 微波辐射防护服》','G'),('B56','EN ISO 11612-2008 Protective clothing - Clothing to protect against heat and flame','E'),('B57','GBT 23463-2009《防护服装 微波辐射防护服》','G'),('B57','EN ISO 11612-2008 Protective clothing - Clothing to protect against heat and flame','E'),('B58','GA 634-2006《消防员隔热防护服》','G'),('B58','BS EN 533-1997 Protective clothing against heat and flame','E'),('B59','GB 16757-1997《X射线防护服》','G'),('B59','EN 1073-1 Protective clothing against radioactive contamination testmethods ventilatedprotective clothing against particulate radioactive contamination ','E'),('B60','GB 24540-2009《防护服装 酸碱类化学品防护服》 ','G'),('B60','GBT 24536-2009《防护服装 化学防护服的选择、使用和维护》','G'),('B60','BS EN 14605-2005 Protective clothing against liquid chemicals','E'),('B60','BS EN 943-1-2002 Protectiveclothing against liquid gaseouschemicals, including liquid aerosols solidparticles Performancerequirements non-ventilatedgas-tight','E'),('B61','GBT 24536-2009《防护服装 化学防护服的选择、使用和维护》','G'),('B61','BS EN 943-2-2002 Protective clothing against liquid gaseouschemicals, including liquid aerosols solidparticles Performancere','E'),('B62','GB 4303-2008《船用救生衣》','G'),('B62','GB 4302-2008《救生圈》','G'),('B62','EN ISO 12402-5-2006  Personal flotation devices — Part 5 Buoyancy aids (level 50) — Safety requirements ','E'),('B63','GBT 6568-2008《带电作业用屏蔽服装》','G'),('B63','BS EN 50286-2001 Electrical insulating protective clothing for low-voltage installations','E'),('B64','GBT 6568-2008《带电作业用屏蔽服装》','G'),('B64','BS EN 60895-1997 Live working. Conductive clothing for use at a nominal voltage up to 800 kV a.c','E'),('B65','GBT 6568-2008《带电作业用屏蔽服装》','G'),('B65','BS EN 61482-1-2-2007 Live working Protective clothing against thermal hazards electric arc','E'),('B66','GBT 20097-2006《防护服一般要求》 ','G'),('B66','BS EN 340-2003 Protective clothing —General requirements','E'),('B67','GB 6095-2009《安全带》','G'),('B67','GBT 3608-2008《高处作业分级规范》','G'),('B67','BS EN 361-2002 Personal protective equipment against falls from a height — Full body harnesses','E'),('B67','BS EN 358-1999 Belts for work positioning and restraint and work position lanyard','E'),('B68','GB 5725-2009《安全网》 ','G'),('B68','EN 363-2008 Personal fall protection equipment - Personal fall protection systems','E'),('B69','GBT 13641-2006《劳动护肤剂通用技术条件》','G');
/*!40000 ALTER TABLE `guard_standard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job` (
  `code` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `jobCategory` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `explain` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `example` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job`
--

LOCK TABLES `job` WRITE;
/*!40000 ALTER TABLE `job` DISABLE KEYS */;
INSERT INTO `job` VALUES ('A01','存在物体坠落、撞击的作业','物体坠落或横向上可能有物体相撞的作业','建筑安装、桥梁建设、采矿、钻探、造船、起重作业'),('A02','有碎屑飞溅的作业','加工过程中可能有切削飞溅的作业','锤击作业、铸件切削、砂轮打磨、髙压流体破碎'),('A03','操作转动机械作业','机械设备运行中引起的绞、、碾等伤害的作业','机床作业、传动机械作业'),('A04','接触锋利器具作业','生产中使用的生产工具或加工产品易对操作者产生割伤、刺伤等伤害的作业','金属加工的打毛淸边、玻璃装配与加工'),('A05','地面存在尖利物器的作业','工作平面上可能存在对工作者脚部或腿部产生刺伤伤害的作业','森林采伐、建筑工地作业'),('A06','手持振动机械作业','生产中使用手持振动工具，直接作茧自缚用于手臂系统的机械振动或冲击作业','风钻作业、风铲作业、油锯作业'),('A07','人承受全身振动的作业','承受振动或处于不易忍受的振动环境中的作业','田间机械作业驾驶、阀门'),('A08','铲、装、吊、推机械操作作业','各类活动范围较小的重型采掘、建筑、装载起重设备的操作与驾驶','操作铲机、推土机、装卸机、天车、龙门吊、塔吊、单臂起重机等机械'),('A09','低压带电作业','额定电压小于1KV的带电操作作业','低压设备或低压线带电维修'),('A10','高压带电作业','额定电压大于或等于1KV的带电操作作业','高压设备或高压线路带电维修'),('A11','高温作业','在生产过程中，其工作地点平均WBGT指数等于或大于25度的作业，如热的液体、气体对人体的烫伤，热的因体与人体接触引起的灼伤，火焰 对人体的烧伤以及炽热源热辐射对人体的伤害','溶炼、浇注、热轧、锻造、炉窑作业'),('A12','易燃易爆场所作业','易燃易爆物品失去控制的燃烧引发','接触易挥发易燃的液体及化学品、可燃性气体的作业。'),('A13','可燃性粉尘土场所作业','工作场所中存有常温、常压下可燃固体物质粉尘的作业','接触可燃性化学粉尘的作业，如铝镁粉等'),('A14','高处作业','坠落高度基准面大于2m的作业','室外建筑安装、架线、高崖作业、货物堆砌'),('A15','井下作业','存在矿山工作面、巷道侧壁的支护不当、压力过大造成的坍塌或顶板坍埸，以及高势能水意外流向低势能区域的作业','井下采掘、运输、安装'),('A16','地下作业','进行地下管网的铺设及地下挖掘','地下开拓、建筑、安装'),('A17','水上作业','有落水危险的水上作业','水上作业平台、水上运输、水产养殖与捕捞'),('A18','潜水作业','需潜入水面以下作业','水下采集、救捞、水下勘查、水下建造'),('A19','吸入性气相毒物作业','工作场所中存有常温、常压下呈气体或蒸汽状态、经呼吸道吸入能产生毒害物质的作业','接触有毒气体的作业'),('A20','密闭场所作业','在空气不流通的场所中作业，包括在缺氧即空气中含氧浓度小于18%和毒气溶胶超过标准并不能排除等场所中作业','密闭的罐体、房仓、孔道或排水系统、炉窑、存放耗氧器具或生物体进行耗氧过程的密闭空间'),('A21','吸入性气溶胶毒物作业','工作场所中存有常温、常压下呈气溶胶状态、经呼吸道吸入能产生毒害物质的作业','接触铝、铬、铍、锰、镉等有毒金属及其化合物的烟雾和粉尘、沥青烟雾、矽尘、石棉尘及其他有害的动（植）物性粉尘的作业'),('A22','沾染性毒物作业','工作场院所中存有能粘附于皮肤、衣物上，经皮肤吸收产生伤害或对皮肤产生毒害物质的作业','接触有机磷农药、有机汞化合物、苯和苯的二及三硝基化合物、放射性物质的作业'),('A23','生物性毒物作业','工作场所中有感染或吸收产生毒素危险的作业','有毒性动植物养殖、生物毒素培养制剂、带菌或含有生物毒素的制品加工处理、腐烂物品处理、防疫检验'),('A24','噪声作业','声级大于85db的环境中的作业','风钻、气锤、铆接、钢筒内的敲击或铲锈'),('A25','强光作业','强光源或产生强烈红外辐射和紫外辐射的作业','弧光、电弧焊、炉窑作业'),('A26','激光作业','激光发射与加工的作业','激光加工金属、激光焊接、激光测量、激光通讯'),('A27','荧光屏作业','长期荧光屏操作与识别的作业','电脑操作、电视机调试'),('A28','微波作业','微波发射与使用的作业','微波机调试、微波发射、微波加工与利用'),('A29','射线作业','产生电离辐射、辐射剂量超过标准的作业','放射性矿物的开采、选矿、冶炼、加工、核废料或核事故处理、放射性物质使用、X射线检测'),('A30','腐蚀性作业','产生或使用腐蚀性物质的作业','酸性气体净化、酸洗、化学镀膜'),('A31','易污作业','容易污秽皮肤或衣物的作业','碳黑、染色、油漆、有关的作业'),('A32','恶味作业','产生难闻气味或恶习味不易清除的作业','清洁工、恶臭物质处理与加工'),('A33','低温作业','在生产劳动过程中，其工作地点平均气温等于或低于5度的作业','冰库、低温户外作业'),('A34','人工搬运作业','通过人力搬运，不使用机械或其他自动化调备的作业','人力抬、扛、推、搬移作业'),('A35','野外作业','从事野外露天作业','地质勘探、野外测绘'),('A36','涉水作业','作业中需接触大量水或须立于水中','矿井、隧道、水力采掘、地质钻探、下水工程、污水处理'),('A37','车辆驾驶作业','各类机动车辆驾驶的作业','汽车驾驶、铲车驾驶'),('A38','一般性作业','无上述作业特征的普通职业','自动化控制、缝纫、工作台上手工胶合与包装、精细装配与加工');
/*!40000 ALTER TABLE `job` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_risk_guard`
--

DROP TABLE IF EXISTS `job_risk_guard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_risk_guard` (
  `code_job` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `code_risk` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `code_guard` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`code_job`,`code_risk`,`code_guard`),
  KEY `code_job` (`code_job`),
  KEY `code_risk` (`code_risk`),
  KEY `code_guard` (`code_guard`),
  CONSTRAINT `job_risk_guard_ibfk_1` FOREIGN KEY (`code_job`) REFERENCES `job` (`code`),
  CONSTRAINT `job_risk_guard_ibfk_2` FOREIGN KEY (`code_risk`) REFERENCES `risk` (`code`),
  CONSTRAINT `job_risk_guard_ibfk_3` FOREIGN KEY (`code_guard`) REFERENCES `guard` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_risk_guard`
--

LOCK TABLES `job_risk_guard` WRITE;
/*!40000 ALTER TABLE `job_risk_guard` DISABLE KEYS */;
INSERT INTO `job_risk_guard` VALUES ('A01','R01','B02',0),('A01','R01','B39',0),('A01','R01','B68',0),('A01','R02','B10',0),('A01','R02','B40',0),('A01','R18','B41',0),('A02','R01','B02',0),('A02','R01','B30',0),('A02','R01','B46',0),('A02','R02','B10',0),('A02','R17','B18',0),('A02','R17','B19',0),('A03','R02','B01',0),('A03','R02','B10',0),('A03','R17','B18',0),('A03','R17','B19',0),('A04','R02','B02',0),('A04','R02','B39',0),('A04','R02','B46',0),('A04','R18','B30',0),('A04','R18','B41',0),('A05','R18','B02',0),('A05','R18','B41',0),('A06','R02','B29',0),('A06','R02','B38',0),('A06','R17','B18',0),('A06','R17','B19',0),('A07','R02','B29',0),('A07','R02','B30',0),('A07','R02','B38',0),('A07','R02','B46',0),('A07','R17','B18',0),('A07','R17','B19',0),('A08','R01','B10',0),('A08','R01','B30',0),('A08','R04','B02',0),('A08','R04','B05',0),('A08','R04','B46',0),('A09','R05','B31',0),('A09','R05','B42',0),('A09','R05','B64',0),('A10','R05','B02',0),('A10','R05','B10',0),('A10','R05','B63',0),('A10','R05','B65',0),('A11','R06','B02',0),('A11','R06','B34',0),('A11','R06','B56',0),('A11','R06','B57',0),('A11','R06','B58',0),('A11','R11','B07',0),('A11','R14','B13',0),('A12','R07','B23',0),('A12','R07','B35',0),('A12','R07','B52',0),('A12','R07','B53',0),('A12','R07','B54',0),('A12','R07','B66',0),('A12','R11','B05',0),('A12','R11','B06',0),('A12','R11','B47',0),('A13','R08','B23',0),('A13','R08','B35',0),('A13','R08','B53',0),('A13','R08','B54',0),('A13','R08','B66',0),('A13','R11','B05',0),('A13','R11','B47',0),('A14','R01','B02',0),('A14','R01','B10',0),('A14','R01','B30',0),('A14','R09','B40',0),('A14','R09','B67',0),('A14','R09','B68',0),('A15','R02','B02',0),('A15','R02','B29',0),('A15','R02','B41',0),('A15','R10','B23',0),('A15','R10','B32',0),('A15','R10','B40',0),('A15','R11','B05',0),('A15','R11','B06',0),('A15','R11','B08',0),('A15','R17','B18',0),('A15','R17','B19',0),('A16','R06','B53',0),('A16','R10','B39',0),('A16','R10','B41',0),('A16','R10','B44',0),('A16','R10','B48',0),('A16','R11','B07',0),('A16','R17','B18',0),('A16','R17','B19',0),('A17','R12','B09',0),('A17','R12','B32',0),('A17','R12','B48',0),('A17','R12','B49',0),('A17','R19','B62',0),('A18','R12','B09',0),('A18','R12','B50',0),('A18','R19','B62',0),('A19','R13','B06',0),('A19','R13','B07',0),('A19','R15','B21',0),('A19','R15','B52',0),('A19','R15','B69',0),('A20','R02','B02',0),('A20','R02','B39',0),('A20','R11','B05',0),('A20','R11','B07',0),('A20','R15','B06',0),('A20','R15','B21',0),('A20','R15','B52',0),('A20','R15','B69',0),('A21','R13','B01',0),('A21','R13','B05',0),('A21','R13','B06',0),('A21','R15','B21',0),('A21','R15','B52',0),('A21','R15','B69',0),('A22','R11','B05',0),('A22','R11','B06',0),('A22','R13','B01',0),('A22','R13','B05',0),('A22','R13','B06',0),('A22','R15','B16',0),('A22','R15','B21',0),('A22','R15','B52',0),('A22','R15','B69',0),('A23','R11','B05',0),('A23','R11','B06',0),('A23','R13','B01',0),('A23','R13','B16',0),('A23','R13','B22',0),('A23','R13','B52',0),('A23','R13','B69',0),('A24','R17','B18',0),('A24','R17','B19',0),('A25','R02','B10',0),('A25','R06','B24',0),('A25','R06','B45',0),('A25','R06','B53',0),('A25','R06','B55',0),('A25','R14','B13',0),('A25','R14','B15',0),('A26','R14','B14',0),('A26','R14','B59',0),('A27','R14','B11',0),('A27','R14','B59',0),('A28','R14','B11',0),('A28','R14','B59',0),('A29','R14','B12',0),('A29','R14','B25',0),('A29','R14','B59',0),('A30','R15','B01',0),('A30','R15','B16',0),('A30','R15','B26',0),('A30','R15','B36',0),('A30','R15','B43',0),('A30','R15','B60',0),('A31','R08','B35',0),('A31','R08','B46',0),('A31','R11','B05',0),('A31','R11','B06',0),('A31','R13','B01',0),('A31','R13','B26',0),('A31','R13','B27',0),('A31','R13','B37',0),('A31','R13','B52',0),('A31','R13','B61',0),('A31','R13','B69',0),('A32','R11','B01',0),('A32','R11','B06',0),('A32','R11','B07',0),('A32','R11','B46',0),('A33','R01','B30',0),('A33','R01','B40',0),('A33','R12','B03',0),('A33','R12','B19',0),('A33','R12','B20',0),('A33','R12','B33',0),('A33','R12','B51',0),('A33','R12','B69',0),('A34','R04','B02',0),('A34','R09','B40',0),('A34','R09','B67',0),('A34','R09','B68',0),('A35','R01','B40',0),('A35','R12','B03',0),('A35','R12','B32',0),('A35','R12','B33',0),('A35','R12','B48',0),('A35','R12','B51',0),('A35','R13','B10',0),('A35','R13','B28',0),('A35','R14','B17',0),('A35','R14','B69',0),('A36','R12','B09',0),('A36','R12','B32',0),('A36','R12','B48',0),('A37','R16','B04',0),('A37','R16','B09',0),('A37','R16','B13',0),('A37','R16','B17',0),('A37','R16','B30',0),('A37','R16','B46',0),('A38','R03','B46',0);
/*!40000 ALTER TABLE `job_risk_guard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maintainrequest`
--

DROP TABLE IF EXISTS `maintainrequest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maintainrequest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maintainRequestType` int(11) NOT NULL COMMENT '1经销商，2终端客户',
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productClass` int(11) NOT NULL,
  `buyWay` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usedClient` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batchNumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `buyTime` date NOT NULL,
  `usedTime` date NOT NULL,
  `usedCondition` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `requestContent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `files` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logTime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `productClass` (`productClass`),
  CONSTRAINT `maintainrequest_ibfk_3` FOREIGN KEY (`productClass`) REFERENCES `productclass` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maintainrequest`
--

LOCK TABLES `maintainrequest` WRITE;
/*!40000 ALTER TABLE `maintainrequest` DISABLE KEYS */;
INSERT INTO `maintainrequest` VALUES (4,1,'test','test','test@test','11111111111',1,'','test','test','test',1,'2017-01-04','2017-01-31','test','test','4_0.png,4_1.jpg','2017-01-03 17:19:54'),(5,2,'test','test','test@test','11111111111',1,'test','','test','test',12,'2017-01-01','2017-01-03','test','test','5_0.png,5_1.jpg','2017-01-03 17:23:42');
/*!40000 ALTER TABLE `maintainrequest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productclass`
--

DROP TABLE IF EXISTS `productclass`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `describ` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productclass`
--

LOCK TABLES `productclass` WRITE;
/*!40000 ALTER TABLE `productclass` DISABLE KEYS */;
INSERT INTO `productclass` VALUES (1,'呼吸器'),(2,'气密型防护服'),(3,'防坠落');
/*!40000 ALTER TABLE `productclass` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `risk`
--

DROP TABLE IF EXISTS `risk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `risk` (
  `code` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `risk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `risk`
--

LOCK TABLES `risk` WRITE;
/*!40000 ALTER TABLE `risk` DISABLE KEYS */;
INSERT INTO `risk` VALUES ('R01','物体打击与碰撞'),('R02','机械伤害'),('R03','其它'),('R04','运输工具伤害'),('R05','电流伤害'),('R06','热烧伤'),('R07','火灾'),('R08','化学爆炸'),('R09','坠落'),('R10','冒顶片帮、透水'),('R11','影响呼吸'),('R12','影响气温调节'),('R13','毒物伤害'),('R14','辐射伤害'),('R15','化学烧灼'),('R16','车辆伤害'),('R17','噪声伤害'),('R18','穿刺伤害'),('R19','溺水');
/*!40000 ALTER TABLE `risk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `training`
--

DROP TABLE IF EXISTS `training`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `training` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trainingWay` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `times` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hopeDate` date NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `demand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `areYou` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `training`
--

LOCK TABLES `training` WRITE;
/*!40000 ALTER TABLE `training` DISABLE KEYS */;
INSERT INTO `training` VALUES (1,'on','江苏省苏州市吴江区平望镇中鲈园欧盛大道2号','半天','2016-12-02','呼吸','test','','','','','终端客户','2016-12-03 16:26:51'),(2,'on','江苏省苏州市吴江区平望镇中鲈园欧盛大道2号','半天','2016-12-02','呼吸','test','','','','','终端客户','2016-12-03 16:28:03'),(3,'去贵司现场培训','address','3days','2016-12-02','救援','test','','','','','经销商','2016-12-03 16:34:56'),(4,'来代尔塔公司培训','江苏省苏州市吴江区平望镇中鲈园欧盛大道2号','半天','2016-12-03','足部','test','test','test','test@test','11111111111','终端客户','2016-12-03 16:43:34'),(5,'来代尔塔公司培训','江苏省苏州市吴江区平望镇中鲈园欧盛大道2号','半天','2016-12-02','Array','tst','t','t','test@test','11111111111','终端客户','2016-12-03 16:58:48'),(6,'来代尔塔公司培训','江苏省苏州市吴江区平望镇中鲈园欧盛大道2号','半天','2016-12-07','呼吸,手部','t','t','t','test@test','11111111111','终端客户','2016-12-03 17:05:29'),(7,'去贵司现场培训','shanghai changning','1week','2017-03-15','呼吸,防坠落,救援','interactive','dp','xuyi','xuyi@deltaplus.com.cn','18578955487','终端客户','2016-12-05 09:56:22'),(8,'来代尔塔公司培训','江苏省苏州市吴江区平望镇中鲈园欧盛大道2号','半天','2015-08-06','呼吸,手部','kj','vjhk','vhjk','asert@asert.met','14785968574','终端客户','2016-12-20 16:09:41'),(9,'去贵司现场培训','','半天','0000-00-00','手部','','','','','','终端客户','2016-12-27 09:51:30'),(10,'来代尔塔公司培训','江苏省苏州市吴江区平望镇中鲈园欧盛大道2号','一天','2017-12-08','头面听,呼吸,手部,足部,防护服,防坠落,生命线,救援','了解贵公司防护用品及产品销售意向','嘉兴商友贸易有限公司','李明华','1124502179@qq.com','17805832339','经销商','2017-12-04 09:59:56'),(11,'去贵司现场培训','青岛海西船舶柴油机有限公司','半天','2018-03-23','头面听,呼吸,手部,足部,防护服,防坠落,生命线,救援','产品介绍、正确使用、演示、产品馈送。','青岛海西船舶柴油机有限公司','韩洪军','hanhongjun@cse.com.cn','0532-86708080-6302','终端客户','2018-03-12 10:08:03'),(12,'去贵司现场培训','青岛市黄岛区漓江东路501号','半天','2018-03-23','头面听,呼吸,手部,足部,防护服,防坠落,生命线,救援','产品介绍、正确使用、演示、产品馈送。','青岛海西船舶柴油机有限公司','韩洪军','hanhongjun@cse.com.cn','0532-86708080-6302','终端客户','2018-03-12 10:09:09'),(13,'去贵司现场培训','莆田市涵江区江口镇荔涵大道729号','一天','2018-04-20','头面听,呼吸,手部,足部,防护服,防坠落,救援','产品使用方法，安全要求','云度新能源汽车股份有限公司','涂世雄','27700637@qq.com','18960707102','终端客户','2018-04-11 16:39:47');
/*!40000 ALTER TABLE `training` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'weixin'
--

--
-- Dumping routines for database 'weixin'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-16 11:00:31
