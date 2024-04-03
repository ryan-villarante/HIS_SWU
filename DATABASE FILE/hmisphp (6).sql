-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2024 at 05:47 AM
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
(214, '', 'Ryan Villarante', 'OutPatient', '', '2F ', 500, '2024-03-26', 'Consultant 3', 'CH-2350', '₱ 500.00', '{\"values\":[\"Urinalysis (UA)\"]}', '0000-00-00', 0, '', '', '₱ 1000.00', 'Ryan Villarante', 'Nilo Velarde  -Admin', '713549', '63089', 0, 0, 0),
(215, '', 'Ryan Villarante', 'OutPatient', '', '2F ', 500, '2024-03-31', 'Consultant 3', 'CH-0467', '₱ 200.00', '{\"values\":[\"Stool Test (ST)\"]}', '0000-00-00', 0, '', '', '₱ 700.00', 'Ryan Villarante', 'Nilo Velarde  -Admin', '540319', '68029', 0, 0, 0),
(216, '', 'Ryan Villarante', 'OutPatient', '', '2F ', 500, '2024-03-31', 'Consultant 3', 'CH-5897', '₱ 100.00', '{\"values\":[\"Lipid Panel Cholesterol Test (LPCT)\"]}', '0000-00-00', 0, '', '', '₱ 600.00', 'Ryan Villarante', 'Nilo Velarde  -Admin', '981647', '12630', 0, 0, 0),
(217, '', 'Ryan Villarante', 'OutPatient', '', '2F ', 500, '2024-04-02', 'Consultant 3', 'CH-3276', '₱ 200.00', '{\"values\":[\"Serum Glutamic-Pyruvic Transaminase (SGPT)\"]}', '0000-00-00', 0, '', '', '₱ 700.00', 'Ryan Villarante', 'Nilo Velarde  -Admin', '274069', '23748', 0, 0, 0),
(218, '', 'Ryan Villarante', 'OutPatient', '', '2F ', 500, '2024-04-02', 'Consultant 3', 'CH-9804', '₱ 500.00', '{\"values\":[\"Complete Blood Count (CBC)\"]}', '0000-00-00', 0, '', '', '₱ 1000.00', 'Ryan Villarante', 'Nilo Velarde  -Admin', '734198', '70143', 0, 0, 0),
(219, '', 'Ryan Villarante', 'OutPatient', '', '2F ', 500, '2024-04-03', 'Consultant 3', 'CH-0567', '', '', '0000-00-00', 0, '', '', '', 'Ryan Villarante', 'No data found', '974850', '02973', 0, 0, 0),
(220, '', 'Ryan Villarante', 'OutPatient', '', '2F ', 500, '2024-04-03', 'Consultant 3', 'CH-4278', '₱ 785.00', '{\"values\":[]}', '0000-00-00', 0, '', '', '₱ 1285.00', 'Ryan Villarante', 'No data found', '146289', '83092', 0, 0, 0);

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
(152, 62, '1F Private  - 1', 'Available'),
(153, 63, 'test2 - 1', 'Available'),
(154, 63, 'test2 - 2', 'Available'),
(155, 63, 'test2 - 3', 'Available');

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
(69, 'OR1-081724', '2024-03-04', 'Jonathan 2', 123123, 0, 0, 6509, NULL, 'Nilo Velarde  -Admin', '', 0, 116614),
(70, 'OR1-897052', '2024-03-19', 'wwww Velarde', 1500, 0, 0, 1454, 0, 'No data found', 'Done', 0, 46),
(71, 'OR1-413072', '2024-03-19', 'awqw qwq', 4000, 0, 0, 3500, NULL, 'Nilo Velarde  -Admin', '', 0, 500),
(72, 'OR1-741356', '2024-03-24', 'Ryan Villarante', 1300, 0, 0, 1242, NULL, 'Nilo Velarde  -Admin', '', 0, 58);

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
(102, '', 'OP 1', '2', 'Low', '2', 'Low', 2, 'Low', 2, '', 2, '', 2, '', 2, 'Low', 2, 'Low', 2, 'Low', 2, 'Low', 2, 'Low', 2, 'Low', 2, 'Low', 'sadsdasd', '', 0),
(103, '', 'Nilo butay', '2', 'Low', '2', 'Low', 2, 'Low', 2, '', 2, '', 2, '', 2, 'Low', 2, 'Low', 2, 'Low', 2, 'Low', 2, 'Low', 2, 'Low', 2, 'Low', '', '', 0),
(104, '', 'Nilo butay', '2', '', '2', '', 2, '', 2, '', 2, '', 2, '', 2, '', 2, '', 2, '', 2, '', 2, '', 2, '', 2, '', '', '', 0),
(105, '', 'OP 1', '', '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', '', 0),
(106, '', 'OP 1', '', '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', '', 0),
(107, '', 'OP 1', '', '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', '', 0),
(108, '', 'OP 1', '', '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', '', 0),
(109, '', 'OP 1', '', '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', '', 0),
(110, '', 'OP 1', '', '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', '', 0),
(111, '', 'OP 1', '', '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', '', 0),
(112, '', 'OP 1', '', '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', '', 0),
(113, '', 'OP 1', '', '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', '', 0),
(114, '', 'OP 1', '', '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', '', 0),
(115, '', 'OP 1', '', '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', '', 0),
(116, '', 'OP 1', '', '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', '', 0),
(117, '', 'OP 1', '', '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', '', 0),
(118, '', 'OP 1', '', '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', '', 0),
(119, '', 'OP 1', '22', 'High', '2', 'Low', 2, 'Low', 2, '', 2, '', 2, '', 2, 'Low', 2, 'Low', 2, 'Low', 2, 'Low', 2, 'Low', 2, 'Low', 2, 'Low', '', '', 0),
(120, '', 'OP 1', '2', 'Low', '2', 'Low', 2, 'Low', 22, 'High', 2, '', 2, '', 2, 'Low', 2, 'Low', 2, 'Low', 2, 'Low', 2, 'Low', 2, 'Low', 2, 'Low', 'dssd', '', 0),
(121, '', 'OP 1', '2', 'Low', '2', 'Low', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', '', 0),
(122, '', 'OP 1', '12', '', '44', '', 12, '', 12, '', 12, 'High', 12, 'High', 12, 'High', 12, '', 12, 'Low', 12, 'Low', 12, 'Low', 12, 'Low', 12, 'Low', '', '', 0),
(123, '', 'Ryan Villarante', '2', 'Low', '2', 'Low', 2, 'Low', -1, 'Low', -1, 'Low', -1, 'Low', 2, 'Low', 2, 'Low', 2, 'Low', 2, 'Low', 2, 'Low', 2, 'Low', 2, 'Low', 'asdasd', '', 0),
(124, '', 'Ryan Villarante', '2', 'Low', '2', 'Low', 22, '', 1, '', 12, 'High', 2, '', 2147483647, 'High', 12, '', 12, 'Low', 12, 'Low', 12, 'Low', 2, 'Low', 2, 'Low', 'good', '', 0),
(125, '', 'Ryan Villarante', '', '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `his_cholesterol`
--

CREATE TABLE `his_cholesterol` (
  `up_id` int(20) NOT NULL,
  `up_number` varchar(200) NOT NULL,
  `up_name` varchar(200) NOT NULL,
  `fbs` varchar(200) NOT NULL,
  `fbs_range` varchar(200) NOT NULL,
  `creatinine` varchar(200) NOT NULL,
  `creatinine_range` varchar(200) NOT NULL,
  `uric_acid` int(20) NOT NULL,
  `uric_range` varchar(200) NOT NULL,
  `cholesterol` int(20) NOT NULL,
  `cholesterol_range` varchar(200) NOT NULL,
  `creatininerange` varchar(200) NOT NULL,
  `trig` int(20) NOT NULL,
  `trig_range` varchar(200) NOT NULL,
  `hdl` int(20) NOT NULL,
  `hdl_range` varchar(200) NOT NULL,
  `ldl` int(20) NOT NULL,
  `ldl_range` varchar(200) NOT NULL,
  `vldl` int(20) NOT NULL,
  `vldl_range` varchar(200) NOT NULL,
  `chol` int(20) NOT NULL,
  `chol_range` varchar(200) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `cbc_pic` varchar(200) DEFAULT NULL,
  `released` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `his_cholesterol`
--

INSERT INTO `his_cholesterol` (`up_id`, `up_number`, `up_name`, `fbs`, `fbs_range`, `creatinine`, `creatinine_range`, `uric_acid`, `uric_range`, `cholesterol`, `cholesterol_range`, `creatininerange`, `trig`, `trig_range`, `hdl`, `hdl_range`, `ldl`, `ldl_range`, `vldl`, `vldl_range`, `chol`, `chol_range`, `remarks`, `cbc_pic`, `released`) VALUES
(9, '', 'OP 1', '2', 'Low', '2', '', 2, '', 2, '', '', 2, 'Low', 2, 'Low', 2, '', 2, '', 2, '', 'aasdsad', '', 0),
(10, '', 'OP 1', '2', 'Low', '2', '', 2, '', 3232, 'High', '', 22, '', 2, 'Low', 2, '', 2, '', 2, '', 'asdas', '', 0),
(11, '', 'OP 1', '2', 'Low', '2', '', 2, '', 2, '', '', 2, 'Low', 2, 'Low', 2, '', 2, '', 2, '', 'asdsa', '', 0),
(12, '', 'OP 1', '2', 'Low', '2', '', 2, '', 2, '', '', 2, 'Low', 2, 'Low', 2, '', 1, 'Low', 2, '', 'asdas', '', 0),
(13, '', 'OP 1', '2', 'Low', '2', '', 2, '', 2, '', '', 2, 'Low', 2, 'Low', 2, '', 2, '', 2, '', 'asdsad', '', 0),
(14, '', 'OP 1', '2', 'Low', '2', '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', '', '', 0),
(15, '', 'Ryan Villarante', '2', 'Low', '2', '', 2, '', 2, '', '', 2, 'Low', 2, 'Low', 2, '', 2, '', 2, '', 'sample', '', 0),
(16, '', 'Ryan Villarante', '222', 'High', '', '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', '', '', 0),
(17, '', 'Ryan Villarante', '2', 'Low', '2', '', 2, '', 222, 'High', '', 22, '', 22, 'Low', 222, 'High', 222, 'High', 222, 'High', 'Sample', '', 0),
(18, '', 'Ryan Villarante', '2', 'Low', '2', '', 2, '', 222, 'High', '', 22, '', 22, 'Low', 222, 'High', 222, 'High', 222, 'High', 'Done', '', 0),
(19, '', 'Ryan Villarante', '22', 'Low', '22', '', 222, '', 2222, 'High', '', 222, 'High', 22222, '', 2222, 'High', 2222, 'High', 2222, 'High', 'Done', '', 0),
(20, '', 'Ryan Villarante', '222', 'High', '222', '', 22, '', 222, 'High', '', 2, 'Low', 2, 'Low', 222, 'High', 222, 'High', 22, 'High', 'Sample', '', 0),
(21, '', 'Ryan Villarante', '2', 'Low', '.50', '', 2, '', 222, 'High', '', 2, 'Low', 2, 'Low', 222, 'High', 1, 'Low', 22, 'High', 'Same', '', 0),
(22, '', 'Ryan Villarante', '2', 'Low', '.50', '', 2, '', 222, 'High', '', 2, 'Low', 2, 'Low', 222, 'High', 1, 'Low', 22, 'High', 'sdsad', '', 0),
(23, '', 'Ryan Villarante', '2', 'Low', '.5', '', 2, '', 222, 'High', '', 1, 'Low', 22, 'Low', 222, 'High', 222, 'High', 22, 'High', 'asdasd', '', 0),
(24, '', 'Ryan Villarante', '222', 'High', '22', '', 2, '', 222, 'High', '', 22, '', 2, 'Low', 222, 'High', 222, 'High', 22, 'High', 'adsad', '', 0),
(25, '', 'Ryan Villarante', '2', 'Low', '2', '', 2, '', 222, 'High', '', 2, 'Low', 2, 'Low', 222, 'High', 222, 'High', 22, 'High', 'asdasd', '', 0),
(26, '', 'Ryan Villarante', '222', 'High', '22', '', 222, '', 222, 'High', '', 222, 'High', 22, 'Low', 222, 'High', 222, 'High', 22, 'High', 'asdsad', '', 0);

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
(22, 'Ryan Villarante', 'Consultant 3', '2024-03-24', 'Discharge', '', 'Died', 'Sample', 'Regular Patient', 'Sample'),
(23, 'Ryan Villarante', 'Consultant 3', '2024-03-26', 'Recovered', '', 'Recovered', 'Recovered', 'Regular Patient', 'Recovered'),
(24, 'Ryan Villarante', 'Nilo Velarde', '2024-04-02', 'Recovered', '', 'Improved', 'asdas', 'Regular Patient', 'asdasd');

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
(46, '217508394', 'Laboratory Examinations', 'None', 'Urinalysis (UA)', 'None', 'None', '', '217508394', 500),
(50, '807316594', 'Laboratory Examinations', 'None', 'Stool Test (ST)', 'None', 'None', '', '807316594', 200),
(51, '218057496', 'Laboratory Examinations', 'None', 'Lipid Panel Cholesterol Test (LPCT)', 'None', 'None', '', '218057496', 100),
(52, '308541679', 'Laboratory Examinations', 'None', 'Serum Glutamic-Pyruvic Transaminase (SGPT)', 'None', 'None', '', '308541679', 200),
(53, '952618470', 'Laboratory Examinations', 'None', 'Complete Blood Count (CBC)', 'None', 'None', '', '952618470', 500);

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
(46, 69745, 915604278, 'Nilo', 'Velarde', 2147483647, 'Philhealth', NULL, 'nilvel1999@gmail.com', 'Sambag 1');

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
(135, 'Billing', 361, '2023-12-16 21:35:54', 'Please tag patient Nilo Velarde with the patient ID EME-948021 as cleared', 1),
(136, 'Billing', 347, '2024-01-29 07:58:05', 'Please tag patient Agat Velarde with the patient ID OP-248739 as cleared', 1),
(137, 'Billing', 363, '2024-03-24 07:47:47', 'Please tag patient Ryan Villarante with the patient ID EME-081239 as cleared', 1),
(138, 'Billing', 364, '2024-03-24 07:49:06', 'Please tag patient Ryan Villarante with the patient ID INP-892561 as cleared', 1),
(139, 'Billing', 365, '2024-03-26 07:00:55', 'Please tag patient Ryan Villarante with the patient ID INP-673485 as cleared', 1),
(140, 'Billing', 368, '2024-04-02 04:48:45', 'Please tag patient Ryan Villarante with the patient ID INP-184023 as cleared', 1),
(141, 'Billing', 369, '2024-04-02 06:26:27', 'Please tag patient Ryan Villarante with the patient ID INP-201657 as cleared', 1);

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
(364, 'Ryan', 'Villarante', '2024-03-30', '', '', '', 'INP-892561', 'DAKIT,POBLACION,PINAMUNGAJAN,CEBU', '09551301098', 'InPatient', '2024-03-24 07:50:43.180792', NULL, NULL, 'Consultant 3', 0, NULL, '', 'ADM3470', '2024-03-24', 'None', '', '', '', '', '', '', '', '', '', '', 0, 1, 1, 62, 152, 122),
(365, 'Ryan', 'Villarante', '2024-03-06', '0', '', '', 'INP-673485', 'DAKIT,POBLACION,PINAMUNGAJAN,CEBU', '09551301098', 'InPatient', '2024-03-26 07:01:28.265692', NULL, NULL, 'Consultant 3', 0, NULL, '', 'ADM1430', '2024-03-24', 'None', '', '', '', '', '', '', '', '', '', '', 0, 1, 1, 61, 148, 122),
(366, 'Ryan', 'Villarante', '2004-02-25', '20', NULL, NULL, 'EME-526874', 'DAKIT,POBLACION,PINAMUNGAJAN,CEBU', '09551301098', 'Emergency', '2024-03-25 01:09:44.203091', NULL, NULL, NULL, 0, NULL, '', '', '', '', '', '', '', '', '', '', '975860', '2024-03-25', '317596', '', 0, 0, 0, NULL, NULL, 0),
(367, 'Ryan', 'Villarante', '2000-06-15', '', 'Single', 'Male', 'OP-459021', 'DAKIT,POBLACION,PINAMUNGAJAN,CEBU', '09551301098', 'OutPatient', '2024-03-25 01:40:33.681403', NULL, NULL, 'Consultant 3', 0, NULL, '', '', '', '', '', '', '647952', '425137', '2024-03-25', '794Z38', '', '', '', '', 0, 0, 0, 61, 147, 0),
(368, 'Ryan', 'Villarante', '2016-06-04', '', 'Single', 'Male', 'INP-184023', 'DAKIT,POBLACION,PINAMUNGAJAN,CEBU', '09551301098', 'InPatient', '2024-04-02 04:49:30.655370', NULL, NULL, 'Nilo Velarde', 0, NULL, '', 'ADM1507', '2024-04-02', 'None', '', '', '', '', '', '', '', '', '', '', 0, 1, 1, 63, 154, 5000),
(369, 'Ryan', 'Villarante', '', '', '', '', 'INP-201657', 'DAKIT,POBLACION,PINAMUNGAJAN,CEBU', '09551301098', 'InPatient', '2024-04-02 06:26:54.330350', NULL, NULL, 'Nilo Velarde', 0, NULL, '', 'ADM1423', '2024-04-02', 'None', '', '', '', '', '', '', '', '', '', '', 0, 1, 1, 61, 147, 5000),
(370, 'Ryan', 'Villarante', '', '', '', '', 'INP-201657', 'DAKIT,POBLACION,PINAMUNGAJAN,CEBU', '09551301098', 'InPatient', '2024-04-02 06:26:35.595246', NULL, NULL, 'Nilo Velarde', 0, NULL, '', 'ADM1423', '2024-04-02', 'None', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 61, 147, 5000);

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
(62, 'Building 1', 'Main', 'Ground Floor', '1F Private ', 'Available', 1, 'WARD', '1F Private ', 'test', NULL, 899),
(63, 'Building 3', 'Main', '2nd Floor', 'test2', 'Available', 3, 'EMERGENCY', 'test2', 'ASDAS', NULL, 2323);

-- --------------------------------------------------------

--
-- Table structure for table `his_sgpt`
--

CREATE TABLE `his_sgpt` (
  `up_id` int(20) NOT NULL,
  `up_number` varchar(200) NOT NULL,
  `up_name` varchar(200) NOT NULL,
  `sodium` varchar(200) NOT NULL,
  `sodium_range` varchar(200) NOT NULL,
  `potassium` varchar(200) NOT NULL,
  `potassium_range` varchar(200) NOT NULL,
  `chloride` int(20) NOT NULL,
  `chloride_range` varchar(200) NOT NULL,
  `cal` int(20) NOT NULL,
  `cal_range` varchar(200) NOT NULL,
  `cium` int(20) NOT NULL,
  `cium_range` varchar(200) NOT NULL,
  `magnesium` int(20) NOT NULL,
  `magnesium_range` varchar(200) NOT NULL,
  `phosphorus` int(20) NOT NULL,
  `phosphorus_range` varchar(200) NOT NULL,
  `db` int(20) NOT NULL,
  `db_range` varchar(200) NOT NULL,
  `ib` int(20) NOT NULL,
  `ib_range` varchar(200) NOT NULL,
  `creatinine` int(20) NOT NULL,
  `creatinine_range` varchar(200) NOT NULL,
  `bun` int(20) NOT NULL,
  `bun_range` varchar(200) NOT NULL,
  `bua` int(20) NOT NULL,
  `bua_range` varchar(200) NOT NULL,
  `albumin` int(20) NOT NULL,
  `albumin_range` varchar(200) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `cbc_pic` varchar(200) DEFAULT NULL,
  `released` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `his_sgpt`
--

INSERT INTO `his_sgpt` (`up_id`, `up_number`, `up_name`, `sodium`, `sodium_range`, `potassium`, `potassium_range`, `chloride`, `chloride_range`, `cal`, `cal_range`, `cium`, `cium_range`, `magnesium`, `magnesium_range`, `phosphorus`, `phosphorus_range`, `db`, `db_range`, `ib`, `ib_range`, `creatinine`, `creatinine_range`, `bun`, `bun_range`, `bua`, `bua_range`, `albumin`, `albumin_range`, `remarks`, `cbc_pic`, `released`) VALUES
(1, '', 'Nilo butay', '2', 'Low', '2', 'Low', 2, 'Low', 2, 'High', 2, 'Low', 2, '', 2, 'Low', 2, 'High', 2, 'High', 2, 'High', 2, 'Low', 2, 'Low', 2, 'Low', '', '', 0),
(2, '', 'Agat Velarde', '2', 'Low', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', '', 0),
(3, '', 'Ryan Villarante', '2', 'Low', '2', 'Low', 2, 'Low', 2, 'High', 2, 'Low', 2, '', 2, 'Low', 2, 'High', 2, 'High', 2, 'High', 2, 'Low', 2, 'Low', 2, 'Low', 'Sample', '', 0),
(4, '', 'Ryan Villarante', '2', 'Low', '2', 'Low', 2, 'Low', 1, 'Low', 2, 'Low', 1, 'Low', 1, 'Low', -1, 'Low', 0, 'Low', 0, 'Low', 1, 'Low', 1, 'Low', 1, 'Low', 'asdasd', '', 0),
(5, '', 'Ryan Villarante', '2', 'Low', '2', 'Low', 2, 'Low', 2, 'High', 2, 'Low', 22, 'High', 22, 'High', 2, 'High', 2, 'High', 2, 'High', 2, 'Low', 2, 'Low', 2, 'Low', 'good', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `his_stool`
--

CREATE TABLE `his_stool` (
  `up_id` int(20) NOT NULL,
  `up_number` varchar(200) NOT NULL,
  `up_name` varchar(200) NOT NULL,
  `color` varchar(200) NOT NULL,
  `consistency` varchar(200) NOT NULL,
  `wbc` int(200) NOT NULL,
  `wbc_range` varchar(200) NOT NULL,
  `rbc` int(20) NOT NULL,
  `rbc_range` varchar(200) NOT NULL,
  `ova_parasites` varchar(200) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `cbc_pic` varchar(200) DEFAULT NULL,
  `released` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `his_stool`
--

INSERT INTO `his_stool` (`up_id`, `up_number`, `up_name`, `color`, `consistency`, `wbc`, `wbc_range`, `rbc`, `rbc_range`, `ova_parasites`, `remarks`, `cbc_pic`, `released`) VALUES
(26, '', 'OP 1', 'Brown', '', 0, '', 0, '', '', 'asd', NULL, 0),
(27, '', 'Ryan Villarante', 'Brown', 'Sample', 2, 'High', 3, 'High', '', 'asdasdsa', NULL, 0),
(28, '', 'Ryan Villarante', '', '', 3, 'High', 3, 'High', '', '', NULL, 0),
(29, '', 'Ryan Villarante', 'Brown', 'Sample', 3, 'High', 22, 'High', '', 'asdasd', NULL, 0),
(30, '', 'Ryan Villarante', 'Brown', 'Sample', 2, 'High', 22, 'High', 'Sample', 'Good', NULL, 0),
(31, '', 'Ryan Villarante', 'Brown', 'Sample', 3, 'High', 22, 'High', 'Sample', 'ghghg', NULL, 0),
(32, '', 'Ryan Villarante', 'Black/Tarry', 'Soft', 2, 'High', 2, '', 'Detected', 'asdsad', NULL, 0);

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
-- Table structure for table `his_urinalysis`
--

CREATE TABLE `his_urinalysis` (
  `up_id` int(20) NOT NULL,
  `up_number` varchar(200) NOT NULL,
  `up_name` varchar(200) NOT NULL,
  `color` varchar(200) NOT NULL,
  `transparent` varchar(200) NOT NULL,
  `sp_gravity` varchar(200) NOT NULL,
  `sp_range` varchar(200) NOT NULL,
  `ph` varchar(200) NOT NULL,
  `protein` varchar(200) NOT NULL,
  `glocuse` varchar(200) NOT NULL,
  `bilirubin` varchar(200) NOT NULL,
  `blood` varchar(200) NOT NULL,
  `leucocytes` varchar(200) NOT NULL,
  `nitrite` varchar(200) NOT NULL,
  `urobilinogen` varchar(200) NOT NULL,
  `urobilinogen_range` varchar(200) NOT NULL,
  `ketone` varchar(200) NOT NULL,
  `rbc` int(20) NOT NULL,
  `rbc_range` varchar(200) NOT NULL,
  `wbc` int(20) NOT NULL,
  `wbc_range` varchar(200) NOT NULL,
  `epithelial_cells` varchar(200) NOT NULL,
  `bacteria` varchar(200) NOT NULL,
  `mucus_threads` varchar(200) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `cbc_pic` varchar(200) DEFAULT NULL,
  `released` tinyint(1) NOT NULL DEFAULT 0,
  `ph_ranges` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `his_urinalysis`
--

INSERT INTO `his_urinalysis` (`up_id`, `up_number`, `up_name`, `color`, `transparent`, `sp_gravity`, `sp_range`, `ph`, `protein`, `glocuse`, `bilirubin`, `blood`, `leucocytes`, `nitrite`, `urobilinogen`, `urobilinogen_range`, `ketone`, `rbc`, `rbc_range`, `wbc`, `wbc_range`, `epithelial_cells`, `bacteria`, `mucus_threads`, `remarks`, `cbc_pic`, `released`, `ph_ranges`) VALUES
(188, '', 'Agat Velarde', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, '', '', '', '', '', '', 0, ''),
(189, '', 'Agat Velarde', 'Green', 'None', '2', 'High', '2', 'asd', 'asd', 'asd', 'asd', 'sad', 'asd', '3', 'High', 'wqe', 44, 'High', 44, 'High', 'ad', 'asdsad', 'asd', 'sasa', '', 0, ''),
(190, '', 'Agat Velarde', 'Green', 'None', '2', 'High', '2', 'sad', 'ads', 'asd', 'asd', 'asd', 'asd', '2', 'High', 'asd', 22, 'High', 22, 'High', 'asd', 'asd', 'asd', 'asdasdasd', '', 0, ''),
(191, '', 'Agat Velarde', 'Green', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, '', '', '2', '2', 'asd', '', 0, ''),
(192, '', 'Ryan Villarante', 'Green', 'None', '-1', 'Low', '2', 'asdasdasd', 'asd', 'asd', 'asd', 'asd', 'asd', '2', 'High', 'dasd', 6, 'High', 6, 'High', 'asd', 'asd', 'asd', 'asdasd', '', 0, ''),
(193, '', 'Ryan Villarante', 'Green', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, '', '', '', '', '', '', 0, ''),
(194, '', 'Ryan Villarante', 'Green', 'None', '2', 'High', '2', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '2', 'High', 'asd', 22, 'High', 22, 'High', 'asd', 'asd', 'asd', 'asdasd', '', 0, ''),
(195, '', 'Ryan Villarante', 'Yellow', '', '1.5', 'High', '4.0', 'Negative', 'Negative', 'Negative', 'Negative', 'Negative', 'Negative', '', '', '', 6, 'High', 6, 'High', 'Few', 'Few', '', 'Good', '', 0, ''),
(196, '', 'Ryan Villarante', 'Clear', 'Opaque', '', '', '', '', '', '', '', '', 'Positive', '', '', '', 22, 'High', 22, 'High', 'None', 'Few', 'None', '', '', 0, ''),
(197, '', 'Ryan Villarante', 'Pale yellow', 'Clear', '2', 'High', '2', 'Negative', 'Trace', 'Negative', 'Negative', 'Trace', 'Positive', '3', 'High', 'Negative', 44, 'High', 22, 'High', 'None', 'Few', 'None', '', '', 0, ''),
(198, '', 'Ryan Villarante', 'Pale yellow', 'Slightly cloudy', '-1', 'Low', '2', 'Negative', 'Negative', 'Negative', 'Trace', 'Trace', 'Positive', '3', 'High', 'Negative', 22, 'High', 22, 'High', 'None', 'Few', 'Moderate', 'sasas', '', 0, ''),
(199, '', 'Ryan Villarante', 'Pale yellow', 'Clear', '3', 'High', '2', 'Negative', 'Negative', 'Trace', 'Trace', '2+', 'Negative', '3', 'High', 'Negative', 6, 'High', 6, 'High', 'None', 'Few', 'Few', 'asdas', '', 0, ''),
(200, '', 'Ryan Villarante', 'Pale yellow', 'Foamy', '3', 'High', '4.0', '1+', '2+', '1+', 'Trace', '1+', 'Negative', '3', 'High', '1+', 22, 'High', 44, 'High', 'Few', 'Few', 'None', '', '', 0, ''),
(201, '', 'Ryan Villarante', 'Pale yellow', 'Slightly cloudy', '1.5', 'High', '4.0', 'Negative', 'Trace', 'Trace', 'Negative', 'Trace', 'Negative', '3', 'High', 'Trace', 6, 'High', 6, 'High', 'Few', 'Moderate', 'Few', 'Noas', '', 0, ''),
(202, '', 'Ryan Villarante', 'Dark yellow', 'Slightly cloudy', '', '', '', '', '', '', 'Negative', '1+', 'Negative', '2', 'High', 'Trace', 22, 'High', 6, 'High', 'None', 'Few', 'Few', 'sasa', '', 0, ''),
(203, '', 'Ryan Villarante', 'Pale yellow', 'Slightly cloudy', '3', 'High', '4.0', 'Trace', 'Negative', 'Trace', 'Trace', 'Negative', 'Negative', '3', 'High', 'Trace', 22, 'High', 32, 'High', 'None', 'Few', 'Few', 'sasa', '', 0, ''),
(204, '', 'Ryan Villarante', 'Dark yellow', 'Clear', '3', 'High', '2', 'Trace', 'Trace', 'Trace', '1+', 'Trace', 'Negative', '3', 'High', 'Trace', 44, 'High', 3, '', 'Few', 'None', 'None', 'S', '', 0, ''),
(205, '', 'Ryan Villarante', 'Amber or honey-colored', 'Slightly cloudy', '3', 'High', '2', 'Trace', 'Trace', 'Negative', 'Negative', 'Trace', 'Positive', '2', 'High', '1+', 22, 'High', 44, 'High', 'Few', 'Moderate', 'Moderate', 'Bad', '', 0, ''),
(206, '', 'Ryan Villarante', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, '', '', '', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `his_urine`
--

CREATE TABLE `his_urine` (
  `up_id` int(20) NOT NULL,
  `ova_parasites` varchar(200) NOT NULL,
  `up_name` varchar(200) NOT NULL,
  `color` varchar(200) NOT NULL,
  `consistency` varchar(200) NOT NULL,
  `wbc` int(20) NOT NULL,
  `wbc_range` varchar(200) NOT NULL,
  `rbc` int(20) NOT NULL,
  `rbc_range` varchar(200) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `cbc_pic` varchar(200) DEFAULT NULL,
  `released` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(90, 'Ryan', 'Villarante', 'ryanvillarante9@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'Cashier', 'MATB3', 'Choose', ''),
(91, 'Ryan', 'Villarante', 'ryanvillarante9@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'Pharmacist', '8C4PB', 'Choose', '');

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
-- Indexes for table `his_cholesterol`
--
ALTER TABLE `his_cholesterol`
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
-- Indexes for table `his_sgpt`
--
ALTER TABLE `his_sgpt`
  ADD PRIMARY KEY (`up_id`);

--
-- Indexes for table `his_stool`
--
ALTER TABLE `his_stool`
  ADD PRIMARY KEY (`up_id`);

--
-- Indexes for table `his_supadmin`
--
ALTER TABLE `his_supadmin`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indexes for table `his_urinalysis`
--
ALTER TABLE `his_urinalysis`
  ADD PRIMARY KEY (`up_id`);

--
-- Indexes for table `his_urine`
--
ALTER TABLE `his_urine`
  ADD PRIMARY KEY (`up_id`);

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
  MODIFY `render_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT for table `his_beds`
--
ALTER TABLE `his_beds`
  MODIFY `bed_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `his_cash`
--
ALTER TABLE `his_cash`
  MODIFY `cash_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `his_cbc`
--
ALTER TABLE `his_cbc`
  MODIFY `up_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `his_cholesterol`
--
ALTER TABLE `his_cholesterol`
  MODIFY `up_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `his_discharged`
--
ALTER TABLE `his_discharged`
  MODIFY `dis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  MODIFY `exam_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `his_guarantors`
--
ALTER TABLE `his_guarantors`
  MODIFY `g_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `his_notify`
--
ALTER TABLE `his_notify`
  MODIFY `no_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `his_patients`
--
ALTER TABLE `his_patients`
  MODIFY `pat_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=371;

--
-- AUTO_INCREMENT for table `his_procedures`
--
ALTER TABLE `his_procedures`
  MODIFY `pro_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `his_rooms_beds`
--
ALTER TABLE `his_rooms_beds`
  MODIFY `room_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `his_sgpt`
--
ALTER TABLE `his_sgpt`
  MODIFY `up_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `his_stool`
--
ALTER TABLE `his_stool`
  MODIFY `up_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `his_supadmin`
--
ALTER TABLE `his_supadmin`
  MODIFY `sup_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `his_urinalysis`
--
ALTER TABLE `his_urinalysis`
  MODIFY `up_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `his_urine`
--
ALTER TABLE `his_urine`
  MODIFY `up_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `his_user`
--
ALTER TABLE `his_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

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
