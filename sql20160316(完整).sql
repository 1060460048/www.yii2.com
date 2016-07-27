-- phpMyAdmin SQL Dump
-- version 4.4.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-03-16 16:34:59
-- 服务器版本： 5.5.42-log
-- PHP Version: 5.4.41

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jianyang`
--

-- --------------------------------------------------------

--
-- 表的结构 `lmy_admin`
--

CREATE TABLE IF NOT EXISTS `lmy_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

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
  `thumb` varchar(100) NOT NULL,
  `title` varchar(200) DEFAULT NULL COMMENT '大标题',
  `intro` text,
  `url` varchar(100) DEFAULT NULL,
  `ord` int(11) DEFAULT '100' COMMENT '默认100，越小越靠前',
  `updated_at` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lmy_ads`
--

INSERT INTO `lmy_ads` (`id`, `place`, `thumb`, `title`, `intro`, `url`, `ord`, `updated_at`, `created_at`) VALUES
(1, 0, '/upload/ads/2016031612123893589.jpg', NULL, NULL, 'http://www.qq.com', 1, 1458101558, 0),
(2, 1, '/statics/images/img_130.jpg', NULL, NULL, 'http://www.qq.com', 3, 1458103724, 0);

-- --------------------------------------------------------

--
-- 表的结构 `lmy_album`
--

CREATE TABLE IF NOT EXISTS `lmy_album` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL COMMENT '标题',
  `intro` text COMMENT '简介',
  `image` varchar(200) DEFAULT NULL,
  `thumb` varchar(200) DEFAULT NULL,
  `author` varchar(200) DEFAULT NULL COMMENT '作者',
  `views` int(11) DEFAULT '0' COMMENT '点击量',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lmy_album`
--

INSERT INTO `lmy_album` (`id`, `title`, `intro`, `image`, `thumb`, `author`, `views`, `created_at`, `updated_at`) VALUES
(1, '中国第一建筑工程第一期学员毕业照', '2014界多少多少班造价员毕业生和老师毕业合影，2014界多少多少班造价员毕业生和老师毕业合影，2014界多少多少班造价员毕业生和老师毕业合影，2014界多少多少班造价员毕业生和老师毕业合影，2014界多少多少班造价员毕业生和老师毕业合影，', '/upload/teachers/201512/2015122812084778744.jpg', '/upload/teachers/201512/small-2015122812084778744.jpg', '宇斌教育', 40, 1451274614, 1457001392);

-- --------------------------------------------------------

--
-- 表的结构 `lmy_album_image`
--

CREATE TABLE IF NOT EXISTS `lmy_album_image` (
  `id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `filename` varchar(128) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `origin` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '50'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

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
  `id` int(11) NOT NULL,
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
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lmy_category`
--

INSERT INTO `lmy_category` (`id`, `parent_id`, `name`, `brief`, `is_nav`, `banner`, `keywords`, `description`, `redirect_url`, `sort_order`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 0, '新闻公告', '', 0, '', '', '', '', 50, 1, 1457606776, 1457606776, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `lmy_company`
--

CREATE TABLE IF NOT EXISTS `lmy_company` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL COMMENT '公司名',
  `content` text NOT NULL COMMENT '介绍',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='招聘企业';

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
  `id` int(10) unsigned NOT NULL,
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
  `n8` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lmy_config`
--

INSERT INTO `lmy_config` (`id`, `sitename`, `description`, `keywords`, `address`, `phone`, `email`, `beianhao`, `tongji`, `created_at`, `updated_at`, `n1`, `n2`, `n3`, `n4`, `n5`, `n6`, `n7`, `n8`) VALUES
(1, '简扬教育', '宇斌教育', '宇斌教育', '', '15088888888', '666@qq.com', '豫ICP备案14000272', '', 1450854978, 1457407254, '简扬教育（www.jianyangjiaoyu.com）', '66888889', '15088888888', '15266666666', '', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `lmy_feedback`
--

CREATE TABLE IF NOT EXISTS `lmy_feedback` (
  `id` int(11) NOT NULL,
  `type` varchar(200) DEFAULT NULL COMMENT '反馈类型',
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `content` text COMMENT '反馈内容',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lmy_feedback`
--

INSERT INTO `lmy_feedback` (`id`, `type`, `name`, `phone`, `content`, `created_at`, `updated_at`) VALUES
(1, 'fff', '张三', '13733152605', 'fffffff', 1452141250, 1452141250),
(2, 'fff', '张三', '13733152605', 'fffffff', 1452145496, 1452145496),
(3, NULL, '张三封', '123456789', '嘻嘻嘻', 1457603376, 1457603376);

-- --------------------------------------------------------

--
-- 表的结构 `lmy_filedownload`
--

CREATE TABLE IF NOT EXISTS `lmy_filedownload` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(200) NOT NULL,
  `filepath` text,
  `views` int(11) DEFAULT '1',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lmy_filedownload`
--

INSERT INTO `lmy_filedownload` (`id`, `title`, `filepath`, `views`, `created_at`, `updated_at`) VALUES
(1, '造价员学习资料1', '<p style="line-height: 16px;"><img style="vertical-align: middle; margin-right: 2px;" src="http://www.yubin.com/backend/web/assets/a2ba5dbb/dialogs/attachment/fileTypeImages/icon_doc.gif"/><a style="font-size:12px; color:#0066cc;" href="/upload/file/20151228/1451294351123101.docx" title="discuz微社区打通版.docx">discuz微社区打通版.docx</a></p><p><br/></p>', 26, 1451294449, 1451535255);

-- --------------------------------------------------------

--
-- 表的结构 `lmy_friendlink`
--

CREATE TABLE IF NOT EXISTS `lmy_friendlink` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `isshow` tinyint(4) DEFAULT '1',
  `ord` int(11) DEFAULT '100',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

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
  `id` int(10) unsigned NOT NULL,
  `name` varchar(200) NOT NULL COMMENT '商品名',
  `guige` varchar(200) DEFAULT NULL COMMENT '规格下/型号',
  `danwei` varchar(200) DEFAULT NULL,
  `price` float NOT NULL DEFAULT '0' COMMENT '价格单位元',
  `beizhu` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

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
  `id` int(10) unsigned NOT NULL,
  `goods_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `price` float NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

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
  `id` int(10) unsigned NOT NULL,
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
  `jobtype` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

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
  `id` int(10) unsigned NOT NULL,
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
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

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
  `id` int(10) unsigned NOT NULL,
  `title` varchar(200) NOT NULL,
  `baomingshijian` int(11) DEFAULT NULL,
  `jiezhishijian` int(11) DEFAULT NULL,
  `kaoshishijian` int(11) NOT NULL,
  `is_reminder` tinyint(4) DEFAULT '0',
  `ord` int(11) DEFAULT '100',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

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
  `id` int(11) unsigned NOT NULL,
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
  `updated_at` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lmy_news`
--

INSERT INTO `lmy_news` (`id`, `category_id`, `title`, `thumb`, `keyword`, `description`, `intro`, `content`, `author`, `status`, `views`, `created_at`, `updated_at`) VALUES
(1, 1, '中国第一建筑工程标题题目', NULL, NULL, NULL, '', '<p style="padding: 0px; margin-top: 0px; margin-bottom: 20px; text-indent: 2em; color: rgb(51, 51, 51); font-family: arial, 微软雅黑; font-size: 14px; line-height: 29px; white-space: normal;">1、造价专业有前途吗？答：绝对有，宇斌造价员培训认为比搞施工有前途多了。 2、造价刚毕业实习难找、没工资、工资低？ 答：就没有毕业实习或者刚毕业收入高的工作，除非你可以拼爹。当你经历过2年左右的造价学习，我认为你会比搞施工或者监理等 获得更多的收入。 先吃饭，有空再发，望能给从事造价的后来者提供一点点帮助。</p><p style="padding: 0px; margin-top: 0px; margin-bottom: 20px; text-indent: 2em; color: rgb(51, 51, 51); font-family: arial, 微软雅黑; font-size: 14px; line-height: 29px; white-space: normal;">同时宇斌河南造价员培训小贴士： 刚刚从事造价预算工作，应该少考虑点收入。需要学习的东西太多了，而且大学学的东西对工作基本上无任何用处，仅仅只是一张文 凭而已，而这样的毕业生随处都是，显然收入不会高。 打个比方，比如给稍微高点的收入，试想一想你所能取得的成果你所能做事情跟收入匹配吗？ 我的建议，安心做好学徒，静下心、沉下心学2年，那时老板不给你加薪，是收入不匹配你工作的问题，把公司给炒掉，恭喜你年薪 超十万了。</p><p style="padding: 0px; margin-top: 0px; margin-bottom: 20px; text-indent: 2em; color: rgb(51, 51, 51); font-family: arial, 微软雅黑; font-size: 14px; line-height: 29px; white-space: normal;">3，大部分问的，做造价要提前准备什么？ 实际上算量、套价，这些都不是提前能学能学好的，因为你必须真实的去做才能去领会、才可以操作。 实际做这工作，这些都不是问题。 也就是，不实际从事造价工作，任何准备都是徒劳，都仅仅是接触造价的问题。 相比我想基础工作更重要，比如看图纸，图纸能看懂是算量的前提。 造价工作，是一种专业性人才，造价从业者应该以此自居，面对其他人士你就应该是造价的专家、成本的专家。 静下心学习钻研造价，成为造价专家，把自己培养成这样的人，你收入提不上去天理不容。 造价不会像做施工那样，一个工程完了就要到下一个工程上去，没有一个安心的场所。 造价大都是比较稳定的，虽然工程项目还是要去的，仅仅是去而已</p><p><br/></p>', '管理员', 1, 26, 1450862828, 1451214480),
(2, 1, '学员合影', NULL, NULL, NULL, NULL, '<p><img src="/upload/images/20151223/1450863878523696.jpg" title="1450863878523696.jpg" alt="22.JPG"/></p>', '', 1, 67, 1450863904, 1458108669),
(3, 1, '土建实训第三期6月8号开班了', NULL, NULL, NULL, NULL, '<p>土建实训第三期6月8号开班了\r\n土建实训第三期6月8号开班了\r\n土建实训第三期6月8号开班了\r\n土建实训第三期6月8号开班了\r\n土建实训第三期6月8号开班了</p>', '管理员', 1, 21, 1450931949, 1458108667),
(4, 1, '资讯中心第一篇文章', '/upload/news/2015122605564513694.jpg', NULL, NULL, '内容简介', '<p>资讯中心第一篇文章</p>', '', 1, 8, 1451122672, 1458014303);

-- --------------------------------------------------------

--
-- 表的结构 `lmy_pinglun`
--

CREATE TABLE IF NOT EXISTS `lmy_pinglun` (
  `id` int(10) unsigned NOT NULL,
  `star` int(11) NOT NULL DEFAULT '3',
  `content` text NOT NULL,
  `type` int(11) NOT NULL COMMENT '0=微课，1=资源',
  `rid` int(11) NOT NULL COMMENT '评论的资源',
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lmy_pinglun`
--

INSERT INTO `lmy_pinglun` (`id`, `star`, `content`, `type`, `rid`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 5, '哦哦哦，不错啊', 0, 1, 1, 1, 1, 1457697139, 1457697139),
(2, 2, 'wfewf', 0, 1, 1, 2, 2, 1457943968, 1457943968),
(3, 4, '份额为份额', 0, 2, 1, 2, 2, 1457945891, 1457945891),
(4, 4, '反反复复', 1, 2, 1, 2, 2, 1457946061, 1457946061),
(5, 4, 'rfe3ef', 0, 3, 1, 4, 4, 1458009654, 1458009654),
(6, 3, 'rf32rf32', 0, 3, 1, 2, 2, 1458092884, 1458092884);

-- --------------------------------------------------------

--
-- 表的结构 `lmy_resource`
--

CREATE TABLE IF NOT EXISTS `lmy_resource` (
  `id` int(11) unsigned NOT NULL,
  `url` varchar(200) NOT NULL COMMENT '网址自定义',
  `class` int(11) NOT NULL COMMENT '年级',
  `type` int(11) NOT NULL COMMENT '类型',
  `course` int(11) NOT NULL COMMENT '课程',
  `title` varchar(100) NOT NULL,
  `thumb` varchar(120) DEFAULT NULL,
  `keyword` text,
  `content` text NOT NULL,
  `author` varchar(30) DEFAULT '管理员',
  `status` int(11) DEFAULT '1' COMMENT '0=隐藏,1=显示,2=推荐',
  `views` int(11) DEFAULT '0' COMMENT '浏览次数',
  `downtime` int(11) DEFAULT NULL,
  `star` int(11) DEFAULT NULL,
  `pinglunnum` int(11) DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lmy_resource`
--

INSERT INTO `lmy_resource` (`id`, `url`, `class`, `type`, `course`, `title`, `thumb`, `keyword`, `content`, `author`, `status`, `views`, `downtime`, `star`, `pinglunnum`, `created_at`, `updated_at`) VALUES
(1, 'yuwen-123', 2, 2, 0, '三年级语文测试卷', '/upload/resource/2016031105424015214.png', '三年级语文测试卷，第一个测试的啦', '<p>fweeeeee</p><p>啊啊啊</p><p><br/></p><p>这个可以在编辑器里修改，像操作word一样简单</p><p><br/></p><p style="line-height: 16px;"><img style="vertical-align: middle; margin-right: 2px;" src="http://www.jianyangjiaoyu.com/backend/web/assets/7ec288b/dialogs/attachment/fileTypeImages/icon_txt.gif"/><a style="font-size:12px; color:#0066cc;" href="/upload/file/20160311/1457689515133549.txt" title="七牛.txt">七牛.txt</a></p><p><br/></p><p><br/></p><p><br/></p>', '张三', 1, 14, NULL, NULL, 0, 1457689360, 1458109746),
(2, 'yuwen-12346666', 0, 1, 0, '三年级语文测试卷33', '/upload/resource/2016031410272378567.png', 'fwef', '<p>fwefew</p>', 'fwef', 3, 46, NULL, NULL, 0, 1457922443, 1458116041);

-- --------------------------------------------------------

--
-- 表的结构 `lmy_singlepage`
--

CREATE TABLE IF NOT EXISTS `lmy_singlepage` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `keywords` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lmy_singlepage`
--

INSERT INTO `lmy_singlepage` (`id`, `title`, `content`, `keywords`, `description`, `created_at`, `updated_at`) VALUES
(1, '联系我们', '<div class="map"><img src="/statics/images/map.jpg" width="1075" height="450" alt=""/></div><div class="contact-font"><div class="font-01"><img src="/statics/images/contact-1.jpg" width="59" height="50" alt=""/>郑州市金水区经三路广电南路鑫苑金融广场银座1410</div><div class="font-01"><img src="/statics/images/contact-2.jpg" width="59" height="50" alt=""/>郑州市金水区经三路广电南路鑫苑金融广场银座1410</div><div class="font-01"><img src="/statics/images/contact-3.jpg" width="59" height="50" alt=""/>郑州市金水区经三路广电南路鑫苑金融广场银座1410</div><div class="font-01"><img src="/statics/images/contact-4.jpg" width="59" height="50" alt=""/>郑州市金水区经三路广电南路鑫苑金融广场银座1410</div></div>', '联系我们', '描述', 1450863572, 1457513687),
(2, '关于我们', '<p class="about-tit">简扬教育简介</p><div class="about-intro"><p><span style="color:#ff6600;">简扬教育</span>是一个专注于K12领域的C+2C在线教育平台。与全国百强名校万位名师独家签约，助力名师在线创建完整教学体系，通过“微课、资料、习题、检测、互动”等教学方法，提供一流的教学内容和服务。既\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 为学生搭建了一个可靠高效的优质平台，又满足了广大一线教师提升学术水平、体现自我价值的迫切需求。</p><p>C+2C是在线教育领域的专业用语，是新型的在线教育平台模式，实现内容消费者与内容生产者之间的信息交流。在这个模式中，教师向平台提供内容，学生在平台消费内容，但与电子商务类的C2C模式不同的是，\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 在线教育领域由于消费机会成本过高，需要对内容提供者增加一定的约束限制，从而约束劣质内容的生产，促进精品内容的生产，以保证内容消费者对平台的认可度及信任度，降低内容消费者的机会成本，促进平台\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 的良性发展。所以说C+2C模式是一套让教师和学生在线教学的诚信体系和科学规范的平台模式。</p></div><p class="about-tit">产品介绍</p><div class="about-intro-tit01">活泼生动的高清视频课程</div><div style="width:1200px; text-align:center;"><img src="/statics/images/about1.jpg" width="865" height="366" alt=""/></div><div class="about-intro-tit02">海量资料下载（包含1-9年级各版本）</div><div style="width: 1200px; text-align: center; padding-bottom: 80px; padding-top: 10px;"><img src="/statics/images/about2.jpg" width="799" height="221" alt=""/></div>', NULL, NULL, 1450933525, 1457513560);

-- --------------------------------------------------------

--
-- 表的结构 `lmy_slider`
--

CREATE TABLE IF NOT EXISTS `lmy_slider` (
  `id` int(10) unsigned NOT NULL,
  `place` int(11) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `intro` text,
  `url` varchar(100) DEFAULT NULL,
  `ord` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lmy_slider`
--

INSERT INTO `lmy_slider` (`id`, `place`, `thumb`, `intro`, `url`, `ord`, `updated_at`, `created_at`) VALUES
(1, 0, '/upload/slider/2015122305440617806.jpg', '', 'http://www.qq.com/', 0, 1450863846, 1450507151),
(2, 1, '/upload/slider/2016010711475623644.jpg', '', 'http://www.qq.com/', 0, 1452138476, 1452138476),
(3, 1, '/upload/slider/2016010711480680028.jpg', '', 'http://www.baidu.com/', 0, 1452138486, 1452138486),
(4, 0, '/upload/slider/2016030905423187163.jpg', '', 'http://www.qq.com/', 0, 1457516551, 1457516551),
(5, 0, '/upload/slider/2016030905424843428.jpg', '', 'http://www.baidu.com/', 0, 1457516568, 1457516568);

-- --------------------------------------------------------

--
-- 表的结构 `lmy_user`
--

CREATE TABLE IF NOT EXISTS `lmy_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `truename` varchar(250) DEFAULT NULL,
  `phone` varchar(250) NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(200) NOT NULL DEFAULT '/statics/images/img_126.jpg',
  `address` varchar(200) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lmy_user`
--

INSERT INTO `lmy_user` (`id`, `username`, `truename`, `phone`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `avatar`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, '张三', '张三丰', '13222222222', 'UR4HHHBtYwL6hKFE76pEGhF1kmwBrRvq', '$2y$13$MojYTGAnnxvxhUed6pNJCu/iZpgEEJGJYjJovRXHt5qT9Krgt.2tW', NULL, '66@qq.com', '/upload/userhead/u-1.jpg', NULL, 10, 1457418189, 1458029132),
(2, '小美', '张三丰', '13533315253', 'U-VoBZt0ysNyx17K8go4JCL-7FfESsmQ', '$2y$13$fINOOz9S.Y2LieoHtivMW.UbpGMArpKMxnlsSAuUGrAPZM.g041MS', '4AlCWOIng5VUYHtpCaxx9pN_FUFzJHvC_1457948760', '6232967@qq.com', '/upload/userhead/u-2.jpg', NULL, 10, 1457423360, 1458031984),
(3, '22', '张三丰', '13312312345', 'cZpuTFJ9kd6pgKAOFDRj2b3CtvgWC-Wt', '$2y$13$tLhOW.b/X.p428yhBdCkF.jcDRt8jb5HBeWWE0XL/dOEMM5HzLj4a', NULL, '222@qq.com', '/statics/images/img_126.jpg', NULL, 10, 1457948473, 1457948473),
(4, '123', '123', '13233333333', 'TPt34wf4P-u9x19oJU5gRRgnxamMalDe', '$2y$13$W2dFMytMbpw/94dzDO0tBOxSOeDVQTeBWQTgYyek/uS0Qvqvz5SPK', NULL, 'xx@qq.com', '/statics/images/img_126.jpg', NULL, 10, 1458009614, 1458009614),
(5, '哈哈123', '你好', '13533665555', 'bNpwXPXuKkF1BnKtH9gYossNlyTq6K5m', '$2y$13$UfSgWKYpxCMxMz4FiaaJj.uosLoY6zUeY8dV4uGsnlFmUeihmaMPC', NULL, '123@qq.com', '/statics/images/img_126.jpg', NULL, 10, 1458117063, 1458117063);

-- --------------------------------------------------------

--
-- 表的结构 `lmy_user_course`
--

CREATE TABLE IF NOT EXISTS `lmy_user_course` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lmy_user_course`
--

INSERT INTO `lmy_user_course` (`id`, `uid`, `type`, `rid`, `created_at`, `updated_at`) VALUES
(1, 2, 0, 3, 1458032857, 1458107577),
(2, 2, 2, 1, 1458032940, 1458043736),
(4, 2, 1, 2, 1458044379, 1458116041),
(5, 2, 0, 2, 1458045442, 1458116045),
(6, 2, 0, 1, 1458045460, 1458109365),
(7, 2, 0, 10, 1458100137, 1458100137),
(8, 2, 0, 7, 1458100142, 1458100142),
(9, 2, 0, 6, 1458100148, 1458100148),
(10, 1, 0, 1, 1458101133, 1458101133),
(11, 1, 0, 3, 1458101364, 1458101364),
(12, 1, 1, 2, 1458101398, 1458109741),
(13, 1, 2, 1, 1458109746, 1458109746),
(14, 5, 0, 1, 1458117085, 1458117085);

-- --------------------------------------------------------

--
-- 表的结构 `lmy_video`
--

CREATE TABLE IF NOT EXISTS `lmy_video` (
  `id` int(11) unsigned NOT NULL,
  `class` int(11) NOT NULL COMMENT '年级',
  `course` int(11) NOT NULL COMMENT '课程',
  `title` varchar(100) NOT NULL,
  `thumb` varchar(120) DEFAULT NULL,
  `keyword` text,
  `video` text,
  `content` text NOT NULL,
  `author` varchar(30) DEFAULT '管理员',
  `status` int(11) DEFAULT '1' COMMENT '0=隐藏,1=显示,2=推荐',
  `views` int(11) DEFAULT '0' COMMENT '浏览次数',
  `downtime` int(11) DEFAULT NULL,
  `star` int(11) DEFAULT NULL,
  `pinglunnum` int(11) DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `url` varchar(200) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lmy_video`
--

INSERT INTO `lmy_video` (`id`, `class`, `course`, `title`, `thumb`, `keyword`, `video`, `content`, `author`, `status`, `views`, `downtime`, `star`, `pinglunnum`, `created_at`, `updated_at`, `created_by`, `updated_by`, `url`) VALUES
(1, 1, 1, '视频测试', '7', '简介', 'http://7xrqfk.com1.z0.glb.clouddn.com/030002010056160E51A21A2FCEFF56390BF4D3-B479-FA41-01C0-BE344FFF9052.flv', '<p>测试 视频 从网站后台发布</p>', '', 3, 110, 0, NULL, 0, 1451378941, 1458117085, NULL, NULL, '33'),
(2, 0, 0, 'flv视频直接播放', '5', '', 'http://7xrqfk.com1.z0.glb.clouddn.com/0300020100569DF9808CAE011BA6A9A02FE091-9158-ADAD-633B-0628C92D6583.flv', '<p>反反复复反反复复反反复复反反复复反反复复发</p>', '官方', 1, 57, 0, NULL, 0, 1451445927, 1458116045, NULL, NULL, '232'),
(3, 0, 0, '视频标题', '1', '11', 'http://7xrqfk.com1.z0.glb.clouddn.com/22.flv', '<p><strong>666</strong></p>', '管理员', 1, 29, NULL, NULL, 0, 1457948282, 1458107616, NULL, NULL, '888'),
(4, 0, 0, '视频标题', NULL, 'scsfwe', 'http://7xrqfk.com1.z0.glb.clouddn.com/222.png', '<p>fwefew</p>', '管理员', 0, 0, NULL, NULL, 0, 1458099173, 1458099173, 2, NULL, '1458099173'),
(5, 0, 0, '视频标题', NULL, 'scsfwe', 'http://7xrqfk.com1.z0.glb.clouddn.com/222.png', '<p>fwefew</p>', '管理员', 0, 0, NULL, NULL, 0, 1458099178, 1458099178, 2, NULL, '1458099178'),
(6, 0, 0, '视频标题', '1', 'scsfwe', 'http://7xrqfk.com1.z0.glb.clouddn.com/222.png', '<p>fwefew</p>', '管理员', 0, 1, NULL, NULL, 0, 1458099276, 1458100148, 2, NULL, '1458099276'),
(7, 0, 0, '视频标题', '1', 'scsfwe', 'http://7xrqfk.com1.z0.glb.clouddn.com/222.png', '<p>fwefew</p>', '管理员', 0, 1, NULL, NULL, 0, 1458099296, 1458100142, 2, NULL, '1458099296'),
(8, 0, 0, 'hhh', '1', 'hhhh', 'http://7xrqfk.com1.z0.glb.clouddn.com/222.png', '<p>hhhhhhhhhhhhhh</p>', '管理员', 0, 0, NULL, NULL, 0, 1458099365, 1458099365, 2, NULL, '1458099365'),
(9, 0, 0, 'hhh', '1', 'hhhh', 'http://7xrqfk.com1.z0.glb.clouddn.com/222.png', '<p>hhhhhhhhhhhhhh</p>', '管理员', 0, 0, NULL, NULL, 0, 1458099435, 1458099435, 2, NULL, '1458099435'),
(10, 0, 0, 'hhh', '1', 'hhhh', 'http://7xrqfk.com1.z0.glb.clouddn.com/222.png', '<p>hhhhhhhhhhhhhh</p>', '管理员', 0, 1, NULL, NULL, 0, 1458099481, 1458100137, 2, NULL, '1458099481');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lmy_admin`
--
ALTER TABLE `lmy_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `lmy_ads`
--
ALTER TABLE `lmy_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lmy_album`
--
ALTER TABLE `lmy_album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lmy_album_image`
--
ALTER TABLE `lmy_album_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lmy_category`
--
ALTER TABLE `lmy_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lmy_company`
--
ALTER TABLE `lmy_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lmy_config`
--
ALTER TABLE `lmy_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lmy_feedback`
--
ALTER TABLE `lmy_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lmy_filedownload`
--
ALTER TABLE `lmy_filedownload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lmy_friendlink`
--
ALTER TABLE `lmy_friendlink`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lmy_goods`
--
ALTER TABLE `lmy_goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lmy_goods_pricelog`
--
ALTER TABLE `lmy_goods_pricelog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lmy_jianli`
--
ALTER TABLE `lmy_jianli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lmy_jobs`
--
ALTER TABLE `lmy_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lmy_kaoshi`
--
ALTER TABLE `lmy_kaoshi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lmy_news`
--
ALTER TABLE `lmy_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lmy_pinglun`
--
ALTER TABLE `lmy_pinglun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lmy_resource`
--
ALTER TABLE `lmy_resource`
  ADD PRIMARY KEY (`id`),
  ADD KEY `url` (`url`);

--
-- Indexes for table `lmy_singlepage`
--
ALTER TABLE `lmy_singlepage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lmy_slider`
--
ALTER TABLE `lmy_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lmy_user`
--
ALTER TABLE `lmy_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `lmy_user_course`
--
ALTER TABLE `lmy_user_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lmy_video`
--
ALTER TABLE `lmy_video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `url` (`url`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lmy_admin`
--
ALTER TABLE `lmy_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lmy_ads`
--
ALTER TABLE `lmy_ads`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lmy_album`
--
ALTER TABLE `lmy_album`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lmy_album_image`
--
ALTER TABLE `lmy_album_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lmy_category`
--
ALTER TABLE `lmy_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lmy_company`
--
ALTER TABLE `lmy_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lmy_config`
--
ALTER TABLE `lmy_config`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lmy_feedback`
--
ALTER TABLE `lmy_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lmy_filedownload`
--
ALTER TABLE `lmy_filedownload`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lmy_friendlink`
--
ALTER TABLE `lmy_friendlink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lmy_goods`
--
ALTER TABLE `lmy_goods`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lmy_goods_pricelog`
--
ALTER TABLE `lmy_goods_pricelog`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lmy_jianli`
--
ALTER TABLE `lmy_jianli`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lmy_jobs`
--
ALTER TABLE `lmy_jobs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lmy_kaoshi`
--
ALTER TABLE `lmy_kaoshi`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lmy_news`
--
ALTER TABLE `lmy_news`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lmy_pinglun`
--
ALTER TABLE `lmy_pinglun`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `lmy_resource`
--
ALTER TABLE `lmy_resource`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lmy_singlepage`
--
ALTER TABLE `lmy_singlepage`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lmy_slider`
--
ALTER TABLE `lmy_slider`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lmy_user`
--
ALTER TABLE `lmy_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lmy_user_course`
--
ALTER TABLE `lmy_user_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `lmy_video`
--
ALTER TABLE `lmy_video`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
