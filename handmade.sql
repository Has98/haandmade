-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 22, 2019 at 09:19 PM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `handmade`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent_id`, `title`, `icon`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Արվեստ և արհեստ', 'upload/images/categories/pin-blog1.jpg', NULL, NULL),
(2, 2, 'Տուն եւ կենցաղ', 'upload/images/categories/color1.jpg', NULL, NULL),
(3, NULL, 'Նվերներ', 'upload/images/categories/post-image9.jpg', NULL, NULL),
(4, NULL, 'Տիկնիկներ', 'upload/images/categories/sing-color1.jpg', NULL, NULL),
(5, NULL, 'Հագուստ', 'upload/images/categories/news-03.jpg', NULL, NULL),
(6, NULL, 'Զարդեր և Աքսեսուարներ', 'upload/images/categories/split-image1.1.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `object`
--

CREATE TABLE IF NOT EXISTS `object` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `price` varchar(255) NOT NULL,
  `sale_price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `object`
--

INSERT INTO `object` (`id`, `user_id`, `cat_id`, `title`, `description`, `image`, `status`, `price`, `sale_price`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Բուսական օճառ', '<p>Հակաբակտերիալ օճառը մաքրում է բակտերիաների 99%-ը և ստեղծում պաշտպանիչ շերտ` սահմանափակելով շրջակա միջավայրի վնասակար ազդեցությունը մաշկի վրա: </p>', 'upload/images/products/bn3.jpg', 1, '1500 դր․', NULL, NULL, NULL),
(10, 6, 6, 'Ականջօղեր', '<p>Գեղեցիկ ականջօղեր վզնոց պատրաստված բաց երկնագույն բիսերից եւ մետաղական աքսեսուարներից։</p>', 'upload/images/products/dd9f1c83f2de8285a8b7c7609698--ukrasheniya-sergi-oskar-de-la-renta-iz-bisera-golubye.jpg', 1, '6000', NULL, NULL, NULL),
(11, 6, 5, 'Գլխարկներ, Ձեռնոցներ, Շարֆեր', 'Նորաձև ձեռագործ գլխարկների մեծ տեսականի։', 'upload/images/products/60416038-bufanda-de-punto-para-hombre-frío-día-de-invierno-manía-ocio-con-el-regalo-hecho-a-mano-para-el-día-de-padre.jpg', 1, '8000', NULL, NULL, NULL),
(12, 1, 1, 'Դիմանկար', '<p>Ընդունվում են դիմանկարների պատվերներ։</p>', 'upload/images/products/dd594e241abf617abed2b7d586c19ef9--female-portrait-model-portraits.jpg', 1, '5000', NULL, NULL, NULL),
(13, 3, 2, 'Փայտե կենցաղային իրեր', '<p>Փայտե շերեփների պատվերներ։ Անվճար առաքում ՀՀ֊ում։</p>', 'upload/images/products/Nicks-Wood-Shop-spoons.png', 1, '3000', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role_id`, `first_name`, `last_name`, `email`, `phone`, `age`, `gender`, `avatar`, `auth_key`, `password`, `password_reset_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Has', 'Hakobyan', 'has.mik.1998@mail.ru', '098246555', 20, 'female', 'upload/images/users/18013153_626771044188213_5606458374699876352_n.jpg', 'RZs4XsOtKTFAvaYYJDJcK4eN5ruTISKx', '$2y$10$gRG34kgDbxMXAMtLkfM9BeWObpHuX1hvhXiZs7b4oJdrjTf9FxFDm', '', 10, NULL, '2019-01-22 16:16:14'),
(2, 2, 'Aram', 'Hakobyan', 'aram@mail.u', '98236555', 25, '', 'upload/images/users/user_accounts.png', NULL, '$2y$13$tPVf2avmKtnupo3dIJDWveceEIZ4aQeEMUjxOCyF0XgJnAxW79kdC', NULL, 0, '2019-01-19 18:41:46', '2019-01-22 16:19:00'),
(3, 3, 'Aram', 'Hakobyan', 'aram1@mail.u', '98236555', 25, 'c', NULL, NULL, '$2y$13$8eZgegCiNYdR9oyHlxshtO5iWhJ5OendDFO3lAnVjYNm.IcgkqLBK', NULL, 0, '2019-01-19 18:42:30', '2019-01-19 18:42:30'),
(4, 3, 'Aram', 'Hakobyan', '4aram1@mail.u', '98236555', 25, 'c', NULL, NULL, '$2y$13$671NODoTjvCXRcnwJfT7AOv6zSn5m9o3KMmK9tflTRdx52HhKX70e', NULL, 0, '2019-01-19 18:42:42', '2019-01-19 18:42:42'),
(5, 3, 'Poxos', 'Poxosyan', 'has.mik.98@mail.ru', '098236555', 25, 'b', NULL, NULL, '$2y$13$hJnwrwRBbW3fV18mqSRQL.SmJJFdW0wkEyGJo9mYqHDQbEyNFh/Ia', NULL, 0, '2019-01-19 18:45:37', '2019-01-19 18:45:37'),
(6, 3, 'Hasmik', 'Hakobyan', 'has.mik.19984@mail.ru', '098246555', 21, 'female', NULL, 'h9-nwx4kul0Zim3aKkV9SDfcf4fcoSdy', '$2y$13$7ZSxpw9fHYbAqAPg9.BPcO1YM8XhEcGymSPLlOgDxxQJW3TPDRy1u', NULL, 10, '2019-01-20 18:30:00', '2019-01-20 18:30:00'),
(7, 2, 'Hasmik', 'Hakobyan', 'has.mik.19948@mail.ru', '098246555', 10, 'female', 'upload/images/users/received_1779127809027317.jpeg', 'vqIpUWLpygBmlmFFt3KjKSOQCAq5wKTr', '$2y$13$F8hhWLgaBkmcpFchnczvDesPt6RJhlJO2s6khPKu1MhpmOrEqeNyW', NULL, 10, '2019-01-21 19:05:51', '2019-01-22 16:17:09'),
(8, 3, 'Hasmik', 'Hakobyan', 'has.mik.19984s@mail.ru', '098256555', 25, 'female', NULL, 'igrJGFi_-uzvabKNfak10HsrvJQYPDS5', '$2y$13$7JYrxUl1DRDj6mPYQnrFbOjop.DRvrNciyYk5hpWiib1XVcVJSX4y', NULL, 10, '2019-01-22 06:38:46', '2019-01-22 06:38:46'),
(9, 3, 'Ann', 'Smith', 'has.mik.19918@mail.ru', '023651', 25, 'female', NULL, 'MIRISew-R6mtbmBmaqEejAFGTyonXEtB', '$2y$13$vo.hMq7gGvZH.WmB7XTCRuEt4XSQ1byt/TK9mNwkAphlkIiZLgrDy', NULL, 10, '2019-01-22 06:40:08', '2019-01-22 06:40:08'),
(10, 3, 'Ann', 'Hakobyan', 'admin@mail.ru', '200', 21, 'female', NULL, 'DqOUuWEJAFmTGDipxTTi6RCvHqltsBn-', '$2y$13$9fD3kETNr1riw9xTvzpJEe1EfnVVVD6/fXU/Y1Sdn8b.ark60BCSy', NULL, 10, '2019-01-22 06:41:59', '2019-01-22 06:41:59');

-- --------------------------------------------------------

--
-- Table structure for table `user_shop`
--

CREATE TABLE IF NOT EXISTS `user_shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `shop_title` varchar(255) NOT NULL,
  `shop_logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
