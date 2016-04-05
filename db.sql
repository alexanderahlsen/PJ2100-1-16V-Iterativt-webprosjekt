-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Apr 05, 2016 at 09:04 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `fjerdingen`
--

-- --------------------------------------------------------

--
-- Table structure for table `Nyheter`
--

CREATE TABLE `Nyheter` (
  `id` int(11) unsigned NOT NULL,
  `tittel` text CHARACTER SET utf8 NOT NULL,
  `kategori` int(11) DEFAULT NULL,
  `bilde` text CHARACTER SET utf8 NOT NULL,
  `tekst` longtext CHARACTER SET utf8 NOT NULL,
  `avdeling` text CHARACTER SET utf8,
  `dato` text CHARACTER SET utf8,
  `ingress` text CHARACTER SET utf8
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Nyheter`
--

INSERT INTO `Nyheter` (`id`, `tittel`, `kategori`, `bilde`, `tekst`, `avdeling`, `dato`, `ingress`) VALUES
(12, 'med bilde', 1, 'custommadejewelry.jpg', '<p>tester med bilde</p>\r\n', '3', '2016-04-04', 'tester med bilde'),
(17, 'sodjsjdlsd', 1, '', '', '1', '', 'dkjsdjksd'),
(18, 'sdsdsd', 1, '', '<p>Skriv din artikkel, html tillatt.</p>\r\n', '1', '2016-04-04', 'Skriv en kort ingress til artikkelen.'),
(19, 'sdsdf', 1, '', '&lt;p&gt;&lt;s&gt;Skriv din artikkel, html tillatt.&lt;/s&gt;&lt;/p&gt;', '2', '2016-04-04', 'hallloooooo'),
(20, 'Dette er en nyhet!', 1, '', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna &lt;strong&gt;aliqua&lt;/strong&gt;. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit &lt;s&gt;esse&lt;/s&gt; cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/p&gt;', '4', '2016-04-04', 'Baldidididididididid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Nyheter`
--
ALTER TABLE `Nyheter`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Nyheter`
--
ALTER TABLE `Nyheter`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;