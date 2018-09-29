-- phpMyAdmin SQL Dump
-- version 2.8.0.1
-- https://www.phpmyadmin.net
-- 
-- Host: custsql-ipg21.eigbox.net
-- Generation Time: Apr 10, 2017 at 05:41 AM
-- Server version: 5.6.32
-- PHP Version: 4.4.9
-- 
-- Database: `mygoldenmatch`
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

