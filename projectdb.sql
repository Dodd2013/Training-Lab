/*
Navicat MySQL Data Transfer

Source Server         : 1
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : projectdb

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2016-01-06 13:35:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_ans
-- ----------------------------
DROP TABLE IF EXISTS `tb_ans`;
CREATE TABLE `tb_ans` (
  `ans_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL,
  `ans` text NOT NULL,
  PRIMARY KEY (`ans_id`),
  KEY `ANS_PR` (`pro_id`),
  CONSTRAINT `ANS_PR` FOREIGN KEY (`pro_id`) REFERENCES `tb_problems` (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_ans
-- ----------------------------
INSERT INTO `tb_ans` VALUES ('1', '39', '1 - Poor');
INSERT INTO `tb_ans` VALUES ('2', '39', '2 - Average');
INSERT INTO `tb_ans` VALUES ('3', '39', '3 - Satisfactory  ');
INSERT INTO `tb_ans` VALUES ('4', '39', '4 - Good  ');
INSERT INTO `tb_ans` VALUES ('5', '39', '5 - Excellent  ');
INSERT INTO `tb_ans` VALUES ('6', '40', '1 - Poor');
INSERT INTO `tb_ans` VALUES ('7', '40', '2 - Average');
INSERT INTO `tb_ans` VALUES ('8', '40', '3 - Satisfactory  ');
INSERT INTO `tb_ans` VALUES ('9', '40', '4 - Good  ');
INSERT INTO `tb_ans` VALUES ('10', '40', '5 - Excellent  ');
INSERT INTO `tb_ans` VALUES ('11', '41', '1 - Poor');
INSERT INTO `tb_ans` VALUES ('12', '41', '2 - Average');
INSERT INTO `tb_ans` VALUES ('13', '41', '3 - Satisfactory  ');
INSERT INTO `tb_ans` VALUES ('14', '41', '4 - Good  ');
INSERT INTO `tb_ans` VALUES ('15', '41', '5 - Excellent  ');
INSERT INTO `tb_ans` VALUES ('19', '42', '1 - Poor');
INSERT INTO `tb_ans` VALUES ('20', '42', '2 - Average');
INSERT INTO `tb_ans` VALUES ('21', '42', '3 - Satisfactory  ');
INSERT INTO `tb_ans` VALUES ('22', '42', '4 - Good  ');
INSERT INTO `tb_ans` VALUES ('23', '42', '5 - Excellent  ');
INSERT INTO `tb_ans` VALUES ('24', '43', '1 - Poor');
INSERT INTO `tb_ans` VALUES ('25', '43', '2 - Average');
INSERT INTO `tb_ans` VALUES ('26', '43', '3 - Satisfactory  ');
INSERT INTO `tb_ans` VALUES ('27', '43', '4 - Good  ');
INSERT INTO `tb_ans` VALUES ('28', '43', '5 - Excellent  ');
INSERT INTO `tb_ans` VALUES ('29', '44', '1 - Poor');
INSERT INTO `tb_ans` VALUES ('30', '44', '2 - Average');
INSERT INTO `tb_ans` VALUES ('31', '44', '3 - Satisfactory  ');
INSERT INTO `tb_ans` VALUES ('32', '44', '4 - Good  ');
INSERT INTO `tb_ans` VALUES ('33', '44', '5 - Excellent  ');
INSERT INTO `tb_ans` VALUES ('34', '45', '1 - Poor');
INSERT INTO `tb_ans` VALUES ('35', '45', '2 - Average');
INSERT INTO `tb_ans` VALUES ('36', '45', '3 - Satisfactory  ');
INSERT INTO `tb_ans` VALUES ('37', '45', '4 - Good  ');
INSERT INTO `tb_ans` VALUES ('38', '45', '5 - Excellent  ');
INSERT INTO `tb_ans` VALUES ('39', '46', '1 - Poor');
INSERT INTO `tb_ans` VALUES ('40', '46', '2 - Average');
INSERT INTO `tb_ans` VALUES ('41', '46', '3 - Satisfactory  ');
INSERT INTO `tb_ans` VALUES ('42', '46', '4 - Good  ');
INSERT INTO `tb_ans` VALUES ('43', '46', '5 - Excellent  ');
INSERT INTO `tb_ans` VALUES ('44', '47', '1 - Poor');
INSERT INTO `tb_ans` VALUES ('45', '47', '2 - Average');
INSERT INTO `tb_ans` VALUES ('46', '47', '3 - Satisfactory  ');
INSERT INTO `tb_ans` VALUES ('47', '47', '4 - Good  ');
INSERT INTO `tb_ans` VALUES ('48', '47', '5 - Excellent  ');

-- ----------------------------
-- Table structure for tb_fb_pro
-- ----------------------------
DROP TABLE IF EXISTS `tb_fb_pro`;
CREATE TABLE `tb_fb_pro` (
  `fb_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  KEY `FB_PR1` (`fb_id`),
  KEY `FB_PR2` (`pro_id`),
  CONSTRAINT `FB_PR1` FOREIGN KEY (`fb_id`) REFERENCES `tb_feedbacks` (`fb_id`),
  CONSTRAINT `FB_PR2` FOREIGN KEY (`pro_id`) REFERENCES `tb_problems` (`pro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_fb_pro
-- ----------------------------
INSERT INTO `tb_fb_pro` VALUES ('14', '39');
INSERT INTO `tb_fb_pro` VALUES ('14', '40');
INSERT INTO `tb_fb_pro` VALUES ('14', '41');
INSERT INTO `tb_fb_pro` VALUES ('14', '42');
INSERT INTO `tb_fb_pro` VALUES ('14', '43');
INSERT INTO `tb_fb_pro` VALUES ('14', '44');
INSERT INTO `tb_fb_pro` VALUES ('14', '45');
INSERT INTO `tb_fb_pro` VALUES ('14', '46');
INSERT INTO `tb_fb_pro` VALUES ('14', '47');
INSERT INTO `tb_fb_pro` VALUES ('14', '48');

-- ----------------------------
-- Table structure for tb_feedbacks
-- ----------------------------
DROP TABLE IF EXISTS `tb_feedbacks`;
CREATE TABLE `tb_feedbacks` (
  `fb_id` int(11) NOT NULL AUTO_INCREMENT,
  `fb_name` varchar(50) NOT NULL,
  `fb_begin` datetime NOT NULL,
  `fb_end` datetime NOT NULL,
  `fb_create_time` datetime NOT NULL,
  `fb_create_user` varchar(40) NOT NULL,
  `fb_askgroup` int(11) DEFAULT NULL,
  `fb_des` text,
  PRIMARY KEY (`fb_id`),
  KEY `FB_US` (`fb_create_user`),
  CONSTRAINT `FB_US` FOREIGN KEY (`fb_create_user`) REFERENCES `tb_users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_feedbacks
-- ----------------------------
INSERT INTO `tb_feedbacks` VALUES ('14', 'NIIT Feedback Form ', '2016-01-06 12:00:00', '2016-01-25 12:00:00', '2016-01-06 11:58:08', 'Dodd', '1', 'Your feedback is invaluable!  It helps us measure and improve our training effectiveness to give you the best in terms of Quality!! Please fill up the form frankly and completely.  Please indicate your opinion by a tick mark where necessary, keeping in mind the response interpretation. Before you begin, please go through the form fully and clarify any doubts with your feedback co-ordinator.  ');

-- ----------------------------
-- Table structure for tb_problems
-- ----------------------------
DROP TABLE IF EXISTS `tb_problems`;
CREATE TABLE `tb_problems` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_des` text NOT NULL,
  `pro_type` int(11) NOT NULL,
  `pro_create_user` varchar(40) NOT NULL,
  `pro_create_time` datetime NOT NULL,
  PRIMARY KEY (`pro_id`),
  KEY `PR_US` (`pro_create_user`),
  CONSTRAINT `PR_US` FOREIGN KEY (`pro_create_user`) REFERENCES `tb_users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_problems
-- ----------------------------
INSERT INTO `tb_problems` VALUES ('39', 'You are satisfied with the faculty memberâ€™s ability to draw participation from the class. <br>ä½ æ˜¯å¦æ»¡æ„æ•™å¸ˆé©¾å¾¡è¯¾å ‚çš„èƒ½åŠ› ï¼Œä¾‹å¦‚åè°ƒçºªå¾‹ï¼Œåè°ƒå„ç»„ä¹‹é—´çš„é…åˆï¼Œæ´»è·ƒè¯¾å ‚æ°”æ°›', '1', 'Dodd', '2016-01-06 11:37:34');
INSERT INTO `tb_problems` VALUES ('40', 'Your sessions begin and end on time.\r\n<BR> æ¯èŠ‚è¯¾æ˜¯å¦éƒ½èƒ½å‡†æ—¶ä¸Šä¸‹è¯¾', '1', 'Dodd', '2016-01-06 11:43:15');
INSERT INTO `tb_problems` VALUES ('41', 'You are satisfied with the presentation skills of your faculty. \r\n<BR>ä½ æ˜¯å¦æ»¡æ„æ•™å¸ˆçš„æ¼”è®²å’Œè¡¨è¿°èƒ½åŠ›ã€‚  ', '1', 'Dodd', '2016-01-06 11:44:22');
INSERT INTO `tb_problems` VALUES ('42', 'You are given satisfactory answer to your queries related to the course in this module \r\n<BR> ä½ æ˜¯å¦æ»¡æ„æ•™å¸ˆåœ¨è¯¾å ‚ä¸­å¯¹äºŽä½ æ‰€æå‡ºçš„é—®é¢˜è€Œç»™å‡ºçš„å›žç­”ã€‚ ', '1', 'Dodd', '2016-01-06 11:45:12');
INSERT INTO `tb_problems` VALUES ('43', 'The faculty has thorough knowledge of the contents of the module. \r\n<BR>ä½ çš„æ•™å¸ˆæ˜¯å¦ç†Ÿç»ƒæŽŒæ¡äº†æ•´ä¸ªè¯¾å ‚ä¸­çš„çŸ¥è¯†å†…å®¹ã€‚ ', '1', 'Dodd', '2016-01-06 11:45:53');
INSERT INTO `tb_problems` VALUES ('44', 'You are able to understand what your faculty communicates to you.\r\n<BR> ä½ æ˜¯å¦èƒ½å¤Ÿç†è§£æ•™å¸ˆä¸Žä½ æ²Ÿé€šçš„çŸ¥è¯†å†…å®¹ã€‚ ', '1', 'Dodd', '2016-01-06 11:46:43');
INSERT INTO `tb_problems` VALUES ('45', 'You are satisfied with the attitude of your faculty. \r\n<BR>ä½ æ˜¯å¦æ»¡æ„æ•™å¸ˆçš„æ•™å­¦æ€åº¦ã€‚ ', '1', 'Dodd', '2016-01-06 11:48:00');
INSERT INTO `tb_problems` VALUES ('46', 'You are confident about your grasp of the contents of the module.\r\n<BR> åœ¨æ¯èŠ‚è¯¾ä¸Šå®Œä¹‹åŽä½ æ˜¯å¦è§‰å¾—è‡ªå·±å¯¹äºŽåŠ å…¥ITè¡Œä¸šçš„è‡ªä¿¡å¿ƒå¾—åˆ°äº†æé«˜ã€‚ ', '1', 'Dodd', '2016-01-06 11:48:53');
INSERT INTO `tb_problems` VALUES ('47', 'You are able to complete all Machine Room/Practice sessions on time. \r\n<BR>ä½ èƒ½å¦å®Œæˆè€å¸ˆåœ¨è¯¾å ‚ä¸­å¸ƒç½®çš„æ‰€æœ‰ä½œä¸šå’Œç‹¬ç«‹å®žè·µã€‚(For IT Classes)', '1', 'Dodd', '2016-01-06 11:49:47');
INSERT INTO `tb_problems` VALUES ('48', 'Additional Comments / Suggestions (If Any) ', '3', 'Dodd', '2016-01-06 11:50:36');

-- ----------------------------
-- Table structure for tb_resume
-- ----------------------------
DROP TABLE IF EXISTS `tb_resume`;
CREATE TABLE `tb_resume` (
  `username` varchar(40) NOT NULL,
  `chname` varchar(40) DEFAULT NULL,
  `ginder` varchar(10) DEFAULT NULL,
  `birth` varchar(40) DEFAULT NULL,
  `phone` varchar(40) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `town` varchar(20) DEFAULT NULL,
  `career` varchar(100) DEFAULT NULL,
  `degree` varchar(100) DEFAULT NULL,
  `track` varchar(40) DEFAULT NULL,
  `project` varchar(200) DEFAULT NULL,
  `skill` varchar(40) DEFAULT NULL,
  `joblocation1` varchar(20) DEFAULT NULL,
  `joblocation2` varchar(20) DEFAULT NULL,
  `joblocation3` varchar(20) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`username`),
  CONSTRAINT `fk` FOREIGN KEY (`username`) REFERENCES `tb_users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_resume
-- ----------------------------
INSERT INTO `tb_resume` VALUES ('Dodd', 'èŒƒå¾·è¨', 'male', '2015-12-29', '123', 'dfsf', 'å±±ä¸œçœ', 'æ³°å®‰å¸‚', 'å²±å²³åŒº', 'fdsa', 'fdsa', 'Java Track', 'fdas', 'fdsa', 'beijing', 'beijing', 'beijing', 'null');

-- ----------------------------
-- Table structure for tb_submit
-- ----------------------------
DROP TABLE IF EXISTS `tb_submit`;
CREATE TABLE `tb_submit` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(40) NOT NULL,
  `sub_time` datetime NOT NULL,
  `fb_id` int(11) NOT NULL,
  `group_id` text,
  PRIMARY KEY (`sub_id`),
  KEY `SUB_FB` (`fb_id`),
  KEY `SUB_US` (`user_id`),
  CONSTRAINT `SUB_FB` FOREIGN KEY (`fb_id`) REFERENCES `tb_feedbacks` (`fb_id`),
  CONSTRAINT `SUB_US` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_submit
-- ----------------------------

-- ----------------------------
-- Table structure for tb_sub_detail
-- ----------------------------
DROP TABLE IF EXISTS `tb_sub_detail`;
CREATE TABLE `tb_sub_detail` (
  `sub_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `ans` text NOT NULL,
  KEY `SUB_DET` (`sub_id`),
  KEY `DET_PRO` (`pro_id`),
  CONSTRAINT `DET_PRO` FOREIGN KEY (`pro_id`) REFERENCES `tb_problems` (`pro_id`),
  CONSTRAINT `SUB_DET` FOREIGN KEY (`sub_id`) REFERENCES `tb_submit` (`sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_sub_detail
-- ----------------------------

-- ----------------------------
-- Table structure for tb_users
-- ----------------------------
DROP TABLE IF EXISTS `tb_users`;
CREATE TABLE `tb_users` (
  `user_id` varchar(40) NOT NULL,
  `user_pwd` varchar(40) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_img` text,
  `user_identity` varchar(20) DEFAULT NULL,
  `user_regdate` datetime NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_users
-- ----------------------------
INSERT INTO `tb_users` VALUES ('Dodd', '123456', '123456@1.com', '2016_01_05_04_53_13Dodd', 'admin', '2016-01-04 01:36:52');
