-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 20, 2019 at 06:25 AM
-- Server version: 10.3.18-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ali_crypto`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `login_time` datetime DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `mobile`, `image`, `status`, `login_time`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jhon Doe', 'admin', 'admin@gmail.com', '8801825683631', 'admin_1538903120.jpg', 1, '2018-05-04 14:36:07', '$2y$10$xHb/yjfvD.tLiMtlF.11VOP/CfgL4NZT4yagIRn.ByQfHOao.gzKW', 'fP62Qf1Of1H51bNUCK96XXXGNq2gziDXF5Ii9qzsXeZkfaCzLMB04PLsHl3M', '2018-03-25 18:08:23', '2018-10-06 15:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `apps_countries`
--

CREATE TABLE `apps_countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apps_countries`
--

INSERT INTO `apps_countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CD', 'Democratic Republic of the Congo'),
(50, 'CG', 'Republic of Congo'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'HR', 'Croatia (Hrvatska)'),
(54, 'CU', 'Cuba'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DK', 'Denmark'),
(58, 'DJ', 'Djibouti'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'TP', 'East Timor'),
(62, 'EC', 'Ecuador'),
(63, 'EG', 'Egypt'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Equatorial Guinea'),
(66, 'ER', 'Eritrea'),
(67, 'EE', 'Estonia'),
(68, 'ET', 'Ethiopia'),
(69, 'FK', 'Falkland Islands (Malvinas)'),
(70, 'FO', 'Faroe Islands'),
(71, 'FJ', 'Fiji'),
(72, 'FI', 'Finland'),
(73, 'FR', 'France'),
(74, 'FX', 'France, Metropolitan'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern Territories'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GK', 'Guernsey'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'GN', 'Guinea'),
(92, 'GW', 'Guinea-Bissau'),
(93, 'GY', 'Guyana'),
(94, 'HT', 'Haiti'),
(95, 'HM', 'Heard and Mc Donald Islands'),
(96, 'HN', 'Honduras'),
(97, 'HK', 'Hong Kong'),
(98, 'HU', 'Hungary'),
(99, 'IS', 'Iceland'),
(100, 'IN', 'India'),
(101, 'IM', 'Isle of Man'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran (Islamic Republic of)'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'CI', 'Ivory Coast'),
(109, 'JE', 'Jersey'),
(110, 'JM', 'Jamaica'),
(111, 'JP', 'Japan'),
(112, 'JO', 'Jordan'),
(113, 'KZ', 'Kazakhstan'),
(114, 'KE', 'Kenya'),
(115, 'KI', 'Kiribati'),
(116, 'KP', 'Korea, Democratic People\'s Republic of'),
(117, 'KR', 'Korea, Republic of'),
(118, 'XK', 'Kosovo'),
(119, 'KW', 'Kuwait'),
(120, 'KG', 'Kyrgyzstan'),
(121, 'LA', 'Lao People\'s Democratic Republic'),
(122, 'LV', 'Latvia'),
(123, 'LB', 'Lebanon'),
(124, 'LS', 'Lesotho'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libyan Arab Jamahiriya'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lithuania'),
(129, 'LU', 'Luxembourg'),
(130, 'MO', 'Macau'),
(131, 'MK', 'North Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MW', 'Malawi'),
(134, 'MY', 'Malaysia'),
(135, 'MV', 'Maldives'),
(136, 'ML', 'Mali'),
(137, 'MT', 'Malta'),
(138, 'MH', 'Marshall Islands'),
(139, 'MQ', 'Martinique'),
(140, 'MR', 'Mauritania'),
(141, 'MU', 'Mauritius'),
(142, 'TY', 'Mayotte'),
(143, 'MX', 'Mexico'),
(144, 'FM', 'Micronesia, Federated States of'),
(145, 'MD', 'Moldova, Republic of'),
(146, 'MC', 'Monaco'),
(147, 'MN', 'Mongolia'),
(148, 'ME', 'Montenegro'),
(149, 'MS', 'Montserrat'),
(150, 'MA', 'Morocco'),
(151, 'MZ', 'Mozambique'),
(152, 'MM', 'Myanmar'),
(153, 'NA', 'Namibia'),
(154, 'NR', 'Nauru'),
(155, 'NP', 'Nepal'),
(156, 'NL', 'Netherlands'),
(157, 'AN', 'Netherlands Antilles'),
(158, 'NC', 'New Caledonia'),
(159, 'NZ', 'New Zealand'),
(160, 'NI', 'Nicaragua'),
(161, 'NE', 'Niger'),
(162, 'NG', 'Nigeria'),
(163, 'NU', 'Niue'),
(164, 'NF', 'Norfolk Island'),
(165, 'MP', 'Northern Mariana Islands'),
(166, 'NO', 'Norway'),
(167, 'OM', 'Oman'),
(168, 'PK', 'Pakistan'),
(169, 'PW', 'Palau'),
(170, 'PS', 'Palestine'),
(171, 'PA', 'Panama'),
(172, 'PG', 'Papua New Guinea'),
(173, 'PY', 'Paraguay'),
(174, 'PE', 'Peru'),
(175, 'PH', 'Philippines'),
(176, 'PN', 'Pitcairn'),
(177, 'PL', 'Poland'),
(178, 'PT', 'Portugal'),
(179, 'PR', 'Puerto Rico'),
(180, 'QA', 'Qatar'),
(181, 'RE', 'Reunion'),
(182, 'RO', 'Romania'),
(183, 'RU', 'Russian Federation'),
(184, 'RW', 'Rwanda'),
(185, 'KN', 'Saint Kitts and Nevis'),
(186, 'LC', 'Saint Lucia'),
(187, 'VC', 'Saint Vincent and the Grenadines'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'Sao Tome and Principe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SK', 'Slovakia'),
(198, 'SI', 'Slovenia'),
(199, 'SB', 'Solomon Islands'),
(200, 'SO', 'Somalia'),
(201, 'ZA', 'South Africa'),
(202, 'GS', 'South Georgia South Sandwich Islands'),
(203, 'SS', 'South Sudan'),
(204, 'ES', 'Spain'),
(205, 'LK', 'Sri Lanka'),
(206, 'SH', 'St. Helena'),
(207, 'PM', 'St. Pierre and Miquelon'),
(208, 'SD', 'Sudan'),
(209, 'SR', 'Suriname'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands'),
(211, 'SZ', 'Swaziland'),
(212, 'SE', 'Sweden'),
(213, 'CH', 'Switzerland'),
(214, 'SY', 'Syrian Arab Republic'),
(215, 'TW', 'Taiwan'),
(216, 'TJ', 'Tajikistan'),
(217, 'TZ', 'Tanzania, United Republic of'),
(218, 'TH', 'Thailand'),
(219, 'TG', 'Togo'),
(220, 'TK', 'Tokelau'),
(221, 'TO', 'Tonga'),
(222, 'TT', 'Trinidad and Tobago'),
(223, 'TN', 'Tunisia'),
(224, 'TR', 'Turkey'),
(225, 'TM', 'Turkmenistan'),
(226, 'TC', 'Turks and Caicos Islands'),
(227, 'TV', 'Tuvalu'),
(228, 'UG', 'Uganda'),
(229, 'UA', 'Ukraine'),
(230, 'AE', 'United Arab Emirates'),
(231, 'GB', 'United Kingdom'),
(232, 'US', 'United States'),
(233, 'UM', 'United States minor outlying islands'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VU', 'Vanuatu'),
(237, 'VA', 'Vatican City State'),
(238, 'VE', 'Venezuela'),
(239, 'VN', 'Vietnam'),
(240, 'VG', 'Virgin Islands (British)'),
(241, 'VI', 'Virgin Islands (U.S.)'),
(242, 'WF', 'Wallis and Futuna Islands'),
(243, 'EH', 'Western Sahara'),
(244, 'YE', 'Yemen'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `basic_settings`
--

CREATE TABLE `basic_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `sitename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_sym` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration` tinyint(1) NOT NULL DEFAULT 0,
  `email_verification` tinyint(1) NOT NULL DEFAULT 0,
  `sms_verification` tinyint(1) NOT NULL DEFAULT 0,
  `email_notification` tinyint(1) NOT NULL DEFAULT 0,
  `sms_notification` tinyint(4) NOT NULL DEFAULT 0,
  `level_one` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_two` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_three` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_limit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `sending_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `decimal` int(2) NOT NULL,
  `cron` tinyint(4) NOT NULL DEFAULT 0,
  `map_api` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` tinyint(4) NOT NULL DEFAULT 0,
  `refcom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `about` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacy` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section1_heading` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section1_para` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mentor_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mentor_para` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_para` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payout_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payout_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buy_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sell_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `release_date` timestamp NULL DEFAULT NULL,
  `counter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `basic_settings`
--

INSERT INTO `basic_settings` (`id`, `sitename`, `color`, `phone`, `email`, `address`, `currency`, `currency_sym`, `registration`, `email_verification`, `sms_verification`, `email_notification`, `sms_notification`, `level_one`, `level_two`, `level_three`, `btc_limit`, `sending_charge`, `decimal`, `cron`, `map_api`, `location`, `refcom`, `about`, `about_title`, `about_video`, `fb_comment`, `terms`, `privacy`, `rate`, `section1_heading`, `section1_para`, `copyright`, `mentor_heading`, `mentor_para`, `service_heading`, `service_para`, `payout_title`, `payout_details`, `buy_title`, `sell_title`, `release_date`, `counter`, `created_at`, `updated_at`) VALUES
(1, 'Exchangeo', '1e98ff', '+8801234567890', 'do-not-reply@thesoftking.com', 'Company Location, Country', 'DCO', 'DCO', 1, 1, 0, 1, 0, '3', '2', '1', '3', '40', 2, 0, 'AIzaSyDi-rrw9lb-uKY1vHd9gkzuBpj4-hiBsUA', 0, '0', '<span style=\"color: rgb(128, 128, 163); font-family: Poppins, sans-serif; font-size: 16px; text-align: center;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</span>', 'Exchange All You Need To Know About Rexchange', 'https://www.youtube.com/watch?v=pHGGNPMPz3M', '<div id=\"fb-root\"></div>\r\n<script>\r\n    (function(d, s, id) {\r\n        var js, fjs = d.getElementsByTagName(s)[0];\r\n        if (d.getElementById(id)) return;\r\n        js = d.createElement(s); js.id = id;\r\n        js.src = \'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12&appId=205856110142667&autoLogAppEvents=1\';\r\n        fjs.parentNode.insertBefore(js, fjs);\r\n    }(document, \'script\', \'facebook-jssdk\'));\r\n</script>', '<h2 style=\"margin-bottom: 20px; font-family: Poppins, sans-serif; color: rgb(25, 25, 75); font-size: 60px; text-align: center;\">Terms of use</h2><p style=\"margin-bottom: 42px; line-height: 1.6; font-size: 16px; color: rgb(128, 128, 163); font-family: Poppins, sans-serif; text-align: center;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p><h3 style=\"margin-bottom: 16px; font-family: Poppins, sans-serif; color: rgb(25, 25, 75); font-size: 30px; text-align: center;\">Enforcement &amp; Amendments</h3><p style=\"margin-bottom: 42px; line-height: 1.6; font-size: 16px; color: rgb(128, 128, 163); font-family: Poppins, sans-serif; text-align: center;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p><h3 style=\"margin-bottom: 16px; font-family: Poppins, sans-serif; color: rgb(25, 25, 75); font-size: 30px; text-align: center;\">Provided Services</h3><p style=\"margin-bottom: 42px; line-height: 1.6; font-size: 16px; color: rgb(128, 128, 163); font-family: Poppins, sans-serif; text-align: center;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p><p style=\"margin-bottom: 42px; line-height: 1.6; font-size: 16px; color: rgb(128, 128, 163); font-family: Poppins, sans-serif; text-align: center;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p><p style=\"margin-bottom: 42px; line-height: 1.6; font-size: 16px; color: rgb(128, 128, 163); font-family: Poppins, sans-serif; text-align: center;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p><h3 style=\"margin-bottom: 16px; font-family: Poppins, sans-serif; color: rgb(25, 25, 75); font-size: 30px; text-align: center;\">Eligibility</h3><p style=\"margin-bottom: 42px; line-height: 1.6; font-size: 16px; color: rgb(128, 128, 163); font-family: Poppins, sans-serif; text-align: center;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p><p style=\"margin-bottom: 42px; line-height: 1.6; font-size: 16px; color: rgb(128, 128, 163); font-family: Poppins, sans-serif; text-align: center;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p><p style=\"margin-bottom: 42px; line-height: 1.6; font-size: 16px; color: rgb(128, 128, 163); font-family: Poppins, sans-serif; text-align: center;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p><h3 style=\"margin-bottom: 16px; font-family: Poppins, sans-serif; color: rgb(25, 25, 75); font-size: 30px; text-align: center;\">Termination of the Terms</h3><p style=\"margin-bottom: 42px; line-height: 1.6; font-size: 16px; color: rgb(128, 128, 163); font-family: Poppins, sans-serif; text-align: center;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p><p style=\"margin-bottom: 42px; line-height: 1.6; font-size: 16px; color: rgb(128, 128, 163); font-family: Poppins, sans-serif; text-align: center;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p><p style=\"margin-bottom: 42px; line-height: 1.6; font-size: 16px; color: rgb(128, 128, 163); font-family: Poppins, sans-serif; text-align: center;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>', '<h2 style=\"margin-bottom: 20px; font-family: Poppins, sans-serif; color: rgb(25, 25, 75); font-size: 60px; text-align: center;\">Privacy &amp;Policy</h2><p style=\"margin-bottom: 42px; line-height: 1.6; font-size: 16px; color: rgb(128, 128, 163); font-family: Poppins, sans-serif; text-align: center;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p><h3 style=\"margin-bottom: 16px; font-family: Poppins, sans-serif; color: rgb(25, 25, 75); font-size: 30px; text-align: center;\">Enforcement &amp; Amendments</h3><p style=\"margin-bottom: 42px; line-height: 1.6; font-size: 16px; color: rgb(128, 128, 163); font-family: Poppins, sans-serif; text-align: center;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p><h3 style=\"margin-bottom: 16px; font-family: Poppins, sans-serif; color: rgb(25, 25, 75); font-size: 30px; text-align: center;\">Provided Services</h3><p style=\"margin-bottom: 42px; line-height: 1.6; font-size: 16px; color: rgb(128, 128, 163); font-family: Poppins, sans-serif; text-align: center;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p><p style=\"margin-bottom: 42px; line-height: 1.6; font-size: 16px; color: rgb(128, 128, 163); font-family: Poppins, sans-serif; text-align: center;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p><p style=\"margin-bottom: 42px; line-height: 1.6; font-size: 16px; color: rgb(128, 128, 163); font-family: Poppins, sans-serif; text-align: center;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p><h3 style=\"margin-bottom: 16px; font-family: Poppins, sans-serif; color: rgb(25, 25, 75); font-size: 30px; text-align: center;\">Eligibility</h3><p style=\"margin-bottom: 42px; line-height: 1.6; font-size: 16px; color: rgb(128, 128, 163); font-family: Poppins, sans-serif; text-align: center;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p><p style=\"margin-bottom: 42px; line-height: 1.6; font-size: 16px; color: rgb(128, 128, 163); font-family: Poppins, sans-serif; text-align: center;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p><p style=\"margin-bottom: 42px; line-height: 1.6; font-size: 16px; color: rgb(128, 128, 163); font-family: Poppins, sans-serif; text-align: center;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p><h3 style=\"margin-bottom: 16px; font-family: Poppins, sans-serif; color: rgb(25, 25, 75); font-size: 30px; text-align: center;\">Termination of the Policy</h3><p style=\"margin-bottom: 42px; line-height: 1.6; font-size: 16px; color: rgb(128, 128, 163); font-family: Poppins, sans-serif; text-align: center;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p><p style=\"margin-bottom: 42px; line-height: 1.6; font-size: 16px; color: rgb(128, 128, 163); font-family: Poppins, sans-serif; text-align: center;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p><p style=\"margin-bottom: 42px; line-height: 1.6; font-size: 16px; color: rgb(128, 128, 163); font-family: Poppins, sans-serif; text-align: center;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>', '1', 'Exchange CryptoCurrency', 'Transfer from one wallet to another within seconds. It\'s that simple.', 'We are a full service Digital Marketing Agency all the foundational tool you need inbound success.', 'Our Mentors', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt utet dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.', 'Our Services', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt utet dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.', 'Currency Payout', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt utet dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.', 'Check The Amounts & Have A Look At The Transfer Details', 'Check The Amounts & Have A Look At The Transfer Details', '2019-09-30 19:00:00', '2000000', NULL, '2019-10-17 06:14:57');

-- --------------------------------------------------------

--
-- Table structure for table `buy_moneys`
--

CREATE TABLE `buy_moneys` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `currency_id` int(10) UNSIGNED NOT NULL,
  `enter_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buy_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buy_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `get_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buy_moneys`
--

INSERT INTO `buy_moneys` (`id`, `user_id`, `currency_id`, `enter_amount`, `buy_price`, `buy_charge`, `get_amount`, `trx`, `account`, `name`, `image`, `email`, `info`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 51, 1, '83.33', '0.000012', '0', '0.001', '437422177028', 'FD4DDS4545D5SF54E8FEF', NULL, '437422177028.jpg', NULL, 'DSFFSDFSDF', 1, 1, '2019-10-12 08:41:46', '2019-10-12 08:42:18'),
(2, 51, 1, '833.33', '0.000012', '0', '0.01', '227851684769', NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-10-13 21:51:45', '2019-10-13 21:51:45'),
(3, 51, 1, '83333.33', '0.000012', '0', '1', '549363155670', NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-10-14 12:15:03', '2019-10-14 12:15:03'),
(4, 52, 1, '833333.33', '0.000012', '0', '10', '656356337363', NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-10-16 14:20:43', '2019-10-16 14:20:43');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exchange` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `sell` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `buy` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available_balance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_balance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_coin` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `discount_fixed` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `discount_percentage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `coinid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `symbol`, `price`, `exchange`, `sell`, `buy`, `payment_id`, `available_balance`, `total_balance`, `image`, `is_coin`, `status`, `discount_fixed`, `discount_percentage`, `created_at`, `updated_at`, `coinid`) VALUES
(1, 'Bitcoin', 'BTC', '0.000012', '0', '0', '0', '12312313', '1000', '1000', 'bitcoin_1571413391.png', 1, 1, '0', '50', '2019-09-14 13:00:13', '2019-10-18 10:43:11', 1),
(2, 'Ethereum', 'ETH', '187.950595389', '0', '0', '0', NULL, '210000', '210000', NULL, 0, 0, '0', '0', '2019-09-14 13:00:13', '2019-09-14 13:00:13', 1027),
(516, 'Dash', 'DASH', '92.1639198053', '0', '0', '0', NULL, '210000', '210000', NULL, 0, 0, '0', '0', '2019-09-14 13:01:30', '2019-09-14 13:01:30', 131),
(964, 'DemoCoin', 'DCO', '1', '0', '0', '0', '123456789', '20800', '21000', 'democoin_1571413412.png', 1, 1, '0', '0', '2019-10-03 02:26:38', '2019-10-18 11:21:45', NULL),
(965, 'IEO Demo 2', 'IEO2', '0.10', '0', '0', '0', '123456', '210000', '210000', 'ieo-demo-2_1571413273.png', 1, 1, '0', '0', '2019-10-03 02:29:23', '2019-10-18 10:41:13', NULL),
(966, 'IEO Demo 1', 'IEO1', '0.01', '0', '0', '0', '123457', '210000', '210000', 'ieo-demo-1_1571413307.png', 1, 1, '0', '0', '2019-10-03 02:29:23', '2019-10-18 10:41:47', NULL),
(967, 'Lite Coin', 'LTC', '0.018', '0', '0', '0', NULL, '210000', '210000', NULL, 0, 0, '0', '0', '2019-09-14 13:01:30', '2019-09-14 13:01:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `gateway_id` int(11) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `wallet_id` int(11) DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usd` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `btc_amo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_wallet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `try` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `user_id`, `gateway_id`, `currency_id`, `wallet_id`, `amount`, `charge`, `usd`, `discount`, `btc_amo`, `btc_wallet`, `trx`, `status`, `try`, `created_at`, `updated_at`) VALUES
(7, 51, 502, 1, NULL, '500', '3.5', '50.35', '500', '0', '', 'SRlgw5H6t5EeMOkF', 0, 0, '2019-10-12 08:39:14', '2019-10-12 08:39:14'),
(8, 51, 502, 1, NULL, '5', '1.025', '0.6', '5', '0', '', 'pGFdFMG77opYlzss', 0, 0, '2019-10-13 21:51:03', '2019-10-13 21:51:03'),
(9, 51, 502, 966, NULL, '1', '1.005', '0.2', '0', '0', '', 'Qf2TRzqwGQ3vCJne', 0, 0, '2019-10-14 09:38:48', '2019-10-14 09:38:48'),
(10, 51, 502, 966, NULL, '1', '1.005', '0.2', '0', '0', '', 'Y6g3Vt6FW6TeJHpF', 0, 0, '2019-10-14 09:38:49', '2019-10-14 09:38:49'),
(11, 51, 502, 966, NULL, '1', '1.005', '0.2', '0', '0', '', 'beGRUvDizKZpxLke', 0, 0, '2019-10-14 11:58:56', '2019-10-14 11:58:56'),
(12, 51, 502, 966, NULL, '1', '1.005', '0.2', '0', '0', '', 'YbauhA82Ju22KHtt', 0, 0, '2019-10-14 12:02:36', '2019-10-14 12:02:36'),
(13, 51, 502, 1, NULL, '5.5', '1.0275', '0.65', '5.5', '0', '', 'sRGBefoo6bX0ugmY', 0, 0, '2019-10-14 12:11:05', '2019-10-14 12:11:05'),
(14, 51, 502, 1, NULL, '5.5', '1.0275', '0.65', '5.5', '0', '', 'f0IjNsol2wi1Lg8E', 0, 0, '2019-10-14 12:11:07', '2019-10-14 12:11:07'),
(15, 51, 502, 966, NULL, '1', '1.005', '0.2', '0', '0', '', 'JP4hMa9tXXlxs7j5', 0, 0, '2019-10-14 12:12:02', '2019-10-14 12:12:02'),
(16, 52, 502, 1, NULL, '500', '3.5', '50.35', '500', '0', '', 'fbef4yYO8zWYEpBo', 0, 0, '2019-10-16 14:16:03', '2019-10-16 14:16:03'),
(17, 52, 502, 1, NULL, '12500', '63.5', '1256.35', '12500', '0', '', 'MzzaApI4WnXcFIk9', 0, 0, '2019-10-16 14:19:58', '2019-10-16 14:19:58'),
(18, 52, 502, 1, NULL, '50', '1.25', '5.13', '50', '0', '', 'lonAixknAVL1mVDC', 0, 0, '2019-10-16 14:21:04', '2019-10-16 14:21:04'),
(19, 52, 502, 1, NULL, '50', '1.25', '5.13', '50', '0', '', 'KxafUHM64oohM6TU', 0, 0, '2019-10-16 14:22:48', '2019-10-16 14:22:48'),
(20, 52, 502, 964, NULL, '100', '1.5', '10.15', '0', '0', '', 'V8rMydp20z0g0O79', 0, 0, '2019-10-16 14:24:44', '2019-10-16 14:24:44'),
(21, 51, 502, 964, NULL, '1', '1.005', '0.2', '0', '0', '', 'mFYM4pry9mpxnahP', 0, 0, '2019-10-18 11:27:30', '2019-10-18 11:27:30'),
(22, 48, 502, 1, NULL, '50', '1.25', '5.13', '50', '0', '', 'UYO3b8XT8ktHWKsF', 0, 0, '2019-10-18 17:02:19', '2019-10-18 17:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `etemplates`
--

CREATE TABLE `etemplates` (
  `id` int(10) UNSIGNED NOT NULL,
  `esender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emessage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `smsapi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `etemplates`
--

INSERT INTO `etemplates` (`id`, `esender`, `mobile`, `emessage`, `smsapi`, `created_at`, `updated_at`) VALUES
(1, 'do-not-reply@thesoftking.com', '+01234567890', '<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\r\n   \"http://www.w3.org/TR/html4/loose.dtd\">\r\n<html lang=\"en\">\r\n\r\n<head>\r\n    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\r\n    <!-- So that mobile will display zoomed in -->\r\n    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n    <!-- enable media queries for windows phone 8 -->\r\n    <meta name=\"format-detection\" content=\"telephone=no\">\r\n    <!-- disable auto telephone linking in iOS -->\r\n    <title></title>\r\n\r\n</head>\r\n<style type=\"text/css\">\r\n    .header,\r\n    .title,\r\n    .subtitle,\r\n    .footer-text {\r\n        font-family: Helvetica, Arial, sans-serif;\r\n    }\r\n    \r\n    .header {\r\n        font-size: 24px;\r\n        font-weight: bold;\r\n        padding-bottom: 12px;\r\n        color: #DF4726;\r\n    }\r\n    \r\n    .footer-text a {\r\n        color: #aaaaaa;\r\n    }\r\n    \r\n    .container {\r\n        width: 7000px;\r\n        max-width: 700px;\r\n    }\r\n    \r\n    .container-padding {\r\n        padding-left: 24px;\r\n        padding-right: 24px;\r\n    }\r\n    \r\n    .content {\r\n        padding-top: 12px;\r\n        padding-bottom: 12px;\r\n        background-color: #ffffff;\r\n    }\r\n    \r\n    code {\r\n        background-color: #eee;\r\n        padding: 0 4px;\r\n        font-family: Menlo, Courier, monospace;\r\n        font-size: 12px;\r\n    }\r\n    \r\n    hr {\r\n        border: 0;\r\n        border-bottom: 1px solid #cccccc;\r\n    }\r\n    \r\n    .hr {\r\n        height: 1px;\r\n        border-bottom: 1px solid #cccccc;\r\n    }\r\n    \r\n    .subtitle {\r\n        font-size: 16px;\r\n        font-weight: 600;\r\n        color: #2469A0;\r\n    }\r\n    \r\n    .subtitle span {\r\n        font-weight: 400;\r\n        color: #999999;\r\n    }\r\n    \r\n    .title {\r\n        font-size: 20px;\r\n        font-weight: 600;\r\n        color: #374550;\r\n    }\r\n    \r\n    .body-text,\r\n    .footer-text {\r\n        font-family: Helvetica, Arial, sans-serif;\r\n        font-size: 14px;\r\n        line-height: 20px;\r\n        text-align: left;\r\n        color: #333333;\r\n    }\r\n    \r\n    .socialIcon {\r\n        max-width: 110px;\r\n        margin: 15px auto 0 auto;\r\n    }\r\n    \r\n    .socialIcon .s1 {\r\n        border: 0;\r\n        padding: 0px;\r\n        /*background: #034d77;*/\r\n        margin-left: 10px;\r\n        border-radius: 2px;\r\n        width: 25px;\r\n    }\r\n    \r\n    #message-htmlpart1 div.rcmBody .socialIcon {\r\n        max-width: 110px;\r\n        margin: 25px auto 15px auto;\r\n        display: inline;\r\n    }\r\n    \r\n    #message-htmlpart1 div.rcmBody .socialIcon .s1 {\r\n        border: 0;\r\n        padding: 0px;\r\n        margin-left: 10px;\r\n        border-radius: 2px;\r\n        width: 25px;\r\n    }\r\n    \r\n    @media screen and (max-width: 599px) {\r\n        .force-row,\r\n        .container {\r\n            width: 100% !important;\r\n            max-width: 100% !important;\r\n        }\r\n    }\r\n    \r\n    @media screen and (max-width: 400px) {\r\n        .container-padding {\r\n            padding-left: 12px !important;\r\n            padding-right: 12px !important;\r\n        }\r\n    }\r\n</style>\r\n\r\n<body style=\"margin:0; padding:0;\" bgcolor=\"#F0F0F0\" leftmargin=\"0\" topmargin=\"0\" marginwidth=\"0\" marginheight=\"0\">\r\n\r\n    <!-- 100% background wrapper (grey background) -->\r\n    <table border=\"0\" width=\"100%\" height=\"100%\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#F0F0F0\">\r\n        <tr>\r\n            <td align=\"center\" valign=\"top\" bgcolor=\"#F0F0F0\" style=\"background-color: #F0F0F0;\">\r\n\r\n                <br>\r\n\r\n                <!-- 600px container (white background) -->\r\n                <table border=\"0\" width=\"600\" cellpadding=\"0\" cellspacing=\"0\" class=\"container\" style=\"margin-top: 7%;\r\n    text-align: center;  box-shadow: 2px 2px 4px 0px #ddd; background: #fff; margin-bottom: 7%; \">\r\n\r\n                    <tr>\r\n                        <td class=\"container-padding content\" align=\"center\" style=\"padding: 0px;\">\r\n                            <div class=\"title\" style=\" background: #07b8fe; margin-bottom: 15px;\">\r\n                                <img src=\"{{image}}\" alt=\"Logo\" style=\"max-width: 150px; margin-top: 15px; margin-bottom: 10px; \">\r\n                            </div>\r\n\r\n                            <br>\r\n                            <div class=\"title\">Welcome to {{app_name}} </div>\r\n                            <br>\r\n                            <br>\r\n\r\n                            <div class=\"body-text\" style=\"text-align: center; padding: 15px;\">\r\n                                <p>{{message}}</p>\r\n                                <br>\r\n                                <br>\r\n                            </div>\r\n\r\n                            <div class=\"footer-text\" style=\"text-align: center;\">\r\n                                <p style=\"margin:0px;\">Sincerely,</p>\r\n                                <p style=\"margin:0px;\">{{app_name}} Team</p>\r\n\r\n                                <br>\r\n                            </div>\r\n                        </td>\r\n                    </tr>\r\n\r\n                </table>\r\n                <!--/600px container -->\r\n\r\n            </td>\r\n        </tr>\r\n    </table>\r\n    <!--/100% background wrapper-->\r\n\r\n</body>\r\n\r\n</html>', 'https://api.infobip.com/api/v3/sendsms/plain?user=****&password=****&sender=Exchangeo&SMSText={{message}}&GSM={{number}}&type=longSMS', '2018-01-09 10:45:09', '2018-11-11 02:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `exchange_moneys`
--

CREATE TABLE `exchange_moneys` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `trx` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_amount_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_currency_id` int(11) DEFAULT NULL,
  `receive_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receive_currency_id` int(11) DEFAULT NULL,
  `transaction_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_payment_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` int(10) UNSIGNED NOT NULL,
  `main_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minamo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maxamo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fixed_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percent_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'paytm Website',
  `val4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'paytm Industry Type',
  `val5` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'paytm Channel ID',
  `val6` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'paytm Transaction URL',
  `val7` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'paytm Transaction Status URL',
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `main_name`, `name`, `minamo`, `maxamo`, `fixed_charge`, `percent_charge`, `rate`, `val1`, `val2`, `val3`, `val4`, `val5`, `val6`, `val7`, `status`, `created_at`, `updated_at`) VALUES
(502, 'block.io - BTC', 'Block.io', '1', '99999', '1', '0.5', '10', '1658-8015-2e5e-9afb', '09876softk', NULL, NULL, NULL, NULL, NULL, 1, '2018-01-27 05:00:00', '2019-10-11 03:12:15');

-- --------------------------------------------------------

--
-- Table structure for table `mentors`
--

CREATE TABLE `mentors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `description` blob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_09_24_054215_create_admins_table', 2),
(4, '2018_09_24_054216_create_admin_password_resets_table', 2),
(11, '2018_09_27_072818_create_user_logins_table', 4),
(12, '2018_10_08_100843_create_mentors_table', 5),
(13, '2018_10_08_101212_create_services_table', 5),
(20, '2018_10_10_102109_create_currencies_table', 6),
(21, '2018_10_14_073737_create_buy_moneys_table', 6),
(22, '2018_10_16_084059_create_sell_moneys_table', 6),
(23, '2018_10_17_114330_create_exchange_moneys_table', 6),
(24, '2018_10_18_124342_create_banks_table', 6),
(25, '2014_10_12_000000_create_shoes_table', 7),
(26, '2019_10_10_061337_create_shoes_trxs_table', 7),
(27, '2019_10_10_061618_create_shoes_purchase_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `hit` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sell_moneys`
--

CREATE TABLE `sell_moneys` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `currency_id` int(10) UNSIGNED NOT NULL,
  `enter_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sell_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sell_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `get_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `icon`, `image`, `details`, `created_at`, `updated_at`) VALUES
(1, 'jknjnk', 'jncsjkan', NULL, 'jkasncjkas', '2019-10-07 04:19:43', '2019-10-07 04:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `shoes`
--

CREATE TABLE `shoes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'no.png',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_virtual` tinyint(4) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `purchase_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `sell_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `discount_expiry` timestamp NULL DEFAULT NULL,
  `total_items` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shoes`
--

INSERT INTO `shoes` (`id`, `name`, `image`, `description`, `is_virtual`, `status`, `purchase_price`, `sell_price`, `discount`, `discount_expiry`, `total_items`, `created_at`, `updated_at`) VALUES
(1, 'temp', 'temp_1571362130.jpg', 'bla bla bla', 1, 1, '120', '90', '29', '2019-10-09 19:00:00', '13', '2019-10-10 02:46:30', '2019-10-17 20:28:55'),
(2, 'sacjkascnasjn', 'sacjkascnasjn_1571362017.jpg', 'cascascscasc', 0, 1, '786', '786', '30', '2019-10-15 19:00:00', '782', '2019-10-10 02:59:19', '2019-10-18 11:11:22'),
(3, 'ASKCN', 'askcn_1571361986.jpg', 'jcnaskcn', 1, 1, '20', '20', '20', '2019-10-23 19:00:00', '1', '2019-10-10 03:00:47', '2019-10-17 20:26:36'),
(4, 'asckjsac', 'asckjsac_1571361931.jpg', 'jkasnc', 1, 1, '213', '500', '5', '2019-10-09 19:00:00', '4', '2019-10-10 06:15:29', '2019-10-17 20:25:38'),
(5, 'ascjksna', 'ascjksna_1571361955.jpg', NULL, 0, 1, '100', '0', '0', '2019-10-06 19:00:00', '22', '2019-10-10 06:18:31', '2019-10-18 11:10:01'),
(6, 'Shoes 2', 'shoes-2_1571361883.jpg', 'shoes 3', 1, 1, '23', '22', '22', '2019-10-15 19:00:00', '21', '2019-10-14 12:36:28', '2019-10-17 20:24:43'),
(7, 'ADIDAS', 'adidas_1571415464.png', '1010', 0, 1, '1500', '1400', '10', '2019-10-17 19:00:00', '10', '2019-10-18 11:16:05', '2019-10-18 11:17:44'),
(8, 'JORDAN', 'jordan_1571415416.png', 'jordan', 0, 1, '1600', '1400', '10', '2019-10-17 19:00:00', '100', '2019-10-18 11:16:56', '2019-10-18 11:16:56');

-- --------------------------------------------------------

--
-- Table structure for table `shoes_purchase`
--

CREATE TABLE `shoes_purchase` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `shoe_id` int(11) NOT NULL,
  `trx_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shoes_trxs`
--

CREATE TABLE `shoes_trxs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `shoe_id` int(11) NOT NULL,
  `total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shoes_trxs`
--

INSERT INTO `shoes_trxs` (`id`, `user_id`, `shoe_id`, `total_amount`, `type`, `discount`, `created_at`, `updated_at`) VALUES
(8, 48, 6, '18', 'buy', '5', '2019-10-14 12:37:27', '2019-10-14 12:37:27'),
(9, 48, 5, '100', 'buy', '0', '2019-10-14 12:37:33', '2019-10-14 12:37:33'),
(10, 48, 2, '550', 'buy', '236', '2019-10-14 12:37:39', '2019-10-14 12:37:39'),
(11, 48, 1, '120', 'buy', '0', '2019-10-14 12:37:48', '2019-10-14 12:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trxes`
--

CREATE TABLE `trxes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `main_amo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '+',
  `reffer` tinyint(4) NOT NULL DEFAULT 0,
  `currency_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trxes`
--

INSERT INTO `trxes` (`id`, `user_id`, `amount`, `main_amo`, `charge`, `type`, `reffer`, `currency_id`, `title`, `remark`, `trx`, `created_at`, `updated_at`) VALUES
(32, 48, '2000', '2000', '0', '+', 0, 964, 'Deposit ', NULL, '123128937dy9w8e62', NULL, NULL),
(39, 48, '100', '1900', '0', '-', 0, 964, 'Spin Losses', NULL, 'wJ8XE8CotnKLsfsm', '2019-10-13 22:02:49', '2019-10-13 22:02:49'),
(40, 48, '18', '1882', '0', '-', 0, 964, 'Purchase of a virtual shoe.', NULL, '3UhUPcxpJddVKsB3', '2019-10-14 12:37:27', '2019-10-14 12:37:27'),
(41, 48, '100', '1782', '0', '-', 0, 964, 'Purchase of a virtual shoe.', NULL, 'G2Mt539rheBR6Bq7', '2019-10-14 12:37:33', '2019-10-14 12:37:33'),
(42, 48, '550', '1232', '0', '-', 0, 964, 'Purchase of a virtual shoe.', NULL, 'cjfuMKh0LcRtoMuH', '2019-10-14 12:37:39', '2019-10-14 12:37:39'),
(43, 48, '120', '1112', '0', '-', 0, 964, 'Purchase of a virtual shoe.', NULL, 'L5z1oNgXIn10rJlM', '2019-10-14 12:37:48', '2019-10-14 12:37:48'),
(44, 48, '100', '1212', '0', '+', 0, 964, 'Spin profits', NULL, '36HdP2HjHX1AlU4x', '2019-10-16 14:01:37', '2019-10-16 14:01:37'),
(45, 48, '100', '1112', '0', '-', 0, 964, 'Spin Losses', NULL, 'IWHLt3AubIHLs3bh', '2019-10-17 13:51:46', '2019-10-17 13:51:46'),
(46, 48, '100', '1012', '0', '-', 0, 964, 'Spin Losses', NULL, 'OnMxzfjjazlGae0M', '2019-10-18 16:59:30', '2019-10-18 16:59:30'),
(47, 48, '100', '912', '0', '-', 0, 964, 'Spin Losses', NULL, 'j436sXEsBFYZSLv7', '2019-10-18 16:59:45', '2019-10-18 16:59:45'),
(48, 48, '100', '812', '0', '-', 0, 964, 'Spin Losses', NULL, '7Jf0biDhWA7xlEz2', '2019-10-18 16:59:59', '2019-10-18 16:59:59'),
(49, 48, '100', '712', '0', '-', 0, 964, 'Spin Losses', NULL, 'NfYCVep1GfyI69bz', '2019-10-18 17:00:12', '2019-10-18 17:00:12'),
(50, 48, '100', '612', '0', '-', 0, 964, 'Spin Losses', NULL, '1Lc7w3wLjAVXZrDL', '2019-10-18 17:00:25', '2019-10-18 17:00:25'),
(51, 48, '100', '512', '0', '-', 0, 964, 'Spin Losses', NULL, 'ltjIOJYcl86edwjt', '2019-10-18 17:00:38', '2019-10-18 17:00:38'),
(52, 48, '100', '412', '0', '-', 0, 964, 'Spin Losses', NULL, '47Odgm527EUg8ohH', '2019-10-18 17:00:51', '2019-10-18 17:00:51'),
(53, 48, '100', '312', '0', '-', 0, 964, 'Spin Losses', NULL, 'H77MqnHclYmHxfDA', '2019-10-18 17:01:04', '2019-10-18 17:01:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verification_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_verify` tinyint(4) NOT NULL DEFAULT 0,
  `email_verify` tinyint(4) NOT NULL DEFAULT 0,
  `email_time` datetime DEFAULT NULL,
  `phone_time` datetime DEFAULT NULL,
  `refer` int(11) NOT NULL DEFAULT 0,
  `bonus_flag` tinyint(4) NOT NULL DEFAULT 0,
  `level` tinyint(4) NOT NULL DEFAULT 0,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `login_time` datetime DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google2fa_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google2fa_enable` tinyint(1) NOT NULL DEFAULT 1,
  `google2fa_last_login` timestamp NULL DEFAULT NULL,
  `google_2fa_last_login_buy` timestamp NULL DEFAULT NULL,
  `google_2fa_last_login_user` timestamp NULL DEFAULT NULL,
  `google_2fa_last_login_exchange` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `email`, `phone`, `image`, `password`, `verification_code`, `sms_code`, `phone_verify`, `email_verify`, `email_time`, `phone_time`, `refer`, `bonus_flag`, `level`, `reference`, `balance`, `status`, `login_time`, `address`, `city`, `zip_code`, `country`, `provider`, `provider_id`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `google2fa_secret`, `google2fa_enable`, `google2fa_last_login`, `google_2fa_last_login_buy`, `google_2fa_last_login_user`, `google_2fa_last_login_exchange`) VALUES
(32, NULL, NULL, 'aaaaa', 'aaaaa@gmail.com', NULL, NULL, '$2y$10$W3JboNJG4j8cQiu41DwMuuoWSkmYSLX4zRKobnqkYy7vq2u9XP2HC', NULL, NULL, 0, 0, NULL, NULL, 0, 0, 0, NULL, '0', 1, '2019-09-16 00:34:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-15 17:00:07', '2019-09-15 19:34:43', 'eyJpdiI6IkpJZGJEQjBLdDhcL29POU9vWDRvdkh3PT0iLCJ2YWx1ZSI6IjRyTnFQYURaQ3VxXC93Y0xFXC9ucXlyR1FiWjlBZHJpajNMbmo1R2NoUldudz0iLCJtYWMiOiJjYjc5OWFmMjNjMTNjZTRhM2E5ZmQ0ZTU5YmYxZjhjZWRkZjQxMzZkN2Y5MzVhNzMyN2U4YTczZjA0MjYzMDc1In0=', 0, NULL, NULL, NULL, NULL),
(48, 'Big', 'Chungus', 'demo', 'big@chungus.com', NULL, '1570101905_.jpg', '$2y$12$EKT6WqV7bMloaxQHiZ7EweLhl5PGnj8yRDSqEbPzaME7opmY4hNPi', 'd0a656d56976c7955fcd34f1f610af04', NULL, 1, 1, '2019-10-02 11:32:57', NULL, 0, 0, 2, NULL, '312', 1, '2019-10-18 21:58:59', 'asdaskdjnsjd', 'jksjkcna', '44000', 'Pakistan', NULL, NULL, '2019-10-02 06:28:22', 'zDfPlcNLOs2eUeDl9bGr7J1eMmzWAgtbLbVk8ME4ee9rZdSi9WfmvUVYDprN', '2019-10-01 08:08:57', '2019-10-18 17:01:04', NULL, 0, '2019-10-03 00:55:39', '2019-10-02 08:04:40', '2019-10-03 00:55:39', '2019-10-02 05:54:39'),
(49, 'nibba', 'nibba', 'nibba', 'nibba@nibba.com', NULL, NULL, '$2y$10$WQ1nEwfcpMSbanZB9VZwKuSayqy89s1nXsflXjB0bcPLPSlocRIcm', '3b8459be0d425b4e73fbd2d692c5c71a', NULL, 1, 0, '2019-10-02 12:55:04', NULL, 48, 0, 0, NULL, '0', 1, NULL, NULL, NULL, NULL, 'United States', NULL, NULL, NULL, NULL, '2019-10-02 07:49:59', '2019-10-03 00:13:58', NULL, 1, NULL, NULL, NULL, NULL),
(50, 'temp', 'temp', 'tempo', 'temp@temp.com', NULL, NULL, '$2y$10$sw6RkGw0qC6zoX9sihuPIu5hGH.i57MYnRLLN8eJ12R6hmQckW8VK', 'ea17f494f4a1ccf5524eb3b6de954f07', NULL, 1, 1, '2019-10-12 08:09:00', NULL, 48, 1, 0, NULL, '0', 1, '2019-10-12 08:05:12', NULL, NULL, NULL, 'Afghanistan', NULL, NULL, '2019-10-12 03:05:06', NULL, '2019-10-12 03:03:55', '2019-10-12 04:35:41', NULL, 0, '2019-10-12 03:06:34', NULL, '2019-10-12 03:06:34', NULL),
(51, 'Viktor', 'dkd', 'viktor', 'bestfriend6470@gmail.com', NULL, NULL, '$2y$10$T9qZsVb8GfCDlfSvsNNz/.6tNqak6j6W.DOC/3x9k31OtVtuE30wi', '0d10db73b0a8bd29a82978e3ff917a78', NULL, 1, 1, '2019-10-12 13:38:26', NULL, 0, 0, 0, NULL, '0', 1, '2019-10-18 16:26:37', NULL, NULL, NULL, 'Russian Federation', NULL, NULL, '2019-10-12 08:34:23', 'YMgjxC05YtFCIErH0hOLAxgBONhAB3CsB92RBzun5VokqpUPSFKMv9YdhnfV', '2019-10-12 08:33:21', '2019-10-18 11:26:53', 'eyJpdiI6ImE4VUduSXJVczhrSW1cL3RGUm52RTJ3PT0iLCJ2YWx1ZSI6InYrdCs4c0N2ek5nZXlzUTZnQmdDSXF0SlB4ck5LYkNucFlHY1FBMkJJODQ9IiwibWFjIjoiYTFkM2UyNWNiM2EyMGRhMjRhMDFhM2E5YTM3MDgxMGI1NWNmYjZjNGEwNjZhM2JhM2YyNmE5MDM4ZTBiMWRmYiJ9', 1, '2019-10-18 11:26:53', '2019-10-14 13:59:49', '2019-10-18 11:26:53', NULL),
(52, 'demo2', 'demo2', 'demo2', 'starcaptain13@gmail.com', NULL, NULL, '$2y$10$sdb3ZZcp.Vq9Mr8X8E1scuyy1uJ9kR.oArDuse00cfgplodQKSISe', '0716c3b87132f74e93f2a6dca3117122', NULL, 1, 1, '2019-10-16 19:14:19', NULL, 0, 0, 0, NULL, '0', 1, '2019-10-16 19:29:53', NULL, NULL, NULL, 'Netherlands', NULL, NULL, '2019-10-16 14:10:05', 'lJCfgEGFkkNSEkTn63y2gOHmrdJ4mLjTZzkkptsWQrCOPcKmVQuHFqtg3iVL', '2019-10-16 14:09:13', '2019-10-16 14:30:05', 'eyJpdiI6Iitkek5mZEEzakV0ZnhSMG9LeEdoWmc9PSIsInZhbHVlIjoiNHNFcUJzM0Z1Z2g1V1dZY3NvYW0xV2pGMGJvRG81a3FpdUY1Nkd2VzVhRT0iLCJtYWMiOiJiNGExMmZhYTZjNWExNGU5NzFlNDE2MTRiMWNmODE2YmNmODJiOWIzNDg3ZjhkOTdlNDI1MzU2NWUzZmVjNzM1In0=', 1, '2019-10-16 14:30:05', '2019-10-16 14:16:54', '2019-10-16 14:30:05', NULL),
(53, 'Genry', 'Ford', 'genrifron', 'online_jobs@bk.ru', NULL, NULL, '$2y$10$apoFNIZOSEqjcVNz/lWpXedXpz6kR6jjnkZqPsqiytUk4QOsfTcJa', '856f308628c6d0c47fb69113191b544c', NULL, 1, 1, '2019-10-19 23:47:41', NULL, 0, 0, 0, NULL, '0', 1, '2019-10-19 23:43:28', NULL, NULL, NULL, 'United Kingdom', NULL, NULL, '2019-10-19 18:43:10', 'zhiBHYRkj69j9jPOJ1pgGgZ7hNeltTs7SrkiogXguriz08dEccjqFBtGfOkA', '2019-10-19 18:42:00', '2019-10-19 18:43:28', NULL, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_logins`
--

INSERT INTO `user_logins` (`id`, `user_id`, `user_ip`, `location`, `details`, `created_at`, `updated_at`) VALUES
(1, 8, '::1', NULL, NULL, '2019-09-12 23:27:01', '2019-09-12 23:27:01'),
(2, 9, '::1', NULL, NULL, '2019-09-12 23:35:51', '2019-09-12 23:35:51'),
(3, 9, '::1', NULL, NULL, '2019-09-12 23:45:26', '2019-09-12 23:45:26'),
(4, 9, '::1', NULL, NULL, '2019-09-12 23:50:36', '2019-09-12 23:50:36'),
(5, 9, '::1', NULL, NULL, '2019-09-12 23:53:43', '2019-09-12 23:53:43'),
(6, 11, '::1', NULL, NULL, '2019-09-13 00:04:04', '2019-09-13 00:04:04'),
(7, 13, '::1', NULL, NULL, '2019-09-13 00:11:29', '2019-09-13 00:11:29'),
(8, 13, '::1', NULL, NULL, '2019-09-13 00:16:31', '2019-09-13 00:16:31'),
(9, 13, '::1', NULL, NULL, '2019-09-13 00:18:12', '2019-09-13 00:18:12'),
(10, 13, '::1', NULL, NULL, '2019-09-13 00:23:47', '2019-09-13 00:23:47'),
(11, 13, '::1', NULL, NULL, '2019-09-13 00:24:07', '2019-09-13 00:24:07'),
(12, 14, '::1', NULL, NULL, '2019-09-13 00:36:49', '2019-09-13 00:36:49'),
(13, 14, '::1', NULL, NULL, '2019-09-13 00:37:53', '2019-09-13 00:37:53'),
(14, 15, '::1', NULL, NULL, '2019-09-13 00:38:54', '2019-09-13 00:38:54'),
(15, 16, '::1', NULL, NULL, '2019-09-13 00:41:03', '2019-09-13 00:41:03'),
(16, 19, '::1', NULL, NULL, '2019-09-14 12:26:57', '2019-09-14 12:26:57'),
(17, 19, '::1', NULL, NULL, '2019-09-14 12:28:25', '2019-09-14 12:28:25'),
(18, 20, '::1', NULL, NULL, '2019-09-14 13:33:11', '2019-09-14 13:33:11'),
(19, 21, '::1', NULL, NULL, '2019-09-14 13:40:08', '2019-09-14 13:40:08'),
(20, 21, '::1', NULL, NULL, '2019-09-14 13:42:03', '2019-09-14 13:42:03'),
(21, 21, '::1', NULL, NULL, '2019-09-14 14:02:36', '2019-09-14 14:02:36'),
(22, 21, '::1', NULL, NULL, '2019-09-14 14:07:09', '2019-09-14 14:07:09'),
(23, 21, '::1', NULL, NULL, '2019-09-14 14:16:07', '2019-09-14 14:16:07'),
(24, 22, '::1', NULL, NULL, '2019-09-14 14:17:45', '2019-09-14 14:17:45'),
(25, 22, '::1', NULL, NULL, '2019-09-14 14:35:37', '2019-09-14 14:35:37'),
(26, 23, '::1', NULL, NULL, '2019-09-14 14:37:26', '2019-09-14 14:37:26'),
(27, 23, '::1', NULL, NULL, '2019-09-14 14:38:19', '2019-09-14 14:38:19'),
(28, 23, '::1', NULL, NULL, '2019-09-14 14:43:04', '2019-09-14 14:43:04'),
(29, 24, '::1', NULL, NULL, '2019-09-14 14:47:59', '2019-09-14 14:47:59'),
(30, 24, '::1', NULL, NULL, '2019-09-14 14:52:23', '2019-09-14 14:52:23'),
(31, 24, '::1', NULL, NULL, '2019-09-14 15:00:45', '2019-09-14 15:00:45'),
(32, 24, '::1', NULL, NULL, '2019-09-14 15:06:48', '2019-09-14 15:06:48'),
(33, 24, '::1', NULL, NULL, '2019-09-14 15:14:03', '2019-09-14 15:14:03'),
(34, 24, '::1', NULL, NULL, '2019-09-14 15:19:29', '2019-09-14 15:19:29'),
(35, 24, '::1', NULL, NULL, '2019-09-14 15:44:49', '2019-09-14 15:44:49'),
(36, 25, '::1', NULL, NULL, '2019-09-14 15:51:36', '2019-09-14 15:51:36'),
(37, 25, '::1', NULL, NULL, '2019-09-14 15:52:53', '2019-09-14 15:52:53'),
(38, 27, '::1', NULL, NULL, '2019-09-14 21:33:21', '2019-09-14 21:33:21'),
(39, 27, '::1', NULL, NULL, '2019-09-14 21:46:21', '2019-09-14 21:46:21'),
(40, 27, '::1', NULL, NULL, '2019-09-14 21:52:12', '2019-09-14 21:52:12'),
(41, 27, '::1', NULL, NULL, '2019-09-14 21:52:48', '2019-09-14 21:52:48'),
(42, 27, '::1', NULL, NULL, '2019-09-14 21:53:16', '2019-09-14 21:53:16'),
(43, 27, '::1', NULL, NULL, '2019-09-14 21:54:01', '2019-09-14 21:54:01'),
(44, 27, '::1', NULL, NULL, '2019-09-14 21:55:26', '2019-09-14 21:55:26'),
(45, 27, '::1', NULL, NULL, '2019-09-14 21:56:59', '2019-09-14 21:56:59'),
(46, 28, '::1', NULL, NULL, '2019-09-14 22:01:47', '2019-09-14 22:01:47'),
(47, 28, '::1', NULL, NULL, '2019-09-14 22:02:13', '2019-09-14 22:02:13'),
(48, 28, '::1', NULL, NULL, '2019-09-14 22:03:19', '2019-09-14 22:03:19'),
(49, 28, '::1', NULL, NULL, '2019-09-14 22:25:51', '2019-09-14 22:25:51'),
(50, 28, '::1', NULL, NULL, '2019-09-14 22:26:22', '2019-09-14 22:26:22'),
(51, 28, '::1', NULL, NULL, '2019-09-15 00:00:25', '2019-09-15 00:00:25'),
(52, 28, '::1', NULL, NULL, '2019-09-15 00:01:03', '2019-09-15 00:01:03'),
(53, 28, '::1', NULL, NULL, '2019-09-15 08:04:02', '2019-09-15 08:04:02'),
(54, 28, '::1', NULL, NULL, '2019-09-15 08:04:41', '2019-09-15 08:04:41'),
(55, 28, '::1', NULL, NULL, '2019-09-15 08:05:01', '2019-09-15 08:05:01'),
(56, 28, '::1', NULL, NULL, '2019-09-15 09:01:05', '2019-09-15 09:01:05'),
(57, 28, '::1', NULL, NULL, '2019-09-15 09:08:07', '2019-09-15 09:08:07'),
(58, 28, '::1', NULL, NULL, '2019-09-15 09:16:33', '2019-09-15 09:16:33'),
(59, 28, '::1', NULL, NULL, '2019-09-15 09:27:12', '2019-09-15 09:27:12'),
(60, 28, '::1', NULL, NULL, '2019-09-15 09:35:36', '2019-09-15 09:35:36'),
(61, 29, '::1', NULL, NULL, '2019-09-15 11:42:28', '2019-09-15 11:42:28'),
(62, 30, '::1', NULL, NULL, '2019-09-15 13:30:27', '2019-09-15 13:30:27'),
(63, 30, '::1', NULL, NULL, '2019-09-15 13:38:14', '2019-09-15 13:38:14'),
(64, 31, '::1', NULL, NULL, '2019-09-15 13:44:42', '2019-09-15 13:44:42'),
(65, 30, '::1', NULL, NULL, '2019-09-15 13:45:08', '2019-09-15 13:45:08'),
(66, 30, '::1', NULL, NULL, '2019-09-15 13:45:15', '2019-09-15 13:45:15'),
(67, 32, '::1', NULL, NULL, '2019-09-15 17:07:15', '2019-09-15 17:07:15'),
(68, 32, '::1', NULL, NULL, '2019-09-15 19:34:43', '2019-09-15 19:34:43'),
(69, 33, '::1', NULL, NULL, '2019-09-30 03:15:07', '2019-09-30 03:15:07'),
(70, 34, '127.0.0.1', NULL, NULL, '2019-09-30 06:39:08', '2019-09-30 06:39:08'),
(71, 34, '127.0.0.1', NULL, NULL, '2019-09-30 06:54:40', '2019-09-30 06:54:40'),
(72, 34, '127.0.0.1', NULL, NULL, '2019-09-30 07:26:38', '2019-09-30 07:26:38'),
(73, 34, '127.0.0.1', NULL, NULL, '2019-09-30 07:27:16', '2019-09-30 07:27:16'),
(74, 34, '127.0.0.1', NULL, NULL, '2019-09-30 07:30:14', '2019-09-30 07:30:14'),
(75, 34, '127.0.0.1', NULL, NULL, '2019-09-30 07:49:28', '2019-09-30 07:49:28'),
(76, 34, '127.0.0.1', NULL, NULL, '2019-09-30 07:54:58', '2019-09-30 07:54:58'),
(77, 34, '127.0.0.1', NULL, NULL, '2019-09-30 07:59:45', '2019-09-30 07:59:45'),
(78, 34, '127.0.0.1', NULL, NULL, '2019-09-30 08:00:04', '2019-09-30 08:00:04'),
(79, 34, '127.0.0.1', NULL, NULL, '2019-09-30 08:03:18', '2019-09-30 08:03:18'),
(80, 34, '127.0.0.1', NULL, NULL, '2019-09-30 08:04:12', '2019-09-30 08:04:12'),
(81, 34, '127.0.0.1', NULL, NULL, '2019-09-30 08:04:46', '2019-09-30 08:04:46'),
(82, 34, '127.0.0.1', NULL, NULL, '2019-09-30 08:05:28', '2019-09-30 08:05:28'),
(83, 34, '127.0.0.1', NULL, NULL, '2019-09-30 08:06:03', '2019-09-30 08:06:03'),
(84, 34, '127.0.0.1', NULL, NULL, '2019-09-30 08:06:31', '2019-09-30 08:06:31'),
(85, 34, '127.0.0.1', NULL, NULL, '2019-09-30 08:07:10', '2019-09-30 08:07:10'),
(86, 34, '127.0.0.1', NULL, NULL, '2019-09-30 08:08:34', '2019-09-30 08:08:34'),
(87, 34, '127.0.0.1', NULL, NULL, '2019-09-30 08:08:45', '2019-09-30 08:08:45'),
(88, 34, '127.0.0.1', NULL, NULL, '2019-09-30 08:09:58', '2019-09-30 08:09:58'),
(89, 34, '127.0.0.1', NULL, NULL, '2019-09-30 08:10:13', '2019-09-30 08:10:13'),
(90, 34, '127.0.0.1', NULL, NULL, '2019-09-30 08:17:26', '2019-09-30 08:17:26'),
(91, 34, '127.0.0.1', NULL, NULL, '2019-10-01 00:07:54', '2019-10-01 00:07:54'),
(92, 48, '127.0.0.1', NULL, NULL, '2019-10-01 08:09:20', '2019-10-01 08:09:20'),
(93, 48, '127.0.0.1', NULL, NULL, '2019-10-02 00:59:58', '2019-10-02 00:59:58'),
(94, 48, '127.0.0.1', NULL, NULL, '2019-10-02 04:29:08', '2019-10-02 04:29:08'),
(95, 48, '127.0.0.1', NULL, NULL, '2019-10-02 04:49:29', '2019-10-02 04:49:29'),
(96, 48, '127.0.0.1', NULL, NULL, '2019-10-02 05:36:27', '2019-10-02 05:36:27'),
(97, 48, '127.0.0.1', NULL, NULL, '2019-10-02 05:57:53', '2019-10-02 05:57:53'),
(98, 48, '127.0.0.1', NULL, NULL, '2019-10-02 05:59:53', '2019-10-02 05:59:53'),
(99, 48, '127.0.0.1', NULL, NULL, '2019-10-02 06:15:02', '2019-10-02 06:15:02'),
(100, 48, '127.0.0.1', NULL, NULL, '2019-10-02 06:16:38', '2019-10-02 06:16:38'),
(101, 48, '127.0.0.1', NULL, NULL, '2019-10-02 06:21:01', '2019-10-02 06:21:01'),
(102, 48, '127.0.0.1', NULL, NULL, '2019-10-02 06:27:52', '2019-10-02 06:27:52'),
(103, 48, '127.0.0.1', NULL, NULL, '2019-10-02 06:28:29', '2019-10-02 06:28:29'),
(104, 48, '127.0.0.1', NULL, NULL, '2019-10-02 07:11:55', '2019-10-02 07:11:55'),
(105, 48, '127.0.0.1', NULL, NULL, '2019-10-02 07:27:48', '2019-10-02 07:27:48'),
(106, 48, '127.0.0.1', NULL, NULL, '2019-10-02 07:28:51', '2019-10-02 07:28:51'),
(107, 48, '127.0.0.1', NULL, NULL, '2019-10-03 00:33:03', '2019-10-03 00:33:03'),
(108, 48, '127.0.0.1', NULL, NULL, '2019-10-03 06:20:40', '2019-10-03 06:20:40'),
(109, 48, '127.0.0.1', NULL, NULL, '2019-10-03 06:20:50', '2019-10-03 06:20:50'),
(110, 48, '127.0.0.1', NULL, NULL, '2019-10-04 00:19:27', '2019-10-04 00:19:27'),
(111, 48, '127.0.0.1', NULL, NULL, '2019-10-07 00:25:10', '2019-10-07 00:25:10'),
(112, 48, '127.0.0.1', NULL, NULL, '2019-10-09 00:33:10', '2019-10-09 00:33:10'),
(113, 48, '127.0.0.1', NULL, NULL, '2019-10-09 02:25:15', '2019-10-09 02:25:15'),
(114, 48, '127.0.0.1', NULL, NULL, '2019-10-09 07:53:19', '2019-10-09 07:53:19'),
(115, 48, '127.0.0.1', NULL, NULL, '2019-10-10 00:19:07', '2019-10-10 00:19:07'),
(116, 48, '127.0.0.1', NULL, NULL, '2019-10-10 05:16:34', '2019-10-10 05:16:34'),
(117, 48, '127.0.0.1', NULL, NULL, '2019-10-10 05:16:54', '2019-10-10 05:16:54'),
(118, 48, '127.0.0.1', NULL, NULL, '2019-10-10 05:17:23', '2019-10-10 05:17:23'),
(119, 48, '127.0.0.1', NULL, NULL, '2019-10-10 12:27:58', '2019-10-10 12:27:58'),
(120, 48, '127.0.0.1', NULL, NULL, '2019-10-10 13:05:35', '2019-10-10 13:05:35'),
(121, 48, '127.0.0.1', NULL, NULL, '2019-10-10 14:08:06', '2019-10-10 14:08:06'),
(122, 48, '127.0.0.1', NULL, NULL, '2019-10-10 14:08:11', '2019-10-10 14:08:11'),
(123, 48, '127.0.0.1', NULL, NULL, '2019-10-11 00:34:54', '2019-10-11 00:34:54'),
(124, 48, '127.0.0.1', NULL, NULL, '2019-10-11 00:43:23', '2019-10-11 00:43:23'),
(125, 48, '127.0.0.1', NULL, NULL, '2019-10-11 00:43:32', '2019-10-11 00:43:32'),
(126, 48, '127.0.0.1', NULL, NULL, '2019-10-11 05:28:03', '2019-10-11 05:28:03'),
(127, 48, '127.0.0.1', NULL, NULL, '2019-10-12 03:01:59', '2019-10-12 03:01:59'),
(128, 50, '127.0.0.1', NULL, NULL, '2019-10-12 03:05:12', '2019-10-12 03:05:12'),
(129, 48, '182.180.130.40', NULL, NULL, '2019-10-12 08:04:24', '2019-10-12 08:04:24'),
(130, 51, '183.182.110.227', NULL, NULL, '2019-10-12 08:34:44', '2019-10-12 08:34:44'),
(131, 51, '183.182.110.227', NULL, NULL, '2019-10-12 08:35:04', '2019-10-12 08:35:04'),
(132, 51, '183.182.110.227', NULL, NULL, '2019-10-12 08:52:48', '2019-10-12 08:52:48'),
(133, 51, '183.182.110.227', NULL, NULL, '2019-10-13 21:48:03', '2019-10-13 21:48:03'),
(134, 48, '182.180.130.40', NULL, NULL, '2019-10-13 22:02:30', '2019-10-13 22:02:30'),
(135, 51, '183.182.110.227', NULL, NULL, '2019-10-13 23:07:11', '2019-10-13 23:07:11'),
(136, 51, '183.182.110.227', NULL, NULL, '2019-10-14 09:31:45', '2019-10-14 09:31:45'),
(137, 48, '182.180.130.40', NULL, NULL, '2019-10-14 12:30:11', '2019-10-14 12:30:11'),
(138, 48, '182.180.130.40', NULL, NULL, '2019-10-14 12:37:14', '2019-10-14 12:37:14'),
(139, 48, '182.180.130.40', NULL, NULL, '2019-10-14 12:37:20', '2019-10-14 12:37:20'),
(140, 48, '213.127.95.63', NULL, NULL, '2019-10-16 14:00:38', '2019-10-16 14:00:38'),
(141, 52, '213.127.95.63', NULL, NULL, '2019-10-16 14:09:36', '2019-10-16 14:09:36'),
(142, 52, '213.127.95.63', NULL, NULL, '2019-10-16 14:10:13', '2019-10-16 14:10:13'),
(143, 52, '213.127.95.63', NULL, NULL, '2019-10-16 14:29:53', '2019-10-16 14:29:53'),
(144, 48, '182.180.130.40', NULL, NULL, '2019-10-16 14:54:59', '2019-10-16 14:54:59'),
(145, 51, '183.182.110.227', NULL, NULL, '2019-10-17 10:19:55', '2019-10-17 10:19:55'),
(146, 48, '183.182.110.227', NULL, NULL, '2019-10-17 10:35:44', '2019-10-17 10:35:44'),
(147, 48, '182.180.130.40', NULL, NULL, '2019-10-17 13:51:18', '2019-10-17 13:51:18'),
(148, 51, '183.182.110.227', NULL, NULL, '2019-10-18 10:47:42', '2019-10-18 10:47:42'),
(149, 51, '183.182.110.227', NULL, NULL, '2019-10-18 10:48:32', '2019-10-18 10:48:32'),
(150, 51, '183.182.110.227', NULL, NULL, '2019-10-18 11:25:45', '2019-10-18 11:25:45'),
(151, 51, '183.182.110.227', NULL, NULL, '2019-10-18 11:26:37', '2019-10-18 11:26:37'),
(152, 48, '213.127.95.63', NULL, NULL, '2019-10-18 16:58:59', '2019-10-18 16:58:59'),
(153, 53, '128.74.113.251', NULL, NULL, '2019-10-19 18:42:36', '2019-10-19 18:42:36'),
(154, 53, '128.74.113.251', NULL, NULL, '2019-10-19 18:43:28', '2019-10-19 18:43:28');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_logs`
--

CREATE TABLE `withdraw_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `method_id` int(11) NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wallet_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `net_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `send_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_methods`
--

CREATE TABLE `withdraw_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `withdraw_min` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `withdraw_max` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '10',
  `fix` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `apps_countries`
--
ALTER TABLE `apps_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basic_settings`
--
ALTER TABLE `basic_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buy_moneys`
--
ALTER TABLE `buy_moneys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `etemplates`
--
ALTER TABLE `etemplates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exchange_moneys`
--
ALTER TABLE `exchange_moneys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentors`
--
ALTER TABLE `mentors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sell_moneys`
--
ALTER TABLE `sell_moneys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shoes`
--
ALTER TABLE `shoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shoes_purchase`
--
ALTER TABLE `shoes_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shoes_trxs`
--
ALTER TABLE `shoes_trxs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trxes`
--
ALTER TABLE `trxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_logs`
--
ALTER TABLE `withdraw_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `apps_countries`
--
ALTER TABLE `apps_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `basic_settings`
--
ALTER TABLE `basic_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buy_moneys`
--
ALTER TABLE `buy_moneys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=968;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `etemplates`
--
ALTER TABLE `etemplates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exchange_moneys`
--
ALTER TABLE `exchange_moneys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=503;

--
-- AUTO_INCREMENT for table `mentors`
--
ALTER TABLE `mentors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sell_moneys`
--
ALTER TABLE `sell_moneys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shoes`
--
ALTER TABLE `shoes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shoes_purchase`
--
ALTER TABLE `shoes_purchase`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shoes_trxs`
--
ALTER TABLE `shoes_trxs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trxes`
--
ALTER TABLE `trxes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `withdraw_logs`
--
ALTER TABLE `withdraw_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
