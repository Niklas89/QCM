-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 14, 2011 at 03:14 PM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `techn2`
--

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `id_quiz` int(11) NOT NULL AUTO_INCREMENT,
  `question` text CHARACTER SET latin1 NOT NULL,
  `reponse` text CHARACTER SET latin1 NOT NULL,
  `reponse_mauvaise1` text NOT NULL,
  `reponse_mauvaise2` text NOT NULL,
  `explication` text CHARACTER SET latin1 NOT NULL,
  `id_cat` int(11) NOT NULL,
  PRIMARY KEY (`id_quiz`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id_quiz`, `question`, `reponse`, `reponse_mauvaise1`, `reponse_mauvaise2`, `explication`, `id_cat`) VALUES
(1, 'laquestion1', 'lareponse1', 'mauvaisereponse1', 'mauvaisereponse2', 'lexplication1', 1),
(2, 'laquestion2', 'lareponse2', 'mauvaisereponse1', 'mauvaisereponse2', 'lexplication2', 1),
(3, 'laquestion3', 'lareponse3', 'mauvaisereponse1', 'mauvaisereponse2', 'lexplication3', 1),
(4, 'laquestion4', 'lareponse4', 'mauvaisereponse1', 'mauvaisereponse2', 'lexplication4', 1),
(5, 'laquestion5', 'lareponse5', 'mauvaisereponse1', 'mauvaisereponse2', 'lexplication5', 1),
(6, 'laquestion6', 'lareponse6', 'mauvaisereponse1', 'mauvaisereponse2', 'lexplication6', 1),
(7, 'laquestion7', 'lareponse7', 'mauvaisereponse1', 'mauvaisereponse2', 'lexplication7', 1),
(8, 'laquestion8', 'lareponse8', 'mauvaisereponse1', 'mauvaisereponse2', 'lexplication8', 1),
(9, 'laquestion9', 'lareponse9', 'mauvaisereponse1', 'mauvaisereponse2', 'lexplication9', 1),
(10, 'laquestion10', 'lareponse10', 'mauvaisereponse1', 'mauvaisereponse2', 'lexplication10', 1);
