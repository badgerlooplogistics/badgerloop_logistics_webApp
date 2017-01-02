-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2017 at 09:36 PM
-- Server version: 5.5.53-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `badgerloop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `financial_package`
--

CREATE TABLE IF NOT EXISTS `financial_package` (
  `team` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(1000) NOT NULL,
  `system` varchar(250) DEFAULT NULL,
  `item_disc` varchar(250) DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  `bom_supplier` varchar(250) DEFAULT NULL,
  `est_quantity` int(10) DEFAULT NULL,
  `est_individual_cost` float DEFAULT NULL,
  `act_supplier` varchar(250) DEFAULT NULL,
  `act_quantity` int(10) DEFAULT NULL,
  `act_individual_cost` float DEFAULT NULL,
  `shipping` float DEFAULT NULL,
  `tax` float DEFAULT '0',
  `date_purchased` date DEFAULT NULL,
  `purchased_by` varchar(250) DEFAULT NULL,
  `link` varchar(500) DEFAULT NULL,
  `comments` text,
  `shipping_priority` int(11) DEFAULT '0',
  `user_id` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `shipping_location` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `financial_package`
--

INSERT INTO `financial_package` (`team`, `id`, `item`, `system`, `item_disc`, `date_added`, `bom_supplier`, `est_quantity`, `est_individual_cost`, `act_supplier`, `act_quantity`, `act_individual_cost`, `shipping`, `tax`, `date_purchased`, `purchased_by`, `link`, `comments`, `shipping_priority`, `user_id`, `status`, `shipping_location`) VALUES
(8, 3, 'Echo Dot', 'Testing', 'For testing purposes', '2016-12-31', 'Amazon', 1, 50, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'https://www.amazon.com/', NULL, 2, 37, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE IF NOT EXISTS `sponsors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level_sponsor` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `commit_date` date NOT NULL,
  `transaction_date` date NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `uw_ref` tinyint(1) NOT NULL DEFAULT '0',
  `uw_ref_id` varchar(255) NOT NULL,
  `uwcu` tinyint(1) NOT NULL DEFAULT '0',
  `amount` float NOT NULL,
  `comments` text NOT NULL,
  `media_so` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`id`, `level_sponsor`, `name`, `commit_date`, `transaction_date`, `invoice`, `uw_ref`, `uw_ref_id`, `uwcu`, `amount`, `comments`, `media_so`) VALUES
(1, 'Gold', 'Alliant Energy', '2015-11-03', '2015-12-18', 'https://uwmadison.app.box.com/files/0/f/6919601606/1/f_62365887409', 0, '', 1, 5000, 'UWCU', 0),
(2, 'Bronze', 'Epic', '2015-12-02', '0000-00-00', '', 0, '', 1, 0, 'Donated $500 through Stripe_ value not here because it is accounted for in the stripe summary', 0),
(3, 'Silver', 'UTC Aerospace Systems', '2016-01-21', '2016-02-11', '#VALUE!', 0, '', 1, 4000, 'UWCU', 0),
(4, 'Silver', 'ATA Engineering', '2016-02-11', '2016-03-15', '', 0, '', 1, 1000, 'UWCU', 0),
(5, '', 'Motorola', '2015-10-22', '2016-01-19', '#VALUE!', 0, '', 1, 300, 'UWCU', 0),
(6, 'Bronze', 'VentureWell', '2015-11-05', '0000-00-00', 'https://uwmadison.app.box.com/files/0/f/6919601606/1/f_62366167417', 0, '', 1, 500, 'Walmart fund', 0),
(7, 'Silver', 'Onfloor Technologies', '2016-02-10', '0000-00-00', 'https://uwmadison.app.box.com/files/0/f/6919601606/1/f_62365567477', 0, '', 1, 0, 'Donated $1-000 through stripe- value accounted for in stripe summary', 0),
(8, 'Silver', 'Home Revolution', '2016-02-10', '0000-00-00', 'https://uwmadison.app.box.com/files/0/f/6919601606/1/f_62365570629', 0, '', 1, 0, 'Donated $1-000 through stripe- value accounted for in strpe summary', 0),
(9, 'Bronze', 'E-Switch', '2016-03-08', '2016-03-28', 'https://uwmadison.app.box.com/files/0/f/6919601606/1/f_56273918846', 0, '', 1, 1000, 'UWCU', 0),
(10, 'Platinum', 'Accenture', '2016-03-09', '2016-04-22', '42473', 1, 'rev-13638861', 0, 20000, 'In UWF (7/11)', 0),
(11, 'Bronze', 'Miller Electric', '2016-04-01', '2016-04-04', '', 0, '', 0, 1000, 'Donated through ASME. Unclear if we received the fund.', 0),
(12, 'Bronze', 'Medarwin Pte. Ltd.', '2016-03-17', '0000-00-00', '', 0, '', 1, 0, 'Donated $1-000 through stripe- value accounted for in strpe summary', 0),
(13, 'Silver', 'Carrier Web', '2016-04-17', '0000-00-00', '', 1, '', 0, 5000, 'In UWF', 0),
(14, 'Bronze', 'Design Concepts', '2016-04-20', '2016-08-10', '', 1, '', 0, 1000, 'UWF', 0),
(15, '', 'Dr. Brian L. Haas', '2016-04-21', '2016-04-21', '', 1, 'rev-13637172', 0, 200, 'In UWF (7/11)', 0),
(16, 'Bronze', 'Cummins', '2016-04-01', '2016-03-15', '', 1, 'rev-13619981', 0, 1000, 'In UWF (7/11)', 0),
(17, 'Bronze', 'Jean & David Benson', '2016-04-26', '2016-04-25', '', 1, 'rev-13638938', 0, 2500, 'In UWF (7/11)', 0),
(18, 'Silver', 'Qualcomm', '2016-04-29', '2016-06-21', '', 1, '', 0, 5000, 'In UWF', 0),
(19, 'Bronze', 'Texas A&M', '2016-05-04', '2016-05-24', '', 1, 'rev-13664058', 0, 3000, 'In UWF (7/11)', 0),
(20, 'Platinum', 'Rockwell Automation', '2016-05-06', '2016-10-14', '', 1, '', 0, 20000, 'Committed to being platinum sponsor. Interested in becoming lead sponsor- pending potential increase to $40-000', 0),
(21, 'Bronze', 'Duncan Adam''s Parents', '2016-05-10', '2016-05-10', '', 0, '', 1, 1000, 'Deposited into UWCU account on 5/10', 0),
(22, 'Bronze', 'Milwaukee Tool', '2016-04-08', '2016-05-10', 'https://uwmadison.app.box.com/files/0/f/6919601606/1/f_60788517541', 0, '', 1, 1000, 'Deposited into UWCU account on 5/10', 1),
(23, 'Platinum', 'Hyperloop One', '2016-05-12', '2016-05-25', 'https://uwmadison.app.box.com/files/0/f/6919601606/1/f_65137495865', 1, 'rev-13659055', 0, 20000, 'In UWF (7/11)', 1),
(24, 'Bronze', 'SunPeak', '2016-05-13', '2016-05-13', '', 1, 'rev-13651896', 0, 1000, 'In UWF (7/11)- Chad Sorenson', 0),
(25, 'Gold', 'Physics BoV', '2016-05-06', '0000-00-00', '', 0, '', 0, 0, '"promised" $10-000- then asked all members to donate a certain amount to make that total happen', 0),
(26, 'Bronze', 'AMEP (Applied Mathematics- Engineering- and Physics)', '2016-05-19', '0000-00-00', '', 0, '', 0, 0, 'UWF', 0),
(27, 'Bronze', 'Royal Bank of Canada', '2016-05-19', '2016-06-07', 'https://uwmadison.app.box.com/files/0/f/6919601606/1/f_66332100549', 1, '', 0, 1500, '', 0),
(28, 'Bronze', 'Dr. and Mrs. Hackel ', '2016-05-20', '2016-05-20', '', 1, 'rev-13655606', 0, 1000, 'In UWF (7/11)', 0),
(29, 'Bronze', 'Mr. and Ms. Herberer', '2016-06-02', '2016-06-02', '', 1, 'rev-13659706', 0, 667, 'In UWF (7/11)', 0),
(30, '', 'Mr. and Ms. Herberer', '2016-06-02', '2016-06-02', '', 1, 'rev-13659707', 0, 333, 'In UWF (7/11)', 0),
(31, 'Bronze', 'Dr. Sundaram', '2016-06-07', '2016-06-05', '', 1, 'rev-13660623', 0, 1000, 'In UWF (7/11)', 0),
(32, '', 'Dr. Ho', '2016-06-09', '2016-06-09', '', 1, 'rev-13662103', 0, 750, 'In UWF (7/11)', 0),
(33, 'Bronze', 'Dr. Lease and Ms. Leach', '2015-06-09', '2016-06-09', '', 1, 'rev-13664994', 0, 2500, 'In UWF (7/11)', 0),
(34, 'Gold', 'American Family Insurance', '2016-09-13', '2016-10-24', 'https://uwmadison.app.box.com/files/0/f/6919601606/1/f_94802776271', 1, '', 0, 10000, 'in UWF', 0),
(35, 'Bronze', 'Rick Schuchart', '0000-00-00', '2016-10-12', 'in progress', 1, '', 0, 4000, 'In UWF', 0),
(36, 'Gold', 'Snap-On', '2016-10-21', '2016-11-21', 'Monetary Sent- Materials not yet', 1, '', 0, 10000, '', 0),
(37, 'Bronze', 'Roy Thiele-Sardina', '2016-10-24', '0000-00-00', 'Yes?', 0, '', 0, 1000, '', 0),
(38, '', 'Gregory Piefer', '0000-00-00', '2016-07-15', 'Yes', 1, 'rev-13681102', 0, 700, '', 0),
(39, 'Bronze', 'Bhalla', '0000-00-00', '2016-10-10', 'NA', 1, '', 0, 25, '', 0),
(40, 'Bronze', 'Mackie', '0000-00-00', '2016-10-17', 'NA', 1, '', 0, 1000, '', 0),
(41, 'Silver', 'Plexus', '0000-00-00', '2016-08-15', '', 1, 'rev-13683384', 0, 5000, '', 0),
(42, '', 'Private Check Donation', '2015-12-18', '2015-11-12', '', 0, '', 0, 50, '', 0),
(43, 'Platinum', 'Cirrus Aircraft', '0000-00-00', '0000-00-00', '', 0, '', 0, 20000, '', 0),
(44, 'Bronze', 'BB7', '2016-02-11', '0000-00-00', '', 0, '', 0, 0, '', 0),
(45, 'Gold', 'Vector', '2016-03-15', '0000-00-00', 'https://uwmadison.app.box.com/files/0/f/7685866966/1/f_63185090193', 0, '', 0, 5000, '', 0),
(46, 'Silver', 'Exis', '2016-01-19', '0000-00-00', '', 0, '', 0, 0, '', 0),
(47, 'Bronze', '3M', '0000-00-00', '0000-00-00', 'https://uwmadison.app.box.com/files/0/f/7685866966/1/f_63720511629', 0, '', 0, 1998, '', 0),
(48, 'Silver', 'Saietta Motors', '0000-00-00', '0000-00-00', '', 0, '', 0, 1500, '', 0),
(49, 'Silver', 'Orion BMS/Ewert Energy Systems', '0000-00-00', '0000-00-00', 'https://uwmadison.app.box.com/files/0/f/7685866966/1/f_63725846333', 0, '', 0, 2000, '', 0),
(50, 'Silver', 'Integrated Magnetics', '2016-03-28', '0000-00-00', 'https://uwmadison.app.box.com/files/0/f/7685866966/1/f_63726160693', 0, '', 0, 5500, '', 0),
(51, 'Bronze', 'Gigavac', '2016-04-22', '0000-00-00', 'https://uwmadison.app.box.com/files/0/f/7685866966/1/f_63730951989', 0, '', 0, 1000, '', 0),
(52, 'Silver', 'Fastenal', '2016-04-04', '0000-00-00', 'https://uwmadison.app.box.com/files/0/f/7685866966/1/f_63726217209', 0, '', 0, 6000, '', 1),
(53, 'Bronze', 'CDN', '0000-00-00', '0000-00-00', 'Ask Tony Palumbo', 0, '', 0, 1000, '', 0),
(54, 'Bronze', 'Garage physics', '0000-00-00', '0000-00-00', '', 0, '', 0, 0, '', 0),
(55, 'Platinum', 'Boxx Technologies', '2016-08-10', '0000-00-00', 'https://uwmadison.app.box.com/files/0/f/6919601606/1/f_65137781909', 0, '', 0, 10578, '', 1),
(56, 'Gold', 'ANSYS', '2016-04-21', '0000-00-00', 'https://uwmadison.app.box.com/files/0/f/7685866966/1/f_65150704713', 0, '', 0, 0, '', 1),
(57, 'Bronze', 'MMP', '2016-03-15', '0000-00-00', 'Ask Tony', 0, '', 0, 0, '', 0),
(58, 'Bronze', 'APP', '2016-04-25', '0000-00-00', 'https://uwmadison.app.box.com/files/0/f/7685866966/1/f_63731097049', 0, '', 0, 407.74, '', 0),
(59, 'Bronze', 'Huck', '2016-06-21', '0000-00-00', 'https://uwmadison.app.box.com/files/0/f/7685866966/1/f_63726217209', 0, '', 0, 0, '', 0),
(60, 'Silver', 'Screaming Circuits', '2016-05-24', '0000-00-00', 'https://uwmadison.app.box.com/files/0/f/7685866966/1/f_63721525993', 0, '', 0, 1500, '', 0),
(61, '', 'Spark fun? - checking with eric', '2016-10-14', '0000-00-00', '', 0, '', 0, 0, '', 0),
(62, 'Bronze', 'Ideal Body Shop', '2016-05-10', '0000-00-00', '', 0, '', 0, 0, '', 0),
(63, 'Gold', 'UW Mechanical Engineering Dept', '2016-05-10', '0000-00-00', '', 0, '', 0, 6000, '', 0),
(64, 'Silver', 'E.V. Roberts', '2016-05-25', '0000-00-00', 'https://uwmadison.app.box.com/files/0/f/6919601606/1/f_65139918685', 0, '', 0, 0, '', 1),
(65, 'Gold', 'X-ES', '2016-05-13', '0000-00-00', '', 0, '', 0, 18070, '', 0),
(66, 'Silver', 'UW Physical Science Lab', '0000-00-00', '0000-00-00', '', 0, '', 0, 7000, '', 0),
(67, '', 'Snap-On', '0000-00-00', '0000-00-00', 'not yet', 0, '', 0, 0, '', 0),
(68, '', 'NEFAB', '2016-06-07', '0000-00-00', 'not yet', 0, '', 0, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(250) NOT NULL,
  `bom_total` float NOT NULL DEFAULT '0',
  `spent_total` float NOT NULL DEFAULT '0',
  `list_order` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team_name`, `bom_total`, `spent_total`, `list_order`) VALUES
(1, 'Braking', 0, 0, 3),
(5, 'Virtual Reality', 0, 0, 13),
(6, 'Structural Design', 0, 0, 11),
(7, 'Software', 0, 0, 9),
(8, 'Administration', 0, 1, 1),
(9, 'Structural Analysis', 0, 0, 10),
(10, 'Fabrication', 0, 0, 7),
(11, 'Suspension and Stability', 0, 0, 12),
(12, 'Composites', 0, 0, 4),
(13, 'Batteries', 0, 0, 2),
(19, 'Controls', 0, 0, 5),
(20, 'Electronics', 0, 0, 6),
(24, 'Propulsion', 0, 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `name` varchar(100) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `access` tinyint(1) NOT NULL DEFAULT '0',
  `team_id` int(11) NOT NULL,
  `secret_code` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `id`, `email`, `password`, `access`, `team_id`, `secret_code`) VALUES
('Zuf Wang', 33, 'xwang523@wisc.edu', '3d801aa532c1cec3ee82d87a99fdf63f', 1, 8, 'dJvpWq84Wi'),
('Max Henry', 34, 'henry5@wisc.edu', '3d801aa532c1cec3ee82d87a99fdf63f', 1, 8, 'WXIlSWVvyP'),
('Johnny Kohlbeck', 35, 'jkohlbeck@wisc.edu', 'temp', 0, 8, NULL),
('Chris Rushmore', 36, 'crushmore@wisc.edu', 'temp', 0, 6, NULL),
('Dillon Gwozdz', 37, 'gwozdz@wisc.edu', '3d801aa532c1cec3ee82d87a99fdf63f', 0, 8, 'fX09pNKjaE'),
('Justin Williams', 38, 'justin.williams@wisc.edu', 'temp', 0, 9, NULL),
('Vladimir Bourikav', 39, 'bouriakov@wisc.edu', 'temp', 0, 10, NULL),
('Ben Kishter', 40, 'kishter2@wisc.edu', 'temp', 0, 11, NULL),
('Nathan Orf', 41, 'norf@wisc.edu', 'temp', 0, 12, NULL),
('Max Golberg', 42, 'mgoldberg4@wisc.edu', 'temp', 0, 13, NULL),
('Kali Anne Kinziger', 43, 'kkinziger@wisc.edu', 'temp', 0, 8, NULL),
('Noah Pulvermacher', 44, 'npulvermache@wisc.edu', 'temp', 0, 8, NULL),
('Peter Procek', 45, 'procek@wisc.edu', 'temp', 0, 5, NULL),
('Michael Schlicting', 46, 'schlicting@wisc.edu', 'temp', 0, 8, NULL),
('Cole Hess', 47, 'cole.hess@wisc.edu', 'temp', 0, 8, NULL),
('Nick Beckwith', 48, 'nbeckwith@wisc.edu', 'temp', 0, 19, NULL),
('Ryan Castle', 49, 'rcastle@wisc.edu', 'temp', 0, 20, NULL),
('Alex Kuo', 50, 'kuo24@wisc.edu', '3d801aa532c1cec3ee82d87a99fdf63f', 2, 8, 'JAZEvG20dk'),
('Clayton Fellman', 51, 'cfellman@wisc.edu', 'temp', 0, 24, NULL),
('Yuliia Kapeliushna', 52, 'kapeliushna@wisc.edu', 'temp', 0, 8, NULL),
('Arjun Chaudhary', 53, 'achaudhary4@wisc.edu', 'temp', 0, 1, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
