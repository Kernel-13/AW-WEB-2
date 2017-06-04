
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 04, 2017 at 09:49 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u970602151_lx`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_post` int(11) NOT NULL,
  `comment_owner` int(11) NOT NULL,
  `comment_body` text NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`),
  KEY `emisor` (`comment_post`),
  KEY `receptor` (`comment_owner`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `favs`
--

CREATE TABLE IF NOT EXISTS `favs` (
  `fav_id` int(11) NOT NULL AUTO_INCREMENT,
  `fav_owner` int(11) NOT NULL,
  `fav_post` int(11) NOT NULL,
  PRIMARY KEY (`fav_id`),
  KEY `fav_owner` (`fav_owner`),
  KEY `fav_post` (`fav_post`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_sender` int(11) NOT NULL,
  `message_receiver` int(11) NOT NULL,
  `message_body` text NOT NULL,
  `message_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`message_id`),
  KEY `emisor` (`message_sender`),
  KEY `receptor` (`message_receiver`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=37 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `message_sender`, `message_receiver`, `message_body`, `message_date`) VALUES
(5, 12, 12, '&quot;Yes, that''s where I was. A man did not notice at first when only a few of these germs got into his body. But each germ broke in half and became two germs, and they kept doing this very rapidly so that in a short time there were many millions of them in the body. Then the man was sick. He had a disease, and the disease was named after the kind of a germ that was in him.', '2017-05-31 00:36:29'),
(6, 12, 8, 'Is it not curious, that so vast a being as the whale should see the world through so small an eye, and hear the thunder through an ear which is smaller than a hare''s? But if his eyes were broad as the lens of Herschel''s great telescope; and his ears capacious as the porches of cathedrals; would that make him any longer of sight, or sharper of hearing? Not at all.—Why then do you try to &quot;enlarge&quot; your mind? Subtilize it.', '2017-05-31 00:36:55'),
(7, 10, 8, 'OK', '2017-05-31 09:33:59'),
(8, 13, 10, 'When I discovered your other pictures a while ago, I thought you wouldn''t upload any anymore, but followed you anyway to have a quick way to see them again. I''m very glad that you decided to upload again.﻿', '2017-06-03 15:02:11'),
(9, 10, 14, 'Mystery of mysteries, without life,\r\nSymbols and aspirations collect together\r\nIf granted form and color,\r\nWould its heart be wound by azure and crimson', '2017-06-04 08:58:01'),
(10, 10, 13, 'Infinite infinity, where am I?\r\nIn a momentary instant, though I shut my eyes,\r\nThose lost words I once believed in,\r\nCast off beyond the void, fade away', '2017-06-04 08:58:15'),
(11, 10, 12, 'My doll, see the revolving world within your pupils,\r\nMy despair mirrored, in those two ellipses', '2017-06-04 08:58:36'),
(12, 10, 11, 'Fate is fate; unresistable\r\nThe meetings and partings, endlessly repeat\r\nIf I struggle on to the end of time,\r\nWill reality sink into darkness at that point', '2017-06-04 08:58:51'),
(13, 10, 9, 'Painful, aching tears flow,\r\nThe moment after our bodies touched,\r\nI felt a trembling trepidation, for the memory\r\nIn the stream of eternity, flowed and faded away', '2017-06-04 08:59:00'),
(14, 10, 8, '&quot;I am a doll...\r\nA perfect doll...\r\nMy heart is my own to do with as I please...\r\nSo, I won''t heed it...\r\nNo matter what she says,\r\nAbsolutely, I won''t heed it...\r\nAbsolutely, I want to ignore it...&quot;', '2017-06-04 08:59:17'),
(15, 9, 14, 'A gorgeous light shines upon the kaleidoscope, and it floats.\r\nAah, that’s right. This place is – hmm… I wonder… Paradise on Earth.', '2017-06-04 09:09:16'),
(16, 9, 12, 'Now, come here! Come here… Someone’s calls reverberated through the air.\r\nTonight, too, a fun feast shall begin. Aah…', '2017-06-04 09:09:40'),
(17, 9, 13, 'Today, I shall present a pantomime of wild beasts to you – \r\nAn extraordinarily bizarre, mysterious show.', '2017-06-04 09:09:51'),
(18, 9, 11, 'The hands pass 12, but there’s no sign that the curtains will fall yet.\r\nWhat’s this? What?! It’s a midsummer night’s dream.', '2017-06-04 09:10:08'),
(19, 9, 10, 'When the foolish clown laughs, someone else somewhere laughs.\r\nBefore I knew it, my name was called, and I was risen to the stage…', '2017-06-04 09:10:17'),
(20, 9, 8, 'Aah… The water’s surface sparkles, and the dolls dance in ecstasy.\r\nYes, the night circus will wash it all away, including your soul, tonight.\r\nThe night is long. It will continue forever…', '2017-06-04 09:11:26'),
(21, 8, 10, 'No I just don’t remember how long it has been\r\nSo I start counting over my worries and the nightmares\r\nAnd I’ve become a walking misfortune before I know\r\nAll the good and all the bad\r\nEverything is all in one place', '2017-06-04 09:17:39'),
(22, 8, 11, 'Let me see the smile on your face\r\nNever can look away\r\nLet me be the one to save you\r\nEvery time you are wasted\r\nLet me see the smile on your face\r\nNever can look away\r\nI know happiness just sparks\r\nI will be looking for more the next thing I know', '2017-06-04 09:17:50'),
(23, 8, 9, 'Stay close to my heart but just stay away from me\r\nCan’t touch you\r\nCan’t feel you\r\nBut I’m always looking after you\r\nStay close in silence but just stay away from me\r\nI see you\r\nI avoid you\r\nFrom a distance I know you are alright', '2017-06-04 09:18:00'),
(24, 8, 12, 'You know, the key is forgiveness\r\nAnd another is acceptance\r\nIf you keep that in mind\r\nNo one can ever hurt you\r\nTo me (you’re) already perfect\r\nAlready who you are\r\nJust too bad you don’t realize\r\nEverything goes to the right place', '2017-06-04 09:18:28'),
(25, 8, 13, 'Let me lead you through the darkness\r\nWhen you are al alone\r\nLet me save you from the sadness\r\nWhen you feel so wasted\r\nLet me lead you through the darkness\r\nWhen you are all alone\r\nAnd when all the stars are gone\r\nI want to light up the sky so you’ll find your way', '2017-06-04 09:18:55'),
(26, 8, 14, 'Stay close in silence but just stay away from me\r\nI see you\r\nI avoid you\r\nFrom a distance I know you are safe and sound', '2017-06-04 09:19:30'),
(27, 12, 8, 'Just give it up\r\n’cause we’re playin’ tonight\r\nThe sky fill with the starlight is a dance floor', '2017-06-04 09:24:38'),
(28, 12, 10, 'We are drowning in music all night long\r\nI don’t care if I don’t see you again', '2017-06-04 09:25:00'),
(29, 12, 9, 'Over and over and over again\r\nI just can’t let your eyes look away', '2017-06-04 09:25:22'),
(30, 12, 13, 'Gonna taste the night\r\nSee you dance in the starlight', '2017-06-04 09:25:53'),
(31, 14, 11, 'Playing hide-and-seek with the night\r\nI’m chasing my desire\r\nLetting go of my body and heart', '2017-06-04 09:27:32'),
(32, 14, 12, 'Ever since you saw me in your life\r\nCan’t take your eyes off of me\r\nGive you the moment you’d remember for as long as you live', '2017-06-04 09:28:04'),
(33, 14, 11, 'For tonight forget what you want\r\nTell me what you really are\r\nRight now the moon is rising', '2017-06-04 09:28:24'),
(34, 11, 14, 'In the night\r\nChasing the night\r\nAnd we are here just wide awake\r\nIn the night\r\nDancing all night\r\nI’m gonna take you far away', '2017-06-04 09:29:27'),
(35, 11, 8, 'What you know is a part of me\r\nWhat you love’s only half of me', '2017-06-04 09:30:31'),
(36, 11, 10, 'I’m dancing in the night\r\nI can’t stop the night', '2017-06-04 09:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_type` enum('Song','Picture') NOT NULL,
  `post_owner` int(11) NOT NULL,
  `post_title` varchar(40) NOT NULL,
  `post_description` varchar(500) NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_song` varchar(255) NOT NULL,
  `post_illust` varchar(255) NOT NULL,
  `post_views` int(11) NOT NULL,
  `post_favourites` int(11) NOT NULL,
  `post_flags` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`),
  KEY `emisor` (`post_owner`),
  KEY `receptor` (`post_title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_type`, `post_owner`, `post_title`, `post_description`, `post_tags`, `post_song`, `post_illust`, `post_views`, `post_favourites`, `post_flags`, `post_date`) VALUES
(18, 'Picture', 9, 'Inspiration', 'It took me about 2 months to finish Don Quixote and i would gladly read it over again. I have the Penguin Classics version and its almost 1,100 pages long. This is honestly the greatest book I think anyone could ever read.\r\nIt has taught me to be more virtuous and to help people no matter how difficult the task is. In a way i guess i would say it made me take on some of Don Quixote''s characteristics.', 'Abstract, Colorful', '', 'posts/Lili/illust/1.png', 4, 0, 0, '2017-05-29 08:35:24'),
(19, 'Picture', 10, 'QQQ', 'I believe there is a hidden message in Don Quixote. The key for decoding it can be found in the full title of the book - El ingenioso hidalgo don Quijote de la Mancha. La Mancha is a central region in Spain, but it’s almost identical to French “La Manche” – the English Channel. \r\nIt suggests that we should apply English language for deciphering the meaning of the names used in the book.', 'Abstract', '', 'posts/Alice/illust/19.png', 6, 0, 0, '2017-05-29 08:39:19'),
(20, 'Song', 13, 'Arrullo Interestelar', 'Another track. This time I decided to make an arrangement of a PC-98 song that I really like.\r\nThe name of the song was chosen this time by Mefo since he was one of the first ones to listen to it.\r\n\r\nApart from that, a lot of people told me that this song gave a space-like sensation so I thought that the name was appropriate for it. (Though I can''t feel that space-like sensation myself)', 'Touhou, PC-98', 'posts/Lazaro/music/20.mp3', 'posts/Lazaro/music/20.png', 16, 1, 0, '2017-05-29 08:42:21'),
(21, 'Song', 14, 'Centennial Guitar', 'Since I really love the original, and found a really good VST to make the guitar sounds a bit more realistic,\r\n\r\nI did this song some weeks ago, but never found time or motivation to continue with it, so I moved into other songs.\r\n\r\nBut since this is the last night of 2014, I decided to add some things, erase some others and modify more stuff in order to post this song.', 'Touhou, Scarlet, Acoustic, Guitar', 'posts/Alton/music/21.mp3', 'posts/Alton/music/21.png', 2, 0, 0, '2017-05-30 23:39:25'),
(22, 'Song', 14, 'U.N.known Effects', 'Since mefo was so kind drawing a lot of touhous this week (an almost everytime someone request it), and I love the Flan pic he did for me, I was inspired to do a arrangement of her theme.\r\n\r\nI hope you like it.', 'Electronic, Touhou', 'posts/Alton/music/22.mp3', 'posts/Alton/music/22.png', 8, 0, 0, '2017-05-30 23:48:08'),
(23, 'Song', 14, 'Till the Moment I Die', '''It all came different!'' the Mock Turtle repeated thoughtfully. ''I should like to hear her try and repeat something now. \r\n\r\nTell her to begin.''\r\n\r\n He looked at the Gryphon as if he thought it had some kind of authority over Alice.', 'Sariel, PC-98', 'posts/Alton/music/23.mp3', 'posts/Alton/music/23.png', 2, 0, 0, '2017-05-30 23:53:24'),
(24, 'Song', 14, 'Remote Dream', 'I tried to do an arrangement of Last Remote, but it ended like this. I''m still working on it, so I may upload something in some days.\r\n\r\nOriginal: Last Remote\r\nSource: Touhou 11 - Subterranean Animism', 'Touhou, Last Remote, Subterranean Animism', 'posts/Alton/music/24.mp3', 'posts/Alton/music/24.png', 4, 0, 0, '2017-05-30 23:55:26'),
(31, 'Picture', 10, 'Entity', 'At this instant, while Daggoo, on the summit of the head, was clearing the whip—which had somehow got foul of the great cutting tackles—a sharp cracking noise was heard; and to the unspeakable horror of all, one of the two enormous hooks suspending the head tore out, and with a vast vibration the enormous mass sideways swung, till the drunk ship reeled and shook as if smitten by an iceberg.', 'Red, White, Shapes', '', 'posts/Alice/illust/31.png', 1, 0, 0, '2017-06-04 09:37:22'),
(26, 'Picture', 10, 'Nightmare', 'Ten days after leaving the three Ptor brothers I arrived at Zodanga. From the moment that I had come in contact with the red inhabitants of Mars I had noticed that Woola drew a great amount of unwelcome attention to me, since the huge brute belonged to a species which is never domesticated by the red men. \r\n\r\nWere one to stroll down Broadway with a Numidian lion at his heels the effect would be somewhat similar to that which I should have produced had I entered Zodanga with Woola.', 'Pastel Colors, Pink, Shapes', '', 'posts/Alice/illust/26.png', 6, 0, 0, '2017-05-31 00:01:16'),
(27, 'Picture', 10, 'Space', 'When we had finished eating we went softly upstairs to my study, and I looked again out of the open window. In one night the valley had become a valley of ashes. \r\n\r\nThe fires had dwindled now. Where flames had been there were now streamers of smoke; but the countless ruins of shattered and gutted houses and blasted and blackened trees that the night had hidden stood out now gaunt and terrible in the pitiless light of dawn.', 'Empty, Void, Abstract', '', 'posts/Alice/illust/27.png', 2, 0, 0, '2017-05-31 00:03:48'),
(28, 'Picture', 10, 'Blue Breakdown', 'When we had finished eating we went softly upstairs to my study, and I looked again out of the open window. In one night the valley had become a valley of ashes. \r\n\r\nThe fires had dwindled now. Where flames had been there were now streamers of smoke; but the countless ruins of shattered and gutted houses and blasted and blackened trees that the night had hidden stood out now gaunt and terrible in the pitiless light of dawn.', 'Shapes, Blue, Symmetry', '', 'posts/Alice/illust/28.png', 2, 0, 0, '2017-05-31 00:05:34'),
(29, 'Song', 13, 'Electronic Beat', 'Original: Primordial Beat - Pristine Beat\r\nSource: Touhou 14 - Double Dealing Character', 'Primordial Beat, Pristine Beat, Double Dealing Character', 'posts/Lazaro/music/29.mp3', 'posts/Lazaro/music/29.png', 2, 0, 0, '2017-05-31 00:10:33'),
(30, 'Song', 13, 'Das Phantom Vom Schiffbruch', 'It''s been some time since the last song I uploaded here, but I managed to get some time to do a new one.\r\nThis time I decided to do an arrangement of Captain Murasa, Murasa''s Theme on Undefined Fantastic Object.\r\n\r\nSpecial thanks to Mefo, who always let me use his drawings for my songs.\r\n\r\nOriginal Song: Captain Murasa\r\nGame: Touhou 12 - Undefined Fantastic Object', 'Captain Murasa, Undefined Fantastic Object, Touhou', 'posts/Lazaro/music/30.mp3', 'posts/Lazaro/music/30.png', 3, 0, 0, '2017-05-31 00:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `user_avatar` varchar(255) NOT NULL,
  `user_description` varchar(500) NOT NULL,
  `user_type` enum('Illustrator','Composer','Admin') NOT NULL,
  `user_following` text NOT NULL,
  `user_followers` text NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_favourites` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_avatar`, `user_description`, `user_type`, `user_following`, `user_followers`, `user_email`, `user_pass`, `user_favourites`) VALUES
(8, 'Ederson', 'posts/Ederson/avatar_Ederson.png', 'Red Blood. \r\nI (used to) make touhou arrangements.\r\nSteam: /id/kernel_13. \r\nNice to see you here.', 'Admin', '0', '0,13', 'ederson@funes.com', '$2y$10$N9IrDZaHQfDtb.2jiTAkVOrzi8KUc1.7QwH1CN7EcVtTLsWzJHaZy', '0'),
(9, 'Lili', 'posts/Lili/avatar_Lili.png', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 'Illustrator', '0', '0,11,13', 'lili@traumhann.com', '$2y$10$8ypVKz1nrNDU9v4T.2g./uzSKC994RP6myc8DAfcaIlX5njCwv112', '0'),
(10, 'Alice', 'posts/Alice/avatar_Alice.png', 'One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections. The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked.', 'Illustrator', '0,13,14', '0,11,14,13', 'alice@coeurvert.com', '$2y$10$/NF5hdOT.WSc7pbOWGbThuAOlluLdPmvUXtfUWhP0GZQtaFPOtgEu', '0,20'),
(11, 'Alexia', 'posts/Alexia/avatar_Alexia.png', 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack. Quick wafting zephyrs vex bold Jim. Quick zephyrs blow, vexing daft Jim. Sex-charged fop blew my junk TV quiz. How quickly daft jumping zebras vex. Two driven jocks help fax my big quiz.', 'Illustrator', '0,10,9,13', '0,14', 'alexia@shyrose.com', '$2y$10$xb0g674SflyX4IZiJbjJbeDxPxTUiNXSIGNEq/9Yjq2hzOjPXRyky', '0'),
(12, 'Mark', 'posts/Mark/avatar_Mark.png', 'Mark has inspired many artists in different fields. It is considered mainly to be a comedy. However, woven into the tale is a lot of Spain''s history. Don Quixote''s name even penned a type of psychosis. In fact, anyone who has had experience with the mentally ill may find it difficult to regard Mark as a comedy. After all, he was not totally harmless.', 'Composer', '0', '0,14', 'mark@narcisso.com', '$2y$10$IGmS7RwxYpT2LSathEXX.OWziX/U46nCSZjN5fJz7kv8M2A3NUY1K', '0'),
(13, 'Lazaro', 'posts/Lazaro/avatar_Lazaro.png', 'I am reading The Well-Educated Mind: A Guide to the Classical Education You Never Had by Susan Wise Bauer. Bauer suggests beginning with novels, as they are the most accessible of the Great Books. Within each genre, she advises readers to work from the past toward the present in chronological order. \r\nSo, I am beginning with the first novel: Don Quixote. I came to this forum hoping that there might be someone else willing to embark on this journey with me.', 'Composer', '0,8,9,14,10', '0,9,11,10,14', 'lazaro@kernel.com', '$2y$10$0pZYpo0SBdRDOJeg/05y7ezEPF7PV2ceWBEOKaAsGaD1m71kz9ZCe', '0'),
(14, 'Alton', 'posts/Alton/avatar_Alton.png', 'Most of the spectators had gathered in one or two groups--one a little crowd towards Woking, the other a knot of people in the direction of Chobham. Evidently they shared my mental conflict. \r\nThere were few near me. One man I approached--he was, I perceived, a neighbour of mine, though I did not know his name--and accosted. But it was scarcely a time for articulate conversation.', 'Composer', '0,12,13,11,10', '0,10,13', 'alton@lekis.com', '$2y$10$5NvQv9OSnHUX.vJ5x5vTqOyv4ujChUMWQDLVJi35PNbdp4f0BLIaS', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
