-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 12 Mai 2013 à 21:24
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `esn`
--

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id_event` int(11) NOT NULL AUTO_INCREMENT,
  `picture_event` text CHARACTER SET utf8 NOT NULL,
  `name_event` text CHARACTER SET utf8 NOT NULL,
  `persons` text CHARACTER SET utf8 NOT NULL,
  `description_event` longtext CHARACTER SET utf8 NOT NULL,
  `time_event` text CHARACTER SET utf8 NOT NULL,
  `fait` int(11) NOT NULL,
  `date_event` date NOT NULL,
  PRIMARY KEY (`id_event`),
  UNIQUE KEY `id_event_2` (`id_event`),
  KEY `id_event` (`id_event`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `events`
--

INSERT INTO `events` (`id_event`, `picture_event`, `name_event`, `persons`, `description_event`, `time_event`, `fait`, `date_event`) VALUES
(1, 'map_6149.png', 'First test Bdd ', '', 'Erasmus Student Network (ESN) is a non-profit international student organisation. Our mission is to represent international students, thus provide opportunities for cultural understanding and self-development under the principle of Students Helping Students.\n\n\nWe are 12.000 members from 424 local sections in 36 countries working on a volunteer base in Higher Education Institutions. We are offering services to 160.000 students.', '', 1, '2012-12-12'),
(3, 'Tulips_55847.jpg', 'Christmas', '', '<p>C''est No&euml;l !!!</p>', '', 1, '2012-12-25'),
(5, '', 'Test Editor', 'Justin', '<p>test The Erasmus Student Network urges policy makers to solve the Erasmus budget deficit</p>\r\n<p><strong>The Erasmus Student Network (ESN) expresses its co</strong>ncerns about the still unsolved budget deficit of the Erasmus programme in 2012 and 2013. ESN urges the E<em>uropean Parliament and the Council to agree on a viable budget for the Erasmus programme in particular and the</em> Lifelong Learning Programme as a whole to fulfill the obligations towards current and future exchange students.&nbsp;</p>\r\n<ul>\r\n<li>It has been more than two months since the looming budget deficit became known to the wider public. According to the European Commission, the Erasmus programme costs &euro;480 million in 2012 and the estimated costs for 2013 are &euro;490 million which represents only around 0.35% of the whole EU budget.&nbsp;</li>\r\n</ul>\r\n<p><strong>The Erasmus programme is one of the most cost-effective and successful EU programmes and should not be subject to cuts.</strong>&nbsp;Mobility is an integral part of the Europe 2020 strategy and the projected funding levels need to be maintained to achieve the set goals. The continuing insecurity around the funding of the Erasmus programme increasingly affects prospective exchange students and creates concerns among current exchange students. The current situation mostly affects students from lower socio-economic backgrounds as they often have to rely on the financial support from the EU funded programme.</p>', '', 1, '2012-12-22'),
(15, 'Desert.jpg', 'Nouvel an', 'Jack', '<p>Write a description of the event.</p>', '00', 1, '2012-12-31'),
(16, 'icn_val2.png', 'Adam''s Birthday', 'Adman', '<p>Yahhhhhhhhhhhbbaaaaaaaaaahhh</p>', '0h00', 0, '2013-07-31'),
(17, '', 'Jay''s Birthday', 'Justin', '<p>Yeahhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>', '00:00', 1, '2013-09-29');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
