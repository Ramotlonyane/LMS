-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 16, 2016 at 01:54 PM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lms`
--

CREATE TABLE IF NOT EXISTS `auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` enum('Admin','Editor','Author') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

INSERT INTO `auth` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin'),
(2, 'editor', 'ab41949825606da179db7c89ddcedcc167b64847', 'Editor'),
(3, 'author', 'f64cd8e32f5ac7553c150bd05d6f2252bb73f68d', 'Author');

-- --------------------------------------------------------

create table question_bank
(
    question_id uniqueidentifier primary key,
    question_exam_id uniqueidentifier not null,
    question_text varchar(1024) not null,
    question_point_value decimal,
    constraint fk_questionbank_exams foreign key (question_exam_id) references exams (exam_id)
);

-- --------------------------------------------------------

INSERT INTO bar (description, foo_id) VALUES
( 'testing',     (SELECT id from foo WHERE type='blue') ),
( 'another row', (SELECT id from foo WHERE type='red' ) );


-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE IF NOT EXISTS `auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `idrole` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  foreign key (idrole) references role (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------
--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` enum('Admin','Manager','Employee') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------
--
-- Table structure for table `LeaveType`
--

CREATE TABLE IF NOT EXISTS `leaveType` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `numberOfLeaves` int(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;


-- --------------------------------------------------------
--
-- Dumping data for table `leaveType`
--
INSERT INTO `leaveType` (`id`,`name`,`numberOfLeaves`,`description`) VALUES
(1, 'Annual leave','30','This is an annual leave'),
(2, 'Sick leave','20','This is sick leave'),
(3, 'Family responsibility leave','10','This is family responsibility leave');
-- --------------------------------------------------------
--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`,`name`) VALUES
(1, 'Admin'),
(2, 'Manager'),
(3, 'Employee');

-- --------------------------------------------------------
--
-- Dumping data for table `auth`
--
INSERT INTO `auth` (`id`, `username`, `password`,`idrole`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997',(SELECT id from role WHERE name='Admin')),
(2, 'manager', '1a8565a9dc72048ba03b4156be3e569f22771f23',(SELECT id from role WHERE name='Manager')),
(3, 'employee', 'caf322f0bbed721eac4a36bf7aff1103079faf25',(SELECT id from role WHERE name='Employee'));

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
