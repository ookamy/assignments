-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 23, 2012 at 02:48 PM
-- Server version: 5.0.77
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `sant0125`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(256) collate utf8_unicode_ci NOT NULL,
  `released` year(4) NOT NULL,
  `director` varchar(256) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `released`, `director`) VALUES
(1, 'Contact', 1997, 'Robert Zemeckis'),
(2, 'Sunshine', 2007, 'Danny Boyle'),
(3, 'Inception', 2010, 'Christopher Nolan'),
(4, 'Children of Men', 2006, 'Alfonso Cuaron'),
(5, 'Twelve Monkeys', 1995, 'Terry Gilliam');
