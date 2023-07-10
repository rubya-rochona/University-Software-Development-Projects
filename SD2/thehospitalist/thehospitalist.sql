-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2022 at 05:54 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thehospitalist`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('Shipra', '1234'),
('admin', 'admin'),
('Rochona', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `dName` varchar(20) NOT NULL,
  `pName` varchar(15) NOT NULL,
  `room` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`dName`, `pName`, `room`) VALUES
('Farliha', 'Zim', 23),
('Tara', 'Parvez', 909),
('rubya', 'Sakib', 2);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `count` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  `id` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `age` int(5) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `blood` varchar(4) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  `address` varchar(20) NOT NULL,
  `room` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`count`, `date`, `id`, `name`, `age`, `gender`, `blood`, `dept`, `phone`, `email`, `status`, `address`, `room`, `username`, `password`) VALUES
(2, '31-01-2022', 'sjb0HMSd2', 'Saurov', 32, 'Male', 'A+', 'Dental', '+8801665546776', 'saurov@gmail.com', 'Married', 'Gazipur', 202, 'Saurov', '1234'),
(4, '21-0802015', 'sjb0HMSd4', 'Belal', 43, 'Male', 'B+', 'Nutrition', '+8801754323454', 'belal@gmail.com', 'Single', 'Bogra', 44, 'belal', '1234'),
(5, '09-08-2021', 'sjb0HMSd4', 'Tara', 23, 'Female', 'O-', 'Gynaecology', '+8801765432187', 'tara@gmail.com', 'Single', 'Rajshahi', 909, 'tara', '1234'),
(7, '05-03-2022', 'sjb0HMSd7', 'Farliha', 28, 'Female', 'O+', 'Haematology', '+8801765432134', 'far@gmail.com', 'Married', 'Natore', 23, 'farliha', '1234'),
(9, '27-09-2009', 'sjb0HMSd9', 'Tanzima', 22, 'Female', 'O+', 'Gynaecology', '+8801756789006', 'tanzima@gmail.com', 'Single', 'Tangail', 555, 'tanzima', '1234'),
(13, '22.01.22', 'sjb0HMSd', 'rubya', 20, 'Female', 'A+', 'Medecine', '+880121314162', 'rubya@gmail.com', 'Single', 'Mohakhali', 2, 'rubya', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `count` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  `id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `age` int(5) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `disease` varchar(20) NOT NULL,
  `room` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`count`, `date`, `id`, `name`, `age`, `gender`, `address`, `phone`, `status`, `disease`, `room`) VALUES
(3, '09-03-2022', 'sjb0HMS3', 'Zim', 21, 'Male', 'Vola', '+8801876543237', 'Single', 'Dengue', 10),
(4, '03-03-2022', 'sjb0HMS4', 'Sabbir', 78, 'Male', 'Kustia', '+8801889765426', 'Married', 'Jondish', 6),
(6, '28-02-2022', 'sjb0HMS6', 'Parvez', 27, 'Male', 'Bogra', '+8801722456657', 'Married', 'Typhoid', 122),
(8, '22-02-2022', 'sjb0HMS7', 'Sakib', 27, 'Male', 'Chadpur', '+8801754678907', 'Single', 'Fever', 22);

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `count` int(11) NOT NULL,
  `joining` varchar(15) NOT NULL,
  `id` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `age` int(5) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `blood` varchar(4) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(17) NOT NULL,
  `address` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`count`, `joining`, `id`, `name`, `age`, `gender`, `blood`, `email`, `phone`, `address`, `status`, `username`, `password`) VALUES
(3, '23-04-2021', 'sjb0HMSd3', 'Shaon', 21, 'Male', 'O+', 'shaon@gmail.com', '+8801757009622', 'Naldanga,Natore', 'Single', 'shaon', '1234'),
(4, '23-06-2021', 'sjb0HMSr3', 'Fatin', 24, 'Male', 'A-', 'fat@gmail.com', '+8801654321234', 'Gazipur', 'Married', 'fatin', '1234'),
(6, '12-06-2021', 'sjb0HMSr4', 'Nafis ', 24, 'Male', 'AB-', 'nafis@gmail.com', '+8801767575658', 'Patuakhali', 'Single', 'Nafis', '1234'),
(9, '07-12-2021', 'sjb0HMSr7', 'Tahmid', 34, 'Male', 'O+', 'tahmid@gmail.com', '+8801766565676', 'Faridpur', 'Married', 'tahmid', '1234'),
(10, '23-12-2021', 'sjb0HMSr9', 'Saif', 44, 'Male', 'AB-', 'saif@gmail.com', '+88017654323', 'Bogra', 'Single', 'saif', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `a` varchar(11) NOT NULL,
  `b` varchar(11) NOT NULL,
  `c` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`a`, `b`, `c`) VALUES
('5', '6', '6'),
('1', '2', '4'),
('gfhf', 'fv', 'hf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`count`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`count`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`count`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `count` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `count` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `receptionist`
--
ALTER TABLE `receptionist`
  MODIFY `count` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
