-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-04-23 10:53:31
-- 服务器版本： 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `姓名` varchar(20) CHARACTER SET utf8 NOT NULL,
  `性别` varchar(1) CHARACTER SET utf8 NOT NULL,
  `学号` varchar(11) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `姓名`, `性别`, `学号`) VALUES
(1, 'lyb', '123456', '李亚斌', '男', '13401180126'),
(2, 'cqf', '123456', '陈钱锋', '男', '13401180125');

-- --------------------------------------------------------

--
-- 表的结构 `books`
--

CREATE TABLE `books` (
  `bookid` varchar(20) NOT NULL,
  `bookname` varchar(30) NOT NULL,
  `bookstyleno` varchar(30) NOT NULL,
  `borrowednum` varchar(30) DEFAULT NULL,
  `num` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `books`
--

INSERT INTO `books` (`bookid`, `bookname`, `bookstyleno`, `borrowednum`, `num`) VALUES
('101', '斗破苍穹', '1', '0', '12'),
('601', '仙逆', '6', '0', '12');

-- --------------------------------------------------------

--
-- 表的结构 `book_style`
--

CREATE TABLE `book_style` (
  `bookstyleno` int(9) NOT NULL,
  `bookstyle` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `book_style`
--

INSERT INTO `book_style` (`bookstyleno`, `bookstyle`) VALUES
(1, '修真小说'),
(2, '穿越小说'),
(3, '恐怖小说'),
(4, '都市小说'),
(5, '科幻小说'),
(6, '仙侠小说'),
(7, '言情小说');

-- --------------------------------------------------------

--
-- 表的结构 `borrow_record`
--

CREATE TABLE `borrow_record` (
  `bookname` varchar(20) NOT NULL,
  `readerid` varchar(11) NOT NULL,
  `readername` varchar(20) NOT NULL,
  `borrowtime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `return_record`
--

CREATE TABLE `return_record` (
  `bookname` varchar(20) NOT NULL,
  `readerid` varchar(11) NOT NULL,
  `readername` varchar(20) NOT NULL,
  `returntime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `return_record`
--

INSERT INTO `return_record` (`bookname`, `readerid`, `readername`, `returntime`) VALUES
('仙逆', '13401180127', '裘群辉', '2017-04-23 16:10:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `book_style`
--
ALTER TABLE `book_style`
  ADD PRIMARY KEY (`bookstyleno`),
  ADD UNIQUE KEY `bookstyleno_2` (`bookstyleno`),
  ADD KEY `bookstyleno` (`bookstyleno`);

--
-- Indexes for table `borrow_record`
--
ALTER TABLE `borrow_record`
  ADD PRIMARY KEY (`readerid`);

--
-- Indexes for table `return_record`
--
ALTER TABLE `return_record`
  ADD PRIMARY KEY (`readerid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
