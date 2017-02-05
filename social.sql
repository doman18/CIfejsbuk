-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas wygenerowania: 17 Lip 2013, 14:23
-- Wersja serwera: 5.5.27
-- Wersja PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `social`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `fb_comments`
--

CREATE TABLE IF NOT EXISTS `fb_comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_author` int(11) NOT NULL,
  `comment_entry` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_cdate` datetime NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Zrzut danych tabeli `fb_comments`
--

INSERT INTO `fb_comments` (`comment_id`, `comment_author`, `comment_entry`, `comment_content`, `comment_cdate`) VALUES
(2, 6, 5, 'Komentarz 1', '0000-00-00 00:00:00'),
(3, 6, 2, 'Komentarz 3', '0000-00-00 00:00:00'),
(4, 6, 2, 'komentarz 4', '2013-07-17 13:51:03'),
(5, 6, 2, 'Tresc komenta', '2013-07-17 13:54:02'),
(6, 6, 5, 'yyyyyy koment', '2013-07-17 14:01:56');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `fb_entries`
--

CREATE TABLE IF NOT EXISTS `fb_entries` (
  `entry_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(25) NOT NULL,
  `entry_content` text NOT NULL,
  `entry_cdate` datetime NOT NULL,
  PRIMARY KEY (`entry_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `fb_entries`
--

INSERT INTO `fb_entries` (`entry_id`, `author_id`, `entry_content`, `entry_cdate`) VALUES
(2, 5, 'libraries for commonly needed tasks, as well as a simple interface and logical structure to access these libraries. CodeIgniter lets you creatively focus on your project by minimizing the amount of code needed for a given task.', '2013-07-14 00:00:00'),
(5, 6, 'While the session data array stored in the user''s cookie contains a Session ID, unless you store session data in a database there is no way to validate it. For some applications that require little or no security, session ID validation may not be needed, but if your application requires security, validation is mandatory. Otherwise, an old session could be restored by a user modifying their cookies.  When session data is available in a database, every time a valid session is found in the user''s cookie, a database query is performed to match it. If the session ID does not match, the session is destroyed. Session IDs can never be updated, they can only be generated when a new session is created.  In order to store sessions, you must first create a database table for this purpose. Here is the basic prototype (for MySQL) required by the session class:', '2013-07-16 13:47:29');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `fb_events`
--

CREATE TABLE IF NOT EXISTS `fb_events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_author` int(11) NOT NULL,
  `event_content` text NOT NULL,
  `event_start_date` datetime NOT NULL,
  `event_end_date` datetime NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `fb_users`
--

CREATE TABLE IF NOT EXISTS `fb_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_avatar` varchar(255) NOT NULL,
  `user_mail` varchar(50) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `user_surname` varchar(60) NOT NULL,
  `user_city` varchar(60) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Zrzut danych tabeli `fb_users`
--

INSERT INTO `fb_users` (`user_id`, `user_avatar`, `user_mail`, `user_password`, `user_name`, `user_surname`, `user_city`, `is_admin`) VALUES
(5, '71.jpg', 'lolek@lolek.pl', 'ff9ec44feecf7dfe43fe7232196376cad9a22856', 'lolek', 'lolkowiecki', '', 1),
(6, '91.jpg', 'bolek@bolek.pl', '9e7ef70df3c2db84a209afd57e856138c211a7f2', 'bolek', 'bolkowki', '', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
