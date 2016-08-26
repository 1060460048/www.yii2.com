-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-02-06 08:48:12
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yubin`
--

-- --------------------------------------------------------

--
-- 表的结构 `lmy_admin`
--

CREATE TABLE IF NOT EXISTS `lmy_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `lmy_admin`
--

INSERT INTO `lmy_admin` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'JeNOt6r4Ngj2re34QCVLCQWDSpzlrHZ8', '$2y$13$Mu2rjNu/eX2RZ/Ie05FOsOqi7PMDC.2vGrDPhO50ciUX60Z456aAu', NULL, 'aa@qq.com', 10, 1444900682, 1450497223);

-- --------------------------------------------------------

--
-- 表的结构 `lmy_ads`
--

CREATE TABLE IF NOT EXISTS `lmy_ads` (
  `id` int(10) unsigned NOT NULL,
  `place` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL COMMENT '广告名',
  `thumb` varchar(100) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `start_time` int(11) DEFAULT NULL COMMENT '大标题',
  `end_time` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '默认100，越小越靠前',
  `updated_at` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lmy_ads`
--

INSERT INTO `lmy_ads` (`id`, `place`, `title`, `thumb`, `url`, `start_time`, `end_time`, `status`, `updated_at`, `created_at`) VALUES
(1, 0, '首页优惠券抢购广告', '/upload/ads/2016080403454056191.jpg', '/user/coupon-get', 1470296400, 1472631120, 1, 1470298755, 1470296740);
-- --------------------------------------------------------

--
-- 表的结构 `lmy_album`
--

CREATE TABLE IF NOT EXISTS `lmy_album` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL COMMENT '标题',
  `intro` text COMMENT '简介',
  `image` varchar(200) DEFAULT NULL,
  `thumb` varchar(200) DEFAULT NULL,
  `author` varchar(200) DEFAULT NULL COMMENT '作者',
  `views` int(11) DEFAULT '0' COMMENT '点击量',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `lmy_album`
--

INSERT INTO `lmy_album` (`id`, `title`, `intro`, `image`, `thumb`, `author`, `views`, `created_at`, `updated_at`) VALUES
(1, '中国第一建筑工程第一期学员毕业照', '2014界多少多少班造价员毕业生和老师毕业合影，2014界多少多少班造价员毕业生和老师毕业合影，2014界多少多少班造价员毕业生和老师毕业合影，2014界多少多少班造价员毕业生和老师毕业合影，2014界多少多少班造价员毕业生和老师毕业合影，', '/upload/teachers/201512/2015122812084778744.jpg', '/upload/teachers/201512/small-2015122812084778744.jpg', '宇斌教育', 39, 1451274614, 1451534255);

-- --------------------------------------------------------

--
-- 表的结构 `lmy_album_image`
--

CREATE TABLE IF NOT EXISTS `lmy_album_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(11) NOT NULL,
  `filename` varchar(128) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `origin` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '50',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `lmy_album_image`
--

INSERT INTO `lmy_album_image` (`id`, `album_id`, `filename`, `description`, `image`, `thumb`, `origin`, `sort_order`) VALUES
(1, 1, '2015122812084778744.jpg', '', '/upload/teachers/201512/2015122812084778744.jpg', '/upload/teachers/201512/small-2015122812084778744.jpg', NULL, 50),
(3, 1, '2015122801473863821.jpg', '', '/upload/teachers/201512/2015122801473863821.jpg', '/upload/teachers/201512/small-2015122801473863821.jpg', NULL, 50);

-- --------------------------------------------------------

--
-- 表的结构 `lmy_category`
--

CREATE TABLE IF NOT EXISTS `lmy_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT '0',
  `name` varchar(128) NOT NULL COMMENT '名称',
  `brief` varchar(255) DEFAULT NULL,
  `is_nav` int(11) DEFAULT '0' COMMENT '导航显示',
  `banner` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` text,
  `redirect_url` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT '50' COMMENT '排序',
  `status` int(11) DEFAULT '1' COMMENT '状态',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `lmy_category`
--

INSERT INTO `lmy_category` (`id`, `parent_id`, `name`, `brief`, `is_nav`, `banner`, `keywords`, `description`, `redirect_url`, `sort_order`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 0, '工程造价培训', '工程造价培训', 1, '', '', '', '', 50, 1, 1450849305, 1450867987, NULL, NULL),
(2, 0, '安装工程造价培训', '安装工程造价培训', 1, '', '安装工程造价培训', '安装工程造价培训', '', 50, 1, 1450849548, 1450868001, NULL, NULL),
(3, 1, '造价', '', 0, '', '', '', '', 50, 1, 1450850403, 1450850403, NULL, NULL),
(4, 3, '造价工程师', '', 0, '', '', '', '', 50, 1, 1450850429, 1450850429, NULL, NULL),
(5, 3, '造价员', '', 0, '', '', '造价员', 'http://www.baidu.com/', 50, 1, 1450850449, 1451442630, NULL, NULL),
(6, 0, '开班信息', '', 0, '', '', '', '', 50, 1, 1450931909, 1450931909, NULL, NULL),
(7, 0, '资讯中心', '资讯中心', 0, '', '', '', '', 50, 1, 1450933782, 1450933782, NULL, NULL),
(8, 0, '报考指南', '', 0, '', '', '', '', 50, 1, 1451124566, 1451124566, NULL, NULL),
(9, 0, '热门专题', '', 0, '', '', '', '', 50, 1, 1451448518, 1451448518, NULL, NULL),
(10, 0, '首页中间信息的总分类', '', 0, '', '', '', '', 50, 1, 1451448562, 1451448562, NULL, NULL),
(11, 10, '分类1', '', 0, '', '', '', '', 50, 1, 1451448641, 1451448641, NULL, NULL),
(12, 10, '分类2', '', 0, '', '', '', '', 50, 1, 1451448641, 1451448641, NULL, NULL),
(13, 10, '分类3', '', 0, '', '', '', '', 50, 1, 1451448641, 1451448641, NULL, NULL),
(14, 10, '分类4', '', 0, '', '', '', '', 50, 1, 1451448641, 1451448641, NULL, NULL),
(15, 10, '分类5', '', 0, '', '', '', '', 50, 1, 1451448641, 1451448641, NULL, NULL),
(16, 10, '分类6', '', 0, '', '', '', '', 50, 1, 1451448641, 1451448641, NULL, NULL),
(17, 10, '分类7', '', 0, '', '', '', '', 50, 1, 1451448641, 1451448641, NULL, NULL),
(18, 10, '分类8', '', 0, '', '', '', '', 50, 1, 1451448641, 1451448641, NULL, NULL),
(19, 10, '分类9', '', 0, '', '', '', '', 50, 1, 1451448641, 1451448641, NULL, NULL),
(20, 10, '分类10', '', 0, '', '', '', '', 50, 1, 1451448641, 1451448641, NULL, NULL),
(21, 10, '分类11', '', 0, '', '', '', '', 50, 1, 1451448641, 1451448641, NULL, NULL),
(22, 10, '分类12', '', 0, '', '', '', '', 50, 1, 1451448641, 1451448641, NULL, NULL),
(23, 0, '开班信息', '', 0, '', '', '', '', 50, 1, 1450931909, 1450931909, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `lmy_company`
--

CREATE TABLE IF NOT EXISTS `lmy_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL COMMENT '公司名',
  `content` text NOT NULL COMMENT '介绍',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='招聘企业' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `lmy_company`
--

INSERT INTO `lmy_company` (`id`, `name`, `content`, `created_at`, `updated_at`) VALUES
(1, '广州市世联房地产咨询有限公司', '河南宇斌工程造价咨询有限公司是经河南省工商行政管理部门登记注册、河南省建设厅批准的工程造价咨询专业机构。公司注册资金100万元，具有工程造价咨询乙级资质。 河南宇斌工程造价咨询有限公司位于郑州市三全路索凌路口美之上三号楼2单元502室，拥有先进的技术设备和一批经验丰富的注册造价工程师。大学本科以上学历并具有高级、中级职称人员占公司人员总数的百分之八十以上，技术人员年龄适中、专业齐全，是一支专业技术过硬、公正诚信的高素质咨询队伍。公司人员的高素质及多年的工作经验为我公司的高质量服务提供了有效保证。 河南宇斌工程造价咨询有限公司承接国内各类建设项目（含土建、安装、古建、园林绿化等工程）的经济技术咨询、可行性研究、投资估算、项目经济评价、工程概算、预算、竣工结算编制及审核、工程招标的招标文件和标底编制、投标报价的编制或审核，提供建设项目各阶段工程造价控制（或全过程顾问服务）及工程索赔业务服务；提供工程造价政策、理论及相关经济信息咨询服务；对工程造价纠纷进行鉴定；工程合同拟订、技术经济咨询和培训等一系列服务。 “为委托方提供专业的造价咨询服务”是我们河南宇斌工程造价咨询有限始终不变的追求，我们在工作中坚持高标准、严要求、讲信用、守合同，不断建立健全、发展完善了企业内部质量保证体系、信息管理体系和专业人力资源系统，充分利用天时、地利、人和的优势，逐步提高咨询水平和能力。', 1451283100, 1451283100);

-- --------------------------------------------------------

--
-- 表的结构 `lmy_config`
--

CREATE TABLE IF NOT EXISTS `lmy_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sitename` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `keywords` varchar(200) DEFAULT NULL,
  `address` varchar(230) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `beianhao` varchar(100) DEFAULT NULL,
  `tongji` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `n1` varchar(255) DEFAULT NULL,
  `n2` varchar(100) DEFAULT NULL,
  `n3` varchar(100) DEFAULT NULL,
  `n4` varchar(100) DEFAULT NULL,
  `n5` varchar(100) DEFAULT NULL,
  `n6` varchar(100) DEFAULT NULL,
  `n7` varchar(100) DEFAULT NULL,
  `n8` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `lmy_config`
--

INSERT INTO `lmy_config` (`id`, `sitename`, `description`, `keywords`, `address`, `phone`, `email`, `beianhao`, `tongji`, `created_at`, `updated_at`, `n1`, `n2`, `n3`, `n4`, `n5`, `n6`, `n7`, `n8`) VALUES
(1, '宇斌教育', '宇斌教育', '宇斌教育', '', '15088888888', '666@qq.com', '豫ICP备案14000272', '', 1450854978, 1451443371, '宇斌教育网（www.ybjypx.com）专注于建筑培训行业。依托于河南经济职业技术学院，整合业内资源，为热爱建筑行业的学员提供专业，急速的信息服务，帮助学员更有针对性的学习，同时也为学员提供最热的招聘信息，立致于实现最优质人才与最合适的企业快速无 缝对接。', '66888889', '15088888888', '15266666666', '', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `lmy_feedback`
--

CREATE TABLE IF NOT EXISTS `lmy_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(200) DEFAULT NULL COMMENT '反馈类型',
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `content` text COMMENT '反馈内容',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `lmy_feedback`
--

INSERT INTO `lmy_feedback` (`id`, `type`, `name`, `phone`, `content`, `created_at`, `updated_at`) VALUES
(1, 'fff', '张三', '13733152605', 'fffffff', 1452141250, 1452141250),
(2, 'fff', '张三', '13733152605', 'fffffff', 1452145496, 1452145496);

-- --------------------------------------------------------

--
-- 表的结构 `lmy_filedownload`
--

CREATE TABLE IF NOT EXISTS `lmy_filedownload` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `filepath` text,
  `views` int(11) DEFAULT '1',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `lmy_filedownload`
--

INSERT INTO `lmy_filedownload` (`id`, `title`, `filepath`, `views`, `created_at`, `updated_at`) VALUES
(1, '造价员学习资料', '<p style="line-height: 16px;"><img style="vertical-align: middle; margin-right: 2px;" src="http://www.yubin.com/backend/web/assets/a2ba5dbb/dialogs/attachment/fileTypeImages/icon_doc.gif"/><a style="font-size:12px; color:#0066cc;" href="/upload/file/20151228/1451294351123101.docx" title="discuz微社区打通版.docx">discuz微社区打通版.docx</a></p><p><br/></p>', 26, 1451294449, 1451535255);

-- --------------------------------------------------------

--
-- 表的结构 `lmy_friendlink`
--

CREATE TABLE IF NOT EXISTS `lmy_friendlink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `isshow` tinyint(4) DEFAULT '1',
  `ord` int(11) DEFAULT '100',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `lmy_friendlink`
--

INSERT INTO `lmy_friendlink` (`id`, `name`, `link`, `isshow`, `ord`, `created_at`, `updated_at`) VALUES
(1, '百度', 'http://www.baidu.com/', 1, 100, 1450864489, 1450864489);

-- --------------------------------------------------------

--
-- 表的结构 `lmy_goods`
--

CREATE TABLE IF NOT EXISTS `lmy_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL COMMENT '商品名',
  `guige` varchar(200) DEFAULT NULL COMMENT '规格下/型号',
  `danwei` varchar(200) DEFAULT NULL,
  `price` float NOT NULL DEFAULT '0' COMMENT '价格单位元',
  `beizhu` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `lmy_goods`
--

INSERT INTO `lmy_goods` (`id`, `name`, `guige`, `danwei`, `price`, `beizhu`, `created_at`, `updated_at`) VALUES
(1, '22.5°双承弯头', 'DN80', '个', 15.611, '无', 1451296380, 1451298824);

-- --------------------------------------------------------

--
-- 表的结构 `lmy_goods_pricelog`
--

CREATE TABLE IF NOT EXISTS `lmy_goods_pricelog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `price` float NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `lmy_goods_pricelog`
--

INSERT INTO `lmy_goods_pricelog` (`id`, `goods_id`, `year`, `month`, `day`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 2015, 12, 28, 15.611, 1451298824, 1451298824);

-- --------------------------------------------------------

--
-- 表的结构 `lmy_jianli`
--

CREATE TABLE IF NOT EXISTS `lmy_jianli` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `xingming` varchar(200) NOT NULL,
  `xingbie` varchar(200) DEFAULT NULL,
  `nianling` varchar(200) DEFAULT NULL,
  `xueli` varchar(200) DEFAULT NULL,
  `xiangguanzhengshu` varchar(200) DEFAULT NULL,
  `yingpingzhiwei` varchar(200) DEFAULT NULL,
  `qiwangxinzi` varchar(200) DEFAULT NULL,
  `gerenjianjie` varchar(200) DEFAULT NULL,
  `qitayaoqiu` varchar(200) DEFAULT NULL,
  `lianxidianhua` varchar(200) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `end_at` int(11) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `author` varchar(200) DEFAULT NULL,
  `jobtype` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `lmy_jianli`
--

INSERT INTO `lmy_jianli` (`id`, `xingming`, `xingbie`, `nianling`, `xueli`, `xiangguanzhengshu`, `yingpingzhiwei`, `qiwangxinzi`, `gerenjianjie`, `qitayaoqiu`, `lianxidianhua`, `created_at`, `updated_at`, `end_at`, `views`, `author`, `jobtype`) VALUES
(1, '张工', '女', '32', '博士', '建筑8级专业证书', '一级公路', '3500', '此人性格开朗活泼灵巧。', '其他要求', '13213192209', 1451291211, 1451534086, NULL, 37, '', '');

-- --------------------------------------------------------

--
-- 表的结构 `lmy_jobs`
--

CREATE TABLE IF NOT EXISTS `lmy_jobs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `zhiweiming` varchar(200) NOT NULL,
  `gongzuodiqu` varchar(200) DEFAULT NULL,
  `zhiweixinzi` varchar(200) DEFAULT NULL,
  `xueliyaoqiu` varchar(200) DEFAULT NULL,
  `zhaopinrenshu` varchar(200) DEFAULT NULL,
  `gongzuoxingzhi` varchar(200) DEFAULT NULL,
  `xingbieyaoqiu` varchar(200) DEFAULT NULL,
  `gongzuojingyan` varchar(200) DEFAULT NULL,
  `jingzhengyoushi` varchar(200) DEFAULT NULL,
  `zhiweimiaoshu` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `lmy_jobs`
--

INSERT INTO `lmy_jobs` (`id`, `company_id`, `zhiweiming`, `gongzuodiqu`, `zhiweixinzi`, `xueliyaoqiu`, `zhaopinrenshu`, `gongzuoxingzhi`, `xingbieyaoqiu`, `gongzuojingyan`, `jingzhengyoushi`, `zhiweimiaoshu`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, '一级建造师', '郑州', '面议', '大专', '15', '全职', '男女不限', '5年', '五险一金,空气开放,无加班,有全勤,有零食', '<p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(51, 51, 51); font-family: arial, 微软雅黑; font-size: 14px; line-height: 24px; white-space: normal;">（一）岗位职责</p><p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(51, 51, 51); font-family: arial, 微软雅黑; font-size: 14px; line-height: 24px; white-space: normal;">1、全面负责公司经营管理工作，确保完成集团下达的各项经济指标。 2、组织制定公司的发展战略、年度工作计划和年度预算，并督导落实。 3、负责公司的建筑生产、工程质量、施工进度、安全管理、市场开拓、物资消耗招投标等各个环节的管理和运作。 4、全面负责公司各项目工程施工的组织管理，对项目实施的质量、进度、成本、安全、文明施工等进行整体管控。 5、负责工程项目的组织与管理、督促、检查工程款的及时拨付与回收。 6、负责开发、建立和维护公司与外界相关重要人士的公共关系。</p><p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(51, 51, 51); font-family: arial, 微软雅黑; font-size: 14px; line-height: 24px; white-space: normal;">（二）任职条件</p><p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(51, 51, 51); font-family: arial, 微软雅黑; font-size: 14px; line-height: 24px; white-space: normal;">1、工程管理、工民建、土木工程等相关专业，大学本科及以上学历。 2、一级建造师，中级以上职称；10年以上建筑行业管理工作经验，其中5年以上大中型建筑企业全面管理工作经验； 3、年龄在40-50岁之间。 4、熟悉国家对工程建设管理的相关法律、法规、熟知经济法律、法规、行业政策及行业验收规范。</p><p><br/></p>', 1451288282, 1451288282, 1);

-- --------------------------------------------------------

--
-- 表的结构 `lmy_kaoshi`
--

CREATE TABLE IF NOT EXISTS `lmy_kaoshi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `baomingshijian` int(11) DEFAULT NULL,
  `jiezhishijian` int(11) DEFAULT NULL,
  `kaoshishijian` int(11) NOT NULL,
  `is_reminder` tinyint(4) DEFAULT '0',
  `ord` int(11) DEFAULT '100',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `lmy_kaoshi`
--

INSERT INTO `lmy_kaoshi` (`id`, `title`, `baomingshijian`, `jiezhishijian`, `kaoshishijian`, `is_reminder`, `ord`, `created_at`, `updated_at`) VALUES
(1, '造价员', 1452182400, 1452355200, 1454083200, 1, 100, 1451461782, 1451464619),
(2, '人才选拔', 1452700800, 1453219200, 1454256000, 0, 100, 1451464708, 1451464708);

-- --------------------------------------------------------

--
-- 表的结构 `lmy_news`
--

CREATE TABLE IF NOT EXISTS `lmy_news` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL COMMENT '所属栏目',
  `title` varchar(100) NOT NULL,
  `thumb` varchar(120) DEFAULT NULL,
  `keyword` varchar(100) DEFAULT NULL,
  `description` text,
  `intro` text,
  `content` text NOT NULL,
  `author` varchar(30) DEFAULT '管理员',
  `status` int(11) DEFAULT '1' COMMENT '0=隐藏,1=显示,2=推荐',
  `views` int(11) DEFAULT '0' COMMENT '浏览次数',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `lmy_news`
--

INSERT INTO `lmy_news` (`id`, `category_id`, `title`, `thumb`, `keyword`, `description`, `intro`, `content`, `author`, `status`, `views`, `created_at`, `updated_at`) VALUES
(1, 1, '中国第一建筑工程标题题目', NULL, NULL, NULL, '', '<p style="padding: 0px; margin-top: 0px; margin-bottom: 20px; text-indent: 2em; color: rgb(51, 51, 51); font-family: arial, 微软雅黑; font-size: 14px; line-height: 29px; white-space: normal;">1、造价专业有前途吗？答：绝对有，宇斌造价员培训认为比搞施工有前途多了。 2、造价刚毕业实习难找、没工资、工资低？ 答：就没有毕业实习或者刚毕业收入高的工作，除非你可以拼爹。当你经历过2年左右的造价学习，我认为你会比搞施工或者监理等 获得更多的收入。 先吃饭，有空再发，望能给从事造价的后来者提供一点点帮助。</p><p style="padding: 0px; margin-top: 0px; margin-bottom: 20px; text-indent: 2em; color: rgb(51, 51, 51); font-family: arial, 微软雅黑; font-size: 14px; line-height: 29px; white-space: normal;">同时宇斌河南造价员培训小贴士： 刚刚从事造价预算工作，应该少考虑点收入。需要学习的东西太多了，而且大学学的东西对工作基本上无任何用处，仅仅只是一张文 凭而已，而这样的毕业生随处都是，显然收入不会高。 打个比方，比如给稍微高点的收入，试想一想你所能取得的成果你所能做事情跟收入匹配吗？ 我的建议，安心做好学徒，静下心、沉下心学2年，那时老板不给你加薪，是收入不匹配你工作的问题，把公司给炒掉，恭喜你年薪 超十万了。</p><p style="padding: 0px; margin-top: 0px; margin-bottom: 20px; text-indent: 2em; color: rgb(51, 51, 51); font-family: arial, 微软雅黑; font-size: 14px; line-height: 29px; white-space: normal;">3，大部分问的，做造价要提前准备什么？ 实际上算量、套价，这些都不是提前能学能学好的，因为你必须真实的去做才能去领会、才可以操作。 实际做这工作，这些都不是问题。 也就是，不实际从事造价工作，任何准备都是徒劳，都仅仅是接触造价的问题。 相比我想基础工作更重要，比如看图纸，图纸能看懂是算量的前提。 造价工作，是一种专业性人才，造价从业者应该以此自居，面对其他人士你就应该是造价的专家、成本的专家。 静下心学习钻研造价，成为造价专家，把自己培养成这样的人，你收入提不上去天理不容。 造价不会像做施工那样，一个工程完了就要到下一个工程上去，没有一个安心的场所。 造价大都是比较稳定的，虽然工程项目还是要去的，仅仅是去而已</p><p><br/></p>', '管理员', 1, 26, 1450862828, 1451214480),
(2, 1, '学员合影', NULL, NULL, NULL, NULL, '<p><img src="/upload/images/20151223/1450863878523696.jpg" title="1450863878523696.jpg" alt="22.JPG"/></p>', '', 1, 66, 1450863904, 1451534361),
(3, 6, '土建实训第三期6月8号开班了', NULL, NULL, NULL, NULL, '<p>土建实训第三期6月8号开班了\r\n土建实训第三期6月8号开班了\r\n土建实训第三期6月8号开班了\r\n土建实训第三期6月8号开班了\r\n土建实训第三期6月8号开班了</p>', '管理员', 1, 2, 1450931949, 1450933153),
(4, 7, '资讯中心第一篇文章', '/upload/news/2015122605564513694.jpg', NULL, NULL, '内容简介', '<p>资讯中心第一篇文章</p>', '', 1, 4, 1451122672, 1451535387);

-- --------------------------------------------------------

--
-- 表的结构 `lmy_singlepage`
--

CREATE TABLE IF NOT EXISTS `lmy_singlepage` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `keywords` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `lmy_singlepage`
--

INSERT INTO `lmy_singlepage` (`id`, `title`, `content`, `keywords`, `description`, `created_at`, `updated_at`) VALUES
(1, '联系我们', '<div class="about-nr m-t-20"><p><span class="bt-ys">公司地址：</span>郑州市惠济区三全路西段26号（省体育中心东500米）</p><p><span class="bt-ys">乘车路线：</span>从火车站乘93、路公交车到老鸦陈新村站下车即到</p><p><span class="bt-ys">办公电话：</span>0371-63621259</p><p><span class="bt-ys">手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机：</span>18638009556&nbsp;&nbsp;18638685659</p><p><span class="bt-ys">QQ&nbsp;咨询：</span>976220223</p><p><span class="bt-ys">邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱：</span>976220223@qq.com</p><p><span class="bt-ys">邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;编：</span>450044</p><p class="about-a"><span class="bt-ys">网站地址：</span><a href="#">http://www.gczjsg.com</a></p><p>&nbsp;</p><div class="jl-mt"><div class="mt f-l mt-bj01"><div class="mt-zt"><img src="/statics/images/wx.gif" width="125" height="126" alt=""/></div></div><div class="mt f-l mt-bj02"><div class="mt-zt"><img src="/statics/images/wx.gif" width="125" height="126" alt=""/></div></div><div class="mt f-l mt-bj03"><div class="mt-zt"><img src="/statics/images/wx.gif" width="125" height="126" alt=""/></div></div></div><p>&nbsp;</p><div class="contact-map"><img src="/statics/images/map.png" alt=""/></div></div>', '联系我们', '描述', 1450863572, 1450863687),
(2, '关于我们', '<p>河南宇斌工程造价咨询有限公司是经河南省工商行政管理部门登记注册、河南省建设厅批准的工程造价咨询专业机构。公司注册\r\n资金100万元，具有工程造价咨询乙级资质。\r\n &nbsp; &nbsp; 河南宇斌工程造价咨询有限公司位于郑州市三全路索凌路口美之上三号楼2单元502室，拥有先进的技术设备和一批经验丰富的注\r\n册造价工程师。大学本科以上学历并具有高级、中级职称人员占公司人员总数的百分之八十以上，技术人员年龄适中、专业齐全，是\r\n一支专业技术过硬、公正诚信的高素质咨询队伍。公司人员的高素质及多年的工作经验为我公司的高质量服务提供了有效保证。\r\n &nbsp; &nbsp; 河南宇斌工程造价咨询有限公司承接国内各类建设项目（含土建、安装、古建、园林绿化等工程）的经济技术咨询、可行性研究、\r\n投资估算、项目经济评价、工程概算、预算、竣工结算编制及审核、工程招标的招标文件和标底编制、投标报价的编制或审核，提供\r\n建设项目各阶段工程造价控制（或全过程顾问服务）及工程索赔业务服务；提供工程造价政策、理论及相关经济信息咨询服务；对工\r\n程造价纠纷进行鉴定；工程合同拟订、技术经济咨询和培训等一系列服务。\r\n“为委托方提供专业的造价咨询服务”是我们河南宇斌工程造价咨询有限始终不变的追求，我们在工作中坚持高标准、严要求、讲信\r\n用、守合同，不断建立健全、发展完善了企业内部质量保证体系、信息管理体系和专业人力资源系统，充分利用天时、地利、人和的\r\n优势，逐步提高咨询水平和能力。\r\n河南宇斌工程造价咨询有限公司本着&quot;专业、服务&quot;的执业方针，坚持“独立，客观”的执业原则，广泛汲取来自行业的服务理念，积\r\n淀了丰厚的工程造价咨询经验，竭诚为广大企事业单位提供工程造价咨询服务，不断提高咨询服务质量，不断拓宽市场，进而获得满\r\n意的企业内部经济效益和满意的社会效益。</p><p>&nbsp;</p><p>&nbsp;</p><p>地址：郑州市三全路26号（三全路与索凌路交叉口向西200米）</p><p>邮 &nbsp; &nbsp;编：450044</p><p>乘车路线：从郑州火车站乘93路公交车到老鸦陈新村站下车即到<br/>\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;从中州大道乘219路到老鸦陈新村</p><p>咨询电话：0371-63621259 18638009556 QQ:976220223</p><p class="about-a">网 &nbsp; &nbsp;址：<a href="#">http://www.gczjsg.com</a></p>', NULL, NULL, 1450933525, 1450933525),
(3, '免责声明', '<div class="mzsm-tit">版权声明</div><div class="nr-hg">1、本网站所有内容，凡注明&quot;来源：宇斌教育&quot;的所有文字、图片、页面的版式、和音视频资料，版权均属宇斌教育所有，任何媒体、\r\n网站或个人未经本网协议授权不得转载、链接、转贴或以其他方式复制发布、发表。已经本网协议授权的媒体、网站，在下载使用时\r\n必须注明&quot;稿件来源 ——宇斌教育 &quot;，违者本网将依法追究责任。 2、本网站（宇斌教育）授权您使用的网络课程等内容，仅限您个\r\n人使用不得用于任何商业用途。对于原始内容中所注明的版权及所有权声明，您必须在其副本中予以保留，您不得以任何方式修改、\r\n复制、公开展示、公布或分发这些材料或以其他方式把它们用于任何公开或商业目的，禁止以任何目的或形式把这些材料用于其他任\r\n何网站或网络计算机环境。 3、转载或引用本网版权所有之内容须注明“转自（或引自）宇斌教育”字样，并标明本网网址\r\nhttp://www.gczjsg.com。 4、对于不当转载或引用本网内容而引起的民事纷争、行政处理或其他损失，本网不承担责任。 5、对不\r\n遵守本声明或其他违法、恶意使用本网内容者，本网保留追究其法律责任的权利。</div><div class="xian">&nbsp;</div><p>&nbsp;</p><div class="mzsm-tit">免责声明</div><div class="nr-hg">1、本网所有内容及转载均出于传递更多信息及学习之目的，并不意味着赞同其观点或证实其内容的真实性，宇斌教育不承担任何法\r\n律责任。 2、用户以各种方式使用宇斌教育内容和服务的过程中，不得以任何方式利用宇斌教育直接或间接从事违反中国法律、以及\r\n社会公德的行为；不得干扰、损害和侵犯宇斌教育及相关权利人的各种合法权利与利益。 3、凡本站引用互联网上的资源，对有明确\r\n来源的都注明了出处，版权归原作者及网站所有，如果您对于我们的使用有任何的疑问，请致信 976220223@qq.com，我们会及时\r\n答复。如本网转载涉及版权，请备好相应材料及时联系电话：0371-63621259，以便我们迅速做出处理。</div>', NULL, NULL, 1450933663, 1450933663),
(4, '造价员培训', '<p style="padding: 0px; margin-top: 0px; margin-bottom: 20px; text-indent: 2em; color: rgb(51, 51, 51); font-family: arial, 微软雅黑; font-size: 14px; line-height: 29px; white-space: normal;">1、造价专业有前途吗？答：绝对有，宇斌造价员培训认为比搞施工有前途多了。 2、造价刚毕业实习难找、没工资、工资低？ 答：就没有毕业实习或者刚毕业收入高的工作，除非你可以拼爹。当你经历过2年左右的造价学习，我认为你会比搞施工或者监理等 获得更多的收入。 先吃饭，有空再发，望能给从事造价的后来者提供一点点帮助。</p><p style="padding: 0px; margin-top: 0px; margin-bottom: 20px; text-indent: 2em; color: rgb(51, 51, 51); font-family: arial, 微软雅黑; font-size: 14px; line-height: 29px; white-space: normal;">同时宇斌河南造价员培训小贴士： 刚刚从事造价预算工作，应该少考虑点收入。需要学习的东西太多了，而且大学学的东西对工作基本上无任何用处，仅仅只是一张文 凭而已，而这样的毕业生随处都是，显然收入不会高。 打个比方，比如给稍微高点的收入，试想一想你所能取得的成果你所能做事情跟收入匹配吗？ 我的建议，安心做好学徒，静下心、沉下心学2年，那时老板不给你加薪，是收入不匹配你工作的问题，把公司给炒掉，恭喜你年薪 超十万了。</p><p style="padding: 0px; margin-top: 0px; margin-bottom: 20px; text-indent: 2em; color: rgb(51, 51, 51); font-family: arial, 微软雅黑; font-size: 14px; line-height: 29px; white-space: normal;">3，大部分问的，做造价要提前准备什么？ 实际上算量、套价，这些都不是提前能学能学好的，因为你必须真实的去做才能去领会、才可以操作。 实际做这工作，这些都不是问题。 也就是，不实际从事造价工作，任何准备都是徒劳，都仅仅是接触造价的问题。 相比我想基础工作更重要，比如看图纸，图纸能看懂是算量的前提。 造价工作，是一种专业性人才，造价从业者应该以此自居，面对其他人士你就应该是造价的专家、成本的专家。 静下心学习钻研造价，成为造价专家，把自己培养成这样的人，你收入提不上去天理不容。 造价不会像做施工那样，一个工程完了就要到下一个工程上去，没有一个安心的场所。 造价大都是比较稳定的，虽然工程项目还是要去的，仅仅是去而已。</p><p><br/></p>', NULL, NULL, 1451298889, 1451298889),
(5, '培训班次-零基础实战就业班', '<p>零基础实战就业班，自己可以通过编辑器任意编辑的更好好</p>', NULL, NULL, 1452134448, 1452134448),
(6, '培训班次-土建实战就业班', '<p>培训班次-零基础实战就业班</p>', NULL, NULL, 1452134471, 1452134471),
(7, '培训班次-安装实战就业班', '<p>培训班次-安装实战就业班</p>', NULL, NULL, 1452134487, 1452134487),
(8, '培训班次-强化综合班', '<p>培训班次-强化综合班</p>', NULL, NULL, 1452134500, 1452134500);

-- --------------------------------------------------------

--
-- 表的结构 `lmy_slider`
--

CREATE TABLE IF NOT EXISTS `lmy_slider` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `place` int(11) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `intro` text,
  `url` varchar(100) DEFAULT NULL,
  `ord` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `lmy_slider`
--

INSERT INTO `lmy_slider` (`id`, `place`, `thumb`, `intro`, `url`, `ord`, `updated_at`, `created_at`) VALUES
(1, 0, '/upload/slider/2015122305440617806.jpg', '', 'http://www.qq.com/', 0, 1450863846, 1450507151),
(2, 1, '/upload/slider/2016010711475623644.jpg', '', 'http://www.qq.com/', 0, 1452138476, 1452138476),
(3, 1, '/upload/slider/2016010711480680028.jpg', '', 'http://www.baidu.com/', 0, 1452138486, 1452138486);

-- --------------------------------------------------------

--
-- 表的结构 `lmy_video`
--

CREATE TABLE IF NOT EXISTS `lmy_video` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `thumb` varchar(120) DEFAULT NULL,
  `keyword` varchar(100) DEFAULT NULL,
  `content` text NOT NULL,
  `author` varchar(30) DEFAULT '管理员',
  `status` int(11) DEFAULT '1' COMMENT '0=隐藏,1=显示,2=推荐',
  `views` int(11) DEFAULT '0' COMMENT '浏览次数',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `lmy_video`
--

INSERT INTO `lmy_video` (`id`, `title`, `thumb`, `keyword`, `content`, `author`, `status`, `views`, `created_at`, `updated_at`) VALUES
(1, '视频测试', '7', '', 'http://7xpdu5.com1.z0.glb.clouddn.com/%5B%E8%BF%85%E9%9B%B7%E4%B8%8B%E8%BD%BDwww.xiamp4.com%5D%E8%8A%88Y%E4%BC%A030.HDTV.mp4', '', 3, 42, 1451378941, 1451447410),
(2, 'flv视频直接播放', '5', '', 'http://7xpdu5.com1.z0.glb.clouddn.com/0300020300552CB2450339080AF3BAAEB9B4AA-ADE4-09FD-50B1-9A923BB58E68.flv', '官方', 1, 40, 1451445927, 1451534176);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
