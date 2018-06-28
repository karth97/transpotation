-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2017 at 07:32 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transport`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `ArticleId` int(11) NOT NULL,
  `TransportId` int(11) NOT NULL,
  `LR_SLNO` int(11) NOT NULL,
  `LRNO` varchar(234) NOT NULL,
  `LRDate` date NOT NULL,
  `Article` text NOT NULL,
  `ArticleSize` int(11) NOT NULL,
  `ArticleDimension` text NOT NULL,
  `HamaliCharges` varchar(243) NOT NULL,
  `ToPay` varchar(234) NOT NULL,
  `Paid` varchar(234) NOT NULL,
  `PaidAt` enum('Hyd','Sec','Vkb') NOT NULL,
  `AddedOn` datetime NOT NULL,
  `LastUpdate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`ArticleId`, `TransportId`, `LR_SLNO`, `LRNO`, `LRDate`, `Article`, `ArticleSize`, `ArticleDimension`, `HamaliCharges`, `ToPay`, `Paid`, `PaidAt`, `AddedOn`, `LastUpdate`) VALUES
(1, 1, 1, 'LR0012', '2017-07-03', 'Sample', 100, 'kgs', '100', '300', '300', 'Hyd', '2017-07-05 16:06:07', 1499263567),
(2, 2, 2, 'LR002', '2017-07-03', 'Sample2', 100, 'kgs', '200', '200', '1000', 'Vkb', '2017-07-05 16:17:04', 1499264224),
(3, 3, 3, 'LR0021', '2017-07-03', 'Sample3', 200, 'lts', '400', '300', '1000', 'Vkb', '2017-07-05 19:27:36', 1499275656),
(4, 4, 4, 'LR0023', '2017-07-03', 'Sample', 250, 'pieces', '50', '100', '1200', 'Vkb', '2017-07-05 19:40:32', 1499276432),
(5, 5, 5, 'LR0013', '2017-07-04', 'Sample4', 200, 'lts', '500', '300', '1000', 'Sec', '2017-07-06 05:49:27', 1499312967),
(6, 6, 6, 'LR0098', '2017-07-04', 'Sample', 400, 'pieces', '100', '500', '500', 'Hyd', '2017-07-06 05:51:59', 1499313119),
(7, 7, 7, 'LR0097', '2017-07-04', 'Sample5', 500, 'lts', '500', '600', '1000', 'Sec', '2017-07-06 05:53:04', 1499313184),
(8, 8, 8, 'LR0094', '2017-07-04', 'Sample6', 400, 'pieces', '100', '400', '500', 'Vkb', '2017-07-06 05:56:06', 1499313366);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`) VALUES
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
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People''s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People''s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'ES', 'Spain'),
(203, 'LK', 'Sri Lanka'),
(204, 'SH', 'St. Helena'),
(205, 'PM', 'St. Pierre and Miquelon'),
(206, 'SD', 'Sudan'),
(207, 'SR', 'Suriname'),
(208, 'SJ', 'Svalbard and Jan Mayen Islands'),
(209, 'SZ', 'Swaziland'),
(210, 'SE', 'Sweden'),
(211, 'CH', 'Switzerland'),
(212, 'SY', 'Syrian Arab Republic'),
(213, 'TW', 'Taiwan'),
(214, 'TJ', 'Tajikistan'),
(215, 'TZ', 'Tanzania, United Republic of'),
(216, 'TH', 'Thailand'),
(217, 'TG', 'Togo'),
(218, 'TK', 'Tokelau'),
(219, 'TO', 'Tonga'),
(220, 'TT', 'Trinidad and Tobago'),
(221, 'TN', 'Tunisia'),
(222, 'TR', 'Turkey'),
(223, 'TM', 'Turkmenistan'),
(224, 'TC', 'Turks and Caicos Islands'),
(225, 'TV', 'Tuvalu'),
(226, 'UG', 'Uganda'),
(227, 'UA', 'Ukraine'),
(228, 'AE', 'United Arab Emirates'),
(229, 'GB', 'United Kingdom'),
(230, 'US', 'United States'),
(231, 'UM', 'United States minor outlying islands'),
(232, 'UY', 'Uruguay'),
(233, 'UZ', 'Uzbekistan'),
(234, 'VU', 'Vanuatu'),
(235, 'VA', 'Vatican City State'),
(236, 'VE', 'Venezuela'),
(237, 'VN', 'Vietnam'),
(238, 'VG', 'Virgin Islands (British)'),
(239, 'VI', 'Virgin Islands (U.S.)'),
(240, 'WF', 'Wallis and Futuna Islands'),
(241, 'EH', 'Western Sahara'),
(242, 'YE', 'Yemen'),
(243, 'ZR', 'Zaire'),
(244, 'ZM', 'Zambia'),
(245, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `customerpayments`
--

CREATE TABLE `customerpayments` (
  `PaymentId` int(11) NOT NULL,
  `Customer` varchar(234) NOT NULL,
  `TotalAmount` varchar(256) NOT NULL,
  `AmountPaid` varchar(234) NOT NULL,
  `AmountDue` varchar(234) NOT NULL,
  `PainOn` datetime NOT NULL,
  `Cash_Cheque` enum('Cash','Cheque') NOT NULL,
  `Bank` varchar(234) NOT NULL,
  `ChequeNumber` varchar(234) NOT NULL,
  `Flat_Percentage` enum('Flat','Percentage') NOT NULL,
  `DiscountFigure` varchar(234) NOT NULL,
  `Lastupdate` varchar(235) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerpayments`
--

INSERT INTO `customerpayments` (`PaymentId`, `Customer`, `TotalAmount`, `AmountPaid`, `AmountDue`, `PainOn`, `Cash_Cheque`, `Bank`, `ChequeNumber`, `Flat_Percentage`, `DiscountFigure`, `Lastupdate`) VALUES
(5, 'SRAS', '700', '500', '165', '2017-07-11 10:52:09', 'Cheque', 'bankname', '000987', 'Percentage', '5', '1499750529'),
(6, 'SRAS', '165', '100', '60', '2017-07-11 10:53:19', 'Cash', '', '', 'Flat', '5', '1499750599'),
(7, 'SRAR', '200', '80', '104', '2017-07-11 10:57:18', 'Cash', '', '', 'Percentage', '8', '1499750838');

-- --------------------------------------------------------

--
-- Table structure for table `lrsvehicles`
--

CREATE TABLE `lrsvehicles` (
  `SLNO` int(11) NOT NULL,
  `TransportDate` date NOT NULL,
  `Vehicle_No` varchar(234) NOT NULL,
  `Vechile_Hire` varchar(234) NOT NULL,
  `Vehicle_Hamali` varchar(234) NOT NULL,
  `Driver` varchar(234) NOT NULL,
  `FromPlace` enum('Hyd','Sec','Vkb') NOT NULL,
  `ToPlace` enum('Hyd','Sec','Vkb') NOT NULL,
  `LastUpdated` varchar(234) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lrsvehicles`
--

INSERT INTO `lrsvehicles` (`SLNO`, `TransportDate`, `Vehicle_No`, `Vechile_Hire`, `Vehicle_Hamali`, `Driver`, `FromPlace`, `ToPlace`, `LastUpdated`) VALUES
(1, '2017-07-03', 'TSHG5678', '1234', '345', 'Srinu', 'Hyd', 'Sec', '1499263567'),
(2, '2017-07-03', 'TSAV1234', '2345', '678', 'Sri', 'Sec', 'Vkb', '1499264224'),
(3, '2017-07-03', 'APCD4534', '345', '567', 'Appi', 'Vkb', 'Hyd', '1499275655'),
(4, '2017-07-03', 'Ap8BH7890', '456', '76985257', 'Appi', 'Hyd', 'Sec', '1499276431'),
(5, '2017-07-04', 'TSAV1234', '123', '456', 'Srinu', 'Sec', 'Hyd', '1499312967'),
(6, '2017-07-04', 'Ap8BH7890', '456', '676898', 'Appi', 'Vkb', 'Hyd', '1499313119'),
(7, '2017-07-04', 'TSHG5678', '6587', '678', 'Sri', 'Vkb', 'Sec', '1499313184'),
(8, '2017-07-04', 'TSAV4216', '6877', '67898', 'Sri', 'Sec', 'Vkb', '1499313366');

-- --------------------------------------------------------

--
-- Table structure for table `transportdata`
--

CREATE TABLE `transportdata` (
  `SLNO` int(11) NOT NULL,
  `TransportId` int(11) NOT NULL,
  `LRNO` varchar(234) NOT NULL,
  `LRDATE` date NOT NULL,
  `Consignor` varchar(123) NOT NULL,
  `Consignee` varchar(234) NOT NULL,
  `ContactNumber` varchar(123) NOT NULL,
  `TotalArticles` int(11) NOT NULL,
  `Remarks` text NOT NULL,
  `AddedOn` datetime NOT NULL,
  `LastUpdated` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transportdata`
--

INSERT INTO `transportdata` (`SLNO`, `TransportId`, `LRNO`, `LRDATE`, `Consignor`, `Consignee`, `ContactNumber`, `TotalArticles`, `Remarks`, `AddedOn`, `LastUpdated`) VALUES
(1, 1, 'LR0012', '2017-07-03', 'TEST', 'SRAS', '7093181263', 1, 'n/a', '2017-07-05 16:06:07', '1499263567'),
(2, 2, 'LR002', '2017-07-03', 'TEST', 'SRAR', '8978975562', 1, 'n/a', '2017-07-05 16:17:04', '1499264224'),
(3, 3, 'LR0021', '2017-07-03', 'Sras', 'Test', '9912067674', 1, 'n/a', '2017-07-05 19:27:36', '1499275656'),
(4, 4, 'LR0023', '2017-07-03', 'TEST', 'SRAS', '7093181263', 1, 'n/a', '2017-07-05 19:40:32', '1499276432'),
(5, 5, 'LR0013', '2017-07-04', 'TEST', 'SRAS', '76988914935', 1, 'n/a', '2017-07-06 05:49:27', '1499312967'),
(6, 6, 'LR0098', '2017-07-04', 'Sras', 'TEST', '96985858751', 1, 'n/a', '2017-07-06 05:51:59', '1499313119'),
(7, 7, 'LR0097', '2017-07-04', 'Sras', 'TEST', '897654321', 1, 'n/a', '2017-07-06 05:53:04', '1499313184'),
(8, 8, 'LR0094', '2017-07-04', 'Sras', 'Test', '7093181263', 1, 'n/a', '2017-07-06 05:56:06', '1499313366');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `SLNO` int(11) NOT NULL,
  `UserId` varchar(234) NOT NULL,
  `Password` varchar(234) NOT NULL,
  `Role` enum('Admin','Subadmin') NOT NULL,
  `LastUpdated` varchar(234) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`SLNO`, `UserId`, `Password`, `Role`, `LastUpdated`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin', '12345432'),
(2, 'subadmin1', '5f4dcc3b5aa765d61d8327deb882cf99', 'Subadmin', '1232123564');

-- --------------------------------------------------------

--
-- Table structure for table `vechiles`
--

CREATE TABLE `vechiles` (
  `SLNO` int(11) NOT NULL,
  `VechileNo` varchar(234) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vechiles`
--

INSERT INTO `vechiles` (`SLNO`, `VechileNo`) VALUES
(1, 'TSAV1234'),
(2, 'APCD4534'),
(3, 'TSHG5678'),
(4, 'Ap8BH7890'),
(5, 'TSAV4216');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`ArticleId`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerpayments`
--
ALTER TABLE `customerpayments`
  ADD PRIMARY KEY (`PaymentId`);

--
-- Indexes for table `lrsvehicles`
--
ALTER TABLE `lrsvehicles`
  ADD PRIMARY KEY (`SLNO`);

--
-- Indexes for table `transportdata`
--
ALTER TABLE `transportdata`
  ADD PRIMARY KEY (`SLNO`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`SLNO`);

--
-- Indexes for table `vechiles`
--
ALTER TABLE `vechiles`
  ADD PRIMARY KEY (`SLNO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `ArticleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;
--
-- AUTO_INCREMENT for table `customerpayments`
--
ALTER TABLE `customerpayments`
  MODIFY `PaymentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `lrsvehicles`
--
ALTER TABLE `lrsvehicles`
  MODIFY `SLNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `transportdata`
--
ALTER TABLE `transportdata`
  MODIFY `SLNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `SLNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vechiles`
--
ALTER TABLE `vechiles`
  MODIFY `SLNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
