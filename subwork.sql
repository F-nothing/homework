-- phpMyAdmin SQL Dump
-- version 4.0.10.11
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2019-06-10 10:39:38
-- 服务器版本: 5.7.17-log
-- PHP 版本: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `subwork`
--

-- --------------------------------------------------------

--
-- 表的结构 `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `profess` varchar(16) NOT NULL COMMENT '专业',
  `class` int(2) NOT NULL COMMENT '班级',
  `pepnum` int(6) NOT NULL COMMENT '总人数',
  PRIMARY KEY (`profess`,`class`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `class`
--

INSERT INTO `class` (`profess`, `class`, `pepnum`) VALUES
('soft', 1, 60),
('soft', 2, 59),
('xx', 1, 47),
('xx', 2, 59);

-- --------------------------------------------------------

--
-- 表的结构 `filemation`
--

CREATE TABLE IF NOT EXISTS `filemation` (
  `object` varchar(20) NOT NULL COMMENT '科目',
  `filename` varchar(20) NOT NULL COMMENT '文件名',
  `filetype` varchar(10) NOT NULL COMMENT '文件类型',
  `filesize` varchar(20) NOT NULL COMMENT '文件大小',
  `filetmpname` varchar(60) NOT NULL COMMENT '文件路径',
  `profess` varchar(8) NOT NULL COMMENT '职业',
  `note` varchar(40) NOT NULL COMMENT '备注',
  `date` varchar(20) NOT NULL COMMENT '日期',
  `name` varchar(16) NOT NULL COMMENT '姓名',
  PRIMARY KEY (`object`,`filename`,`filetmpname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `filemation`
--

INSERT INTO `filemation` (`object`, `filename`, `filetype`, `filesize`, `filetmpname`, `profess`, `note`, `date`, `name`) VALUES
('', '', '', '0 kB', '../upload/teacher/', '', '', '', ''),
('', 'hyd.png', 'image/png', '215.5771484375 kB', '../upload/student/class1/hyd.png', '学生', '', '2019-06-09 15:07:30', '吴煜翔'),
('', 'IMG_4832.JPG', 'image/jpeg', '1817.5 kB', '../upload/student/class1/IMG_4832.JPG', '学生', '', '2019-06-08 23:41:04', '吴煜翔'),
('', 'IMG_4836.JPG', 'image/jpeg', '2301.5244140625 kB', '../upload/student/software/class1/first/IMG_4836.JPG', '学生', '', '2019-06-09 15:10:51', '吴煜翔'),
('', 'IMG_4836.JPG', 'image/jpeg', '2301.5244140625 kB', '../upload/teacher/IMG_4836.JPG', '', '', '', ''),
('', 'IMG_4836.JPG', 'image/jpeg', '2301.5244140625 kB', '../uploadIMG_4836.JPG', '', '', '', ''),
('', 'IMG_4837.JPG', 'image/jpeg', '2265.94140625 kB', '../upload/student/class1/IMG_4837.JPG', '学生', '', '', ''),
('', 'IMG_4843.JPG', 'image/jpeg', '180.0849609375 kB', '../upload/student/class1/IMG_4843.JPG', '学生', '', '2019-06-09 15:08:36', '吴煜翔'),
('', 'IMG_5756.JPG', 'image/jpeg', '2180.78515625 kB', '../uploadIMG_5756.JPG', '', '', '', ''),
('', 'IMG_6007.JPG', 'image/jpeg', '1983.5234375 kB', '../upload/student/class1/IMG_6007.JPG', '学生', '大大大大大大', '', ''),
('', 'no37.store_cert.png', 'image/png', '170.0439453125 kB', '../upload/student/class1/no37.store_cert.png', '', '', '', ''),
('', 'no37.store_cert.png', 'image/png', '170.0439453125 kB', '../upload/teacher/no37.store_cert.png', '', '', '', ''),
('', '报名照片 (2).jpg', 'image/jpeg', '83.6630859375 kB', '../upload/student/class1/报名照片 (2).jpg', '学生', '', '', ''),
('axiba', 'Show.jpg', 'image/jpeg', '11.53125 kB', '../upload/student/Show.jpg', '', '', '', ''),
('dasasd', '', '', '0 kB', '../upload/teacher/', '', '', '', ''),
('wasdad', '报名照片 (2).jpg', 'image/jpeg', '83.6630859375 kB', '../upload/teacher/报名照片 (2).jpg', '', '', '', ''),
('按时发放', 'hyd.png', 'image/png', '215.5771484375 kB', '../uploadhyd.png', '', '', '', ''),
('按时发放', 'IMG_3729.JPG', 'image/jpeg', '143.2890625 kB', '../uploadIMG_3729.JPG', '', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` varchar(13) NOT NULL COMMENT '学生账号',
  `pword` varchar(50) NOT NULL COMMENT '学生密码',
  `name` varchar(16) DEFAULT NULL COMMENT '学生姓名',
  `sex` varchar(2) DEFAULT NULL COMMENT '学生性别',
  `classnum` int(4) NOT NULL COMMENT '班级号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`id`, `pword`, `name`, `sex`, `classnum`) VALUES
('1234567', 'fcea920f7412b5da7be0cf42b8c93759', 'aaaa', NULL, 0),
('12345678', '25d55ad283aa400af464c76d713c07ad', 'ssss', NULL, 0),
('123456aaa', '93a9e5bb1d598a453606e890f72bd393', 'vvvv', NULL, 0),
('asd1234', '1cd8e7658bb6db26fed1ce17940b7dbd', 'qqqq', NULL, 0),
('asdfgzzz', 'ffabafc4b934e0f1855256609bd7d2c4', 'eeee', NULL, 0),
('asdzxcqwe', '2bb409b4db9f8822237f5bc63e2d1506', 'bbbb', NULL, 0),
('lkj12334', '3a5a7cc71a9bc60f75ec57e86323f620', 'dddd', NULL, 0),
('lkj1234', 'a149e36d6f98c2811b1be834868e11fc', 'ffff', NULL, 0),
('qqqqqqq1', 'd7ebe303f37f8a532b527c23890db2a2', 'gggg', NULL, 0),
('wyx123', '1e55dbf412cb74d5e2c21fb6452408c7', '吴煜翔', NULL, 0);

-- --------------------------------------------------------

--
-- 表的结构 `subwork`
--

CREATE TABLE IF NOT EXISTS `subwork` (
  `name` char(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '姓名',
  `object` char(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '科目',
  `content` char(160) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '内容',
  `teachid` char(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '教师ID',
  `date` varchar(20) CHARACTER SET utf8mb4 NOT NULL COMMENT '时间',
  `times` char(4) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '次数',
  PRIMARY KEY (`teachid`,`date`,`times`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `subwork`
--

INSERT INTO `subwork` (`name`, `object`, `content`, `teachid`, `date`, `times`) VALUES
('', '', '', '', '2019-04-14 16:30:14', '第五次'),
('萨达', '就会付款计划', '是东方航空大国空军', '1431', '2019-04-17 16:40:51', '第一次'),
('ADV', 'ASD', 'ASDSG', '2134', '2019-04-15 23:26:42', '第一次'),
('阿西吧', '囧啊睡觉了', '回复可见回馈积分回馈', '314324', '2019-04-12 16:36:06', ''),
('34发顺丰', '发生的', '士大夫山豆根和', '3224', '2019-04-13 18:41:25', '第三次'),
('撒旦撒', '发动机肯定会', '加快速度发货即可收到附件客户的空间', '3321', '2019-04-17 16:38:32', '第一次'),
('root', '按时发放', '啊士大夫感到十分的是', '344353', '2019-04-11 23:03:30', ''),
('撒发达', '第三方', '官方的华人网上', '43', '2019-04-13 13:19:24', '第一次'),
('是', '是', '仨', '555', '2019-04-11 20:01:46', ''),
('文件夹', '世界航空飞机啊', '交换空间是否可接受的快捷导航', '56423', '2019-04-12 16:24:57', ''),
('6678', '678687', '6786786876786786', '6666', '2019-04-17 14:58:59', '第六次'),
('萨达', '和关怀和', '结果符合符合', '67564', '2019-04-11 20:05:57', ''),
('奥斯卡', '阿富汗', '开发环境空格和数据库的回复', '9999', '2019-04-17 14:52:29', '第三次'),
('asd', 'asdsa', 'asd', 'asd', 'asd', 'asd'),
('tom', 'saf', 'sadfa', 'asdaf', '', ''),
('hhh', 'hhh', 'hhhhhh', 'hhh', '', ''),
('1111', '1111', '1asd', 'shhsxcv', 'gergf', 'ss'),
('吴煜翔', 'math', '吴煜翔吴煜翔吴煜翔吴煜翔吴煜翔吴煜翔', 'wyx123', '2019-05-31 周五', '1'),
('吴煜翔', 'asd', 'asdsa', 'wyx123', '2019-06-01 12:45:43', ''),
('吴煜翔', '', 'asdafgs', 'wyx123', '2019-06-05 11:15:05', ''),
('吴煜翔', '', 'r43trgfdhj53', 'wyx123', '2019-06-08 10:47:15', ''),
('吴煜翔', '', 'hvjd00', 'wyx123', '2019-06-08 10:47:23', ''),
('吴煜翔', '', 'asdafgs', 'wyx123', '2019-06-09 17:04:26', ''),
('吴煜翔', '', 'r43trgfdhj53', 'wyx123', '2019-06-09 17:09:03', '');

-- --------------------------------------------------------

--
-- 表的结构 `suploadfile`
--

CREATE TABLE IF NOT EXISTS `suploadfile` (
  `object` varchar(20) NOT NULL COMMENT '科目',
  `name` varchar(16) NOT NULL COMMENT '学生姓名',
  `note` varchar(40) NOT NULL COMMENT '课件备注',
  `date` varchar(20) NOT NULL COMMENT '时间',
  `times` varchar(4) NOT NULL COMMENT '次数'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `suploadfile`
--

INSERT INTO `suploadfile` (`object`, `name`, `note`, `date`, `times`) VALUES
('按时发放', '吴煜翔', '啊实打实的', '2019-06-01 23:51:29', '1'),
('', '吴煜翔', '', '2019-06-02 18:57:09', ''),
('', '吴煜翔', '', '2019-06-02 18:57:21', ''),
('', '吴煜翔', '', '2019-06-02 19:07:53', ''),
('', '吴煜翔', '', '2019-06-02 19:08:10', ''),
('dasasd', '吴煜翔', 'asdasd', '2019-06-02 19:08:56', '1'),
('', '吴煜翔', '', '2019-06-02 19:09:16', ''),
('', '吴煜翔', '', '2019-06-02 19:09:25', ''),
('wasdad', '吴煜翔', 'asdasd', '2019-06-02 19:10:30', '2'),
('axiba', '吴煜翔', 'axiba', '2019-06-02 19:21:18', '4'),
('', '吴煜翔', '', '2019-06-05 10:29:22', ''),
('', '吴煜翔', '', '2019-06-08 22:00:13', ''),
('', '吴煜翔', '', '2019-06-08 22:05:18', ''),
('', '吴煜翔', '大大大大大大', '2019-06-08 22:05:32', ''),
('', '吴煜翔', '', '2019-06-08 23:39:01', ''),
('', '吴煜翔', '', '2019-06-08 23:39:30', ''),
('', '吴煜翔', '', '2019-06-08 23:41:04', ''),
('', '吴煜翔', '', '2019-06-09 15:07:30', ''),
('', '吴煜翔', '', '2019-06-09 15:08:36', ''),
('', '吴煜翔', '', '2019-06-09 15:10:51', '');

-- --------------------------------------------------------

--
-- 表的结构 `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `id` varchar(13) NOT NULL COMMENT '教师账号',
  `pword` varchar(50) NOT NULL COMMENT '教师密码',
  `object` varchar(20) DEFAULT NULL COMMENT '科目',
  `name` varchar(16) DEFAULT NULL COMMENT '教师姓名',
  `sex` varchar(2) DEFAULT NULL COMMENT '教师性别',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `teacher`
--

INSERT INTO `teacher` (`id`, `pword`, `object`, `name`, `sex`) VALUES
('00001111', '55722118e8b7648e5385b65528a77712', NULL, 'qqq', NULL),
('12131231245', '534d4c6af182f8c8edb640931f986b8f', NULL, 'www', NULL),
('123456', '1234561', '数学', '张希吧', '男'),
('1234567', 'fcea920f7412b5da7be0cf42b8c93759', NULL, 'eee', NULL),
('12345678', '25d55ad283aa400af464c76d713c07ad', NULL, 'rrr', NULL),
('123aaaaaaa', '1ac8699706e87b0470e92f35db49aa85', NULL, 'tom', NULL),
('asdf123', '6572bdaff799084b973320f43f09b363', NULL, 'ttt', NULL),
('kkkkkkkkk11', 'd2af59a919366d778e95c7b75d83d5c7', NULL, 'yyy', NULL),
('sssssaaaa', '2ec1cfb17cf5840c07c3cdcc2ca1d62b', NULL, 'uuu', NULL),
('wyx123', '1e55dbf412cb74d5e2c21fb6452408c7', NULL, '吴煜翔', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `tuploadfile`
--

CREATE TABLE IF NOT EXISTS `tuploadfile` (
  `object` varchar(20) NOT NULL COMMENT '科目',
  `name` varchar(16) NOT NULL COMMENT '教师姓名',
  `note` varchar(40) NOT NULL COMMENT '课件备注',
  `date` varchar(20) NOT NULL COMMENT '时间',
  `times` varchar(4) NOT NULL COMMENT '次数'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `tuploadfile`
--

INSERT INTO `tuploadfile` (`object`, `name`, `note`, `date`, `times`) VALUES
('按时发放', '吴煜翔', '啊实打实的', '2019-06-01 23:51:29', '1'),
('', '吴煜翔', '', '2019-06-02 18:57:09', ''),
('', '吴煜翔', '', '2019-06-02 18:57:21', ''),
('', '吴煜翔', '', '2019-06-02 19:07:53', ''),
('', '吴煜翔', '', '2019-06-02 19:08:10', ''),
('dasasd', '吴煜翔', 'asdasd', '2019-06-02 19:08:56', '1'),
('', '吴煜翔', '', '2019-06-02 19:09:16', ''),
('', '吴煜翔', '', '2019-06-02 19:09:25', ''),
('wasdad', '吴煜翔', 'asdasd', '2019-06-02 19:10:30', '2'),
('', '吴煜翔', '', '2019-06-05 10:28:34', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
