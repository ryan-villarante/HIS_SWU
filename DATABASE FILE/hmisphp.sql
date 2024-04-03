-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2023 at 09:21 AM
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

INSERT INTO `his_admin` (`ad_id`, `ad_fname`, `ad_lname`, `ad_email`, `ad_pwd`, `ad_dpic`, `ad_type`) VALUES
(1, 'Nilo ', 'Velarde', 'nilvel@gmail.com', 'fe703d258c7ef5f50b71e06565a65aa07194907f', '5 (2).jpg', 'System_Admin');

-- --------------------------------------------------------

--
-- Table structure for table `his_ancillary`
--

CREATE TABLE `his_ancillary` (
  `render_id` int(20) NOT NULL,
  `render_code` varchar(200) NOT NULL,
  `render_name` varchar(200) NOT NULL,
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
  `render_by` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `his_ancillary`
--

INSERT INTO `his_ancillary` (`render_id`, `render_code`, `render_name`, `render_age`, `render_room_number`, `render_req_number`, `render_req_date`, `render_req_doc`, `render_doc_number`, `render_perform`, `render_date_time`, `render_amount`, `render_reg_number`, `render_or_number`, `render_payment`, `render_payer_name`, `render_by`) VALUES
(47, '', 'Test OutPatient 1', '0', '', '', '2023-09-26', 'Marvin balingag', 'CH-8920', '', '0000-00-00', '', '', '', '₱ 555', 'Test OutPatient 1', 'Nilo  Velarde  -Admin'),
(50, '', 'test emergency 1', '8', '', '', '2023-09-26', '', 'CH-4312', '', '0000-00-00', '', '', '', '₱ 777', 'test emergency 1', 'Marvin Obiedo   - Medtech'),
(51, '', 'test 1', '0', '', '', '2023-09-26', 'Marvin balingag', 'CH-1402', '', '0000-00-00', '', '', '', '₱ 6', 'test 1', 'Leoncio Lachica   - Nurse');

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
(133, 57, 'GF - 1', 'Available'),
(134, 57, 'GF - 2', 'Available'),
(135, 57, 'GF - 3', 'Available');

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
  `cash_remark` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `his_cash`
--

INSERT INTO `his_cash` (`cash_id`, `cash_or_number`, `cash_date`, `cash_payer`, `cash_amount`, `cash_check`, `cash_credit`, `cash_applied`, `uamount`, `cash_cashier`, `cash_remark`) VALUES
(21, '791354602', '2023-09-26', 'Bernadette Rivera', 8000, 0, 0, 7500, 500, 'Gwen Delgado', ''),
(23, '268314509', '2023-09-26', 'test OP 1', 0, 0, 0, 0, 0, 'test billing', ''),
(24, '748659102', '2023-09-26', 'test emergency 1', 0, 0, 0, 0, 0, 'Nilo  Velarde  -Admin', ''),
(25, '075496218', '2023-09-26', 'test emergency 1', 800, 0, 0, 777, 23, 'Gwen Cutieee', '');

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
(46, 'test', 'DOC 1', 'test@gmail.com', NULL, 'Medicine', 'Attending', 'Z1DJQ', 'Resident', 500, NULL),
(47, 'Nilo ', 'Velarde', 'nilvel@gmail.com', NULL, 'Pediatrics', 'Attending', '0ED3M', 'Regular Consultant', 445, NULL),
(48, 'Marvin', 'Obiedo', 'obiedo@gmail.com', NULL, 'Pediatrics', 'Attending', 'GQX76', 'Visiting Consultant', 233, NULL),
(49, 'test', '1', 'test@gmail.com', NULL, 'Gynecology', 'Admitting', 'UD3KQ', 'Resident', 222, NULL);

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
(125, 'DRU532896', 'testdrug', 'Drugs', 'testdrug', 'Ampule', 'Box', '2', 'MEDS478126', 100),
(126, 'MEDS084617', 'testMED', 'Medicine', 'testmed', 'mg', '', '2', 'MEDS084617', 100);

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
(31, '198352470', 'CT Scan', 'CBC', 'CBC', 'Ampule', 'Ampule', '5', '198352470', 777);

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
  `g_tele` int(20) DEFAULT NULL,
  `g_fax` int(20) DEFAULT NULL,
  `g_email` varchar(200) DEFAULT NULL,
  `g_address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `his_guarantors`
--

INSERT INTO `his_guarantors` (`g_id`, `g_code`, `g_gid`, `g_name`, `g_tele`, `g_fax`, `g_email`, `g_address`) VALUES
(34, 25483, 49821576, 'Test serok', 2112121212, NULL, 'test@gmail.com', 'test');

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

--
-- Dumping data for table `his_infostaff`
--

INSERT INTO `his_infostaff` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_pwd`, `user_dept`, `user_number`, `user_dpic`) VALUES
(17, 'Leoncio ', 'Lachica', 'obiedo@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'Student', 'ICWVX', 'luffy-sun-god-nika-wallpaper-u.png'),
(18, 'Marvin', 'serok', 'test@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'Student', 'QD19A', NULL);

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

--
-- Dumping data for table `his_medtech`
--

INSERT INTO `his_medtech` (`med_id`, `med_fname`, `med_lname`, `med_email`, `med_pwd`, `med_dept`, `med_number`, `med_dpic`) VALUES
(1, 'nil', 'vel', 'test@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'Student', 'HSE1Z', NULL),
(2, 'test', '1', 'test@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'Student', 'WY4J6', NULL);

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
  `room_id` int(11) NOT NULL,
  `bed_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `his_patients`
--

INSERT INTO `his_patients` (`pat_id`, `pat_fname`, `pat_lname`, `pat_dob`, `pat_age`, `pat_number`, `pat_addr`, `pat_phone`, `pat_type`, `pat_date_joined`, `pat_ailment`, `pat_discharge_status`, `pat_doc`, `pat_room_id`, `pat_room`, `pat_bed`, `pat_admit`, `pat_admit_time`, `pat_admit_type`, `pat_nurse`, `pat_billed`, `pat_series`, `pat_case`, `pat_case_type`, `pat_num`, `pat_er_case`, `pat_er_date`, `pat_er_series`, `pat_er_area`, `deleted`, `room_id`, `bed_id`) VALUES
(191, 'test', 'emergency 1', '2015-07-08', '8', 'EME-408592', 'Urgello Cebu City', '0974466464', 'Emergency', '2023-09-20 01:44:31.934287', NULL, NULL, NULL, 0, NULL, 'None', '', '', '', '', '', '', '', '', '', '837495', '2023-09-20', '357810', '', 0, 57, 133),
(192, 'test', '1', '2023-09-13', '0', 'INP-450816', 'Urgello Cebu City', '09435673452', 'InPatient', '2023-09-20 01:45:27.303373', NULL, NULL, 'Marvin balingag', 0, NULL, '', 'ADM1864', '2023-09-20', 'New Patient', '', '', '', '', '', '', '', '', '', '', 0, 57, 134),
(193, 'Test', 'OutPatient 1', '2023-09-15', '0', 'OP-145892', 'Urgello Cebu City', '09435673452', 'OutPatient', '2023-09-20 01:46:06.268006', NULL, NULL, 'Marvin balingag', 0, NULL, '', '', '', '', '', '', '201365', '203945', '2023-09-20', '9Z3485', '', '', '', '', 0, 57, 135);

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

--
-- Dumping data for table `his_patient_transfers`
--


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
(22, '184095376', 'RHB Procedures', 'PT REHAB PARAFFIN WAX BATH', 'PT REHAB PARAFFIN WAX BATH', 'None', 'None', '3', '184095376', 6);

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
(57, 'Building 1', 'Main', 'Ground Floor', 'GF', 'Available', 3, 'PRIVATE', 'GF', 'Test', NULL, 777);

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
(1, 'Nilo ', 'Velarde', 'joyboy@gmail.com', 'fe703d258c7ef5f50b71e06565a65aa07194907f', '5 (2).jpg');

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
(19, 'Marvin', 'Obiedo', 'obiedo@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'Medtech', '9R340', 'Staff', '2ef62f03fd68f645bcd2fdb31da0a6a7.jpg'),
(22, 'Kresshan ', 'Mante', 'test@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'Pharmacy', 'MX8D5', 'Choose', '365314568_297066456207031_7681059749053247436_n.jpg'),
(23, 'Leoncio', 'Lachica', 'test@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'Nurse', '6OPL8', 'Choose', '1164403.jpg'),
(27, 'Oliver ', 'Rigor', 'test@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'Infostaff', 'KPF7S', 'Choose', 'Spider-Man-2099-Across-the-Spider-Verse.jpg'),
(32, 'test', 'infostaff', 'test@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'Infostaff', 'ZBMET', 'Choose', ''),
(33, 'Kresshan ', 'Mante', 'test@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'Pharmacy', 'MX8D5', 'Choose', '365314568_297066456207031_7681059749053247436_n.jpg'),
(34, 'Kresshan ', 'Mante', 'test@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'Pharmacy', 'MX8D5', 'Choose', '365314568_297066456207031_7681059749053247436_n.jpg'),
(36, 'Leoncio', 'Lachica', 'test@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'Nurse', '6OPL8', 'Choose', '1164403.jpg'),
(37, 'Leoncio', 'Lachica', 'test@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'Nurse', '6OPL8', 'Choose', '1164403.jpg'),
(42, 'Gwen', 'Cutieee', 'test@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'Billing', '82NLI', 'Choose', ''),
(43, 'test', 'billing', 'test@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'Billing', 'OBTRK', 'Choose', '');

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
  MODIFY `ad_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `his_ancillary`
--
ALTER TABLE `his_ancillary`
  MODIFY `render_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `his_assets`
--
ALTER TABLE `his_assets`
  MODIFY `asst_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `his_beds`
--
ALTER TABLE `his_beds`
  MODIFY `bed_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `his_cash`
--
ALTER TABLE `his_cash`
  MODIFY `cash_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `his_docs`
--
ALTER TABLE `his_docs`
  MODIFY `doc_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `his_emergency`
--
ALTER TABLE `his_emergency`
  MODIFY `eme_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `his_equipments`
--
ALTER TABLE `his_equipments`
  MODIFY `item_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `his_examinations`
--
ALTER TABLE `his_examinations`
  MODIFY `exam_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `his_fee`
--
ALTER TABLE `his_fee`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `his_guarantors`
--
ALTER TABLE `his_guarantors`
  MODIFY `g_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
-- AUTO_INCREMENT for table `his_patients`
--
ALTER TABLE `his_patients`
  MODIFY `pat_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

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
  MODIFY `pro_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `his_pwdresets`
--
ALTER TABLE `his_pwdresets`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `his_rooms_beds`
--
ALTER TABLE `his_rooms_beds`
  MODIFY `room_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `his_supadmin`
--
ALTER TABLE `his_supadmin`
  MODIFY `sup_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `his_surgery`
--
ALTER TABLE `his_surgery`
  MODIFY `s_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `his_user`
--
ALTER TABLE `his_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

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
