-- phpMyAdmin SQL Dump
-- version 4.3.12
-- http://www.phpmyadmin.net
--
-- Počítač: 88.86.117.154:3306
-- Vytvořeno: Pon 12. říj 2015, 13:04
-- Verze serveru: 5.5.37-MariaDB-log
-- Verze PHP: 5.6.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `tiary.wz.cz7069`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `comment_entry`
--

CREATE TABLE IF NOT EXISTS `comment_entry` (
  `id` int(9) NOT NULL,
  `entry` int(12) NOT NULL,
  `timestamp` int(20) NOT NULL,
  `author` int(12) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `comment_entry`
--

INSERT INTO `comment_entry` (`id`, `entry`, `timestamp`, `author`, `text`) VALUES
(1, 2, 1442490034, 1, 'MILUJI TĚ');

-- --------------------------------------------------------

--
-- Struktura tabulky `enroll`
--

CREATE TABLE IF NOT EXISTS `enroll` (
  `id` int(15) NOT NULL,
  `event` int(15) NOT NULL,
  `timestamp` int(20) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` varchar(5) NOT NULL,
  `club` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `category` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `enroll`
--

INSERT INTO `enroll` (`id`, `event`, `timestamp`, `gender`, `name`, `email`, `age`, `club`, `adress`, `category`, `message`) VALUES
(0, 1, 1441892634, 'm', '[Test]Martin Přibyl', '', '1993', 'Staré Město pod Landštejnem', '', '', ''),
(0, 1, 1441892677, 'f', '[Test]Klára Přibylová', '', '1983', 'Konkordia Děčín', '', '', 'Poběží jen krátkou trať'),
(0, 1, 1441892871, 'm', '[Test]Adam Přibyl', '', '1991', '', '', '', ''),
(0, 1, 1441892999, 'm', '[Test]Mobil', '', '2015', '', '', '', 'Psáno z mobilu.'),
(0, 2, 1441894394, 'm', 'Martin Pribyl', '', '1993', '', 'Decin', '', ''),
(0, 3, 1441913864, 'm', 'test 1', '', '1111', 'klub', '', '', ''),
(0, 3, 1441960106, 'm', '[Test]Martin Přibyl', '', '1993', '', '', '', ''),
(0, 3, 1442252146, 'm', 'Martin Pribyl', 'ununik@cjchiz.cj', '1993', 'ask decin', 'hkghogh. glgjjjgc', '', 'XkhcgifdGgyxGfxh'),
(0, 1, 1443708682, 'm', 'TEST', 'dasds@dsads.sda', '1666', 'saddsfsda sd', '', '', 'f asdf sd fs\r\nfsdaf sd sd asd afsd sd\r\na fsd\r\n fasd\r\n fasd'),
(0, 1, 1443708770, 'm', 'sdadsaf', 'fsdfsfs@das.fs', '1999', 'dsfs', '', '', 'fasfsad sdf f sd');

-- --------------------------------------------------------

--
-- Struktura tabulky `entry`
--

CREATE TABLE IF NOT EXISTS `entry` (
  `id` int(9) NOT NULL,
  `timestamp` int(20) NOT NULL,
  `author` int(12) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sport` int(9) NOT NULL,
  `text` text NOT NULL,
  `likes` int(12) NOT NULL DEFAULT '0',
  `dislikes` int(12) NOT NULL DEFAULT '0',
  `shared` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `entry`
--

INSERT INTO `entry` (`id`, `timestamp`, `author`, `title`, `sport`, `text`, `likes`, `dislikes`, `shared`) VALUES
(1, 1442151974, 2, 'vbnn', 2, '<p>hvcbh</p>', 0, 0, 1),
(2, 1442478565, 3, 'Nový článek', 3, '<p>ahoj</p>', 0, 0, 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(15) NOT NULL,
  `timestamp1` int(20) NOT NULL,
  `timestamp2` int(20) NOT NULL,
  `author` int(15) NOT NULL,
  `id_organisator` int(15) NOT NULL,
  `organisator` varchar(255) NOT NULL,
  `enroll` tinyint(1) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subscription` text NOT NULL,
  `place` text NOT NULL,
  `timestampOfCreation` int(20) NOT NULL,
  `access` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `event`
--

INSERT INTO `event` (`id`, `timestamp1`, `timestamp2`, `author`, `id_organisator`, `organisator`, `enroll`, `title`, `subscription`, `place`, `timestampOfCreation`, `access`, `type`) VALUES
(1, 1448060400, 0, 1, 1, '', 1, 'Běh na Chlum', 'Tradiční závod zdola nahoru a zpátky.', 'Hasičská zbrojnice v Děčíně - Křešicích', 1441892575, 'all', 'competition'),
(2, 1442095200, 0, 2, 1, 'test', 1, 'Test udalosti', 'Nějaká udalost', 'Tady', 1441893924, 'all', 'competition'),
(3, 1442181600, 0, 2, 1, '', 1, 'test', '', '', 1441913789, 'all', 'competition'),
(4, 1442354400, 0, 3, 1, '', 1, 'ysdsydysds', '', '', 1442248449, 'all', 'competition');

-- --------------------------------------------------------

--
-- Struktura tabulky `event_access`
--

CREATE TABLE IF NOT EXISTS `event_access` (
  `id` int(15) NOT NULL,
  `title` varchar(255) NOT NULL,
  `cz` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `event_access`
--

INSERT INTO `event_access` (`id`, `title`, `cz`) VALUES
(1, 'all', 'Všichni'),
(2, 'onlyRegistred', 'Jen registrovaní'),
(3, 'nobody', 'Nikdo');

-- --------------------------------------------------------

--
-- Struktura tabulky `event_category`
--

CREATE TABLE IF NOT EXISTS `event_category` (
  `id` int(15) NOT NULL,
  `gender` varchar(15) COLLATE utf8_czech_ci NOT NULL,
  `cz` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `age` int(5) NOT NULL,
  `sport` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_czech_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `event_category`
--

INSERT INTO `event_category` (`id`, `gender`, `cz`, `age`, `sport`, `title`) VALUES
(1, 'm', 'Žáci A', 10, 'biatlon', 'zaciA'),
(2, 'f', 'Žákyně A', 10, 'biatlon', 'zakyneA'),
(3, 'm', 'Žáci B', 12, 'biatlon', 'zaciB'),
(4, 'f', 'Žákaně B', 12, 'biatlon', 'zakyneB'),
(5, 'm', 'Žáci C', 14, 'biatlon', 'zaciC'),
(6, 'f', 'Žákyně C', 14, 'biatlon', 'zakyneC'),
(7, 'm', 'Dorostenci A', 16, 'biatlon', 'DCIa'),
(8, 'f', 'Dorostenky A', 16, 'biatlon', 'DKYa'),
(9, 'm', 'Dorostenci B', 18, 'biatlon', 'DCIb'),
(10, 'f', 'Dorostenky B', 18, 'biatlon', 'DKYb'),
(11, 'm', 'Junioři', 20, 'biatlon', 'JUN'),
(12, 'f', 'Juniorky', 20, 'biatlon', 'JKY'),
(13, 'm', 'Muži A', 22, 'biatlon', 'MA'),
(14, 'f', 'Ženy A', 22, 'biatlon', 'ZA'),
(15, 'm', 'Muži B', 36, 'biatlon', 'MB'),
(16, 'f', 'Ženy B', 31, 'biatlon', 'ZB'),
(17, 'm', 'Muži C', 46, 'biatlon', 'MC'),
(18, 'f', 'Ženy C', 41, 'biatlon', 'ZC');

-- --------------------------------------------------------

--
-- Struktura tabulky `event_enroll`
--

CREATE TABLE IF NOT EXISTS `event_enroll` (
  `author` int(15) NOT NULL,
  `event` int(15) NOT NULL,
  `starttimestamp` int(20) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `name` tinyint(1) NOT NULL,
  `email` tinyint(1) NOT NULL,
  `age` tinyint(1) NOT NULL,
  `club` tinyint(1) NOT NULL,
  `adress` tinyint(1) NOT NULL,
  `category` text NOT NULL,
  `id` int(15) NOT NULL,
  `email_author` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `event_enroll`
--

INSERT INTO `event_enroll` (`author`, `event`, `starttimestamp`, `gender`, `name`, `email`, `age`, `club`, `adress`, `category`, `id`, `email_author`) VALUES
(1, 1, 1441836000, 1, 1, 1, 1, 1, 0, '', 1, 'ununik@gmail.com'),
(2, 2, 1441894060, 1, 1, 1, 1, 1, 1, '', 2, ''),
(2, 3, 1441058400, 1, 1, 1, 1, 1, 1, '', 3, ''),
(3, 4, 1442268000, 1, 1, 1, 1, 1, 0, '', 4, '');

-- --------------------------------------------------------

--
-- Struktura tabulky `event_type`
--

CREATE TABLE IF NOT EXISTS `event_type` (
  `id` int(12) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `cz` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `event_type`
--

INSERT INTO `event_type` (`id`, `title`, `cz`) VALUES
(1, 'competition', 'Soutěž'),
(2, 'training', 'Trénink'),
(3, 'parttimejob', 'Brigáda'),
(4, 'meeting', 'Setkání');

-- --------------------------------------------------------

--
-- Struktura tabulky `intim_calendar`
--

CREATE TABLE IF NOT EXISTS `intim_calendar` (
  `id` int(15) NOT NULL,
  `user` int(15) NOT NULL,
  `timestamp` int(20) NOT NULL,
  `date` int(20) NOT NULL,
  `temperature` float NOT NULL,
  `menstruace` tinyint(1) NOT NULL,
  `blood` int(2) NOT NULL,
  `factors` text NOT NULL,
  `phlegm` text NOT NULL,
  `suppository` text NOT NULL,
  `comment` text NOT NULL,
  `ovulation` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `intim_calendar`
--

INSERT INTO `intim_calendar` (`id`, `user`, `timestamp`, `date`, `temperature`, `menstruace`, `blood`, `factors`, `phlegm`, `suppository`, `comment`, `ovulation`) VALUES
(1, 1, 1442301911, 1441231200, 36.1, 1, 0, '', '', '', '', 0),
(2, 2, 1442312873, 1442268000, 36.5, 0, 0, '', '', '', '', 0),
(3, 2, 1442312922, 1442354400, 36, 1, 1, '', '', '', '', 0),
(4, 3, 1442392441, 1439071200, 36.5, 1, 1, '', '', '', '', 0),
(5, 3, 1442392942, 1439157600, 36.4, 1, 4, '', '', '', '', 0),
(6, 3, 1442393058, 1439244000, 36.1, 1, 3, '', '', '', '', 0),
(7, 3, 1442393076, 1439330400, 36.2, 1, 2, '', '', '', '', 0),
(8, 3, 1442393099, 1439416800, 36.1, 1, 1, '', '', '', '', 0),
(9, 3, 1442393122, 1439503200, 36.4, 0, 0, '', '', '', '', 0),
(10, 3, 1442393137, 1439589600, 36.2, 0, 0, '', '', '', '', 0),
(11, 3, 1442393148, 1439676000, 36.5, 0, 0, '', '', '', '', 0),
(12, 3, 1442393164, 1439762400, 36.5, 0, 0, '', '', '', '', 0),
(13, 3, 1442393192, 1439848800, 36.4, 0, 0, '', '', '', '', 0),
(14, 3, 1442393214, 1439935200, 36.4, 0, 0, '', '', '', '', 0),
(15, 3, 1442393231, 1440021600, 36.2, 0, 0, '', '', '', '', 0),
(16, 3, 1442393244, 1440108000, 36.2, 0, 0, '', '', '', '', 1),
(17, 3, 1442393282, 1440194400, 36.4, 0, 0, '', '', '', '', 0),
(18, 3, 1442393367, 1440280800, 36.5, 0, 0, '', '', '', '', 0),
(19, 3, 1442393380, 1440367200, 36.5, 0, 0, '', '', '', '', 0),
(20, 3, 1442393467, 1440453600, 36.5, 0, 0, '', '', '', '', 0),
(21, 3, 1442393486, 1440540000, 36.5, 0, 0, '', '', '', '', 0),
(22, 1, 1442399155, 1441058400, 36.5, 1, 0, '', '', '', '', 0),
(23, 1, 1442399579, 1441404000, 37.9, 0, 0, '', '', '', '', 0),
(24, 1, 1442399613, 1443304800, 36.3, 1, 1, '', '', '', '', 0),
(25, 3, 1442399941, 1440626400, 36.4, 1, 0, '', '', '', '', 0),
(26, 3, 1442400321, 1440712800, 36.4, 1, 0, '', '', '', '', 0),
(27, 3, 1442400335, 1440799200, 36.7, 1, 0, '', '', '', '', 0),
(28, 3, 1442400353, 1440885600, 36.4, 1, 0, '', '', '', '', 0),
(29, 3, 1442400365, 1440972000, 36.7, 1, 0, '', '', '', '', 0),
(30, 3, 1442400395, 1441058400, 36.4, 1, 0, '', '', '', '', 0),
(31, 3, 1442400409, 1441144800, 36.4, 1, 0, '', '', '', '', 0),
(32, 3, 1442400434, 1441231200, 36.2, 1, 1, '', '', '', '', 0),
(33, 3, 1442400450, 1441317600, 36.2, 1, 4, '', '', '', '', 0),
(34, 3, 1442400477, 1441404000, 36.1, 1, 3, '', '', '', '', 0),
(35, 3, 1442400497, 1441490400, 36.1, 1, 2, '', '', '', '', 0),
(36, 3, 1442400516, 1441576800, 36.4, 1, 1, '', '', '', '', 0),
(37, 3, 1442400532, 1441663200, 36.5, 1, 0, '', '', '', '', 0),
(38, 3, 1442400552, 1441749600, 36, 1, 0, '', '', '', '', 0),
(39, 3, 1442400566, 1441836000, 36.2, 1, 0, '', '', '', '', 0),
(40, 3, 1442400577, 1441922400, 36.3, 1, 0, '', '', '', '', 0),
(41, 3, 1442400590, 1442008800, 36.1, 1, 0, '', '', '', '', 0),
(42, 3, 1442400605, 1442095200, 36.1, 1, 0, '', '', '', '', 0),
(43, 3, 1442400618, 1442181600, 36.4, 1, 0, '', '', '', '', 0),
(44, 3, 1442400630, 1442268000, 36.4, 0, 0, 'Vir', '', '', '', 1),
(45, 3, 1442400641, 1442354400, 36.5, 0, 0, 'Vir', '', '', '', 0),
(46, 1, 1442416478, 1442354400, 37.1, 1, 0, '', '', '', '', 0),
(47, 3, 1442478219, 1442440800, 36.6, 0, 0, 'Vir', '', '', '', 0),
(48, 1, 1442501012, 1441144800, 37.1, 1, 0, '', '', '', '', 0),
(49, 1, 1442501027, 1441317600, 37.5, 1, 0, '', '', '', '', 0),
(50, 1, 1442501038, 1441490400, 37.5, 1, 0, '', '', '', '', 0),
(51, 1, 1442501533, 1441836000, 36.2, 1, 0, 'dasfsdfdf', 'asdffasdfs', 'fsadfsddf', 'fasdfasdfs', 0),
(52, 1, 1442501745, 1441663200, 37.5, 1, 0, '', '', '', '', 0),
(53, 1, 1442501755, 1441922400, 0, 1, 0, '', '', '', '', 0),
(54, 1, 1442501795, 1441576800, 37.5, 1, 0, '', '', '', '', 0),
(55, 1, 1442502296, 1441749600, 37.9, 0, 0, '', '', '', '', 0),
(56, 3, 1442563426, 1442527200, 36.6, 0, 0, '', '', '', '', 0),
(57, 3, 1442563556, 1436911200, 36.4, 1, 4, '', '', '', '', 0),
(58, 3, 1442563596, 1436997600, 36.3, 1, 3, '', '', '', '', 0),
(59, 3, 1442563614, 1437084000, 36.2, 1, 2, '', '', '', '', 0),
(60, 3, 1442563635, 1437170400, 36.4, 1, 2, '', '', '', '', 0),
(61, 3, 1442563650, 1437256800, 36.2, 1, 1, '', '', '', '', 0),
(62, 3, 1442563684, 1437343200, 36.4, 0, 0, '', '', '', '', 0),
(63, 3, 1442563734, 1437429600, 36.3, 0, 0, '', '', '', '', 0),
(64, 3, 1442563744, 1437516000, 36.3, 0, 0, '', '', '', '', 0),
(65, 3, 1442563763, 1437602400, 36.2, 0, 0, '', '', '', '', 0),
(66, 1, 1442564086, 1442872800, 37.9, 1, 0, '', '', '', '', 0),
(67, 3, 1442564099, 1437688800, 36.3, 0, 0, '', '', '', '', 0),
(68, 3, 1442564119, 1437775200, 36.5, 0, 0, '', '', '', '', 0),
(69, 3, 1442564132, 1437861600, 36.2, 0, 0, '', '', '', '', 0),
(70, 3, 1442564143, 1437948000, 36.2, 0, 0, '', '', '', '', 0),
(71, 3, 1442564151, 1438034400, 36.4, 0, 0, '', '', '', '', 1),
(72, 3, 1442564158, 1438120800, 36.4, 0, 0, '', '', '', '', 0),
(73, 3, 1442564172, 1438207200, 36.6, 0, 0, '', '', '', '', 0),
(74, 3, 1442564177, 1438293600, 36.6, 0, 0, '', '', '', '', 0),
(75, 3, 1442564194, 1438380000, 36.7, 0, 0, '', '', '', '', 0),
(76, 3, 1442564205, 1438466400, 36.7, 0, 0, '', '', '', '', 0),
(77, 3, 1442564217, 1438552800, 36.6, 0, 0, '', '', '', '', 0),
(78, 3, 1442564224, 1438639200, 36.6, 0, 0, '', '', '', '', 0),
(79, 3, 1442564236, 1438725600, 36.7, 0, 0, '', '', '', '', 0),
(80, 3, 1442564245, 1438812000, 36.6, 0, 0, '', '', '', '', 0),
(81, 3, 1442564252, 1438898400, 36.6, 0, 0, '', '', '', '', 0),
(82, 3, 1442564265, 1438984800, 36.4, 0, 0, '', '', '', '', 0),
(83, 1, 1442584140, 1442268000, 0, 0, 0, '', '', '', '', 0),
(84, 1, 1442585041, 1442008800, 0, 0, 0, '', '', '', '', 0),
(85, 1, 1442585053, 1442095200, 0, 0, 0, '', '', '', '', 0),
(86, 1, 1442585081, 1442527200, 0, 0, 0, '', '', '', '', 1),
(87, 3, 1442685964, 1442613600, 36.4, 0, 0, '', '', '', '', 0),
(88, 3, 1442686631, 1435701600, 36.2, 0, 0, '', '', '', '', 1),
(89, 2, 1442693610, 1443045600, 0, 0, 0, 'Vir', '', 'Zz', '', 0),
(90, 3, 1442818355, 1442700000, 36.1, 0, 0, '', '', '', '', 0),
(91, 3, 1442818364, 1442786400, 36.6, 0, 0, '', '', '', '', 0),
(92, 1, 1442849212, 1443132000, 37, 1, 1, '', '', '', '', 0),
(93, 1, 1442849237, 1443218400, 0, 1, 2, '', '', '', '', 0),
(94, 1, 1442849256, 1443391200, 0, 1, 5, '', '', '', '', 0),
(95, 1, 1442849262, 1443477600, 0, 1, 1, '', '', '', '', 0),
(96, 1, 1442849276, 1428703200, 0, 1, 4, '', '', '', '', 0),
(97, 1, 1442849291, 1436565600, 0, 1, 3, '', '', '', '', 0),
(98, 1, 1442849297, 1440108000, 0, 1, 1, '', '', '', '', 0),
(99, 1, 1442849304, 1447282800, 0, 1, 1, '', '', '', '', 0),
(100, 1, 1442849307, 1431468000, 0, 0, 0, '', '', '', '', 0),
(101, 3, 1442902840, 1442872800, 36.5, 0, 0, '', '', '', '', 0),
(102, 2, 1442954851, 1442872800, 0, 0, 0, '', '', '', '', 1),
(103, 3, 1442996118, 1442959200, 36.6, 0, 0, '', '', '', '', 0),
(104, 3, 1443165022, 1443045600, 36.5, 0, 0, '', '', '', '', 0),
(105, 3, 1443165028, 1443132000, 36.6, 0, 0, '', '', '', '', 0),
(106, 3, 1443279795, 1443218400, 36.6, 0, 0, '', '', '', '', 0),
(107, 3, 1443381342, 1443304800, 36.5, 0, 0, '', '', '', '', 0),
(108, 3, 1443467719, 1443391200, 36.4, 1, 3, '', '', '', '', 0),
(109, 3, 1443604168, 1443477600, 36.3, 1, 4, '', '', '', '', 0),
(110, 3, 1443604219, 1443564000, 36.4, 1, 3, 'alkohol večer', '', '', '', 0),
(111, 3, 1443684472, 1443650400, 36.2, 1, 2, '', '', '', '', 0),
(112, 3, 1443770327, 1443736800, 0, 1, 1, '', '', '', '', 0),
(113, 3, 1443937085, 1443823200, 36.3, 0, 0, '', '', '', '', 0),
(114, 3, 1443937230, 1443909600, 36.2, 0, 0, '', '', '', '', 0),
(115, 3, 1444035856, 1443996000, 36.3, 0, 0, '', 'bílý řídký', '', '', 0),
(116, 3, 1444129675, 1444082400, 36.2, 0, 0, '', 'bílý řídký', '', '', 0),
(117, 3, 1444201515, 1444168800, 36.2, 0, 0, '', 'čirý tekutý', '', '', 0),
(118, 3, 1444375886, 1444255200, 36.3, 0, 0, '', 'čirý tekutý', '', '', 0),
(119, 3, 1444375918, 1444341600, 36.3, 0, 0, '', '', '', '', 0),
(120, 3, 1444376294, 1444428000, 36.1, 0, 0, '', 'B', '', '', 1),
(121, 3, 1444592408, 1444514400, 36.4, 0, 0, '', '', '', '', 0),
(122, 3, 1444633961, 1444600800, 36.2, 0, 0, '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `likesdislikes_entry`
--

CREATE TABLE IF NOT EXISTS `likesdislikes_entry` (
  `id` int(12) NOT NULL,
  `author` int(12) NOT NULL,
  `likes` tinyint(1) NOT NULL,
  `entry` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabulky `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `id` int(20) NOT NULL,
  `title` text NOT NULL,
  `seen` tinyint(1) NOT NULL,
  `timestamp` int(20) NOT NULL,
  `user` int(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `notice`
--

INSERT INTO `notice` (`id`, `title`, `seen`, `timestamp`, `user`) VALUES
(1, '<a href=''index.php?page=entry&id=2'' class=''notice''>Martin  Přibyl právě okomentoval článek Nový článek</a>', 1, 1442490034, 3);

-- --------------------------------------------------------

--
-- Struktura tabulky `profile_image`
--

CREATE TABLE IF NOT EXISTS `profile_image` (
  `id` int(20) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `timestamp` int(20) NOT NULL,
  `size` int(30) NOT NULL,
  `user` int(15) NOT NULL,
  `type` varchar(20) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `profile_image`
--

INSERT INTO `profile_image` (`id`, `name`, `timestamp`, `size`, `user`, `type`) VALUES
(1, '1.jpg', 1442328485, 1182736, 2, 'image/jpeg'),
(2, '2.jpg', 1442391100, 94865, 1, 'image/jpeg'),
(3, '3.jpg', 1442391104, 94865, 1, 'image/jpeg'),
(4, '4.jpg', 1442391929, 110139, 3, 'image/jpeg');

-- --------------------------------------------------------

--
-- Struktura tabulky `relationship`
--

CREATE TABLE IF NOT EXISTS `relationship` (
  `id` int(20) NOT NULL,
  `user1` int(12) NOT NULL,
  `user2` int(12) NOT NULL,
  `timestamp` int(20) NOT NULL,
  `friends` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `relationship`
--

INSERT INTO `relationship` (`id`, `user1`, `user2`, `timestamp`, `friends`) VALUES
(1, 1, 3, 1441977676, 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `sport`
--

CREATE TABLE IF NOT EXISTS `sport` (
  `id` int(12) NOT NULL,
  `cz` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `sport`
--

INSERT INTO `sport` (`id`, `cz`) VALUES
(1, 'cvjk'),
(2, 'hvivkcjvvv'),
(3, '');

-- --------------------------------------------------------

--
-- Struktura tabulky `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(15) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(80) NOT NULL,
  `email` varchar(255) NOT NULL,
  `timestamp` int(20) NOT NULL,
  `code` text NOT NULL,
  `validate` tinyint(1) DEFAULT '0',
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `club` text NOT NULL,
  `showMail` tinyint(1) NOT NULL,
  `tel` int(20) NOT NULL,
  `showTel` tinyint(1) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `about_me` text NOT NULL,
  `profile_image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `email`, `timestamp`, `code`, `validate`, `firstname`, `middlename`, `lastname`, `club`, `showMail`, `tel`, `showTel`, `gender`, `about_me`, `profile_image`) VALUES
(1, 'ununik', '3c55acdb9b57d665013a6d6195c32daf', 'ununik@gmail.fd', 1440146188, 'ununik@gmail.com-339', 1, 'Martin', '', 'Přibyl', 'Staré Město pod Landštejnem', 1, 724914904, 1, 'f', 'das dsj aofisjdo fosd \r\nfasdo fsdokp fopds \r\nfúsp akpsdf\r\n úsdpkf súdp\r\n úfskúsdfkpú ksfúskp f úsd\r\nfúpksd sdúfpk asúdpfs fs', '2.jpg'),
(2, '123456', 'e10adc3949ba59abbe56e057f20f883e', 'ununik@gmail.com', 1440595208, 'ununik@gmail.com-684', 1, 'Martin ', '', 'Přibyl ', 'TEST_;_ Test2', 1, 123456789, 1, 'f', 'Nějaký krátký text o mnfe.', '1.jpg'),
(3, 'clarinka', '81dc9bdb52d04dc20036dbd8313ed055', 'klarac@seznam.cz', 1441976792, 'klarac@seznam.cz-190', 1, 'Klára', '', 'Přibylová', '', 0, 0, 0, 'f', '', '4.jpg');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `comment_entry`
--
ALTER TABLE `comment_entry`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `entry`
--
ALTER TABLE `entry`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `event_access`
--
ALTER TABLE `event_access`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `event_category`
--
ALTER TABLE `event_category`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `event_enroll`
--
ALTER TABLE `event_enroll`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `event_type`
--
ALTER TABLE `event_type`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `intim_calendar`
--
ALTER TABLE `intim_calendar`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Klíče pro tabulku `likesdislikes_entry`
--
ALTER TABLE `likesdislikes_entry`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `profile_image`
--
ALTER TABLE `profile_image`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Klíče pro tabulku `relationship`
--
ALTER TABLE `relationship`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `comment_entry`
--
ALTER TABLE `comment_entry`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pro tabulku `entry`
--
ALTER TABLE `entry`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pro tabulku `event`
--
ALTER TABLE `event`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pro tabulku `event_access`
--
ALTER TABLE `event_access`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pro tabulku `event_category`
--
ALTER TABLE `event_category`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pro tabulku `event_enroll`
--
ALTER TABLE `event_enroll`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pro tabulku `event_type`
--
ALTER TABLE `event_type`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pro tabulku `intim_calendar`
--
ALTER TABLE `intim_calendar`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT pro tabulku `likesdislikes_entry`
--
ALTER TABLE `likesdislikes_entry`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pro tabulku `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pro tabulku `profile_image`
--
ALTER TABLE `profile_image`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pro tabulku `relationship`
--
ALTER TABLE `relationship`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pro tabulku `sport`
--
ALTER TABLE `sport`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pro tabulku `user`
--
ALTER TABLE `user`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
