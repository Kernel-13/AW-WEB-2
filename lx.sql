-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2017 a las 20:25:21
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lx`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_post` int(11) NOT NULL,
  `comment_owner` int(11) NOT NULL,
  `comment_body` text NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favs`
--

CREATE TABLE `favs` (
  `fav_id` int(11) NOT NULL,
  `fav_owner` int(11) NOT NULL,
  `fav_post` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `message_sender` int(11) NOT NULL,
  `message_receiver` int(11) NOT NULL,
  `message_body` text NOT NULL,
  `message_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
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
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`post_id`, `post_type`, `post_owner`, `post_title`, `post_description`, `post_tags`, `post_song`, `post_illust`, `post_views`, `post_favourites`, `post_flags`, `post_date`) VALUES
(18, 'Picture', 9, 'Inspiration', 'It took me about 2 months to finish Don Quixote and i would gladly read it over again. I have the Penguin Classics version and its almost 1,100 pages long. This is honestly the greatest book I think anyone could ever read.\r\nIt has taught me to be more virtuous and to help people no matter how difficult the task is. In a way i guess i would say it made me take on some of Don Quixote\'s characteristics.', 'Abstract, Colorful', '', 'posts/Lili/illust/1.png', 16, 0, 0, '2017-05-29 08:35:24'),
(19, 'Picture', 10, 'Q', 'I believe there is a hidden message in Don Quixote. The key for decoding it can be found in the full title of the book - El ingenioso hidalgo don Quijote de la Mancha. La Mancha is a central region in Spain, but it’s almost identical to French “La Manche” – the English Channel. \r\nIt suggests that we should apply English language for deciphering the meaning of the names used in the book.', 'Abstract', '', 'posts/Alice/illust/19.png', 1, 0, 0, '2017-05-29 08:39:19'),
(20, 'Song', 13, 'Arrullo Interestelar', 'Another track. This time I decided to make an arrangement of a PC-98 song that I really like.\r\nThe name of the song was chosen this time by Mefo since he was one of the first ones to listen to it.\r\n\r\nApart from that, a lot of people told me that this song gave a space-like sensation so I thought that the name was appropriate for it. (Though I can\'t feel that space-like sensation myself)', 'Touhou, PC-98', 'posts/Lazaro/music/20.mp3', 'posts/Lazaro/music/20.png', 32, 0, 0, '2017-05-29 08:42:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_avatar` varchar(255) NOT NULL,
  `user_description` varchar(500) NOT NULL,
  `user_type` enum('Illustrator','Composer','Admin') NOT NULL,
  `user_following` text NOT NULL,
  `user_followers` text NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_favourites` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_avatar`, `user_description`, `user_type`, `user_following`, `user_followers`, `user_email`, `user_pass`, `user_favourites`) VALUES
(8, 'Ederson', 'posts/Ederson/avatar_Ederson.png', 'Red Blood. \r\nI (used to) make touhou arrangements.\r\nSteam: /id/kernel_13. \r\nNice to see you here.', 'Admin', '0', '0,13', 'ederson@funes.com', '$2y$10$N9IrDZaHQfDtb.2jiTAkVOrzi8KUc1.7QwH1CN7EcVtTLsWzJHaZy', '0,20,18'),
(9, 'Lili', 'posts/Lili/avatar_Lili.png', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', 'Illustrator', '0,13', '0,11,13', 'lili@traumhann.com', '$2y$10$8ypVKz1nrNDU9v4T.2g./uzSKC994RP6myc8DAfcaIlX5njCwv112', '0'),
(10, 'Alice', 'posts/Alice/avatar_Alice.png', 'One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections. The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked.', 'Illustrator', '0,13', '0,11', 'alice@coeurvert.com', '$2y$10$/NF5hdOT.WSc7pbOWGbThuAOlluLdPmvUXtfUWhP0GZQtaFPOtgEu', '0'),
(11, 'Alexia', 'posts/Alexia/avatar_Alexia.png', 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack. Quick wafting zephyrs vex bold Jim. Quick zephyrs blow, vexing daft Jim. Sex-charged fop blew my junk TV quiz. How quickly daft jumping zebras vex. Two driven jocks help fax my big quiz.', 'Illustrator', '0,10,9,13', '0', 'alexia@shyrose.com', '$2y$10$xb0g674SflyX4IZiJbjJbeDxPxTUiNXSIGNEq/9Yjq2hzOjPXRyky', '0'),
(12, 'Mark', 'posts/Mark/avatar_Mark.png', 'Mark has inspired many artists in different fields. It is considered mainly to be a comedy. However, woven into the tale is a lot of Spain\'s history. Don Quixote\'s name even penned a type of psychosis. In fact, anyone who has had experience with the mentally ill may find it difficult to regard Mark as a comedy. After all, he was not totally harmless.', 'Composer', '0', '0', 'mark@narcisso.com', '$2y$10$IGmS7RwxYpT2LSathEXX.OWziX/U46nCSZjN5fJz7kv8M2A3NUY1K', '0'),
(13, 'Lazaro', 'posts/Lazaro/avatar_Lazaro.png', 'I am reading The Well-Educated Mind: A Guide to the Classical Education You Never Had by Susan Wise Bauer. Bauer suggests beginning with novels, as they are the most accessible of the Great Books. Within each genre, she advises readers to work from the past toward the present in chronological order. \r\nSo, I am beginning with the first novel: Don Quixote. I came to this forum hoping that there might be someone else willing to embark on this journey with me.', 'Composer', '0,8,9', '0,9,11,10', 'lazaro@kernel.com', '$2y$10$0pZYpo0SBdRDOJeg/05y7ezEPF7PV2ceWBEOKaAsGaD1m71kz9ZCe', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `emisor` (`comment_post`),
  ADD KEY `receptor` (`comment_owner`);

--
-- Indices de la tabla `favs`
--
ALTER TABLE `favs`
  ADD PRIMARY KEY (`fav_id`),
  ADD KEY `fav_owner` (`fav_owner`),
  ADD KEY `fav_post` (`fav_post`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `emisor` (`message_sender`),
  ADD KEY `receptor` (`message_receiver`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `emisor` (`post_owner`),
  ADD KEY `receptor` (`post_title`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `favs`
--
ALTER TABLE `favs`
  MODIFY `fav_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
