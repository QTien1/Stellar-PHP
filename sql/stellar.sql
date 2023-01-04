-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 23, 2022 at 09:15 AM
-- Server version: 5.7.11
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stellar`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `username` varchar(25) NOT NULL,
  `game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `base_price` float NOT NULL,
  `curr_price` float NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `sale` tinyint(1) DEFAULT NULL,
  `popular` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `title`, `base_price`, `curr_price`, `description`, `sale`, `popular`) VALUES
(1, 'Ib', 12.99, 12.99, 'A 2D exploration adventure game set in a creepy, mysterious art gallery.', 0, 0),
(2, 'Mad Father', 9.99, 6.99, 'Witness the tale of a most foolish family. A remake of the classic horror exploration game makes its way to Steam.', 0, 0),
(3, 'Red Dead Redemption 2', 44.99, 31.49, 'Winner of over 175 Game of the Year Awards and recipient of over 250 perfect scores, RDR2 is the epic tale of outlaw Arthur Morgan and the infamous Van der Linde gang, on the run across America at the dawn of the modern age. Also includes access to the shared living world of Red Dead Online.', 1, 0),
(4, 'Among Us', 9.99, 7.99, 'An online and local party game of teamwork and betrayal for 4-15 players...in space!', 1, 0),
(5, 'Phasmophobia', 13.99, 1.39, 'Phasmophobia is a 4 player online co-op psychological horror. Paranormal activity is on the rise and it’s up to you and your team to use all the ghost hunting equipment at your disposal in order to gather as much evidence as you can.', 1, 0),
(6, 'Elden Ring', 34.99, 17.49, 'THE NEW FANTASY ACTION RPG. Rise, Tarnished, and be guided by grace to brandish the power of the Elden Ring and become an Elden Lord in the Lands Between.', 1, 0),
(7, 'Sea of Thieves', 39.99, 23.99, 'Sea of Thieves offers the essential pirate experience, from sailing and fighting to exploring and looting – everything you need to live the pirate life and become a legend in your own right. With no set roles, you have complete freedom to approach the world, and other players, however you choose.', 1, 0),
(8, 'Grand Theft Auto 5', 14.99, 14.99, 'Grand Theft Auto V for PC offers players the option to explore the award-winning world of Los Santos and Blaine County in resolutions of up to 4k and beyond, as well as the chance to experience the game running at 60 frames per second.', 0, 1),
(9, 'Watch Dogs 2', 29.99, 29.99, 'Welcome to San Francisco. Play as Marcus, a brilliant young hacker, and join the most notorious hacker group, DedSec. Your objective: execute the biggest hack of history.', 0, 0),
(10, 'Counter-Strike: Global Offensive', 0, 0, 'Counter-Strike: Global Offensive (CS: GO) expands upon the team-based action gameplay that it pioneered when it was launched 19 years ago. CS: GO features new maps, characters, weapons, and game modes, and delivers updated versions of the classic CS content (de_dust2, etc.).', 0, 1),
(11, 'Apex Legends', 0, 0, 'Apex Legends is the award-winning, free-to-play Hero Shooter from Respawn Entertainment. Master an ever-growing roster of legendary characters with powerful abilities, and experience strategic squad play and innovative gameplay in the next evolution of Hero Shooter and Battle Royale.', 0, 1),
(12, 'God Of War', 44.99, 44.99, 'His vengeance against the Gods of Olympus years behind him, Kratos now lives as a man in the realm of Norse Gods and monsters. It is in this harsh, unforgiving world that he must fight to survive… and teach his son to do the same.', 0, 0),
(13, 'Scribble It!', 0, 0, 'Adrenaline fueled, fast paced drawing action. Draw fast, guess faster and win it all! THOUSANDS of official words in 17 different languages. 4 multiplayer game modes with up to 16 players and a singleplayer mode. We take you back to the heated pictionary games everyone had in school!', 0, 0),
(14, 'Brawhalla', 0, 0, 'An epic platform fighter for up to 8 players online or local. Try casual free-for-alls, ranked matches, or invite friends to a private room. And it\'s free! Play cross-platform with millions of players on PlayStation, Xbox, Nintendo Switch, iOS, Android & Steam! Frequent updates. Over fifty Legends.', 0, 0),
(15, 'Left 4 Dead 2', 9.99, 9.99, 'Set in the zombie apocalypse, Left 4 Dead 2 (L4D2) is the highly anticipated sequel to the award-winning Left 4 Dead, the #1 co-op game of 2008. This co-operative action horror FPS takes you and your friends through the cities, swamps and cemeteries of the Deep South, from Savannah to New Orleans across five expansive campaigns.', 0, 0),
(16, 'GTFO', 29.99, 29.99, 'GTFO is an extreme cooperative horror shooter that throws you from gripping suspense to explosive action in a heartbeat. Stealth, strategy, and teamwork are necessary to survive in your deadly, underground prison. Work together or die together.', 0, 0),
(17, 'PUBG: BATTLEGROUNDS', 0, 0, 'Play PUBG: BATTLEGROUNDS for free. Land on strategic locations, loot weapons and supplies, and survive to become the last team standing across various, diverse Battlegrounds. Squad up and join the Battlegrounds for the original Battle Royale experience that only PUBG: BATTLEGROUNDS can offer.', 0, 1),
(18, 'Poppy Playtime', 9.99, 9.99, 'You must stay alive in this horror/puzzle adventure. Try to survive the vengeful toys waiting for you in the abandoned toy factory. Use your GrabPack to hack electrical circuits or nab anything from afar. Explore the mysterious facility... and don\'t get caught.', 0, 0),
(19, 'Rivals of Aether', 29.99, 29.99, 'RIVALS OF AETHER is an indie fighting game where warring civilizations summon the power of Fire, Water, Air, and Earth. Play with up to four players either locally or online.', 0, 0),
(20, 'Crab Game', 0, 0, 'Crab Game is a First-Person Multiplayer game where you play through several different minigames based on children\'s games, until only one player stands victorious.', 0, 0),
(21, 'Terraria', 9.99, 9.99, 'Dig, fight, explore, build! Nothing is impossible in this action-packed adventure game. Four Pack also available!', 0, 0),
(22, 'Doki Doki Literature Club', 0, 0, 'The Literature Club is full of cute girls! Will you write the way into their heart? This game is not suitable for children or those who are easily disturbed.', 0, 0),
(23, 'Battlefield V', 49.99, 49.99, 'This is the ultimate Battlefield V experience. Enter mankind’s greatest conflict with the complete arsenal of weapons, vehicles, and gadgets plus the best customization content of Year 1 and 2.', 0, 0),
(24, 'Stardew Valley', 14.99, 14.99, 'You\'ve inherited your grandfather\'s old farm plot in Stardew Valley. Armed with hand-me-down tools and a few coins, you set out to begin your new life. Can you learn to live off the land and turn these overgrown fields into a thriving home?', 0, 0),
(25, 'Raft', 19.99, 19.99, 'Raft throws you and your friends into an epic oceanic adventure! Alone or together, players battle to survive a perilous voyage across a vast sea! Gather debris, scavenge reefs and build your own floating home, but be wary of the man-eating sharks!', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(25) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`username`,`game_id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
