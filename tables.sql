CREATE TABLE IF NOT EXISTS `comment_entry` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `entry` int(12) NOT NULL,
  `timestamp` int(20) NOT NULL,
  `author` int(12) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `entry` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `timestamp` int(20) NOT NULL,
  `author` int(12) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sport` int(9) NOT NULL,
  `text` text NOT NULL,
  `likes` int(12) NOT NULL DEFAULT '0',
  `dislikes` int(12) NOT NULL DEFAULT '0',
  `shared` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ;

CREATE TABLE IF NOT EXISTS `likesdislikes_entry` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `author` int(12) NOT NULL,
  `likes` tinyint(1) NOT NULL,
  `entry` int(12) NOT NULL,
  PRIMARY KEY (`id`)
);


CREATE TABLE IF NOT EXISTS `relationship` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user1` int(12) NOT NULL,
  `user2` int(12) NOT NULL,
  `timestamp` int(20) NOT NULL,
  `friends` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ;


CREATE TABLE IF NOT EXISTS `sport` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `cz` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);


CREATE TABLE IF NOT EXISTS `user` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`)
) ;

CREATE TABLE IF NOT EXISTS `notice` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `seen` tinyint(1) NOT NULL,
  `timestamp` int(20) NOT NULL,
  `user` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ;

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
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
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ;

CREATE TABLE IF NOT EXISTS `event_type` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `cz` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ;


INSERT INTO `event_type` (`id`, `title`, `cz`) VALUES
(1, 'competition', 'Soutěž'),
(2, 'training', 'Trénink'),
(3, 'parttimejob', 'Brigáda'),
(4, 'meeting', 'Setkání');


CREATE TABLE IF NOT EXISTS `event_access` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `cz` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);
INSERT INTO `event_access` (`id`, `title`, `cz`) VALUES
(1, 'all', 'Všichni'),
(2, 'onlyRegistred', 'Jen registrovaní'),
(3, 'nobody', 'Nikdo');


CREATE TABLE IF NOT EXISTS `event_category` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `gender` varchar(15) COLLATE utf8_czech_ci NOT NULL,
  `cz` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `age` int(5) NOT NULL,
  `sport` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=19 ;

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

CREATE TABLE IF NOT EXISTS `event_enroll` (
`id` int(15) NOT NULL,
  `author` int(15) NOT NULL,
  `event` int(15) NOT NULL,
  `starttimestamp` int(20) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `name` tinyint(1) NOT NULL,
  `email` tinyint(1) NOT NULL,
  `age` tinyint(1) NOT NULL,
  `club` tinyint(1) NOT NULL,
  `adress` tinyint(1) NOT NULL,
  `category` text NOT NULL
);

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
);

CREATE TABLE IF NOT EXISTS `intim_calendar` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `user` int(15) NOT NULL,
  `timestamp` int(20) NOT NULL,
  `date` int(20) NOT NULL,
  `temperature` float NOT NULL,
  `menstruace` tinyint(1) NOT NULL,
  `blood` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
);