-- phpMyAdmin SQL Dump
-- version 2.8.0.1
-- https://www.phpmyadmin.net
-- 
-- Host: custsql-ipg41.eigbox.net
-- Generation Time: May 05, 2017 at 12:57 PM
-- Server version: 5.6.32
-- PHP Version: 4.4.9
-- 
-- Database: `vadooempty`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `buddies`
-- 

CREATE TABLE `buddies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `friend` int(11) NOT NULL,
  `friend_status` tinyint(1) NOT NULL,
  `friend_timestamp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8 AUTO_INCREMENT=77 ;

-- 
-- Dumping data for table `buddies`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `buzzy_oauth_fb_users`
-- 

CREATE TABLE `buzzy_oauth_fb_users` (
  `id` varchar(200) NOT NULL DEFAULT '',
  `email` varchar(200) DEFAULT '',
  `first_name` varchar(200) DEFAULT '',
  `last_name` varchar(200) DEFAULT '',
  `gender` varchar(200) DEFAULT '',
  `link` varchar(200) DEFAULT '',
  `locale` varchar(200) DEFAULT '',
  `name` varchar(200) DEFAULT '',
  `timezone` varchar(200) DEFAULT '',
  `updated_time` varchar(200) DEFAULT '',
  `verified` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `buzzy_oauth_fb_users`
-- 

INSERT INTO `buzzy_oauth_fb_users` VALUES ('', '', '', '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzy_oauth_twtr_users`
-- 

CREATE TABLE `buzzy_oauth_twtr_users` (
  `oauth_provider` varchar(20) DEFAULT '',
  `oauth_uid` varchar(200) NOT NULL DEFAULT '',
  `oauth_token` varchar(200) DEFAULT '',
  `oauth_token_secret` varchar(200) DEFAULT '',
  `screen_name` varchar(200) DEFAULT '',
  PRIMARY KEY (`oauth_uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `buzzy_oauth_twtr_users`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyadmin`
-- 

CREATE TABLE `buzzyadmin` (
  `buzzyadmin_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyadmin_user` varchar(255) NOT NULL,
  `buzzyadmin_password` varchar(255) NOT NULL,
  `buzzyadmin_image` varchar(255) NOT NULL,
  PRIMARY KEY (`buzzyadmin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `buzzyadmin`
-- 

INSERT INTO `buzzyadmin` VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'superadmin.jpg');
INSERT INTO `buzzyadmin` VALUES (2, 'admin', '123123', 'superadmin.jpg');

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyalert_ip`
-- 

CREATE TABLE `buzzyalert_ip` (
  `buzzyalert_ipid` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyalert_ip` varchar(255) NOT NULL,
  `buzzyalert_iptimestamp` int(11) NOT NULL,
  `buzzyalert_attack` int(11) NOT NULL,
  `buzzyalert_attackfile` varchar(255) NOT NULL,
  PRIMARY KEY (`buzzyalert_ipid`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

-- 
-- Dumping data for table `buzzyalert_ip`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyamazonproducts`
-- 

CREATE TABLE `buzzyamazonproducts` (
  `buzzyamazonproduct_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyamazonproduct_title` varchar(255) NOT NULL,
  `buzzyamazonproduct_imagel` varchar(255) NOT NULL,
  `buzzyamazonproduct_imagem` varchar(255) NOT NULL,
  `buzzyamazonproduct_images` varchar(255) NOT NULL,
  `buzzyamazonproduct_brand` varchar(255) NOT NULL,
  `buzzyamazonproduct_featone` varchar(255) NOT NULL,
  `buzzyamazonproduct_feattwo` varchar(255) NOT NULL,
  `buzzyamazonproduct_featthree` varchar(255) NOT NULL,
  `buzzyamazonproduct_featfour` varchar(255) NOT NULL,
  `buzzyamazonproduct_url` varchar(255) NOT NULL,
  `buzzyamazonproduct_price` varchar(255) NOT NULL,
  `buzzyarticle_special` int(11) NOT NULL,
  PRIMARY KEY (`buzzyamazonproduct_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `buzzyamazonproducts`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `buzzybgs`
-- 

CREATE TABLE `buzzybgs` (
  `buzzybg_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzybg` varchar(255) NOT NULL,
  `buzzybgimage` varchar(255) NOT NULL,
  PRIMARY KEY (`buzzybg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- 
-- Dumping data for table `buzzybgs`
-- 

INSERT INTO `buzzybgs` VALUES (1, 'Brick', 'brick');
INSERT INTO `buzzybgs` VALUES (2, 'Carbon', 'carbon');
INSERT INTO `buzzybgs` VALUES (3, 'Paper', 'paper');
INSERT INTO `buzzybgs` VALUES (4, 'Wall', 'wall');
INSERT INTO `buzzybgs` VALUES (5, 'Grid', 'grid');
INSERT INTO `buzzybgs` VALUES (6, 'Stripes', 'stripes');
INSERT INTO `buzzybgs` VALUES (7, 'Paisley', 'paisley');
INSERT INTO `buzzybgs` VALUES (8, 'Hornes', 'hornes');
INSERT INTO `buzzybgs` VALUES (10, 'Matter', 'matter');
INSERT INTO `buzzybgs` VALUES (9, 'Footprint', 'footprint');

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyblocked_ip`
-- 

CREATE TABLE `buzzyblocked_ip` (
  `buzzyblocked_ip_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyblocked_ip` varchar(255) NOT NULL,
  PRIMARY KEY (`buzzyblocked_ip_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `buzzyblocked_ip`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyblocks`
-- 

CREATE TABLE `buzzyblocks` (
  `buzzyblock_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyblocker_id` int(11) NOT NULL,
  `buzzyblocking_id` int(11) NOT NULL,
  PRIMARY KEY (`buzzyblock_id`)
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=latin1 AUTO_INCREMENT=99 ;

-- 
-- Dumping data for table `buzzyblocks`
-- 

INSERT INTO `buzzyblocks` VALUES (92, 14, 5);
INSERT INTO `buzzyblocks` VALUES (33, 5, 3);

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzybuzzga`
-- 

CREATE TABLE `buzzybuzzga` (
  `buzzybuzzga_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzybuzzga` text NOT NULL,
  PRIMARY KEY (`buzzybuzzga_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `buzzybuzzga`
-- 

INSERT INTO `buzzybuzzga` VALUES (1, 'U-');

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzychosenthemes`
-- 

CREATE TABLE `buzzychosenthemes` (
  `buzzychosentheme_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzytheme_id` int(11) NOT NULL,
  PRIMARY KEY (`buzzychosentheme_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `buzzychosenthemes`
-- 

INSERT INTO `buzzychosenthemes` VALUES (1, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyconnection`
-- 

CREATE TABLE `buzzyconnection` (
  `buzzyconnection_id` int(1) NOT NULL,
  `buzzyconnection_value` tinyint(1) NOT NULL,
  `buzzyconnection_timestamp` int(11) NOT NULL,
  PRIMARY KEY (`buzzyconnection_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `buzzyconnection`
-- 

INSERT INTO `buzzyconnection` VALUES (1, 1, 1479161469);

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzycss`
-- 

CREATE TABLE `buzzycss` (
  `buzzycss_id` int(11) NOT NULL,
  `buzzycss_color_css` varchar(30) NOT NULL,
  `buzzycss_color_css1` varchar(255) NOT NULL,
  `buzzycss_color_css2` varchar(255) NOT NULL,
  `buzzycss_color_css3` varchar(255) NOT NULL,
  `buzzycss_width` int(11) NOT NULL,
  `buzzycss_headings_font_family` varchar(50) NOT NULL,
  `buzzycss_body_font_family` varchar(50) NOT NULL,
  `buzzycss_bg` varchar(100) NOT NULL,
  `buzzycssmain_bg` varchar(255) NOT NULL,
  `buzzycss_bgrepeat` tinyint(1) NOT NULL,
  `buzzycsscont_style` varchar(255) NOT NULL,
  `buzzycss_style` varchar(255) NOT NULL,
  `buzzycss_loader` tinyint(1) NOT NULL,
  `buzzyjs_animation` tinyint(4) NOT NULL,
  `buzzycss_mobilenav` varchar(255) NOT NULL,
  `buzzycsspsize` varchar(255) NOT NULL,
  `buzzycssh1size` varchar(255) NOT NULL,
  `buzzycssh2size` varchar(255) NOT NULL,
  `buzzycssh3size` varchar(255) NOT NULL,
  `buzzycssh4size` varchar(255) NOT NULL,
  `buzzycssh5size` varchar(255) NOT NULL,
  `buzzycssh6size` varchar(255) NOT NULL,
  `buzzycss_headerstyle` tinyint(1) NOT NULL,
  `buzzycssland_bg` varchar(255) NOT NULL,
  PRIMARY KEY (`buzzycss_id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `buzzycss`
-- 

INSERT INTO `buzzycss` VALUES (0, 'AB0000', 'CF0000', '730000', 'EEEEEE', 1280, 'Roboto Condensed', 'Lato', 'brick.png', 'F5F5F5', 0, 'wide', 'white', 0, 1, 'mobile-nav0.png', '15px', '32px', '28px', '24px', '22px', '20px', '18px', 0, '');
INSERT INTO `buzzycss` VALUES (1, '1E5FE0', '1A53C4', '133D8F', 'DDF0F9', 960, 'Rubik', 'Droid Sans', 'brick', 'F5F5F5', 0, '', '', 0, 1, 'mobile-nav1.png', '14px', '36px', '32px', '24px', '18px', '16px', '16px', 0, '');
INSERT INTO `buzzycss` VALUES (2, '0FA7FF', '0E98E8', '0C8BD4', 'EEEEEE', 1280, 'Acme', 'Lato', 'brickwall.png', 'F5F5F5', 0, 'wide', 'white', 0, 1, 'mobile-nav2.png', '16px', '32px', '28px', '24px', '22px', '16px', '16px', 0, '');
INSERT INTO `buzzycss` VALUES (3, 'A31D1D', 'B52020', '7A1616', 'EEEEEE', 1280, 'Roboto Slab', 'Oxygen', 'white_wa.png', 'F5F5F5', 0, 'wide', 'white', 0, 1, 'mobile-nav3.png', '15px', '32px', '28px', '24px', '22px', '16px', '16px', 0, '');
INSERT INTO `buzzycss` VALUES (4, '4CA557', '418C4A', '2D6133', 'EEEEEE', 1280, 'Roboto Condensed', 'Lato', 'white_wa.png', 'F5F5F5', 0, 'wide', 'white', 0, 1, 'mobile-navgreen.png', '16px', '32px', '28px', '24px', '22px', '20px', '18px', 0, '');
INSERT INTO `buzzycss` VALUES (5, '631818', '7A1E1E', '400F0F', 'CFC7C4', 1280, 'Kreon', 'PT Serif', 'white_wa.png', 'E0D8D7', 0, 'wide', 'white', 0, 1, 'mobile-navba.png', '15px', '40px', '36px', '28px', '24px', '18px', '16px', 0, '');
INSERT INTO `buzzycss` VALUES (6, '3044A7', '2B3D96', '131B42', 'EDEDED', 1280, 'PT Sans', 'Roboto', 'white_wa.png', 'F5F5F5', 0, 'wide', 'white', 0, 1, 'mobile-navgreen.png', '16px', '32px', '28px', '24px', '22px', '20px', '18px', 0, '');
INSERT INTO `buzzycss` VALUES (7, '631818', '7A1E1E', '400F0F', 'CFC7C4', 1280, 'Kreon', 'PT Serif', 'white_wa.png', 'E0D8D7', 0, 'wide', 'white', 0, 1, 'mobile-navba.png', '15px', '40px', '36px', '28px', '24px', '18px', '16px', 0, '');

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzycurrencylist`
-- 

CREATE TABLE `buzzycurrencylist` (
  `buzzycurrencylist_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzycurrencylist_title` varchar(255) NOT NULL,
  `buzzycurrencylist_sign` varchar(255) NOT NULL,
  PRIMARY KEY (`buzzycurrencylist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

-- 
-- Dumping data for table `buzzycurrencylist`
-- 

INSERT INTO `buzzycurrencylist` VALUES (1, 'Australian Dollar', 'AUD');
INSERT INTO `buzzycurrencylist` VALUES (2, 'Brazilian Real', 'BRL');
INSERT INTO `buzzycurrencylist` VALUES (3, 'Canadian Dollar', 'CAD');
INSERT INTO `buzzycurrencylist` VALUES (4, 'Czech Koruna', 'CZK');
INSERT INTO `buzzycurrencylist` VALUES (5, 'Danish Krone', 'DKK');
INSERT INTO `buzzycurrencylist` VALUES (6, 'Euro', 'EUR');
INSERT INTO `buzzycurrencylist` VALUES (7, 'Hong Kong Dollar', 'HKD');
INSERT INTO `buzzycurrencylist` VALUES (8, 'Hungarian Forint', 'HUF');
INSERT INTO `buzzycurrencylist` VALUES (9, 'Israeli New Sheqel', 'ILS');
INSERT INTO `buzzycurrencylist` VALUES (10, 'Japanese Yen', 'JPY');
INSERT INTO `buzzycurrencylist` VALUES (11, 'Malaysian Ringgit', 'MYR');
INSERT INTO `buzzycurrencylist` VALUES (12, 'Mexican Peso', 'MXN');
INSERT INTO `buzzycurrencylist` VALUES (13, 'Norwegian Krone', 'NOK');
INSERT INTO `buzzycurrencylist` VALUES (14, 'New Zealand Dollar', 'NZD');
INSERT INTO `buzzycurrencylist` VALUES (15, 'Philippine Peso', 'PHP');
INSERT INTO `buzzycurrencylist` VALUES (16, 'Polish Zloty', 'PLN');
INSERT INTO `buzzycurrencylist` VALUES (17, 'Pound Sterling', 'GBP');
INSERT INTO `buzzycurrencylist` VALUES (18, 'Singapore Dollar', 'SGD');
INSERT INTO `buzzycurrencylist` VALUES (19, 'Swedish Krona', 'SEK');
INSERT INTO `buzzycurrencylist` VALUES (20, 'Swiss Franc', 'CHF');
INSERT INTO `buzzycurrencylist` VALUES (21, 'Taiwan New Dollar', 'TWD');
INSERT INTO `buzzycurrencylist` VALUES (22, 'Thai Baht', 'THB');
INSERT INTO `buzzycurrencylist` VALUES (23, 'Turkish Lira', 'TRY');
INSERT INTO `buzzycurrencylist` VALUES (24, 'U.S. Dollar', 'USD');

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzycustomlanguage`
-- 

CREATE TABLE `buzzycustomlanguage` (
  `buzzycustomlanguage_id` int(11) NOT NULL AUTO_INCREMENT,
  `sort_by` varchar(255) NOT NULL,
  `recent_news` varchar(255) NOT NULL,
  `most_popular_news` varchar(255) NOT NULL,
  `most_viewed_news` varchar(255) NOT NULL,
  `view_it` varchar(255) NOT NULL,
  `pin_it` varchar(255) NOT NULL,
  `pinned` varchar(255) NOT NULL,
  `search_news` varchar(255) NOT NULL,
  `all_categories` varchar(255) NOT NULL,
  `featured` varchar(255) NOT NULL,
  `home` varchar(255) NOT NULL,
  `my_profile` varchar(255) NOT NULL,
  `add_news` varchar(255) NOT NULL,
  `add_news_cat_count` varchar(255) NOT NULL,
  `my_pinned_news` varchar(255) NOT NULL,
  `sign_out` varchar(255) NOT NULL,
  `more` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `sign_in` varchar(255) NOT NULL,
  `sign_up` varchar(255) NOT NULL,
  `go_to_main_page` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `close` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `register` varchar(255) NOT NULL,
  `original_source` varchar(255) NOT NULL,
  `login_to_vote` varchar(255) NOT NULL,
  `vote_up_this_news` varchar(255) NOT NULL,
  `vote_down_this_news` varchar(255) NOT NULL,
  `you_have_already_voted` varchar(255) NOT NULL,
  `you_have_voted_succesfully` varchar(255) NOT NULL,
  `news_from_users_that_i_follow` varchar(255) NOT NULL,
  `view_all` varchar(255) NOT NULL,
  `views` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `add_cover_image` varchar(255) NOT NULL,
  `add_profile_image` varchar(255) NOT NULL,
  `add_your_cover_image_here` varchar(255) NOT NULL,
  `add_your_profile_image_here` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `user_info` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `user_news_count` varchar(255) NOT NULL,
  `uploaded_news` varchar(255) NOT NULL,
  `about_me` varchar(255) NOT NULL,
  `change_settings` varchar(255) NOT NULL,
  `start_upload` varchar(255) NOT NULL,
  `user_blocked_me` varchar(255) NOT NULL,
  `i_block_user` varchar(255) NOT NULL,
  `please_go_to` varchar(255) NOT NULL,
  `activate_your_profile` varchar(255) NOT NULL,
  `only_activated_users_can_send_msgs` varchar(255) NOT NULL,
  `follow_user` varchar(255) NOT NULL,
  `following` varchar(255) NOT NULL,
  `block_user` varchar(255) NOT NULL,
  `blocked` varchar(255) NOT NULL,
  `sent_mail_succesfully` varchar(255) NOT NULL,
  `send_mail_to_user` varchar(255) NOT NULL,
  `send_mail` varchar(255) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `add_news_title` varchar(255) NOT NULL,
  `select_category` varchar(255) NOT NULL,
  `news_url_here` varchar(255) NOT NULL,
  `add_news_url` varchar(255) NOT NULL,
  `title_tag_here` varchar(255) NOT NULL,
  `add_title_tag_here` varchar(255) NOT NULL,
  `news_source_name` varchar(255) NOT NULL,
  `add_news_source` varchar(255) NOT NULL,
  `news_source_url` varchar(255) NOT NULL,
  `add_news_source_url` varchar(255) NOT NULL,
  `write_your_news_here` varchar(255) NOT NULL,
  `submit_news` varchar(255) NOT NULL,
  `upload_news_image_here` varchar(255) NOT NULL,
  `edit_news` varchar(255) NOT NULL,
  `add_news_image` varchar(255) NOT NULL,
  `put_link_of_your_news_image` varchar(255) NOT NULL,
  `upload_image_from_your_computer` varchar(255) NOT NULL,
  `choose_upload_method` varchar(255) NOT NULL,
  `image_link_here` varchar(255) NOT NULL,
  `add_image_link` varchar(255) NOT NULL,
  `drop_image_here` varchar(255) NOT NULL,
  `no_users` varchar(255) NOT NULL,
  `select_contacts` varchar(255) NOT NULL,
  `filter_contacts` varchar(255) NOT NULL,
  `chats` varchar(255) NOT NULL,
  `contacts` varchar(255) NOT NULL,
  `last_seen_at` varchar(255) NOT NULL,
  `write` varchar(255) NOT NULL,
  `you` varchar(255) NOT NULL,
  `view_old_messages` varchar(255) NOT NULL,
  `unread` varchar(255) NOT NULL,
  `no_message` varchar(255) NOT NULL,
  `send` varchar(255) NOT NULL,
  `please_write` varchar(255) NOT NULL,
  `failed_proccess` varchar(255) NOT NULL,
  `typing` varchar(255) NOT NULL,
  `messagges` varchar(255) NOT NULL,
  `attach_photos` varchar(255) NOT NULL,
  `attach_files` varchar(255) NOT NULL,
  `allowed_files` varchar(255) NOT NULL,
  `limited_to` varchar(255) NOT NULL,
  `insert_coordinate` varchar(255) NOT NULL,
  `emoticons` varchar(255) NOT NULL,
  `wrong_login` varchar(255) NOT NULL,
  `registration_success` varchar(255) NOT NULL,
  `news_success` varchar(255) NOT NULL,
  `image_success_add` varchar(255) NOT NULL,
  `edit_news_success` varchar(255) NOT NULL,
  `privacy` varchar(255) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `trademarks` varchar(255) NOT NULL,
  `ads_area` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `my_points` varchar(255) NOT NULL,
  `gold_user` varchar(255) NOT NULL,
  `silver_user` varchar(255) NOT NULL,
  `bronze_user` varchar(255) NOT NULL,
  `regular_user` varchar(255) NOT NULL,
  `premium_membership` varchar(255) NOT NULL,
  `my_visitors` varchar(255) NOT NULL,
  `buy_coins` varchar(255) NOT NULL,
  `show` varchar(255) NOT NULL,
  `hide` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `enable` varchar(255) NOT NULL,
  `disable` varchar(255) NOT NULL,
  `countries` varchar(255) NOT NULL,
  `uploaded` varchar(255) NOT NULL,
  `this_week` varchar(255) NOT NULL,
  `this_month` varchar(255) NOT NULL,
  `this_year` varchar(255) NOT NULL,
  `news_from` varchar(255) NOT NULL,
  `no_news_from_country` varchar(255) NOT NULL,
  PRIMARY KEY (`buzzycustomlanguage_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `buzzycustomlanguage`
-- 

INSERT INTO `buzzycustomlanguage` VALUES (1, 'Sort by', 'Recent news', 'Most popular news', 'Most viewed news', 'View it', 'Pin it', 'Pinned', 'Search news', 'All categories', 'Featured', 'Home', 'My profile', 'Add news', 'Add news category count', 'My pinned news', 'Sign out', 'More', 'Login', 'Sign in', 'Sign up', 'Go to main page', 'Email', 'Password', 'Close', 'First name', 'Last name', 'Username', 'Date', 'Register', 'Original source', 'Login to vote', 'Vote up this news', 'Vote down this news', 'You have already voted', 'You have voted succesfully', 'News from users that I follow', 'View all', 'Views', 'Comments', 'Add cover image', 'Add profile image', 'Add your cover image here', 'Add your profile image here', 'Date of birth', 'User info', 'Locaton', 'User news count', 'Uploaded news', 'About me ', 'Change settings', 'Start upload', 'This user is blocking you from contacting.', 'You have blocked this user from contacting.', 'Please go to', 'and activate your profile to use all features.', 'Only activated users could send messages to other users.', 'Follow user!', 'Following', 'Block user!', 'Blocked', 'You have sent your mail succesfully.', 'Send mail to user', 'Send mail', 'News title', 'Add your news title here', 'Select category', 'news-url-here', 'Add your news url here', 'Title tag here(First keyword - second keyword | third keyword)', 'Add your news title tag here', 'News source name (Ex: BBC)', 'Add your news source here', 'News source url (Ex: https://www.bbc.com/some-news)', 'Add your news source url here', 'Write your news here...', 'Submit news', 'Upload news image here', 'Edit news', 'Add news image', 'Put link of your news image', 'Upload image from your computer', 'Choose upload image method', 'Image link here...', 'Add image link', 'Drop your image here', 'No users found', 'Read your messages by selecting contact on the left', 'Filter Contacts', 'Chats', 'Contacts', 'last seen at', 'Write', 'Write a message', 'You', 'View old messages', 'Unread', 'No messages', 'Send', 'Please write something to send', 'Failed to proccess request', 'Typing...', 'Messages', 'Attach Photos', 'Attach Files', 'Allowed files are', 'Limited to', 'Insert a google map coordinate', 'Emoticons', 'You must enter correct email and password...', 'You are registered user now. Activate your profile!', 'You have successfully uploaded image.', 'You have successfully updated your news.', 'Privacy policy', 'Terms of use', 'All rights reserved', 'Ads area', 'Tags', 'User points', 'Gold user', 'Silver user', 'Bronze user', 'Regular user', 'Premium membership', 'My visitors', 'Buy golden coins', 'Show', 'Hide', 'Full name', 'Enable', 'Disable', 'Countries', 'Uploaded', 'This week', 'This month', 'This year', 'News from', 'There is no news from this country');

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzycustomlanguages`
-- 

CREATE TABLE `buzzycustomlanguages` (
  `buzzycustomlanguages_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzycustomlanguages_name` varchar(255) NOT NULL,
  PRIMARY KEY (`buzzycustomlanguages_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `buzzycustomlanguages`
-- 

INSERT INTO `buzzycustomlanguages` VALUES (1, 'You have updated facebook images to your profile.');

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzycustompages`
-- 

CREATE TABLE `buzzycustompages` (
  `buzzycustompage_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzycustompage_title` varchar(255) NOT NULL,
  `buzzycustompage_url` varchar(255) NOT NULL,
  `buzzycustompage_text` text NOT NULL,
  PRIMARY KEY (`buzzycustompage_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `buzzycustompages`
-- 

INSERT INTO `buzzycustompages` VALUES (3, 'About us', 'about-us', '<p><img alt="" src="https://www.branko83.com/vadoo1208983/img/val.jpg" style="height:494px; width:940px" /></p>\r\n\r\n<h3><strong>Vadoo is the world&#39;s largest social network for meeting</strong></h3>\r\n\r\n<p><strong>Our mission is to provide people the best technology to meet - because happiness is greater when it is split.</strong></p>\r\n\r\n<p>We firmly believe that for each of us there is someone special. Vadoo has become the world&#39;s largest social network for meeting because we have created the best tools for connecting people. Years of experience we have gained important knowledge and a willingness to face the toughest challenges in the sphere of social networking, such as privacy and security of users. Always a step ahead of the competition, we have focused on fresh ideas and innovations among the first introducing today already standard features such as connectivity based on geolocation.</p>\r\n\r\n<div style="position:relative;padding-bottom:56.25%;padding-top:30px;height:0;overflow:hidden;"><iframe allowfullscreen="" frameborder="0" height="360" src="//www.youtube.com/embed/00c_c3w6vzE" style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;" width="640"></iframe></div>\r\n\r\n<p>&nbsp;</p>\r\n');

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyemoticons`
-- 

CREATE TABLE `buzzyemoticons` (
  `buzzyemoticon_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyemoticon_img` varchar(255) NOT NULL,
  `buzzyemoticon_element` varchar(255) NOT NULL,
  `buzzyemoticon_title` varchar(255) NOT NULL,
  PRIMARY KEY (`buzzyemoticon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `buzzyemoticons`
-- 

INSERT INTO `buzzyemoticons` VALUES (1, 'https://cdn4.iconfinder.com/data/icons/reaction/32/shy-24.png', '<img src="https://cdn4.iconfinder.com/data/icons/reaction/32/shy-24.png" />', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyemots`
-- 

CREATE TABLE `buzzyemots` (
  `buzzyemot_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyemot_sign` varchar(255) NOT NULL,
  `buzzyemot_title` varchar(255) NOT NULL,
  `buzzyemot_cat` int(11) NOT NULL,
  PRIMARY KEY (`buzzyemot_id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1 AUTO_INCREMENT=88 ;

-- 
-- Dumping data for table `buzzyemots`
-- 

INSERT INTO `buzzyemots` VALUES (1, 'em-smiley', ':)', 0);
INSERT INTO `buzzyemots` VALUES (2, 'em-pensive', ':(', 0);
INSERT INTO `buzzyemots` VALUES (3, 'em-stuck_out_tongue', ':P', 0);
INSERT INTO `buzzyemots` VALUES (4, 'em-angry', ':angry:', 0);
INSERT INTO `buzzyemots` VALUES (5, 'em-anguished', ':anguished:', 0);
INSERT INTO `buzzyemots` VALUES (6, 'em-astonished', ':astonished:', 0);
INSERT INTO `buzzyemots` VALUES (7, 'em-blush', ':blush:', 0);
INSERT INTO `buzzyemots` VALUES (8, 'em-cold_sweat', ':coldsweat:', 0);
INSERT INTO `buzzyemots` VALUES (9, 'em-confused', ':O', 0);
INSERT INTO `buzzyemots` VALUES (10, 'em-cry', ':cry:', 0);
INSERT INTO `buzzyemots` VALUES (11, 'em-dizzy_face', ':dizzyface:', 0);
INSERT INTO `buzzyemots` VALUES (12, 'em-expressionless', ':expressionless:', 0);
INSERT INTO `buzzyemots` VALUES (13, 'em-flushed', ':flushed:', 0);
INSERT INTO `buzzyemots` VALUES (14, 'em-grin', ':grin:', 0);
INSERT INTO `buzzyemots` VALUES (15, 'em-heart_eyes', ':hearteyes:', 0);
INSERT INTO `buzzyemots` VALUES (16, 'em-innocent', ':angel:', 0);
INSERT INTO `buzzyemots` VALUES (17, 'em-kissing_heart', ':*', 0);
INSERT INTO `buzzyemots` VALUES (18, 'em-laughing', ':laughing:', 0);
INSERT INTO `buzzyemots` VALUES (19, 'em-mask', ':mask:', 0);
INSERT INTO `buzzyemots` VALUES (20, 'em-sleeping', ':sleep:', 0);
INSERT INTO `buzzyemots` VALUES (21, 'em-smirk', ':smirk:', 0);
INSERT INTO `buzzyemots` VALUES (22, 'em-sob', ':sob:', 0);
INSERT INTO `buzzyemots` VALUES (23, 'em-stuck_out_tongue_winking_eye', ':stuckouttonguewinkingeye:', 0);
INSERT INTO `buzzyemots` VALUES (24, 'em-sun_with_face', ':sunwithface:', 0);
INSERT INTO `buzzyemots` VALUES (25, 'em-sunglasses', ':sunglasses:', 0);
INSERT INTO `buzzyemots` VALUES (26, 'em-wink', ';)', 0);
INSERT INTO `buzzyemots` VALUES (27, 'em---1', ':finger:', 0);
INSERT INTO `buzzyemots` VALUES (28, 'em--1', ':fingerdown:', 0);
INSERT INTO `buzzyemots` VALUES (29, 'em-apple', ':apple:', 0);
INSERT INTO `buzzyemots` VALUES (30, 'em-basketball', ':basketball:', 0);
INSERT INTO `buzzyemots` VALUES (31, 'em-bear', ':bear:', 0);
INSERT INTO `buzzyemots` VALUES (32, 'em-beer', ':beer:', 0);
INSERT INTO `buzzyemots` VALUES (33, 'em-bikini', ':bikini:', 0);
INSERT INTO `buzzyemots` VALUES (34, 'em-birthday', ':birthday:', 0);
INSERT INTO `buzzyemots` VALUES (35, 'em-blue_car', ':bluecar:', 0);
INSERT INTO `buzzyemots` VALUES (36, 'em-blue_heart', ':blueheart:', 0);
INSERT INTO `buzzyemots` VALUES (37, 'em-boar', ':boar:', 0);
INSERT INTO `buzzyemots` VALUES (38, 'em-boat', ':boat:', 0);
INSERT INTO `buzzyemots` VALUES (39, 'em-book', ':book:', 0);
INSERT INTO `buzzyemots` VALUES (40, 'em-boom', ':boom:', 0);
INSERT INTO `buzzyemots` VALUES (41, 'em-boot', ':boot:', 0);
INSERT INTO `buzzyemots` VALUES (42, 'em-bouquet', ':bouquet:', 0);
INSERT INTO `buzzyemots` VALUES (43, 'em-bow', ':bow:', 0);
INSERT INTO `buzzyemots` VALUES (44, 'em-boy', ':boy:', 0);
INSERT INTO `buzzyemots` VALUES (45, 'em-bullettrain_side', ':bullettrainside:', 0);
INSERT INTO `buzzyemots` VALUES (46, 'em-bus', ':bus:', 0);
INSERT INTO `buzzyemots` VALUES (47, 'em-cookie', ':cookie:', 0);
INSERT INTO `buzzyemots` VALUES (48, 'em-cop', ':cop:', 0);
INSERT INTO `buzzyemots` VALUES (49, 'em-corn', ':corn:', 0);
INSERT INTO `buzzyemots` VALUES (50, 'em-couple', ':couple:', 0);
INSERT INTO `buzzyemots` VALUES (51, 'em-cupid', ':cupid:', 0);
INSERT INTO `buzzyemots` VALUES (52, 'em-dog', ':dog:', 0);
INSERT INTO `buzzyemots` VALUES (53, 'em-hamburger', ':hamburger:', 0);
INSERT INTO `buzzyemots` VALUES (54, 'em-kiss', ':kisss:', 0);
INSERT INTO `buzzyemots` VALUES (55, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-37.png', ':premlazy:', 1);
INSERT INTO `buzzyemots` VALUES (56, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-1.png', ':premsun:', 1);
INSERT INTO `buzzyemots` VALUES (57, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-2.png', ':premstar:', 1);
INSERT INTO `buzzyemots` VALUES (58, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-3.png', ':premangry:', 1);
INSERT INTO `buzzyemots` VALUES (59, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-38.png', ':premlove:', 1);
INSERT INTO `buzzyemots` VALUES (60, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-18.png', ':premlaughh:', 1);
INSERT INTO `buzzyemots` VALUES (61, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-33.png', ':premsil:', 1);
INSERT INTO `buzzyemots` VALUES (62, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-34.png', ':premooh:', 1);
INSERT INTO `buzzyemots` VALUES (63, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-17.png', ':premwink:', 1);
INSERT INTO `buzzyemots` VALUES (64, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-19.png', ':premweird:', 1);
INSERT INTO `buzzyemots` VALUES (65, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-8.png', ':premttt:', 1);
INSERT INTO `buzzyemots` VALUES (66, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-24.png', ':premnnn:', 1);
INSERT INTO `buzzyemots` VALUES (67, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-20.png', ':premsweat:', 1);
INSERT INTO `buzzyemots` VALUES (68, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-25.png', ':premdumb:', 1);
INSERT INTO `buzzyemots` VALUES (69, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-35.png', ':premconfn:', 1);
INSERT INTO `buzzyemots` VALUES (70, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-19.png', ':premsily:', 1);
INSERT INTO `buzzyemots` VALUES (71, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-39.png', ':premsuprise:', 100);
INSERT INTO `buzzyemots` VALUES (72, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/Happy-Minion-Icon.png', ':minhappy:', 2);
INSERT INTO `buzzyemots` VALUES (73, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/despicable-me-2-Minion-icon-5.png', ':minbla:', 2);
INSERT INTO `buzzyemots` VALUES (74, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/Minion-reading-icon.png', ':minwrite:', 2);
INSERT INTO `buzzyemots` VALUES (75, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/Shy-Minion-icon.png', ':minthink:', 2);
INSERT INTO `buzzyemots` VALUES (76, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/Minion_icon.png', ':minfire:', 2);
INSERT INTO `buzzyemots` VALUES (77, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/superman-minion-icon.png', ':minsuper:', 2);
INSERT INTO `buzzyemots` VALUES (78, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/Curious-Minion-Icon.png', ':mincur:', 2);
INSERT INTO `buzzyemots` VALUES (79, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/Dancing-minion-icon.png', ':minafrika:', 2);
INSERT INTO `buzzyemots` VALUES (80, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/despicable-me-2-Minion-icon-7.png', ':minhi:', 2);
INSERT INTO `buzzyemots` VALUES (81, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/Angry-Minion-icon.png', ':minangry:', 2);
INSERT INTO `buzzyemots` VALUES (82, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/despicable-me-2-Minion-icon-6.png', ':minduck:', 2);
INSERT INTO `buzzyemots` VALUES (83, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/despicable-me-2-Minion-icon-1.png', ':mingay:', 2);
INSERT INTO `buzzyemots` VALUES (84, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/Minion-playing-golf-icon.png', ':minhat:', 2);
INSERT INTO `buzzyemots` VALUES (85, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/girl-minion-icon.png', ':mingirl:', 2);
INSERT INTO `buzzyemots` VALUES (86, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/despicable-me-2-Minion-icon-3.png', ':minbanana:', 2);
INSERT INTO `buzzyemots` VALUES (87, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/kungfu-Minion.png', ':minkungfu:', 2);

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyfakefilter`
-- 

CREATE TABLE `buzzyfakefilter` (
  `buzzyfakefilter_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyfakefilter_gender` int(11) NOT NULL,
  `buzzyfakefilter_agemin` int(11) NOT NULL,
  `buzzyfakefilter_agemax` int(11) NOT NULL,
  `buzzyfakefilter_country` int(11) NOT NULL,
  PRIMARY KEY (`buzzyfakefilter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `buzzyfakefilter`
-- 

INSERT INTO `buzzyfakefilter` VALUES (1, 0, 18, 80, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyfakeusers`
-- 

CREATE TABLE `buzzyfakeusers` (
  `buzzyfakeuser_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyfakeuser_firstname` varchar(255) NOT NULL,
  `buzzyfakeuser_lastname` varchar(255) NOT NULL,
  `buzzyfakeuser_image` varchar(255) NOT NULL,
  `buzzyfakeuser_email` varchar(255) NOT NULL,
  `buzzyfakeuser_birthdate` date NOT NULL,
  `buzzyfakeuser_age` int(11) NOT NULL,
  `buzzyfakeuser_location` varchar(255) NOT NULL,
  `buzzyfakeuser_genre` int(11) NOT NULL,
  `buzzyfakeuser_lat` varchar(255) NOT NULL,
  `buzzyfakeuser_long` varchar(255) NOT NULL,
  `buzzyfakeuser_insertedstatus` int(11) NOT NULL,
  PRIMARY KEY (`buzzyfakeuser_id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

-- 
-- Dumping data for table `buzzyfakeusers`
-- 

INSERT INTO `buzzyfakeusers` VALUES (1, 'Julie ', 'Butler', 'https://cdn.pixabay.com/photo/2014/11/05/20/43/girl-518327__340.jpg', 'julie.butler@test.com', '1987-12-16', 29, 'Edinburgh, United Kingdom', 1, '55.9532', '-3.1882', 0);
INSERT INTO `buzzyfakeusers` VALUES (2, 'Benjamin ', 'Carter', 'https://images.pexels.com/photos/78225/pexels-photo-78225.jpeg?h=350&auto=compress', 'benjamin.carter@emailtest.com', '1991-12-03', 25, 'Baltimore, MD, United States', 0, '39.2903', '-76.6121', 0);
INSERT INTO `buzzyfakeusers` VALUES (3, 'Rosie ', 'Walsh', 'https://images.pexels.com/photos/51969/model-female-girl-beautiful-51969.jpeg?h=350&auto=compress', 'rosie.walsh@testing.net', '1988-06-08', 28, 'London, United Kingdom', 1, '51.5073', '-0.1277', 0);
INSERT INTO `buzzyfakeusers` VALUES (4, 'Gabriel ', 'Albert', 'https://images.pexels.com/photos/65108/pexels-photo-65108.jpeg?h=350&auto=compress', 'gabriel.hunter@emailtest.com', '1983-07-20', 33, 'Barcelona, Spain', 0, '41.3850', '2.1734', 0);
INSERT INTO `buzzyfakeusers` VALUES (5, 'Rebecca', 'Blanchet', 'https://cdn.pixabay.com/photo/2014/10/13/18/10/girl-487093__340.jpg', 'rebecca.riley@testing.net', '1985-04-17', 31, 'Lyon, France', 1, '45.7640', '4.8356', 0);
INSERT INTO `buzzyfakeusers` VALUES (6, 'Tom ', 'Vaughn', 'https://images.pexels.com/photos/175701/pexels-photo-175701.jpeg?h=350&auto=compress', 'tom.vaughn@example.com', '1979-12-14', 37, 'Newcastle upon Tyne, United Kingdom', 0, '54.9782', '-1.617', 0);
INSERT INTO `buzzyfakeusers` VALUES (7, 'Ivana', 'Jovanovic', 'https://images.pexels.com/photos/227294/pexels-photo-227294.jpeg?h=350&auto=compress', 'ivana.jovanovic@testing.net', '1993-12-14', 23, 'Novi Sad, Serbia', 1, '45.2671', '19.8335', 0);
INSERT INTO `buzzyfakeusers` VALUES (8, 'Edward ', 'Pierce', 'https://images.pexels.com/photos/157966/person-young-man-beard-emotions-157966.jpeg?h=350&auto=compress', 'edward.pierce@test.com', '1975-06-11', 41, 'Toronto, ON, Canada', 0, '43.6532', '-79.3831', 0);
INSERT INTO `buzzyfakeusers` VALUES (9, 'Zoe ', 'Harrison', 'https://images.pexels.com/photos/119720/pexels-photo-119720.jpeg?h=350&auto=compress', 'zoe.harrison@test.com', '1993-04-13', 23, 'Helsinki, Finland', 1, '60.1698', '24.9383', 0);
INSERT INTO `buzzyfakeusers` VALUES (10, 'Stefan', 'Berger', 'https://images.pexels.com/photos/26731/pexels-photo-26731.jpg?h=350&auto=compress', 'anton.mitchell@fakemail.com', '1982-07-22', 34, 'Berlin, Germany', 0, '52.5200', '13.4049', 0);
INSERT INTO `buzzyfakeusers` VALUES (11, 'Janet ', 'Murphy', 'https://images.pexels.com/photos/94589/pexels-photo-94589.jpeg?h=350&auto=compress', 'janet.murphy@fakemail.com', '1992-09-12', 24, 'Melbourne, Victoria, Australia', 1, '-37.8136', '144.9630', 0);
INSERT INTO `buzzyfakeusers` VALUES (12, 'Sergei', 'Akulov', 'https://images.pexels.com/photos/28725/pexels-photo-28725.jpg?h=350&auto=compress', 'sergeiakulov@example.com', '1984-09-17', 32, 'Saint Petersburg, Russia', 0, '59.9342', '30.3350', 0);
INSERT INTO `buzzyfakeusers` VALUES (13, 'Emma', 'Peeters', 'https://images.pexels.com/photos/164262/pexels-photo-164262.jpeg?h=350&auto=compress&cs=tinysrgb', 'emmapeeters@example@gmail.com', '1988-04-04', 28, 'Antwerp, Belgium', 1, '51.2194', '4.4024', 0);
INSERT INTO `buzzyfakeusers` VALUES (14, 'Nela', 'Ivanic', 'https://cdn.pixabay.com/photo/2013/06/08/14/35/incredibly-123238__340.jpg', 'nelaivanic@example.com', '1996-08-20', 20, 'Zagreb, Croatia', 1, '45.8150', '15.9819', 0);
INSERT INTO `buzzyfakeusers` VALUES (15, 'Joane', 'Lee', 'https://cdn.pixabay.com/photo/2016/02/20/01/01/woman-1211441__340.jpg', 'joanelee@example.com', '1984-08-23', 32, 'Miami, FL, United States', 1, '25.7616', '-80.1917', 0);
INSERT INTO `buzzyfakeusers` VALUES (16, 'Gloria', 'Abate', 'https://cdn.pixabay.com/photo/2016/03/28/21/37/girl-1286993__340.jpg', 'gloriaabate@example.com', '1981-07-15', 35, 'Rome, Italy', 1, '41.9027', '12.4963', 0);
INSERT INTO `buzzyfakeusers` VALUES (17, 'Aysel', 'Bardakci', 'https://cdn.pixabay.com/photo/2016/11/25/11/44/erotic-1858210__340.jpg', 'bardakci@example.com', '1974-12-03', 42, 'Izmir, Turkey', 1, '38.4237', '27.1428', 0);
INSERT INTO `buzzyfakeusers` VALUES (18, 'Ann', 'Collins', 'https://cdn.pixabay.com/photo/2016/11/30/22/21/autumn-1874037__340.jpg', 'collinsann@gmail.com', '1991-08-13', 25, 'Liverpool, United Kingdom', 1, '53.4083', '-2.9915', 0);
INSERT INTO `buzzyfakeusers` VALUES (19, 'Alexina', 'Alan', 'https://cdn.pixabay.com/photo/2016/11/10/11/33/girl-1814087__340.jpg', 'alexina@example.com', '1993-06-09', 23, 'Dundee, United Kingdom', 1, '56.4620', '-2.9707', 0);
INSERT INTO `buzzyfakeusers` VALUES (20, 'Ana', 'Jovanovic', 'https://cdn.pixabay.com/photo/2016/11/10/12/32/model-1814199__340.jpg', 'anajovanovic@example.com', '1992-03-20', 24, 'Serbia, Belgrade', 1, '44.7865', '20.4489', 0);
INSERT INTO `buzzyfakeusers` VALUES (21, 'Nassim', 'Bishara', 'https://cdn.pixabay.com/photo/2015/08/11/19/38/model-885086__340.jpg', 'bishara@example.com', '1977-12-22', 39, 'Beirut Governorate, Lebanon', 0, '33.8886', '35.4954', 0);
INSERT INTO `buzzyfakeusers` VALUES (22, 'Jonh', 'Evans', 'https://cdn.pixabay.com/photo/2015/08/11/19/40/handsome-885096__340.jpg', 'evansevans@gmail.com', '1982-06-22', 34, 'Salt Lake City, UT, United States', 0, '40.7607', '-111.8910', 0);
INSERT INTO `buzzyfakeusers` VALUES (23, 'Jona', 'Noyola', 'https://cdn.pixabay.com/photo/2015/08/11/23/59/bikini-885382__340.jpg', 'noyolanoyola@example.com', '1994-05-10', 22, 'Gothenburg, Sweden', 1, '57.7088', '11.9745', 0);
INSERT INTO `buzzyfakeusers` VALUES (24, 'Marcela ', 'Nemcova', 'https://cdn.pixabay.com/photo/2016/11/21/16/01/attractive-1846127__340.jpg', 'marcelanemcova@example.com', '1994-12-22', 22, 'Brno, Czech Republic', 0, '49.1950', '16.6068', 0);
INSERT INTO `buzzyfakeusers` VALUES (25, 'Ena ', 'Tello Gutierrez', 'https://cdn.pixabay.com/photo/2016/03/09/12/10/woman-1246299__340.jpg', 'tellogutierrez@example.com', '1986-12-14', 30, 'Barcelona, Spain', 1, '41.3850', '2.1734', 0);
INSERT INTO `buzzyfakeusers` VALUES (26, 'Klementyna ', 'Dudek', 'https://cdn.pixabay.com/photo/2016/08/08/19/03/young-1579041__340.jpg', 'klementyna@example.com ', '1985-12-13', 31, 'Warsaw, Poland', 1, '52.2296', '21.0122', 0);
INSERT INTO `buzzyfakeusers` VALUES (27, 'Vuong ', 'Thi Lien Lau', 'https://cdn.pixabay.com/photo/2016/10/17/07/31/woman-1747098__340.jpg', 'thilienlau@example.com', '1973-03-14', 43, 'Hanoi, Vietnam', 1, '21.0277', '105.8341', 0);
INSERT INTO `buzzyfakeusers` VALUES (28, 'Amelie ', 'Beauchamp', 'https://cdn.pixabay.com/photo/2016/10/12/11/59/girl-1734257__340.jpg', 'ameliebeauchamp@example.com ', '1984-05-16', 32, 'Marseille, France', 1, '43.2964', '5.3697', 0);
INSERT INTO `buzzyfakeusers` VALUES (29, 'Frederikke ', 'Winther', 'https://cdn.pixabay.com/photo/2016/10/12/11/59/woman-1734255__340.jpg', 'frederikkewinther@example.com', '1986-05-23', 30, 'Copenhagen, Denmark', 1, '55.6760', '12.5683', 0);
INSERT INTO `buzzyfakeusers` VALUES (30, 'Jessica', 'Damn', 'https://cdn.pixabay.com/photo/2016/07/04/12/16/portrait-1496524__340.jpg', 'jessicadamn@example.com', '1991-06-12', 25, 'Seattle, WA, United States', 1, '47.6062', '-122.3320', 0);
INSERT INTO `buzzyfakeusers` VALUES (31, 'Ralf', 'Herzog', 'https://cdn.pixabay.com/photo/2016/07/24/19/16/tobias-sattler-1539081__340.jpg', 'ralfherzog@example.com', '1986-08-21', 30, 'Hamburg, Germany', 0, '53.5510', '9.9936', 0);
INSERT INTO `buzzyfakeusers` VALUES (32, 'Felipe', 'Dias Gomes', 'https://cdn.pixabay.com/photo/2016/07/13/08/29/white-1513923__340.jpg', 'diasgomes@example.com', '1983-09-21', 33, 'Rio de Janeiro, Brazil', 0, '-22.9068', '-43.1728', 0);
INSERT INTO `buzzyfakeusers` VALUES (33, 'Neftali', 'Cordero', 'https://cdn.pixabay.com/photo/2016/06/21/15/50/photo-1471331__340.jpg', 'neftalicordero@example.com', '1988-03-22', 28, 'Buenos Aires Province, Argentina', 1, '-37.2017', '-59.8410', 0);
INSERT INTO `buzzyfakeusers` VALUES (34, 'Miranda', 'Russo', 'https://cdn.pixabay.com/photo/2016/11/28/14/28/girl-1865157__340.jpg', 'mirandarusso@example.com', '1994-06-14', 22, 'Milan, Italy', 1, '45.4654', '9.1859', 0);
INSERT INTO `buzzyfakeusers` VALUES (35, 'Kathleen', 'Johnson', 'https://cdn.pixabay.com/photo/2014/10/03/06/26/female-471152__340.jpg', 'kathleenjohnson@example.com', '1993-02-16', 21, 'Dallas, TX, United States', 1, '32.7766', '-96.7969', 0);
INSERT INTO `buzzyfakeusers` VALUES (36, 'Ludmila', 'Dolezalova', 'https://cdn.pixabay.com/photo/2016/03/31/17/53/girl-1293985__340.jpg', 'ludmiladolezalova@example.com', '1994-06-22', 22, 'Brno, Czech Republic', 1, '49.1950', '16.6068', 0);
INSERT INTO `buzzyfakeusers` VALUES (37, 'Jeannine', 'Lemieux', 'https://cdn.pixabay.com/photo/2016/12/01/19/31/beautiful-1875990__340.jpg', 'jeanninelemieux@example.com', '1986-12-14', 30, 'Monaco-Ville, Monaco', 1, '43.7308', '7.4225', 0);
INSERT INTO `buzzyfakeusers` VALUES (38, 'Nancy', 'Fraser', 'https://cdn.pixabay.com/photo/2016/11/29/08/50/arid-1868523__340.jpg', 'nancyfraser@example.com', '1983-03-31', 33, 'Chicago, IL, United States', 1, '41.8781', '-87.6297', 0);
INSERT INTO `buzzyfakeusers` VALUES (39, 'Melissa', 'Sapp', 'https://cdn.pixabay.com/photo/2015/01/12/10/44/portrait-597173__340.jpg', 'melissasapp@example.com', '1988-07-14', 28, 'Manchester, United Kingdom', 1, '53.4807', '-2.2426', 0);
INSERT INTO `buzzyfakeusers` VALUES (40, 'Maya', 'Alekseeva', 'https://cdn.pixabay.com/photo/2016/11/25/16/27/girl-1858727__340.jpg', 'mayaalekseeva@example.com', '1995-05-17', 21, 'Moscow, Russia', 1, '55.7558', '37.6173', 0);
INSERT INTO `buzzyfakeusers` VALUES (41, 'Igor', 'Saric', 'https://cdn.pixabay.com/photo/2016/09/21/19/27/man-1685434__340.jpg', 'igorsaric@example.com', '1991-05-23', 25, 'Rijeka, Croatia', 0, '45.3270', '14.4421', 0);
INSERT INTO `buzzyfakeusers` VALUES (42, 'Phillipp', 'Unger', 'https://cdn.pixabay.com/photo/2016/09/21/21/36/sport-1685734__340.jpg', 'phillippunger@example.com', '1984-03-20', 32, 'Augsburg, Germany', 0, '48.3705', '10.8977', 0);
INSERT INTO `buzzyfakeusers` VALUES (43, 'Martin', 'Kuhn', 'https://cdn.pixabay.com/photo/2016/02/19/10/14/man-1209137__340.jpg', 'martinkuhn@example.com', '1977-09-07', 39, 'Bern, Switzerland', 0, '46.9479', '7.4474', 0);
INSERT INTO `buzzyfakeusers` VALUES (44, 'Aksel ', 'Kristiansen', 'https://cdn.pixabay.com/photo/2015/11/07/11/49/boy-1031527__340.jpg', 'hristiansen@example.com', '1993-12-30', 23, 'Oslo, Norway', 0, '59.9138', '10.7522', 0);
INSERT INTO `buzzyfakeusers` VALUES (45, 'Xenia', 'Medvedeva', 'https://cdn.pixabay.com/photo/2014/06/23/06/25/girl-375114__340.jpg', 'xeniamedvedeva@example.com', '1989-12-21', 27, 'Kharkiv, Kharkiv Oblast, Ukraine', 1, '49.9935', '36.2303', 0);
INSERT INTO `buzzyfakeusers` VALUES (46, 'Evelina', 'Varela Robledo', 'https://cdn.pixabay.com/photo/2016/11/12/17/25/girl-1819317__340.jpg', 'varelarobledo@example.com', '1997-12-16', 19, 'Madrid, Spain', 1, '40.4167', '-3.703', 0);
INSERT INTO `buzzyfakeusers` VALUES (47, 'Klaudia', 'Nowak', 'https://cdn.pixabay.com/photo/2014/12/12/07/38/girl-565137__340.jpg', 'klaudianowak@example.com', '1993-06-25', 23, 'Warsaw, Poland', 1, '52.2296', '21.0122', 0);
INSERT INTO `buzzyfakeusers` VALUES (48, 'Zlatica', 'Zakotnik', 'https://cdn.pixabay.com/photo/2014/12/15/13/40/smartphone-569076__340.jpg', 'zlaticazakotnik@example.com', '1991-03-29', 25, 'Maribor, Slovenia', 1, '46.5546', '15.6458', 0);
INSERT INTO `buzzyfakeusers` VALUES (49, 'Nora', 'Makkai', 'https://cdn.pixabay.com/photo/2016/11/29/08/11/beautiful-1868319__340.jpg', 'makkaiuu@example.com', '1985-03-15', 31, 'Budapest, Hungary', 1, '47.4979', '19.0402', 0);
INSERT INTO `buzzyfakeusers` VALUES (50, 'Erin', 'Stone', 'https://cdn.pixabay.com/photo/2016/11/30/22/18/autumn-1874027__340.jpg', 'erinstone@example.com', '1991-12-20', 25, 'Oxford, United Kingdom', 1, '51.7520', '-1.2577', 0);
INSERT INTO `buzzyfakeusers` VALUES (51, 'Debra', 'Motto', 'https://cdn.pixabay.com/photo/2016/03/31/09/28/model-1292342__340.jpg', 'debramoto@example.com', '1992-06-10', 24, 'Chicago, IL, United States', 1, '41.8781', '-87.6297', 0);
INSERT INTO `buzzyfakeusers` VALUES (52, 'Annelies', 'ter Maat', 'https://cdn.pixabay.com/photo/2015/03/25/15/42/girl-689160__340.jpg', 'annelies@example.com', '1988-03-16', 28, 'Amsterdam, Netherlands', 1, '52.3702', '4.8951', 0);
INSERT INTO `buzzyfakeusers` VALUES (53, 'Elise', 'Allan', 'https://cdn.pixabay.com/photo/2016/08/07/23/16/girl-1577330__340.jpg', 'allane@example.com', '1990-12-13', 26, 'London, United Kingdom', 1, '51.5073', '-0.1277', 0);
INSERT INTO `buzzyfakeusers` VALUES (54, 'Emanuela', 'Esposito', 'https://cdn.pixabay.com/photo/2015/11/26/22/28/girl-1064665__340.jpg', 'emanuelaesposito@example.com', '1983-07-28', 33, 'Rio de Janeiro, Brazil', 1, '-22.9068', '-43.1728', 0);
INSERT INTO `buzzyfakeusers` VALUES (55, 'Ebonie', 'Laurie', 'https://cdn.pixabay.com/photo/2014/09/04/10/45/girl-435444__340.jpg', 'ebonielaurie@example.com', '1995-06-15', 21, 'New York, United States', 1, '40.7127', '-74.0059', 0);
INSERT INTO `buzzyfakeusers` VALUES (56, 'Edita', 'Gutierrez Almanza', 'https://cdn.pixabay.com/photo/2016/03/30/06/03/girl-1290136__340.jpg', 'editaguti@example.com', '1984-05-17', 32, 'Madrid, Spain', 1, '40.4167', '-3.7037', 0);
INSERT INTO `buzzyfakeusers` VALUES (57, 'Hanna', 'Svejdova', 'https://cdn.pixabay.com/photo/2015/08/11/19/28/female-885078__340.jpg', 'hannasvejdova@example.com', '1993-06-17', 23, 'Brussels, Belgium', 1, '50.8503', '4.3517', 0);
INSERT INTO `buzzyfakeusers` VALUES (58, 'Eliza', 'Winchcombe', 'https://cdn.pixabay.com/photo/2015/02/09/18/53/women-630033__340.jpg', 'elizawinchcombe@example.com', '1991-05-16', 25, 'Perth, Western Australia, Australia', 1, '-31.9505', '115.8604', 0);
INSERT INTO `buzzyfakeusers` VALUES (59, 'Natalia', 'Sagy', 'https://cdn.pixabay.com/photo/2015/07/23/20/54/female-857535__340.jpg', 'sagy@example.com', '1986-12-07', 30, 'Budapest, Hungary', 1, '47.4979', '19.0402', 0);
INSERT INTO `buzzyfakeusers` VALUES (60, 'Djordje', 'Jovanovic', 'https://cdn.pixabay.com/photo/2016/05/11/01/50/business-man-1385050__340.jpg', 'djordjedjordje@example.com', '1976-08-12', 40, 'Novi Sad, Vojvodina', 0, '45.2671', '19.8335', 0);
INSERT INTO `buzzyfakeusers` VALUES (61, 'Virginie', 'Migneault', 'https://cdn.pixabay.com/photo/2014/04/26/04/33/woman-332279__340.jpg', 'virginiemigneault@example.com', '1984-08-17', 32, 'Lille, France', 1, '50.6292', '3.0572', 0);
INSERT INTO `buzzyfakeusers` VALUES (62, 'Sherry', 'Beyer', 'https://cdn.pixabay.com/photo/2015/10/26/14/09/model-1007185__340.jpg', 'sherrybeyer@example.com', '1981-01-14', 34, 'Boston, MA, United States', 1, '42.3600', '-71.0588', 0);
INSERT INTO `buzzyfakeusers` VALUES (63, 'Frank ', 'Adler', 'https://cdn.pixabay.com/photo/2016/11/18/19/07/adult-1836445__340.jpg', 'frankadler @example.com', '1979-06-27', 37, 'Berlin, Germany', 0, '52.5200', '13.4049', 0);
INSERT INTO `buzzyfakeusers` VALUES (64, 'Jin ', 'Tan', 'https://cdn.pixabay.com/photo/2016/09/07/16/38/portrait-1652023__340.jpg', 'jintan@example.com', '1983-06-30', 33, 'Zurich, Switzerland', 0, '47.3768', '8.5416', 0);
INSERT INTO `buzzyfakeusers` VALUES (65, 'Klimek', 'Maciejewski', 'https://cdn.pixabay.com/photo/2016/03/30/00/12/young-man-1289730__340.jpg', 'klimekmaciejewski@example.com', '1989-05-11', 27, 'Krakow, Poland', 0, '50.0646', '19.9449', 0);
INSERT INTO `buzzyfakeusers` VALUES (66, 'Giacomo', 'Lombardi', 'https://cdn.pixabay.com/photo/2016/02/09/22/29/man-1190560__340.jpg', 'giacomolombardi@example.com', '1978-07-13', 38, 'Napoli, Italy', 0, '40.8517', '14.2681', 0);
INSERT INTO `buzzyfakeusers` VALUES (67, 'Valdemar', 'Jakobsen', 'https://cdn.pixabay.com/photo/2015/05/07/23/33/man-757363__340.jpg', 'valdemarjakobsen@example.com', '1988-07-20', 28, 'Charleroi, Belgium', 0, '50.4108', '4.4446', 0);
INSERT INTO `buzzyfakeusers` VALUES (68, 'Cristoforo', 'Leiva', 'https://cdn.pixabay.com/photo/2015/08/11/22/17/model-885297__340.jpg', 'cristoforoleiva@example.com', '1992-06-18', 24, 'Majorca, Balearic Islands, Spain', 0, '39.6952', '3.0175', 0);
INSERT INTO `buzzyfakeusers` VALUES (69, 'Ivana', 'Jaric', 'https://cdn.pixabay.com/photo/2015/02/13/14/35/young-woman-635250__340.jpg', 'ivanajaric@example.com', '1993-06-10', 23, 'Zagreb, Croatia', 1, '45.8150', '15.9819', 0);
INSERT INTO `buzzyfakeusers` VALUES (70, 'Jovana', 'Petrovic', 'https://cdn.pixabay.com/photo/2016/03/23/03/55/beautiful-1274052__340.jpg', 'petrovicjojo@example.com', '1992-05-14', 24, 'Zemun, Belgrade', 1, '44.8532', '20.3555', 0);
INSERT INTO `buzzyfakeusers` VALUES (71, 'Aline', 'Pereira Ribeiro', 'https://cdn.pixabay.com/photo/2016/08/26/05/16/dr-1621286__340.jpg', 'alineribeiro@example.com', '1989-06-21', 27, 'Rio de Janeiro, Brazil', 1, '-22.9068', '-43.1728', 0);
INSERT INTO `buzzyfakeusers` VALUES (72, 'Wei ', 'Chin', 'https://cdn.pixabay.com/photo/2016/07/08/13/42/sexy-1504376__340.jpg', 'weichin@example.com', '1985-07-11', 31, 'Hong Kong Island, Hong Kong', 1, '22.2587', '114.1910', 0);
INSERT INTO `buzzyfakeusers` VALUES (73, 'Maria', 'Hunter', 'https://cdn.pixabay.com/photo/2015/07/02/12/33/girl-829083__340.jpg', 'huntermarr@example.com', '1987-12-24', 29, 'Los Angeles, CA, United States', 1, '34.0522', '-118.2436', 0);
INSERT INTO `buzzyfakeusers` VALUES (74, 'Madeleine', 'Haugen', 'https://cdn.pixabay.com/photo/2016/11/16/03/45/winter-1828083__340.jpg', 'haugenmadeleine@example.com', '1994-04-14', 22, 'Trondheim, Norway', 1, '63.4305', '10.3950', 0);
INSERT INTO `buzzyfakeusers` VALUES (75, 'Ruth', 'Willis', 'https://cdn.pixabay.com/photo/2015/07/03/14/05/make-up-830257__340.jpg', 'ruthwillis@example.com', '1988-06-15', 28, 'Portland, OR, United States', 1, '45.5230', '-122.6764', 0);
INSERT INTO `buzzyfakeusers` VALUES (76, 'Sarah', 'Duke', 'https://cdn.pixabay.com/photo/2015/06/03/11/57/woman-796339__340.jpg', 'sarahdukeduke@example.com', '1994-05-13', 22, 'New South Wales, Australia', 1, '-31.2532', '146.9210', 0);
INSERT INTO `buzzyfakeusers` VALUES (77, 'Lucie', 'Dvorackova', 'https://cdn.pixabay.com/photo/2016/11/29/09/29/beautiful-1868717__340.jpg', 'luciedvorackova@example.com', '1991-03-21', 25, 'Dubai - United Arab Emirates', 1, '25.2048', '55.2707', 0);
INSERT INTO `buzzyfakeusers` VALUES (78, 'Brigita', 'Marikova', 'https://cdn.pixabay.com/photo/2016/11/21/16/42/flora-1846372__340.jpg', 'marikovabrigita@example.com', '1994-05-20', 22, 'Prague, Czech Republic', 1, '50.0755', '14.4378', 0);
INSERT INTO `buzzyfakeusers` VALUES (79, 'Jovana', 'Stankovic', 'https://cdn.pixabay.com/photo/2016/08/17/13/01/girl-1600356__340.jpg', 'stankoviccjovana@example.com', '1992-06-19', 24, 'Serbia, Novi Sad', 1, '45.2671', '19.8335', 0);
INSERT INTO `buzzyfakeusers` VALUES (80, 'Joanne', 'Mills', 'https://cdn.pixabay.com/photo/2016/10/11/16/55/girl-1732101__340.jpg', 'joannemillss@example.com', '1997-12-01', 19, 'Miami, FL, United States', 1, '25.7616', '-80.1917', 0);
INSERT INTO `buzzyfakeusers` VALUES (81, 'Cynthia', 'Johns', 'https://cdn.pixabay.com/photo/2016/03/14/11/09/woman-1255321__340.jpg', 'cyntiaaaa@example.com', '1979-12-19', 37, 'New York, NY, United States', 1, '40.7127', '-74.0059', 0);
INSERT INTO `buzzyfakeusers` VALUES (82, 'Ester', 'Hladikova', 'https://cdn.pixabay.com/photo/2015/10/08/00/24/woman-977020__340.jpg', 'hladikovahla@example.com', '1994-06-16', 22, 'Prague, Czech Republic', 1, '50.0755', '14.4378', 0);
INSERT INTO `buzzyfakeusers` VALUES (83, 'Lena', 'Bosch', 'https://cdn.pixabay.com/photo/2012/12/03/11/21/girls-68522__340.jpg', 'lenalenabosch@gmail.com', '1990-12-07', 26, 'Nuremberg, Germany', 1, '49.4254', '11.0796', 0);
INSERT INTO `buzzyfakeusers` VALUES (84, 'Iliana ', 'Kulikova', 'https://cdn.pixabay.com/photo/2014/10/10/16/42/girl-483639__340.jpg', 'kulikovailiana@example.com', '1986-12-09', 30, 'Moscow, Russia', 1, '55.7558', '37.6173', 0);
INSERT INTO `buzzyfakeusers` VALUES (85, 'Eija', 'Heikkila', 'https://cdn.pixabay.com/photo/2015/06/09/09/47/girl-803148__340.jpg', 'heikkila@example.com', '1982-05-21', 34, 'Helsinki, Finland', 1, '60.1698', '24.9383', 0);
INSERT INTO `buzzyfakeusers` VALUES (86, 'Georgia', 'White', 'https://cdn.pixabay.com/photo/2015/05/24/09/13/blonde-781528__340.jpg', 'whitegeor@example.com', '1977-12-07', 39, 'Stockholm, Sweden', 1, '59.3293', '18.0685', 0);
INSERT INTO `buzzyfakeusers` VALUES (87, 'Gloria', 'Libby', 'https://cdn.pixabay.com/photo/2014/10/10/16/18/girl-483598__340.jpg', 'libbygloria@example.com', '1996-05-16', 20, 'Charlotte, NC, United States', 1, '35.2270', '-80.8431', 0);
INSERT INTO `buzzyfakeusers` VALUES (88, 'Alessandra', 'Toscano', 'https://cdn.pixabay.com/photo/2015/09/29/21/36/girl-964586__340.jpg', 'toscanoaleks@example.com', '1977-09-12', 39, 'Milan, Italy', 1, '45.4654', '9.1859', 0);
INSERT INTO `buzzyfakeusers` VALUES (89, 'Carole', 'Babin', 'https://cdn.pixabay.com/photo/2015/06/09/09/48/girl-803179__340.jpg', 'carolebabin@example.com', '1994-12-13', 22, 'Paris, France', 1, '48.8566', '2.3522', 0);
INSERT INTO `buzzyfakeusers` VALUES (90, 'Eline', 'Lindberg', 'https://cdn.pixabay.com/photo/2015/08/09/16/29/girl-881900__340.jpg', 'elinelindbergg@example.com', '1987-05-21', 29, 'Oslo, Norway', 1, '59.9138', '10.7522', 0);
INSERT INTO `buzzyfakeusers` VALUES (91, 'Alice', 'Young', 'https://cdn.pixabay.com/photo/2013/04/03/06/51/lingerie-99761__340.jpg', 'aliceyoungg@example.com', '1987-08-27', 29, 'Las Vegas, NV, United States', 1, '36.1699', '-115.1398', 0);
INSERT INTO `buzzyfakeusers` VALUES (92, 'Johanna ', 'Furst', 'https://cdn.pixabay.com/photo/2015/09/19/21/16/girl-947756__340.jpg', 'johannafurstt@example.com', '1991-08-22', 25, 'Nice, France', 1, '43.7101', '7.261', 0);
INSERT INTO `buzzyfakeusers` VALUES (93, 'Daniela', 'Zweig', 'https://cdn.pixabay.com/photo/2012/02/16/12/29/mademoiselle-13602__340.jpg', 'danielazweiggg@example.com', '1994-07-15', 22, 'Munich, Germany', 1, '48.1351', '11.5819', 0);
INSERT INTO `buzzyfakeusers` VALUES (94, 'Lucy', 'Navarro', 'https://cdn.pixabay.com/photo/2012/03/04/00/41/baby-22018__340.jpg', 'navvarronav@example.com', '1985-05-16', 31, 'Bilbao, Spain', 1, '43.2630', '-2.9349', 0);
INSERT INTO `buzzyfakeusers` VALUES (95, 'Mezan', 'Abaalom', 'https://cdn.pixabay.com/photo/2016/10/28/09/31/potrait-1777553__340.jpg', 'MezanAbaalom@example.com', '1986-06-03', 30, 'Lagos, Nigeria', 1, '6.5243', '3.3792', 0);
INSERT INTO `buzzyfakeusers` VALUES (96, 'Teresa', 'Alba', 'https://cdn.pixabay.com/photo/2014/08/20/16/34/woman-422638__340.jpg', 'albateres@example.com', '1983-04-14', 33, 'Buenos Aires Province, Argentina', 1, '-37.2017', '-59.8410', 0);
INSERT INTO `buzzyfakeusers` VALUES (97, 'Jamie', 'Bruce', 'https://cdn.pixabay.com/photo/2012/09/04/21/13/man-56087__340.jpg', 'JamieBruce@example.com', '1981-06-16', 35, 'Ipswich, United Kingdom', 0, '52.0567', '1.1482', 0);
INSERT INTO `buzzyfakeusers` VALUES (98, 'Aytok ', 'Karakoc', 'https://cdn.pixabay.com/photo/2016/09/21/21/49/sport-1685810__340.jpg', 'karakocayt@example.com', '1986-03-13', 30, 'Kusadasi, Aydin Province, Turkey', 0, '37.8579', '27.2610', 0);
INSERT INTO `buzzyfakeusers` VALUES (99, 'Benjamin ', 'Francis', 'https://cdn.pixabay.com/photo/2016/07/15/00/11/avatar-1517990__340.jpg', 'Francisfra@example.com', '1948-02-12', 68, 'Dayton, OH, United States', 0, '39.7589', '-84.1916', 0);
INSERT INTO `buzzyfakeusers` VALUES (100, 'Aleksandar', 'Milotic', 'https://cdn.pixabay.com/photo/2015/09/09/16/16/man-931724__340.jpg', 'miloticmilo@example.com', '1991-05-16', 25, 'Beograd, Serbia', 0, '44.7865', '20.4489', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyfakeusersusa`
-- 

CREATE TABLE `buzzyfakeusersusa` (
  `buzzyfakeuserusa_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyfakeuserusa_firstname` varchar(255) NOT NULL,
  `buzzyfakeuserusa_lastname` varchar(255) NOT NULL,
  `buzzyfakeuserusa_image` varchar(255) NOT NULL,
  `buzzyfakeuserusa_email` varchar(255) NOT NULL,
  `buzzyfakeuserusa_birthdate` date NOT NULL,
  `buzzyfakeuserusa_age` int(11) NOT NULL,
  `buzzyfakeuserusa_location` varchar(255) NOT NULL,
  `buzzyfakeuser_genre` int(11) NOT NULL,
  `buzzyfakeuserusa_lat` varchar(255) NOT NULL,
  `buzzyfakeuserusa_long` varchar(255) NOT NULL,
  `buzzyfakeuserusa_insertedstatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`buzzyfakeuserusa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

-- 
-- Dumping data for table `buzzyfakeusersusa`
-- 

INSERT INTO `buzzyfakeusersusa` VALUES (1, 'Laura', 'Reeves', 'https://images.pexels.com/photos/47346/portrait-blond-blondie-brunette-47346.jpeg?h=350&auto=compress', 'laurareeves@example.com', '1985-08-23', 31, 'Colorado Springs, CO, United States', 1, '38.8338', '-104.8213', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (2, 'Lisa', 'Grant', 'https://images.pexels.com/photos/165849/pexels-photo-165849.jpeg?h=350&auto=compress&cs=tinysrgb', 'grantlisalisa@example.com', '1993-12-15', 23, 'Sacramento, CA, United States', 1, '38.5815', '-121.4944', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (3, 'Tammy', 'Gilson', 'https://images.pexels.com/photos/141667/pexels-photo-141667.jpeg?h=350&auto=compress', 'tammygilson27@example.com', '1989-10-26', 27, 'San Jose, CA, United States', 1, '37.3382', '-121.8863', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (4, 'Karen', 'Houchin', 'https://images.pexels.com/photos/3566/woman-smartphone-girl-bus.jpg?h=350&auto=compress', 'karenhouchh@example.com', '1992-07-16', 24, 'Kansas City, MO, United States', 1, '39.0997', '-94.5785', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (5, 'Isabel', 'Broussard', 'https://images.pexels.com/photos/209699/pexels-photo-209699.jpeg?h=350&auto=compress&cs=tinysrgb', 'IsabelBBroussard@example.com', '1988-07-29', 28, 'Charlotte, NC, United States', 1, '35.2270', '-80.8431', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (6, 'Sandra', 'Singer', 'https://images.pexels.com/photos/53000/girl-beautiful-young-face-53000.jpeg?h=350&auto=compress', 'SandraJSinger@example.com', '1986-12-09', 30, 'Philadelphia, PA, United States', 1, '39.9525', '-75.1652', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (7, 'Elsie', 'Burns', 'https://images.pexels.com/photos/192181/pexels-photo-192181.jpeg?h=350&auto=compress', 'elsieburnsbbb@example.com', '1997-12-19', 19, 'New York, NY, United States', 1, '40.7127', '-74.0059', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (8, 'Ellie', 'Sunners', 'https://images.pexels.com/photos/21273/pexels-photo.jpg?h=350&auto=compress', 'EllieSunners232@example.com', '1980-06-27', 36, 'New York, NY, United States', 1, '40.7127', '-74.0059', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (9, 'Nancy', 'Washburn', 'https://images.pexels.com/photos/186703/pexels-photo-186703.jpeg?h=350&auto=compress', 'nancywashburn@example.com', '1991-08-22', 25, 'Minneapolis, MN, United States', 1, '44.9777', '-93.2650', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (10, 'Sabine', 'Weissmuller', 'https://images.pexels.com/photos/245388/pexels-photo-245388.jpeg?h=350&auto=compress&cs=tinysrgb', 'Weissmullersab@example.com', '1993-12-15', 23, 'Los Angeles, CA, United States', 1, '34.0522', '-118.2436', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (11, 'Zoe', 'Hardy', 'https://images.pexels.com/photos/207842/pexels-photo-207842.jpeg?h=350&auto=compress&cs=tinysrgb', 'zoehardy2133@example.com', '1988-05-20', 28, 'Phoenix, AZ, United States', 1, '33.4483', '-112.0740', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (12, 'Annie', 'Allison', 'https://images.pexels.com/photos/33111/author-jewellery-lipstick-eyelashes.jpg?h=350&auto=compress', 'AnnieRAllison@findspinn.com', '1968-12-26', 48, 'Washington, DC, United States', 1, '38.9071', '-77.0368', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (13, 'Denise', 'Caudill', 'https://images.pexels.com/photos/37546/woman-portrait-face-studio-37546.jpeg?h=350&auto=compress', 'DeniseRCaudill@genxrevsiew.com', '1987-07-15', 29, 'Brooklyn, NY, United States', 1, '40.6781', '-73.9441', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (14, 'Augusto', 'Zito', 'https://images.pexels.com/photos/160651/man-alster-hamburg-oud-160651.jpeg?h=350&auto=compress&cs=tinysrgb', 'augustozito@renterlocalcarss.com', '1981-05-14', 35, 'New York, NY, United States', 0, '40.7127', '-74.0059', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (15, 'Devin', 'Hartsell', 'https://images.pexels.com/photos/7823/selfie.jpg?h=350&auto=compress&cs=tinysrgb', 'DevinHartsell@example.com', '1984-06-14', 32, 'Miami, FL, United States', 0, '25.761', '-80.191', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (16, 'Charlene', 'Turney', 'https://images.pexels.com/photos/157920/woman-face-curly-hair-157920.jpeg?h=350&auto=compress', 'CharleneSTurney@dayrrrep.com', '1985-06-13', 31, 'Queens, NY, United States', 1, '40.7282', '-73.7948', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (17, 'Julie', 'Stanford', 'https://images.pexels.com/photos/157606/girl-black-dress-portrait-hair-157606.jpeg?h=350&auto=compress&cs=tinysrgb', 'JulieBStanford@rhssyta.com', '1987-08-20', 29, 'Pittsburgh, PA, United States', 1, '40.4406', '-79.9958', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (18, 'Barbara', 'Etheridge', 'https://images.pexels.com/photos/37834/woman-face-portrait-hood-37834.jpeg?h=350&auto=compress', 'BarbaraLEtheridge@telessworm.us', '1992-07-08', 24, 'Columbus, OH, United States', 1, '39.9611', '-82.9987', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (19, 'Gary', 'Jones', 'https://images.pexels.com/photos/131191/pexels-photo-131191.jpeg?h=350&auto=compress', 'GaryMssJones@teleworm.us', '1991-12-10', 25, 'St. Louis, MO, United States', 0, '38.6270', '-90.1994', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (20, 'Joseph', 'Teller', 'https://images.pexels.com/photos/194087/pexels-photo-194087.jpeg?h=350&auto=compress', 'JosephMTeller@dayrsep.com', '1992-05-22', 24, 'Denver, CO, United States', 0, '39.7392', '-104.9902', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (21, 'Natasha ', 'Ray', 'https://images.pexels.com/photos/3654/fashion-person-woman-summer.jpg?h=350&auto=compress', ' NatashaSssRay@rhyta.com', '1996-12-15', 20, 'Houston, TX, United States', 1, '29.7604', '-95.3698', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (22, 'Mary', 'McCullough', 'https://images.pexels.com/photos/25941/pexels-photo-25941.jpg?h=350&auto=compress', 'MaryPMcCullough@dayddrep.com', '1986-04-16', 30, 'Austin, TX, United States', 1, '30.2671', '-97.7430', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (23, 'James', 'Fessler', 'https://images.pexels.com/photos/7863/theme-portraits.jpg?h=350&auto=compress&cs=tinysrgb', 'JamesJFffessler@dayrep.com', '1993-05-12', 23, 'Indianapolis, IN, United States', 0, '39.7684', '-86.1580', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (24, 'Robert', 'Plaisance', 'https://images.pexels.com/photos/59576/pexels-photo-59576.jpeg?h=350&auto=compress', 'RobertCPllaisance@rhyta.com', '1987-08-18', 29, 'Kansas City, MO, United States', 0, '39.0997', '-94.5785', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (25, 'Patricia', 'Harms', 'https://images.pexels.com/photos/157961/portrait-smile-happy-faces-smiling-157961.jpeg?h=350&auto=compress&cs=tinysrgb', 'PatriciaCccHarms@rhyta.com', '1994-04-22', 22, 'Oklahoma City, OK, United States', 1, '35.4675', '-97.5164', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (26, 'Mary', 'Leigh', 'https://images.pexels.com/photos/59552/pexels-photo-59552.png?h=350&auto=compress', 'MaryBLeigh@asrmyspy.com', '1992-12-24', 24, 'Phoenix, AZ, United States', 1, '33.4483', '-112.0740', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (27, 'Alice', 'Ramirez', 'https://images.pexels.com/photos/206462/pexels-photo-206462.jpeg?h=350&auto=compress&cs=tinysrgb', 'AliceERRamirez@rhyta.com', '1988-07-21', 28, 'Los Angeles, CA, United States', 1, '34.0522', '-118.2436', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (28, 'Lynn', 'Alford', 'https://images.pexels.com/photos/157887/sunglasses-white-dress-fashion-model-157887.jpeg?h=350&auto=compress&cs=tinysrgb', 'LynnRaAlford@rhyta.com', '1985-05-15', 31, 'New York, NY, United States', 1, '40.7127', '-74.0059', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (29, 'Margaret', 'Kittrell', 'https://images.pexels.com/photos/160656/girl-lake-dress-white-160656.jpeg?h=350&auto=compress', 'MargaretTKssittrell@rhyta.com', '1996-06-13', 20, 'New Jersey, United States', 1, '40.0583', '-74.4056', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (30, 'Cynthia', 'Werner', 'https://image.freepik.com/free-photo/young-girl-posing-with-a-hand-on-her-neck-while-looking-at-her-phone_1157-1209.jpg', 'CynthiaCWerner@dayrrep.com', '1984-06-21', 32, 'Baltimore, MD, United States', 1, '39.2903', '-76.6121', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (31, 'Charlene', 'Lyles', 'https://image.freepik.com/free-photo/smiling-woman_1139-510.jpg', 'CharleneRLyles@aarmyspy.com', '1992-12-16', 24, 'Washington, DC, United States', 1, '38.9071', '-77.0368', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (32, 'Latasha', 'Spriggs', 'https://images.pexels.com/photos/235451/pexels-photo-235451.jpeg?h=350&auto=compress&cs=tinysrgb', 'LatashaaaJSpriggs@teleworm.us', '1990-12-11', 26, 'Philadelphia, PA, United States', 1, '39.9525', '-75.1652', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (33, 'Elizabeth', 'Womack', 'https://images.pexels.com/photos/8988/pexels-photo.jpeg?h=350&auto=compress', 'ShirleneneAWomack@dayrep.com', '1984-12-20', 32, 'Philadelphia, PA, United States', 1, '39.9525', '-75.1652', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (34, 'Tiffany', 'Reese', 'https://images.pexels.com/photos/247257/pexels-photo-247257.jpeg?h=350&auto=compress&cs=tinysrgb', 'tiffanyresses@example.com', '1987-04-15', 29, 'Columbus, OH, United States', 1, '39.9611', '-82.9987', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (35, 'Larissa', 'Gordon', 'https://images.pexels.com/photos/102602/pexels-photo-102602.jpeg?h=350&auto=compress', 'larissagordonddd@example.com', '1989-07-12', 27, 'Santa Barbara, CA, United States', 1, '34.4208', '-119.6981', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (36, 'Danielle', 'Hill', 'https://images.pexels.com/photos/160826/girl-dress-bounce-nature-160826.jpeg?h=350&auto=compress', 'daniellehill@goodexample.com', '1992-06-18', 24, 'San Francisco, CA, United States', 1, '37.7749', '-122.4194', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (37, 'Ada', 'Grimes', 'https://images.pexels.com/photos/36469/woman-person-flowers-wreaths.jpg?h=350&auto=compress', 'adagrimess@example.com', '1987-09-17', 29, 'Chicago, IL, United States', 1, '41.8781', '-87.6297', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (38, 'Jodie', 'Miller', 'https://images.pexels.com/photos/206533/pexels-photo-206533.jpeg?h=350&auto=compress&cs=tinysrgb', 'jodmiller88@example.com', '1991-06-13', 25, 'Nashville, TN, United States', 1, '36.1626', '-86.7816', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (39, 'Kiara', 'Collier', 'https://images.pexels.com/photos/7051/fashion-woman-girl-forest.jpg?h=350&auto=compress', 'kiaracollier@example.com', '1993-07-28', 23, 'Charlotte, NC, United States', 1, '35.2270', '-80.8431', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (40, 'Mia', 'Rogers', 'https://images.pexels.com/photos/108076/pexels-photo-108076.jpeg?h=350&auto=compress', 'rogersmiamia@example.com', '1990-08-16', 26, 'Jacksonville, FL, United States', 1, '30.3321', '-81.6556', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (41, 'Isabella', 'Lawson', 'https://images.pexels.com/photos/172757/pexels-photo-172757.jpeg?h=350&auto=compress', 'lawsonisabella@example.com', '1992-12-15', 24, 'Orlando, FL, United States', 1, '28.5383', '-81.3792', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (42, 'Abril', 'Huffman', 'https://images.pexels.com/photos/215966/pexels-photo-215966.jpeg?h=350&auto=compress', 'huffmanabril@example.com', '1980-12-18', 36, 'New York, NY, United States', 1, '40.7127', '-74.0059', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (43, 'Sienna', 'Read', 'https://lh6.ggpht.com/yQrpHkFWvWbgpdU8Oeu41prZVvNhlYBv7vSNK7Dvz_F-Q2SUcbZI5QqueVCbSdAQNpNL3GeghMU-QJikQg=s620', 'readsienna@example.com', '1988-08-18', 28, 'Richmond, VA, United States', 1, '37.5407', '-77.4360', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (44, 'Lola', 'James', 'https://cdn.pixabay.com/photo/2016/08/03/15/57/girl-1567057__340.jpg', 'lolajames@vwin.com', '1984-12-19', 32, 'Boston, MA, United States', 1, '42.3600', '-71.0588', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (45, 'Danielle', 'Carrillo', 'https://images.pexels.com/photos/26663/pexels-photo.jpg?h=350&auto=compress', 'carrillodd@example.com', '1992-07-23', 24, 'Dallas, TX, United States', 1, '32.7766', '-96.7969', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (46, 'Demi', 'Cooke', 'https://images.pexels.com/photos/27444/pexels-photo-27444.jpg?h=350&auto=compress', 'demicooke@example.com', '1987-06-10', 29, 'San Antonio, TX, United States', 1, '29.4241', '-98.4936', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (47, 'Natasha', 'Donaldson', 'https://images.pexels.com/photos/29261/pexels-photo-29261.jpg?h=350&auto=compress&cs=tinysrgb', 'donaldsonat@example.com', '1983-07-20', 30, 'Seattle, WA, United States', 1, '47.6062', '-122.3320', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (48, 'Millie', 'Roberts', 'https://www.stockvault.net/data/2009/01/04/107204/preview16.jpg', 'robertsss@example.com', '1989-05-18', 27, 'Atlanta, GA, United States', 1, '33.7489', '-84.3879', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (49, 'Anton', 'Santiago', 'https://www.stockvault.net/data/2011/08/09/126127/thumb16.jpg', 'antonsantiago@firstex.com', '1988-05-04', 28, 'Albuquerque, NM, United States', 0, '35.0853', '-106.6055', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (50, 'Arthur', 'Hart', 'https://www.stockvault.net/data/2012/09/22/135933/thumb16.jpg', 'arthurhart32@example.com', '1984-12-06', 32, 'Tucson, AZ, United States', 0, '32.2217', '-110.9264', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (51, 'Jodie', 'Lane', 'https://www.stockvault.net/data/2007/11/06/103797/thumb16.jpg', 'jodielanel@example.com', '1995-08-16', 21, 'San Diego, CA, United States', 1, '32.7157', '-117.1610', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (52, 'Robert', 'Crane', 'https://www.stockvault.net/data/2007/05/24/103180/thumb16.jpg', 'robertcranecra@example.com', '1986-05-15', 30, 'New York, NY, United States', 0, '40.7127', '-74.0059', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (53, 'Oliver', 'Valek', 'https://www.stockvault.net/data/2010/01/18/112807/thumb16.jpg', 'valekoli@example.com', '1976-07-15', 40, 'Atlanta, GA, United States', 0, '33.7489', '-84.3879', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (54, 'Max', 'Vilson', 'https://www.stockvault.net/data/2012/07/16/132770/thumb16.jpg', 'milanzemanm@example.com', '1964-06-17', 52, 'Detroit, MI, United States', 0, '42.3314', '-83.0457', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (55, 'Jasmine', 'Walker', 'https://www.stockvault.net/data/2011/04/07/121353/thumb16.jpg', 'jaswalkerwalk@example.com', '1980-05-22', 36, 'Indianapolis, IN, United States', 1, '39.7684', '-86.1580', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (56, 'Lydia', 'Clark', 'https://www.stockvault.net/data/2010/11/13/115976/preview16.jpg', 'clarklydia@example.com', '1973-08-17', 43, 'St. Louis, MO, United States', 1, '38.6270', '-90.1994', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (57, 'Emily', 'Dean', 'https://www.stockvault.net/data/2011/03/31/120702/thumb16.jpg', 'emilydeanyoung@example.com', '1995-05-19', 21, 'Salt Lake City, UT, United States', 1, '40.7607', '-111.8910', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (58, 'Jaida', 'Ellison', 'https://www.stockvault.net/data/2013/10/17/149371/thumb16.jpg', 'jaidabest@example.com', '1992-07-09', 24, 'Milwaukee, WI, United States', 1, '43.0389', '-87.9064', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (59, 'Hazeela', 'bin Hakeema', 'https://www.stockvault.net/data/2014/02/04/153142/thumb16.jpg', 'hazeelabinhak@example.com', '1986-06-18', 30, 'Tampa, FL, United States', 1, '27.9505', '-82.4571', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (60, 'Elvira', 'Franchetti', 'https://www.stockvault.net/data/2015/07/05/174416/thumb16.jpg', 'elvirafranch@example.com', '1987-04-17', 29, 'Memphis, TN, United States', 1, '35.1495', '-90.0489', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (61, 'Maria', 'Joyner', 'https://www.stockvault.net/data/2015/07/05/174391/preview16.jpg', 'mariajoyner32@example.com', '1984-05-17', 32, 'New Brunswick, NJ, United States', 1, '40.4862', '-74.4518', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (62, 'Elsie', 'Jones', 'https://www.stockvault.net/data/2015/10/17/180334/thumb16.jpg', 'elsiejones28@example.com', '1988-08-18', 28, 'Philadelphia, PA, United States', 1, '39.9525', '-75.1652', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (63, 'Alana', 'Mayo', 'https://www.stockvault.net/data/2016/03/15/187926/thumb16.jpg', 'alanamayoyo@example.com', '1989-07-20', 27, 'Pittsburgh, PA, United States', 1, '40.4406', '-79.9958', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (64, 'Larissa', 'Davies', 'https://www.stockvault.net/data/2016/04/17/193835/thumb16.jpg', 'larissadav@example.com', '1986-08-19', 30, 'Minneapolis, MN, United States', 1, '44.9777', '-93.2650', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (65, 'Alicia', 'Barlow', 'https://www.stockvault.net/data/2016/04/17/193796/thumb16.jpg', 'alicciabbb@example.com', '1990-08-15', 26, 'Denver, CO, United States', 1, '39.7392', '-104.9902', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (66, 'Charlize', 'Sloan', 'https://www.stockvault.net/data/2016/04/17/193726/thumb16.jpg', 'sloancharliz@example.com', '1992-06-18', 24, 'Salt Lake City, UT, United States', 1, '40.7607', '-111.8910', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (67, 'Matilda', 'Hamilton', 'https://www.stockvault.net/data/2016/08/09/206727/thumb16.jpg', 'matildahamiltonnn@example.com', '1979-04-19', 37, 'Oklahoma City, OK, United States', 1, '35.4675', '-97.5164', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (68, 'Anne', 'Dudley', 'https://www.stockvault.net/data/2016/12/18/218600/thumb16.jpg', 'annedudleyy@example.com', '1992-07-16', 24, 'El Paso, TX, United States', 1, '31.7618', '-106.4850', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (69, 'Anahi', 'Wagner', 'https://www.stockvault.net/data/2016/12/19/218704/thumb16.jpg', 'anahiwagner@example.com', '1988-12-22', 28, 'San Francisco, CA, United States', 1, '37.7749', '-122.4194', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (70, 'Amy', 'Castaneda', 'https://www.stockvault.net/data/2016/12/25/219526/thumb16.jpg', 'amycastaneda@example.com', '1993-08-19', 23, 'Sacramento, CA, United States', 1, '38.5815', '-121.4944', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (71, 'Curtis', 'Moreno', 'https://www.stockvault.net/data/2012/12/15/139073/thumb16.jpg', 'morenocurtis@example.com', '1985-08-14', 31, 'Iowa City, IA, United States', 0, '41.661128', '-91.530168', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (72, 'Kaydence', 'Gardner', 'https://www.stockvault.net/data/2010/03/15/113350/thumb16.jpg', 'gardnerkay@example.com', '1966-05-19', 51, 'Memphis, TN, United States', 1, '35.149534', '-90.048980', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (73, 'Lola', 'Hart', 'https://www.stockvault.net/data/2011/08/20/126289/thumb16.jpg', 'lolaharthh@example.com', '1974-06-13', 42, 'San Antonio, TX, United States', 1, '29.424122', '-98.493628', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (74, 'Jenny', 'Petersen', 'https://www.stockvault.net/data/2013/09/05/147703/thumb16.jpg', 'jennypetersenpet@example.com', '1984-08-15', 32, 'Phoenix, AZ, United States', 1, '33.448377', '-112.074037', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (75, 'Mia', 'Barker', 'https://images.pexels.com/photos/64024/girl-joy-smiling-face-64024.jpeg?h=350&auto=compress', 'miabarkerbek@example.com', '1994-07-14', 22, 'Nashville, TN, United States', 1, '36.162664', '-86.781602', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (76, 'Billy', 'Waller', 'https://images.pexels.com/photos/199937/pexels-photo-199937.jpeg?h=350&auto=compress&cs=tinysrgb', 'billywall@example.com', '1985-09-19', 31, 'Columbus, OH, United States', 0, '39.961176', '-82.998794', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (77, 'Rebecca', 'Johnston', 'https://www.stockvault.net/data/2011/03/31/120702/thumb16.jpg', 'rebeccajonh@example.com', '1998-09-17', 18, 'Savannah, GA, United States', 1, '32.083541', '-81.099834', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (78, 'Sara', 'Little', 'https://www.stockvault.net/data/2016/04/11/193184/thumb16.jpg', 'saralittlelit@example.com', '1993-06-17', 23, 'New York, NY, United States', 1, '40.712784', '-74.005941', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (79, 'Maria', 'Barlow', 'https://www.stockvault.net/data/2016/04/11/193241/thumb16.jpg', 'mariabarlow@example.com', '1995-04-12', 21, 'Tampa, FL, United States', 1, '27.950575', '-82.457178', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (80, 'Kaia', 'Dixon', 'https://www.stockvault.net/data/2007/03/01/99773/thumb16.jpg', 'kaiadixon@example.com', '1987-04-15', 29, 'Philadelphia, PA, United States', 1, '39.952584', '-75.165222', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (81, 'Alisha', 'Douglas', 'https://www.stockvault.net/data/2008/06/02/105311/thumb16.jpg', 'douglasali@example.com', '1989-09-14', 27, 'Houston, TX, United States', 1, '29.760427', '-95.369803', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (82, 'Melanie', 'Brown', 'https://www.stockvault.net/data/2012/12/25/139337/thumb16.jpg', 'brownmellanie@example.com', '1994-06-16', 22, 'Austin, TX, United States', 1, '30.267153', '-97.743061', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (83, 'Audrey', 'Fisher', 'https://www.stockvault.net/data/2011/10/23/127617/thumb16.jpg', 'audreyfisher@example.com', '1974-04-18', 42, 'Dallas, TX, United States', 1, '32.776664', '-96.796988', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (84, 'Caitlin', 'Newman', 'https://www.stockvault.net/data/2016/12/19/218759/thumb16.jpg', 'caitlinnewman@example.com', '1990-05-17', 26, 'Pittsburgh, PA, United States', 1, '40.440625', '-79.995886', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (85, 'Sophia', 'Hall', 'https://www.stockvault.net/data/2016/12/19/218704/thumb16.jpg', 'sophiahall@example.com', '1987-05-14', 29, 'Washington, DC, United States', 1, '38.907192', '-77.036871', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (86, 'Isabelle', 'May', 'https://www.stockvault.net/data/2016/12/20/219007/thumb16.jpg', 'mayisabelle@example.com', '1990-04-19', 26, 'Cincinnati, OH, United States', 1, '39.103118', '-84.512020', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (87, 'Lara ', 'Moss', 'https://www.stockvault.net/data/2016/12/19/218747/thumb16.jpg', 'laramoss@example.com', '1990-12-18', 26, 'Los Angeles, CA, United States', 1, '34.052234', '-118.243685', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (88, 'Shannon', 'Stele', 'https://www.stockvault.net/data/2016/12/18/218670/thumb16.jpg', 'shannonsteless@example.com', '1992-09-15', 25, 'Queens, NY, United States', 1, '40.728224', '-73.794852', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (89, 'Lauren', 'Ortega', 'https://www.stockvault.net/data/2016/12/09/218187/thumb16.jpg', 'laurenortega88@example.com', '1988-10-20', 28, 'Atlanta, GA, United States', 1, '33.748995', '-84.387982', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (90, 'Sonia', 'Slater', 'https://www.stockvault.net/data/2016/06/14/201630/thumb16.jpg', 'soniaslater90@example.com', '1990-10-25', 26, 'Boston, MA, United States', 1, '42.360082', '-71.058880', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (91, 'Lydia', 'Jimenez', 'https://www.stockvault.net/data/2016/12/20/218988/thumb16.jpg', 'lydiajimenez@example.com', '1984-06-14', 32, 'Indianapolis, IN, United States', 1, '39.768403', '-86.158068', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (92, 'Amira', 'Mcknight', 'https://www.stockvault.net/data/2016/12/20/218930/thumb16.jpg', 'amiramc@example.com', '1990-01-18', 26, 'Nashville, TN, United States', 1, '36.162664', '-86.781602', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (93, 'Francesca', 'Finch', 'https://www.stockvault.net/data/2016/12/19/218848/thumb16.jpg', 'francescafinch@example.com', '1990-10-12', 26, 'Tulsa, OK, United States', 1, '36.153982', '-95.992775', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (94, 'Scarlett', 'Green', 'https://www.stockvault.net/data/2016/12/19/218765/thumb16.jpg', 'scarlettgrenn@example.com', '1992-04-09', 25, 'Denver, CO, United States', 1, '39.739236', '-104.990251', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (95, 'Leah', 'Gordon', 'https://www.stockvault.net/data/2007/03/01/100092/thumb16.jpg', 'leahlegordon@example.com', '1987-09-18', 29, 'San Jose', 1, '37.3382', '-121.8863', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (96, 'Maddison', 'Miller', 'https://www.stockvault.net/data/2009/02/11/107766/thumb16.jpg', 'madmil@example.com', '1998-09-17', 19, 'Tucson, AZ, United States', 1, '32.221743', '-110.926479', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (97, 'Abigail', 'Khan', 'https://www.stockvault.net/data/2013/09/05/147726/thumb16.jpg', 'abigailkhan@example.com', '1980-05-16', 26, 'Denver, CO, United States', 1, '39.739236', '-104.990251', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (98, 'Shayla', 'Austin', 'https://www.stockvault.net/data/2007/11/24/103883/thumb16.jpg', 'shaylaaustiaut@example.com', '1988-05-12', 28, 'Minneapolis, MN, United States', 1, '44.977753', '-93.265011', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (99, 'Thalia', 'Beck', 'https://www.stockvault.net/data/2013/09/05/147712/thumb16.jpg', 'thaliatala@example.com', '1979-05-17', 37, 'New Orleans, LA, United States', 1, '29.951066', '-90.071532', 0);
INSERT INTO `buzzyfakeusersusa` VALUES (100, 'Fernanda', 'Tyler', 'https://www.stockvault.net/data/2014/04/06/155915/thumb16.jpg', 'fernandatyler@example.com', '1981-09-16', 35, 'Bronx, NY, United States', 1, '40.844782', '-73.864827', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyfbcredentials`
-- 

CREATE TABLE `buzzyfbcredentials` (
  `buzzyfbcredential_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyfbcredential_appid` varchar(255) NOT NULL,
  `buzzyfbcredential_secret` varchar(255) NOT NULL,
  PRIMARY KEY (`buzzyfbcredential_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `buzzyfbcredentials`
-- 

INSERT INTO `buzzyfbcredentials` VALUES (1, 'aplication_id', 'aplication_secret');

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyfilter`
-- 

CREATE TABLE `buzzyfilter` (
  `buzzyfilter_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyfilter_man` tinyint(1) NOT NULL,
  `buzzyfilter_woman` tinyint(1) NOT NULL,
  `buzzyuser_data_sexual_orientation` int(11) NOT NULL,
  `buzzyfilter_minage` int(11) NOT NULL,
  `buzzyfilter_maxage` int(11) NOT NULL,
  `buzzyfilter_radius` int(11) NOT NULL,
  `buzzyuser_id` int(11) NOT NULL,
  PRIMARY KEY (`buzzyfilter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `buzzyfilter`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyfollows`
-- 

CREATE TABLE `buzzyfollows` (
  `buzzyfollow_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyfolower_id` int(11) NOT NULL,
  `buzzyfolowing_id` int(11) NOT NULL,
  PRIMARY KEY (`buzzyfollow_id`)
) ENGINE=MyISAM AUTO_INCREMENT=405 DEFAULT CHARSET=latin1 AUTO_INCREMENT=405 ;

-- 
-- Dumping data for table `buzzyfollows`
-- 

INSERT INTO `buzzyfollows` VALUES (250, 3, 4);
INSERT INTO `buzzyfollows` VALUES (311, 26, 4);
INSERT INTO `buzzyfollows` VALUES (312, 4, 3);
INSERT INTO `buzzyfollows` VALUES (310, 4, 8);
INSERT INTO `buzzyfollows` VALUES (232, 3, 5);
INSERT INTO `buzzyfollows` VALUES (370, 142, 4);
INSERT INTO `buzzyfollows` VALUES (369, 142, 13);
INSERT INTO `buzzyfollows` VALUES (368, 142, 14);
INSERT INTO `buzzyfollows` VALUES (367, 142, 3);
INSERT INTO `buzzyfollows` VALUES (363, 119, 3);
INSERT INTO `buzzyfollows` VALUES (381, 173, 156);
INSERT INTO `buzzyfollows` VALUES (358, 106, 14);
INSERT INTO `buzzyfollows` VALUES (361, 106, 3);
INSERT INTO `buzzyfollows` VALUES (360, 112, 3);
INSERT INTO `buzzyfollows` VALUES (338, 57, 10);
INSERT INTO `buzzyfollows` VALUES (347, 90, 3);
INSERT INTO `buzzyfollows` VALUES (320, 41, 3);
INSERT INTO `buzzyfollows` VALUES (319, 34, 35);
INSERT INTO `buzzyfollows` VALUES (316, 33, 4);
INSERT INTO `buzzyfollows` VALUES (315, 30, 13);
INSERT INTO `buzzyfollows` VALUES (341, 72, 3);
INSERT INTO `buzzyfollows` VALUES (353, 96, 3);
INSERT INTO `buzzyfollows` VALUES (337, 57, 55);
INSERT INTO `buzzyfollows` VALUES (309, 4, 9);
INSERT INTO `buzzyfollows` VALUES (271, 4, 7);
INSERT INTO `buzzyfollows` VALUES (270, 4, 5);
INSERT INTO `buzzyfollows` VALUES (308, 19, 3);
INSERT INTO `buzzyfollows` VALUES (268, 3, 13);
INSERT INTO `buzzyfollows` VALUES (237, 13, 3);
INSERT INTO `buzzyfollows` VALUES (233, 3, 6);
INSERT INTO `buzzyfollows` VALUES (371, 143, 3);
INSERT INTO `buzzyfollows` VALUES (390, 230, 156);
INSERT INTO `buzzyfollows` VALUES (382, 181, 156);
INSERT INTO `buzzyfollows` VALUES (385, 210, 14);
INSERT INTO `buzzyfollows` VALUES (388, 222, 196);
INSERT INTO `buzzyfollows` VALUES (391, 231, 156);
INSERT INTO `buzzyfollows` VALUES (392, 232, 156);
INSERT INTO `buzzyfollows` VALUES (402, 14, 229);
INSERT INTO `buzzyfollows` VALUES (395, 239, 4);
INSERT INTO `buzzyfollows` VALUES (396, 239, 152);
INSERT INTO `buzzyfollows` VALUES (398, 339, 341);

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyfrontend`
-- 

CREATE TABLE `buzzyfrontend` (
  `buzzyfrontend_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyfrontend_name` varchar(255) NOT NULL,
  `buzzyfrontend_title_tag` varchar(255) NOT NULL,
  `buzzyfrontend_email` varchar(50) NOT NULL,
  PRIMARY KEY (`buzzyfrontend_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `buzzyfrontend`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `buzzygifts`
-- 

CREATE TABLE `buzzygifts` (
  `buzzygift_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzygift_title` varchar(255) NOT NULL,
  `buzzygift_img` varchar(255) NOT NULL,
  `buzzygift_price` int(11) NOT NULL,
  PRIMARY KEY (`buzzygift_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- 
-- Dumping data for table `buzzygifts`
-- 

INSERT INTO `buzzygifts` VALUES (1, 'Coffee', 'coffee.png', 100);
INSERT INTO `buzzygifts` VALUES (2, 'Cake', 'cake.png', 100);
INSERT INTO `buzzygifts` VALUES (3, 'Cookies', 'cookies.png', 100);
INSERT INTO `buzzygifts` VALUES (4, 'Pop Corn', 'popcorn.png', 100);
INSERT INTO `buzzygifts` VALUES (5, 'Kiss', 'kiss.png', 100);
INSERT INTO `buzzygifts` VALUES (6, 'Roses', 'roses.png', 100);
INSERT INTO `buzzygifts` VALUES (7, 'Ball', 'nflball.png', 100);
INSERT INTO `buzzygifts` VALUES (8, 'Beer', 'beer.png', 100);
INSERT INTO `buzzygifts` VALUES (9, 'Chocolate', '1477604076chocolate-piece-icon.png', 100);
INSERT INTO `buzzygifts` VALUES (11, 'Apple', '1477636640apple.png', 100);
INSERT INTO `buzzygifts` VALUES (12, 'Champagne', '1478957785champagne.png', 200);
INSERT INTO `buzzygifts` VALUES (13, 'Diamond', '1478957914diamond.png', 200);

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyimgfilter`
-- 

CREATE TABLE `buzzyimgfilter` (
  `buzzyimgfilter_id` int(11) NOT NULL,
  `buzzyimgfilter_bright` float(3,2) NOT NULL,
  `buzzyimgfilter_cont` float(3,2) NOT NULL,
  `buzzyimgfilter_gray` float(3,2) NOT NULL,
  `buzzyimgfilter_hue` int(11) NOT NULL,
  `buzzyimgfilter_invert` float(3,2) NOT NULL,
  `buzzyimgfilter_opacity` float(3,2) NOT NULL,
  `buzzyimgfilter_sat` int(11) NOT NULL,
  `buzzyimgfilter_sepia` float(3,2) NOT NULL,
  `buzzyarticle_special` int(11) NOT NULL,
  PRIMARY KEY (`buzzyimgfilter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `buzzyimgfilter`
-- 

INSERT INTO `buzzyimgfilter` VALUES (0, 1.00, 1.00, 0.00, 0, 0.00, 1.00, 1, 0.00, 0);
INSERT INTO `buzzyimgfilter` VALUES (1, 1.00, 1.00, 0.00, 0, 0.00, 1.00, 1, 0.00, 1);
INSERT INTO `buzzyimgfilter` VALUES (2, 1.00, 1.00, 0.00, 0, 0.00, 1.00, 1, 0.00, 2);
INSERT INTO `buzzyimgfilter` VALUES (3, 1.00, 1.00, 0.00, 0, 0.00, 1.00, 1, 0.00, 3);
INSERT INTO `buzzyimgfilter` VALUES (4, 1.00, 1.00, 0.00, 0, 0.00, 1.00, 1, 0.00, 4);
INSERT INTO `buzzyimgfilter` VALUES (5, 1.00, 1.00, 0.00, 0, 0.00, 1.00, 1, 0.00, 5);
INSERT INTO `buzzyimgfilter` VALUES (6, 1.00, 1.00, 0.00, 0, 0.00, 1.00, 1, 0.00, 6);
INSERT INTO `buzzyimgfilter` VALUES (7, 1.00, 1.00, 0.00, 0, 0.00, 1.00, 1, 0.00, 7);

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzylanguages`
-- 

CREATE TABLE `buzzylanguages` (
  `buzzylanguage_id` int(11) NOT NULL,
  `buzzylanguage` varchar(10) NOT NULL,
  PRIMARY KEY (`buzzylanguage_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `buzzylanguages`
-- 

INSERT INTO `buzzylanguages` VALUES (1, 'en');

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzylanguageslist`
-- 

CREATE TABLE `buzzylanguageslist` (
  `buzzylanguageslist_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzylanguageslist` varchar(255) NOT NULL,
  `buzzylanguageslist_name` varchar(255) NOT NULL,
  PRIMARY KEY (`buzzylanguageslist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `buzzylanguageslist`
-- 

INSERT INTO `buzzylanguageslist` VALUES (1, 'en', 'English');
INSERT INTO `buzzylanguageslist` VALUES (2, 'de', 'German');
INSERT INTO `buzzylanguageslist` VALUES (3, 'es', 'Spanish');
INSERT INTO `buzzylanguageslist` VALUES (4, 'fr', 'French');
INSERT INTO `buzzylanguageslist` VALUES (5, 'it', 'Italian');
INSERT INTO `buzzylanguageslist` VALUES (6, 'tr', 'Turkish');
INSERT INTO `buzzylanguageslist` VALUES (7, 'ch', 'Chinese');

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzylikesunlikes`
-- 

CREATE TABLE `buzzylikesunlikes` (
  `buzzylikesunlikes_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyuser_id` varchar(50) NOT NULL,
  `buzzynews_id` int(11) NOT NULL,
  `buzzylikesunlike` tinyint(1) NOT NULL,
  PRIMARY KEY (`buzzylikesunlikes_id`)
) ENGINE=MyISAM AUTO_INCREMENT=211 DEFAULT CHARSET=latin1 AUTO_INCREMENT=211 ;

-- 
-- Dumping data for table `buzzylikesunlikes`
-- 

INSERT INTO `buzzylikesunlikes` VALUES (1, '3', 3, 1);
INSERT INTO `buzzylikesunlikes` VALUES (2, '3', 1, 1);
INSERT INTO `buzzylikesunlikes` VALUES (3, '3', 33, 1);
INSERT INTO `buzzylikesunlikes` VALUES (4, '3', 23, 0);
INSERT INTO `buzzylikesunlikes` VALUES (5, '3', 2, 1);
INSERT INTO `buzzylikesunlikes` VALUES (6, '3', 24, 1);
INSERT INTO `buzzylikesunlikes` VALUES (7, '3', 34, 1);
INSERT INTO `buzzylikesunlikes` VALUES (8, '3', 4, 1);
INSERT INTO `buzzylikesunlikes` VALUES (9, '3', 11, 1);
INSERT INTO `buzzylikesunlikes` VALUES (10, '3', 30, 1);
INSERT INTO `buzzylikesunlikes` VALUES (11, '4', 11, 1);
INSERT INTO `buzzylikesunlikes` VALUES (12, '4', 33, 0);
INSERT INTO `buzzylikesunlikes` VALUES (13, '3', 48, 1);
INSERT INTO `buzzylikesunlikes` VALUES (14, '3', 50, 1);
INSERT INTO `buzzylikesunlikes` VALUES (15, '9', 24, 1);
INSERT INTO `buzzylikesunlikes` VALUES (16, '9', 26, 1);
INSERT INTO `buzzylikesunlikes` VALUES (17, '13', 2, 1);
INSERT INTO `buzzylikesunlikes` VALUES (18, '3', 60, 1);
INSERT INTO `buzzylikesunlikes` VALUES (19, '3', 28, 1);
INSERT INTO `buzzylikesunlikes` VALUES (20, '4', 5, 1);
INSERT INTO `buzzylikesunlikes` VALUES (21, '4', 28, 1);
INSERT INTO `buzzylikesunlikes` VALUES (22, '4', 60, 1);
INSERT INTO `buzzylikesunlikes` VALUES (23, '4', 50, 0);
INSERT INTO `buzzylikesunlikes` VALUES (24, '4', 34, 1);
INSERT INTO `buzzylikesunlikes` VALUES (25, '4', 48, 1);
INSERT INTO `buzzylikesunlikes` VALUES (26, '4', 23, 1);
INSERT INTO `buzzylikesunlikes` VALUES (27, '4', 62, 0);
INSERT INTO `buzzylikesunlikes` VALUES (28, '4', 63, 1);
INSERT INTO `buzzylikesunlikes` VALUES (29, '4', 4, 1);
INSERT INTO `buzzylikesunlikes` VALUES (30, '20', 23, 1);
INSERT INTO `buzzylikesunlikes` VALUES (31, '4', 29, 1);
INSERT INTO `buzzylikesunlikes` VALUES (32, '3', 75, 1);
INSERT INTO `buzzylikesunlikes` VALUES (33, '24', 76, 1);
INSERT INTO `buzzylikesunlikes` VALUES (34, '4', 71, 1);
INSERT INTO `buzzylikesunlikes` VALUES (35, '4', 26, 0);
INSERT INTO `buzzylikesunlikes` VALUES (36, '4', 7, 1);
INSERT INTO `buzzylikesunlikes` VALUES (37, '4', 2, 1);
INSERT INTO `buzzylikesunlikes` VALUES (38, '26', 50, 1);
INSERT INTO `buzzylikesunlikes` VALUES (39, '4', 76, 1);
INSERT INTO `buzzylikesunlikes` VALUES (40, '4', 82, 1);
INSERT INTO `buzzylikesunlikes` VALUES (41, '22', 76, 1);
INSERT INTO `buzzylikesunlikes` VALUES (42, '4', 75, 1);
INSERT INTO `buzzylikesunlikes` VALUES (43, '14', 62, 1);
INSERT INTO `buzzylikesunlikes` VALUES (44, '14', 76, 1);
INSERT INTO `buzzylikesunlikes` VALUES (45, '14', 50, 1);
INSERT INTO `buzzylikesunlikes` VALUES (46, '28', 76, 1);
INSERT INTO `buzzylikesunlikes` VALUES (47, '28', 75, 1);
INSERT INTO `buzzylikesunlikes` VALUES (48, '3', 76, 1);
INSERT INTO `buzzylikesunlikes` VALUES (49, '14', 75, 0);
INSERT INTO `buzzylikesunlikes` VALUES (50, '3', 90, 1);
INSERT INTO `buzzylikesunlikes` VALUES (51, '14', 60, 1);
INSERT INTO `buzzylikesunlikes` VALUES (52, '14', 90, 1);
INSERT INTO `buzzylikesunlikes` VALUES (53, '14', 33, 1);
INSERT INTO `buzzylikesunlikes` VALUES (54, '34', 11, 1);
INSERT INTO `buzzylikesunlikes` VALUES (55, '37', 29, 1);
INSERT INTO `buzzylikesunlikes` VALUES (56, '39', 90, 1);
INSERT INTO `buzzylikesunlikes` VALUES (57, '40', 4, 1);
INSERT INTO `buzzylikesunlikes` VALUES (58, '42', 63, 0);
INSERT INTO `buzzylikesunlikes` VALUES (59, '14', 11, 1);
INSERT INTO `buzzylikesunlikes` VALUES (60, '3', 96, 1);
INSERT INTO `buzzylikesunlikes` VALUES (61, '14', 99, 1);
INSERT INTO `buzzylikesunlikes` VALUES (62, '14', 63, 1);
INSERT INTO `buzzylikesunlikes` VALUES (63, '14', 1, 1);
INSERT INTO `buzzylikesunlikes` VALUES (64, '44', 99, 1);
INSERT INTO `buzzylikesunlikes` VALUES (65, '45', 28, 1);
INSERT INTO `buzzylikesunlikes` VALUES (66, '14', 4, 1);
INSERT INTO `buzzylikesunlikes` VALUES (67, '14', 2, 1);
INSERT INTO `buzzylikesunlikes` VALUES (68, '14', 98, 1);
INSERT INTO `buzzylikesunlikes` VALUES (69, '14', 97, 1);
INSERT INTO `buzzylikesunlikes` VALUES (70, '48', 98, 1);
INSERT INTO `buzzylikesunlikes` VALUES (71, '14', 29, 1);
INSERT INTO `buzzylikesunlikes` VALUES (72, '49', 30, 1);
INSERT INTO `buzzylikesunlikes` VALUES (73, '54', 48, 1);
INSERT INTO `buzzylikesunlikes` VALUES (74, '14', 48, 1);
INSERT INTO `buzzylikesunlikes` VALUES (75, '55', 30, 1);
INSERT INTO `buzzylikesunlikes` VALUES (76, '56', 50, 1);
INSERT INTO `buzzylikesunlikes` VALUES (77, '56', 63, 1);
INSERT INTO `buzzylikesunlikes` VALUES (78, '56', 5, 1);
INSERT INTO `buzzylikesunlikes` VALUES (79, '57', 63, 0);
INSERT INTO `buzzylikesunlikes` VALUES (80, '14', 28, 1);
INSERT INTO `buzzylikesunlikes` VALUES (81, '14', 5, 1);
INSERT INTO `buzzylikesunlikes` VALUES (82, '57', 76, 1);
INSERT INTO `buzzylikesunlikes` VALUES (83, '14', 159, 1);
INSERT INTO `buzzylikesunlikes` VALUES (84, '14', 158, 1);
INSERT INTO `buzzylikesunlikes` VALUES (85, '14', 155, 0);
INSERT INTO `buzzylikesunlikes` VALUES (86, '98', 156, 1);
INSERT INTO `buzzylikesunlikes` VALUES (87, '99', 159, 1);
INSERT INTO `buzzylikesunlikes` VALUES (88, '100', 155, 1);
INSERT INTO `buzzylikesunlikes` VALUES (89, '101', 5, 1);
INSERT INTO `buzzylikesunlikes` VALUES (90, '14', 108, 1);
INSERT INTO `buzzylikesunlikes` VALUES (91, '14', 165, 1);
INSERT INTO `buzzylikesunlikes` VALUES (92, '102', 152, 1);
INSERT INTO `buzzylikesunlikes` VALUES (93, '103', 108, 1);
INSERT INTO `buzzylikesunlikes` VALUES (94, '14', 168, 1);
INSERT INTO `buzzylikesunlikes` VALUES (95, '14', 26, 1);
INSERT INTO `buzzylikesunlikes` VALUES (96, '14', 180, 1);
INSERT INTO `buzzylikesunlikes` VALUES (97, '14', 182, 1);
INSERT INTO `buzzylikesunlikes` VALUES (98, '14', 220, 1);
INSERT INTO `buzzylikesunlikes` VALUES (99, '116', 152, 1);
INSERT INTO `buzzylikesunlikes` VALUES (100, '14', 229, 1);
INSERT INTO `buzzylikesunlikes` VALUES (101, '14', 208, 1);
INSERT INTO `buzzylikesunlikes` VALUES (102, '14', 228, 1);
INSERT INTO `buzzylikesunlikes` VALUES (103, '14', 241, 1);
INSERT INTO `buzzylikesunlikes` VALUES (104, '122', 240, 1);
INSERT INTO `buzzylikesunlikes` VALUES (105, '14', 242, 1);
INSERT INTO `buzzylikesunlikes` VALUES (106, '14', 237, 1);
INSERT INTO `buzzylikesunlikes` VALUES (107, '14', 223, 1);
INSERT INTO `buzzylikesunlikes` VALUES (108, '14', 294, 1);
INSERT INTO `buzzylikesunlikes` VALUES (109, '129', 292, 1);
INSERT INTO `buzzylikesunlikes` VALUES (110, '129', 200, 1);
INSERT INTO `buzzylikesunlikes` VALUES (111, '14', 200, 1);
INSERT INTO `buzzylikesunlikes` VALUES (112, '14', 297, 1);
INSERT INTO `buzzylikesunlikes` VALUES (113, '137', 306, 1);
INSERT INTO `buzzylikesunlikes` VALUES (114, '14', 197, 1);
INSERT INTO `buzzylikesunlikes` VALUES (115, '14', 299, 1);
INSERT INTO `buzzylikesunlikes` VALUES (116, '14', 311, 1);
INSERT INTO `buzzylikesunlikes` VALUES (117, '122', 200, 1);
INSERT INTO `buzzylikesunlikes` VALUES (118, '142', 205, 1);
INSERT INTO `buzzylikesunlikes` VALUES (119, '14', 184, 1);
INSERT INTO `buzzylikesunlikes` VALUES (120, '142', 311, 1);
INSERT INTO `buzzylikesunlikes` VALUES (121, '142', 223, 1);
INSERT INTO `buzzylikesunlikes` VALUES (122, '14', 318, 1);
INSERT INTO `buzzylikesunlikes` VALUES (123, '14', 291, 1);
INSERT INTO `buzzylikesunlikes` VALUES (124, '148', 328, 0);
INSERT INTO `buzzylikesunlikes` VALUES (125, '14', 186, 1);
INSERT INTO `buzzylikesunlikes` VALUES (126, '14', 328, 1);
INSERT INTO `buzzylikesunlikes` VALUES (127, '148', 333, 1);
INSERT INTO `buzzylikesunlikes` VALUES (128, '14', 236, 1);
INSERT INTO `buzzylikesunlikes` VALUES (129, '150', 299, 0);
INSERT INTO `buzzylikesunlikes` VALUES (130, '152', 238, 1);
INSERT INTO `buzzylikesunlikes` VALUES (131, '152', 328, 1);
INSERT INTO `buzzylikesunlikes` VALUES (132, '14', 292, 1);
INSERT INTO `buzzylikesunlikes` VALUES (133, '14', 327, 1);
INSERT INTO `buzzylikesunlikes` VALUES (134, '14', 267, 0);
INSERT INTO `buzzylikesunlikes` VALUES (135, '14', 239, 1);
INSERT INTO `buzzylikesunlikes` VALUES (136, '14', 205, 1);
INSERT INTO `buzzylikesunlikes` VALUES (137, '14', 195, 1);
INSERT INTO `buzzylikesunlikes` VALUES (138, '14', 219, 1);
INSERT INTO `buzzylikesunlikes` VALUES (139, '154', 327, 1);
INSERT INTO `buzzylikesunlikes` VALUES (140, '14', 207, 0);
INSERT INTO `buzzylikesunlikes` VALUES (141, '160', 327, 1);
INSERT INTO `buzzylikesunlikes` VALUES (142, '160', 328, 1);
INSERT INTO `buzzylikesunlikes` VALUES (143, '145', 327, 1);
INSERT INTO `buzzylikesunlikes` VALUES (144, '145', 299, 1);
INSERT INTO `buzzylikesunlikes` VALUES (145, '14', 363, 1);
INSERT INTO `buzzylikesunlikes` VALUES (146, '167', 366, 1);
INSERT INTO `buzzylikesunlikes` VALUES (147, '14', 366, 1);
INSERT INTO `buzzylikesunlikes` VALUES (148, '168', 219, 1);
INSERT INTO `buzzylikesunlikes` VALUES (149, '170', 170, 1);
INSERT INTO `buzzylikesunlikes` VALUES (150, '14', 362, 1);
INSERT INTO `buzzylikesunlikes` VALUES (151, '172', 328, 1);
INSERT INTO `buzzylikesunlikes` VALUES (152, '174', 362, 0);
INSERT INTO `buzzylikesunlikes` VALUES (153, '14', 361, 1);
INSERT INTO `buzzylikesunlikes` VALUES (154, '181', 292, 1);
INSERT INTO `buzzylikesunlikes` VALUES (155, '181', 228, 1);
INSERT INTO `buzzylikesunlikes` VALUES (156, '14', 393, 1);
INSERT INTO `buzzylikesunlikes` VALUES (157, '181', 180, 0);
INSERT INTO `buzzylikesunlikes` VALUES (158, '14', 293, 1);
INSERT INTO `buzzylikesunlikes` VALUES (159, '14', 266, 1);
INSERT INTO `buzzylikesunlikes` VALUES (160, '182', 205, 1);
INSERT INTO `buzzylikesunlikes` VALUES (161, '183', 293, 0);
INSERT INTO `buzzylikesunlikes` VALUES (162, '183', 328, 1);
INSERT INTO `buzzylikesunlikes` VALUES (163, '170', 393, 1);
INSERT INTO `buzzylikesunlikes` VALUES (164, '196', 292, 1);
INSERT INTO `buzzylikesunlikes` VALUES (165, '14', 437, 1);
INSERT INTO `buzzylikesunlikes` VALUES (166, '14', 443, 1);
INSERT INTO `buzzylikesunlikes` VALUES (167, '14', 427, 1);
INSERT INTO `buzzylikesunlikes` VALUES (168, '14', 444, 1);
INSERT INTO `buzzylikesunlikes` VALUES (169, '202', 451, 1);
INSERT INTO `buzzylikesunlikes` VALUES (170, '204', 448, 1);
INSERT INTO `buzzylikesunlikes` VALUES (171, '207', 449, 1);
INSERT INTO `buzzylikesunlikes` VALUES (172, '14', 449, 1);
INSERT INTO `buzzylikesunlikes` VALUES (173, '208', 450, 1);
INSERT INTO `buzzylikesunlikes` VALUES (174, '14', 451, 1);
INSERT INTO `buzzylikesunlikes` VALUES (175, '14', 218, 1);
INSERT INTO `buzzylikesunlikes` VALUES (176, '210', 451, 1);
INSERT INTO `buzzylikesunlikes` VALUES (177, '14', 446, 1);
INSERT INTO `buzzylikesunlikes` VALUES (178, '14', 448, 1);
INSERT INTO `buzzylikesunlikes` VALUES (179, '14', 450, 1);
INSERT INTO `buzzylikesunlikes` VALUES (180, '225', 436, 1);
INSERT INTO `buzzylikesunlikes` VALUES (181, '228', 477, 1);
INSERT INTO `buzzylikesunlikes` VALUES (182, '229', 496, 1);
INSERT INTO `buzzylikesunlikes` VALUES (183, '14', 517, 1);
INSERT INTO `buzzylikesunlikes` VALUES (184, '233', 219, 1);
INSERT INTO `buzzylikesunlikes` VALUES (185, '14', 515, 1);
INSERT INTO `buzzylikesunlikes` VALUES (186, '234', 195, 1);
INSERT INTO `buzzylikesunlikes` VALUES (187, '239', 496, 1);
INSERT INTO `buzzylikesunlikes` VALUES (188, '14', 527, 1);
INSERT INTO `buzzylikesunlikes` VALUES (189, '14', 528, 1);
INSERT INTO `buzzylikesunlikes` VALUES (190, '258', 515, 1);
INSERT INTO `buzzylikesunlikes` VALUES (191, '14', 415, 1);
INSERT INTO `buzzylikesunlikes` VALUES (192, '14', 526, 1);
INSERT INTO `buzzylikesunlikes` VALUES (193, '260', 528, 1);
INSERT INTO `buzzylikesunlikes` VALUES (194, '14', 542, 1);
INSERT INTO `buzzylikesunlikes` VALUES (195, '14', 503, 1);
INSERT INTO `buzzylikesunlikes` VALUES (196, '270', 328, 1);
INSERT INTO `buzzylikesunlikes` VALUES (197, '14', 496, 1);
INSERT INTO `buzzylikesunlikes` VALUES (198, '14', 476, 1);
INSERT INTO `buzzylikesunlikes` VALUES (199, '285', 542, 1);
INSERT INTO `buzzylikesunlikes` VALUES (200, '286', 528, 1);
INSERT INTO `buzzylikesunlikes` VALUES (201, '14', 491, 1);
INSERT INTO `buzzylikesunlikes` VALUES (202, '291', 503, 1);
INSERT INTO `buzzylikesunlikes` VALUES (203, '292', 449, 1);
INSERT INTO `buzzylikesunlikes` VALUES (204, '296', 527, 1);
INSERT INTO `buzzylikesunlikes` VALUES (205, '297', 361, 1);
INSERT INTO `buzzylikesunlikes` VALUES (206, '302', 361, 1);
INSERT INTO `buzzylikesunlikes` VALUES (207, '14', 417, 1);
INSERT INTO `buzzylikesunlikes` VALUES (208, '315', 542, 1);
INSERT INTO `buzzylikesunlikes` VALUES (209, '321', 528, 1);
INSERT INTO `buzzylikesunlikes` VALUES (210, '322', 528, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzylimits`
-- 

CREATE TABLE `buzzylimits` (
  `buzzylimit_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzylimit_chatone` int(11) NOT NULL,
  `buzzylimit_chattwo` int(11) NOT NULL,
  `buzzylimit_chatthree` int(11) NOT NULL,
  PRIMARY KEY (`buzzylimit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `buzzylimits`
-- 

INSERT INTO `buzzylimits` VALUES (1, 20, 60, 200);

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzylogins`
-- 

CREATE TABLE `buzzylogins` (
  `buzzylogin_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzylogin_timestamp` int(11) NOT NULL,
  `buzzyuser_id` int(11) NOT NULL,
  PRIMARY KEY (`buzzylogin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `buzzylogins`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `buzzymailing_list`
-- 

CREATE TABLE `buzzymailing_list` (
  `buzzymailing_list_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzymailing_list_email` varchar(255) NOT NULL,
  `buzzymailing_list_timestamp` int(11) NOT NULL,
  PRIMARY KEY (`buzzymailing_list_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `buzzymailing_list`
-- 

INSERT INTO `buzzymailing_list` VALUES (1, 'brankoupwork@gmail.com', 1480915032);
INSERT INTO `buzzymailing_list` VALUES (2, 'vadoo1208@gmail.com', 1480915032);

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzymatches`
-- 

CREATE TABLE `buzzymatches` (
  `buzzymatch_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzymatcher_one` int(11) NOT NULL,
  `buzzymatcher_two` int(11) NOT NULL,
  `buzzymatch_timestamp` int(11) NOT NULL,
  `buzzymatcher_onestatus` tinyint(1) NOT NULL,
  `buzzymatcher_twostatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`buzzymatch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `buzzymatches`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `buzzynotifications`
-- 

CREATE TABLE `buzzynotifications` (
  `buzzynotification_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzynotification_type` int(11) NOT NULL,
  `buzzyuser_id` int(11) NOT NULL,
  `buzzyfriend_id` int(11) NOT NULL,
  `buzzyuserimage_id` int(11) NOT NULL,
  `buzzynotification_status` int(11) NOT NULL,
  `buzzynotification_timestamp` int(11) NOT NULL,
  `buzzynotification_alias` varchar(255) NOT NULL,
  PRIMARY KEY (`buzzynotification_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- 
-- Dumping data for table `buzzynotifications`
-- 

INSERT INTO `buzzynotifications` VALUES (6, 2, 1195, 344, 0, 0, 1482483723, 'likednots');
INSERT INTO `buzzynotifications` VALUES (7, 2, 1182, 344, 0, 0, 1482486694, 'likednots');
INSERT INTO `buzzynotifications` VALUES (8, 2, 1123, 344, 0, 1, 1483261274, 'likednots');

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzypaidservices`
-- 

CREATE TABLE `buzzypaidservices` (
  `buzzypaidservice_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzypaidservice_title` varchar(255) NOT NULL,
  `buzzypaidservice_img` varchar(255) NOT NULL,
  `buzzypaidservice_price` int(11) NOT NULL,
  PRIMARY KEY (`buzzypaidservice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `buzzypaidservices`
-- 

INSERT INTO `buzzypaidservices` VALUES (1, 'Blue 3d emoticons', 'sm2.png', 500);
INSERT INTO `buzzypaidservices` VALUES (2, 'Minion emoticons', 'sm3.png', 800);
INSERT INTO `buzzypaidservices` VALUES (3, 'Premium status', 'premicon.png', 400);
INSERT INTO `buzzypaidservices` VALUES (4, 'Gold status', 'goldicon.png', 800);
INSERT INTO `buzzypaidservices` VALUES (5, 'Vip status', 'vipicon.png', 1200);
INSERT INTO `buzzypaidservices` VALUES (6, 'Animal emoticons', 'sm4.png', 1000);

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyphoto_verimg`
-- 

CREATE TABLE `buzzyphoto_verimg` (
  `buzzyphoto_verimg_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyphoto_verimg` varchar(255) NOT NULL,
  `buzzyuser_id` int(11) NOT NULL,
  PRIMARY KEY (`buzzyphoto_verimg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `buzzyphoto_verimg`
-- 

INSERT INTO `buzzyphoto_verimg` VALUES (5, '3f9b7ee84771452e4042193640e8ff2b.jpg', 344);

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzypollanswers`
-- 

CREATE TABLE `buzzypollanswers` (
  `buzzypollanswer_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzypoll_id` int(11) NOT NULL,
  `buzzyuser_id` int(11) NOT NULL,
  `buzzypoll_bool` tinyint(1) NOT NULL,
  PRIMARY KEY (`buzzypollanswer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `buzzypollanswers`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `buzzypolls`
-- 

CREATE TABLE `buzzypolls` (
  `buzzypoll_id` int(11) NOT NULL,
  `buzzynews_id` int(11) NOT NULL,
  `buzzypoll_title` varchar(255) NOT NULL,
  `buzzypoll_claimone` varchar(255) NOT NULL,
  `buzzypoll_claimtwo` varchar(255) NOT NULL,
  PRIMARY KEY (`buzzypoll_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `buzzypolls`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyprivacyrequests`
-- 

CREATE TABLE `buzzyprivacyrequests` (
  `buzzyprivacyrequest_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyuser_id` int(11) NOT NULL,
  `buzzyaccepter_id` int(11) NOT NULL,
  `buzzyprivacyrequest_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`buzzyprivacyrequest_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `buzzyprivacyrequests`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyquiz`
-- 

CREATE TABLE `buzzyquiz` (
  `buzzyquiz_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyquiz_one` text NOT NULL,
  `buzzyquiz_two` text NOT NULL,
  `buzzyquiz_three` text NOT NULL,
  `buzzyquiz_four` text NOT NULL,
  `buzzyquiz_five` text NOT NULL,
  `buzzyquiz_six` text NOT NULL,
  `buzzyquiz_seven` text NOT NULL,
  `buzzyquiz_eight` text NOT NULL,
  `buzzyquiz_nine` text NOT NULL,
  `buzzyquiz_ten` text NOT NULL,
  `buzzyquiz_eleven` text NOT NULL,
  `buzzyquiz_twelve` text NOT NULL,
  `buzzyquiz_thirteen` text NOT NULL,
  `buzzyquiz_fourteen` text NOT NULL,
  `buzzyquiz_fifteen` text NOT NULL,
  `buzzyquiz_sixteen` text NOT NULL,
  `buzzyquiz_seventeen` text NOT NULL,
  `buzzyquiz_eightteen` text NOT NULL,
  `buzzyquiz_nineteen` text NOT NULL,
  `buzzyquiz_twenty` text NOT NULL,
  PRIMARY KEY (`buzzyquiz_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `buzzyquiz`
-- 

INSERT INTO `buzzyquiz` VALUES (1, 'Do you like sport?', 'Are you enyojing in discussing politics?', 'Are you jelaous in relationship?', 'Are you religious?', 'Could you describe yourself as a temper person?', 'Are you romantic?', 'Do you like extreme sports?', 'Are you describe yourself as an extravagant?', 'Do you prefer serious relationship?', 'Do you like travelling?', 'Are you open-minded in sex?', 'Are you shy?', 'Do you like extreme sports?', 'Does the age difference matter to you?', 'Do you prefer people of your own etnhicity (racial) origin? ', 'Do you prefer open relationship? ', 'Would you date someone who was in considerable debt?', 'Do you prefer music over sport?', 'Do you drink frequently?', 'Do you prefer champagne over beer?');

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyquizzanswers`
-- 

CREATE TABLE `buzzyquizzanswers` (
  `buzzyquizzanswer_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyquizzanswer` text NOT NULL,
  `buzzyquizz_id` varchar(255) NOT NULL,
  `buzzyquizz_bool` tinyint(1) NOT NULL,
  PRIMARY KEY (`buzzyquizzanswer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `buzzyquizzanswers`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyquizzes`
-- 

CREATE TABLE `buzzyquizzes` (
  `buzzyquizz_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyquizz_title` varchar(255) NOT NULL,
  `buzzyquizz_img` varchar(255) NOT NULL,
  PRIMARY KEY (`buzzyquizz_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `buzzyquizzes`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyrssfeeds`
-- 

CREATE TABLE `buzzyrssfeeds` (
  `buzzyrssfeed_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyrssfeed` varchar(255) NOT NULL,
  `buzzyrssfeedurl` varchar(255) NOT NULL,
  PRIMARY KEY (`buzzyrssfeed_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

-- 
-- Dumping data for table `buzzyrssfeeds`
-- 

INSERT INTO `buzzyrssfeeds` VALUES (1, 'Science news', 'https://www.sciencenews.org/search?st=node');
INSERT INTO `buzzyrssfeeds` VALUES (4, 'Webworkerdaily', 'https://feeds.feedburner.com/Webworkerdaily');
INSERT INTO `buzzyrssfeeds` VALUES (8, 'Times of India', 'https://dynamic.feedsportal.com/pf/555218/https://toi.timesofindia.indiatimes.com/rssfeedstopstories.cms');
INSERT INTO `buzzyrssfeeds` VALUES (10, 'Reuters art', 'https://feeds.reuters.com/news/artsculture');
INSERT INTO `buzzyrssfeeds` VALUES (11, 'Reuters Bussiness', 'https://feeds.reuters.com/reuters/businessNews');
INSERT INTO `buzzyrssfeeds` VALUES (12, 'Reuters entertainment', 'https://feeds.reuters.com/reuters/entertainment');
INSERT INTO `buzzyrssfeeds` VALUES (14, 'Sky News', 'https://news.sky.com/feeds/rss/home.xml');
INSERT INTO `buzzyrssfeeds` VALUES (18, '37 signals', 'https://feeds.feedburner.com/37signals_podcast');
INSERT INTO `buzzyrssfeeds` VALUES (21, 'Blog things', 'https://www.blogthings.com/feed/');
INSERT INTO `buzzyrssfeeds` VALUES (24, 'Rss micro', 'https://www.rssmicro.com/?q=NFL');
INSERT INTO `buzzyrssfeeds` VALUES (28, 'Top ten reviews - bussiness', 'https://api.toptenreviews.com/rss/xml/soft_r8.xml');
INSERT INTO `buzzyrssfeeds` VALUES (29, 'Top ten reviews - entertainment', 'https://api.toptenreviews.com/rss/xml/soft_r10.xml');
INSERT INTO `buzzyrssfeeds` VALUES (30, 'Top ten reviews - e - commerce', 'https://api.toptenreviews.com/rss/xml/soft_r14.xml');
INSERT INTO `buzzyrssfeeds` VALUES (31, 'Top ten reviews - foreign languages', 'https://api.toptenreviews.com/rss/xml/soft_r12.xml');
INSERT INTO `buzzyrssfeeds` VALUES (32, 'Top ten reviews - multimedia', 'https://api.toptenreviews.com/rss/xml/soft_r15.xml');
INSERT INTO `buzzyrssfeeds` VALUES (34, 'Huffington post -  politics', 'https://www.huffingtonpost.co.uk/feeds/verticals/uk-politics/index.xml');
INSERT INTO `buzzyrssfeeds` VALUES (35, 'Huffington post - entertainment', 'https://www.huffingtonpost.co.uk/feeds/verticals/uk-entertainment/index.xml');
INSERT INTO `buzzyrssfeeds` VALUES (36, 'Huffington post - lifestyle', 'https://www.huffingtonpost.co.uk/feeds/verticals/uk-lifestyle/index.xml');
INSERT INTO `buzzyrssfeeds` VALUES (37, 'Huffington post - comedy', 'https://www.huffingtonpost.co.uk/feeds/verticals/uk-comedy/index.xml');
INSERT INTO `buzzyrssfeeds` VALUES (38, 'Huffington post - technology', 'https://www.huffingtonpost.co.uk/feeds/verticals/uk-tech/index.xml');
INSERT INTO `buzzyrssfeeds` VALUES (39, 'CNet', 'https://www.cnet.com/rss/news/');
INSERT INTO `buzzyrssfeeds` VALUES (40, 'Ouotation page', 'https://feeds.feedburner.com/quotationspage/mqotd');
INSERT INTO `buzzyrssfeeds` VALUES (41, 'Animal of the day', 'https://feeds.feedburner.com/animals');
INSERT INTO `buzzyrssfeeds` VALUES (42, 'The Daily puppy', 'https://feeds.feedburner.com/TheDailyPuppy');
INSERT INTO `buzzyrssfeeds` VALUES (43, 'Gadget of the week', 'https://feeds.feedburner.com/time/gadgetoftheweek');
INSERT INTO `buzzyrssfeeds` VALUES (44, 'Penny arcade', 'https://penny-arcade.com/feed');
INSERT INTO `buzzyrssfeeds` VALUES (45, 'TMZ - beauty', 'https://www.tmz.com/category/beauty/rss.xml');
INSERT INTO `buzzyrssfeeds` VALUES (46, 'TMZ - party all the time', 'https://www.tmz.com/category/party-all-the-time/rss.xml');
INSERT INTO `buzzyrssfeeds` VALUES (47, 'TMZ - politix', 'https://www.tmz.com/category/politix/rss.xml');
INSERT INTO `buzzyrssfeeds` VALUES (48, 'TMZ - fashion', 'https://www.tmz.com/category/fashion/rss.xml');

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyservicepayouts`
-- 

CREATE TABLE `buzzyservicepayouts` (
  `buzzyservicepayout_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzypaidservice_id` int(11) NOT NULL,
  `buzzyuser_id` int(11) NOT NULL,
  `buzzyservicepayout_timestamp` int(11) NOT NULL,
  PRIMARY KEY (`buzzyservicepayout_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `buzzyservicepayouts`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `buzzysiderss`
-- 

CREATE TABLE `buzzysiderss` (
  `buzzysiderss_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzysiderss_name` varchar(255) NOT NULL,
  `buzzysiderss_url` varchar(255) NOT NULL,
  `buzzysiderss_status` int(11) NOT NULL,
  `buzzysiderss_timestamp` int(11) NOT NULL,
  PRIMARY KEY (`buzzysiderss_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `buzzysiderss`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `buzzysiteoptions`
-- 

CREATE TABLE `buzzysiteoptions` (
  `buzzysiteoptions_id` int(11) NOT NULL,
  `buzzysitename` varchar(100) NOT NULL,
  `buzzysiteurl` varchar(255) NOT NULL,
  `buzzysitelogo` varchar(200) NOT NULL,
  `buzzyfavicon` varchar(100) NOT NULL,
  `buzzygrideffect` int(11) NOT NULL,
  `buzzyanimationspeed` varchar(50) NOT NULL,
  `buzzycolumns` varchar(255) NOT NULL,
  `buzzytitletag` varchar(255) NOT NULL,
  `buzzymetatag` varchar(255) NOT NULL,
  `buzzyemail` varchar(50) NOT NULL,
  `buzzyemailpassword` varchar(100) NOT NULL,
  `buzzystpmserver` varchar(50) NOT NULL,
  `buzzyfacebookid` varchar(30) NOT NULL,
  `buzzyfacebooksecret` varchar(255) NOT NULL,
  `buzzyfacebookaccess` varchar(255) NOT NULL,
  `buzzyyoutubeapi` varchar(255) NOT NULL,
  `buzzyvimeoaccesstoken` varchar(255) NOT NULL,
  `buzzyinstagramclientid` varchar(255) NOT NULL,
  `buzzyinstagramaccesstoken` varchar(255) NOT NULL,
  `buzzyamazonapi` varchar(255) NOT NULL,
  `buzzyamazonaccesskey` varchar(255) NOT NULL,
  `buzzyamazonsecretkey` varchar(255) NOT NULL,
  `buzzydribbbleclientid` varchar(255) NOT NULL,
  `buzzydribbblesecret` varchar(255) NOT NULL,
  `buzzydribbbleaccesstoken` varchar(255) NOT NULL,
  `buzzypaymentstatus` tinyint(1) NOT NULL,
  `buzzypaypal_email` varchar(255) NOT NULL,
  `buzzypinappid` varchar(255) NOT NULL,
  `buzzypinsecret` varchar(255) NOT NULL,
  `buzzyprivacy` blob NOT NULL,
  `buzzyterms` text NOT NULL,
  `buzzytimezone` varchar(255) NOT NULL,
  `buzzyoptimizedstatus` tinyint(4) NOT NULL,
  `buzzyads` text NOT NULL,
  `buzzyfortumoid` varchar(255) NOT NULL,
  `buzzyfortumosecret` varchar(255) NOT NULL,
  `fortumo_status` int(11) NOT NULL,
  `buzzynewslimit` int(11) NOT NULL,
  `buzzymax_pages` int(11) NOT NULL,
  `buzzycaptcha_sitekey` varchar(255) NOT NULL,
  `buzzycaptcha_secretkey` varchar(255) NOT NULL,
  `buzzywebsite_status` int(11) NOT NULL,
  `buzzyfb_images` int(11) NOT NULL,
  `buzzydistance_mesaure` tinyint(1) NOT NULL,
  `buzzyversion` varchar(255) NOT NULL,
  `buzzyupdatestatus` tinyint(1) NOT NULL,
  `buzzyfortumo_price` int(11) NOT NULL,
  `buzzysite_safeupload` tinyint(1) NOT NULL,
  `buzzysitemeasure` int(11) NOT NULL,
  `buzzyuserimage_status` int(11) NOT NULL,
  `buzzylanguage_status` int(11) NOT NULL,
  `buzzy_gzip` int(11) NOT NULL,
  `buzzy_theme` int(11) NOT NULL,
  PRIMARY KEY (`buzzysiteoptions_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `buzzysiteoptions`
-- 

INSERT INTO `buzzysiteoptions` VALUES (1, 'Vadoo', 'eluvo.co.uk', 'img/vadoo.png', '', 7, 'normal', 'four-columns', 'Vadoo - best script for making dating social network', 'Vadoo - best script for making dating social network. Try it and become succesfull datin site owner.', 'example@gmail.com', 'hgjhgjhgjhghjgkjhgkjhgj', 'smtp.gmail.com', 'your-fb-id-here', 'your-fb-secret-here', 'your-api-here', 'your-api-here', '', '', '', '', '', '', '', '', '', 0, '0', '', '', 0x3c64697620636c6173733d22696e6e657254657874223e0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e54686973207072697661637920706f6c69637920686173206265656e20636f6d70696c656420746f206265747465722073657276652074686f73652077686f2061726520636f6e6365726e6564207769746820686f7720746865697220262333393b506572736f6e616c6c79204964656e7469666961626c6520496e666f726d6174696f6e262333393b202850494929206973206265696e672075736564206f6e6c696e652e205049492c2061732064657363726962656420696e2055532070726976616379206c617720616e6420696e666f726d6174696f6e2073656375726974792c20697320696e666f726d6174696f6e20746861742063616e2062652075736564206f6e20697473206f776e206f722077697468206f7468657220696e666f726d6174696f6e20746f206964656e746966792c20636f6e746163742c206f72206c6f6361746520612073696e676c6520706572736f6e2c206f7220746f206964656e7469667920616e20696e646976696475616c20696e20636f6e746578742e20506c656173652072656164206f7572207072697661637920706f6c696379206361726566756c6c7920746f20676574206120636c65617220756e6465727374616e64696e67206f6620686f7720776520636f6c6c6563742c207573652c2070726f74656374206f72206f74686572776973652068616e646c6520796f757220506572736f6e616c6c79204964656e7469666961626c6520496e666f726d6174696f6e20696e206163636f7264616e63652077697468206f757220776562736974652e3c2f6469763e0d0a266e6273703b0d0a0d0a3c64697620636c6173733d22677261795465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e3c7374726f6e673e5768617420706572736f6e616c20696e666f726d6174696f6e20646f20776520636f6c6c6563742066726f6d207468652070656f706c652074686174207669736974206f757220626c6f672c2077656273697465206f72206170703f3c2f7374726f6e673e3c2f6469763e0d0a266e6273703b0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e5768656e206f72646572696e67206f72207265676973746572696e67206f6e206f757220736974652c20617320617070726f7072696174652c20796f75206d61792062652061736b656420746f20656e74657220796f7572206e616d652c20656d61696c2061646472657373206f72206f746865722064657461696c7320746f2068656c7020796f75207769746820796f757220657870657269656e63652e3c2f6469763e0d0a266e6273703b0d0a0d0a3c64697620636c6173733d22677261795465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e3c7374726f6e673e5768656e20646f20776520636f6c6c65637420696e666f726d6174696f6e3f3c2f7374726f6e673e3c2f6469763e0d0a266e6273703b0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e576520636f6c6c65637420696e666f726d6174696f6e2066726f6d20796f75207768656e20796f75207265676973746572206f6e206f75722073697465206f7220656e74657220696e666f726d6174696f6e206f6e206f757220736974652e3c2f6469763e0d0a266e6273703b0d0a0d0a3c64697620636c6173733d22677261795465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e3c7374726f6e673e486f7720646f2077652075736520796f757220696e666f726d6174696f6e3f3c2f7374726f6e673e3c2f6469763e0d0a266e6273703b0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e5765206d6179207573652074686520696e666f726d6174696f6e20776520636f6c6c6563742066726f6d20796f75207768656e20796f752072656769737465722c206d616b6520612070757263686173652c207369676e20757020666f72206f7572206e6577736c65747465722c20726573706f6e6420746f206120737572766579206f72206d61726b6574696e6720636f6d6d756e69636174696f6e2c20737572662074686520776562736974652c206f7220757365206365727461696e206f74686572207369746520666561747572657320696e2074686520666f6c6c6f77696e6720776179733a3c6272202f3e0d0a266e6273703b3c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b3c7374726f6e673e2662756c6c3b3c2f7374726f6e673e266e6273703b546f20706572736f6e616c697a6520796f757220657870657269656e636520616e6420746f20616c6c6f7720757320746f2064656c69766572207468652074797065206f6620636f6e74656e7420616e642070726f64756374206f66666572696e677320696e20776869636820796f7520617265206d6f737420696e74657265737465642e3c2f6469763e0d0a266e6273703b0d0a0d0a3c64697620636c6173733d22677261795465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e3c7374726f6e673e486f7720646f2077652070726f7465637420796f757220696e666f726d6174696f6e3f3c2f7374726f6e673e3c2f6469763e0d0a266e6273703b0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e4f75722077656273697465206973207363616e6e6564206f6e206120726567756c617220626173697320666f7220736563757269747920686f6c657320616e64206b6e6f776e2076756c6e65726162696c697469657320696e206f7264657220746f206d616b6520796f757220766973697420746f206f75722073697465206173207361666520617320706f737369626c652e3c6272202f3e0d0a266e6273703b3c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e57652075736520726567756c6172204d616c77617265205363616e6e696e672e3c6272202f3e0d0a266e6273703b3c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e596f757220706572736f6e616c20696e666f726d6174696f6e20697320636f6e7461696e656420626568696e642073656375726564206e6574776f726b7320616e64206973206f6e6c792061636365737369626c652062792061206c696d69746564206e756d626572206f6620706572736f6e732077686f2068617665207370656369616c206163636573732072696768747320746f20737563682073797374656d732c20616e642061726520726571756972656420746f206b6565702074686520696e666f726d6174696f6e20636f6e666964656e7469616c2e20496e206164646974696f6e2c20616c6c2073656e7369746976652f63726564697420696e666f726d6174696f6e20796f7520737570706c7920697320656e63727970746564207669612053656375726520536f636b6574204c61796572202853534c2920746563686e6f6c6f67792e3c2f6469763e0d0a266e6273703b0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e576520696d706c656d656e7420612076617269657479206f66207365637572697479206d65617375726573207768656e2061207573657220656e746572732c207375626d6974732c206f7220616363657373657320746865697220696e666f726d6174696f6e20746f206d61696e7461696e2074686520736166657479206f6620796f757220706572736f6e616c20696e666f726d6174696f6e2e3c2f6469763e0d0a266e6273703b0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e416c6c207472616e73616374696f6e73206172652070726f636573736564207468726f756768206120676174657761792070726f766964657220616e6420617265206e6f742073746f726564206f722070726f636573736564206f6e206f757220736572766572732e3c2f6469763e0d0a266e6273703b0d0a0d0a3c64697620636c6173733d22677261795465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e3c7374726f6e673e446f2077652075736520262333393b636f6f6b696573262333393b3f3c2f7374726f6e673e3c2f6469763e0d0a266e6273703b0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e5965732e20436f6f6b6965732061726520736d616c6c2066696c6573207468617420612073697465206f722069747320736572766963652070726f7669646572207472616e736665727320746f20796f757220636f6d7075746572262333393b732068617264206472697665207468726f75676820796f7572205765622062726f777365722028696620796f7520616c6c6f7729207468617420656e61626c6573207468652073697465262333393b73206f7220736572766963652070726f7669646572262333393b732073797374656d7320746f207265636f676e697a6520796f75722062726f7773657220616e64206361707475726520616e642072656d656d626572206365727461696e20696e666f726d6174696f6e2e20466f7220696e7374616e63652c2077652075736520636f6f6b69657320746f2068656c702075732072656d656d62657220616e642070726f6365737320746865206974656d7320696e20796f75722073686f7070696e6720636172742e20546865792061726520616c736f207573656420746f2068656c7020757320756e6465727374616e6420796f757220707265666572656e636573206261736564206f6e2070726576696f7573206f722063757272656e7420736974652061637469766974792c20776869636820656e61626c657320757320746f2070726f7669646520796f75207769746820696d70726f7665642073657276696365732e20576520616c736f2075736520636f6f6b69657320746f2068656c7020757320636f6d70696c652061676772656761746520646174612061626f75742073697465207472616666696320616e64207369746520696e746572616374696f6e20736f20746861742077652063616e206f6666657220626574746572207369746520657870657269656e63657320616e6420746f6f6c7320696e20746865206675747572652e3c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e3c6272202f3e0d0a3c7374726f6e673e57652075736520636f6f6b69657320746f3a3c2f7374726f6e673e3c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b3c7374726f6e673e2662756c6c3b3c2f7374726f6e673e266e6273703b48656c702072656d656d62657220616e642070726f6365737320746865206974656d7320696e207468652073686f7070696e6720636172742e3c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e3c6272202f3e0d0a596f752063616e2063686f6f736520746f206861766520796f757220636f6d7075746572207761726e20796f7520656163682074696d65206120636f6f6b6965206973206265696e672073656e742c206f7220796f752063616e2063686f6f736520746f207475726e206f666620616c6c20636f6f6b6965732e20596f7520646f2074686973207468726f75676820796f75722062726f777365722073657474696e67732e2053696e63652062726f777365722069732061206c6974746c6520646966666572656e742c206c6f6f6b20617420796f75722062726f77736572262333393b732048656c70204d656e7520746f206c6561726e2074686520636f72726563742077617920746f206d6f6469667920796f757220636f6f6b6965732e3c2f6469763e0d0a266e6273703b0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e496620796f75207475726e20636f6f6b696573206f66662c20736f6d652066656174757265732077696c6c2062652064697361626c65642e20497420776f6e262333393b7420616666656374207468652075736572262333393b7320657870657269656e63652074686174206d616b6520796f7572207369746520657870657269656e6365206d6f726520656666696369656e7420616e64206d6179206e6f742066756e6374696f6e2070726f7065726c792e3c2f6469763e0d0a266e6273703b0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e486f77657665722c20796f752077696c6c207374696c6c2062652061626c6520746f20706c616365206f7264657273202e3c2f6469763e0d0a266e6273703b0d0a0d0a3c64697620636c6173733d22677261795465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e3c7374726f6e673e54686972642d706172747920646973636c6f737572653c2f7374726f6e673e3c2f6469763e0d0a266e6273703b0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e576520646f206e6f742073656c6c2c2074726164652c206f72206f7468657277697365207472616e7366657220746f206f757473696465207061727469657320796f757220506572736f6e616c6c79204964656e7469666961626c6520496e666f726d6174696f6e20756e6c6573732077652070726f76696465207573657273207769746820616476616e6365206e6f746963652e205468697320646f6573206e6f7420696e636c756465207765627369746520686f7374696e6720706172746e65727320616e64206f7468657220706172746965732077686f2061737369737420757320696e206f7065726174696e67206f757220776562736974652c20636f6e64756374696e67206f757220627573696e6573732c206f722073657276696e67206f75722075736572732c20736f206c6f6e672061732074686f7365207061727469657320616772656520746f206b656570207468697320696e666f726d6174696f6e20636f6e666964656e7469616c2e205765206d617920616c736f2072656c6561736520696e666f726d6174696f6e207768656e206974262333393b732072656c6561736520697320617070726f70726961746520746f20636f6d706c79207769746820746865206c61772c20656e666f726365206f7572207369746520706f6c69636965732c206f722070726f74656374206f757273206f72206f7468657273262333393b207269676874732c2070726f7065727479206f72207361666574792e266e6273703b3c6272202f3e0d0a3c6272202f3e0d0a486f77657665722c206e6f6e2d706572736f6e616c6c79206964656e7469666961626c652076697369746f7220696e666f726d6174696f6e206d61792062652070726f766964656420746f206f74686572207061727469657320666f72206d61726b6574696e672c206164766572746973696e672c206f72206f7468657220757365732e3c2f6469763e0d0a266e6273703b0d0a0d0a3c64697620636c6173733d22677261795465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e3c7374726f6e673e54686972642d7061727479206c696e6b733c2f7374726f6e673e3c2f6469763e0d0a266e6273703b0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e4f63636173696f6e616c6c792c206174206f75722064697363726574696f6e2c207765206d617920696e636c756465206f72206f666665722074686972642d70617274792070726f6475637473206f72207365727669636573206f6e206f757220776562736974652e2054686573652074686972642d7061727479207369746573206861766520736570617261746520616e6420696e646570656e64656e74207072697661637920706f6c69636965732e205765207468657265666f72652068617665206e6f20726573706f6e736962696c697479206f72206c696162696c69747920666f722074686520636f6e74656e7420616e642061637469766974696573206f66207468657365206c696e6b65642073697465732e204e6f6e657468656c6573732c207765207365656b20746f2070726f746563742074686520696e74656772697479206f66206f7572207369746520616e642077656c636f6d6520616e7920666565646261636b2061626f75742074686573652073697465732e3c2f6469763e0d0a266e6273703b0d0a0d0a3c64697620636c6173733d22626c75655465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e3c7374726f6e673e476f6f676c653c2f7374726f6e673e3c2f6469763e0d0a266e6273703b0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e476f6f676c65262333393b73206164766572746973696e6720726571756972656d656e74732063616e2062652073756d6d656420757020627920476f6f676c65262333393b73204164766572746973696e67205072696e6369706c65732e2054686579206172652070757420696e20706c61636520746f2070726f76696465206120706f73697469766520657870657269656e636520666f722075736572732e2068747470733a2f2f737570706f72742e676f6f676c652e636f6d2f6164776f726473706f6c6963792f616e737765722f313331363534383f686c3d656e266e6273703b3c6272202f3e0d0a266e6273703b3c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e57652068617665206e6f7420656e61626c656420476f6f676c6520416453656e7365206f6e206f7572207369746520627574207765206d617920646f20736f20696e20746865206675747572652e3c2f6469763e0d0a266e6273703b0d0a0d0a3c64697620636c6173733d22626c75655465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e3c7374726f6e673e43616c69666f726e6961204f6e6c696e6520507269766163792050726f74656374696f6e204163743c2f7374726f6e673e3c2f6469763e0d0a266e6273703b0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e43616c4f50504120697320746865206669727374207374617465206c617720696e20746865206e6174696f6e20746f207265717569726520636f6d6d65726369616c20776562736974657320616e64206f6e6c696e6520736572766963657320746f20706f73742061207072697661637920706f6c6963792e20546865206c6177262333393b73207265616368207374726574636865732077656c6c206265796f6e642043616c69666f726e696120746f207265717569726520616e7920706572736f6e206f7220636f6d70616e7920696e2074686520556e69746564205374617465732028616e6420636f6e6365697661626c792074686520776f726c64292074686174206f7065726174657320776562736974657320636f6c6c656374696e6720506572736f6e616c6c79204964656e7469666961626c6520496e666f726d6174696f6e2066726f6d2043616c69666f726e696120636f6e73756d65727320746f20706f7374206120636f6e73706963756f7573207072697661637920706f6c696379206f6e2069747320776562736974652073746174696e672065786163746c792074686520696e666f726d6174696f6e206265696e6720636f6c6c656374656420616e642074686f736520696e646976696475616c73206f7220636f6d70616e69657320776974682077686f6d206974206973206265696e67207368617265642e202d20536565206d6f72652061743a20687474703a2f2f636f6e73756d657263616c2e6f72672f63616c69666f726e69612d6f6e6c696e652d707269766163792d70726f74656374696f6e2d6163742d63616c6f7070612f237374686173682e30466452625435312e647075663c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e3c6272202f3e0d0a3c7374726f6e673e4163636f7264696e6720746f2043616c4f5050412c20776520616772656520746f2074686520666f6c6c6f77696e673a3c2f7374726f6e673e3c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e55736572732063616e207669736974206f7572207369746520616e6f6e796d6f75736c792e3c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e4f6e63652074686973207072697661637920706f6c69637920697320637265617465642c2077652077696c6c206164642061206c696e6b20746f206974206f6e206f757220686f6d652070616765206f722061732061206d696e696d756d2c206f6e20746865206669727374207369676e69666963616e74207061676520616674657220656e746572696e67206f757220776562736974652e3c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e4f7572205072697661637920506f6c696379206c696e6b20696e636c756465732074686520776f726420262333393b50726976616379262333393b20616e642063616e20656173696c7920626520666f756e64206f6e207468652070616765207370656369666965642061626f76652e3c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e3c6272202f3e0d0a596f752077696c6c206265206e6f746966696564206f6620616e79205072697661637920506f6c696379206368616e6765733a3c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b3c7374726f6e673e2662756c6c3b3c2f7374726f6e673e266e6273703b4f6e206f7572205072697661637920506f6c69637920506167653c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e43616e206368616e676520796f757220706572736f6e616c20696e666f726d6174696f6e3a3c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b3c7374726f6e673e2662756c6c3b3c2f7374726f6e673e266e6273703b427920656d61696c696e672075733c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e3c6272202f3e0d0a3c7374726f6e673e486f7720646f6573206f757220736974652068616e646c6520446f204e6f7420547261636b207369676e616c733f3c2f7374726f6e673e3c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e576520686f6e6f7220446f204e6f7420547261636b207369676e616c7320616e6420446f204e6f7420547261636b2c20706c616e7420636f6f6b6965732c206f7220757365206164766572746973696e67207768656e206120446f204e6f7420547261636b2028444e54292062726f77736572206d656368616e69736d20697320696e20706c6163652e3c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e3c6272202f3e0d0a3c7374726f6e673e446f6573206f7572207369746520616c6c6f772074686972642d7061727479206265686176696f72616c20747261636b696e673f3c2f7374726f6e673e3c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e4974262333393b7320616c736f20696d706f7274616e7420746f206e6f7465207468617420776520616c6c6f772074686972642d7061727479206265686176696f72616c20747261636b696e673c2f6469763e0d0a266e6273703b0d0a0d0a3c64697620636c6173733d22626c75655465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e3c7374726f6e673e434f50504120284368696c6472656e204f6e6c696e6520507269766163792050726f74656374696f6e20416374293c2f7374726f6e673e3c2f6469763e0d0a266e6273703b0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e5768656e20697420636f6d657320746f2074686520636f6c6c656374696f6e206f6620706572736f6e616c20696e666f726d6174696f6e2066726f6d206368696c6472656e20756e6465722074686520616765206f66203133207965617273206f6c642c20746865204368696c6472656e262333393b73204f6e6c696e6520507269766163792050726f74656374696f6e204163742028434f50504129207075747320706172656e747320696e20636f6e74726f6c2e20546865204665646572616c20547261646520436f6d6d697373696f6e2c20556e6974656420537461746573262333393b20636f6e73756d65722070726f74656374696f6e206167656e63792c20656e666f726365732074686520434f5050412052756c652c207768696368207370656c6c73206f75742077686174206f70657261746f7273206f6620776562736974657320616e64206f6e6c696e65207365727669636573206d75737420646f20746f2070726f74656374206368696c6472656e262333393b73207072697661637920616e6420736166657479206f6e6c696e652e3c6272202f3e0d0a266e6273703b3c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e576520646f206e6f74207370656369666963616c6c79206d61726b657420746f206368696c6472656e20756e6465722074686520616765206f66203133207965617273206f6c642e3c2f6469763e0d0a266e6273703b0d0a0d0a3c64697620636c6173733d22626c75655465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e3c7374726f6e673e4661697220496e666f726d6174696f6e205072616374696365733c2f7374726f6e673e3c2f6469763e0d0a266e6273703b0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e546865204661697220496e666f726d6174696f6e20507261637469636573205072696e6369706c657320666f726d20746865206261636b626f6e65206f662070726976616379206c617720696e2074686520556e697465642053746174657320616e642074686520636f6e6365707473207468657920696e636c756465206861766520706c617965642061207369676e69666963616e7420726f6c6520696e2074686520646576656c6f706d656e74206f6620646174612070726f74656374696f6e206c6177732061726f756e642074686520676c6f62652e20556e6465727374616e64696e6720746865204661697220496e666f726d6174696f6e205072616374696365205072696e6369706c657320616e6420686f7720746865792073686f756c6420626520696d706c656d656e74656420697320637269746963616c20746f20636f6d706c7920776974682074686520766172696f75732070726976616379206c61777320746861742070726f7465637420706572736f6e616c20696e666f726d6174696f6e2e3c6272202f3e0d0a266e6273703b3c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e3c7374726f6e673e496e206f7264657220746f20626520696e206c696e652077697468204661697220496e666f726d6174696f6e205072616374696365732077652077696c6c2074616b652074686520666f6c6c6f77696e6720726573706f6e7369766520616374696f6e2c2073686f756c642061206461746120627265616368206f636375723a3c2f7374726f6e673e3c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e57652077696c6c206e6f7469667920796f752076696120656d61696c3c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b3c7374726f6e673e2662756c6c3b3c2f7374726f6e673e266e6273703b57697468696e203120627573696e657373206461793c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e3c6272202f3e0d0a576520616c736f20616772656520746f2074686520496e646976696475616c2052656472657373205072696e6369706c65207768696368207265717569726573207468617420696e646976696475616c7320686176652074686520726967687420746f206c6567616c6c792070757273756520656e666f72636561626c652072696768747320616761696e7374206461746120636f6c6c6563746f727320616e642070726f636573736f72732077686f206661696c20746f2061646865726520746f20746865206c61772e2054686973207072696e6369706c65207265717569726573206e6f74206f6e6c79207468617420696e646976696475616c73206861766520656e666f72636561626c652072696768747320616761696e737420646174612075736572732c2062757420616c736f207468617420696e646976696475616c732068617665207265636f7572736520746f20636f75727473206f7220676f7665726e6d656e74206167656e6369657320746f20696e76657374696761746520616e642f6f722070726f736563757465206e6f6e2d636f6d706c69616e636520627920646174612070726f636573736f72732e3c2f6469763e0d0a266e6273703b0d0a0d0a3c64697620636c6173733d22626c75655465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e3c7374726f6e673e43414e205350414d204163743c2f7374726f6e673e3c2f6469763e0d0a266e6273703b0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e5468652043414e2d5350414d204163742069732061206c617720746861742073657473207468652072756c657320666f7220636f6d6d65726369616c20656d61696c2c2065737461626c697368657320726571756972656d656e747320666f7220636f6d6d65726369616c206d657373616765732c20676976657320726563697069656e74732074686520726967687420746f206861766520656d61696c732073746f707065642066726f6d206265696e672073656e7420746f207468656d2c20616e64207370656c6c73206f757420746f7567682070656e616c7469657320666f722076696f6c6174696f6e732e3c6272202f3e0d0a266e6273703b3c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e3c7374726f6e673e576520636f6c6c65637420796f757220656d61696c206164647265737320696e206f7264657220746f3a3c2f7374726f6e673e3c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b3c7374726f6e673e2662756c6c3b3c2f7374726f6e673e266e6273703b4d61726b657420746f206f7572206d61696c696e67206c697374206f7220636f6e74696e756520746f2073656e6420656d61696c7320746f206f757220636c69656e747320616674657220746865206f726967696e616c207472616e73616374696f6e20686173206f636375727265642e3c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e3c6272202f3e0d0a3c7374726f6e673e546f20626520696e206163636f7264616e636520776974682043414e5350414d2c20776520616772656520746f2074686520666f6c6c6f77696e673a3c2f7374726f6e673e3c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b3c7374726f6e673e2662756c6c3b3c2f7374726f6e673e266e6273703b4e6f74207573652066616c7365206f72206d69736c656164696e67207375626a65637473206f7220656d61696c206164647265737365732e3c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b3c7374726f6e673e2662756c6c3b3c2f7374726f6e673e266e6273703b4964656e7469667920746865206d65737361676520617320616e206164766572746973656d656e7420696e20736f6d6520726561736f6e61626c65207761792e3c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b3c7374726f6e673e2662756c6c3b3c2f7374726f6e673e266e6273703b496e636c7564652074686520706879736963616c2061646472657373206f66206f757220627573696e657373206f722073697465206865616471756172746572732e3c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b3c7374726f6e673e2662756c6c3b3c2f7374726f6e673e266e6273703b4d6f6e69746f722074686972642d706172747920656d61696c206d61726b6574696e6720736572766963657320666f7220636f6d706c69616e63652c206966206f6e6520697320757365642e3c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b3c7374726f6e673e2662756c6c3b3c2f7374726f6e673e266e6273703b486f6e6f72206f70742d6f75742f756e73756273637269626520726571756573747320717569636b6c792e3c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b3c7374726f6e673e2662756c6c3b3c2f7374726f6e673e266e6273703b416c6c6f7720757365727320746f20756e737562736372696265206279207573696e6720746865206c696e6b2061742074686520626f74746f6d206f66206561636820656d61696c2e3c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e3c6272202f3e0d0a3c7374726f6e673e496620617420616e792074696d6520796f7520776f756c64206c696b6520746f20756e7375627363726962652066726f6d20726563656976696e672066757475726520656d61696c732c20796f752063616e20656d61696c2075732061743c2f7374726f6e673e3c2f6469763e0d0a0d0a3c64697620636c6173733d22696e6e65725465787422207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f782d73697a696e673a20626f726465722d626f783b20626f726465723a203070783b206f75746c696e653a203070783b20666f6e742d73697a653a20313470783b20766572746963616c2d616c69676e3a20626173656c696e653b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b20666f6e742d66616d696c793a20223e266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b3c7374726f6e673e2662756c6c3b3c2f7374726f6e673e266e6273703b466f6c6c6f772074686520696e737472756374696f6e732061742074686520626f74746f6d206f66206561636820656d61696c2e3c2f6469763e0d0a3c7370616e207374796c653d22666f6e742d66616d696c793a6f70656e2073616e733b20666f6e742d73697a653a31347078223e616e642077652077696c6c2070726f6d70746c792072656d6f766520796f752066726f6d266e6273703b3c2f7370616e3e3c7374726f6e673e414c4c3c2f7374726f6e673e3c7370616e207374796c653d22666f6e742d66616d696c793a6f70656e2073616e733b20666f6e742d73697a653a31347078223e266e6273703b636f72726573706f6e64656e63652e3c2f7370616e3e3c2f6469763e0d0a, '<p>Last updated: September 25, 2016</p>\r\n\r\n<p>Please read these Terms and Conditions (&quot;Terms&quot;, &quot;Terms and Conditions&quot;) carefully before using the https://mygoldenmatch.com website (the &quot;Service&quot;) operated by https://mygoldenmatch.com/ (&quot;us&quot;, &quot;we&quot;, or &quot;our&quot;).</p>\r\n\r\n<p>Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who access or use the Service.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam cursus egestas dui eget dignissim. Pellentesque mi nisl, faucibus non rhoncus quis, dictum nec sapien. Mauris tempor justo nisl, eu vulputate nulla fringilla dictum. Mauris non viverra purus. Suspendisse in dui ac erat tincidunt finibus. Vivamus massa dui, consequat finibus rhoncus in, scelerisque nec lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse ut dui vel libero faucibus sollicitudin eu id turpis. Curabitur nec nibh mauris. Sed malesuada non libero vel pellentesque. Suspendisse potenti. Fusce placerat quam vitae purus rutrum, ut tempor purus tempor. Vestibulum euismod tortor a dolor condimentum lacinia a vitae lacus. Nam cursus mi ut orci egestas, ac mollis libero condimentum. Phasellus pulvinar eleifend dapibus. Pellentesque eu tellus non libero ultricies dictum. Fusce molestie est a lacinia porttitor. Pellentesque laoreet, risus ac laoreet mollis, nisl erat viverra justo, viverra tincidunt dui sapien ac velit. Vestibulum eu elementum nulla, at imperdiet ipsum. Phasellus massa nulla, egestas sed mauris et, tempus sagittis mi. Pellentesque lacinia, sem ut maximus ornare, odio magna dignissim enim, et accumsan risus orci lobortis turpis. Morbi tincidunt tempus fringilla. Quisque iaculis turpis eget ligula convallis, nec maximus libero efficitur. Nunc nec nisl ante. Phasellus porttitor auctor imperdiet.</p>\r\n', 'Europe/Belgrade', 1, '', 'your-api-here', 'your-api-here', 0, 50, 12, 'your-api-here', 'your-api-here', 0, 0, 0, '1.0.9', 1, 6, 0, 0, 0, 0, 0, 2);

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzythemes`
-- 

CREATE TABLE `buzzythemes` (
  `buzzytheme_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzytheme` varchar(255) NOT NULL,
  `buzzytheme_img` varchar(255) NOT NULL,
  PRIMARY KEY (`buzzytheme_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

-- 
-- Dumping data for table `buzzythemes`
-- 

INSERT INTO `buzzythemes` VALUES (1, 'Basic', 'basic.jpg');
INSERT INTO `buzzythemes` VALUES (2, 'Red rose', 'redrose.jpg');
INSERT INTO `buzzythemes` VALUES (3, 'Aqua star', 'aquastar.jpg');
INSERT INTO `buzzythemes` VALUES (4, 'Dark vintage', 'darkvintage.jpg');
INSERT INTO `buzzythemes` VALUES (5, 'Modern grass', 'moderngrass.jpg');
INSERT INTO `buzzythemes` VALUES (6, 'Whiskey', 'whiskey.jpg');
INSERT INTO `buzzythemes` VALUES (7, 'Old memories', 'oldmemories.jpg');
INSERT INTO `buzzythemes` VALUES (8, 'Elegance', 'elegance.jpg');
INSERT INTO `buzzythemes` VALUES (9, 'Fancy beach', 'fancybeach.jpg');
INSERT INTO `buzzythemes` VALUES (10, 'Pintheme', 'pintheme.jpg');
INSERT INTO `buzzythemes` VALUES (11, 'Kiss', 'kiss.jpg');
INSERT INTO `buzzythemes` VALUES (12, 'Mint', 'mint.jpg');
INSERT INTO `buzzythemes` VALUES (13, 'Bluebery', 'blueberry.jpg');
INSERT INTO `buzzythemes` VALUES (14, 'Newyork coast', 'newyorkcoast.jpg');
INSERT INTO `buzzythemes` VALUES (15, 'Extravagant', 'extravagance.jpg');
INSERT INTO `buzzythemes` VALUES (16, 'Romantic', 'romantic.jpg');
INSERT INTO `buzzythemes` VALUES (17, 'Purple', 'purple.jpg');
INSERT INTO `buzzythemes` VALUES (18, 'Portuguese', 'portuguese.jpg');
INSERT INTO `buzzythemes` VALUES (19, 'Old Classic', 'oldclassic.jpg');
INSERT INTO `buzzythemes` VALUES (20, 'Red Dragon', 'reddragon.jpg');
INSERT INTO `buzzythemes` VALUES (21, 'Atlantic', 'atlantic.jpg');
INSERT INTO `buzzythemes` VALUES (22, 'Street taste', 'streettaste.jpg');
INSERT INTO `buzzythemes` VALUES (23, 'Wild west', 'wildwest.jpg');
INSERT INTO `buzzythemes` VALUES (24, 'German ', 'german.jpg');
INSERT INTO `buzzythemes` VALUES (25, 'Handwriting', 'handwritting.jpg');
INSERT INTO `buzzythemes` VALUES (26, 'Purple fantasy', 'purplefantasy.jpg');
INSERT INTO `buzzythemes` VALUES (27, 'Baby blue', 'babyblue.jpg');
INSERT INTO `buzzythemes` VALUES (28, 'Foam green', 'foamgreen.jpg');
INSERT INTO `buzzythemes` VALUES (29, 'Erotic', 'erotic.jpg');
INSERT INTO `buzzythemes` VALUES (30, 'Red Wine', 'redwine.jpg');

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyuser_data`
-- 

CREATE TABLE `buzzyuser_data` (
  `buzzyuser_data_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyuser_data_height` float(5,2) NOT NULL,
  `buzzyuser_data_weight` int(11) NOT NULL,
  `buzzyuser_data_sexual_orientation` int(11) NOT NULL,
  `buzzyuser_data_rel_status` int(11) NOT NULL,
  `buzzyuser_data_body` int(11) NOT NULL,
  `buzzyuser_hair_color` int(11) NOT NULL,
  `buzzyuser_eye_color` int(11) NOT NULL,
  `buzzyuser_no_kids` int(11) NOT NULL,
  `buzzyuser_smoker` int(11) NOT NULL,
  `buzzyuser_drinker` int(11) NOT NULL,
  `buzzyuser_aboutme` text NOT NULL,
  `buzzyuser_id` int(11) NOT NULL,
  PRIMARY KEY (`buzzyuser_data_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `buzzyuser_data`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyuser_interest_categories`
-- 

CREATE TABLE `buzzyuser_interest_categories` (
  `buzzyuser_interest_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyuser_interest_category` varchar(255) NOT NULL,
  `buzzyuser_interest_category_icon` varchar(255) NOT NULL,
  PRIMARY KEY (`buzzyuser_interest_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- 
-- Dumping data for table `buzzyuser_interest_categories`
-- 

INSERT INTO `buzzyuser_interest_categories` VALUES (1, 'Music', 'fa-music');
INSERT INTO `buzzyuser_interest_categories` VALUES (2, 'Sport', 'fa-futbol-o');
INSERT INTO `buzzyuser_interest_categories` VALUES (3, 'Fashion', 'fa-diamond');
INSERT INTO `buzzyuser_interest_categories` VALUES (4, 'Movie', 'fa-film');
INSERT INTO `buzzyuser_interest_categories` VALUES (5, 'Food', 'fa-cutlery');
INSERT INTO `buzzyuser_interest_categories` VALUES (6, 'Drink', 'fa-glass');
INSERT INTO `buzzyuser_interest_categories` VALUES (7, 'Location', 'fa-map-marker');
INSERT INTO `buzzyuser_interest_categories` VALUES (8, 'Hobies', 'fa-paper-plane');
INSERT INTO `buzzyuser_interest_categories` VALUES (9, 'Tv show', 'fa-television');
INSERT INTO `buzzyuser_interest_categories` VALUES (10, 'Social', 'fa-thumbs-up');
INSERT INTO `buzzyuser_interest_categories` VALUES (11, 'Sex', 'fa-venus-mars');
INSERT INTO `buzzyuser_interest_categories` VALUES (12, 'City', 'fa-building');

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyuser_interests`
-- 

CREATE TABLE `buzzyuser_interests` (
  `buzzyuser_interest_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyuser_interest` varchar(255) NOT NULL,
  `buzzyuser_interest_category_id` int(11) NOT NULL,
  `buzzyuser_id` int(11) NOT NULL,
  PRIMARY KEY (`buzzyuser_interest_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `buzzyuser_interests`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyuser_visitors`
-- 

CREATE TABLE `buzzyuser_visitors` (
  `buzzyuser_visitor_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyuser_visitor` int(11) NOT NULL,
  `buzzyuser_id` int(11) NOT NULL,
  `buzzyuser_visitor_timestamp` int(11) NOT NULL,
  `buzzyuser_visitor_seen` int(11) NOT NULL,
  PRIMARY KEY (`buzzyuser_visitor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

-- 
-- Dumping data for table `buzzyuser_visitors`
-- 

INSERT INTO `buzzyuser_visitors` VALUES (29, 344, 1204, 1482484971, 0);
INSERT INTO `buzzyuser_visitors` VALUES (30, 344, 1195, 1483715179, 0);
INSERT INTO `buzzyuser_visitors` VALUES (31, 344, 1203, 1482489083, 0);
INSERT INTO `buzzyuser_visitors` VALUES (32, 344, 1136, 1483262067, 0);
INSERT INTO `buzzyuser_visitors` VALUES (33, 344, 1124, 1482489355, 0);
INSERT INTO `buzzyuser_visitors` VALUES (34, 344, 1197, 1482853235, 0);
INSERT INTO `buzzyuser_visitors` VALUES (35, 344, 1123, 1483876351, 1);
INSERT INTO `buzzyuser_visitors` VALUES (36, 344, 1155, 1483715171, 0);
INSERT INTO `buzzyuser_visitors` VALUES (37, 344, 1169, 1483543979, 0);
INSERT INTO `buzzyuser_visitors` VALUES (38, 344, 1119, 1483545915, 0);
INSERT INTO `buzzyuser_visitors` VALUES (39, 1123, 344, 1483732208, 1);
INSERT INTO `buzzyuser_visitors` VALUES (40, 344, 1139, 1483876466, 0);
INSERT INTO `buzzyuser_visitors` VALUES (41, 344, 1363, 1484041581, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyuseractivities`
-- 

CREATE TABLE `buzzyuseractivities` (
  `buzzyuseractivity_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyuseractivity_timestamp` int(11) NOT NULL,
  `buzzyuser_id` int(11) NOT NULL,
  PRIMARY KEY (`buzzyuseractivity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=latin1 AUTO_INCREMENT=122 ;

-- 
-- Dumping data for table `buzzyuseractivities`
-- 

INSERT INTO `buzzyuseractivities` VALUES (1, 1492776537, 344);
INSERT INTO `buzzyuseractivities` VALUES (2, 1492776546, 344);
INSERT INTO `buzzyuseractivities` VALUES (9, 1492776546, 344);
INSERT INTO `buzzyuseractivities` VALUES (10, 1492776546, 344);
INSERT INTO `buzzyuseractivities` VALUES (11, 1492776546, 344);
INSERT INTO `buzzyuseractivities` VALUES (12, 1492776546, 344);
INSERT INTO `buzzyuseractivities` VALUES (13, 1492776546, 344);
INSERT INTO `buzzyuseractivities` VALUES (14, 1492776546, 344);
INSERT INTO `buzzyuseractivities` VALUES (15, 1492776546, 344);
INSERT INTO `buzzyuseractivities` VALUES (16, 1492776546, 344);
INSERT INTO `buzzyuseractivities` VALUES (17, 1492928327, 344);
INSERT INTO `buzzyuseractivities` VALUES (18, 1493098931, 344);
INSERT INTO `buzzyuseractivities` VALUES (19, 1493186427, 344);
INSERT INTO `buzzyuseractivities` VALUES (20, 1493187709, 344);
INSERT INTO `buzzyuseractivities` VALUES (21, 1493188106, 669);
INSERT INTO `buzzyuseractivities` VALUES (22, 1493188155, 344);
INSERT INTO `buzzyuseractivities` VALUES (23, 1493190862, 331);
INSERT INTO `buzzyuseractivities` VALUES (24, 1493193177, 344);
INSERT INTO `buzzyuseractivities` VALUES (25, 1493193986, 344);
INSERT INTO `buzzyuseractivities` VALUES (26, 1493194600, 331);
INSERT INTO `buzzyuseractivities` VALUES (27, 1493196368, 344);
INSERT INTO `buzzyuseractivities` VALUES (28, 1493196705, 344);
INSERT INTO `buzzyuseractivities` VALUES (29, 1493216125, 344);
INSERT INTO `buzzyuseractivities` VALUES (30, 1493216339, 331);
INSERT INTO `buzzyuseractivities` VALUES (31, 1493234484, 344);
INSERT INTO `buzzyuseractivities` VALUES (32, 1493268145, 344);
INSERT INTO `buzzyuseractivities` VALUES (33, 1493280481, 331);
INSERT INTO `buzzyuseractivities` VALUES (34, 1493280857, 344);
INSERT INTO `buzzyuseractivities` VALUES (35, 1493320889, 344);
INSERT INTO `buzzyuseractivities` VALUES (36, 1493321485, 344);
INSERT INTO `buzzyuseractivities` VALUES (37, 1493321607, 972);
INSERT INTO `buzzyuseractivities` VALUES (38, 1493325736, 344);
INSERT INTO `buzzyuseractivities` VALUES (39, 1493356965, 344);
INSERT INTO `buzzyuseractivities` VALUES (40, 1493376044, 344);
INSERT INTO `buzzyuseractivities` VALUES (41, 1493395721, 344);
INSERT INTO `buzzyuseractivities` VALUES (42, 1493478755, 344);
INSERT INTO `buzzyuseractivities` VALUES (43, 1493538996, 344);
INSERT INTO `buzzyuseractivities` VALUES (44, 1493587224, 344);
INSERT INTO `buzzyuseractivities` VALUES (45, 1493627875, 344);
INSERT INTO `buzzyuseractivities` VALUES (46, 1493631145, 344);
INSERT INTO `buzzyuseractivities` VALUES (47, 1493633458, 344);
INSERT INTO `buzzyuseractivities` VALUES (48, 1493633612, 344);
INSERT INTO `buzzyuseractivities` VALUES (49, 1493633919, 344);
INSERT INTO `buzzyuseractivities` VALUES (50, 1493633981, 344);
INSERT INTO `buzzyuseractivities` VALUES (51, 1493634215, 344);
INSERT INTO `buzzyuseractivities` VALUES (52, 1493634366, 344);
INSERT INTO `buzzyuseractivities` VALUES (53, 1493634549, 344);
INSERT INTO `buzzyuseractivities` VALUES (54, 1493635856, 344);
INSERT INTO `buzzyuseractivities` VALUES (55, 1493636304, 344);
INSERT INTO `buzzyuseractivities` VALUES (56, 1493636389, 344);
INSERT INTO `buzzyuseractivities` VALUES (57, 1493636425, 344);
INSERT INTO `buzzyuseractivities` VALUES (58, 1493636473, 344);
INSERT INTO `buzzyuseractivities` VALUES (59, 1493636562, 344);
INSERT INTO `buzzyuseractivities` VALUES (60, 1493637521, 344);
INSERT INTO `buzzyuseractivities` VALUES (61, 1493638983, 344);
INSERT INTO `buzzyuseractivities` VALUES (62, 1493639015, 344);
INSERT INTO `buzzyuseractivities` VALUES (63, 1493656373, 344);
INSERT INTO `buzzyuseractivities` VALUES (64, 1493660139, 344);
INSERT INTO `buzzyuseractivities` VALUES (65, 1493710002, 344);
INSERT INTO `buzzyuseractivities` VALUES (66, 1493710019, 344);
INSERT INTO `buzzyuseractivities` VALUES (67, 1493714984, 344);
INSERT INTO `buzzyuseractivities` VALUES (68, 1493714993, 344);
INSERT INTO `buzzyuseractivities` VALUES (69, 1493723917, 344);
INSERT INTO `buzzyuseractivities` VALUES (70, 1493724502, 331);
INSERT INTO `buzzyuseractivities` VALUES (71, 1493729748, 344);
INSERT INTO `buzzyuseractivities` VALUES (72, 1493729848, 344);
INSERT INTO `buzzyuseractivities` VALUES (73, 1493732134, 344);
INSERT INTO `buzzyuseractivities` VALUES (74, 1493733335, 344);
INSERT INTO `buzzyuseractivities` VALUES (75, 1493734776, 344);
INSERT INTO `buzzyuseractivities` VALUES (76, 1493746998, 344);
INSERT INTO `buzzyuseractivities` VALUES (77, 1493748933, 344);
INSERT INTO `buzzyuseractivities` VALUES (78, 1493751429, 344);
INSERT INTO `buzzyuseractivities` VALUES (79, 1493753958, 344);
INSERT INTO `buzzyuseractivities` VALUES (80, 1493756712, 344);
INSERT INTO `buzzyuseractivities` VALUES (81, 1493783597, 344);
INSERT INTO `buzzyuseractivities` VALUES (82, 1493797337, 344);
INSERT INTO `buzzyuseractivities` VALUES (83, 1493797468, 968);
INSERT INTO `buzzyuseractivities` VALUES (84, 1493799838, 344);
INSERT INTO `buzzyuseractivities` VALUES (85, 1493800314, 344);
INSERT INTO `buzzyuseractivities` VALUES (86, 1493816191, 344);
INSERT INTO `buzzyuseractivities` VALUES (87, 1493816215, 344);
INSERT INTO `buzzyuseractivities` VALUES (88, 1493816247, 344);
INSERT INTO `buzzyuseractivities` VALUES (89, 1493821699, 344);
INSERT INTO `buzzyuseractivities` VALUES (90, 1493824443, 344);
INSERT INTO `buzzyuseractivities` VALUES (91, 1493826747, 344);
INSERT INTO `buzzyuseractivities` VALUES (92, 1493827287, 344);
INSERT INTO `buzzyuseractivities` VALUES (93, 1493873786, 344);
INSERT INTO `buzzyuseractivities` VALUES (94, 1493876292, 344);
INSERT INTO `buzzyuseractivities` VALUES (95, 1493879167, 344);
INSERT INTO `buzzyuseractivities` VALUES (96, 1493879918, 344);
INSERT INTO `buzzyuseractivities` VALUES (97, 1493881738, 344);
INSERT INTO `buzzyuseractivities` VALUES (98, 1493888164, 344);
INSERT INTO `buzzyuseractivities` VALUES (99, 1493888872, 344);
INSERT INTO `buzzyuseractivities` VALUES (100, 1493901111, 344);
INSERT INTO `buzzyuseractivities` VALUES (101, 1493903925, 344);
INSERT INTO `buzzyuseractivities` VALUES (102, 1493905933, 344);
INSERT INTO `buzzyuseractivities` VALUES (103, 1493909658, 344);
INSERT INTO `buzzyuseractivities` VALUES (104, 1493910355, 331);
INSERT INTO `buzzyuseractivities` VALUES (105, 1493910504, 344);
INSERT INTO `buzzyuseractivities` VALUES (106, 1493913310, 331);
INSERT INTO `buzzyuseractivities` VALUES (107, 1493913632, 344);
INSERT INTO `buzzyuseractivities` VALUES (108, 1493916467, 344);
INSERT INTO `buzzyuseractivities` VALUES (109, 1493921127, 344);
INSERT INTO `buzzyuseractivities` VALUES (110, 1493926616, 344);
INSERT INTO `buzzyuseractivities` VALUES (111, 1493928203, 344);
INSERT INTO `buzzyuseractivities` VALUES (112, 1493928258, 344);
INSERT INTO `buzzyuseractivities` VALUES (113, 1493959480, 344);
INSERT INTO `buzzyuseractivities` VALUES (114, 1493974774, 344);
INSERT INTO `buzzyuseractivities` VALUES (115, 1493974961, 344);
INSERT INTO `buzzyuseractivities` VALUES (116, 1493998076, 344);
INSERT INTO `buzzyuseractivities` VALUES (117, 1493998186, 973);
INSERT INTO `buzzyuseractivities` VALUES (118, 1493998226, 974);
INSERT INTO `buzzyuseractivities` VALUES (119, 1493998825, 344);
INSERT INTO `buzzyuseractivities` VALUES (120, 1493999531, 344);
INSERT INTO `buzzyuseractivities` VALUES (121, 1494000465, 344);

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyusergifts`
-- 

CREATE TABLE `buzzyusergifts` (
  `buzzyusergift_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzysender_id` int(11) NOT NULL,
  `buzzyuser_id` int(11) NOT NULL,
  `buzzygift_id` int(11) NOT NULL,
  PRIMARY KEY (`buzzyusergift_id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

-- 
-- Dumping data for table `buzzyusergifts`
-- 

INSERT INTO `buzzyusergifts` VALUES (70, 344, 328, 18);
INSERT INTO `buzzyusergifts` VALUES (71, 344, 328, 23);
INSERT INTO `buzzyusergifts` VALUES (72, 344, 331, 25);
INSERT INTO `buzzyusergifts` VALUES (73, 967, 344, 21);
INSERT INTO `buzzyusergifts` VALUES (74, 686, 344, 24);
INSERT INTO `buzzyusergifts` VALUES (75, 344, 328, 20);
INSERT INTO `buzzyusergifts` VALUES (76, 344, 670, 18);
INSERT INTO `buzzyusergifts` VALUES (77, 344, 973, 20);
INSERT INTO `buzzyusergifts` VALUES (78, 344, 976, 22);

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyuserglobals`
-- 

CREATE TABLE `buzzyuserglobals` (
  `buzzyuserglobal_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyuserglobal_credits` int(11) NOT NULL,
  `buzzyuserglobal_creditprice` double(5,2) NOT NULL,
  `buzzyuserglobal_daypromoteprice` int(11) NOT NULL,
  `buzzyuserglobal_uploadpermision` tinyint(1) NOT NULL,
  `buzzyuserglobal_addlinkspermision` tinyint(1) NOT NULL,
  `buzzyuserglobal_iconstatus` tinyint(1) NOT NULL,
  `buzzypaypal_email` varchar(255) NOT NULL,
  `buzzyuserpaypal_currency` varchar(255) NOT NULL,
  `buzzyuserpaypal_currency_id` int(11) NOT NULL,
  `buzzyskrill_email` varchar(255) NOT NULL,
  `paypal_url` varchar(255) NOT NULL,
  `buzzyuserskrill_currency` varchar(255) NOT NULL,
  `skrill_url` varchar(255) NOT NULL,
  `fortumo_status` tinyint(1) NOT NULL,
  `buzzyuserglobal_cat_status` tinyint(1) NOT NULL,
  `buzzyfortumo_price` int(11) NOT NULL,
  PRIMARY KEY (`buzzyuserglobal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `buzzyuserglobals`
-- 

INSERT INTO `buzzyuserglobals` VALUES (1, 100, 10.00, 70, 0, 1, 1, 'your-paypal-email@gmail.com', 'USD', 1, '@gmail.com', 'https://www.sandbox.paypal.com/cgi-bin/webscr', 'USD', 'https://www.moneybookers.com/app/payment.pl', 0, 0, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyuserimages`
-- 

CREATE TABLE `buzzyuserimages` (
  `buzzyuserimage_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyuserimage` varchar(255) NOT NULL,
  `buzzyuser_id` int(11) NOT NULL,
  `buzzyuserimage_privatestatus` tinyint(1) NOT NULL,
  `buzzyuserimage_approval` int(11) NOT NULL,
  PRIMARY KEY (`buzzyuserimage_id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

-- 
-- Dumping data for table `buzzyuserimages`
-- 

INSERT INTO `buzzyuserimages` VALUES (62, 'bbv.jpg', 344, 0, 0);
INSERT INTO `buzzyuserimages` VALUES (63, '2p.jpg', 344, 0, 0);
INSERT INTO `buzzyuserimages` VALUES (64, 'ivanaiv.jpg', 344, 0, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyuserliked`
-- 

CREATE TABLE `buzzyuserliked` (
  `buzzyuserliked_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyliked_id` int(11) NOT NULL,
  `buzzyuser_id` int(11) NOT NULL,
  `buzzyuserliked_timestamp` int(11) NOT NULL,
  `buzzyuserliked_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`buzzyuserliked_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

-- 
-- Dumping data for table `buzzyuserliked`
-- 

INSERT INTO `buzzyuserliked` VALUES (19, 1195, 344, 1482483723, 0);
INSERT INTO `buzzyuserliked` VALUES (20, 1128, 344, 1482483780, 0);
INSERT INTO `buzzyuserliked` VALUES (21, 1191, 344, 1482483784, 0);
INSERT INTO `buzzyuserliked` VALUES (22, 1182, 344, 1482486694, 0);
INSERT INTO `buzzyuserliked` VALUES (23, 1188, 344, 1483260804, 0);
INSERT INTO `buzzyuserliked` VALUES (24, 1123, 344, 1483261274, 1);
INSERT INTO `buzzyuserliked` VALUES (25, 1149, 344, 1483544348, 0);
INSERT INTO `buzzyuserliked` VALUES (26, 1194, 344, 1483544352, 0);
INSERT INTO `buzzyuserliked` VALUES (27, 1144, 344, 1483544356, 0);
INSERT INTO `buzzyuserliked` VALUES (28, 1200, 344, 1483544360, 0);
INSERT INTO `buzzyuserliked` VALUES (29, 1147, 344, 1483545999, 0);
INSERT INTO `buzzyuserliked` VALUES (30, 1199, 344, 1483546004, 0);
INSERT INTO `buzzyuserliked` VALUES (31, 1135, 344, 1483546007, 0);
INSERT INTO `buzzyuserliked` VALUES (32, 1186, 344, 1483546011, 0);
INSERT INTO `buzzyuserliked` VALUES (33, 1190, 344, 1483546015, 0);
INSERT INTO `buzzyuserliked` VALUES (34, 1192, 344, 1483546027, 0);
INSERT INTO `buzzyuserliked` VALUES (35, 1141, 344, 1483546030, 0);
INSERT INTO `buzzyuserliked` VALUES (36, 1171, 344, 1483546035, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyuserloveable`
-- 

CREATE TABLE `buzzyuserloveable` (
  `buzzyuserloveable_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyuserloveable_timestamp` int(11) NOT NULL,
  `buzzyuser_id` int(11) NOT NULL,
  PRIMARY KEY (`buzzyuserloveable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=305 DEFAULT CHARSET=latin1 AUTO_INCREMENT=305 ;

-- 
-- Dumping data for table `buzzyuserloveable`
-- 

INSERT INTO `buzzyuserloveable` VALUES (1, 1492792282, 344);
INSERT INTO `buzzyuserloveable` VALUES (2, 1492792282, 344);
INSERT INTO `buzzyuserloveable` VALUES (3, 1492792282, 344);
INSERT INTO `buzzyuserloveable` VALUES (4, 1492792282, 344);
INSERT INTO `buzzyuserloveable` VALUES (5, 1492792282, 344);
INSERT INTO `buzzyuserloveable` VALUES (6, 1492792282, 344);
INSERT INTO `buzzyuserloveable` VALUES (7, 1492927257, 969);
INSERT INTO `buzzyuserloveable` VALUES (8, 1492927258, 969);
INSERT INTO `buzzyuserloveable` VALUES (9, 1492927259, 969);
INSERT INTO `buzzyuserloveable` VALUES (10, 1492927259, 969);
INSERT INTO `buzzyuserloveable` VALUES (11, 1492927260, 969);
INSERT INTO `buzzyuserloveable` VALUES (12, 1492927260, 969);
INSERT INTO `buzzyuserloveable` VALUES (13, 1492927261, 969);
INSERT INTO `buzzyuserloveable` VALUES (14, 1492927262, 969);
INSERT INTO `buzzyuserloveable` VALUES (15, 1492927556, 507);
INSERT INTO `buzzyuserloveable` VALUES (16, 1492927566, 421);
INSERT INTO `buzzyuserloveable` VALUES (17, 1492927574, 462);
INSERT INTO `buzzyuserloveable` VALUES (18, 1492927721, 476);
INSERT INTO `buzzyuserloveable` VALUES (19, 1493188282, 468);
INSERT INTO `buzzyuserloveable` VALUES (20, 1493188287, 510);
INSERT INTO `buzzyuserloveable` VALUES (21, 1493188290, 390);
INSERT INTO `buzzyuserloveable` VALUES (22, 1493188293, 549);
INSERT INTO `buzzyuserloveable` VALUES (23, 1493188296, 483);
INSERT INTO `buzzyuserloveable` VALUES (24, 1493188299, 543);
INSERT INTO `buzzyuserloveable` VALUES (25, 1493188304, 481);
INSERT INTO `buzzyuserloveable` VALUES (26, 1493190687, 335);
INSERT INTO `buzzyuserloveable` VALUES (27, 1493199288, 516);
INSERT INTO `buzzyuserloveable` VALUES (28, 1493199291, 490);
INSERT INTO `buzzyuserloveable` VALUES (29, 1493199301, 684);
INSERT INTO `buzzyuserloveable` VALUES (30, 1493199315, 671);
INSERT INTO `buzzyuserloveable` VALUES (31, 1493199318, 518);
INSERT INTO `buzzyuserloveable` VALUES (32, 1493234514, 475);
INSERT INTO `buzzyuserloveable` VALUES (33, 1493234517, 458);
INSERT INTO `buzzyuserloveable` VALUES (34, 1493234594, 481);
INSERT INTO `buzzyuserloveable` VALUES (35, 1493234597, 528);
INSERT INTO `buzzyuserloveable` VALUES (36, 1493234607, 477);
INSERT INTO `buzzyuserloveable` VALUES (37, 1493236023, 462);
INSERT INTO `buzzyuserloveable` VALUES (38, 1493236136, 390);
INSERT INTO `buzzyuserloveable` VALUES (39, 1493236151, 513);
INSERT INTO `buzzyuserloveable` VALUES (40, 1493236218, 414);
INSERT INTO `buzzyuserloveable` VALUES (41, 1493236221, 493);
INSERT INTO `buzzyuserloveable` VALUES (42, 1493236224, 546);
INSERT INTO `buzzyuserloveable` VALUES (43, 1493236233, 328);
INSERT INTO `buzzyuserloveable` VALUES (44, 1493236273, 547);
INSERT INTO `buzzyuserloveable` VALUES (45, 1493236277, 329);
INSERT INTO `buzzyuserloveable` VALUES (46, 1493236280, 339);
INSERT INTO `buzzyuserloveable` VALUES (47, 1493236292, 482);
INSERT INTO `buzzyuserloveable` VALUES (48, 1493236295, 520);
INSERT INTO `buzzyuserloveable` VALUES (49, 1493236306, 971);
INSERT INTO `buzzyuserloveable` VALUES (50, 1493236317, 686);
INSERT INTO `buzzyuserloveable` VALUES (51, 1493236337, 491);
INSERT INTO `buzzyuserloveable` VALUES (52, 1493236374, 433);
INSERT INTO `buzzyuserloveable` VALUES (53, 1493236377, 478);
INSERT INTO `buzzyuserloveable` VALUES (54, 1493236416, 416);
INSERT INTO `buzzyuserloveable` VALUES (55, 1493236502, 479);
INSERT INTO `buzzyuserloveable` VALUES (56, 1493236506, 506);
INSERT INTO `buzzyuserloveable` VALUES (57, 1493236509, 499);
INSERT INTO `buzzyuserloveable` VALUES (58, 1493236512, 489);
INSERT INTO `buzzyuserloveable` VALUES (59, 1493236605, 472);
INSERT INTO `buzzyuserloveable` VALUES (60, 1493236655, 484);
INSERT INTO `buzzyuserloveable` VALUES (61, 1493237332, 349);
INSERT INTO `buzzyuserloveable` VALUES (62, 1493237546, 471);
INSERT INTO `buzzyuserloveable` VALUES (63, 1493237809, 346);
INSERT INTO `buzzyuserloveable` VALUES (64, 1493237852, 347);
INSERT INTO `buzzyuserloveable` VALUES (65, 1493237964, 487);
INSERT INTO `buzzyuserloveable` VALUES (66, 1493237967, 464);
INSERT INTO `buzzyuserloveable` VALUES (67, 1493238026, 669);
INSERT INTO `buzzyuserloveable` VALUES (68, 1493238099, 468);
INSERT INTO `buzzyuserloveable` VALUES (69, 1493271503, 510);
INSERT INTO `buzzyuserloveable` VALUES (70, 1493271506, 374);
INSERT INTO `buzzyuserloveable` VALUES (71, 1493271509, 351);
INSERT INTO `buzzyuserloveable` VALUES (72, 1493271515, 507);
INSERT INTO `buzzyuserloveable` VALUES (73, 1493271518, 550);
INSERT INTO `buzzyuserloveable` VALUES (74, 1493280881, 421);
INSERT INTO `buzzyuserloveable` VALUES (75, 1493321177, 500);
INSERT INTO `buzzyuserloveable` VALUES (76, 1493321579, 512);
INSERT INTO `buzzyuserloveable` VALUES (77, 1493324651, 474);
INSERT INTO `buzzyuserloveable` VALUES (78, 1493324660, 470);
INSERT INTO `buzzyuserloveable` VALUES (79, 1493324665, 508);
INSERT INTO `buzzyuserloveable` VALUES (80, 1493324671, 414);
INSERT INTO `buzzyuserloveable` VALUES (81, 1493324674, 498);
INSERT INTO `buzzyuserloveable` VALUES (82, 1493324681, 329);
INSERT INTO `buzzyuserloveable` VALUES (83, 1493325271, 969);
INSERT INTO `buzzyuserloveable` VALUES (84, 1493325280, 488);
INSERT INTO `buzzyuserloveable` VALUES (85, 1493357701, 389);
INSERT INTO `buzzyuserloveable` VALUES (86, 1493628068, 463);
INSERT INTO `buzzyuserloveable` VALUES (87, 1493628070, 473);
INSERT INTO `buzzyuserloveable` VALUES (88, 1493628081, 366);
INSERT INTO `buzzyuserloveable` VALUES (89, 1493628399, 460);
INSERT INTO `buzzyuserloveable` VALUES (90, 1493628538, 465);
INSERT INTO `buzzyuserloveable` VALUES (91, 1493628656, 967);
INSERT INTO `buzzyuserloveable` VALUES (92, 1493628659, 501);
INSERT INTO `buzzyuserloveable` VALUES (93, 1493628663, 502);
INSERT INTO `buzzyuserloveable` VALUES (94, 1493637308, 499);
INSERT INTO `buzzyuserloveable` VALUES (95, 1493637311, 488);
INSERT INTO `buzzyuserloveable` VALUES (96, 1493656841, 459);
INSERT INTO `buzzyuserloveable` VALUES (97, 1493657565, 460);
INSERT INTO `buzzyuserloveable` VALUES (98, 1493657619, 478);
INSERT INTO `buzzyuserloveable` VALUES (99, 1493657626, 352);
INSERT INTO `buzzyuserloveable` VALUES (100, 1493659618, 508);
INSERT INTO `buzzyuserloveable` VALUES (101, 1493659630, 514);
INSERT INTO `buzzyuserloveable` VALUES (102, 1493710096, 434);
INSERT INTO `buzzyuserloveable` VALUES (103, 1493710099, 516);
INSERT INTO `buzzyuserloveable` VALUES (104, 1493710102, 487);
INSERT INTO `buzzyuserloveable` VALUES (105, 1493710104, 510);
INSERT INTO `buzzyuserloveable` VALUES (106, 1493710612, 365);
INSERT INTO `buzzyuserloveable` VALUES (107, 1493718785, 334);
INSERT INTO `buzzyuserloveable` VALUES (108, 1493718787, 542);
INSERT INTO `buzzyuserloveable` VALUES (109, 1493718789, 524);
INSERT INTO `buzzyuserloveable` VALUES (110, 1493718813, 390);
INSERT INTO `buzzyuserloveable` VALUES (111, 1493718841, 969);
INSERT INTO `buzzyuserloveable` VALUES (112, 1493718846, 496);
INSERT INTO `buzzyuserloveable` VALUES (113, 1493718851, 474);
INSERT INTO `buzzyuserloveable` VALUES (114, 1493718873, 684);
INSERT INTO `buzzyuserloveable` VALUES (115, 1493718876, 462);
INSERT INTO `buzzyuserloveable` VALUES (116, 1493718879, 487);
INSERT INTO `buzzyuserloveable` VALUES (117, 1493718881, 458);
INSERT INTO `buzzyuserloveable` VALUES (118, 1493718890, 373);
INSERT INTO `buzzyuserloveable` VALUES (119, 1493718893, 517);
INSERT INTO `buzzyuserloveable` VALUES (120, 1493718896, 544);
INSERT INTO `buzzyuserloveable` VALUES (121, 1493718898, 328);
INSERT INTO `buzzyuserloveable` VALUES (122, 1493718905, 971);
INSERT INTO `buzzyuserloveable` VALUES (123, 1493718908, 550);
INSERT INTO `buzzyuserloveable` VALUES (124, 1493718911, 489);
INSERT INTO `buzzyuserloveable` VALUES (125, 1493718934, 505);
INSERT INTO `buzzyuserloveable` VALUES (126, 1493718938, 526);
INSERT INTO `buzzyuserloveable` VALUES (127, 1493719226, 421);
INSERT INTO `buzzyuserloveable` VALUES (128, 1493719228, 482);
INSERT INTO `buzzyuserloveable` VALUES (129, 1493719759, 513);
INSERT INTO `buzzyuserloveable` VALUES (130, 1493719765, 331);
INSERT INTO `buzzyuserloveable` VALUES (131, 1493719768, 488);
INSERT INTO `buzzyuserloveable` VALUES (132, 1493719806, 509);
INSERT INTO `buzzyuserloveable` VALUES (133, 1493719808, 498);
INSERT INTO `buzzyuserloveable` VALUES (134, 1493719818, 970);
INSERT INTO `buzzyuserloveable` VALUES (135, 1493719820, 516);
INSERT INTO `buzzyuserloveable` VALUES (136, 1493719823, 352);
INSERT INTO `buzzyuserloveable` VALUES (137, 1493719825, 484);
INSERT INTO `buzzyuserloveable` VALUES (138, 1493719907, 364);
INSERT INTO `buzzyuserloveable` VALUES (139, 1493719912, 669);
INSERT INTO `buzzyuserloveable` VALUES (140, 1493719915, 483);
INSERT INTO `buzzyuserloveable` VALUES (141, 1493719917, 350);
INSERT INTO `buzzyuserloveable` VALUES (142, 1493719920, 471);
INSERT INTO `buzzyuserloveable` VALUES (143, 1493719923, 486);
INSERT INTO `buzzyuserloveable` VALUES (144, 1493719985, 670);
INSERT INTO `buzzyuserloveable` VALUES (145, 1493720367, 686);
INSERT INTO `buzzyuserloveable` VALUES (146, 1493720370, 780);
INSERT INTO `buzzyuserloveable` VALUES (147, 1493720519, 507);
INSERT INTO `buzzyuserloveable` VALUES (148, 1493720523, 366);
INSERT INTO `buzzyuserloveable` VALUES (149, 1493720525, 465);
INSERT INTO `buzzyuserloveable` VALUES (150, 1493720527, 460);
INSERT INTO `buzzyuserloveable` VALUES (151, 1493720590, 351);
INSERT INTO `buzzyuserloveable` VALUES (152, 1493721013, 515);
INSERT INTO `buzzyuserloveable` VALUES (153, 1493721026, 495);
INSERT INTO `buzzyuserloveable` VALUES (154, 1493721098, 546);
INSERT INTO `buzzyuserloveable` VALUES (155, 1493721101, 467);
INSERT INTO `buzzyuserloveable` VALUES (156, 1493721423, 347);
INSERT INTO `buzzyuserloveable` VALUES (157, 1493721434, 365);
INSERT INTO `buzzyuserloveable` VALUES (158, 1493723406, 354);
INSERT INTO `buzzyuserloveable` VALUES (159, 1493724362, 969);
INSERT INTO `buzzyuserloveable` VALUES (160, 1493724368, 465);
INSERT INTO `buzzyuserloveable` VALUES (161, 1493724720, 971);
INSERT INTO `buzzyuserloveable` VALUES (162, 1493724724, 495);
INSERT INTO `buzzyuserloveable` VALUES (163, 1493727899, 546);
INSERT INTO `buzzyuserloveable` VALUES (164, 1493727901, 434);
INSERT INTO `buzzyuserloveable` VALUES (165, 1493727904, 510);
INSERT INTO `buzzyuserloveable` VALUES (166, 1493727908, 332);
INSERT INTO `buzzyuserloveable` VALUES (167, 1493727914, 487);
INSERT INTO `buzzyuserloveable` VALUES (168, 1493727917, 474);
INSERT INTO `buzzyuserloveable` VALUES (169, 1493727981, 475);
INSERT INTO `buzzyuserloveable` VALUES (170, 1493727985, 968);
INSERT INTO `buzzyuserloveable` VALUES (171, 1493728286, 470);
INSERT INTO `buzzyuserloveable` VALUES (172, 1493729040, 518);
INSERT INTO `buzzyuserloveable` VALUES (173, 1493729052, 498);
INSERT INTO `buzzyuserloveable` VALUES (174, 1493729053, 498);
INSERT INTO `buzzyuserloveable` VALUES (175, 1493729060, 463);
INSERT INTO `buzzyuserloveable` VALUES (176, 1493729082, 969);
INSERT INTO `buzzyuserloveable` VALUES (177, 1493729089, 507);
INSERT INTO `buzzyuserloveable` VALUES (178, 1493729105, 470);
INSERT INTO `buzzyuserloveable` VALUES (179, 1493734076, 509);
INSERT INTO `buzzyuserloveable` VALUES (180, 1493734084, 374);
INSERT INTO `buzzyuserloveable` VALUES (181, 1493734089, 480);
INSERT INTO `buzzyuserloveable` VALUES (182, 1493734094, 366);
INSERT INTO `buzzyuserloveable` VALUES (183, 1493734106, 463);
INSERT INTO `buzzyuserloveable` VALUES (184, 1493734110, 501);
INSERT INTO `buzzyuserloveable` VALUES (185, 1493734130, 421);
INSERT INTO `buzzyuserloveable` VALUES (186, 1493734792, 474);
INSERT INTO `buzzyuserloveable` VALUES (187, 1493734795, 499);
INSERT INTO `buzzyuserloveable` VALUES (188, 1493734799, 968);
INSERT INTO `buzzyuserloveable` VALUES (189, 1493734941, 479);
INSERT INTO `buzzyuserloveable` VALUES (190, 1493734949, 517);
INSERT INTO `buzzyuserloveable` VALUES (191, 1493734954, 497);
INSERT INTO `buzzyuserloveable` VALUES (192, 1493735054, 684);
INSERT INTO `buzzyuserloveable` VALUES (193, 1493735089, 504);
INSERT INTO `buzzyuserloveable` VALUES (194, 1493735167, 514);
INSERT INTO `buzzyuserloveable` VALUES (195, 1493735802, 414);
INSERT INTO `buzzyuserloveable` VALUES (196, 1493756641, 488);
INSERT INTO `buzzyuserloveable` VALUES (197, 1493756790, 469);
INSERT INTO `buzzyuserloveable` VALUES (198, 1493756794, 477);
INSERT INTO `buzzyuserloveable` VALUES (199, 1493756803, 502);
INSERT INTO `buzzyuserloveable` VALUES (200, 1493756804, 502);
INSERT INTO `buzzyuserloveable` VALUES (201, 1493788388, 329);
INSERT INTO `buzzyuserloveable` VALUES (202, 1493800854, 967);
INSERT INTO `buzzyuserloveable` VALUES (203, 1493800859, 348);
INSERT INTO `buzzyuserloveable` VALUES (204, 1493819487, 331);
INSERT INTO `buzzyuserloveable` VALUES (205, 1493819580, 971);
INSERT INTO `buzzyuserloveable` VALUES (206, 1493820031, 328);
INSERT INTO `buzzyuserloveable` VALUES (207, 1493820179, 347);
INSERT INTO `buzzyuserloveable` VALUES (208, 1493820375, 346);
INSERT INTO `buzzyuserloveable` VALUES (209, 1493821840, 365);
INSERT INTO `buzzyuserloveable` VALUES (210, 1493821843, 335);
INSERT INTO `buzzyuserloveable` VALUES (211, 1493821845, 495);
INSERT INTO `buzzyuserloveable` VALUES (212, 1493821847, 527);
INSERT INTO `buzzyuserloveable` VALUES (213, 1493821850, 352);
INSERT INTO `buzzyuserloveable` VALUES (214, 1493821853, 349);
INSERT INTO `buzzyuserloveable` VALUES (215, 1493821855, 467);
INSERT INTO `buzzyuserloveable` VALUES (216, 1493821857, 525);
INSERT INTO `buzzyuserloveable` VALUES (217, 1493821859, 457);
INSERT INTO `buzzyuserloveable` VALUES (218, 1493821862, 331);
INSERT INTO `buzzyuserloveable` VALUES (219, 1493821864, 548);
INSERT INTO `buzzyuserloveable` VALUES (220, 1493821867, 463);
INSERT INTO `buzzyuserloveable` VALUES (221, 1493821869, 517);
INSERT INTO `buzzyuserloveable` VALUES (222, 1493821872, 345);
INSERT INTO `buzzyuserloveable` VALUES (223, 1493821874, 477);
INSERT INTO `buzzyuserloveable` VALUES (224, 1493821990, 366);
INSERT INTO `buzzyuserloveable` VALUES (225, 1493821993, 479);
INSERT INTO `buzzyuserloveable` VALUES (226, 1493821998, 780);
INSERT INTO `buzzyuserloveable` VALUES (227, 1493822035, 458);
INSERT INTO `buzzyuserloveable` VALUES (228, 1493822037, 504);
INSERT INTO `buzzyuserloveable` VALUES (229, 1493822047, 487);
INSERT INTO `buzzyuserloveable` VALUES (230, 1493822050, 416);
INSERT INTO `buzzyuserloveable` VALUES (231, 1493822058, 359);
INSERT INTO `buzzyuserloveable` VALUES (232, 1493822375, 459);
INSERT INTO `buzzyuserloveable` VALUES (233, 1493822378, 507);
INSERT INTO `buzzyuserloveable` VALUES (234, 1493822383, 520);
INSERT INTO `buzzyuserloveable` VALUES (235, 1493822391, 433);
INSERT INTO `buzzyuserloveable` VALUES (236, 1493822399, 521);
INSERT INTO `buzzyuserloveable` VALUES (237, 1493822409, 515);
INSERT INTO `buzzyuserloveable` VALUES (238, 1493822412, 397);
INSERT INTO `buzzyuserloveable` VALUES (239, 1493822415, 434);
INSERT INTO `buzzyuserloveable` VALUES (240, 1493822463, 669);
INSERT INTO `buzzyuserloveable` VALUES (241, 1493824780, 476);
INSERT INTO `buzzyuserloveable` VALUES (242, 1493826818, 973);
INSERT INTO `buzzyuserloveable` VALUES (243, 1493826824, 542);
INSERT INTO `buzzyuserloveable` VALUES (244, 1493826829, 970);
INSERT INTO `buzzyuserloveable` VALUES (245, 1493826832, 463);
INSERT INTO `buzzyuserloveable` VALUES (246, 1493826838, 459);
INSERT INTO `buzzyuserloveable` VALUES (247, 1493826841, 518);
INSERT INTO `buzzyuserloveable` VALUES (248, 1493826858, 670);
INSERT INTO `buzzyuserloveable` VALUES (249, 1493874474, 972);
INSERT INTO `buzzyuserloveable` VALUES (250, 1493875515, 969);
INSERT INTO `buzzyuserloveable` VALUES (251, 1493875525, 669);
INSERT INTO `buzzyuserloveable` VALUES (252, 1493875537, 967);
INSERT INTO `buzzyuserloveable` VALUES (253, 1493878806, 515);
INSERT INTO `buzzyuserloveable` VALUES (254, 1493878810, 542);
INSERT INTO `buzzyuserloveable` VALUES (255, 1493879528, 331);
INSERT INTO `buzzyuserloveable` VALUES (256, 1493881174, 973);
INSERT INTO `buzzyuserloveable` VALUES (257, 1493881905, 968);
INSERT INTO `buzzyuserloveable` VALUES (258, 1493882512, 332);
INSERT INTO `buzzyuserloveable` VALUES (259, 1493882528, 346);
INSERT INTO `buzzyuserloveable` VALUES (260, 1493882956, 328);
INSERT INTO `buzzyuserloveable` VALUES (261, 1493883058, 507);
INSERT INTO `buzzyuserloveable` VALUES (262, 1493883911, 669);
INSERT INTO `buzzyuserloveable` VALUES (263, 1493889474, 482);
INSERT INTO `buzzyuserloveable` VALUES (264, 1493889488, 975);
INSERT INTO `buzzyuserloveable` VALUES (265, 1493889952, 504);
INSERT INTO `buzzyuserloveable` VALUES (266, 1493891515, 503);
INSERT INTO `buzzyuserloveable` VALUES (267, 1493894710, 482);
INSERT INTO `buzzyuserloveable` VALUES (268, 1493894713, 497);
INSERT INTO `buzzyuserloveable` VALUES (269, 1493894716, 458);
INSERT INTO `buzzyuserloveable` VALUES (270, 1493894719, 511);
INSERT INTO `buzzyuserloveable` VALUES (271, 1493894722, 519);
INSERT INTO `buzzyuserloveable` VALUES (272, 1493894725, 509);
INSERT INTO `buzzyuserloveable` VALUES (273, 1493894729, 498);
INSERT INTO `buzzyuserloveable` VALUES (274, 1493894732, 469);
INSERT INTO `buzzyuserloveable` VALUES (275, 1493894749, 328);
INSERT INTO `buzzyuserloveable` VALUES (276, 1493894892, 973);
INSERT INTO `buzzyuserloveable` VALUES (277, 1493895472, 545);
INSERT INTO `buzzyuserloveable` VALUES (278, 1493895475, 481);
INSERT INTO `buzzyuserloveable` VALUES (279, 1493895477, 499);
INSERT INTO `buzzyuserloveable` VALUES (280, 1493895479, 486);
INSERT INTO `buzzyuserloveable` VALUES (281, 1493895482, 496);
INSERT INTO `buzzyuserloveable` VALUES (282, 1493895489, 389);
INSERT INTO `buzzyuserloveable` VALUES (283, 1493895492, 356);
INSERT INTO `buzzyuserloveable` VALUES (284, 1493895536, 414);
INSERT INTO `buzzyuserloveable` VALUES (285, 1493895539, 549);
INSERT INTO `buzzyuserloveable` VALUES (286, 1493895730, 332);
INSERT INTO `buzzyuserloveable` VALUES (287, 1493896622, 969);
INSERT INTO `buzzyuserloveable` VALUES (288, 1493897427, 433);
INSERT INTO `buzzyuserloveable` VALUES (289, 1493897443, 472);
INSERT INTO `buzzyuserloveable` VALUES (290, 1493897461, 330);
INSERT INTO `buzzyuserloveable` VALUES (291, 1493904205, 480);
INSERT INTO `buzzyuserloveable` VALUES (292, 1493904803, 350);
INSERT INTO `buzzyuserloveable` VALUES (293, 1493904822, 397);
INSERT INTO `buzzyuserloveable` VALUES (294, 1493904872, 972);
INSERT INTO `buzzyuserloveable` VALUES (295, 1493906111, 722);
INSERT INTO `buzzyuserloveable` VALUES (296, 1493909697, 967);
INSERT INTO `buzzyuserloveable` VALUES (297, 1493909705, 433);
INSERT INTO `buzzyuserloveable` VALUES (298, 1493910190, 516);
INSERT INTO `buzzyuserloveable` VALUES (299, 1493910418, 479);
INSERT INTO `buzzyuserloveable` VALUES (300, 1493928123, 347);
INSERT INTO `buzzyuserloveable` VALUES (301, 1493928288, 507);
INSERT INTO `buzzyuserloveable` VALUES (302, 1493960420, 974);
INSERT INTO `buzzyuserloveable` VALUES (303, 1493960448, 364);
INSERT INTO `buzzyuserloveable` VALUES (304, 1493998767, 483);

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyuserresponses`
-- 

CREATE TABLE `buzzyuserresponses` (
  `buzzyuserresponse_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyuserresponse_timestamp` int(11) NOT NULL,
  `buzzyuser_id` int(11) NOT NULL,
  PRIMARY KEY (`buzzyuserresponse_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1070 DEFAULT CHARSET=latin1 AUTO_INCREMENT=1070 ;

-- 
-- Dumping data for table `buzzyuserresponses`
-- 

INSERT INTO `buzzyuserresponses` VALUES (1, 1492776546, 344);
INSERT INTO `buzzyuserresponses` VALUES (2, 1492776546, 344);
INSERT INTO `buzzyuserresponses` VALUES (3, 1492776546, 344);
INSERT INTO `buzzyuserresponses` VALUES (4, 1492776546, 344);
INSERT INTO `buzzyuserresponses` VALUES (5, 1492776546, 344);
INSERT INTO `buzzyuserresponses` VALUES (6, 1492776546, 344);
INSERT INTO `buzzyuserresponses` VALUES (7, 1492776546, 344);
INSERT INTO `buzzyuserresponses` VALUES (8, 1492776546, 344);
INSERT INTO `buzzyuserresponses` VALUES (9, 1492928569, 344);
INSERT INTO `buzzyuserresponses` VALUES (10, 1493190925, 331);
INSERT INTO `buzzyuserresponses` VALUES (11, 1493190975, 331);
INSERT INTO `buzzyuserresponses` VALUES (12, 1493190995, 331);
INSERT INTO `buzzyuserresponses` VALUES (13, 1493193577, 331);
INSERT INTO `buzzyuserresponses` VALUES (14, 1493193599, 344);
INSERT INTO `buzzyuserresponses` VALUES (15, 1493193606, 344);
INSERT INTO `buzzyuserresponses` VALUES (16, 1493193620, 331);
INSERT INTO `buzzyuserresponses` VALUES (17, 1493193633, 331);
INSERT INTO `buzzyuserresponses` VALUES (18, 1493193646, 344);
INSERT INTO `buzzyuserresponses` VALUES (19, 1493193665, 331);
INSERT INTO `buzzyuserresponses` VALUES (20, 1493193842, 344);
INSERT INTO `buzzyuserresponses` VALUES (21, 1493193904, 344);
INSERT INTO `buzzyuserresponses` VALUES (22, 1493193912, 344);
INSERT INTO `buzzyuserresponses` VALUES (23, 1493193925, 344);
INSERT INTO `buzzyuserresponses` VALUES (24, 1493193947, 331);
INSERT INTO `buzzyuserresponses` VALUES (25, 1493193948, 331);
INSERT INTO `buzzyuserresponses` VALUES (26, 1493193952, 331);
INSERT INTO `buzzyuserresponses` VALUES (27, 1493193958, 344);
INSERT INTO `buzzyuserresponses` VALUES (28, 1493193996, 344);
INSERT INTO `buzzyuserresponses` VALUES (29, 1493194005, 344);
INSERT INTO `buzzyuserresponses` VALUES (30, 1493194034, 344);
INSERT INTO `buzzyuserresponses` VALUES (31, 1493194074, 344);
INSERT INTO `buzzyuserresponses` VALUES (32, 1493195223, 344);
INSERT INTO `buzzyuserresponses` VALUES (33, 1493196267, 331);
INSERT INTO `buzzyuserresponses` VALUES (34, 1493196410, 344);
INSERT INTO `buzzyuserresponses` VALUES (35, 1493234847, 344);
INSERT INTO `buzzyuserresponses` VALUES (36, 1493280508, 331);
INSERT INTO `buzzyuserresponses` VALUES (37, 1493280522, 331);
INSERT INTO `buzzyuserresponses` VALUES (38, 1493280534, 331);
INSERT INTO `buzzyuserresponses` VALUES (39, 1493280555, 331);
INSERT INTO `buzzyuserresponses` VALUES (40, 1493324800, 972);
INSERT INTO `buzzyuserresponses` VALUES (41, 1493325209, 972);
INSERT INTO `buzzyuserresponses` VALUES (42, 1493633387, 344);
INSERT INTO `buzzyuserresponses` VALUES (43, 1493633393, 344);
INSERT INTO `buzzyuserresponses` VALUES (44, 1493633393, 344);
INSERT INTO `buzzyuserresponses` VALUES (45, 1493633397, 344);
INSERT INTO `buzzyuserresponses` VALUES (46, 1493633397, 344);
INSERT INTO `buzzyuserresponses` VALUES (47, 1493633397, 344);
INSERT INTO `buzzyuserresponses` VALUES (48, 1493633397, 344);
INSERT INTO `buzzyuserresponses` VALUES (49, 1493633398, 344);
INSERT INTO `buzzyuserresponses` VALUES (50, 1493633400, 344);
INSERT INTO `buzzyuserresponses` VALUES (51, 1493633400, 344);
INSERT INTO `buzzyuserresponses` VALUES (52, 1493633400, 344);
INSERT INTO `buzzyuserresponses` VALUES (53, 1493633401, 344);
INSERT INTO `buzzyuserresponses` VALUES (54, 1493633401, 344);
INSERT INTO `buzzyuserresponses` VALUES (55, 1493633403, 344);
INSERT INTO `buzzyuserresponses` VALUES (56, 1493633403, 344);
INSERT INTO `buzzyuserresponses` VALUES (57, 1493633403, 344);
INSERT INTO `buzzyuserresponses` VALUES (58, 1493633404, 344);
INSERT INTO `buzzyuserresponses` VALUES (59, 1493633404, 344);
INSERT INTO `buzzyuserresponses` VALUES (60, 1493633404, 344);
INSERT INTO `buzzyuserresponses` VALUES (61, 1493633404, 344);
INSERT INTO `buzzyuserresponses` VALUES (62, 1493633405, 344);
INSERT INTO `buzzyuserresponses` VALUES (63, 1493633406, 344);
INSERT INTO `buzzyuserresponses` VALUES (64, 1493633406, 344);
INSERT INTO `buzzyuserresponses` VALUES (65, 1493633406, 344);
INSERT INTO `buzzyuserresponses` VALUES (66, 1493633407, 344);
INSERT INTO `buzzyuserresponses` VALUES (67, 1493633407, 344);
INSERT INTO `buzzyuserresponses` VALUES (68, 1493633409, 344);
INSERT INTO `buzzyuserresponses` VALUES (69, 1493633409, 344);
INSERT INTO `buzzyuserresponses` VALUES (70, 1493633409, 344);
INSERT INTO `buzzyuserresponses` VALUES (71, 1493633410, 344);
INSERT INTO `buzzyuserresponses` VALUES (72, 1493633410, 344);
INSERT INTO `buzzyuserresponses` VALUES (73, 1493633410, 344);
INSERT INTO `buzzyuserresponses` VALUES (74, 1493633410, 344);
INSERT INTO `buzzyuserresponses` VALUES (75, 1493633411, 344);
INSERT INTO `buzzyuserresponses` VALUES (76, 1493633413, 344);
INSERT INTO `buzzyuserresponses` VALUES (77, 1493633414, 344);
INSERT INTO `buzzyuserresponses` VALUES (78, 1493633423, 344);
INSERT INTO `buzzyuserresponses` VALUES (79, 1493633424, 344);
INSERT INTO `buzzyuserresponses` VALUES (80, 1493633433, 344);
INSERT INTO `buzzyuserresponses` VALUES (81, 1493633434, 344);
INSERT INTO `buzzyuserresponses` VALUES (82, 1493633443, 344);
INSERT INTO `buzzyuserresponses` VALUES (83, 1493633444, 344);
INSERT INTO `buzzyuserresponses` VALUES (84, 1493633913, 344);
INSERT INTO `buzzyuserresponses` VALUES (85, 1493633914, 344);
INSERT INTO `buzzyuserresponses` VALUES (86, 1493633914, 344);
INSERT INTO `buzzyuserresponses` VALUES (87, 1493633914, 344);
INSERT INTO `buzzyuserresponses` VALUES (88, 1493633914, 344);
INSERT INTO `buzzyuserresponses` VALUES (89, 1493633916, 344);
INSERT INTO `buzzyuserresponses` VALUES (90, 1493633917, 344);
INSERT INTO `buzzyuserresponses` VALUES (91, 1493633917, 344);
INSERT INTO `buzzyuserresponses` VALUES (92, 1493633917, 344);
INSERT INTO `buzzyuserresponses` VALUES (93, 1493633917, 344);
INSERT INTO `buzzyuserresponses` VALUES (94, 1493633919, 344);
INSERT INTO `buzzyuserresponses` VALUES (95, 1493633919, 344);
INSERT INTO `buzzyuserresponses` VALUES (96, 1493633920, 344);
INSERT INTO `buzzyuserresponses` VALUES (97, 1493633920, 344);
INSERT INTO `buzzyuserresponses` VALUES (98, 1493633920, 344);
INSERT INTO `buzzyuserresponses` VALUES (99, 1493633920, 344);
INSERT INTO `buzzyuserresponses` VALUES (100, 1493633920, 344);
INSERT INTO `buzzyuserresponses` VALUES (101, 1493633922, 344);
INSERT INTO `buzzyuserresponses` VALUES (102, 1493633923, 344);
INSERT INTO `buzzyuserresponses` VALUES (103, 1493633923, 344);
INSERT INTO `buzzyuserresponses` VALUES (104, 1493633923, 344);
INSERT INTO `buzzyuserresponses` VALUES (105, 1493633923, 344);
INSERT INTO `buzzyuserresponses` VALUES (106, 1493633923, 344);
INSERT INTO `buzzyuserresponses` VALUES (107, 1493633924, 344);
INSERT INTO `buzzyuserresponses` VALUES (108, 1493633925, 344);
INSERT INTO `buzzyuserresponses` VALUES (109, 1493633926, 344);
INSERT INTO `buzzyuserresponses` VALUES (110, 1493633926, 344);
INSERT INTO `buzzyuserresponses` VALUES (111, 1493633926, 344);
INSERT INTO `buzzyuserresponses` VALUES (112, 1493633926, 344);
INSERT INTO `buzzyuserresponses` VALUES (113, 1493633928, 344);
INSERT INTO `buzzyuserresponses` VALUES (114, 1493633929, 344);
INSERT INTO `buzzyuserresponses` VALUES (115, 1493633929, 344);
INSERT INTO `buzzyuserresponses` VALUES (116, 1493633929, 344);
INSERT INTO `buzzyuserresponses` VALUES (117, 1493633929, 344);
INSERT INTO `buzzyuserresponses` VALUES (118, 1493633929, 344);
INSERT INTO `buzzyuserresponses` VALUES (119, 1493633931, 344);
INSERT INTO `buzzyuserresponses` VALUES (120, 1493633932, 344);
INSERT INTO `buzzyuserresponses` VALUES (121, 1493633932, 344);
INSERT INTO `buzzyuserresponses` VALUES (122, 1493633932, 344);
INSERT INTO `buzzyuserresponses` VALUES (123, 1493633932, 344);
INSERT INTO `buzzyuserresponses` VALUES (124, 1493633932, 344);
INSERT INTO `buzzyuserresponses` VALUES (125, 1493633933, 344);
INSERT INTO `buzzyuserresponses` VALUES (126, 1493633933, 344);
INSERT INTO `buzzyuserresponses` VALUES (127, 1493633933, 344);
INSERT INTO `buzzyuserresponses` VALUES (128, 1493633934, 344);
INSERT INTO `buzzyuserresponses` VALUES (129, 1493633934, 344);
INSERT INTO `buzzyuserresponses` VALUES (130, 1493633934, 344);
INSERT INTO `buzzyuserresponses` VALUES (131, 1493633934, 344);
INSERT INTO `buzzyuserresponses` VALUES (132, 1493633935, 344);
INSERT INTO `buzzyuserresponses` VALUES (133, 1493633935, 344);
INSERT INTO `buzzyuserresponses` VALUES (134, 1493633935, 344);
INSERT INTO `buzzyuserresponses` VALUES (135, 1493633935, 344);
INSERT INTO `buzzyuserresponses` VALUES (136, 1493633936, 344);
INSERT INTO `buzzyuserresponses` VALUES (137, 1493633936, 344);
INSERT INTO `buzzyuserresponses` VALUES (138, 1493633937, 344);
INSERT INTO `buzzyuserresponses` VALUES (139, 1493633937, 344);
INSERT INTO `buzzyuserresponses` VALUES (140, 1493633937, 344);
INSERT INTO `buzzyuserresponses` VALUES (141, 1493633937, 344);
INSERT INTO `buzzyuserresponses` VALUES (142, 1493633938, 344);
INSERT INTO `buzzyuserresponses` VALUES (143, 1493633938, 344);
INSERT INTO `buzzyuserresponses` VALUES (144, 1493633938, 344);
INSERT INTO `buzzyuserresponses` VALUES (145, 1493633938, 344);
INSERT INTO `buzzyuserresponses` VALUES (146, 1493633939, 344);
INSERT INTO `buzzyuserresponses` VALUES (147, 1493633939, 344);
INSERT INTO `buzzyuserresponses` VALUES (148, 1493633940, 344);
INSERT INTO `buzzyuserresponses` VALUES (149, 1493633940, 344);
INSERT INTO `buzzyuserresponses` VALUES (150, 1493633940, 344);
INSERT INTO `buzzyuserresponses` VALUES (151, 1493633940, 344);
INSERT INTO `buzzyuserresponses` VALUES (152, 1493633941, 344);
INSERT INTO `buzzyuserresponses` VALUES (153, 1493633941, 344);
INSERT INTO `buzzyuserresponses` VALUES (154, 1493633941, 344);
INSERT INTO `buzzyuserresponses` VALUES (155, 1493633942, 344);
INSERT INTO `buzzyuserresponses` VALUES (156, 1493633942, 344);
INSERT INTO `buzzyuserresponses` VALUES (157, 1493633942, 344);
INSERT INTO `buzzyuserresponses` VALUES (158, 1493633942, 344);
INSERT INTO `buzzyuserresponses` VALUES (159, 1493633942, 344);
INSERT INTO `buzzyuserresponses` VALUES (160, 1493633943, 344);
INSERT INTO `buzzyuserresponses` VALUES (161, 1493633943, 344);
INSERT INTO `buzzyuserresponses` VALUES (162, 1493633943, 344);
INSERT INTO `buzzyuserresponses` VALUES (163, 1493633943, 344);
INSERT INTO `buzzyuserresponses` VALUES (164, 1493633943, 344);
INSERT INTO `buzzyuserresponses` VALUES (165, 1493633943, 344);
INSERT INTO `buzzyuserresponses` VALUES (166, 1493633943, 344);
INSERT INTO `buzzyuserresponses` VALUES (167, 1493633943, 344);
INSERT INTO `buzzyuserresponses` VALUES (168, 1493633944, 344);
INSERT INTO `buzzyuserresponses` VALUES (169, 1493633944, 344);
INSERT INTO `buzzyuserresponses` VALUES (170, 1493633944, 344);
INSERT INTO `buzzyuserresponses` VALUES (171, 1493633944, 344);
INSERT INTO `buzzyuserresponses` VALUES (172, 1493633944, 344);
INSERT INTO `buzzyuserresponses` VALUES (173, 1493633944, 344);
INSERT INTO `buzzyuserresponses` VALUES (174, 1493633944, 344);
INSERT INTO `buzzyuserresponses` VALUES (175, 1493633944, 344);
INSERT INTO `buzzyuserresponses` VALUES (176, 1493633944, 344);
INSERT INTO `buzzyuserresponses` VALUES (177, 1493633945, 344);
INSERT INTO `buzzyuserresponses` VALUES (178, 1493633945, 344);
INSERT INTO `buzzyuserresponses` VALUES (179, 1493633945, 344);
INSERT INTO `buzzyuserresponses` VALUES (180, 1493633946, 344);
INSERT INTO `buzzyuserresponses` VALUES (181, 1493633946, 344);
INSERT INTO `buzzyuserresponses` VALUES (182, 1493633947, 344);
INSERT INTO `buzzyuserresponses` VALUES (183, 1493633947, 344);
INSERT INTO `buzzyuserresponses` VALUES (184, 1493633947, 344);
INSERT INTO `buzzyuserresponses` VALUES (185, 1493633947, 344);
INSERT INTO `buzzyuserresponses` VALUES (186, 1493633947, 344);
INSERT INTO `buzzyuserresponses` VALUES (187, 1493633947, 344);
INSERT INTO `buzzyuserresponses` VALUES (188, 1493633947, 344);
INSERT INTO `buzzyuserresponses` VALUES (189, 1493633947, 344);
INSERT INTO `buzzyuserresponses` VALUES (190, 1493633949, 344);
INSERT INTO `buzzyuserresponses` VALUES (191, 1493633950, 344);
INSERT INTO `buzzyuserresponses` VALUES (192, 1493633950, 344);
INSERT INTO `buzzyuserresponses` VALUES (193, 1493633950, 344);
INSERT INTO `buzzyuserresponses` VALUES (194, 1493633950, 344);
INSERT INTO `buzzyuserresponses` VALUES (195, 1493633950, 344);
INSERT INTO `buzzyuserresponses` VALUES (196, 1493633950, 344);
INSERT INTO `buzzyuserresponses` VALUES (197, 1493633950, 344);
INSERT INTO `buzzyuserresponses` VALUES (198, 1493633950, 344);
INSERT INTO `buzzyuserresponses` VALUES (199, 1493633950, 344);
INSERT INTO `buzzyuserresponses` VALUES (200, 1493633952, 344);
INSERT INTO `buzzyuserresponses` VALUES (201, 1493633953, 344);
INSERT INTO `buzzyuserresponses` VALUES (202, 1493633953, 344);
INSERT INTO `buzzyuserresponses` VALUES (203, 1493633953, 344);
INSERT INTO `buzzyuserresponses` VALUES (204, 1493633953, 344);
INSERT INTO `buzzyuserresponses` VALUES (205, 1493633953, 344);
INSERT INTO `buzzyuserresponses` VALUES (206, 1493633953, 344);
INSERT INTO `buzzyuserresponses` VALUES (207, 1493633953, 344);
INSERT INTO `buzzyuserresponses` VALUES (208, 1493633954, 344);
INSERT INTO `buzzyuserresponses` VALUES (209, 1493633954, 344);
INSERT INTO `buzzyuserresponses` VALUES (210, 1493633954, 344);
INSERT INTO `buzzyuserresponses` VALUES (211, 1493633954, 344);
INSERT INTO `buzzyuserresponses` VALUES (212, 1493633954, 344);
INSERT INTO `buzzyuserresponses` VALUES (213, 1493633954, 344);
INSERT INTO `buzzyuserresponses` VALUES (214, 1493633955, 344);
INSERT INTO `buzzyuserresponses` VALUES (215, 1493633955, 344);
INSERT INTO `buzzyuserresponses` VALUES (216, 1493633956, 344);
INSERT INTO `buzzyuserresponses` VALUES (217, 1493633956, 344);
INSERT INTO `buzzyuserresponses` VALUES (218, 1493633956, 344);
INSERT INTO `buzzyuserresponses` VALUES (219, 1493633956, 344);
INSERT INTO `buzzyuserresponses` VALUES (220, 1493633956, 344);
INSERT INTO `buzzyuserresponses` VALUES (221, 1493633956, 344);
INSERT INTO `buzzyuserresponses` VALUES (222, 1493633956, 344);
INSERT INTO `buzzyuserresponses` VALUES (223, 1493633956, 344);
INSERT INTO `buzzyuserresponses` VALUES (224, 1493633958, 344);
INSERT INTO `buzzyuserresponses` VALUES (225, 1493633958, 344);
INSERT INTO `buzzyuserresponses` VALUES (226, 1493633959, 344);
INSERT INTO `buzzyuserresponses` VALUES (227, 1493633959, 344);
INSERT INTO `buzzyuserresponses` VALUES (228, 1493633959, 344);
INSERT INTO `buzzyuserresponses` VALUES (229, 1493633959, 344);
INSERT INTO `buzzyuserresponses` VALUES (230, 1493633959, 344);
INSERT INTO `buzzyuserresponses` VALUES (231, 1493633959, 344);
INSERT INTO `buzzyuserresponses` VALUES (232, 1493633959, 344);
INSERT INTO `buzzyuserresponses` VALUES (233, 1493633959, 344);
INSERT INTO `buzzyuserresponses` VALUES (234, 1493633961, 344);
INSERT INTO `buzzyuserresponses` VALUES (235, 1493633961, 344);
INSERT INTO `buzzyuserresponses` VALUES (236, 1493633962, 344);
INSERT INTO `buzzyuserresponses` VALUES (237, 1493633962, 344);
INSERT INTO `buzzyuserresponses` VALUES (238, 1493633962, 344);
INSERT INTO `buzzyuserresponses` VALUES (239, 1493633962, 344);
INSERT INTO `buzzyuserresponses` VALUES (240, 1493633962, 344);
INSERT INTO `buzzyuserresponses` VALUES (241, 1493633962, 344);
INSERT INTO `buzzyuserresponses` VALUES (242, 1493633962, 344);
INSERT INTO `buzzyuserresponses` VALUES (243, 1493633962, 344);
INSERT INTO `buzzyuserresponses` VALUES (244, 1493633962, 344);
INSERT INTO `buzzyuserresponses` VALUES (245, 1493633963, 344);
INSERT INTO `buzzyuserresponses` VALUES (246, 1493633963, 344);
INSERT INTO `buzzyuserresponses` VALUES (247, 1493633963, 344);
INSERT INTO `buzzyuserresponses` VALUES (248, 1493633964, 344);
INSERT INTO `buzzyuserresponses` VALUES (249, 1493633964, 344);
INSERT INTO `buzzyuserresponses` VALUES (250, 1493633965, 344);
INSERT INTO `buzzyuserresponses` VALUES (251, 1493633965, 344);
INSERT INTO `buzzyuserresponses` VALUES (252, 1493633965, 344);
INSERT INTO `buzzyuserresponses` VALUES (253, 1493633965, 344);
INSERT INTO `buzzyuserresponses` VALUES (254, 1493633965, 344);
INSERT INTO `buzzyuserresponses` VALUES (255, 1493633965, 344);
INSERT INTO `buzzyuserresponses` VALUES (256, 1493633965, 344);
INSERT INTO `buzzyuserresponses` VALUES (257, 1493633965, 344);
INSERT INTO `buzzyuserresponses` VALUES (258, 1493633967, 344);
INSERT INTO `buzzyuserresponses` VALUES (259, 1493633968, 344);
INSERT INTO `buzzyuserresponses` VALUES (260, 1493633968, 344);
INSERT INTO `buzzyuserresponses` VALUES (261, 1493633968, 344);
INSERT INTO `buzzyuserresponses` VALUES (262, 1493633968, 344);
INSERT INTO `buzzyuserresponses` VALUES (263, 1493633968, 344);
INSERT INTO `buzzyuserresponses` VALUES (264, 1493633968, 344);
INSERT INTO `buzzyuserresponses` VALUES (265, 1493633968, 344);
INSERT INTO `buzzyuserresponses` VALUES (266, 1493633968, 344);
INSERT INTO `buzzyuserresponses` VALUES (267, 1493633968, 344);
INSERT INTO `buzzyuserresponses` VALUES (268, 1493633970, 344);
INSERT INTO `buzzyuserresponses` VALUES (269, 1493633970, 344);
INSERT INTO `buzzyuserresponses` VALUES (270, 1493633971, 344);
INSERT INTO `buzzyuserresponses` VALUES (271, 1493633971, 344);
INSERT INTO `buzzyuserresponses` VALUES (272, 1493633971, 344);
INSERT INTO `buzzyuserresponses` VALUES (273, 1493633971, 344);
INSERT INTO `buzzyuserresponses` VALUES (274, 1493633971, 344);
INSERT INTO `buzzyuserresponses` VALUES (275, 1493633971, 344);
INSERT INTO `buzzyuserresponses` VALUES (276, 1493633971, 344);
INSERT INTO `buzzyuserresponses` VALUES (277, 1493633971, 344);
INSERT INTO `buzzyuserresponses` VALUES (278, 1493633972, 344);
INSERT INTO `buzzyuserresponses` VALUES (279, 1493633972, 344);
INSERT INTO `buzzyuserresponses` VALUES (280, 1493633973, 344);
INSERT INTO `buzzyuserresponses` VALUES (281, 1493633973, 344);
INSERT INTO `buzzyuserresponses` VALUES (282, 1493633973, 344);
INSERT INTO `buzzyuserresponses` VALUES (283, 1493633973, 344);
INSERT INTO `buzzyuserresponses` VALUES (284, 1493633974, 344);
INSERT INTO `buzzyuserresponses` VALUES (285, 1493633974, 344);
INSERT INTO `buzzyuserresponses` VALUES (286, 1493633974, 344);
INSERT INTO `buzzyuserresponses` VALUES (287, 1493633974, 344);
INSERT INTO `buzzyuserresponses` VALUES (288, 1493633974, 344);
INSERT INTO `buzzyuserresponses` VALUES (289, 1493633974, 344);
INSERT INTO `buzzyuserresponses` VALUES (290, 1493633974, 344);
INSERT INTO `buzzyuserresponses` VALUES (291, 1493633974, 344);
INSERT INTO `buzzyuserresponses` VALUES (292, 1493633976, 344);
INSERT INTO `buzzyuserresponses` VALUES (293, 1493633976, 344);
INSERT INTO `buzzyuserresponses` VALUES (294, 1493633977, 344);
INSERT INTO `buzzyuserresponses` VALUES (295, 1493633977, 344);
INSERT INTO `buzzyuserresponses` VALUES (296, 1493633977, 344);
INSERT INTO `buzzyuserresponses` VALUES (297, 1493633977, 344);
INSERT INTO `buzzyuserresponses` VALUES (298, 1493633977, 344);
INSERT INTO `buzzyuserresponses` VALUES (299, 1493633977, 344);
INSERT INTO `buzzyuserresponses` VALUES (300, 1493633977, 344);
INSERT INTO `buzzyuserresponses` VALUES (301, 1493633977, 344);
INSERT INTO `buzzyuserresponses` VALUES (302, 1493633979, 344);
INSERT INTO `buzzyuserresponses` VALUES (303, 1493633979, 344);
INSERT INTO `buzzyuserresponses` VALUES (304, 1493633980, 344);
INSERT INTO `buzzyuserresponses` VALUES (305, 1493633980, 344);
INSERT INTO `buzzyuserresponses` VALUES (306, 1493633980, 344);
INSERT INTO `buzzyuserresponses` VALUES (307, 1493633980, 344);
INSERT INTO `buzzyuserresponses` VALUES (308, 1493633980, 344);
INSERT INTO `buzzyuserresponses` VALUES (309, 1493633980, 344);
INSERT INTO `buzzyuserresponses` VALUES (310, 1493633980, 344);
INSERT INTO `buzzyuserresponses` VALUES (311, 1493633980, 344);
INSERT INTO `buzzyuserresponses` VALUES (312, 1493633981, 344);
INSERT INTO `buzzyuserresponses` VALUES (313, 1493633981, 344);
INSERT INTO `buzzyuserresponses` VALUES (314, 1493633982, 344);
INSERT INTO `buzzyuserresponses` VALUES (315, 1493633983, 344);
INSERT INTO `buzzyuserresponses` VALUES (316, 1493633983, 344);
INSERT INTO `buzzyuserresponses` VALUES (317, 1493633983, 344);
INSERT INTO `buzzyuserresponses` VALUES (318, 1493633983, 344);
INSERT INTO `buzzyuserresponses` VALUES (319, 1493633983, 344);
INSERT INTO `buzzyuserresponses` VALUES (320, 1493633983, 344);
INSERT INTO `buzzyuserresponses` VALUES (321, 1493633985, 344);
INSERT INTO `buzzyuserresponses` VALUES (322, 1493633986, 344);
INSERT INTO `buzzyuserresponses` VALUES (323, 1493633986, 344);
INSERT INTO `buzzyuserresponses` VALUES (324, 1493633986, 344);
INSERT INTO `buzzyuserresponses` VALUES (325, 1493633986, 344);
INSERT INTO `buzzyuserresponses` VALUES (326, 1493633987, 344);
INSERT INTO `buzzyuserresponses` VALUES (327, 1493633988, 344);
INSERT INTO `buzzyuserresponses` VALUES (328, 1493633989, 344);
INSERT INTO `buzzyuserresponses` VALUES (329, 1493633989, 344);
INSERT INTO `buzzyuserresponses` VALUES (330, 1493633989, 344);
INSERT INTO `buzzyuserresponses` VALUES (331, 1493633989, 344);
INSERT INTO `buzzyuserresponses` VALUES (332, 1493633990, 344);
INSERT INTO `buzzyuserresponses` VALUES (333, 1493633990, 344);
INSERT INTO `buzzyuserresponses` VALUES (334, 1493633991, 344);
INSERT INTO `buzzyuserresponses` VALUES (335, 1493633991, 344);
INSERT INTO `buzzyuserresponses` VALUES (336, 1493633991, 344);
INSERT INTO `buzzyuserresponses` VALUES (337, 1493633991, 344);
INSERT INTO `buzzyuserresponses` VALUES (338, 1493633992, 344);
INSERT INTO `buzzyuserresponses` VALUES (339, 1493633992, 344);
INSERT INTO `buzzyuserresponses` VALUES (340, 1493633992, 344);
INSERT INTO `buzzyuserresponses` VALUES (341, 1493633992, 344);
INSERT INTO `buzzyuserresponses` VALUES (342, 1493633992, 344);
INSERT INTO `buzzyuserresponses` VALUES (343, 1493633992, 344);
INSERT INTO `buzzyuserresponses` VALUES (344, 1493633993, 344);
INSERT INTO `buzzyuserresponses` VALUES (345, 1493633993, 344);
INSERT INTO `buzzyuserresponses` VALUES (346, 1493633993, 344);
INSERT INTO `buzzyuserresponses` VALUES (347, 1493633993, 344);
INSERT INTO `buzzyuserresponses` VALUES (348, 1493633993, 344);
INSERT INTO `buzzyuserresponses` VALUES (349, 1493633993, 344);
INSERT INTO `buzzyuserresponses` VALUES (350, 1493633994, 344);
INSERT INTO `buzzyuserresponses` VALUES (351, 1493633994, 344);
INSERT INTO `buzzyuserresponses` VALUES (352, 1493633994, 344);
INSERT INTO `buzzyuserresponses` VALUES (353, 1493633995, 344);
INSERT INTO `buzzyuserresponses` VALUES (354, 1493633995, 344);
INSERT INTO `buzzyuserresponses` VALUES (355, 1493633995, 344);
INSERT INTO `buzzyuserresponses` VALUES (356, 1493633995, 344);
INSERT INTO `buzzyuserresponses` VALUES (357, 1493633995, 344);
INSERT INTO `buzzyuserresponses` VALUES (358, 1493633995, 344);
INSERT INTO `buzzyuserresponses` VALUES (359, 1493633995, 344);
INSERT INTO `buzzyuserresponses` VALUES (360, 1493633995, 344);
INSERT INTO `buzzyuserresponses` VALUES (361, 1493633995, 344);
INSERT INTO `buzzyuserresponses` VALUES (362, 1493633997, 344);
INSERT INTO `buzzyuserresponses` VALUES (363, 1493633997, 344);
INSERT INTO `buzzyuserresponses` VALUES (364, 1493633998, 344);
INSERT INTO `buzzyuserresponses` VALUES (365, 1493633998, 344);
INSERT INTO `buzzyuserresponses` VALUES (366, 1493633998, 344);
INSERT INTO `buzzyuserresponses` VALUES (367, 1493633998, 344);
INSERT INTO `buzzyuserresponses` VALUES (368, 1493633998, 344);
INSERT INTO `buzzyuserresponses` VALUES (369, 1493633998, 344);
INSERT INTO `buzzyuserresponses` VALUES (370, 1493633998, 344);
INSERT INTO `buzzyuserresponses` VALUES (371, 1493633998, 344);
INSERT INTO `buzzyuserresponses` VALUES (372, 1493634000, 344);
INSERT INTO `buzzyuserresponses` VALUES (373, 1493634001, 344);
INSERT INTO `buzzyuserresponses` VALUES (374, 1493634001, 344);
INSERT INTO `buzzyuserresponses` VALUES (375, 1493634001, 344);
INSERT INTO `buzzyuserresponses` VALUES (376, 1493634001, 344);
INSERT INTO `buzzyuserresponses` VALUES (377, 1493634001, 344);
INSERT INTO `buzzyuserresponses` VALUES (378, 1493634001, 344);
INSERT INTO `buzzyuserresponses` VALUES (379, 1493634001, 344);
INSERT INTO `buzzyuserresponses` VALUES (380, 1493634002, 344);
INSERT INTO `buzzyuserresponses` VALUES (381, 1493634002, 344);
INSERT INTO `buzzyuserresponses` VALUES (382, 1493634002, 344);
INSERT INTO `buzzyuserresponses` VALUES (383, 1493634002, 344);
INSERT INTO `buzzyuserresponses` VALUES (384, 1493634003, 344);
INSERT INTO `buzzyuserresponses` VALUES (385, 1493634003, 344);
INSERT INTO `buzzyuserresponses` VALUES (386, 1493634003, 344);
INSERT INTO `buzzyuserresponses` VALUES (387, 1493634003, 344);
INSERT INTO `buzzyuserresponses` VALUES (388, 1493634004, 344);
INSERT INTO `buzzyuserresponses` VALUES (389, 1493634004, 344);
INSERT INTO `buzzyuserresponses` VALUES (390, 1493634004, 344);
INSERT INTO `buzzyuserresponses` VALUES (391, 1493634004, 344);
INSERT INTO `buzzyuserresponses` VALUES (392, 1493634004, 344);
INSERT INTO `buzzyuserresponses` VALUES (393, 1493634004, 344);
INSERT INTO `buzzyuserresponses` VALUES (394, 1493634004, 344);
INSERT INTO `buzzyuserresponses` VALUES (395, 1493634004, 344);
INSERT INTO `buzzyuserresponses` VALUES (396, 1493634006, 344);
INSERT INTO `buzzyuserresponses` VALUES (397, 1493634006, 344);
INSERT INTO `buzzyuserresponses` VALUES (398, 1493634007, 344);
INSERT INTO `buzzyuserresponses` VALUES (399, 1493634007, 344);
INSERT INTO `buzzyuserresponses` VALUES (400, 1493634007, 344);
INSERT INTO `buzzyuserresponses` VALUES (401, 1493634007, 344);
INSERT INTO `buzzyuserresponses` VALUES (402, 1493634007, 344);
INSERT INTO `buzzyuserresponses` VALUES (403, 1493634007, 344);
INSERT INTO `buzzyuserresponses` VALUES (404, 1493634007, 344);
INSERT INTO `buzzyuserresponses` VALUES (405, 1493634007, 344);
INSERT INTO `buzzyuserresponses` VALUES (406, 1493634009, 344);
INSERT INTO `buzzyuserresponses` VALUES (407, 1493634009, 344);
INSERT INTO `buzzyuserresponses` VALUES (408, 1493634010, 344);
INSERT INTO `buzzyuserresponses` VALUES (409, 1493634010, 344);
INSERT INTO `buzzyuserresponses` VALUES (410, 1493634010, 344);
INSERT INTO `buzzyuserresponses` VALUES (411, 1493634010, 344);
INSERT INTO `buzzyuserresponses` VALUES (412, 1493634010, 344);
INSERT INTO `buzzyuserresponses` VALUES (413, 1493634010, 344);
INSERT INTO `buzzyuserresponses` VALUES (414, 1493634010, 344);
INSERT INTO `buzzyuserresponses` VALUES (415, 1493634010, 344);
INSERT INTO `buzzyuserresponses` VALUES (416, 1493634012, 344);
INSERT INTO `buzzyuserresponses` VALUES (417, 1493634013, 344);
INSERT INTO `buzzyuserresponses` VALUES (418, 1493634013, 344);
INSERT INTO `buzzyuserresponses` VALUES (419, 1493634013, 344);
INSERT INTO `buzzyuserresponses` VALUES (420, 1493634013, 344);
INSERT INTO `buzzyuserresponses` VALUES (421, 1493634013, 344);
INSERT INTO `buzzyuserresponses` VALUES (422, 1493634013, 344);
INSERT INTO `buzzyuserresponses` VALUES (423, 1493634013, 344);
INSERT INTO `buzzyuserresponses` VALUES (424, 1493634013, 344);
INSERT INTO `buzzyuserresponses` VALUES (425, 1493634014, 344);
INSERT INTO `buzzyuserresponses` VALUES (426, 1493634014, 344);
INSERT INTO `buzzyuserresponses` VALUES (427, 1493634014, 344);
INSERT INTO `buzzyuserresponses` VALUES (428, 1493634014, 344);
INSERT INTO `buzzyuserresponses` VALUES (429, 1493634014, 344);
INSERT INTO `buzzyuserresponses` VALUES (430, 1493634015, 344);
INSERT INTO `buzzyuserresponses` VALUES (431, 1493634015, 344);
INSERT INTO `buzzyuserresponses` VALUES (432, 1493634016, 344);
INSERT INTO `buzzyuserresponses` VALUES (433, 1493634016, 344);
INSERT INTO `buzzyuserresponses` VALUES (434, 1493634016, 344);
INSERT INTO `buzzyuserresponses` VALUES (435, 1493634016, 344);
INSERT INTO `buzzyuserresponses` VALUES (436, 1493634016, 344);
INSERT INTO `buzzyuserresponses` VALUES (437, 1493634016, 344);
INSERT INTO `buzzyuserresponses` VALUES (438, 1493634016, 344);
INSERT INTO `buzzyuserresponses` VALUES (439, 1493634016, 344);
INSERT INTO `buzzyuserresponses` VALUES (440, 1493634018, 344);
INSERT INTO `buzzyuserresponses` VALUES (441, 1493634018, 344);
INSERT INTO `buzzyuserresponses` VALUES (442, 1493634019, 344);
INSERT INTO `buzzyuserresponses` VALUES (443, 1493634019, 344);
INSERT INTO `buzzyuserresponses` VALUES (444, 1493634019, 344);
INSERT INTO `buzzyuserresponses` VALUES (445, 1493634019, 344);
INSERT INTO `buzzyuserresponses` VALUES (446, 1493634019, 344);
INSERT INTO `buzzyuserresponses` VALUES (447, 1493634019, 344);
INSERT INTO `buzzyuserresponses` VALUES (448, 1493634019, 344);
INSERT INTO `buzzyuserresponses` VALUES (449, 1493634019, 344);
INSERT INTO `buzzyuserresponses` VALUES (450, 1493634021, 344);
INSERT INTO `buzzyuserresponses` VALUES (451, 1493634021, 344);
INSERT INTO `buzzyuserresponses` VALUES (452, 1493634022, 344);
INSERT INTO `buzzyuserresponses` VALUES (453, 1493634022, 344);
INSERT INTO `buzzyuserresponses` VALUES (454, 1493634022, 344);
INSERT INTO `buzzyuserresponses` VALUES (455, 1493634022, 344);
INSERT INTO `buzzyuserresponses` VALUES (456, 1493634022, 344);
INSERT INTO `buzzyuserresponses` VALUES (457, 1493634022, 344);
INSERT INTO `buzzyuserresponses` VALUES (458, 1493634022, 344);
INSERT INTO `buzzyuserresponses` VALUES (459, 1493634022, 344);
INSERT INTO `buzzyuserresponses` VALUES (460, 1493634022, 344);
INSERT INTO `buzzyuserresponses` VALUES (461, 1493634023, 344);
INSERT INTO `buzzyuserresponses` VALUES (462, 1493634023, 344);
INSERT INTO `buzzyuserresponses` VALUES (463, 1493634023, 344);
INSERT INTO `buzzyuserresponses` VALUES (464, 1493634024, 344);
INSERT INTO `buzzyuserresponses` VALUES (465, 1493634024, 344);
INSERT INTO `buzzyuserresponses` VALUES (466, 1493634025, 344);
INSERT INTO `buzzyuserresponses` VALUES (467, 1493634025, 344);
INSERT INTO `buzzyuserresponses` VALUES (468, 1493634025, 344);
INSERT INTO `buzzyuserresponses` VALUES (469, 1493634025, 344);
INSERT INTO `buzzyuserresponses` VALUES (470, 1493634025, 344);
INSERT INTO `buzzyuserresponses` VALUES (471, 1493634025, 344);
INSERT INTO `buzzyuserresponses` VALUES (472, 1493634025, 344);
INSERT INTO `buzzyuserresponses` VALUES (473, 1493634025, 344);
INSERT INTO `buzzyuserresponses` VALUES (474, 1493634027, 344);
INSERT INTO `buzzyuserresponses` VALUES (475, 1493634027, 344);
INSERT INTO `buzzyuserresponses` VALUES (476, 1493634028, 344);
INSERT INTO `buzzyuserresponses` VALUES (477, 1493634028, 344);
INSERT INTO `buzzyuserresponses` VALUES (478, 1493634028, 344);
INSERT INTO `buzzyuserresponses` VALUES (479, 1493634028, 344);
INSERT INTO `buzzyuserresponses` VALUES (480, 1493634028, 344);
INSERT INTO `buzzyuserresponses` VALUES (481, 1493634028, 344);
INSERT INTO `buzzyuserresponses` VALUES (482, 1493634028, 344);
INSERT INTO `buzzyuserresponses` VALUES (483, 1493634028, 344);
INSERT INTO `buzzyuserresponses` VALUES (484, 1493634030, 344);
INSERT INTO `buzzyuserresponses` VALUES (485, 1493634030, 344);
INSERT INTO `buzzyuserresponses` VALUES (486, 1493634031, 344);
INSERT INTO `buzzyuserresponses` VALUES (487, 1493634031, 344);
INSERT INTO `buzzyuserresponses` VALUES (488, 1493634031, 344);
INSERT INTO `buzzyuserresponses` VALUES (489, 1493634031, 344);
INSERT INTO `buzzyuserresponses` VALUES (490, 1493634031, 344);
INSERT INTO `buzzyuserresponses` VALUES (491, 1493634031, 344);
INSERT INTO `buzzyuserresponses` VALUES (492, 1493634031, 344);
INSERT INTO `buzzyuserresponses` VALUES (493, 1493634031, 344);
INSERT INTO `buzzyuserresponses` VALUES (494, 1493634032, 344);
INSERT INTO `buzzyuserresponses` VALUES (495, 1493634032, 344);
INSERT INTO `buzzyuserresponses` VALUES (496, 1493634033, 344);
INSERT INTO `buzzyuserresponses` VALUES (497, 1493634033, 344);
INSERT INTO `buzzyuserresponses` VALUES (498, 1493634033, 344);
INSERT INTO `buzzyuserresponses` VALUES (499, 1493634033, 344);
INSERT INTO `buzzyuserresponses` VALUES (500, 1493634034, 344);
INSERT INTO `buzzyuserresponses` VALUES (501, 1493634034, 344);
INSERT INTO `buzzyuserresponses` VALUES (502, 1493634034, 344);
INSERT INTO `buzzyuserresponses` VALUES (503, 1493634034, 344);
INSERT INTO `buzzyuserresponses` VALUES (504, 1493634034, 344);
INSERT INTO `buzzyuserresponses` VALUES (505, 1493634034, 344);
INSERT INTO `buzzyuserresponses` VALUES (506, 1493634034, 344);
INSERT INTO `buzzyuserresponses` VALUES (507, 1493634034, 344);
INSERT INTO `buzzyuserresponses` VALUES (508, 1493634036, 344);
INSERT INTO `buzzyuserresponses` VALUES (509, 1493634036, 344);
INSERT INTO `buzzyuserresponses` VALUES (510, 1493634037, 344);
INSERT INTO `buzzyuserresponses` VALUES (511, 1493634037, 344);
INSERT INTO `buzzyuserresponses` VALUES (512, 1493634037, 344);
INSERT INTO `buzzyuserresponses` VALUES (513, 1493634037, 344);
INSERT INTO `buzzyuserresponses` VALUES (514, 1493634037, 344);
INSERT INTO `buzzyuserresponses` VALUES (515, 1493634037, 344);
INSERT INTO `buzzyuserresponses` VALUES (516, 1493634037, 344);
INSERT INTO `buzzyuserresponses` VALUES (517, 1493634037, 344);
INSERT INTO `buzzyuserresponses` VALUES (518, 1493634039, 344);
INSERT INTO `buzzyuserresponses` VALUES (519, 1493634039, 344);
INSERT INTO `buzzyuserresponses` VALUES (520, 1493634040, 344);
INSERT INTO `buzzyuserresponses` VALUES (521, 1493634040, 344);
INSERT INTO `buzzyuserresponses` VALUES (522, 1493634040, 344);
INSERT INTO `buzzyuserresponses` VALUES (523, 1493634040, 344);
INSERT INTO `buzzyuserresponses` VALUES (524, 1493634040, 344);
INSERT INTO `buzzyuserresponses` VALUES (525, 1493634040, 344);
INSERT INTO `buzzyuserresponses` VALUES (526, 1493634040, 344);
INSERT INTO `buzzyuserresponses` VALUES (527, 1493634040, 344);
INSERT INTO `buzzyuserresponses` VALUES (528, 1493634042, 344);
INSERT INTO `buzzyuserresponses` VALUES (529, 1493634042, 344);
INSERT INTO `buzzyuserresponses` VALUES (530, 1493634043, 344);
INSERT INTO `buzzyuserresponses` VALUES (531, 1493634043, 344);
INSERT INTO `buzzyuserresponses` VALUES (532, 1493634043, 344);
INSERT INTO `buzzyuserresponses` VALUES (533, 1493634043, 344);
INSERT INTO `buzzyuserresponses` VALUES (534, 1493634043, 344);
INSERT INTO `buzzyuserresponses` VALUES (535, 1493634043, 344);
INSERT INTO `buzzyuserresponses` VALUES (536, 1493634044, 344);
INSERT INTO `buzzyuserresponses` VALUES (537, 1493634044, 344);
INSERT INTO `buzzyuserresponses` VALUES (538, 1493634044, 344);
INSERT INTO `buzzyuserresponses` VALUES (539, 1493634044, 344);
INSERT INTO `buzzyuserresponses` VALUES (540, 1493634044, 344);
INSERT INTO `buzzyuserresponses` VALUES (541, 1493634044, 344);
INSERT INTO `buzzyuserresponses` VALUES (542, 1493634045, 344);
INSERT INTO `buzzyuserresponses` VALUES (543, 1493634045, 344);
INSERT INTO `buzzyuserresponses` VALUES (544, 1493634046, 344);
INSERT INTO `buzzyuserresponses` VALUES (545, 1493634046, 344);
INSERT INTO `buzzyuserresponses` VALUES (546, 1493634046, 344);
INSERT INTO `buzzyuserresponses` VALUES (547, 1493634046, 344);
INSERT INTO `buzzyuserresponses` VALUES (548, 1493634046, 344);
INSERT INTO `buzzyuserresponses` VALUES (549, 1493634046, 344);
INSERT INTO `buzzyuserresponses` VALUES (550, 1493634046, 344);
INSERT INTO `buzzyuserresponses` VALUES (551, 1493634047, 344);
INSERT INTO `buzzyuserresponses` VALUES (552, 1493634048, 344);
INSERT INTO `buzzyuserresponses` VALUES (553, 1493634048, 344);
INSERT INTO `buzzyuserresponses` VALUES (554, 1493634049, 344);
INSERT INTO `buzzyuserresponses` VALUES (555, 1493634049, 344);
INSERT INTO `buzzyuserresponses` VALUES (556, 1493634049, 344);
INSERT INTO `buzzyuserresponses` VALUES (557, 1493634049, 344);
INSERT INTO `buzzyuserresponses` VALUES (558, 1493634049, 344);
INSERT INTO `buzzyuserresponses` VALUES (559, 1493634049, 344);
INSERT INTO `buzzyuserresponses` VALUES (560, 1493634049, 344);
INSERT INTO `buzzyuserresponses` VALUES (561, 1493634049, 344);
INSERT INTO `buzzyuserresponses` VALUES (562, 1493634051, 344);
INSERT INTO `buzzyuserresponses` VALUES (563, 1493634051, 344);
INSERT INTO `buzzyuserresponses` VALUES (564, 1493634052, 344);
INSERT INTO `buzzyuserresponses` VALUES (565, 1493634052, 344);
INSERT INTO `buzzyuserresponses` VALUES (566, 1493634052, 344);
INSERT INTO `buzzyuserresponses` VALUES (567, 1493634052, 344);
INSERT INTO `buzzyuserresponses` VALUES (568, 1493634052, 344);
INSERT INTO `buzzyuserresponses` VALUES (569, 1493634052, 344);
INSERT INTO `buzzyuserresponses` VALUES (570, 1493634052, 344);
INSERT INTO `buzzyuserresponses` VALUES (571, 1493634052, 344);
INSERT INTO `buzzyuserresponses` VALUES (572, 1493634052, 344);
INSERT INTO `buzzyuserresponses` VALUES (573, 1493634052, 344);
INSERT INTO `buzzyuserresponses` VALUES (574, 1493634053, 344);
INSERT INTO `buzzyuserresponses` VALUES (575, 1493634053, 344);
INSERT INTO `buzzyuserresponses` VALUES (576, 1493634054, 344);
INSERT INTO `buzzyuserresponses` VALUES (577, 1493634054, 344);
INSERT INTO `buzzyuserresponses` VALUES (578, 1493634055, 344);
INSERT INTO `buzzyuserresponses` VALUES (579, 1493634055, 344);
INSERT INTO `buzzyuserresponses` VALUES (580, 1493634055, 344);
INSERT INTO `buzzyuserresponses` VALUES (581, 1493634055, 344);
INSERT INTO `buzzyuserresponses` VALUES (582, 1493634055, 344);
INSERT INTO `buzzyuserresponses` VALUES (583, 1493634055, 344);
INSERT INTO `buzzyuserresponses` VALUES (584, 1493634055, 344);
INSERT INTO `buzzyuserresponses` VALUES (585, 1493634055, 344);
INSERT INTO `buzzyuserresponses` VALUES (586, 1493634057, 344);
INSERT INTO `buzzyuserresponses` VALUES (587, 1493634057, 344);
INSERT INTO `buzzyuserresponses` VALUES (588, 1493634058, 344);
INSERT INTO `buzzyuserresponses` VALUES (589, 1493634058, 344);
INSERT INTO `buzzyuserresponses` VALUES (590, 1493634058, 344);
INSERT INTO `buzzyuserresponses` VALUES (591, 1493634058, 344);
INSERT INTO `buzzyuserresponses` VALUES (592, 1493634058, 344);
INSERT INTO `buzzyuserresponses` VALUES (593, 1493634058, 344);
INSERT INTO `buzzyuserresponses` VALUES (594, 1493634058, 344);
INSERT INTO `buzzyuserresponses` VALUES (595, 1493634058, 344);
INSERT INTO `buzzyuserresponses` VALUES (596, 1493634061, 344);
INSERT INTO `buzzyuserresponses` VALUES (597, 1493634061, 344);
INSERT INTO `buzzyuserresponses` VALUES (598, 1493634061, 344);
INSERT INTO `buzzyuserresponses` VALUES (599, 1493634061, 344);
INSERT INTO `buzzyuserresponses` VALUES (600, 1493634061, 344);
INSERT INTO `buzzyuserresponses` VALUES (601, 1493634061, 344);
INSERT INTO `buzzyuserresponses` VALUES (602, 1493634062, 344);
INSERT INTO `buzzyuserresponses` VALUES (603, 1493634062, 344);
INSERT INTO `buzzyuserresponses` VALUES (604, 1493634062, 344);
INSERT INTO `buzzyuserresponses` VALUES (605, 1493634062, 344);
INSERT INTO `buzzyuserresponses` VALUES (606, 1493634062, 344);
INSERT INTO `buzzyuserresponses` VALUES (607, 1493634063, 344);
INSERT INTO `buzzyuserresponses` VALUES (608, 1493634063, 344);
INSERT INTO `buzzyuserresponses` VALUES (609, 1493634063, 344);
INSERT INTO `buzzyuserresponses` VALUES (610, 1493634063, 344);
INSERT INTO `buzzyuserresponses` VALUES (611, 1493634064, 344);
INSERT INTO `buzzyuserresponses` VALUES (612, 1493634064, 344);
INSERT INTO `buzzyuserresponses` VALUES (613, 1493634064, 344);
INSERT INTO `buzzyuserresponses` VALUES (614, 1493634064, 344);
INSERT INTO `buzzyuserresponses` VALUES (615, 1493634064, 344);
INSERT INTO `buzzyuserresponses` VALUES (616, 1493634064, 344);
INSERT INTO `buzzyuserresponses` VALUES (617, 1493634064, 344);
INSERT INTO `buzzyuserresponses` VALUES (618, 1493634064, 344);
INSERT INTO `buzzyuserresponses` VALUES (619, 1493634064, 344);
INSERT INTO `buzzyuserresponses` VALUES (620, 1493634066, 344);
INSERT INTO `buzzyuserresponses` VALUES (621, 1493634066, 344);
INSERT INTO `buzzyuserresponses` VALUES (622, 1493634067, 344);
INSERT INTO `buzzyuserresponses` VALUES (623, 1493634067, 344);
INSERT INTO `buzzyuserresponses` VALUES (624, 1493634067, 344);
INSERT INTO `buzzyuserresponses` VALUES (625, 1493634067, 344);
INSERT INTO `buzzyuserresponses` VALUES (626, 1493634067, 344);
INSERT INTO `buzzyuserresponses` VALUES (627, 1493634067, 344);
INSERT INTO `buzzyuserresponses` VALUES (628, 1493634067, 344);
INSERT INTO `buzzyuserresponses` VALUES (629, 1493634067, 344);
INSERT INTO `buzzyuserresponses` VALUES (630, 1493634069, 344);
INSERT INTO `buzzyuserresponses` VALUES (631, 1493634070, 344);
INSERT INTO `buzzyuserresponses` VALUES (632, 1493634070, 344);
INSERT INTO `buzzyuserresponses` VALUES (633, 1493634070, 344);
INSERT INTO `buzzyuserresponses` VALUES (634, 1493634070, 344);
INSERT INTO `buzzyuserresponses` VALUES (635, 1493634070, 344);
INSERT INTO `buzzyuserresponses` VALUES (636, 1493634070, 344);
INSERT INTO `buzzyuserresponses` VALUES (637, 1493634070, 344);
INSERT INTO `buzzyuserresponses` VALUES (638, 1493634070, 344);
INSERT INTO `buzzyuserresponses` VALUES (639, 1493634071, 344);
INSERT INTO `buzzyuserresponses` VALUES (640, 1493634072, 344);
INSERT INTO `buzzyuserresponses` VALUES (641, 1493634073, 344);
INSERT INTO `buzzyuserresponses` VALUES (642, 1493634073, 344);
INSERT INTO `buzzyuserresponses` VALUES (643, 1493634073, 344);
INSERT INTO `buzzyuserresponses` VALUES (644, 1493634073, 344);
INSERT INTO `buzzyuserresponses` VALUES (645, 1493634073, 344);
INSERT INTO `buzzyuserresponses` VALUES (646, 1493634073, 344);
INSERT INTO `buzzyuserresponses` VALUES (647, 1493634073, 344);
INSERT INTO `buzzyuserresponses` VALUES (648, 1493634073, 344);
INSERT INTO `buzzyuserresponses` VALUES (649, 1493634073, 344);
INSERT INTO `buzzyuserresponses` VALUES (650, 1493634074, 344);
INSERT INTO `buzzyuserresponses` VALUES (651, 1493634074, 344);
INSERT INTO `buzzyuserresponses` VALUES (652, 1493634074, 344);
INSERT INTO `buzzyuserresponses` VALUES (653, 1493634074, 344);
INSERT INTO `buzzyuserresponses` VALUES (654, 1493634075, 344);
INSERT INTO `buzzyuserresponses` VALUES (655, 1493634075, 344);
INSERT INTO `buzzyuserresponses` VALUES (656, 1493634076, 344);
INSERT INTO `buzzyuserresponses` VALUES (657, 1493634076, 344);
INSERT INTO `buzzyuserresponses` VALUES (658, 1493634076, 344);
INSERT INTO `buzzyuserresponses` VALUES (659, 1493634076, 344);
INSERT INTO `buzzyuserresponses` VALUES (660, 1493634076, 344);
INSERT INTO `buzzyuserresponses` VALUES (661, 1493634076, 344);
INSERT INTO `buzzyuserresponses` VALUES (662, 1493634076, 344);
INSERT INTO `buzzyuserresponses` VALUES (663, 1493634076, 344);
INSERT INTO `buzzyuserresponses` VALUES (664, 1493634078, 344);
INSERT INTO `buzzyuserresponses` VALUES (665, 1493634079, 344);
INSERT INTO `buzzyuserresponses` VALUES (666, 1493634079, 344);
INSERT INTO `buzzyuserresponses` VALUES (667, 1493634079, 344);
INSERT INTO `buzzyuserresponses` VALUES (668, 1493634079, 344);
INSERT INTO `buzzyuserresponses` VALUES (669, 1493634079, 344);
INSERT INTO `buzzyuserresponses` VALUES (670, 1493634079, 344);
INSERT INTO `buzzyuserresponses` VALUES (671, 1493634079, 344);
INSERT INTO `buzzyuserresponses` VALUES (672, 1493634079, 344);
INSERT INTO `buzzyuserresponses` VALUES (673, 1493634080, 344);
INSERT INTO `buzzyuserresponses` VALUES (674, 1493634081, 344);
INSERT INTO `buzzyuserresponses` VALUES (675, 1493634081, 344);
INSERT INTO `buzzyuserresponses` VALUES (676, 1493634081, 344);
INSERT INTO `buzzyuserresponses` VALUES (677, 1493634081, 344);
INSERT INTO `buzzyuserresponses` VALUES (678, 1493634081, 344);
INSERT INTO `buzzyuserresponses` VALUES (679, 1493634081, 344);
INSERT INTO `buzzyuserresponses` VALUES (680, 1493634082, 344);
INSERT INTO `buzzyuserresponses` VALUES (681, 1493634082, 344);
INSERT INTO `buzzyuserresponses` VALUES (682, 1493634082, 344);
INSERT INTO `buzzyuserresponses` VALUES (683, 1493634082, 344);
INSERT INTO `buzzyuserresponses` VALUES (684, 1493634082, 344);
INSERT INTO `buzzyuserresponses` VALUES (685, 1493634082, 344);
INSERT INTO `buzzyuserresponses` VALUES (686, 1493634082, 344);
INSERT INTO `buzzyuserresponses` VALUES (687, 1493634083, 344);
INSERT INTO `buzzyuserresponses` VALUES (688, 1493634084, 344);
INSERT INTO `buzzyuserresponses` VALUES (689, 1493634084, 344);
INSERT INTO `buzzyuserresponses` VALUES (690, 1493634084, 344);
INSERT INTO `buzzyuserresponses` VALUES (691, 1493634084, 344);
INSERT INTO `buzzyuserresponses` VALUES (692, 1493634084, 344);
INSERT INTO `buzzyuserresponses` VALUES (693, 1493634084, 344);
INSERT INTO `buzzyuserresponses` VALUES (694, 1493634085, 344);
INSERT INTO `buzzyuserresponses` VALUES (695, 1493634085, 344);
INSERT INTO `buzzyuserresponses` VALUES (696, 1493634085, 344);
INSERT INTO `buzzyuserresponses` VALUES (697, 1493634085, 344);
INSERT INTO `buzzyuserresponses` VALUES (698, 1493634087, 344);
INSERT INTO `buzzyuserresponses` VALUES (699, 1493634087, 344);
INSERT INTO `buzzyuserresponses` VALUES (700, 1493634087, 344);
INSERT INTO `buzzyuserresponses` VALUES (701, 1493634087, 344);
INSERT INTO `buzzyuserresponses` VALUES (702, 1493634087, 344);
INSERT INTO `buzzyuserresponses` VALUES (703, 1493634087, 344);
INSERT INTO `buzzyuserresponses` VALUES (704, 1493634088, 344);
INSERT INTO `buzzyuserresponses` VALUES (705, 1493634088, 344);
INSERT INTO `buzzyuserresponses` VALUES (706, 1493634088, 344);
INSERT INTO `buzzyuserresponses` VALUES (707, 1493634088, 344);
INSERT INTO `buzzyuserresponses` VALUES (708, 1493634090, 344);
INSERT INTO `buzzyuserresponses` VALUES (709, 1493634090, 344);
INSERT INTO `buzzyuserresponses` VALUES (710, 1493634090, 344);
INSERT INTO `buzzyuserresponses` VALUES (711, 1493634090, 344);
INSERT INTO `buzzyuserresponses` VALUES (712, 1493634090, 344);
INSERT INTO `buzzyuserresponses` VALUES (713, 1493634090, 344);
INSERT INTO `buzzyuserresponses` VALUES (714, 1493634091, 344);
INSERT INTO `buzzyuserresponses` VALUES (715, 1493634091, 344);
INSERT INTO `buzzyuserresponses` VALUES (716, 1493634091, 344);
INSERT INTO `buzzyuserresponses` VALUES (717, 1493634091, 344);
INSERT INTO `buzzyuserresponses` VALUES (718, 1493634092, 344);
INSERT INTO `buzzyuserresponses` VALUES (719, 1493634092, 344);
INSERT INTO `buzzyuserresponses` VALUES (720, 1493634092, 344);
INSERT INTO `buzzyuserresponses` VALUES (721, 1493634093, 344);
INSERT INTO `buzzyuserresponses` VALUES (722, 1493634093, 344);
INSERT INTO `buzzyuserresponses` VALUES (723, 1493634093, 344);
INSERT INTO `buzzyuserresponses` VALUES (724, 1493634093, 344);
INSERT INTO `buzzyuserresponses` VALUES (725, 1493634093, 344);
INSERT INTO `buzzyuserresponses` VALUES (726, 1493634093, 344);
INSERT INTO `buzzyuserresponses` VALUES (727, 1493634093, 344);
INSERT INTO `buzzyuserresponses` VALUES (728, 1493634094, 344);
INSERT INTO `buzzyuserresponses` VALUES (729, 1493634094, 344);
INSERT INTO `buzzyuserresponses` VALUES (730, 1493634094, 344);
INSERT INTO `buzzyuserresponses` VALUES (731, 1493634094, 344);
INSERT INTO `buzzyuserresponses` VALUES (732, 1493634095, 344);
INSERT INTO `buzzyuserresponses` VALUES (733, 1493634211, 344);
INSERT INTO `buzzyuserresponses` VALUES (734, 1493634363, 344);
INSERT INTO `buzzyuserresponses` VALUES (735, 1493634545, 344);
INSERT INTO `buzzyuserresponses` VALUES (736, 1493634545, 344);
INSERT INTO `buzzyuserresponses` VALUES (737, 1493634545, 344);
INSERT INTO `buzzyuserresponses` VALUES (738, 1493634545, 344);
INSERT INTO `buzzyuserresponses` VALUES (739, 1493634546, 344);
INSERT INTO `buzzyuserresponses` VALUES (740, 1493635853, 344);
INSERT INTO `buzzyuserresponses` VALUES (741, 1493636301, 344);
INSERT INTO `buzzyuserresponses` VALUES (742, 1493636386, 344);
INSERT INTO `buzzyuserresponses` VALUES (743, 1493636421, 344);
INSERT INTO `buzzyuserresponses` VALUES (744, 1493636421, 344);
INSERT INTO `buzzyuserresponses` VALUES (745, 1493636422, 344);
INSERT INTO `buzzyuserresponses` VALUES (746, 1493636422, 344);
INSERT INTO `buzzyuserresponses` VALUES (747, 1493636422, 344);
INSERT INTO `buzzyuserresponses` VALUES (748, 1493636470, 344);
INSERT INTO `buzzyuserresponses` VALUES (749, 1493636559, 344);
INSERT INTO `buzzyuserresponses` VALUES (750, 1493637515, 344);
INSERT INTO `buzzyuserresponses` VALUES (751, 1493638979, 344);
INSERT INTO `buzzyuserresponses` VALUES (752, 1493638980, 344);
INSERT INTO `buzzyuserresponses` VALUES (753, 1493639011, 344);
INSERT INTO `buzzyuserresponses` VALUES (754, 1493639011, 344);
INSERT INTO `buzzyuserresponses` VALUES (755, 1493657042, 344);
INSERT INTO `buzzyuserresponses` VALUES (756, 1493657049, 344);
INSERT INTO `buzzyuserresponses` VALUES (757, 1493660135, 344);
INSERT INTO `buzzyuserresponses` VALUES (758, 1493660135, 344);
INSERT INTO `buzzyuserresponses` VALUES (759, 1493660359, 344);
INSERT INTO `buzzyuserresponses` VALUES (760, 1493660359, 344);
INSERT INTO `buzzyuserresponses` VALUES (761, 1493710016, 344);
INSERT INTO `buzzyuserresponses` VALUES (762, 1493714990, 344);
INSERT INTO `buzzyuserresponses` VALUES (763, 1493723036, 344);
INSERT INTO `buzzyuserresponses` VALUES (764, 1493723042, 344);
INSERT INTO `buzzyuserresponses` VALUES (765, 1493723482, 344);
INSERT INTO `buzzyuserresponses` VALUES (766, 1493723488, 344);
INSERT INTO `buzzyuserresponses` VALUES (767, 1493723902, 344);
INSERT INTO `buzzyuserresponses` VALUES (768, 1493723912, 344);
INSERT INTO `buzzyuserresponses` VALUES (769, 1493723912, 344);
INSERT INTO `buzzyuserresponses` VALUES (770, 1493723912, 344);
INSERT INTO `buzzyuserresponses` VALUES (771, 1493723912, 344);
INSERT INTO `buzzyuserresponses` VALUES (772, 1493723912, 344);
INSERT INTO `buzzyuserresponses` VALUES (773, 1493723913, 344);
INSERT INTO `buzzyuserresponses` VALUES (774, 1493723913, 344);
INSERT INTO `buzzyuserresponses` VALUES (775, 1493723913, 344);
INSERT INTO `buzzyuserresponses` VALUES (776, 1493723913, 344);
INSERT INTO `buzzyuserresponses` VALUES (777, 1493723914, 344);
INSERT INTO `buzzyuserresponses` VALUES (778, 1493723914, 344);
INSERT INTO `buzzyuserresponses` VALUES (779, 1493723914, 344);
INSERT INTO `buzzyuserresponses` VALUES (780, 1493723914, 344);
INSERT INTO `buzzyuserresponses` VALUES (781, 1493723914, 344);
INSERT INTO `buzzyuserresponses` VALUES (782, 1493723916, 344);
INSERT INTO `buzzyuserresponses` VALUES (783, 1493723916, 344);
INSERT INTO `buzzyuserresponses` VALUES (784, 1493723916, 344);
INSERT INTO `buzzyuserresponses` VALUES (785, 1493723916, 344);
INSERT INTO `buzzyuserresponses` VALUES (786, 1493723917, 344);
INSERT INTO `buzzyuserresponses` VALUES (787, 1493723917, 344);
INSERT INTO `buzzyuserresponses` VALUES (788, 1493724305, 344);
INSERT INTO `buzzyuserresponses` VALUES (789, 1493724387, 344);
INSERT INTO `buzzyuserresponses` VALUES (790, 1493724394, 344);
INSERT INTO `buzzyuserresponses` VALUES (791, 1493724400, 344);
INSERT INTO `buzzyuserresponses` VALUES (792, 1493724533, 331);
INSERT INTO `buzzyuserresponses` VALUES (793, 1493724556, 331);
INSERT INTO `buzzyuserresponses` VALUES (794, 1493724595, 331);
INSERT INTO `buzzyuserresponses` VALUES (795, 1493726171, 344);
INSERT INTO `buzzyuserresponses` VALUES (796, 1493726175, 344);
INSERT INTO `buzzyuserresponses` VALUES (797, 1493726180, 344);
INSERT INTO `buzzyuserresponses` VALUES (798, 1493726184, 344);
INSERT INTO `buzzyuserresponses` VALUES (799, 1493726194, 344);
INSERT INTO `buzzyuserresponses` VALUES (800, 1493726379, 344);
INSERT INTO `buzzyuserresponses` VALUES (801, 1493727208, 344);
INSERT INTO `buzzyuserresponses` VALUES (802, 1493727285, 331);
INSERT INTO `buzzyuserresponses` VALUES (803, 1493727318, 331);
INSERT INTO `buzzyuserresponses` VALUES (804, 1493727363, 344);
INSERT INTO `buzzyuserresponses` VALUES (805, 1493727385, 344);
INSERT INTO `buzzyuserresponses` VALUES (806, 1493727393, 344);
INSERT INTO `buzzyuserresponses` VALUES (807, 1493727528, 344);
INSERT INTO `buzzyuserresponses` VALUES (808, 1493727528, 344);
INSERT INTO `buzzyuserresponses` VALUES (809, 1493728943, 331);
INSERT INTO `buzzyuserresponses` VALUES (810, 1493728961, 331);
INSERT INTO `buzzyuserresponses` VALUES (811, 1493728996, 331);
INSERT INTO `buzzyuserresponses` VALUES (812, 1493729014, 331);
INSERT INTO `buzzyuserresponses` VALUES (813, 1493729815, 344);
INSERT INTO `buzzyuserresponses` VALUES (814, 1493729816, 344);
INSERT INTO `buzzyuserresponses` VALUES (815, 1493729843, 344);
INSERT INTO `buzzyuserresponses` VALUES (816, 1493731835, 344);
INSERT INTO `buzzyuserresponses` VALUES (817, 1493731853, 344);
INSERT INTO `buzzyuserresponses` VALUES (818, 1493731891, 344);
INSERT INTO `buzzyuserresponses` VALUES (819, 1493755608, 344);
INSERT INTO `buzzyuserresponses` VALUES (820, 1493756706, 344);
INSERT INTO `buzzyuserresponses` VALUES (821, 1493756707, 344);
INSERT INTO `buzzyuserresponses` VALUES (822, 1493783591, 344);
INSERT INTO `buzzyuserresponses` VALUES (823, 1493788414, 344);
INSERT INTO `buzzyuserresponses` VALUES (824, 1493792670, 344);
INSERT INTO `buzzyuserresponses` VALUES (825, 1493792712, 344);
INSERT INTO `buzzyuserresponses` VALUES (826, 1493792789, 344);
INSERT INTO `buzzyuserresponses` VALUES (827, 1493792919, 344);
INSERT INTO `buzzyuserresponses` VALUES (828, 1493792927, 344);
INSERT INTO `buzzyuserresponses` VALUES (829, 1493792947, 344);
INSERT INTO `buzzyuserresponses` VALUES (830, 1493793113, 344);
INSERT INTO `buzzyuserresponses` VALUES (831, 1493793258, 344);
INSERT INTO `buzzyuserresponses` VALUES (832, 1493793268, 344);
INSERT INTO `buzzyuserresponses` VALUES (833, 1493793503, 344);
INSERT INTO `buzzyuserresponses` VALUES (834, 1493793510, 344);
INSERT INTO `buzzyuserresponses` VALUES (835, 1493793569, 344);
INSERT INTO `buzzyuserresponses` VALUES (836, 1493793573, 344);
INSERT INTO `buzzyuserresponses` VALUES (837, 1493793602, 344);
INSERT INTO `buzzyuserresponses` VALUES (838, 1493793616, 344);
INSERT INTO `buzzyuserresponses` VALUES (839, 1493793728, 344);
INSERT INTO `buzzyuserresponses` VALUES (840, 1493793767, 344);
INSERT INTO `buzzyuserresponses` VALUES (841, 1493793772, 344);
INSERT INTO `buzzyuserresponses` VALUES (842, 1493793926, 344);
INSERT INTO `buzzyuserresponses` VALUES (843, 1493793945, 344);
INSERT INTO `buzzyuserresponses` VALUES (844, 1493794003, 344);
INSERT INTO `buzzyuserresponses` VALUES (845, 1493794061, 344);
INSERT INTO `buzzyuserresponses` VALUES (846, 1493794103, 344);
INSERT INTO `buzzyuserresponses` VALUES (847, 1493794143, 344);
INSERT INTO `buzzyuserresponses` VALUES (848, 1493794176, 344);
INSERT INTO `buzzyuserresponses` VALUES (849, 1493794183, 344);
INSERT INTO `buzzyuserresponses` VALUES (850, 1493794251, 344);
INSERT INTO `buzzyuserresponses` VALUES (851, 1493794290, 344);
INSERT INTO `buzzyuserresponses` VALUES (852, 1493794628, 344);
INSERT INTO `buzzyuserresponses` VALUES (853, 1493794634, 344);
INSERT INTO `buzzyuserresponses` VALUES (854, 1493794652, 344);
INSERT INTO `buzzyuserresponses` VALUES (855, 1493794660, 344);
INSERT INTO `buzzyuserresponses` VALUES (856, 1493795967, 344);
INSERT INTO `buzzyuserresponses` VALUES (857, 1493795975, 344);
INSERT INTO `buzzyuserresponses` VALUES (858, 1493796051, 344);
INSERT INTO `buzzyuserresponses` VALUES (859, 1493796056, 344);
INSERT INTO `buzzyuserresponses` VALUES (860, 1493796062, 344);
INSERT INTO `buzzyuserresponses` VALUES (861, 1493796068, 344);
INSERT INTO `buzzyuserresponses` VALUES (862, 1493796077, 344);
INSERT INTO `buzzyuserresponses` VALUES (863, 1493796087, 344);
INSERT INTO `buzzyuserresponses` VALUES (864, 1493796091, 344);
INSERT INTO `buzzyuserresponses` VALUES (865, 1493797331, 344);
INSERT INTO `buzzyuserresponses` VALUES (866, 1493797506, 968);
INSERT INTO `buzzyuserresponses` VALUES (867, 1493797522, 344);
INSERT INTO `buzzyuserresponses` VALUES (868, 1493797533, 968);
INSERT INTO `buzzyuserresponses` VALUES (869, 1493797600, 968);
INSERT INTO `buzzyuserresponses` VALUES (870, 1493797642, 968);
INSERT INTO `buzzyuserresponses` VALUES (871, 1493797747, 968);
INSERT INTO `buzzyuserresponses` VALUES (872, 1493797963, 968);
INSERT INTO `buzzyuserresponses` VALUES (873, 1493798150, 344);
INSERT INTO `buzzyuserresponses` VALUES (874, 1493798938, 968);
INSERT INTO `buzzyuserresponses` VALUES (875, 1493798967, 968);
INSERT INTO `buzzyuserresponses` VALUES (876, 1493799035, 344);
INSERT INTO `buzzyuserresponses` VALUES (877, 1493799042, 344);
INSERT INTO `buzzyuserresponses` VALUES (878, 1493799047, 344);
INSERT INTO `buzzyuserresponses` VALUES (879, 1493799112, 344);
INSERT INTO `buzzyuserresponses` VALUES (880, 1493799154, 968);
INSERT INTO `buzzyuserresponses` VALUES (881, 1493799176, 968);
INSERT INTO `buzzyuserresponses` VALUES (882, 1493799269, 968);
INSERT INTO `buzzyuserresponses` VALUES (883, 1493799281, 344);
INSERT INTO `buzzyuserresponses` VALUES (884, 1493799286, 968);
INSERT INTO `buzzyuserresponses` VALUES (885, 1493799291, 968);
INSERT INTO `buzzyuserresponses` VALUES (886, 1493799335, 968);
INSERT INTO `buzzyuserresponses` VALUES (887, 1493799368, 968);
INSERT INTO `buzzyuserresponses` VALUES (888, 1493799671, 344);
INSERT INTO `buzzyuserresponses` VALUES (889, 1493799708, 344);
INSERT INTO `buzzyuserresponses` VALUES (890, 1493799724, 968);
INSERT INTO `buzzyuserresponses` VALUES (891, 1493799796, 344);
INSERT INTO `buzzyuserresponses` VALUES (892, 1493799803, 344);
INSERT INTO `buzzyuserresponses` VALUES (893, 1493799828, 344);
INSERT INTO `buzzyuserresponses` VALUES (894, 1493799881, 968);
INSERT INTO `buzzyuserresponses` VALUES (895, 1493799897, 968);
INSERT INTO `buzzyuserresponses` VALUES (896, 1493799912, 344);
INSERT INTO `buzzyuserresponses` VALUES (897, 1493799930, 968);
INSERT INTO `buzzyuserresponses` VALUES (898, 1493799939, 344);
INSERT INTO `buzzyuserresponses` VALUES (899, 1493799960, 344);
INSERT INTO `buzzyuserresponses` VALUES (900, 1493801430, 344);
INSERT INTO `buzzyuserresponses` VALUES (901, 1493816212, 344);
INSERT INTO `buzzyuserresponses` VALUES (902, 1493816212, 344);
INSERT INTO `buzzyuserresponses` VALUES (903, 1493816212, 344);
INSERT INTO `buzzyuserresponses` VALUES (904, 1493816213, 344);
INSERT INTO `buzzyuserresponses` VALUES (905, 1493816213, 344);
INSERT INTO `buzzyuserresponses` VALUES (906, 1493816244, 344);
INSERT INTO `buzzyuserresponses` VALUES (907, 1493816244, 344);
INSERT INTO `buzzyuserresponses` VALUES (908, 1493821683, 344);
INSERT INTO `buzzyuserresponses` VALUES (909, 1493821683, 344);
INSERT INTO `buzzyuserresponses` VALUES (910, 1493821685, 344);
INSERT INTO `buzzyuserresponses` VALUES (911, 1493821686, 344);
INSERT INTO `buzzyuserresponses` VALUES (912, 1493821686, 344);
INSERT INTO `buzzyuserresponses` VALUES (913, 1493821688, 344);
INSERT INTO `buzzyuserresponses` VALUES (914, 1493821688, 344);
INSERT INTO `buzzyuserresponses` VALUES (915, 1493821690, 344);
INSERT INTO `buzzyuserresponses` VALUES (916, 1493821692, 344);
INSERT INTO `buzzyuserresponses` VALUES (917, 1493821693, 344);
INSERT INTO `buzzyuserresponses` VALUES (918, 1493821693, 344);
INSERT INTO `buzzyuserresponses` VALUES (919, 1493821695, 344);
INSERT INTO `buzzyuserresponses` VALUES (920, 1493821696, 344);
INSERT INTO `buzzyuserresponses` VALUES (921, 1493821696, 344);
INSERT INTO `buzzyuserresponses` VALUES (922, 1493821698, 344);
INSERT INTO `buzzyuserresponses` VALUES (923, 1493821698, 344);
INSERT INTO `buzzyuserresponses` VALUES (924, 1493824386, 344);
INSERT INTO `buzzyuserresponses` VALUES (925, 1493824436, 344);
INSERT INTO `buzzyuserresponses` VALUES (926, 1493824438, 344);
INSERT INTO `buzzyuserresponses` VALUES (927, 1493824438, 344);
INSERT INTO `buzzyuserresponses` VALUES (928, 1493824440, 344);
INSERT INTO `buzzyuserresponses` VALUES (929, 1493824441, 344);
INSERT INTO `buzzyuserresponses` VALUES (930, 1493824441, 344);
INSERT INTO `buzzyuserresponses` VALUES (931, 1493824441, 344);
INSERT INTO `buzzyuserresponses` VALUES (932, 1493824443, 344);
INSERT INTO `buzzyuserresponses` VALUES (933, 1493824443, 344);
INSERT INTO `buzzyuserresponses` VALUES (934, 1493824790, 344);
INSERT INTO `buzzyuserresponses` VALUES (935, 1493824790, 344);
INSERT INTO `buzzyuserresponses` VALUES (936, 1493824791, 344);
INSERT INTO `buzzyuserresponses` VALUES (937, 1493824801, 344);
INSERT INTO `buzzyuserresponses` VALUES (938, 1493824811, 344);
INSERT INTO `buzzyuserresponses` VALUES (939, 1493824821, 344);
INSERT INTO `buzzyuserresponses` VALUES (940, 1493827354, 344);
INSERT INTO `buzzyuserresponses` VALUES (941, 1493827370, 344);
INSERT INTO `buzzyuserresponses` VALUES (942, 1493827391, 344);
INSERT INTO `buzzyuserresponses` VALUES (943, 1493876289, 344);
INSERT INTO `buzzyuserresponses` VALUES (944, 1493879228, 344);
INSERT INTO `buzzyuserresponses` VALUES (945, 1493879245, 344);
INSERT INTO `buzzyuserresponses` VALUES (946, 1493896242, 976);
INSERT INTO `buzzyuserresponses` VALUES (947, 1493910526, 344);
INSERT INTO `buzzyuserresponses` VALUES (948, 1493910532, 344);
INSERT INTO `buzzyuserresponses` VALUES (949, 1493910542, 344);
INSERT INTO `buzzyuserresponses` VALUES (950, 1493910584, 344);
INSERT INTO `buzzyuserresponses` VALUES (951, 1493910589, 344);
INSERT INTO `buzzyuserresponses` VALUES (952, 1493910633, 344);
INSERT INTO `buzzyuserresponses` VALUES (953, 1493910725, 344);
INSERT INTO `buzzyuserresponses` VALUES (954, 1493910734, 344);
INSERT INTO `buzzyuserresponses` VALUES (955, 1493914054, 344);
INSERT INTO `buzzyuserresponses` VALUES (956, 1493914071, 331);
INSERT INTO `buzzyuserresponses` VALUES (957, 1493914101, 331);
INSERT INTO `buzzyuserresponses` VALUES (958, 1493914133, 344);
INSERT INTO `buzzyuserresponses` VALUES (959, 1493914214, 331);
INSERT INTO `buzzyuserresponses` VALUES (960, 1493914887, 344);
INSERT INTO `buzzyuserresponses` VALUES (961, 1493914910, 331);
INSERT INTO `buzzyuserresponses` VALUES (962, 1493916577, 331);
INSERT INTO `buzzyuserresponses` VALUES (963, 1493928199, 344);
INSERT INTO `buzzyuserresponses` VALUES (964, 1493928202, 344);
INSERT INTO `buzzyuserresponses` VALUES (965, 1493928202, 344);
INSERT INTO `buzzyuserresponses` VALUES (966, 1493928203, 344);
INSERT INTO `buzzyuserresponses` VALUES (967, 1493928254, 344);
INSERT INTO `buzzyuserresponses` VALUES (968, 1493959475, 344);
INSERT INTO `buzzyuserresponses` VALUES (969, 1493962796, 331);
INSERT INTO `buzzyuserresponses` VALUES (970, 1493962837, 331);
INSERT INTO `buzzyuserresponses` VALUES (971, 1493963514, 331);
INSERT INTO `buzzyuserresponses` VALUES (972, 1493966420, 331);
INSERT INTO `buzzyuserresponses` VALUES (973, 1493966600, 331);
INSERT INTO `buzzyuserresponses` VALUES (974, 1493967715, 331);
INSERT INTO `buzzyuserresponses` VALUES (975, 1493967765, 331);
INSERT INTO `buzzyuserresponses` VALUES (976, 1493968202, 331);
INSERT INTO `buzzyuserresponses` VALUES (977, 1493968334, 331);
INSERT INTO `buzzyuserresponses` VALUES (978, 1493968440, 331);
INSERT INTO `buzzyuserresponses` VALUES (979, 1493968518, 331);
INSERT INTO `buzzyuserresponses` VALUES (980, 1493968707, 331);
INSERT INTO `buzzyuserresponses` VALUES (981, 1493968801, 331);
INSERT INTO `buzzyuserresponses` VALUES (982, 1493968922, 331);
INSERT INTO `buzzyuserresponses` VALUES (983, 1493968974, 331);
INSERT INTO `buzzyuserresponses` VALUES (984, 1493969058, 331);
INSERT INTO `buzzyuserresponses` VALUES (985, 1493969130, 331);
INSERT INTO `buzzyuserresponses` VALUES (986, 1493969221, 331);
INSERT INTO `buzzyuserresponses` VALUES (987, 1493969258, 331);
INSERT INTO `buzzyuserresponses` VALUES (988, 1493970270, 331);
INSERT INTO `buzzyuserresponses` VALUES (989, 1493970311, 331);
INSERT INTO `buzzyuserresponses` VALUES (990, 1493970356, 331);
INSERT INTO `buzzyuserresponses` VALUES (991, 1493970437, 331);
INSERT INTO `buzzyuserresponses` VALUES (992, 1493970525, 331);
INSERT INTO `buzzyuserresponses` VALUES (993, 1493970605, 331);
INSERT INTO `buzzyuserresponses` VALUES (994, 1493970653, 331);
INSERT INTO `buzzyuserresponses` VALUES (995, 1493970749, 331);
INSERT INTO `buzzyuserresponses` VALUES (996, 1493970989, 331);
INSERT INTO `buzzyuserresponses` VALUES (997, 1493971136, 331);
INSERT INTO `buzzyuserresponses` VALUES (998, 1493971147, 331);
INSERT INTO `buzzyuserresponses` VALUES (999, 1493971169, 331);
INSERT INTO `buzzyuserresponses` VALUES (1000, 1493971326, 331);
INSERT INTO `buzzyuserresponses` VALUES (1001, 1493971347, 331);
INSERT INTO `buzzyuserresponses` VALUES (1002, 1493971369, 331);
INSERT INTO `buzzyuserresponses` VALUES (1003, 1493971457, 331);
INSERT INTO `buzzyuserresponses` VALUES (1004, 1493971530, 331);
INSERT INTO `buzzyuserresponses` VALUES (1005, 1493973437, 331);
INSERT INTO `buzzyuserresponses` VALUES (1006, 1493973494, 331);
INSERT INTO `buzzyuserresponses` VALUES (1007, 1493973707, 331);
INSERT INTO `buzzyuserresponses` VALUES (1008, 1493973845, 331);
INSERT INTO `buzzyuserresponses` VALUES (1009, 1493974771, 344);
INSERT INTO `buzzyuserresponses` VALUES (1010, 1493974910, 344);
INSERT INTO `buzzyuserresponses` VALUES (1011, 1493998061, 344);
INSERT INTO `buzzyuserresponses` VALUES (1012, 1493998129, 344);
INSERT INTO `buzzyuserresponses` VALUES (1013, 1493998195, 344);
INSERT INTO `buzzyuserresponses` VALUES (1014, 1493998196, 344);
INSERT INTO `buzzyuserresponses` VALUES (1015, 1493999511, 344);
INSERT INTO `buzzyuserresponses` VALUES (1016, 1493999757, 344);
INSERT INTO `buzzyuserresponses` VALUES (1017, 1493999771, 344);
INSERT INTO `buzzyuserresponses` VALUES (1018, 1493999781, 344);
INSERT INTO `buzzyuserresponses` VALUES (1019, 1493999791, 344);
INSERT INTO `buzzyuserresponses` VALUES (1020, 1493999799, 344);
INSERT INTO `buzzyuserresponses` VALUES (1021, 1493999810, 344);
INSERT INTO `buzzyuserresponses` VALUES (1022, 1493999813, 344);
INSERT INTO `buzzyuserresponses` VALUES (1023, 1493999831, 344);
INSERT INTO `buzzyuserresponses` VALUES (1024, 1493999841, 344);
INSERT INTO `buzzyuserresponses` VALUES (1025, 1493999851, 344);
INSERT INTO `buzzyuserresponses` VALUES (1026, 1493999861, 344);
INSERT INTO `buzzyuserresponses` VALUES (1027, 1493999871, 344);
INSERT INTO `buzzyuserresponses` VALUES (1028, 1493999881, 344);
INSERT INTO `buzzyuserresponses` VALUES (1029, 1493999891, 344);
INSERT INTO `buzzyuserresponses` VALUES (1030, 1493999901, 344);
INSERT INTO `buzzyuserresponses` VALUES (1031, 1493999911, 344);
INSERT INTO `buzzyuserresponses` VALUES (1032, 1493999921, 344);
INSERT INTO `buzzyuserresponses` VALUES (1033, 1493999931, 344);
INSERT INTO `buzzyuserresponses` VALUES (1034, 1493999941, 344);
INSERT INTO `buzzyuserresponses` VALUES (1035, 1493999951, 344);
INSERT INTO `buzzyuserresponses` VALUES (1036, 1493999952, 344);
INSERT INTO `buzzyuserresponses` VALUES (1037, 1493999971, 344);
INSERT INTO `buzzyuserresponses` VALUES (1038, 1493999981, 344);
INSERT INTO `buzzyuserresponses` VALUES (1039, 1493999991, 344);
INSERT INTO `buzzyuserresponses` VALUES (1040, 1494000001, 344);
INSERT INTO `buzzyuserresponses` VALUES (1041, 1494000011, 344);
INSERT INTO `buzzyuserresponses` VALUES (1042, 1494000016, 344);
INSERT INTO `buzzyuserresponses` VALUES (1043, 1494000031, 344);
INSERT INTO `buzzyuserresponses` VALUES (1044, 1494000041, 344);
INSERT INTO `buzzyuserresponses` VALUES (1045, 1494000052, 344);
INSERT INTO `buzzyuserresponses` VALUES (1046, 1494000071, 344);
INSERT INTO `buzzyuserresponses` VALUES (1047, 1494000081, 344);
INSERT INTO `buzzyuserresponses` VALUES (1048, 1494000091, 344);
INSERT INTO `buzzyuserresponses` VALUES (1049, 1494000101, 344);
INSERT INTO `buzzyuserresponses` VALUES (1050, 1494000105, 344);
INSERT INTO `buzzyuserresponses` VALUES (1051, 1494000111, 344);
INSERT INTO `buzzyuserresponses` VALUES (1052, 1494000121, 344);
INSERT INTO `buzzyuserresponses` VALUES (1053, 1494000131, 344);
INSERT INTO `buzzyuserresponses` VALUES (1054, 1494000141, 344);
INSERT INTO `buzzyuserresponses` VALUES (1055, 1494000151, 344);
INSERT INTO `buzzyuserresponses` VALUES (1056, 1494000161, 344);
INSERT INTO `buzzyuserresponses` VALUES (1057, 1494000171, 344);
INSERT INTO `buzzyuserresponses` VALUES (1058, 1494000181, 344);
INSERT INTO `buzzyuserresponses` VALUES (1059, 1494000191, 344);
INSERT INTO `buzzyuserresponses` VALUES (1060, 1494000201, 344);
INSERT INTO `buzzyuserresponses` VALUES (1061, 1494000211, 344);
INSERT INTO `buzzyuserresponses` VALUES (1062, 1494000221, 344);
INSERT INTO `buzzyuserresponses` VALUES (1063, 1494000231, 344);
INSERT INTO `buzzyuserresponses` VALUES (1064, 1494000241, 344);
INSERT INTO `buzzyuserresponses` VALUES (1065, 1494000251, 344);
INSERT INTO `buzzyuserresponses` VALUES (1066, 1494000252, 344);
INSERT INTO `buzzyuserresponses` VALUES (1067, 1494000253, 344);
INSERT INTO `buzzyuserresponses` VALUES (1068, 1494000253, 344);
INSERT INTO `buzzyuserresponses` VALUES (1069, 1494000457, 344);

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyusers`
-- 

CREATE TABLE `buzzyusers` (
  `buzzyuser_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyuser_first_name` varchar(45) NOT NULL,
  `buzzyuser_last_name` varchar(50) NOT NULL,
  `buzzyuser_username` varchar(20) NOT NULL,
  `buzzyuser_data_sexual_orientation` int(11) NOT NULL,
  `buzzyuser_image` varchar(255) NOT NULL,
  `buzzyuser_location` varchar(100) NOT NULL,
  `buzzyuser_lat` decimal(8,4) NOT NULL,
  `buzzyuser_long` decimal(8,4) NOT NULL,
  `buzzyuser_cover` varchar(80) NOT NULL,
  `buzzyuser_email` varchar(100) NOT NULL,
  `buzzyuser_birthdate` date NOT NULL,
  `buzzyuser_age` int(11) NOT NULL,
  `buzzyuser_password` varchar(100) NOT NULL,
  `buzzyuser_registration_date` date NOT NULL,
  `buzzyuser_last_login` int(11) NOT NULL,
  `buzzyuser_registration_timestamp` int(11) NOT NULL,
  `buzzyuser_aboutme` text NOT NULL,
  `buzzyuser_status` tinyint(4) NOT NULL,
  `buzzyuser_status_timestamp` int(11) NOT NULL,
  `buzzyuser_hash` varchar(32) NOT NULL,
  `buzzyuser_newslimit` int(11) NOT NULL,
  `buzzyuser_credits` int(11) NOT NULL,
  `buzzyuser_fbconfirm` int(11) NOT NULL,
  `buzzyuser_googleconfirm` int(11) NOT NULL,
  `buzzyuser_emailstatus` tinyint(4) NOT NULL,
  `buzzyuser_fullnamestatus` tinyint(4) NOT NULL,
  `buzzyuser_contactsstatus` tinyint(4) NOT NULL,
  `buzzyuser_visibility` tinyint(4) NOT NULL,
  `buzzyuser_privacy` int(11) NOT NULL,
  `buzzyuser_genre` int(11) NOT NULL,
  `buzzyuser_onlinestatus` int(11) NOT NULL,
  `buzzyuser_fortumo_tnx` varchar(255) NOT NULL,
  `buzzyuser_chatlimit` int(11) NOT NULL,
  `buzzyuser_chatlimittime` int(11) NOT NULL,
  `buzzyuser_moderator` int(11) NOT NULL,
  `buzzyuser_confirmed` int(11) NOT NULL,
  `buzzyuser_theme` int(11) NOT NULL,
  `buzzyuser_animation` int(11) NOT NULL,
  `buzzyuser_race` int(11) NOT NULL,
  `buzzyphoto_ver` int(11) NOT NULL,
  `buzzyuser_not` int(11) NOT NULL,
  `buzzyuser_nottime` int(11) NOT NULL,
  PRIMARY KEY (`buzzyuser_id`),
  UNIQUE KEY `unique` (`buzzyuser_email`)
) ENGINE=MyISAM AUTO_INCREMENT=1382 DEFAULT CHARSET=latin1 AUTO_INCREMENT=1382 ;

-- 
-- Dumping data for table `buzzyusers`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyuserunliked`
-- 

CREATE TABLE `buzzyuserunliked` (
  `buzzyuserunliked_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyunliked_id` int(11) NOT NULL,
  `buzzyuser_id` int(11) NOT NULL,
  PRIMARY KEY (`buzzyuserunliked_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `buzzyuserunliked`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyviews`
-- 

CREATE TABLE `buzzyviews` (
  `buzzyview_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyviewer_id` int(11) NOT NULL,
  `buzzyviewed_id` int(11) NOT NULL,
  `buzzyviews_timestamp` int(11) NOT NULL,
  PRIMARY KEY (`buzzyview_id`)
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=latin1 AUTO_INCREMENT=110 ;

-- 
-- Dumping data for table `buzzyviews`
-- 

INSERT INTO `buzzyviews` VALUES (81, 344, 1204, 1482483713);
INSERT INTO `buzzyviews` VALUES (82, 344, 1195, 1482483724);
INSERT INTO `buzzyviews` VALUES (83, 344, 1204, 1482484971);
INSERT INTO `buzzyviews` VALUES (84, 344, 1203, 1482489083);
INSERT INTO `buzzyviews` VALUES (85, 344, 1136, 1482489343);
INSERT INTO `buzzyviews` VALUES (86, 344, 1124, 1482489355);
INSERT INTO `buzzyviews` VALUES (87, 344, 1195, 1482489448);
INSERT INTO `buzzyviews` VALUES (88, 344, 1197, 1482853235);
INSERT INTO `buzzyviews` VALUES (89, 344, 1123, 1483261275);
INSERT INTO `buzzyviews` VALUES (90, 344, 1136, 1483262067);
INSERT INTO `buzzyviews` VALUES (91, 344, 1155, 1483263403);
INSERT INTO `buzzyviews` VALUES (92, 344, 1169, 1483543979);
INSERT INTO `buzzyviews` VALUES (93, 344, 1119, 1483545915);
INSERT INTO `buzzyviews` VALUES (94, 344, 1155, 1483695327);
INSERT INTO `buzzyviews` VALUES (95, 344, 1155, 1483695862);
INSERT INTO `buzzyviews` VALUES (96, 344, 1155, 1483696021);
INSERT INTO `buzzyviews` VALUES (97, 344, 1155, 1483696375);
INSERT INTO `buzzyviews` VALUES (98, 344, 1155, 1483696501);
INSERT INTO `buzzyviews` VALUES (99, 344, 1155, 1483696571);
INSERT INTO `buzzyviews` VALUES (100, 344, 1155, 1483696666);
INSERT INTO `buzzyviews` VALUES (101, 344, 1155, 1483696694);
INSERT INTO `buzzyviews` VALUES (102, 344, 1155, 1483699494);
INSERT INTO `buzzyviews` VALUES (103, 344, 1155, 1483699524);
INSERT INTO `buzzyviews` VALUES (104, 344, 1155, 1483715171);
INSERT INTO `buzzyviews` VALUES (105, 344, 1195, 1483715179);
INSERT INTO `buzzyviews` VALUES (106, 1123, 344, 1483732208);
INSERT INTO `buzzyviews` VALUES (107, 344, 1123, 1483876351);
INSERT INTO `buzzyviews` VALUES (108, 344, 1139, 1483876466);
INSERT INTO `buzzyviews` VALUES (109, 344, 1363, 1484041581);

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyvisitorcities`
-- 

CREATE TABLE `buzzyvisitorcities` (
  `buzzyvisitorcities_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyvisitors_city` varchar(50) NOT NULL,
  `buzzyvisitors_countrycode` varchar(4) NOT NULL,
  `buzzyvisitorcitycount` int(11) NOT NULL,
  PRIMARY KEY (`buzzyvisitorcities_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

-- 
-- Dumping data for table `buzzyvisitorcities`
-- 

INSERT INTO `buzzyvisitorcities` VALUES (2, 'Hammonton', 'US', 5);
INSERT INTO `buzzyvisitorcities` VALUES (4, 'Huntsville', 'US', 2);
INSERT INTO `buzzyvisitorcities` VALUES (5, 'Cary', 'US', 1);
INSERT INTO `buzzyvisitorcities` VALUES (7, 'Tokyo', 'JP', 3);
INSERT INTO `buzzyvisitorcities` VALUES (10, 'Fairfield', 'US', 1);
INSERT INTO `buzzyvisitorcities` VALUES (13, 'Ontario', 'US', 3);
INSERT INTO `buzzyvisitorcities` VALUES (16, 'Ann Arbor', 'US', 2);
INSERT INTO `buzzyvisitorcities` VALUES (15, 'Durham', 'US', 1);
INSERT INTO `buzzyvisitorcities` VALUES (17, 'Monterrey', 'MX', 2);
INSERT INTO `buzzyvisitorcities` VALUES (19, 'Rio de Janeiro', 'BR', 3);
INSERT INTO `buzzyvisitorcities` VALUES (20, 'Berlin', 'DE', 14);
INSERT INTO `buzzyvisitorcities` VALUES (21, 'Belgrade', 'RS', 209);
INSERT INTO `buzzyvisitorcities` VALUES (22, 'Redmond', 'US', 52);
INSERT INTO `buzzyvisitorcities` VALUES (23, '', 'IE', 44);
INSERT INTO `buzzyvisitorcities` VALUES (24, 'Menlo Park', 'US', 14);
INSERT INTO `buzzyvisitorcities` VALUES (25, 'Chantilly', 'US', 19);
INSERT INTO `buzzyvisitorcities` VALUES (26, 'Los Angeles', 'US', 4);
INSERT INTO `buzzyvisitorcities` VALUES (27, 'Vancouver', 'CA', 8);
INSERT INTO `buzzyvisitorcities` VALUES (28, '', 'NL', 4);
INSERT INTO `buzzyvisitorcities` VALUES (29, '', 'US', 1);
INSERT INTO `buzzyvisitorcities` VALUES (30, '', '', 7);
INSERT INTO `buzzyvisitorcities` VALUES (31, 'Mountain View', 'US', 1);
INSERT INTO `buzzyvisitorcities` VALUES (32, 'New York', 'US', 1);
INSERT INTO `buzzyvisitorcities` VALUES (33, 'Beijing', 'CN', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyvisitorcountries`
-- 

CREATE TABLE `buzzyvisitorcountries` (
  `buzzyvisitorcountries_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyvisitors_country` varchar(50) NOT NULL,
  `buzzyvisitorcountrycount` int(11) NOT NULL,
  PRIMARY KEY (`buzzyvisitorcountries_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

-- 
-- Dumping data for table `buzzyvisitorcountries`
-- 

INSERT INTO `buzzyvisitorcountries` VALUES (2, 'United States', 107);
INSERT INTO `buzzyvisitorcountries` VALUES (3, 'Japan', 3);
INSERT INTO `buzzyvisitorcountries` VALUES (9, 'Brazil', 3);
INSERT INTO `buzzyvisitorcountries` VALUES (8, 'Mexico', 2);
INSERT INTO `buzzyvisitorcountries` VALUES (10, 'Germany', 14);
INSERT INTO `buzzyvisitorcountries` VALUES (11, 'Serbia', 209);
INSERT INTO `buzzyvisitorcountries` VALUES (12, 'Ireland', 45);
INSERT INTO `buzzyvisitorcountries` VALUES (13, 'Canada', 8);
INSERT INTO `buzzyvisitorcountries` VALUES (14, 'Netherlands', 4);
INSERT INTO `buzzyvisitorcountries` VALUES (15, '', 7);
INSERT INTO `buzzyvisitorcountries` VALUES (16, 'China', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `buzzyvisitors`
-- 

CREATE TABLE `buzzyvisitors` (
  `buzzyvisitors_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyvisitors_ip` varchar(50) NOT NULL,
  `buzzyvisitors_city` varchar(50) NOT NULL,
  `buzzyvisitors_region` varchar(50) NOT NULL,
  `buzzyvisitors_country` varchar(50) NOT NULL,
  `buzzyvisitors_countrycode` varchar(10) NOT NULL,
  `buzzyvisitors_visitdate` datetime NOT NULL,
  PRIMARY KEY (`buzzyvisitors_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `buzzyvisitors`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `chat_options`
-- 

CREATE TABLE `chat_options` (
  `chat_option_id` int(11) NOT NULL AUTO_INCREMENT,
  `chat_option_coloone` varchar(255) NOT NULL,
  `chat_option_colotwo` varchar(255) NOT NULL,
  `chat_option_colothree` varchar(255) NOT NULL,
  `chat_option_refresh` int(11) NOT NULL,
  `chat_option_radius` int(11) NOT NULL,
  `chat_option_limit` int(11) NOT NULL,
  PRIMARY KEY (`chat_option_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `chat_options`
-- 

INSERT INTO `chat_options` VALUES (1, 'C4E3FB', 'EEEEEE', 'eeeeee', 10000, 150, 100);

-- --------------------------------------------------------

-- 
-- Table structure for table `chatemoticons`
-- 

CREATE TABLE `chatemoticons` (
  `buzzyemoticon_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyemoticon_img` varchar(255) NOT NULL,
  `buzzyemoticon_element` varchar(255) NOT NULL,
  `buzzyemoticon_title` varchar(255) NOT NULL,
  PRIMARY KEY (`buzzyemoticon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `chatemoticons`
-- 

INSERT INTO `chatemoticons` VALUES (1, 'https://cdn4.iconfinder.com/data/icons/reaction/32/shy-24.png', '<img src="https://cdn4.iconfinder.com/data/icons/reaction/32/shy-24.png" />', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `chatemots`
-- 

CREATE TABLE `chatemots` (
  `buzzyemot_id` int(11) NOT NULL AUTO_INCREMENT,
  `buzzyemot_sign` varchar(255) NOT NULL,
  `buzzyemot_title` varchar(255) NOT NULL,
  `buzzyemot_cat` int(11) NOT NULL,
  PRIMARY KEY (`buzzyemot_id`)
) ENGINE=InnoDB AUTO_INCREMENT=206 DEFAULT CHARSET=latin1 AUTO_INCREMENT=206 ;

-- 
-- Dumping data for table `chatemots`
-- 

INSERT INTO `chatemots` VALUES (55, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-37.png', ':premlazy:', 1);
INSERT INTO `chatemots` VALUES (56, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-1.png', ':premsun:', 1);
INSERT INTO `chatemots` VALUES (57, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-2.png', ':premstar:', 1);
INSERT INTO `chatemots` VALUES (58, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-3.png', ':premangry:', 1);
INSERT INTO `chatemots` VALUES (59, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-38.png', ':premlove:', 1);
INSERT INTO `chatemots` VALUES (60, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-18.png', ':premlaughh:', 1);
INSERT INTO `chatemots` VALUES (61, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-33.png', ':premsil:', 1);
INSERT INTO `chatemots` VALUES (62, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-34.png', ':premooh:', 1);
INSERT INTO `chatemots` VALUES (63, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-17.png', ':premwink:', 1);
INSERT INTO `chatemots` VALUES (64, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-19.png', ':premweird:', 1);
INSERT INTO `chatemots` VALUES (65, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-8.png', ':premttt:', 1);
INSERT INTO `chatemots` VALUES (66, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-24.png', ':premnnn:', 1000);
INSERT INTO `chatemots` VALUES (67, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-20.png', ':premsweat:', 1);
INSERT INTO `chatemots` VALUES (68, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-25.png', ':premdumb:', 1);
INSERT INTO `chatemots` VALUES (69, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-35.png', ':premconfn:', 1);
INSERT INTO `chatemots` VALUES (70, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-19.png', ':premsily:', 1000);
INSERT INTO `chatemots` VALUES (71, 'https://cdn4.iconfinder.com/data/icons/very_emotional_emoticons_lazy/128x128/128-39.png', ':premsuprise:', 100);
INSERT INTO `chatemots` VALUES (72, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/Happy-Minion-Icon.png', ':minhappy:', 2);
INSERT INTO `chatemots` VALUES (73, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/despicable-me-2-Minion-icon-5.png', ':minbla:', 2);
INSERT INTO `chatemots` VALUES (74, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/Minion-reading-icon.png', ':minwrite:', 2);
INSERT INTO `chatemots` VALUES (75, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/Shy-Minion-icon.png', ':minthink:', 2);
INSERT INTO `chatemots` VALUES (76, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/Minion_icon.png', ':minfire:', 2);
INSERT INTO `chatemots` VALUES (77, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/superman-minion-icon.png', ':minsuper:', 2);
INSERT INTO `chatemots` VALUES (78, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/Curious-Minion-Icon.png', ':mincur:', 2);
INSERT INTO `chatemots` VALUES (79, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/Dancing-minion-icon.png', ':minafrika:', 2);
INSERT INTO `chatemots` VALUES (80, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/despicable-me-2-Minion-icon-7.png', ':minhi:', 2);
INSERT INTO `chatemots` VALUES (81, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/Angry-Minion-icon.png', ':minangry:', 2);
INSERT INTO `chatemots` VALUES (82, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/despicable-me-2-Minion-icon-6.png', ':minduck:', 2);
INSERT INTO `chatemots` VALUES (83, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/despicable-me-2-Minion-icon-1.png', ':mingay:', 2);
INSERT INTO `chatemots` VALUES (84, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/Minion-playing-golf-icon.png', ':minhat:', 2);
INSERT INTO `chatemots` VALUES (85, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/girl-minion-icon.png', ':mingirl:', 2);
INSERT INTO `chatemots` VALUES (86, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/despicable-me-2-Minion-icon-3.png', ':minbanana:', 2);
INSERT INTO `chatemots` VALUES (87, 'https://cdn2.iconfinder.com/data/icons/despicable-me-2-minions/128/kungfu-Minion.png', ':minkungfu:', 2000);
INSERT INTO `chatemots` VALUES (88, ':)', 'emo1fb.png', 0);
INSERT INTO `chatemots` VALUES (89, ':(', 'emo3fb.png', 0);
INSERT INTO `chatemots` VALUES (90, ':D', 'emo2fb.png', 0);
INSERT INTO `chatemots` VALUES (91, ':P', 'emo5fb.png', 0);
INSERT INTO `chatemots` VALUES (92, ':cool:', 'emo6fb.png', 0);
INSERT INTO `chatemots` VALUES (93, ';)', 'emo10fb.png', 0);
INSERT INTO `chatemots` VALUES (94, ':kiss:', 'emo14fb.png', 0);
INSERT INTO `chatemots` VALUES (95, ':sleep:', 'emo12fb.png', 0);
INSERT INTO `chatemots` VALUES (96, ':.(', 'emo13fb.png', 0);
INSERT INTO `chatemots` VALUES (97, ':O', 'emo9fb.png', 0);
INSERT INTO `chatemots` VALUES (98, ':sick:', 'emo15fb.png', 0);
INSERT INTO `chatemots` VALUES (99, ':devil:', 'emo16fb.png', 0);
INSERT INTO `chatemots` VALUES (100, ':frozen:', 'emo17fb.png', 0);
INSERT INTO `chatemots` VALUES (101, ':cowboy:', 'emo18fb.png', 0);
INSERT INTO `chatemots` VALUES (102, ':angry:', 'emo21fb.png', 0);
INSERT INTO `chatemots` VALUES (103, ':monkey:', 'emo22fb.png', 0);
INSERT INTO `chatemots` VALUES (104, ':nerd:', 'emo23fb.png', 0);
INSERT INTO `chatemots` VALUES (105, ':heart:', 'emo8fb.png', 0);
INSERT INTO `chatemots` VALUES (106, ':sicksick:', 'emo24fb.png', 0);
INSERT INTO `chatemots` VALUES (107, ':clown:', 'emo25fb.png', 0);
INSERT INTO `chatemots` VALUES (108, ':angel:', 'emo26fb.png', 0);
INSERT INTO `chatemots` VALUES (109, ':cat:', 'emo27fb.png', 0);
INSERT INTO `chatemots` VALUES (110, ':poo:', 'emo28fb.png', 0);
INSERT INTO `chatemots` VALUES (111, ':police:', 'emo29fb.png', 0);
INSERT INTO `chatemots` VALUES (112, ':russian:', 'emo30fb.png', 0);
INSERT INTO `chatemots` VALUES (113, ':santaclaus:', 'emo31fb.png', 0);
INSERT INTO `chatemots` VALUES (114, ':tshirt:', 'emo32fb.png', 0);
INSERT INTO `chatemots` VALUES (115, ':pig:', 'emo33fb.png', 0);
INSERT INTO `chatemots` VALUES (116, ':shoe:', 'emo34fb.png', 0);
INSERT INTO `chatemots` VALUES (117, ':lipp:', 'emo35fb.png', 0);
INSERT INTO `chatemots` VALUES (118, ':diad:', 'emo36fb.png', 0);
INSERT INTO `chatemots` VALUES (119, ':kisskiss:', 'emo37fb.png', 0);
INSERT INTO `chatemots` VALUES (120, ':strong:', 'emo38fb.png', 0);
INSERT INTO `chatemots` VALUES (121, ':ok:', 'emo39fb.png', 0);
INSERT INTO `chatemots` VALUES (122, ':clap:', 'emo40fb.png', 0);
INSERT INTO `chatemots` VALUES (123, ':handshake:', 'emo41fb.png', 0);
INSERT INTO `chatemots` VALUES (124, ':bigkiss:', 'emo42fb.png', 0);
INSERT INTO `chatemots` VALUES (125, ':biglove:', 'emo43fb.png', 0);
INSERT INTO `chatemots` VALUES (126, ':snick:', 'emo44fb.png', 0);
INSERT INTO `chatemots` VALUES (127, ':hat:', 'emo45fb.png', 0);
INSERT INTO `chatemots` VALUES (128, ':doggy:', 'emo46fb.png', 0);
INSERT INTO `chatemots` VALUES (129, ':gorila:', 'emo47fb.png', 0);
INSERT INTO `chatemots` VALUES (130, ':wolf:', 'emo48fb.png', 0);
INSERT INTO `chatemots` VALUES (131, ':catty:', 'emo49fb.png', 21);
INSERT INTO `chatemots` VALUES (132, ':lion:', 'emo50fb.png', 21);
INSERT INTO `chatemots` VALUES (133, ':tiger:', 'emo51fb.png', 0);
INSERT INTO `chatemots` VALUES (134, ':horse:', 'emo52fb.png', 21);
INSERT INTO `chatemots` VALUES (135, ':deer:', 'emo53fb.png', 21);
INSERT INTO `chatemots` VALUES (136, ':cow:', 'emo54fb.png', 21);
INSERT INTO `chatemots` VALUES (137, ':wildpig:', 'emo55fb.png', 21);
INSERT INTO `chatemots` VALUES (138, ':sheep:', 'emo56fb.png', 21);
INSERT INTO `chatemots` VALUES (139, ':camel:', 'emo57fb.png', 21);
INSERT INTO `chatemots` VALUES (140, ':elephant:', 'emo58fb.png', 21);
INSERT INTO `chatemots` VALUES (141, ':hypo:', 'emo59fb.png', 21);
INSERT INTO `chatemots` VALUES (142, ':mouse:', 'emo60fb.png', 21);
INSERT INTO `chatemots` VALUES (143, ':panda:', 'emo61fb.png', 21);
INSERT INTO `chatemots` VALUES (144, ':chick:', 'emo62fb.png', 21);
INSERT INTO `chatemots` VALUES (145, ':pingvin:', 'emo63fb.png', 21);
INSERT INTO `chatemots` VALUES (146, ':orao:', 'emo64fb.png', 21);
INSERT INTO `chatemots` VALUES (147, ':sova:', 'emo65fb.png', 21);
INSERT INTO `chatemots` VALUES (148, ':frog:', 'emo66fb.png', 21);
INSERT INTO `chatemots` VALUES (149, ':turtle:', 'emo67fb.png', 21);
INSERT INTO `chatemots` VALUES (150, ':delf:', 'emo68fb.png', 21);
INSERT INTO `chatemots` VALUES (151, ':bubamara:', 'emo69fb.png', 21);
INSERT INTO `chatemots` VALUES (152, ':burger:', 'emo70fb.png', 0);
INSERT INTO `chatemots` VALUES (153, ':ffried:', 'emo71fb.png', 0);
INSERT INTO `chatemots` VALUES (154, ':pizza:', 'emo72fb.png', 0);
INSERT INTO `chatemots` VALUES (155, ':hotdog:', 'emo73fb.png', 0);
INSERT INTO `chatemots` VALUES (156, ':taco:', 'emo74fb.png', 22);
INSERT INTO `chatemots` VALUES (157, ':egg:', 'emo75fb.png', 22);
INSERT INTO `chatemots` VALUES (158, ':soup:', 'emo76fb.png', 22);
INSERT INTO `chatemots` VALUES (159, ':salad:', 'emo77fb.png', 22);
INSERT INTO `chatemots` VALUES (160, ':popcorn:', 'emo78fb.png', 22);
INSERT INTO `chatemots` VALUES (162, ':spageti:', 'emo79afb.png', 22);
INSERT INTO `chatemots` VALUES (163, ':donut:', 'emo80fb.png', 22);
INSERT INTO `chatemots` VALUES (164, ':cake:', 'emo81fb.png', 22);
INSERT INTO `chatemots` VALUES (165, ':choco:', 'emo82fb.png', 22);
INSERT INTO `chatemots` VALUES (166, ':loli:', 'emo83fb.png', 22);
INSERT INTO `chatemots` VALUES (167, ':cucla:', 'emo84fb.png', 22);
INSERT INTO `chatemots` VALUES (168, ':coffee:', 'emo85fb.png', 22);
INSERT INTO `chatemots` VALUES (169, ':beer:', 'emo86fb.png', 22);
INSERT INTO `chatemots` VALUES (170, ':vine:', 'emo87fb.png', 22);
INSERT INTO `chatemots` VALUES (171, ':cocktail:', 'emo88fb.png', 22);
INSERT INTO `chatemots` VALUES (172, ':orange:', 'emo89fb.png', 22);
INSERT INTO `chatemots` VALUES (173, ':banana:', 'emo90fb.png', 22);
INSERT INTO `chatemots` VALUES (174, ':melon:', 'emo91fb.png', 22);
INSERT INTO `chatemots` VALUES (175, ':lemon:', 'emo92fb.png', 22);
INSERT INTO `chatemots` VALUES (176, ':kiwi:', 'emo93fb.png', 22);
INSERT INTO `chatemots` VALUES (177, ':car:', 'emo94fb.png', 23);
INSERT INTO `chatemots` VALUES (178, ':cab:', 'emo95fb.png', 23);
INSERT INTO `chatemots` VALUES (179, ':van:', 'emo97fb.png', 23);
INSERT INTO `chatemots` VALUES (180, ':hospital:', 'emo98fb.png', 23);
INSERT INTO `chatemots` VALUES (181, ':tram:', 'emo99fb.png', 23);
INSERT INTO `chatemots` VALUES (182, ':traktor:', 'emo100fb.png', 23);
INSERT INTO `chatemots` VALUES (183, ':lilboat:', 'emo101fb.png', 23);
INSERT INTO `chatemots` VALUES (184, ':boat:', 'emo102fb.png', 23);
INSERT INTO `chatemots` VALUES (185, ':bigboat:', 'emo103fb.png', 23);
INSERT INTO `chatemots` VALUES (186, ':bic1:', 'emo104fb.png', 23);
INSERT INTO `chatemots` VALUES (187, ':bic2:', 'emo105fb.png', 23);
INSERT INTO `chatemots` VALUES (188, ':bic3:', 'emo106fb.png', 23);
INSERT INTO `chatemots` VALUES (189, ':train:', 'emo107fb.png', 23);
INSERT INTO `chatemots` VALUES (190, ':rocket:', 'emo108fb.png', 23);
INSERT INTO `chatemots` VALUES (191, ':plane1:', 'emo109fb.png', 23);
INSERT INTO `chatemots` VALUES (192, ':plane2:', 'emo110fb.png', 23);
INSERT INTO `chatemots` VALUES (193, 'img/pkiss.png', ':premkiss:', 1);
INSERT INTO `chatemots` VALUES (194, 'https://cdn4.iconfinder.com/data/icons/imod/128/Software/iChat-top-delire.png', ':anim1:', 3);
INSERT INTO `chatemots` VALUES (195, 'https://cdn2.iconfinder.com/data/icons/cutecritters/t9dog1_trans.png', ':anim2:', 3);
INSERT INTO `chatemots` VALUES (196, 'https://cdn3.iconfinder.com/data/icons/iconshock_finding_nemo_free_icons/Win/png/128/findingnemo5.png', ':anim3:', 3);
INSERT INTO `chatemots` VALUES (197, 'https://cdn2.iconfinder.com/data/icons/cutecritters/t9tuqui_trans.png', ':anim4:', 3);
INSERT INTO `chatemots` VALUES (198, 'https://cdn2.iconfinder.com/data/icons/crystalproject/128x128/apps/bug.png', ':anim5:', 3);
INSERT INTO `chatemots` VALUES (199, 'https://cdn4.iconfinder.com/data/icons/free-scuba-diving-icon-set/128/turtle.png', ':anim6:', 3);
INSERT INTO `chatemots` VALUES (200, 'https://cdn4.iconfinder.com/data/icons/Birdies_by_arrioch/png%20128/pidgin.png', ':anim7:', 3);
INSERT INTO `chatemots` VALUES (201, 'https://cdn2.iconfinder.com/data/icons/zoomeyed/frog.png', ':anim8:', 3);
INSERT INTO `chatemots` VALUES (202, 'https://cdn4.iconfinder.com/data/icons/New-Year-icons-png/128x128/bullfinch_2.png', ':anim9:', 3);
INSERT INTO `chatemots` VALUES (203, 'https://cdn2.iconfinder.com/data/icons/cutecritters/t9lion_trans.png', ':anim10:', 3);
INSERT INTO `chatemots` VALUES (204, 'https://cdn0.iconfinder.com/data/icons/rabbits_icons/128/rabbit_animal_pink.png', ':anim11:', 3);
INSERT INTO `chatemots` VALUES (205, 'https://cdn4.iconfinder.com/data/icons/zoomeyed-creatures_2/128/evernote.png', ':anim12:', 3);

-- --------------------------------------------------------

-- 
-- Table structure for table `chatmessages`
-- 

CREATE TABLE `chatmessages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `time` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `storage_a` int(11) NOT NULL,
  `storage_b` int(11) NOT NULL,
  `status` varchar(6) NOT NULL,
  `start` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=564 DEFAULT CHARSET=utf8 AUTO_INCREMENT=564 ;

-- 
-- Dumping data for table `chatmessages`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `friends`
-- 

CREATE TABLE `friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `friend` int(11) NOT NULL,
  `friend_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `friends`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `messages`
-- 

CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `time` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `storage_a` int(11) NOT NULL,
  `storage_b` int(11) NOT NULL,
  `status` varchar(6) NOT NULL,
  `start` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `messages`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `payments`
-- 

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `buzzyuser_id` int(11) NOT NULL,
  `transaction_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_kind` int(11) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `payments`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `display_name` varchar(60) NOT NULL,
  `profile_image` varchar(120) NOT NULL,
  `status` varchar(250) NOT NULL,
  `type_status` varchar(300) NOT NULL DEFAULT 'stopped',
  `last_seen` int(11) NOT NULL,
  `session_status` varchar(7) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=1378 DEFAULT CHARSET=utf8 AUTO_INCREMENT=1378 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` VALUES (344, 'Jonnhy888', 'Jonnhy888', '1426621495superadmin.jpg', '', 'stopped', 1483876511, 'offline');
