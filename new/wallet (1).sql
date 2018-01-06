-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 24, 2017 at 06:52 PM
-- Server version: 5.7.19
-- PHP Version: 7.0.4-7ubuntu2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wallet`
--

-- --------------------------------------------------------

--
-- Table structure for table `authorization`
--

CREATE TABLE `authorization` (
  `authorization_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `login_time` datetime NOT NULL,
  `authorization_code` varchar(200) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `merchantuser`
--

CREATE TABLE `merchantuser` (
  `id` int(11) NOT NULL,
  `date` varchar(300) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `username` varchar(65) NOT NULL,
  `encrypt_username` varchar(500) DEFAULT '',
  `password` varchar(300) NOT NULL,
  `accesskey` varchar(225) NOT NULL,
  `transcation_password` varchar(500) DEFAULT '',
  `email` varchar(200) DEFAULT '',
  `wallet_address` varchar(255) DEFAULT '',
  `admin` varchar(1) DEFAULT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `locked` varchar(1) DEFAULT NULL,
  `supportpin` varchar(6) DEFAULT NULL,
  `secret` varchar(16) DEFAULT NULL,
  `authused` varchar(1) DEFAULT NULL,
  `otp_value` varchar(500) DEFAULT '',
  `is_email_verify` tinyint(4) DEFAULT '0',
  `BCH_address` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchantuser`
--

INSERT INTO `merchantuser` (`id`, `date`, `ip`, `username`, `encrypt_username`, `password`, `accesskey`, `transcation_password`, `email`, `wallet_address`, `admin`, `profile_picture`, `locked`, `supportpin`, `secret`, `authused`, `otp_value`, `is_email_verify`, `BCH_address`, `pass`) VALUES
(1, '2017-09-15 11:25:54', '::1', 'priyanka12@gmail.com', '6216ac3d07a888d1bd9258c7c022ae31796769be6076e95862c955b008a78368', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', '254544', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', 'priyanka12@gmail.com', '', NULL, 'Hydrangeas.jpg', NULL, NULL, NULL, NULL, '', 0, '', ''),
(2, '2017-09-16 16:06:52', '::1', 'shubhamsahu707@gmail.com', '082b7a1b163e1db07877759de57eef20daf52f98b911cf47ed63163cd4cd2aed', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '685994', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', 'shubhamsahu707@gmail.com', '', '1', 'Penguins.jpg', NULL, NULL, NULL, NULL, '', 0, '', ''),
(8, '2017-09-19 16:07:51', '::1', 'sahutech8@gmail.com', 'f6e0432819749dbbcdad036fd4e91b820c2e69201df8ea234e97a8771ecac998', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', '871819', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', 'sahutech8@gmail.com', '', NULL, '', NULL, NULL, NULL, NULL, '', 0, '', ''),
(9, '2017-09-22 16:34:56', '::1', 'sahutech823@gmail.com', '68446544724a7bba83e11244d874015e8262fe02263c5dc64c3fd4df59b95c4e', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', '312029', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', 'sahutech823@gmail.com', '', NULL, '', NULL, NULL, NULL, NULL, '', 0, '', ''),
(10, '2017-09-25 15:16:23', '::1', 'SSSS@gmail.com', '98757df5ed9c176060492fead5c8c01fc2cf9c15aaae044bda817942d79b6d3d', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '626800', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'SSSS@gmail.com', '', NULL, 'Penguins.jpg', NULL, NULL, NULL, NULL, '', 0, '', ''),
(11, '2017-09-28 17:00:20', '::1', 'admin12345@gmail.com', '59826d712479e27f94fc769b2baa7b87e56e18ca75f22a2a8fad7770891b6565', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '277731', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'admin12345@gmail.com', '', NULL, '', NULL, NULL, NULL, NULL, '', 0, '', ''),
(14, '2017-09-28 19:54:24', '::1', 'eeee@gmail.com', 'e56f37cd589da44d4c29bb778aa05a556ef2f11eb2d96cfb92f72561965cd71c', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', '207174', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', 'eeee@gmail.com', '', NULL, '', NULL, NULL, NULL, NULL, '', 0, '', ''),
(15, '2017-09-28 19:59:29', '::1', 'gggggggg@gmail.com', 'c06e0b0236ae775a63ff7a20a26994e149c9ba96f62c180bf380888a12a171db', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', '715236', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', 'gggggggg@gmail.com', '', NULL, '', NULL, NULL, NULL, NULL, '', 0, '', ''),
(16, '2017-09-29 13:02:10', '::1', 'ttt@gmail.com', '0ddc77694485cd5e045f03a252564fab3ba47cd42e69e576883d9ab18ee6c87d', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', 'daa874eda6062158cb3419832bb071bd', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', 'ttt@gmail.com', '', NULL, '', NULL, NULL, NULL, NULL, '', 0, '', ''),
(18, '2017-09-29 15:27:31', '::1', 'shubhamsahu707@gmail.com', '082b7a1b163e1db07877759de57eef20daf52f98b911cf47ed63163cd4cd2aed', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '4238c97b25a98b6fe800e331bbece1b0', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'shubhamsahu707@gmail.com', '', NULL, '', NULL, NULL, NULL, NULL, '', 0, '', ''),
(19, '2017-09-29 15:27:54', '::1', 'shubhamsahu707@gmail.com', '082b7a1b163e1db07877759de57eef20daf52f98b911cf47ed63163cd4cd2aed', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '66c0cf6d005e5dd4e1c5459b4620ac3f', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'shubhamsahu707@gmail.com', '', NULL, '', NULL, NULL, NULL, NULL, '', 0, '', ''),
(20, '2017-09-29 15:29:52', '::1', 'saddam.husen1997@gmail.com', 'ecb03163c979076fd771a265ee0c60be9f36f5c832f3e9f574ae3c8ca267afef', '4fc82b26aecb47d2868c4efbe3581732a3e7cbcc6c2efb32062c08170a05eeb8', '6e8cb2301bdbc5618377cf1b922319e0', 'f6e0a1e2ac41945a9aa7ff8a8aaa0cebc12a3bcc981a929ad5cf810a090e11ae', 'saddam.husen1997@gmail.com', '', NULL, '', NULL, NULL, NULL, NULL, '', 0, '', ''),
(21, '2017-10-06 18:18:30', '::1', 'sadsa@gmail.com', '97908189e9ad9bddc4b55f7faa994e24b61ace21c5d08de1c6e4d9343710bbb6', '50ad41624c25e493aa1dc7f4ab32bdc5a3b0b78ecc35b539936e3fea7c565af7', '21393a5bfb157fcb13f65bff5ca69ce1', 'b9488f5027319875f1644421ad4244e0bc78fb9379dc4ac6a9213b6992051ccb', 'sadsa@gmail.com', '', NULL, '', NULL, NULL, NULL, NULL, '', 0, '', ''),
(22, '2017-10-06 21:16:19', '::1', 'shubhamsahu707@gmail.com', '082b7a1b163e1db07877759de57eef20daf52f98b911cf47ed63163cd4cd2aed', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '3ab538f43a578a26bcae740e71ec3789', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'shubhamsahu707@gmail.com', '', NULL, '', NULL, NULL, NULL, NULL, '', 0, '', ''),
(23, '2017-10-06 21:16:20', '::1', 'shubhamsahu707@gmail.com', '082b7a1b163e1db07877759de57eef20daf52f98b911cf47ed63163cd4cd2aed', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'fc25408badb12192c89c6608a20f729b', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'shubhamsahu707@gmail.com', '', NULL, '', NULL, NULL, NULL, NULL, '', 0, '', ''),
(24, '2017-10-06 21:17:33', '::1', 'shubhamsahu707@gmail.com', '082b7a1b163e1db07877759de57eef20daf52f98b911cf47ed63163cd4cd2aed', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '0faa7eca6b7f60ea67b6d238bfd97724', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 'shubhamsahu707@gmail.com', '', NULL, '', NULL, NULL, NULL, NULL, '', 0, '', ''),
(25, '2017-10-06 21:22:02', '::1', 'sfgfj@gmail.com', '261e7b467287b6c2578a76c0c1d303d0ccc7fe16679af0019af7d8b51a4afc3f', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '8ec10f3f4f4a88ea85fea90913c4d03f', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'sfgfj@gmail.com', '', NULL, '', NULL, NULL, NULL, NULL, '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `transcation`
--

CREATE TABLE `transcation` (
  `transcation_id` bigint(20) NOT NULL,
  `from_user_id` int(11) DEFAULT '0',
  `to_user_id` int(11) DEFAULT '0',
  `transcation_type` varchar(30) DEFAULT '',
  `time` datetime DEFAULT '0000-00-00 00:00:00',
  `from_address` varchar(50) DEFAULT NULL,
  `to_address` varchar(50) DEFAULT '0',
  `opening_amount` float DEFAULT '0',
  `trans_amount` float DEFAULT '0',
  `closing_amount` float DEFAULT '0',
  `fee` double DEFAULT '0',
  `confirmations` varchar(200) DEFAULT '',
  `txid` varchar(500) DEFAULT '',
  `info` varchar(500) DEFAULT '',
  `otp_value` varchar(10) DEFAULT '',
  `is_processed` tinyint(4) DEFAULT '0',
  `creation_ip` varchar(20) DEFAULT '',
  `creation_date` datetime DEFAULT '0000-00-00 00:00:00',
  `is_deleted` tinyint(4) DEFAULT '0',
  `last_modification_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `date` varchar(300) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `username` varchar(65) NOT NULL,
  `encrypt_username` varchar(500) DEFAULT '',
  `password` varchar(300) NOT NULL,
  `transcation_password` varchar(500) DEFAULT '',
  `email` varchar(200) DEFAULT '',
  `wallet_address` varchar(255) DEFAULT '',
  `admin` varchar(1) DEFAULT NULL,
  `locked` varchar(1) DEFAULT NULL,
  `supportpin` varchar(6) DEFAULT NULL,
  `secret` varchar(16) DEFAULT NULL,
  `authused` varchar(1) DEFAULT NULL,
  `otp_value` varchar(500) DEFAULT '',
  `is_email_verify` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `date`, `ip`, `username`, `encrypt_username`, `password`, `transcation_password`, `email`, `wallet_address`, `admin`, `locked`, `supportpin`, `secret`, `authused`, `otp_value`, `is_email_verify`) VALUES
(27, '2017-10-14 00:56:52', '171.50.187.164', 'saddam.husen1997@gmail.com', 'ecb03163c979076fd771a265ee0c60be9f36f5c832f3e9f574ae3c8ca267afef', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', 'saddam.husen1997@gmail.com', '', NULL, '1', NULL, NULL, NULL, '', 0),
(28, '2017-10-14 02:19:57', '171.50.187.164', 'priyanka22@gmail.com', '2f6e8e5625789f33febdcf7647aa5eabc21af73856ac66225af02461e241da14', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', 'priyanka22@gmail.com', '', '1', '1', NULL, NULL, NULL, '', 0),
(29, '2017-10-14 02:57:24', '171.50.187.164', 'pennytech@gmail.com', '720951ed12e4896cefb4a53287a65b7e3a075362dafd4e1a6bdcabb06fb3255d', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', 'pennytech@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 0),
(30, '2017-10-14 03:14:31', '171.50.187.164', 'tech123@gmail.com', '3b96d85dd13ca83f1cd544a62621a5069b5b0ce3e7e6fb910db25e102bfc4b08', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', 'tech123@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 0),
(31, '2017-10-14 03:27:03', '171.50.187.164', 'pennyggn@gmail.com', 'cb4a09d1aed749568db6dfb1a0097078412bd589eef9c8e8b05d4911d5621c80', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', 'pennyggn@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 0),
(32, '2017-10-14 03:49:41', '171.50.188.120', 'penny.dharmveer@gmail.com', '96d9ecb93aa49426625b2e0a513c0b9948b51939f5b32e19752cf686e9465df1', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'penny.dharmveer@gmail.com', '', '1', NULL, NULL, NULL, NULL, '', 0),
(33, '2017-10-14 10:28:01', '49.34.165.69', 'rmpharmony@gmail.com', 'ee3dd8e9155a228085e928039c59ea55027eee41e6a47eac6c5cae9c00cfe0fe', '8376a2edac4c49ffcf39f445e7844822f93141a92674a2f61ad77452b5dd7145', 'ec177fc4eb5e426b5a7c5f4251872923d1b3be39a553666152b8cea97c60d6de', 'rmpharmony@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 0),
(34, '2017-10-14 18:40:20', '122.162.36.233', 'Pennybase.tech@gmail.com', '343bbefaa335b8b6b01076cb5faef4f2b6db3e452094589ec133ff1894537808', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Pennybase.tech@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 0),
(35, '2017-10-14 18:50:31', '122.162.36.233', 'asdf@asdf.asdf', '9b631491c8228ac02ec4451408dd72cdba197e84d764e7953710b4d9e9cbdf15', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', 'asdf@asdf.asdf', '', NULL, '1', NULL, NULL, NULL, '', 0),
(36, '2017-10-15 20:52:18', '27.56.185.128', 'penny.arjun@gmail.com', 'e922f3419716a90766da52712c945054e473cbc42fdcf31f6c8a86093f48c4e8', '6a7d96c1d822367a30de9e6c41a227f6b69e2cc0123a9bf48c8f21e4e9a7e154', '637d8872cf08b07bc62512fab1dee2340524161a574126d670634227af393397', 'penny.arjun@gmail.com', '', NULL, NULL, NULL, NULL, NULL, '', 0),
(37, '2017-10-15 22:55:08', '182.68.3.11', 'wallet.ebt@mail.com', '0cf9a48a0a21a7686b1b30a11cfd63f72835edec9324f6b4accc76e43f1d69e8', '9965dc3ca46e35955b70d3e5bd9a0d2c1af88146b2d35ab71df48a88347f5d59', '9965dc3ca46e35955b70d3e5bd9a0d2c1af88146b2d35ab71df48a88347f5d59', 'wallet.ebt@mail.com', '', '1', NULL, NULL, NULL, NULL, '', 0),
(38, '2017-10-16 03:24:41', '182.68.3.11', 'demo@demo.com', '9956d6a8168de87560ad6918838818f2c3a1995f2575285da6609a748322863c', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'demo@demo.com', '', NULL, NULL, NULL, NULL, NULL, '', 0),
(39, '2017-10-24 17:53:25', '127.0.0.1', 'asdf@asdf.asdf', '9b631491c8228ac02ec4451408dd72cdba197e84d764e7953710b4d9e9cbdf15', '88d4266fd4e6338d13b845fcf289579d209c897823b9217da3e161936f031589', '88d4266fd4e6338d13b845fcf289579d209c897823b9217da3e161936f031589', 'asdf@asdf.asdf', '', NULL, NULL, NULL, NULL, NULL, '', 0),
(40, '2017-10-24 17:54:52', '127.0.0.1', 'asdf@asdf.asdf', '9b631491c8228ac02ec4451408dd72cdba197e84d764e7953710b4d9e9cbdf15', '88d4266fd4e6338d13b845fcf289579d209c897823b9217da3e161936f031589', '88d4266fd4e6338d13b845fcf289579d209c897823b9217da3e161936f031589', 'asdf@asdf.asdf', '', NULL, NULL, NULL, NULL, NULL, '', 0),
(41, '2017-10-24 17:56:17', '127.0.0.1', 'asdf@asdf.asdf', '9b631491c8228ac02ec4451408dd72cdba197e84d764e7953710b4d9e9cbdf15', '88d4266fd4e6338d13b845fcf289579d209c897823b9217da3e161936f031589', '88d4266fd4e6338d13b845fcf289579d209c897823b9217da3e161936f031589', 'asdf@asdf.asdf', '', NULL, NULL, NULL, NULL, NULL, '', 0),
(42, '2017-10-24 17:56:41', '127.0.0.1', 'asdf@asdf.asdf', '9b631491c8228ac02ec4451408dd72cdba197e84d764e7953710b4d9e9cbdf15', '88d4266fd4e6338d13b845fcf289579d209c897823b9217da3e161936f031589', '88d4266fd4e6338d13b845fcf289579d209c897823b9217da3e161936f031589', 'asdf@asdf.asdf', '', NULL, NULL, NULL, NULL, NULL, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `currency` varchar(20) NOT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authorization`
--
ALTER TABLE `authorization`
  ADD PRIMARY KEY (`authorization_id`);

--
-- Indexes for table `transcation`
--
ALTER TABLE `transcation`
  ADD PRIMARY KEY (`transcation_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authorization`
--
ALTER TABLE `authorization`
  MODIFY `authorization_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transcation`
--
ALTER TABLE `transcation`
  MODIFY `transcation_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
