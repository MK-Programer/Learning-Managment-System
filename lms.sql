-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2021 at 07:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `userId` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `courseId` int(11) NOT NULL,
  `courseName` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `imgPath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`userId`, `userName`, `courseId`, `courseName`, `price`, `imgPath`) VALUES
(2, 'MK2001', 2, 'Computer Network I', 300, 'p2.png'),
(2, 'MK2001', 3, 'Computer Graphics', 400, 'p3.png');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chatid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `chatroomid` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `chat_date` datetime NOT NULL,
  `who` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chatid`, `userid`, `chatroomid`, `message`, `chat_date`, `who`) VALUES
(14, 3, 2, 'hr', '2021-02-15 19:15:11', 1),
(15, 1, 2, 'admin', '2021-02-15 19:17:13', 2),
(20, 12, 4, 'auditot', '2021-02-19 18:51:36', 4),
(21, 2, 2, 'Hello from mostafa', '2021-02-22 15:14:47', 3),
(22, 12, 2, 'auditor', '2021-02-24 20:18:59', 4),
(23, 2, 2, 'Hello', '2021-02-24 23:02:50', 3),
(24, 2, 2, 'hi ', '2021-02-24 23:30:20', 3),
(25, 1, 3, 'llll', '2021-02-25 16:42:50', 2);

-- --------------------------------------------------------

--
-- Table structure for table `chatroom`
--

CREATE TABLE `chatroom` (
  `chatroomid` int(11) NOT NULL,
  `chat_name` varchar(60) NOT NULL,
  `date_created` datetime NOT NULL,
  `chat_password` varchar(30) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatroom`
--

INSERT INTO `chatroom` (`chatroomid`, `chat_name`, `date_created`, `chat_password`, `userid`) VALUES
(1, 'My First Chat Room', '2017-09-11 13:20:18', 'leeann', 2),
(2, 'Free Entrance :)', '2017-09-11 13:20:51', '', 3),
(3, 'hr - admin', '2021-02-15 19:20:54', '', 1),
(4, 'hr-auditor', '2021-02-19 18:46:27', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat_member`
--

CREATE TABLE `chat_member` (
  `chat_memberid` int(11) NOT NULL,
  `chatroomid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_member`
--

INSERT INTO `chat_member` (`chat_memberid`, `chatroomid`, `userid`) VALUES
(1, 1, 2),
(2, 2, 3),
(5, 2, 10),
(6, 1, 10),
(7, 4, 1),
(10, 6, 1),
(11, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseId` int(11) NOT NULL,
  `courseName` varchar(50) DEFAULT NULL,
  `courseInstructor` varchar(50) DEFAULT NULL,
  `coursePrice` double DEFAULT NULL,
  `courseImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseId`, `courseName`, `courseInstructor`, `coursePrice`, `courseImage`) VALUES
(1, 'Operating System II', 'Allaa Hamdy', 400, 'p1.png'),
(2, 'Computer Network I', 'Ayman Bahaa', 300, 'p2.png'),
(3, 'Computer Graphics', 'Youmna', 400, 'p3.png'),
(4, 'Web Development', 'Mohamed El Gazzar', 500, 'p4.png'),
(44, 'java', 'ammar', 123, 'backgroundimg.jpeg'),
(48, 'aaaaaaaaa', 'xx', 888, ''),
(49, 'Web ', 'Youmna', 500, ''),
(52, 'qqqq', 'ckqid3ut', 5000, ''),
(53, 'web', 'ckqid3ut', 5000, '');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `contact_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`contact_id`, `user_name`, `user_email`, `subject`, `content`) VALUES
(1, 'User', 'Mostafa1810751@miuegypt.edu.eg', 'Greating', 'Hello World');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,
  `uname` varchar(60) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `access` int(1) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `penalty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `uname`, `photo`, `access`, `email`, `penalty`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'seif.jpeg', 1, 'admin@gmail.com', 0),
(2, 'MK2001', '73c0687840da850d08420868014bdbee', 'Mostafa', 'mostafa.jpeg', 2, 'Mostafa1810751@miuegypt.edu.eg', 0),
(3, 'hr', 'adab7b701f23bb82014c8506d3dc784e', 'hr', 'sherif.jpeg', 3, 'hr@gmail.com', 0),
(12, 'auditor', 'f7d07071ed9431ecae3a8d45b4c82bb2', 'auditor', 'baheeg.jpeg', 4, 'auditor@gmail.com', 0),
(64, 'MK2002', 'f4dda99d04b67efb478cff0485134297', 'Mostafa', 'EZZ.jpeg', 2, 'Mostafa1810751@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `VideosID` int(11) NOT NULL,
  `Videos_name` varchar(30) DEFAULT NULL,
  `videos_description` varchar(250) DEFAULT NULL,
  `videos_path` varchar(250) DEFAULT NULL,
  `course_Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`VideosID`, `Videos_name`, `videos_description`, `videos_path`, `course_Name`) VALUES
(6, 'name', 'name desc', '', 'x'),
(7, 'farida', 'seif', '', 'x'),
(8, 'ammmar intro', 'dessc', '', 'x'),
(9, 'decname', 'sss', '', 'x'),
(10, 'dsadq', 'sdasda', 'vid2.mp4', 'x'),
(11, 'name', 'dessc', 'vid3.mp4', 'Operating System II');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chatid`);

--
-- Indexes for table `chatroom`
--
ALTER TABLE `chatroom`
  ADD PRIMARY KEY (`chatroomid`);

--
-- Indexes for table `chat_member`
--
ALTER TABLE `chat_member`
  ADD PRIMARY KEY (`chat_memberid`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseId`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`VideosID`),
  ADD KEY `course_ID` (`course_Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `chatroom`
--
ALTER TABLE `chatroom`
  MODIFY `chatroomid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chat_member`
--
ALTER TABLE `chat_member`
  MODIFY `chat_memberid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `VideosID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
