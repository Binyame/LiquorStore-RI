-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2020 at 12:17 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rhodeislDBifwqz`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_commentmeta`
--

CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_comments`
--

CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) UNSIGNED NOT NULL,
  `comment_post_ID` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_comments`
--

INSERT INTO `wp_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'A WordPress Commenter', 'wapuu@wordpress.example', 'https://wordpress.org/', '', '2020-02-05 09:54:48', '2020-02-05 09:54:48', 'Hi, this is a comment.\nTo get started with moderating, editing, and deleting comments, please visit the Comments screen in the dashboard.\nCommenter avatars come from <a href=\"https://gravatar.com\">Gravatar</a>.', 0, '1', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_links`
--

CREATE TABLE `wp_links` (
  `link_id` bigint(20) UNSIGNED NOT NULL,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_options`
--

CREATE TABLE `wp_options` (
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'http://www.rhodeislandliquors.dev.cc', 'yes'),
(2, 'home', 'http://www.rhodeislandliquors.dev.cc', 'yes'),
(3, 'blogname', 'Rhode Island Liquors', 'yes'),
(4, 'blogdescription', 'Just another WordPress site', 'yes'),
(5, 'users_can_register', '0', 'yes'),
(6, 'admin_email', 'binephrem@gmail.com', 'yes'),
(7, 'start_of_week', '1', 'yes'),
(8, 'use_balanceTags', '0', 'yes'),
(9, 'use_smilies', '1', 'yes'),
(10, 'require_name_email', '1', 'yes'),
(11, 'comments_notify', '1', 'yes'),
(12, 'posts_per_rss', '10', 'yes'),
(13, 'rss_use_excerpt', '0', 'yes'),
(14, 'mailserver_url', 'mail.example.com', 'yes'),
(15, 'mailserver_login', 'login@example.com', 'yes'),
(16, 'mailserver_pass', 'password', 'yes'),
(17, 'mailserver_port', '110', 'yes'),
(18, 'default_category', '1', 'yes'),
(19, 'default_comment_status', 'open', 'yes'),
(20, 'default_ping_status', 'open', 'yes'),
(21, 'default_pingback_flag', '0', 'yes'),
(22, 'posts_per_page', '10', 'yes'),
(23, 'date_format', 'F j, Y', 'yes'),
(24, 'time_format', 'g:i a', 'yes'),
(25, 'links_updated_date_format', 'F j, Y g:i a', 'yes'),
(26, 'comment_moderation', '0', 'yes'),
(27, 'moderation_notify', '1', 'yes'),
(28, 'permalink_structure', '/%year%/%monthnum%/%day%/%postname%/', 'yes'),
(29, 'rewrite_rules', 'a:401:{s:28:\"tribe/events/kitchen-sink/?$\";s:69:\"index.php?post_type=tribe_events&tribe_events_views_kitchen_sink=page\";s:93:\"tribe/events/kitchen-sink/(page|grid|typographical|elements|events-bar|navigation|manager)/?$\";s:76:\"index.php?post_type=tribe_events&tribe_events_views_kitchen_sink=$matches[1]\";s:28:\"event-aggregator/(insert)/?$\";s:53:\"index.php?tribe-aggregator=1&tribe-action=$matches[1]\";s:25:\"(?:event)/([^/]+)/ical/?$\";s:56:\"index.php?ical=1&name=$matches[1]&post_type=tribe_events\";s:28:\"(?:events)/(?:page)/(\\d+)/?$\";s:71:\"index.php?post_type=tribe_events&eventDisplay=default&paged=$matches[1]\";s:41:\"(?:events)/(?:featured)/(?:page)/(\\d+)/?$\";s:79:\"index.php?post_type=tribe_events&featured=1&eventDisplay=list&paged=$matches[1]\";s:38:\"(?:events)/(feed|rdf|rss|rss2|atom)/?$\";s:67:\"index.php?post_type=tribe_events&eventDisplay=list&feed=$matches[1]\";s:51:\"(?:events)/(?:featured)/(feed|rdf|rss|rss2|atom)/?$\";s:78:\"index.php?post_type=tribe_events&featured=1&eventDisplay=list&feed=$matches[1]\";s:23:\"(?:events)/(?:month)/?$\";s:51:\"index.php?post_type=tribe_events&eventDisplay=month\";s:36:\"(?:events)/(?:month)/(?:featured)/?$\";s:62:\"index.php?post_type=tribe_events&eventDisplay=month&featured=1\";s:37:\"(?:events)/(?:month)/(\\d{4}-\\d{2})/?$\";s:73:\"index.php?post_type=tribe_events&eventDisplay=month&eventDate=$matches[1]\";s:37:\"(?:events)/(?:list)/(?:page)/(\\d+)/?$\";s:68:\"index.php?post_type=tribe_events&eventDisplay=list&paged=$matches[1]\";s:50:\"(?:events)/(?:list)/(?:featured)/(?:page)/(\\d+)/?$\";s:79:\"index.php?post_type=tribe_events&eventDisplay=list&featured=1&paged=$matches[1]\";s:22:\"(?:events)/(?:list)/?$\";s:50:\"index.php?post_type=tribe_events&eventDisplay=list\";s:35:\"(?:events)/(?:list)/(?:featured)/?$\";s:61:\"index.php?post_type=tribe_events&eventDisplay=list&featured=1\";s:23:\"(?:events)/(?:today)/?$\";s:49:\"index.php?post_type=tribe_events&eventDisplay=day\";s:36:\"(?:events)/(?:today)/(?:featured)/?$\";s:60:\"index.php?post_type=tribe_events&eventDisplay=day&featured=1\";s:27:\"(?:events)/(\\d{4}-\\d{2})/?$\";s:73:\"index.php?post_type=tribe_events&eventDisplay=month&eventDate=$matches[1]\";s:40:\"(?:events)/(\\d{4}-\\d{2})/(?:featured)/?$\";s:84:\"index.php?post_type=tribe_events&eventDisplay=month&eventDate=$matches[1]&featured=1\";s:33:\"(?:events)/(\\d{4}-\\d{2}-\\d{2})/?$\";s:71:\"index.php?post_type=tribe_events&eventDisplay=day&eventDate=$matches[1]\";s:46:\"(?:events)/(\\d{4}-\\d{2}-\\d{2})/(?:featured)/?$\";s:82:\"index.php?post_type=tribe_events&eventDisplay=day&eventDate=$matches[1]&featured=1\";s:26:\"(?:events)/(?:featured)/?$\";s:43:\"index.php?post_type=tribe_events&featured=1\";s:13:\"(?:events)/?$\";s:53:\"index.php?post_type=tribe_events&eventDisplay=default\";s:18:\"(?:events)/ical/?$\";s:39:\"index.php?post_type=tribe_events&ical=1\";s:31:\"(?:events)/(?:featured)/ical/?$\";s:50:\"index.php?post_type=tribe_events&ical=1&featured=1\";s:38:\"(?:events)/(\\d{4}-\\d{2}-\\d{2})/ical/?$\";s:78:\"index.php?post_type=tribe_events&ical=1&eventDisplay=day&eventDate=$matches[1]\";s:47:\"(?:events)/(\\d{4}-\\d{2}-\\d{2})/ical/featured/?$\";s:89:\"index.php?post_type=tribe_events&ical=1&eventDisplay=day&eventDate=$matches[1]&featured=1\";s:60:\"(?:events)/(?:category)/(?:[^/]+/)*([^/]+)/(?:page)/(\\d+)/?$\";s:97:\"index.php?post_type=tribe_events&tribe_events_cat=$matches[1]&eventDisplay=list&paged=$matches[2]\";s:73:\"(?:events)/(?:category)/(?:[^/]+/)*([^/]+)/(?:featured)/(?:page)/(\\d+)/?$\";s:108:\"index.php?post_type=tribe_events&tribe_events_cat=$matches[1]&featured=1&eventDisplay=list&paged=$matches[2]\";s:55:\"(?:events)/(?:category)/(?:[^/]+/)*([^/]+)/(?:month)/?$\";s:80:\"index.php?post_type=tribe_events&tribe_events_cat=$matches[1]&eventDisplay=month\";s:68:\"(?:events)/(?:category)/(?:[^/]+/)*([^/]+)/(?:month)/(?:featured)/?$\";s:91:\"index.php?post_type=tribe_events&tribe_events_cat=$matches[1]&eventDisplay=month&featured=1\";s:69:\"(?:events)/(?:category)/(?:[^/]+/)*([^/]+)/(?:list)/(?:page)/(\\d+)/?$\";s:97:\"index.php?post_type=tribe_events&tribe_events_cat=$matches[1]&eventDisplay=list&paged=$matches[2]\";s:82:\"(?:events)/(?:category)/(?:[^/]+/)*([^/]+)/(?:list)/(?:featured)/(?:page)/(\\d+)/?$\";s:108:\"index.php?post_type=tribe_events&tribe_events_cat=$matches[1]&eventDisplay=list&featured=1&paged=$matches[2]\";s:54:\"(?:events)/(?:category)/(?:[^/]+/)*([^/]+)/(?:list)/?$\";s:79:\"index.php?post_type=tribe_events&tribe_events_cat=$matches[1]&eventDisplay=list\";s:67:\"(?:events)/(?:category)/(?:[^/]+/)*([^/]+)/(?:list)/(?:featured)/?$\";s:90:\"index.php?post_type=tribe_events&tribe_events_cat=$matches[1]&eventDisplay=list&featured=1\";s:55:\"(?:events)/(?:category)/(?:[^/]+/)*([^/]+)/(?:today)/?$\";s:78:\"index.php?post_type=tribe_events&tribe_events_cat=$matches[1]&eventDisplay=day\";s:68:\"(?:events)/(?:category)/(?:[^/]+/)*([^/]+)/(?:today)/(?:featured)/?$\";s:89:\"index.php?post_type=tribe_events&tribe_events_cat=$matches[1]&eventDisplay=day&featured=1\";s:73:\"(?:events)/(?:category)/(?:[^/]+/)*([^/]+)/(?:day)/(\\d{4}-\\d{2}-\\d{2})/?$\";s:100:\"index.php?post_type=tribe_events&tribe_events_cat=$matches[1]&eventDisplay=day&eventDate=$matches[2]\";s:86:\"(?:events)/(?:category)/(?:[^/]+/)*([^/]+)/(?:day)/(\\d{4}-\\d{2}-\\d{2})/(?:featured)/?$\";s:111:\"index.php?post_type=tribe_events&tribe_events_cat=$matches[1]&eventDisplay=day&eventDate=$matches[2]&featured=1\";s:59:\"(?:events)/(?:category)/(?:[^/]+/)*([^/]+)/(\\d{4}-\\d{2})/?$\";s:102:\"index.php?post_type=tribe_events&tribe_events_cat=$matches[1]&eventDisplay=month&eventDate=$matches[2]\";s:72:\"(?:events)/(?:category)/(?:[^/]+/)*([^/]+)/(\\d{4}-\\d{2})/(?:featured)/?$\";s:113:\"index.php?post_type=tribe_events&tribe_events_cat=$matches[1]&eventDisplay=month&eventDate=$matches[2]&featured=1\";s:65:\"(?:events)/(?:category)/(?:[^/]+/)*([^/]+)/(\\d{4}-\\d{2}-\\d{2})/?$\";s:100:\"index.php?post_type=tribe_events&tribe_events_cat=$matches[1]&eventDisplay=day&eventDate=$matches[2]\";s:78:\"(?:events)/(?:category)/(?:[^/]+/)*([^/]+)/(\\d{4}-\\d{2}-\\d{2})/(?:featured)/?$\";s:111:\"index.php?post_type=tribe_events&tribe_events_cat=$matches[1]&eventDisplay=day&eventDate=$matches[2]&featured=1\";s:50:\"(?:events)/(?:category)/(?:[^/]+/)*([^/]+)/feed/?$\";s:89:\"index.php?post_type=tribe_events&tribe_events_cat=$matches[1]&eventDisplay=list&feed=rss2\";s:63:\"(?:events)/(?:category)/(?:[^/]+/)*([^/]+)/(?:featured)/feed/?$\";s:100:\"index.php?post_type=tribe_events&tribe_events_cat=$matches[1]&featured=1&eventDisplay=list&feed=rss2\";s:50:\"(?:events)/(?:category)/(?:[^/]+/)*([^/]+)/ical/?$\";s:68:\"index.php?post_type=tribe_events&tribe_events_cat=$matches[1]&ical=1\";s:63:\"(?:events)/(?:category)/(?:[^/]+/)*([^/]+)/(?:featured)/ical/?$\";s:79:\"index.php?post_type=tribe_events&tribe_events_cat=$matches[1]&featured=1&ical=1\";s:75:\"(?:events)/(?:category)/(?:[^/]+/)*([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:78:\"index.php?post_type=tribe_events&tribe_events_cat=$matches[1]&feed=$matches[2]\";s:88:\"(?:events)/(?:category)/(?:[^/]+/)*([^/]+)/(?:featured)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:89:\"index.php?post_type=tribe_events&tribe_events_cat=$matches[1]&featured=1&feed=$matches[2]\";s:58:\"(?:events)/(?:category)/(?:[^/]+/)*([^/]+)/(?:featured)/?$\";s:93:\"index.php?post_type=tribe_events&tribe_events_cat=$matches[1]&featured=1&eventDisplay=default\";s:45:\"(?:events)/(?:category)/(?:[^/]+/)*([^/]+)/?$\";s:82:\"index.php?post_type=tribe_events&tribe_events_cat=$matches[1]&eventDisplay=default\";s:44:\"(?:events)/(?:tag)/([^/]+)/(?:page)/(\\d+)/?$\";s:84:\"index.php?post_type=tribe_events&tag=$matches[1]&eventDisplay=list&paged=$matches[2]\";s:57:\"(?:events)/(?:tag)/([^/]+)/(?:featured)/(?:page)/(\\d+)/?$\";s:95:\"index.php?post_type=tribe_events&tag=$matches[1]&featured=1&eventDisplay=list&paged=$matches[2]\";s:39:\"(?:events)/(?:tag)/([^/]+)/(?:month)/?$\";s:67:\"index.php?post_type=tribe_events&tag=$matches[1]&eventDisplay=month\";s:52:\"(?:events)/(?:tag)/([^/]+)/(?:month)/(?:featured)/?$\";s:78:\"index.php?post_type=tribe_events&tag=$matches[1]&eventDisplay=month&featured=1\";s:53:\"(?:events)/(?:tag)/([^/]+)/(?:list)/(?:page)/(\\d+)/?$\";s:84:\"index.php?post_type=tribe_events&tag=$matches[1]&eventDisplay=list&paged=$matches[2]\";s:66:\"(?:events)/(?:tag)/([^/]+)/(?:list)/(?:featured)/(?:page)/(\\d+)/?$\";s:95:\"index.php?post_type=tribe_events&tag=$matches[1]&eventDisplay=list&featured=1&paged=$matches[2]\";s:38:\"(?:events)/(?:tag)/([^/]+)/(?:list)/?$\";s:66:\"index.php?post_type=tribe_events&tag=$matches[1]&eventDisplay=list\";s:51:\"(?:events)/(?:tag)/([^/]+)/(?:list)/(?:featured)/?$\";s:77:\"index.php?post_type=tribe_events&tag=$matches[1]&eventDisplay=list&featured=1\";s:39:\"(?:events)/(?:tag)/([^/]+)/(?:today)/?$\";s:65:\"index.php?post_type=tribe_events&tag=$matches[1]&eventDisplay=day\";s:52:\"(?:events)/(?:tag)/([^/]+)/(?:today)/(?:featured)/?$\";s:76:\"index.php?post_type=tribe_events&tag=$matches[1]&eventDisplay=day&featured=1\";s:57:\"(?:events)/(?:tag)/([^/]+)/(?:day)/(\\d{4}-\\d{2}-\\d{2})/?$\";s:87:\"index.php?post_type=tribe_events&tag=$matches[1]&eventDisplay=day&eventDate=$matches[2]\";s:70:\"(?:events)/(?:tag)/([^/]+)/(?:day)/(\\d{4}-\\d{2}-\\d{2})/(?:featured)/?$\";s:98:\"index.php?post_type=tribe_events&tag=$matches[1]&eventDisplay=day&eventDate=$matches[2]&featured=1\";s:43:\"(?:events)/(?:tag)/([^/]+)/(\\d{4}-\\d{2})/?$\";s:89:\"index.php?post_type=tribe_events&tag=$matches[1]&eventDisplay=month&eventDate=$matches[2]\";s:56:\"(?:events)/(?:tag)/([^/]+)/(\\d{4}-\\d{2})/(?:featured)/?$\";s:100:\"index.php?post_type=tribe_events&tag=$matches[1]&eventDisplay=month&eventDate=$matches[2]&featured=1\";s:49:\"(?:events)/(?:tag)/([^/]+)/(\\d{4}-\\d{2}-\\d{2})/?$\";s:87:\"index.php?post_type=tribe_events&tag=$matches[1]&eventDisplay=day&eventDate=$matches[2]\";s:62:\"(?:events)/(?:tag)/([^/]+)/(\\d{4}-\\d{2}-\\d{2})/(?:featured)/?$\";s:98:\"index.php?post_type=tribe_events&tag=$matches[1]&eventDisplay=day&eventDate=$matches[2]&featured=1\";s:34:\"(?:events)/(?:tag)/([^/]+)/feed/?$\";s:76:\"index.php?post_type=tribe_events&tag=$matches[1]&eventDisplay=list&feed=rss2\";s:47:\"(?:events)/(?:tag)/([^/]+)/(?:featured)/feed/?$\";s:87:\"index.php?post_type=tribe_events&tag=$matches[1]&eventDisplay=list&feed=rss2&featured=1\";s:34:\"(?:events)/(?:tag)/([^/]+)/ical/?$\";s:55:\"index.php?post_type=tribe_events&tag=$matches[1]&ical=1\";s:47:\"(?:events)/(?:tag)/([^/]+)/(?:featured)/ical/?$\";s:66:\"index.php?post_type=tribe_events&tag=$matches[1]&featured=1&ical=1\";s:59:\"(?:events)/(?:tag)/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:65:\"index.php?post_type=tribe_events&tag=$matches[1]&feed=$matches[2]\";s:72:\"(?:events)/(?:tag)/([^/]+)/(?:featured)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:76:\"index.php?post_type=tribe_events&tag=$matches[1]&featured=1&feed=$matches[2]\";s:42:\"(?:events)/(?:tag)/([^/]+)/(?:featured)/?$\";s:59:\"index.php?post_type=tribe_events&tag=$matches[1]&featured=1\";s:29:\"(?:events)/(?:tag)/([^/]+)/?$\";s:69:\"index.php?post_type=tribe_events&tag=$matches[1]&eventDisplay=default\";s:24:\"^wc-auth/v([1]{1})/(.*)?\";s:63:\"index.php?wc-auth-version=$matches[1]&wc-auth-route=$matches[2]\";s:22:\"^wc-api/v([1-3]{1})/?$\";s:51:\"index.php?wc-api-version=$matches[1]&wc-api-route=/\";s:24:\"^wc-api/v([1-3]{1})(.*)?\";s:61:\"index.php?wc-api-version=$matches[1]&wc-api-route=$matches[2]\";s:47:\"(([^/]+/)*wishlist)(/(.*))?/page/([0-9]{1,})/?$\";s:76:\"index.php?pagename=$matches[1]&wishlist-action=$matches[4]&paged=$matches[5]\";s:30:\"(([^/]+/)*wishlist)(/(.*))?/?$\";s:58:\"index.php?pagename=$matches[1]&wishlist-action=$matches[4]\";s:7:\"shop/?$\";s:27:\"index.php?post_type=product\";s:37:\"shop/feed/(feed|rdf|rss|rss2|atom)/?$\";s:44:\"index.php?post_type=product&feed=$matches[1]\";s:32:\"shop/(feed|rdf|rss|rss2|atom)/?$\";s:44:\"index.php?post_type=product&feed=$matches[1]\";s:24:\"shop/page/([0-9]{1,})/?$\";s:45:\"index.php?post_type=product&paged=$matches[1]\";s:11:\"^wp-json/?$\";s:22:\"index.php?rest_route=/\";s:14:\"^wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:21:\"^index.php/wp-json/?$\";s:22:\"index.php?rest_route=/\";s:24:\"^index.php/wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:22:\"tribe-promoter-auth/?$\";s:37:\"index.php?tribe-promoter-auth-check=1\";s:8:\"event/?$\";s:32:\"index.php?post_type=tribe_events\";s:38:\"event/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?post_type=tribe_events&feed=$matches[1]\";s:33:\"event/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?post_type=tribe_events&feed=$matches[1]\";s:25:\"event/page/([0-9]{1,})/?$\";s:50:\"index.php?post_type=tribe_events&paged=$matches[1]\";s:47:\"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:42:\"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:23:\"category/(.+?)/embed/?$\";s:46:\"index.php?category_name=$matches[1]&embed=true\";s:35:\"category/(.+?)/page/?([0-9]{1,})/?$\";s:53:\"index.php?category_name=$matches[1]&paged=$matches[2]\";s:32:\"category/(.+?)/wc-api(/(.*))?/?$\";s:54:\"index.php?category_name=$matches[1]&wc-api=$matches[3]\";s:17:\"category/(.+?)/?$\";s:35:\"index.php?category_name=$matches[1]\";s:44:\"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:39:\"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:20:\"tag/([^/]+)/embed/?$\";s:36:\"index.php?tag=$matches[1]&embed=true\";s:32:\"tag/([^/]+)/page/?([0-9]{1,})/?$\";s:43:\"index.php?tag=$matches[1]&paged=$matches[2]\";s:29:\"tag/([^/]+)/wc-api(/(.*))?/?$\";s:44:\"index.php?tag=$matches[1]&wc-api=$matches[3]\";s:14:\"tag/([^/]+)/?$\";s:25:\"index.php?tag=$matches[1]\";s:45:\"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:40:\"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:21:\"type/([^/]+)/embed/?$\";s:44:\"index.php?post_format=$matches[1]&embed=true\";s:33:\"type/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?post_format=$matches[1]&paged=$matches[2]\";s:15:\"type/([^/]+)/?$\";s:33:\"index.php?post_format=$matches[1]\";s:55:\"product-category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?product_cat=$matches[1]&feed=$matches[2]\";s:50:\"product-category/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?product_cat=$matches[1]&feed=$matches[2]\";s:31:\"product-category/(.+?)/embed/?$\";s:44:\"index.php?product_cat=$matches[1]&embed=true\";s:43:\"product-category/(.+?)/page/?([0-9]{1,})/?$\";s:51:\"index.php?product_cat=$matches[1]&paged=$matches[2]\";s:25:\"product-category/(.+?)/?$\";s:33:\"index.php?product_cat=$matches[1]\";s:52:\"product-tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?product_tag=$matches[1]&feed=$matches[2]\";s:47:\"product-tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?product_tag=$matches[1]&feed=$matches[2]\";s:28:\"product-tag/([^/]+)/embed/?$\";s:44:\"index.php?product_tag=$matches[1]&embed=true\";s:40:\"product-tag/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?product_tag=$matches[1]&paged=$matches[2]\";s:22:\"product-tag/([^/]+)/?$\";s:33:\"index.php?product_tag=$matches[1]\";s:35:\"product/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:45:\"product/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:65:\"product/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:60:\"product/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:60:\"product/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:41:\"product/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:24:\"product/([^/]+)/embed/?$\";s:40:\"index.php?product=$matches[1]&embed=true\";s:28:\"product/([^/]+)/trackback/?$\";s:34:\"index.php?product=$matches[1]&tb=1\";s:48:\"product/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:46:\"index.php?product=$matches[1]&feed=$matches[2]\";s:43:\"product/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:46:\"index.php?product=$matches[1]&feed=$matches[2]\";s:36:\"product/([^/]+)/page/?([0-9]{1,})/?$\";s:47:\"index.php?product=$matches[1]&paged=$matches[2]\";s:43:\"product/([^/]+)/comment-page-([0-9]{1,})/?$\";s:47:\"index.php?product=$matches[1]&cpage=$matches[2]\";s:33:\"product/([^/]+)/wc-api(/(.*))?/?$\";s:48:\"index.php?product=$matches[1]&wc-api=$matches[3]\";s:39:\"product/[^/]+/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:50:\"product/[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:32:\"product/([^/]+)(?:/([0-9]+))?/?$\";s:46:\"index.php?product=$matches[1]&page=$matches[2]\";s:24:\"product/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:34:\"product/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:54:\"product/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:49:\"product/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:49:\"product/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:30:\"product/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:33:\"venue/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:43:\"venue/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:63:\"venue/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:58:\"venue/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:58:\"venue/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:39:\"venue/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:22:\"venue/([^/]+)/embed/?$\";s:44:\"index.php?tribe_venue=$matches[1]&embed=true\";s:26:\"venue/([^/]+)/trackback/?$\";s:38:\"index.php?tribe_venue=$matches[1]&tb=1\";s:34:\"venue/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?tribe_venue=$matches[1]&paged=$matches[2]\";s:41:\"venue/([^/]+)/comment-page-([0-9]{1,})/?$\";s:51:\"index.php?tribe_venue=$matches[1]&cpage=$matches[2]\";s:31:\"venue/([^/]+)/wc-api(/(.*))?/?$\";s:52:\"index.php?tribe_venue=$matches[1]&wc-api=$matches[3]\";s:37:\"venue/[^/]+/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:48:\"venue/[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:30:\"venue/([^/]+)(?:/([0-9]+))?/?$\";s:50:\"index.php?tribe_venue=$matches[1]&page=$matches[2]\";s:22:\"venue/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:32:\"venue/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:52:\"venue/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:47:\"venue/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:47:\"venue/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:28:\"venue/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:37:\"organizer/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:47:\"organizer/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:67:\"organizer/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:62:\"organizer/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:62:\"organizer/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:43:\"organizer/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:26:\"organizer/([^/]+)/embed/?$\";s:48:\"index.php?tribe_organizer=$matches[1]&embed=true\";s:30:\"organizer/([^/]+)/trackback/?$\";s:42:\"index.php?tribe_organizer=$matches[1]&tb=1\";s:38:\"organizer/([^/]+)/page/?([0-9]{1,})/?$\";s:55:\"index.php?tribe_organizer=$matches[1]&paged=$matches[2]\";s:45:\"organizer/([^/]+)/comment-page-([0-9]{1,})/?$\";s:55:\"index.php?tribe_organizer=$matches[1]&cpage=$matches[2]\";s:35:\"organizer/([^/]+)/wc-api(/(.*))?/?$\";s:56:\"index.php?tribe_organizer=$matches[1]&wc-api=$matches[3]\";s:41:\"organizer/[^/]+/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:52:\"organizer/[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:34:\"organizer/([^/]+)(?:/([0-9]+))?/?$\";s:54:\"index.php?tribe_organizer=$matches[1]&page=$matches[2]\";s:26:\"organizer/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:36:\"organizer/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:56:\"organizer/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:51:\"organizer/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:51:\"organizer/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:32:\"organizer/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:33:\"event/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:43:\"event/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:63:\"event/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:58:\"event/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:58:\"event/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:39:\"event/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:22:\"event/([^/]+)/embed/?$\";s:45:\"index.php?tribe_events=$matches[1]&embed=true\";s:26:\"event/([^/]+)/trackback/?$\";s:39:\"index.php?tribe_events=$matches[1]&tb=1\";s:46:\"event/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:51:\"index.php?tribe_events=$matches[1]&feed=$matches[2]\";s:41:\"event/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:51:\"index.php?tribe_events=$matches[1]&feed=$matches[2]\";s:34:\"event/([^/]+)/page/?([0-9]{1,})/?$\";s:52:\"index.php?tribe_events=$matches[1]&paged=$matches[2]\";s:41:\"event/([^/]+)/comment-page-([0-9]{1,})/?$\";s:52:\"index.php?tribe_events=$matches[1]&cpage=$matches[2]\";s:31:\"event/([^/]+)/wc-api(/(.*))?/?$\";s:53:\"index.php?tribe_events=$matches[1]&wc-api=$matches[3]\";s:37:\"event/[^/]+/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:48:\"event/[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:30:\"event/([^/]+)(?:/([0-9]+))?/?$\";s:51:\"index.php?tribe_events=$matches[1]&page=$matches[2]\";s:22:\"event/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:32:\"event/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:52:\"event/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:47:\"event/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:47:\"event/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:28:\"event/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:54:\"events/category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:55:\"index.php?tribe_events_cat=$matches[1]&feed=$matches[2]\";s:49:\"events/category/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:55:\"index.php?tribe_events_cat=$matches[1]&feed=$matches[2]\";s:30:\"events/category/(.+?)/embed/?$\";s:49:\"index.php?tribe_events_cat=$matches[1]&embed=true\";s:42:\"events/category/(.+?)/page/?([0-9]{1,})/?$\";s:56:\"index.php?tribe_events_cat=$matches[1]&paged=$matches[2]\";s:24:\"events/category/(.+?)/?$\";s:38:\"index.php?tribe_events_cat=$matches[1]\";s:41:\"deleted_event/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:51:\"deleted_event/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:71:\"deleted_event/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:66:\"deleted_event/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:66:\"deleted_event/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:47:\"deleted_event/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:30:\"deleted_event/([^/]+)/embed/?$\";s:46:\"index.php?deleted_event=$matches[1]&embed=true\";s:34:\"deleted_event/([^/]+)/trackback/?$\";s:40:\"index.php?deleted_event=$matches[1]&tb=1\";s:42:\"deleted_event/([^/]+)/page/?([0-9]{1,})/?$\";s:53:\"index.php?deleted_event=$matches[1]&paged=$matches[2]\";s:49:\"deleted_event/([^/]+)/comment-page-([0-9]{1,})/?$\";s:53:\"index.php?deleted_event=$matches[1]&cpage=$matches[2]\";s:39:\"deleted_event/([^/]+)/wc-api(/(.*))?/?$\";s:54:\"index.php?deleted_event=$matches[1]&wc-api=$matches[3]\";s:45:\"deleted_event/[^/]+/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:56:\"deleted_event/[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:38:\"deleted_event/([^/]+)(?:/([0-9]+))?/?$\";s:52:\"index.php?deleted_event=$matches[1]&page=$matches[2]\";s:30:\"deleted_event/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:40:\"deleted_event/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:60:\"deleted_event/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:55:\"deleted_event/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:55:\"deleted_event/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:36:\"deleted_event/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:35:\"clients/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:45:\"clients/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:65:\"clients/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:60:\"clients/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:60:\"clients/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:41:\"clients/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:24:\"clients/([^/]+)/embed/?$\";s:40:\"index.php?clients=$matches[1]&embed=true\";s:28:\"clients/([^/]+)/trackback/?$\";s:34:\"index.php?clients=$matches[1]&tb=1\";s:36:\"clients/([^/]+)/page/?([0-9]{1,})/?$\";s:47:\"index.php?clients=$matches[1]&paged=$matches[2]\";s:43:\"clients/([^/]+)/comment-page-([0-9]{1,})/?$\";s:47:\"index.php?clients=$matches[1]&cpage=$matches[2]\";s:33:\"clients/([^/]+)/wc-api(/(.*))?/?$\";s:48:\"index.php?clients=$matches[1]&wc-api=$matches[3]\";s:39:\"clients/[^/]+/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:50:\"clients/[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:32:\"clients/([^/]+)(?:/([0-9]+))?/?$\";s:46:\"index.php?clients=$matches[1]&page=$matches[2]\";s:24:\"clients/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:34:\"clients/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:54:\"clients/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:49:\"clients/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:49:\"clients/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:30:\"clients/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:57:\"clients-category/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:55:\"index.php?clients-category=$matches[1]&feed=$matches[2]\";s:52:\"clients-category/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:55:\"index.php?clients-category=$matches[1]&feed=$matches[2]\";s:33:\"clients-category/([^/]+)/embed/?$\";s:49:\"index.php?clients-category=$matches[1]&embed=true\";s:45:\"clients-category/([^/]+)/page/?([0-9]{1,})/?$\";s:56:\"index.php?clients-category=$matches[1]&paged=$matches[2]\";s:27:\"clients-category/([^/]+)/?$\";s:38:\"index.php?clients-category=$matches[1]\";s:43:\"restaurant-menu/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:53:\"restaurant-menu/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:73:\"restaurant-menu/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:68:\"restaurant-menu/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:68:\"restaurant-menu/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:49:\"restaurant-menu/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:32:\"restaurant-menu/([^/]+)/embed/?$\";s:48:\"index.php?restaurant-menu=$matches[1]&embed=true\";s:36:\"restaurant-menu/([^/]+)/trackback/?$\";s:42:\"index.php?restaurant-menu=$matches[1]&tb=1\";s:44:\"restaurant-menu/([^/]+)/page/?([0-9]{1,})/?$\";s:55:\"index.php?restaurant-menu=$matches[1]&paged=$matches[2]\";s:51:\"restaurant-menu/([^/]+)/comment-page-([0-9]{1,})/?$\";s:55:\"index.php?restaurant-menu=$matches[1]&cpage=$matches[2]\";s:41:\"restaurant-menu/([^/]+)/wc-api(/(.*))?/?$\";s:56:\"index.php?restaurant-menu=$matches[1]&wc-api=$matches[3]\";s:47:\"restaurant-menu/[^/]+/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:58:\"restaurant-menu/[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:40:\"restaurant-menu/([^/]+)(?:/([0-9]+))?/?$\";s:54:\"index.php?restaurant-menu=$matches[1]&page=$matches[2]\";s:32:\"restaurant-menu/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:42:\"restaurant-menu/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:62:\"restaurant-menu/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:57:\"restaurant-menu/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:57:\"restaurant-menu/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:38:\"restaurant-menu/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:65:\"restaurant-menu-category/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:63:\"index.php?restaurant-menu-category=$matches[1]&feed=$matches[2]\";s:60:\"restaurant-menu-category/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:63:\"index.php?restaurant-menu-category=$matches[1]&feed=$matches[2]\";s:41:\"restaurant-menu-category/([^/]+)/embed/?$\";s:57:\"index.php?restaurant-menu-category=$matches[1]&embed=true\";s:53:\"restaurant-menu-category/([^/]+)/page/?([0-9]{1,})/?$\";s:64:\"index.php?restaurant-menu-category=$matches[1]&paged=$matches[2]\";s:35:\"restaurant-menu-category/([^/]+)/?$\";s:46:\"index.php?restaurant-menu-category=$matches[1]\";s:40:\"testimonials/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:50:\"testimonials/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:70:\"testimonials/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:65:\"testimonials/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:65:\"testimonials/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:46:\"testimonials/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:29:\"testimonials/([^/]+)/embed/?$\";s:45:\"index.php?testimonials=$matches[1]&embed=true\";s:33:\"testimonials/([^/]+)/trackback/?$\";s:39:\"index.php?testimonials=$matches[1]&tb=1\";s:41:\"testimonials/([^/]+)/page/?([0-9]{1,})/?$\";s:52:\"index.php?testimonials=$matches[1]&paged=$matches[2]\";s:48:\"testimonials/([^/]+)/comment-page-([0-9]{1,})/?$\";s:52:\"index.php?testimonials=$matches[1]&cpage=$matches[2]\";s:38:\"testimonials/([^/]+)/wc-api(/(.*))?/?$\";s:53:\"index.php?testimonials=$matches[1]&wc-api=$matches[3]\";s:44:\"testimonials/[^/]+/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:55:\"testimonials/[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:37:\"testimonials/([^/]+)(?:/([0-9]+))?/?$\";s:51:\"index.php?testimonials=$matches[1]&page=$matches[2]\";s:29:\"testimonials/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:39:\"testimonials/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:59:\"testimonials/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:54:\"testimonials/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:54:\"testimonials/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:35:\"testimonials/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:62:\"testimonials-category/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:60:\"index.php?testimonials-category=$matches[1]&feed=$matches[2]\";s:57:\"testimonials-category/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:60:\"index.php?testimonials-category=$matches[1]&feed=$matches[2]\";s:38:\"testimonials-category/([^/]+)/embed/?$\";s:54:\"index.php?testimonials-category=$matches[1]&embed=true\";s:50:\"testimonials-category/([^/]+)/page/?([0-9]{1,})/?$\";s:61:\"index.php?testimonials-category=$matches[1]&paged=$matches[2]\";s:32:\"testimonials-category/([^/]+)/?$\";s:43:\"index.php?testimonials-category=$matches[1]\";s:12:\"robots\\.txt$\";s:18:\"index.php?robots=1\";s:48:\".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$\";s:18:\"index.php?feed=old\";s:20:\".*wp-app\\.php(/.*)?$\";s:19:\"index.php?error=403\";s:18:\".*wp-register.php$\";s:23:\"index.php?register=true\";s:32:\"feed/(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:27:\"(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:8:\"embed/?$\";s:21:\"index.php?&embed=true\";s:20:\"page/?([0-9]{1,})/?$\";s:28:\"index.php?&paged=$matches[1]\";s:17:\"wc-api(/(.*))?/?$\";s:29:\"index.php?&wc-api=$matches[2]\";s:41:\"comments/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:36:\"comments/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:17:\"comments/embed/?$\";s:21:\"index.php?&embed=true\";s:26:\"comments/wc-api(/(.*))?/?$\";s:29:\"index.php?&wc-api=$matches[2]\";s:44:\"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:39:\"search/(.+)/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:20:\"search/(.+)/embed/?$\";s:34:\"index.php?s=$matches[1]&embed=true\";s:32:\"search/(.+)/page/?([0-9]{1,})/?$\";s:41:\"index.php?s=$matches[1]&paged=$matches[2]\";s:29:\"search/(.+)/wc-api(/(.*))?/?$\";s:42:\"index.php?s=$matches[1]&wc-api=$matches[3]\";s:14:\"search/(.+)/?$\";s:23:\"index.php?s=$matches[1]\";s:47:\"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:42:\"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:23:\"author/([^/]+)/embed/?$\";s:44:\"index.php?author_name=$matches[1]&embed=true\";s:35:\"author/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?author_name=$matches[1]&paged=$matches[2]\";s:32:\"author/([^/]+)/wc-api(/(.*))?/?$\";s:52:\"index.php?author_name=$matches[1]&wc-api=$matches[3]\";s:17:\"author/([^/]+)/?$\";s:33:\"index.php?author_name=$matches[1]\";s:69:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:45:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$\";s:74:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]\";s:54:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/wc-api(/(.*))?/?$\";s:82:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&wc-api=$matches[5]\";s:39:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$\";s:63:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]\";s:56:\"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:51:\"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:32:\"([0-9]{4})/([0-9]{1,2})/embed/?$\";s:58:\"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true\";s:44:\"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]\";s:41:\"([0-9]{4})/([0-9]{1,2})/wc-api(/(.*))?/?$\";s:66:\"index.php?year=$matches[1]&monthnum=$matches[2]&wc-api=$matches[4]\";s:26:\"([0-9]{4})/([0-9]{1,2})/?$\";s:47:\"index.php?year=$matches[1]&monthnum=$matches[2]\";s:43:\"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:38:\"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:19:\"([0-9]{4})/embed/?$\";s:37:\"index.php?year=$matches[1]&embed=true\";s:31:\"([0-9]{4})/page/?([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&paged=$matches[2]\";s:28:\"([0-9]{4})/wc-api(/(.*))?/?$\";s:45:\"index.php?year=$matches[1]&wc-api=$matches[3]\";s:13:\"([0-9]{4})/?$\";s:26:\"index.php?year=$matches[1]\";s:58:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:68:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:88:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:83:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:83:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:64:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:53:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/embed/?$\";s:91:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/trackback/?$\";s:85:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&tb=1\";s:77:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]\";s:72:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]\";s:65:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/page/?([0-9]{1,})/?$\";s:98:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&paged=$matches[5]\";s:72:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/comment-page-([0-9]{1,})/?$\";s:98:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&cpage=$matches[5]\";s:62:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/wc-api(/(.*))?/?$\";s:99:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&wc-api=$matches[6]\";s:62:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:73:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:61:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)(?:/([0-9]+))?/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&page=$matches[5]\";s:47:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:57:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:77:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:72:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:72:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:53:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&cpage=$matches[4]\";s:51:\"([0-9]{4})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&cpage=$matches[3]\";s:38:\"([0-9]{4})/comment-page-([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&cpage=$matches[2]\";s:27:\".?.+?/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\".?.+?/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\".?.+?/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:16:\"(.?.+?)/embed/?$\";s:41:\"index.php?pagename=$matches[1]&embed=true\";s:20:\"(.?.+?)/trackback/?$\";s:35:\"index.php?pagename=$matches[1]&tb=1\";s:40:\"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:35:\"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:28:\"(.?.+?)/page/?([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&paged=$matches[2]\";s:35:\"(.?.+?)/comment-page-([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&cpage=$matches[2]\";s:25:\"(.?.+?)/wc-api(/(.*))?/?$\";s:49:\"index.php?pagename=$matches[1]&wc-api=$matches[3]\";s:28:\"(.?.+?)/order-pay(/(.*))?/?$\";s:52:\"index.php?pagename=$matches[1]&order-pay=$matches[3]\";s:33:\"(.?.+?)/order-received(/(.*))?/?$\";s:57:\"index.php?pagename=$matches[1]&order-received=$matches[3]\";s:25:\"(.?.+?)/orders(/(.*))?/?$\";s:49:\"index.php?pagename=$matches[1]&orders=$matches[3]\";s:29:\"(.?.+?)/view-order(/(.*))?/?$\";s:53:\"index.php?pagename=$matches[1]&view-order=$matches[3]\";s:28:\"(.?.+?)/downloads(/(.*))?/?$\";s:52:\"index.php?pagename=$matches[1]&downloads=$matches[3]\";s:31:\"(.?.+?)/edit-account(/(.*))?/?$\";s:55:\"index.php?pagename=$matches[1]&edit-account=$matches[3]\";s:31:\"(.?.+?)/edit-address(/(.*))?/?$\";s:55:\"index.php?pagename=$matches[1]&edit-address=$matches[3]\";s:34:\"(.?.+?)/payment-methods(/(.*))?/?$\";s:58:\"index.php?pagename=$matches[1]&payment-methods=$matches[3]\";s:32:\"(.?.+?)/lost-password(/(.*))?/?$\";s:56:\"index.php?pagename=$matches[1]&lost-password=$matches[3]\";s:34:\"(.?.+?)/customer-logout(/(.*))?/?$\";s:58:\"index.php?pagename=$matches[1]&customer-logout=$matches[3]\";s:37:\"(.?.+?)/add-payment-method(/(.*))?/?$\";s:61:\"index.php?pagename=$matches[1]&add-payment-method=$matches[3]\";s:40:\"(.?.+?)/delete-payment-method(/(.*))?/?$\";s:64:\"index.php?pagename=$matches[1]&delete-payment-method=$matches[3]\";s:45:\"(.?.+?)/set-default-payment-method(/(.*))?/?$\";s:69:\"index.php?pagename=$matches[1]&set-default-payment-method=$matches[3]\";s:31:\".?.+?/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:42:\".?.+?/attachment/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:24:\"(.?.+?)(?:/([0-9]+))?/?$\";s:47:\"index.php?pagename=$matches[1]&page=$matches[2]\";}', 'yes'),
(30, 'hack_file', '0', 'yes'),
(31, 'blog_charset', 'UTF-8', 'yes'),
(32, 'moderation_keys', '', 'no'),
(33, 'active_plugins', 'a:14:{i:0;s:31:\"aperitif-core/aperitif-core.php\";i:1;s:43:\"aperitif-membership/aperitif-membership.php\";i:2;s:36:\"contact-form-7/wp-contact-form-7.php\";i:3;s:44:\"custom-twitter-feeds/custom-twitter-feed.php\";i:4;s:31:\"envato-market/envato-market.php\";i:5;s:9:\"hello.php\";i:6;s:33:\"instagram-feed/instagram-feed.php\";i:7;s:27:\"js_composer/js_composer.php\";i:8;s:33:\"qode-framework/qode-framework.php\";i:9;s:23:\"revslider/revslider.php\";i:10;s:43:\"the-events-calendar/the-events-calendar.php\";i:11;s:27:\"woocommerce/woocommerce.php\";i:12;s:36:\"yith-woocommerce-quick-view/init.php\";i:13;s:34:\"yith-woocommerce-wishlist/init.php\";}', 'yes'),
(34, 'category_base', '', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(36, 'comment_max_links', '2', 'yes'),
(37, 'gmt_offset', '0', 'yes'),
(38, 'default_email_category', '1', 'yes'),
(39, 'recently_edited', '', 'no'),
(40, 'template', 'aperitif', 'yes'),
(41, 'stylesheet', 'aperitif', 'yes'),
(42, 'comment_whitelist', '1', 'yes'),
(43, 'blacklist_keys', '', 'no'),
(44, 'comment_registration', '0', 'yes'),
(45, 'html_type', 'text/html', 'yes'),
(46, 'use_trackback', '0', 'yes'),
(47, 'default_role', 'subscriber', 'yes'),
(48, 'db_version', '45805', 'yes'),
(49, 'uploads_use_yearmonth_folders', '1', 'yes'),
(50, 'upload_path', '', 'yes'),
(51, 'blog_public', '0', 'yes'),
(52, 'default_link_category', '2', 'yes'),
(53, 'show_on_front', 'posts', 'yes'),
(54, 'tag_base', '', 'yes'),
(55, 'show_avatars', '1', 'yes'),
(56, 'avatar_rating', 'G', 'yes'),
(57, 'upload_url_path', '', 'yes'),
(58, 'thumbnail_size_w', '150', 'yes'),
(59, 'thumbnail_size_h', '150', 'yes'),
(60, 'thumbnail_crop', '1', 'yes'),
(61, 'medium_size_w', '300', 'yes'),
(62, 'medium_size_h', '300', 'yes'),
(63, 'avatar_default', 'mystery', 'yes'),
(64, 'large_size_w', '1024', 'yes'),
(65, 'large_size_h', '1024', 'yes');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(66, 'image_default_link_type', 'none', 'yes'),
(67, 'image_default_size', '', 'yes'),
(68, 'image_default_align', '', 'yes'),
(69, 'close_comments_for_old_posts', '0', 'yes'),
(70, 'close_comments_days_old', '14', 'yes'),
(71, 'thread_comments', '1', 'yes'),
(72, 'thread_comments_depth', '5', 'yes'),
(73, 'page_comments', '0', 'yes'),
(74, 'comments_per_page', '50', 'yes'),
(75, 'default_comments_page', 'newest', 'yes'),
(76, 'comment_order', 'asc', 'yes'),
(77, 'sticky_posts', 'a:0:{}', 'yes'),
(78, 'widget_categories', 'a:2:{i:2;a:4:{s:5:\"title\";s:0:\"\";s:5:\"count\";i:0;s:12:\"hierarchical\";i:0;s:8:\"dropdown\";i:0;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(79, 'widget_text', 'a:3:{i:2;a:4:{s:5:\"title\";s:15:\"About This Site\";s:4:\"text\";s:85:\"This may be a good place to introduce yourself and your site or include some credits.\";s:6:\"filter\";b:1;s:6:\"visual\";b:1;}i:3;a:4:{s:5:\"title\";s:7:\"Find Us\";s:4:\"text\";s:168:\"<strong>Address</strong>\n123 Main Street\nNew York, NY 10001\n\n<strong>Hours</strong>\nMonday&mdash;Friday: 9:00AM&ndash;5:00PM\nSaturday &amp; Sunday: 11:00AM&ndash;3:00PM\";s:6:\"filter\";b:1;s:6:\"visual\";b:1;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(80, 'widget_rss', 'a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}', 'yes'),
(81, 'uninstall_plugins', 'a:1:{s:33:\"instagram-feed/instagram-feed.php\";s:22:\"sb_instagram_uninstall\";}', 'no'),
(82, 'timezone_string', '', 'yes'),
(83, 'page_for_posts', '0', 'yes'),
(84, 'page_on_front', '0', 'yes'),
(85, 'default_post_format', '0', 'yes'),
(86, 'link_manager_enabled', '0', 'yes'),
(87, 'finished_splitting_shared_terms', '1', 'yes'),
(88, 'site_icon', '0', 'yes'),
(89, 'medium_large_size_w', '768', 'yes'),
(90, 'medium_large_size_h', '0', 'yes'),
(91, 'wp_page_for_privacy_policy', '3', 'yes'),
(92, 'show_comments_cookies_opt_in', '1', 'yes'),
(93, 'admin_email_lifespan', '1596448487', 'yes'),
(94, 'initial_db_version', '45805', 'yes'),
(95, 'wp_user_roles', 'a:7:{s:13:\"administrator\";a:2:{s:4:\"name\";s:13:\"Administrator\";s:12:\"capabilities\";a:156:{s:13:\"switch_themes\";b:1;s:11:\"edit_themes\";b:1;s:16:\"activate_plugins\";b:1;s:12:\"edit_plugins\";b:1;s:10:\"edit_users\";b:1;s:10:\"edit_files\";b:1;s:14:\"manage_options\";b:1;s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:6:\"import\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:8:\"level_10\";b:1;s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:12:\"delete_users\";b:1;s:12:\"create_users\";b:1;s:17:\"unfiltered_upload\";b:1;s:14:\"edit_dashboard\";b:1;s:14:\"update_plugins\";b:1;s:14:\"delete_plugins\";b:1;s:15:\"install_plugins\";b:1;s:13:\"update_themes\";b:1;s:14:\"install_themes\";b:1;s:11:\"update_core\";b:1;s:10:\"list_users\";b:1;s:12:\"remove_users\";b:1;s:13:\"promote_users\";b:1;s:18:\"edit_theme_options\";b:1;s:13:\"delete_themes\";b:1;s:6:\"export\";b:1;s:29:\"manage_instagram_feed_options\";b:1;s:18:\"manage_woocommerce\";b:1;s:24:\"view_woocommerce_reports\";b:1;s:12:\"edit_product\";b:1;s:12:\"read_product\";b:1;s:14:\"delete_product\";b:1;s:13:\"edit_products\";b:1;s:20:\"edit_others_products\";b:1;s:16:\"publish_products\";b:1;s:21:\"read_private_products\";b:1;s:15:\"delete_products\";b:1;s:23:\"delete_private_products\";b:1;s:25:\"delete_published_products\";b:1;s:22:\"delete_others_products\";b:1;s:21:\"edit_private_products\";b:1;s:23:\"edit_published_products\";b:1;s:20:\"manage_product_terms\";b:1;s:18:\"edit_product_terms\";b:1;s:20:\"delete_product_terms\";b:1;s:20:\"assign_product_terms\";b:1;s:15:\"edit_shop_order\";b:1;s:15:\"read_shop_order\";b:1;s:17:\"delete_shop_order\";b:1;s:16:\"edit_shop_orders\";b:1;s:23:\"edit_others_shop_orders\";b:1;s:19:\"publish_shop_orders\";b:1;s:24:\"read_private_shop_orders\";b:1;s:18:\"delete_shop_orders\";b:1;s:26:\"delete_private_shop_orders\";b:1;s:28:\"delete_published_shop_orders\";b:1;s:25:\"delete_others_shop_orders\";b:1;s:24:\"edit_private_shop_orders\";b:1;s:26:\"edit_published_shop_orders\";b:1;s:23:\"manage_shop_order_terms\";b:1;s:21:\"edit_shop_order_terms\";b:1;s:23:\"delete_shop_order_terms\";b:1;s:23:\"assign_shop_order_terms\";b:1;s:16:\"edit_shop_coupon\";b:1;s:16:\"read_shop_coupon\";b:1;s:18:\"delete_shop_coupon\";b:1;s:17:\"edit_shop_coupons\";b:1;s:24:\"edit_others_shop_coupons\";b:1;s:20:\"publish_shop_coupons\";b:1;s:25:\"read_private_shop_coupons\";b:1;s:19:\"delete_shop_coupons\";b:1;s:27:\"delete_private_shop_coupons\";b:1;s:29:\"delete_published_shop_coupons\";b:1;s:26:\"delete_others_shop_coupons\";b:1;s:25:\"edit_private_shop_coupons\";b:1;s:27:\"edit_published_shop_coupons\";b:1;s:24:\"manage_shop_coupon_terms\";b:1;s:22:\"edit_shop_coupon_terms\";b:1;s:24:\"delete_shop_coupon_terms\";b:1;s:24:\"assign_shop_coupon_terms\";b:1;s:35:\"manage_custom_twitter_feeds_options\";b:1;s:25:\"read_private_tribe_events\";b:1;s:17:\"edit_tribe_events\";b:1;s:24:\"edit_others_tribe_events\";b:1;s:25:\"edit_private_tribe_events\";b:1;s:27:\"edit_published_tribe_events\";b:1;s:19:\"delete_tribe_events\";b:1;s:26:\"delete_others_tribe_events\";b:1;s:27:\"delete_private_tribe_events\";b:1;s:29:\"delete_published_tribe_events\";b:1;s:20:\"publish_tribe_events\";b:1;s:25:\"read_private_tribe_venues\";b:1;s:17:\"edit_tribe_venues\";b:1;s:24:\"edit_others_tribe_venues\";b:1;s:25:\"edit_private_tribe_venues\";b:1;s:27:\"edit_published_tribe_venues\";b:1;s:19:\"delete_tribe_venues\";b:1;s:26:\"delete_others_tribe_venues\";b:1;s:27:\"delete_private_tribe_venues\";b:1;s:29:\"delete_published_tribe_venues\";b:1;s:20:\"publish_tribe_venues\";b:1;s:29:\"read_private_tribe_organizers\";b:1;s:21:\"edit_tribe_organizers\";b:1;s:28:\"edit_others_tribe_organizers\";b:1;s:29:\"edit_private_tribe_organizers\";b:1;s:31:\"edit_published_tribe_organizers\";b:1;s:23:\"delete_tribe_organizers\";b:1;s:30:\"delete_others_tribe_organizers\";b:1;s:31:\"delete_private_tribe_organizers\";b:1;s:33:\"delete_published_tribe_organizers\";b:1;s:24:\"publish_tribe_organizers\";b:1;s:31:\"read_private_aggregator-records\";b:1;s:23:\"edit_aggregator-records\";b:1;s:30:\"edit_others_aggregator-records\";b:1;s:31:\"edit_private_aggregator-records\";b:1;s:33:\"edit_published_aggregator-records\";b:1;s:25:\"delete_aggregator-records\";b:1;s:32:\"delete_others_aggregator-records\";b:1;s:33:\"delete_private_aggregator-records\";b:1;s:35:\"delete_published_aggregator-records\";b:1;s:26:\"publish_aggregator-records\";b:1;}}s:6:\"editor\";a:2:{s:4:\"name\";s:6:\"Editor\";s:12:\"capabilities\";a:74:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:25:\"read_private_tribe_events\";b:1;s:17:\"edit_tribe_events\";b:1;s:24:\"edit_others_tribe_events\";b:1;s:25:\"edit_private_tribe_events\";b:1;s:27:\"edit_published_tribe_events\";b:1;s:19:\"delete_tribe_events\";b:1;s:26:\"delete_others_tribe_events\";b:1;s:27:\"delete_private_tribe_events\";b:1;s:29:\"delete_published_tribe_events\";b:1;s:20:\"publish_tribe_events\";b:1;s:25:\"read_private_tribe_venues\";b:1;s:17:\"edit_tribe_venues\";b:1;s:24:\"edit_others_tribe_venues\";b:1;s:25:\"edit_private_tribe_venues\";b:1;s:27:\"edit_published_tribe_venues\";b:1;s:19:\"delete_tribe_venues\";b:1;s:26:\"delete_others_tribe_venues\";b:1;s:27:\"delete_private_tribe_venues\";b:1;s:29:\"delete_published_tribe_venues\";b:1;s:20:\"publish_tribe_venues\";b:1;s:29:\"read_private_tribe_organizers\";b:1;s:21:\"edit_tribe_organizers\";b:1;s:28:\"edit_others_tribe_organizers\";b:1;s:29:\"edit_private_tribe_organizers\";b:1;s:31:\"edit_published_tribe_organizers\";b:1;s:23:\"delete_tribe_organizers\";b:1;s:30:\"delete_others_tribe_organizers\";b:1;s:31:\"delete_private_tribe_organizers\";b:1;s:33:\"delete_published_tribe_organizers\";b:1;s:24:\"publish_tribe_organizers\";b:1;s:31:\"read_private_aggregator-records\";b:1;s:23:\"edit_aggregator-records\";b:1;s:30:\"edit_others_aggregator-records\";b:1;s:31:\"edit_private_aggregator-records\";b:1;s:33:\"edit_published_aggregator-records\";b:1;s:25:\"delete_aggregator-records\";b:1;s:32:\"delete_others_aggregator-records\";b:1;s:33:\"delete_private_aggregator-records\";b:1;s:35:\"delete_published_aggregator-records\";b:1;s:26:\"publish_aggregator-records\";b:1;}}s:6:\"author\";a:2:{s:4:\"name\";s:6:\"Author\";s:12:\"capabilities\";a:30:{s:12:\"upload_files\";b:1;s:10:\"edit_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:17:\"edit_tribe_events\";b:1;s:27:\"edit_published_tribe_events\";b:1;s:19:\"delete_tribe_events\";b:1;s:29:\"delete_published_tribe_events\";b:1;s:20:\"publish_tribe_events\";b:1;s:17:\"edit_tribe_venues\";b:1;s:27:\"edit_published_tribe_venues\";b:1;s:19:\"delete_tribe_venues\";b:1;s:29:\"delete_published_tribe_venues\";b:1;s:20:\"publish_tribe_venues\";b:1;s:21:\"edit_tribe_organizers\";b:1;s:31:\"edit_published_tribe_organizers\";b:1;s:23:\"delete_tribe_organizers\";b:1;s:33:\"delete_published_tribe_organizers\";b:1;s:24:\"publish_tribe_organizers\";b:1;s:23:\"edit_aggregator-records\";b:1;s:33:\"edit_published_aggregator-records\";b:1;s:25:\"delete_aggregator-records\";b:1;s:35:\"delete_published_aggregator-records\";b:1;s:26:\"publish_aggregator-records\";b:1;}}s:11:\"contributor\";a:2:{s:4:\"name\";s:11:\"Contributor\";s:12:\"capabilities\";a:13:{s:10:\"edit_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;s:17:\"edit_tribe_events\";b:1;s:19:\"delete_tribe_events\";b:1;s:17:\"edit_tribe_venues\";b:1;s:19:\"delete_tribe_venues\";b:1;s:21:\"edit_tribe_organizers\";b:1;s:23:\"delete_tribe_organizers\";b:1;s:23:\"edit_aggregator-records\";b:1;s:25:\"delete_aggregator-records\";b:1;}}s:10:\"subscriber\";a:2:{s:4:\"name\";s:10:\"Subscriber\";s:12:\"capabilities\";a:2:{s:4:\"read\";b:1;s:7:\"level_0\";b:1;}}s:8:\"customer\";a:2:{s:4:\"name\";s:8:\"Customer\";s:12:\"capabilities\";a:1:{s:4:\"read\";b:1;}}s:12:\"shop_manager\";a:2:{s:4:\"name\";s:12:\"Shop manager\";s:12:\"capabilities\";a:92:{s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:4:\"read\";b:1;s:18:\"read_private_pages\";b:1;s:18:\"read_private_posts\";b:1;s:10:\"edit_posts\";b:1;s:10:\"edit_pages\";b:1;s:20:\"edit_published_posts\";b:1;s:20:\"edit_published_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"edit_private_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:17:\"edit_others_pages\";b:1;s:13:\"publish_posts\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_posts\";b:1;s:12:\"delete_pages\";b:1;s:20:\"delete_private_pages\";b:1;s:20:\"delete_private_posts\";b:1;s:22:\"delete_published_pages\";b:1;s:22:\"delete_published_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:19:\"delete_others_pages\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:17:\"moderate_comments\";b:1;s:12:\"upload_files\";b:1;s:6:\"export\";b:1;s:6:\"import\";b:1;s:10:\"list_users\";b:1;s:18:\"edit_theme_options\";b:1;s:18:\"manage_woocommerce\";b:1;s:24:\"view_woocommerce_reports\";b:1;s:12:\"edit_product\";b:1;s:12:\"read_product\";b:1;s:14:\"delete_product\";b:1;s:13:\"edit_products\";b:1;s:20:\"edit_others_products\";b:1;s:16:\"publish_products\";b:1;s:21:\"read_private_products\";b:1;s:15:\"delete_products\";b:1;s:23:\"delete_private_products\";b:1;s:25:\"delete_published_products\";b:1;s:22:\"delete_others_products\";b:1;s:21:\"edit_private_products\";b:1;s:23:\"edit_published_products\";b:1;s:20:\"manage_product_terms\";b:1;s:18:\"edit_product_terms\";b:1;s:20:\"delete_product_terms\";b:1;s:20:\"assign_product_terms\";b:1;s:15:\"edit_shop_order\";b:1;s:15:\"read_shop_order\";b:1;s:17:\"delete_shop_order\";b:1;s:16:\"edit_shop_orders\";b:1;s:23:\"edit_others_shop_orders\";b:1;s:19:\"publish_shop_orders\";b:1;s:24:\"read_private_shop_orders\";b:1;s:18:\"delete_shop_orders\";b:1;s:26:\"delete_private_shop_orders\";b:1;s:28:\"delete_published_shop_orders\";b:1;s:25:\"delete_others_shop_orders\";b:1;s:24:\"edit_private_shop_orders\";b:1;s:26:\"edit_published_shop_orders\";b:1;s:23:\"manage_shop_order_terms\";b:1;s:21:\"edit_shop_order_terms\";b:1;s:23:\"delete_shop_order_terms\";b:1;s:23:\"assign_shop_order_terms\";b:1;s:16:\"edit_shop_coupon\";b:1;s:16:\"read_shop_coupon\";b:1;s:18:\"delete_shop_coupon\";b:1;s:17:\"edit_shop_coupons\";b:1;s:24:\"edit_others_shop_coupons\";b:1;s:20:\"publish_shop_coupons\";b:1;s:25:\"read_private_shop_coupons\";b:1;s:19:\"delete_shop_coupons\";b:1;s:27:\"delete_private_shop_coupons\";b:1;s:29:\"delete_published_shop_coupons\";b:1;s:26:\"delete_others_shop_coupons\";b:1;s:25:\"edit_private_shop_coupons\";b:1;s:27:\"edit_published_shop_coupons\";b:1;s:24:\"manage_shop_coupon_terms\";b:1;s:22:\"edit_shop_coupon_terms\";b:1;s:24:\"delete_shop_coupon_terms\";b:1;s:24:\"assign_shop_coupon_terms\";b:1;}}}', 'yes'),
(96, 'fresh_site', '0', 'yes'),
(97, 'widget_search', 'a:2:{i:2;a:1:{s:5:\"title\";s:0:\"\";}s:12:\"_multiwidget\";i:1;}', 'yes'),
(98, 'widget_recent-posts', 'a:2:{i:2;a:2:{s:5:\"title\";s:0:\"\";s:6:\"number\";i:5;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(99, 'widget_recent-comments', 'a:2:{i:2;a:2:{s:5:\"title\";s:0:\"\";s:6:\"number\";i:5;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(100, 'widget_archives', 'a:2:{i:2;a:3:{s:5:\"title\";s:0:\"\";s:5:\"count\";i:0;s:8:\"dropdown\";i:0;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(101, 'widget_meta', 'a:2:{i:2;a:1:{s:5:\"title\";s:0:\"\";}s:12:\"_multiwidget\";i:1;}', 'yes'),
(102, 'sidebars_widgets', 'a:18:{s:19:\"wp_inactive_widgets\";a:2:{i:0;s:6:\"text-2\";i:1;s:6:\"text-3\";}s:12:\"main-sidebar\";a:0:{}s:28:\"qodef-header-widget-area-one\";a:0:{}s:28:\"qodef-header-widget-area-two\";a:0:{}s:35:\"qodef-sticky-header-widget-area-one\";a:0:{}s:35:\"qodef-sticky-header-widget-area-two\";a:0:{}s:19:\"qodef-top-area-left\";a:0:{}s:20:\"qodef-top-area-right\";a:0:{}s:31:\"qodef-mobile-header-widget-area\";a:0:{}s:15:\"qodef-side-area\";a:0:{}s:24:\"footer_top_area_column_1\";a:0:{}s:24:\"footer_top_area_column_2\";a:0:{}s:24:\"footer_top_area_column_3\";a:0:{}s:24:\"footer_top_area_column_4\";a:0:{}s:27:\"footer_bottom_area_column_1\";a:0:{}s:27:\"footer_bottom_area_column_2\";a:0:{}s:9:\"sidebar-1\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}s:13:\"array_version\";i:3;}', 'yes'),
(103, 'cron', 'a:17:{i:1581117437;a:1:{s:26:\"action_scheduler_run_queue\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:12:\"every_minute\";s:4:\"args\";a:0:{}s:8:\"interval\";i:60;}}}i:1581118068;a:1:{s:21:\"sb_instagram_cron_job\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1581118112;a:2:{s:30:\"tribe_schedule_transient_purge\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:39:\"tribe_aggregator_process_insert_records\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:17:\"tribe-every15mins\";s:4:\"args\";a:0:{}s:8:\"interval\";i:900;}}}i:1581119689;a:1:{s:34:\"wp_privacy_delete_old_export_files\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"hourly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:3600;}}}i:1581120000;a:1:{s:27:\"woocommerce_scheduled_sales\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1581120901;a:1:{s:32:\"woocommerce_cancel_unpaid_orders\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:2:{s:8:\"schedule\";b:0;s:4:\"args\";a:0:{}}}}i:1581139669;a:1:{s:28:\"woocommerce_cleanup_sessions\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1581155689;a:4:{s:32:\"recovery_mode_clean_expired_keys\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1581155719;a:2:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}s:25:\"delete_expired_transients\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1581155720;a:1:{s:30:\"wp_scheduled_auto_draft_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1581161269;a:1:{s:33:\"woocommerce_cleanup_personal_data\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1581161279;a:1:{s:30:\"woocommerce_tracker_send_event\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1581161296;a:1:{s:24:\"tribe_common_log_cleanup\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1581161372;a:1:{s:34:\"yith_wcwl_delete_expired_wishlists\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1581172069;a:1:{s:24:\"woocommerce_cleanup_logs\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1582198129;a:1:{s:25:\"woocommerce_geoip_updater\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:11:\"fifteendays\";s:4:\"args\";a:0:{}s:8:\"interval\";i:1296000;}}}s:7:\"version\";i:2;}', 'yes'),
(104, 'widget_pages', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(105, 'widget_calendar', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(106, 'widget_media_audio', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(107, 'widget_media_image', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(108, 'widget_media_gallery', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(109, 'widget_media_video', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(110, 'widget_tag_cloud', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(111, 'widget_nav_menu', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(112, 'widget_custom_html', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(114, 'recovery_keys', 'a:0:{}', 'yes'),
(115, '_site_transient_update_core', 'O:8:\"stdClass\":4:{s:7:\"updates\";a:2:{i:0;O:8:\"stdClass\":10:{s:8:\"response\";s:7:\"upgrade\";s:8:\"download\";s:59:\"https://downloads.wordpress.org/release/wordpress-5.3.2.zip\";s:6:\"locale\";s:5:\"en_US\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:59:\"https://downloads.wordpress.org/release/wordpress-5.3.2.zip\";s:10:\"no_content\";s:70:\"https://downloads.wordpress.org/release/wordpress-5.3.2-no-content.zip\";s:11:\"new_bundled\";s:71:\"https://downloads.wordpress.org/release/wordpress-5.3.2-new-bundled.zip\";s:7:\"partial\";s:69:\"https://downloads.wordpress.org/release/wordpress-5.3.2-partial-0.zip\";s:8:\"rollback\";b:0;}s:7:\"current\";s:5:\"5.3.2\";s:7:\"version\";s:5:\"5.3.2\";s:11:\"php_version\";s:6:\"5.6.20\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"5.3\";s:15:\"partial_version\";s:3:\"5.3\";}i:1;O:8:\"stdClass\":11:{s:8:\"response\";s:10:\"autoupdate\";s:8:\"download\";s:59:\"https://downloads.wordpress.org/release/wordpress-5.3.2.zip\";s:6:\"locale\";s:5:\"en_US\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:59:\"https://downloads.wordpress.org/release/wordpress-5.3.2.zip\";s:10:\"no_content\";s:70:\"https://downloads.wordpress.org/release/wordpress-5.3.2-no-content.zip\";s:11:\"new_bundled\";s:71:\"https://downloads.wordpress.org/release/wordpress-5.3.2-new-bundled.zip\";s:7:\"partial\";s:69:\"https://downloads.wordpress.org/release/wordpress-5.3.2-partial-0.zip\";s:8:\"rollback\";s:70:\"https://downloads.wordpress.org/release/wordpress-5.3.2-rollback-0.zip\";}s:7:\"current\";s:5:\"5.3.2\";s:7:\"version\";s:5:\"5.3.2\";s:11:\"php_version\";s:6:\"5.6.20\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"5.3\";s:15:\"partial_version\";s:3:\"5.3\";s:9:\"new_files\";s:0:\"\";}}s:12:\"last_checked\";i:1581113680;s:15:\"version_checked\";s:3:\"5.3\";s:12:\"translations\";a:0:{}}', 'no'),
(116, 'theme_mods_twentytwenty', 'a:2:{s:18:\"custom_css_post_id\";i:-1;s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1580897418;s:4:\"data\";a:3:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:3:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";}s:9:\"sidebar-2\";a:3:{i:0;s:10:\"archives-2\";i:1;s:12:\"categories-2\";i:2;s:6:\"meta-2\";}}}}', 'yes'),
(123, '_site_transient_timeout_browser_05f578eb3fa9f908f5d74ef7bf6207a5', '1581501319', 'no'),
(124, '_site_transient_browser_05f578eb3fa9f908f5d74ef7bf6207a5', 'a:10:{s:4:\"name\";s:6:\"Chrome\";s:7:\"version\";s:13:\"79.0.3945.130\";s:8:\"platform\";s:7:\"Windows\";s:10:\"update_url\";s:29:\"https://www.google.com/chrome\";s:7:\"img_src\";s:43:\"http://s.w.org/images/browsers/chrome.png?1\";s:11:\"img_src_ssl\";s:44:\"https://s.w.org/images/browsers/chrome.png?1\";s:15:\"current_version\";s:2:\"18\";s:7:\"upgrade\";b:0;s:8:\"insecure\";b:0;s:6:\"mobile\";b:0;}', 'no'),
(126, '_site_transient_timeout_php_check_90e738eca301c4d89366b1a4d15fe37f', '1581501319', 'no'),
(127, '_site_transient_php_check_90e738eca301c4d89366b1a4d15fe37f', 'a:5:{s:19:\"recommended_version\";s:3:\"7.3\";s:15:\"minimum_version\";s:6:\"5.6.20\";s:12:\"is_supported\";b:1;s:9:\"is_secure\";b:1;s:13:\"is_acceptable\";b:1;}', 'no'),
(131, 'can_compress_scripts', '1', 'no'),
(148, 'current_theme', 'Aperitif', 'yes'),
(149, 'theme_mods_themeforest-DopnTs4f-aperitif-wine-shop-and-liquor-store/aperitif', 'a:4:{i:0;b:0;s:18:\"nav_menu_locations\";a:0:{}s:18:\"custom_css_post_id\";i:-1;s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1580898333;s:4:\"data\";a:8:{s:19:\"wp_inactive_widgets\";a:2:{i:0;s:6:\"text-2\";i:1;s:6:\"text-3\";}s:12:\"main-sidebar\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}s:24:\"footer_top_area_column_1\";a:0:{}s:24:\"footer_top_area_column_2\";a:0:{}s:24:\"footer_top_area_column_3\";a:0:{}s:24:\"footer_top_area_column_4\";a:0:{}s:27:\"footer_bottom_area_column_1\";a:0:{}s:27:\"footer_bottom_area_column_2\";a:0:{}}}}', 'yes'),
(150, 'theme_switched', '', 'yes'),
(155, 'theme_mods_twentysixteen', 'a:3:{i:0;b:0;s:18:\"nav_menu_locations\";a:0:{}s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1580898428;s:4:\"data\";a:4:{s:19:\"wp_inactive_widgets\";a:2:{i:0;s:6:\"text-2\";i:1;s:6:\"text-3\";}s:9:\"sidebar-1\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}s:9:\"sidebar-2\";a:0:{}s:9:\"sidebar-3\";a:0:{}}}}', 'yes'),
(158, 'theme_mods_aperitif', 'a:1:{s:18:\"custom_css_post_id\";i:-1;}', 'yes'),
(159, 'theme_switch_menu_locations', 'a:0:{}', 'yes'),
(160, 'theme_switched_via_customizer', '', 'yes'),
(161, 'customize_stashed_theme_mods', 'a:0:{}', 'no'),
(167, 'yit_recently_activated', 'a:2:{i:0;s:34:\"yith-woocommerce-wishlist/init.php\";i:1;s:36:\"yith-woocommerce-quick-view/init.php\";}', 'yes'),
(169, 'revslider_server_refresh', '1580902067', 'yes'),
(170, 'revslider-update-check-short', '1581107692', 'yes'),
(171, 'revslider_servers', 'a:1:{i:0;s:16:\"themepunch.tools\";}', 'yes'),
(172, 'revslider-library-check', '1580902067', 'yes'),
(173, 'revslider-templates-check', '1580902067', 'yes'),
(174, 'revslider_table_version', '1.0.8', 'yes'),
(177, 'wpcf7', 'a:2:{s:7:\"version\";s:5:\"5.1.6\";s:13:\"bulk_validate\";a:4:{s:9:\"timestamp\";i:1580902068;s:7:\"version\";s:5:\"5.1.6\";s:11:\"count_valid\";i:1;s:13:\"count_invalid\";i:0;}}', 'yes'),
(178, 'ctf_version', '1.4.1', 'yes'),
(179, 'envato_market', 'a:2:{s:16:\"is_plugin_active\";s:1:\"1\";s:17:\"installed_version\";s:5:\"2.0.3\";}', 'yes'),
(185, 'woocommerce_store_address', '', 'yes'),
(186, 'woocommerce_store_address_2', '', 'yes'),
(187, 'woocommerce_store_city', '', 'yes'),
(188, 'woocommerce_default_country', 'GB', 'yes'),
(189, 'woocommerce_store_postcode', '', 'yes'),
(190, 'woocommerce_allowed_countries', 'all', 'yes'),
(191, 'woocommerce_all_except_countries', '', 'yes'),
(192, 'woocommerce_specific_allowed_countries', '', 'yes'),
(193, 'woocommerce_ship_to_countries', '', 'yes'),
(194, 'woocommerce_specific_ship_to_countries', '', 'yes'),
(195, 'woocommerce_default_customer_address', 'base', 'yes'),
(196, 'woocommerce_calc_taxes', 'no', 'yes'),
(197, 'woocommerce_enable_coupons', 'yes', 'yes'),
(198, 'woocommerce_calc_discounts_sequentially', 'no', 'no'),
(199, 'woocommerce_currency', 'GBP', 'yes'),
(200, 'woocommerce_currency_pos', 'left', 'yes'),
(201, 'woocommerce_price_thousand_sep', ',', 'yes'),
(202, 'woocommerce_price_decimal_sep', '.', 'yes'),
(203, 'woocommerce_price_num_decimals', '2', 'yes'),
(204, 'woocommerce_shop_page_id', '', 'yes'),
(205, 'woocommerce_cart_redirect_after_add', 'no', 'yes'),
(206, 'woocommerce_enable_ajax_add_to_cart', 'yes', 'yes'),
(207, 'woocommerce_placeholder_image', '32', 'yes'),
(208, 'woocommerce_weight_unit', 'kg', 'yes'),
(209, 'woocommerce_dimension_unit', 'cm', 'yes'),
(210, 'woocommerce_enable_reviews', 'yes', 'yes'),
(211, 'woocommerce_review_rating_verification_label', 'yes', 'no'),
(212, 'woocommerce_review_rating_verification_required', 'no', 'no'),
(213, 'woocommerce_enable_review_rating', 'yes', 'yes'),
(214, 'woocommerce_review_rating_required', 'yes', 'no'),
(215, 'woocommerce_manage_stock', 'yes', 'yes'),
(216, 'woocommerce_hold_stock_minutes', '60', 'no'),
(217, 'woocommerce_notify_low_stock', 'yes', 'no'),
(218, 'woocommerce_notify_no_stock', 'yes', 'no'),
(219, 'woocommerce_stock_email_recipient', 'binephrem@gmail.com', 'no'),
(220, 'woocommerce_notify_low_stock_amount', '2', 'no'),
(221, 'woocommerce_notify_no_stock_amount', '0', 'yes'),
(222, 'woocommerce_hide_out_of_stock_items', 'no', 'yes'),
(223, 'woocommerce_stock_format', '', 'yes'),
(224, 'woocommerce_file_download_method', 'force', 'no'),
(225, 'woocommerce_downloads_require_login', 'no', 'no'),
(226, 'woocommerce_downloads_grant_access_after_payment', 'yes', 'no'),
(227, 'woocommerce_prices_include_tax', 'no', 'yes'),
(228, 'woocommerce_tax_based_on', 'shipping', 'yes'),
(229, 'woocommerce_shipping_tax_class', 'inherit', 'yes'),
(230, 'woocommerce_tax_round_at_subtotal', 'no', 'yes'),
(231, 'woocommerce_tax_classes', '', 'yes'),
(232, 'woocommerce_tax_display_shop', 'excl', 'yes'),
(233, 'woocommerce_tax_display_cart', 'excl', 'yes'),
(234, 'woocommerce_price_display_suffix', '', 'yes'),
(235, 'woocommerce_tax_total_display', 'itemized', 'no'),
(236, 'woocommerce_enable_shipping_calc', 'yes', 'no'),
(237, 'woocommerce_shipping_cost_requires_address', 'no', 'yes'),
(238, 'woocommerce_ship_to_destination', 'billing', 'no'),
(239, 'woocommerce_shipping_debug_mode', 'no', 'yes'),
(240, 'woocommerce_enable_guest_checkout', 'yes', 'no'),
(241, 'woocommerce_enable_checkout_login_reminder', 'no', 'no'),
(242, 'woocommerce_enable_signup_and_login_from_checkout', 'no', 'no'),
(243, 'woocommerce_enable_myaccount_registration', 'no', 'no'),
(244, 'woocommerce_registration_generate_username', 'yes', 'no'),
(245, 'woocommerce_registration_generate_password', 'yes', 'no'),
(246, 'woocommerce_erasure_request_removes_order_data', 'no', 'no'),
(247, 'woocommerce_erasure_request_removes_download_data', 'no', 'no'),
(248, 'woocommerce_allow_bulk_remove_personal_data', 'no', 'no'),
(249, 'woocommerce_registration_privacy_policy_text', 'Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our [privacy_policy].', 'yes'),
(250, 'woocommerce_checkout_privacy_policy_text', 'Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our [privacy_policy].', 'yes'),
(251, 'woocommerce_delete_inactive_accounts', 'a:2:{s:6:\"number\";s:0:\"\";s:4:\"unit\";s:6:\"months\";}', 'no'),
(252, 'woocommerce_trash_pending_orders', '', 'no'),
(253, 'woocommerce_trash_failed_orders', '', 'no'),
(254, 'woocommerce_trash_cancelled_orders', '', 'no'),
(255, 'woocommerce_anonymize_completed_orders', 'a:2:{s:6:\"number\";s:0:\"\";s:4:\"unit\";s:6:\"months\";}', 'no'),
(256, 'woocommerce_email_from_name', 'Rhode Island Liquors', 'no'),
(257, 'woocommerce_email_from_address', 'binephrem@gmail.com', 'no'),
(258, 'woocommerce_email_header_image', '', 'no'),
(259, 'woocommerce_email_footer_text', '{site_title} &mdash; Built with {WooCommerce}', 'no'),
(260, 'woocommerce_email_base_color', '#96588a', 'no'),
(261, 'woocommerce_email_background_color', '#f7f7f7', 'no'),
(262, 'woocommerce_email_body_background_color', '#ffffff', 'no'),
(263, 'woocommerce_email_text_color', '#3c3c3c', 'no'),
(264, 'woocommerce_cart_page_id', '', 'no'),
(265, 'woocommerce_checkout_page_id', '', 'no'),
(266, 'woocommerce_myaccount_page_id', '', 'no'),
(267, 'woocommerce_terms_page_id', '', 'no'),
(268, 'woocommerce_force_ssl_checkout', 'no', 'yes'),
(269, 'woocommerce_unforce_ssl_checkout', 'no', 'yes'),
(270, 'woocommerce_checkout_pay_endpoint', 'order-pay', 'yes'),
(271, 'woocommerce_checkout_order_received_endpoint', 'order-received', 'yes'),
(272, 'woocommerce_myaccount_add_payment_method_endpoint', 'add-payment-method', 'yes'),
(273, 'woocommerce_myaccount_delete_payment_method_endpoint', 'delete-payment-method', 'yes'),
(274, 'woocommerce_myaccount_set_default_payment_method_endpoint', 'set-default-payment-method', 'yes'),
(275, 'woocommerce_myaccount_orders_endpoint', 'orders', 'yes'),
(276, 'woocommerce_myaccount_view_order_endpoint', 'view-order', 'yes'),
(277, 'woocommerce_myaccount_downloads_endpoint', 'downloads', 'yes'),
(278, 'woocommerce_myaccount_edit_account_endpoint', 'edit-account', 'yes'),
(279, 'woocommerce_myaccount_edit_address_endpoint', 'edit-address', 'yes'),
(280, 'woocommerce_myaccount_payment_methods_endpoint', 'payment-methods', 'yes'),
(281, 'woocommerce_myaccount_lost_password_endpoint', 'lost-password', 'yes'),
(282, 'woocommerce_logout_endpoint', 'customer-logout', 'yes'),
(283, 'woocommerce_api_enabled', 'no', 'yes'),
(284, 'woocommerce_allow_tracking', 'no', 'no'),
(285, 'woocommerce_show_marketplace_suggestions', 'yes', 'no'),
(286, 'woocommerce_single_image_width', '600', 'yes'),
(287, 'woocommerce_thumbnail_image_width', '300', 'yes'),
(288, 'woocommerce_checkout_highlight_required_fields', 'yes', 'yes'),
(289, 'woocommerce_demo_store', 'no', 'no'),
(290, 'woocommerce_permalinks', 'a:5:{s:12:\"product_base\";s:7:\"product\";s:13:\"category_base\";s:16:\"product-category\";s:8:\"tag_base\";s:11:\"product-tag\";s:14:\"attribute_base\";s:0:\"\";s:22:\"use_verbose_page_rules\";b:0;}', 'yes'),
(291, 'current_theme_supports_woocommerce', 'yes', 'yes'),
(292, 'woocommerce_queue_flush_rewrite_rules', 'no', 'yes'),
(293, '_transient_wc_attribute_taxonomies', 'a:0:{}', 'yes'),
(294, 'product_cat_children', 'a:0:{}', 'yes'),
(295, 'default_product_cat', '15', 'yes'),
(298, 'woocommerce_version', '3.9.1', 'yes'),
(299, 'woocommerce_db_version', '3.9.1', 'yes'),
(300, 'recently_activated', 'a:0:{}', 'yes'),
(301, 'woocommerce_admin_notices', 'a:2:{i:1;s:20:\"no_secure_connection\";i:2;s:8:\"wc_admin\";}', 'yes'),
(302, '_transient_timeout__aperitif_core_welcome_page_redirect', '1612438096', 'no'),
(303, '_transient__aperitif_core_welcome_page_redirect', '1', 'no'),
(304, 'revslider_update_version', '6.1.4', 'yes'),
(305, 'woocommerce_maxmind_geolocation_settings', 'a:1:{s:15:\"database_prefix\";s:32:\"eiNpsYwl5BISIMvRhQMphDQHjaPhXuef\";}', 'yes'),
(306, '_transient_woocommerce_webhook_ids_status_active', 'a:0:{}', 'yes'),
(307, 'tribe_events_calendar_options', 'a:7:{s:14:\"schema-version\";s:7:\"5.0.0.2\";s:21:\"previous_ecp_versions\";a:2:{i:0;s:1:\"0\";i:1;s:7:\"5.0.0.1\";}s:18:\"latest_ecp_version\";s:7:\"5.0.0.2\";s:16:\"views_v2_enabled\";b:1;s:12:\"postsPerPage\";i:12;s:16:\"monthEventAmount\";i:3;s:27:\"recurring_events_are_hidden\";s:6:\"hidden\";}', 'yes'),
(308, 'widget_custom-twitter-feeds-widget', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(309, 'widget_rev-slider-widget', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(310, 'widget_woocommerce_widget_cart', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(311, 'widget_woocommerce_layered_nav_filters', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(312, 'widget_woocommerce_layered_nav', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(313, 'widget_woocommerce_price_filter', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(314, 'widget_woocommerce_product_categories', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(315, 'widget_woocommerce_product_search', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(316, 'widget_woocommerce_product_tag_cloud', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(317, 'widget_woocommerce_products', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(318, 'widget_woocommerce_recently_viewed_products', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(319, 'widget_woocommerce_top_rated_products', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(320, 'widget_woocommerce_recent_reviews', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(321, 'widget_woocommerce_rating_filter', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(322, 'widget_aperitif_core_blog_list', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(323, 'widget_aperitif_core_contact_form_7', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(324, 'widget_aperitif_core_instagram_list', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(325, 'widget_aperitif_core_search_opener', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(326, 'widget_aperitif_core_custom_font', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(327, 'widget_aperitif_core_icon_list_item', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(328, 'widget_aperitif_core_icon', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(329, 'widget_aperitif_core_separator', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(330, 'widget_aperitif_core_side_area_opener', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(331, 'widget_aperitif_core_social_share', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(332, 'widget_aperitif_core_twitter_list', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(333, 'widget_aperitif_core_author_info', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(334, 'widget_aperitif_core_woo_dropdown_cart', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(335, 'widget_aperitif_core_working_hours_list', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(336, 'widget_aperitif_membership_login_opener', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(337, 'widget_tribe-events-list-widget', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(340, 'tribe_last_updated_option', '1581117422.9477', 'yes'),
(341, 'tribe_last_save_post', '1581117422.9491', 'yes'),
(342, 'yith-wcwl-page-id', '33', 'yes'),
(343, 'yith_wcwl_wishlist_page_id', '33', 'yes'),
(344, 'yith_wcwl_version', '3.0.6', 'yes'),
(345, 'yith_wcwl_db_version', '3.0.0', 'yes'),
(346, 'envato_market_state', 'activated', 'yes'),
(347, 'vc_version', '6.0.5', 'yes');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(348, 'aperitif_core_options', 'a:392:{s:16:\"qodef_main_color\";s:0:\"\";s:22:\"qodef_main_color_hover\";s:0:\"\";s:27:\"qodef_page_background_color\";s:0:\"\";s:27:\"qodef_page_background_image\";s:0:\"\";s:28:\"qodef_page_background_repeat\";s:0:\"\";s:26:\"qodef_page_background_size\";s:0:\"\";s:32:\"qodef_page_background_attachment\";s:0:\"\";s:26:\"qodef_page_content_padding\";s:0:\"\";s:33:\"qodef_page_content_padding_mobile\";s:0:\"\";s:11:\"qodef_boxed\";s:2:\"no\";s:28:\"qodef_boxed_background_color\";s:0:\"\";s:18:\"qodef_passepartout\";s:2:\"no\";s:24:\"qodef_passepartout_color\";s:0:\"\";s:24:\"qodef_passepartout_image\";s:0:\"\";s:23:\"qodef_passepartout_size\";s:0:\"\";s:34:\"qodef_passepartout_size_responsive\";s:0:\"\";s:26:\"qodef_passepartout_details\";s:2:\"no\";s:19:\"qodef_content_width\";s:4:\"1400\";s:17:\"qodef_back_to_top\";s:3:\"yes\";s:24:\"qodef_page_enable_loader\";s:2:\"no\";s:19:\"qodef_page_spinners\";s:0:\"\";s:35:\"qodef_page_spinner_background_color\";s:0:\"\";s:24:\"qodef_page_spinner_color\";s:0:\"\";s:17:\"qodef_logo_height\";s:0:\"\";s:15:\"qodef_logo_main\";s:83:\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/aperitif/assets/img/logo.png\";s:15:\"qodef_logo_dark\";s:88:\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/aperitif/assets/img/logo-dark.png\";s:16:\"qodef_logo_light\";s:89:\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/aperitif/assets/img/logo-light.png\";s:24:\"qodef_mobile_logo_height\";s:0:\"\";s:22:\"qodef_mobile_logo_main\";s:83:\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/aperitif/assets/img/logo.png\";s:25:\"qodef_enable_google_fonts\";s:3:\"yes\";s:25:\"qodef_choose_google_fonts\";s:0:\"\";s:25:\"qodef_google_fonts_weight\";a:1:{i:0;s:0:\"\";}s:25:\"qodef_google_fonts_subset\";a:1:{i:0;s:0:\"\";}s:18:\"qodef_custom_fonts\";s:0:\"\";s:14:\"qodef_h1_color\";s:0:\"\";s:20:\"qodef_h1_font_family\";s:0:\"\";s:18:\"qodef_h1_font_size\";s:0:\"\";s:20:\"qodef_h1_line_height\";s:0:\"\";s:23:\"qodef_h1_letter_spacing\";s:0:\"\";s:20:\"qodef_h1_font_weight\";s:0:\"\";s:23:\"qodef_h1_text_transform\";s:0:\"\";s:19:\"qodef_h1_font_style\";s:0:\"\";s:19:\"qodef_h1_margin_top\";s:0:\"\";s:22:\"qodef_h1_margin_bottom\";s:0:\"\";s:34:\"qodef_h1_responsive_1024_font_size\";s:0:\"\";s:36:\"qodef_h1_responsive_1024_line_height\";s:0:\"\";s:39:\"qodef_h1_responsive_1024_letter_spacing\";s:0:\"\";s:33:\"qodef_h1_responsive_768_font_size\";s:0:\"\";s:35:\"qodef_h1_responsive_768_line_height\";s:0:\"\";s:38:\"qodef_h1_responsive_768_letter_spacing\";s:0:\"\";s:33:\"qodef_h1_responsive_680_font_size\";s:0:\"\";s:35:\"qodef_h1_responsive_680_line_height\";s:0:\"\";s:38:\"qodef_h1_responsive_680_letter_spacing\";s:0:\"\";s:14:\"qodef_h2_color\";s:0:\"\";s:20:\"qodef_h2_font_family\";s:0:\"\";s:18:\"qodef_h2_font_size\";s:0:\"\";s:20:\"qodef_h2_line_height\";s:0:\"\";s:23:\"qodef_h2_letter_spacing\";s:0:\"\";s:20:\"qodef_h2_font_weight\";s:0:\"\";s:23:\"qodef_h2_text_transform\";s:0:\"\";s:19:\"qodef_h2_font_style\";s:0:\"\";s:19:\"qodef_h2_margin_top\";s:0:\"\";s:22:\"qodef_h2_margin_bottom\";s:0:\"\";s:34:\"qodef_h2_responsive_1024_font_size\";s:0:\"\";s:36:\"qodef_h2_responsive_1024_line_height\";s:0:\"\";s:39:\"qodef_h2_responsive_1024_letter_spacing\";s:0:\"\";s:33:\"qodef_h2_responsive_768_font_size\";s:0:\"\";s:35:\"qodef_h2_responsive_768_line_height\";s:0:\"\";s:38:\"qodef_h2_responsive_768_letter_spacing\";s:0:\"\";s:33:\"qodef_h2_responsive_680_font_size\";s:0:\"\";s:35:\"qodef_h2_responsive_680_line_height\";s:0:\"\";s:38:\"qodef_h2_responsive_680_letter_spacing\";s:0:\"\";s:14:\"qodef_h3_color\";s:0:\"\";s:20:\"qodef_h3_font_family\";s:0:\"\";s:18:\"qodef_h3_font_size\";s:0:\"\";s:20:\"qodef_h3_line_height\";s:0:\"\";s:23:\"qodef_h3_letter_spacing\";s:0:\"\";s:20:\"qodef_h3_font_weight\";s:0:\"\";s:23:\"qodef_h3_text_transform\";s:0:\"\";s:19:\"qodef_h3_font_style\";s:0:\"\";s:19:\"qodef_h3_margin_top\";s:0:\"\";s:22:\"qodef_h3_margin_bottom\";s:0:\"\";s:34:\"qodef_h3_responsive_1024_font_size\";s:0:\"\";s:36:\"qodef_h3_responsive_1024_line_height\";s:0:\"\";s:39:\"qodef_h3_responsive_1024_letter_spacing\";s:0:\"\";s:33:\"qodef_h3_responsive_768_font_size\";s:0:\"\";s:35:\"qodef_h3_responsive_768_line_height\";s:0:\"\";s:38:\"qodef_h3_responsive_768_letter_spacing\";s:0:\"\";s:33:\"qodef_h3_responsive_680_font_size\";s:0:\"\";s:35:\"qodef_h3_responsive_680_line_height\";s:0:\"\";s:38:\"qodef_h3_responsive_680_letter_spacing\";s:0:\"\";s:14:\"qodef_h4_color\";s:0:\"\";s:20:\"qodef_h4_font_family\";s:0:\"\";s:18:\"qodef_h4_font_size\";s:0:\"\";s:20:\"qodef_h4_line_height\";s:0:\"\";s:23:\"qodef_h4_letter_spacing\";s:0:\"\";s:20:\"qodef_h4_font_weight\";s:0:\"\";s:23:\"qodef_h4_text_transform\";s:0:\"\";s:19:\"qodef_h4_font_style\";s:0:\"\";s:19:\"qodef_h4_margin_top\";s:0:\"\";s:22:\"qodef_h4_margin_bottom\";s:0:\"\";s:34:\"qodef_h4_responsive_1024_font_size\";s:0:\"\";s:36:\"qodef_h4_responsive_1024_line_height\";s:0:\"\";s:39:\"qodef_h4_responsive_1024_letter_spacing\";s:0:\"\";s:33:\"qodef_h4_responsive_768_font_size\";s:0:\"\";s:35:\"qodef_h4_responsive_768_line_height\";s:0:\"\";s:38:\"qodef_h4_responsive_768_letter_spacing\";s:0:\"\";s:33:\"qodef_h4_responsive_680_font_size\";s:0:\"\";s:35:\"qodef_h4_responsive_680_line_height\";s:0:\"\";s:38:\"qodef_h4_responsive_680_letter_spacing\";s:0:\"\";s:14:\"qodef_h5_color\";s:0:\"\";s:20:\"qodef_h5_font_family\";s:0:\"\";s:18:\"qodef_h5_font_size\";s:0:\"\";s:20:\"qodef_h5_line_height\";s:0:\"\";s:23:\"qodef_h5_letter_spacing\";s:0:\"\";s:20:\"qodef_h5_font_weight\";s:0:\"\";s:23:\"qodef_h5_text_transform\";s:0:\"\";s:19:\"qodef_h5_font_style\";s:0:\"\";s:19:\"qodef_h5_margin_top\";s:0:\"\";s:22:\"qodef_h5_margin_bottom\";s:0:\"\";s:34:\"qodef_h5_responsive_1024_font_size\";s:0:\"\";s:36:\"qodef_h5_responsive_1024_line_height\";s:0:\"\";s:39:\"qodef_h5_responsive_1024_letter_spacing\";s:0:\"\";s:33:\"qodef_h5_responsive_768_font_size\";s:0:\"\";s:35:\"qodef_h5_responsive_768_line_height\";s:0:\"\";s:38:\"qodef_h5_responsive_768_letter_spacing\";s:0:\"\";s:33:\"qodef_h5_responsive_680_font_size\";s:0:\"\";s:35:\"qodef_h5_responsive_680_line_height\";s:0:\"\";s:38:\"qodef_h5_responsive_680_letter_spacing\";s:0:\"\";s:14:\"qodef_h6_color\";s:0:\"\";s:20:\"qodef_h6_font_family\";s:0:\"\";s:18:\"qodef_h6_font_size\";s:0:\"\";s:20:\"qodef_h6_line_height\";s:0:\"\";s:23:\"qodef_h6_letter_spacing\";s:0:\"\";s:20:\"qodef_h6_font_weight\";s:0:\"\";s:23:\"qodef_h6_text_transform\";s:0:\"\";s:19:\"qodef_h6_font_style\";s:0:\"\";s:19:\"qodef_h6_margin_top\";s:0:\"\";s:22:\"qodef_h6_margin_bottom\";s:0:\"\";s:34:\"qodef_h6_responsive_1024_font_size\";s:0:\"\";s:36:\"qodef_h6_responsive_1024_line_height\";s:0:\"\";s:39:\"qodef_h6_responsive_1024_letter_spacing\";s:0:\"\";s:33:\"qodef_h6_responsive_768_font_size\";s:0:\"\";s:35:\"qodef_h6_responsive_768_line_height\";s:0:\"\";s:38:\"qodef_h6_responsive_768_letter_spacing\";s:0:\"\";s:33:\"qodef_h6_responsive_680_font_size\";s:0:\"\";s:35:\"qodef_h6_responsive_680_line_height\";s:0:\"\";s:38:\"qodef_h6_responsive_680_letter_spacing\";s:0:\"\";s:16:\"qodef_link_color\";s:0:\"\";s:22:\"qodef_link_hover_color\";s:0:\"\";s:22:\"qodef_link_font_weight\";s:0:\"\";s:21:\"qodef_link_font_style\";s:0:\"\";s:26:\"qodef_link_text_decoration\";s:0:\"\";s:32:\"qodef_link_hover_text_decoration\";s:0:\"\";s:13:\"qodef_p_color\";s:0:\"\";s:19:\"qodef_p_font_family\";s:0:\"\";s:17:\"qodef_p_font_size\";s:0:\"\";s:19:\"qodef_p_line_height\";s:0:\"\";s:22:\"qodef_p_letter_spacing\";s:0:\"\";s:19:\"qodef_p_font_weight\";s:0:\"\";s:22:\"qodef_p_text_transform\";s:0:\"\";s:18:\"qodef_p_font_style\";s:0:\"\";s:18:\"qodef_p_margin_top\";s:0:\"\";s:21:\"qodef_p_margin_bottom\";s:0:\"\";s:33:\"qodef_p_responsive_1024_font_size\";s:0:\"\";s:35:\"qodef_p_responsive_1024_line_height\";s:0:\"\";s:38:\"qodef_p_responsive_1024_letter_spacing\";s:0:\"\";s:32:\"qodef_p_responsive_768_font_size\";s:0:\"\";s:34:\"qodef_p_responsive_768_line_height\";s:0:\"\";s:37:\"qodef_p_responsive_768_letter_spacing\";s:0:\"\";s:32:\"qodef_p_responsive_680_font_size\";s:0:\"\";s:34:\"qodef_p_responsive_680_line_height\";s:0:\"\";s:37:\"qodef_p_responsive_680_letter_spacing\";s:0:\"\";s:19:\"qodef_header_layout\";s:8:\"standard\";s:17:\"qodef_header_skin\";s:0:\"\";s:30:\"qodef_header_scroll_appearance\";s:5:\"fixed\";s:33:\"qodef_sticky_header_scroll_amount\";s:0:\"\";s:28:\"qodef_divided_header_in_grid\";s:2:\"no\";s:27:\"qodef_divided_header_height\";s:0:\"\";s:37:\"qodef_divided_header_background_color\";s:0:\"\";s:28:\"qodef_minimal_header_in_grid\";s:2:\"no\";s:27:\"qodef_minimal_header_height\";s:0:\"\";s:37:\"qodef_minimal_header_background_color\";s:0:\"\";s:29:\"qodef_standard_header_in_grid\";s:2:\"no\";s:28:\"qodef_standard_header_height\";s:0:\"\";s:38:\"qodef_standard_header_background_color\";s:0:\"\";s:35:\"qodef_standard_header_menu_position\";s:5:\"right\";s:29:\"qodef_standard_header_padding\";s:2:\"no\";s:38:\"qodef_vertical_header_background_color\";s:0:\"\";s:21:\"qodef_top_area_header\";s:2:\"no\";s:38:\"qodef_top_area_header_background_color\";s:0:\"\";s:28:\"qodef_top_area_header_height\";s:0:\"\";s:34:\"qodef_top_area_header_side_padding\";s:0:\"\";s:31:\"qodef_nav_menu_background_image\";s:0:\"\";s:30:\"qodef_wide_dropdown_full_width\";s:3:\"yes\";s:32:\"qodef_wide_dropdown_content_grid\";s:3:\"yes\";s:25:\"qodef_dropdown_appearance\";s:7:\"default\";s:23:\"qodef_nav_1st_lvl_color\";s:0:\"\";s:29:\"qodef_nav_1st_lvl_hover_color\";s:0:\"\";s:30:\"qodef_nav_1st_lvl_active_color\";s:0:\"\";s:29:\"qodef_nav_1st_lvl_font_family\";s:0:\"\";s:27:\"qodef_nav_1st_lvl_font_size\";s:0:\"\";s:29:\"qodef_nav_1st_lvl_line_height\";s:0:\"\";s:32:\"qodef_nav_1st_lvl_letter_spacing\";s:0:\"\";s:29:\"qodef_nav_1st_lvl_font_weight\";s:0:\"\";s:32:\"qodef_nav_1st_lvl_text_transform\";s:0:\"\";s:28:\"qodef_nav_1st_lvl_font_style\";s:0:\"\";s:24:\"qodef_nav_1st_lvl_margin\";s:0:\"\";s:25:\"qodef_nav_1st_lvl_padding\";s:0:\"\";s:23:\"qodef_nav_2nd_lvl_color\";s:0:\"\";s:29:\"qodef_nav_2nd_lvl_hover_color\";s:0:\"\";s:30:\"qodef_nav_2nd_lvl_active_color\";s:0:\"\";s:29:\"qodef_nav_2nd_lvl_font_family\";s:0:\"\";s:27:\"qodef_nav_2nd_lvl_font_size\";s:0:\"\";s:29:\"qodef_nav_2nd_lvl_line_height\";s:0:\"\";s:32:\"qodef_nav_2nd_lvl_letter_spacing\";s:0:\"\";s:29:\"qodef_nav_2nd_lvl_font_weight\";s:0:\"\";s:32:\"qodef_nav_2nd_lvl_text_transform\";s:0:\"\";s:28:\"qodef_nav_2nd_lvl_font_style\";s:0:\"\";s:28:\"qodef_nav_2nd_lvl_wide_color\";s:0:\"\";s:34:\"qodef_nav_2nd_lvl_wide_hover_color\";s:0:\"\";s:35:\"qodef_nav_2nd_lvl_wide_active_color\";s:0:\"\";s:34:\"qodef_nav_2nd_lvl_wide_font_family\";s:0:\"\";s:32:\"qodef_nav_2nd_lvl_wide_font_size\";s:0:\"\";s:34:\"qodef_nav_2nd_lvl_wide_line_height\";s:0:\"\";s:37:\"qodef_nav_2nd_lvl_wide_letter_spacing\";s:0:\"\";s:34:\"qodef_nav_2nd_lvl_wide_font_weight\";s:0:\"\";s:37:\"qodef_nav_2nd_lvl_wide_text_transform\";s:0:\"\";s:33:\"qodef_nav_2nd_lvl_wide_font_style\";s:0:\"\";s:28:\"qodef_nav_3rd_lvl_wide_color\";s:0:\"\";s:34:\"qodef_nav_3rd_lvl_wide_hover_color\";s:0:\"\";s:35:\"qodef_nav_3rd_lvl_wide_active_color\";s:0:\"\";s:34:\"qodef_nav_3rd_lvl_wide_font_family\";s:0:\"\";s:32:\"qodef_nav_3rd_lvl_wide_font_size\";s:0:\"\";s:34:\"qodef_nav_3rd_lvl_wide_line_height\";s:0:\"\";s:37:\"qodef_nav_3rd_lvl_wide_letter_spacing\";s:0:\"\";s:34:\"qodef_nav_3rd_lvl_wide_font_weight\";s:0:\"\";s:37:\"qodef_nav_3rd_lvl_wide_text_transform\";s:0:\"\";s:33:\"qodef_nav_3rd_lvl_wide_font_style\";s:0:\"\";s:35:\"qodef_enable_age_verification_popup\";s:2:\"no\";s:34:\"qodef_age_verification_popup_title\";s:16:\"Are You Over 18?\";s:37:\"qodef_age_verification_popup_subtitle\";s:53:\"By entering this site you agree to our Privacy Policy\";s:33:\"qodef_age_verification_popup_note\";s:230:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lectus arcu bibendum at varius. Ut porttitor leo a diam. Penatibus et magnis dis. Ut enim ad minim veniam.\";s:33:\"qodef_age_verification_popup_link\";s:22:\"https://www.google.com\";s:45:\"qodef_age_verification_popup_background_image\";s:0:\"\";s:45:\"qodef_age_verification_popup_prevent_behavior\";s:7:\"session\";s:37:\"qodef_mobile_header_scroll_appearance\";s:2:\"no\";s:26:\"qodef_mobile_header_layout\";s:8:\"standard\";s:34:\"qodef_minimal_mobile_header_height\";s:0:\"\";s:44:\"qodef_minimal_mobile_header_background_color\";s:0:\"\";s:45:\"qodef_standard_mobile_header_background_image\";s:0:\"\";s:35:\"qodef_standard_mobile_header_height\";s:0:\"\";s:45:\"qodef_standard_mobile_header_background_color\";s:0:\"\";s:29:\"qodef_fullscreen_menu_in_grid\";s:3:\"yes\";s:38:\"qodef_fullscreen_menu_background_image\";s:0:\"\";s:33:\"qodef_fullscreen_menu_icon_source\";s:10:\"predefined\";s:31:\"qodef_fullscreen_menu_icon_pack\";s:13:\"elegant-icons\";s:35:\"qodef_fullscreen_menu_icon_svg_path\";s:0:\"\";s:41:\"qodef_fullscreen_menu_close_icon_svg_path\";s:0:\"\";s:23:\"qodef_enable_page_title\";s:3:\"yes\";s:18:\"qodef_title_layout\";s:25:\"standard-with-breadcrumbs\";s:21:\"qodef_title_hide_info\";s:2:\"no\";s:33:\"qodef_set_page_title_area_in_grid\";s:3:\"yes\";s:23:\"qodef_page_title_height\";s:0:\"\";s:33:\"qodef_page_title_background_color\";s:0:\"\";s:33:\"qodef_page_title_background_image\";s:0:\"\";s:42:\"qodef_page_title_background_image_behavior\";s:0:\"\";s:57:\"qodef_page_title_background_image_disable_parallax_mobile\";s:3:\"yes\";s:22:\"qodef_page_title_color\";s:0:\"\";s:40:\"qodef_page_title_vertical_text_alignment\";s:13:\"header-bottom\";s:25:\"qodef_page_sidebar_layout\";s:10:\"no-sidebar\";s:30:\"qodef_page_sidebar_grid_gutter\";s:0:\"\";s:24:\"qodef_enable_page_footer\";s:3:\"yes\";s:36:\"qodef_footer_area_background_pattern\";s:0:\"\";s:28:\"qodef_enable_top_footer_area\";s:3:\"yes\";s:33:\"qodef_set_footer_top_area_in_grid\";s:3:\"yes\";s:33:\"qodef_set_footer_top_area_columns\";s:1:\"4\";s:37:\"qodef_set_footer_top_area_grid_gutter\";s:0:\"\";s:38:\"qodef_top_footer_area_background_color\";s:0:\"\";s:38:\"qodef_top_footer_area_background_image\";s:0:\"\";s:38:\"qodef_top_footer_area_top_border_color\";s:0:\"\";s:38:\"qodef_top_footer_area_top_border_width\";s:0:\"\";s:31:\"qodef_enable_bottom_footer_area\";s:3:\"yes\";s:36:\"qodef_set_footer_bottom_area_in_grid\";s:3:\"yes\";s:36:\"qodef_set_footer_bottom_area_columns\";s:1:\"2\";s:40:\"qodef_set_footer_bottom_area_grid_gutter\";s:0:\"\";s:41:\"qodef_bottom_footer_area_background_color\";s:0:\"\";s:41:\"qodef_bottom_footer_area_background_image\";s:0:\"\";s:41:\"qodef_bottom_footer_area_top_border_color\";s:0:\"\";s:41:\"qodef_bottom_footer_area_top_border_width\";s:0:\"\";s:35:\"qodef_search_page_enable_page_title\";s:0:\"\";s:32:\"qodef_search_page_sidebar_layout\";s:0:\"\";s:37:\"qodef_search_page_sidebar_grid_gutter\";s:0:\"\";s:46:\"qodef_search_page_excerpt_number_of_characters\";s:0:\"\";s:24:\"qodef_search_icon_source\";s:9:\"icon_pack\";s:22:\"qodef_search_icon_pack\";s:11:\"linea-icons\";s:26:\"qodef_search_icon_svg_path\";s:0:\"\";s:32:\"qodef_search_close_icon_svg_path\";s:0:\"\";s:22:\"qodef_search_icon_size\";s:0:\"\";s:23:\"qodef_search_icon_color\";s:0:\"\";s:29:\"qodef_search_icon_hover_color\";s:0:\"\";s:23:\"qodef_search_icon_label\";s:2:\"no\";s:21:\"qodef_side_area_width\";s:0:\"\";s:37:\"qodef_side_area_content_overlay_color\";s:0:\"\";s:32:\"qodef_side_area_background_color\";s:0:\"\";s:32:\"qodef_side_area_background_image\";s:0:\"\";s:27:\"qodef_side_area_icon_source\";s:10:\"predefined\";s:25:\"qodef_side_area_icon_pack\";s:13:\"elegant-icons\";s:29:\"qodef_side_area_icon_svg_path\";s:0:\"\";s:35:\"qodef_side_area_close_icon_svg_path\";s:0:\"\";s:26:\"qodef_side_area_icon_color\";s:0:\"\";s:32:\"qodef_side_area_icon_hover_color\";s:0:\"\";s:32:\"qodef_side_area_close_icon_color\";s:0:\"\";s:38:\"qodef_side_area_close_icon_hover_color\";s:0:\"\";s:25:\"qodef_side_area_alignment\";s:0:\"\";s:44:\"qodef_blog_list_excerpt_number_of_characters\";s:0:\"\";s:33:\"qodef_blog_archive_sidebar_layout\";s:0:\"\";s:37:\"qodef_blog_single_archive_grid_gutter\";s:0:\"\";s:35:\"qodef_blog_single_enable_page_title\";s:0:\"\";s:32:\"qodef_blog_single_sidebar_layout\";s:0:\"\";s:37:\"qodef_blog_single_sidebar_grid_gutter\";s:0:\"\";s:36:\"qodef_blog_single_enable_author_info\";s:3:\"yes\";s:42:\"qodef_blog_single_enable_author_info_email\";s:2:\"no\";s:38:\"qodef_blog_single_enable_related_posts\";s:2:\"no\";s:47:\"qodef_blog_single_enable_single_post_navigation\";s:3:\"yes\";s:55:\"qodef_blog_single_post_navigation_through_same_category\";s:3:\"yes\";s:27:\"qodef_enable_share_facebook\";s:3:\"yes\";s:26:\"qodef_enable_share_twitter\";s:3:\"yes\";s:17:\"qodef_twitter_via\";s:16:\"@QodeInteractive\";s:27:\"qodef_enable_share_linkedin\";s:3:\"yes\";s:28:\"qodef_enable_share_pinterest\";s:3:\"yes\";s:25:\"qodef_enable_share_tumblr\";s:3:\"yes\";s:21:\"qodef_enable_share_vk\";s:3:\"yes\";s:18:\"qodef_maps_api_key\";s:0:\"\";s:15:\"qodef_map_style\";s:0:\"\";s:14:\"qodef_map_zoom\";s:0:\"\";s:23:\"qodef_enable_map_scroll\";s:2:\"no\";s:21:\"qodef_enable_map_drag\";s:3:\"yes\";s:36:\"qodef_enable_map_street_view_control\";s:3:\"yes\";s:29:\"qodef_enable_map_zoom_control\";s:3:\"yes\";s:29:\"qodef_enable_map_type_control\";s:3:\"yes\";s:36:\"qodef_enable_map_full_screen_control\";s:3:\"yes\";s:30:\"qodef_woo_product_list_columns\";s:0:\"\";s:36:\"qodef_woo_product_list_columns_space\";s:0:\"\";s:40:\"qodef_woo_product_list_products_per_page\";s:0:\"\";s:32:\"qodef_woo_product_list_title_tag\";s:0:\"\";s:37:\"qodef_woo_product_list_sidebar_layout\";s:10:\"no-sidebar\";s:42:\"qodef_woo_product_list_sidebar_grid_gutter\";s:0:\"\";s:34:\"qodef_woo_single_enable_page_title\";s:0:\"\";s:26:\"qodef_woo_single_title_tag\";s:0:\"\";s:41:\"qodef_woo_single_enable_image_photo_swipe\";s:3:\"yes\";s:34:\"qodef_woo_single_enable_image_zoom\";s:2:\"no\";s:38:\"qodef_woo_single_thumb_images_position\";s:5:\"below\";s:41:\"qodef_woo_single_thumbnail_images_columns\";s:1:\"5\";s:45:\"qodef_woo_single_related_product_list_columns\";s:0:\"\";s:25:\"qodef_enable_social_login\";s:2:\"no\";s:34:\"qodef_enable_facebook_social_login\";s:2:\"no\";s:34:\"qodef_facebook_social_login_api_id\";s:0:\"\";s:32:\"qodef_enable_google_social_login\";s:2:\"no\";s:32:\"qodef_google_social_login_api_id\";s:0:\"\";s:33:\"qodef_enable_twitter_social_login\";s:2:\"no\";s:28:\"qodef_enable_subscribe_popup\";s:2:\"no\";s:27:\"qodef_subscribe_popup_title\";s:0:\"\";s:30:\"qodef_subscribe_popup_subtitle\";s:0:\"\";s:38:\"qodef_subscribe_popup_background_image\";s:0:\"\";s:34:\"qodef_subscribe_popup_contact_form\";s:2:\"31\";s:36:\"qodef_enable_subscribe_popup_prevent\";s:2:\"no\";s:38:\"qodef_subscribe_popup_prevent_behavior\";s:7:\"session\";s:27:\"qodef_enable_404_page_title\";s:2:\"no\";s:28:\"qodef_enable_404_page_footer\";s:3:\"yes\";s:31:\"qodef_404_page_background_color\";s:0:\"\";s:31:\"qodef_404_page_background_image\";s:0:\"\";s:32:\"qodef_404_page_above_title_image\";s:0:\"\";s:20:\"qodef_404_page_title\";s:0:\"\";s:26:\"qodef_404_page_title_color\";s:0:\"\";s:19:\"qodef_404_page_text\";s:0:\"\";s:25:\"qodef_404_page_text_color\";s:0:\"\";s:26:\"qodef_404_page_button_text\";s:0:\"\";s:26:\"qodef_working_hours_monday\";s:0:\"\";s:27:\"qodef_working_hours_tuesday\";s:0:\"\";s:29:\"qodef_working_hours_wednesday\";s:0:\"\";s:28:\"qodef_working_hours_thursday\";s:0:\"\";s:26:\"qodef_working_hours_friday\";s:0:\"\";s:28:\"qodef_working_hours_saturday\";s:0:\"\";s:26:\"qodef_working_hours_sunday\";s:0:\"\";s:32:\"qodef_working_hours_special_days\";a:1:{i:0;s:0:\"\";}s:32:\"qodef_working_hours_special_text\";s:0:\"\";s:30:\"qode_framework_ajax_save_nonce\";s:10:\"24e736e39b\";s:16:\"_wp_http_referer\";s:43:\"/wp-admin/admin.php?page=aperitif_core_menu\";s:23:\"woocommerce-login-nonce\";N;s:8:\"_wpnonce\";N;s:32:\"woocommerce-reset-password-nonce\";N;}', 'yes'),
(349, '_transient_timeout_custom_twitter_feeds_rating_notice_waiting', '1582111699', 'no'),
(350, '_transient_custom_twitter_feeds_rating_notice_waiting', 'waiting', 'no'),
(351, 'ctf_rating_notice', 'pending', 'no'),
(352, 'ctf_statuses', 'a:1:{s:13:\"first_install\";i:1580902099;}', 'no'),
(353, 'ctf_db_version', '1.0', 'yes'),
(354, '_transient_timeout_instagram_feed_rating_notice_waiting', '1582111699', 'no'),
(355, '_transient_instagram_feed_rating_notice_waiting', 'waiting', 'no'),
(356, 'sbi_rating_notice', 'pending', 'no'),
(357, 'sbi_statuses', 'a:1:{s:13:\"first_install\";i:1580902099;}', 'no'),
(358, 'sbi_db_version', '1.3', 'yes'),
(359, 'tribe_last_generate_rewrite_rules', '1581117422.9064', 'yes'),
(360, '_transient_wc_count_comments', 'O:8:\"stdClass\":7:{s:14:\"total_comments\";i:1;s:3:\"all\";i:1;s:8:\"approved\";s:1:\"1\";s:9:\"moderated\";i:0;s:4:\"spam\";i:0;s:5:\"trash\";i:0;s:12:\"post-trashed\";i:0;}', 'yes'),
(361, '_transient_as_comment_count', 'O:8:\"stdClass\":7:{s:8:\"approved\";s:1:\"1\";s:14:\"total_comments\";i:1;s:3:\"all\";i:1;s:9:\"moderated\";i:0;s:4:\"spam\";i:0;s:5:\"trash\";i:0;s:12:\"post-trashed\";i:0;}', 'yes'),
(362, 'woocommerce_meta_box_errors', 'a:0:{}', 'yes'),
(363, 'fs_active_plugins', 'O:8:\"stdClass\":3:{s:7:\"plugins\";a:1:{s:42:\"the-events-calendar/common/vendor/freemius\";O:8:\"stdClass\":4:{s:7:\"version\";s:5:\"2.3.0\";s:4:\"type\";s:6:\"plugin\";s:9:\"timestamp\";i:1580902100;s:11:\"plugin_path\";s:43:\"the-events-calendar/the-events-calendar.php\";}}s:7:\"abspath\";s:73:\"C:\\Users\\binep\\Desktop\\RhodeIsland_Liquors\\www.rhodeislandliquors.dev.cc/\";s:6:\"newest\";O:8:\"stdClass\":5:{s:11:\"plugin_path\";s:43:\"the-events-calendar/the-events-calendar.php\";s:8:\"sdk_path\";s:42:\"the-events-calendar/common/vendor/freemius\";s:7:\"version\";s:5:\"2.3.0\";s:13:\"in_activation\";b:0;s:9:\"timestamp\";i:1580902100;}}', 'yes'),
(364, 'fs_debug_mode', '', 'yes'),
(365, 'fs_accounts', 'a:5:{s:21:\"id_slug_type_path_map\";a:1:{i:3069;a:3:{s:4:\"slug\";s:19:\"the-events-calendar\";s:4:\"type\";s:6:\"plugin\";s:4:\"path\";s:43:\"the-events-calendar/the-events-calendar.php\";}}s:11:\"plugin_data\";a:1:{s:19:\"the-events-calendar\";a:13:{s:16:\"plugin_main_file\";O:8:\"stdClass\":1:{s:4:\"path\";s:43:\"the-events-calendar/the-events-calendar.php\";}s:20:\"is_network_activated\";b:0;s:17:\"install_timestamp\";i:1580902100;s:16:\"sdk_last_version\";N;s:11:\"sdk_version\";s:5:\"2.3.0\";s:16:\"sdk_upgrade_mode\";b:1;s:18:\"sdk_downgrade_mode\";b:0;s:19:\"plugin_last_version\";s:7:\"5.0.0.1\";s:14:\"plugin_version\";s:7:\"5.0.0.2\";s:19:\"plugin_upgrade_mode\";b:1;s:21:\"plugin_downgrade_mode\";b:0;s:17:\"connectivity_test\";a:6:{s:12:\"is_connected\";b:1;s:4:\"host\";s:29:\"www.rhodeislandliquors.dev.cc\";s:9:\"server_ip\";s:9:\"127.0.0.1\";s:9:\"is_active\";b:1;s:9:\"timestamp\";i:1580902977;s:7:\"version\";s:7:\"5.0.0.1\";}s:21:\"is_plugin_new_install\";b:0;}}s:13:\"file_slug_map\";a:1:{s:43:\"the-events-calendar/the-events-calendar.php\";s:19:\"the-events-calendar\";}s:7:\"plugins\";a:1:{s:19:\"the-events-calendar\";O:9:\"FS_Plugin\":22:{s:16:\"parent_plugin_id\";N;s:5:\"title\";s:19:\"The Events Calendar\";s:4:\"slug\";s:19:\"the-events-calendar\";s:12:\"premium_slug\";s:27:\"the-events-calendar-premium\";s:4:\"type\";s:6:\"plugin\";s:20:\"affiliate_moderation\";b:0;s:19:\"is_wp_org_compliant\";b:1;s:22:\"premium_releases_count\";N;s:4:\"file\";s:43:\"the-events-calendar/the-events-calendar.php\";s:7:\"version\";s:7:\"5.0.0.2\";s:11:\"auto_update\";N;s:4:\"info\";N;s:10:\"is_premium\";b:0;s:14:\"premium_suffix\";s:9:\"(Premium)\";s:7:\"is_live\";b:1;s:9:\"bundle_id\";N;s:10:\"public_key\";s:32:\"pk_e32061abc28cfedf231f3e5c4e626\";s:10:\"secret_key\";N;s:2:\"id\";s:4:\"3069\";s:7:\"updated\";N;s:7:\"created\";N;s:22:\"\0FS_Entity\0_is_updated\";b:1;}}s:9:\"unique_id\";s:32:\"edb7e22a3cde218ae90f5c3c5ab92420\";}', 'yes'),
(368, 'yith_system_info', 'a:2:{s:11:\"system_info\";a:13:{s:14:\"min_wp_version\";a:1:{s:5:\"value\";s:3:\"5.3\";}s:14:\"min_wc_version\";a:1:{s:5:\"value\";s:5:\"3.9.1\";}s:15:\"wp_memory_limit\";a:1:{s:5:\"value\";i:536870912;}s:15:\"min_php_version\";a:1:{s:5:\"value\";s:5:\"7.3.1\";}s:15:\"min_tls_version\";a:1:{s:5:\"value\";s:0:\"\";}s:15:\"imagick_version\";a:1:{s:5:\"value\";s:3:\"n/a\";}s:15:\"wp_cron_enabled\";a:1:{s:5:\"value\";b:1;}s:16:\"mbstring_enabled\";a:1:{s:5:\"value\";b:1;}s:17:\"simplexml_enabled\";a:1:{s:5:\"value\";b:1;}s:10:\"gd_enabled\";a:1:{s:5:\"value\";b:1;}s:13:\"iconv_enabled\";a:1:{s:5:\"value\";b:1;}s:15:\"opcache_enabled\";a:1:{s:5:\"value\";b:0;}s:17:\"url_fopen_enabled\";a:1:{s:5:\"value\";s:1:\"1\";}}s:6:\"errors\";b:0;}', 'yes'),
(369, 'woocommerce_setup_ab_wc_admin_onboarding', 'a', 'yes'),
(370, '_transient_timeout_tribe_feature_detection', '1581506911', 'no'),
(371, '_transient_tribe_feature_detection', 'a:1:{s:22:\"supports_async_process\";b:0;}', 'no'),
(379, 'yith-wcqv-enable', 'yes', 'yes'),
(380, 'yith-wcqv-enable-mobile', 'yes', 'yes'),
(381, 'yith-wcqv-button-label', 'Quick View', 'yes'),
(382, 'yith-wcqv-enable-lightbox', 'yes', 'yes'),
(383, 'yith-wcqv-background-modal', '#ffffff', 'yes'),
(384, 'yith-wcqv-close-color', '#cdcdcd', 'yes'),
(385, 'yith-wcqv-close-color-hover', '#ff0000', 'yes'),
(386, 'yit_plugin_fw_panel_wc_default_options_set', 'a:2:{s:15:\"yith_wcqv_panel\";b:1;s:15:\"yith_wcwl_panel\";b:1;}', 'yes'),
(387, 'yith_wcwl_ajax_enable', 'no', 'yes'),
(388, 'yith_wfbt_enable_integration', 'yes', 'yes'),
(389, 'yith_wcwl_after_add_to_wishlist_behaviour', 'view', 'yes'),
(390, 'yith_wcwl_show_on_loop', 'no', 'yes'),
(391, 'yith_wcwl_loop_position', 'after_add_to_cart', 'yes'),
(392, 'yith_wcwl_button_position', 'after_add_to_cart', 'yes'),
(393, 'yith_wcwl_add_to_wishlist_text', 'Add to wishlist', 'yes'),
(394, 'yith_wcwl_product_added_text', 'Product added!', 'yes'),
(395, 'yith_wcwl_browse_wishlist_text', 'Browse wishlist', 'yes'),
(396, 'yith_wcwl_already_in_wishlist_text', 'The product is already in your wishlist!', 'yes'),
(397, 'yith_wcwl_add_to_wishlist_style', 'link', 'yes'),
(398, 'yith_wcwl_rounded_corners_radius', '16', 'yes'),
(399, 'yith_wcwl_add_to_wishlist_icon', 'fa-heart-o', 'yes'),
(400, 'yith_wcwl_add_to_wishlist_custom_icon', '', 'yes'),
(401, 'yith_wcwl_added_to_wishlist_icon', 'fa-heart', 'yes'),
(402, 'yith_wcwl_added_to_wishlist_custom_icon', '', 'yes'),
(403, 'yith_wcwl_custom_css', '', 'yes'),
(404, 'yith_wcwl_variation_show', '', 'yes'),
(405, 'yith_wcwl_price_show', '', 'yes'),
(406, 'yith_wcwl_stock_show', '', 'yes'),
(407, 'yith_wcwl_show_dateadded', '', 'yes'),
(408, 'yith_wcwl_add_to_cart_show', '', 'yes'),
(409, 'yith_wcwl_show_remove', 'yes', 'yes'),
(410, 'yith_wcwl_repeat_remove_button', '', 'yes'),
(411, 'yith_wcwl_redirect_cart', 'no', 'yes'),
(412, 'yith_wcwl_remove_after_add_to_cart', 'yes', 'yes'),
(413, 'yith_wcwl_enable_share', 'yes', 'yes'),
(414, 'yith_wcwl_share_fb', 'yes', 'yes'),
(415, 'yith_wcwl_share_twitter', 'yes', 'yes'),
(416, 'yith_wcwl_share_pinterest', 'yes', 'yes'),
(417, 'yith_wcwl_share_email', 'yes', 'yes'),
(418, 'yith_wcwl_share_whatsapp', 'yes', 'yes'),
(419, 'yith_wcwl_share_url', 'no', 'yes'),
(420, 'yith_wcwl_socials_title', 'My wishlist on Rhode Island Liquors', 'yes'),
(421, 'yith_wcwl_socials_text', '', 'yes'),
(422, 'yith_wcwl_socials_image_url', '', 'yes'),
(423, 'yith_wcwl_wishlist_title', 'My wishlist on Rhode Island Liquors', 'yes'),
(424, 'yith_wcwl_add_to_cart_text', 'Add to cart', 'yes'),
(425, 'yith_wcwl_add_to_cart_style', 'link', 'yes'),
(426, 'yith_wcwl_add_to_cart_rounded_corners_radius', '16', 'yes'),
(427, 'yith_wcwl_add_to_cart_icon', 'fa-shopping-cart', 'yes'),
(428, 'yith_wcwl_add_to_cart_custom_icon', '', 'yes'),
(429, 'yith_wcwl_color_headers_background', '#F4F4F4', 'yes'),
(430, 'yith_wcwl_fb_button_icon', 'fa-facebook', 'yes'),
(431, 'yith_wcwl_fb_button_custom_icon', '', 'yes'),
(432, 'yith_wcwl_tw_button_icon', 'fa-twitter', 'yes'),
(433, 'yith_wcwl_tw_button_custom_icon', '', 'yes'),
(434, 'yith_wcwl_pr_button_icon', 'fa-pinterest', 'yes'),
(435, 'yith_wcwl_pr_button_custom_icon', '', 'yes'),
(436, 'yith_wcwl_em_button_icon', 'fa-envelope-o', 'yes'),
(437, 'yith_wcwl_em_button_custom_icon', '', 'yes'),
(438, 'yith_wcwl_wa_button_icon', 'fa-whatsapp', 'yes'),
(439, 'yith_wcwl_wa_button_custom_icon', '', 'yes'),
(452, 'yith_plugin_fw_promo_2019_bis', '1', 'yes'),
(453, 'wpb_js_composer_license_activation_notified', 'yes', 'yes'),
(460, 'license_key_token', '1580902722|kifnJB1uD7isjay2e9hg', 'yes'),
(463, 'fs_gdpr', 'a:1:{s:2:\"u1\";a:1:{s:8:\"required\";b:0;}}', 'yes'),
(467, '_site_transient_timeout_yith_promo_message', '3161892352', 'no'),
(469, '_site_transient_yith_promo_message', '<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<!-- Default border color: #acc327 -->\n<!-- Default background color: #ecf7ed -->\n\n<promotions>\n    <expiry_date>2019-12-10</expiry_date>\n    <promo>\n        <promo_id>yithblackfriday2019</promo_id>\n        <title><![CDATA[<strong>YITH Black Friday</strong>]]></title>\n        <description><![CDATA[\n            Don\'t miss our <strong>30% discount</strong> on all our products! No coupon needed in cart. Valid from <strong>28th November</strong> to <strong>2nd December</strong>.\n        ]]></description>\n        <link>\n            <label>Get your deals now!</label>\n            <url><![CDATA[https://yithemes.com]]></url>\n        </link>\n        <style>\n            <image_bg_color>#272121</image_bg_color>\n            <border_color>#272121</border_color>\n            <background_color>#ffffff</background_color>\n        </style>\n        <start_date>2019-11-27 23:59:59</start_date>\n        <end_date>2019-12-03 08:00:00</end_date>\n    </promo>\n</promotions>', 'no'),
(510, 'category_children', 'a:0:{}', 'yes'),
(587, '_transient_timeout_wc_low_stock_count', '1583526634', 'no'),
(588, '_transient_wc_low_stock_count', '0', 'no'),
(589, '_transient_timeout_wc_outofstock_count', '1583526634', 'no'),
(590, '_transient_wc_outofstock_count', '0', 'no'),
(764, 'revslider-connection', '1', 'yes'),
(765, 'revslider-update-hash', 'e3979620d3c8f4c36df883100c6a53c3', 'yes'),
(766, 'revslider-latest-version', '6.1.8', 'yes'),
(767, 'revslider-stable-version', '4.2', 'yes'),
(768, 'revslider-notices', 'a:1:{i:0;O:8:\"stdClass\":7:{s:7:\"version\";s:5:\"6.2.0\";s:4:\"text\";s:1234:\"<rs-module-wrap id=\"rev_slider_2516_1_wrapper\" data-alias=\"surveybanner\" data-source=\"gallery\" style=\"background:transparent;padding:0;float:left;margin-left:0;margin-right:0;margin-top:30px;max-width:1400px\"><rs-module id=\"rev_slider_2516_1\" style=\"display:none;\" data-version=\"6.2.0\"><rs-slides><rs-slide data-key=\"rs-5208\" data-title=\"Slide\" data-anim=\"ei:d;eo:d;s:1000;r:0;t:fade;sl:0;\"><img src=\"//updates.themepunch.tools/banners/rs60/transparent.png\" title=\"pat\" class=\"rev-slidebg\" data-no-retina><!----><a id=\"slider-2516-slide-5208-layer-0\" class=\"rs-layer\" href=\"https://forms.gle/TQkCC2dVDZc95Fuk9\" target=\"_blank\" rel=\"nofollow\" data-type=\"image\" data-xy=\"x:c;y:c;\" data-text=\"w:normal;\" data-dim=\"w:1400px;h:250px;\" data-basealign=\"slide\" data-rsp_o=\"off\" data-rsp_bd=\"off\" data-frame_0=\"sX:0.8;sY:0.8;\" data-frame_1=\"e:power4.out;sp:1000;\" data-frame_999=\"o:0;st:w;sR:8550;\" style=\"z-index:5;\"><img src=\"//updates.themepunch.tools/banners/rs60/surveybanner620.jpg\" width=\"1400\" height=\"250\" data-no-retina></a><!----></rs-slide></rs-slides><rs-progress class=\"rs-bottom\" style=\"visibility: hidden !important;\"></rs-progress></rs-module></rs-module-wrap><div style=\"clear:both;display:block;width:100%;height:0px\"></div>\";s:6:\"script\";s:316:\"{\"sliderType\":\"hero\",\"visibilityLevels\":\"1800,1500,778,480\",\"gridwidth\":1415,\"gridheight\":250,\"minHeight\":\"250px\",\"keepBPHeight\":true,\"editorheight\":\"250,768,960,720\",\"responsiveLevels\":\"1800,1500,778,480\",\"disableProgressBar\":\"on\",\"navigation\":{\"onHoverStop\":false},\"fallbacks\":{\"allowHTML5AutoPlayOnAndroid\":true}}\";s:4:\"code\";s:10:\"TPRS620-04\";s:4:\"type\";s:1:\"3\";s:4:\"icon\";s:0:\"\";s:10:\"additional\";a:0:{}}}', 'yes'),
(769, 'revslider-addons', 'O:8:\"stdClass\":27:{s:26:\"revslider-whiteboard-addon\";O:8:\"stdClass\":11:{s:4:\"slug\";s:26:\"revslider-whiteboard-addon\";s:12:\"version_from\";s:5:\"5.2.0\";s:10:\"version_to\";s:5:\"9.9.9\";s:5:\"title\";s:10:\"Whiteboard\";s:6:\"line_1\";s:31:\"Create Hand-Drawn Presentations\";s:6:\"line_2\";s:45:\"that are understandable, memorable & engaging\";s:9:\"available\";s:5:\"2.1.0\";s:10:\"background\";s:65:\"//updates.themepunch.tools/addons/images/whiteboard_widget_bg.jpg\";s:6:\"button\";s:11:\"How to use?\";s:6:\"global\";b:0;s:4:\"logo\";O:8:\"stdClass\":3:{s:3:\"img\";s:61:\"//updates.themepunch.tools/addons/images/addon_whiteboard.jpg\";s:5:\"color\";s:0:\"\";s:4:\"text\";s:2:\"WB\";}}s:22:\"revslider-backup-addon\";O:8:\"stdClass\":11:{s:4:\"slug\";s:22:\"revslider-backup-addon\";s:12:\"version_from\";s:5:\"5.2.0\";s:10:\"version_to\";s:5:\"9.9.9\";s:5:\"title\";s:6:\"Backup\";s:6:\"line_1\";s:12:\"Make Backups\";s:6:\"line_2\";s:25:\"Revisions for your safety\";s:9:\"available\";s:5:\"2.0.1\";s:10:\"background\";s:0:\"\";s:6:\"button\";s:11:\"How to use?\";s:6:\"global\";b:1;s:4:\"logo\";O:8:\"stdClass\":3:{s:3:\"img\";s:57:\"//updates.themepunch.tools/addons/images/addon_backup.jpg\";s:5:\"color\";s:0:\"\";s:4:\"text\";s:2:\"BU\";}}s:23:\"revslider-gallery-addon\";O:8:\"stdClass\":11:{s:4:\"slug\";s:23:\"revslider-gallery-addon\";s:12:\"version_from\";s:5:\"5.2.0\";s:10:\"version_to\";s:5:\"9.9.9\";s:5:\"title\";s:17:\"WordPress Gallery\";s:6:\"line_1\";s:31:\"Replace the standard WP Gallery\";s:6:\"line_2\";s:31:\"with the Sliders of your choice\";s:9:\"available\";s:5:\"2.0.0\";s:10:\"background\";s:0:\"\";s:6:\"button\";s:9:\"Configure\";s:6:\"global\";b:1;s:4:\"logo\";O:8:\"stdClass\":3:{s:3:\"img\";s:60:\"//updates.themepunch.tools/addons/images/addon_wpgallery.jpg\";s:5:\"color\";s:0:\"\";s:4:\"text\";s:2:\"GA\";}}s:25:\"revslider-rel-posts-addon\";O:8:\"stdClass\":11:{s:4:\"slug\";s:25:\"revslider-rel-posts-addon\";s:12:\"version_from\";s:7:\"5.2.4.1\";s:10:\"version_to\";s:5:\"9.9.9\";s:5:\"title\";s:13:\"Related Posts\";s:6:\"line_1\";s:25:\"Add related Posts Sliders\";s:6:\"line_2\";s:31:\"at the end of your post content\";s:9:\"available\";s:5:\"2.0.0\";s:10:\"background\";s:0:\"\";s:6:\"button\";s:9:\"Configure\";s:6:\"global\";b:1;s:4:\"logo\";O:8:\"stdClass\":3:{s:3:\"img\";s:60:\"//updates.themepunch.tools/addons/images/addon_wprelated.jpg\";s:5:\"color\";s:0:\"\";s:4:\"text\";s:2:\"RP\";}}s:26:\"revslider-typewriter-addon\";O:8:\"stdClass\":11:{s:4:\"slug\";s:26:\"revslider-typewriter-addon\";s:12:\"version_from\";s:5:\"5.3.0\";s:10:\"version_to\";s:5:\"9.9.9\";s:5:\"title\";s:17:\"Typewriter Effect\";s:6:\"line_1\";s:27:\"Enhance your slider\'s text \";s:6:\"line_2\";s:24:\"with typewriter effects \";s:9:\"available\";s:5:\"2.0.2\";s:10:\"background\";s:0:\"\";s:6:\"button\";s:9:\"Configure\";s:6:\"global\";b:0;s:4:\"logo\";O:8:\"stdClass\":3:{s:3:\"img\";s:61:\"//updates.themepunch.tools/addons/images/addon_typewriter.jpg\";s:5:\"color\";s:0:\"\";s:4:\"text\";s:2:\"TW\";}}s:23:\"revslider-sharing-addon\";O:8:\"stdClass\":11:{s:4:\"slug\";s:23:\"revslider-sharing-addon\";s:12:\"version_from\";s:5:\"5.3.1\";s:10:\"version_to\";s:5:\"9.9.9\";s:5:\"title\";s:14:\"Social Sharing\";s:6:\"line_1\";s:17:\"Share your slides\";s:6:\"line_2\";s:50:\"with RevSlider \"actions\" because sharing is caring\";s:9:\"available\";s:5:\"2.0.4\";s:10:\"background\";s:0:\"\";s:6:\"button\";s:11:\"How to use?\";s:6:\"global\";b:1;s:4:\"logo\";O:8:\"stdClass\":3:{s:3:\"img\";s:64:\"//updates.themepunch.tools/addons/images/addon_socialsharing.jpg\";s:5:\"color\";s:0:\"\";s:4:\"text\";s:2:\"SH\";}}s:27:\"revslider-maintenance-addon\";O:8:\"stdClass\":11:{s:4:\"slug\";s:27:\"revslider-maintenance-addon\";s:12:\"version_from\";s:5:\"5.3.1\";s:10:\"version_to\";s:5:\"9.9.9\";s:5:\"title\";s:15:\"Coming & Maint.\";s:6:\"line_1\";s:37:\"Simple Coming Soon & Maintenance Page\";s:6:\"line_2\";s:42:\"Let your visitors know what\'s up and when!\";s:9:\"available\";s:5:\"2.1.1\";s:10:\"background\";s:0:\"\";s:6:\"button\";s:9:\"Configure\";s:6:\"global\";b:1;s:4:\"logo\";O:8:\"stdClass\":3:{s:3:\"img\";s:68:\"//updates.themepunch.tools/addons/images/addon_underconstruction.jpg\";s:5:\"color\";s:0:\"\";s:4:\"text\";s:2:\"MT\";}}s:20:\"revslider-snow-addon\";O:8:\"stdClass\":11:{s:4:\"slug\";s:20:\"revslider-snow-addon\";s:12:\"version_from\";s:5:\"5.4.6\";s:10:\"version_to\";s:5:\"9.9.9\";s:5:\"title\";s:12:\"Holiday Snow\";s:6:\"line_1\";s:12:\"Let it snow!\";s:6:\"line_2\";s:32:\"Add animated snow to any Slider \";s:9:\"available\";s:5:\"2.0.0\";s:10:\"background\";s:0:\"\";s:6:\"button\";s:11:\"How to use?\";s:6:\"global\";b:0;s:4:\"logo\";O:8:\"stdClass\":3:{s:3:\"img\";s:55:\"//updates.themepunch.tools/addons/images/addon_snow.jpg\";s:5:\"color\";s:0:\"\";s:4:\"text\";s:2:\"SN\";}}s:25:\"revslider-particles-addon\";O:8:\"stdClass\":11:{s:4:\"slug\";s:25:\"revslider-particles-addon\";s:12:\"version_from\";s:5:\"5.4.6\";s:10:\"version_to\";s:5:\"9.9.9\";s:5:\"title\";s:16:\"Particle Effects\";s:6:\"line_1\";s:17:\"Let\'s Parti(cle)!\";s:6:\"line_2\";s:51:\"Add interactive particle animations to your sliders\";s:9:\"available\";s:5:\"2.1.0\";s:10:\"background\";s:0:\"\";s:6:\"button\";s:11:\"How to use?\";s:6:\"global\";b:0;s:4:\"logo\";O:8:\"stdClass\":3:{s:3:\"img\";s:60:\"//updates.themepunch.tools/addons/images/addon_particles.jpg\";s:5:\"color\";s:0:\"\";s:4:\"text\";s:2:\"PT\";}}s:24:\"revslider-polyfold-addon\";O:8:\"stdClass\":11:{s:4:\"slug\";s:24:\"revslider-polyfold-addon\";s:12:\"version_from\";s:5:\"5.4.6\";s:10:\"version_to\";s:5:\"9.9.9\";s:5:\"title\";s:22:\"Polyfold Scroll Effect\";s:6:\"line_1\";s:32:\"Add sharp edges to your sliders \";s:6:\"line_2\";s:35:\"as they scroll into and out of view\";s:9:\"available\";s:5:\"2.0.0\";s:10:\"background\";s:0:\"\";s:6:\"button\";s:11:\"How to use?\";s:6:\"global\";b:0;s:4:\"logo\";O:8:\"stdClass\":3:{s:3:\"img\";s:59:\"//updates.themepunch.tools/addons/images/addon_polyfold.jpg\";s:5:\"color\";s:7:\"#3e186f\";s:4:\"text\";s:2:\"PF\";}}s:19:\"revslider-404-addon\";O:8:\"stdClass\":11:{s:4:\"slug\";s:19:\"revslider-404-addon\";s:12:\"version_from\";s:3:\"5.3\";s:10:\"version_to\";s:5:\"9.9.9\";s:5:\"title\";s:3:\"404\";s:6:\"line_1\";s:39:\"Build custom 404 \"Page not Found\" Pages\";s:6:\"line_2\";s:28:\"with Slider Revolution swag!\";s:9:\"available\";s:5:\"2.0.0\";s:10:\"background\";s:0:\"\";s:6:\"button\";s:9:\"Configure\";s:6:\"global\";b:1;s:4:\"logo\";O:8:\"stdClass\":3:{s:3:\"img\";s:54:\"//updates.themepunch.tools/addons/images/addon_404.jpg\";s:5:\"color\";s:0:\"\";s:4:\"text\";s:3:\"404\";}}s:30:\"revslider-prevnext-posts-addon\";O:8:\"stdClass\":11:{s:4:\"slug\";s:30:\"revslider-prevnext-posts-addon\";s:12:\"version_from\";s:3:\"5.4\";s:10:\"version_to\";s:5:\"9.9.9\";s:5:\"title\";s:14:\"Adjacent Posts\";s:6:\"line_1\";s:30:\"Display previous and next post\";s:6:\"line_2\";s:28:\"to the currently showing one\";s:9:\"available\";s:5:\"2.0.1\";s:10:\"background\";s:0:\"\";s:6:\"button\";s:9:\"Configure\";s:6:\"global\";b:1;s:4:\"logo\";O:8:\"stdClass\":3:{s:3:\"img\";s:61:\"//updates.themepunch.tools/addons/images/addon_wpadjacent.jpg\";s:5:\"color\";s:0:\"\";s:4:\"text\";s:2:\"PN\";}}s:25:\"revslider-filmstrip-addon\";O:8:\"stdClass\":11:{s:4:\"slug\";s:25:\"revslider-filmstrip-addon\";s:12:\"version_from\";s:5:\"5.4.6\";s:10:\"version_to\";s:5:\"9.9.9\";s:5:\"title\";s:9:\"Filmstrip\";s:6:\"line_1\";s:44:\"Display a continously rotating set of images\";s:6:\"line_2\";s:26:\"for your slide backgrounds\";s:9:\"available\";s:5:\"2.0.2\";s:10:\"background\";s:0:\"\";s:6:\"button\";s:6:\"How To\";s:6:\"global\";b:0;s:4:\"logo\";O:8:\"stdClass\":3:{s:3:\"img\";s:60:\"//updates.themepunch.tools/addons/images/addon_filmstrip.jpg\";s:5:\"color\";s:0:\"\";s:4:\"text\";s:2:\"FS\";}}s:21:\"revslider-login-addon\";O:8:\"stdClass\":11:{s:4:\"slug\";s:21:\"revslider-login-addon\";s:12:\"version_from\";s:3:\"5.4\";s:10:\"version_to\";s:5:\"9.9.9\";s:5:\"title\";s:10:\"Login Page\";s:6:\"line_1\";s:25:\"Very simple WP Login Page\";s:6:\"line_2\";s:34:\"enhanced with your favorite slider\";s:9:\"available\";s:5:\"2.0.1\";s:10:\"background\";s:0:\"\";s:6:\"button\";s:9:\"Configure\";s:6:\"global\";b:1;s:4:\"logo\";O:8:\"stdClass\":3:{s:3:\"img\";s:56:\"//updates.themepunch.tools/addons/images/addon_login.jpg\";s:5:\"color\";s:0:\"\";s:4:\"text\";s:2:\"LI\";}}s:24:\"revslider-featured-addon\";O:8:\"stdClass\":11:{s:4:\"slug\";s:24:\"revslider-featured-addon\";s:12:\"version_from\";s:3:\"5.4\";s:10:\"version_to\";s:5:\"9.9.9\";s:5:\"title\";s:20:\"Post Featured Slider\";s:6:\"line_1\";s:25:\"Display a featured Slider\";s:6:\"line_2\";s:41:\"instead of a featured Image in your Posts\";s:9:\"available\";s:5:\"2.0.1\";s:10:\"background\";s:0:\"\";s:6:\"button\";s:9:\"Configure\";s:6:\"global\";b:1;s:4:\"logo\";O:8:\"stdClass\":3:{s:3:\"img\";s:61:\"//updates.themepunch.tools/addons/images/addon_wpfeatured.jpg\";s:5:\"color\";s:0:\"\";s:4:\"text\";s:2:\"FT\";}}s:22:\"revslider-slicey-addon\";O:8:\"stdClass\":11:{s:4:\"slug\";s:22:\"revslider-slicey-addon\";s:12:\"version_from\";s:5:\"5.4.6\";s:10:\"version_to\";s:5:\"9.9.9\";s:5:\"title\";s:6:\"Slicey\";s:6:\"line_1\";s:20:\"Slice \'em up nicely!\";s:6:\"line_2\";s:38:\"Create image slices of your background\";s:9:\"available\";s:5:\"2.0.0\";s:10:\"background\";s:0:\"\";s:6:\"button\";s:6:\"How To\";s:6:\"global\";b:0;s:4:\"logo\";O:8:\"stdClass\":3:{s:3:\"img\";s:57:\"//updates.themepunch.tools/addons/images/addon_slicey.jpg\";s:5:\"color\";s:0:\"\";s:4:\"text\";s:2:\"SL\";}}s:27:\"revslider-beforeafter-addon\";O:8:\"stdClass\":11:{s:4:\"slug\";s:27:\"revslider-beforeafter-addon\";s:12:\"version_from\";s:5:\"5.4.6\";s:10:\"version_to\";s:5:\"9.9.9\";s:5:\"title\";s:14:\"Before & After\";s:6:\"line_1\";s:35:\"Compare two slides before and after\";s:6:\"line_2\";s:33:\"use it vertically or horizontally\";s:9:\"available\";s:5:\"2.0.2\";s:10:\"background\";s:0:\"\";s:6:\"button\";s:6:\"How To\";s:6:\"global\";b:0;s:4:\"logo\";O:8:\"stdClass\":3:{s:3:\"img\";s:62:\"//updates.themepunch.tools/addons/images/addon_beforeafter.jpg\";s:5:\"color\";s:0:\"\";s:4:\"text\";s:2:\"BA\";}}s:23:\"revslider-weather-addon\";O:8:\"stdClass\":11:{s:4:\"slug\";s:23:\"revslider-weather-addon\";s:12:\"version_from\";s:7:\"5.4.5.2\";s:10:\"version_to\";s:5:\"9.9.9\";s:5:\"title\";s:7:\"Weather\";s:6:\"line_1\";s:21:\"Every where you go...\";s:6:\"line_2\";s:36:\"...always take the weather with you!\";s:9:\"available\";s:5:\"2.0.1\";s:10:\"background\";s:0:\"\";s:6:\"button\";s:9:\"Configure\";s:6:\"global\";b:0;s:4:\"logo\";O:8:\"stdClass\":3:{s:3:\"img\";s:58:\"//updates.themepunch.tools/addons/images/addon_weather.jpg\";s:5:\"color\";s:0:\"\";s:4:\"text\";s:2:\"WT\";}}s:24:\"revslider-panorama-addon\";O:8:\"stdClass\":11:{s:4:\"slug\";s:24:\"revslider-panorama-addon\";s:12:\"version_from\";s:7:\"5.4.5.2\";s:10:\"version_to\";s:5:\"9.9.9\";s:5:\"title\";s:8:\"Panorama\";s:6:\"line_1\";s:14:\"Panorama AddOn\";s:6:\"line_2\";s:23:\"Display images in 360°\";s:9:\"available\";s:5:\"2.1.1\";s:10:\"background\";s:0:\"\";s:6:\"button\";s:6:\"How To\";s:6:\"global\";b:0;s:4:\"logo\";O:8:\"stdClass\":3:{s:3:\"img\";s:59:\"//updates.themepunch.tools/addons/images/addon_panorama.jpg\";s:5:\"color\";s:0:\"\";s:4:\"text\";s:2:\"PN\";}}s:30:\"revslider-duotonefilters-addon\";O:8:\"stdClass\":11:{s:4:\"slug\";s:30:\"revslider-duotonefilters-addon\";s:12:\"version_from\";s:5:\"5.4.6\";s:10:\"version_to\";s:5:\"9.9.9\";s:5:\"title\";s:7:\"Duotone\";s:6:\"line_1\";s:7:\"Duotone\";s:6:\"line_2\";s:25:\"Because one is not enough\";s:9:\"available\";s:5:\"2.0.0\";s:10:\"background\";s:0:\"\";s:6:\"button\";s:6:\"How To\";s:6:\"global\";b:0;s:4:\"logo\";O:8:\"stdClass\":3:{s:3:\"img\";s:58:\"//updates.themepunch.tools/addons/images/addon_duotone.jpg\";s:5:\"color\";s:0:\"\";s:4:\"text\";s:3:\"DTF\";}}s:24:\"revslider-revealer-addon\";O:8:\"stdClass\":11:{s:4:\"slug\";s:24:\"revslider-revealer-addon\";s:12:\"version_from\";s:5:\"5.4.6\";s:10:\"version_to\";s:5:\"9.9.9\";s:5:\"title\";s:6:\"Reveal\";s:6:\"line_1\";s:9:\"Reveal...\";s:6:\"line_2\";s:37:\"...your inner beast... and RevSliders\";s:9:\"available\";s:5:\"2.0.0\";s:10:\"background\";s:0:\"\";s:6:\"button\";s:6:\"How To\";s:6:\"global\";b:0;s:4:\"logo\";O:8:\"stdClass\":3:{s:3:\"img\";s:57:\"//updates.themepunch.tools/addons/images/addon_reveal.jpg\";s:5:\"color\";s:0:\"\";s:4:\"text\";s:2:\"RV\";}}s:23:\"revslider-refresh-addon\";O:8:\"stdClass\":11:{s:4:\"slug\";s:23:\"revslider-refresh-addon\";s:12:\"version_from\";s:5:\"5.4.6\";s:10:\"version_to\";s:5:\"9.9.9\";s:5:\"title\";s:8:\"(Re)Load\";s:6:\"line_1\";s:39:\"Reload the current page or a custom URL\";s:6:\"line_2\";s:34:\"after a certain time, loops, slide\";s:9:\"available\";s:5:\"2.0.0\";s:10:\"background\";s:0:\"\";s:6:\"button\";s:6:\"How To\";s:6:\"global\";b:0;s:4:\"logo\";O:8:\"stdClass\":3:{s:3:\"img\";s:57:\"//updates.themepunch.tools/addons/images/addon_reload.jpg\";s:5:\"color\";s:0:\"\";s:4:\"text\";s:2:\"RF\";}}s:27:\"revslider-bubblemorph-addon\";O:8:\"stdClass\":11:{s:4:\"slug\";s:27:\"revslider-bubblemorph-addon\";s:12:\"version_from\";s:5:\"5.4.6\";s:10:\"version_to\";s:5:\"9.9.9\";s:5:\"title\";s:11:\"BubbleMorph\";s:6:\"line_1\";s:26:\"Include BubbleMorph Layers\";s:6:\"line_2\";s:33:\"for a decorative lava lamp effect\";s:9:\"available\";s:5:\"2.1.0\";s:10:\"background\";s:0:\"\";s:6:\"button\";s:6:\"How To\";s:6:\"global\";b:0;s:4:\"logo\";O:8:\"stdClass\":3:{s:3:\"img\";s:62:\"//updates.themepunch.tools/addons/images/addon_bubblemorph.jpg\";s:5:\"color\";s:0:\"\";s:4:\"text\";s:2:\"BM\";}}s:28:\"revslider-liquideffect-addon\";O:8:\"stdClass\":11:{s:4:\"slug\";s:28:\"revslider-liquideffect-addon\";s:12:\"version_from\";s:5:\"5.4.6\";s:10:\"version_to\";s:5:\"9.9.9\";s:5:\"title\";s:10:\"Distortion\";s:6:\"line_1\";s:22:\"Add Distortion Effects\";s:6:\"line_2\";s:30:\"to your slides and transitions\";s:9:\"available\";s:5:\"2.0.0\";s:10:\"background\";s:0:\"\";s:6:\"button\";s:6:\"How To\";s:6:\"global\";b:0;s:4:\"logo\";O:8:\"stdClass\":3:{s:3:\"img\";s:61:\"//updates.themepunch.tools/addons/images/addon_distortion.jpg\";s:5:\"color\";s:0:\"\";s:4:\"text\";s:2:\"LE\";}}s:31:\"revslider-explodinglayers-addon\";O:8:\"stdClass\":11:{s:4:\"slug\";s:31:\"revslider-explodinglayers-addon\";s:12:\"version_from\";s:5:\"5.4.6\";s:10:\"version_to\";s:5:\"9.9.9\";s:5:\"title\";s:16:\"Exploding Layers\";s:6:\"line_1\";s:23:\"Add explosive particles\";s:6:\"line_2\";s:24:\"to your layers animation\";s:9:\"available\";s:5:\"2.1.0\";s:10:\"background\";s:0:\"\";s:6:\"button\";s:6:\"How To\";s:6:\"global\";b:0;s:4:\"logo\";O:8:\"stdClass\":3:{s:3:\"img\";s:60:\"//updates.themepunch.tools/addons/images/addon_exploding.jpg\";s:5:\"color\";s:0:\"\";s:4:\"text\";s:2:\"EL\";}}s:26:\"revslider-paintbrush-addon\";O:8:\"stdClass\":11:{s:4:\"slug\";s:26:\"revslider-paintbrush-addon\";s:12:\"version_from\";s:5:\"5.4.6\";s:10:\"version_to\";s:5:\"9.9.9\";s:5:\"title\";s:10:\"Paintbrush\";s:6:\"line_1\";s:14:\"Paint or Erase\";s:6:\"line_2\";s:22:\"your background images\";s:9:\"available\";s:5:\"2.1.3\";s:10:\"background\";s:0:\"\";s:6:\"button\";s:6:\"How To\";s:6:\"global\";b:0;s:4:\"logo\";O:8:\"stdClass\":3:{s:3:\"img\";s:61:\"//updates.themepunch.tools/addons/images/addon_paintbrush.jpg\";s:5:\"color\";s:0:\"\";s:4:\"text\";s:2:\"PB\";}}s:29:\"revslider-domain-switch-addon\";O:8:\"stdClass\":11:{s:4:\"slug\";s:29:\"revslider-domain-switch-addon\";s:12:\"version_from\";s:5:\"6.0.0\";s:10:\"version_to\";s:5:\"9.9.9\";s:5:\"title\";s:13:\"Domain Switch\";s:6:\"line_1\";s:17:\"Switch Image URLs\";s:6:\"line_2\";s:37:\"in sliders from one domain to another\";s:9:\"available\";s:5:\"1.0.0\";s:10:\"background\";s:0:\"\";s:6:\"button\";s:11:\"How to use?\";s:6:\"global\";b:0;s:4:\"logo\";O:8:\"stdClass\":3:{s:3:\"img\";s:0:\"\";s:5:\"color\";s:0:\"\";s:4:\"text\";s:2:\"DS\";}}}', 'yes'),
(778, '_transient_timeout__woocommerce_helper_updates', '1581150915', 'no'),
(779, '_transient__woocommerce_helper_updates', 'a:4:{s:4:\"hash\";s:32:\"d751713988987e9331980363e24189ce\";s:7:\"updated\";i:1581107715;s:8:\"products\";a:0:{}s:6:\"errors\";a:1:{i:0;s:10:\"http-error\";}}', 'no'),
(813, '_site_transient_timeout_theme_roots', '1581115481', 'no'),
(814, '_site_transient_theme_roots', 'a:6:{s:8:\"aperitif\";s:7:\"/themes\";s:65:\"themeforest-DopnTs4f-aperitif-wine-shop-and-liquor-store/aperitif\";s:7:\"/themes\";s:14:\"twentynineteen\";s:7:\"/themes\";s:15:\"twentyseventeen\";s:7:\"/themes\";s:13:\"twentysixteen\";s:7:\"/themes\";s:12:\"twentytwenty\";s:7:\"/themes\";}', 'no'),
(815, '_transient_timeout__woocommerce_helper_subscriptions', '1581114581', 'no'),
(816, '_transient__woocommerce_helper_subscriptions', 'a:0:{}', 'no'),
(817, '_site_transient_update_themes', 'O:8:\"stdClass\":4:{s:12:\"last_checked\";i:1581113681;s:7:\"checked\";a:6:{s:8:\"aperitif\";s:5:\"1.0.1\";s:65:\"themeforest-DopnTs4f-aperitif-wine-shop-and-liquor-store/aperitif\";s:5:\"1.0.1\";s:14:\"twentynineteen\";s:3:\"1.4\";s:15:\"twentyseventeen\";s:3:\"2.2\";s:13:\"twentysixteen\";s:3:\"2.0\";s:12:\"twentytwenty\";s:3:\"1.0\";}s:8:\"response\";a:1:{s:12:\"twentytwenty\";a:6:{s:5:\"theme\";s:12:\"twentytwenty\";s:11:\"new_version\";s:3:\"1.1\";s:3:\"url\";s:42:\"https://wordpress.org/themes/twentytwenty/\";s:7:\"package\";s:58:\"https://downloads.wordpress.org/theme/twentytwenty.1.1.zip\";s:8:\"requires\";b:0;s:12:\"requires_php\";b:0;}}s:12:\"translations\";a:0:{}}', 'no'),
(818, '_site_transient_timeout_envato_market_themes', '1581117281', 'no');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(819, '_site_transient_envato_market_themes', 'a:4:{s:9:\"purchased\";a:0:{}s:6:\"active\";a:0:{}s:9:\"installed\";a:0:{}s:7:\"install\";a:0:{}}', 'no'),
(820, '_site_transient_timeout_envato_market_plugins', '1581117282', 'no'),
(821, '_site_transient_envato_market_plugins', 'a:4:{s:9:\"purchased\";a:0:{}s:6:\"active\";a:0:{}s:9:\"installed\";a:0:{}s:7:\"install\";a:0:{}}', 'no'),
(822, '_site_transient_update_plugins', 'O:8:\"stdClass\":5:{s:12:\"last_checked\";i:1581113682;s:7:\"checked\";a:16:{s:19:\"akismet/akismet.php\";s:5:\"4.1.3\";s:31:\"aperitif-core/aperitif-core.php\";s:3:\"1.0\";s:43:\"aperitif-membership/aperitif-membership.php\";s:3:\"1.0\";s:36:\"contact-form-7/wp-contact-form-7.php\";s:5:\"5.1.6\";s:44:\"custom-twitter-feeds/custom-twitter-feed.php\";s:5:\"1.4.1\";s:31:\"envato-market/envato-market.php\";s:5:\"2.0.3\";s:9:\"hello.php\";s:5:\"1.7.2\";s:33:\"qode-framework/qode-framework.php\";s:3:\"1.0\";s:23:\"revslider/revslider.php\";s:5:\"6.1.5\";s:33:\"instagram-feed/instagram-feed.php\";s:5:\"2.1.5\";s:43:\"the-events-calendar/the-events-calendar.php\";s:7:\"5.0.0.2\";s:27:\"woocommerce/woocommerce.php\";s:5:\"3.9.1\";s:39:\"woocommerce-admin/woocommerce-admin.php\";s:6:\"0.25.0\";s:27:\"js_composer/js_composer.php\";s:5:\"6.0.5\";s:36:\"yith-woocommerce-quick-view/init.php\";s:6:\"1.3.18\";s:34:\"yith-woocommerce-wishlist/init.php\";s:5:\"3.0.6\";}s:8:\"response\";a:1:{s:27:\"js_composer/js_composer.php\";O:8:\"stdClass\":6:{s:4:\"slug\";s:11:\"js_composer\";s:11:\"new_version\";s:3:\"6.1\";s:6:\"plugin\";s:27:\"js_composer/js_composer.php\";s:3:\"url\";s:0:\"\";s:7:\"package\";b:0;s:4:\"name\";s:21:\"WPBakery Page Builder\";}}s:12:\"translations\";a:0:{}s:9:\"no_update\";a:10:{s:19:\"akismet/akismet.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:21:\"w.org/plugins/akismet\";s:4:\"slug\";s:7:\"akismet\";s:6:\"plugin\";s:19:\"akismet/akismet.php\";s:11:\"new_version\";s:5:\"4.1.3\";s:3:\"url\";s:38:\"https://wordpress.org/plugins/akismet/\";s:7:\"package\";s:56:\"https://downloads.wordpress.org/plugin/akismet.4.1.3.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:59:\"https://ps.w.org/akismet/assets/icon-256x256.png?rev=969272\";s:2:\"1x\";s:59:\"https://ps.w.org/akismet/assets/icon-128x128.png?rev=969272\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:61:\"https://ps.w.org/akismet/assets/banner-772x250.jpg?rev=479904\";}s:11:\"banners_rtl\";a:0:{}}s:36:\"contact-form-7/wp-contact-form-7.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:28:\"w.org/plugins/contact-form-7\";s:4:\"slug\";s:14:\"contact-form-7\";s:6:\"plugin\";s:36:\"contact-form-7/wp-contact-form-7.php\";s:11:\"new_version\";s:5:\"5.1.6\";s:3:\"url\";s:45:\"https://wordpress.org/plugins/contact-form-7/\";s:7:\"package\";s:63:\"https://downloads.wordpress.org/plugin/contact-form-7.5.1.6.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:66:\"https://ps.w.org/contact-form-7/assets/icon-256x256.png?rev=984007\";s:2:\"1x\";s:66:\"https://ps.w.org/contact-form-7/assets/icon-128x128.png?rev=984007\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:69:\"https://ps.w.org/contact-form-7/assets/banner-1544x500.png?rev=860901\";s:2:\"1x\";s:68:\"https://ps.w.org/contact-form-7/assets/banner-772x250.png?rev=880427\";}s:11:\"banners_rtl\";a:0:{}}s:44:\"custom-twitter-feeds/custom-twitter-feed.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:34:\"w.org/plugins/custom-twitter-feeds\";s:4:\"slug\";s:20:\"custom-twitter-feeds\";s:6:\"plugin\";s:44:\"custom-twitter-feeds/custom-twitter-feed.php\";s:11:\"new_version\";s:5:\"1.4.1\";s:3:\"url\";s:51:\"https://wordpress.org/plugins/custom-twitter-feeds/\";s:7:\"package\";s:69:\"https://downloads.wordpress.org/plugin/custom-twitter-feeds.1.4.1.zip\";s:5:\"icons\";a:1:{s:2:\"1x\";s:73:\"https://ps.w.org/custom-twitter-feeds/assets/icon-128x128.png?rev=1414207\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:75:\"https://ps.w.org/custom-twitter-feeds/assets/banner-772x250.png?rev=1624166\";}s:11:\"banners_rtl\";a:0:{}}s:9:\"hello.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:25:\"w.org/plugins/hello-dolly\";s:4:\"slug\";s:11:\"hello-dolly\";s:6:\"plugin\";s:9:\"hello.php\";s:11:\"new_version\";s:5:\"1.7.2\";s:3:\"url\";s:42:\"https://wordpress.org/plugins/hello-dolly/\";s:7:\"package\";s:60:\"https://downloads.wordpress.org/plugin/hello-dolly.1.7.2.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:64:\"https://ps.w.org/hello-dolly/assets/icon-256x256.jpg?rev=2052855\";s:2:\"1x\";s:64:\"https://ps.w.org/hello-dolly/assets/icon-128x128.jpg?rev=2052855\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:66:\"https://ps.w.org/hello-dolly/assets/banner-772x250.jpg?rev=2052855\";}s:11:\"banners_rtl\";a:0:{}}s:33:\"instagram-feed/instagram-feed.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:28:\"w.org/plugins/instagram-feed\";s:4:\"slug\";s:14:\"instagram-feed\";s:6:\"plugin\";s:33:\"instagram-feed/instagram-feed.php\";s:11:\"new_version\";s:5:\"2.1.5\";s:3:\"url\";s:45:\"https://wordpress.org/plugins/instagram-feed/\";s:7:\"package\";s:63:\"https://downloads.wordpress.org/plugin/instagram-feed.2.1.5.zip\";s:5:\"icons\";a:1:{s:2:\"1x\";s:67:\"https://ps.w.org/instagram-feed/assets/icon-128x128.png?rev=2137676\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:69:\"https://ps.w.org/instagram-feed/assets/banner-772x250.png?rev=2137676\";}s:11:\"banners_rtl\";a:0:{}}s:43:\"the-events-calendar/the-events-calendar.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:33:\"w.org/plugins/the-events-calendar\";s:4:\"slug\";s:19:\"the-events-calendar\";s:6:\"plugin\";s:43:\"the-events-calendar/the-events-calendar.php\";s:11:\"new_version\";s:7:\"5.0.0.2\";s:3:\"url\";s:50:\"https://wordpress.org/plugins/the-events-calendar/\";s:7:\"package\";s:70:\"https://downloads.wordpress.org/plugin/the-events-calendar.5.0.0.2.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:72:\"https://ps.w.org/the-events-calendar/assets/icon-256x256.png?rev=2071468\";s:2:\"1x\";s:72:\"https://ps.w.org/the-events-calendar/assets/icon-128x128.png?rev=2071468\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:75:\"https://ps.w.org/the-events-calendar/assets/banner-1544x500.png?rev=2048291\";s:2:\"1x\";s:74:\"https://ps.w.org/the-events-calendar/assets/banner-772x250.png?rev=2048291\";}s:11:\"banners_rtl\";a:0:{}}s:27:\"woocommerce/woocommerce.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:25:\"w.org/plugins/woocommerce\";s:4:\"slug\";s:11:\"woocommerce\";s:6:\"plugin\";s:27:\"woocommerce/woocommerce.php\";s:11:\"new_version\";s:5:\"3.9.1\";s:3:\"url\";s:42:\"https://wordpress.org/plugins/woocommerce/\";s:7:\"package\";s:60:\"https://downloads.wordpress.org/plugin/woocommerce.3.9.1.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:64:\"https://ps.w.org/woocommerce/assets/icon-256x256.png?rev=2075035\";s:2:\"1x\";s:64:\"https://ps.w.org/woocommerce/assets/icon-128x128.png?rev=2075035\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:67:\"https://ps.w.org/woocommerce/assets/banner-1544x500.png?rev=2075035\";s:2:\"1x\";s:66:\"https://ps.w.org/woocommerce/assets/banner-772x250.png?rev=2075035\";}s:11:\"banners_rtl\";a:0:{}}s:39:\"woocommerce-admin/woocommerce-admin.php\";O:8:\"stdClass\":12:{s:2:\"id\";s:31:\"w.org/plugins/woocommerce-admin\";s:4:\"slug\";s:17:\"woocommerce-admin\";s:6:\"plugin\";s:39:\"woocommerce-admin/woocommerce-admin.php\";s:11:\"new_version\";s:6:\"0.25.1\";s:3:\"url\";s:48:\"https://wordpress.org/plugins/woocommerce-admin/\";s:7:\"package\";s:60:\"https://downloads.wordpress.org/plugin/woocommerce-admin.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:70:\"https://ps.w.org/woocommerce-admin/assets/icon-256x256.jpg?rev=2057866\";s:2:\"1x\";s:70:\"https://ps.w.org/woocommerce-admin/assets/icon-128x128.jpg?rev=2057866\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:73:\"https://ps.w.org/woocommerce-admin/assets/banner-1544x500.jpg?rev=2057866\";s:2:\"1x\";s:72:\"https://ps.w.org/woocommerce-admin/assets/banner-772x250.jpg?rev=2057866\";}s:11:\"banners_rtl\";a:0:{}s:6:\"tested\";s:5:\"5.3.2\";s:12:\"requires_php\";s:6:\"5.6.20\";s:13:\"compatibility\";a:0:{}}s:36:\"yith-woocommerce-quick-view/init.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:41:\"w.org/plugins/yith-woocommerce-quick-view\";s:4:\"slug\";s:27:\"yith-woocommerce-quick-view\";s:6:\"plugin\";s:36:\"yith-woocommerce-quick-view/init.php\";s:11:\"new_version\";s:6:\"1.3.18\";s:3:\"url\";s:58:\"https://wordpress.org/plugins/yith-woocommerce-quick-view/\";s:7:\"package\";s:77:\"https://downloads.wordpress.org/plugin/yith-woocommerce-quick-view.1.3.18.zip\";s:5:\"icons\";a:1:{s:2:\"1x\";s:80:\"https://ps.w.org/yith-woocommerce-quick-view/assets/icon-128x128.jpg?rev=1460911\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:83:\"https://ps.w.org/yith-woocommerce-quick-view/assets/banner-1544x500.jpg?rev=1460911\";s:2:\"1x\";s:82:\"https://ps.w.org/yith-woocommerce-quick-view/assets/banner-772x250.jpg?rev=1460911\";}s:11:\"banners_rtl\";a:0:{}}s:34:\"yith-woocommerce-wishlist/init.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:39:\"w.org/plugins/yith-woocommerce-wishlist\";s:4:\"slug\";s:25:\"yith-woocommerce-wishlist\";s:6:\"plugin\";s:34:\"yith-woocommerce-wishlist/init.php\";s:11:\"new_version\";s:5:\"3.0.6\";s:3:\"url\";s:56:\"https://wordpress.org/plugins/yith-woocommerce-wishlist/\";s:7:\"package\";s:74:\"https://downloads.wordpress.org/plugin/yith-woocommerce-wishlist.3.0.6.zip\";s:5:\"icons\";a:1:{s:2:\"1x\";s:78:\"https://ps.w.org/yith-woocommerce-wishlist/assets/icon-128x128.jpg?rev=2215573\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:81:\"https://ps.w.org/yith-woocommerce-wishlist/assets/banner-1544x500.jpg?rev=2209192\";s:2:\"1x\";s:80:\"https://ps.w.org/yith-woocommerce-wishlist/assets/banner-772x250.jpg?rev=2209192\";}s:11:\"banners_rtl\";a:0:{}}}}', 'no'),
(829, '_transient_timeout_plugin_slugs', '1581200735', 'no'),
(830, '_transient_plugin_slugs', 'a:16:{i:0;s:19:\"akismet/akismet.php\";i:1;s:31:\"aperitif-core/aperitif-core.php\";i:2;s:43:\"aperitif-membership/aperitif-membership.php\";i:3;s:36:\"contact-form-7/wp-contact-form-7.php\";i:4;s:44:\"custom-twitter-feeds/custom-twitter-feed.php\";i:5;s:31:\"envato-market/envato-market.php\";i:6;s:9:\"hello.php\";i:7;s:33:\"qode-framework/qode-framework.php\";i:8;s:23:\"revslider/revslider.php\";i:9;s:33:\"instagram-feed/instagram-feed.php\";i:10;s:43:\"the-events-calendar/the-events-calendar.php\";i:11;s:27:\"woocommerce/woocommerce.php\";i:12;s:39:\"woocommerce-admin/woocommerce-admin.php\";i:13;s:27:\"js_composer/js_composer.php\";i:14;s:36:\"yith-woocommerce-quick-view/init.php\";i:15;s:34:\"yith-woocommerce-wishlist/init.php\";}', 'no'),
(831, '_transient_timeout_tribe_aggregator_services_list', '1581200735', 'no'),
(832, '_transient_tribe_aggregator_services_list', 'a:1:{s:6:\"origin\";a:1:{i:0;O:8:\"stdClass\":2:{s:2:\"id\";s:3:\"csv\";s:4:\"name\";s:8:\"CSV File\";}}}', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `wp_postmeta`
--

CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(2, 3, '_wp_page_template', 'default'),
(3, 5, '_wp_attached_file', '2020/02/2020-landscape-1.png'),
(4, 5, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:1200;s:6:\"height\";i:769;s:4:\"file\";s:28:\"2020/02/2020-landscape-1.png\";s:5:\"sizes\";a:4:{s:6:\"medium\";a:4:{s:4:\"file\";s:28:\"2020-landscape-1-300x192.png\";s:5:\"width\";i:300;s:6:\"height\";i:192;s:9:\"mime-type\";s:9:\"image/png\";}s:5:\"large\";a:4:{s:4:\"file\";s:29:\"2020-landscape-1-1024x656.png\";s:5:\"width\";i:1024;s:6:\"height\";i:656;s:9:\"mime-type\";s:9:\"image/png\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:28:\"2020-landscape-1-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:28:\"2020-landscape-1-768x492.png\";s:5:\"width\";i:768;s:6:\"height\";i:492;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(5, 5, '_starter_content_theme', 'twentytwenty'),
(6, 5, '_customize_draft_post_name', 'the-new-umoma-opens-its-doors'),
(7, 6, '_thumbnail_id', '5'),
(8, 6, '_customize_draft_post_name', 'the-new-umoma-opens-its-doors'),
(9, 6, '_customize_changeset_uuid', '993fde0d-2b4a-4980-8fd9-a1116e8bf125'),
(10, 7, '_customize_draft_post_name', 'about'),
(11, 7, '_customize_changeset_uuid', '993fde0d-2b4a-4980-8fd9-a1116e8bf125'),
(12, 8, '_customize_draft_post_name', 'contact'),
(13, 8, '_customize_changeset_uuid', '993fde0d-2b4a-4980-8fd9-a1116e8bf125'),
(14, 9, '_customize_draft_post_name', 'blog'),
(15, 9, '_customize_changeset_uuid', '993fde0d-2b4a-4980-8fd9-a1116e8bf125'),
(16, 11, '_wp_attached_file', '2020/02/2020-landscape-1-1.png'),
(17, 11, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:1200;s:6:\"height\";i:769;s:4:\"file\";s:30:\"2020/02/2020-landscape-1-1.png\";s:5:\"sizes\";a:4:{s:6:\"medium\";a:4:{s:4:\"file\";s:30:\"2020-landscape-1-1-300x192.png\";s:5:\"width\";i:300;s:6:\"height\";i:192;s:9:\"mime-type\";s:9:\"image/png\";}s:5:\"large\";a:4:{s:4:\"file\";s:31:\"2020-landscape-1-1-1024x656.png\";s:5:\"width\";i:1024;s:6:\"height\";i:656;s:9:\"mime-type\";s:9:\"image/png\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:30:\"2020-landscape-1-1-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:30:\"2020-landscape-1-1-768x492.png\";s:5:\"width\";i:768;s:6:\"height\";i:492;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(18, 11, '_starter_content_theme', 'twentytwenty'),
(19, 11, '_customize_draft_post_name', 'the-new-umoma-opens-its-doors'),
(20, 12, '_thumbnail_id', '11'),
(21, 12, '_customize_draft_post_name', 'the-new-umoma-opens-its-doors'),
(22, 12, '_customize_changeset_uuid', '736fdcec-997e-488d-aac0-61e8ee836787'),
(23, 13, '_customize_draft_post_name', 'about'),
(24, 13, '_customize_changeset_uuid', '736fdcec-997e-488d-aac0-61e8ee836787'),
(25, 14, '_customize_draft_post_name', 'contact'),
(26, 14, '_customize_changeset_uuid', '736fdcec-997e-488d-aac0-61e8ee836787'),
(27, 15, '_customize_draft_post_name', 'blog'),
(28, 15, '_customize_changeset_uuid', '736fdcec-997e-488d-aac0-61e8ee836787'),
(29, 16, '_wp_attached_file', '2020/02/2020-landscape-1-2.png'),
(30, 16, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:1200;s:6:\"height\";i:769;s:4:\"file\";s:30:\"2020/02/2020-landscape-1-2.png\";s:5:\"sizes\";a:4:{s:6:\"medium\";a:4:{s:4:\"file\";s:30:\"2020-landscape-1-2-300x192.png\";s:5:\"width\";i:300;s:6:\"height\";i:192;s:9:\"mime-type\";s:9:\"image/png\";}s:5:\"large\";a:4:{s:4:\"file\";s:31:\"2020-landscape-1-2-1024x656.png\";s:5:\"width\";i:1024;s:6:\"height\";i:656;s:9:\"mime-type\";s:9:\"image/png\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:30:\"2020-landscape-1-2-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:30:\"2020-landscape-1-2-768x492.png\";s:5:\"width\";i:768;s:6:\"height\";i:492;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(31, 16, '_starter_content_theme', 'twentytwenty'),
(32, 16, '_customize_draft_post_name', 'the-new-umoma-opens-its-doors'),
(33, 18, '_thumbnail_id', '16'),
(34, 18, '_customize_draft_post_name', 'the-new-umoma-opens-its-doors'),
(35, 18, '_customize_changeset_uuid', 'effe2694-ba82-4870-a572-f414c064701c'),
(36, 19, '_customize_draft_post_name', 'about'),
(37, 19, '_customize_changeset_uuid', 'effe2694-ba82-4870-a572-f414c064701c'),
(38, 20, '_customize_draft_post_name', 'contact'),
(39, 20, '_customize_changeset_uuid', 'effe2694-ba82-4870-a572-f414c064701c'),
(40, 21, '_customize_draft_post_name', 'blog'),
(41, 21, '_customize_changeset_uuid', 'effe2694-ba82-4870-a572-f414c064701c'),
(42, 23, '_wp_attached_file', '2020/02/2020-landscape-1-3.png'),
(43, 23, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:1200;s:6:\"height\";i:769;s:4:\"file\";s:30:\"2020/02/2020-landscape-1-3.png\";s:5:\"sizes\";a:4:{s:6:\"medium\";a:4:{s:4:\"file\";s:30:\"2020-landscape-1-3-300x192.png\";s:5:\"width\";i:300;s:6:\"height\";i:192;s:9:\"mime-type\";s:9:\"image/png\";}s:5:\"large\";a:4:{s:4:\"file\";s:31:\"2020-landscape-1-3-1024x656.png\";s:5:\"width\";i:1024;s:6:\"height\";i:656;s:9:\"mime-type\";s:9:\"image/png\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:30:\"2020-landscape-1-3-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:30:\"2020-landscape-1-3-768x492.png\";s:5:\"width\";i:768;s:6:\"height\";i:492;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(44, 23, '_starter_content_theme', 'twentytwenty'),
(45, 23, '_customize_draft_post_name', 'the-new-umoma-opens-its-doors'),
(46, 24, '_thumbnail_id', '23'),
(47, 24, '_customize_draft_post_name', 'the-new-umoma-opens-its-doors'),
(48, 24, '_customize_changeset_uuid', '01a5836a-cb5c-4282-93da-67f80803a05e'),
(49, 25, '_customize_draft_post_name', 'about'),
(50, 25, '_customize_changeset_uuid', '01a5836a-cb5c-4282-93da-67f80803a05e'),
(51, 26, '_customize_draft_post_name', 'contact'),
(52, 26, '_customize_changeset_uuid', '01a5836a-cb5c-4282-93da-67f80803a05e'),
(53, 27, '_customize_draft_post_name', 'blog'),
(54, 27, '_customize_changeset_uuid', '01a5836a-cb5c-4282-93da-67f80803a05e'),
(55, 22, '_customize_restore_dismissed', '1'),
(56, 17, '_customize_restore_dismissed', '1'),
(57, 10, '_customize_restore_dismissed', '1'),
(60, 30, '_wp_trash_meta_status', 'publish'),
(61, 30, '_wp_trash_meta_time', '1580898428'),
(62, 28, '_customize_restore_dismissed', '1'),
(63, 31, '_form', '<label> Your Name (required)\n    [text* your-name] </label>\n\n<label> Your Email (required)\n    [email* your-email] </label>\n\n<label> Subject\n    [text your-subject] </label>\n\n<label> Your Message\n    [textarea your-message] </label>\n\n[submit \"Send\"]'),
(64, 31, '_mail', 'a:8:{s:7:\"subject\";s:37:\"Rhode Island Liquors \"[your-subject]\"\";s:6:\"sender\";s:58:\"Rhode Island Liquors <wordpress@rhodeislandliquors.dev.cc>\";s:4:\"body\";s:195:\"From: [your-name] <[your-email]>\nSubject: [your-subject]\n\nMessage Body:\n[your-message]\n\n-- \nThis e-mail was sent from a contact form on Rhode Island Liquors (http://www.rhodeislandliquors.dev.cc)\";s:9:\"recipient\";s:19:\"binephrem@gmail.com\";s:18:\"additional_headers\";s:22:\"Reply-To: [your-email]\";s:11:\"attachments\";s:0:\"\";s:8:\"use_html\";i:0;s:13:\"exclude_blank\";i:0;}'),
(65, 31, '_mail_2', 'a:9:{s:6:\"active\";b:0;s:7:\"subject\";s:37:\"Rhode Island Liquors \"[your-subject]\"\";s:6:\"sender\";s:58:\"Rhode Island Liquors <wordpress@rhodeislandliquors.dev.cc>\";s:4:\"body\";s:137:\"Message Body:\n[your-message]\n\n-- \nThis e-mail was sent from a contact form on Rhode Island Liquors (http://www.rhodeislandliquors.dev.cc)\";s:9:\"recipient\";s:12:\"[your-email]\";s:18:\"additional_headers\";s:29:\"Reply-To: binephrem@gmail.com\";s:11:\"attachments\";s:0:\"\";s:8:\"use_html\";i:0;s:13:\"exclude_blank\";i:0;}'),
(66, 31, '_messages', 'a:8:{s:12:\"mail_sent_ok\";s:45:\"Thank you for your message. It has been sent.\";s:12:\"mail_sent_ng\";s:71:\"There was an error trying to send your message. Please try again later.\";s:16:\"validation_error\";s:61:\"One or more fields have an error. Please check and try again.\";s:4:\"spam\";s:71:\"There was an error trying to send your message. Please try again later.\";s:12:\"accept_terms\";s:69:\"You must accept the terms and conditions before sending your message.\";s:16:\"invalid_required\";s:22:\"The field is required.\";s:16:\"invalid_too_long\";s:22:\"The field is too long.\";s:17:\"invalid_too_short\";s:23:\"The field is too short.\";}'),
(67, 31, '_additional_settings', NULL),
(68, 31, '_locale', 'en_US'),
(69, 32, '_wp_attached_file', 'woocommerce-placeholder.png'),
(70, 32, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:1200;s:6:\"height\";i:1200;s:4:\"file\";s:27:\"woocommerce-placeholder.png\";s:5:\"sizes\";a:4:{s:6:\"medium\";a:4:{s:4:\"file\";s:35:\"woocommerce-placeholder-300x300.png\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:9:\"image/png\";}s:5:\"large\";a:4:{s:4:\"file\";s:37:\"woocommerce-placeholder-1024x1024.png\";s:5:\"width\";i:1024;s:6:\"height\";i:1024;s:9:\"mime-type\";s:9:\"image/png\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:35:\"woocommerce-placeholder-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:35:\"woocommerce-placeholder-768x768.png\";s:5:\"width\";i:768;s:6:\"height\";i:768;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');

-- --------------------------------------------------------

--
-- Table structure for table `wp_posts`
--

CREATE TABLE `wp_posts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2020-02-05 09:54:48', '2020-02-05 09:54:48', '<!-- wp:paragraph -->\n<p>Welcome to WordPress. This is your first post. Edit or delete it, then start writing!</p>\n<!-- /wp:paragraph -->', 'Hello world!', '', 'publish', 'open', 'open', '', 'hello-world', '', '', '2020-02-05 09:54:48', '2020-02-05 09:54:48', '', 0, 'http://www.rhodeislandliquors.dev.cc/?p=1', 0, 'post', '', 1),
(2, 1, '2020-02-05 09:54:48', '2020-02-05 09:54:48', '<!-- wp:paragraph -->\n<p>This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>Hi there! I\'m a bike messenger by day, aspiring actor by night, and this is my website. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin\' caught in the rain.)</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>...or something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>As a new WordPress user, you should go to <a href=\"http://www.rhodeislandliquors.dev.cc/wp-admin/\">your dashboard</a> to delete this page and create new pages for your content. Have fun!</p>\n<!-- /wp:paragraph -->', 'Sample Page', '', 'publish', 'closed', 'open', '', 'sample-page', '', '', '2020-02-05 09:54:48', '2020-02-05 09:54:48', '', 0, 'http://www.rhodeislandliquors.dev.cc/?page_id=2', 0, 'page', '', 0),
(3, 1, '2020-02-05 09:54:48', '2020-02-05 09:54:48', '<!-- wp:heading --><h2>Who we are</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Our website address is: http://www.rhodeislandliquors.dev.cc.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>What personal data we collect and why we collect it</h2><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Comments</h3><!-- /wp:heading --><!-- wp:paragraph --><p>When visitors leave comments on the site we collect the data shown in the comments form, and also the visitor&#8217;s IP address and browser user agent string to help spam detection.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>An anonymized string created from your email address (also called a hash) may be provided to the Gravatar service to see if you are using it. The Gravatar service privacy policy is available here: https://automattic.com/privacy/. After approval of your comment, your profile picture is visible to the public in the context of your comment.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Media</h3><!-- /wp:heading --><!-- wp:paragraph --><p>If you upload images to the website, you should avoid uploading images with embedded location data (EXIF GPS) included. Visitors to the website can download and extract any location data from images on the website.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Contact forms</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Cookies</h3><!-- /wp:heading --><!-- wp:paragraph --><p>If you leave a comment on our site you may opt-in to saving your name, email address and website in cookies. These are for your convenience so that you do not have to fill in your details again when you leave another comment. These cookies will last for one year.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>If you visit our login page, we will set a temporary cookie to determine if your browser accepts cookies. This cookie contains no personal data and is discarded when you close your browser.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>When you log in, we will also set up several cookies to save your login information and your screen display choices. Login cookies last for two days, and screen options cookies last for a year. If you select &quot;Remember Me&quot;, your login will persist for two weeks. If you log out of your account, the login cookies will be removed.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>If you edit or publish an article, an additional cookie will be saved in your browser. This cookie includes no personal data and simply indicates the post ID of the article you just edited. It expires after 1 day.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Embedded content from other websites</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Articles on this site may include embedded content (e.g. videos, images, articles, etc.). Embedded content from other websites behaves in the exact same way as if the visitor has visited the other website.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracking your interaction with the embedded content if you have an account and are logged in to that website.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Analytics</h3><!-- /wp:heading --><!-- wp:heading --><h2>Who we share your data with</h2><!-- /wp:heading --><!-- wp:heading --><h2>How long we retain your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p>If you leave a comment, the comment and its metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding them in a moderation queue.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>For users that register on our website (if any), we also store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change their username). Website administrators can also see and edit that information.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>What rights you have over your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p>If you have an account on this site, or have left comments, you can request to receive an exported file of the personal data we hold about you, including any data you have provided to us. You can also request that we erase any personal data we hold about you. This does not include any data we are obliged to keep for administrative, legal, or security purposes.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Where we send your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Visitor comments may be checked through an automated spam detection service.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Your contact information</h2><!-- /wp:heading --><!-- wp:heading --><h2>Additional information</h2><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>How we protect your data</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>What data breach procedures we have in place</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>What third parties we receive data from</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>What automated decision making and/or profiling we do with user data</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Industry regulatory disclosure requirements</h3><!-- /wp:heading -->', 'Privacy Policy', '', 'draft', 'closed', 'open', '', 'privacy-policy', '', '', '2020-02-05 09:54:48', '2020-02-05 09:54:48', '', 0, 'http://www.rhodeislandliquors.dev.cc/?page_id=3', 0, 'page', '', 0),
(4, 1, '2020-02-05 09:55:20', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'open', 'open', '', '', '', '', '2020-02-05 09:55:20', '0000-00-00 00:00:00', '', 0, 'http://www.rhodeislandliquors.dev.cc/?p=4', 0, 'post', '', 0),
(5, 1, '2020-02-05 09:59:40', '0000-00-00 00:00:00', '', 'The New UMoMA Opens its Doors', '', 'auto-draft', 'open', 'closed', '', '', '', '', '2020-02-05 09:59:39', '0000-00-00 00:00:00', '', 0, 'http://www.rhodeislandliquors.dev.cc/wp-content/uploads/2020/02/2020-landscape-1.png', 0, 'attachment', 'image/png', 0),
(6, 1, '2020-02-05 09:59:40', '0000-00-00 00:00:00', '<!-- wp:group {\"align\":\"wide\"} --><div class=\"wp-block-group alignwide\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\"} --><h2 class=\"has-text-align-center\">The premier destination for modern art in Northern Sweden. Open from 10 AM to 6 PM every day during the summer months.</h2><!-- /wp:heading --></div></div><!-- /wp:group --><!-- wp:columns {\"align\":\"wide\"} --><div class=\"wp-block-columns alignwide\"><!-- wp:column --><div class=\"wp-block-column\"><!-- wp:group --><div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"align\":\"full\",\"id\":37,\"sizeSlug\":\"full\"} --><figure class=\"wp-block-image alignfull size-full\"><img src=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-three-quarters-1.png\" alt=\"\" class=\"wp-image-37\"/></figure><!-- /wp:image --><!-- wp:heading {\"level\":3} --><h3>Works and Days</h3><!-- /wp:heading --><!-- wp:paragraph --><p>August 1 -- December 1</p><!-- /wp:paragraph --><!-- wp:button {\"className\":\"is-style-outline\"} --><div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link\" href=\"https://make.wordpress.org/core/2019/09/27/block-editor-theme-related-updates-in-wordpress-5-3/\">Read More</a></div><!-- /wp:button --></div></div><!-- /wp:group --><!-- wp:group --><div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"align\":\"full\",\"id\":37,\"sizeSlug\":\"full\"} --><figure class=\"wp-block-image alignfull size-full\"><img src=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-three-quarters-3.png\" alt=\"\" class=\"wp-image-37\"/></figure><!-- /wp:image --><!-- wp:heading {\"level\":3} --><h3>Theatre of Operations</h3><!-- /wp:heading --><!-- wp:paragraph --><p>October 1 -- December 1</p><!-- /wp:paragraph --><!-- wp:button {\"className\":\"is-style-outline\"} --><div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link\" href=\"https://make.wordpress.org/core/2019/09/27/block-editor-theme-related-updates-in-wordpress-5-3/\">Read More</a></div><!-- /wp:button --></div></div><!-- /wp:group --></div><!-- /wp:column --><!-- wp:column --><div class=\"wp-block-column\"><!-- wp:group --><div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"align\":\"full\",\"id\":37,\"sizeSlug\":\"full\"} --><figure class=\"wp-block-image alignfull size-full\"><img src=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-three-quarters-2.png\" alt=\"\" class=\"wp-image-37\"/></figure><!-- /wp:image --><!-- wp:heading {\"level\":3} --><h3>The Life I Deserve</h3><!-- /wp:heading --><!-- wp:paragraph --><p>August 1 -- December 1</p><!-- /wp:paragraph --><!-- wp:button {\"className\":\"is-style-outline\"} --><div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link\" href=\"https://make.wordpress.org/core/2019/09/27/block-editor-theme-related-updates-in-wordpress-5-3/\">Read More</a></div><!-- /wp:button --></div></div><!-- /wp:group --><!-- wp:group --><div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"align\":\"full\",\"id\":37,\"sizeSlug\":\"full\"} --><figure class=\"wp-block-image alignfull size-full\"><img src=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-three-quarters-4.png\" alt=\"\" class=\"wp-image-37\"/></figure><!-- /wp:image --><!-- wp:heading {\"level\":3} --><h3>From Signac to Matisse</h3><!-- /wp:heading --><!-- wp:paragraph --><p>October 1 -- December 1</p><!-- /wp:paragraph --><!-- wp:button {\"className\":\"is-style-outline\"} --><div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link\" href=\"https://make.wordpress.org/core/2019/09/27/block-editor-theme-related-updates-in-wordpress-5-3/\">Read More</a></div><!-- /wp:button --></div></div><!-- /wp:group --></div><!-- /wp:column --></div><!-- /wp:columns --><!-- wp:image {\"align\":\"full\",\"id\":37,\"sizeSlug\":\"full\"} --><figure class=\"wp-block-image alignfull size-full\"><img src=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-landscape-2.png\" alt=\"\" class=\"wp-image-37\"/></figure><!-- /wp:image --><!-- wp:group {\"align\":\"wide\"} --><div class=\"wp-block-group alignwide\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\",\"textColor\":\"accent\"} --><h2 class=\"has-accent-color has-text-align-center\">”Cyborgs, as the philosopher Donna Haraway established, are not reverent. They do not remember the cosmos.”</h2><!-- /wp:heading --></div></div><!-- /wp:group --><!-- wp:paragraph {\"dropCap\":true} --><p class=\"has-drop-cap\">With seven floors of striking architecture, UMoMA shows exhibitions of international contemporary art, sometimes along with art historical retrospectives. Existential, political and philosophical issues are intrinsic to our programme. As visitor you are invited to guided tours artist talks, lectures, film screenings and other events with free admission</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>The exhibitions are produced by UMoMA in collaboration with artists and museums around the world and they often attract international attention. UMoMA has received a Special Commendation from the European Museum of the Year, and was among the top candidates for the Swedish Museum of the Year Award as well as for the Council of Europe Museum Prize.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p></p><!-- /wp:paragraph --><!-- wp:group {\"customBackgroundColor\":\"#ffffff\",\"align\":\"wide\"} --><div class=\"wp-block-group alignwide has-background\" style=\"background-color:#ffffff\"><div class=\"wp-block-group__inner-container\"><!-- wp:group --><div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\"} --><h2 class=\"has-text-align-center\">Become a Member and Get Exclusive Offers!</h2><!-- /wp:heading --><!-- wp:paragraph {\"align\":\"center\"} --><p class=\"has-text-align-center\">Members get access to exclusive exhibits and sales. Our memberships cost $99.99 and are billed annually.</p><!-- /wp:paragraph --><!-- wp:button {\"align\":\"center\"} --><div class=\"wp-block-button aligncenter\"><a class=\"wp-block-button__link\" href=\"https://make.wordpress.org/core/2019/09/27/block-editor-theme-related-updates-in-wordpress-5-3/\">Join the Club</a></div><!-- /wp:button --></div></div><!-- /wp:group --></div></div><!-- /wp:group --><!-- wp:gallery {\"ids\":[39,38],\"align\":\"wide\"} --><figure class=\"wp-block-gallery alignwide columns-2 is-cropped\"><ul class=\"blocks-gallery-grid\"><li class=\"blocks-gallery-item\"><figure><img src=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-square-2.png\" alt=\"\" data-id=\"39\" data-full-url=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-square-2.png\" data-link=\"assets/images/2020-square-2/\" class=\"wp-image-39\"/></figure></li><li class=\"blocks-gallery-item\"><figure><img src=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-square-1.png\" alt=\"\" data-id=\"38\" data-full-url=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-square-1.png\" data-link=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-square-1/\" class=\"wp-image-38\"/></figure></li></ul></figure><!-- /wp:gallery -->', 'The New UMoMA Opens its Doors', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2020-02-05 09:59:40', '0000-00-00 00:00:00', '', 0, 'http://www.rhodeislandliquors.dev.cc/?page_id=6', 0, 'page', '', 0),
(7, 1, '2020-02-05 09:59:40', '0000-00-00 00:00:00', '<!-- wp:paragraph -->\n<p>You might be an artist who would like to introduce yourself and your work here or maybe you&rsquo;re a business with a mission to describe.</p>\n<!-- /wp:paragraph -->', 'About', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2020-02-05 09:59:40', '0000-00-00 00:00:00', '', 0, 'http://www.rhodeislandliquors.dev.cc/?page_id=7', 0, 'page', '', 0),
(8, 1, '2020-02-05 09:59:40', '0000-00-00 00:00:00', '<!-- wp:paragraph -->\n<p>This is a page with some basic contact information, such as an address and phone number. You might also try a plugin to add a contact form.</p>\n<!-- /wp:paragraph -->', 'Contact', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2020-02-05 09:59:40', '0000-00-00 00:00:00', '', 0, 'http://www.rhodeislandliquors.dev.cc/?page_id=8', 0, 'page', '', 0),
(9, 1, '2020-02-05 09:59:40', '0000-00-00 00:00:00', '', 'Blog', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2020-02-05 09:59:40', '0000-00-00 00:00:00', '', 0, 'http://www.rhodeislandliquors.dev.cc/?page_id=9', 0, 'page', '', 0),
(10, 1, '2020-02-05 09:59:40', '0000-00-00 00:00:00', '{\n    \"widget_text[2]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"encoded_serialized_instance\": \"YTo0OntzOjU6InRpdGxlIjtzOjE1OiJBYm91dCBUaGlzIFNpdGUiO3M6NDoidGV4dCI7czo4NToiVGhpcyBtYXkgYmUgYSBnb29kIHBsYWNlIHRvIGludHJvZHVjZSB5b3Vyc2VsZiBhbmQgeW91ciBzaXRlIG9yIGluY2x1ZGUgc29tZSBjcmVkaXRzLiI7czo2OiJmaWx0ZXIiO2I6MTtzOjY6InZpc3VhbCI7YjoxO30=\",\n            \"title\": \"About This Site\",\n            \"is_widget_customizer_js_value\": true,\n            \"instance_hash_key\": \"ceafc8b19a217b51f49bee3f6856347f\"\n        },\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:40\"\n    },\n    \"sidebars_widgets[sidebar-1]\": {\n        \"starter_content\": true,\n        \"value\": [\n            \"text-2\"\n        ],\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:40\"\n    },\n    \"widget_text[3]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"encoded_serialized_instance\": \"YTo0OntzOjU6InRpdGxlIjtzOjc6IkZpbmQgVXMiO3M6NDoidGV4dCI7czoxNjg6IjxzdHJvbmc+QWRkcmVzczwvc3Ryb25nPgoxMjMgTWFpbiBTdHJlZXQKTmV3IFlvcmssIE5ZIDEwMDAxCgo8c3Ryb25nPkhvdXJzPC9zdHJvbmc+Ck1vbmRheSZtZGFzaDtGcmlkYXk6IDk6MDBBTSZuZGFzaDs1OjAwUE0KU2F0dXJkYXkgJmFtcDsgU3VuZGF5OiAxMTowMEFNJm5kYXNoOzM6MDBQTSI7czo2OiJmaWx0ZXIiO2I6MTtzOjY6InZpc3VhbCI7YjoxO30=\",\n            \"title\": \"Find Us\",\n            \"is_widget_customizer_js_value\": true,\n            \"instance_hash_key\": \"f9ef2d44646a201ee17763bcea85e6ef\"\n        },\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:40\"\n    },\n    \"sidebars_widgets[sidebar-2]\": {\n        \"starter_content\": true,\n        \"value\": [\n            \"text-3\"\n        ],\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:40\"\n    },\n    \"nav_menus_created_posts\": {\n        \"starter_content\": true,\n        \"value\": [\n            5,\n            6,\n            7,\n            8,\n            9\n        ],\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:40\"\n    },\n    \"nav_menu[-1]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"name\": \"Primary\"\n        },\n        \"type\": \"nav_menu\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:40\"\n    },\n    \"nav_menu_item[-1]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"custom\",\n            \"title\": \"Home\",\n            \"url\": \"http://www.rhodeislandliquors.dev.cc/\",\n            \"position\": 0,\n            \"nav_menu_term_id\": -1,\n            \"object_id\": 0\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:40\"\n    },\n    \"nav_menu_item[-2]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"post_type\",\n            \"object\": \"page\",\n            \"object_id\": 7,\n            \"position\": 1,\n            \"nav_menu_term_id\": -1,\n            \"title\": \"About\"\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:40\"\n    },\n    \"nav_menu_item[-3]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"post_type\",\n            \"object\": \"page\",\n            \"object_id\": 9,\n            \"position\": 2,\n            \"nav_menu_term_id\": -1,\n            \"title\": \"Blog\"\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:40\"\n    },\n    \"nav_menu_item[-4]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"post_type\",\n            \"object\": \"page\",\n            \"object_id\": 8,\n            \"position\": 3,\n            \"nav_menu_term_id\": -1,\n            \"title\": \"Contact\"\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:40\"\n    },\n    \"twentytwenty::nav_menu_locations[primary]\": {\n        \"starter_content\": true,\n        \"value\": -1,\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:40\"\n    },\n    \"nav_menu[-5]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"name\": \"Primary\"\n        },\n        \"type\": \"nav_menu\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:40\"\n    },\n    \"nav_menu_item[-5]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"custom\",\n            \"title\": \"Home\",\n            \"url\": \"http://www.rhodeislandliquors.dev.cc/\",\n            \"position\": 0,\n            \"nav_menu_term_id\": -5,\n            \"object_id\": 0\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:40\"\n    },\n    \"nav_menu_item[-6]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"post_type\",\n            \"object\": \"page\",\n            \"object_id\": 7,\n            \"position\": 1,\n            \"nav_menu_term_id\": -5,\n            \"title\": \"About\"\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:40\"\n    },\n    \"nav_menu_item[-7]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"post_type\",\n            \"object\": \"page\",\n            \"object_id\": 9,\n            \"position\": 2,\n            \"nav_menu_term_id\": -5,\n            \"title\": \"Blog\"\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:40\"\n    },\n    \"nav_menu_item[-8]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"post_type\",\n            \"object\": \"page\",\n            \"object_id\": 8,\n            \"position\": 3,\n            \"nav_menu_term_id\": -5,\n            \"title\": \"Contact\"\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:40\"\n    },\n    \"twentytwenty::nav_menu_locations[expanded]\": {\n        \"starter_content\": true,\n        \"value\": -5,\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:40\"\n    },\n    \"nav_menu[-9]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"name\": \"Social Links Menu\"\n        },\n        \"type\": \"nav_menu\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:40\"\n    },\n    \"nav_menu_item[-9]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"title\": \"Yelp\",\n            \"url\": \"https://www.yelp.com\",\n            \"position\": 0,\n            \"nav_menu_term_id\": -9,\n            \"object_id\": 0\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:40\"\n    },\n    \"nav_menu_item[-10]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"title\": \"Facebook\",\n            \"url\": \"https://www.facebook.com/wordpress\",\n            \"position\": 1,\n            \"nav_menu_term_id\": -9,\n            \"object_id\": 0\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:40\"\n    },\n    \"nav_menu_item[-11]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"title\": \"Twitter\",\n            \"url\": \"https://twitter.com/wordpress\",\n            \"position\": 2,\n            \"nav_menu_term_id\": -9,\n            \"object_id\": 0\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:40\"\n    },\n    \"nav_menu_item[-12]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"title\": \"Instagram\",\n            \"url\": \"https://www.instagram.com/explore/tags/wordcamp/\",\n            \"position\": 3,\n            \"nav_menu_term_id\": -9,\n            \"object_id\": 0\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:40\"\n    },\n    \"nav_menu_item[-13]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"title\": \"Email\",\n            \"url\": \"mailto:wordpress@example.com\",\n            \"position\": 4,\n            \"nav_menu_term_id\": -9,\n            \"object_id\": 0\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:40\"\n    },\n    \"twentytwenty::nav_menu_locations[social]\": {\n        \"starter_content\": true,\n        \"value\": -9,\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:40\"\n    },\n    \"show_on_front\": {\n        \"starter_content\": true,\n        \"value\": \"page\",\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:40\"\n    },\n    \"page_on_front\": {\n        \"starter_content\": true,\n        \"value\": 6,\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:40\"\n    },\n    \"page_for_posts\": {\n        \"starter_content\": true,\n        \"value\": 9,\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:40\"\n    }\n}', '', '', 'auto-draft', 'closed', 'closed', '', '993fde0d-2b4a-4980-8fd9-a1116e8bf125', '', '', '2020-02-05 09:59:40', '0000-00-00 00:00:00', '', 0, 'http://www.rhodeislandliquors.dev.cc/?p=10', 0, 'customize_changeset', '', 0),
(11, 1, '2020-02-05 09:59:42', '0000-00-00 00:00:00', '', 'The New UMoMA Opens its Doors', '', 'auto-draft', 'open', 'closed', '', '', '', '', '2020-02-05 09:59:41', '0000-00-00 00:00:00', '', 0, 'http://www.rhodeislandliquors.dev.cc/wp-content/uploads/2020/02/2020-landscape-1-1.png', 0, 'attachment', 'image/png', 0),
(12, 1, '2020-02-05 09:59:42', '0000-00-00 00:00:00', '<!-- wp:group {\"align\":\"wide\"} --><div class=\"wp-block-group alignwide\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\"} --><h2 class=\"has-text-align-center\">The premier destination for modern art in Northern Sweden. Open from 10 AM to 6 PM every day during the summer months.</h2><!-- /wp:heading --></div></div><!-- /wp:group --><!-- wp:columns {\"align\":\"wide\"} --><div class=\"wp-block-columns alignwide\"><!-- wp:column --><div class=\"wp-block-column\"><!-- wp:group --><div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"align\":\"full\",\"id\":37,\"sizeSlug\":\"full\"} --><figure class=\"wp-block-image alignfull size-full\"><img src=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-three-quarters-1.png\" alt=\"\" class=\"wp-image-37\"/></figure><!-- /wp:image --><!-- wp:heading {\"level\":3} --><h3>Works and Days</h3><!-- /wp:heading --><!-- wp:paragraph --><p>August 1 -- December 1</p><!-- /wp:paragraph --><!-- wp:button {\"className\":\"is-style-outline\"} --><div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link\" href=\"https://make.wordpress.org/core/2019/09/27/block-editor-theme-related-updates-in-wordpress-5-3/\">Read More</a></div><!-- /wp:button --></div></div><!-- /wp:group --><!-- wp:group --><div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"align\":\"full\",\"id\":37,\"sizeSlug\":\"full\"} --><figure class=\"wp-block-image alignfull size-full\"><img src=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-three-quarters-3.png\" alt=\"\" class=\"wp-image-37\"/></figure><!-- /wp:image --><!-- wp:heading {\"level\":3} --><h3>Theatre of Operations</h3><!-- /wp:heading --><!-- wp:paragraph --><p>October 1 -- December 1</p><!-- /wp:paragraph --><!-- wp:button {\"className\":\"is-style-outline\"} --><div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link\" href=\"https://make.wordpress.org/core/2019/09/27/block-editor-theme-related-updates-in-wordpress-5-3/\">Read More</a></div><!-- /wp:button --></div></div><!-- /wp:group --></div><!-- /wp:column --><!-- wp:column --><div class=\"wp-block-column\"><!-- wp:group --><div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"align\":\"full\",\"id\":37,\"sizeSlug\":\"full\"} --><figure class=\"wp-block-image alignfull size-full\"><img src=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-three-quarters-2.png\" alt=\"\" class=\"wp-image-37\"/></figure><!-- /wp:image --><!-- wp:heading {\"level\":3} --><h3>The Life I Deserve</h3><!-- /wp:heading --><!-- wp:paragraph --><p>August 1 -- December 1</p><!-- /wp:paragraph --><!-- wp:button {\"className\":\"is-style-outline\"} --><div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link\" href=\"https://make.wordpress.org/core/2019/09/27/block-editor-theme-related-updates-in-wordpress-5-3/\">Read More</a></div><!-- /wp:button --></div></div><!-- /wp:group --><!-- wp:group --><div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"align\":\"full\",\"id\":37,\"sizeSlug\":\"full\"} --><figure class=\"wp-block-image alignfull size-full\"><img src=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-three-quarters-4.png\" alt=\"\" class=\"wp-image-37\"/></figure><!-- /wp:image --><!-- wp:heading {\"level\":3} --><h3>From Signac to Matisse</h3><!-- /wp:heading --><!-- wp:paragraph --><p>October 1 -- December 1</p><!-- /wp:paragraph --><!-- wp:button {\"className\":\"is-style-outline\"} --><div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link\" href=\"https://make.wordpress.org/core/2019/09/27/block-editor-theme-related-updates-in-wordpress-5-3/\">Read More</a></div><!-- /wp:button --></div></div><!-- /wp:group --></div><!-- /wp:column --></div><!-- /wp:columns --><!-- wp:image {\"align\":\"full\",\"id\":37,\"sizeSlug\":\"full\"} --><figure class=\"wp-block-image alignfull size-full\"><img src=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-landscape-2.png\" alt=\"\" class=\"wp-image-37\"/></figure><!-- /wp:image --><!-- wp:group {\"align\":\"wide\"} --><div class=\"wp-block-group alignwide\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\",\"textColor\":\"accent\"} --><h2 class=\"has-accent-color has-text-align-center\">”Cyborgs, as the philosopher Donna Haraway established, are not reverent. They do not remember the cosmos.”</h2><!-- /wp:heading --></div></div><!-- /wp:group --><!-- wp:paragraph {\"dropCap\":true} --><p class=\"has-drop-cap\">With seven floors of striking architecture, UMoMA shows exhibitions of international contemporary art, sometimes along with art historical retrospectives. Existential, political and philosophical issues are intrinsic to our programme. As visitor you are invited to guided tours artist talks, lectures, film screenings and other events with free admission</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>The exhibitions are produced by UMoMA in collaboration with artists and museums around the world and they often attract international attention. UMoMA has received a Special Commendation from the European Museum of the Year, and was among the top candidates for the Swedish Museum of the Year Award as well as for the Council of Europe Museum Prize.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p></p><!-- /wp:paragraph --><!-- wp:group {\"customBackgroundColor\":\"#ffffff\",\"align\":\"wide\"} --><div class=\"wp-block-group alignwide has-background\" style=\"background-color:#ffffff\"><div class=\"wp-block-group__inner-container\"><!-- wp:group --><div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\"} --><h2 class=\"has-text-align-center\">Become a Member and Get Exclusive Offers!</h2><!-- /wp:heading --><!-- wp:paragraph {\"align\":\"center\"} --><p class=\"has-text-align-center\">Members get access to exclusive exhibits and sales. Our memberships cost $99.99 and are billed annually.</p><!-- /wp:paragraph --><!-- wp:button {\"align\":\"center\"} --><div class=\"wp-block-button aligncenter\"><a class=\"wp-block-button__link\" href=\"https://make.wordpress.org/core/2019/09/27/block-editor-theme-related-updates-in-wordpress-5-3/\">Join the Club</a></div><!-- /wp:button --></div></div><!-- /wp:group --></div></div><!-- /wp:group --><!-- wp:gallery {\"ids\":[39,38],\"align\":\"wide\"} --><figure class=\"wp-block-gallery alignwide columns-2 is-cropped\"><ul class=\"blocks-gallery-grid\"><li class=\"blocks-gallery-item\"><figure><img src=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-square-2.png\" alt=\"\" data-id=\"39\" data-full-url=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-square-2.png\" data-link=\"assets/images/2020-square-2/\" class=\"wp-image-39\"/></figure></li><li class=\"blocks-gallery-item\"><figure><img src=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-square-1.png\" alt=\"\" data-id=\"38\" data-full-url=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-square-1.png\" data-link=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-square-1/\" class=\"wp-image-38\"/></figure></li></ul></figure><!-- /wp:gallery -->', 'The New UMoMA Opens its Doors', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2020-02-05 09:59:42', '0000-00-00 00:00:00', '', 0, 'http://www.rhodeislandliquors.dev.cc/?page_id=12', 0, 'page', '', 0),
(13, 1, '2020-02-05 09:59:42', '0000-00-00 00:00:00', '<!-- wp:paragraph -->\n<p>You might be an artist who would like to introduce yourself and your work here or maybe you&rsquo;re a business with a mission to describe.</p>\n<!-- /wp:paragraph -->', 'About', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2020-02-05 09:59:42', '0000-00-00 00:00:00', '', 0, 'http://www.rhodeislandliquors.dev.cc/?page_id=13', 0, 'page', '', 0),
(14, 1, '2020-02-05 09:59:42', '0000-00-00 00:00:00', '<!-- wp:paragraph -->\n<p>This is a page with some basic contact information, such as an address and phone number. You might also try a plugin to add a contact form.</p>\n<!-- /wp:paragraph -->', 'Contact', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2020-02-05 09:59:42', '0000-00-00 00:00:00', '', 0, 'http://www.rhodeislandliquors.dev.cc/?page_id=14', 0, 'page', '', 0),
(15, 1, '2020-02-05 09:59:42', '0000-00-00 00:00:00', '', 'Blog', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2020-02-05 09:59:42', '0000-00-00 00:00:00', '', 0, 'http://www.rhodeislandliquors.dev.cc/?page_id=15', 0, 'page', '', 0),
(16, 1, '2020-02-05 09:59:43', '0000-00-00 00:00:00', '', 'The New UMoMA Opens its Doors', '', 'auto-draft', 'open', 'closed', '', '', '', '', '2020-02-05 09:59:42', '0000-00-00 00:00:00', '', 0, 'http://www.rhodeislandliquors.dev.cc/wp-content/uploads/2020/02/2020-landscape-1-2.png', 0, 'attachment', 'image/png', 0),
(17, 1, '2020-02-05 09:59:42', '0000-00-00 00:00:00', '{\n    \"widget_text[2]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"encoded_serialized_instance\": \"YTo0OntzOjU6InRpdGxlIjtzOjE1OiJBYm91dCBUaGlzIFNpdGUiO3M6NDoidGV4dCI7czo4NToiVGhpcyBtYXkgYmUgYSBnb29kIHBsYWNlIHRvIGludHJvZHVjZSB5b3Vyc2VsZiBhbmQgeW91ciBzaXRlIG9yIGluY2x1ZGUgc29tZSBjcmVkaXRzLiI7czo2OiJmaWx0ZXIiO2I6MTtzOjY6InZpc3VhbCI7YjoxO30=\",\n            \"title\": \"About This Site\",\n            \"is_widget_customizer_js_value\": true,\n            \"instance_hash_key\": \"ceafc8b19a217b51f49bee3f6856347f\"\n        },\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:42\"\n    },\n    \"sidebars_widgets[sidebar-1]\": {\n        \"starter_content\": true,\n        \"value\": [\n            \"text-2\"\n        ],\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:42\"\n    },\n    \"widget_text[3]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"encoded_serialized_instance\": \"YTo0OntzOjU6InRpdGxlIjtzOjc6IkZpbmQgVXMiO3M6NDoidGV4dCI7czoxNjg6IjxzdHJvbmc+QWRkcmVzczwvc3Ryb25nPgoxMjMgTWFpbiBTdHJlZXQKTmV3IFlvcmssIE5ZIDEwMDAxCgo8c3Ryb25nPkhvdXJzPC9zdHJvbmc+Ck1vbmRheSZtZGFzaDtGcmlkYXk6IDk6MDBBTSZuZGFzaDs1OjAwUE0KU2F0dXJkYXkgJmFtcDsgU3VuZGF5OiAxMTowMEFNJm5kYXNoOzM6MDBQTSI7czo2OiJmaWx0ZXIiO2I6MTtzOjY6InZpc3VhbCI7YjoxO30=\",\n            \"title\": \"Find Us\",\n            \"is_widget_customizer_js_value\": true,\n            \"instance_hash_key\": \"f9ef2d44646a201ee17763bcea85e6ef\"\n        },\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:42\"\n    },\n    \"sidebars_widgets[sidebar-2]\": {\n        \"starter_content\": true,\n        \"value\": [\n            \"text-3\"\n        ],\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:42\"\n    },\n    \"nav_menus_created_posts\": {\n        \"starter_content\": true,\n        \"value\": [\n            11,\n            12,\n            13,\n            14,\n            15\n        ],\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:42\"\n    },\n    \"nav_menu[-1]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"name\": \"Primary\"\n        },\n        \"type\": \"nav_menu\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:42\"\n    },\n    \"nav_menu_item[-1]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"custom\",\n            \"title\": \"Home\",\n            \"url\": \"http://www.rhodeislandliquors.dev.cc/\",\n            \"position\": 0,\n            \"nav_menu_term_id\": -1,\n            \"object_id\": 0\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:42\"\n    },\n    \"nav_menu_item[-2]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"post_type\",\n            \"object\": \"page\",\n            \"object_id\": 13,\n            \"position\": 1,\n            \"nav_menu_term_id\": -1,\n            \"title\": \"About\"\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:42\"\n    },\n    \"nav_menu_item[-3]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"post_type\",\n            \"object\": \"page\",\n            \"object_id\": 15,\n            \"position\": 2,\n            \"nav_menu_term_id\": -1,\n            \"title\": \"Blog\"\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:42\"\n    },\n    \"nav_menu_item[-4]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"post_type\",\n            \"object\": \"page\",\n            \"object_id\": 14,\n            \"position\": 3,\n            \"nav_menu_term_id\": -1,\n            \"title\": \"Contact\"\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:42\"\n    },\n    \"twentytwenty::nav_menu_locations[primary]\": {\n        \"starter_content\": true,\n        \"value\": -1,\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:42\"\n    },\n    \"nav_menu[-5]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"name\": \"Primary\"\n        },\n        \"type\": \"nav_menu\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:42\"\n    },\n    \"nav_menu_item[-5]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"custom\",\n            \"title\": \"Home\",\n            \"url\": \"http://www.rhodeislandliquors.dev.cc/\",\n            \"position\": 0,\n            \"nav_menu_term_id\": -5,\n            \"object_id\": 0\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:42\"\n    },\n    \"nav_menu_item[-6]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"post_type\",\n            \"object\": \"page\",\n            \"object_id\": 13,\n            \"position\": 1,\n            \"nav_menu_term_id\": -5,\n            \"title\": \"About\"\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:42\"\n    },\n    \"nav_menu_item[-7]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"post_type\",\n            \"object\": \"page\",\n            \"object_id\": 15,\n            \"position\": 2,\n            \"nav_menu_term_id\": -5,\n            \"title\": \"Blog\"\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:42\"\n    },\n    \"nav_menu_item[-8]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"post_type\",\n            \"object\": \"page\",\n            \"object_id\": 14,\n            \"position\": 3,\n            \"nav_menu_term_id\": -5,\n            \"title\": \"Contact\"\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:42\"\n    },\n    \"twentytwenty::nav_menu_locations[expanded]\": {\n        \"starter_content\": true,\n        \"value\": -5,\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:42\"\n    },\n    \"nav_menu[-9]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"name\": \"Social Links Menu\"\n        },\n        \"type\": \"nav_menu\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:42\"\n    },\n    \"nav_menu_item[-9]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"title\": \"Yelp\",\n            \"url\": \"https://www.yelp.com\",\n            \"position\": 0,\n            \"nav_menu_term_id\": -9,\n            \"object_id\": 0\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:42\"\n    },\n    \"nav_menu_item[-10]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"title\": \"Facebook\",\n            \"url\": \"https://www.facebook.com/wordpress\",\n            \"position\": 1,\n            \"nav_menu_term_id\": -9,\n            \"object_id\": 0\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:42\"\n    },\n    \"nav_menu_item[-11]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"title\": \"Twitter\",\n            \"url\": \"https://twitter.com/wordpress\",\n            \"position\": 2,\n            \"nav_menu_term_id\": -9,\n            \"object_id\": 0\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:42\"\n    },\n    \"nav_menu_item[-12]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"title\": \"Instagram\",\n            \"url\": \"https://www.instagram.com/explore/tags/wordcamp/\",\n            \"position\": 3,\n            \"nav_menu_term_id\": -9,\n            \"object_id\": 0\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:42\"\n    },\n    \"nav_menu_item[-13]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"title\": \"Email\",\n            \"url\": \"mailto:wordpress@example.com\",\n            \"position\": 4,\n            \"nav_menu_term_id\": -9,\n            \"object_id\": 0\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:42\"\n    },\n    \"twentytwenty::nav_menu_locations[social]\": {\n        \"starter_content\": true,\n        \"value\": -9,\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:42\"\n    },\n    \"show_on_front\": {\n        \"starter_content\": true,\n        \"value\": \"page\",\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:42\"\n    },\n    \"page_on_front\": {\n        \"starter_content\": true,\n        \"value\": 12,\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:42\"\n    },\n    \"page_for_posts\": {\n        \"starter_content\": true,\n        \"value\": 15,\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:42\"\n    }\n}', '', '', 'auto-draft', 'closed', 'closed', '', '736fdcec-997e-488d-aac0-61e8ee836787', '', '', '2020-02-05 09:59:42', '0000-00-00 00:00:00', '', 0, 'http://www.rhodeislandliquors.dev.cc/?p=17', 0, 'customize_changeset', '', 0);
INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(18, 1, '2020-02-05 09:59:43', '0000-00-00 00:00:00', '<!-- wp:group {\"align\":\"wide\"} --><div class=\"wp-block-group alignwide\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\"} --><h2 class=\"has-text-align-center\">The premier destination for modern art in Northern Sweden. Open from 10 AM to 6 PM every day during the summer months.</h2><!-- /wp:heading --></div></div><!-- /wp:group --><!-- wp:columns {\"align\":\"wide\"} --><div class=\"wp-block-columns alignwide\"><!-- wp:column --><div class=\"wp-block-column\"><!-- wp:group --><div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"align\":\"full\",\"id\":37,\"sizeSlug\":\"full\"} --><figure class=\"wp-block-image alignfull size-full\"><img src=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-three-quarters-1.png\" alt=\"\" class=\"wp-image-37\"/></figure><!-- /wp:image --><!-- wp:heading {\"level\":3} --><h3>Works and Days</h3><!-- /wp:heading --><!-- wp:paragraph --><p>August 1 -- December 1</p><!-- /wp:paragraph --><!-- wp:button {\"className\":\"is-style-outline\"} --><div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link\" href=\"https://make.wordpress.org/core/2019/09/27/block-editor-theme-related-updates-in-wordpress-5-3/\">Read More</a></div><!-- /wp:button --></div></div><!-- /wp:group --><!-- wp:group --><div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"align\":\"full\",\"id\":37,\"sizeSlug\":\"full\"} --><figure class=\"wp-block-image alignfull size-full\"><img src=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-three-quarters-3.png\" alt=\"\" class=\"wp-image-37\"/></figure><!-- /wp:image --><!-- wp:heading {\"level\":3} --><h3>Theatre of Operations</h3><!-- /wp:heading --><!-- wp:paragraph --><p>October 1 -- December 1</p><!-- /wp:paragraph --><!-- wp:button {\"className\":\"is-style-outline\"} --><div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link\" href=\"https://make.wordpress.org/core/2019/09/27/block-editor-theme-related-updates-in-wordpress-5-3/\">Read More</a></div><!-- /wp:button --></div></div><!-- /wp:group --></div><!-- /wp:column --><!-- wp:column --><div class=\"wp-block-column\"><!-- wp:group --><div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"align\":\"full\",\"id\":37,\"sizeSlug\":\"full\"} --><figure class=\"wp-block-image alignfull size-full\"><img src=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-three-quarters-2.png\" alt=\"\" class=\"wp-image-37\"/></figure><!-- /wp:image --><!-- wp:heading {\"level\":3} --><h3>The Life I Deserve</h3><!-- /wp:heading --><!-- wp:paragraph --><p>August 1 -- December 1</p><!-- /wp:paragraph --><!-- wp:button {\"className\":\"is-style-outline\"} --><div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link\" href=\"https://make.wordpress.org/core/2019/09/27/block-editor-theme-related-updates-in-wordpress-5-3/\">Read More</a></div><!-- /wp:button --></div></div><!-- /wp:group --><!-- wp:group --><div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"align\":\"full\",\"id\":37,\"sizeSlug\":\"full\"} --><figure class=\"wp-block-image alignfull size-full\"><img src=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-three-quarters-4.png\" alt=\"\" class=\"wp-image-37\"/></figure><!-- /wp:image --><!-- wp:heading {\"level\":3} --><h3>From Signac to Matisse</h3><!-- /wp:heading --><!-- wp:paragraph --><p>October 1 -- December 1</p><!-- /wp:paragraph --><!-- wp:button {\"className\":\"is-style-outline\"} --><div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link\" href=\"https://make.wordpress.org/core/2019/09/27/block-editor-theme-related-updates-in-wordpress-5-3/\">Read More</a></div><!-- /wp:button --></div></div><!-- /wp:group --></div><!-- /wp:column --></div><!-- /wp:columns --><!-- wp:image {\"align\":\"full\",\"id\":37,\"sizeSlug\":\"full\"} --><figure class=\"wp-block-image alignfull size-full\"><img src=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-landscape-2.png\" alt=\"\" class=\"wp-image-37\"/></figure><!-- /wp:image --><!-- wp:group {\"align\":\"wide\"} --><div class=\"wp-block-group alignwide\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\",\"textColor\":\"accent\"} --><h2 class=\"has-accent-color has-text-align-center\">”Cyborgs, as the philosopher Donna Haraway established, are not reverent. They do not remember the cosmos.”</h2><!-- /wp:heading --></div></div><!-- /wp:group --><!-- wp:paragraph {\"dropCap\":true} --><p class=\"has-drop-cap\">With seven floors of striking architecture, UMoMA shows exhibitions of international contemporary art, sometimes along with art historical retrospectives. Existential, political and philosophical issues are intrinsic to our programme. As visitor you are invited to guided tours artist talks, lectures, film screenings and other events with free admission</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>The exhibitions are produced by UMoMA in collaboration with artists and museums around the world and they often attract international attention. UMoMA has received a Special Commendation from the European Museum of the Year, and was among the top candidates for the Swedish Museum of the Year Award as well as for the Council of Europe Museum Prize.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p></p><!-- /wp:paragraph --><!-- wp:group {\"customBackgroundColor\":\"#ffffff\",\"align\":\"wide\"} --><div class=\"wp-block-group alignwide has-background\" style=\"background-color:#ffffff\"><div class=\"wp-block-group__inner-container\"><!-- wp:group --><div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\"} --><h2 class=\"has-text-align-center\">Become a Member and Get Exclusive Offers!</h2><!-- /wp:heading --><!-- wp:paragraph {\"align\":\"center\"} --><p class=\"has-text-align-center\">Members get access to exclusive exhibits and sales. Our memberships cost $99.99 and are billed annually.</p><!-- /wp:paragraph --><!-- wp:button {\"align\":\"center\"} --><div class=\"wp-block-button aligncenter\"><a class=\"wp-block-button__link\" href=\"https://make.wordpress.org/core/2019/09/27/block-editor-theme-related-updates-in-wordpress-5-3/\">Join the Club</a></div><!-- /wp:button --></div></div><!-- /wp:group --></div></div><!-- /wp:group --><!-- wp:gallery {\"ids\":[39,38],\"align\":\"wide\"} --><figure class=\"wp-block-gallery alignwide columns-2 is-cropped\"><ul class=\"blocks-gallery-grid\"><li class=\"blocks-gallery-item\"><figure><img src=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-square-2.png\" alt=\"\" data-id=\"39\" data-full-url=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-square-2.png\" data-link=\"assets/images/2020-square-2/\" class=\"wp-image-39\"/></figure></li><li class=\"blocks-gallery-item\"><figure><img src=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-square-1.png\" alt=\"\" data-id=\"38\" data-full-url=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-square-1.png\" data-link=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-square-1/\" class=\"wp-image-38\"/></figure></li></ul></figure><!-- /wp:gallery -->', 'The New UMoMA Opens its Doors', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2020-02-05 09:59:43', '0000-00-00 00:00:00', '', 0, 'http://www.rhodeislandliquors.dev.cc/?page_id=18', 0, 'page', '', 0),
(19, 1, '2020-02-05 09:59:43', '0000-00-00 00:00:00', '<!-- wp:paragraph -->\n<p>You might be an artist who would like to introduce yourself and your work here or maybe you&rsquo;re a business with a mission to describe.</p>\n<!-- /wp:paragraph -->', 'About', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2020-02-05 09:59:43', '0000-00-00 00:00:00', '', 0, 'http://www.rhodeislandliquors.dev.cc/?page_id=19', 0, 'page', '', 0),
(20, 1, '2020-02-05 09:59:43', '0000-00-00 00:00:00', '<!-- wp:paragraph -->\n<p>This is a page with some basic contact information, such as an address and phone number. You might also try a plugin to add a contact form.</p>\n<!-- /wp:paragraph -->', 'Contact', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2020-02-05 09:59:43', '0000-00-00 00:00:00', '', 0, 'http://www.rhodeislandliquors.dev.cc/?page_id=20', 0, 'page', '', 0),
(21, 1, '2020-02-05 09:59:43', '0000-00-00 00:00:00', '', 'Blog', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2020-02-05 09:59:43', '0000-00-00 00:00:00', '', 0, 'http://www.rhodeislandliquors.dev.cc/?page_id=21', 0, 'page', '', 0),
(22, 1, '2020-02-05 09:59:43', '0000-00-00 00:00:00', '{\n    \"widget_text[4]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"encoded_serialized_instance\": \"YTo0OntzOjU6InRpdGxlIjtzOjE1OiJBYm91dCBUaGlzIFNpdGUiO3M6NDoidGV4dCI7czo4NToiVGhpcyBtYXkgYmUgYSBnb29kIHBsYWNlIHRvIGludHJvZHVjZSB5b3Vyc2VsZiBhbmQgeW91ciBzaXRlIG9yIGluY2x1ZGUgc29tZSBjcmVkaXRzLiI7czo2OiJmaWx0ZXIiO2I6MTtzOjY6InZpc3VhbCI7YjoxO30=\",\n            \"title\": \"About This Site\",\n            \"is_widget_customizer_js_value\": true,\n            \"instance_hash_key\": \"ceafc8b19a217b51f49bee3f6856347f\"\n        },\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:43\"\n    },\n    \"sidebars_widgets[sidebar-1]\": {\n        \"starter_content\": true,\n        \"value\": [\n            \"text-4\"\n        ],\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:43\"\n    },\n    \"widget_text[5]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"encoded_serialized_instance\": \"YTo0OntzOjU6InRpdGxlIjtzOjc6IkZpbmQgVXMiO3M6NDoidGV4dCI7czoxNjg6IjxzdHJvbmc+QWRkcmVzczwvc3Ryb25nPgoxMjMgTWFpbiBTdHJlZXQKTmV3IFlvcmssIE5ZIDEwMDAxCgo8c3Ryb25nPkhvdXJzPC9zdHJvbmc+Ck1vbmRheSZtZGFzaDtGcmlkYXk6IDk6MDBBTSZuZGFzaDs1OjAwUE0KU2F0dXJkYXkgJmFtcDsgU3VuZGF5OiAxMTowMEFNJm5kYXNoOzM6MDBQTSI7czo2OiJmaWx0ZXIiO2I6MTtzOjY6InZpc3VhbCI7YjoxO30=\",\n            \"title\": \"Find Us\",\n            \"is_widget_customizer_js_value\": true,\n            \"instance_hash_key\": \"f9ef2d44646a201ee17763bcea85e6ef\"\n        },\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:43\"\n    },\n    \"sidebars_widgets[sidebar-2]\": {\n        \"starter_content\": true,\n        \"value\": [\n            \"text-5\"\n        ],\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:43\"\n    },\n    \"nav_menus_created_posts\": {\n        \"starter_content\": true,\n        \"value\": [\n            16,\n            18,\n            19,\n            20,\n            21\n        ],\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:43\"\n    },\n    \"nav_menu[-1]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"name\": \"Primary\"\n        },\n        \"type\": \"nav_menu\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:43\"\n    },\n    \"nav_menu_item[-1]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"custom\",\n            \"title\": \"Home\",\n            \"url\": \"http://www.rhodeislandliquors.dev.cc/\",\n            \"position\": 0,\n            \"nav_menu_term_id\": -1,\n            \"object_id\": 0\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:43\"\n    },\n    \"nav_menu_item[-2]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"post_type\",\n            \"object\": \"page\",\n            \"object_id\": 19,\n            \"position\": 1,\n            \"nav_menu_term_id\": -1,\n            \"title\": \"About\"\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:43\"\n    },\n    \"nav_menu_item[-3]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"post_type\",\n            \"object\": \"page\",\n            \"object_id\": 21,\n            \"position\": 2,\n            \"nav_menu_term_id\": -1,\n            \"title\": \"Blog\"\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:43\"\n    },\n    \"nav_menu_item[-4]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"post_type\",\n            \"object\": \"page\",\n            \"object_id\": 20,\n            \"position\": 3,\n            \"nav_menu_term_id\": -1,\n            \"title\": \"Contact\"\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:43\"\n    },\n    \"twentytwenty::nav_menu_locations[primary]\": {\n        \"starter_content\": true,\n        \"value\": -1,\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:43\"\n    },\n    \"nav_menu[-5]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"name\": \"Primary\"\n        },\n        \"type\": \"nav_menu\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:43\"\n    },\n    \"nav_menu_item[-5]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"custom\",\n            \"title\": \"Home\",\n            \"url\": \"http://www.rhodeislandliquors.dev.cc/\",\n            \"position\": 0,\n            \"nav_menu_term_id\": -5,\n            \"object_id\": 0\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:43\"\n    },\n    \"nav_menu_item[-6]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"post_type\",\n            \"object\": \"page\",\n            \"object_id\": 19,\n            \"position\": 1,\n            \"nav_menu_term_id\": -5,\n            \"title\": \"About\"\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:43\"\n    },\n    \"nav_menu_item[-7]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"post_type\",\n            \"object\": \"page\",\n            \"object_id\": 21,\n            \"position\": 2,\n            \"nav_menu_term_id\": -5,\n            \"title\": \"Blog\"\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:43\"\n    },\n    \"nav_menu_item[-8]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"post_type\",\n            \"object\": \"page\",\n            \"object_id\": 20,\n            \"position\": 3,\n            \"nav_menu_term_id\": -5,\n            \"title\": \"Contact\"\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:43\"\n    },\n    \"twentytwenty::nav_menu_locations[expanded]\": {\n        \"starter_content\": true,\n        \"value\": -5,\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:43\"\n    },\n    \"nav_menu[-9]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"name\": \"Social Links Menu\"\n        },\n        \"type\": \"nav_menu\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:43\"\n    },\n    \"nav_menu_item[-9]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"title\": \"Yelp\",\n            \"url\": \"https://www.yelp.com\",\n            \"position\": 0,\n            \"nav_menu_term_id\": -9,\n            \"object_id\": 0\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:43\"\n    },\n    \"nav_menu_item[-10]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"title\": \"Facebook\",\n            \"url\": \"https://www.facebook.com/wordpress\",\n            \"position\": 1,\n            \"nav_menu_term_id\": -9,\n            \"object_id\": 0\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:43\"\n    },\n    \"nav_menu_item[-11]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"title\": \"Twitter\",\n            \"url\": \"https://twitter.com/wordpress\",\n            \"position\": 2,\n            \"nav_menu_term_id\": -9,\n            \"object_id\": 0\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:43\"\n    },\n    \"nav_menu_item[-12]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"title\": \"Instagram\",\n            \"url\": \"https://www.instagram.com/explore/tags/wordcamp/\",\n            \"position\": 3,\n            \"nav_menu_term_id\": -9,\n            \"object_id\": 0\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:43\"\n    },\n    \"nav_menu_item[-13]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"title\": \"Email\",\n            \"url\": \"mailto:wordpress@example.com\",\n            \"position\": 4,\n            \"nav_menu_term_id\": -9,\n            \"object_id\": 0\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:43\"\n    },\n    \"twentytwenty::nav_menu_locations[social]\": {\n        \"starter_content\": true,\n        \"value\": -9,\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:43\"\n    },\n    \"show_on_front\": {\n        \"starter_content\": true,\n        \"value\": \"page\",\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:43\"\n    },\n    \"page_on_front\": {\n        \"starter_content\": true,\n        \"value\": 18,\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:43\"\n    },\n    \"page_for_posts\": {\n        \"starter_content\": true,\n        \"value\": 21,\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 09:59:43\"\n    }\n}', '', '', 'auto-draft', 'closed', 'closed', '', 'effe2694-ba82-4870-a572-f414c064701c', '', '', '2020-02-05 09:59:43', '0000-00-00 00:00:00', '', 0, 'http://www.rhodeislandliquors.dev.cc/?p=22', 0, 'customize_changeset', '', 0),
(23, 1, '2020-02-05 10:05:34', '0000-00-00 00:00:00', '', 'The New UMoMA Opens its Doors', '', 'auto-draft', 'open', 'closed', '', '', '', '', '2020-02-05 10:05:33', '0000-00-00 00:00:00', '', 0, 'http://www.rhodeislandliquors.dev.cc/wp-content/uploads/2020/02/2020-landscape-1-3.png', 0, 'attachment', 'image/png', 0),
(24, 1, '2020-02-05 10:05:34', '0000-00-00 00:00:00', '<!-- wp:group {\"align\":\"wide\"} --><div class=\"wp-block-group alignwide\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\"} --><h2 class=\"has-text-align-center\">The premier destination for modern art in Northern Sweden. Open from 10 AM to 6 PM every day during the summer months.</h2><!-- /wp:heading --></div></div><!-- /wp:group --><!-- wp:columns {\"align\":\"wide\"} --><div class=\"wp-block-columns alignwide\"><!-- wp:column --><div class=\"wp-block-column\"><!-- wp:group --><div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"align\":\"full\",\"id\":37,\"sizeSlug\":\"full\"} --><figure class=\"wp-block-image alignfull size-full\"><img src=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-three-quarters-1.png\" alt=\"\" class=\"wp-image-37\"/></figure><!-- /wp:image --><!-- wp:heading {\"level\":3} --><h3>Works and Days</h3><!-- /wp:heading --><!-- wp:paragraph --><p>August 1 -- December 1</p><!-- /wp:paragraph --><!-- wp:button {\"className\":\"is-style-outline\"} --><div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link\" href=\"https://make.wordpress.org/core/2019/09/27/block-editor-theme-related-updates-in-wordpress-5-3/\">Read More</a></div><!-- /wp:button --></div></div><!-- /wp:group --><!-- wp:group --><div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"align\":\"full\",\"id\":37,\"sizeSlug\":\"full\"} --><figure class=\"wp-block-image alignfull size-full\"><img src=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-three-quarters-3.png\" alt=\"\" class=\"wp-image-37\"/></figure><!-- /wp:image --><!-- wp:heading {\"level\":3} --><h3>Theatre of Operations</h3><!-- /wp:heading --><!-- wp:paragraph --><p>October 1 -- December 1</p><!-- /wp:paragraph --><!-- wp:button {\"className\":\"is-style-outline\"} --><div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link\" href=\"https://make.wordpress.org/core/2019/09/27/block-editor-theme-related-updates-in-wordpress-5-3/\">Read More</a></div><!-- /wp:button --></div></div><!-- /wp:group --></div><!-- /wp:column --><!-- wp:column --><div class=\"wp-block-column\"><!-- wp:group --><div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"align\":\"full\",\"id\":37,\"sizeSlug\":\"full\"} --><figure class=\"wp-block-image alignfull size-full\"><img src=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-three-quarters-2.png\" alt=\"\" class=\"wp-image-37\"/></figure><!-- /wp:image --><!-- wp:heading {\"level\":3} --><h3>The Life I Deserve</h3><!-- /wp:heading --><!-- wp:paragraph --><p>August 1 -- December 1</p><!-- /wp:paragraph --><!-- wp:button {\"className\":\"is-style-outline\"} --><div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link\" href=\"https://make.wordpress.org/core/2019/09/27/block-editor-theme-related-updates-in-wordpress-5-3/\">Read More</a></div><!-- /wp:button --></div></div><!-- /wp:group --><!-- wp:group --><div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"align\":\"full\",\"id\":37,\"sizeSlug\":\"full\"} --><figure class=\"wp-block-image alignfull size-full\"><img src=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-three-quarters-4.png\" alt=\"\" class=\"wp-image-37\"/></figure><!-- /wp:image --><!-- wp:heading {\"level\":3} --><h3>From Signac to Matisse</h3><!-- /wp:heading --><!-- wp:paragraph --><p>October 1 -- December 1</p><!-- /wp:paragraph --><!-- wp:button {\"className\":\"is-style-outline\"} --><div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link\" href=\"https://make.wordpress.org/core/2019/09/27/block-editor-theme-related-updates-in-wordpress-5-3/\">Read More</a></div><!-- /wp:button --></div></div><!-- /wp:group --></div><!-- /wp:column --></div><!-- /wp:columns --><!-- wp:image {\"align\":\"full\",\"id\":37,\"sizeSlug\":\"full\"} --><figure class=\"wp-block-image alignfull size-full\"><img src=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-landscape-2.png\" alt=\"\" class=\"wp-image-37\"/></figure><!-- /wp:image --><!-- wp:group {\"align\":\"wide\"} --><div class=\"wp-block-group alignwide\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\",\"textColor\":\"accent\"} --><h2 class=\"has-accent-color has-text-align-center\">”Cyborgs, as the philosopher Donna Haraway established, are not reverent. They do not remember the cosmos.”</h2><!-- /wp:heading --></div></div><!-- /wp:group --><!-- wp:paragraph {\"dropCap\":true} --><p class=\"has-drop-cap\">With seven floors of striking architecture, UMoMA shows exhibitions of international contemporary art, sometimes along with art historical retrospectives. Existential, political and philosophical issues are intrinsic to our programme. As visitor you are invited to guided tours artist talks, lectures, film screenings and other events with free admission</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>The exhibitions are produced by UMoMA in collaboration with artists and museums around the world and they often attract international attention. UMoMA has received a Special Commendation from the European Museum of the Year, and was among the top candidates for the Swedish Museum of the Year Award as well as for the Council of Europe Museum Prize.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p></p><!-- /wp:paragraph --><!-- wp:group {\"customBackgroundColor\":\"#ffffff\",\"align\":\"wide\"} --><div class=\"wp-block-group alignwide has-background\" style=\"background-color:#ffffff\"><div class=\"wp-block-group__inner-container\"><!-- wp:group --><div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\"} --><h2 class=\"has-text-align-center\">Become a Member and Get Exclusive Offers!</h2><!-- /wp:heading --><!-- wp:paragraph {\"align\":\"center\"} --><p class=\"has-text-align-center\">Members get access to exclusive exhibits and sales. Our memberships cost $99.99 and are billed annually.</p><!-- /wp:paragraph --><!-- wp:button {\"align\":\"center\"} --><div class=\"wp-block-button aligncenter\"><a class=\"wp-block-button__link\" href=\"https://make.wordpress.org/core/2019/09/27/block-editor-theme-related-updates-in-wordpress-5-3/\">Join the Club</a></div><!-- /wp:button --></div></div><!-- /wp:group --></div></div><!-- /wp:group --><!-- wp:gallery {\"ids\":[39,38],\"align\":\"wide\"} --><figure class=\"wp-block-gallery alignwide columns-2 is-cropped\"><ul class=\"blocks-gallery-grid\"><li class=\"blocks-gallery-item\"><figure><img src=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-square-2.png\" alt=\"\" data-id=\"39\" data-full-url=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-square-2.png\" data-link=\"assets/images/2020-square-2/\" class=\"wp-image-39\"/></figure></li><li class=\"blocks-gallery-item\"><figure><img src=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-square-1.png\" alt=\"\" data-id=\"38\" data-full-url=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-square-1.png\" data-link=\"http://www.rhodeislandliquors.dev.cc/wp-content/themes/twentytwenty/assets/images/2020-square-1/\" class=\"wp-image-38\"/></figure></li></ul></figure><!-- /wp:gallery -->', 'The New UMoMA Opens its Doors', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2020-02-05 10:05:34', '0000-00-00 00:00:00', '', 0, 'http://www.rhodeislandliquors.dev.cc/?page_id=24', 0, 'page', '', 0),
(25, 1, '2020-02-05 10:05:34', '0000-00-00 00:00:00', '<!-- wp:paragraph -->\n<p>You might be an artist who would like to introduce yourself and your work here or maybe you&rsquo;re a business with a mission to describe.</p>\n<!-- /wp:paragraph -->', 'About', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2020-02-05 10:05:34', '0000-00-00 00:00:00', '', 0, 'http://www.rhodeislandliquors.dev.cc/?page_id=25', 0, 'page', '', 0),
(26, 1, '2020-02-05 10:05:34', '0000-00-00 00:00:00', '<!-- wp:paragraph -->\n<p>This is a page with some basic contact information, such as an address and phone number. You might also try a plugin to add a contact form.</p>\n<!-- /wp:paragraph -->', 'Contact', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2020-02-05 10:05:34', '0000-00-00 00:00:00', '', 0, 'http://www.rhodeislandliquors.dev.cc/?page_id=26', 0, 'page', '', 0),
(27, 1, '2020-02-05 10:05:34', '0000-00-00 00:00:00', '', 'Blog', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2020-02-05 10:05:34', '0000-00-00 00:00:00', '', 0, 'http://www.rhodeislandliquors.dev.cc/?page_id=27', 0, 'page', '', 0),
(28, 1, '2020-02-05 10:05:34', '0000-00-00 00:00:00', '{\n    \"widget_text[4]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"encoded_serialized_instance\": \"YTo0OntzOjU6InRpdGxlIjtzOjE1OiJBYm91dCBUaGlzIFNpdGUiO3M6NDoidGV4dCI7czo4NToiVGhpcyBtYXkgYmUgYSBnb29kIHBsYWNlIHRvIGludHJvZHVjZSB5b3Vyc2VsZiBhbmQgeW91ciBzaXRlIG9yIGluY2x1ZGUgc29tZSBjcmVkaXRzLiI7czo2OiJmaWx0ZXIiO2I6MTtzOjY6InZpc3VhbCI7YjoxO30=\",\n            \"title\": \"About This Site\",\n            \"is_widget_customizer_js_value\": true,\n            \"instance_hash_key\": \"ceafc8b19a217b51f49bee3f6856347f\"\n        },\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 10:05:34\"\n    },\n    \"sidebars_widgets[sidebar-1]\": {\n        \"starter_content\": true,\n        \"value\": [\n            \"text-4\"\n        ],\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 10:05:34\"\n    },\n    \"widget_text[5]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"encoded_serialized_instance\": \"YTo0OntzOjU6InRpdGxlIjtzOjc6IkZpbmQgVXMiO3M6NDoidGV4dCI7czoxNjg6IjxzdHJvbmc+QWRkcmVzczwvc3Ryb25nPgoxMjMgTWFpbiBTdHJlZXQKTmV3IFlvcmssIE5ZIDEwMDAxCgo8c3Ryb25nPkhvdXJzPC9zdHJvbmc+Ck1vbmRheSZtZGFzaDtGcmlkYXk6IDk6MDBBTSZuZGFzaDs1OjAwUE0KU2F0dXJkYXkgJmFtcDsgU3VuZGF5OiAxMTowMEFNJm5kYXNoOzM6MDBQTSI7czo2OiJmaWx0ZXIiO2I6MTtzOjY6InZpc3VhbCI7YjoxO30=\",\n            \"title\": \"Find Us\",\n            \"is_widget_customizer_js_value\": true,\n            \"instance_hash_key\": \"f9ef2d44646a201ee17763bcea85e6ef\"\n        },\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 10:05:34\"\n    },\n    \"sidebars_widgets[sidebar-2]\": {\n        \"starter_content\": true,\n        \"value\": [\n            \"text-5\"\n        ],\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 10:05:34\"\n    },\n    \"nav_menus_created_posts\": {\n        \"starter_content\": true,\n        \"value\": [\n            23,\n            24,\n            25,\n            26,\n            27\n        ],\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 10:05:34\"\n    },\n    \"nav_menu[-1]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"name\": \"Primary\"\n        },\n        \"type\": \"nav_menu\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 10:05:34\"\n    },\n    \"nav_menu_item[-1]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"custom\",\n            \"title\": \"Home\",\n            \"url\": \"http://www.rhodeislandliquors.dev.cc/\",\n            \"position\": 0,\n            \"nav_menu_term_id\": -1,\n            \"object_id\": 0\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 10:05:34\"\n    },\n    \"nav_menu_item[-2]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"post_type\",\n            \"object\": \"page\",\n            \"object_id\": 25,\n            \"position\": 1,\n            \"nav_menu_term_id\": -1,\n            \"title\": \"About\"\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 10:05:34\"\n    },\n    \"nav_menu_item[-3]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"post_type\",\n            \"object\": \"page\",\n            \"object_id\": 27,\n            \"position\": 2,\n            \"nav_menu_term_id\": -1,\n            \"title\": \"Blog\"\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 10:05:34\"\n    },\n    \"nav_menu_item[-4]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"post_type\",\n            \"object\": \"page\",\n            \"object_id\": 26,\n            \"position\": 3,\n            \"nav_menu_term_id\": -1,\n            \"title\": \"Contact\"\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 10:05:34\"\n    },\n    \"twentytwenty::nav_menu_locations[primary]\": {\n        \"starter_content\": true,\n        \"value\": -1,\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 10:05:34\"\n    },\n    \"nav_menu[-5]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"name\": \"Primary\"\n        },\n        \"type\": \"nav_menu\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 10:05:34\"\n    },\n    \"nav_menu_item[-5]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"custom\",\n            \"title\": \"Home\",\n            \"url\": \"http://www.rhodeislandliquors.dev.cc/\",\n            \"position\": 0,\n            \"nav_menu_term_id\": -5,\n            \"object_id\": 0\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 10:05:34\"\n    },\n    \"nav_menu_item[-6]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"post_type\",\n            \"object\": \"page\",\n            \"object_id\": 25,\n            \"position\": 1,\n            \"nav_menu_term_id\": -5,\n            \"title\": \"About\"\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 10:05:34\"\n    },\n    \"nav_menu_item[-7]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"post_type\",\n            \"object\": \"page\",\n            \"object_id\": 27,\n            \"position\": 2,\n            \"nav_menu_term_id\": -5,\n            \"title\": \"Blog\"\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 10:05:34\"\n    },\n    \"nav_menu_item[-8]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"type\": \"post_type\",\n            \"object\": \"page\",\n            \"object_id\": 26,\n            \"position\": 3,\n            \"nav_menu_term_id\": -5,\n            \"title\": \"Contact\"\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 10:05:34\"\n    },\n    \"twentytwenty::nav_menu_locations[expanded]\": {\n        \"starter_content\": true,\n        \"value\": -5,\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 10:05:34\"\n    },\n    \"nav_menu[-9]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"name\": \"Social Links Menu\"\n        },\n        \"type\": \"nav_menu\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 10:05:34\"\n    },\n    \"nav_menu_item[-9]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"title\": \"Yelp\",\n            \"url\": \"https://www.yelp.com\",\n            \"position\": 0,\n            \"nav_menu_term_id\": -9,\n            \"object_id\": 0\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 10:05:34\"\n    },\n    \"nav_menu_item[-10]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"title\": \"Facebook\",\n            \"url\": \"https://www.facebook.com/wordpress\",\n            \"position\": 1,\n            \"nav_menu_term_id\": -9,\n            \"object_id\": 0\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 10:05:34\"\n    },\n    \"nav_menu_item[-11]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"title\": \"Twitter\",\n            \"url\": \"https://twitter.com/wordpress\",\n            \"position\": 2,\n            \"nav_menu_term_id\": -9,\n            \"object_id\": 0\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 10:05:34\"\n    },\n    \"nav_menu_item[-12]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"title\": \"Instagram\",\n            \"url\": \"https://www.instagram.com/explore/tags/wordcamp/\",\n            \"position\": 3,\n            \"nav_menu_term_id\": -9,\n            \"object_id\": 0\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 10:05:34\"\n    },\n    \"nav_menu_item[-13]\": {\n        \"starter_content\": true,\n        \"value\": {\n            \"title\": \"Email\",\n            \"url\": \"mailto:wordpress@example.com\",\n            \"position\": 4,\n            \"nav_menu_term_id\": -9,\n            \"object_id\": 0\n        },\n        \"type\": \"nav_menu_item\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 10:05:34\"\n    },\n    \"twentytwenty::nav_menu_locations[social]\": {\n        \"starter_content\": true,\n        \"value\": -9,\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 10:05:34\"\n    },\n    \"show_on_front\": {\n        \"starter_content\": true,\n        \"value\": \"page\",\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 10:05:34\"\n    },\n    \"page_on_front\": {\n        \"starter_content\": true,\n        \"value\": 24,\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 10:05:34\"\n    },\n    \"page_for_posts\": {\n        \"starter_content\": true,\n        \"value\": 27,\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 10:05:34\"\n    }\n}', '', '', 'auto-draft', 'closed', 'closed', '', '01a5836a-cb5c-4282-93da-67f80803a05e', '', '', '2020-02-05 10:05:34', '0000-00-00 00:00:00', '', 0, 'http://www.rhodeislandliquors.dev.cc/?p=28', 0, 'customize_changeset', '', 0),
(30, 1, '2020-02-05 10:27:08', '2020-02-05 10:27:08', '{\n    \"old_sidebars_widgets_data\": {\n        \"value\": {\n            \"wp_inactive_widgets\": [\n                \"text-2\",\n                \"text-3\"\n            ],\n            \"sidebar-1\": [\n                \"search-2\",\n                \"recent-posts-2\",\n                \"recent-comments-2\",\n                \"archives-2\",\n                \"categories-2\",\n                \"meta-2\"\n            ],\n            \"sidebar-2\": [],\n            \"sidebar-3\": []\n        },\n        \"type\": \"global_variable\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-02-05 10:27:08\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', '85646952-bcc6-4061-acb6-a3aff0eb5511', '', '', '2020-02-05 10:27:08', '2020-02-05 10:27:08', '', 0, 'http://www.rhodeislandliquors.dev.cc/2020/02/05/85646952-bcc6-4061-acb6-a3aff0eb5511/', 0, 'customize_changeset', '', 0),
(31, 1, '2020-02-05 11:27:48', '2020-02-05 11:27:48', '<label> Your Name (required)\n    [text* your-name] </label>\n\n<label> Your Email (required)\n    [email* your-email] </label>\n\n<label> Subject\n    [text your-subject] </label>\n\n<label> Your Message\n    [textarea your-message] </label>\n\n[submit \"Send\"]\nRhode Island Liquors \"[your-subject]\"\nRhode Island Liquors <wordpress@rhodeislandliquors.dev.cc>\nFrom: [your-name] <[your-email]>\nSubject: [your-subject]\n\nMessage Body:\n[your-message]\n\n-- \nThis e-mail was sent from a contact form on Rhode Island Liquors (http://www.rhodeislandliquors.dev.cc)\nbinephrem@gmail.com\nReply-To: [your-email]\n\n0\n0\n\nRhode Island Liquors \"[your-subject]\"\nRhode Island Liquors <wordpress@rhodeislandliquors.dev.cc>\nMessage Body:\n[your-message]\n\n-- \nThis e-mail was sent from a contact form on Rhode Island Liquors (http://www.rhodeislandliquors.dev.cc)\n[your-email]\nReply-To: binephrem@gmail.com\n\n0\n0\nThank you for your message. It has been sent.\nThere was an error trying to send your message. Please try again later.\nOne or more fields have an error. Please check and try again.\nThere was an error trying to send your message. Please try again later.\nYou must accept the terms and conditions before sending your message.\nThe field is required.\nThe field is too long.\nThe field is too short.', 'Contact form 1', '', 'publish', 'closed', 'closed', '', 'contact-form-1', '', '', '2020-02-05 11:27:48', '2020-02-05 11:27:48', '', 0, 'http://www.rhodeislandliquors.dev.cc/?post_type=wpcf7_contact_form&p=31', 0, 'wpcf7_contact_form', '', 0),
(32, 1, '2020-02-05 11:27:49', '2020-02-05 11:27:49', '', 'woocommerce-placeholder', '', 'inherit', 'open', 'closed', '', 'woocommerce-placeholder', '', '', '2020-02-05 11:27:49', '2020-02-05 11:27:49', '', 0, 'http://www.rhodeislandliquors.dev.cc/wp-content/uploads/2020/02/woocommerce-placeholder.png', 0, 'attachment', 'image/png', 0),
(33, 1, '2020-02-05 11:28:18', '2020-02-05 11:28:18', '[yith_wcwl_wishlist]', 'Wishlist', '', 'publish', 'closed', 'closed', '', 'wishlist', '', '', '2020-02-05 11:28:18', '2020-02-05 11:28:18', '', 0, 'http://www.rhodeislandliquors.dev.cc/wishlist/', 0, 'page', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_revslider_css`
--

CREATE TABLE `wp_revslider_css` (
  `id` int(9) NOT NULL,
  `handle` text COLLATE utf8_unicode_ci NOT NULL,
  `settings` longtext COLLATE utf8_unicode_ci,
  `hover` longtext COLLATE utf8_unicode_ci,
  `advanced` longtext COLLATE utf8_unicode_ci,
  `params` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wp_revslider_css`
--

INSERT INTO `wp_revslider_css` (`id`, `handle`, `settings`, `hover`, `advanced`, `params`) VALUES
(1, '.tp-caption.medium_grey', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":{\"position\":\"absolute\",\"text-shadow\":\"0px 2px 5px rgba(0, 0, 0, 0.5)\",\"white-space\":\"nowrap\"},\"hover\":\"\"}', '{\"color\":\"#fff\",\"font-weight\":\"700\",\"font-size\":\"20px\",\"line-height\":\"20px\",\"font-family\":\"Arial\",\"padding\":\"2px 4px\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\",\"background-color\":\"#888\"}'),
(2, '.tp-caption.small_text', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":{\"position\":\"absolute\",\"text-shadow\":\"0px 2px 5px rgba(0, 0, 0, 0.5)\",\"white-space\":\"nowrap\"},\"hover\":\"\"}', '{\"color\":\"#fff\",\"font-weight\":\"700\",\"font-size\":\"14px\",\"line-height\":\"20px\",\"font-family\":\"Arial\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\"}'),
(3, '.tp-caption.medium_text', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":{\"position\":\"absolute\",\"text-shadow\":\"0px 2px 5px rgba(0, 0, 0, 0.5)\",\"white-space\":\"nowrap\"},\"hover\":\"\"}', '{\"color\":\"#fff\",\"font-weight\":\"700\",\"font-size\":\"20px\",\"line-height\":\"20px\",\"font-family\":\"Arial\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\"}'),
(4, '.tp-caption.large_text', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":{\"position\":\"absolute\",\"text-shadow\":\"0px 2px 5px rgba(0, 0, 0, 0.5)\",\"white-space\":\"nowrap\"},\"hover\":\"\"}', '{\"color\":\"#fff\",\"font-weight\":\"700\",\"font-size\":\"40px\",\"line-height\":\"40px\",\"font-family\":\"Arial\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\"}'),
(5, '.tp-caption.very_large_text', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":{\"position\":\"absolute\",\"text-shadow\":\"0px 2px 5px rgba(0, 0, 0, 0.5)\",\"white-space\":\"nowrap\",\"letter-spacing\":\"-2px\"},\"hover\":\"\"}', '{\"color\":\"#fff\",\"font-weight\":\"700\",\"font-size\":\"60px\",\"line-height\":\"60px\",\"font-family\":\"Arial\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\"}'),
(6, '.tp-caption.very_big_white', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":{\"position\":\"absolute\",\"text-shadow\":\"none\",\"white-space\":\"nowrap\",\"padding-top\":\"1px\"},\"hover\":\"\"}', '{\"color\":\"#fff\",\"font-weight\":\"800\",\"font-size\":\"60px\",\"line-height\":\"60px\",\"font-family\":\"Arial\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\",\"padding\":\"0px 4px\",\"background-color\":\"#000\"}'),
(7, '.tp-caption.very_big_black', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":{\"position\":\"absolute\",\"text-shadow\":\"none\",\"white-space\":\"nowrap\",\"padding-top\":\"1px\"},\"hover\":\"\"}', '{\"color\":\"#000\",\"font-weight\":\"700\",\"font-size\":\"60px\",\"line-height\":\"60px\",\"font-family\":\"Arial\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\",\"padding\":\"0px 4px\",\"background-color\":\"#fff\"}'),
(8, '.tp-caption.modern_medium_fat', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":{\"position\":\"absolute\",\"text-shadow\":\"none\",\"white-space\":\"nowrap\"},\"hover\":\"\"}', '{\"color\":\"#000\",\"font-weight\":\"800\",\"font-size\":\"24px\",\"line-height\":\"20px\",\"font-family\":\"\\\"Open Sans\\\", sans-serif\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\"}'),
(9, '.tp-caption.modern_medium_fat_white', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":{\"position\":\"absolute\",\"text-shadow\":\"none\",\"white-space\":\"nowrap\"},\"hover\":\"\"}', '{\"color\":\"#fff\",\"font-weight\":\"800\",\"font-size\":\"24px\",\"line-height\":\"20px\",\"font-family\":\"\\\"Open Sans\\\", sans-serif\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\"}'),
(10, '.tp-caption.modern_medium_light', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":{\"position\":\"absolute\",\"text-shadow\":\"none\",\"white-space\":\"nowrap\"},\"hover\":\"\"}', '{\"color\":\"#000\",\"font-weight\":\"300\",\"font-size\":\"24px\",\"line-height\":\"20px\",\"font-family\":\"\\\"Open Sans\\\", sans-serif\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\"}'),
(11, '.tp-caption.modern_big_bluebg', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":{\"position\":\"absolute\",\"text-shadow\":\"none\",\"letter-spacing\":\"0\"},\"hover\":\"\"}', '{\"color\":\"#fff\",\"font-weight\":\"800\",\"font-size\":\"30px\",\"line-height\":\"36px\",\"font-family\":\"\\\"Open Sans\\\", sans-serif\",\"padding\":\"3px 10px\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\",\"background-color\":\"#4e5b6c\"}'),
(12, '.tp-caption.modern_big_redbg', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":{\"position\":\"absolute\",\"text-shadow\":\"none\",\"padding-top\":\"1px\",\"letter-spacing\":\"0\"},\"hover\":\"\"}', '{\"color\":\"#fff\",\"font-weight\":\"300\",\"font-size\":\"30px\",\"line-height\":\"36px\",\"font-family\":\"\\\"Open Sans\\\", sans-serif\",\"padding\":\"3px 10px\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\",\"background-color\":\"#de543e\"}'),
(13, '.tp-caption.modern_small_text_dark', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":{\"position\":\"absolute\",\"text-shadow\":\"none\",\"white-space\":\"nowrap\"},\"hover\":\"\"}', '{\"color\":\"#555\",\"font-size\":\"14px\",\"line-height\":\"22px\",\"font-family\":\"Arial\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\"}'),
(14, '.tp-caption.boxshadow', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":{\"-moz-box-shadow\":\"0px 0px 20px rgba(0, 0, 0, 0.5)\",\"-webkit-box-shadow\":\"0px 0px 20px rgba(0, 0, 0, 0.5)\",\"box-shadow\":\"0px 0px 20px rgba(0, 0, 0, 0.5)\"},\"hover\":\"\"}', '[]'),
(15, '.tp-caption.black', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":{\"text-shadow\":\"none\"},\"hover\":\"\"}', '{\"color\":\"#000\"}'),
(16, '.tp-caption.noshadow', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":{\"text-shadow\":\"none\"},\"hover\":\"\"}', '[]'),
(17, '.tp-caption.thinheadline_dark', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":{\"position\":\"absolute\",\"text-shadow\":\"none\"},\"hover\":\"\"}', '{\"color\":\"rgba(0,0,0,0.85)\",\"font-weight\":\"300\",\"font-size\":\"30px\",\"line-height\":\"30px\",\"font-family\":\"\\\"Open Sans\\\"\",\"background-color\":\"transparent\"}'),
(18, '.tp-caption.thintext_dark', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":{\"position\":\"absolute\",\"text-shadow\":\"none\"},\"hover\":\"\"}', '{\"color\":\"rgba(0,0,0,0.85)\",\"font-weight\":\"300\",\"font-size\":\"16px\",\"line-height\":\"26px\",\"font-family\":\"\\\"Open Sans\\\"\",\"background-color\":\"transparent\"}'),
(19, '.tp-caption.largeblackbg', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":{\"position\":\"absolute\",\"text-shadow\":\"none\",\"-webkit-border-radius\":\"0px\",\"-moz-border-radius\":\"0px\"},\"hover\":\"\"}', '{\"color\":\"#fff\",\"font-weight\":\"300\",\"font-size\":\"50px\",\"line-height\":\"70px\",\"font-family\":\"\\\"Open Sans\\\"\",\"background-color\":\"#000\",\"padding\":\"0px 20px\",\"border-radius\":\"0px\"}'),
(20, '.tp-caption.largepinkbg', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":{\"position\":\"absolute\",\"text-shadow\":\"none\",\"-webkit-border-radius\":\"0px\",\"-moz-border-radius\":\"0px\"},\"hover\":\"\"}', '{\"color\":\"#fff\",\"font-weight\":\"300\",\"font-size\":\"50px\",\"line-height\":\"70px\",\"font-family\":\"\\\"Open Sans\\\"\",\"background-color\":\"#db4360\",\"padding\":\"0px 20px\",\"border-radius\":\"0px\"}'),
(21, '.tp-caption.largewhitebg', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":{\"position\":\"absolute\",\"text-shadow\":\"none\",\"-webkit-border-radius\":\"0px\",\"-moz-border-radius\":\"0px\"},\"hover\":\"\"}', '{\"color\":\"#000\",\"font-weight\":\"300\",\"font-size\":\"50px\",\"line-height\":\"70px\",\"font-family\":\"\\\"Open Sans\\\"\",\"background-color\":\"#fff\",\"padding\":\"0px 20px\",\"border-radius\":\"0px\"}'),
(22, '.tp-caption.largegreenbg', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":{\"position\":\"absolute\",\"text-shadow\":\"none\",\"-webkit-border-radius\":\"0px\",\"-moz-border-radius\":\"0px\"},\"hover\":\"\"}', '{\"color\":\"#fff\",\"font-weight\":\"300\",\"font-size\":\"50px\",\"line-height\":\"70px\",\"font-family\":\"\\\"Open Sans\\\"\",\"background-color\":\"#67ae73\",\"padding\":\"0px 20px\",\"border-radius\":\"0px\"}'),
(23, '.tp-caption.excerpt', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":{\"text-shadow\":\"none\",\"letter-spacing\":\"-1.5px\",\"width\":\"150px\",\"white-space\":\"normal !important\",\"height\":\"auto\"},\"hover\":\"\"}', '{\"font-size\":\"36px\",\"line-height\":\"36px\",\"font-weight\":\"700\",\"font-family\":\"Arial\",\"color\":\"#ffffff\",\"text-decoration\":\"none\",\"background-color\":\"rgba(0, 0, 0, 1)\",\"margin\":\"0px\",\"padding\":\"1px 4px 0px 4px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 255, 255)\",\"border-style\":\"none\"}'),
(24, '.tp-caption.large_bold_grey', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":{\"text-shadow\":\"none\"},\"hover\":\"\"}', '{\"font-size\":\"60px\",\"line-height\":\"60px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(102, 102, 102)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"margin\":\"0px\",\"padding\":\"1px 4px 0px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(25, '.tp-caption.medium_thin_grey', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":{\"text-shadow\":\"none\"},\"hover\":\"\"}', '{\"font-size\":\"34px\",\"line-height\":\"30px\",\"font-weight\":\"300\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(102, 102, 102)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"padding\":\"1px 4px 0px\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(26, '.tp-caption.small_thin_grey', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":{\"text-shadow\":\"none\"},\"hover\":\"\"}', '{\"font-size\":\"18px\",\"line-height\":\"26px\",\"font-weight\":\"300\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(117, 117, 117)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"padding\":\"1px 4px 0px\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(27, '.tp-caption.lightgrey_divider', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":{\"width\":\"370px\",\"height\":\"3px\",\"background-position\":\"initial initial\",\"background-repeat\":\"initial initial\"},\"hover\":\"\"}', '{\"text-decoration\":\"none\",\"background-color\":\"rgba(235, 235, 235, 1)\",\"border-width\":\"0px\",\"border-color\":\"rgb(34, 34, 34)\",\"border-style\":\"none\"}'),
(28, '.tp-caption.large_bold_darkblue', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":[],\"hover\":\"\"}', '{\"font-size\":\"58px\",\"line-height\":\"60px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(52, 73, 94)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(29, '.tp-caption.medium_bg_darkblue', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":[],\"hover\":\"\"}', '{\"font-size\":\"20px\",\"line-height\":\"20px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(255, 255, 255)\",\"text-decoration\":\"none\",\"background-color\":\"rgb(52, 73, 94)\",\"padding\":\"10px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(30, '.tp-caption.medium_bold_red', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":[],\"hover\":\"\"}', '{\"font-size\":\"24px\",\"line-height\":\"30px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(227, 58, 12)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"padding\":\"0px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(31, '.tp-caption.medium_light_red', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":[],\"hover\":\"\"}', '{\"font-size\":\"21px\",\"line-height\":\"26px\",\"font-weight\":\"300\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(227, 58, 12)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"padding\":\"0px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(32, '.tp-caption.medium_bg_red', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":[],\"hover\":\"\"}', '{\"font-size\":\"20px\",\"line-height\":\"20px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(255, 255, 255)\",\"text-decoration\":\"none\",\"background-color\":\"rgb(227, 58, 12)\",\"padding\":\"10px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(33, '.tp-caption.medium_bold_orange', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":[],\"hover\":\"\"}', '{\"font-size\":\"24px\",\"line-height\":\"30px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(243, 156, 18)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(34, '.tp-caption.medium_bg_orange', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":[],\"hover\":\"\"}', '{\"font-size\":\"20px\",\"line-height\":\"20px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(255, 255, 255)\",\"text-decoration\":\"none\",\"background-color\":\"rgb(243, 156, 18)\",\"padding\":\"10px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(35, '.tp-caption.grassfloor', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":{\"width\":\"4000px\",\"height\":\"150px\"},\"hover\":\"\"}', '{\"text-decoration\":\"none\",\"background-color\":\"rgba(160, 179, 151, 1)\",\"border-width\":\"0px\",\"border-color\":\"rgb(34, 34, 34)\",\"border-style\":\"none\"}'),
(36, '.tp-caption.large_bold_white', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":[],\"hover\":\"\"}', '{\"font-size\":\"58px\",\"line-height\":\"60px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(255, 255, 255)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(37, '.tp-caption.medium_light_white', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":[],\"hover\":\"\"}', '{\"font-size\":\"30px\",\"line-height\":\"36px\",\"font-weight\":\"300\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(255, 255, 255)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"padding\":\"0px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(38, '.tp-caption.mediumlarge_light_white', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":[],\"hover\":\"\"}', '{\"font-size\":\"34px\",\"line-height\":\"40px\",\"font-weight\":\"300\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(255, 255, 255)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"padding\":\"0px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(39, '.tp-caption.mediumlarge_light_white_center', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":[],\"hover\":\"\"}', '{\"font-size\":\"34px\",\"line-height\":\"40px\",\"font-weight\":\"300\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"#ffffff\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"padding\":\"0px 0px 0px 0px\",\"text-align\":\"center\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(40, '.tp-caption.medium_bg_asbestos', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":[],\"hover\":\"\"}', '{\"font-size\":\"20px\",\"line-height\":\"20px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(255, 255, 255)\",\"text-decoration\":\"none\",\"background-color\":\"rgb(127, 140, 141)\",\"padding\":\"10px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(41, '.tp-caption.medium_light_black', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":[],\"hover\":\"\"}', '{\"font-size\":\"30px\",\"line-height\":\"36px\",\"font-weight\":\"300\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(0, 0, 0)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"padding\":\"0px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(42, '.tp-caption.large_bold_black', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":[],\"hover\":\"\"}', '{\"font-size\":\"58px\",\"line-height\":\"60px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(0, 0, 0)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(43, '.tp-caption.mediumlarge_light_darkblue', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":[],\"hover\":\"\"}', '{\"font-size\":\"34px\",\"line-height\":\"40px\",\"font-weight\":\"300\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(52, 73, 94)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"padding\":\"0px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(44, '.tp-caption.small_light_white', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":[],\"hover\":\"\"}', '{\"font-size\":\"17px\",\"line-height\":\"28px\",\"font-weight\":\"300\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(255, 255, 255)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"padding\":\"0px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(45, '.tp-caption.roundedimage', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":[],\"hover\":\"\"}', '{\"border-width\":\"0px\",\"border-color\":\"rgb(34, 34, 34)\",\"border-style\":\"none\"}'),
(46, '.tp-caption.large_bg_black', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":[],\"hover\":\"\"}', '{\"font-size\":\"40px\",\"line-height\":\"40px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(255, 255, 255)\",\"text-decoration\":\"none\",\"background-color\":\"rgb(0, 0, 0)\",\"padding\":\"10px 20px 15px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(47, '.tp-caption.mediumwhitebg', '{\"translated\":5,\"type\":\"text\",\"version\":\"4\"}', 'null', '{\"idle\":{\"text-shadow\":\"none\"},\"hover\":\"\"}', '{\"font-size\":\"30px\",\"line-height\":\"30px\",\"font-weight\":\"300\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(0, 0, 0)\",\"text-decoration\":\"none\",\"background-color\":\"rgb(255, 255, 255)\",\"padding\":\"5px 15px 10px\",\"border-width\":\"0px\",\"border-color\":\"rgb(0, 0, 0)\",\"border-style\":\"none\"}'),
(48, '.tp-caption.MarkerDisplay', '{\"translated\":5,\"type\":\"text\",\"version\":\"5.0\"}', '{\"color\":\"#ff0000\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0px\",\"0px\",\"0px\",\"0px\"],\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\"}', '{\"idle\":{\"text-shadow\":\"none\"},\"hover\":\"\"}', '{\"font-style\":\"normal\",\"font-family\":\"Permanent Marker\",\"padding\":\"0px 0px 0px 0px\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"#000000\",\"border-style\":\"none\",\"border-width\":\"0px\",\"border-radius\":\"0px 0px 0px 0px\",\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}'),
(49, '.tp-caption.Restaurant-Display', '{\"hover\":\"false\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\"}', '{\"idle\":\"\",\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"font-size\":\"120px\",\"line-height\":\"120px\",\"font-weight\":\"700\",\"font-style\":\"normal\",\"font-family\":\"Roboto\",\"padding\":[\"0\",\"0\",\"0\",\"0\"],\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}'),
(50, '.tp-caption.Restaurant-Cursive', '{\"hover\":\"false\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\"}', '{\"idle\":{\"letter-spacing\":\"2px\"},\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"font-size\":\"30px\",\"line-height\":\"30px\",\"font-weight\":\"400\",\"font-style\":\"normal\",\"font-family\":\"Nothing you could do\",\"padding\":[\"0\",\"0\",\"0\",\"0\"],\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}'),
(51, '.tp-caption.Restaurant-ScrollDownText', '{\"hover\":\"false\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\"}', '{\"idle\":{\"letter-spacing\":\"2px\"},\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"font-size\":\"17px\",\"line-height\":\"17px\",\"font-weight\":\"400\",\"font-style\":\"normal\",\"font-family\":\"Roboto\",\"padding\":[\"0\",\"0\",\"0\",\"0\"],\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}'),
(52, '.tp-caption.Restaurant-Description', '{\"hover\":\"false\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\"}', '{\"idle\":{\"letter-spacing\":\"3px\"},\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"font-size\":\"20px\",\"line-height\":\"30px\",\"font-weight\":\"300\",\"font-style\":\"normal\",\"font-family\":\"Roboto\",\"padding\":[\"0\",\"0\",\"0\",\"0\"],\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}'),
(53, '.tp-caption.Restaurant-Price', '{\"hover\":\"false\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\"}', '{\"idle\":{\"letter-spacing\":\"3px\"},\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"font-size\":\"30px\",\"line-height\":\"30px\",\"font-weight\":\"300\",\"font-style\":\"normal\",\"font-family\":\"Roboto\",\"padding\":[\"0\",\"0\",\"0\",\"0\"],\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}'),
(54, '.tp-caption.Restaurant-Menuitem', '{\"hover\":\"false\",\"type\":\"text\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#000000\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"#ffffff\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"pointer\",\"speed\":\"500\",\"easing\":\"Power2.easeInOut\"}', '{\"idle\":{\"letter-spacing\":\"2px\"},\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"17px\",\"line-height\":\"17px\",\"font-weight\":\"400\",\"font-style\":\"normal\",\"font-family\":\"Roboto\",\"padding\":[\"10px\",\"30px\",\"10px\",\"30px\"],\"text-decoration\":\"none\",\"text-align\":\"left\",\"background-color\":\"#000000\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\",\"corner_left\":\"nothing\",\"corner_right\":\"nothing\",\"parallax\":\"-\"}'),
(55, '.tp-caption.Furniture-LogoText', '{\"hover\":\"false\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":{\"text-shadow\":\"none\"},\"hover\":\"\"}', '{\"color\":\"#e6cfa3\",\"color-transparency\":\"1\",\"font-size\":\"160px\",\"line-height\":\"150px\",\"font-weight\":\"300\",\"font-style\":\"normal\",\"font-family\":\"\\\"Raleway\\\"\",\"padding\":[\"0\",\"0\",\"0\",\"0\"],\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}'),
(56, '.tp-caption.Furniture-Plus', '{\"hover\":\"false\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"#000000\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"30px\",\"30px\",\"30px\",\"30px\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"speed\":\"0.5\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":{\"text-shadow\":\"none\",\"box-shadow\":\"rgba(0,0,0,0.1) 0 1px 3px\"},\"hover\":\"\"}', '{\"color\":\"#e6cfa3\",\"color-transparency\":\"1\",\"font-size\":\"20\",\"line-height\":\"20px\",\"font-weight\":\"400\",\"font-style\":\"normal\",\"font-family\":\"\\\"Raleway\\\"\",\"padding\":[\"6px\",\"7px\",\"4px\",\"7px\"],\"text-decoration\":\"none\",\"background-color\":\"#ffffff\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"30px\",\"30px\",\"30px\",\"30px\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}'),
(57, '.tp-caption.Furniture-Title', '{\"hover\":\"false\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":{\"text-shadow\":\"none\",\"letter-spacing\":\"3px\"},\"hover\":\"\"}', '{\"color\":\"#000000\",\"color-transparency\":\"1\",\"font-size\":\"20px\",\"line-height\":\"20px\",\"font-weight\":\"700\",\"font-style\":\"normal\",\"font-family\":\"\\\"Raleway\\\"\",\"padding\":[\"0\",\"0\",\"0\",\"0\"],\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}'),
(58, '.tp-caption.Furniture-Subtitle', '{\"hover\":\"false\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":{\"text-shadow\":\"none\"},\"hover\":\"\"}', '{\"color\":\"#000000\",\"color-transparency\":\"1\",\"font-size\":\"17px\",\"line-height\":\"20px\",\"font-weight\":\"300\",\"font-style\":\"normal\",\"font-family\":\"\\\"Raleway\\\"\",\"padding\":[\"0\",\"0\",\"0\",\"0\"],\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}'),
(59, '.tp-caption.Gym-Display', '{\"hover\":\"false\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":\"\",\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"80px\",\"line-height\":\"70px\",\"font-weight\":\"900\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":[\"0\",\"0\",\"0\",\"0\"],\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}'),
(60, '.tp-caption.Gym-Subline', '{\"hover\":\"false\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":{\"letter-spacing\":\"5px\"},\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"30px\",\"line-height\":\"30px\",\"font-weight\":\"100\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":[\"0\",\"0\",\"0\",\"0\"],\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}'),
(61, '.tp-caption.Gym-SmallText', '{\"hover\":\"false\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":{\"text-shadow\":\"none\"},\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"17px\",\"line-height\":\"22\",\"font-weight\":\"300\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":[\"0\",\"0\",\"0\",\"0\"],\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}'),
(62, '.tp-caption.Fashion-SmallText', '{\"hover\":\"false\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":{\"letter-spacing\":\"2px\"},\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"12px\",\"line-height\":\"20px\",\"font-weight\":\"600\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":[\"0\",\"0\",\"0\",\"0\"],\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}'),
(63, '.tp-caption.Fashion-BigDisplay', '{\"hover\":\"false\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":{\"letter-spacing\":\"2px\"},\"hover\":\"\"}', '{\"color\":\"#000000\",\"color-transparency\":\"1\",\"font-size\":\"60px\",\"line-height\":\"60px\",\"font-weight\":\"900\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":[\"0\",\"0\",\"0\",\"0\"],\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}'),
(64, '.tp-caption.Fashion-TextBlock', '{\"hover\":\"false\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":{\"letter-spacing\":\"2px\"},\"hover\":\"\"}', '{\"color\":\"#000000\",\"color-transparency\":\"1\",\"font-size\":\"20px\",\"line-height\":\"40px\",\"font-weight\":\"400\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":[\"0\",\"0\",\"0\",\"0\"],\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}'),
(65, '.tp-caption.Sports-Display', '{\"translated\":5,\"type\":\"text\",\"version\":\"5.0\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":{\"letter-spacing\":\"13px\"},\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"130px\",\"line-height\":\"130px\",\"font-weight\":\"100\",\"font-style\":\"normal\",\"font-family\":\"\\\"Raleway\\\"\",\"padding\":\"0 0 0 0\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":\"0 0 0 0\",\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}'),
(66, '.tp-caption.Sports-DisplayFat', '{\"translated\":5,\"type\":\"text\",\"version\":\"5.0\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":[\"\"],\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"130px\",\"line-height\":\"130px\",\"font-weight\":\"900\",\"font-style\":\"normal\",\"font-family\":\"\\\"Raleway\\\"\",\"padding\":\"0 0 0 0\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":\"0 0 0 0\",\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}'),
(67, '.tp-caption.Sports-Subline', '{\"translated\":5,\"type\":\"text\",\"version\":\"5.0\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":{\"letter-spacing\":\"4px\"},\"hover\":\"\"}', '{\"color\":\"#000000\",\"color-transparency\":\"1\",\"font-size\":\"32px\",\"line-height\":\"32px\",\"font-weight\":\"400\",\"font-style\":\"normal\",\"font-family\":\"\\\"Raleway\\\"\",\"padding\":\"0 0 0 0\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":\"0 0 0 0\",\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}'),
(68, '.tp-caption.Instagram-Caption', '{\"hover\":\"false\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":\"\",\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"20px\",\"line-height\":\"20px\",\"font-weight\":\"900\",\"font-style\":\"normal\",\"font-family\":\"Roboto\",\"padding\":[\"0\",\"0\",\"0\",\"0\"],\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}'),
(69, '.tp-caption.News-Title', '{\"hover\":\"false\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":\"\",\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"70px\",\"line-height\":\"60px\",\"font-weight\":\"400\",\"font-style\":\"normal\",\"font-family\":\"Roboto Slab\",\"padding\":[\"0\",\"0\",\"0\",\"0\"],\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}');
INSERT INTO `wp_revslider_css` (`id`, `handle`, `settings`, `hover`, `advanced`, `params`) VALUES
(70, '.tp-caption.News-Subtitle', '{\"hover\":\"true\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"0.65\",\"text-decoration\":\"none\",\"background-color\":\"#ffffff\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"solid\",\"border-width\":\"0px\",\"border-radius\":[\"0\",\"0\",\"0px\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"speed\":\"300\",\"easing\":\"Power3.easeInOut\"}', '{\"idle\":\"\",\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"15px\",\"line-height\":\"24px\",\"font-weight\":\"300\",\"font-style\":\"normal\",\"font-family\":\"Roboto Slab\",\"padding\":[\"0\",\"0\",\"0\",\"0\"],\"text-decoration\":\"none\",\"background-color\":\"#ffffff\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}'),
(71, '.tp-caption.Photography-Display', '{\"hover\":\"false\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":{\"letter-spacing\":\"5px\"},\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"80px\",\"line-height\":\"70px\",\"font-weight\":\"100\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":[\"0\",\"0\",\"0\",\"0\"],\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}'),
(72, '.tp-caption.Photography-Subline', '{\"hover\":\"false\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":{\"letter-spacing\":\"3px\"},\"hover\":\"\"}', '{\"color\":\"#777777\",\"color-transparency\":\"1\",\"font-size\":\"20px\",\"line-height\":\"30px\",\"font-weight\":\"300\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":[\"0\",\"0\",\"0\",\"0\"],\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}'),
(73, '.tp-caption.Photography-ImageHover', '{\"hover\":\"true\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"0.5\",\"scalex\":\"0.8\",\"scaley\":\"0.8\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"speed\":\"1000\",\"easing\":\"Power3.easeInOut\"}', '{\"idle\":\"\",\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"20\",\"line-height\":\"22\",\"font-weight\":\"400\",\"font-style\":\"normal\",\"font-family\":\"\",\"padding\":[\"0\",\"0\",\"0\",\"0\"],\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"#ffffff\",\"border-transparency\":\"0\",\"border-style\":\"none\",\"border-width\":\"0px\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}'),
(74, '.tp-caption.Photography-Menuitem', '{\"hover\":\"true\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"#00ffde\",\"background-transparency\":\"0.65\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"pointer\",\"speed\":\"200\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":{\"letter-spacing\":\"2px\"},\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"20px\",\"line-height\":\"20px\",\"font-weight\":\"300\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":[\"3px\",\"5px\",\"3px\",\"8px\"],\"text-decoration\":\"none\",\"background-color\":\"#000000\",\"background-transparency\":\"0.65\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}'),
(75, '.tp-caption.Photography-Textblock', '{\"hover\":\"false\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":{\"letter-spacing\":\"2px\"},\"hover\":\"\"}', '{\"color\":\"#fff\",\"color-transparency\":\"1\",\"font-size\":\"17px\",\"line-height\":\"30px\",\"font-weight\":\"300\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":[\"0\",\"0\",\"0\",\"0\"],\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}'),
(76, '.tp-caption.Photography-Subline-2', '{\"hover\":\"false\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"auto\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":{\"letter-spacing\":\"3px\"},\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"0.35\",\"font-size\":\"20px\",\"line-height\":\"30px\",\"font-weight\":\"300\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":[\"0\",\"0\",\"0\",\"0\"],\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}'),
(77, '.tp-caption.Photography-ImageHover2', '{\"hover\":\"true\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"0.5\",\"scalex\":\"0.8\",\"scaley\":\"0.8\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"pointer\",\"speed\":\"500\",\"easing\":\"Back.easeOut\"}', '{\"idle\":\"\",\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"20\",\"line-height\":\"22\",\"font-weight\":\"400\",\"font-style\":\"normal\",\"font-family\":\"Arial\",\"padding\":[\"0\",\"0\",\"0\",\"0\"],\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"#ffffff\",\"border-transparency\":\"0\",\"border-style\":\"none\",\"border-width\":\"0px\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}'),
(78, '.tp-caption.WebProduct-Title', '{\"hover\":\"false\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"auto\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":\"\",\"hover\":\"\"}', '{\"color\":\"#333333\",\"color-transparency\":\"1\",\"font-size\":\"90px\",\"line-height\":\"90px\",\"font-weight\":\"100\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":[\"0\",\"0\",\"0\",\"0\"],\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}'),
(79, '.tp-caption.WebProduct-SubTitle', '{\"hover\":\"false\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"auto\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":\"\",\"hover\":\"\"}', '{\"color\":\"#999999\",\"color-transparency\":\"1\",\"font-size\":\"15px\",\"line-height\":\"20px\",\"font-weight\":\"400\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":[\"0\",\"0\",\"0\",\"0\"],\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}'),
(80, '.tp-caption.WebProduct-Content', '{\"hover\":\"false\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"auto\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":\"\",\"hover\":\"\"}', '{\"color\":\"#999999\",\"color-transparency\":\"1\",\"font-size\":\"16px\",\"line-height\":\"24px\",\"font-weight\":\"600\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":[\"0\",\"0\",\"0\",\"0\"],\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\"}'),
(81, '.tp-caption.WebProduct-Menuitem', '{\"hover\":\"true\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#999999\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"#ffffff\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"pointer\",\"speed\":\"200\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":{\"letter-spacing\":\"2px\"},\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"15px\",\"line-height\":\"20px\",\"font-weight\":\"500\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":[\"3px\",\"5px\",\"3px\",\"8px\"],\"text-decoration\":\"none\",\"text-align\":\"left\",\"background-color\":\"#333333\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\",\"corner_left\":\"nothing\",\"corner_right\":\"nothing\",\"parallax\":\"-\"}'),
(82, '.tp-caption.WebProduct-Title-Light', '{\"hover\":\"false\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"auto\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":\"\",\"hover\":\"\"}', '{\"color\":\"#fff\",\"color-transparency\":\"1\",\"font-size\":\"90px\",\"line-height\":\"90px\",\"font-weight\":\"100\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":[\"0\",\"0\",\"0\",\"0\"],\"text-decoration\":\"none\",\"text-align\":\"left\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\",\"corner_left\":\"nothing\",\"corner_right\":\"nothing\",\"parallax\":\"-\"}'),
(83, '.tp-caption.WebProduct-SubTitle-Light', '{\"hover\":\"false\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"auto\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":\"\",\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"0.35\",\"font-size\":\"15px\",\"line-height\":\"20px\",\"font-weight\":\"400\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":[\"0\",\"0\",\"0\",\"0\"],\"text-decoration\":\"none\",\"text-align\":\"left\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\",\"corner_left\":\"nothing\",\"parallax\":\"-\"}'),
(84, '.tp-caption.WebProduct-Content-Light', '{\"hover\":\"false\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"auto\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":\"\",\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"0.65\",\"font-size\":\"16px\",\"line-height\":\"24px\",\"font-weight\":\"600\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":[\"0\",\"0\",\"0\",\"0\"],\"text-decoration\":\"none\",\"text-align\":\"left\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\",\"corner_left\":\"nothing\",\"parallax\":\"-\"}'),
(85, '.tp-caption.FatRounded', '{\"hover\":\"true\",\"type\":\"text\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#fff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"#000000\",\"background-transparency\":\"1\",\"border-color\":\"#d3d3d3\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0px\",\"border-radius\":[\"50px\",\"50px\",\"50px\",\"50px\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"pointer\",\"speed\":\"300\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":{\"text-shadow\":\"none\"},\"hover\":\"\"}', '{\"color\":\"#fff\",\"color-transparency\":\"1\",\"font-size\":\"30px\",\"line-height\":\"30px\",\"font-weight\":\"900\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":[\"20px\",\"22px\",\"20px\",\"25px\"],\"text-decoration\":\"none\",\"text-align\":\"left\",\"background-color\":\"#000000\",\"background-transparency\":\"0.5\",\"border-color\":\"#d3d3d3\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0px\",\"border-radius\":[\"50px\",\"50px\",\"50px\",\"50px\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\",\"corner_left\":\"nothing\",\"corner_right\":\"nothing\",\"parallax\":\"-\"}'),
(86, '.tp-caption.NotGeneric-Title', '{\"translated\":5,\"type\":\"text\",\"version\":\"5.0\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"auto\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":\"[object Object]\",\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"70px\",\"line-height\":\"70px\",\"font-weight\":\"800\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":\"10px 0px 10px 0\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":\"0 0 0 0\",\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\",\"corner_left\":\"nothing\",\"corner_right\":\"nothing\",\"parallax\":\"-\"}'),
(87, '.tp-caption.NotGeneric-SubTitle', '{\"translated\":5,\"type\":\"text\",\"version\":\"5.0\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"auto\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":{\"letter-spacing\":\"4px\",\"text-align\":\"left\"},\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"13px\",\"line-height\":\"20px\",\"font-weight\":\"500\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":\"0 0 0 0\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":\"0 0 0 0\",\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\",\"corner_left\":\"nothing\",\"corner_right\":\"nothing\",\"parallax\":\"-\"}'),
(88, '.tp-caption.NotGeneric-CallToAction', '{\"hover\":\"true\",\"translated\":5,\"type\":\"text\",\"version\":\"5.0\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"#ffffff\",\"border-transparency\":\"1\",\"border-style\":\"solid\",\"border-width\":\"1\",\"border-radius\":\"0px 0px 0px 0px\",\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"pointer\",\"speed\":\"300\",\"easing\":\"Power3.easeOut\"}', '{\"idle\":{\"letter-spacing\":\"3px\",\"text-align\":\"left\"},\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"14px\",\"line-height\":\"14px\",\"font-weight\":\"500\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":\"10px 30px 10px 30px\",\"text-decoration\":\"none\",\"background-color\":\"#000000\",\"background-transparency\":\"0\",\"border-color\":\"#ffffff\",\"border-transparency\":\"0.5\",\"border-style\":\"solid\",\"border-width\":\"1\",\"border-radius\":\"0px 0px 0px 0px\",\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\",\"corner_left\":\"nothing\",\"corner_right\":\"nothing\",\"parallax\":\"-\"}'),
(89, '.tp-caption.NotGeneric-Icon', '{\"translated\":5,\"type\":\"text\",\"version\":\"5.0\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"#ffffff\",\"border-transparency\":\"1\",\"border-style\":\"solid\",\"border-width\":\"1\",\"border-radius\":[\"0px\",\"0px\",\"0px\",\"0px\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"default\",\"speed\":\"300\",\"easing\":\"Power3.easeOut\"}', '{\"idle\":{\"letter-spacing\":\"3px\",\"text-align\":\"left\"},\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"30px\",\"line-height\":\"30px\",\"font-weight\":\"400\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":\"0px 0px 0px 0px\",\"text-decoration\":\"none\",\"background-color\":\"#000000\",\"background-transparency\":\"0\",\"border-color\":\"#ffffff\",\"border-transparency\":\"0\",\"border-style\":\"solid\",\"border-width\":\"0px\",\"border-radius\":\"0px 0px 0px 0px\",\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\",\"corner_left\":\"nothing\",\"corner_right\":\"nothing\",\"parallax\":\"-\"}'),
(90, '.tp-caption.NotGeneric-Menuitem', '{\"hover\":\"true\",\"translated\":5,\"type\":\"text\",\"version\":\"5.0\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"#000000\",\"background-transparency\":\"0\",\"border-color\":\"#ffffff\",\"border-transparency\":\"1\",\"border-style\":\"solid\",\"border-width\":\"1px\",\"border-radius\":\"0px 0px 0px 0px\",\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"pointer\",\"speed\":\"300\",\"easing\":\"Power1.easeInOut\"}', '{\"idle\":{\"letter-spacing\":\"3px\",\"text-align\":\"left\"},\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"14px\",\"line-height\":\"14px\",\"font-weight\":\"500\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":\"27px 30px 27px 30px\",\"text-decoration\":\"none\",\"background-color\":\"#000000\",\"background-transparency\":\"0\",\"border-color\":\"#ffffff\",\"border-transparency\":\"0.15\",\"border-style\":\"solid\",\"border-width\":\"1px\",\"border-radius\":\"0px 0px 0px 0px\",\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\",\"corner_left\":\"nothing\",\"corner_right\":\"nothing\",\"parallax\":\"-\"}'),
(91, '.tp-caption.MarkerStyle', '{\"translated\":5,\"type\":\"text\",\"version\":\"5.0\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"auto\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":{\"text-align\":\"left\",\"0\":\"\"},\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"17px\",\"line-height\":\"30px\",\"font-weight\":\"100\",\"font-style\":\"normal\",\"font-family\":\"\\\"Permanent Marker\\\"\",\"padding\":\"0 0 0 0\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":\"0 0 0 0\",\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\",\"corner_left\":\"nothing\",\"corner_right\":\"nothing\",\"parallax\":\"-\"}'),
(92, '.tp-caption.Gym-Menuitem', '{\"hover\":\"true\",\"type\":\"text\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"#000000\",\"background-transparency\":\"1\",\"border-color\":\"#ffffff\",\"border-transparency\":\"0.25\",\"border-style\":\"solid\",\"border-width\":\"2px\",\"border-radius\":[\"3px\",\"3px\",\"3px\",\"3px\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"pointer\",\"speed\":\"200\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":{\"letter-spacing\":\"2px\"},\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"20px\",\"line-height\":\"20px\",\"font-weight\":\"300\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":[\"3px\",\"5px\",\"3px\",\"8px\"],\"text-decoration\":\"none\",\"text-align\":\"left\",\"background-color\":\"#000000\",\"background-transparency\":\"1\",\"border-color\":\"#ffffff\",\"border-transparency\":\"0\",\"border-style\":\"solid\",\"border-width\":\"2px\",\"border-radius\":[\"3px\",\"3px\",\"3px\",\"3px\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\",\"corner_left\":\"nothing\",\"corner_right\":\"nothing\",\"parallax\":\"-\"}'),
(93, '.tp-caption.Newspaper-Button', '{\"hover\":\"true\",\"type\":\"button\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#000000\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"#FFFFFF\",\"background-transparency\":\"1\",\"border-color\":\"#ffffff\",\"border-transparency\":\"1\",\"border-style\":\"solid\",\"border-width\":\"1px\",\"border-radius\":[\"0px\",\"0px\",\"0px\",\"0px\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"pointer\",\"speed\":\"300\",\"easing\":\"Power1.easeInOut\"}', '{\"idle\":{\"letter-spacing\":\"2px\"},\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"13px\",\"line-height\":\"17px\",\"font-weight\":\"700\",\"font-style\":\"normal\",\"font-family\":\"Roboto\",\"padding\":[\"12px\",\"35px\",\"12px\",\"35px\"],\"text-decoration\":\"none\",\"text-align\":\"left\",\"background-color\":\"#ffffff\",\"background-transparency\":\"0\",\"border-color\":\"#ffffff\",\"border-transparency\":\"0.25\",\"border-style\":\"solid\",\"border-width\":\"1px\",\"border-radius\":[\"0px\",\"0px\",\"0px\",\"0px\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\",\"corner_left\":\"nothing\",\"corner_right\":\"nothing\",\"parallax\":\"-\"}'),
(94, '.tp-caption.Newspaper-Subtitle', '{\"hover\":\"false\",\"type\":\"text\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"auto\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":\"\",\"hover\":\"\"}', '{\"color\":\"#a8d8ee\",\"color-transparency\":\"1\",\"font-size\":\"15px\",\"line-height\":\"20px\",\"font-weight\":\"900\",\"font-style\":\"normal\",\"font-family\":\"Roboto\",\"padding\":[\"0\",\"0\",\"0\",\"0\"],\"text-decoration\":\"none\",\"text-align\":\"left\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\",\"corner_left\":\"nothing\",\"corner_right\":\"nothing\",\"parallax\":\"-\"}'),
(95, '.tp-caption.Newspaper-Title', '{\"hover\":\"false\",\"type\":\"text\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"auto\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":\"\",\"hover\":\"\"}', '{\"color\":\"#fff\",\"color-transparency\":\"1\",\"font-size\":\"50px\",\"line-height\":\"55px\",\"font-weight\":\"400\",\"font-style\":\"normal\",\"font-family\":\"\\\"Roboto Slab\\\"\",\"padding\":[\"0\",\"0\",\"10px\",\"0\"],\"text-decoration\":\"none\",\"text-align\":\"left\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\",\"corner_left\":\"nothing\",\"corner_right\":\"nothing\",\"parallax\":\"-\"}'),
(96, '.tp-caption.Newspaper-Title-Centered', '{\"hover\":\"false\",\"type\":\"text\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"auto\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":\"\",\"hover\":\"\"}', '{\"color\":\"#fff\",\"color-transparency\":\"1\",\"font-size\":\"50px\",\"line-height\":\"55px\",\"font-weight\":\"400\",\"font-style\":\"normal\",\"font-family\":\"\\\"Roboto Slab\\\"\",\"padding\":[\"0\",\"0\",\"10px\",\"0\"],\"text-decoration\":\"none\",\"text-align\":\"center\",\"background-color\":\"transparent\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\",\"corner_left\":\"nothing\",\"corner_right\":\"nothing\",\"parallax\":\"-\"}'),
(97, '.tp-caption.Hero-Button', '{\"hover\":\"true\",\"type\":\"button\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#000000\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"#ffffff\",\"background-transparency\":\"1\",\"border-color\":\"#ffffff\",\"border-transparency\":\"1\",\"border-style\":\"solid\",\"border-width\":\"1\",\"border-radius\":[\"0px\",\"0px\",\"0px\",\"0px\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"pointer\",\"speed\":\"300\",\"easing\":\"Power1.easeInOut\"}', '{\"idle\":{\"letter-spacing\":\"3px\"},\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"14px\",\"line-height\":\"14px\",\"font-weight\":\"500\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":[\"10px\",\"30px\",\"10px\",\"30px\"],\"text-decoration\":\"none\",\"text-align\":\"left\",\"background-color\":\"#000000\",\"background-transparency\":\"0\",\"border-color\":\"#ffffff\",\"border-transparency\":\"0.5\",\"border-style\":\"solid\",\"border-width\":\"1\",\"border-radius\":[\"0px\",\"0px\",\"0px\",\"0px\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\",\"corner_left\":\"nothing\",\"corner_right\":\"nothing\",\"parallax\":\"-\"}'),
(98, '.tp-caption.Video-Title', '{\"hover\":\"false\",\"type\":\"text\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"auto\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":\"\",\"hover\":\"\"}', '{\"color\":\"#fff\",\"color-transparency\":\"1\",\"font-size\":\"30px\",\"line-height\":\"30px\",\"font-weight\":\"900\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":[\"5px\",\"5px\",\"5px\",\"5px\"],\"text-decoration\":\"none\",\"text-align\":\"left\",\"background-color\":\"#000000\",\"background-transparency\":\"1\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"-20%\",\"2d_origin_y\":\"50\",\"pers\":\"600\",\"corner_left\":\"nothing\",\"corner_right\":\"nothing\",\"parallax\":\"-\"}'),
(99, '.tp-caption.Video-SubTitle', '{\"hover\":\"false\",\"type\":\"text\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"auto\",\"speed\":\"0\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":{\"letter-spacing\":\"2px\"},\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"12px\",\"line-height\":\"12px\",\"font-weight\":\"600\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":[\"5px\",\"5px\",\"5px\",\"5px\"],\"text-decoration\":\"none\",\"text-align\":\"left\",\"background-color\":\"#000000\",\"background-transparency\":\"0.35\",\"border-color\":\"transparent\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"0\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"-20%\",\"2d_origin_y\":\"50\",\"pers\":\"600\",\"corner_left\":\"nothing\",\"corner_right\":\"nothing\",\"parallax\":\"-\"}'),
(100, '.tp-caption.NotGeneric-Button', '{\"hover\":\"true\",\"type\":\"button\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"#ffffff\",\"border-transparency\":\"1\",\"border-style\":\"solid\",\"border-width\":\"1\",\"border-radius\":[\"0px\",\"0px\",\"0px\",\"0px\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"pointer\",\"speed\":\"300\",\"easing\":\"Power1.easeInOut\"}', '{\"idle\":{\"letter-spacing\":\"3px\",\"text-align\":\"left\"},\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"14px\",\"line-height\":\"14px\",\"font-weight\":\"500\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":[\"10px\",\"30px\",\"10px\",\"30px\"],\"text-decoration\":\"none\",\"text-align\":\"left\",\"background-color\":\"#000000\",\"background-transparency\":\"0\",\"border-color\":\"#ffffff\",\"border-transparency\":\"0.5\",\"border-style\":\"solid\",\"border-width\":\"1\",\"border-radius\":[\"0px\",\"0px\",\"0px\",\"0px\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\",\"corner_left\":\"nothing\",\"corner_right\":\"nothing\",\"parallax\":\"-\"}'),
(101, '.tp-caption.NotGeneric-BigButton', '{\"hover\":\"true\",\"type\":\"button\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"#000000\",\"background-transparency\":\"0\",\"border-color\":\"#ffffff\",\"border-transparency\":\"1\",\"border-style\":\"solid\",\"border-width\":\"1px\",\"border-radius\":[\"0px\",\"0px\",\"0px\",\"0px\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"pointer\",\"speed\":\"300\",\"easing\":\"Power1.easeInOut\"}', '{\"idle\":{\"letter-spacing\":\"3px\"},\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"14px\",\"line-height\":\"14px\",\"font-weight\":\"500\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":[\"27px\",\"30px\",\"27px\",\"30px\"],\"text-decoration\":\"none\",\"text-align\":\"left\",\"background-color\":\"#000000\",\"background-transparency\":\"0\",\"border-color\":\"#ffffff\",\"border-transparency\":\"0.15\",\"border-style\":\"solid\",\"border-width\":\"1px\",\"border-radius\":[\"0px\",\"0px\",\"0px\",\"0px\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\",\"corner_left\":\"nothing\",\"corner_right\":\"nothing\",\"parallax\":\"-\"}'),
(102, '.tp-caption.WebProduct-Button', '{\"hover\":\"true\",\"type\":\"button\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#333333\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"#ffffff\",\"background-transparency\":\"1\",\"border-color\":\"#000000\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"2\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"auto\",\"speed\":\"300\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":{\"letter-spacing\":\"1px\"},\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"16px\",\"line-height\":\"48px\",\"font-weight\":\"600\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":[\"0px\",\"40px\",\"0px\",\"40px\"],\"text-decoration\":\"none\",\"text-align\":\"left\",\"background-color\":\"#333333\",\"background-transparency\":\"1\",\"border-color\":\"#000000\",\"border-transparency\":\"1\",\"border-style\":\"none\",\"border-width\":\"2\",\"border-radius\":[\"0\",\"0\",\"0\",\"0\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\",\"corner_left\":\"nothing\",\"corner_right\":\"nothing\",\"parallax\":\"-\"}'),
(103, '.tp-caption.Restaurant-Button', '{\"hover\":\"true\",\"type\":\"button\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"#000000\",\"background-transparency\":\"0\",\"border-color\":\"#ffe081\",\"border-transparency\":\"1\",\"border-style\":\"solid\",\"border-width\":\"2\",\"border-radius\":[\"0px\",\"0px\",\"0px\",\"0px\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"auto\",\"speed\":\"300\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":{\"letter-spacing\":\"3px\"},\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"17px\",\"line-height\":\"17px\",\"font-weight\":\"500\",\"font-style\":\"normal\",\"font-family\":\"Roboto\",\"padding\":[\"12px\",\"35px\",\"12px\",\"35px\"],\"text-decoration\":\"none\",\"text-align\":\"left\",\"background-color\":\"#0a0a0a\",\"background-transparency\":\"0\",\"border-color\":\"#ffffff\",\"border-transparency\":\"0.5\",\"border-style\":\"solid\",\"border-width\":\"2\",\"border-radius\":[\"0px\",\"0px\",\"0px\",\"0px\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\",\"corner_left\":\"nothing\",\"corner_right\":\"nothing\",\"parallax\":\"-\"}');
INSERT INTO `wp_revslider_css` (`id`, `handle`, `settings`, `hover`, `advanced`, `params`) VALUES
(104, '.tp-caption.Gym-Button', '{\"hover\":\"true\",\"type\":\"button\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"#72a800\",\"background-transparency\":\"1\",\"border-color\":\"#000000\",\"border-transparency\":\"0\",\"border-style\":\"solid\",\"border-width\":\"0\",\"border-radius\":[\"30px\",\"30px\",\"30px\",\"30px\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"pointer\",\"speed\":\"300\",\"easing\":\"Power1.easeInOut\"}', '{\"idle\":{\"letter-spacing\":\"1px\"},\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"15px\",\"line-height\":\"15px\",\"font-weight\":\"600\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":[\"13px\",\"35px\",\"13px\",\"35px\"],\"text-decoration\":\"none\",\"text-align\":\"left\",\"background-color\":\"#8bc027\",\"background-transparency\":\"1\",\"border-color\":\"#000000\",\"border-transparency\":\"0\",\"border-style\":\"solid\",\"border-width\":\"0\",\"border-radius\":[\"30px\",\"30px\",\"30px\",\"30px\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\",\"corner_left\":\"nothing\",\"corner_right\":\"nothing\",\"parallax\":\"-\"}'),
(105, '.tp-caption.Gym-Button-Light', '{\"hover\":\"true\",\"type\":\"button\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"#72a800\",\"background-transparency\":\"0\",\"border-color\":\"#8bc027\",\"border-transparency\":\"1\",\"border-style\":\"solid\",\"border-width\":\"2px\",\"border-radius\":[\"30px\",\"30px\",\"30px\",\"30px\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"pointer\",\"speed\":\"300\",\"easing\":\"Power2.easeInOut\"}', '{\"idle\":\"\",\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"15px\",\"line-height\":\"15px\",\"font-weight\":\"600\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":[\"12px\",\"35px\",\"12px\",\"35px\"],\"text-decoration\":\"none\",\"text-align\":\"left\",\"background-color\":\"transparent\",\"background-transparency\":\"0\",\"border-color\":\"#ffffff\",\"border-transparency\":\"0.25\",\"border-style\":\"solid\",\"border-width\":\"2px\",\"border-radius\":[\"30px\",\"30px\",\"30px\",\"30px\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\",\"corner_left\":\"nothing\",\"corner_right\":\"nothing\",\"parallax\":\"-\"}'),
(106, '.tp-caption.Sports-Button-Light', '{\"hover\":\"true\",\"type\":\"button\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"#000000\",\"background-transparency\":\"0\",\"border-color\":\"#ffffff\",\"border-transparency\":\"1\",\"border-style\":\"solid\",\"border-width\":\"2\",\"border-radius\":[\"0px\",\"0px\",\"0px\",\"0px\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"auto\",\"speed\":\"500\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":{\"letter-spacing\":\"2px\"},\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"17px\",\"line-height\":\"17px\",\"font-weight\":\"600\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":[\"12px\",\"35px\",\"12px\",\"35px\"],\"text-decoration\":\"none\",\"text-align\":\"left\",\"background-color\":\"#000000\",\"background-transparency\":\"0\",\"border-color\":\"#ffffff\",\"border-transparency\":\"0.5\",\"border-style\":\"solid\",\"border-width\":\"2\",\"border-radius\":[\"0px\",\"0px\",\"0px\",\"0px\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\",\"corner_left\":\"nothing\",\"corner_right\":\"nothing\",\"parallax\":\"-\"}'),
(107, '.tp-caption.Sports-Button-Red', '{\"hover\":\"true\",\"type\":\"button\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"#000000\",\"background-transparency\":\"1\",\"border-color\":\"#000000\",\"border-transparency\":\"1\",\"border-style\":\"solid\",\"border-width\":\"2\",\"border-radius\":[\"0px\",\"0px\",\"0px\",\"0px\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"auto\",\"speed\":\"500\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":{\"letter-spacing\":\"2px\"},\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"17px\",\"line-height\":\"17px\",\"font-weight\":\"600\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":[\"12px\",\"35px\",\"12px\",\"35px\"],\"text-decoration\":\"none\",\"text-align\":\"left\",\"background-color\":\"#db1c22\",\"background-transparency\":\"1\",\"border-color\":\"#db1c22\",\"border-transparency\":\"0\",\"border-style\":\"solid\",\"border-width\":\"2px\",\"border-radius\":[\"0px\",\"0px\",\"0px\",\"0px\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\",\"corner_left\":\"nothing\",\"corner_right\":\"nothing\",\"parallax\":\"-\"}'),
(108, '.tp-caption.Photography-Button', '{\"hover\":\"true\",\"type\":\"button\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"#000000\",\"background-transparency\":\"0\",\"border-color\":\"#ffffff\",\"border-transparency\":\"1\",\"border-style\":\"solid\",\"border-width\":\"1px\",\"border-radius\":[\"30px\",\"30px\",\"30px\",\"30px\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"auto\",\"speed\":\"300\",\"easing\":\"Power3.easeOut\"}', '{\"idle\":{\"letter-spacing\":\"1px\"},\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"15px\",\"line-height\":\"15px\",\"font-weight\":\"600\",\"font-style\":\"normal\",\"font-family\":\"Raleway\",\"padding\":[\"13px\",\"35px\",\"13px\",\"35px\"],\"text-decoration\":\"none\",\"text-align\":\"left\",\"background-color\":\"#000000\",\"background-transparency\":\"0\",\"border-color\":\"#ffffff\",\"border-transparency\":\"0.25\",\"border-style\":\"solid\",\"border-width\":\"1px\",\"border-radius\":[\"30px\",\"30px\",\"30px\",\"30px\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\",\"corner_left\":\"nothing\",\"corner_right\":\"nothing\",\"parallax\":\"-\"}'),
(109, '.tp-caption.Newspaper-Button-2', '{\"hover\":\"true\",\"type\":\"button\",\"version\":\"5.0\",\"translated\":\"5\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"text-decoration\":\"none\",\"background-color\":\"#000000\",\"background-transparency\":\"0\",\"border-color\":\"#ffffff\",\"border-transparency\":\"1\",\"border-style\":\"solid\",\"border-width\":\"2\",\"border-radius\":[\"3px\",\"3px\",\"3px\",\"3px\"],\"opacity\":\"1\",\"scalex\":\"1\",\"scaley\":\"1\",\"skewx\":\"0\",\"skewy\":\"0\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"pointer_events\":\"auto\",\"css_cursor\":\"pointer\",\"speed\":\"300\",\"easing\":\"Linear.easeNone\"}', '{\"idle\":\"\",\"hover\":\"\"}', '{\"color\":\"#ffffff\",\"color-transparency\":\"1\",\"font-size\":\"15px\",\"line-height\":\"15px\",\"font-weight\":\"900\",\"font-style\":\"normal\",\"font-family\":\"Roboto\",\"padding\":[\"10px\",\"30px\",\"10px\",\"30px\"],\"text-decoration\":\"none\",\"text-align\":\"left\",\"background-color\":\"#000000\",\"background-transparency\":\"0\",\"border-color\":\"#ffffff\",\"border-transparency\":\"0.5\",\"border-style\":\"solid\",\"border-width\":\"2\",\"border-radius\":[\"3px\",\"3px\",\"3px\",\"3px\"],\"z\":\"0\",\"skewx\":\"0\",\"skewy\":\"0\",\"scalex\":\"1\",\"scaley\":\"1\",\"opacity\":\"1\",\"xrotate\":\"0\",\"yrotate\":\"0\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"pers\":\"600\",\"corner_left\":\"nothing\",\"corner_right\":\"nothing\",\"parallax\":\"-\"}');

-- --------------------------------------------------------

--
-- Table structure for table `wp_revslider_css_bkp`
--

CREATE TABLE `wp_revslider_css_bkp` (
  `id` int(9) NOT NULL,
  `handle` text COLLATE utf8_unicode_ci NOT NULL,
  `settings` longtext COLLATE utf8_unicode_ci,
  `hover` longtext COLLATE utf8_unicode_ci,
  `advanced` longtext COLLATE utf8_unicode_ci,
  `params` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wp_revslider_css_bkp`
--

INSERT INTO `wp_revslider_css_bkp` (`id`, `handle`, `settings`, `hover`, `advanced`, `params`) VALUES
(1, '.tp-caption.medium_grey', NULL, NULL, NULL, '{\"position\":\"absolute\",\"color\":\"#fff\",\"text-shadow\":\"0px 2px 5px rgba(0, 0, 0, 0.5)\",\"font-weight\":\"700\",\"font-size\":\"20px\",\"line-height\":\"20px\",\"font-family\":\"Arial\",\"padding\":\"2px 4px\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\",\"background-color\":\"#888\",\"white-space\":\"nowrap\"}'),
(2, '.tp-caption.small_text', NULL, NULL, NULL, '{\"position\":\"absolute\",\"color\":\"#fff\",\"text-shadow\":\"0px 2px 5px rgba(0, 0, 0, 0.5)\",\"font-weight\":\"700\",\"font-size\":\"14px\",\"line-height\":\"20px\",\"font-family\":\"Arial\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\",\"white-space\":\"nowrap\"}'),
(3, '.tp-caption.medium_text', NULL, NULL, NULL, '{\"position\":\"absolute\",\"color\":\"#fff\",\"text-shadow\":\"0px 2px 5px rgba(0, 0, 0, 0.5)\",\"font-weight\":\"700\",\"font-size\":\"20px\",\"line-height\":\"20px\",\"font-family\":\"Arial\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\",\"white-space\":\"nowrap\"}'),
(4, '.tp-caption.large_text', NULL, NULL, NULL, '{\"position\":\"absolute\",\"color\":\"#fff\",\"text-shadow\":\"0px 2px 5px rgba(0, 0, 0, 0.5)\",\"font-weight\":\"700\",\"font-size\":\"40px\",\"line-height\":\"40px\",\"font-family\":\"Arial\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\",\"white-space\":\"nowrap\"}'),
(5, '.tp-caption.very_large_text', NULL, NULL, NULL, '{\"position\":\"absolute\",\"color\":\"#fff\",\"text-shadow\":\"0px 2px 5px rgba(0, 0, 0, 0.5)\",\"font-weight\":\"700\",\"font-size\":\"60px\",\"line-height\":\"60px\",\"font-family\":\"Arial\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\",\"white-space\":\"nowrap\",\"letter-spacing\":\"-2px\"}'),
(6, '.tp-caption.very_big_white', NULL, NULL, NULL, '{\"position\":\"absolute\",\"color\":\"#fff\",\"text-shadow\":\"none\",\"font-weight\":\"800\",\"font-size\":\"60px\",\"line-height\":\"60px\",\"font-family\":\"Arial\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\",\"white-space\":\"nowrap\",\"padding\":\"0px 4px\",\"padding-top\":\"1px\",\"background-color\":\"#000\"}'),
(7, '.tp-caption.very_big_black', NULL, NULL, NULL, '{\"position\":\"absolute\",\"color\":\"#000\",\"text-shadow\":\"none\",\"font-weight\":\"700\",\"font-size\":\"60px\",\"line-height\":\"60px\",\"font-family\":\"Arial\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\",\"white-space\":\"nowrap\",\"padding\":\"0px 4px\",\"padding-top\":\"1px\",\"background-color\":\"#fff\"}'),
(8, '.tp-caption.modern_medium_fat', NULL, NULL, NULL, '{\"position\":\"absolute\",\"color\":\"#000\",\"text-shadow\":\"none\",\"font-weight\":\"800\",\"font-size\":\"24px\",\"line-height\":\"20px\",\"font-family\":\"\\\"Open Sans\\\", sans-serif\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\",\"white-space\":\"nowrap\"}'),
(9, '.tp-caption.modern_medium_fat_white', NULL, NULL, NULL, '{\"position\":\"absolute\",\"color\":\"#fff\",\"text-shadow\":\"none\",\"font-weight\":\"800\",\"font-size\":\"24px\",\"line-height\":\"20px\",\"font-family\":\"\\\"Open Sans\\\", sans-serif\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\",\"white-space\":\"nowrap\"}'),
(10, '.tp-caption.modern_medium_light', NULL, NULL, NULL, '{\"position\":\"absolute\",\"color\":\"#000\",\"text-shadow\":\"none\",\"font-weight\":\"300\",\"font-size\":\"24px\",\"line-height\":\"20px\",\"font-family\":\"\\\"Open Sans\\\", sans-serif\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\",\"white-space\":\"nowrap\"}'),
(11, '.tp-caption.modern_big_bluebg', NULL, NULL, NULL, '{\"position\":\"absolute\",\"color\":\"#fff\",\"text-shadow\":\"none\",\"font-weight\":\"800\",\"font-size\":\"30px\",\"line-height\":\"36px\",\"font-family\":\"\\\"Open Sans\\\", sans-serif\",\"padding\":\"3px 10px\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\",\"background-color\":\"#4e5b6c\",\"letter-spacing\":\"0\"}'),
(12, '.tp-caption.modern_big_redbg', NULL, NULL, NULL, '{\"position\":\"absolute\",\"color\":\"#fff\",\"text-shadow\":\"none\",\"font-weight\":\"300\",\"font-size\":\"30px\",\"line-height\":\"36px\",\"font-family\":\"\\\"Open Sans\\\", sans-serif\",\"padding\":\"3px 10px\",\"padding-top\":\"1px\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\",\"background-color\":\"#de543e\",\"letter-spacing\":\"0\"}'),
(13, '.tp-caption.modern_small_text_dark', NULL, NULL, NULL, '{\"position\":\"absolute\",\"color\":\"#555\",\"text-shadow\":\"none\",\"font-size\":\"14px\",\"line-height\":\"22px\",\"font-family\":\"Arial\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\",\"white-space\":\"nowrap\"}'),
(14, '.tp-caption.boxshadow', NULL, NULL, NULL, '{\"-moz-box-shadow\":\"0px 0px 20px rgba(0, 0, 0, 0.5)\",\"-webkit-box-shadow\":\"0px 0px 20px rgba(0, 0, 0, 0.5)\",\"box-shadow\":\"0px 0px 20px rgba(0, 0, 0, 0.5)\"}'),
(15, '.tp-caption.black', NULL, NULL, NULL, '{\"color\":\"#000\",\"text-shadow\":\"none\"}'),
(16, '.tp-caption.noshadow', NULL, NULL, NULL, '{\"text-shadow\":\"none\"}'),
(17, '.tp-caption.thinheadline_dark', NULL, NULL, NULL, '{\"position\":\"absolute\",\"color\":\"rgba(0,0,0,0.85)\",\"text-shadow\":\"none\",\"font-weight\":\"300\",\"font-size\":\"30px\",\"line-height\":\"30px\",\"font-family\":\"\\\"Open Sans\\\"\",\"background-color\":\"transparent\"}'),
(18, '.tp-caption.thintext_dark', NULL, NULL, NULL, '{\"position\":\"absolute\",\"color\":\"rgba(0,0,0,0.85)\",\"text-shadow\":\"none\",\"font-weight\":\"300\",\"font-size\":\"16px\",\"line-height\":\"26px\",\"font-family\":\"\\\"Open Sans\\\"\",\"background-color\":\"transparent\"}'),
(19, '.tp-caption.largeblackbg', NULL, NULL, NULL, '{\"position\":\"absolute\",\"color\":\"#fff\",\"text-shadow\":\"none\",\"font-weight\":\"300\",\"font-size\":\"50px\",\"line-height\":\"70px\",\"font-family\":\"\\\"Open Sans\\\"\",\"background-color\":\"#000\",\"padding\":\"0px 20px\",\"-webkit-border-radius\":\"0px\",\"-moz-border-radius\":\"0px\",\"border-radius\":\"0px\"}'),
(20, '.tp-caption.largepinkbg', NULL, NULL, NULL, '{\"position\":\"absolute\",\"color\":\"#fff\",\"text-shadow\":\"none\",\"font-weight\":\"300\",\"font-size\":\"50px\",\"line-height\":\"70px\",\"font-family\":\"\\\"Open Sans\\\"\",\"background-color\":\"#db4360\",\"padding\":\"0px 20px\",\"-webkit-border-radius\":\"0px\",\"-moz-border-radius\":\"0px\",\"border-radius\":\"0px\"}'),
(21, '.tp-caption.largewhitebg', NULL, NULL, NULL, '{\"position\":\"absolute\",\"color\":\"#000\",\"text-shadow\":\"none\",\"font-weight\":\"300\",\"font-size\":\"50px\",\"line-height\":\"70px\",\"font-family\":\"\\\"Open Sans\\\"\",\"background-color\":\"#fff\",\"padding\":\"0px 20px\",\"-webkit-border-radius\":\"0px\",\"-moz-border-radius\":\"0px\",\"border-radius\":\"0px\"}'),
(22, '.tp-caption.largegreenbg', NULL, NULL, NULL, '{\"position\":\"absolute\",\"color\":\"#fff\",\"text-shadow\":\"none\",\"font-weight\":\"300\",\"font-size\":\"50px\",\"line-height\":\"70px\",\"font-family\":\"\\\"Open Sans\\\"\",\"background-color\":\"#67ae73\",\"padding\":\"0px 20px\",\"-webkit-border-radius\":\"0px\",\"-moz-border-radius\":\"0px\",\"border-radius\":\"0px\"}'),
(23, '.tp-caption.excerpt', NULL, NULL, NULL, '{\"font-size\":\"36px\",\"line-height\":\"36px\",\"font-weight\":\"700\",\"font-family\":\"Arial\",\"color\":\"#ffffff\",\"text-decoration\":\"none\",\"background-color\":\"rgba(0, 0, 0, 1)\",\"text-shadow\":\"none\",\"margin\":\"0px\",\"letter-spacing\":\"-1.5px\",\"padding\":\"1px 4px 0px 4px\",\"width\":\"150px\",\"white-space\":\"normal !important\",\"height\":\"auto\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 255, 255)\",\"border-style\":\"none\"}'),
(24, '.tp-caption.large_bold_grey', NULL, NULL, NULL, '{\"font-size\":\"60px\",\"line-height\":\"60px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(102, 102, 102)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"text-shadow\":\"none\",\"margin\":\"0px\",\"padding\":\"1px 4px 0px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(25, '.tp-caption.medium_thin_grey', NULL, NULL, NULL, '{\"font-size\":\"34px\",\"line-height\":\"30px\",\"font-weight\":\"300\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(102, 102, 102)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"padding\":\"1px 4px 0px\",\"text-shadow\":\"none\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(26, '.tp-caption.small_thin_grey', NULL, NULL, NULL, '{\"font-size\":\"18px\",\"line-height\":\"26px\",\"font-weight\":\"300\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(117, 117, 117)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"padding\":\"1px 4px 0px\",\"text-shadow\":\"none\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(27, '.tp-caption.lightgrey_divider', NULL, NULL, NULL, '{\"text-decoration\":\"none\",\"background-color\":\"rgba(235, 235, 235, 1)\",\"width\":\"370px\",\"height\":\"3px\",\"background-position\":\"initial initial\",\"background-repeat\":\"initial initial\",\"border-width\":\"0px\",\"border-color\":\"rgb(34, 34, 34)\",\"border-style\":\"none\"}'),
(28, '.tp-caption.large_bold_darkblue', NULL, NULL, NULL, '{\"font-size\":\"58px\",\"line-height\":\"60px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(52, 73, 94)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(29, '.tp-caption.medium_bg_darkblue', NULL, NULL, NULL, '{\"font-size\":\"20px\",\"line-height\":\"20px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(255, 255, 255)\",\"text-decoration\":\"none\",\"background-color\":\"rgb(52, 73, 94)\",\"padding\":\"10px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(30, '.tp-caption.medium_bold_red', NULL, NULL, NULL, '{\"font-size\":\"24px\",\"line-height\":\"30px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(227, 58, 12)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"padding\":\"0px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(31, '.tp-caption.medium_light_red', NULL, NULL, NULL, '{\"font-size\":\"21px\",\"line-height\":\"26px\",\"font-weight\":\"300\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(227, 58, 12)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"padding\":\"0px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(32, '.tp-caption.medium_bg_red', NULL, NULL, NULL, '{\"font-size\":\"20px\",\"line-height\":\"20px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(255, 255, 255)\",\"text-decoration\":\"none\",\"background-color\":\"rgb(227, 58, 12)\",\"padding\":\"10px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(33, '.tp-caption.medium_bold_orange', NULL, NULL, NULL, '{\"font-size\":\"24px\",\"line-height\":\"30px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(243, 156, 18)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(34, '.tp-caption.medium_bg_orange', NULL, NULL, NULL, '{\"font-size\":\"20px\",\"line-height\":\"20px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(255, 255, 255)\",\"text-decoration\":\"none\",\"background-color\":\"rgb(243, 156, 18)\",\"padding\":\"10px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(35, '.tp-caption.grassfloor', NULL, NULL, NULL, '{\"text-decoration\":\"none\",\"background-color\":\"rgba(160, 179, 151, 1)\",\"width\":\"4000px\",\"height\":\"150px\",\"border-width\":\"0px\",\"border-color\":\"rgb(34, 34, 34)\",\"border-style\":\"none\"}'),
(36, '.tp-caption.large_bold_white', NULL, NULL, NULL, '{\"font-size\":\"58px\",\"line-height\":\"60px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(255, 255, 255)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(37, '.tp-caption.medium_light_white', NULL, NULL, NULL, '{\"font-size\":\"30px\",\"line-height\":\"36px\",\"font-weight\":\"300\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(255, 255, 255)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"padding\":\"0px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(38, '.tp-caption.mediumlarge_light_white', NULL, NULL, NULL, '{\"font-size\":\"34px\",\"line-height\":\"40px\",\"font-weight\":\"300\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(255, 255, 255)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"padding\":\"0px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(39, '.tp-caption.mediumlarge_light_white_center', NULL, NULL, NULL, '{\"font-size\":\"34px\",\"line-height\":\"40px\",\"font-weight\":\"300\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"#ffffff\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"padding\":\"0px 0px 0px 0px\",\"text-align\":\"center\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(40, '.tp-caption.medium_bg_asbestos', NULL, NULL, NULL, '{\"font-size\":\"20px\",\"line-height\":\"20px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(255, 255, 255)\",\"text-decoration\":\"none\",\"background-color\":\"rgb(127, 140, 141)\",\"padding\":\"10px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(41, '.tp-caption.medium_light_black', NULL, NULL, NULL, '{\"font-size\":\"30px\",\"line-height\":\"36px\",\"font-weight\":\"300\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(0, 0, 0)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"padding\":\"0px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(42, '.tp-caption.large_bold_black', NULL, NULL, NULL, '{\"font-size\":\"58px\",\"line-height\":\"60px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(0, 0, 0)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(43, '.tp-caption.mediumlarge_light_darkblue', NULL, NULL, NULL, '{\"font-size\":\"34px\",\"line-height\":\"40px\",\"font-weight\":\"300\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(52, 73, 94)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"padding\":\"0px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(44, '.tp-caption.small_light_white', NULL, NULL, NULL, '{\"font-size\":\"17px\",\"line-height\":\"28px\",\"font-weight\":\"300\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(255, 255, 255)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"padding\":\"0px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(45, '.tp-caption.roundedimage', NULL, NULL, NULL, '{\"border-width\":\"0px\",\"border-color\":\"rgb(34, 34, 34)\",\"border-style\":\"none\"}'),
(46, '.tp-caption.large_bg_black', NULL, NULL, NULL, '{\"font-size\":\"40px\",\"line-height\":\"40px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(255, 255, 255)\",\"text-decoration\":\"none\",\"background-color\":\"rgb(0, 0, 0)\",\"padding\":\"10px 20px 15px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}'),
(47, '.tp-caption.mediumwhitebg', NULL, NULL, NULL, '{\"font-size\":\"30px\",\"line-height\":\"30px\",\"font-weight\":\"300\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(0, 0, 0)\",\"text-decoration\":\"none\",\"background-color\":\"rgb(255, 255, 255)\",\"padding\":\"5px 15px 10px\",\"text-shadow\":\"none\",\"border-width\":\"0px\",\"border-color\":\"rgb(0, 0, 0)\",\"border-style\":\"none\"}');

-- --------------------------------------------------------

--
-- Table structure for table `wp_revslider_layer_animations`
--

CREATE TABLE `wp_revslider_layer_animations` (
  `id` int(9) NOT NULL,
  `handle` text COLLATE utf8_unicode_ci NOT NULL,
  `params` text COLLATE utf8_unicode_ci NOT NULL,
  `settings` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_revslider_layer_animations_bkp`
--

CREATE TABLE `wp_revslider_layer_animations_bkp` (
  `id` int(9) NOT NULL,
  `handle` text COLLATE utf8_unicode_ci NOT NULL,
  `params` text COLLATE utf8_unicode_ci NOT NULL,
  `settings` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_revslider_navigations`
--

CREATE TABLE `wp_revslider_navigations` (
  `id` int(9) NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `handle` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `css` longtext COLLATE utf8_unicode_ci NOT NULL,
  `markup` longtext COLLATE utf8_unicode_ci NOT NULL,
  `settings` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_revslider_navigations_bkp`
--

CREATE TABLE `wp_revslider_navigations_bkp` (
  `id` int(9) NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `handle` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `css` longtext COLLATE utf8_unicode_ci NOT NULL,
  `markup` longtext COLLATE utf8_unicode_ci NOT NULL,
  `settings` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_revslider_sliders`
--

CREATE TABLE `wp_revslider_sliders` (
  `id` int(9) NOT NULL,
  `title` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `alias` tinytext COLLATE utf8_unicode_ci,
  `params` longtext COLLATE utf8_unicode_ci NOT NULL,
  `settings` text COLLATE utf8_unicode_ci,
  `type` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_revslider_sliders_bkp`
--

CREATE TABLE `wp_revslider_sliders_bkp` (
  `id` int(9) NOT NULL,
  `title` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `alias` tinytext COLLATE utf8_unicode_ci,
  `params` longtext COLLATE utf8_unicode_ci NOT NULL,
  `settings` text COLLATE utf8_unicode_ci,
  `type` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_revslider_slides`
--

CREATE TABLE `wp_revslider_slides` (
  `id` int(9) NOT NULL,
  `slider_id` int(9) NOT NULL,
  `slide_order` int(11) NOT NULL,
  `params` longtext COLLATE utf8_unicode_ci NOT NULL,
  `layers` longtext COLLATE utf8_unicode_ci NOT NULL,
  `settings` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_revslider_slides_bkp`
--

CREATE TABLE `wp_revslider_slides_bkp` (
  `id` int(9) NOT NULL,
  `slider_id` int(9) NOT NULL,
  `slide_order` int(11) NOT NULL,
  `params` longtext COLLATE utf8_unicode_ci NOT NULL,
  `layers` longtext COLLATE utf8_unicode_ci NOT NULL,
  `settings` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_revslider_static_slides`
--

CREATE TABLE `wp_revslider_static_slides` (
  `id` int(9) NOT NULL,
  `slider_id` int(9) NOT NULL,
  `params` longtext COLLATE utf8_unicode_ci NOT NULL,
  `layers` longtext COLLATE utf8_unicode_ci NOT NULL,
  `settings` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_revslider_static_slides_bkp`
--

CREATE TABLE `wp_revslider_static_slides_bkp` (
  `id` int(9) NOT NULL,
  `slider_id` int(9) NOT NULL,
  `params` longtext COLLATE utf8_unicode_ci NOT NULL,
  `layers` longtext COLLATE utf8_unicode_ci NOT NULL,
  `settings` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_sbi_instagram_feeds_posts`
--

CREATE TABLE `wp_sbi_instagram_feeds_posts` (
  `record_id` int(11) UNSIGNED NOT NULL,
  `id` int(11) UNSIGNED NOT NULL,
  `instagram_id` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `feed_id` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_sbi_instagram_posts`
--

CREATE TABLE `wp_sbi_instagram_posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `created_on` datetime DEFAULT NULL,
  `instagram_id` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `time_stamp` datetime DEFAULT NULL,
  `top_time_stamp` datetime DEFAULT NULL,
  `json_data` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_id` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sizes` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `aspect_ratio` decimal(4,2) NOT NULL DEFAULT '0.00',
  `images_done` tinyint(1) NOT NULL DEFAULT '0',
  `last_requested` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_termmeta`
--

CREATE TABLE `wp_termmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_terms`
--

CREATE TABLE `wp_terms` (
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Uncategorized', 'uncategorized', 0),
(2, 'simple', 'simple', 0),
(3, 'grouped', 'grouped', 0),
(4, 'variable', 'variable', 0),
(5, 'external', 'external', 0),
(6, 'exclude-from-search', 'exclude-from-search', 0),
(7, 'exclude-from-catalog', 'exclude-from-catalog', 0),
(8, 'featured', 'featured', 0),
(9, 'outofstock', 'outofstock', 0),
(10, 'rated-1', 'rated-1', 0),
(11, 'rated-2', 'rated-2', 0),
(12, 'rated-3', 'rated-3', 0),
(13, 'rated-4', 'rated-4', 0),
(14, 'rated-5', 'rated-5', 0),
(15, 'Uncategorized', 'uncategorized', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_relationships`
--

CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_term_relationships`
--

INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_taxonomy`
--

CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 1),
(2, 2, 'product_type', '', 0, 0),
(3, 3, 'product_type', '', 0, 0),
(4, 4, 'product_type', '', 0, 0),
(5, 5, 'product_type', '', 0, 0),
(6, 6, 'product_visibility', '', 0, 0),
(7, 7, 'product_visibility', '', 0, 0),
(8, 8, 'product_visibility', '', 0, 0),
(9, 9, 'product_visibility', '', 0, 0),
(10, 10, 'product_visibility', '', 0, 0),
(11, 11, 'product_visibility', '', 0, 0),
(12, 12, 'product_visibility', '', 0, 0),
(13, 13, 'product_visibility', '', 0, 0),
(14, 14, 'product_visibility', '', 0, 0),
(15, 15, 'product_cat', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_usermeta`
--

CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_usermeta`
--

INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'admin'),
(2, 1, 'first_name', ''),
(3, 1, 'last_name', ''),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'syntax_highlighting', 'true'),
(7, 1, 'comment_shortcuts', 'false'),
(8, 1, 'admin_color', 'fresh'),
(9, 1, 'use_ssl', '0'),
(10, 1, 'show_admin_bar_front', 'true'),
(11, 1, 'locale', ''),
(12, 1, 'wp_capabilities', 'a:1:{s:13:\"administrator\";b:1;}'),
(13, 1, 'wp_user_level', '10'),
(14, 1, 'dismissed_wp_pointers', ''),
(15, 1, 'show_welcome_panel', '1'),
(16, 1, 'session_tokens', 'a:2:{s:64:\"32206105c4cc981f9403aa12de7addedf7d17983cf86a818662ff397f7b7ebc0\";a:4:{s:10:\"expiration\";i:1581287122;s:2:\"ip\";s:9:\"127.0.0.1\";s:2:\"ua\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36\";s:5:\"login\";i:1581114322;}s:64:\"f1cfd06d382568507d72e6648e2bce1dfd559b202ac7db8029776a5560217d23\";a:4:{s:10:\"expiration\";i:1581287125;s:2:\"ip\";s:9:\"127.0.0.1\";s:2:\"ua\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36\";s:5:\"login\";i:1581114325;}}'),
(17, 1, 'wp_dashboard_quick_press_last_post_id', '4'),
(18, 1, 'community-events-location', 'a:1:{s:2:\"ip\";s:9:\"127.0.0.0\";}'),
(19, 1, '_woocommerce_tracks_anon_id', 'woo:3qs0dyOvIGZmIYPLJ0STyHli'),
(20, 1, 'wc_last_active', '1581033600'),
(21, 1, 'dismissed_install_notice', '1'),
(22, 1, 'managenav-menuscolumnshidden', 'a:5:{i:0;s:11:\"link-target\";i:1;s:11:\"css-classes\";i:2;s:3:\"xfn\";i:3;s:11:\"description\";i:4;s:15:\"title-attribute\";}'),
(23, 1, 'metaboxhidden_nav-menus', 'a:10:{i:0;s:21:\"add-post-type-product\";i:1;s:26:\"add-post-type-tribe_events\";i:2;s:12:\"add-post_tag\";i:3;s:15:\"add-post_format\";i:4;s:15:\"add-product_cat\";i:5;s:15:\"add-product_tag\";i:6;s:20:\"add-tribe_events_cat\";i:7;s:20:\"add-clients-category\";i:8;s:28:\"add-restaurant-menu-category\";i:9;s:25:\"add-testimonials-category\";}'),
(24, 1, 'tribe_setDefaultNavMenuBoxes', '1');

-- --------------------------------------------------------

--
-- Table structure for table `wp_users`
--

CREATE TABLE `wp_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'admin', '$P$BqkSMJzJXJjuKRKvLksgdGBp7NEDfv1', 'admin', 'binephrem@gmail.com', '', '2020-02-05 09:54:48', '', 0, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `wp_wc_download_log`
--

CREATE TABLE `wp_wc_download_log` (
  `download_log_id` bigint(20) UNSIGNED NOT NULL,
  `timestamp` datetime NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_ip_address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_wc_product_meta_lookup`
--

CREATE TABLE `wp_wc_product_meta_lookup` (
  `product_id` bigint(20) NOT NULL,
  `sku` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `virtual` tinyint(1) DEFAULT '0',
  `downloadable` tinyint(1) DEFAULT '0',
  `min_price` decimal(10,2) DEFAULT NULL,
  `max_price` decimal(10,2) DEFAULT NULL,
  `onsale` tinyint(1) DEFAULT '0',
  `stock_quantity` double DEFAULT NULL,
  `stock_status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'instock',
  `rating_count` bigint(20) DEFAULT '0',
  `average_rating` decimal(3,2) DEFAULT '0.00',
  `total_sales` bigint(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_wc_tax_rate_classes`
--

CREATE TABLE `wp_wc_tax_rate_classes` (
  `tax_rate_class_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_wc_tax_rate_classes`
--

INSERT INTO `wp_wc_tax_rate_classes` (`tax_rate_class_id`, `name`, `slug`) VALUES
(1, 'Reduced rate', 'reduced-rate'),
(2, 'Zero rate', 'zero-rate');

-- --------------------------------------------------------

--
-- Table structure for table `wp_wc_webhooks`
--

CREATE TABLE `wp_wc_webhooks` (
  `webhook_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `delivery_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_created_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `api_version` smallint(4) NOT NULL,
  `failure_count` smallint(10) NOT NULL DEFAULT '0',
  `pending_delivery` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_api_keys`
--

CREATE TABLE `wp_woocommerce_api_keys` (
  `key_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permissions` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consumer_key` char(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consumer_secret` char(43) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nonces` longtext COLLATE utf8mb4_unicode_ci,
  `truncated_key` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_access` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_attribute_taxonomies`
--

CREATE TABLE `wp_woocommerce_attribute_taxonomies` (
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_label` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_orderby` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_public` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_downloadable_product_permissions`
--

CREATE TABLE `wp_woocommerce_downloadable_product_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `download_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `order_key` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `downloads_remaining` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_granted` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `access_expires` datetime DEFAULT NULL,
  `download_count` bigint(20) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_log`
--

CREATE TABLE `wp_woocommerce_log` (
  `log_id` bigint(20) UNSIGNED NOT NULL,
  `timestamp` datetime NOT NULL,
  `level` smallint(4) NOT NULL,
  `source` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `context` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_order_itemmeta`
--

CREATE TABLE `wp_woocommerce_order_itemmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_order_items`
--

CREATE TABLE `wp_woocommerce_order_items` (
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `order_item_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_item_type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `order_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_payment_tokenmeta`
--

CREATE TABLE `wp_woocommerce_payment_tokenmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `payment_token_id` bigint(20) UNSIGNED NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_payment_tokens`
--

CREATE TABLE `wp_woocommerce_payment_tokens` (
  `token_id` bigint(20) UNSIGNED NOT NULL,
  `gateway_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_sessions`
--

CREATE TABLE `wp_woocommerce_sessions` (
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `session_key` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_expiry` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_woocommerce_sessions`
--

INSERT INTO `wp_woocommerce_sessions` (`session_id`, `session_key`, `session_value`, `session_expiry`) VALUES
(2, '1', 'a:7:{s:4:\"cart\";s:6:\"a:0:{}\";s:11:\"cart_totals\";s:367:\"a:15:{s:8:\"subtotal\";i:0;s:12:\"subtotal_tax\";i:0;s:14:\"shipping_total\";i:0;s:12:\"shipping_tax\";i:0;s:14:\"shipping_taxes\";a:0:{}s:14:\"discount_total\";i:0;s:12:\"discount_tax\";i:0;s:19:\"cart_contents_total\";i:0;s:17:\"cart_contents_tax\";i:0;s:19:\"cart_contents_taxes\";a:0:{}s:9:\"fee_total\";i:0;s:7:\"fee_tax\";i:0;s:9:\"fee_taxes\";a:0:{}s:5:\"total\";i:0;s:9:\"total_tax\";i:0;}\";s:15:\"applied_coupons\";s:6:\"a:0:{}\";s:22:\"coupon_discount_totals\";s:6:\"a:0:{}\";s:26:\"coupon_discount_tax_totals\";s:6:\"a:0:{}\";s:21:\"removed_cart_contents\";s:6:\"a:0:{}\";s:8:\"customer\";s:707:\"a:26:{s:2:\"id\";s:1:\"1\";s:13:\"date_modified\";s:0:\"\";s:8:\"postcode\";s:0:\"\";s:4:\"city\";s:0:\"\";s:9:\"address_1\";s:0:\"\";s:7:\"address\";s:0:\"\";s:9:\"address_2\";s:0:\"\";s:5:\"state\";s:0:\"\";s:7:\"country\";s:2:\"GB\";s:17:\"shipping_postcode\";s:0:\"\";s:13:\"shipping_city\";s:0:\"\";s:18:\"shipping_address_1\";s:0:\"\";s:16:\"shipping_address\";s:0:\"\";s:18:\"shipping_address_2\";s:0:\"\";s:14:\"shipping_state\";s:0:\"\";s:16:\"shipping_country\";s:2:\"GB\";s:13:\"is_vat_exempt\";s:0:\"\";s:19:\"calculated_shipping\";s:0:\"\";s:10:\"first_name\";s:0:\"\";s:9:\"last_name\";s:0:\"\";s:7:\"company\";s:0:\"\";s:5:\"phone\";s:0:\"\";s:5:\"email\";s:19:\"binephrem@gmail.com\";s:19:\"shipping_first_name\";s:0:\"\";s:18:\"shipping_last_name\";s:0:\"\";s:16:\"shipping_company\";s:0:\"\";}\";}', 1581287127);

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_shipping_zones`
--

CREATE TABLE `wp_woocommerce_shipping_zones` (
  `zone_id` bigint(20) UNSIGNED NOT NULL,
  `zone_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone_order` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_shipping_zone_locations`
--

CREATE TABLE `wp_woocommerce_shipping_zone_locations` (
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `zone_id` bigint(20) UNSIGNED NOT NULL,
  `location_code` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_type` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_shipping_zone_methods`
--

CREATE TABLE `wp_woocommerce_shipping_zone_methods` (
  `zone_id` bigint(20) UNSIGNED NOT NULL,
  `instance_id` bigint(20) UNSIGNED NOT NULL,
  `method_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_order` bigint(20) UNSIGNED NOT NULL,
  `is_enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_tax_rates`
--

CREATE TABLE `wp_woocommerce_tax_rates` (
  `tax_rate_id` bigint(20) UNSIGNED NOT NULL,
  `tax_rate_country` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tax_rate_state` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tax_rate` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tax_rate_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tax_rate_priority` bigint(20) UNSIGNED NOT NULL,
  `tax_rate_compound` int(1) NOT NULL DEFAULT '0',
  `tax_rate_shipping` int(1) NOT NULL DEFAULT '1',
  `tax_rate_order` bigint(20) UNSIGNED NOT NULL,
  `tax_rate_class` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_tax_rate_locations`
--

CREATE TABLE `wp_woocommerce_tax_rate_locations` (
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `location_code` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_rate_id` bigint(20) UNSIGNED NOT NULL,
  `location_type` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_yith_wcwl`
--

CREATE TABLE `wp_yith_wcwl` (
  `ID` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `wishlist_id` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT '0',
  `original_price` decimal(9,3) DEFAULT NULL,
  `original_currency` char(3) DEFAULT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `on_sale` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wp_yith_wcwl_lists`
--

CREATE TABLE `wp_yith_wcwl_lists` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `wishlist_slug` varchar(200) NOT NULL,
  `wishlist_name` text,
  `wishlist_token` varchar(64) NOT NULL,
  `wishlist_privacy` tinyint(1) NOT NULL DEFAULT '0',
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expiration` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_comments`
--
ALTER TABLE `wp_comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `comment_post_ID` (`comment_post_ID`),
  ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  ADD KEY `comment_date_gmt` (`comment_date_gmt`),
  ADD KEY `comment_parent` (`comment_parent`),
  ADD KEY `comment_author_email` (`comment_author_email`(10)),
  ADD KEY `woo_idx_comment_type` (`comment_type`);

--
-- Indexes for table `wp_links`
--
ALTER TABLE `wp_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `link_visible` (`link_visible`);

--
-- Indexes for table `wp_options`
--
ALTER TABLE `wp_options`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `option_name` (`option_name`),
  ADD KEY `autoload` (`autoload`);

--
-- Indexes for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_posts`
--
ALTER TABLE `wp_posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`);

--
-- Indexes for table `wp_revslider_css`
--
ALTER TABLE `wp_revslider_css`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `wp_revslider_css_bkp`
--
ALTER TABLE `wp_revslider_css_bkp`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `wp_revslider_layer_animations`
--
ALTER TABLE `wp_revslider_layer_animations`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `wp_revslider_layer_animations_bkp`
--
ALTER TABLE `wp_revslider_layer_animations_bkp`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `wp_revslider_navigations`
--
ALTER TABLE `wp_revslider_navigations`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `wp_revslider_navigations_bkp`
--
ALTER TABLE `wp_revslider_navigations_bkp`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `wp_revslider_sliders`
--
ALTER TABLE `wp_revslider_sliders`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `wp_revslider_sliders_bkp`
--
ALTER TABLE `wp_revslider_sliders_bkp`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `wp_revslider_slides`
--
ALTER TABLE `wp_revslider_slides`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `wp_revslider_slides_bkp`
--
ALTER TABLE `wp_revslider_slides_bkp`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `wp_revslider_static_slides`
--
ALTER TABLE `wp_revslider_static_slides`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `wp_revslider_static_slides_bkp`
--
ALTER TABLE `wp_revslider_static_slides_bkp`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `wp_sbi_instagram_feeds_posts`
--
ALTER TABLE `wp_sbi_instagram_feeds_posts`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `feed_id` (`feed_id`(100));

--
-- Indexes for table `wp_sbi_instagram_posts`
--
ALTER TABLE `wp_sbi_instagram_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_terms`
--
ALTER TABLE `wp_terms`
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `slug` (`slug`(191)),
  ADD KEY `name` (`name`(191));

--
-- Indexes for table `wp_term_relationships`
--
ALTER TABLE `wp_term_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Indexes for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  ADD PRIMARY KEY (`term_taxonomy_id`),
  ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  ADD KEY `taxonomy` (`taxonomy`);

--
-- Indexes for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  ADD PRIMARY KEY (`umeta_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_users`
--
ALTER TABLE `wp_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- Indexes for table `wp_wc_download_log`
--
ALTER TABLE `wp_wc_download_log`
  ADD PRIMARY KEY (`download_log_id`),
  ADD KEY `permission_id` (`permission_id`),
  ADD KEY `timestamp` (`timestamp`);

--
-- Indexes for table `wp_wc_product_meta_lookup`
--
ALTER TABLE `wp_wc_product_meta_lookup`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `virtual` (`virtual`),
  ADD KEY `downloadable` (`downloadable`),
  ADD KEY `stock_status` (`stock_status`),
  ADD KEY `stock_quantity` (`stock_quantity`),
  ADD KEY `onsale` (`onsale`),
  ADD KEY `min_max_price` (`min_price`,`max_price`);

--
-- Indexes for table `wp_wc_tax_rate_classes`
--
ALTER TABLE `wp_wc_tax_rate_classes`
  ADD PRIMARY KEY (`tax_rate_class_id`),
  ADD UNIQUE KEY `slug` (`slug`(191));

--
-- Indexes for table `wp_wc_webhooks`
--
ALTER TABLE `wp_wc_webhooks`
  ADD PRIMARY KEY (`webhook_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `wp_woocommerce_api_keys`
--
ALTER TABLE `wp_woocommerce_api_keys`
  ADD PRIMARY KEY (`key_id`),
  ADD KEY `consumer_key` (`consumer_key`),
  ADD KEY `consumer_secret` (`consumer_secret`);

--
-- Indexes for table `wp_woocommerce_attribute_taxonomies`
--
ALTER TABLE `wp_woocommerce_attribute_taxonomies`
  ADD PRIMARY KEY (`attribute_id`),
  ADD KEY `attribute_name` (`attribute_name`(20));

--
-- Indexes for table `wp_woocommerce_downloadable_product_permissions`
--
ALTER TABLE `wp_woocommerce_downloadable_product_permissions`
  ADD PRIMARY KEY (`permission_id`),
  ADD KEY `download_order_key_product` (`product_id`,`order_id`,`order_key`(16),`download_id`),
  ADD KEY `download_order_product` (`download_id`,`order_id`,`product_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `user_order_remaining_expires` (`user_id`,`order_id`,`downloads_remaining`,`access_expires`);

--
-- Indexes for table `wp_woocommerce_log`
--
ALTER TABLE `wp_woocommerce_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `level` (`level`);

--
-- Indexes for table `wp_woocommerce_order_itemmeta`
--
ALTER TABLE `wp_woocommerce_order_itemmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `order_item_id` (`order_item_id`),
  ADD KEY `meta_key` (`meta_key`(32));

--
-- Indexes for table `wp_woocommerce_order_items`
--
ALTER TABLE `wp_woocommerce_order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `wp_woocommerce_payment_tokenmeta`
--
ALTER TABLE `wp_woocommerce_payment_tokenmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `payment_token_id` (`payment_token_id`),
  ADD KEY `meta_key` (`meta_key`(32));

--
-- Indexes for table `wp_woocommerce_payment_tokens`
--
ALTER TABLE `wp_woocommerce_payment_tokens`
  ADD PRIMARY KEY (`token_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `wp_woocommerce_sessions`
--
ALTER TABLE `wp_woocommerce_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD UNIQUE KEY `session_key` (`session_key`);

--
-- Indexes for table `wp_woocommerce_shipping_zones`
--
ALTER TABLE `wp_woocommerce_shipping_zones`
  ADD PRIMARY KEY (`zone_id`);

--
-- Indexes for table `wp_woocommerce_shipping_zone_locations`
--
ALTER TABLE `wp_woocommerce_shipping_zone_locations`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `location_id` (`location_id`),
  ADD KEY `location_type_code` (`location_type`(10),`location_code`(20));

--
-- Indexes for table `wp_woocommerce_shipping_zone_methods`
--
ALTER TABLE `wp_woocommerce_shipping_zone_methods`
  ADD PRIMARY KEY (`instance_id`);

--
-- Indexes for table `wp_woocommerce_tax_rates`
--
ALTER TABLE `wp_woocommerce_tax_rates`
  ADD PRIMARY KEY (`tax_rate_id`),
  ADD KEY `tax_rate_country` (`tax_rate_country`),
  ADD KEY `tax_rate_state` (`tax_rate_state`(2)),
  ADD KEY `tax_rate_class` (`tax_rate_class`(10)),
  ADD KEY `tax_rate_priority` (`tax_rate_priority`);

--
-- Indexes for table `wp_woocommerce_tax_rate_locations`
--
ALTER TABLE `wp_woocommerce_tax_rate_locations`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `tax_rate_id` (`tax_rate_id`),
  ADD KEY `location_type_code` (`location_type`(10),`location_code`(20));

--
-- Indexes for table `wp_yith_wcwl`
--
ALTER TABLE `wp_yith_wcwl`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `wp_yith_wcwl_lists`
--
ALTER TABLE `wp_yith_wcwl_lists`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `wishlist_token` (`wishlist_token`),
  ADD KEY `wishlist_slug` (`wishlist_slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_comments`
--
ALTER TABLE `wp_comments`
  MODIFY `comment_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wp_links`
--
ALTER TABLE `wp_links`
  MODIFY `link_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_options`
--
ALTER TABLE `wp_options`
  MODIFY `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=859;

--
-- AUTO_INCREMENT for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `wp_posts`
--
ALTER TABLE `wp_posts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `wp_revslider_css`
--
ALTER TABLE `wp_revslider_css`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `wp_revslider_css_bkp`
--
ALTER TABLE `wp_revslider_css_bkp`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `wp_revslider_layer_animations`
--
ALTER TABLE `wp_revslider_layer_animations`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_revslider_layer_animations_bkp`
--
ALTER TABLE `wp_revslider_layer_animations_bkp`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_revslider_navigations`
--
ALTER TABLE `wp_revslider_navigations`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_revslider_navigations_bkp`
--
ALTER TABLE `wp_revslider_navigations_bkp`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_revslider_sliders`
--
ALTER TABLE `wp_revslider_sliders`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_revslider_sliders_bkp`
--
ALTER TABLE `wp_revslider_sliders_bkp`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_revslider_slides`
--
ALTER TABLE `wp_revslider_slides`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_revslider_slides_bkp`
--
ALTER TABLE `wp_revslider_slides_bkp`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_revslider_static_slides`
--
ALTER TABLE `wp_revslider_static_slides`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_revslider_static_slides_bkp`
--
ALTER TABLE `wp_revslider_static_slides_bkp`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_sbi_instagram_feeds_posts`
--
ALTER TABLE `wp_sbi_instagram_feeds_posts`
  MODIFY `record_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_sbi_instagram_posts`
--
ALTER TABLE `wp_sbi_instagram_posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_terms`
--
ALTER TABLE `wp_terms`
  MODIFY `term_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  MODIFY `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  MODIFY `umeta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `wp_users`
--
ALTER TABLE `wp_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wp_wc_download_log`
--
ALTER TABLE `wp_wc_download_log`
  MODIFY `download_log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_wc_tax_rate_classes`
--
ALTER TABLE `wp_wc_tax_rate_classes`
  MODIFY `tax_rate_class_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wp_wc_webhooks`
--
ALTER TABLE `wp_wc_webhooks`
  MODIFY `webhook_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_woocommerce_api_keys`
--
ALTER TABLE `wp_woocommerce_api_keys`
  MODIFY `key_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_woocommerce_attribute_taxonomies`
--
ALTER TABLE `wp_woocommerce_attribute_taxonomies`
  MODIFY `attribute_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_woocommerce_downloadable_product_permissions`
--
ALTER TABLE `wp_woocommerce_downloadable_product_permissions`
  MODIFY `permission_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_woocommerce_log`
--
ALTER TABLE `wp_woocommerce_log`
  MODIFY `log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_woocommerce_order_itemmeta`
--
ALTER TABLE `wp_woocommerce_order_itemmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_woocommerce_order_items`
--
ALTER TABLE `wp_woocommerce_order_items`
  MODIFY `order_item_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_woocommerce_payment_tokenmeta`
--
ALTER TABLE `wp_woocommerce_payment_tokenmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_woocommerce_payment_tokens`
--
ALTER TABLE `wp_woocommerce_payment_tokens`
  MODIFY `token_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_woocommerce_sessions`
--
ALTER TABLE `wp_woocommerce_sessions`
  MODIFY `session_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wp_woocommerce_shipping_zones`
--
ALTER TABLE `wp_woocommerce_shipping_zones`
  MODIFY `zone_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_woocommerce_shipping_zone_locations`
--
ALTER TABLE `wp_woocommerce_shipping_zone_locations`
  MODIFY `location_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_woocommerce_shipping_zone_methods`
--
ALTER TABLE `wp_woocommerce_shipping_zone_methods`
  MODIFY `instance_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_woocommerce_tax_rates`
--
ALTER TABLE `wp_woocommerce_tax_rates`
  MODIFY `tax_rate_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_woocommerce_tax_rate_locations`
--
ALTER TABLE `wp_woocommerce_tax_rate_locations`
  MODIFY `location_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_yith_wcwl`
--
ALTER TABLE `wp_yith_wcwl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_yith_wcwl_lists`
--
ALTER TABLE `wp_yith_wcwl_lists`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wp_wc_download_log`
--
ALTER TABLE `wp_wc_download_log`
  ADD CONSTRAINT `fk_wp_wc_download_log_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `wp_woocommerce_downloadable_product_permissions` (`permission_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
