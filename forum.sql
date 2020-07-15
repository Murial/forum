-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2020 at 05:44 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `idComment` varchar(10) NOT NULL,
  `idUser` varchar(10) NOT NULL,
  `idPost` varchar(10) NOT NULL,
  `date` datetime NOT NULL,
  `comment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `idPost` varchar(10) NOT NULL,
  `idUser` varchar(10) NOT NULL,
  `category` enum('quest','monster','item','shop') NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(100) NOT NULL,
  `article` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`idPost`, `idUser`, `category`, `date`, `title`, `article`) VALUES
('P000000001', 'U000000002', 'quest', '2020-06-16 01:43:31', 'QUEST 1', 'Curabitur aliquet quam id dui posuere blandit. Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.\r\n\r\nMauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vivamus suscipit tortor eget felis porttitor volutpat.'),
('P000000002', 'U000000001', 'monster', '2020-07-15 22:35:56', 'BOSS 1', 'Curabitur aliquet quam id dui posuere blandit. Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.\r\n\r\nMauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vivamus suscipit tortor eget felis porttitor volutpat.'),
('P000000003', 'U000000001', 'item', '2020-07-15 22:37:02', 'RING 1', 'Curabitur aliquet quam id dui posuere blandit. Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.\r\n\r\nMauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vivamus suscipit tortor eget felis porttitor volutpat.'),
('P000000004', 'U000000002', 'shop', '2020-07-15 22:37:50', 'PRICE', 'Curabitur aliquet quam id dui posuere blandit. Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.\r\n\r\nMauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vivamus suscipit tortor eget felis porttitor volutpat.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` varchar(10) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `badge` varchar(50) DEFAULT NULL,
  `desc` varchar(500) DEFAULT NULL,
  `profilePict` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `username`, `password`, `role`, `badge`, `desc`, `profilePict`) VALUES
('U000000001', 'admin', 'admin', 'admin', NULL, NULL, NULL),
('U000000002', 'user', 'user', 'user', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wiki`
--

CREATE TABLE `wiki` (
  `idWiki` int(10) NOT NULL,
  `idUser` varchar(10) NOT NULL,
  `catergory` enum('item','mob','facilities','job','quest') NOT NULL,
  `date` datetime NOT NULL,
  `changeLog` datetime NOT NULL,
  `title` varchar(100) NOT NULL,
  `article` varchar(3000) NOT NULL,
  `photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idComment`),
  ADD KEY `idComment` (`idComment`),
  ADD KEY `idComment_2` (`idComment`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idPost` (`idPost`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idPost`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idPost` (`idPost`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idUser_2` (`idUser`);

--
-- Indexes for table `wiki`
--
ALTER TABLE `wiki`
  ADD PRIMARY KEY (`idWiki`),
  ADD KEY `idWiki` (`idWiki`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idUser_2` (`idUser`),
  ADD KEY `idWiki_2` (`idWiki`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`idPost`) REFERENCES `post` (`idPost`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wiki`
--
ALTER TABLE `wiki`
  ADD CONSTRAINT `wiki_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
