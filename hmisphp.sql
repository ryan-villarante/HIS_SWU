-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2024 at 07:06 AM
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
(10, 'AD-295604', 'Nilo', 'Velarde', 'nil@gmail.com', 'fe703d258c7ef5f50b71e06565a65aa07194907f', '2ef62f03fd68f645bcd2fdb31da0a6a7.jpg', 'System_Admin');

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
  `render_room_price` int(20) NOT NULL,
  `render_req_date` date NOT NULL,
  `render_req_doc` varchar(200) NOT NULL,
  `render_doc_number` varchar(200) NOT NULL,
  `render_item_price` varchar(200) NOT NULL,
  `render_exam` varchar(200) DEFAULT NULL,
  `render_date_time` date NOT NULL,
  `render_pro_fee` int(20) NOT NULL,
  `render_reg_number` varchar(200) NOT NULL,
  `render_or_number` varchar(200) NOT NULL,
  `render_payment` varchar(200) NOT NULL,
  `render_payer_name` varchar(200) NOT NULL,
  `render_by` varchar(200) NOT NULL,
  `render_case` varchar(200) DEFAULT NULL,
  `render_trans` varchar(200) DEFAULT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT 0,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `released` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `his_ancillary`
--

INSERT INTO `his_ancillary` (`render_id`, `render_code`, `render_name`, `render_pat_type`, `render_age`, `render_room_number`, `render_room_price`, `render_req_date`, `render_req_doc`, `render_doc_number`, `render_item_price`, `render_exam`, `render_date_time`, `render_pro_fee`, `render_reg_number`, `render_or_number`, `render_payment`, `render_payer_name`, `render_by`, `render_case`, `render_trans`, `paid`, `deleted`, `released`) VALUES
(120, '', 'Inpatient 1', 'InPatient', '0', '1F Private ', 899, '2023-12-04', 'Nilo Velarde', 'CH-0357', '₱ 5000.00', '{\"values\":[\"Laboratory Examinations\"]}', '0000-00-00', 5000, '', '', '₱ 10899.00', 'Inpatient 1', 'Medtech 1  - Medtech', '472813', '67843', 1, 0, 1),
(121, '', 'Inpatient 1', 'InPatient', '0', '1F Private ', 899, '2023-12-04', 'Nilo Velarde', 'CH-9102', '₱ 898.00', '{\"values\":[\"X-Ray\"]}', '0000-00-00', 5000, '', '', '₱ 6797.00', 'Inpatient 1', 'Nilo Velarde  -Admin', '497503', '26371', 1, 0, 0),
(122, '', 'OP 1', 'OutPatient', '0', '1F Private ', 899, '2023-12-04', 'Consultant 2', 'CH-8927', '₱ 5898.00', '{\"values\":[\"Laboratory Examinations\",\"X-Ray\"]}', '0000-00-00', 0, '', '', '₱ 6797.00', 'OP 1', 'Nilo Velarde  -Admin', '094175', '25179', 1, 0, 0),
(123, '', 'Inpatient 1', 'InPatient', '0', '1F Private ', 899, '2023-12-04', 'Nilo Velarde', 'CH-9715', '₱ 30.00', '{\"values\":[]}', '0000-00-00', 5000, '', '', '₱ 5929.00', 'Inpatient 1', 'Nilo Velarde  -Admin', '324809', '65297', 1, 1, 0),
(125, '', 'Inpatient 1', 'InPatient', '0', '1F Private ', 899, '2023-12-05', 'Nilo Velarde', 'CH-1735', '₱ 555.00', '{\"values\":[\"Laboratory Examinations\"]}', '0000-00-00', 5000, '', '', '₱ 6454.00', 'Inpatient 1', 'Medtech 1  - Medtech', '549708', '19072', 1, 0, 1),
(126, '', 'OP 1', 'OutPatient', '0', '1F Private ', 899, '2023-12-05', 'Consultant 2', 'CH-8920', '₱ 10.00', '{\"values\":[]}', '0000-00-00', 0, '', '', '₱ 909.00', 'OP 1', 'Medtech 1  - Medtech', '168547', '57864', 1, 0, 0),
(127, '', 'Jonathan 2', 'InPatient', '0', '1F Private ', 899, '2023-12-05', 'Consultant 2', 'CH-5034', '₱ 1110.00', '{\"values\":[\"Laboratory Examinations\",\"Laboratory Examinations\"]}', '0000-00-00', 4500, '', '', '₱ 6509.00', 'Jonathan 2', 'No data found', '280453', '37926', 1, 0, 0),
(129, '', 'Inpatient 1', 'InPatient', '0', '1F Private ', 899, '2023-12-05', 'Nilo Velarde', 'CH-2306', '₱ 100.00', '{\"values\":[]}', '0000-00-00', 5000, '', '', '₱ 5999.00', 'Inpatient 1', 'Nurse 1  - Nurse', '936247', '23517', 1, 0, 0),
(130, '', 'OP 1', 'OutPatient', '0', '1F Private ', 899, '2023-12-05', 'Consultant 2', 'CH-7154', '₱ 10.00', '{\"values\":[]}', '0000-00-00', 0, '', '', '₱ 909.00', 'OP 1', 'Medtech 1  - Medtech', '651439', '21376', 1, 0, 0),
(132, '', 'OP 1', 'OutPatient', '0', '1F Private ', 899, '2023-12-18', 'Consultant 2', 'CH-6810', '₱ 440.00', '{\"values\":[]}', '0000-00-00', 0, '', '', '₱ 1339.00', 'OP 1', 'Nilo Velarde  -Admin', '693210', '62083', 1, 0, 0),
(133, '', 'Jonathan 2', 'InPatient', '0', '1F Private ', 899, '2023-12-05', 'Consultant 2', 'CH-5034', '₱ 1110.00', '{\"values\":[\"Laboratory Examinations\",\"Laboratory Examinations\"]}', '0000-00-00', 4500, '', '', '₱ 6509.00', 'Jonathan 2', 'No data found', '280453', '37926', 1, 0, 0),
(134, '', 'OP 1', 'OutPatient', '0', '1F Private ', 899, '2023-12-19', 'Consultant 2', 'CH-9516', '₱ 580.00', '{\"values\":[]}', '0000-00-00', 0, '', '', '₱ 1479.00', 'OP 1', 'Nilo Velarde  -Admin', '301785', '18793', 0, 0, 0);

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
(147, 61, '2F  - 1', 'Available'),
(148, 61, '2F  - 2', 'Available'),
(149, 61, '2F  - 3', 'Available'),
(150, 61, '2F  - 4', 'Available'),
(151, 61, '2F  - 5', 'Available'),
(152, 62, '1F Private  - 1', 'Available');

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
(67, 'OR1-056329', '2023-12-05', 'OP 1', 7000, 0, 0, 6797, 0, 'Billing  1', 'paid', 0, 203),
(68, 'OR1-370691', '2023-12-13', 'Inpatient 1', 7000, 0, 0, 6454, 0, 'Billing  1', 'paid', 0, 1514),
(69, 'OR1-731054', '2023-12-19', 'OP 1', 2200, 0, 0, NULL, NULL, 'Nilo Velarde  -Admin', '', 0, 861),
(70, 'OR1-760218', '2023-12-19', 'Jonathan 2', 7777, 0, 0, NULL, NULL, 'Nilo Velarde  -Admin', '', 0, 2570),
(71, 'OR1-498275', '2023-12-19', 'Jonathan 2', 8888, 0, 0, 6509, NULL, 'Nilo Velarde  -Admin', '', 0, 2379);

-- --------------------------------------------------------

--
-- Table structure for table `his_cbc`
--

CREATE TABLE `his_cbc` (
  `up_id` int(20) NOT NULL,
  `up_number` varchar(200) NOT NULL,
  `up_name` varchar(200) NOT NULL,
  `wbc` varchar(200) NOT NULL,
  `wbc_range` varchar(200) NOT NULL,
  `seg` varchar(200) NOT NULL,
  `seg_range` varchar(200) NOT NULL,
  `lym` int(20) NOT NULL,
  `lym_range` varchar(200) NOT NULL,
  `mon` int(20) NOT NULL,
  `mon_range` varchar(200) NOT NULL,
  `eos` int(20) NOT NULL,
  `eos_range` varchar(200) NOT NULL,
  `bas` int(20) NOT NULL,
  `bas_range` varchar(200) NOT NULL,
  `rbc` int(20) NOT NULL,
  `rbc_range` varchar(200) NOT NULL,
  `hgb` int(20) NOT NULL,
  `hgb_range` varchar(200) NOT NULL,
  `hct` int(20) NOT NULL,
  `hct_range` varchar(200) NOT NULL,
  `mcv` int(20) NOT NULL,
  `mcv_range` varchar(200) NOT NULL,
  `mch` int(20) NOT NULL,
  `mch_range` varchar(200) NOT NULL,
  `mchc` int(20) NOT NULL,
  `mchc_range` varchar(200) NOT NULL,
  `plt` int(20) NOT NULL,
  `plt_range` varchar(200) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `cbc_pic` varchar(200) DEFAULT NULL,
  `released` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `his_cbc`
--

INSERT INTO `his_cbc` (`up_id`, `up_number`, `up_name`, `wbc`, `wbc_range`, `seg`, `seg_range`, `lym`, `lym_range`, `mon`, `mon_range`, `eos`, `eos_range`, `bas`, `bas_range`, `rbc`, `rbc_range`, `hgb`, `hgb_range`, `hct`, `hct_range`, `mcv`, `mcv_range`, `mch`, `mch_range`, `mchc`, `mchc_range`, `plt`, `plt_range`, `remarks`, `cbc_pic`, `released`) VALUES
(77, '', 'Inpatient 1', '111', 'High', '111', 'High', 111, 'High', 111, 'High', 111, 'High', 11, 'High', 11, 'High', 111, 'High', 111, 'High', 111, 'High', 111, 'High', 111, 'High', 1111, 'High', '', '', 0),
(78, '', 'Inpatient 1', '1', 'Low', '1', 'Low', 1, 'Low', 111, 'High', 1111, 'High', 111, 'High', 1, 'Low', 1, 'Low', 1, 'Low', 1, 'Low', 1, 'Low', 1, 'Low', 1, 'Low', 'gilagnak', '', 0),
(79, '', 'Inpatient 1', '1', 'Low', '1', 'Low', 1, 'Low', 111, 'High', 111, 'High', 111, 'High', 1, 'Low', 1, 'Low', 1, 'Low', 1, 'Low', 1, 'Low', 1, 'Low', 1, 'Low', 'gilagnak', '', 0),
(80, '', 'Inpatient 1', '1', 'Low', '1', 'Low', 1, 'Low', 1, '', 1, '', 1, '', 11, 'High', 1, 'Low', 1, 'Low', 1, 'Low', 1, 'Low', 1, 'Low', 1, 'Low', '', '', 0),
(81, '', 'Inpatient 1', '', '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 1111111, 'High', 0, '', 0, '', '', '', 0),
(82, '', 'Inpatient 1', '1', 'Low', '1', 'Low', 1, 'Low', 111, 'High', 111, 'High', 111, 'High', 111, 'High', 111, 'High', 1, 'Low', 1, 'Low', 1, 'Low', 1, 'Low', 1, 'Low', '', '', 0),
(83, '', 'Inpatient 1', '111', 'High', '11111', 'High', 1, 'Low', 111, 'High', 111, 'High', 1111, 'High', 111, 'High', 1111, 'High', 1111, 'High', 11, 'Low', 1, 'Low', 1, 'Low', 1, 'Low', '', '', 0),
(84, '', 'Inpatient 1', '1', 'Low', '111111', 'High', 1111, 'High', 111, 'High', 111, 'High', 111, 'High', 222, 'High', 2, 'Low', 1, 'Low', 1, 'Low', 1, 'Low', 111, 'High', 1, 'Low', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `his_discharged`
--

CREATE TABLE `his_discharged` (
  `dis_id` int(11) NOT NULL,
  `dis_name` varchar(200) NOT NULL,
  `dis_doc` varchar(200) NOT NULL,
  `dis_time` varchar(200) NOT NULL,
  `dis_diag` varchar(200) DEFAULT NULL,
  `dis_procedure` varchar(200) NOT NULL,
  `dis_complication` varchar(200) DEFAULT NULL,
  `dis_consultation` varchar(200) NOT NULL,
  `dis_lab` varchar(200) NOT NULL,
  `dis_condition` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `his_discharged`
--

INSERT INTO `his_discharged` (`dis_id`, `dis_name`, `dis_doc`, `dis_time`, `dis_diag`, `dis_procedure`, `dis_complication`, `dis_consultation`, `dis_lab`, `dis_condition`) VALUES
(16, 'Jonathan 2', 'Consultant 2', '2023-12-12', 'Recovered', '', 'Improved', 'test', 'Regular Patient', 'test'),
(17, 'Jonathan 2', 'Consultant 2', '2023-12-12', 'Recovered', '', 'Died', 'ss', 'Regular Patient', 'sss'),
(18, 'Nilo Velarde', 'Consultant 3', '2023-12-17', 'Recovered', '', 'Unimproved/Unchanged', 'serok', 'Regular Patient', 'serok kaayo'),
(19, '1 1', '', '', 'Recovered', '', 'Improved', 'test', 'Regular Patient', 'test'),
(20, 'wwww Velarde', 'Consultant 3', '2023-12-17', 'Transferred', '', 'Improved', 'test', 'Regular Patient', 'test'),
(21, 'Nilo Velarde', '', '2023-12-17', 'Recovered', '', 'Improved', 'test', 'Regular Patient', 'test'),
(22, 'Kress Velarde', 'Consultant 3', '2023-12-17', 'Recovered', '', 'Recovered', 'test', 'Regular Patient', 'test');

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
(61, 'Nilo', 'Velarde', 'nilvel1999@gmail.com', NULL, 'Gastroenterology', 'Admitting', 'BNHOZ', 'Resident', 5000, NULL),
(63, 'Consultant', '3', 'test@gmail.com', NULL, 'Anesthesiology', 'Attending', '6LY9D', 'Visiting Consultant', 122, NULL);

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
(136, 'DRU397416', 'Biogesic', 'Drugs', 'Biogesic', 'Tablet', 'Tablet', '2', 'MEDS235047', 10),
(137, 'MEDS638497', 'VALIUM 5MG TABLET', 'Medicine', 'VALIUM 5MG TABLET', 'mg', 'none', '2', 'MEDS638497', 100),
(138, 'DRU358274', 'test', 'Drugs', 'test', 'Vial', 'Pieces', '3', 'MEDS817453', 111);

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
(37, '852096317', 'Laboratory Examinations', 'CBC', 'CBC', 'None', 'None', '', '852096317', 5000),
(38, '197065842', 'X-Ray', 'XRay', 'XRay', 'None', 'None', '', '197065842', 898),
(39, '289310674', 'CT Scan', 'CHEST X-RAY-AP/PA( PORTABLE )', 'CHEST X-RAY-AP/PA( PORTABLE )', 'None', 'None', '', '289310674', 123),
(40, '760185349', '2D Echo', 'test', 'test', 'None', 'None', '', '760185349', 333),
(41, '278539401', 'X-Ray', 'ABDOMEN LATERAL DECUBITUS', 'ABDOMEN LATERAL DECUBITUS', 'None', 'None', '', '278539401', 12345),
(42, '917835642', 'Laboratory Examinations', 'ARTERIAL LOWER', 'ARTERIAL LOWER', 'None', 'None', '', '917835642', 444),
(43, '130257489', 'Laboratory Examinations', 'Stool', 'Stool', 'None', 'None', '', '130257489', 555),
(44, '073968425', 'Laboratory Examinations', 'None', 'Complete Blood Count (CBC)', 'None', 'None', '', '073968425', 3000),
(45, '317095248', 'CT Scan', 'None', 'CT Angiography', 'None', 'None', '', '317095248', 2222);

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
  `hmo_name` varchar(200) DEFAULT NULL,
  `g_email` varchar(200) DEFAULT NULL,
  `g_address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `his_guarantors`
--

INSERT INTO `his_guarantors` (`g_id`, `g_code`, `g_gid`, `g_name`, `g_lname`, `g_tele`, `g_type`, `hmo_name`, `g_email`, `g_address`) VALUES
(45, 30692, 904376821, 'Ryan', 'Villarante', 2147483647, 'HMO', NULL, 'test@gmail.com', 'Sambag 1'),
(46, 69745, 915604278, 'Nilo', 'Velarde', 2147483647, 'Philhealth', NULL, 'nilvel1999@gmail.com', 'Sambag 1'),
(48, 42915, 319072645, 'test ', 'December 11', 2147483647, 'HMO', 'Maxicare', 'nilvel1999@gmail.com', 'Sambag 1'),
(50, 23054, 362108945, 'Nilo', 'Velarde', 2147483647, 'HMO', 'Maxicare', 'nilvel1999@gmail.com', 'Sambag 1');

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
(119, 'Billing', 339, '2023-12-04 09:54:08', 'Please tag patient Inpatient 1 with the patient ID INP-914537 as cleared', 1),
(122, 'Billing', 340, '2023-12-13 05:13:25', 'Please tag patient OP 1 with the patient ID OP-193478 as cleared', 1),
(124, 'Billing', 338, '2023-12-13 05:00:23', 'Please tag patient Jonathan Rivas with the patient ID EME-173682 as cleared', 1),
(126, 'Billing', 341, '2023-12-12 03:28:43', 'Please tag patient Jonathan 2 with the patient ID INP-347296 as cleared', 1),
(127, 'Billing', 344, '2023-12-12 03:46:03', 'Please tag patient Nilo Velarde with the patient ID INP-429863 as cleared', 1),
(128, 'Billing', 342, '2023-12-13 06:33:56', 'Please tag patient Jonathan Rivas with the patient ID EME-316729 as cleared', 1),
(129, 'Billing', 345, '2023-12-16 17:10:51', 'Please tag patient Kress Velarde with the patient ID INP-197350 as cleared', 1),
(130, 'Billing', 346, '2023-12-16 19:00:01', 'Please tag patient Nilo Velarde with the patient ID INP-873920 as cleared', 1),
(131, 'Billing', 354, '2023-12-16 21:24:34', 'Please tag patient q q with the patient ID OP-169087 as cleared', 1),
(132, 'Billing', 353, '2023-12-16 21:25:16', 'Please tag patient wwww Velarde with the patient ID OP-086952 as cleared', 1),
(133, 'Billing', 352, '2023-12-16 21:26:41', 'Please tag patient 1 1 with the patient ID OP-540738 as cleared', 1),
(134, 'Billing', 357, '2023-12-16 21:30:54', 'Please tag patient Nilo Velarde with the patient ID OP-930654 as cleared', 1),
(135, 'Billing', 361, '2023-12-16 21:35:54', 'Please tag patient Nilo Velarde with the patient ID EME-948021 as cleared', 1);

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
  `bed_id` int(11) DEFAULT NULL,
  `pat_fee` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `his_patients`
--

INSERT INTO `his_patients` (`pat_id`, `pat_fname`, `pat_lname`, `pat_dob`, `pat_age`, `pat_status`, `pat_gender`, `pat_number`, `pat_addr`, `pat_phone`, `pat_type`, `pat_date_joined`, `pat_ailment`, `pat_discharge_status`, `pat_doc`, `pat_room_id`, `pat_room`, `pat_bed`, `pat_admit`, `pat_admit_time`, `pat_admit_type`, `pat_nurse`, `pat_billed`, `pat_series`, `pat_case`, `pat_case_type`, `pat_num`, `pat_er_case`, `pat_er_date`, `pat_er_series`, `pat_er_area`, `deleted`, `tagged_as_mgh`, `discharged`, `room_id`, `bed_id`, `pat_fee`) VALUES
(338, 'Jonathan', 'Rivas', '2010-02-09', '13', NULL, NULL, 'EME-173682', 'Talamban', '0924232324', 'Emergency', '2023-12-13 05:04:01.243168', NULL, NULL, NULL, 0, NULL, '', '', '', '', '', '', '', '', '', '', '019327', '2023-12-04', '827190', '', 0, 1, 1, NULL, NULL, 0),
(339, 'Inpatient', '1', '2023-10-02', '0', 'Single', 'Male', 'INP-914537', 'Talamban', '0924232324', 'InPatient', '2023-12-12 03:57:14.005326', NULL, NULL, 'Nilo Velarde', 0, NULL, '', 'ADM3576', '2023-12-04', 'None', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 62, 152, 5000),
(340, 'OP', '1', '2023-12-01', '0', 'Married', 'Female', 'OP-193478', 'Talamban', '0924232324', 'OutPatient', '2023-12-13 05:13:40.268994', NULL, NULL, 'Consultant 2', 0, NULL, '', '', '', '', '', '', '803791', '017968', '2023-12-04', '03Z961', '', '', '', '', 0, 1, 1, 62, 152, 0),
(341, 'Jonathan', '2', '2023-12-02', '0', 'Single', 'Male', 'INP-347296', 'Talamban', '0924232324', 'InPatient', '2023-12-12 03:32:34.673823', NULL, NULL, 'Consultant 2', 0, NULL, '', 'ADM5108', '2023-12-04', 'None', '', '', '', '', '', '', '', '', '', '', 0, 1, 1, 62, 152, 4500),
(342, 'Jonathan', 'Rivas', '2010-02-09', '13', NULL, NULL, 'EME-316729', 'Talamban', '0924232324', 'Emergency', '2023-12-16 21:35:09.630270', NULL, NULL, NULL, 0, NULL, '', '', '', '', '', '', '', '', '', '', '645913', '2023-12-04', '690312', '', 0, 1, 0, NULL, NULL, 0),
(343, 'Nilo', 'Velarde', '2023-12-07', '0', NULL, NULL, 'EME-518073', 'Sambag 1', '+639158101061', 'Emergency', '2023-12-11 11:14:30.461071', NULL, NULL, NULL, 0, NULL, '', '', '', '', '', '', '', '', '', '', '120867', '2023-12-11', '530814', '', 0, 0, 0, NULL, NULL, 0),
(344, 'Nilo', 'Velarde', '2023-11-30', '0', 'Married', 'Male', 'INP-429863', 'Sambag 1', '+639158101061', 'InPatient', '2023-12-12 04:36:47.269674', NULL, NULL, 'Consultant 3', 0, NULL, '', 'ADM6917', '2023-12-12', 'None', '', '', '', '', '', '', '', '', '', '', 0, 1, 1, 61, 150, 122),
(345, 'Kress', 'Velarde', '2023-12-02', '0', 'Single', 'Male', 'INP-197350', 'Sambag 1', '+639158101061', 'InPatient', '2023-12-19 06:57:02.178778', NULL, NULL, 'Consultant 3', 0, NULL, '', 'ADM6405', '2023-12-12', 'None', '', '', '', '', '', '', '', '', '', '', 0, 1, 1, 61, 150, 122),
(346, 'Nilo', 'Velarde', '2023-12-01', '0', 'Single', 'Male', 'INP-873920', 'Sambag 1', '+639158101061', 'InPatient', '2023-12-16 19:01:48.645830', NULL, NULL, 'Consultant 3', 0, NULL, '', 'ADM9480', '2023-12-13', 'None', '', '', '', '', '', '', '', '', '', '', 0, 1, 1, 61, 147, 122),
(347, 'Agat', 'Velarde', '2023-12-01', '0', 'Single', 'Male', 'OP-248739', 'Sambag 1', '+639158101061', 'OutPatient', '2023-12-14 05:59:59.647096', NULL, NULL, 'Consultant 3', 0, NULL, '', '', '', '', '', '', '825401', '243591', '2023-12-14', '475680', '', '', '', '', 0, 0, 0, 62, 152, 0),
(348, 'serok', 'Velarde', '2009-12-02', '14', 'Single', 'Male', 'INP-408762', 'Sambag 1', '+639158101061', 'InPatient', '2023-12-16 17:14:15.285913', NULL, NULL, 'Consultant 3', 0, NULL, '', 'ADM4273', '2023-12-16', 'None', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 62, 152, 122),
(349, 'test', 'Velarde', '2023-11-28', '0', 'Single', 'Female', 'INP-502371', 'Sambag 1', '+639158101061', 'InPatient', '2023-12-16 19:06:28.468847', NULL, NULL, 'Consultant 3', 0, NULL, '', 'ADM7628', '2023-12-16', 'None', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 61, 147, 122),
(350, 'test', 'Velarde', '2023-11-29', '0', 'Married', 'Male', 'OP-142693', 'Sambag 1', '+639158101061', 'OutPatient', '2023-12-16 21:20:36.089210', NULL, NULL, 'Consultant 3', 0, NULL, '', '', '', '', '', '', '134720', '163275', '2023-12-16', '128073', '', '', '', '', 0, 0, 0, 62, 152, 0),
(351, 'Nilo', 'butay', '2023-11-29', '0', 'Single', 'Male', 'OP-842690', 'Sambag 1', '+639158101061', 'OutPatient', '2023-12-16 21:21:06.285324', NULL, NULL, 'Consultant 3', 0, NULL, '', '', '', '', '', '', '514963', '051348', '2023-12-16', '95Z630', '', '', '', '', 0, 0, 0, 61, 149, 0),
(352, '1', '1', '2023-12-07', '0', 'Married', 'Male', 'OP-540738', 'Sambag 1', '+639158101061', 'OutPatient', '2023-12-16 21:27:01.248702', NULL, NULL, 'Consultant 3', 0, NULL, '', '', '', '', '', '', '190658', '204815', '2023-12-16', '3Z1504', '', '', '', '', 0, 1, 1, 62, 152, 0),
(353, 'wwww', 'Velarde', '2023-12-15', '0', 'Widowed', 'Male', 'OP-086952', 'Sambag 1', '+639158101061', 'OutPatient', '2023-12-16 21:29:36.936221', NULL, NULL, 'Consultant 3', 0, NULL, '', '', '', '', '', '', '129047', '486203', '2023-12-16', '176032', '', '', '', '', 0, 1, 1, 62, 152, 0),
(354, 'q', 'q', '2023-11-30', '0', 'Married', 'Male', 'OP-169087', 'Sambag 1', '+639158101061', 'OutPatient', '2023-12-16 21:22:21.166944', NULL, NULL, 'Consultant 3', 0, NULL, '', '', '', '', '', '', '812639', '467539', '2023-12-16', '03582Z', '', '', '', '', 0, 0, 0, 61, 147, 0),
(355, 'awqw', 'qwq', '2023-12-01', '0', 'Married', 'Male', 'OP-526849', 'Sambag 1', '+639158101061', 'OutPatient', '2023-12-16 21:22:49.949018', NULL, NULL, 'Consultant 3', 0, NULL, '', '', '', '', '', '', '130658', '759210', '2023-12-16', '839270', '', '', '', '', 0, 0, 0, 61, 148, 0),
(356, 'wqw', 'dsd', '2023-12-01', '0', 'Single', 'Female', 'OP-729084', 'Sambag 1', '+639158101061', 'OutPatient', '2023-12-16 21:23:11.327852', NULL, NULL, 'Consultant 3', 0, NULL, '', '', '', '', '', '', '567193', '145732', '2023-12-16', '10742Z', '', '', '', '', 0, 0, 0, 61, 147, 0),
(357, 'Nilo', 'Velarde', '2023-11-30', '0', 'Married', 'Female', 'OP-930654', 'Sambag 1', '+639158101061', 'OutPatient', '2023-12-16 21:31:09.819628', NULL, NULL, 'Consultant 3', 0, NULL, '', '', '', '', '', '', '581206', '746819', '2023-12-16', 'Z34185', '', '', '', '', 0, 1, 0, 61, 149, 0),
(358, 'cxcxc', 'Velarde', '2023-12-15', '0', 'Married', 'Male', 'OP-786591', 'Sambag 1', '+639158101061', 'OutPatient', '2023-12-16 21:23:44.556264', NULL, NULL, 'Consultant 3', 0, NULL, '', '', '', '', '', '', '468290', '530746', '2023-12-16', '497835', '', '', '', '', 0, 0, 0, 61, 147, 0),
(359, 'asxsd', 'asad', '2023-12-01', '0', 'Single', 'Male', 'OP-309214', 'Sambag 1', '+639158101061', 'OutPatient', '2023-12-16 21:26:22.490547', NULL, NULL, 'Consultant 3', 0, NULL, '', '', '', '', '', '', '375180', '207685', '2023-12-16', '396814', '', '', '', '', 0, 0, 0, 61, 149, 0),
(360, 'sadsad', 'asdasd', '2023-12-21', '', 'Single', 'Female', 'OP-018265', 'Sambag 1', '+639158101061', 'OutPatient', '2023-12-16 21:30:28.706469', NULL, NULL, 'Consultant 3', 0, NULL, '', '', '', '', '', '', '987320', '375618', '2023-12-16', '5Z6317', '', '', '', '', 0, 0, 0, 61, 147, 0),
(361, 'Nilo', 'Velarde', '2023-12-07', '0', NULL, NULL, 'EME-948021', 'Sambag 1', '+639158101061', 'Emergency', '2023-12-16 21:36:16.736088', NULL, NULL, NULL, 0, NULL, '', '', '', '', '', '', '', '', '', '', '687153', '2023-12-16', '367108', '', 0, 1, 1, NULL, NULL, 0);

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
(28, '206518934', 'Procedures', 'PT REHAB PARAFFIN WAX BATH', 'PT REHAB PARAFFIN WAX BATH', 'None', 'None', '', '206518934', 6000);

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
(61, 'Building 2', 'Main', '2nd Floor', '2F ', 'Available', 5, 'PRIVATE', '2F ', 'test', NULL, 500),
(62, 'Building 1', 'Main', 'Ground Floor', '1F Private ', 'Available', 1, 'WARD', '1F Private ', 'test', NULL, 899);

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
(2, 'Super', 'Administrator', 'supadmin@gmail.com', '12345', 'super admin user.png');

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
(74, 'Medtech', '1', 'test@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'Medtech', 'HTUAI', 'Choose', 'medtech user.png'),
(77, 'Nurse', '1', 'test@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'Nurse', 'I9BVJ', 'Choose', 'nurse user.jpg'),
(78, 'Cashier', '1', 'nilvel1999@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'Cashier', 'I7BFA', 'Choose', 'xray result.webp'),
(79, 'Receptionist', '1', 'test@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'Receptionist', '9S0VU', 'Choose', '365314568_297066456207031_7681059749053247436_n.jpg'),
(80, 'Pharmacist', '1', 'test@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'Pharmacist', 'TWBEN', 'Choose', '2ef62f03fd68f645bcd2fdb31da0a6a7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `his_xray`
--

CREATE TABLE `his_xray` (
  `x_id` int(11) NOT NULL,
  `x_name` varchar(200) NOT NULL,
  `x_remarks` varchar(200) NOT NULL,
  `x_pic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `his_xray`
--

INSERT INTO `his_xray` (`x_id`, `x_name`, `x_remarks`, `x_pic`) VALUES
(1, 'Nilo Velarde', 'test', ''),
(2, 'Nilo Velarde', 'test1', ''),
(3, 'Nilo Velarde', 'tes3', 'CAPSTONE ERD ( admin ) (2).jpeg'),
(4, 'test add - update coding monday', 'testtttttt ', '2ef62f03fd68f645bcd2fdb31da0a6a7.jpg'),
(5, 'Nilo Velarde', 'test medtech', 'desktop-wallpaper-one-piece-the-8-best-fights-in-the-first-130-episodes-god-usopp.jpg'),
(6, 'Inpatient 1', 'test', 'xray result.webp'),
(7, 'OP 1', 'test', '2ef62f03fd68f645bcd2fdb31da0a6a7.jpg');

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
-- Indexes for table `his_discharged`
--
ALTER TABLE `his_discharged`
  ADD PRIMARY KEY (`dis_id`);

--
-- Indexes for table `his_docs`
--
ALTER TABLE `his_docs`
  ADD PRIMARY KEY (`doc_id`);

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
-- Indexes for table `his_guarantors`
--
ALTER TABLE `his_guarantors`
  ADD PRIMARY KEY (`g_id`);

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
-- Indexes for table `his_procedures`
--
ALTER TABLE `his_procedures`
  ADD PRIMARY KEY (`pro_id`);

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
-- Indexes for table `his_user`
--
ALTER TABLE `his_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `his_xray`
--
ALTER TABLE `his_xray`
  ADD PRIMARY KEY (`x_id`);

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
  MODIFY `ad_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `his_ancillary`
--
ALTER TABLE `his_ancillary`
  MODIFY `render_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `his_beds`
--
ALTER TABLE `his_beds`
  MODIFY `bed_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `his_cash`
--
ALTER TABLE `his_cash`
  MODIFY `cash_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `his_cbc`
--
ALTER TABLE `his_cbc`
  MODIFY `up_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `his_discharged`
--
ALTER TABLE `his_discharged`
  MODIFY `dis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `his_docs`
--
ALTER TABLE `his_docs`
  MODIFY `doc_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `his_equipments`
--
ALTER TABLE `his_equipments`
  MODIFY `item_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `his_examinations`
--
ALTER TABLE `his_examinations`
  MODIFY `exam_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `his_guarantors`
--
ALTER TABLE `his_guarantors`
  MODIFY `g_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `his_notify`
--
ALTER TABLE `his_notify`
  MODIFY `no_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `his_patients`
--
ALTER TABLE `his_patients`
  MODIFY `pat_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=362;

--
-- AUTO_INCREMENT for table `his_procedures`
--
ALTER TABLE `his_procedures`
  MODIFY `pro_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `his_rooms_beds`
--
ALTER TABLE `his_rooms_beds`
  MODIFY `room_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `his_supadmin`
--
ALTER TABLE `his_supadmin`
  MODIFY `sup_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `his_user`
--
ALTER TABLE `his_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `his_xray`
--
ALTER TABLE `his_xray`
  MODIFY `x_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
