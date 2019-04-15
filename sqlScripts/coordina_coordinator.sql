-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2019 at 09:59 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coordina_coordinator`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id` int(11) NOT NULL,
  `title` varchar(70) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `title`, `content`, `image`) VALUES
(1, 'GET HEARD. BE SEEN.  DRIVE RESULTS', '<p>One stop solution to all your marketing concerns</p>\r\n\r\n<p>Coordinator Marketing &amp; Services is an online and digital brand management company that specializes in small businesses.</p>\r\n\r\n<p>We combine traditional marketing methods with innovative digital advertising solutions to promote and increase your brand presence online.</p>\r\n\r\n<p>Increasing webfoot traffic by developing advertisements, consistent updates and constant interaction with followers.</p>\r\n\r\n<p>Coordinator Marketing &amp; Services compared to its competitors strictly helps brand your company on all digital and social media platforms for guaranteed positive results.</p>\r\n', 'images/aboutus_images/social20190411165510.png');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `videoURL` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `videoURL`) VALUES
(1, 'images/banner_videos/cms20190411181148.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(70) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(70) NOT NULL,
  `tags` varchar(70) NOT NULL,
  `arthor` varchar(100) NOT NULL,
  `dateofcreation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `content`, `image`, `tags`, `arthor`, `dateofcreation`) VALUES
(6, 'New post', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', 'images/blog_images/Chicken-Karahi-Boneless20190411153844.jpg', 'food, karahi', 'John', '2019-04-15'),
(7, 'Elexir', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n', 'images/blog_images/Carnivent20190411154331.png', 'abcd, efgh', 'John', '2019-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `image`) VALUES
(1, 'images/client_images/codeitlab.png'),
(2, 'images/client_images/PrivySol logo.png'),
(3, 'images/client_images/WhatsApp Image 2019-03-24 at 9.58.12 PM.jpeg'),
(4, 'images/client_images/WhatsApp Image 201q9-03-24 at 9.58.12 PM.jpeg'),
(8, 'images/client_images/audit-client20190411143037.png');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `address` varchar(70) NOT NULL,
  `phoneNo` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `workTime` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `address`, `phoneNo`, `email`, `workTime`) VALUES
(1, 'Global Business Centre.,Office No R11', '33322106', 'info@cms.qa', 'Sun. - Thurs. 08:00 - 18:00');

-- --------------------------------------------------------

--
-- Table structure for table `contactus_user`
--

CREATE TABLE `contactus_user` (
  `id` int(11) NOT NULL,
  `userName` longtext NOT NULL,
  `email` longtext NOT NULL,
  `website` longtext NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contactus_user`
--

INSERT INTO `contactus_user` (`id`, `userName`, `email`, `website`, `message`) VALUES
(1, 'Abdullah', 'Email@gmail.com', 'www.google.com', 'new asijhdsakjd'),
(2, 'abdullah', 'abdulla@gmail.com', 'htpps://www.example.com', 'some message ');

-- --------------------------------------------------------

--
-- Table structure for table `funfacts`
--

CREATE TABLE `funfacts` (
  `id` int(11) NOT NULL,
  `creativeWork` int(11) NOT NULL,
  `satisfiedClients` int(11) NOT NULL,
  `cupsofcoffee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `funfacts`
--

INSERT INTO `funfacts` (`id`, `creativeWork`, `satisfiedClients`, `cupsofcoffee`) VALUES
(1, 674, 945, 940);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `price` int(11) NOT NULL,
  `type` longtext NOT NULL,
  `personalLocker` tinyint(1) NOT NULL,
  `freeAccess` tinyint(1) NOT NULL,
  `personalTrainer` tinyint(1) NOT NULL,
  `NutritionPlan` tinyint(1) NOT NULL,
  `FreeMassage` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `price`, `type`, `personalLocker`, `freeAccess`, `personalTrainer`, `NutritionPlan`, `FreeMassage`) VALUES
(1, 'Basic', 1, 'Monthly', 0, 1, 0, 1, 1),
(2, 'Premium', 500, 'Monthly', 1, 1, 1, 0, 0),
(3, 'Pro Plan', 600, 'Monthly', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `type` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `title`, `type`, `image`) VALUES
(1, 'Future Timeline', 'Photography, Art', 'images/portfolio_images/p0.jpg'),
(2, 'SIT AMET', 'Social Media', 'images/portfolio_images/p9.jpg'),
(8, 'Image', 'Art', 'images/portfolio_images/1 (1)20190411143008.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `image`) VALUES
(1, 'Social Media', 'Amplify your audience reach and increase the audience on social media platforms.', 'images/services_images/socialmedia.png'),
(2, 'SEO', 'In todayâ€™s world it is imperative to be found and not get lost in the crowd.', 'images/services_images/seo.png'),
(3, 'Apps', 'Everyone is a big fan of beautifully designed apps. Well-developed mobile apps is what we aim to provide you with. ', 'images/services_images/icons8-mobile-filled-100.png');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`) VALUES
(1, 'talha@gmail.com'),
(2, 'admin@keystone.com'),
(3, 'abdullah@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `image`) VALUES
(2, 'CEO', 'images/team_images/pp.jpg'),
(4, 'CTO', 'images/team_images/agent-0120190411141547.jpg'),
(5, 'PM', 'images/team_images/1 (1)20190411143057.jpg'),
(6, 'Marketing Manager', 'images/team_images/1720190413015927.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `text` varchar(70) NOT NULL,
  `author` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `text`, `author`) VALUES
(1, 'Every one of your marketing claims should be supported by evidence', 'crestodina'),
(2, 'When you say it, itâ€™s marketing. When they say it, itâ€™s social pro', 'crestodina');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@admin.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus_user`
--
ALTER TABLE `contactus_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funfacts`
--
ALTER TABLE `funfacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactus_user`
--
ALTER TABLE `contactus_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `funfacts`
--
ALTER TABLE `funfacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
