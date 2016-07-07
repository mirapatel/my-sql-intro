-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 17, 2016 at 01:55 am
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sindhu_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
`id` int(10) unsigned NOT NULL,
  `genres` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genres`) VALUES
(1, 'action'),
(2, 'comedy'),
(3, 'drama'),
(4, 'sci-fi'),
(5, 'thriller');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
`id` int(11) unsigned NOT NULL,
  `title` varchar(15) NOT NULL,
  `description` text NOT NULL,
  `rating` enum('PGR','R','M','G') DEFAULT 'G',
  `duration` decimal(5,0) NOT NULL,
  `release_date` year(4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `rating`, `duration`, `release_date`) VALUES
(6, 'Rio 2', 'kdkgskdfgksgdfgsdkf', 'PGR', '115', 2015),
(7, 'Inside Out', 'After young Riley is uprooted from her Midwest life and moved to San Francisco, her emotions - Joy, Fear, Anger, Disgust and Sadness - conflict on how best to navigate a new city, house, and school.', 'G', '95', 2015),
(8, 'Hugo', 'Asa Butterfield is brilliant as the twelve years old boy who lives alone in the walls of 1930s railway station in Paris and steals food to get by. Torn from a loving watchmaker father upon his death, and forced to repair clocks for his alcoholic uncle, Hugo devotes his time to working on his father’s last project: repairing the automaton, a mechanical man who can write. Desperate to figure out if his father left him a message in the automaton, he adopts dubious measures to obtain the parts he needs. It was during such a theft from a toy shop that he meets the owner’s daughter, Isabelle, who decides to help him in his project. Together they go on an adventure with a key that will reveal to them a secret from a magician’s past. Adapted from the book, The Invention of Hugo Cabaret, Martin Scorsese brings innocence to the elegant narrative.', 'G', '100', 2011),
(12, 'changed', 'ertertert', 'PGR', '123', 1999),
(13, 'ertert', 'tyrty', 'R', '34', 1990);

-- --------------------------------------------------------

--
-- Table structure for table `movie_genre`
--

CREATE TABLE IF NOT EXISTS `movie_genre` (
  `movie_id` int(11) unsigned NOT NULL,
  `genre_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movie_genre`
--

INSERT INTO `movie_genre` (`movie_id`, `genre_id`) VALUES
(6, 2),
(6, 3),
(7, 1),
(7, 4),
(7, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_genre`
--
ALTER TABLE `movie_genre`
 ADD KEY `movie_id` (`movie_id`), ADD KEY `genre_id` (`genre_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie_genre`
--
ALTER TABLE `movie_genre`
ADD CONSTRAINT `genre_fk` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `movie_fk` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
