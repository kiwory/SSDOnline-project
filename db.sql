-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jul 08, 2020 at 01:17 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

CREATE DATABASE ongeza_test;

USE ongeza_test;

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `town_name` varchar(25) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
);

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `last_name`, `town_name`, `gender_id`, `is_deleted`) VALUES
(5, 'Magesa', 'Emmanuel', 'Morogoro', 1, 0),
(3, 'Michael', 'Paul', 'Mtwara', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
CREATE TABLE IF NOT EXISTS `gender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gender_name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
);

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `gender_name`) VALUES
(1, 'Male'),
(2, 'Female');