-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-01-12 09:42:18
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jmx`
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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `place` int(11) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `title` varchar(200) DEFAULT NULL COMMENT '大标题',
  `intro` text,
  `url` varchar(100) DEFAULT NULL,
  `ord` int(11) DEFAULT '100' COMMENT '默认100，越小越靠前',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `lmy_category`
--

INSERT INTO `lmy_category` (`id`, `parent_id`, `name`, `brief`, `is_nav`, `banner`, `keywords`, `description`, `redirect_url`, `sort_order`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 0, '工程造价培训', '工程造价培训', 0, '', '', '', '', 50, 1, 1450849305, 1450849305, NULL, NULL),
(2, 0, '安装工程造价培训', '安装工程造价培训', 0, '', '安装工程造价培训', '安装工程造价培训', '', 50, 1, 1450849548, 1450849548, NULL, NULL),
(3, 1, '造价', '', 0, '', '', '', '', 50, 1, 1450850403, 1450850403, NULL, NULL),
(4, 3, '造价工程师', '', 0, '', '', '', '', 50, 1, 1450850429, 1450850429, NULL, NULL),
(5, 3, '造价员', '', 0, '', '', '造价员', '', 50, 1, 1450850449, 1450850449, NULL, NULL);

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
  `n1` varchar(100) DEFAULT NULL,
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
(1, '河南金犸象文化传媒有限公司', '宇斌教育', '宇斌教育', '郑东新区客文一街10号郑州图书馆', '15088888888', '666@qq.com', '豫ICP备案14000272', '统计代码', 1450854978, 1452583365, '', '', '', '', '', '', '', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `lmy_friendlink`
--

CREATE TABLE IF NOT EXISTS `lmy_friendlink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `thumb` varchar(200) DEFAULT NULL,
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

INSERT INTO `lmy_friendlink` (`id`, `name`, `thumb`, `link`, `isshow`, `ord`, `created_at`, `updated_at`) VALUES
(1, '百度', '/upload/friendlink/2016011203423744758.jpg', 'http://www.baidu.com/', 1, 100, 1450864489, 1452584557);

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
  `views` int(11) DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `lmy_news`
--

INSERT INTO `lmy_news` (`id`, `category_id`, `title`, `thumb`, `keyword`, `description`, `intro`, `content`, `author`, `status`, `views`, `created_at`, `updated_at`) VALUES
(1, 1, '新闻动态测试', NULL, NULL, NULL, '新闻内容简介：点点，40岁，为了保护动物而放弃了家庭。虽然得不到家人的支持，但他为了保护动物，仍然坚持了整整10年', '<p>点点，40岁，为了保护动物而放弃了家庭。虽然得不到家人的支持，但他为了保护动物，仍然坚持了整整10年。在这10年间，一共救助了150只狗和30只猫。而目前，点点家园的资金已严重不足。\r\n   为了培养孩子的爱心，关爱动物，并关注像点点一样有爱心的人。思睿博途组织孩子立项，为孩子们分配任务，组织研讨，最终确定用义卖手绘包的形式进行筹资，帮助点点家园。\r\n   希望您也可以献出一份爱心，帮助这些被遗弃的动物们。</p><p>点点，40岁，为了保护动物而放弃了家庭。虽然得不到家人的支持，但他为了保护动物，仍然坚持了整整10年。在这10年间，一共救助了150只狗和30只猫。而目前，点点家园的资金已严重不足。\r\n   为了培养孩子的爱心，关爱动物，并关注像点点一样有爱心的人。思睿博途组织孩子立项，为孩子们分配任务，组织研讨，最终确定用义卖手绘包的形式进行筹资，帮助点点家园。\r\n   希望您也可以献出一份爱心，帮助这些被遗弃的动物们。</p><p><img src="/statics/images/news1.jpg" alt=""/></p><p>点点，40岁，为了保护动物而放弃了家庭。虽然得不到家人的支持，但他为了保护动物，仍然坚持了整整10年。在这10年间，一共救助了150只狗和30只猫。而目前，点点家园的资金已严重不足。\r\n   为了培养孩子的爱心，关爱动物，并关注像点点一样有爱心的人。思睿博途组织孩子立项，为孩子们分配任务，组织研讨，最终确定用义卖手绘包的形式进行筹资，帮助点点家园。\r\n   希望您也可以献出一份爱心，帮助这些被遗弃的动物们。</p><p>点点，40岁，为了保护动物而放弃了家庭。虽然得不到家人的支持，但他为了保护动物，仍然坚持了整整10年。在这10年间，一共救助了150只狗和30只猫。而目前，点点家园的资金已严重不足。\r\n   为了培养孩子的爱心，关爱动物，并关注像点点一样有爱心的人。思睿博途组织孩子立项，为孩子们分配任务，组织研讨，最终确定用义卖手绘包的形式进行筹资，帮助点点家园。\r\n   希望您也可以献出一份爱心，帮助这些被遗弃的动物们。</p>', '管理员', 1, 26, 1450862828, 1452663618),
(2, 1, '学员合影', NULL, NULL, NULL, '', '<p><img src="/upload/images/20151223/1450863878523696.jpg" title="1450863878523696.jpg" alt="22.JPG"/></p>', '', 1, 2, 1450863904, 1452663636);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `lmy_singlepage`
--

INSERT INTO `lmy_singlepage` (`id`, `title`, `content`, `keywords`, `description`, `created_at`, `updated_at`) VALUES
(1, '关于我们', '<p>111</p>', NULL, NULL, 1452582682, 1452582682),
(2, '联系我们', '<p>鹅鹅鹅</p>', NULL, NULL, 1452582690, 1452582690),
(3, '招贤纳士', '<p>哦</p>', NULL, NULL, 1452582715, 1452582715);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `lmy_slider`
--

INSERT INTO `lmy_slider` (`id`, `place`, `thumb`, `intro`, `url`, `ord`, `updated_at`, `created_at`) VALUES
(1, 0, '/upload/slider/2015122305440617806.jpg', '', 'http://www.qq.com/', 0, 1450863846, 1450507151);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE IF NOT EXISTS `lmy_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `item` int(11) DEFAULT NULL COMMENT '1=服务，2=案例',
  `item_id` int(11) NOT NULL COMMENT '具体到项目的ID',
  `filename` varchar(128) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT '50',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;