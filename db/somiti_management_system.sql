-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 05, 2023 at 11:10 AM
-- Server version: 8.0.31
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `somiti_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE IF NOT EXISTS `admin_user` (
  `u_id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(33) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_name` varchar(33) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `full_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pass_word` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_type` varchar(33) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(33) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`u_id`, `user_id`, `user_name`, `full_name`, `pass_word`, `user_type`, `status`, `update_date`) VALUES
(1, 'admin', 'admin', 'Super Admin', 'admin', 'super_admin', 'ENABLE', '2024-10-15 00:00:00'),
(142, '722598', '722598', 'Quail Hopkins', '832194', 'field_worker', 'ENABLE', '0000-00-00 00:00:00'),
(143, '948399', '948399', 'Megan Whitfield', '926900', 'field_worker', 'ENABLE', '0000-00-00 00:00:00'),
(144, '819063', '819063', 'Naida Mooney', '396198', 'field_worker', 'ENABLE', '0000-00-00 00:00:00'),
(145, '974550', '974550', 'Tucker Terry', '608723', 'field_worker', 'ENABLE', '0000-00-00 00:00:00'),
(146, '288340', '288340', 'নির্মল কুমার', '454591', 'field_worker', 'ENABLE', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

DROP TABLE IF EXISTS `assets`;
CREATE TABLE IF NOT EXISTS `assets` (
  `assets_id` int NOT NULL AUTO_INCREMENT,
  `assets_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `assets_price` varchar(400) COLLATE utf8mb4_general_ci NOT NULL,
  `assets_description` text COLLATE utf8mb4_general_ci NOT NULL,
  `assets_buying_price` varchar(400) COLLATE utf8mb4_general_ci NOT NULL,
  `assets_buying_date` varchar(400) COLLATE utf8mb4_general_ci NOT NULL,
  `assets_created_at` varchar(400) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`assets_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `birth_chack`
--

DROP TABLE IF EXISTS `birth_chack`;
CREATE TABLE IF NOT EXISTS `birth_chack` (
  `birth_chack_id` int NOT NULL AUTO_INCREMENT,
  `birth_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`birth_chack_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `birth_chack`
--

INSERT INTO `birth_chack` (`birth_chack_id`, `birth_id`) VALUES
(1, '12345678'),
(2, '5555');

-- --------------------------------------------------------

--
-- Table structure for table `contact_message`
--

DROP TABLE IF EXISTS `contact_message`;
CREATE TABLE IF NOT EXISTS `contact_message` (
  `ctm_id` int NOT NULL AUTO_INCREMENT,
  `ctm_name` varchar(400) COLLATE utf8mb4_general_ci NOT NULL,
  `ctm_email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ctm_subject` varchar(400) COLLATE utf8mb4_general_ci NOT NULL,
  `ctm_description` text COLLATE utf8mb4_general_ci NOT NULL,
  `ctm_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`ctm_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_message`
--

INSERT INTO `contact_message` (`ctm_id`, `ctm_name`, `ctm_email`, `ctm_subject`, `ctm_description`, `ctm_date`) VALUES
(1, 'Ila Lott', 'qohewufij@mailinator.com', 'Sapiente ab reprehen', 'Qui quod aliquam nih', '2023-07-11 09:36:59.507932'),
(2, 'Knox Delgado', 'fumahapa@mailinator.com', 'Possimus animi ali', 'Commodi amet aut ea', '2023-07-11 09:36:59.507932'),
(3, 'Veda Bryan', 'kavepiqad@mailinator.com', 'Sed libero ut perfer', 'Beatae sunt eu volup', '2023-07-11 09:36:59.507932'),
(4, 'Halla Hull', 'fenukasug@mailinator.com', 'Officia dolor odio l', 'Reiciendis iusto per', '2023-07-11 09:36:59.507932'),
(5, 'Scarlett Bird', 'hysusixy@mailinator.com', 'Dolor totam suscipit', 'In odit est est dese', '2023-07-11 09:36:59.507932'),
(6, 'Austin Dudley', 'jyhitaruge@mailinator.com', 'Quidem quidem modi q', 'Tenetur aspernatur p', '2023-07-11 09:36:59.507932'),
(7, 'Daria Melendez', 'tenomypa@mailinator.com', 'Temporibus suscipit ', 'Odit id quibusdam do', '2023-07-11 09:36:59.507932'),
(8, 'Durjay Ghosh ', 'email.com@gmm.com', 'Ddddhhdjfhfhf', 'Cbfhfhcbfbhxc cc ya fg hi ICICI do tx go into it XXL hi ggg', '2023-07-11 09:36:59.507932'),
(9, 'Ulric Hayden', 'fini@mailinator.com', 'Ex mollitia ratione ', 'Eius pariatur Conse', '2023-07-11 09:36:59.507932'),
(10, 'Alisa Bonner', 'rohyhifi@mailinator.com', 'Et tempore non quis', 'Sapiente quaerat eos', '2023-07-11 09:36:59.507932'),
(11, 'Mollie Fisher', 'qozin@mailinator.com', 'Et eu qui molestiae ', 'Nihil laboris ea bla', '2023-07-11 09:36:59.507932');

-- --------------------------------------------------------

--
-- Table structure for table `contact_page`
--

DROP TABLE IF EXISTS `contact_page`;
CREATE TABLE IF NOT EXISTS `contact_page` (
  `con_id` int NOT NULL AUTO_INCREMENT,
  `con_title` text COLLATE utf8mb4_general_ci NOT NULL,
  `con_facebook` text COLLATE utf8mb4_general_ci NOT NULL,
  `con_instagram` text COLLATE utf8mb4_general_ci NOT NULL,
  `con_twitter` text COLLATE utf8mb4_general_ci NOT NULL,
  `con_youtube` text COLLATE utf8mb4_general_ci NOT NULL,
  `con_google` text COLLATE utf8mb4_general_ci NOT NULL,
  `con_email` text COLLATE utf8mb4_general_ci NOT NULL,
  `con_phone` text COLLATE utf8mb4_general_ci NOT NULL,
  `con_address` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`con_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_page`
--

INSERT INTO `contact_page` (`con_id`, `con_title`, `con_facebook`, `con_instagram`, `con_twitter`, `con_youtube`, `con_google`, `con_email`, `con_phone`, `con_address`) VALUES
(1, 'যোগাযোগ করুন', 'https://facebook.com', 'https://instagram.com', 'https://twitter.com', 'https://youtube.com', 'https://google.com/', 'defenedap@mailinator.com', '123456789', 'Rerum ipsum autem ne');

-- --------------------------------------------------------

--
-- Table structure for table `daily_loan_collection`
--

DROP TABLE IF EXISTS `daily_loan_collection`;
CREATE TABLE IF NOT EXISTS `daily_loan_collection` (
  `dlc_id` int NOT NULL AUTO_INCREMENT,
  `dlc_member_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `dlc_loans_id` int NOT NULL,
  `dlc_date` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `dlc_amount` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `dlc_amount_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1 = Cash, 2 = Check, 3 = Others',
  PRIMARY KEY (`dlc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daily_loan_collection`
--

INSERT INTO `daily_loan_collection` (`dlc_id`, `dlc_member_id`, `dlc_loans_id`, `dlc_date`, `dlc_amount`, `dlc_amount_type`) VALUES
(31, '24', 14, '2023-09-05', '4853', '1');

-- --------------------------------------------------------

--
-- Table structure for table `daily_saving_collection`
--

DROP TABLE IF EXISTS `daily_saving_collection`;
CREATE TABLE IF NOT EXISTS `daily_saving_collection` (
  `dsc_id` int NOT NULL AUTO_INCREMENT,
  `dsc_saving_id` int NOT NULL COMMENT 'saving_account ->sa_id ',
  `dsc_member_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sa_plan_id` int NOT NULL,
  `dsc_collect_date` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `dsc_amount` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `dsc_payment_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `dsc_created_at` timestamp NOT NULL,
  PRIMARY KEY (`dsc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dps_account`
--

DROP TABLE IF EXISTS `dps_account`;
CREATE TABLE IF NOT EXISTS `dps_account` (
  `dps_acc_id` int NOT NULL AUTO_INCREMENT,
  `dps_acc_plan_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `dps_acc_member_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `dps_acc_reg_date` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `dps_acc_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dps_acc_total_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dps_acc_fine` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dps_acc_status` int DEFAULT NULL,
  `dps_acc_created_at` timestamp(6) NOT NULL,
  PRIMARY KEY (`dps_acc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dps_account`
--

INSERT INTO `dps_account` (`dps_acc_id`, `dps_acc_plan_id`, `dps_acc_member_id`, `dps_acc_reg_date`, `dps_acc_amount`, `dps_acc_total_amount`, `dps_acc_fine`, `dps_acc_status`, `dps_acc_created_at`) VALUES
(4, '22', '12', '2023-09-21', '66000', '66000', NULL, 1, '2005-09-23 04:30:34.000000');

-- --------------------------------------------------------

--
-- Table structure for table `dps_plan`
--

DROP TABLE IF EXISTS `dps_plan`;
CREATE TABLE IF NOT EXISTS `dps_plan` (
  `dps_plan_id` int NOT NULL AUTO_INCREMENT,
  `dps_plan_name` text COLLATE utf8mb4_general_ci,
  `dps_plan_installment` text COLLATE utf8mb4_general_ci,
  `dps_plan_amount` text COLLATE utf8mb4_general_ci,
  `dps_plan_interest` text COLLATE utf8mb4_general_ci,
  `dps_plan_pay_type` text COLLATE utf8mb4_general_ci,
  `dps_plan_image` text COLLATE utf8mb4_general_ci,
  `dps_plan_status` int NOT NULL,
  `dps_plan_total_amount` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `dps_plan_create_at` timestamp(6) NOT NULL,
  PRIMARY KEY (`dps_plan_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dps_plan`
--

INSERT INTO `dps_plan` (`dps_plan_id`, `dps_plan_name`, `dps_plan_installment`, `dps_plan_amount`, `dps_plan_interest`, `dps_plan_pay_type`, `dps_plan_image`, `dps_plan_status`, `dps_plan_total_amount`, `dps_plan_create_at`) VALUES
(12, 'Gold Plan', '12', '5000', '10', '1', 'gURPcSJAeh.jpg', 1, '66000', '2005-09-23 04:30:14.000000');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

DROP TABLE IF EXISTS `expense`;
CREATE TABLE IF NOT EXISTS `expense` (
  `expense_id` int NOT NULL AUTO_INCREMENT,
  `expense_name` varchar(400) COLLATE utf8mb4_general_ci NOT NULL,
  `expense_type` varchar(400) COLLATE utf8mb4_general_ci NOT NULL,
  `expense_amount` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `expense_date` varchar(400) COLLATE utf8mb4_general_ci NOT NULL,
  `expense_payment_type` varchar(400) COLLATE utf8mb4_general_ci NOT NULL,
  `expense_description` varchar(400) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`expense_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expense_id`, `expense_name`, `expense_type`, `expense_amount`, `expense_date`, `expense_payment_type`, `expense_description`) VALUES
(30, 'Karim', 'Internet Bill ', '5000', '2023-06-05', '1', ''),
(29, 'Shelly Hansen', 'Electricity Bill', '1000', '2023-09-05', '1', 'Lorem officia est s');

-- --------------------------------------------------------

--
-- Table structure for table `fdr_account`
--

DROP TABLE IF EXISTS `fdr_account`;
CREATE TABLE IF NOT EXISTS `fdr_account` (
  `fdr_id` int NOT NULL AUTO_INCREMENT,
  `fdr_member_id` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fdr_amount` varchar(400) COLLATE utf8mb4_general_ci NOT NULL,
  `fdr_register_date` varchar(400) COLLATE utf8mb4_general_ci NOT NULL,
  `fdr_target_year` varchar(400) COLLATE utf8mb4_general_ci NOT NULL,
  `fdr_interest` varchar(400) COLLATE utf8mb4_general_ci NOT NULL,
  `fdr_interest_amount` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `fdr_status` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fdr_created_at` timestamp(6) NOT NULL,
  PRIMARY KEY (`fdr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fdr_account`
--

INSERT INTO `fdr_account` (`fdr_id`, `fdr_member_id`, `fdr_amount`, `fdr_register_date`, `fdr_target_year`, `fdr_interest`, `fdr_interest_amount`, `fdr_status`, `fdr_created_at`) VALUES
(6, '22', '100000', '2023-09-05', '5', '10', '10000.00', '1', '0000-00-00 00:00:00.000000'),
(8, '22', '100000', '2023-09-05', '4', '.808', '808.00', '1', '2005-09-22 20:54:35.000000'),
(7, '21', '10000', '2023-09-05', '5', '5', '500.00', '1', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `guarantor`
--

DROP TABLE IF EXISTS `guarantor`;
CREATE TABLE IF NOT EXISTS `guarantor` (
  `guarantor_id` int NOT NULL AUTO_INCREMENT,
  `guarantor_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `guarantor_occu` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `guarantor_phone` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `guarantor_email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `guarantor_address` text COLLATE utf8mb4_general_ci NOT NULL,
  `guarantor_related` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`guarantor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guarantor`
--

INSERT INTO `guarantor` (`guarantor_id`, `guarantor_name`, `guarantor_occu`, `guarantor_phone`, `guarantor_email`, `guarantor_address`, `guarantor_related`) VALUES
(1, 'Amery Browning', 'Animi do sint dolo', '+1 (724) 958-8016', 'cenidy@mailinator.com', 'Qui ut deserunt dolo', 'Do aut odio repudian'),
(2, 'Yardley Talley', 'Nulla neque nisi inc', '+1 (324) 302-7954', 'dytifyq@mailinator.com', 'Occaecat quia molest', 'Sunt neque non fugi'),
(3, 'Miranda Coleman', 'Qui consequatur Vol', '+1 (417) 772-6021', 'miruxagy@mailinator.com', 'Debitis adipisci ame', 'Est provident repre');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

DROP TABLE IF EXISTS `income`;
CREATE TABLE IF NOT EXISTS `income` (
  `income_id` int NOT NULL AUTO_INCREMENT,
  `income_name` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `income_type` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `income_amount` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `income_date` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `income_payment_type` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `income_description` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`income_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`income_id`, `income_name`, `income_type`, `income_amount`, `income_date`, `income_payment_type`, `income_description`) VALUES
(12, 'Karim', 'Income', '5000', '2023-09-05', '1', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `invest`
--

DROP TABLE IF EXISTS `invest`;
CREATE TABLE IF NOT EXISTS `invest` (
  `invest_id` int NOT NULL AUTO_INCREMENT,
  `invest_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `invest_amount` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `invest_date` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `invest_payment_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `invest_person_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `invest_person_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `invest_person_number` int NOT NULL,
  `invest_person_address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `invest_description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`invest_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invest`
--

INSERT INTO `invest` (`invest_id`, `invest_type`, `invest_amount`, `invest_date`, `invest_payment_type`, `invest_person_name`, `invest_person_id`, `invest_person_number`, `invest_person_address`, `invest_description`) VALUES
(1, 'প্রাইভেট কার', '500000', '2023-09-03', '1', 'মোনায়েম', '64654654', 6524654, 'তাতিহাটি, শ্রীবরদী, শেরপুর, ময়মনসিংহ', 'ভাড়া চালানোর জন্য গাড়ি ক্রয়\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

DROP TABLE IF EXISTS `loans`;
CREATE TABLE IF NOT EXISTS `loans` (
  `loans_id` int NOT NULL AUTO_INCREMENT,
  `loans_member_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `loans_product_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `loans_guarantor_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `loans_registration_date` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `loans_pay_date` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `loans_paid_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1 = Cash, 2  = Check, 3 = Other',
  `loans_amount` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `loan_amount_left` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `loans_payment_amount` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `loans_profit_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `loans_profit_rate` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `loans_profit_daily_installment` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `loans_profit_installments` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `loans_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`loans_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`loans_id`, `loans_member_id`, `loans_product_id`, `loans_guarantor_id`, `loans_registration_date`, `loans_pay_date`, `loans_paid_type`, `loans_amount`, `loan_amount_left`, `loans_payment_amount`, `loans_profit_type`, `loans_profit_rate`, `loans_profit_daily_installment`, `loans_profit_installments`, `loans_description`) VALUES
(14, '24', '1', '3', '2023-09-04', '', '1', '50000', '', '4583', 'NA', '10', '12', '12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loan_products`
--

DROP TABLE IF EXISTS `loan_products`;
CREATE TABLE IF NOT EXISTS `loan_products` (
  `loan_products_id` int NOT NULL AUTO_INCREMENT,
  `loan_products_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`loan_products_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loan_products`
--

INSERT INTO `loan_products` (`loan_products_id`, `loan_products_name`) VALUES
(1, 'মোবাইল ফোন');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `member_id` int NOT NULL AUTO_INCREMENT,
  `member_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `member_father_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `member_mother_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `member_officer` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `member_registration_date` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `member_business` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `member_dob` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `member_nid` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `member_gender` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `member_occupation` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `member_religion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `member_email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `member_phone` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `member_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `member_address` text COLLATE utf8mb4_general_ci NOT NULL,
  `member_image` text COLLATE utf8mb4_general_ci NOT NULL,
  `member_nominee_relation` text COLLATE utf8mb4_general_ci,
  `member_nominee_name` text COLLATE utf8mb4_general_ci,
  `member_nominee_dob` text COLLATE utf8mb4_general_ci,
  `member_nominee_phone` text COLLATE utf8mb4_general_ci,
  `member_nominee_nid` text COLLATE utf8mb4_general_ci,
  `member_nominee_gender` text COLLATE utf8mb4_general_ci,
  `member_nominee_address` text COLLATE utf8mb4_general_ci,
  `member_create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_name`, `member_father_name`, `member_mother_name`, `member_officer`, `member_registration_date`, `member_business`, `member_dob`, `member_nid`, `member_gender`, `member_occupation`, `member_religion`, `member_email`, `member_phone`, `member_amount`, `member_address`, `member_image`, `member_nominee_relation`, `member_nominee_name`, `member_nominee_dob`, `member_nominee_phone`, `member_nominee_nid`, `member_nominee_gender`, `member_nominee_address`, `member_create_at`) VALUES
(22, 'শফিকুল ইসলাম ', 'Nora Patterson', 'Pamela Murphy', '6', '1985-05-13', 'শফিকুল মুদি দোকান ', '1987-08-09', '876', '3', 'Qui est irure volupt', '1', 'becotugyj@mailinator.com', '+1 (552) 834-3253', '284', 'Qui explicabo Id eu', 'sCZh6yJieA.jpg', '3', 'Reese Serrano', '2019-02-10', '+1 (889) 848-6061', '141', '1', '+1 (329) 122-8909', '2023-08-28 08:37:39'),
(21, 'বাধন ইসলাম', 'Avye Barrera', 'Chaim Hopkins', '6', '1978-04-08', 'বাধন বস্ত্রালয় ', '1982-10-22', '428', '1', 'Totam delectus atqu', 'Select Religion', 'vuberakevu@mailinator.com', '+1 (688) 586-6446', '666', 'Quaerat esse aliquam', 'MQ2k6niGra.jpg', '3', 'Kibo Holt', '2012-02-29', '+1 (455) 115-6387', '983', '1', '+1 (517) 605-3444', '2023-08-28 08:36:23'),
(23, 'দেব চৌধুরী ', 'Quintessa Spencer', 'Candice Hickman', '6', '1971-10-07', 'দেব চৌধুরী ষ্টোর ', '1986-11-23', '257', '1', 'Amet unde ut sit ea', 'Select Religion', 'kykup@mailinator.com', '+1 (519) 613-1633', '49', 'Sunt non voluptas qu', 'FCvxWK0noE.jpg', '5', 'Xantha Miles', '2002-06-06', '+1 (144) 209-9808', '347', '3', '+1 (276) 969-8426', '2023-08-28 08:40:30'),
(24, 'সোনা মিয়া ', 'Marcia Lynn', 'Kylee Wilkinson', '6', '2015-08-15', 'সোনা মিয়া চা স্টল', '1994-02-05', '782', '2', 'Omnis deserunt vero ', 'Select Religion', 'veqyjoded@mailinator.com', '+1 (258) 675-4544', '50000', 'Ipsam cupidatat cons', 'BGUPDSIZbL.jpg', '2', 'Ina Alvarado', '1992-02-01', '+1 (782) 896-2357', '939', '1', '+1 (407) 467-2169', '2023-08-28 08:41:46');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

DROP TABLE IF EXISTS `notice`;
CREATE TABLE IF NOT EXISTS `notice` (
  `not_id` int NOT NULL AUTO_INCREMENT,
  `not_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `not_category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `not_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `not_thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`not_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`not_id`, `not_title`, `not_category`, `not_description`, `not_thumbnail`) VALUES
(4, ' ভূমিসেবা সপ্তাহ-২০২৩ (২২-২৮ মে) সংক্রান্ত', 'Voluptatum doloremqu', 'hlw', 'O6xW7wlpJH.jpg'),
(3, ' অফিস আদেশ (জনাব উজ্জ্বল কুমার ঘোষ(১৬৪৩২)(উপসচিব), অতিরিক্ত জেলা প্রশাসক(রাজস্ব), বগুড়াকে অবমুক্তকরণ সংক্রান্ত)', 'Reprehenderit porro', 'অফিস আদেশ (জনাব উজ্জ্বল কুমার ঘোষ(১৬৪৩২)(উপসচিব), অতিরিক্ত জেলা প্রশাসক(রাজস্ব), বগুড়াকে অবমুক্তকরণ সংক্রান্ত)\nঅফিস আদেশ (জনাব উজ্জ্বল কুমার ঘোষ(১৬৪৩২)(উপসচিব), অতিরিক্ত জেলা প্রশাসক(রাজস্ব), বগুড়াকে অবমুক্তকরণ সংক্রান্ত)\nঅফিস আদেশ (জনাব উজ্জ্বল কুমার ঘোষ(১৬৪৩২)(উপসচিব), অতিরিক্ত জেলা প্রশাসক(রাজস্ব), বগুড়াকে অবমুক্তকরণ সংক্রান্ত)\nঅফিস আদেশ (জনাব উজ্জ্বল কুমার ঘোষ(১৬৪৩২)(উপসচিব), অতিরিক্ত জেলা প্রশাসক(রাজস্ব), বগুড়াকে অবমুক্তকরণ সংক্রান্ত)\nঅফিস আদেশ (জনাব উজ্জ্বল কুমার ঘোষ(১৬৪৩২)(উপসচিব), অতিরিক্ত জেলা প্রশাসক(রাজস্ব), বগুড়াকে অবমুক্তকরণ সংক্রান্ত)\nঅফিস আদেশ (জনাব উজ্জ্বল কুমার ঘোষ(১৬৪৩২)(উপসচিব), অতিরিক্ত জেলা প্রশাসক(রাজস্ব), বগুড়াকে অবমুক্তকরণ সংক্রান্ত)\nঅফিস আদেশ (জনাব উজ্জ্বল কুমার ঘোষ(১৬৪৩২)(উপসচিব), অতিরিক্ত জেলা প্রশাসক(রাজস্ব), বগুড়াকে অবমুক্তকরণ সংক্রান্ত)\nঅফিস আদেশ (জনাব উজ্জ্বল কুমার ঘোষ(১৬৪৩২)(উপসচিব), অতিরিক্ত জেলা প্রশাসক(রাজস্ব), বগুড়াকে অবমুক্তকরণ সংক্রান্ত)\nঅফিস আদেশ (জনাব উজ্জ্বল কুমার ঘোষ(১৬৪৩২)(উপসচিব), অতিরিক্ত জেলা প্রশাসক(রাজস্ব), বগুড়াকে অবমুক্তকরণ সংক্রান্ত)\n', 'asnPCr4KcM.jpg'),
(5, ' জনাব মোঃ মাসুদ প্রামানিক, অফিস সহায়ক, জেলা প্রশাসকের কার্যালয়, বগুড়া এর (বহি: বাংলাদেশ) ছুটি সংক্রান্ত অফিস আদেশ', 'Debitis expedita con', '                                                                        Commodo ea ea quam e                                                                ', 'QcrokDT1EW.jpg'),
(7, 'শেখ রাসেল পদক ২০২৩ এর জন্য আবেদন আহবান।', 'Impedit pariatur V', '                                                                                   \r\n                                          fsfsdfsdf                                ', 'tiP8nDLGV7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `officer`
--

DROP TABLE IF EXISTS `officer`;
CREATE TABLE IF NOT EXISTS `officer` (
  `officer_id` int NOT NULL AUTO_INCREMENT,
  `officer_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `officer_salary` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `officer_phone` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `officer_nid` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `officer_father_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `officer_mother_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `officer_registration_date` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `officer_dob` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `officer_gender` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `officer_religion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `officer_email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `officer_address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `officer_image` text COLLATE utf8mb4_general_ci NOT NULL,
  `officer_status` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `officer_type` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `officer_username` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `officer_password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `officer_create_at` timestamp NOT NULL,
  PRIMARY KEY (`officer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `officer`
--

INSERT INTO `officer` (`officer_id`, `officer_name`, `officer_salary`, `officer_phone`, `officer_nid`, `officer_father_name`, `officer_mother_name`, `officer_registration_date`, `officer_dob`, `officer_gender`, `officer_religion`, `officer_email`, `officer_address`, `officer_image`, `officer_status`, `officer_type`, `officer_username`, `officer_password`, `officer_create_at`) VALUES
(5, 'মোছা. সাদিকা বেগম ', '51000', '+1 (624) 168-2858', '47', 'Hadassah Gregory', 'Neil Schultz', '1985-11-21', '2010-06-10', '2', '2', 'jova@mailinator.com', 'Dolore ut obcaecati ', 's21xHt8hck.jpg', '1', 'field_worker', '819063', '396198', '0000-00-00 00:00:00'),
(2, 'স্বপন সাহা', '12000', '+1 (423) 316-1767', '560', 'Baker Guzman', 'Veronica Spence', '1985-11-21', '1970-07-06', '2', '2', 'gesusyky@mailinator.com', 'Aute sunt dolores e', 'oZ4vcXB8Dk.jpg', '1', 'field_worker', '', '', '0000-00-00 00:00:00'),
(6, 'সুমন ইসলাম', '5000', '+1 (422) 584-4161', '229444848458484', 'বারেক মিয়া', 'খাদিজা বেগম ', '1985-11-21', '2000-07-18', '1', '1', 'bogoryp@mailinator.com', 'Commodo excepteur et', 'FlEzbdiK5c.jpg', '1', 'manager', '974550', '608723', '0000-00-00 00:00:00'),
(7, 'নির্মল কুমার', NULL, '+1 (304) 714-9965', '696', 'অমল কুমার', 'কাদম্বরী রানী ', '2007-01-12', '2023-08-22', 'Select Gender', 'Select Religion', 'gykuca@mailinator.com', 'Impedit ad dolorem ', 'RzqNXQPFKl.jpg', '2', 'field_worker', '288340', '454591', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `office_wallet`
--

DROP TABLE IF EXISTS `office_wallet`;
CREATE TABLE IF NOT EXISTS `office_wallet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `o_w_total_balance` int NOT NULL,
  `o_w_total_assets` int NOT NULL,
  `o_w_total_income` int NOT NULL,
  `o_w_total_expense` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `pages_id` int NOT NULL AUTO_INCREMENT,
  `pages_title` varchar(3000) COLLATE utf8mb4_general_ci NOT NULL,
  `pages_image` text COLLATE utf8mb4_general_ci NOT NULL,
  `pages_description` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` date NOT NULL,
  PRIMARY KEY (`pages_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pages_id`, `pages_title`, `pages_image`, `pages_description`, `create_at`) VALUES
(1, 'আমাদের সম্পর্কে', 'gai8E7lzSv.jpg', '<p>অ্যাডপিসিং প্রক্রিয়ার দিকে মনোযোগ দেওয়া গ্রাহকের জন্য খুবই গুরুত্বপূর্ণ। আমি দরজা খুলব, আমি চাটুকারে তার যন্ত্রণা ব্যাখ্যা করব, এবং কেউ জিজ্ঞাসা করবে না যেন সে দোষী! যাইহোক, অপরাধবোধের যন্ত্রণা এই ফাইন্ডিং ফ্লাইট মহান, ছোট প্রয়োজন, পরিত্রাণ পেতে, আমরা কি গ্রহণ করতে অস্বীকার করতে পারি? কিন্তু সত্যের সত্যতা কী? আমরা তাকে আনন্দের দ্বারা আবদ্ধ হওয়ার অভিযোগ করি। অ্যাডপিসিং প্রক্রিয়ার দিকে মনোযোগ দেওয়া গ্রাহকের জন্য খুবই গুরুত্বপূর্ণ। যাইহোক, নির্বাচিত ত্রুটিটি প্রত্যাখ্যান করার জন্য একটি দুর্দান্ত বিনামূল্যে উপহার হিসাবে পরিণত হবে। অভিযুক্তদের পরিণতি, তার প্রশিক্ষণের বেদনা দ্বারা নির্বাচিত, এই এক আমাদের অধিকাংশ পলায়ন যাক, আমরা যে কেউ কর্তব্য করতে পারেন না, কারণ কেউ প্রায়ই কোন নেই! বেদনা নিতে এবং তোষামোদ করার জন্য, যে কোনো কারণে যারা তার প্রশংসা করে তাদের প্রয়োজনে সে দ্রুত পালিয়ে যায়। খুব</p>', '2023-06-24');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

DROP TABLE IF EXISTS `salary`;
CREATE TABLE IF NOT EXISTS `salary` (
  `salary_id` int NOT NULL AUTO_INCREMENT,
  `salary_officer_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `salary_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `provident_percent` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `totalpf` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `salary_date` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `salary_month` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `salary_bonus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total_salary` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `salary_paid_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `salary_created_at` timestamp(6) NOT NULL,
  PRIMARY KEY (`salary_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `saving_account`
--

DROP TABLE IF EXISTS `saving_account`;
CREATE TABLE IF NOT EXISTS `saving_account` (
  `sa_id` int NOT NULL AUTO_INCREMENT,
  `sa_member_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sa_plan_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sa_time_daywise` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sa_total_year` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sa_total_target` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sa_opening_date` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sa_description` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `sa_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sa_created_at` timestamp NOT NULL,
  PRIMARY KEY (`sa_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saving_account`
--

INSERT INTO `saving_account` (`sa_id`, `sa_member_id`, `sa_plan_id`, `sa_time_daywise`, `sa_total_year`, `sa_total_target`, `sa_opening_date`, `sa_description`, `sa_status`, `sa_created_at`) VALUES
(7, '23', '1', '4', '2', '2000', '2023-09-04', 'Test', 'Active', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `saving_plan`
--

DROP TABLE IF EXISTS `saving_plan`;
CREATE TABLE IF NOT EXISTS `saving_plan` (
  `saving_plan_id` int NOT NULL AUTO_INCREMENT,
  `saving_plan_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `saving_plan_amount` text COLLATE utf8mb4_general_ci NOT NULL,
  `saving_plan_interest` text COLLATE utf8mb4_general_ci,
  `saving_plan_interest_give` text COLLATE utf8mb4_general_ci,
  `saving_plan_description` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`saving_plan_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saving_plan`
--

INSERT INTO `saving_plan` (`saving_plan_id`, `saving_plan_name`, `saving_plan_amount`, `saving_plan_interest`, `saving_plan_interest_give`, `saving_plan_description`, `created_at`) VALUES
(1, 'Scheme Plan 1', '100', '5', '10', 'Explicabo Esse vita', '0000-00-00 00:00:00'),
(2, 'Scheme Plan 2', '200', '5', '2', 'Nihil asperiores fug', '0000-00-00 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
