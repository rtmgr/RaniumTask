-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2019 at 05:40 AM
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
-- Database: `ranium`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `email` varchar(50) NOT NULL,
  `id` int(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `content` varchar(50000) NOT NULL,
  `intro` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`email`, `id`, `title`, `author`, `content`, `intro`, `date`, `category`) VALUES
('laurawhite@gmail.com', 1, 'An Intro To PHP', 'Laura White', 'PHP stands for PHP Hypertext Preprocessor and is a stable programming language that has been around since 1995. It is a server-side language that powers as much as 80% of the web. Yes, that’s correct: up to 80% of the back end all websites are built with PHP. Because PHP is a server-side language (also called a backend language), you need to be connected to a web server in order to learn it. Unlike HTML, CSS and JavaScript which can run in your browser, you must be connect to a server to execute your PHP code.\r\n\r\nOnce you have an understanding of how to structure a webpage with HTML and add some basic styling with CSS, you’re ready to learn PHP. When you’re starting out, you’ll learn how to embed PHP code into HTML and how the PHP programming language works with HTML.', 'PHP stands for PHP Hypertext Preprocessor and is a stable programming language that has been around since 1995. It is a server-side language that powers as much as 80% of the web. Yes, that’s correct:', '2019-02-28 12:48:48', 'PHP'),
('tiffany.domena@yahoo.com', 2, 'PHP Is a Good Choice for First-Time Programmers', 'Tiffany Domena', 'If you have no prior programming experience, then PHP is a good first language to learn. It does require you to install and set up your own web server, but a decent course on PHP will walk you through that process.\r\n\r\nSome will argue that JavaScript is a good first language to learn because minimal set up is required, but compared to JavaScript, PHP is an easier language for first-time programmers to learn. The JavaScript programming language is continually evolving, and developers and engineers are continually extending the language, and aspiring web developers often have difficulty keeping up with the continual changes to the language. In addition, JavaScript underwent a rather significant re-write with ES6 (also called ECMAScript2015) a few years ago, so new programmers, once they are comfortable with JavaScript basics, then have to learn an entirely new syntax. When I had first started learning JavaScript, I struggled considerably and had better luck learning introductory programming with PHP.\r\n\r\nA community of web developersIn contrast to JavaScript, PHP is a very stable language, and with the right course, a beginner will not have a problem learning the basics of PHP programming. The global community for PHP developers is robust and widespread, so there is a lot of support for the language. It is popular enough that if you run into a challenge that you’re having difficulty solving, chances are that another web developer has had the same issue and written about it. This is an important consideration when you are getting started. Working with a popular programming language means you will find answers to issues you encounter. In addition, the PHP Manual is a great place to look for answers when you encounter difficult challenges.\r\n\r\nAs you learn PHP, you will learn all about how the web works on the back end. As an aspiring web developer, it is immensely helpful for you to know how all the different parts of the web work together, and learning PHP will give you that knowledge. Another skill that you will likely learn with PHP is MySQL, which is an extremely popular database. Developers who know how to write proper SQL queries to retrieve information from databases are continually in demand.', 'If you have no prior programming experience, then PHP is a good first language to learn. It does require you to install and set up your own web server,', '2019-02-28 12:53:21', 'PHP'),
('laurawhite@gmail.com', 3, 'How to Stop Spam Bots from Visiting Your Website', 'Laura White', 'What is Referrer Spam and How Does It Work?\r\n\r\nReferrer spam (also called referral spam) is a process through which a spammer accesses a website through a Google Analytics account. It works like this:\r\nThe spammer sends a number of fake visits to a website.\r\nThe website administrator logs into Google Analytics, sees the “referral”, gets curious about the referring website, and clicks on the link.\r\nOnce the website administrator clicks on the link, the spammer gains a visit to his website.\r\nThese spamming techniques are quite sophisticated. The spam bots visiting your website sometimes don’t actually visit your actual website. They bypass the process, sending a visit to Google Analytics.\r\n\r\nWhy is Referrer Spam Harmful?\r\nReferrer spam is harmful for a couple of reasons:\r\n\r\n1. It wreaks havoc on your bounce rate. A website that has a bounce rate of 100% means that all users go to just one webpage and leave. It is an indication that they are not engaging with your website on a deep level. If a bot is repeatedly visiting one page of your website and leaving right away, it is artificially inflating your bounce rate. A bot will most likely visit your homepage and then leave. If the homepage of your website serves to entice users to explore other areas of your site, then a high bounce rate is a bad thing. It means that visitors are not engaging with your content.\r\n\r\n2. It can inflate your metrics for international traffic. One of the last bots to visit my website sent referral spam from all over the world. When I logged in, I was very pleased to see all the traffic I had received that day from India, South America, and Europe. I was very excited until I discover that most of my international traffic that day was from referrer spam. I sat and watched my real time screen for a moment and actually saw the same bot ping my website from two different locations. This was, indeed, a sophisticated bot. After gazing at it in wonder for a few moments, I shook off my amazement and got to work blocking the offending websites.\r\n\r\nMethod 1: Plugin for WordPress Websites\r\nimage of the block referer spam pluginIf you maintain a WordPress website, there is a good plugin that you can use to block referrer spam. It is the “Block Referer Spam” plugin. I almost didn’t recommend it since “referrer” is not spelled correctly and it hasn’t been updated for one year. Other plugins I tried, though, failed to get rid of the referral spam, so I installed the “Block Referer Spam” plugin on one of the WordPress websites that I maintain, and I am happy to share that the plugin works.\r\n\r\nMethod 2: Edit the Htaccess File (for Advanced Users)\r\nTypically, a web developer can add the offending website to a robot.txt file as a blocked URL, and that would prevent the spam bot from visiting the website. In more recent years, however, bots have gotten more sophisticated. They are now capable of completely overriding the robot.txt file and sending fake visits to Google Analytics without ever actually visiting a website. If this is enough to make your head spin, read on, and I will show how this happens since it is actually something you can see in Google Analytics.\r\n\r\nHere is an example from this website You Can Learn How to Code. Around the middle of the morning on Friday, August 17, I became aware that a bot had been visiting my website repeatedly the last two days. As you can see, the top result is some odd variation of my home page. Until I realized what was going on, the bot hit my Google Analytics with 45 visits. The next result is my actual homepage, which demonstrates that the bot was sending fake visits.', 'What is Referrer Spam and How Does It Work?\r\n\r\nReferrer spam (also called referral spam) is a process through which a spammer accesses a website through a Google Analytics account. It works like this:', '2019-03-01 04:22:52', 'Fight Spam');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(20) NOT NULL,
  `comment_id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comment_content` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`email`, `password`, `name`) VALUES
('laurawhite@gmail.com', 'passwordabc', 'Laura White'),
('tiffany.domena@yahoo.com', 'pass@tiff213', 'Tiffany Domena');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD UNIQUE KEY `comment_id` (`comment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
