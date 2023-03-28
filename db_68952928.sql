-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 28, 2023 at 01:09 AM
-- Server version: 5.5.68-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_68952928`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` bigint(20) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `description`) VALUES
(1, 'Basketball', 'All about basketball.'),
(2, 'Football', 'Everything related to football.'),
(3, 'Gymnastics', 'Discussions and advice on gymnastics.'),
(4, 'NBA', 'All about the National Basketball Association.'),
(5, 'Soccer', 'Everything related to soccer.'),
(6, 'Olympics', 'Discussions and records about the Olympic Games.'),
(7, 'Football', 'All things football'),
(8, 'Basketball', 'All things basketball'),
(9, 'Baseball', 'All things baseball');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` bigint(20) unsigned NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `user_id`, `body`, `updated_at`) VALUES
(1, 1, 2, 'Great post! I really enjoyed reading this.', '2023-03-26 03:19:24'),
(3, 2, 1, 'I disagree with your point of view.', '2023-03-26 03:19:24'),
(4, 2, 4, 'I think you make a valid argument.', '2023-03-26 03:19:24'),
(5, 3, 5, 'This is a well-researched article.', '2023-03-26 03:19:24'),
(6, 4, 2, 'I had a similar experience.', '2023-03-26 03:19:24'),
(8, 5, 4, 'I have some additional insights to add.', '2023-03-26 03:19:24'),
(9, 5, 1, 'I found this very helpful. Thank you!', '2023-03-26 03:19:24'),
(10, 5, 3, 'I think you missed an important point.', '2023-03-26 03:19:24'),
(12, 2, 38, 'they are a very good team!', '2023-03-27 06:15:54'),
(13, 6, 38, 'I also think so! ', '2023-03-27 06:40:12'),
(14, 1, 39, 'GOLDEN STATE TILL I DIE', '2023-03-27 09:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `downvotes`
--

CREATE TABLE IF NOT EXISTS `downvotes` (
  `downvote_id` bigint(20) unsigned NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `downvotes`
--

INSERT INTO `downvotes` (`downvote_id`, `post_id`, `user_id`, `created_at`) VALUES
(1, 2, 1, '2023-03-23 07:37:29'),
(2, 3, 2, '2023-03-23 07:37:29'),
(3, 5, 3, '2023-03-23 07:37:29'),
(4, 2, 3, '2023-03-24 14:41:56'),
(5, 3, 4, '2023-03-24 14:41:56'),
(6, 4, 1, '2023-03-24 14:41:56'),
(7, 5, 4, '2023-03-24 14:41:56'),
(8, 6, 3, '2023-03-24 14:41:56');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` bigint(20) unsigned NOT NULL,
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `topic_id`, `user_id`, `body`, `updated_at`) VALUES
(1, 1, 2, 'My favorite basketball team is the Golden State Warriors.', '2023-03-23 07:37:28'),
(2, 1, 3, 'I really like the Miami Heat.', '2023-03-23 07:37:28'),
(3, 2, 1, 'In my opinion, Lionel Messi is the best football player ever.', '2023-03-23 07:37:28'),
(4, 3, 2, 'Does anyone have any advice for improving balance on the balance beam?', '2023-03-23 07:37:28'),
(5, 3, 3, 'I find it helpful to focus on my breathing and staying relaxed during my routine.', '2023-03-23 07:37:28'),
(6, 1, 3, 'I think the Lakers will win the NBA finals this year.', '2023-03-24 14:41:56'),
(7, 1, 4, 'I disagree, I think the Nets will come out on top.', '2023-03-24 14:41:56'),
(8, 2, 1, 'I prefer the 4-3-3 formation in soccer.', '2023-03-24 14:41:56'),
(9, 2, 2, 'I find the 3-5-2 to be more effective.', '2023-03-24 14:41:56'),
(10, 3, 4, 'Did you know that Usain Bolt holds the record for the fastest 100m sprint ever?', '2023-03-24 14:41:56'),
(12, 1, 3, 'I think the Lakers will win the NBA finals this year.', '2023-03-24 14:46:44'),
(13, 1, 4, 'I disagree, I think the Nets will come out on top.', '2023-03-24 14:46:44'),
(14, 14, 41, 'I love basketball', '2023-03-27 08:46:20'),
(15, 15, 36, 'For the money?!', '2023-03-27 08:48:43'),
(16, 16, 38, 'I think he should go to the canucks', '2023-03-27 23:50:02');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `topic_id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `title`, `description`, `created_by`, `updated_at`) VALUES
(1, 'Favorite Basketball Teams', 'A discussion about your favorite basketball teams.', 1, '2023-03-23 07:37:28'),
(2, 'Top Football Players', 'Ranking the best football players of all time.', 2, '2023-03-23 07:37:28'),
(3, 'Gymnastics Techniques', 'Tips and advice on improving your gymnastics skills.', 3, '2023-03-23 07:37:28'),
(4, 'The NBA Finals', 'Discussing the NBA finals and predictions for the winner.', 2, '2023-03-24 14:41:56'),
(5, 'Soccer Tactics', 'Analyzing different soccer tactics and formations.', 4, '2023-03-24 14:41:56'),
(6, 'Olympic Records', 'Sharing and discussing the most impressive Olympic records in history.', 3, '2023-03-24 14:41:56'),
(7, 'The NBA Finals', 'Discussing the NBA finals and predictions for the winner.', 2, '2023-03-24 14:46:44'),
(8, 'Soccer Tactics', 'Analyzing different soccer tactics and formations.', 4, '2023-03-24 14:46:44'),
(9, 'Olympic Records', 'Sharing and discussing the most impressive Olympic records in history.', 3, '2023-03-24 14:46:44'),
(10, 'Favorite Football Team', 'Who is your favorite football team?', 2, '2023-03-26 14:36:47'),
(11, 'Basketball Season Predictions', 'Who will win the NBA championship this year?', 5, '2023-03-26 14:36:47'),
(12, 'Baseball Stats Discussion', 'What are some interesting baseball stats?', 8, '2023-03-26 14:36:47'),
(13, 'Neymar to Chelsea?', '', 38, '2023-03-27 12:59:24'),
(14, 'Sports', '', 41, '2023-03-27 08:46:20'),
(15, 'Messi to Saudi?', '', 36, '2023-03-27 08:48:43'),
(16, 'where will Bedard go? ', '', 38, '2023-03-27 23:50:02');

-- --------------------------------------------------------

--
-- Table structure for table `topic_categories`
--

CREATE TABLE IF NOT EXISTS `topic_categories` (
  `topic_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic_categories`
--

INSERT INTO `topic_categories` (`topic_id`, `category_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `upvotes`
--

CREATE TABLE IF NOT EXISTS `upvotes` (
  `upvote_id` bigint(20) unsigned NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upvotes`
--

INSERT INTO `upvotes` (`upvote_id`, `post_id`, `user_id`, `created_at`) VALUES
(1, 1, 3, '2023-03-23 07:37:28'),
(2, 3, 1, '2023-03-23 07:37:28'),
(3, 4, 2, '2023-03-23 07:37:28'),
(4, 1, 4, '2023-03-24 14:41:56'),
(5, 4, 3, '2023-03-24 14:41:56'),
(6, 5, 2, '2023-03-24 14:41:56'),
(7, 6, 2, '2023-03-24 14:41:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` bigint(20) unsigned NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `updated_at`, `is_admin`) VALUES
(1, 'john_doe', 'john_doe@example.com', 'password123', '2023-03-23 07:37:28', 0),
(2, 'jane_smith', 'jane_smith@example.com', 'pass456', '2023-03-23 07:37:28', 1),
(3, 'bob_jones', 'bob_jones@example.com', 'pass789', '2023-03-23 07:37:28', 0),
(4, 'sam_jackson', 'sam_jackson@example.com', 'password123', '2023-03-24 14:41:56', 0),
(5, 'lisa_smith', 'lisa_smith@example.com', 'pass456', '2023-03-24 14:41:56', 0),
(6, 'mike_robinson', 'mike_robinson@example.com', 'pass789', '2023-03-24 14:41:56', 0),
(19, 'srand', 'srand@example.com', 'password123', '2023-03-24 14:46:44', 0),
(20, 'MyNameisLily', 'lilyNams@example.com', 'pass456', '2023-03-24 14:46:44', 0),
(21, 'elloLive', 'ellolive@example.com', 'pass789', '2023-03-24 14:46:44', 0),
(23, 'aj123', 'aj@live.ca', 'abc', '2023-03-26 07:43:35', 0),
(26, 'romp', 'rpm@live.ca', 'yes yse', '2023-03-26 07:48:16', 0),
(27, 'minnie', 'minniem@gmail', 'minnie', '2023-03-26 07:50:07', 0),
(28, 'ak123', 'loosebars77@gmail.com', 'pass77', '2023-03-26 08:01:05', 0),
(29, 'jane123', 'jane@example.com', 'password', '2023-03-26 14:36:47', 0),
(30, 'jessica_l', 'jessica@example.com', 'password', '2023-03-26 14:36:47', 0),
(31, 'jacobt', 'jacob@example.com', 'password', '2023-03-26 14:36:47', 0),
(32, 'kyle_m', 'kyle@example.com', 'password', '2023-03-26 14:36:47', 0),
(33, 'linda_34', 'linda@example.com', 'password', '2023-03-26 14:36:47', 0),
(34, 'maria88', 'maria@example.com', 'password', '2023-03-26 14:36:47', 0),
(35, 'matt23', 'matt@example.com', 'password', '2023-03-26 14:36:47', 0),
(36, 'nickm', 'nick@example.com', 'password', '2023-03-26 14:36:47', 1),
(37, 'olivia_w', 'olivia@example.com', 'password', '2023-03-26 14:36:47', 0),
(38, 'test', 'test@gmail.com', 'test', '2023-03-27 02:25:16', 0),
(39, 'akka', 'akka@example.com', 'AKKA', '2023-03-27 09:07:33', 0),
(40, 'dsf', 'FSD@s.co', 'sdf', '2023-03-27 08:44:39', 0),
(41, 'asdf', 'asdf@asdf.asdf', 'asdf', '2023-03-27 08:45:17', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_id` (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD UNIQUE KEY `comment_id` (`comment_id`);

--
-- Indexes for table `downvotes`
--
ALTER TABLE `downvotes`
  ADD PRIMARY KEY (`downvote_id`),
  ADD UNIQUE KEY `downvote_id` (`downvote_id`),
  ADD UNIQUE KEY `post_id` (`post_id`,`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`),
  ADD UNIQUE KEY `topic_id` (`topic_id`);

--
-- Indexes for table `topic_categories`
--
ALTER TABLE `topic_categories`
  ADD PRIMARY KEY (`topic_id`,`category_id`);

--
-- Indexes for table `upvotes`
--
ALTER TABLE `upvotes`
  ADD PRIMARY KEY (`upvote_id`),
  ADD UNIQUE KEY `upvote_id` (`upvote_id`),
  ADD UNIQUE KEY `post_id` (`post_id`,`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `downvotes`
--
ALTER TABLE `downvotes`
  MODIFY `downvote_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `upvotes`
--
ALTER TABLE `upvotes`
  MODIFY `upvote_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
