-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 12 月 01 日 20:28
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `daikuang666`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(12) NOT NULL,
  `password` varchar(35) NOT NULL,
  `gid` int(11) NOT NULL DEFAULT '1',
  `addtime` int(11) NOT NULL,
  `lastlogin` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `gid`, `addtime`, `lastlogin`, `status`) VALUES
(2, 'admin', 'f11ec7022bbe2bf69670d1a181646f0e', 1, 1510302403, 1543640397, 1);

-- --------------------------------------------------------

--
-- 表的结构 `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `logintime` int(11) NOT NULL DEFAULT '0',
  `loginip` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=85 ;

--
-- 转存表中的数据 `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `logintime`, `loginip`) VALUES
(1, 'admin', 1537244897, '60.248.112.222'),
(2, 'admin', 1537251629, '60.248.112.222'),
(3, 'admin', 1538038731, '106.83.102.168'),
(4, 'admin', 1538044082, '59.41.116.178'),
(5, 'admin', 1538044165, '36.113.10.6'),
(6, 'admin', 1538219633, '110.187.132.179'),
(7, 'admin', 1538374330, '49.67.212.72'),
(8, 'admin', 1538374546, '49.67.212.72'),
(9, 'admin', 1538374546, '59.41.119.196'),
(10, 'admin', 1538375286, '49.67.212.72'),
(11, 'admin', 1538376000, '220.249.163.58'),
(12, 'admin', 1538377223, '49.67.212.72'),
(13, 'admin', 1538379308, '222.91.231.4'),
(14, 'admin', 1538380695, '49.67.212.72'),
(15, 'admin', 1538382158, '49.67.212.72'),
(16, 'admin', 1538414198, '14.106.181.35'),
(17, 'admin', 1538451299, '117.31.139.243'),
(18, 'admin', 1538457326, '49.67.212.72'),
(19, 'admin', 1538457489, '117.31.139.243'),
(20, 'admin', 1538469023, '49.67.212.72'),
(21, 'admin', 1538469852, '59.63.204.129'),
(22, 'admin', 1538489843, '59.41.117.128'),
(23, 'admin', 1538490687, '49.67.212.72'),
(24, 'admin', 1538547705, '106.91.182.236'),
(25, 'admin', 1538581639, '220.249.163.177'),
(26, 'admin', 1538619379, '119.86.177.134'),
(27, 'admin', 1538632288, '14.108.19.177'),
(28, 'admin', 1538632316, '39.191.204.248'),
(29, 'admin', 1538632573, '117.31.139.243'),
(30, 'admin', 1538632996, '117.31.139.243'),
(31, 'admin', 1538800070, '222.184.173.211'),
(32, 'admin', 1538879288, '106.85.44.123'),
(33, 'admin', 1539005930, '222.184.173.94'),
(34, 'admin', 1539019497, '222.184.173.94'),
(35, 'admin', 1539050566, '113.65.129.24'),
(36, 'admin', 1539059124, '36.5.35.98'),
(37, 'admin', 1539059183, '36.5.35.98'),
(38, 'admin', 1539059215, '113.65.129.24'),
(39, 'admin', 1539059244, '122.192.14.101'),
(40, 'admin', 1539078228, '218.86.94.235'),
(41, 'admin', 1539094619, '117.136.75.106'),
(42, 'admin', 1539129100, '218.26.55.125'),
(43, 'admin', 1539135154, '117.132.191.180'),
(44, 'admin', 1539152938, '106.45.7.21'),
(45, 'admin', 1539157500, '60.222.153.37'),
(46, 'admin', 1539238839, '14.108.23.107'),
(47, 'admin', 1539247688, '119.123.75.18'),
(48, 'admin', 1539251979, '113.65.128.13'),
(49, 'admin', 1539259327, '42.226.37.253'),
(50, 'admin', 1539260007, '42.226.37.253'),
(51, 'admin', 1539262261, '106.91.162.218'),
(52, 'admin', 1539267393, '223.104.6.104'),
(53, 'admin', 1539267790, '117.61.194.242'),
(54, 'admin', 1539268766, '211.97.131.207'),
(55, 'admin', 1539336195, '120.42.192.34'),
(56, 'admin', 1539443494, '117.136.75.85'),
(57, 'admin', 1539522236, '106.91.62.51'),
(58, 'admin', 1542999217, '61.138.58.98'),
(59, 'admin', 1542999232, '123.244.87.9'),
(60, 'admin', 1542999466, '123.244.87.9'),
(61, 'admin', 1543060214, '140.237.169.158'),
(62, 'admin', 1543063998, '140.237.169.158'),
(63, 'admin', 1543113892, '123.244.84.81'),
(64, 'admin', 1543113916, '183.31.47.126'),
(65, 'admin', 1543128108, '123.244.84.81'),
(66, 'admin', 1543129951, '123.244.84.81'),
(67, 'admin', 1543149433, '123.244.84.81'),
(68, 'admin', 1543149713, '123.244.84.81'),
(69, 'admin', 1543156004, '123.244.84.81'),
(70, 'admin', 1543157449, '61.138.58.37'),
(71, 'admin', 1543288336, '123.244.84.15'),
(72, 'admin', 1543298522, '123.244.84.15'),
(73, 'admin', 1543397396, '123.244.84.15'),
(74, 'admin', 1543412057, '123.244.84.15'),
(75, 'admin', 1543412761, '36.113.11.32'),
(76, 'admin', 1543412793, '36.113.11.32'),
(77, 'admin', 1543412842, '36.113.11.32'),
(78, 'admin', 1543412885, '36.113.11.32'),
(79, 'admin', 1543414649, '36.113.11.65'),
(80, 'admin', 1543468915, '123.244.84.15'),
(81, 'admin', 1543483185, '140.237.169.158'),
(82, 'admin', 1543560249, '140.237.169.11'),
(83, 'admin', 1543576728, '123.244.84.15'),
(84, 'admin', 1543640397, '123.244.84.15');

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE IF NOT EXISTS `article` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `cid`, `title`, `addtime`, `cont`, `keywords`, `description`, `sort`, `thumbnail`) VALUES
(17, 1, '申请人需要具备什么条件？', 0, '', '', '答：\r\n							年满18周岁的年轻人，均可以进行办理。感谢您对招联易贷的关注。', 99, ''),
(18, 1, '为什么我有额度，不能借款？', 0, '', '', '答：\r\n								APP显示的额度是您可以使用的最大额度，但是提交申请之后是需要经过审核的，是否通过以审核结果为准。感谢您对招联易贷的关注。', 99, ''),
(19, 1, '我能申请多少金额？分多少期？', 0, '', '', '答：\r\n								招联E贷是服务于年轻人的短期信用借款。最少可申请10000元，我们根据大数据为用户个性化匹配最高可申请金额，其中上班族最高可申请200000元，尚未在职的年轻人最高可申请50000元。招联E贷支持多种分期期数，满足不同借款需求，您可以根据自己的需求调整申请金额和分期期数。感谢您对给你花的关注。', 99, ''),
(20, 4, '订单提交后可以修改吗？怎么取消订单？', 0, '\r', NULL, '答：\r\n								申请金额、分期期数等订单信息一经提交无法修改，请您确认订单并核实无误后进行下单。在申请结果出具之前，如需取消订单，请您致电客服电话400-050-5511申请取消。感谢您对给你花的关注。', 99, NULL),
(21, 4, '芝麻信用认证时，提示支付宝账号不存在？', 0, '', NULL, '答：\r\n								当您填写的姓名、身份证号跟您支付宝绑定的姓名、身份证号不一致时，会出现该提示，请您确保您的姓名身份证号与支付宝保持一致。感谢您对给你花的关注。', 99, NULL),
(22, 5, '为什么没有接到审核电话？', 0, '\r', NULL, '答：订单审核时间一般为6-48小时，如遇节假日或申请人数过多，审核进度可能会有延迟。请您保持手机畅通，以便审核人员联系您。您也可以登录给你花APP，进入“我的借款”查看审核进度。感谢您对给你花的关注。', 99, NULL),
(23, 5, '为什么订单审核失败？', 0, '', NULL, '答：若您填写的个人资料不完整不真实、上传的照片模糊、有遮挡、综合评分不足等，均会导致失败。感谢您对给你花的关注。', 99, NULL),
(24, 1, '为什么会审核失败？综合信用评分不足？', 0, '', '', '答：若您填写的个人资料不完整不真实、上传的照片模糊、有遮挡等均会导致审核失败。\r\n', 99, ''),
(25, 1, '审核时间有多久？怎么加快审核进度？', 0, '', '', '答：订单审核时间一般为6-48小时，如遇节假日或申请人数过多，审核进度可能会有延迟。请您保持手机畅通，以便审核人员联系您。您也可以登录招联E贷APP，进入“我的借款”查看审核进度。\r\n', 99, ''),
(26, 1, '订单审核通过后，款项什么时候到账？', 0, '', '', '答：\r\n							订单审核通过后，预计工作日内最快2个小时打款到您绑定的银行卡中。届时会以短信形式通知您，请注意查收。感谢您对招联E贷的关注。\r\n', 99, ''),
(27, 6, '支持哪几家银行卡服务？	', 0, '\r', NULL, '答：\r\n								给你花目前支持以下银行的储蓄卡：中国银行、农业银行、工商银行、建设银行、邮储银行、招商银行、民生银行、光大银行、兴业银行、中信银行、平安银行、浦发银行、华夏银行、广发银行。感谢您对给你花的关注。', 99, NULL),
(28, 6, '绑定银行卡为什么会失败？', 0, '\r', NULL, '答：\r\n								请您确认绑定的银行卡为申请人本人所有，且银行卡的相关信息确认无误。若银行卡信息有误，请您联系相关银行进行核实。感谢您对给你花的关注。', 99, NULL),
(29, 7, '我怎么进行还款？', 0, '', NULL, '答：给你花将会在您的还款日自动从您绑定的银行卡中扣款，请您保证银行卡内余额充足、避免出现银行卡挂失、账户冻结、余额不足的情况。您也可以在每月的还款日前，登录给你花APP，进入“个人中心-我的还款”，主动进行还款。\r\n若出现还款异常的情况，请您致电给你花客服400-050-5511按3键咨询解决。感谢您对给你花的关注。\r', 99, NULL),
(30, 7, '没有及时还款会怎样？', 0, '\r', NULL, '答：若您发生逾期，从逾期首日起会按照合同收取当期应还款项的1%滞纳金作为处罚。同时，您的逾期记录将进入个人征信机构，影响您日后的个人信用记录。请您及时按期还款，感谢您对给你花的关注。', 99, NULL),
(31, 1, '能提前还款么？', 0, '', '', '答：支持提前还款，请您登录招联E贷APP，进入“个人中心-我的还款”进行还款,且额度是可循环使用。感谢您对招联E贷的关注。', 99, '');

-- --------------------------------------------------------

--
-- 表的结构 `bills`
--

CREATE TABLE IF NOT EXISTS `bills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  `money` float NOT NULL DEFAULT '0',
  `ordernum` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- 表的结构 `block`
--

CREATE TABLE IF NOT EXISTS `block` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `cont` varchar(255) DEFAULT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `block`
--

INSERT INTO `block` (`id`, `name`, `cont`, `addtime`) VALUES
(4, '补充资料提示', '汽车行驶证， 房产证，工作证明、收入证明、社保、公积金', 1482310254),
(5, '首页底部公司名', '网易花', 1482310419),
(9, '必要资料说明', '只需3分钟完成资料验证，即可申请借款哦~', 1482310675),
(10, '补充资料说明', '补充资料可增加审核通过几率', 1482310717),
(11, '审核费用支付协议', '我同意支付审核费用,审核费用不退还.', 1482310952),
(12, '协议1地址', 'http://baidu.com', 1482311345),
(13, '协议2地址', 'http://jinridai.am59.cn/xieyi.html', 1482311360),
(14, '协议3地址', 'http://aq.qq.com', 1482311375),
(15, '协议4地址', 'http://jinridai.am59.cn/xieyi.html', 1482351545);

-- --------------------------------------------------------

--
-- 表的结构 `cat`
--

CREATE TABLE IF NOT EXISTS `cat` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `cat`
--

INSERT INTO `cat` (`id`, `name`, `ename`, `addtime`, `pid`, `sort`, `cont`, `keywords`, `description`, `thumbnail`) VALUES
(1, '贷款', '贷款', 1521027233, 0, 99, '', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `order`
--

CREATE TABLE IF NOT EXISTS `order` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- 转存表中的数据 `order`
--

INSERT INTO `order` (`id`, `user`, `money`, `months`, `monthmoney`, `donemonth`, `addtime`, `status`, `pid`, `ordernum`, `bank`, `banknum`, `name`, `tixian`, `news`, `message`, `passtime`, `user_id`) VALUES
(12, '18888888888', 100002, 12, 9015, 0, 1543003595, 0, 9, 'HB24035950737199', '工商银行', '123456789123656789', '测试', '654321', 1, '', 0, '0'),
(13, '13015663124', 200000, 12, 18027, 0, 1543136539, -1, 10, 'HB25365390726076', '建设银行', '6231940710000102038', 'dhsahd', '', 0, '', 1543137960, '0'),
(17, '15754242222', 10000, 12, 902, 0, 1543157389, 5, 14, 'HB25573894720275', '中国银行', '6213945570000102038', '是是是', '', 0, '', 0, '0'),
(15, '13306061325', 200000, 36, 6916, 0, 1543155934, 1, 12, 'HB25559346937096', '平安银行', '62305840000012354161', '冷月', '', 0, '', 0, '0'),
(20, '17642100557', 10000, 12, 902, 0, 1543288703, 0, 17, 'HB27887037655243', '工商银行', '2454854384645437', '王刚', '', 0, '', 0, '0'),
(21, '18708537894', 20000, 36, 692, 0, 1543300582, 1, 18, 'HB27005821883730', '邮储银行', '6217997110002474613', '罗昌幸', '666321', 0, '', 0, '0'),
(22, '18708537894', 20000, 36, 692, 0, 1543300589, 1, 19, 'HB27005898290014', '邮储银行', '6217997110002474613', '罗昌幸', '666321', 0, '', 0, '0'),
(23, '15368224156', 10000, 24, 485, 0, 1543305913, 5, 20, 'HB27059138817387', '中国银行', '6216691700000192267', '何锐坤', '123456', 1, '', 0, '0'),
(26, '18359646028', 56000, 12, 5048, 0, 1543415639, 3, 23, 'HB28156395321261', '工商银行', '622411637896431957', '张明', '223344', 1, '', 0, '0'),
(25, '13290713201', 10000, 12, 902, 0, 1543414475, 2, 22, 'HB28144750858344', '工商银行', '62263314379461974', '招代理', '222444', 1, '', 1543415151, '0'),
(27, '15973133436', 10000, 24, 485, 0, 1543486936, 1, 24, 'HB29869367372021', '农业银行', '6228481379434817679', '张家凯', '223334', 0, '', 0, '0');

-- --------------------------------------------------------

--
-- 表的结构 `otherinfo`
--

CREATE TABLE IF NOT EXISTS `otherinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `infojson` varchar(255) NOT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `otherinfo`
--

INSERT INTO `otherinfo` (`id`, `user`, `infojson`, `addtime`) VALUES
(1, '13015663124', '["http:\\/\\/zled.9q1b.cn:80\\/Upload\\/image\\/20181125\\/20181125170119_52615.jpg"]', 1543136487);

-- --------------------------------------------------------

--
-- 表的结构 `payorder`
--

CREATE TABLE IF NOT EXISTS `payorder` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `payorder`
--

INSERT INTO `payorder` (`id`, `ordernum`, `user`, `type`, `money`, `addtime`, `status`, `jkorder`, `name`, `p_status`) VALUES
(1, 'H918444154676199', '18888888888', '审核费', 0, 1537244415, 1, NULL, '', 0),
(2, 'HA01759507943622', '18888888888', '还款费', 3470, 1538375950, 0, 'H918444154676199', '测试', 0),
(3, 'HA01826820665023', '18888888888', '审核费', 0, 1538382682, 1, NULL, '', 0),
(4, 'HA04321186407711', '18888888888', '还款费', 3155, 1538632118, 0, 'HA01826820665023', '测试', 0),
(5, 'HA09782659138534', '18888888888', '审核费', 0, 1539078265, 1, NULL, '', 0),
(6, 'HA09795367759444', '18888888888', '审核费', 0, 1539079536, 1, NULL, '', 0),
(8, 'HA11690044159324', '18888888888', '审核费', 0, 1539269004, 1, NULL, '', 0),
(9, 'HB24035950737199', '18888888888', '审核费', 1500, 1543003595, 1, NULL, '', 0),
(10, 'HB25365390726076', '13015663124', '审核费', 1500, 1543136539, 1, NULL, '', 0),
(11, 'HB25446090940993', '15754242222', '审核费', 1500, 1543144609, 1, NULL, '', 0),
(12, 'HB25559346937096', '13306061325', '审核费', 1500, 1543155934, 1, NULL, '', 0),
(13, 'HB25568760823766', '15754242222', '审核费', 1500, 1543156876, 1, NULL, '', 0),
(14, 'HB25573894720275', '15754242222', '审核费', 1500, 1543157389, 1, NULL, '', 0),
(15, 'HB27882203075188', '15040885767', '审核费', 0, 1543288220, 1, NULL, '', 0),
(16, 'HB27884779657131', '17642100557', '审核费', 0, 1543288477, 1, NULL, '', 0),
(17, 'HB27887037655243', '17642100557', '审核费', 0, 1543288703, 1, NULL, '', 0),
(18, 'HB27005821883730', '18708537894', '审核费', 0, 1543300582, 1, NULL, '', 0),
(19, 'HB27005898290014', '18708537894', '审核费', 0, 1543300589, 1, NULL, '', 0),
(20, 'HB27059138817387', '15368224156', '审核费', 0, 1543305913, 1, NULL, '', 0),
(21, 'HB28876868338840', '18359646028', '审核费', 0, 1543387686, 1, NULL, '', 0),
(22, 'HB28144750858344', '13290713201', '审核费', 0, 1543414475, 1, NULL, '', 0),
(23, 'HB28156395321261', '18359646028', '审核费', 0, 1543415639, 1, NULL, '', 0),
(24, 'HB29869367372021', '15973133436', '审核费', 0, 1543486936, 1, NULL, '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `qr_code`
--

CREATE TABLE IF NOT EXISTS `qr_code` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `qr_code`
--

INSERT INTO `qr_code` (`id`, `code`, `type`) VALUES
(13, 'http://zled.9q1b.cn/./Upload/code/11.jpg', '1');

-- --------------------------------------------------------

--
-- 表的结构 `smscode`
--

CREATE TABLE IF NOT EXISTS `smscode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(255) NOT NULL,
  `code` varchar(12) NOT NULL,
  `sendtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- 转存表中的数据 `smscode`
--

INSERT INTO `smscode` (`id`, `phone`, `code`, `sendtime`) VALUES
(1, '15754242222', '076452', 1542999655),
(2, '13226235510', '569364', 1543002377),
(3, '18818586318', '009448', 1543126546),
(4, '15754242222', '104541', 1543127059),
(5, '18818586318', '672002', 1543127554),
(6, '18818586318', '618697', 1543127668),
(7, '18818586318', '198659', 1543127769),
(8, '15754242222', '856934', 1543127878),
(9, '13015663124', '158642', 1543136073),
(10, '13015663124', '322130', 1543136277),
(11, '13306061325', '260333', 1543144538),
(12, '15040885767', '382582', 1543287863),
(13, '17642100557', '889630', 1543287946),
(14, '18788537894', '584021', 1543300013),
(15, '18708537894', '542678', 1543300077),
(16, '13216627052', '065163', 1543300850),
(17, '13114499126', '950258', 1543304835),
(18, '15368224156', '063951', 1543304942),
(19, '18359646028', '198089', 1543387121),
(20, '13290713201', '004088', 1543414120),
(21, '15973133436', '248458', 1543482411),
(22, '18839381304', '849245', 1543485727),
(23, '17606697424', '364100', 1543589644),
(24, '13690652552', '644689', 1543601272),
(25, '18570387994', '865736', 1543657044);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `phone`, `password`, `addtime`, `status`, `username`, `idCard`, `jisuan_ticheng`, `ticheng_sum`, `ketixian`, `shenqing_tixian`, `leiji_tixian`, `truename`, `yao_phone`, `invitation`, `userid`) VALUES
(1, '18888888888', '10470c3b4b1fed12c3baac014be15fac67c6e815', 0, 1, '', '', 0, 0, 0, 0, 0, '测试', '', '', 0),
(2, '15754242222', 'c9fa34935ae3a45c4aeb9e5abb1979dc7ac864f5', 1543127908, 1, '', '', 0, 0, 0, 0, 0, '是是是', '', '', 0),
(3, '18818586318', 'c9fa34935ae3a45c4aeb9e5abb1979dc7ac864f5', 1543136300, 1, '', '', 0, 0, 0, 0, 0, 'dhsahd', '', '', 0),
(4, '13306061325', '3473262bf0f2ff5ced9b4c1d7ceba6bb29160709', 1543144556, 1, '', '', 0, 0, 0, 0, 0, '冷月', '', '', 0),
(5, '15040885767', '10470c3b4b1fed12c3baac014be15fac67c6e815', 1543287887, 1, '', '', 0, 0, 0, 0, 0, '李文', '', '', 0),
(6, '17642100557', 'bcc263150134421408c0bf8a4c5468246eef84de', 1543288004, 1, '', '', 0, 0, 0, 0, 0, '王刚', '', '', 0),
(7, '18708537894', 'a346bc80408d9b2a5063fd1bddb20e2d5586ec30', 1543300106, 1, '', '', 0, 0, 0, 0, 0, '罗昌幸', '', '', 0),
(8, '13216627052', '081d823b787819230285f8e5b882d84019639961', 1543300880, 1, '', '', 0, 0, 0, 0, 0, '', '', '', 0),
(9, '13114499126', '53ca980b46278a0c383c20e9d2eb7e828907cdf0', 1543304878, 1, '', '', 0, 0, 0, 0, 0, '', '', '', 0),
(10, '15368224156', 'fbec0aa3bbf0df1f20182d07669e4a0c9cb644f3', 1543304962, 1, '', '', 0, 0, 0, 0, 0, '何锐坤', '', '', 0),
(11, '18359646028', '1bd54dca195e30edf990c5a9c33d173fa1300bfe', 1543387146, 1, '', '', 0, 0, 0, 0, 0, '张明', '', '', 0),
(12, '13290713201', '1bd54dca195e30edf990c5a9c33d173fa1300bfe', 1543414142, 1, '', '', 0, 0, 0, 0, 0, '招代理', '', '', 0),
(13, '15973133436', 'bbcba9f72c7df8d9425231a2023fe94ccedbdebb', 1543482445, 1, '', '', 0, 0, 0, 0, 0, '张家凯', '', '', 0),
(14, '18839381304', '6a29caa626f4ed24a00483e9c446c0ad3a9dcc71', 1543485743, 1, '', '', 0, 0, 0, 0, 0, '', '', '', 0),
(15, '17606697424', '4ddbeb6864e7ebb8630fff9fb8b7d1e95955e7e7', 1543589667, 1, '', '', 0, 0, 0, 0, 0, '', '', '', 0),
(16, '13690652552', 'feb5609ab910ff282d70ca9bcfb30cbc6628b7ed', 1543601295, 1, '', '', 0, 0, 0, 0, 0, '黄世怀', '', '', 0),
(17, '18570387994', '10470c3b4b1fed12c3baac014be15fac67c6e815', 1543657074, 1, '', '', 0, 0, 0, 0, 0, '', '', '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `userinfo`
--

CREATE TABLE IF NOT EXISTS `userinfo` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `userinfo`
--

INSERT INTO `userinfo` (`id`, `user`, `name`, `password`, `usercard`, `cardphoto_1`, `cardphoto_2`, `cardphoto_3`, `addess_ssq`, `addess_more`, `dwname`, `dwaddess_ssq`, `dwaddess_more`, `position`, `workyears`, `bankcard`, `bankname`, `alipay`, `wechat`, `dwphone`, `dwysr`, `personname_1`, `personphone_1`, `persongx_1`, `personname_2`, `personphone_2`, `persongx_2`, `phone`, `school_address`, `school_name`, `xueli`, `nianji`, `banji`, `zhuanye`, `suse_address`, `qq_num`, `email`, `wechat_num`, `wechat_name`, `xuexin_num`, `xuexin_pwd`, `sex`, `jiguan`, `shouji_pwd`, `shenghuofei`, `xuehao`, `f_name`, `f_phone`, `m_name`, `m_phone`, `z_name`, `z_phone`, `fudao_name`, `fudao_phone`, `seyou_name`, `seyou_phone`, `tongxue_name`, `tongxue_phone`, `pengyou_name`, `pengyou_phone`, `zhima_openid`, `goods_type`, `goods_brand`, `goods_model`, `goods_color`, `goods_mem`, `goods_sum`, `goods_firstpay`, `goods_borrow`, `goods_time`, `goods_monthpay`, `borrow_name`, `borrow_tel`, `borrow_idcard`, `borrow_qqwei`, `borrow_address`, `borrow_livetime`, `borrow_work`, `borrow_fix`, `borrow_section`, `borrow_post`, `borrow_month`, `borrow_paytime`, `borrow_worktime`, `borrow_company`, `borrow_dad`, `borrow_dadtel`, `borrow_mom`, `borrow_momtel`, `borrow_urgent`, `borrow_urgentel`, `borrow_colleague`, `borrow_colleaguetel`, `borrow_other`, `borrow_othertel`, `borrow_borrow`, `service`, `transact`, `shopname`) VALUES
(1, '18888888888', '测试', '', '1234567894132456789', 'http://test.abkk88.com:80/Upload/image/20181001/20181001144617_27372.jpg', 'http://test.abkk88.com:80/Upload/image/20180918/20180918121935_81454.jpg', 'http://test.abkk88.com:80/Upload/image/20181002/20181002011403_73725.jpg', '321', '231', '123', '212', '31', '123', 2313, '123456789123656789', '工商银行', 0, 0, '1', '321', NULL, NULL, '23', NULL, NULL, '3', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '231', '321', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1321', '231', '', '', '', '', '', ''),
(2, '13015663124', 'dhsahd', '', '21130219554445012', 'http://zled.9q1b.cn:80/Upload/image/20181125/20181125165911_94542.jpg', 'http://zled.9q1b.cn:80/Upload/image/20181125/20181125165920_94512.jpg', 'http://zled.9q1b.cn:80/Upload/image/20181125/20181125165931_27937.jpg', '山西省 太原市 小店区', 'ggdfgdf', '5trgg', '山西省 太原市 小店区', 'gdfgd', 'gdfgdf', 0, '6231940710000102038', '建设银行', 0, 0, 'gdfgdf', '10000', NULL, NULL, '父母', NULL, NULL, '父母', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'gdfgd', 'gdfgd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'gdfgdf', '13000000000', '', '', '', '', '', ''),
(3, '15754242222', '是是是', '', '211315198802050016', 'http://zled.9q1b.cn:80/Upload/image/20181125/20181125191536_96113.jpg', 'http://zled.9q1b.cn:80/Upload/image/20181125/20181125191542_46381.jpg', 'http://zled.9q1b.cn:80/Upload/image/20181125/20181125191546_29772.jpg', '北京市 北京市 东城区', '', '好的好的好', '北京市 北京市 东城区', '哈哈哈', '额呵呵', 0, '6213942570000102038', '中国银行', 0, 0, '试试', '10000', NULL, NULL, '父母', NULL, NULL, '父母', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '办吧', '这时候', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '时间就是', '试试', '', '', '', '', '', ''),
(4, '13306061325', '冷月', '', '123456', 'http://zled.9q1b.cn:80/Upload/image/20181125/20181125191641_42928.jpg', 'http://zled.9q1b.cn:80/Upload/image/20181125/20181125191649_14861.jpg', 'http://zled.9q1b.cn:80/Upload/image/20181125/20181125191657_87242.jpg', '北京市 北京市 东城区', '1', '1', '北京市 北京市 东城区', '1', '1', 1, '62305840000012354161', '平安银行', 0, 0, '1', '1', NULL, NULL, '父母', NULL, NULL, '父母', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '1', '', '', '', '', '', ''),
(5, '15040885767', '李文', '', '211302197677888866', 'http://zled.9q1b.cn:80/Upload/image/20181127/20181127110613_35249.jpg', 'http://zled.9q1b.cn:80/Upload/image/20181127/20181127110623_15141.jpg', 'http://zled.9q1b.cn:80/Upload/image/20181127/20181127110645_93828.jpg', '北京市 北京市 东城区', '改名卡', '大丰收股份', '北京市 北京市 东城区', '中资源', '经理', 18, '645646466488166446', '工商银行', 0, 0, '2222222', '50000', NULL, NULL, '父母', NULL, NULL, '同事', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '李小', '1777777777', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '晓得', '788888888', '', '', '', '', '', ''),
(6, '17642100557', '王刚', '', '234302199004167420', 'http://zled.9q1b.cn:80/Upload/image/20181127/20181127110907_90351.jpg', 'http://zled.9q1b.cn:80/Upload/image/20181127/20181127110927_24716.jpg', 'http://zled.9q1b.cn:80/Upload/image/20181127/20181127110951_60990.jpg', '北京市 北京市 东城区', '北京市东城区', '北京天大集团', '北京市 北京市 东城区', '北京市东城区', '职工', 10, '2454854384645437', '工商银行', 0, 0, '', '20000', NULL, NULL, '父母', NULL, NULL, '朋友', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '王天龙', '13442088833', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '王小刚', '15942366653', '', '', '', '', '', ''),
(7, '18708537894', '罗昌幸', '', '522528199105134418', 'http://zled.9q1b.cn:80/Upload/image/20181127/20181127142939_77780.jpg', 'http://zled.9q1b.cn:80/Upload/image/20181127/20181127143008_77582.jpg', 'http://zled.9q1b.cn:80/Upload/image/20181127/20181127143036_14226.jpg', '广东省 深圳市 宝安区', '福永镇凤凰社区', '深圳市福永镇凤凰社区新联兴有限公司', '广东省 深圳市 宝安区', '福永镇凤凰社区147号', '员工', 2, '6217997110002474613', '邮储银行', 0, 0, '', '4000', NULL, NULL, '兄妹', NULL, NULL, '朋友', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '罗昌泉', '13430932420', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '冯香丽', '18785359713', '', '', '', '', '', ''),
(8, '13216627052', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, '13114499126', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, '15368224156', '何锐坤', '', '530325200012240954', 'http://zled.9q1b.cn:80/Upload/image/20181127/20181127155404_69070.jpg', 'http://zled.9q1b.cn:80/Upload/image/20181127/20181127155432_87250.jpg', 'http://zled.9q1b.cn:80/Upload/image/20181128/20181128193447_51761.jpg', '福建省 厦门市 翔安区', '厦门市同美农贸综合市场', '友达', '福建省 厦门市 翔安区', '厦门市同美社区', '一般员工', 1, '6216691700000191267', '中国银行', 0, 0, '15368224156', '4000', NULL, NULL, '朋友', NULL, NULL, '朋友', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '孙琳珊', '15287423548', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '吕博浩', '15825022120', '', '', '', '', '', ''),
(11, '18359646028', '张明', '', '356212199301073536', 'http://zled.9q1b.cn:80/Upload/image/20181128/20181128144014_51253.jpg', 'http://zled.9q1b.cn:80/Upload/image/20181128/20181128144025_44873.jpg', 'http://zled.9q1b.cn:80/Upload/image/20181128/20181128144105_51421.jpg', '河北省 石家庄市 长安区', '悦翔小区', '沉淀建材有限公司', '河北省 石家庄市 长安区', '长安区欣荣小区12栋02', '主任', 3, '622411637896431957', '工商银行', 0, 0, '05778721032', '20000', NULL, NULL, '兄弟', NULL, NULL, '同事', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '陈晓', '18658697431', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '张杰', '15846577721', '', '', '', '', '', ''),
(12, '13290713201', '招代理', '', '364522794', 'http://zled.9q1b.cn:80/Upload/image/20181128/20181128220947_66593.jpg', 'http://zled.9q1b.cn:80/Upload/image/20181128/20181128220955_30036.jpg', 'http://zled.9q1b.cn:80/Upload/image/20181128/20181128221006_67293.jpg', '北京市 北京市 东城区', '东城区东直门', '坎浪有限公司', '北京市 北京市 东城区', '东城区人民法院', '主任', 6, '62263314379461974', '工商银行', 0, 0, '0755132465', '15000', NULL, NULL, '同学', NULL, NULL, '同事', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '小编', '13658694673', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '肖博', '13658643213', '', '', '', '', '', ''),
(13, '15973133436', '张家凯', '', '430822199606268830', 'http://zled.9q1b.cn:80/Upload/image/20181129/20181129181824_16391.jpg', 'http://zled.9q1b.cn:80/Upload/image/20181129/20181129181846_45647.jpg', 'http://zled.9q1b.cn:80/Upload/image/20181129/20181129181911_42041.jpg', '湖南省 长沙市 雨花区', '高升家园小区b12栋603', '富安居集团', '湖南省 长沙市 雨花区', '栖涧里酒店1703室', '员工', 1, '6228481379434817679', '农业银行', 0, 0, '', '5000+', NULL, NULL, '父母', NULL, NULL, '朋友', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '向香娥', '15174424178', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '曾凯', '18890691798', '', '', '', '', '', ''),
(14, '18839381304', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, '17606697424', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, '13690652552', '黄世怀', '', '441422199510214337', 'http://zled.9q1b.cn:80/Upload/image/20181201/20181201021223_11870.jpg', 'http://zled.9q1b.cn:80/Upload/image/20181201/20181201021232_93908.jpg', 'http://zled.9q1b.cn:80/Upload/image/20181201/20181201021304_84242.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, '18570387994', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `userphone`
--

CREATE TABLE IF NOT EXISTS `userphone` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `phone_num` varchar(255) NOT NULL,
  `phone_address` varchar(255) NOT NULL,
  `phone_time` varchar(255) NOT NULL,
  `phone_calltime` varchar(255) NOT NULL,
  `phone_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `wechat`
--

CREATE TABLE IF NOT EXISTS `wechat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) NOT NULL,
  `addtime` int(11) NOT NULL,
  `type` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
