CREATE TABLE IF NOT EXISTS `comment_entry` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `entry` int(12) NOT NULL,
  `timestamp` int(20) NOT NULL,
  `author` int(12) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
)

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
)

CREATE TABLE IF NOT EXISTS `likesdislikes_entry` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `author` int(12) NOT NULL,
  `likes` tinyint(1) NOT NULL,
  `entry` int(12) NOT NULL,
  PRIMARY KEY (`id`)
)


CREATE TABLE IF NOT EXISTS `relationship` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user1` int(12) NOT NULL,
  `user2` int(12) NOT NULL,
  `timestamp` int(20) NOT NULL,
  `friends` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
)


CREATE TABLE IF NOT EXISTS `sport` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `cz` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
)


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
  `tel` varchar(25) NOT NULL,
  `showTel` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
)

CREATE TABLE IF NOT EXISTS `notice` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `seen` tinyint(1) NOT NULL,
  `timestamp` int(20) NOT NULL,
  `user` int(15) NOT NULL,
  PRIMARY KEY (`id`)
)

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
)

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