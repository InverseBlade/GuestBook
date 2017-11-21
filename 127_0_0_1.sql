-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-11-21 04:53:00
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- 表的结构 `blog_comment`
--

CREATE TABLE `blog_comment` (
  `id` int(11) NOT NULL COMMENT '主键',
  `author_id` int(10) DEFAULT NULL COMMENT '评论者uid',
  `p_nickname` varchar(25) DEFAULT NULL COMMENT '评论者昵称',
  `message_id` int(10) DEFAULT NULL COMMENT '父级留言id',
  `is_show` tinyint(1) DEFAULT '1' COMMENT '是否显示',
  `content` varchar(255) DEFAULT NULL COMMENT '内容',
  `create_time` int(11) DEFAULT NULL COMMENT '评论时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `blog_comment`
--

INSERT INTO `blog_comment` (`id`, `author_id`, `p_nickname`, `message_id`, `is_show`, `content`, `create_time`) VALUES
(21, 10027, 'Catalan', 32, 1, '在线等，急！~~~', 1511102612),
(25, 10024, '管理员', 32, 1, '你这智商算是没救了，呵', 1511102938);

-- --------------------------------------------------------

--
-- 表的结构 `blog_message`
--

CREATE TABLE `blog_message` (
  `id` int(11) NOT NULL,
  `author` int(5) DEFAULT NULL,
  `content` mediumtext,
  `praise` int(5) DEFAULT '0',
  `hate` int(5) DEFAULT '0',
  `is_show` tinyint(1) DEFAULT '1',
  `is_top` tinyint(1) DEFAULT '0',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `blog_message`
--

INSERT INTO `blog_message` (`id`, `author`, `content`, `praise`, `hate`, `is_show`, `is_top`, `create_time`, `update_time`) VALUES
(32, 10027, '补偿法测电阻实验求教\r\n只看楼主\r\n收藏\r\n回复\r\n\r\n法尔斯考特\r\n独钓龙韵4\r\n求问这个相对不确定度计算公式中的Ui和Ii怎么取值？ 还有下面的Ri怎么取', 0, 0, 1, 0, 1511102587, 1511102587),
(30, 10027, 'aaaaaaaaaa，要死了！！！！！', 0, 0, 1, 0, 1511076597, 1511076597),
(28, 10027, '啊啊啊啊啊啊啊，我居然不是管理员！！', 0, 0, 1, 0, 1511057644, 1511057644);

-- --------------------------------------------------------

--
-- 表的结构 `blog_user`
--

CREATE TABLE `blog_user` (
  `id` int(11) NOT NULL COMMENT '主键',
  `uid` int(5) NOT NULL DEFAULT '0' COMMENT '站内id',
  `is_admin` tinyint(1) DEFAULT '0' COMMENT '是否管理员',
  `user_name` varchar(15) DEFAULT NULL COMMENT '用户名',
  `nickname` varchar(25) DEFAULT NULL COMMENT '昵称',
  `password` char(32) DEFAULT NULL COMMENT '密码',
  `img_id` tinyint(2) NOT NULL DEFAULT '0',
  `create_time` int(11) DEFAULT NULL COMMENT '用户创建时间',
  `email` varchar(100) DEFAULT NULL COMMENT '电子邮件',
  `qq` varchar(15) DEFAULT NULL COMMENT 'QQ号',
  `hometown` varchar(30) DEFAULT NULL COMMENT '家乡',
  `signature` varchar(255) DEFAULT NULL COMMENT '个性签名'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `blog_user`
--

INSERT INTO `blog_user` (`id`, `uid`, `is_admin`, `user_name`, `nickname`, `password`, `img_id`, `create_time`, `email`, `qq`, `hometown`, `signature`) VALUES
(24, 10024, 1, 'admin', '管理员', '0192023a7bbd73250516f069df18b500', 1, 1510823328, '', '', '', '管理员管理员管理员。'),
(29, 10029, 0, 'mlxg', '麻辣香锅', '74beb09e5d02e74d24b68642a3d94b45', 0, 1511102452, 'mlxg@gg.com', '', '北京', '放开那口锅，让我来！！！'),
(30, 10030, 0, 'shawu', '莎雾', 'c0f5cf549089ce1d01bbd9edc21bc5b0', 2, 1511102728, 'ssw@twiter.com', '', '', '妹纸一枚~~~'),
(28, 10028, 0, 'thicksky', 'thicksky', 'f72a923d1c79b8aa8d5d88b2dd55e621', 0, 1511058546, '', '', '', 'asdfasdfasdsfasdf'),
(27, 10027, 0, 'zhangzewei', 'Catalan', 'f72a923d1c79b8aa8d5d88b2dd55e621', 1, 1511057103, 'thicksky@126.com', '844264935', '武汉理工大学', '哈哈哈哈哈！');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_message`
--
ALTER TABLE `blog_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_user`
--
ALTER TABLE `blog_user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=26;
--
-- 使用表AUTO_INCREMENT `blog_message`
--
ALTER TABLE `blog_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- 使用表AUTO_INCREMENT `blog_user`
--
ALTER TABLE `blog_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
