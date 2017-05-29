-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2017 a las 23:12:09
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lastxanadu`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post`, `comment_owner`, `comment_body`, `comment_date`) VALUES
(2, 15, 3, 'Comment Test', '2017-05-28 16:07:21'),
(3, 15, 3, 'Comment Test', '2017-05-28 16:08:40'),
(4, 19, 4, 'test', '2017-05-29 18:52:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favs`
--

CREATE TABLE `favs` (
  `fav_id` int(11) NOT NULL,
  `fav_owner` int(11) NOT NULL,
  `fav_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`message_id`, `message_sender`, `message_receiver`, `message_body`, `message_date`) VALUES
(1, 4, 4, 'Hey', '2017-05-29 00:30:36'),
(2, 4, 3, 'Can\'t you feel the breakneck speed blast?\r\nBeat my heart bloody fast\r\nFeel like burning in the artificial sun.', '2017-05-29 00:34:28'),
(3, 4, 3, 'Can\'t you feel the breakneck speed blast?\r\nBeat my heart bloody fast\r\nFeel like burning in the artificial sun.', '2017-05-29 00:35:23'),
(4, 4, 2, 'I forgot the password', '2017-05-29 00:38:11'),
(5, 3, 3, 'What now', '2017-05-29 19:17:19');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`post_id`, `post_type`, `post_owner`, `post_title`, `post_description`, `post_tags`, `post_song`, `post_illust`, `post_views`, `post_favourites`, `post_flags`, `post_date`) VALUES
(15, 'Song', 3, 'Arrullo Interestelar', 'Another track. This time I decided to make an arrangement of a PC-98 song that I really like.\r\n\r\nThe name of the song was chosen this time by Mefo since he was one of the first ones to listen to it.\r\n\r\nApart from that, a lot of people told me that this song gave a space-like sensation so I thought that the name was appropriate for it. (Though I can\'t feel that space-like sensation myself)', 'Touhou, PC-98, Casket of Star, Arrangement', 'posts/Ederson/music/0.mp3', 'posts/Ederson/music/16.png', 47, 0, 5, '2017-05-28 16:10:20'),
(17, 'Picture', 5, 'Kaleidoscope', 'A World of Fractals', 'New Generation', '', 'posts/Alexia/illust/17.png', 10, 0, 0, '2017-05-29 01:02:59'),
(19, 'Picture', 4, 'WARNING!', 'A', 'Bigger Tag, Warning, Caution', '', 'posts/Alice/illust/19.png', 27, 0, 0, '2017-05-29 08:10:32'),
(20, 'Song', 3, 'New Furies', 'Nothing really', 'New Song, Pure Furies, Arrangement, Touhou 16', 'posts/Ederson/music/20.mp3', 'posts/Ederson/music/20.png', 5, 0, 0, '2017-05-29 20:18:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_avatar` varchar(255) NOT NULL,
  `user_description` varchar(500) NOT NULL,
  `user_type` enum('Illustrator','Composer') NOT NULL,
  `user_following` text NOT NULL,
  `user_followers` text NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_avatar`, `user_description`, `user_type`, `user_following`, `user_followers`, `user_email`, `user_pass`, `user_isAdmin`) VALUES
(2, 'Lili', 'img/Lili/posts/avatar_Lili.jpg', 'Humble Person', 'Illustrator', '0', '0', 'lili@traumhann.com', '$2y$10$GLN50jJNiKL45XJ32Iovu.SWJNaLRIW9q4T4QUSVtP6PeHoLIyC9m', 0),
(3, 'Ederson', 'img/Ederson/posts/avatar_Ederson.png', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibu', 'Composer', '0', '0,4,5,8', 'ederson@funes.com', '$2y$10$TSLOgB7TBbW9d7uJYgIAJOZibZ7IGRWtx.LDoE1gjTeLOAkCkUGyG', 0),
(4, 'Alice', 'img/Alice/posts/avatar_Alice.png', 'One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections. \r\nThe bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. ', 'Illustrator', '0,3,5,8', '0,5,8', 'alice@coeurvert.com', '$2y$10$v/wXZ7z0mzDwAF9l8Zu3veewJR917/4a1217/.RzPHKRlRqAMsTxK', 0),
(5, 'Alexia', 'posts//avatar_Alexia.png', 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox.\r\nBright vixens jump; dozy fowl quack. Quick wafting zephyrs vex bold Jim. Quick zephyrs blow, vexing daft Jim. Sex-charged fop blew my junk TV quiz. How quickly daft jumping zebras vex. Two driven jocks help fax my big quiz.', 'Illustrator', '0,4,3', '0,4', 'alexia@shyrose.com', '$2y$10$NeerkMIV263Suo3K0eoZ6ealQNvJ5XsOJJtosoxqawlkLgq9XBou2', 0),
(6, 'Adity', 'posts//avatar_Adity.png', 'Busy person', 'Illustrator', '0', '0', 'adity@leid.com', '$2y$10$nDaWYhxp8eY6nKQ6OArG9O8ctKY.CK1qCU9EVXukTRqB2rc3hpjvS', 0),
(7, 'Nila', 'posts/Nila/avatar_Nila.png', 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine.', 'Illustrator', '0', '0', 'nila@fortune.com', '$2y$10$xmy2maB/7.iE8ds7Ew0cl.fOVhSTgSZosafUqipLkuAJXfoidz8y6', 0),
(8, 'Mark', 'posts/Mark/avatar_Mark.png', 'MArk', 'Composer', '0,3,4', '0,4', 'mark@narcisso.com', '$2y$10$aMROLOa3XjjUu4D0jOP69uECyuABd.4AzJ7sd15awDCwn0I.4XKbe', 1);

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
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`comment_owner`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`comment_post`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `favs`
--
ALTER TABLE `favs`
  ADD CONSTRAINT `favs_ibfk_1` FOREIGN KEY (`fav_owner`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favs_ibfk_2` FOREIGN KEY (`fav_post`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`message_sender`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`message_receiver`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_owner`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
