-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2021-02-07 17:01:11
-- 服务器版本： 5.5.57-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev_s1107_com`
--

-- --------------------------------------------------------

--
-- 表的结构 `sp_lang`
--

CREATE TABLE `sp_lang` (
                           `id` int(11) UNSIGNED NOT NULL,
                           `lang_name` varchar(64) CHARACTER SET utf8mb4 NOT NULL COMMENT '语言名称',
                           `lang_code` varchar(32) CHARACTER SET utf8mb4 NOT NULL COMMENT '语言代码',
                           `is_default` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否默认语言 0-否 1-是',
                           `remark` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT '备注',
                           `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='语言表' ROW_FORMAT=COMPACT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--page--
-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2021-02-07 17:02:05
-- 服务器版本： 5.5.57-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev_s1107_com`
--

-- --------------------------------------------------------

--
-- 表的结构 `sp_lang_key`
--

CREATE TABLE `sp_lang_key` (
                               `id` int(10) UNSIGNED NOT NULL,
                               `key_name` varchar(1024) CHARACTER SET utf8mb4 NOT NULL COMMENT 'lang键名',
                               `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
                               `remark` varchar(255) NOT NULL COMMENT '备注'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Lang键名存储表' ROW_FORMAT=COMPACT;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sp_lang_key`
--
ALTER TABLE `sp_lang_key`
    ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `sp_lang_key`
--
ALTER TABLE `sp_lang_key`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--page--

-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2021-02-07 17:02:45
-- 服务器版本： 5.5.57-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev_s1107_com`
--

-- --------------------------------------------------------

--
-- 表的结构 `sp_lang_value`
--

CREATE TABLE `sp_lang_value` (
                                 `id` int(11) UNSIGNED NOT NULL,
                                 `lang_id` int(11) NOT NULL COMMENT 'lang表id',
                                 `value_name` text CHARACTER SET utf8mb4 NOT NULL COMMENT '翻译后的文字值',
                                 `lang_key_id` int(11) NOT NULL COMMENT 'lang_key表id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Lang翻译值存储表' ROW_FORMAT=COMPACT;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sp_lang_value`
--
ALTER TABLE `sp_lang_value`
    ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `sp_lang_value`
--
ALTER TABLE `sp_lang_value`
    MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
