SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
SET GLOBAL FOREIGN_KEY_CHECKS=0;


CREATE TABLE IF NOT EXISTS `adminreg` (
  `ser` int(3) NOT NULL,
  `regdate` varchar(20) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `adminreg` (`ser`, `regdate`) VALUES
(1, '3 December,2022'),
(2, '2 December,2022');

CREATE TABLE IF NOT EXISTS `appointement` (
  `ser` tinyint(4) NOT NULL,
  `userid` tinyint(3) NOT NULL,
  `code` varchar(25) NOT NULL,
  `dentist` varchar(25) NOT NULL,
  `regdate` varchar(20) NOT NULL,
  `regtime` varchar(5) NOT NULL,
  `status` varchar(15) NOT NULL,
  `d` int(5) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `appointement` (`ser`, `userid`, `code`, `dentist`, `regdate`, `regtime`, `status`, `d`) VALUES
(1, 3, '100-Root Canal', '2-Alkhayzel Sali', '3 December,2022', '3 pM', 'Confirmed', 2),
(2, 5, '102-braces', '2-Jopay Dizon', '3 December,2022', '12 PM', 'Cancelled', 2);


CREATE TABLE IF NOT EXISTS `dentalcode` (
  `id` int(3) NOT NULL,
  `code` smallint(4) NOT NULL,
  `unitcost` varchar(7) NOT NULL,
  `description` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `dentalcode` (`id`, `code`, `unitcost`, `description`) VALUES
(1, 100, 'PHP1000', 'Root Canal'),
(2, 101, 'PHP1000', 'teeth clean'),
(3, 102, 'PHP1000', 'braces'),
(4, 103, 'PHP1000', 'gum clean'),
(5, 104, 'PHP1000', 'Partial Denture'),
(6, 105, 'PHP1000', 'Tooth Replacement'),
(7, 106, 'PHP1000', 'Laser Treatment');

CREATE TABLE IF NOT EXISTS `dentist` (
  `did` smallint(6) NOT NULL,
  `name` varchar(20) NOT NULL,
  `age` tinyint(3) NOT NULL,
  `sex` char(1) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `dtype` varchar(20) NOT NULL,
  `registration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `dentist` (`did`, `name`, `age`, `sex`, `phone`, `email`, `address`, `dtype`, `registration_date`) VALUES
(1, 'Hanz Dumapit', 45, 'm', 09214321232, 'Hanz@gmail.com', 'Tetuan', 'Permanent', '2022-3-12 12:30'),
(2, 'Alkhayzel Sali', 33, 'm', 09212121231, 'Alkhayzel@gmail.com', 'Canelar', 'Permanent', '2022-1-12 12:30'),
(3, 'Abdar Talib', 35, 'm', 09214321211, 'Abdar@gmail.com', 'Navarro', 'Permanent', '2022-2-12 12:30'),
(4, 'Sherinata Said', 37, 'f', 09314321232, 'Sherinata@gmail.com', 'Tetuan', 'Permanent', '2022-5-12 12:30'),
(5, 'Sidrick Cadungog', 37, 'm', 09234321233, 'Sidrick@gmail.com', 'Johnson', 'Permanent', '2022-6-12 12:30'),
(6, 'Abraham Indasan', 37, 'm', 0921433233, 'Abraham@gmail.com', 'Baliwasan', 'Permanent', '2022-9-12 12:30');

CREATE TABLE IF NOT EXISTS `signup` (
  `userid` smallint(5) NOT NULL,
  `user_level` tinyint(1) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` bigint(10) unsigned NOT NULL,
  `age` tinyint(3) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `registration_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

INSERT INTO `signup` (`userid`, `user_level`, `name`, `phone`, `age`, `address`, `email`, `password`, `registration_date`) VALUES
(1, 1, 'andre', 9123123123, 21, 'Canelar Moret', 'andre@gmail.com', '123', '2022-05-12 02:31:48'),
(2, 0, 'sherinata', 9123121232, 22, 'Tetuan', 'sherinata@gmail.com', '123', '2022-05-12 02:31:48'),
(3, 2, 'jopay', 9123121121, 22, 'Moon', 'jopay@gmail.com', '123', '2022-05-12 02:31:48');

CREATE TABLE IF NOT EXISTS `staff` (
  `sid` smallint(3) NOT NULL,
  `name` varchar(20) NOT NULL,
  `age` tinyint(3) NOT NULL,
  `sex` char(1) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `registration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `staff` (`sid`, `name`, `age`, `sex`, `phone`, `email`, `address`, `registration_date`) VALUES
(1, 'jopay', 21, 'm', 09363134097, 'jopay@gmail.com', 'Canelar, Moret', '2022-3-12 12:30'),
(2, 'andre', 21, 'm', 09363134054, 'andre@gmail.com', 'Canelar, Moret', '2022-4-12 12:30');

ALTER TABLE `adminreg`
  ADD PRIMARY KEY (`ser`);

ALTER TABLE `appointement`
  ADD PRIMARY KEY (`ser`);
  
  ALTER TABLE `dentalcode`
  ADD PRIMARY KEY (`id`);
  
 ALTER TABLE `dentist`
  ADD PRIMARY KEY (`did`);
  
  ALTER TABLE `signup`
  ADD PRIMARY KEY (`userid`);
  
  ALTER TABLE `staff`
  ADD PRIMARY KEY (`sid`);
  
  ALTER TABLE `adminreg`
  MODIFY `ser` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
  
  ALTER TABLE `appointement`
  MODIFY `ser` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
  
  ALTER TABLE `dentalcode`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
  
  ALTER TABLE `dentist`
  MODIFY `did` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
  
  ALTER TABLE `signup`
  MODIFY `userid` smallint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
  
  ALTER TABLE `staff`
  MODIFY `sid` smallint(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;

