/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : dfeeco

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-11-25 19:28:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('超级管理员', '1', '1541773710');

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('/*', '2', null, null, null, '1541773560', '1541773560');
INSERT INTO `auth_item` VALUES ('/admin/*', '2', null, null, null, '1541773558', '1541773558');
INSERT INTO `auth_item` VALUES ('/admin/assignment/*', '2', null, null, null, '1541773557', '1541773557');
INSERT INTO `auth_item` VALUES ('/admin/assignment/assign', '2', null, null, null, '1541773557', '1541773557');
INSERT INTO `auth_item` VALUES ('/admin/assignment/index', '2', null, null, null, '1541773557', '1541773557');
INSERT INTO `auth_item` VALUES ('/admin/assignment/revoke', '2', null, null, null, '1541773557', '1541773557');
INSERT INTO `auth_item` VALUES ('/admin/assignment/view', '2', null, null, null, '1541773557', '1541773557');
INSERT INTO `auth_item` VALUES ('/admin/default/*', '2', null, null, null, '1541773557', '1541773557');
INSERT INTO `auth_item` VALUES ('/admin/default/index', '2', null, null, null, '1541773557', '1541773557');
INSERT INTO `auth_item` VALUES ('/admin/menu/*', '2', null, null, null, '1541773557', '1541773557');
INSERT INTO `auth_item` VALUES ('/admin/menu/create', '2', null, null, null, '1541773557', '1541773557');
INSERT INTO `auth_item` VALUES ('/admin/menu/delete', '2', null, null, null, '1541773557', '1541773557');
INSERT INTO `auth_item` VALUES ('/admin/menu/index', '2', null, null, null, '1541773557', '1541773557');
INSERT INTO `auth_item` VALUES ('/admin/menu/update', '2', null, null, null, '1541773557', '1541773557');
INSERT INTO `auth_item` VALUES ('/admin/menu/view', '2', null, null, null, '1541773557', '1541773557');
INSERT INTO `auth_item` VALUES ('/admin/permission/*', '2', null, null, null, '1541773557', '1541773557');
INSERT INTO `auth_item` VALUES ('/admin/permission/assign', '2', null, null, null, '1541773557', '1541773557');
INSERT INTO `auth_item` VALUES ('/admin/permission/create', '2', null, null, null, '1541773557', '1541773557');
INSERT INTO `auth_item` VALUES ('/admin/permission/delete', '2', null, null, null, '1541773557', '1541773557');
INSERT INTO `auth_item` VALUES ('/admin/permission/index', '2', null, null, null, '1541773557', '1541773557');
INSERT INTO `auth_item` VALUES ('/admin/permission/remove', '2', null, null, null, '1541773557', '1541773557');
INSERT INTO `auth_item` VALUES ('/admin/permission/update', '2', null, null, null, '1541773557', '1541773557');
INSERT INTO `auth_item` VALUES ('/admin/permission/view', '2', null, null, null, '1541773557', '1541773557');
INSERT INTO `auth_item` VALUES ('/admin/role/*', '2', null, null, null, '1541773558', '1541773558');
INSERT INTO `auth_item` VALUES ('/admin/role/assign', '2', null, null, null, '1541773558', '1541773558');
INSERT INTO `auth_item` VALUES ('/admin/role/create', '2', null, null, null, '1541773558', '1541773558');
INSERT INTO `auth_item` VALUES ('/admin/role/delete', '2', null, null, null, '1541773558', '1541773558');
INSERT INTO `auth_item` VALUES ('/admin/role/index', '2', null, null, null, '1541773557', '1541773557');
INSERT INTO `auth_item` VALUES ('/admin/role/remove', '2', null, null, null, '1541773558', '1541773558');
INSERT INTO `auth_item` VALUES ('/admin/role/update', '2', null, null, null, '1541773558', '1541773558');
INSERT INTO `auth_item` VALUES ('/admin/role/view', '2', null, null, null, '1541773558', '1541773558');
INSERT INTO `auth_item` VALUES ('/admin/route/*', '2', null, null, null, '1541773558', '1541773558');
INSERT INTO `auth_item` VALUES ('/admin/route/assign', '2', null, null, null, '1541773558', '1541773558');
INSERT INTO `auth_item` VALUES ('/admin/route/create', '2', null, null, null, '1541773558', '1541773558');
INSERT INTO `auth_item` VALUES ('/admin/route/index', '2', null, null, null, '1541773558', '1541773558');
INSERT INTO `auth_item` VALUES ('/admin/route/refresh', '2', null, null, null, '1541773558', '1541773558');
INSERT INTO `auth_item` VALUES ('/admin/route/remove', '2', null, null, null, '1541773558', '1541773558');
INSERT INTO `auth_item` VALUES ('/admin/rule/*', '2', null, null, null, '1541773558', '1541773558');
INSERT INTO `auth_item` VALUES ('/admin/rule/create', '2', null, null, null, '1541773558', '1541773558');
INSERT INTO `auth_item` VALUES ('/admin/rule/delete', '2', null, null, null, '1541773558', '1541773558');
INSERT INTO `auth_item` VALUES ('/admin/rule/index', '2', null, null, null, '1541773558', '1541773558');
INSERT INTO `auth_item` VALUES ('/admin/rule/update', '2', null, null, null, '1541773558', '1541773558');
INSERT INTO `auth_item` VALUES ('/admin/rule/view', '2', null, null, null, '1541773558', '1541773558');
INSERT INTO `auth_item` VALUES ('/admin/user/*', '2', null, null, null, '1541773558', '1541773558');
INSERT INTO `auth_item` VALUES ('/admin/user/activate', '2', null, null, null, '1541773558', '1541773558');
INSERT INTO `auth_item` VALUES ('/admin/user/change-password', '2', null, null, null, '1541773558', '1541773558');
INSERT INTO `auth_item` VALUES ('/admin/user/delete', '2', null, null, null, '1541773558', '1541773558');
INSERT INTO `auth_item` VALUES ('/admin/user/index', '2', null, null, null, '1541773558', '1541773558');
INSERT INTO `auth_item` VALUES ('/admin/user/login', '2', null, null, null, '1541773558', '1541773558');
INSERT INTO `auth_item` VALUES ('/admin/user/logout', '2', null, null, null, '1541773558', '1541773558');
INSERT INTO `auth_item` VALUES ('/admin/user/request-password-reset', '2', null, null, null, '1541773558', '1541773558');
INSERT INTO `auth_item` VALUES ('/admin/user/reset-password', '2', null, null, null, '1541773558', '1541773558');
INSERT INTO `auth_item` VALUES ('/admin/user/signup', '2', null, null, null, '1541773558', '1541773558');
INSERT INTO `auth_item` VALUES ('/admin/user/view', '2', null, null, null, '1541773558', '1541773558');
INSERT INTO `auth_item` VALUES ('/chat/*', '2', null, null, null, '1542286415', '1542286415');
INSERT INTO `auth_item` VALUES ('/chat/index', '2', null, null, null, '1542286415', '1542286415');
INSERT INTO `auth_item` VALUES ('/chat/save', '2', null, null, null, '1542286415', '1542286415');
INSERT INTO `auth_item` VALUES ('/common/*', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/debug/*', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/debug/default/*', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/debug/default/db-explain', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/debug/default/download-mail', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/debug/default/index', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/debug/default/toolbar', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/debug/default/view', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/debug/user/*', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/debug/user/reset-identity', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/debug/user/set-identity', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/gii/*', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/gii/default/*', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/gii/default/action', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/gii/default/diff', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/gii/default/index', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/gii/default/preview', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/gii/default/view', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/make-eth/*', '2', null, null, null, '1541775376', '1541775376');
INSERT INTO `auth_item` VALUES ('/make-eth/create', '2', null, null, null, '1541775376', '1541775376');
INSERT INTO `auth_item` VALUES ('/make-eth/delete', '2', null, null, null, '1541775376', '1541775376');
INSERT INTO `auth_item` VALUES ('/make-eth/index', '2', null, null, null, '1541775376', '1541775376');
INSERT INTO `auth_item` VALUES ('/make-eth/update', '2', null, null, null, '1541775376', '1541775376');
INSERT INTO `auth_item` VALUES ('/make-eth/view', '2', null, null, null, '1541775376', '1541775376');
INSERT INTO `auth_item` VALUES ('/node/*', '2', null, null, null, '1541775461', '1541775461');
INSERT INTO `auth_item` VALUES ('/node/create', '2', null, null, null, '1541775461', '1541775461');
INSERT INTO `auth_item` VALUES ('/node/delete', '2', null, null, null, '1541775461', '1541775461');
INSERT INTO `auth_item` VALUES ('/node/index', '2', null, null, null, '1541775461', '1541775461');
INSERT INTO `auth_item` VALUES ('/node/update', '2', null, null, null, '1541775461', '1541775461');
INSERT INTO `auth_item` VALUES ('/node/view', '2', null, null, null, '1541775461', '1541775461');
INSERT INTO `auth_item` VALUES ('/site/*', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/site/auth', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/site/error', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/site/index', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/site/login', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/site/logout', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/site/upload', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/upload/*', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/upload/do', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/upload/qiniu', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/user-backend/*', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/user-backend/create', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/user-backend/delete', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/user-backend/index', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/user-backend/signup', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/user-backend/update', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/user-backend/view', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/user/*', '2', null, null, null, '1541773560', '1541773560');
INSERT INTO `auth_item` VALUES ('/user/create', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/user/data', '2', null, null, null, '1541773560', '1541773560');
INSERT INTO `auth_item` VALUES ('/user/delete', '2', null, null, null, '1541773560', '1541773560');
INSERT INTO `auth_item` VALUES ('/user/index', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('/user/update', '2', null, null, null, '1541773560', '1541773560');
INSERT INTO `auth_item` VALUES ('/user/view', '2', null, null, null, '1541773559', '1541773559');
INSERT INTO `auth_item` VALUES ('超级管理员', '1', '拥有最高权限', null, null, '1541773679', '1542344942');

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/assignment/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/assignment/assign');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/assignment/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/assignment/revoke');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/assignment/view');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/default/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/default/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/menu/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/menu/create');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/menu/delete');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/menu/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/menu/update');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/menu/view');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/permission/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/permission/assign');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/permission/create');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/permission/delete');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/permission/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/permission/remove');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/permission/update');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/permission/view');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/role/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/role/assign');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/role/create');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/role/delete');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/role/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/role/remove');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/role/update');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/role/view');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/route/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/route/assign');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/route/create');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/route/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/route/refresh');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/route/remove');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/rule/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/rule/create');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/rule/delete');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/rule/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/rule/update');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/rule/view');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/user/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/user/activate');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/user/change-password');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/user/delete');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/user/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/user/login');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/user/logout');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/user/request-password-reset');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/user/reset-password');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/user/signup');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/admin/user/view');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/chat/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/chat/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/chat/save');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/common/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/debug/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/debug/default/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/debug/default/db-explain');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/debug/default/download-mail');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/debug/default/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/debug/default/toolbar');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/debug/default/view');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/debug/user/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/debug/user/reset-identity');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/debug/user/set-identity');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/gii/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/gii/default/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/gii/default/action');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/gii/default/diff');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/gii/default/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/gii/default/preview');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/gii/default/view');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/make-eth/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/make-eth/create');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/make-eth/delete');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/make-eth/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/make-eth/update');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/make-eth/view');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/node/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/node/create');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/node/delete');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/node/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/node/update');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/node/view');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/site/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/site/auth');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/site/error');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/site/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/site/login');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/site/logout');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/site/upload');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/upload/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/upload/do');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/upload/qiniu');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/user-backend/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/user-backend/create');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/user-backend/delete');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/user-backend/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/user-backend/signup');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/user-backend/update');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/user-backend/view');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/user/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/user/create');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/user/data');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/user/delete');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/user/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/user/update');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/user/view');

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for chat_content
-- ----------------------------
DROP TABLE IF EXISTS `chat_content`;
CREATE TABLE `chat_content` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fromid` int(11) NOT NULL,
  `fromname` varchar(128) NOT NULL,
  `toid` int(11) NOT NULL,
  `toname` varchar(128) NOT NULL,
  `content` varchar(255) NOT NULL,
  `isread` tinyint(1) NOT NULL DEFAULT '0',
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=文本,2=图片',
  `created_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of chat_content
-- ----------------------------
INSERT INTO `chat_content` VALUES ('45', '3', '罗豪', '1', '李白', '帅哥哥[em_3]', '8', '1', '2018-11-18 05:56:23');
INSERT INTO `chat_content` VALUES ('46', '2', '测试', '1', '李白', '哥哥', '1', '1', '2018-11-18 05:56:41');
INSERT INTO `chat_content` VALUES ('47', '3', '罗豪', '1', '李白', '哦哦哦', '1', '1', '2018-11-18 05:56:55');
INSERT INTO `chat_content` VALUES ('48', '2', '测试', '1', '李白', '安安', '1', '1', '2018-11-18 05:57:50');
INSERT INTO `chat_content` VALUES ('49', '2', '测试', '1', '李白', '[em_7]', '1', '1', '2018-11-18 06:17:18');
INSERT INTO `chat_content` VALUES ('50', '3', '罗豪', '1', '李白', '安安', '1', '1', '2018-11-18 06:27:52');
INSERT INTO `chat_content` VALUES ('51', '3', '罗豪', '1', '李白', '啊', '1', '1', '2018-11-18 06:29:02');
INSERT INTO `chat_content` VALUES ('52', '3', '罗豪', '1', '李白', '？？？？？？？？？？？？', '1', '1', '2018-11-18 06:29:18');
INSERT INTO `chat_content` VALUES ('53', '3', '罗豪', '1', '李白', '11', '1', '1', '2018-11-18 06:30:17');
INSERT INTO `chat_content` VALUES ('54', '2', '测试', '1', '李白', '22', '1', '1', '2018-11-18 06:30:26');
INSERT INTO `chat_content` VALUES ('55', '1', '李白', '3', '罗豪', 'aaa', '1', '1', '2018-11-18 06:34:46');
INSERT INTO `chat_content` VALUES ('56', '3', '罗豪', '1', '李白', '111', '1', '1', '2018-11-18 06:43:27');
INSERT INTO `chat_content` VALUES ('57', '3', '罗豪', '1', '李白', '222', '1', '1', '2018-11-18 06:43:30');
INSERT INTO `chat_content` VALUES ('58', '2', '测试', '1', '李白', '22', '1', '1', '2018-11-18 06:43:33');
INSERT INTO `chat_content` VALUES ('59', '2', '测试', '1', '李白', '33', '1', '1', '2018-11-18 06:43:37');
INSERT INTO `chat_content` VALUES ('60', '3', '罗豪', '1', '李白', '1', '1', '1', '2018-11-18 06:43:53');
INSERT INTO `chat_content` VALUES ('61', '3', '罗豪', '1', '李白', '111', '1', '1', '2018-11-18 06:45:21');
INSERT INTO `chat_content` VALUES ('62', '3', '罗豪', '1', '李白', '2', '1', '1', '2018-11-18 06:45:40');
INSERT INTO `chat_content` VALUES ('63', '3', '罗豪', '1', '李白', 'aa', '1', '1', '2018-11-18 06:47:16');
INSERT INTO `chat_content` VALUES ('64', '3', '罗豪', '1', '李白', '2222', '1', '1', '2018-11-18 06:49:51');
INSERT INTO `chat_content` VALUES ('65', '3', '罗豪', '1', '李白', '1', '1', '1', '2018-11-18 06:52:02');
INSERT INTO `chat_content` VALUES ('66', '3', '罗豪', '1', '李白', '22', '1', '1', '2018-11-18 06:52:34');
INSERT INTO `chat_content` VALUES ('67', '3', '罗豪', '1', '李白', '33', '1', '1', '2018-11-18 06:52:42');
INSERT INTO `chat_content` VALUES ('68', '3', '罗豪', '1', '李白', '44', '1', '1', '2018-11-18 06:52:51');
INSERT INTO `chat_content` VALUES ('69', '3', '罗豪', '1', '李白', '333', '1', '1', '2018-11-18 06:53:01');
INSERT INTO `chat_content` VALUES ('70', '3', '罗豪', '1', '李白', '1', '1', '1', '2018-11-18 06:53:53');
INSERT INTO `chat_content` VALUES ('71', '3', '罗豪', '1', '李白', '2', '1', '1', '2018-11-18 06:54:06');
INSERT INTO `chat_content` VALUES ('72', '3', '罗豪', '1', '李白', '3', '1', '1', '2018-11-18 06:54:12');
INSERT INTO `chat_content` VALUES ('73', '2', '测试', '1', '李白', 'dashuai', '0', '1', '2018-11-18 07:00:30');
INSERT INTO `chat_content` VALUES ('74', '3', '罗豪', '1', '李白', '哥，窝有黄片', '0', '1', '2018-11-18 07:00:47');
INSERT INTO `chat_content` VALUES ('75', '3', '罗豪', '1', '李白', '要黄片吗', '0', '1', '2018-11-18 07:01:11');

-- ----------------------------
-- Table structure for make_eth
-- ----------------------------
DROP TABLE IF EXISTS `make_eth`;
CREATE TABLE `make_eth` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `eth` varchar(255) NOT NULL,
  `make_eth` varchar(128) NOT NULL COMMENT 'email拼eth后md5',
  `request_time` datetime DEFAULT NULL COMMENT '请求时间',
  `created_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of make_eth
-- ----------------------------
INSERT INTO `make_eth` VALUES ('1', '213123.com', 'dsadsaewq321321', '5f8e1ce4feef24c1735184cd576732d0', '2018-10-31 21:51:55', '2018-10-31 21:51:55');
INSERT INTO `make_eth` VALUES ('8', '21312@3.com', 'dsadsa2ewq321321', '591b96a88285e8939494fb26ec17bfd3', '2018-10-31 22:21:03', '2018-10-31 22:21:03');
INSERT INTO `make_eth` VALUES ('9', '213212@3.com', 'dsadsa2ewq321321', 'cde56ea56461c3952785d9926b25a4cd', '2018-10-31 22:44:05', '2018-10-31 22:44:05');
INSERT INTO `make_eth` VALUES ('10', '213212@3.com', 'dsadsa222ewq321321', '2797d117e53ea9a7a29c256577c39074', '2018-10-31 22:48:35', '2018-10-31 22:48:35');
INSERT INTO `make_eth` VALUES ('11', '2132212@3.com', 'dsadsa222ewq321321', 'd9fc94cbc722f8f2370579b332f177c3', '2018-10-31 22:48:50', '2018-10-31 22:48:50');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(256) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '后台用户管理', null, '/user-backend/index', '1', null);
INSERT INTO `menu` VALUES ('2', '权限管理', null, '/admin/route/index', '4', null);
INSERT INTO `menu` VALUES ('3', '权限管理', '2', '/admin/permission/index', null, null);
INSERT INTO `menu` VALUES ('4', '菜单设置', '2', '/admin/menu/index', null, null);
INSERT INTO `menu` VALUES ('5', '角色分配', '2', '/admin/assignment/index', null, null);
INSERT INTO `menu` VALUES ('6', '角色管理', '2', '/admin/role/index', null, null);
INSERT INTO `menu` VALUES ('7', '路由管理', '2', '/admin/route/index', null, null);

-- ----------------------------
-- Table structure for node
-- ----------------------------
DROP TABLE IF EXISTS `node`;
CREATE TABLE `node` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nick_name` varchar(255) NOT NULL COMMENT '社群昵称',
  `email` varchar(255) NOT NULL,
  `eth` varchar(255) NOT NULL,
  `source` varchar(255) DEFAULT NULL COMMENT '来源',
  `request_time` datetime DEFAULT NULL COMMENT '抢占时间',
  `created_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of node
-- ----------------------------
INSERT INTO `node` VALUES ('1', '123', '213123.com', 'dsadsaewq321321', null, '2018-10-31 21:51:55', '2018-10-31 21:51:55');
INSERT INTO `node` VALUES ('8', '2313', '21312@3.com', 'dsadsa2ewq321321', '', '2018-10-31 22:21:03', '2018-10-31 22:21:03');
INSERT INTO `node` VALUES ('9', '2313', '213212@3.com', 'dsadsa222ewq321321', null, '2018-10-31 22:44:40', '2018-10-31 22:44:40');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `invite_mobile` varchar(20) NOT NULL COMMENT '邀请人手机',
  `username` varchar(50) NOT NULL COMMENT '账号',
  `display_name` varchar(50) DEFAULT NULL,
  `real_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `login_num` int(11) NOT NULL,
  `login_ip` varchar(40) DEFAULT NULL,
  `login_time` datetime DEFAULT NULL,
  `user_group` int(11) NOT NULL,
  `updated_by` varchar(40) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `status` smallint(6) NOT NULL,
  `email` varchar(255) NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 NOT NULL COMMENT '自动登录key',
  `password_hash` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '加密密码',
  `password_reset_token` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '重置密码token',
  `role` smallint(6) NOT NULL,
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `api_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user
-- ----------------------------

-- ----------------------------
-- Table structure for user_backend
-- ----------------------------
DROP TABLE IF EXISTS `user_backend`;
CREATE TABLE `user_backend` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL COMMENT '账号',
  `head_url` varchar(255) DEFAULT NULL COMMENT '头像',
  `display_name` varchar(50) DEFAULT NULL,
  `real_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `login_num` int(11) NOT NULL,
  `login_ip` varchar(40) DEFAULT NULL,
  `login_time` datetime DEFAULT NULL,
  `user_group` int(11) NOT NULL,
  `updated_by` varchar(40) NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` smallint(6) NOT NULL,
  `email` varchar(255) NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 NOT NULL COMMENT '自动登录key',
  `password_hash` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '加密密码',
  `password_reset_token` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '重置密码token',
  `role` smallint(6) NOT NULL,
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user_backend
-- ----------------------------
INSERT INTO `user_backend` VALUES ('1', 'superadmin', '/assets/3da61115/img/user2-160x160.jpg', '李白', 'superadmin', '372816a73d4984723b5606b579c1fe41', '', '0', '', '0000-00-00 00:00:00', '0', '管理员甲', '0000-00-00 00:00:00', '10', 'superadmin@admin.com', 'e3FX_xB9zC0ICa1ybXoPZW14JZDMID9G', '$2y$13$0xfVo63PPDzLhCWKT8mOOeR0O8SCni/ER1dxA1GxCHjEM0p1fmzGe', '', '0', '1498650661');
INSERT INTO `user_backend` VALUES ('2', 'test', 'http://chat.com/img/123.jpg', '测试', '', '', null, '0', null, null, '0', '', '0000-00-00 00:00:00', '10', 'test@qq.com', 'PHA8NjRFeCCcDBl25YH0mB8dClT-Bncl', '$2y$13$RVd./v8lZq77Ey68cjLLh.Wgo8g2fZ0caL3RsaGK0YmM0gvztINEa', null, '0', '1542346674');
INSERT INTO `user_backend` VALUES ('3', 'luohao', 'http://chat.com/img/28dfbfef890719d3002f73613562a783_1.jpg', '罗豪', '', '', '', '0', '', '0000-00-00 00:00:00', '0', '', '0000-00-00 00:00:00', '10', 'test@qq.com', 'PHA8NjRFeCCcDBl25YH0mB8dClT-Bncl', '$2y$13$RVd./v8lZq77Ey68cjLLh.Wgo8g2fZ0caL3RsaGK0YmM0gvztINEa', '', '0', '1542346674');
