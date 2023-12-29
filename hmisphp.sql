-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2023 at 12:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmisphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `his_accounts`
--

CREATE TABLE `his_accounts` (
  `acc_id` int(200) NOT NULL,
  `acc_name` varchar(200) DEFAULT NULL,
  `acc_desc` text DEFAULT NULL,
  `acc_type` varchar(200) DEFAULT NULL,
  `acc_number` varchar(200) DEFAULT NULL,
  `acc_amount` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `his_accounts`
--

INSERT INTO `his_accounts` (`acc_id`, `acc_name`, `acc_desc`, `acc_type`, `acc_number`, `acc_amount`) VALUES
(1, 'Individual Retirement Account', '<p>IRA&rsquo;s are simply an account where you stash your money for retirement. The concept is pretty simple, your account balance is not taxed UNTIL you withdraw, at which point you pay the taxes there. This allows you to grow your account with interest without taxes taking away from the balance. The net result is you earn more money.</p>', 'Payable Account', '518703294', '25000'),
(2, 'Equity Bank', '<p>Find <em>bank account</em> stock <em>images</em> in HD and millions of other royalty-free stock photos, illustrations and vectors in the Shutterstock collection. Thousands of new</p>', 'Receivable Account', '753680912', '12566'),
(3, 'Test Account Name', '<p>This is a demo test</p>', 'Payable Account', '620157843', '1100');

-- --------------------------------------------------------

--
-- Table structure for table `his_admin`
--

CREATE TABLE `his_admin` (
  `ad_id` int(20) NOT NULL,
  `ad_number` varchar(200) DEFAULT NULL,
  `ad_fname` varchar(200) DEFAULT NULL,
  `ad_lname` varchar(200) DEFAULT NULL,
  `ad_email` varchar(200) DEFAULT NULL,
  `ad_pwd` varchar(200) DEFAULT NULL,
  `ad_dpic` varchar(200) DEFAULT NULL,
  `ad_type` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `his_admin`
--

INSERT INTO `his_admin` (`ad_id`, `ad_number`, `ad_fname`, `ad_lname`, `ad_email`, `ad_pwd`, `ad_dpic`, `ad_type`) VALUES
(5, 'AD-805473', 'Nilo', 'Velarde', 'nil@gmail.com', 'fe703d258c7ef5f50b71e06565a65aa07194907f', 'WIN_20230825_08_57_04_Pro.jpg', 'System_Admin'),
(6, 'AD-387950', 'Ryan', 'Villarante', 'ryan@gmail.com', 'fe703d258c7ef5f50b71e06565a65aa07194907f', '5f08412588763cde728ebaa84d16e7d6.jpg', 'System_Admin'),
(7, 'AD-158960', 'test edit', 'supadmin', 'test@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', '1164403.jpg', 'System_Admin');

-- --------------------------------------------------------

--
-- Table structure for table `his_ancillary`
--

CREATE TABLE `his_ancillary` (
  `render_id` int(20) NOT NULL,
  `render_code` varchar(200) NOT NULL,
  `render_name` varchar(200) NOT NULL,
  `render_pat_type` varchar(200) NOT NULL,
  `render_age` varchar(200) NOT NULL,
  `render_room_number` varchar(200) NOT NULL,
  `render_req_number` varchar(200) NOT NULL,
  `render_req_date` date NOT NULL,
  `render_req_doc` varchar(200) NOT NULL,
  `render_doc_number` varchar(200) NOT NULL,
  `render_perform` varchar(200) NOT NULL,
  `render_date_time` date NOT NULL,
  `render_amount` varchar(200) NOT NULL,
  `render_reg_number` varchar(200) NOT NULL,
  `render_or_number` varchar(200) NOT NULL,
  `render_payment` varchar(200) NOT NULL,
  `render_payer_name` varchar(200) NOT NULL,
  `render_by` varchar(200) NOT NULL,
  `render_case` varchar(200) DEFAULT NULL,
  `render_trans` varchar(200) DEFAULT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `his_ancillary`
--

INSERT INTO `his_ancillary` (`render_id`, `render_code`, `render_name`, `render_pat_type`, `render_age`, `render_room_number`, `render_req_number`, `render_req_date`, `render_req_doc`, `render_doc_number`, `render_perform`, `render_date_time`, `render_amount`, `render_reg_number`, `render_or_number`, `render_payment`, `render_payer_name`, `render_by`, `render_case`, `render_trans`, `paid`) VALUES
(88, '', 'Marlo cute', 'OutPatient', '0', '', '', '2023-11-29', 'Ira Pongasi', 'CH-4298', '', '0000-00-00', '', '', '', '₱ 100', 'Marlo cute', 'Nilo Velarde  -Admin', '381206', '07268', 1);

-- --------------------------------------------------------

--
-- Table structure for table `his_assets`
--

CREATE TABLE `his_assets` (
  `asst_id` int(20) NOT NULL,
  `asst_name` varchar(200) DEFAULT NULL,
  `asst_desc` longtext DEFAULT NULL,
  `asst_vendor` varchar(200) DEFAULT NULL,
  `asst_status` varchar(200) DEFAULT NULL,
  `asst_dept` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `his_beds`
--

CREATE TABLE `his_beds` (
  `bed_id` int(20) NOT NULL,
  `room_id` int(20) NOT NULL,
  `bed_number` varchar(200) DEFAULT NULL,
  `bed_status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `his_beds`
--

INSERT INTO `his_beds` (`bed_id`, `room_id`, `bed_number`, `bed_status`) VALUES
(136, 58, '4 - 1', 'Available'),
(137, 58, '4 - 2', 'Available'),
(138, 58, '4 - 3', 'Available'),
(139, 58, '4 - 4', 'Available'),
(140, 58, '4 - 5', 'Available'),
(141, 59, 'test 4 - 1', 'Available'),
(142, 59, 'test 4 - 2', 'Available'),
(143, 59, 'test 4 - 3', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `his_cash`
--

CREATE TABLE `his_cash` (
  `cash_id` int(20) NOT NULL,
  `cash_or_number` varchar(200) DEFAULT NULL,
  `cash_date` date DEFAULT NULL,
  `cash_payer` varchar(200) DEFAULT NULL,
  `cash_amount` int(50) DEFAULT NULL,
  `cash_check` int(20) DEFAULT NULL,
  `cash_credit` int(20) DEFAULT NULL,
  `cash_applied` int(20) DEFAULT NULL,
  `uamount` int(20) DEFAULT NULL,
  `cash_cashier` varchar(200) DEFAULT NULL,
  `cash_remark` varchar(200) DEFAULT NULL,
  `discounttype` int(20) NOT NULL,
  `discountAmount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `his_cash`
--

INSERT INTO `his_cash` (`cash_id`, `cash_or_number`, `cash_date`, `cash_payer`, `cash_amount`, `cash_check`, `cash_credit`, `cash_applied`, `uamount`, `cash_cashier`, `cash_remark`, `discounttype`, `discountAmount`) VALUES
(41, 'OR1-576932', '2023-11-29', 'Kresshan Mante', 888, 0, 0, 666, 0, 'System_admin', 'paid', 0, 222),
(42, 'OR1-672034', '2023-11-29', 'test Mante', 7777, 0, 0, 7000, 0, 'System_admin', '', 0, 777),
(43, 'OR1-167593', '2023-11-29', 'Marlo cute', 7001, 0, 0, 7000, 0, 'System_admin', '', 0, 1401),
(44, 'OR1-610528', '2023-11-29', 'Marvin serok', 1111, 0, 0, 0, 1111, 'System_admin', '', 0, 111),
(45, 'OR1-348257', '2023-11-29', 'test 2 outpatient infostaff update-test 2', 111, 0, 0, 0, 111, 'System_admin', '', 0, 11),
(46, 'OR1-635710', '2023-11-29', 'Marlo cute', 111, 0, 0, 100, 0, 'System_admin', '', 0, 26);

-- --------------------------------------------------------

--
-- Table structure for table `his_cbc`
--

CREATE TABLE `his_cbc` (
  `up_id` int(20) NOT NULL,
  `up_number` varchar(200) NOT NULL,
  `up_name` varchar(200) NOT NULL,
  `wbc` varchar(200) NOT NULL,
  `seg` varchar(200) NOT NULL,
  `lym` int(20) NOT NULL,
  `mon` int(20) NOT NULL,
  `eos` int(20) NOT NULL,
  `bas` int(20) NOT NULL,
  `rbc` int(20) NOT NULL,
  `hgb` int(20) NOT NULL,
  `hct` int(20) NOT NULL,
  `mcv` int(20) NOT NULL,
  `mch` int(20) NOT NULL,
  `mchc` int(20) NOT NULL,
  `plt` int(20) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `cbc_pic` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `his_cbc`
--

INSERT INTO `his_cbc` (`up_id`, `up_number`, `up_name`, `wbc`, `seg`, `lym`, `mon`, `eos`, `bas`, `rbc`, `hgb`, `hct`, `mcv`, `mch`, `mchc`, `plt`, `remarks`, `cbc_pic`) VALUES
(1, '', 'Marvin serok', '6', '55', 44, 12, 7, 1, 4, 13, 50, 88, 33, 33, 155, '0', ''),
(2, '', 'Marvin serok', '6', '55', 44, 12, 7, 1, 4, 13, 50, 88, 33, 33, 155, 'low platelete', ''),
(3, '', 'Nilo Velarde', '6', '55', 44, 12, 7, 1, 4, 13, 50, 88, 33, 33, 155, 'low platelet count', ''),
(4, '', 'Marlo cute', '6', '55', 44, 12, 7, 1, 4, 13, 50, 88, 33, 33, 155, 'low platelets', ''),
(5, '', 'test inpatient 2', '6', '55', 44, 12, 7, 1, 4, 13, 50, 88, 33, 33, 155, 'low platelet count', ''),
(6, '', 'test inpatient infostaff update', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
(7, '', 'Marlo cute', '6', '55', 44, 12, 7, 1, 4, 13, 50, 88, 33, 33, 155, 'test', ''),
(8, '', 'Marvin serok', '6', '55', 44, 12, 7, 1, 4, 13, 50, 88, 33, 33, 155, 'cbc_pic', NULL),
(9, '', 'test inpatient 2', '6', '55', 44, 12, 7, 1, 4, 13, 50, 88, 33, 33, 155, 'cbc_pic', NULL),
(10, '', 'test inpatient infostaff update', '6', '55', 44, 12, 7, 1, 4, 13, 50, 88, 33, 33, 155, 'cbc_pic test 3', '539380.jpg'),
(11, '', 'Marvin serok', '6', '55', 44, 12, 7, 1, 4, 13, 50, 88, 33, 33, 155, 'mawala nasd ni', '355234531_2178565789016325_184721746294664547_n.jpg'),
(12, '', 'test outpatient infostaff update-test', '6', '55', 44, 12, 7, 1, 4, 13, 50, 88, 33, 33, 155, 'mawala part 2', '57da87c0c1b2aea1188360e93b8aea90.jpg'),
(13, '', '', '6', '55', 44, 12, 7, 1, 4, 13, 50, 88, 33, 33, 155, 'test ', '365306947_1079465179693456_8221003165730611225_n.jpg'),
(14, '', '', '6', '55', 44, 12, 7, 1, 4, 13, 50, 88, 33, 33, 155, 'hashash', ''),
(15, '', '', '2', '2', 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, '2', '5b17949ee262ffdd5ead935ec6d050fe.jpg'),
(16, '', '', '2', '2', 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, '', ''),
(17, '', '', '2', '4', 1, 3, 1, 2, 1, 2, 1, 2, 1, 2, 1, '1', '329235835_738912984213022_8239709874849123590_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `his_docs`
--

CREATE TABLE `his_docs` (
  `doc_id` int(20) NOT NULL,
  `doc_fname` varchar(200) DEFAULT NULL,
  `doc_lname` varchar(200) DEFAULT NULL,
  `doc_email` varchar(200) DEFAULT NULL,
  `doc_pwd` varchar(200) DEFAULT NULL,
  `doc_dept` varchar(200) DEFAULT NULL,
  `doc_role` varchar(200) DEFAULT NULL,
  `doc_number` varchar(200) DEFAULT NULL,
  `doc_cat` varchar(200) DEFAULT NULL,
  `doc_fee` int(50) DEFAULT NULL,
  `doc_dpic` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `his_docs`
--

INSERT INTO `his_docs` (`doc_id`, `doc_fname`, `doc_lname`, `doc_email`, `doc_pwd`, `doc_dept`, `doc_role`, `doc_number`, `doc_cat`, `doc_fee`, `doc_dpic`) VALUES
(50, 'Ira', 'Pongasi', 'ira@gmail.com', NULL, 'Pathology', 'Attending', '6RSPF', 'Regular Consultant', 1000, NULL),
(51, 'Nilo', 'Velarde', 'nilvel1999@gmail.com', NULL, 'Dermatology', 'Admitting', '89JX0', 'Resident', 4000, NULL),
(54, 'Test', '1', 'test@gmail.com', NULL, 'Gynecology', 'Attending', 'HVUSM', 'Visiting Consultant', 9000, NULL),
(57, 'Sandra', 'Salas', 'test@gmail.com', NULL, 'Dermatology', 'Attending', 'IV4RH', 'Regular Consultant', 345, NULL),
(58, 'Desiree', 'Dean', 'dean@gmail.com', NULL, 'Emergency medicine', 'Attending', '29RCU', 'Visiting Consultant', 12345, NULL),
(59, 'Jimuel ', 'Sewok', 'test@gmail.com', NULL, 'Gastroenterology', 'Attending', 'QK0A2', 'Visiting Consultant', 4222, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `his_emergency`
--

CREATE TABLE `his_emergency` (
  `eme_id` int(20) NOT NULL,
  `eme_Pname` varchar(200) DEFAULT NULL,
  `eme_Pid` varchar(200) DEFAULT NULL,
  `eme_case` varchar(200) DEFAULT NULL,
  `eme_DateTime` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `eme_series` varchar(200) DEFAULT NULL,
  `eme_area` varchar(200) DEFAULT NULL,
  `eme_bed` varchar(200) DEFAULT NULL,
  `eme_billed` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `his_equipments`
--

CREATE TABLE `his_equipments` (
  `item_id` int(20) NOT NULL,
  `item_code` varchar(200) DEFAULT NULL,
  `item_desc` varchar(200) DEFAULT NULL,
  `item_category` varchar(200) DEFAULT NULL,
  `item_abb` longtext DEFAULT NULL,
  `item_unit` varchar(200) DEFAULT NULL,
  `item_big` varchar(200) DEFAULT NULL,
  `item_conv` varchar(200) DEFAULT NULL,
  `item_bar` varchar(200) DEFAULT NULL,
  `item_price` decimal(65,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `his_equipments`
--

INSERT INTO `his_equipments` (`item_id`, `item_code`, `item_desc`, `item_category`, `item_abb`, `item_unit`, `item_big`, `item_conv`, `item_bar`, `item_price`) VALUES
(127, 'DRU415702', 'Biogesic', 'Drugs', 'BIOGESIC', 'Tablet', 'Tablet', '2', 'MEDS895416', 10),
(133, 'MEDS975038', 'test', 'Medicine', 'test12345', 'mg', 'none', '1', 'MEDS975038', 44),
(134, 'MEDS137640', 'DUREX CONDOM', 'Medicine', 'Condom', 'mg', 'none', '2', 'MEDS137640', 100);

-- --------------------------------------------------------

--
-- Table structure for table `his_examinations`
--

CREATE TABLE `his_examinations` (
  `exam_id` int(200) NOT NULL,
  `exam_code` varchar(200) DEFAULT NULL,
  `exam_category` varchar(200) DEFAULT NULL,
  `exam_desc` varchar(200) DEFAULT NULL,
  `exam_abb` varchar(200) DEFAULT NULL,
  `exam_unit` varchar(200) DEFAULT NULL,
  `exam_big` varchar(200) DEFAULT NULL,
  `exam_conv` varchar(200) DEFAULT NULL,
  `exam_bar` varchar(200) DEFAULT NULL,
  `exam_price` decimal(65,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `his_examinations`
--

INSERT INTO `his_examinations` (`exam_id`, `exam_code`, `exam_category`, `exam_desc`, `exam_abb`, `exam_unit`, `exam_big`, `exam_conv`, `exam_bar`, `exam_price`) VALUES
(32, '389764015', 'Laboratory Examinations', 'CBC', 'CBC', 'None', 'None', '1', '389764015', 7000),
(33, '783026945', 'X-Ray', 'ABDOMEN LATERAL DECUBITUS', 'ABDOMEN LATERAL DECUBITUS', 'None', 'None', '', '783026945', 1000),
(36, '731849260', '2D Echo', 'test exam', 'test exam', 'None', 'None', '', '731849260', 666);

-- --------------------------------------------------------

--
-- Table structure for table `his_fee`
--

CREATE TABLE `his_fee` (
  `fee_id` int(11) NOT NULL,
  `pat_id` int(50) NOT NULL,
  `fee_creditlimit` int(50) NOT NULL,
  `fee_bill` int(50) NOT NULL,
  `fee_professional` int(50) NOT NULL,
  `fee_deposit` int(50) NOT NULL,
  `fee_outstanding` int(50) NOT NULL,
  `fee_items_services` int(50) NOT NULL,
  `fee_rooms_beds` int(50) NOT NULL,
  `fee_receivable` int(50) NOT NULL,
  `fee_miscellaneous` int(50) NOT NULL,
  `fee_transaction` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `his_guarantors`
--

CREATE TABLE `his_guarantors` (
  `g_id` int(20) NOT NULL,
  `g_code` int(20) DEFAULT NULL,
  `g_gid` int(20) DEFAULT NULL,
  `g_name` varchar(200) DEFAULT NULL,
  `g_lname` varchar(200) DEFAULT NULL,
  `g_tele` int(20) DEFAULT NULL,
  `g_type` varchar(200) DEFAULT NULL,
  `g_email` varchar(200) DEFAULT NULL,
  `g_address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `his_guarantors`
--

INSERT INTO `his_guarantors` (`g_id`, `g_code`, `g_gid`, `g_name`, `g_lname`, `g_tele`, `g_type`, `g_email`, `g_address`) VALUES
(38, 20754, 85724931, 'Nilo', 'Velarde', 2147483647, 'HMO', 'nilvel1999@gmail.com', 'Sambag 1');

-- --------------------------------------------------------

--
-- Table structure for table `his_infostaff`
--

CREATE TABLE `his_infostaff` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(200) DEFAULT NULL,
  `user_lname` varchar(200) DEFAULT NULL,
  `user_email` varchar(200) DEFAULT NULL,
  `user_pwd` varchar(200) DEFAULT NULL,
  `user_dept` varchar(200) DEFAULT NULL,
  `user_number` varchar(200) DEFAULT NULL,
  `user_dpic` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `his_laboratory`
--

CREATE TABLE `his_laboratory` (
  `lab_id` int(20) NOT NULL,
  `lab_pat_name` varchar(200) DEFAULT NULL,
  `lab_pat_ailment` varchar(200) DEFAULT NULL,
  `lab_pat_number` varchar(200) DEFAULT NULL,
  `lab_pat_tests` longtext DEFAULT NULL,
  `lab_pat_results` longtext DEFAULT NULL,
  `lab_number` varchar(200) DEFAULT NULL,
  `lab_date_rec` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `his_medical_records`
--

CREATE TABLE `his_medical_records` (
  `mdr_id` int(20) NOT NULL,
  `mdr_number` varchar(200) DEFAULT NULL,
  `mdr_pat_name` varchar(200) DEFAULT NULL,
  `mdr_pat_adr` varchar(200) DEFAULT NULL,
  `mdr_pat_age` varchar(200) DEFAULT NULL,
  `mdr_pat_ailment` varchar(200) DEFAULT NULL,
  `mdr_pat_number` varchar(200) DEFAULT NULL,
  `mdr_pat_prescr` longtext DEFAULT NULL,
  `mdr_date_rec` timestamp(4) NOT NULL DEFAULT current_timestamp(4) ON UPDATE current_timestamp(4)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `his_medtech`
--

CREATE TABLE `his_medtech` (
  `med_id` int(20) NOT NULL,
  `med_fname` varchar(200) DEFAULT NULL,
  `med_lname` varchar(200) DEFAULT NULL,
  `med_email` varchar(200) DEFAULT NULL,
  `med_pwd` varchar(200) DEFAULT NULL,
  `med_dept` varchar(200) DEFAULT NULL,
  `med_number` varchar(200) DEFAULT NULL,
  `med_dpic` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `his_notify`
--

CREATE TABLE `his_notify` (
  `no_id` int(11) NOT NULL,
  `no_dept` varchar(200) NOT NULL,
  `no_pat_id` int(20) NOT NULL,
  `no_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `no_message` varchar(200) NOT NULL,
  `cleared` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `his_notify`
--

INSERT INTO `his_notify` (`no_id`, `no_dept`, `no_pat_id`, `no_date`, `no_message`, `cleared`) VALUES
(94, 'Billing', 279, '2023-11-27 15:11:38', 'Please tag patient Nicole Tan with the patient ID INP-479825 as cleared', 1),
(95, 'Billing', 303, '2023-11-27 15:29:21', 'Please tag patient Nilo Velarde with the patient ID INP-609532 as cleared', 1),
(100, 'Billing', 306, '2023-11-28 05:06:21', 'Please tag patient Gwen Bading with the patient ID INP-087592 as cleared', 1),
(101, 'Billing', 312, '2023-11-28 05:08:19', 'Please tag patient Gwen Bading with the patient ID INP-087592 as cleared', 1),
(102, 'Billing', 295, '2023-11-28 05:35:38', 'Please tag patient test1 emergency  with the patient ID EME-217539 as cleared', 1),
(103, 'Billing', 314, '2023-11-28 06:04:41', 'Please tag patient test add - update coding monday with the patient ID XLQPH as cleared', 1),
(105, 'Billing', 317, '2023-11-28 07:32:09', 'Please tag patient test infostaff add with the patient ID EME-627459 as cleared', 1),
(106, 'Billing', 316, '2023-11-28 07:32:50', 'Please tag patient test infostaff add with the patient ID EME-459802 as cleared', 1),
(109, 'Billing', 307, '2023-11-28 07:48:41', 'Please tag patient Kresshan Mante with the patient ID INP-075296 as cleared', 1),
(112, 'Billing', 298, '2023-11-28 13:29:32', 'Please tag patient test 2 outpatient infostaff update-test 2 with the patient ID DQO0J as cleared', 1);

-- --------------------------------------------------------

--
-- Table structure for table `his_patients`
--

CREATE TABLE `his_patients` (
  `pat_id` int(20) NOT NULL,
  `pat_fname` varchar(200) DEFAULT NULL,
  `pat_lname` varchar(200) DEFAULT NULL,
  `pat_dob` varchar(200) DEFAULT NULL,
  `pat_age` varchar(200) DEFAULT NULL,
  `pat_status` varchar(200) DEFAULT NULL,
  `pat_gender` varchar(200) DEFAULT NULL,
  `pat_number` varchar(200) DEFAULT NULL,
  `pat_addr` varchar(200) DEFAULT NULL,
  `pat_phone` varchar(200) DEFAULT NULL,
  `pat_type` varchar(200) DEFAULT NULL,
  `pat_date_joined` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `pat_ailment` varchar(200) DEFAULT NULL,
  `pat_discharge_status` varchar(200) DEFAULT NULL,
  `pat_doc` varchar(200) DEFAULT NULL,
  `pat_room_id` int(11) NOT NULL,
  `pat_room` varchar(200) DEFAULT NULL,
  `pat_bed` varchar(200) NOT NULL,
  `pat_admit` varchar(200) NOT NULL,
  `pat_admit_time` varchar(200) NOT NULL,
  `pat_admit_type` varchar(200) NOT NULL,
  `pat_nurse` varchar(200) NOT NULL,
  `pat_billed` varchar(200) NOT NULL,
  `pat_series` varchar(200) NOT NULL,
  `pat_case` varchar(200) NOT NULL,
  `pat_case_type` varchar(200) NOT NULL,
  `pat_num` varchar(200) NOT NULL,
  `pat_er_case` varchar(200) NOT NULL,
  `pat_er_date` varchar(200) NOT NULL,
  `pat_er_series` varchar(200) NOT NULL,
  `pat_er_area` varchar(200) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `tagged_as_mgh` tinyint(1) NOT NULL DEFAULT 0,
  `discharged` tinyint(1) NOT NULL DEFAULT 0,
  `room_id` int(11) DEFAULT NULL,
  `bed_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `his_patients`
--

INSERT INTO `his_patients` (`pat_id`, `pat_fname`, `pat_lname`, `pat_dob`, `pat_age`, `pat_status`, `pat_gender`, `pat_number`, `pat_addr`, `pat_phone`, `pat_type`, `pat_date_joined`, `pat_ailment`, `pat_discharge_status`, `pat_doc`, `pat_room_id`, `pat_room`, `pat_bed`, `pat_admit`, `pat_admit_time`, `pat_admit_type`, `pat_nurse`, `pat_billed`, `pat_series`, `pat_case`, `pat_case_type`, `pat_num`, `pat_er_case`, `pat_er_date`, `pat_er_series`, `pat_er_area`, `deleted`, `tagged_as_mgh`, `discharged`, `room_id`, `bed_id`) VALUES
(264, 'Leoncio', 'Lachica', '2017-10-17', '6', '', '', 'INP-098273', 'Mantalongon Dalaguete Cebu', '09435673452', 'InPatient', '2023-10-26 15:04:35.465838', NULL, NULL, 'Ira Pongasi', 0, NULL, '', 'ADM4195', '2023-10-24', 'New Patient', '', '', '', '', '', '', '', '', '', '', 1, 0, 0, 58, 137),
(265, 'Marlo', 'cute', '2023-10-10', '0', '', '', 'OP-932704', 'Mandaue City', '09373737376', 'OutPatient', '2023-11-28 06:01:42.287395', NULL, NULL, 'Ira Pongasi', 0, NULL, '', '', '', '', '', '', '956820', '607419', '2023-10-24', 'Z27451', '', '', '', '', 1, 0, 0, 58, 137),
(272, 'test', 'Velarde', '2023-10-03', '0', NULL, NULL, 'EME-562401', 'Urgello Cebu City', '0974466464', 'Emergency', '2023-11-09 14:21:41.229054', NULL, NULL, NULL, 0, NULL, '', '', '', '', '', '', '', '', '', '', '794863', '2023-10-26', '475809', '', 1, 0, 0, NULL, NULL),
(273, 'test', 'Mante', '2023-10-13', '0', 'Married', 'Female', '202311174', 'Urgello Cebu City', '0974466464', 'InPatient', '2023-11-27 10:14:07.290203', NULL, NULL, 'Nilo Velarde', 0, NULL, '', 'ADM5862', '2023-10-26', 'Old Patient', '', '', '', '', '', '', '', '', '', '', 0, 1, 1, 58, 136),
(274, 'test', 'sdsd', '2023-10-07', '0', 'Married', 'Male', NULL, 'Urgello Cebu City', '0974466464', 'InPatient', '2023-10-26 15:01:01.943855', NULL, NULL, 'Ira Pongasi', 0, NULL, '', '', '2023-10-26', 'New Patient', '', '', '', '', '', '', '', '', '', '', 1, 0, 0, 58, 138),
(275, 'Marvin', 'serok', '2023-10-13', '0', 'Divorced', 'Male', 'QHBL6', 'Lapu2', '0974466464', 'OutPatient', '2023-11-28 13:27:22.361345', NULL, NULL, 'Ira Pongasi', 0, NULL, '', '', '', '', '', '', '825409', '357860', '2023-10-26', '139268', '', '', '', '', 1, 0, 0, 58, 138),
(276, 'Nilo', 'Velarde', '2023-10-06', '0', 'Divorced', 'Male', '202310262', 'Urgello Cebu City', '0974466464', 'InPatient', '2023-11-21 16:17:05.636052', NULL, NULL, 'Ira Pongasi', 0, NULL, '', 'ADM1850', '2023-10-26', 'Old Patient', '', '', '', '', '', '', '', '', '', '', 1, 0, 0, 58, 137),
(279, 'Nicole', 'Tan', '2004-07-28', '', 'Single', 'Female', 'INP-479825', 'Urgello Cebu City', '09876323351', 'InPatient', '2023-11-27 15:17:23.138287', NULL, NULL, 'Ira Pongasi', 0, NULL, '', 'ADM3706', '2023-10-27', 'New Patient', '', '', '', '', '', '', '', '', '', '', 0, 1, 1, 58, 136),
(282, 'test', 'inpatient 2', '1999-02-09', '24', 'Married', 'Male', 'INP-713058', 'Sambag 1', '+639158101061', 'InPatient', '2023-11-17 15:49:51.356897', NULL, NULL, 'Test 1', 0, NULL, '', 'ADM8709', '2023-11-16', 'New Patient', '', '', '', '', '', '', '', '', '', '', 1, 0, 0, 58, 138),
(295, 'test update test', 'emergency ', '2018-01-01', '5', 'Married', 'Female', 'EME-301478', 'Sambag 3', '+639158101061', 'Emergency', '2023-11-28 07:37:44.886594', NULL, NULL, NULL, 0, NULL, 'None', '', '', '', '', '', '', '', '', '', '279465', '2023-11-17', '247805', '', 0, 1, 1, NULL, NULL),
(296, 'test', 'emergency none', '2019-05-13', '4', 'Widowed', 'Female', 'EME-721364', 'Sambag 5', '+639158101061', 'Emergency', '2023-11-28 05:36:59.350950', NULL, NULL, NULL, 0, NULL, 'None', '', '', '', '', '', '', '', '', '', '021863', '2023-11-17', '895671', '', 1, 0, 0, NULL, NULL),
(297, 'test', 'inpatient update infostaff', '2010-01-04', '13', 'Divorced', 'Male', '202311177', 'Sambag 2', '+639158101061', 'InPatient', '2023-11-23 06:45:49.232721', NULL, NULL, 'Test 1', 0, NULL, '', 'ADM3468', '2023-11-17', 'Old Patient', '', '', '', '', '', '', '', '', '', '', 1, 0, 0, 58, 138),
(298, 'test 2', 'outpatient infostaff update-test 2', '2011-01-03', '12', 'Married', 'Male', 'DQO0J', 'Sambag 2', '+639158101061', 'OutPatient', '2023-11-28 13:29:42.545336', NULL, NULL, 'Jimuel  Sewok', 0, NULL, '', '', '', '', '', '', '421309', '317069', '2023-11-18', '658740', '', '', '', '', 0, 1, 0, 59, 141),
(299, 'test', 'inpatient admin', '2010-05-11', '13', 'Single', 'Female', '202311184', 'Sambag 1', '+639158101061', 'InPatient', '2023-11-23 06:45:55.626229', NULL, NULL, 'Test 1', 0, NULL, '', 'ADM0367', '2023-11-18', 'New Patient', '', '', '', '', '', '', '', '', '', '', 1, 0, 0, 59, 141),
(300, 'test', 'inpatient infostaff update', '2006-01-09', '17', 'Married', 'Male', '202311183', 'Sambag 1', '+639158101061', 'InPatient', '2023-11-23 06:45:59.330346', NULL, NULL, 'Test 1', 0, NULL, '', 'ADM5369', '2023-11-18', 'New Patient', '', '', '', '', '', '', '', '', '', '', 1, 0, 0, 59, 142),
(301, 'test', 'inpatient', '2023-11-15', '0', 'Single', 'Male', 'INP-759012', 'Sambag 1', '+639158101061', 'InPatient', '2023-11-23 06:46:04.998126', NULL, NULL, 'Ira Pongasi', 0, NULL, '', 'ADM7290', '2023-11-21', 'New Patient', '', '', '', '', '', '', '', '', '', '', 1, 0, 0, 58, 136),
(302, 'test1', 'emergency ', '2018-01-01', '5', NULL, NULL, 'EME-618042', 'Sambag 1', '+639158101061', 'Emergency', '2023-11-21 16:23:17.091266', NULL, NULL, NULL, 0, NULL, '', '', '', '', '', '', '', '', '', '', '972684', '2023-11-21', '017459', '', 1, 0, 0, NULL, NULL),
(303, 'Nilo', 'Velarde', '2018-10-17', '5', 'Married', 'Male', 'INP-609532', 'Sambag 1', '+639158101061', 'InPatient', '2023-11-27 15:30:00.679430', NULL, NULL, 'Ira Pongasi', 0, NULL, '', 'ADM6978', '2023-11-23', 'None', '', '', '', '', '', '', '', '', '', '', 0, 1, 1, 59, 143),
(304, 'Kresshan', 'Mante', '2000-09-12', '23', 'Married', 'Female', 'INP-075296', 'Sambag 1', '+639158101061', 'InPatient', '2023-11-28 04:28:41.628715', NULL, NULL, 'Nilo Velarde', 0, NULL, '', 'ADM8943', '2023-11-27', 'None', '', '', '', '', '', '', '', '', '', '', 1, 0, 0, 58, 140),
(305, 'Nilo', 'Velarde', '2023-11-03', '0', 'Married', 'Female', 'INP-184697', 'Sambag 1', '+639158101061', 'InPatient', '2023-11-28 05:02:07.813215', NULL, NULL, 'Ira Pongasi', 0, NULL, '', 'ADM6841', '2023-11-28', 'None', '', '', '', '', '', '', '', '', '', '', 1, 0, 0, 59, 142),
(306, 'Gwen', 'Bading', '2023-11-15', '0', 'Single', 'Female', 'INP-087592', 'Sambag 1', '+639158101061', 'InPatient', '2023-11-28 07:49:17.294034', NULL, NULL, 'Ira Pongasi', 0, NULL, '', 'ADM1486', '2023-11-28', 'None', '', '', '', '', '', '', '', '', '', '', 0, 1, 1, 58, 137),
(307, 'Kresshan', 'Mante', '2000-09-12', '23', 'Married', 'Female', 'INP-075296', 'Sambag 1', '+639158101061', 'InPatient', '2023-11-28 07:48:55.145617', NULL, NULL, 'Nilo Velarde', 0, NULL, '', 'ADM8943', '2023-11-27', 'None', '', '', '', '', '', '', '', '', '', '', 0, 1, 0, 58, 140),
(308, 'Nilo', 'Velarde', '2023-11-03', '0', 'Married', 'Female', 'INP-184697', 'Sambag 1', '+639158101061', 'InPatient', '2023-11-28 04:29:20.491934', NULL, NULL, 'Ira Pongasi', 0, NULL, '', 'ADM6841', '2023-11-28', 'None', '', '', '', '', '', '', '', '', '', '', 1, 0, 0, 59, 142),
(309, 'Gwen', 'Bading', '2023-11-15', '0', 'Single', 'Female', 'INP-087592', 'Sambag 1', '+639158101061', 'InPatient', '2023-11-28 04:29:25.825488', NULL, NULL, 'Ira Pongasi', 0, NULL, '', 'ADM1486', '2023-11-28', 'None', '', '', '', '', '', '', '', '', '', '', 1, 0, 0, 58, 137),
(310, 'Kresshan', 'Mante', '2000-09-12', '23', 'Married', 'Female', 'INP-075296', 'Sambag 1', '+639158101061', 'InPatient', '2023-11-28 04:29:29.353946', NULL, NULL, 'Nilo Velarde', 0, NULL, '', 'ADM8943', '2023-11-27', 'None', '', '', '', '', '', '', '', '', '', '', 1, 0, 0, 58, 140),
(311, 'Nilo', 'Velarde', '2023-11-03', '0', 'Married', 'Female', 'INP-184697', 'Sambag 1', '+639158101061', 'InPatient', '2023-11-28 01:21:26.779990', NULL, NULL, 'Ira Pongasi', 0, NULL, '', 'ADM6841', '2023-11-28', 'None', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 59, 142),
(312, 'Gwen', 'Bading', '2023-11-15', '0', 'Single', 'Female', 'INP-087592', 'Sambag 1', '+639158101061', 'InPatient', '2023-11-28 05:09:25.947537', NULL, NULL, 'Ira Pongasi', 0, NULL, '', 'ADM1486', '2023-11-28', 'None', '', '', '', '', '', '', '', '', '', '', 0, 1, 1, 58, 137),
(314, 'test add - update', 'coding monday', '2023-11-05', '0', 'Single', 'Female', 'XLQPH', 'Sambag 1', '+639158101061', 'OutPatient', '2023-11-28 06:04:53.547289', NULL, NULL, 'Ira Pongasi', 0, NULL, '', '', '', '', '', '', '423695', '125369', '2023-11-28', '904385', '', '', '', '', 0, 1, 0, 58, 136),
(315, 'Nilo', 'Velarde', '2023-11-07', '0', NULL, NULL, 'EME-237106', 'Sambag 1', '+639158101061', 'Emergency', '2023-11-28 07:21:24.517650', NULL, NULL, NULL, 0, NULL, '', '', '', '', '', '', '', '', '', '', '032541', '2023-11-28', '103859', '', 1, 0, 0, NULL, NULL),
(316, 'test infostaff', 'add', '2023-11-12', '0', NULL, NULL, 'EME-459802', 'Sambag 1', '+639158101061', 'Emergency', '2023-11-28 07:33:22.565281', NULL, NULL, NULL, 0, NULL, '', '', '', '', '', '', '', '', '', '', '056239', '2023-11-28', '309816', '', 0, 1, 1, NULL, NULL),
(317, 'test infostaff', 'add', '2023-11-12', '0', NULL, NULL, 'EME-627459', 'Sambag 1', '+639158101061', 'Emergency', '2023-11-28 07:24:29.580187', NULL, NULL, NULL, 0, NULL, '', '', '', '', '', '', '', '', '', '', '140758', '2023-11-28', '523071', '', 0, 0, 0, NULL, NULL),
(318, 'test infostaff', 'add', '2023-11-12', '0', NULL, NULL, 'EME-416083', 'Sambag 1', '+639158101061', 'Emergency', '2023-11-28 07:31:24.878849', NULL, NULL, NULL, 0, NULL, '', '', '', '', '', '', '', '', '', '', '268401', '2023-11-28', '738516', '', 1, 0, 0, NULL, NULL),
(319, 'test add and update', 'Infostaff', '2023-11-09', '0', 'Single', 'Female', '202311288', 'Sambag 1', '+639158101061', 'InPatient', '2023-11-28 07:46:49.473751', NULL, NULL, 'Ira Pongasi', 0, NULL, '', 'ADM4379', '2023-11-28', 'New Patient', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 58, 137),
(320, 'test add', 'Infostaff', '2023-11-09', '0', 'Single', 'Male', 'INP-509174', 'Sambag 1', '+639158101061', 'InPatient', '2023-11-28 07:44:38.286328', NULL, NULL, 'Ira Pongasi', 0, NULL, '', 'ADM0592', '2023-11-28', 'None', '', '', '', '', '', '', '', '', '', '', 1, 0, 0, 58, 137),
(321, 'test ', 'emergency 69', '2023-11-09', '0', NULL, NULL, 'EME-038495', 'Sambag 1', '+639158101061', 'Emergency', '2023-11-28 14:15:03.638128', NULL, NULL, NULL, 0, NULL, '', '', '', '', '', '', '', '', '', '', '529816', '2023-11-28', '580492', '', 0, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `his_patient_transfers`
--

CREATE TABLE `his_patient_transfers` (
  `t_id` int(20) NOT NULL,
  `t_hospital` varchar(200) DEFAULT NULL,
  `t_date` varchar(200) DEFAULT NULL,
  `t_pat_name` varchar(200) DEFAULT NULL,
  `t_pat_number` varchar(200) DEFAULT NULL,
  `t_status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `his_payrolls`
--

CREATE TABLE `his_payrolls` (
  `pay_id` int(20) NOT NULL,
  `pay_number` varchar(200) DEFAULT NULL,
  `pay_doc_name` varchar(200) DEFAULT NULL,
  `pay_doc_number` varchar(200) DEFAULT NULL,
  `pay_doc_email` varchar(200) DEFAULT NULL,
  `pay_emp_salary` varchar(200) DEFAULT NULL,
  `pay_date_generated` timestamp(4) NOT NULL DEFAULT current_timestamp(4) ON UPDATE current_timestamp(4),
  `pay_status` varchar(200) DEFAULT NULL,
  `pay_descr` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `his_pharmaceuticals`
--

CREATE TABLE `his_pharmaceuticals` (
  `phar_id` int(20) NOT NULL,
  `phar_name` varchar(200) DEFAULT NULL,
  `phar_bcode` varchar(200) DEFAULT NULL,
  `phar_desc` longtext DEFAULT NULL,
  `phar_qty` varchar(200) DEFAULT NULL,
  `phar_cat` varchar(200) DEFAULT NULL,
  `phar_vendor` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `his_pharmaceuticals_categories`
--

CREATE TABLE `his_pharmaceuticals_categories` (
  `pharm_cat_id` int(20) NOT NULL,
  `pharm_cat_name` varchar(200) DEFAULT NULL,
  `pharm_cat_vendor` varchar(200) DEFAULT NULL,
  `pharm_cat_desc` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `his_prescriptions`
--

CREATE TABLE `his_prescriptions` (
  `pres_id` int(200) NOT NULL,
  `pres_pat_name` varchar(200) DEFAULT NULL,
  `pres_pat_age` varchar(200) DEFAULT NULL,
  `pres_pat_number` varchar(200) DEFAULT NULL,
  `pres_number` varchar(200) DEFAULT NULL,
  `pres_pat_addr` varchar(200) DEFAULT NULL,
  `pres_pat_type` varchar(200) DEFAULT NULL,
  `pres_date` timestamp(4) NOT NULL DEFAULT current_timestamp(4) ON UPDATE current_timestamp(4),
  `pres_pat_ailment` varchar(200) DEFAULT NULL,
  `pres_ins` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `his_procedures`
--

CREATE TABLE `his_procedures` (
  `pro_id` int(20) NOT NULL,
  `pro_code` varchar(200) DEFAULT NULL,
  `pro_category` varchar(200) DEFAULT NULL,
  `pro_desc` varchar(200) DEFAULT NULL,
  `pro_abb` varchar(200) DEFAULT NULL,
  `pro_unit` varchar(200) DEFAULT NULL,
  `pro_big` varchar(200) DEFAULT NULL,
  `pro_conv` varchar(200) DEFAULT NULL,
  `pro_bar` varchar(200) DEFAULT NULL,
  `pro_price` decimal(65,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `his_procedures`
--

INSERT INTO `his_procedures` (`pro_id`, `pro_code`, `pro_category`, `pro_desc`, `pro_abb`, `pro_unit`, `pro_big`, `pro_conv`, `pro_bar`, `pro_price`) VALUES
(23, '507468321', 'Procedures', 'RELEASE OF TONGUE TIE FEE', 'RELEASE OF TONGUE TIE FEE', 'None', 'None', '1', '507468321', 5000),
(25, '364970512', 'Procedures', 'Test 1', 'Test 1', 'None', 'None', '', '364970512', 123),
(26, '260971843', 'Procedures', 'Test Procedure', 'Test Procedure', 'None', 'None', '', '260971843', 555),
(27, '034798521', 'RHB Procedures', 'test Procedure', 'test Procedure', 'None', 'None', '', '034798521', 555);

-- --------------------------------------------------------

--
-- Table structure for table `his_pwdresets`
--

CREATE TABLE `his_pwdresets` (
  `id` int(20) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `his_rooms_beds`
--

CREATE TABLE `his_rooms_beds` (
  `room_id` int(20) NOT NULL,
  `room_bldg` varchar(200) DEFAULT NULL,
  `room_bname` varchar(200) DEFAULT NULL,
  `room_fname` varchar(200) DEFAULT NULL,
  `room_number` varchar(200) DEFAULT NULL,
  `room_status` varchar(200) DEFAULT NULL,
  `room_beds_number` int(20) DEFAULT NULL,
  `room_classification` varchar(200) DEFAULT NULL,
  `room_station` varchar(200) DEFAULT NULL,
  `room_fea` varchar(200) DEFAULT NULL,
  `standard_price` double DEFAULT NULL,
  `roomIn_price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `his_rooms_beds`
--

INSERT INTO `his_rooms_beds` (`room_id`, `room_bldg`, `room_bname`, `room_fname`, `room_number`, `room_status`, `room_beds_number`, `room_classification`, `room_station`, `room_fea`, `standard_price`, `roomIn_price`) VALUES
(58, 'Building 1', 'Main', '1st Central Wing', '4', 'Available', 5, 'PRIVATE', '4', 'Private ', NULL, 800),
(59, 'Building 1', 'Main', 'Ground Floor', 'test 4', 'Available', 3, 'PRIVATE', 'test 4', 'free', NULL, 999);

-- --------------------------------------------------------

--
-- Table structure for table `his_supadmin`
--

CREATE TABLE `his_supadmin` (
  `sup_id` int(20) NOT NULL,
  `sup_fname` varchar(200) DEFAULT NULL,
  `sup_lname` varchar(200) DEFAULT NULL,
  `sup_email` varchar(200) DEFAULT NULL,
  `sup_pwd` varchar(200) DEFAULT NULL,
  `sup_dpic` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `his_supadmin`
--

INSERT INTO `his_supadmin` (`sup_id`, `sup_fname`, `sup_lname`, `sup_email`, `sup_pwd`, `sup_dpic`) VALUES
(2, 'Nil', 'Vel', 'supadmin@gmail.com', '12345', 'WIN_20230825_08_57_04_Pro.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `his_surgery`
--

CREATE TABLE `his_surgery` (
  `s_id` int(200) NOT NULL,
  `s_number` varchar(200) DEFAULT NULL,
  `s_doc` varchar(200) DEFAULT NULL,
  `s_pat_number` varchar(200) DEFAULT NULL,
  `s_pat_name` varchar(200) DEFAULT NULL,
  `s_pat_ailment` varchar(200) DEFAULT NULL,
  `s_pat_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `s_pat_status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `his_user`
--

CREATE TABLE `his_user` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(200) DEFAULT NULL,
  `user_lname` varchar(200) DEFAULT NULL,
  `user_email` varchar(200) DEFAULT NULL,
  `user_pwd` varchar(200) DEFAULT NULL,
  `user_dept` varchar(200) DEFAULT NULL,
  `user_number` varchar(200) DEFAULT NULL,
  `user_cat` varchar(200) DEFAULT NULL,
  `user_dpic` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `his_user`
--

INSERT INTO `his_user` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_pwd`, `user_dept`, `user_number`, `user_cat`, `user_dpic`) VALUES
(48, 'pharma', 'ko', 'test@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'Pharmacy', 'TGCN4', 'Choose', 'WIN_20230825_08_57_04_Pro.jpg'),
(65, 'Peter', 'Velarde', 'nilvel1999@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'Billing', 'RTZDO', 'Choose', 'hosp_asset.jpg'),
(67, 'test', 'Nurse', 'test@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'Nurse', 'REKX2', 'Choose', 'GodUsopp.webp'),
(68, 'Gwen', 'Delgado', 'test@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'Medtech', 'S1LRP', 'Choose', '5b17949ee262ffdd5ead935ec6d050fe.jpg'),
(69, 'Nilo', 'Infostaff', 'nilvel1999@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'Infostaff', '95LOQ', 'Choose', '329235835_738912984213022_8239709874849123590_n.jpg'),
(70, 'test edit', 'supadmin', 'adduser@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'Medtech', 'E5PK1', 'Choose', '357619004_246184941456924_4023452570967735779_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `his_vendor`
--

CREATE TABLE `his_vendor` (
  `v_id` int(20) NOT NULL,
  `v_number` varchar(200) DEFAULT NULL,
  `v_name` varchar(200) DEFAULT NULL,
  `v_adr` varchar(200) DEFAULT NULL,
  `v_mobile` varchar(200) DEFAULT NULL,
  `v_email` varchar(200) DEFAULT NULL,
  `v_phone` varchar(200) DEFAULT NULL,
  `v_desc` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `his_vitals`
--

CREATE TABLE `his_vitals` (
  `vit_id` int(20) NOT NULL,
  `vit_number` varchar(200) DEFAULT NULL,
  `vit_pat_number` varchar(200) DEFAULT NULL,
  `vit_bodytemp` varchar(200) DEFAULT NULL,
  `vit_heartpulse` varchar(200) DEFAULT NULL,
  `vit_resprate` varchar(200) DEFAULT NULL,
  `vit_bloodpress` varchar(200) DEFAULT NULL,
  `vit_daterec` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `his_accounts`
--
ALTER TABLE `his_accounts`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `his_admin`
--
ALTER TABLE `his_admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `his_ancillary`
--
ALTER TABLE `his_ancillary`
  ADD PRIMARY KEY (`render_id`);

--
-- Indexes for table `his_assets`
--
ALTER TABLE `his_assets`
  ADD PRIMARY KEY (`asst_id`);

--
-- Indexes for table `his_beds`
--
ALTER TABLE `his_beds`
  ADD PRIMARY KEY (`bed_id`),
  ADD KEY `test` (`room_id`);

--
-- Indexes for table `his_cash`
--
ALTER TABLE `his_cash`
  ADD PRIMARY KEY (`cash_id`);

--
-- Indexes for table `his_cbc`
--
ALTER TABLE `his_cbc`
  ADD PRIMARY KEY (`up_id`);

--
-- Indexes for table `his_docs`
--
ALTER TABLE `his_docs`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `his_emergency`
--
ALTER TABLE `his_emergency`
  ADD PRIMARY KEY (`eme_id`);

--
-- Indexes for table `his_equipments`
--
ALTER TABLE `his_equipments`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `his_examinations`
--
ALTER TABLE `his_examinations`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `his_fee`
--
ALTER TABLE `his_fee`
  ADD PRIMARY KEY (`fee_id`);

--
-- Indexes for table `his_guarantors`
--
ALTER TABLE `his_guarantors`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `his_infostaff`
--
ALTER TABLE `his_infostaff`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `his_laboratory`
--
ALTER TABLE `his_laboratory`
  ADD PRIMARY KEY (`lab_id`);

--
-- Indexes for table `his_medical_records`
--
ALTER TABLE `his_medical_records`
  ADD PRIMARY KEY (`mdr_id`);

--
-- Indexes for table `his_medtech`
--
ALTER TABLE `his_medtech`
  ADD PRIMARY KEY (`med_id`);

--
-- Indexes for table `his_notify`
--
ALTER TABLE `his_notify`
  ADD PRIMARY KEY (`no_id`);

--
-- Indexes for table `his_patients`
--
ALTER TABLE `his_patients`
  ADD PRIMARY KEY (`pat_id`),
  ADD KEY `bed_id` (`bed_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `his_patient_transfers`
--
ALTER TABLE `his_patient_transfers`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `his_payrolls`
--
ALTER TABLE `his_payrolls`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `his_pharmaceuticals`
--
ALTER TABLE `his_pharmaceuticals`
  ADD PRIMARY KEY (`phar_id`);

--
-- Indexes for table `his_pharmaceuticals_categories`
--
ALTER TABLE `his_pharmaceuticals_categories`
  ADD PRIMARY KEY (`pharm_cat_id`);

--
-- Indexes for table `his_prescriptions`
--
ALTER TABLE `his_prescriptions`
  ADD PRIMARY KEY (`pres_id`);

--
-- Indexes for table `his_procedures`
--
ALTER TABLE `his_procedures`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `his_pwdresets`
--
ALTER TABLE `his_pwdresets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `his_rooms_beds`
--
ALTER TABLE `his_rooms_beds`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `his_supadmin`
--
ALTER TABLE `his_supadmin`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indexes for table `his_surgery`
--
ALTER TABLE `his_surgery`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `his_user`
--
ALTER TABLE `his_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `his_vendor`
--
ALTER TABLE `his_vendor`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `his_vitals`
--
ALTER TABLE `his_vitals`
  ADD PRIMARY KEY (`vit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `his_accounts`
--
ALTER TABLE `his_accounts`
  MODIFY `acc_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `his_admin`
--
ALTER TABLE `his_admin`
  MODIFY `ad_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `his_ancillary`
--
ALTER TABLE `his_ancillary`
  MODIFY `render_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `his_assets`
--
ALTER TABLE `his_assets`
  MODIFY `asst_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `his_beds`
--
ALTER TABLE `his_beds`
  MODIFY `bed_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `his_cash`
--
ALTER TABLE `his_cash`
  MODIFY `cash_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `his_cbc`
--
ALTER TABLE `his_cbc`
  MODIFY `up_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `his_docs`
--
ALTER TABLE `his_docs`
  MODIFY `doc_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `his_emergency`
--
ALTER TABLE `his_emergency`
  MODIFY `eme_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `his_equipments`
--
ALTER TABLE `his_equipments`
  MODIFY `item_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `his_examinations`
--
ALTER TABLE `his_examinations`
  MODIFY `exam_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `his_fee`
--
ALTER TABLE `his_fee`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `his_guarantors`
--
ALTER TABLE `his_guarantors`
  MODIFY `g_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `his_infostaff`
--
ALTER TABLE `his_infostaff`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `his_laboratory`
--
ALTER TABLE `his_laboratory`
  MODIFY `lab_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `his_medical_records`
--
ALTER TABLE `his_medical_records`
  MODIFY `mdr_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `his_medtech`
--
ALTER TABLE `his_medtech`
  MODIFY `med_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `his_notify`
--
ALTER TABLE `his_notify`
  MODIFY `no_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `his_patients`
--
ALTER TABLE `his_patients`
  MODIFY `pat_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;

--
-- AUTO_INCREMENT for table `his_patient_transfers`
--
ALTER TABLE `his_patient_transfers`
  MODIFY `t_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `his_payrolls`
--
ALTER TABLE `his_payrolls`
  MODIFY `pay_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `his_pharmaceuticals`
--
ALTER TABLE `his_pharmaceuticals`
  MODIFY `phar_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `his_pharmaceuticals_categories`
--
ALTER TABLE `his_pharmaceuticals_categories`
  MODIFY `pharm_cat_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `his_prescriptions`
--
ALTER TABLE `his_prescriptions`
  MODIFY `pres_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `his_procedures`
--
ALTER TABLE `his_procedures`
  MODIFY `pro_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `his_pwdresets`
--
ALTER TABLE `his_pwdresets`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `his_rooms_beds`
--
ALTER TABLE `his_rooms_beds`
  MODIFY `room_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `his_supadmin`
--
ALTER TABLE `his_supadmin`
  MODIFY `sup_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `his_surgery`
--
ALTER TABLE `his_surgery`
  MODIFY `s_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `his_user`
--
ALTER TABLE `his_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `his_vendor`
--
ALTER TABLE `his_vendor`
  MODIFY `v_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `his_vitals`
--
ALTER TABLE `his_vitals`
  MODIFY `vit_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `his_beds`
--
ALTER TABLE `his_beds`
  ADD CONSTRAINT `test` FOREIGN KEY (`room_id`) REFERENCES `his_rooms_beds` (`room_id`);

--
-- Constraints for table `his_patients`
--
ALTER TABLE `his_patients`
  ADD CONSTRAINT `his_patients_ibfk_1` FOREIGN KEY (`bed_id`) REFERENCES `his_beds` (`bed_id`),
  ADD CONSTRAINT `his_patients_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `his_rooms_beds` (`room_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
