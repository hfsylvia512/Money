-- phpMiniAdmin dump 1.5.091221
-- Datetime: 2018-10-14 22:00:05
-- Host: 
-- Database: test_abkk88_com

/*!40030 SET NAMES utf8 */;
/*!40030 SET GLOBAL max_allowed_packet=16777216 */;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(12) NOT NULL,
  `password` varchar(35) NOT NULL,
  `gid` int(11) NOT NULL DEFAULT '1',
  `addtime` int(11) NOT NULL,
  `lastlogin` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('2','admin','f11ec7022bbe2bf69670d1a181646f0e','1','1510302403','1539522236','1');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

DROP TABLE IF EXISTS `admin_login`;
CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `logintime` int(11) NOT NULL DEFAULT '0',
  `loginip` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `admin_login` DISABLE KEYS */;
INSERT INTO `admin_login` VALUES ('1','admin','1537244897','60.248.112.222'),('2','admin','1537251629','60.248.112.222'),('3','admin','1538038731','106.83.102.168'),('4','admin','1538044082','59.41.116.178'),('5','admin','1538044165','36.113.10.6'),('6','admin','1538219633','110.187.132.179'),('7','admin','1538374330','49.67.212.72'),('8','admin','1538374546','49.67.212.72'),('9','admin','1538374546','59.41.119.196'),('10','admin','1538375286','49.67.212.72'),('11','admin','1538376000','220.249.163.58'),('12','admin','1538377223','49.67.212.72'),('13','admin','1538379308','222.91.231.4'),('14','admin','1538380695','49.67.212.72'),('15','admin','1538382158','49.67.212.72'),('16','admin','1538414198','14.106.181.35'),('17','admin','1538451299','117.31.139.243'),('18','admin','1538457326','49.67.212.72'),('19','admin','1538457489','117.31.139.243'),('20','admin','1538469023','49.67.212.72'),('21','admin','1538469852','59.63.204.129'),('22','admin','1538489843','59.41.117.128'),('23','admin','1538490687','49.67.212.72'),('24','admin','1538547705','106.91.182.236'),('25','admin','1538581639','220.249.163.177'),('26','admin','1538619379','119.86.177.134'),('27','admin','1538632288','14.108.19.177'),('28','admin','1538632316','39.191.204.248'),('29','admin','1538632573','117.31.139.243'),('30','admin','1538632996','117.31.139.243'),('31','admin','1538800070','222.184.173.211'),('32','admin','1538879288','106.85.44.123'),('33','admin','1539005930','222.184.173.94'),('34','admin','1539019497','222.184.173.94'),('35','admin','1539050566','113.65.129.24'),('36','admin','1539059124','36.5.35.98'),('37','admin','1539059183','36.5.35.98'),('38','admin','1539059215','113.65.129.24'),('39','admin','1539059244','122.192.14.101'),('40','admin','1539078228','218.86.94.235'),('41','admin','1539094619','117.136.75.106'),('42','admin','1539129100','218.26.55.125'),('43','admin','1539135154','117.132.191.180'),('44','admin','1539152938','106.45.7.21'),('45','admin','1539157500','60.222.153.37'),('46','admin','1539238839','14.108.23.107'),('47','admin','1539247688','119.123.75.18'),('48','admin','1539251979','113.65.128.13'),('49','admin','1539259327','42.226.37.253'),('50','admin','1539260007','42.226.37.253'),('51','admin','1539262261','106.91.162.218'),('52','admin','1539267393','223.104.6.104'),('53','admin','1539267790','117.61.194.242'),('54','admin','1539268766','211.97.131.207'),('55','admin','1539336195','120.42.192.34'),('56','admin','1539443494','117.136.75.85'),('57','admin','1539522236','106.91.62.51');
/*!40000 ALTER TABLE `admin_login` ENABLE KEYS */;

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  `cont` longtext,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT '99',
  `thumbnail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES ('17','1','申请人需要具备什么条件？','0','','','答：\r\n							年满18周岁的年轻人，均可以进行办理。感谢您对给你花的关注。','99',''),('18','1','为什么我有额度，不能借款？','0','','','答：\r\n								APP显示的额度是您可以使用的最大额度，但是提交申请之后是需要经过审核的，是否通过以审核结果为准。感谢您对给你花的关注。','99',''),('19','1','我能申请多少金额？分多少期？','0','','','答：\r\n								给你花是服务于年轻人的短期信用借款。最少可申请500元，我们根据大数据为用户个性化匹配最高可申请金额，其中上班族最高可申请10000元，尚未在职的年轻人最高可申请5000元。给你花支持多种分期期数，满足不同借款需求，您可以根据自己的需求调整申请金额和分期期数。感谢您对给你花的关注。','99',''),('20','4','订单提交后可以修改吗？怎么取消订单？','0','\r',NULL,'答：\r\n								申请金额、分期期数等订单信息一经提交无法修改，请您确认订单并核实无误后进行下单。在申请结果出具之前，如需取消订单，请您致电客服电话400-050-5511申请取消。感谢您对给你花的关注。','99',NULL),('21','4','芝麻信用认证时，提示支付宝账号不存在？','0','',NULL,'答：\r\n								当您填写的姓名、身份证号跟您支付宝绑定的姓名、身份证号不一致时，会出现该提示，请您确保您的姓名身份证号与支付宝保持一致。感谢您对给你花的关注。','99',NULL),('22','5','为什么没有接到审核电话？','0','\r',NULL,'答：订单审核时间一般为6-48小时，如遇节假日或申请人数过多，审核进度可能会有延迟。请您保持手机畅通，以便审核人员联系您。您也可以登录给你花APP，进入“我的借款”查看审核进度。感谢您对给你花的关注。','99',NULL),('23','5','为什么订单审核失败？','0','',NULL,'答：若您填写的个人资料不完整不真实、上传的照片模糊、有遮挡、综合评分不足等，均会导致失败。感谢您对给你花的关注。','99',NULL),('24','5','为什么会审核失败？综合信用评分不足？','0','',NULL,'答：若您填写的个人资料不完整不真实、上传的照片模糊、有遮挡等均会导致审核失败。\r\n','99',NULL),('25','5','审核时间有多久？怎么加快审核进度？','0','',NULL,'答：订单审核时间一般为6-48小时，如遇节假日或申请人数过多，审核进度可能会有延迟。请您保持手机畅通，以便审核人员联系您。您也可以登录给你花APP，进入“我的借款”查看审核进度。\r\n','99',NULL),('26','6','订单审核通过后，款项什么时候到账？','0','',NULL,'答：\r\n							订单审核通过后，预计工作日内最快2个小时打款到您绑定的银行卡中。届时会以短信形式通知您，请注意查收。感谢您对给你花的关注。\r','99',NULL),('27','6','支持哪几家银行卡服务？	','0','\r',NULL,'答：\r\n								给你花目前支持以下银行的储蓄卡：中国银行、农业银行、工商银行、建设银行、邮储银行、招商银行、民生银行、光大银行、兴业银行、中信银行、平安银行、浦发银行、华夏银行、广发银行。感谢您对给你花的关注。','99',NULL),('28','6','绑定银行卡为什么会失败？','0','\r',NULL,'答：\r\n								请您确认绑定的银行卡为申请人本人所有，且银行卡的相关信息确认无误。若银行卡信息有误，请您联系相关银行进行核实。感谢您对给你花的关注。','99',NULL),('29','7','我怎么进行还款？','0','',NULL,'答：给你花将会在您的还款日自动从您绑定的银行卡中扣款，请您保证银行卡内余额充足、避免出现银行卡挂失、账户冻结、余额不足的情况。您也可以在每月的还款日前，登录给你花APP，进入“个人中心-我的还款”，主动进行还款。\r\n若出现还款异常的情况，请您致电给你花客服400-050-5511按3键咨询解决。感谢您对给你花的关注。\r','99',NULL),('30','7','没有及时还款会怎样？','0','\r',NULL,'答：若您发生逾期，从逾期首日起会按照合同收取当期应还款项的1%滞纳金作为处罚。同时，您的逾期记录将进入个人征信机构，影响您日后的个人信用记录。请您及时按期还款，感谢您对给你花的关注。','99',NULL),('31','7','能提前还款么？','0','',NULL,'答：支持提前还款，请您登录给你花APP，进入“个人中心-我的还款”进行还款。感谢您对给你花的关注。','99',NULL);
/*!40000 ALTER TABLE `article` ENABLE KEYS */;

DROP TABLE IF EXISTS `bills`;
CREATE TABLE `bills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  `money` float NOT NULL DEFAULT '0',
  `ordernum` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `bills` DISABLE KEYS */;
/*!40000 ALTER TABLE `bills` ENABLE KEYS */;

DROP TABLE IF EXISTS `block`;
CREATE TABLE `block` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `cont` varchar(255) DEFAULT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `block` DISABLE KEYS */;
INSERT INTO `block` VALUES ('4','补充资料提示','汽车行驶证， 房产证，工作证明、收入证明、社保、公积金','1482310254'),('5','首页底部公司名','网易花','1482310419'),('6','客服电话 13755566666','','1482310568'),('7','客服QQ112233445566','','1482310582'),('8','客服页咨询说明','电话咨询：11:00~20:00，QQ咨询112233445566','1482310612'),('9','必要资料说明','只需3分钟完成资料验证，即可申请借款哦~','1482310675'),('10','补充资料说明','补充资料可增加审核通过几率','1482310717'),('11','审核费用支付协议','我同意支付审核费用,审核费用不退还.','1482310952'),('12','协议1地址','http://baidu.com','1482311345'),('13','协议2地址','http://jinridai.am59.cn/xieyi.html','1482311360'),('14','协议3地址','http://aq.qq.com','1482311375'),('15','协议4地址','http://jinridai.am59.cn/xieyi.html','1482351545');
/*!40000 ALTER TABLE `block` ENABLE KEYS */;

DROP TABLE IF EXISTS `cat`;
CREATE TABLE `cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `ename` varchar(255) DEFAULT NULL,
  `addtime` int(11) NOT NULL,
  `pid` int(11) DEFAULT '0',
  `sort` int(11) DEFAULT '0',
  `cont` longtext,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `cat` DISABLE KEYS */;
INSERT INTO `cat` VALUES ('1','贷款','贷款','1521027233','0','99','','','','');
/*!40000 ALTER TABLE `cat` ENABLE KEYS */;

DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `money` float NOT NULL DEFAULT '0',
  `months` int(11) NOT NULL DEFAULT '0',
  `monthmoney` float NOT NULL,
  `donemonth` int(11) NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0订单创建成功 1审核中 3审核通过 4申请提现 -1审核失败 2打款成功',
  `pid` int(11) NOT NULL,
  `ordernum` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `banknum` varchar(255) NOT NULL,
  `name` varchar(233) NOT NULL,
  `tixian` varchar(30) NOT NULL DEFAULT '',
  `news` tinyint(4) NOT NULL DEFAULT '0',
  `message` varchar(255) NOT NULL DEFAULT '',
  `passtime` int(11) NOT NULL DEFAULT '0',
  `user_id` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES ('11','18888888888','1000','12','91','0','1539269004','7','8','HA11690044159324','工商银行','123456789123656789','测试','','0','由于您银行卡信息填写错误，先需要您支付3000元的改卡费用，稍改卡费用全额退还','0','0');
/*!40000 ALTER TABLE `order` ENABLE KEYS */;

DROP TABLE IF EXISTS `otherinfo`;
CREATE TABLE `otherinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `infojson` varchar(255) NOT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `otherinfo` DISABLE KEYS */;
/*!40000 ALTER TABLE `otherinfo` ENABLE KEYS */;

DROP TABLE IF EXISTS `payorder`;
CREATE TABLE `payorder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ordernum` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `money` float NOT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `jkorder` varchar(255) DEFAULT NULL,
  `name` varchar(222) NOT NULL,
  `p_status` int(1) NOT NULL DEFAULT '0' COMMENT '用户点击的已还款状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `payorder` DISABLE KEYS */;
INSERT INTO `payorder` VALUES ('1','H918444154676199','18888888888','审核费','0','1537244415','1',NULL,'','0'),('2','HA01759507943622','18888888888','还款费','3470','1538375950','0','H918444154676199','测试','0'),('3','HA01826820665023','18888888888','审核费','0','1538382682','1',NULL,'','0'),('4','HA04321186407711','18888888888','还款费','3155','1538632118','0','HA01826820665023','测试','0'),('5','HA09782659138534','18888888888','审核费','0','1539078265','1',NULL,'','0'),('6','HA09795367759444','18888888888','审核费','0','1539079536','1',NULL,'','0'),('7','HA11541037263800','18888888888','还款费','91','1539254103','0','HA09795367759444','测试','1'),('8','HA11690044159324','18888888888','审核费','0','1539269004','1',NULL,'','0');
/*!40000 ALTER TABLE `payorder` ENABLE KEYS */;

DROP TABLE IF EXISTS `qr_code`;
CREATE TABLE `qr_code` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=gbk;

/*!40000 ALTER TABLE `qr_code` DISABLE KEYS */;
INSERT INTO `qr_code` VALUES ('8','http://test.abkk88.com./Upload/code/qr_code984135933.php','1');
/*!40000 ALTER TABLE `qr_code` ENABLE KEYS */;

DROP TABLE IF EXISTS `smscode`;
CREATE TABLE `smscode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(255) NOT NULL,
  `code` varchar(12) NOT NULL,
  `sendtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `smscode` DISABLE KEYS */;
/*!40000 ALTER TABLE `smscode` ENABLE KEYS */;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '1',
  `username` varchar(50) NOT NULL DEFAULT '' COMMENT '用户的姓名',
  `idCard` char(18) NOT NULL DEFAULT '' COMMENT '用户的身份证',
  `jisuan_ticheng` int(10) NOT NULL,
  `ticheng_sum` int(25) NOT NULL,
  `ketixian` int(22) NOT NULL,
  `shenqing_tixian` int(22) NOT NULL,
  `leiji_tixian` int(22) NOT NULL,
  `truename` varchar(222) NOT NULL,
  `yao_phone` char(5) NOT NULL DEFAULT '' COMMENT '被邀请码',
  `invitation` char(5) NOT NULL DEFAULT '' COMMENT '邀请码',
  `userid` int(11) NOT NULL DEFAULT '0' COMMENT '邀请人的id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('1','18888888888','10470c3b4b1fed12c3baac014be15fac67c6e815','0','1','','','0','0','0','0','0','测试','','','0');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

DROP TABLE IF EXISTS `userinfo`;
CREATE TABLE `userinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(25) NOT NULL DEFAULT '',
  `usercard` varchar(255) DEFAULT NULL,
  `cardphoto_1` varchar(255) DEFAULT NULL,
  `cardphoto_2` varchar(255) DEFAULT NULL,
  `cardphoto_3` varchar(255) DEFAULT NULL,
  `addess_ssq` varchar(255) DEFAULT NULL,
  `addess_more` varchar(255) DEFAULT NULL,
  `dwname` varchar(255) DEFAULT NULL,
  `dwaddess_ssq` varchar(255) DEFAULT NULL,
  `dwaddess_more` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `workyears` float DEFAULT NULL,
  `bankcard` varchar(255) DEFAULT NULL,
  `bankname` varchar(255) DEFAULT NULL,
  `alipay` int(1) DEFAULT '0',
  `wechat` int(1) DEFAULT '0',
  `dwphone` varchar(255) DEFAULT NULL,
  `dwysr` varchar(255) DEFAULT NULL,
  `personname_1` varchar(255) DEFAULT NULL,
  `personphone_1` varchar(255) DEFAULT NULL,
  `persongx_1` varchar(255) DEFAULT NULL,
  `personname_2` varchar(255) DEFAULT NULL,
  `personphone_2` varchar(255) DEFAULT NULL,
  `persongx_2` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `school_address` varchar(255) NOT NULL DEFAULT '',
  `school_name` varchar(255) NOT NULL DEFAULT '',
  `xueli` varchar(255) NOT NULL DEFAULT '',
  `nianji` varchar(255) NOT NULL DEFAULT '',
  `banji` varchar(255) NOT NULL DEFAULT '',
  `zhuanye` varchar(255) NOT NULL DEFAULT '',
  `suse_address` varchar(255) NOT NULL DEFAULT '',
  `qq_num` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `wechat_num` varchar(255) NOT NULL DEFAULT '',
  `wechat_name` varchar(255) NOT NULL DEFAULT '',
  `xuexin_num` varchar(255) NOT NULL DEFAULT '',
  `xuexin_pwd` varchar(255) NOT NULL DEFAULT '',
  `sex` varchar(255) NOT NULL DEFAULT '',
  `jiguan` varchar(255) NOT NULL DEFAULT '',
  `shouji_pwd` varchar(255) NOT NULL,
  `shenghuofei` varchar(255) NOT NULL DEFAULT '',
  `xuehao` varchar(255) NOT NULL DEFAULT '',
  `f_name` varchar(255) NOT NULL DEFAULT '',
  `f_phone` varchar(255) NOT NULL DEFAULT '',
  `m_name` varchar(255) NOT NULL DEFAULT '',
  `m_phone` varchar(255) NOT NULL DEFAULT '',
  `z_name` varchar(255) NOT NULL DEFAULT '',
  `z_phone` varchar(255) NOT NULL DEFAULT '',
  `fudao_name` varchar(255) NOT NULL DEFAULT '',
  `fudao_phone` varchar(255) NOT NULL DEFAULT '',
  `seyou_name` varchar(255) NOT NULL DEFAULT '',
  `seyou_phone` varchar(255) NOT NULL DEFAULT '',
  `tongxue_name` varchar(255) NOT NULL DEFAULT '',
  `tongxue_phone` varchar(255) NOT NULL DEFAULT '',
  `pengyou_name` varchar(255) NOT NULL DEFAULT '',
  `pengyou_phone` varchar(255) NOT NULL DEFAULT '',
  `zhima_openid` varchar(255) NOT NULL DEFAULT '' COMMENT '芝麻信用id',
  `goods_type` varchar(255) NOT NULL DEFAULT '' COMMENT '商品类型',
  `goods_brand` varchar(255) NOT NULL DEFAULT '' COMMENT '品牌',
  `goods_model` varchar(255) NOT NULL DEFAULT '' COMMENT '型号',
  `goods_color` varchar(255) NOT NULL DEFAULT '' COMMENT '颜色',
  `goods_mem` varchar(255) NOT NULL DEFAULT '' COMMENT '内存',
  `goods_sum` varchar(255) NOT NULL DEFAULT '' COMMENT '机器总价',
  `goods_firstpay` varchar(255) NOT NULL DEFAULT '' COMMENT '首付金额',
  `goods_borrow` varchar(255) NOT NULL DEFAULT '' COMMENT '借款金额',
  `goods_time` varchar(255) NOT NULL DEFAULT '' COMMENT '期数',
  `goods_monthpay` varchar(255) NOT NULL DEFAULT '' COMMENT '月付',
  `borrow_name` varchar(255) NOT NULL DEFAULT '' COMMENT '借款人姓名',
  `borrow_tel` varchar(255) NOT NULL DEFAULT '' COMMENT '电话',
  `borrow_idcard` varchar(255) NOT NULL DEFAULT '' COMMENT '身份证号',
  `borrow_qqwei` varchar(255) NOT NULL DEFAULT '' COMMENT 'QQ/微信',
  `borrow_address` varchar(255) NOT NULL DEFAULT '' COMMENT '居住地址',
  `borrow_livetime` varchar(255) NOT NULL DEFAULT '' COMMENT '居住时间',
  `borrow_work` varchar(255) NOT NULL DEFAULT '' COMMENT '工作单位',
  `borrow_fix` varchar(255) NOT NULL DEFAULT '' COMMENT '固话',
  `borrow_section` varchar(255) NOT NULL DEFAULT '' COMMENT '部门',
  `borrow_post` varchar(255) NOT NULL DEFAULT '' COMMENT '职位',
  `borrow_month` varchar(255) NOT NULL DEFAULT '' COMMENT '月工资',
  `borrow_paytime` varchar(255) NOT NULL DEFAULT '' COMMENT '发薪日',
  `borrow_worktime` varchar(255) NOT NULL DEFAULT '' COMMENT '工作时间',
  `borrow_company` varchar(255) NOT NULL DEFAULT '' COMMENT '公司地址',
  `borrow_dad` varchar(255) NOT NULL DEFAULT '' COMMENT '父亲姓名',
  `borrow_dadtel` varchar(255) NOT NULL DEFAULT '' COMMENT '父亲电话',
  `borrow_mom` varchar(255) NOT NULL DEFAULT '' COMMENT '母亲姓名',
  `borrow_momtel` varchar(255) NOT NULL DEFAULT '' COMMENT '母亲电话',
  `borrow_urgent` varchar(255) NOT NULL DEFAULT '' COMMENT '紧急联系人',
  `borrow_urgentel` text NOT NULL COMMENT '紧急联系人电话',
  `borrow_colleague` text NOT NULL COMMENT '同事姓名',
  `borrow_colleaguetel` text NOT NULL COMMENT '同事电话',
  `borrow_other` text NOT NULL COMMENT '其他联系人',
  `borrow_othertel` text NOT NULL COMMENT '其他联系人电话',
  `borrow_borrow` text NOT NULL COMMENT '借款人姓名',
  `service` text NOT NULL COMMENT '服务经理',
  `transact` text NOT NULL COMMENT '办理借款时间',
  `shopname` text NOT NULL COMMENT '办理门店名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `userinfo` DISABLE KEYS */;
INSERT INTO `userinfo` VALUES ('1','18888888888','测试','','1234567894132456789','http://test.abkk88.com:80/Upload/image/20181001/20181001144617_27372.jpg','http://test.abkk88.com:80/Upload/image/20180918/20180918121935_81454.jpg','http://test.abkk88.com:80/Upload/image/20181002/20181002011403_73725.jpg','321','231','123','212','31','123','2313','123456789123656789','工商银行','0','0','1','321',NULL,NULL,'23',NULL,NULL,'3',NULL,'','','','','','','','','','','','','','','','','','','','','','','231','321','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','1321','231','','','','','','');
/*!40000 ALTER TABLE `userinfo` ENABLE KEYS */;

DROP TABLE IF EXISTS `userphone`;
CREATE TABLE `userphone` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `phone_num` varchar(255) NOT NULL,
  `phone_address` varchar(255) NOT NULL,
  `phone_time` varchar(255) NOT NULL,
  `phone_calltime` varchar(255) NOT NULL,
  `phone_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `userphone` DISABLE KEYS */;
/*!40000 ALTER TABLE `userphone` ENABLE KEYS */;

DROP TABLE IF EXISTS `wechat`;
CREATE TABLE `wechat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) NOT NULL,
  `addtime` int(11) NOT NULL,
  `type` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `wechat` DISABLE KEYS */;
/*!40000 ALTER TABLE `wechat` ENABLE KEYS */;


-- phpMiniAdmin dump end
