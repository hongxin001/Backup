# Host: localhost  (Version: 5.6.11)
# Date: 2015-03-09 21:54:47
# Generator: MySQL-Front 5.3  (Build 4.191)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "idea"
#

DROP TABLE IF EXISTS `idea`;
CREATE TABLE `idea` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '称呼',
  `phone` varchar(255) DEFAULT NULL COMMENT '电话',
  `idea` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='创意';

#
# Data for table "idea"
#


#
# Structure for table "team"
#

DROP TABLE IF EXISTS `team`;
CREATE TABLE `team` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name_cap` varchar(255) DEFAULT NULL COMMENT '队长姓名',
  `phone_cap` varchar(255) DEFAULT NULL COMMENT '队长电话',
  `name_one` varchar(255) DEFAULT NULL COMMENT '队员1',
  `name_two` varchar(255) DEFAULT NULL COMMENT '队员2',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='队伍';

#
# Data for table "team"
#

