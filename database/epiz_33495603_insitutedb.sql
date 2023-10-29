-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 05:22 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_33495603_insitutedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(11) NOT NULL,
  `about_title` varchar(50) NOT NULL,
  `about_description` mediumtext NOT NULL,
  `about_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `about_title`, `about_description`, `about_img`) VALUES
(37, 'About', 'Nistha Institute of Science & Technology was established with the objective is providing modern education with special emphasis on Information Technology, Management and Traditional Programs through Regular, Virtual and Distance learning modes and working towards overall development of the society specially for the benefit of under priviledge groups by operating in rural and remote areas.Nistha Institute of Science & Technology has take his word as employability through education so that every student contributes to the social and national growth.', '1682687364-1677760228-1674740888-about.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `addmission_billing`
--

CREATE TABLE `addmission_billing` (
  `id` int(11) NOT NULL,
  `registerId` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `semesterfee` varchar(255) NOT NULL,
  `add_fees` varchar(255) NOT NULL,
  `otherfee` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `totalfee` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addmission_billing`
--

INSERT INTO `addmission_billing` (`id`, `registerId`, `name`, `semesterfee`, `add_fees`, `otherfee`, `course`, `payment`, `totalfee`, `date`) VALUES
(1, '15', 'Mandeep Yadav', '15000', '3000', '1200', '1', 'By PhonePe', '19200', '2023-05-16 - 11:59:11am'),
(2, '26', 'Anjali Yadav', '1000', '500', '500', '2', 'By UPI', '2000', '2023-05-16 - 12:05:24pm');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `ad_user` varchar(50) DEFAULT NULL,
  `ad_pass` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `ad_user`, `ad_pass`) VALUES
(8, 'admin', 'admin07', 'f30c001f68e5957dcb3115011f7094a4');

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `id` int(11) NOT NULL,
  `stuId` int(11) NOT NULL,
  `stu_name` varchar(30) NOT NULL,
  `stu_fname` varchar(30) NOT NULL,
  `stu_mname` varchar(30) NOT NULL,
  `stu_dob` varchar(15) NOT NULL,
  `stu_gender` varchar(10) NOT NULL,
  `number` varchar(12) NOT NULL,
  `parentNumber` varchar(12) NOT NULL,
  `stu_email` varchar(25) NOT NULL,
  `course` varchar(50) NOT NULL,
  `perAddress` text NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pincode` varchar(7) NOT NULL,
  `percent` varchar(20) NOT NULL,
  `yearOfPass` varchar(20) NOT NULL,
  `stuImg` varchar(255) NOT NULL,
  `highschool` varchar(255) NOT NULL,
  `interMarksheet` varchar(255) NOT NULL,
  `aadharcard` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`id`, `stuId`, `stu_name`, `stu_fname`, `stu_mname`, `stu_dob`, `stu_gender`, `number`, `parentNumber`, `stu_email`, `course`, `perAddress`, `address2`, `city`, `state`, `pincode`, `percent`, `yearOfPass`, `stuImg`, `highschool`, `interMarksheet`, `aadharcard`, `payment`, `status`) VALUES
(37, 15, 'Mandeep Yadav', 'Nagendra  Yadav', 'Sunita  Devi', '2003-01-01', 'male', '9787856387', '9574985745', 'mandeep123@gmail.com', '1', 'Mau', 'Azamgarh', 'Mau', 'Uttar Pradesh', '276002', '70%', '2020', 'face19.jpg', 'highschool.jpg', 'intermediate.jpg', 'aadhar.jpg', 'By PhonePe', '1'),
(38, 26, 'Anjali Yadav', 'Shyam Yadav', 'Sunita Yadav', '2003-01-01', 'female', '8372895295', '9867406938', 'anjali001@gmail.com', '2', 'Jaunpur Uttar Pradesh ', 'Azamgarh ', 'Jaunpur', 'Uttar Pradesh', '276003', '78%', '2022', 'face6.jpg', 'girl-degree.jpg', 'intermediate.jpg', 'adhar.jpg', 'By UPI', '1');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `carousel_id` int(11) NOT NULL,
  `carousel_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`carousel_id`, `carousel_name`) VALUES
(3, '1.jpg'),
(17, '1682687079-1677760228-1674740888-about.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(1, 'Notice', 4),
(2, 'Student', 8),
(19, 'Examination', 2);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(30) NOT NULL,
  `contact_email` varchar(50) NOT NULL,
  `contact_message` varchar(1000) NOT NULL,
  `status` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_name`, `contact_email`, `contact_message`, `status`) VALUES
(1, 'Rohan', 'rohan1222@gmail.com', 'Hello,This is Contact Page.', '1'),
(9, 'Manddep Yadav', 'mandeep21@gmail.com', 'Hello MySelf Mandeep Yadav\n', '1'),
(17, 'Aman Kumar', 'aman003@gmail.com', 'Hi I am Aman Kumar.', '1'),
(18, 'fdgkd', 'Amisha@gmail.com', 'fdijfogdijg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `fees` varchar(10) NOT NULL,
  `add_fees` varchar(255) NOT NULL,
  `examfee` varchar(255) DEFAULT NULL,
  `otherfee` varchar(255) DEFAULT NULL,
  `seat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_name`, `fees`, `add_fees`, `examfee`, `otherfee`, `seat`) VALUES
(1, 'BCA', '15000', '3000', '1200', '1200', '59'),
(2, 'CCC', '1000', '500', '500', '500', '24'),
(14, 'DCA', '2000', '500', '500', '500', '20'),
(38, 'O Level', '11000', '1000', '1000', '1000', '20'),
(43, 'A Level', '15000', '1000', '1200', '1000', '40'),
(46, 'Tally.ERP 9', '2000', '500', '500', '500', '10');

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `id` int(11) NOT NULL,
  `registerId` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `semesterfee` varchar(255) NOT NULL,
  `otherfee` varchar(255) NOT NULL,
  `examfee` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `totalfee` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`id`, `registerId`, `name`, `semesterfee`, `otherfee`, `examfee`, `course`, `payment`, `totalfee`, `date`) VALUES
(1, '21', 'Rohan Maurya', '15000', '1200', '1200', '1', 'phonePe', '17400', '2023-05-03 - 10:56:23pm'),
(2, '21', 'Rohan Maurya', '15000', '1200', '1200', '1', 'phonePe', '17400', '2023-05-03 - 11:01:23pm'),
(3, '21', 'Rohan Maurya', '15000', '1200', '1200', '1', 'phonePe', '17400', '2023-05-04 - 01:44:52pm'),
(4, '21', 'Rohan Maurya', '15000', '1200', '1200', '1', 'phonePe', '17400', '2023-05-04 - 01:45:01pm'),
(5, '21', 'Rohan Maurya', '15000', '1200', '1200', '1', 'phonePe', '17400', '2023-05-04 - 01:45:16pm'),
(6, '21', 'Rohan Maurya', '15000', '1200', '1200', '1', 'phonePe', '17400', '2023-05-04 - 01:46:14pm'),
(7, '21', 'Rohan Maurya', '15000', '1200', '1200', '1', 'phonePe', '17400', '2023-05-04 - 01:46:17pm'),
(8, '21', 'Rohan Maurya', '15000', '1200', '1200', '1', 'phonePe', '17400', '2023-05-04 - 01:47:16pm'),
(10, '21', 'Rohan Maurya', '15000', '1200', '1200', '1', 'By UPI', '17400', '2023-05-04 - 01:59:34pm'),
(11, '21', 'Rohan Maurya', '15000', '1200', '1200', '1', 'By UPI', '17400', '2023-05-04 - 01:59:36pm'),
(12, '21', 'Rohan Maurya', '15000', '1200', '1200', '1', 'By Card', '17400', '2023-05-04 - 02:00:22pm'),
(13, '21', 'Rohan Maurya', '15000', '1200', '1200', '1', 'By PhonePe', '17400', '2023-05-04 - 02:00:29pm'),
(14, '21', 'Rohan Maurya', '15000', '1200', '1200', '1', 'By UPI', '17400', '2023-05-04 - 02:00:33pm'),
(15, '21', 'Rohan Maurya', '15000', '1200', '1200', '1', 'By Card', '17400', '2023-05-04 - 02:01:06pm'),
(16, '21', 'Rohan Maurya', '2000', '500', '500', '14', 'By Card', '3000', '2023-05-04 - 02:23:01pm'),
(17, '21', 'Rohan Maurya', '2000', '500', '500', '14', 'By PhonePe', '3000', '2023-05-04 - 02:31:44pm');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gal_id` int(11) NOT NULL,
  `gal_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gal_id`, `gal_title`) VALUES
(4, '1677760170-14.jpg'),
(6, '1677760181-6.jpg'),
(8, '1677760194-4.jpg'),
(9, '1677760199-7.jpg'),
(10, '1677760228-1674740888-about.jpg'),
(11, '1677760237-gal.jpg'),
(12, '1677760242-1.jpg'),
(16, '1678876597-1677760194-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `notice_title` varchar(100) NOT NULL,
  `description` mediumtext NOT NULL,
  `notice_date` varchar(40) NOT NULL,
  `category` varchar(50) NOT NULL COMMENT '1 for notice & 2 for Students & 3 for examination\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `notice_title`, `description`, `notice_date`, `category`) VALUES
(43, 'Student', '                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem', '19 Aug, 2022', '2'),
(49, 'Student1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. L', '18 Apr, 2023', '2'),
(50, 'Lorem 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ', '20 Aug, 2022', '1'),
(51, 'Lorem 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ', '26 Aug, 2022', '1'),
(55, 'Lorem 1', ' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem  ', '30 Aug, 2022', '2'),
(56, 'Lorem 2', ' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem  ', '30 Aug, 2022', '2'),
(57, 'Lorem 3', ' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem  ', '30 Aug, 2022', '2'),
(58, 'Lorem 5', ' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem  ', '30 Aug, 2022', '2'),
(59, 'Lorem 4', ' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem  ', '30 Aug, 2022', '2'),
(60, 'lorem 6', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem', '30 Aug, 2022', '2'),
(61, 'Lorem 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem', '30 Aug, 2022', '19'),
(62, 'Lorem 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem', '30 Aug, 2022', '19');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `websitename` varchar(60) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `footerdesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `websitename`, `logo`, `footerdesc`) VALUES
(1, 'Nist Institute Azamgarh', 'logo.png', '© Copyright 2023 | Powered by NIST AZAMGARH');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `eligible` text NOT NULL,
  `syllabus` text NOT NULL,
  `about` text NOT NULL,
  `objective` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `eligible`, `syllabus`, `about`, `objective`) VALUES
(1, 'Passed 10+2 from recognized Board.', '<li>Computer Fundamental</li>\n<li>Digital Electronics</li>\n<li>Principle of Management</li>\n<li>Mathematics- II</li>\n<li>Database Management Systems</li>\n<li>Web Designing</li>\n<li>Data Structures</li>\n<li>Advanced Java and Python Lab</li>', '<li>LEVEL : UNDERGRADUATE </li>\n<li>DURATION : 3 YEARS</li>\n<li>SEMESTER : 6 </li>\n<li> Fees: 15K / semester</li>', '<li>Programmer.</li>\n<li>Software Developer.</li>\n<li>Web Developer</li>\n<li>Web designer.</li>\n<li>Software Tester.</li>'),
(2, 'Passed 10 from recognized Board.', '<li>Introduction to Computer</li>\n<li>Introduction to GUI Based Operating System</li>\n<li>Elements of Broadcasting</li>\n<li>Spreadsheets</li>\n<li>Computer Communication & Internet</li>\n<li>WWW and Web browser</li>\n<li>Communication and Collaboration</li>', '<li>LEVEL : UNDERGRADUATE </li>\n<li>DURATION : 3 Months</li>', '<li>Application Support Executive</li>\n<li>Bank Office Executive</li>\n<li>BPO or KPO Executive</li>\n<li>Clerk</li>\n<li>Computer Operator</li>\n<li>Data Entry Operator</li>'),
(14, 'You Are Free For This Course.', '<li>Computer Fundamentals and Windows</li>\n<li>Representation of data/Information concepts of data processing</li>\n<li>Introduction to Windows</li>\n<li>Windows Setting</li>\n<li>Window/Accessories</li>\n<li>Opening documents and closing documents</li>\n<li>Formatting the texts</li>\n<li>Handling Multiple documents</li>\n<li>Special features</li>', '<li>LEVEL : UNDERGRADUATE </li>\n<li>DURATION : 3 MONTHS</li>', '<li>Accountant </li>\n<li>Web designer </li>\n<li> Software Developer</li>\n<li> Computer operator</li>\n<li>Database Handling</li>'),
(38, 'Passed 10+2 from recognized Board.\nGraduation', '<li>M1-R5:Information Technology Tools and Network Basics</li>\n<li>M2-R5:Web Designing & Publishing</li>\n<li>M3-R5:Programming and Problem Solving through Python</li>\n<li>M4-R5:Internet of Things and its Applications</li>\n<li>PR1-R5:Practical based on M1-R5, M2-R5 ,M3-R5 and M4-R5</li>\n<li>PJ1-R5:Project</li>', '<li> Year :1</li>\n<li> Semester :2</li>', '<li>User Interface (UI) Designer</li>\n<li>Web Designer</li>\n<li>Web Publication Assistant</li>\n<li>Office Automation Assistant</li>\n<li>IoT Application Integrator</li>'),
(43, 'A Government recognized polytechnic engineering diploma after 10+2/ Graduate and an accredited ‘A’ Level course in each case (may be concurrent).', '<li>A1-R5: Information Technology tools and Network Basis</li>\n<li>A2-R5: Web Designing & Publishing</li>	\n<li>A3-R5:Programming and Problem Solving through Python</li>\n<li>A4-R5:Internet of Things and its Applications	</li>\n<li>A5-R5:Data Structures Through Object Oriented Programming Language	</li>\n<li>A6-R5:Computer Organization and Operating System</li>\n<li>A7-R5:Database Technologies</li>\n<li>A8-R5:System Analysis, Design and Testing</li>', '<li>1620 Hours /1.5 Year- Three Semesters of 6 months</li>', '<li>Full Stack Developer</li>\n<li>Data Scientist/Analyst</li>\n<li>IoT Architect</li>\n<li>IoT Developer</li>\n<li>Business Intelligence Analyst</li>\n<li>Information Security Analyst</li>\n<li>Training Faculty</li>\n<li>Freelancer (For self-employed)</li>'),
(46, '<li>10+2 or equivalent</li>', '<li>Creating Masters in Tally. Voucher entry, invoicing cost centers & cost categories</li>\n<li>Accounting & Inventory Management</li>\n<li>Advanced Taxation</li>\n<li>Payroll Advance Features</li>\n<li>Fundamentals of Taxation</li>\n<li>Fundamentals of Accounts & Inventory</li>', '<li>3 Months </li>', '<li>Accounts Executive</li>\n<li>Junior Accountant</li>\n<li>Data Entry Operator</li>\n<li>Accounts Assistant</li>\n<li>Tally Operator</li>');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_profile`
--

CREATE TABLE `teacher_profile` (
  `id` int(11) NOT NULL,
  `userId` int(5) NOT NULL,
  `number` varchar(13) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` int(10) NOT NULL,
  `tutoring_sub` varchar(255) NOT NULL,
  `graduation_degree` varchar(50) NOT NULL,
  `resume` varchar(50) NOT NULL,
  `adharcard` varchar(50) NOT NULL,
  `approval` int(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_profile`
--

INSERT INTO `teacher_profile` (`id`, `userId`, `number`, `address1`, `address2`, `city`, `state`, `pincode`, `tutoring_sub`, `graduation_degree`, `resume`, `adharcard`, `approval`) VALUES
(11, 17, '9170618798', 'Delhi', 'Azamgarh', 'Azamgarh', 'Uttar Pradesh', 276001, 'web designing', 'degree.jpg', 'girl_resume.png', 'adhar.jpg', 1),
(12, 18, '9170618798', 'Jamuri', 'Noida', 'Azamgarh', 'Uttar Pradesh', 276001, 'web designing,php,python', 'degree.jpg', 'resume.webp', 'aadhar.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `img` varchar(50) NOT NULL,
  `usertype` int(10) NOT NULL COMMENT '0 for student & 1 for teacher',
  `status` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `username`, `password`, `img`, `usertype`, `status`) VALUES
(14, 'Amit Gupta', 'amit002@gmail.com', 'amit002', 'c038a3aa231e514d0ef96e983410e5c0', 'amit002-face9.jpg', 0, '1'),
(15, 'Mandeep Yadav', 'mandeep21@gmail.com', 'mandeep21', '5ec15df0893b2141a9b9be7b56ea41ec', '1679567796-face19.jpg', 0, '1'),
(17, 'Ankita Singh', 'ankita01@gmail.com', 'ankita01', '9a68d57ac771a3c3dae9c8bad6916c59', '1679568260-face10.jpg', 1, '1'),
(18, 'Ram Maurya', 'ram@gmail.com', 'thanos', 'f468923c9a176b40146ad79105130d6d', '1679581687-face1.jpg', 1, '1'),
(21, 'Rohan Maurya', 'rm0349019@gmail.com', 'arohan007', 'dfdb388df57ff8d0911181ad81dd69d0', '1681203605-face16.jpg', 0, '1'),
(23, 'Samarth', 'samarth231@gmail.com', 'samarth1', 'f000ebc77eae15c9c12d273c44583193', '1682855843-face6.jpg', 0, '1'),
(24, 'Amit Chaurasiya', 'amitupwale1@gmail.co', 'amitupwale', '890e2413bf57d8b317c52f9c47ed7d8e', '1683198942-face24.jpg', 0, '1'),
(25, 'Ishant Kumar', 'itsishantbabu9099@gm', 'Ishant22', 'ad96b62a23c6c7b453b40e028d484a13', '1683526423-face1.jpg', 1, '1'),
(26, 'Anjali Yadav', 'anjali001@gmail.com', 'anjali001', '582cef037c080027d66fc6f4d193bfed', '1684218680-face6.jpg', 0, '1'),
(27, 'Sikander', 'raj34@gmail.com', 'RajBabu', 'fac7607d1bd8a8dc13437f4d92180630', '1684735950-face5.jpg', 1, '1'),
(28, 'Aman Kumar', 'aman003@gmail.com', 'aman003', '234031cd582fc7442bdc6aecb3c6571f', '1684927452-face18.jpg', 0, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `addmission_billing`
--
ALTER TABLE `addmission_billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`carousel_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gal_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_profile`
--
ALTER TABLE `teacher_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `addmission_billing`
--
ALTER TABLE `addmission_billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `carousel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `teacher_profile`
--
ALTER TABLE `teacher_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
