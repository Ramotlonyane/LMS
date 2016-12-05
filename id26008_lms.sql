-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2016 at 01:48 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicationdata`
--

CREATE TABLE `applicationdata` (
  `id` int(11) NOT NULL,
  `startDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `endDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `applicationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `numberOfDays` int(100) DEFAULT NULL,
  `leavePurpose` varchar(100) DEFAULT NULL,
  `applicationNumber` int(11) DEFAULT NULL,
  `idLeaveType` int(11) DEFAULT NULL,
  `idEmployee` int(11) DEFAULT NULL,
  `idLeaveStatus` int(11) DEFAULT '1',
  `bDeleted` tinyint(1) DEFAULT '0',
  `hash` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `appliedleave`
--

CREATE TABLE `appliedleave` (
  `id` int(11) NOT NULL,
  `idEmployee` int(11) DEFAULT NULL,
  `idLeaveType` int(11) DEFAULT NULL,
  `idApplicationData` int(11) DEFAULT NULL,
  `idLeaveStatus` int(11) DEFAULT NULL,
  `numberOfDays` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `idrole` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `username`, `password`, `idrole`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(2, 'manager', '1a8565a9dc72048ba03b4156be3e569f22771f23', 2),
(3, 'employee', 'caf322f0bbed721eac4a36bf7aff1103079faf25', 3);

-- --------------------------------------------------------

--
-- Table structure for table `availableleavedetails`
--

CREATE TABLE `availableleavedetails` (
  `id` int(11) NOT NULL,
  `usedLeave` int(100) DEFAULT '0',
  `remainingLeave` int(100) DEFAULT '30',
  `applicationNumber` int(100) DEFAULT NULL,
  `idEmployee` int(11) DEFAULT NULL,
  `idApplicationData` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `casualworker`
--

CREATE TABLE `casualworker` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `casualworker`
--

INSERT INTO `casualworker` (`id`, `name`) VALUES
(1, 'Yes'),
(2, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `component`
--

CREATE TABLE `component` (
  `id` int(11) NOT NULL,
  `componentName` varchar(100) NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `component`
--

INSERT INTO `component` (`id`, `componentName`, `description`) VALUES
(1, 'HRM', 'Human Resource Management'),
(2, 'HRD', 'Human Resource Development'),
(3, 'IT', 'Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `description`) VALUES
(1, 'Treasury', 'Department of Treasury'),
(2, 'Health', 'Department of Health');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `surname` varchar(30) DEFAULT NULL,
  `initial` varchar(10) DEFAULT NULL,
  `persalNum` int(20) DEFAULT NULL,
  `telephone` int(20) DEFAULT NULL,
  `idShiftWorker` int(11) DEFAULT NULL,
  `idCasualWorker` int(11) DEFAULT NULL,
  `idDepartment` int(11) DEFAULT NULL,
  `idComponent` int(11) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `idRole` int(11) DEFAULT NULL,
  `bDeleted` tinyint(1) DEFAULT '0',
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `surname`, `initial`, `persalNum`, `telephone`, `idShiftWorker`, `idCasualWorker`, `idDepartment`, `idComponent`, `address`, `password`, `username`, `idRole`, `bDeleted`, `email`) VALUES
(13, 'Modise', 'RG', 83792376, 1234567890, 2, 2, 1, 3, '22 Scott Park,', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'modise', 1, 0, NULL),
(14, 'Rockman', 'ER', 90875643, 987653421, 2, 2, 1, 3, 'MEC''s House', 'b64a4558c86e5dad054e891575cbf1c341b354b5', 'Rockman', 2, 0, NULL),
(15, 'Mahlatsi', 'GM', 90871242, 2147483647, 2, 2, 1, 3, 'CEO', '9d382342daac150ef51c8383dcf21ff57743b96d', 'Mahlatsi', 3, 0, NULL),
(16, 'Fourie', 'FR', 90875654, 1232546789, 2, 2, 1, 3, 'CEM', 'baa3cdac49150ef6689c8016eab0ce257d183a8f', 'Fourie', 4, 0, NULL),
(17, 'Sithole', 'MS', 78756543, 1232123145, 2, 2, 1, 3, 'SEM', '50b1db8da55757cae42fb355f66a7e4da9a4e574', 'Sithole', 5, 0, 'ramotlonyanemodise.gm@gmail.com'),
(18, 'Mokhele', 'DM', 90876543, 1232123145, 2, 2, 1, 3, 'SM', '3e76c24356d30b633982c828d9ab9b2144060f6b', 'Mokhele', 6, 0, 'acinprojects@gmail.com'),
(19, 'Tanki', 'TM', 45678998, 1232123145, 2, 2, 1, 3, 'Manager', '1a8565a9dc72048ba03b4156be3e569f22771f23', 'Tanki', 7, 0, 'gbrl.dellinspiron@gmail.com'),
(20, 'Lekwene', 'JL', 90876543, 1234567865, 2, 2, 1, 3, 'Assistant Manager', '9efc4b459bb661dfcfb4f38f685a6ab9f895e995', 'Lekwene', 8, 0, 'ramotlonyanemodise@gmail.com'),
(21, 'Mphanya', 'SM', 12343567, 2147483647, 2, 2, 1, 3, 'Employee', 'caf322f0bbed721eac4a36bf7aff1103079faf25', 'Mphanya', 9, 0, NULL),
(22, 'Modise', 'TM', 34658790, 987654321, 2, 2, 1, 1, 'Matlosana', '1afb4e7d8f1d28d3945bfed25cb6f71e8bf9ecd5', 'Tina', 1, 0, NULL),
(23, 'Maria', 'MC', 90876534, 514054296, 2, 2, 1, 1, 'HRM at Treasury', '19e67b50c86f6a23cdd3a9a24740a3e11d3a522b', 'Classen', 10, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leaverecord`
--

CREATE TABLE `leaverecord` (
  `id` int(11) NOT NULL,
  `idEmployee` int(11) DEFAULT NULL,
  `idLeaveType` int(11) DEFAULT NULL,
  `numberOfLeaves` int(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `bDeleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaverecord`
--

INSERT INTO `leaverecord` (`id`, `idEmployee`, `idLeaveType`, `numberOfLeaves`, `description`, `bDeleted`) VALUES
(128, 13, 1, 1, 'ad', 0),
(129, 14, 1, 1, 'sdasd', 0),
(130, 15, 1, 1, 'asd', 0),
(131, 16, 1, 1, 'sda', 0),
(132, 17, 1, 1, 'sda', 0),
(133, 18, 1, 1, 'szdsa', 0),
(134, 19, 1, 1, 'esdfsdf', 0),
(136, 21, 1, 1, 'qsaasd', 0),
(137, 22, 1, 1, 'dsad', 0),
(138, 23, 1, 2, 'sdsad', 0),
(139, 13, 3, 3, 'agrhhsdgfg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `leavestatus`
--

CREATE TABLE `leavestatus` (
  `id` int(11) NOT NULL,
  `statusName` varchar(100) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leavestatus`
--

INSERT INTO `leavestatus` (`id`, `statusName`) VALUES
(1, 'Pending'),
(2, 'Approved'),
(3, 'Declined'),
(4, 'Cancelled'),
(5, 'Sent for Correction');

-- --------------------------------------------------------

--
-- Table structure for table `leavetype`
--

CREATE TABLE `leavetype` (
  `id` int(11) NOT NULL,
  `typeName` varchar(100) NOT NULL,
  `numberOfLeaves` int(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `bDeleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leavetype`
--

INSERT INTO `leavetype` (`id`, `typeName`, `numberOfLeaves`, `description`, `bDeleted`) VALUES
(1, 'Annual leave', 55, 'This is an annual leave', 0),
(2, 'Sick leave', 25, 'This is sick leave', 0),
(3, 'Family responsibility leave', 15, 'This is family responsibility leave', 0),
(4, 'Normal', 3, 'Test', 0),
(5, 'Normal Sick', 3, 'Test Test', 0),
(6, 'Test', 4, 'TESting', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` enum('Admin','MEC','CEO','Chief Executive Manager','Senior Executive Manager','Senior Executive Manager','Senior Manager','Manager','Assistant Manager','Employee','HRM') DEFAULT NULL,
  `idSubordinate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `idSubordinate`) VALUES
(1, 'Admin', 2),
(2, 'MEC', 3),
(3, 'CEO', NULL),
(4, 'Chief Executive Manager', NULL),
(5, 'Senior Executive Manager', NULL),
(6, 'Senior Manager', NULL),
(7, 'Manager', NULL),
(8, 'Assistant Manager', NULL),
(9, 'Employee', NULL),
(10, 'HRM', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shiftworker`
--

CREATE TABLE `shiftworker` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shiftworker`
--

INSERT INTO `shiftworker` (`id`, `name`) VALUES
(1, 'Yes'),
(2, 'No');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicationdata`
--
ALTER TABLE `applicationdata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `applicationNumber` (`applicationNumber`),
  ADD KEY `idLeaveType` (`idLeaveType`),
  ADD KEY `idEmployee` (`idEmployee`),
  ADD KEY `applicationdata_ibfk_3` (`idLeaveStatus`);

--
-- Indexes for table `appliedleave`
--
ALTER TABLE `appliedleave`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idLeaveType` (`idLeaveType`),
  ADD KEY `idEmployee` (`idEmployee`),
  ADD KEY `idApplicationData` (`idApplicationData`),
  ADD KEY `idLeaveStatus` (`idLeaveStatus`);

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idrole` (`idrole`);

--
-- Indexes for table `availableleavedetails`
--
ALTER TABLE `availableleavedetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `idEmployee` (`idEmployee`),
  ADD KEY `idApplicationData` (`idApplicationData`);

--
-- Indexes for table `casualworker`
--
ALTER TABLE `casualworker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `component`
--
ALTER TABLE `component`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD KEY `idShiftWorker` (`idShiftWorker`),
  ADD KEY `idCasualWorker` (`idCasualWorker`),
  ADD KEY `idDepartment` (`idDepartment`),
  ADD KEY `idComponent` (`idComponent`),
  ADD KEY `idRole` (`idRole`);

--
-- Indexes for table `leaverecord`
--
ALTER TABLE `leaverecord`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `idLeaveType` (`idLeaveType`),
  ADD KEY `idEmployee` (`idEmployee`);

--
-- Indexes for table `leavestatus`
--
ALTER TABLE `leavestatus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `id_2` (`id`);

--
-- Indexes for table `leavetype`
--
ALTER TABLE `leavetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `shiftworker`
--
ALTER TABLE `shiftworker`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicationdata`
--
ALTER TABLE `applicationdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `appliedleave`
--
ALTER TABLE `appliedleave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `availableleavedetails`
--
ALTER TABLE `availableleavedetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `casualworker`
--
ALTER TABLE `casualworker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `component`
--
ALTER TABLE `component`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `leaverecord`
--
ALTER TABLE `leaverecord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
--
-- AUTO_INCREMENT for table `leavestatus`
--
ALTER TABLE `leavestatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `leavetype`
--
ALTER TABLE `leavetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `shiftworker`
--
ALTER TABLE `shiftworker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicationdata`
--
ALTER TABLE `applicationdata`
  ADD CONSTRAINT `applicationdata_ibfk_1` FOREIGN KEY (`idLeaveType`) REFERENCES `leavetype` (`id`),
  ADD CONSTRAINT `applicationdata_ibfk_2` FOREIGN KEY (`idEmployee`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `applicationdata_ibfk_3` FOREIGN KEY (`idLeaveStatus`) REFERENCES `leavestatus` (`id`);

--
-- Constraints for table `availableleavedetails`
--
ALTER TABLE `availableleavedetails`
  ADD CONSTRAINT `availableleavedetails_ibfk_2` FOREIGN KEY (`idEmployee`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `availableleavedetails_ibfk_3` FOREIGN KEY (`idApplicationData`) REFERENCES `applicationdata` (`id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`idShiftWorker`) REFERENCES `shiftworker` (`id`),
  ADD CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`idCasualWorker`) REFERENCES `casualworker` (`id`),
  ADD CONSTRAINT `employee_ibfk_4` FOREIGN KEY (`idDepartment`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `employee_ibfk_5` FOREIGN KEY (`idComponent`) REFERENCES `component` (`id`),
  ADD CONSTRAINT `employee_ibfk_6` FOREIGN KEY (`idRole`) REFERENCES `role` (`id`);

--
-- Constraints for table `leaverecord`
--
ALTER TABLE `leaverecord`
  ADD CONSTRAINT `leaverecord_ibfk_1` FOREIGN KEY (`idLeaveType`) REFERENCES `leavetype` (`id`),
  ADD CONSTRAINT `leaverecord_ibfk_2` FOREIGN KEY (`idEmployee`) REFERENCES `employee` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
