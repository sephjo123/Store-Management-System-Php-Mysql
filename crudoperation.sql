-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2023 at 11:31 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crudoperation`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `order_image` varchar(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `order_name` varchar(100) NOT NULL,
  `order_description` varchar(100) NOT NULL,
  `order_price` varchar(100) NOT NULL,
  `order_qty` varchar(255) NOT NULL,
  `date_inserted` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL DEFAULT 'Not Paid',
  `order_action` varchar(255) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `order_image`, `pid`, `order_name`, `order_description`, `order_price`, `order_qty`, `date_inserted`, `status`, `order_action`) VALUES
(116, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '2', '2023-09-19', 'Not Paid', '0'),
(117, 'productImage/Steamed-Pork-Buns-BBQ_Siopao-Asado-Recipe.webp.png ', 11, 'Siopao', 'Squishy', '25', '3', '2023-09-19', 'Not Paid', '0'),
(118, 'productImage/coke.jpg ', 12, 'Coke Mismo', 'Soft Drinks', '20', '4', '2023-09-19', 'Not Paid', '0'),
(119, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-09-19', 'Not Paid', '0'),
(120, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '2', '2023-09-19', 'Not Paid', '0'),
(121, 'productImage/Steamed-Pork-Buns-BBQ_Siopao-Asado-Recipe.webp.png ', 11, 'Siopao', 'Squishy', '25', '10', '2023-09-19', 'Not Paid', '0'),
(122, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-09-19', 'Not Paid', '0'),
(123, 'productImage/coke.jpg ', 12, 'Coke Mismo', 'Soft Drinks', '20', '3', '2023-09-19', 'Not Paid', '0'),
(124, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-09-20', 'Not Paid', '0'),
(125, 'productImage/coke.jpg ', 12, 'Coke Mismo', 'Soft Drinks', '20', '1', '2023-09-20', 'Not Paid', '0'),
(126, 'productImage/Steamed-Pork-Buns-BBQ_Siopao-Asado-Recipe.webp.png ', 11, 'Siopao', 'Squishy', '25', '1', '2023-09-20', 'Not Paid', '0'),
(127, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '1', '2023-09-20', 'Not Paid', '0'),
(128, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '3', '2023-09-20', 'Not Paid', '0'),
(129, 'productImage/Steamed-Pork-Buns-BBQ_Siopao-Asado-Recipe.webp.png ', 11, 'Siopao', 'Squishy', '25', '4', '2023-09-20', 'Not Paid', '0'),
(130, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-09-20', 'Not Paid', '0'),
(131, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '1', '2023-09-20', 'Not Paid', '0'),
(132, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '1', '2023-09-20', 'Not Paid', '0'),
(133, 'productImage/coke.jpg ', 12, 'Coke Mismo', 'Soft Drinks', '20', '4', '2023-09-20', 'Not Paid', '0'),
(134, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-09-20', 'Not Paid', '0'),
(135, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '1', '2023-09-20', 'Not Paid', '0'),
(136, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '1', '2023-09-20', 'Not Paid', '0'),
(137, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-09-20', 'Not Paid', '0'),
(138, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-09-20', 'Not Paid', '0'),
(139, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '1', '2023-09-20', 'Not Paid', '0'),
(140, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-09-20', 'Not Paid', '0'),
(141, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '1', '2023-09-20', 'Not Paid', '0'),
(142, 'productImage/Steamed-Pork-Buns-BBQ_Siopao-Asado-Recipe.webp.png ', 11, 'Siopao', 'Squishy', '25', '1', '2023-09-20', 'Not Paid', '0'),
(143, 'productImage/coke.jpg ', 12, 'Coke Mismo', 'Soft Drinks', '20', '1', '2023-09-20', 'Not Paid', '0'),
(144, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '1', '2023-09-20', 'Not Paid', '0'),
(145, 'productImage/Steamed-Pork-Buns-BBQ_Siopao-Asado-Recipe.webp.png ', 11, 'Siopao', 'Squishy', '25', '1', '2023-09-20', 'Not Paid', '0'),
(146, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '1', '2023-09-20', 'Not Paid', '0'),
(147, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-09-21', 'Not Paid', '0'),
(148, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-09-21', 'Not Paid', '0'),
(149, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '1', '2023-09-21', 'Not Paid', '0'),
(150, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-09-21', 'Not Paid', '0'),
(151, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '1', '2023-09-21', 'Not Paid', '0'),
(152, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-09-21', 'Not Paid', '0'),
(153, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '1', '2023-09-21', 'Not Paid', '0'),
(154, 'productImage/coke.jpg ', 12, 'Coke Mismo', 'Soft Drinks', '20', '1', '2023-09-21', 'Not Paid', '0'),
(155, 'productImage/Steamed-Pork-Buns-BBQ_Siopao-Asado-Recipe.webp.png ', 11, 'Siopao', 'Squishy', '25', '1', '2023-09-21', 'Not Paid', '0'),
(156, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-09-21', 'Not Paid', '0'),
(157, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '1', '2023-09-21', 'Not Paid', '0'),
(158, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '1', '2023-09-21', 'Not Paid', '0'),
(159, 'productImage/Steamed-Pork-Buns-BBQ_Siopao-Asado-Recipe.webp.png ', 11, 'Siopao', 'Squishy', '25', '1', '2023-09-21', 'Not Paid', '0'),
(160, 'productImage/coke.jpg ', 12, 'Coke Mismo', 'Soft Drinks', '20', '1', '2023-09-21', 'Not Paid', '0'),
(161, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-09-21', 'Not Paid', '0'),
(162, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '3', '2023-09-21', 'Not Paid', '0'),
(163, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '4', '2023-09-21', 'Not Paid', '0'),
(164, 'productImage/Steamed-Pork-Buns-BBQ_Siopao-Asado-Recipe.webp.png ', 11, 'Siopao', 'Squishy', '25', '5', '2023-09-21', 'Not Paid', '0'),
(165, 'productImage/coke.jpg ', 12, 'Coke Mismo', 'Soft Drinks', '20', '6', '2023-09-21', 'Not Paid', '0'),
(166, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '1', '2023-09-21', 'Not Paid', '0'),
(167, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '1', '2023-09-21', 'Not Paid', '0'),
(168, 'productImage/Steamed-Pork-Buns-BBQ_Siopao-Asado-Recipe.webp.png ', 11, 'Siopao', 'Squishy', '25', '1', '2023-09-21', 'Not Paid', '0'),
(169, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '4', '2023-09-22', 'Not Paid', '0'),
(170, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '5', '2023-09-22', 'Not Paid', '0'),
(171, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '5', '2023-09-22', 'Not Paid', '0'),
(172, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '2', '2023-09-22', 'Not Paid', '0'),
(173, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '3', '2023-09-22', 'Not Paid', '0'),
(174, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '1', '2023-09-22', 'Not Paid', '0'),
(175, 'productImage/Steamed-Pork-Buns-BBQ_Siopao-Asado-Recipe.webp.png ', 11, 'Siopao', 'Squishy', '25', '1', '2023-09-22', 'Not Paid', '0'),
(176, 'productImage/coke.jpg ', 12, 'Coke Mismo', 'Soft Drinks', '20', '3', '2023-09-22', 'Not Paid', '0'),
(177, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-10-02', 'Not Paid', '0'),
(178, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-10-02', 'Not Paid', '0'),
(179, 'productImage/coke.jpg ', 12, 'Coke Mismo', 'Soft Drinks', '20', '1', '2023-10-02', 'Not Paid', '0'),
(180, 'productImage/Steamed-Pork-Buns-BBQ_Siopao-Asado-Recipe.webp.png ', 11, 'Siopao', 'Squishy', '25', '1', '2023-10-02', 'Not Paid', '0'),
(181, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '1', '2023-10-02', 'Not Paid', '0'),
(182, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '1', '2023-10-02', 'Not Paid', '0'),
(183, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-10-02', 'Not Paid', '0'),
(184, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-10-02', 'Not Paid', '0'),
(185, 'productImage/Steamed-Pork-Buns-BBQ_Siopao-Asado-Recipe.webp.png ', 11, 'Siopao', 'Squishy', '25', '1', '2023-10-02', 'Not Paid', '0'),
(186, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-10-03', 'Not Paid', '0'),
(187, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-10-03', 'Not Paid', '0'),
(188, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '1', '2023-10-03', 'Not Paid', '0'),
(189, 'productImage/Steamed-Pork-Buns-BBQ_Siopao-Asado-Recipe.webp.png ', 11, 'Siopao', 'Squishy', '25', '1', '2023-10-03', 'Not Paid', '0'),
(190, 'productImage/coke.jpg ', 12, 'Coke Mismo', 'Soft Drinks', '20', '1', '2023-10-03', 'Not Paid', '0'),
(191, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-10-03', 'Not Paid', '0'),
(192, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '1', '2023-10-03', 'Not Paid', '0'),
(193, 'productImage/Steamed-Pork-Buns-BBQ_Siopao-Asado-Recipe.webp.png ', 11, 'Siopao', 'Squishy', '25', '1', '2023-10-03', 'Not Paid', '0'),
(194, 'productImage/coke.jpg ', 12, 'Coke Mismo', 'Soft Drinks', '20', '1', '2023-10-03', 'Not Paid', '0'),
(195, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-10-03', 'Not Paid', '0'),
(196, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-10-03', 'Not Paid', '0'),
(197, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '5', '2023-10-03', 'Not Paid', '0'),
(198, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '1', '2023-10-03', 'Not Paid', '0'),
(199, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '1', '2023-10-03', 'Not Paid', '0'),
(200, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '1', '2023-10-03', 'Not Paid', '0'),
(201, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '1', '2023-10-03', 'Not Paid', '0'),
(202, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-10-03', 'Not Paid', '0'),
(203, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-10-03', 'Not Paid', '0'),
(204, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-10-03', 'Not Paid', '0'),
(205, 'productImage/Steamed-Pork-Buns-BBQ_Siopao-Asado-Recipe.webp.png ', 11, 'Siopao', 'Squishy', '25', '1', '2023-10-03', 'Not Paid', '0'),
(206, 'productImage/Steamed-Pork-Buns-BBQ_Siopao-Asado-Recipe.webp.png ', 11, 'Siopao', 'Squishy', '25', '1', '2023-10-03', 'Not Paid', '0'),
(207, 'productImage/Steamed-Pork-Buns-BBQ_Siopao-Asado-Recipe.webp.png ', 11, 'Siopao', 'Squishy', '25', '1', '2023-10-03', 'Not Paid', '0'),
(208, 'productImage/Steamed-Pork-Buns-BBQ_Siopao-Asado-Recipe.webp.png ', 11, 'Siopao', 'Squishy', '25', '1', '2023-10-03', 'Not Paid', '0'),
(209, 'productImage/Steamed-Pork-Buns-BBQ_Siopao-Asado-Recipe.webp.png ', 11, 'Siopao', 'Squishy', '25', '1', '2023-10-03', 'Not Paid', '0'),
(210, 'productImage/Steamed-Pork-Buns-BBQ_Siopao-Asado-Recipe.webp.png ', 11, 'Siopao', 'Squishy', '25', '1', '2023-10-03', 'Not Paid', '0'),
(211, 'productImage/Steamed-Pork-Buns-BBQ_Siopao-Asado-Recipe.webp.png ', 11, 'Siopao', 'Squishy', '25', '1', '2023-10-03', 'Not Paid', '0'),
(212, 'productImage/Steamed-Pork-Buns-BBQ_Siopao-Asado-Recipe.webp.png ', 11, 'Siopao', 'Squishy', '25', '1', '2023-10-03', 'Not Paid', '0'),
(213, 'productImage/Steamed-Pork-Buns-BBQ_Siopao-Asado-Recipe.webp.png ', 11, 'Siopao', 'Squishy', '25', '3', '2023-10-03', 'Not Paid', '0'),
(214, 'productImage/coke.jpg ', 12, 'Coke Mismo', 'Soft Drinks', '20', '13', '2023-10-03', 'Not Paid', '0'),
(215, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '15', '2023-10-03', 'Not Paid', '0'),
(216, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '31', '2023-10-03', 'Not Paid', '0'),
(217, 'productImage/Steamed-Pork-Buns-BBQ_Siopao-Asado-Recipe.webp.png ', 11, 'Siopao', 'Squishy', '25', '12', '2023-10-03', 'Not Paid', '0'),
(218, 'productImage/presto-creams.jpg ', 14, 'Presto Cream', 'biscuits', '10', '1', '2023-10-03', 'Not Paid', '0'),
(219, 'productImage/coke.jpg ', 12, 'Coke Mismo', 'Soft Drinks', '20', '20', '2023-10-03', 'Not Paid', '0'),
(220, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-10-03', 'Not Paid', '0'),
(221, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-10-03', 'Not Paid', '0'),
(222, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '1', '2023-10-03', 'Not Paid', '0'),
(223, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-10-03', 'Not Paid', '0'),
(224, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '1', '2023-10-03', 'Not Paid', '0'),
(225, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-10-03', 'Not Paid', '0'),
(226, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '1', '2023-10-03', 'Not Paid', '0'),
(227, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-10-03', 'Not Paid', '0'),
(228, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '1', '2023-10-03', 'Not Paid', '0'),
(229, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-10-03', 'Not Paid', '0'),
(230, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '1', '2023-10-03', 'Not Paid', '0'),
(231, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-10-03', 'Not Paid', '0'),
(232, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '3', '2023-10-03', 'Not Paid', '0'),
(233, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '3', '2023-10-03', 'Not Paid', '0'),
(234, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '3', '2023-10-03', 'Not Paid', '0'),
(235, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '3', '2023-10-03', 'Not Paid', '0'),
(236, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '3', '2023-10-03', 'Not Paid', '0'),
(237, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '2', '2023-10-03', 'Not Paid', '0'),
(238, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '3', '2023-10-03', 'Not Paid', '0'),
(239, 'productImage/Steamed-Pork-Buns-BBQ_Siopao-Asado-Recipe.webp.png ', 11, 'Siopao', 'Squishy', '25', '10', '2023-10-03', 'Not Paid', '0'),
(240, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-10-03', 'Not Paid', '0'),
(241, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-10-04', 'Not Paid', '0'),
(242, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-10-04', 'Not Paid', '0'),
(243, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-10-04', 'Not Paid', '0'),
(244, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-10-04', 'Not Paid', '0'),
(245, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-10-04', 'Not Paid', '0'),
(246, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-10-04', 'Not Paid', '0'),
(247, 'productImage/cream0.jpg ', 10, 'Cream-O', 'Biscuit', '13', '1', '2023-10-04', 'Not Paid', '0'),
(248, 'productImage/Jack-Jill-Piattos-Cheese.jpg ', 16, 'Piattos Cheese', 'Chips', '20', '1', '2023-10-05', 'Not Paid', '0'),
(249, 'productImage/coke.jpg ', 12, 'Coke Mismo', 'Soft Drinks', '20', '3', '2023-10-05', 'Not Paid', '0'),
(250, 'productImage/fudgeebarr.jpg ', 9, 'Fudgee barr', 'Chocolate', '10', '1', '2023-10-05', 'Not Paid', '0');

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nickname` varchar(10) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `civil_status` varchar(20) NOT NULL,
  `birth_date` varchar(20) NOT NULL,
  `birth_place` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `user_type` varchar(6) NOT NULL DEFAULT 'user',
  `date_added` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`id`, `name`, `email`, `mobile`, `password`, `nickname`, `middle_name`, `last_name`, `gender`, `civil_status`, `birth_date`, `birth_place`, `address`, `user_type`, `date_added`) VALUES
(6, 'johnny', 'test@gmail.com', '092105413412', '$2y$10$9jh9ZWQv6IMRAIW0W1n0BuFWTI9qal6Y.UxRQTi/b6PkKDgUQuF0a', '', '', '', '', '', '', '', '', 'user', '2023-09-03 22:21:44.317418'),
(7, 'mark joseph', 'lebaquimark@gmail.com', '09232836820', '$2y$10$sEL.YH3vxXKaP0k.2Nq6xebJ/34h.SITtWycwboSbVoxJSbssHJky', 'otep', 'esguerra', 'lebaquin', 'Male', 'Single', '2000-04-29', 'angono rizal', '5 cruz compound E. Rodriguez Ave. Brgy San Isidro Taytay, Rizal', 'user', '2023-09-04 00:17:32.249519'),
(12, 'test2', 'test09@gmail.com', '2142354', '$2y$10$0/q2Lis.72dhKBNKo9D7oe1JIjcBfylRh03dXmjoSbP/aKY7dQrB6', '', '', '', '', '', '', '', '', 'user', '2023-09-06 21:11:57.413492'),
(13, 'jessa ', 'jessa@gmail.com', '092105413412', '$2y$10$pgA2NnXX6wITPFoQdLQUYO9R9mdwDZIYYLE0c/nTcbVoOFSgsE/5S', 'jessy', 'mae', 'bustamante', 'Female', 'Single', '2002-05-14', 'Angono rizal', 'Angono, Rizal', 'user', '2023-09-08 19:58:19.483475'),
(21, 'sophia ', 'sophia@gmail.com', '0923283677817', '$2y$10$ionvwqB0yEn5Zn.eua8rWebHK7C6Lgyh7pJKHQIYAXaRBx9ai.Y.m', 'pia', 'esguerra', 'orivida', 'Female', 'Single', '2003-10-06', 'angono rizal', 'sample address', 'user', '2023-09-08 20:47:23.587111'),
(22, 'John Edison ', 'namiajohnedison@gmail.com', '09095474636', '$2y$10$dbfR.09r5onkQ0DRgfwiaOIoghrbaO/L6PTalXEkPjAEqlTNiPH6.', '', 'Letada', 'Namia', 'Male', '', '', '', 'Angono Rizal', 'user', '2023-09-08 21:16:10.313114'),
(23, 'admin', 'admin@gmail.com', '', '$2y$10$wGwX4hoccSC/y.aAWSW9veYdTvsnH6.ZLGINxfchApwDkv0rr0gDC', '', '', '', '', '', '', '', '', 'admin', '0000-00-00 00:00:00.000000'),
(24, 'Sophia ', 'orividasophia@gmail.com', '09264159331', '$2y$10$C/LFuSi3e1733EuL/fPbAOrAsNPqr93L17opr8KJ3wPlfB60a1nJy', '', 'Julian', 'Orivida', 'Female', '', '', '', '17.Mjulian St.Santana Subd Taytay Rizal', 'user', '2023-10-04 00:12:44.813797');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_availability` varchar(100) NOT NULL DEFAULT 'Available',
  `product_quantity` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `date_inserted` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_price`, `product_availability`, `product_quantity`, `product_description`, `product_image`, `product_category`, `date_inserted`) VALUES
(9, 'Fudgee barr', '10', 'Available', '78', 'Chocolate', 'productImage/fudgeebarr.jpg', '4', '2023-09-16 21:41:39.893174'),
(10, 'Cream-O', '13', 'Available', '97', 'Biscuit', 'productImage/cream0.jpg', '2', '2023-09-16 21:42:51.585499'),
(11, 'Siopao', '25', 'Available', '90', 'Squishy', 'productImage/Steamed-Pork-Buns-BBQ_Siopao-Asado-Recipe.webp.png', '5', '2023-09-16 21:58:15.677546'),
(12, 'Coke Mismo', '20', 'Available', '97', 'Soft Drinks', 'productImage/coke.jpg', '1', '2023-09-16 22:27:27.351374'),
(14, 'Presto Cream', '10', 'Available', '100', 'biscuits', 'productImage/presto-creams.jpg', '2', '2023-10-03 18:13:52.881920'),
(16, 'Piattos Cheese', '20', 'Available', '99', 'Chips', 'productImage/Jack-Jill-Piattos-Cheese.jpg', '6', '2023-10-03 22:35:03.880146');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `category_name`) VALUES
(1, 'soft drinks'),
(2, 'biscuits '),
(4, 'cakes'),
(5, 'steamed bun'),
(6, 'Potato chips');

-- --------------------------------------------------------

--
-- Table structure for table `product_sales`
--

CREATE TABLE `product_sales` (
  `id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `or_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_qty` varchar(255) NOT NULL,
  `date_inserted` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_sales`
--

INSERT INTO `product_sales` (`id`, `product_id`, `transaction_id`, `or_id`, `product_name`, `product_price`, `product_qty`, `date_inserted`) VALUES
(164, '9', 'TR-ID- 1', '191', 'Fudgee barr', '10', '1', '2023-10-03 10:28:42.857958'),
(165, '10', 'TR-ID- 1', '192', 'Cream-O', '13', '1', '2023-10-03 10:28:42.924845'),
(166, '11', 'TR-ID- 1', '193', 'Siopao', '25', '1', '2023-10-03 10:28:43.002438'),
(167, '12', 'TR-ID- 1', '194', 'Coke Mismo', '20', '1', '2023-10-03 10:28:43.069742'),
(168, '9', 'TR-ID- 1', '195', 'Fudgee barr', '10', '1', '2023-10-03 10:28:43.166701'),
(169, '9', 'TR-ID- 6', '196', 'Fudgee barr', '10', '1', '2023-10-03 12:11:19.758634'),
(170, '10', 'TR-ID- 7', '198', 'Cream-O', '13', '1', '2023-10-03 12:23:30.957918'),
(171, '10', 'TR-ID- 7', '199', 'Cream-O', '13', '1', '2023-10-03 12:23:31.124623'),
(172, '10', 'TR-ID- 7', '200', 'Cream-O', '13', '1', '2023-10-03 12:23:31.202409'),
(173, '10', 'TR-ID- 7', '201', 'Cream-O', '13', '1', '2023-10-03 12:23:31.258049'),
(174, '9', 'TR-ID- 11', '202', 'Fudgee barr', '10', '1', '2023-10-03 12:51:22.626088'),
(175, '9', 'TR-ID- 11', '203', 'Fudgee barr', '10', '1', '2023-10-03 12:51:22.713224'),
(176, '9', 'TR-ID- 11', '204', 'Fudgee barr', '10', '1', '2023-10-03 12:51:22.913372'),
(177, '11', 'TR-ID- 14', '205', 'Siopao', '25', '1', '2023-10-03 13:11:19.678065'),
(178, '11', 'TR-ID- 15', '206', 'Siopao', '25', '1', '2023-10-03 13:11:47.073855'),
(179, '11', 'TR-ID- 15', '207', 'Siopao', '25', '1', '2023-10-03 13:11:47.173918'),
(180, '11', 'TR-ID- 15', '208', 'Siopao', '25', '1', '2023-10-03 13:11:47.474753'),
(181, '11', 'TR-ID- 15', '209', 'Siopao', '25', '1', '2023-10-03 13:11:47.541603'),
(182, '11', 'TR-ID- 15', '210', 'Siopao', '25', '1', '2023-10-03 13:11:47.608248'),
(183, '11', 'TR-ID- 15', '211', 'Siopao', '25', '1', '2023-10-03 13:11:47.674925'),
(184, '11', 'TR-ID- 15', '212', 'Siopao', '25', '1', '2023-10-03 13:11:47.752653'),
(185, '11', 'TR-ID- 22', '213', 'Siopao', '25', '3', '2023-10-03 13:59:00.244764'),
(186, '12', 'TR-ID- 23', '214', 'Coke Mismo', '20', '13', '2023-10-03 14:03:04.918683'),
(187, '9', 'TR-ID- 24', '215', 'Fudgee barr', '10', '15', '2023-10-03 15:24:40.564931'),
(188, '10', 'TR-ID- 25', '216', 'Cream-O', '13', '31', '2023-10-03 15:38:42.469919'),
(189, '11', 'TR-ID- 26', '217', 'Siopao', '25', '12', '2023-10-03 15:39:06.027925'),
(190, '14', 'TR-ID- 27', '218', 'Presto Cream', '10', '1', '2023-10-03 22:18:06.977879'),
(191, '12', 'TR-ID- 27', '219', 'Coke Mismo', '20', '20', '2023-10-03 22:18:07.055564'),
(192, '9', 'TR-ID- 29', '220', 'Fudgee barr', '10', '1', '2023-10-03 23:17:28.272631'),
(193, '9', 'TR-ID- 30', '221', 'Fudgee barr', '10', '1', '2023-10-03 23:20:37.399906'),
(194, '10', 'TR-ID- 30', '222', 'Cream-O', '13', '1', '2023-10-03 23:20:37.444354'),
(195, '9', 'TR-ID- 32', '223', 'Fudgee barr', '10', '1', '2023-10-03 23:24:03.818424'),
(196, '10', 'TR-ID- 32', '224', 'Cream-O', '13', '1', '2023-10-03 23:24:03.940311'),
(197, '9', 'TR-ID- 34', '225', 'Fudgee barr', '10', '1', '2023-10-03 23:24:45.421205'),
(198, '10', 'TR-ID- 34', '226', 'Cream-O', '13', '1', '2023-10-03 23:24:45.554901'),
(199, '9', 'TR-ID- 36', '227', 'Fudgee barr', '10', '1', '2023-10-03 23:26:22.430752'),
(200, '10', 'TR-ID- 36', '228', 'Cream-O', '13', '1', '2023-10-03 23:26:22.497332'),
(201, '9', 'TR-ID- 38', '229', 'Fudgee barr', '10', '1', '2023-10-03 23:27:35.125815'),
(202, '10', 'TR-ID- 38', '230', 'Cream-O', '13', '1', '2023-10-03 23:27:35.169099'),
(203, '9', 'TR-ID- 40', '232', 'Fudgee barr', '10', '3', '2023-10-03 23:31:36.168453'),
(204, '9', 'TR-ID- 41', '233', 'Fudgee barr', '10', '3', '2023-10-03 23:32:14.318540'),
(205, '9', 'TR-ID- 42', '234', 'Fudgee barr', '10', '3', '2023-10-03 23:39:45.854875'),
(206, '9', 'TR-ID- 43', '235', 'Fudgee barr', '10', '3', '2023-10-03 23:41:53.186960'),
(207, '9', 'TR-ID- 44', '236', 'Fudgee barr', '10', '3', '2023-10-03 23:50:50.231166'),
(208, '9', 'TR-ID- 45', '237', 'Fudgee barr', '10', '2', '2023-10-03 23:51:17.468127'),
(209, '10', 'TR-ID- 45', '238', 'Cream-O', '13', '3', '2023-10-03 23:51:17.724534'),
(210, '11', 'TR-ID- 47', '239', 'Siopao', '25', '10', '2023-10-03 23:56:30.429298'),
(211, '9', 'TR-ID- 48', '240', 'Fudgee barr', '10', '1', '2023-10-04 00:03:13.330615'),
(212, '9', 'TR-ID- 49', '241', 'Fudgee barr', '10', '1', '2023-10-04 00:04:19.735347'),
(213, '9', 'TR-ID- 50', '242', 'Fudgee barr', '10', '1', '2023-10-04 00:06:39.503555'),
(214, '9', 'TR-ID- 51', '243', 'Fudgee barr', '10', '1', '2023-10-04 00:07:33.052897'),
(215, '9', 'TR-ID- 52', '244', 'Fudgee barr', '10', '1', '2023-10-04 00:21:58.493859'),
(216, '9', 'TR-ID- 53', '245', 'Fudgee barr', '10', '1', '2023-10-04 00:25:53.302879'),
(217, '16', 'TR-ID- 54', '248', 'Piattos Cheese', '20', '1', '2023-10-05 16:12:33.620590'),
(218, '12', 'TR-ID- 55', '249', 'Coke Mismo', '20', '3', '2023-10-05 16:34:47.303007'),
(219, '9', 'TR-ID- 56', '250', 'Fudgee barr', '10', '1', '2023-10-05 16:36:40.142397');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sales`
--
ALTER TABLE `product_sales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_sales`
--
ALTER TABLE `product_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
