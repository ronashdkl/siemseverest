-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2017 at 07:22 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siemseverest`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Accountant', 7, 1509431114),
('Admin', 2, 1509427205),
('Employee', 8, 1509431352),
('Employee', 9, 1509431374),
('Employee', 10, 1509431394),
('Employee', 11, 1509431431),
('Manager', 2, 1509427205),
('Programmer', 4, 1509429965),
('Programmer', 5, 1509430007),
('Programmer', 6, 1509430047),
('Team-Leader', 3, 1509429910);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `group_code` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`, `group_code`) VALUES
('/*', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('//*', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('//controller', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('//crud', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('//extension', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('//form', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('//index', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('//model', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('//module', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/asset/*', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/asset/compress', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/asset/template', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/cache/*', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/cache/flush', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/cache/flush-all', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/cache/flush-schema', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/cache/index', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/debug/*', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/debug/default/*', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/debug/default/db-explain', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/debug/default/download-mail', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/debug/default/index', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/debug/default/toolbar', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/debug/default/view', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/fixture/*', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/fixture/load', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/fixture/unload', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/gii/*', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/gii/default/*', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/gii/default/action', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/gii/default/diff', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/gii/default/index', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/gii/default/preview', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/gii/default/view', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/hello/*', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/hello/index', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/help/*', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/help/index', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/help/list', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/help/list-action-options', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/help/usage', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/message/*', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/message/config', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/message/config-template', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/message/extract', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/migrate/*', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/migrate/create', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/migrate/down', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/migrate/history', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/migrate/mark', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/migrate/new', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/migrate/redo', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/migrate/to', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/migrate/up', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/serve/*', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/serve/index', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/site/*', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/site/about', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/site/captcha', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/site/contact', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/site/error', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/site/index', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/site/login', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/site/logout', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/*', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/user-management/auth-item-group/*', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/auth-item-group/bulk-activate', 3, NULL, NULL, NULL, 1509424041, 1509424041, NULL),
('/user-management/auth-item-group/bulk-deactivate', 3, NULL, NULL, NULL, 1509424041, 1509424041, NULL),
('/user-management/auth-item-group/bulk-delete', 3, NULL, NULL, NULL, 1509424041, 1509424041, NULL),
('/user-management/auth-item-group/create', 3, NULL, NULL, NULL, 1509424041, 1509424041, NULL),
('/user-management/auth-item-group/delete', 3, NULL, NULL, NULL, 1509424041, 1509424041, NULL),
('/user-management/auth-item-group/grid-page-size', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/auth-item-group/grid-sort', 3, NULL, NULL, NULL, 1509424041, 1509424041, NULL),
('/user-management/auth-item-group/index', 3, NULL, NULL, NULL, 1509424041, 1509424041, NULL),
('/user-management/auth-item-group/toggle-attribute', 3, NULL, NULL, NULL, 1509424041, 1509424041, NULL),
('/user-management/auth-item-group/update', 3, NULL, NULL, NULL, 1509424041, 1509424041, NULL),
('/user-management/auth-item-group/view', 3, NULL, NULL, NULL, 1509424041, 1509424041, NULL),
('/user-management/auth/*', 3, NULL, NULL, NULL, 1509424041, 1509424041, NULL),
('/user-management/auth/captcha', 3, NULL, NULL, NULL, 1509424041, 1509424041, NULL),
('/user-management/auth/change-own-password', 3, NULL, NULL, NULL, 1509423037, 1509423037, NULL),
('/user-management/auth/confirm-email', 3, NULL, NULL, NULL, 1509424041, 1509424041, NULL),
('/user-management/auth/confirm-email-receive', 3, NULL, NULL, NULL, 1509424041, 1509424041, NULL),
('/user-management/auth/confirm-registration-email', 3, NULL, NULL, NULL, 1509424041, 1509424041, NULL),
('/user-management/auth/login', 3, NULL, NULL, NULL, 1509424041, 1509424041, NULL),
('/user-management/auth/logout', 3, NULL, NULL, NULL, 1509424041, 1509424041, NULL),
('/user-management/auth/password-recovery', 3, NULL, NULL, NULL, 1509424041, 1509424041, NULL),
('/user-management/auth/password-recovery-receive', 3, NULL, NULL, NULL, 1509424041, 1509424041, NULL),
('/user-management/auth/registration', 3, NULL, NULL, NULL, 1509424041, 1509424041, NULL),
('/user-management/permission/*', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/permission/bulk-activate', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/permission/bulk-deactivate', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/permission/bulk-delete', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/permission/create', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/permission/delete', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/permission/grid-page-size', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/permission/grid-sort', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/permission/index', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/permission/refresh-routes', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/permission/set-child-permissions', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/permission/set-child-routes', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/permission/toggle-attribute', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/permission/update', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/permission/view', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/role/*', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/role/bulk-activate', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/role/bulk-deactivate', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/role/bulk-delete', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/role/create', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/role/delete', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/role/grid-page-size', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/role/grid-sort', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/role/index', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/role/set-child-permissions', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/role/set-child-roles', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/role/toggle-attribute', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/role/update', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/role/view', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/user-permission/*', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/user-permission/set', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/user-management/user-permission/set-roles', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/user-management/user-visit-log/*', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/user-visit-log/bulk-activate', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/user-visit-log/bulk-deactivate', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/user-visit-log/bulk-delete', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/user-visit-log/create', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/user-visit-log/delete', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/user-visit-log/grid-page-size', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/user-visit-log/grid-sort', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/user-visit-log/index', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/user-visit-log/toggle-attribute', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/user-visit-log/update', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/user-visit-log/view', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/user/*', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/user/bulk-activate', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/user-management/user/bulk-deactivate', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/user-management/user/bulk-delete', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/user-management/user/change-password', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/user-management/user/create', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/user-management/user/delete', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/user-management/user/grid-page-size', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/user-management/user/grid-sort', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/user/index', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/user-management/user/toggle-attribute', 3, NULL, NULL, NULL, 1509424040, 1509424040, NULL),
('/user-management/user/update', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('/user-management/user/view', 3, NULL, NULL, NULL, 1509423036, 1509423036, NULL),
('Accountant', 1, 'Accountant', NULL, NULL, 1509423997, 1509423997, NULL),
('Admin', 1, 'Admin', NULL, NULL, 1509423036, 1509423036, NULL),
('assignRolesToUsers', 2, 'Assign roles to users', NULL, NULL, 1509423036, 1509423036, 'userManagement'),
('bindUserToIp', 2, 'Bind user to IP', NULL, NULL, 1509423036, 1509423036, 'userManagement'),
('changeOwnPassword', 2, 'Change own password', NULL, NULL, 1509423037, 1509423037, 'userCommonPermissions'),
('changeUserPassword', 2, 'Change user password', NULL, NULL, 1509423036, 1509423036, 'userManagement'),
('commonPermission', 2, 'Common permission', NULL, NULL, 1509423035, 1509423035, NULL),
('createUsers', 2, 'Create users', NULL, NULL, 1509423036, 1509423036, 'userManagement'),
('deleteUsers', 2, 'Delete users', NULL, NULL, 1509423036, 1509423036, 'userManagement'),
('editUserEmail', 2, 'Edit user email', NULL, NULL, 1509423036, 1509423036, 'userManagement'),
('editUsers', 2, 'Edit users', NULL, NULL, 1509423036, 1509423036, 'userManagement'),
('Employee', 1, 'Employee', NULL, NULL, 1509431241, 1509431241, NULL),
('Manager', 1, 'Manager', NULL, NULL, 1509424275, 1509424275, NULL),
('Programmer', 1, 'Programmer', NULL, NULL, 1509424217, 1509424217, NULL),
('Team-Leader', 1, 'Team Leader', NULL, NULL, 1509429868, 1509429868, NULL),
('viewRegistrationIp', 2, 'View registration IP', NULL, NULL, 1509423036, 1509423036, 'userManagement'),
('viewUserEmail', 2, 'View user email', NULL, NULL, 1509423036, 1509423036, 'userManagement'),
('viewUserRoles', 2, 'View user roles', NULL, NULL, 1509423036, 1509423036, 'userManagement'),
('viewUsers', 2, 'View users', NULL, NULL, 1509423036, 1509423036, 'userManagement'),
('viewVisitLog', 2, 'View visit log', NULL, NULL, 1509423036, 1509423036, 'userManagement');

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Accountant', 'changeOwnPassword'),
('Accountant', 'viewUserEmail'),
('Admin', 'assignRolesToUsers'),
('Admin', 'changeOwnPassword'),
('Admin', 'changeUserPassword'),
('Admin', 'createUsers'),
('Admin', 'deleteUsers'),
('Admin', 'editUsers'),
('Admin', 'viewUsers'),
('assignRolesToUsers', '/user-management/user-permission/set'),
('assignRolesToUsers', '/user-management/user-permission/set-roles'),
('assignRolesToUsers', 'viewUserRoles'),
('assignRolesToUsers', 'viewUsers'),
('changeOwnPassword', '/user-management/auth/change-own-password'),
('changeUserPassword', '/user-management/user/change-password'),
('changeUserPassword', 'viewUsers'),
('commonPermission', 'changeOwnPassword'),
('createUsers', '/user-management/user/create'),
('createUsers', 'viewUsers'),
('deleteUsers', '/user-management/user/bulk-delete'),
('deleteUsers', '/user-management/user/delete'),
('deleteUsers', 'viewUsers'),
('editUserEmail', 'viewUserEmail'),
('editUsers', '/user-management/user/bulk-activate'),
('editUsers', '/user-management/user/bulk-deactivate'),
('editUsers', '/user-management/user/update'),
('editUsers', 'viewUsers'),
('Employee', 'changeOwnPassword'),
('Employee', 'viewUsers'),
('Employee', 'viewVisitLog'),
('Manager', 'Accountant'),
('Manager', 'Admin'),
('Manager', 'bindUserToIp'),
('Manager', 'editUserEmail'),
('Manager', 'Programmer'),
('Manager', 'viewRegistrationIp'),
('Programmer', 'changeOwnPassword'),
('Programmer', 'viewVisitLog'),
('Team-Leader', 'changeOwnPassword'),
('Team-Leader', 'Programmer'),
('Team-Leader', 'viewUserEmail'),
('Team-Leader', 'viewUsers'),
('Team-Leader', 'viewVisitLog'),
('viewUsers', '/user-management/user/grid-page-size'),
('viewUsers', '/user-management/user/index'),
('viewUsers', '/user-management/user/view');

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_group`
--

CREATE TABLE `auth_item_group` (
  `code` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_item_group`
--

INSERT INTO `auth_item_group` (`code`, `name`, `created_at`, `updated_at`) VALUES
('userCommonPermissions', 'User common permission', 1509423036, 1509423036),
('userManagement', 'User management', 1509423036, 1509423036);

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `job_type` varchar(200) NOT NULL,
  `job_post` varchar(200) NOT NULL,
  `sallery` double NOT NULL,
  `citizenship_number` varchar(200) NOT NULL,
  `image` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `user_id`, `first_name`, `last_name`, `address`, `contact`, `job_type`, `job_post`, `sallery`, `citizenship_number`, `image`, `status`) VALUES
(1, 2, 'Ronash', 'Dhakal', 'Changunarayan-2, Bhaktapur, Nepal', '9851219115', 'Permanent', 'Manager', 30000, '21353267236', 'https://scontent.fktm3-1.fna.fbcdn.net/v/t1.0-9/20638387_1539284199425526_1631190336996143153_n.jpg?oh=59182bcf1f9e0478ff42ce64756a16fd&oe=5A6EE632', 1),
(2, 3, 'Govind', 'Baral', 'Gathaghar', '9841131037', 'Permanent', 'Team Leader', 30000, '34653568', 'https://scontent.fktm3-1.fna.fbcdn.net/v/t1.0-9/561054_4000870820625_319986412_n.jpg?oh=f4d9c42674d9c562ca945858a0647681&oe=5AAB3AE2', 1),
(3, 4, 'Juddha Raj', 'Neupane', 'Sallaghari', '9848099244', 'Contract', 'Programmer', 30000, '32429', 'https://scontent.fktm3-1.fna.fbcdn.net/v/t1.0-9/22140895_1584088938338849_6208402969784372633_n.jpg?oh=57b0c6f9d0641b8702a5eb7715c667d3&oe=5A70CAD9', 1),
(4, 5, 'Bipin', 'Pandey', 'Pulchowk, Kathmandu', '9846090617', 'Provision', 'Programmer', 30000, '431017/292', 'https://scontent.fktm3-1.fna.fbcdn.net/v/t1.0-9/19059038_1060085370791084_7208413769108948510_n.jpg?oh=1a3783565e4fd79635d51302b232b91f&oe=5A6ECB69', 1),
(5, 6, 'Aabhushan', 'Gautam', 'Kapan, Kathmandu', '9861551591', 'Contract', 'Internship', 20000, '27-01-71-07210', 'https://scontent.fktm3-1.fna.fbcdn.net/v/t1.0-9/22853327_1499587503430313_5887538937610731082_n.jpg?oh=2b8de483dca287bf77a43052816bf9ef&oe=5A675010', 1),
(6, 7, 'Mukesh', 'Pandey', 'Kapan, Kathmandu', '9849708099', 'Permanent', 'Accountant', 5000, '123456789', 'https://scontent.fktm3-1.fna.fbcdn.net/v/t1.0-9/22853157_1978968598796277_3361759399033477340_n.jpg?oh=f73cd173928ada45908e9733db14481a&oe=5AA7CE7E', 1),
(7, 8, 'Renu', 'Dhakal', 'Changunarayan-2, Bhaktapur, Nepal', '9841580002', 'Permanent', 'Office Assistance', 20000, '123456789', 'https://scontent.fktm3-1.fna.fbcdn.net/v/t1.0-9/21743399_1448283371888063_7406596548859357926_n.jpg?oh=842a96b9b57176f0627901ff2066b26d&oe=5A781A79', 1),
(8, 9, 'Lokesh', 'Dhakal', 'Malmo, Sweden', '47623008522', 'Permanent', 'C.E.O', 30000, '12345667890', 'https://scontent.fktm3-1.fna.fbcdn.net/v/t1.0-9/21151332_1897219790304421_5202034321394373576_n.jpg?oh=007de449beaaa397a173a72fbb4ab227&oe=5A716371', 1),
(9, 10, 'Suraj', 'Baral', 'Malmo, Sweden', '47623008522', 'Permanent', 'Programmer', 30000, '123456897', 'https://scontent.fktm3-1.fna.fbcdn.net/v/t1.0-9/19366337_10154941610574032_6075203468646540578_n.jpg?oh=e409eed4f1cf6ecf3b3755a6bf2e7f14&oe=5AA51702', 1),
(10, 11, 'Shanta', 'Timsina', 'Changunarayan-2, Bhaktapur, Nepal', '9840062014', 'Contract', 'Office Assistance', 25000, '1234567890', 'https://scontent.fktm3-1.fna.fbcdn.net/v/t1.0-9/22405744_494948240883320_3988605393440685544_n.jpg?oh=0b0a25cc7a86aaf09626ad382987ca95&oe=5A797DE5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1509423030),
('m140608_173539_create_user_table', 1509423033),
('m140611_133903_init_rbac', 1509423033),
('m140808_073114_create_auth_item_group_table', 1509423033),
('m140809_072112_insert_superadmin_to_user', 1509423035),
('m140809_073114_insert_common_permisison_to_auth_item', 1509423035),
('m141023_141535_create_user_visit_log', 1509423035),
('m141116_115804_add_bind_to_ip_and_registration_ip_to_user', 1509423036),
('m141121_194858_split_browser_and_os_column', 1509423036),
('m141201_220516_add_email_and_email_confirmed_to_user', 1509423036),
('m141207_001649_create_basic_user_permissions', 1509423037);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `confirmation_token` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `superadmin` smallint(6) DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `registration_ip` varchar(15) DEFAULT NULL,
  `bind_to_ip` varchar(255) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `email_confirmed` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `confirmation_token`, `status`, `superadmin`, `created_at`, `updated_at`, `registration_ip`, `bind_to_ip`, `email`, `email_confirmed`) VALUES
(1, 'superadmin', 'Bu1I0J3UIQeg8Fxvpye8dAl2Z5HDn80b', '$2y$13$Q7hkB1eqSVWQY2zKDp4.ee/F1Ujh4D4nwv5vAvaIKaEo2Bseac0yC', 'PA9WLrLpzJ0AabLNzJOnKVPvsb8ZsF0Q_1509425684', 1, 1, 1509423035, 1509427229, NULL, '', 'rdh@siemseverest.com', 1),
(2, 'ronash', 'wUKGhHrB2dyTM8q9Job_acJAyEyk3TV8', '$2y$13$4URfkvRaXlkGpCUahoz2V.Qy7RBxooabdqNVybnqG9UalrJJG7Any', NULL, 1, 0, 1509426987, 1509427290, '::1', '', 'ronash@outlook.com', 1),
(3, 'govind', '3G_TUHKQ2TnZOG7C3jEND1N_BMRI9oDa', '$2y$13$4RBTvObohXX2njkBdqF9MuN6jHLJmlwtEPSsUfrimwFbcOIQqeIwS', NULL, 1, 0, 1509429823, 1509429823, '::1', '', 'gba@siemseverest.com', 1),
(4, 'juddha', 'OfWiUq2vsFJQfY5zpBWPrWvsdUCuuRZ5', '$2y$13$DA2EnJ00UKMyrWnGLR7mrOOoFQBttHOUVzCz51aFqgYHIXAljlkx6', NULL, 1, 0, 1509429961, 1509429961, '::1', '', '', 0),
(5, 'bipin', 'jlfxRQi5GZCqwGdFQF3Yf5a9d6ksQSrH', '$2y$13$rSRsduhZEsmBGaGsZRNMWefLVaXkVzc8m/Uj0ohZy4H/5d2s3xW5a', NULL, 1, 0, 1509429987, 1509429993, '::1', '', 'bpa@siemseverest.com', 1),
(6, 'aabhushan', 'VXf-EHaVMJoG9UWUkpq15Z-UlQ-xjycZ', '$2y$13$lhI9mNVx5JOl9RpExzrGOOKiwstspMTADKbMEerCFl7aQABp0Zgsa', NULL, 1, 0, 1509430038, 1509430038, '::1', '', 'aba@siemseverest.com', 1),
(7, 'mukesh', 'P1qAdVL5SvGDKrjK7PDg_aeKUgr5kcnb', '$2y$13$sU4DJ.e.OMZU/x/24LW0veMO2zOWRKIYgvEDToZ6heJPW7EcGidbu', NULL, 1, 0, 1509431080, 1509431080, '::1', '', '', 1),
(8, 'renu', 'IZQqc_5jDu-3Nyd264mrK94-lrcnB4Fx', '$2y$13$yB3NW6eSNaBktO9BHsYGKe5HF0sejzmjSHnFwMKY8zRTpFmFqE2p2', NULL, 1, 0, 1509431347, 1509431347, '::1', '', '', 0),
(9, 'lokesh', 'l6AzT3U7cyKbirTKjdINMDVi-Os-LQL3', '$2y$13$62f4ziGX8tlVYUGBtpLJ5.DAVfWLorHnIBCCsjf9kbSnO8ced40.K', NULL, 1, 0, 1509431368, 1509431368, '::1', '', '', 1),
(10, 'suraj', 'odSUQbenualP5KF1jRwlxYPhE3ETteQf', '$2y$13$xeOKwEQBVxh/VVpjyXpQ2.Q/v/44SUX8932fdmljFq/R.Y5vpG0JO', NULL, 1, 0, 1509431389, 1509431389, '::1', '', '', 1),
(11, 'shanta', '6dGb36R3SE3NRGDagiDgimVJ8jcS2eYF', '$2y$13$YT77AACprRkfKXS.YyWWWOtQtAIPHs4HW0wRFXbQgbtg88KD1UwNS', NULL, 1, 0, 1509431427, 1509431427, '::1', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_visit_log`
--

CREATE TABLE `user_visit_log` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `language` char(2) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `visit_time` int(11) NOT NULL,
  `browser` varchar(30) DEFAULT NULL,
  `os` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_visit_log`
--

INSERT INTO `user_visit_log` (`id`, `token`, `ip`, `language`, `user_agent`, `user_id`, `visit_time`, `browser`, `os`) VALUES
(1, '59f7f9ec33d19', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1509423596, 'Chrome', 'Windows'),
(2, '59f7fa6c42037', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1509423724, 'Chrome', 'Windows'),
(3, '59f7fa7836a79', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1509423736, 'Chrome', 'Windows'),
(4, '59f7fb482869f', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1509423944, 'Chrome', 'Windows'),
(6, '59f7fddd61fb4', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1509424605, 'Chrome', 'Windows'),
(7, '59f8036a63bd3', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1509426026, 'Chrome', 'Windows'),
(8, '59f8056b9ca9f', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1509426539, 'Chrome', 'Windows'),
(9, '59f80575e081a', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1509426549, 'Chrome', 'Windows'),
(10, '59f8072b1cc68', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 2, 1509426987, 'Chrome', 'Windows'),
(11, '59f807ed6fa2b', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1509427181, 'Chrome', 'Windows'),
(12, '59f810221ac61', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1509429282, 'Chrome', 'Windows'),
(13, '59f810fd6d64d', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1509429501, 'Chrome', 'Windows'),
(14, '59f8118977a98', '::1', 'en', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1, 1509429641, 'Chrome', 'Windows');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` double NOT NULL,
  `paid_to` int(200) NOT NULL,
  `account_of` varchar(200) NOT NULL,
  `has_received` varchar(100) NOT NULL,
  `accountant` int(11) NOT NULL,
  `approved_by` int(11) NOT NULL,
  `information` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id`, `date`, `amount`, `paid_to`, `account_of`, `has_received`, `accountant`, `approved_by`, `information`) VALUES
(1, '2017-10-31', 29700, 3, '', '0', 6, 1, 'monthly salary'),
(2, '2017-10-31', 29700, 4, '', '1', 6, 1, 'monthly salary'),
(3, '2017-10-31', 29700, 2, '', '0', 6, 1, 'monthly salary'),
(4, '2017-10-31', 29700, 9, '', '0', 6, 1, 'monthly salary'),
(5, '2017-10-31', 29700, 8, '', '0', 6, 1, 'monthly salary'),
(6, '2017-10-31', 29700, 1, '', '0', 6, 1, 'monthly salary'),
(7, '2017-10-31', 19800, 5, '', '0', 6, 1, 'monthly salary'),
(8, '2017-10-31', 19800, 7, '', '0', 6, 1, 'Monthly Salary'),
(9, '2017-10-31', 4950, 6, '', '0', 6, 1, 'monthly salary'),
(10, '2017-11-03', 25000, 10, '', '1', 6, 1, 'Furniture ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`),
  ADD KEY `fk_auth_item_group_code` (`group_code`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_item_group`
--
ALTER TABLE `auth_item_group`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_visit_log`
--
ALTER TABLE `user_visit_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accountant` (`accountant`),
  ADD KEY `approved_by` (`approved_by`),
  ADD KEY `paid_to` (`paid_to`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_visit_log`
--
ALTER TABLE `user_visit_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_assignment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_auth_item_group_code` FOREIGN KEY (`group_code`) REFERENCES `auth_item_group` (`code`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_visit_log`
--
ALTER TABLE `user_visit_log`
  ADD CONSTRAINT `user_visit_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `voucher`
--
ALTER TABLE `voucher`
  ADD CONSTRAINT `voucher_ibfk_1` FOREIGN KEY (`accountant`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `voucher_ibfk_2` FOREIGN KEY (`approved_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
