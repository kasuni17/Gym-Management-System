-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2024 at 03:05 PM
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
-- Database: `project_gym_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminn`
--

CREATE TABLE `adminn` (
  `adminid` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminn`
--

INSERT INTO `adminn` (`adminid`, `username`, `password`, `name`) VALUES
(1, 'admin', '1234', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `announcementid` int(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`announcementid`, `message`, `date`) VALUES
(1, 'New Zumba classes starting next Monday! Get ready to dance your way to fitness!', '2024-03-20'),
(2, 'Reminder: Gym will be closed for maintenance on Saturday, March 23rd.', '2024-03-23'),
(3, 'Join us for a special nutrition workshop this Friday at 6 PM. Learn how to fuel your workouts!', '2024-03-22'),
(4, 'Exciting news! We\'re introducing a new HIIT workout class starting next week. Get ready to sweat!', '2024-03-28'),
(5, 'Reminder: Yoga session on the rooftop tomorrow morning at 8 AM. Start your day with peace and flexibility.', '2024-03-19'),
(6, 'Join us for a charity run this Saturday to support local community initiatives. Sign up at the front desk!', '2024-03-30'),
(7, 'Attention members: Please remember to wipe down equipment after use and maintain social distancing in the gym.', '2024-03-21'),
(8, ' The gym will be closed for maintenance on Saturday, April 6th.', '2024-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendanceid` int(10) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `curr_date` text NOT NULL,
  `curr_time` text NOT NULL,
  `present` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendanceid`, `user_id`, `curr_date`, `curr_time`, `present`) VALUES
(1, 'Janith123', '2024-03-18', '08:30:00', 1),
(2, 'Janidu456', '2024-03-18', '09:15:00', 1),
(3, 'Roshan789', '2024-03-18', '10:00:00', 1),
(4, 'Dimuthu012', '2024-03-18', '11:45:00', 1),
(5, 'Achintha345', '2024-03-18', '17:30:00', 1),
(0, '3', '2024-03-20', '11:05 AM', 1),
(0, '5', '2024-03-20', '11:05 AM', 1),
(0, '7', '2024-03-20', '11:05 AM', 1),
(0, '9', '2024-03-20', '11:05 AM', 1),
(0, '10', '2024-03-20', '05:52 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `eqpid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `amount` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `vendor` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `address` varchar(20) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`eqpid`, `name`, `amount`, `quantity`, `vendor`, `description`, `address`, `contact`, `date`) VALUES
(1, 'Treadmill', 499500, 9, 'Fitness World', 'Cardio equipment', 'Kandy', '+94 812 20', '2024-03-18'),
(2, 'Elliptical Trainer', 11200, 3, 'Gym Solutions', 'Cardio equipment', 'Peradeniya', '+94 812 20', '2024-03-18'),
(3, 'Exercise Bike', 11000, 4, 'Fitness Equipment Co.', 'Cardio equipment', 'Colombo', '+94 77 312', '2024-03-18'),
(4, 'Rowing Machine', 31800, 2, 'Gym Gear Inc.', 'Cardio equipment', 'Kandy', '+94 812 20', '2024-03-18'),
(5, 'Barbell Set', 45500, 8, 'Iron Works', 'Strength training equipment', 'Gampaha', '+94 77 912', '2024-03-18'),
(6, 'Dumbbell Set', 6300, 10, 'Weight Lifting Supplies', 'Strength training equipment', 'Kandy', '+94 812 20', '2024-03-18'),
(7, 'Weight Bench', 7700, 3, 'Fitness Equipment Co.', 'Strength training equipment', 'Peradeniya', '+94 812 20', '2024-03-18'),
(8, 'Leg Press Machine', 42000, 2, 'Gym Gear Inc.', 'Strength training equipment', 'Kandy', '+94 812 20', '2024-03-18'),
(9, 'Yoga Mats', 2000, 20, 'Yoga Supplies Ltd.', 'Yoga equipment', 'Colombo', '+94 77 312', '2024-03-18'),
(10, 'Resistance Bands', 1500, 30, 'Fitness World', 'Functional training equipment', 'Kandy', '+94 812 20', '2024-03-18'),
(11, 'Jump Ropes', 15000, 25, 'Jumping Gear Inc.', 'Functional training equipment', 'Colombo', '+94 77 312', '2024-03-18'),
(12, 'Pilates Balls', 32500, 15, 'Pilates Producers', 'Pilates equipment', 'Kandy', '+94 812 20', '2024-03-18'),
(13, 'Medicine Balls', 4300, 12, 'Fitness Equipment Co.', 'Functional training equipment', 'Kandy', '+94 812 20', '2024-03-18'),
(14, 'Kettlebells', 41000, 10, 'Gym Gear Inc.', 'Functional training equipment', 'Kandy', '+94 812 20', '2024-03-18'),
(15, 'Stretching Bands', 11200, 20, 'Flex Fitness Supplies', 'Functional training equipment', 'Kandy', '+94 812 20', '2024-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dor` date NOT NULL,
  `services` varchar(50) NOT NULL,
  `amount` int(100) NOT NULL,
  `paid_date` date NOT NULL,
  `p_year` int(11) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `address` varchar(20) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  `attendance_count` int(100) NOT NULL,
  `ini_weight` int(100) NOT NULL DEFAULT 0,
  `curr_weight` int(100) NOT NULL DEFAULT 0,
  `ini_bodytype` varchar(50) NOT NULL,
  `curr_bodytype` varchar(50) NOT NULL,
  `progress_date` date NOT NULL,
  `reminder` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`user_id`, `fullname`, `email`, `password`, `gender`, `dor`, `services`, `amount`, `paid_date`, `p_year`, `plan`, `address`, `contact`, `status`, `attendance_count`, `ini_weight`, `curr_weight`, `ini_bodytype`, `curr_bodytype`, `progress_date`, `reminder`) VALUES
(1, 'Janith', 'janith@gmail.com', '1234', 'Male', '2023-05-15', 'Fitness', 55, '2024-03-21', 2023, '1', 'Kandy', '0775646574', 'Active', 35, 180, 175, 'Fat', 'Slim', '2024-03-18', 0),
(2, 'Janithi', 'janithi@gmail.com', '1234', 'Female', '2023-06-20', 'Gym, Yoga', 250, '2023-06-20', 2023, 'Yearly', 'Peradeniya', '456-789-0123', 'Active', 25, 150, 145, 'Mesomorph', 'Mesomorph', '2024-03-18', 1),
(3, 'Roshan', 'roshan@gmail.com', '1234', 'Male', '2023-07-10', 'Gym, Pilates', 300, '2023-07-10', 2023, 'Monthly', 'Mathale', '789-012-3456', 'Active', 29, 200, 195, 'Mesomorph', 'Mesomorph', '2024-03-18', 1),
(4, 'Dilini', 'dilini@gmail.com', '1234', 'Female', '2023-08-05', 'Gym, Cycling', 180, '2023-08-05', 2023, 'Monthly', 'Kandy', '321-654-9870', 'Active', 30, 160, 155, 'Ectomorph', 'Ectomorph', '2024-03-18', 0),
(6, 'Sehansa', 'sehansa@gmail.com', '1234', 'Female', '2023-10-18', 'Gym, Strength Training', 280, '2023-10-18', 2023, 'Monthly', 'Kandy', '678-901-2345', 'Active', 29, 140, 135, 'Ectomorph', 'Ectomorph', '2024-03-18', 0),
(7, 'Gihan', 'gihan@gmail.com', '1234', 'Male', '2023-11-25', 'Gym, CrossFit', 320, '2023-11-25', 2023, 'Monthly', 'Kandy', '987-654-3210', 'Active', 27, 175, 170, 'Mesomorph', 'Mesomorph', '2024-03-18', 0),
(8, 'Saduni', 'saduni@gmail.com', '1234', 'Female', '2023-12-30', 'Gym, Cardio', 210, '2023-12-30', 2023, 'Yearly', 'Peradeniya', '345-678-9012', 'Active', 31, 155, 150, 'Endomorph', 'Endomorph', '2024-03-18', 0),
(9, 'Smith', 'smith@gmail.com', '1234', 'Male', '2024-01-07', 'Gym, Boxing', 40, '2024-03-21', 2024, '1', 'Kandy', '543-210-9876', 'Active', 29, 165, 160, 'Mesomorph', 'Mesomorph', '2024-03-18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `rateid` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `charge` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE `reminder` (
  `remid` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `status` text NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reminder`
--

INSERT INTO `reminder` (`remid`, `name`, `message`, `status`, `date`, `user_id`) VALUES
(1, 'Membership Renewal Reminder', 'Dear member, your gym membership is expiring soon. Please renew your membership to continue enjoying our services.', 'Pending', '2024-04-01 09:00:00', 1),
(2, 'Nutrition Workshop Reminder', 'Don\'t forget to attend our nutrition workshop tomorrow at 6 PM. Learn about healthy eating habits to support your fitness goals!', 'Pending', '2024-03-22 18:00:00', 3),
(3, 'Gym Closed for Maintenance', 'Just a reminder that the gym will be closed for maintenance on Saturday, March 23rd. We apologize for any inconvenience.', 'Sent', '2024-03-22 12:00:00', 5),
(4, 'Yoga Class Reminder', 'Join us for a relaxing yoga session on the rooftop tomorrow morning at 8 AM. Start your day with peace and flexibility!', 'Pending', '2024-03-19 08:00:00', 2),
(5, 'Zumba Class Reminder', 'Get ready to dance your way to fitness! Our new Zumba classes start next Monday. Don\'t miss out!', 'Pending', '2024-03-20 18:00:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `address` varchar(20) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffid`, `username`, `email`, `password`, `fullname`, `address`, `designation`, `gender`, `contact`) VALUES
(2, 'Kasuni', 'kasuni@gmail.com', '1234', 'kasuni', 'kandy', 'Front Desk Staff', 'Female', 783217654),
(7, 'Sasindu', 'sasindu@gmail.com', '1234', 'sasindu', 'kandy', 'Front Desk Staff', 'Male', 78645312),
(3, 'vish', 'vish@gmail.com', '1234', 'vish', 'Kandy', 'Front Desk Staff', 'Male', 711234567);

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `taskid` int(11) NOT NULL,
  `task_status` varchar(50) NOT NULL,
  `task_desc` varchar(50) NOT NULL,
  `user_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`taskid`, `task_status`, `task_desc`, `user_id`) VALUES
(1, 'Pending', 'Complete 30 minutes of cardio', 1),
(2, 'Pending', 'Do 3 sets of 12 reps of bench press', 2),
(3, 'Pending', 'Run for 20 minutes on the treadmill', 3),
(4, 'Pending', 'Perform 4 sets of 10 reps of squats', 4),
(5, 'Pending', 'Attend Zumba class at 6 PM', 5),
(6, 'Pending', 'Complete 20 minutes of HIIT workout', 6),
(7, 'Pending', 'Do 3 sets of 15 reps of bicep curls', 7),
(8, 'Pending', 'Run on the elliptical machine for 25 minutes', 8),
(9, 'Pending', 'Perform 4 sets of 12 reps of lunges', 9),
(10, 'Pending', 'Attend yoga class at 7 AM', 10),
(11, 'Pending', 'Complete 30 minutes of cycling', 1),
(12, 'Pending', 'Do 3 sets of 10 reps of deadlifts', 2),
(13, 'Pending', 'Run for 15 minutes on the track', 3),
(14, 'Pending', 'Perform 4 sets of 8 reps of pull-ups', 9),
(15, 'Pending', 'Attend Pilates class at 10 AM', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminn`
--
ALTER TABLE `adminn`
  ADD PRIMARY KEY (`adminid`),
  ADD UNIQUE KEY `username_unique` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
