-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Apr 11, 2023 at 12:34 PM
-- Server version: 10.9.4-MariaDB-1:10.9.4+maria~ubu2204
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `festival`
--

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `song` varchar(400) DEFAULT NULL,
  `top_song` varchar(100) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id`, `name`, `description`, `song`, `top_song`, `Type`) VALUES
(1, 'Gumbo Kings', 'These youthful artists\' interpretation of their favorite Soul & Rhythm \'n Blues is contemporary and distinctive. The Gumbo Kings live show takes place in a posh nightclub where the fun is gradually heated up to a fever pitch. They are pure romantics, these guys. Just beware of the sharp teeth.', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/444317886&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true', 'none', 'jazz'),
(2, 'Evolve', 'The band pays tribute to a group of legendary performers who defined an era of timeless music that serves as the perfect backdrop to any special occasion. They may provide a great retro ambiance to any special gathering. They could be seen at the Haarlem Festival. What are you waiting buy a ticket...', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/444317886&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true', 'none', 'jazz'),
(3, 'Ntjam Rosie', 'Rosie Boei, also known as Ntjam Rosie, is a Dutch-Cameroonian singer and songwriter from Rotterdam, The Netherlands. She was born on March 18, 1983, in Sonkoe, Cameroon. Her music is a fusion of pop, jazz, and soul. At the age of nine, she went to the Netherlands, where she grew up in Maastricht.', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/444317886&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true', 'Thinkin\' about you', 'jazz'),
(4, 'Wicked Jazz Sounds', 'Since then, the name Wicked Jazz Sounds has become well-known in the Amsterdam music community. The goal of Wicked Jazz Sounds is to jam to a variety of musical styles, including jazz, hip hop, soul, funk, broken beat, house, drum & bass, and more.', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/444317886&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true', 'none', 'jazz'),
(5, 'Tom Thomsom Assemble', 'These youthful artists\' interpretation of their favorite Soul & Rhythm \'n Blues is contemporary and distinctive. The Gumbo Kings live show takes place in a posh nightclub where the fun is gradually heated up to a fever pitch. They are pure romantics, these guys. Just beware of the sharp teeth.', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/444317886&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true', 'none', 'jazz'),
(6, 'Jonna Frazer', 'Jonathan Jeffrey Grando is a Dutch rapper and musician of Surinamese ancestry, goes by the stage name Jonna Fraser. Since he began making hip-hop music when he was 12 years old, it has served as his outlet. Jonna always has a positive attitude and uses his lyrics to create a happy mood.', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/444317886&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true', 'Vakantie', 'jazz'),
(7, 'Fox & The Mayors', 'Mayor Fox is the mayor of Busytown and a fox. He also wears a monacle, a top hat, and an office ribbon. Richard Scarry\'s What Do People Do All Day, The Busy World of Richard Scarry, and Richard Scarry\'s Busytown all feature him. Len Carlson provides his voice.', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/444317886&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true', 'none', 'jazz'),
(8, 'Uncle Sue', 'Uncle Sue is a Haarlem-based seven-piece Funk and Soul Band with its own story, soul diva, and swinging wind section.\nStubborn repertoire from our own studio, as well as some lesser-known gems from our musical heroes. A vintage sound from the 1960s and 1970s.', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/444317886&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true', 'none', 'jazz'),
(9, 'Chris Allen', 'Chris Allen was born Kristopher Neil Allen on June 21, 1985 in Jacksonville, Arkansas, USA. He is best known as the eighth season winner of American Idol. He released the album Brand New Shoes in 2007. Since September 26, 2008, he has been married to Katy Allen.', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/444317886&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true', 'none', 'jazz'),
(10, 'Myles Sanko', 'Myles Sanko, dubbed \"the lovechild of soul music,\" began his musical career in nightclubs, singing and rapping alongside disc jockeys. He has fronted popular bands such as Bijoumiyo, as well as working with funk kings Speedometer, who were touring with James Brown\'s soul sister Ms Martha High, who is 35 years his senior.', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/444317886&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true', 'none', 'jazz'),
(11, 'Ruis Soundsystem', 'Ruis Soundsystem was at Haarlem Jazz & More 2018. Mai multe 46 the nume, artists, DJs, acts and bands that were at Haarlem Jazz & More 2018.', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/444317886&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true', 'none', 'jazz'),
(12, 'The Family XL', 'The Family XL plays an eclectic mix of Contemporary Jazz, R&B and Funk music, including covers and originals.', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/444317886&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true', 'none', 'jazz'),
(13, 'Gare du Nord', 'The Gare du Nord is a jazz band from the Netherlands that specializes in blending various genres of music, such as jazz, funk, and soul. They are known for their unique sound and high-energy live performances. The band was formed in 1999 and has since released multiple albums, including their debut album \"Dutch Rhythm Combo\" in 2001, and \"Sexy Laundry\" in 2004.', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/444317886&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true', 'none', 'jazz'),
(14, 'Rilan & The Bombadiers', 'Rilan Ramhane is a Haarlemmer who is marked by his huge afro haircut. Together with The Bombardiers he plays “rock \'n soul”. Their first single is \'Happy Jack\' and will be released in 2012. The debut EP Walking On Fire will follow in the summer of 2015.', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/444317886&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true', 'none', 'jazz'),
(15, 'Soul Six', 'The Soul Brothers Six were an American rhythm and blues band formed in Rochester, New York, during the mid-1960s. They are best remembered for their songs \"Some Kind of Wonderful\", which was later a hit for Grand Funk Railroad and \"I\'ll Be Loving You\" which was a hit record on the 1970s Northern soul scene in the UK.', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/444317886&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true', 'none', 'jazz'),
(16, 'Han Bennink', 'Drummer and multi-instrumentalist Han Bennink was born in Zaandam near Amsterdam in 1942. His first percussion instrument was a kitchen chair. Later his father, an orchestra percussionist, supplied him with a more conventional outfit, but Han never lost his taste for coaxing sounds from unlikely objects he finds backstage at concerts. He is still very fond of playing chairs.', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/444317886&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true', 'none', 'jazz'),
(17, 'The Nordanians', 'These youthful artists\' interpretation of their favorite Soul & Rhythm \'n Blues is contemporary and distinctive. The Gumbo Kings live show takes place in a posh nightclub where the fun is gradually heated up to a fever pitch. They are pure romantics, these guys. Just beware of the sharp teeth.', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/444317886&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true', 'none', 'jazz'),
(18, 'Lilith Merlot', 'Dutch singer and songwriter Lilith Merlot is known for her warm and deep voice with a timeless feel. Growing up in a family of classically trained professional musicians, Lilith was enchanted by the beauty of harmony and melody from a very young age.', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/444317886&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true', 'none', 'jazz'),
(19, 'Ruis Soundsystem', 'Pierre Schaeffer coined the term musique concrète in 1949. He was referring to noise and tone structures that are processed electronically and reproduced through loudspeakers. In contrast to electronic music, the materials used are\'realistic\' sounds from the technical and natural environment, such as musical instruments or natural sounds.', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/444317886&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true', 'none', 'jazz'),
(25, 'Hardwell', 'DJ Hardwell, also known as Robbert van de Corput, is a Dutch DJ, record producer, and remixer. He gained global recognition with his hit tracks such as \"Spaceman,\" \"Apollo,\" and \"Dare You,\" and has been ranked as one of the world\'s top DJs multiple times by DJ Magazine\'s Top 100 DJs poll. Hardwell has performed at major music festivals and events worldwide, including Tomorrowland, Ultra Music Festival, and Electric Daisy Carnival, and has his own record label, Revealed Recordings, which showcases up-and-coming talent in the electronic dance music scene.\r\n', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/343304675&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true', 'Power by Hardwell & KSHMR', 'dance'),
(26, 'Armin van Buuren', 'Armin van Buuren is a Dutch DJ, record producer, and remixer who is widely regarded as one of the most influential figures in the trance music genre. He has been named the world\'s number one DJ five times by DJ Magazine\'s Top 100 DJs poll and has won numerous other awards for his music and performances. Van Buuren is known for his uplifting and emotional tracks, including \"Communication,\" \"In and Out of Love,\" and \"This Is What It Feels Like.\"', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/444317886&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true', 'Blah Blah Blah by Armin van Buuren', 'dance'),
(27, 'Martin Garrix', 'Martin Garrix, born Martijn Gerard Garritsen, is a Dutch DJ, record producer, and musician. He is best known for his hit single \"Animals,\" which reached the top of the charts in several countries in 2013. Since then, Garrix has released numerous successful tracks, including \"Scared to be Lonely,\" \"There for You,\" and \"Ocean.\" He has been named the world\'s number one DJ by DJ Magazine\'s Top 100 DJs poll in 2016, and continues to be a prominent figure in the electronic dance music scene. Garrix has performed at major music festivals and events around the world, and also runs his own record label, STMPD RCRDS, which supports and showcases emerging artists.', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/276648788&color=%2355b9de&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true', 'In the Name of Love by Martin Garrix', 'dance'),
(28, 'Tiesto', 'Tiesto, born Tijs Michiel Verwest, is a Dutch DJ, record producer, and remixer who is widely regarded as one of the pioneers of the electronic dance music scene. He has won numerous awards for his music and performances, including a Grammy Award for Best Remixed Recording, and has been named the world\'s number one DJ by DJ Magazine\'s Top 100 DJs poll three times. Tiesto is known for his blend of trance, house, and techno music, and has produced numerous hit tracks, including \"Adagio for Strings,\" \"Traffic,\" and \"Red Lights.\"\r\n', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/128680427&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true', 'In My Mind (Axwell Mix) by Tiësto', 'dance'),
(29, 'Nicky Romero', 'Nicky Romero is a Dutch DJ, record producer, and remixer who has become known for his blend of progressive house and electro house music. He gained recognition with his hit tracks \"Toulouse\" and \"I Could Be the One\" (with Avicii), and has since released numerous successful tracks, such as \"Symphonica,\" \"Legacy,\" and \"Like Home.\" Romero has performed at major music festivals and events worldwide, including Tomorrowland, Ultra Music Festival, and Electric Daisy Carnival, and has been named one of the world\'s top DJs by DJ Magazine\'s Top 100 DJs poll.\r\n', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/1430787265&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true', 'Turn Off The Lights by Nicky Romero\r\n', 'dance'),
(30, 'Afrojack', 'Afrojack, born Nick Leonardus van de Wall, is a Dutch DJ, record producer, and remixer who has become a prominent figure in the electronic dance music scene. He is known for his energetic and upbeat tracks, including \"Take Over Control,\" \"The Spark,\" and \"Ten Feet Tall,\" and has collaborated with numerous artists such as David Guetta, Pitbull, and Steve Aoki. Afrojack has performed at major music festivals and events worldwide, including Tomorrowland, Ultra Music Festival, and Electric Daisy Carnival, and has won several awards for his music and performances.\r\n', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/1301636533&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true', 'Worlds On Fire by Afrojack and R3HAB\r\n', 'dance');

-- --------------------------------------------------------

--
-- Table structure for table `artistImages`
--

CREATE TABLE `artistImages` (
  `id` int(11) NOT NULL,
  `artist_id` int(20) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artistImages`
--

INSERT INTO `artistImages` (`id`, `artist_id`, `image`) VALUES
(1, 25, 'hardwell-pic-1.png'),
(2, 25, 'hardwell-pic-2.png'),
(3, 25, 'hardwell-pic-3.png'),
(4, 30, 'afrojack-1.jpg'),
(5, 30, 'afrojack-2.png'),
(6, 30, 'afrojack-3.webp'),
(7, 26, 'AvB-1.jpg'),
(8, 26, 'AvB-2.jpg'),
(9, 26, 'AvB-3.jpg'),
(10, 27, 'MG-pic-1.png'),
(11, 27, 'MG-pic-2.png'),
(12, 27, 'MG-pic-3.png'),
(13, 28, 'Tiesto-1.jpeg'),
(14, 28, 'Tiesto-2.webp'),
(15, 28, 'Tiesto-3.jpg'),
(16, 29, 'NR-1.jpg'),
(17, 29, 'NR-2.jpeg'),
(18, 29, 'NR-3.jpg'),
(20, 2, 'jazz-10-evolve.png'),
(21, 3, 'jazz-6-ntjam-rosie.png'),
(22, 4, 'jazz-14-wicked-jazz-sounds.png'),
(23, 5, 'jazz-13-thomson-assemble.png'),
(24, 6, 'jazz-2-jonna-fraser.png'),
(25, 7, 'jazz-23-fox-the-mayors.png'),
(26, 8, 'jazz-24-uncle-sue.png'),
(27, 9, 'jazz-25-chris-allen.png'),
(28, 10, 'jazz-26-myles-sanko.png'),
(29, 11, 'jazz-27-ruis-soundsystem.png'),
(30, 12, 'jazz-28-the-family-XL.png'),
(32, 14, 'jazz-16-rilan-and-the-bombadiers.png'),
(33, 15, 'jazz-17-soul-six.png'),
(34, 16, 'jazz-20-han-bennink.png'),
(35, 17, 'jazz-19-the-nordians.png'),
(36, 18, 'jazz-18-lilith-merlot.png'),
(37, 19, 'jazz-22-ruis-soundsystem.jpg'),
(38, 3, 'jazz-7-ntjam-rosie.png'),
(39, 3, 'jazz-5-ntjam-rosie.png'),
(40, 6, 'jazz-3-jonna-fraser.png'),
(41, 6, 'jazz-4-jonna-fraser.png'),
(109, 1, 'jazz-9-gumbo-kings.png'),
(110, 13, 'jazz-15-gare-du-nord.png');

-- --------------------------------------------------------

--
-- Table structure for table `dance`
--

CREATE TABLE `dance` (
  `id` int(11) NOT NULL,
  `venueId` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dance`
--

INSERT INTO `dance` (`id`, `venueId`, `session`, `event_id`) VALUES
(1, 1, 'Back2Back', 18),
(2, 2, 'Club', 19),
(3, 3, 'Club', 20),
(4, 4, 'Club', 21),
(5, 5, 'Club', 22),
(6, 6, 'Back2Back', 23),
(7, 3, 'Club', 24),
(8, 1, 'TiestoWorld', 25),
(9, 2, 'Club', 26),
(10, 6, 'Back2Back', 27),
(11, 3, 'Club', 28),
(12, 4, 'Club', 29),
(13, 2, 'Club', 30);

-- --------------------------------------------------------

--
-- Table structure for table `danceArtist`
--

CREATE TABLE `danceArtist` (
  `id` int(11) NOT NULL,
  `danceId` int(11) NOT NULL,
  `artistId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danceArtist`
--

INSERT INTO `danceArtist` (`id`, `danceId`, `artistId`) VALUES
(1, 1, 29),
(2, 1, 30),
(3, 2, 28),
(4, 3, 25),
(5, 4, 26),
(6, 5, 27),
(7, 6, 25),
(8, 6, 27),
(9, 6, 26),
(10, 7, 30),
(11, 8, 28),
(12, 9, 29),
(13, 10, 30),
(14, 10, 28),
(15, 10, 29),
(16, 11, 26),
(17, 12, 25),
(18, 13, 27);

-- --------------------------------------------------------

--
-- Table structure for table `editor`
--

CREATE TABLE `editor` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `editor`
--

INSERT INTO `editor` (`id`, `content`, `created`) VALUES
(1, 'Welcome to a city of endless possibilities: A charming historic district, fascinating museums, unique shops, a wide variety of dining options, and a lovely beach, &lt;br&gt;&lt;b&gt; Haarlem really has it all.&lt;/b&gt;', '2023-04-08 08:22:32'),
(2, 'Haarlem has been an important Dutch city since 1245, functioning initially as a shipping sea port. The majority of Haarlem&#039;s old gorgeous buildings have stayed intact and are what make the atmosphere in Haarlem truly amazing. Well known for its beer making, Haarlem is home to the wonderful Jopenkerk andwindmill de Adriaan from 1779.', '2023-04-08 08:21:45'),
(3, 'No matter when, dining in Haarlem is guaranteed to be an incredible experience.            Not only does Haarlem have some of the best restaurants with quality food, the atmosphere of the city is            what makes it all the more special.', '2023-04-05 10:02:05'),
(4, 'The city of Haarlem comes alive with music in July. The days are longer and warmer, making it the ideal            time to go see both well-known and unknown Dutch musicians play for the delightz of the crowd.', '2023-04-05 10:02:11'),
(5, 'When it comes to entertainment, Haarlem is perfect. Theatres such as: Het Kennenmer Theatre, and Philharmonie will guarantee you won&#039;t leave Haarlem disappointed. Don&#039;t miss out on the beautiful dramas and the high quality productions!', '2023-04-05 10:02:20'),
(6, 'If you want to see some amazing historical artefacts and you want to learn their history, then come to\r\n            Haarlem\'s museums!<br>Some great choices include:\r\n            <br>&#x2022;The corrie ten boom house\r\n            <br>&#x2022;Teylers Museum\r\n            <br>&#x2022;Frans hals museum\r\n            <br>&#x2022;Museum van de geest', '2023-04-04 10:37:12'),
(7, '&lt;h3&gt;The Haarlem Festival is suitable for anyone and everyone&lt;/h3&gt;.&lt;br&gt; No matter your tastes, age or nationality. &lt;br&gt;Check out our local artists at the jazz event, learn about Haarlem history, enjoy a personalized eating experience or dance the night away! We also have a fun experience for the younger ones: an exciting treasure hunt at the acclaimed Teylers museum!', '2023-04-05 10:03:20'),
(8, '<h1>Yummy!</h1><br>If you want to celebrate a festival, you have to do it on a full stomach! Restaurants all over Haarlem have joined to create a special menu for the occasion. Being such an international city, you are sure to enjoy your evening, whether it be with your family or on a romantic dinner with your partner!', '2023-04-05 06:58:13'),
(9, '<h1>Historical walk</h1> <br>Visit Haarlem’s most beautiful sights and get to learn more about it’s rich and interesting history. Join an informational tour throughout the city today!', '2023-04-05 06:59:53'),
(10, '&lt;h1&gt;Haarlem Jazz&lt;/h1&gt;&lt;br&gt;Annually, the Grote Markt in the heart of the historic capital of Haarlem hosts the concert series known as Haarlem Jazz. Both well-known and unknown Dutch musicians will perform for the audience&#039;s amazement. We&#039;re here waiting for you.', '2023-04-08 08:21:06'),
(11, '&lt;h1&gt;Teylers Museum&lt;/h1&gt;&lt;br&gt;in this event, children play and learn while solving the mystery of the event. Teylers museum contains ancient and fascinating artefacts that will amaze everyone.', '2023-04-05 09:55:09');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `event_type` varchar(255) NOT NULL,
  `seats` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `date`, `start_time`, `end_time`, `event_type`, `seats`, `price`) VALUES
(1, 'Restaurant Mr&Ms', '2023-07-26', '18:00:00', '19:30:00', 'yummy', 40, 45),
(2, 'Restaurant Mr&Ms', '2023-07-26', '19:30:00', '21:00:00', 'yummy', 40, 45),
(3, 'Restaurant Mr&Ms', '2023-07-26', '21:00:00', '22:30:00', 'yummy', 40, 45),
(4, 'Ratatouille', '2023-07-26', '17:00:00', '19:00:00', 'yummy', 52, 45),
(5, 'Ratatouille', '2023-07-26', '19:00:00', '21:00:00', 'yummy', 52, 45),
(6, 'Ratatouille', '2023-07-26', '21:00:00', '23:00:00', 'yummy', 52, 45),
(7, 'Restaurant ML', '2023-07-26', '17:00:00', '19:00:00', 'yummy', 60, 45),
(8, 'Restaurant ML', '2023-07-26', '19:00:00', '21:00:00', 'yummy', 60, 45),
(9, 'Restaurant Fris', '2023-07-26', '17:30:00', '19:00:00', 'yummy', 45, 45),
(10, 'Restaurant Fris', '2023-07-26', '19:00:00', '20:30:00', 'yummy', 45, 45),
(11, 'Restaurant Fris', '2023-07-26', '19:30:00', '21:00:00', 'yummy', 45, 45),
(12, 'Specktakel', '2023-07-26', '17:00:00', '18:30:00', 'yummy', 36, 35),
(13, 'Specktakel', '2023-07-26', '18:30:00', '20:00:00', 'yummy', 36, 35),
(14, 'Specktakel', '2023-07-26', '20:00:00', '21:30:00', 'yummy', 36, 35),
(15, 'Grand Cafe Brinkman', '2023-07-26', '16:30:00', '18:00:00', 'yummy', 100, 35),
(16, 'Grand Cafe Brinkman', '2023-07-26', '18:00:00', '19:30:00', 'yummy', 100, 35),
(17, 'Grand Cafe Brinkman', '2023-07-26', '19:30:00', '21:00:00', 'yummy', 100, 35),
(18, 'Back2Back - Nicky Romero / Afrojack', '2023-07-27', '20:00:00', '02:00:00', 'dance', 1500, 75),
(19, 'Club - Tiesto', '2023-07-27', '22:00:00', '23:30:00', 'dance', 200, 60),
(20, 'Club - Hardwell', '2023-07-27', '23:00:00', '00:30:00', 'dance', 300, 60),
(21, 'Club - Armin van Buuren', '2023-07-27', '22:00:00', '23:00:00', 'dance', 200, 60),
(22, 'Club - Martin Garrix', '2023-07-27', '22:00:00', '23:30:00', 'dance', 200, 60),
(23, 'Back2Back - Hardwell / Martin Garrix / Armin van Buuren', '2023-07-28', '14:00:00', '23:00:00', 'dance', 2000, 110),
(24, 'Club - Afrojack', '2023-07-28', '22:00:00', '23:30:00', 'dance', 300, 60),
(25, 'Tiesto World ', '2023-07-28', '21:00:00', '01:00:00', 'dance', 1500, 75),
(26, 'Club - Nicky Romero', '2023-07-28', '23:00:00', '00:30:00', 'dance', 200, 60),
(27, 'Back2Back - Afrojack / Tiesto / Nicky Romero', '2023-07-29', '14:00:00', '23:00:00', 'dance', 2000, 110),
(28, 'Club - Armin van Buuren', '2023-07-29', '19:00:00', '20:30:00', 'dance', 300, 60),
(29, 'Club - Hardwell', '2023-07-29', '21:00:00', '22:30:00', 'dance', 1500, 90),
(30, 'Club - Martin Garrix', '2023-07-29', '18:00:00', '19:30:00', 'dance', 200, 60),
(31, 'Gumbo Kings', '2023-07-26', '18:00:00', '19:00:00', 'jazz', 300, 15),
(32, 'Evolve', '2023-07-26', '19:30:00', '20:30:00', 'jazz', 300, 15),
(33, 'Ntjam Rosie', '2023-07-26', '21:00:00', '22:00:00', 'jazz', 300, 15),
(34, 'Wicked Jazz Sounds', '2023-07-26', '18:00:00', '19:00:00', 'jazz', 200, 10),
(35, 'Tom Thomsom Assemble', '2023-07-26', '19:30:00', '20:30:00', 'jazz', 200, 10),
(36, 'Jonna Frazer', '2023-07-26', '21:00:00', '22:00:00', 'jazz', 200, 10),
(37, 'Fox & The Mayors', '2023-07-27', '18:00:00', '19:00:00', 'jazz', 300, 15),
(38, 'Uncle Sue', '2023-07-27', '19:30:00', '20:30:00', 'jazz', 300, 15),
(39, 'Chris Allen', '2023-07-27', '21:00:00', '22:00:00', 'jazz', 300, 15),
(40, 'Myles Sanko', '2023-07-27', '18:00:00', '19:00:00', 'jazz', 200, 10),
(41, 'Ruis Soundsystem', '2023-07-27', '19:30:00', '20:30:00', 'jazz', 200, 10),
(42, 'The Family XL', '2023-07-27', '21:00:00', '22:00:00', 'jazz', 200, 10),
(43, 'Gare du Nord', '2023-07-28', '18:00:00', '19:00:00', 'jazz', 300, 15),
(44, 'Rilan & The Bombadiers', '2023-07-28', '19:30:00', '20:30:00', 'jazz', 300, 15),
(45, 'Soul Six', '2023-07-28', '21:00:00', '22:00:00', 'jazz', 300, 15),
(46, 'Han Bennink', '2023-07-28', '18:00:00', '19:00:00', 'jazz', 150, 10),
(47, 'The Nordanians', '2023-07-28', '19:30:00', '20:30:00', 'jazz', 150, 10),
(48, 'Lilith Merlot', '2023-07-28', '21:00:00', '22:00:00', 'jazz', 150, 10),
(49, 'Ruis Soundsystem', '2023-07-29', '15:00:00', '16:00:00', 'jazz', 0, 0),
(50, 'Wicked Jazz Sounds', '2023-07-29', '16:00:00', '17:00:00', 'jazz', 0, 0),
(51, 'Evolve', '2023-07-29', '17:00:00', '18:00:00', 'jazz', 0, 0),
(52, 'The Nordanians', '2023-07-29', '18:00:00', '19:00:00', 'jazz', 0, 0),
(53, 'Gumbo Kings', '2023-07-29', '19:00:00', '20:00:00', 'jazz', 0, 0),
(54, 'Gare du Nord', '2023-07-29', '20:00:00', '21:00:00', 'jazz', 0, 0),
(55, 'Walk through historical Haarlem-English', '2023-07-26', '10:00:00', '12:30:00', 'history', 12, 17.5),
(56, 'Walk through historical Haarlem-Dutch', '2023-07-26', '10:00:00', '12:30:00', 'history', 12, 17.5),
(57, 'Walk through historical Haarlem-Chinese', '2023-07-26', '10:00:00', '12:30:00', 'history', 0, 17.5),
(58, 'Walk through historical Haarlem-English', '2023-07-26', '13:00:00', '15:30:00', 'history', 12, 17.5),
(59, 'Walk through historical Haarlem-Dutch', '2023-07-26', '13:00:00', '15:30:00', 'history', 12, 17.5),
(60, 'Walk through historical Haarlem-Chinese', '2023-07-26', '13:00:00', '15:30:00', 'history', 0, 17.5),
(61, 'Walk through historical Haarlem-English', '2023-07-26', '16:00:00', '18:30:00', 'history', 12, 17.5),
(62, 'Walk through historical Haarlem-Dutch', '2023-07-26', '16:00:00', '18:30:00', 'history', 12, 17.5),
(63, 'Walk through historical Haarlem-Chinese', '2023-07-26', '16:00:00', '18:30:00', 'history', 0, 17.5),
(64, 'Walk through historical Haarlem-English', '2023-07-27', '10:00:00', '12:30:00', 'history', 12, 17.5),
(65, 'Walk through historical Haarlem-Dutch', '2023-07-27', '10:00:00', '12:30:00', 'history', 12, 17.5),
(66, 'Walk through historical Haarlem-Chinese', '2023-07-27', '10:00:00', '12:30:00', 'history', 0, 17.5),
(67, 'Walk through historical Haarlem-English', '2023-07-27', '13:00:00', '15:30:00', 'history', 12, 17.5),
(68, 'Walk through historical Haarlem-Dutch', '2023-07-27', '13:00:00', '15:30:00', 'history', 12, 17.5),
(69, 'Walk through historical Haarlem-Chinese', '2023-07-27', '13:00:00', '15:30:00', 'history', 12, 17.5),
(70, 'Walk through historical Haarlem-English', '2023-07-27', '16:00:00', '18:30:00', 'history', 12, 17.5),
(71, 'Walk through historical Haarlem-Dutch', '2023-07-27', '16:00:00', '18:30:00', 'history', 12, 17.5),
(72, 'Walk through historical Haarlem-Chinese', '2023-07-27', '16:00:00', '18:30:00', 'history', 0, 17.5),
(73, 'Walk through historical Haarlem-English', '2023-07-28', '10:00:00', '12:30:00', 'history', 24, 17.5),
(74, 'Walk through historical Haarlem-Dutch', '2023-07-28', '10:00:00', '12:30:00', 'history', 24, 17.5),
(75, 'Walk through historical Haarlem-Chinese', '2023-07-28', '10:00:00', '12:30:00', 'history', 0, 17.5),
(76, 'Walk through historical Haarlem-English', '2023-07-28', '13:00:00', '15:30:00', 'history', 24, 17.5),
(77, 'Walk through historical Haarlem-Dutch', '2023-07-28', '13:00:00', '15:30:00', 'history', 24, 17.5),
(78, 'Walk through historical Haarlem-Chinese', '2023-07-28', '13:00:00', '15:30:00', 'history', 12, 17.5),
(79, 'Walk through historical Haarlem-English', '2023-07-28', '16:00:00', '18:30:00', 'history', 12, 17.5),
(80, 'Walk through historical Haarlem-Dutch', '2023-07-28', '16:00:00', '18:30:00', 'history', 12, 17.5),
(81, 'Walk through historical Haarlem-Chinese', '2023-07-28', '16:00:00', '18:30:00', 'history', 12, 17.5),
(82, 'Walk through historical Haarlem-English', '2023-07-29', '10:00:00', '12:30:00', 'history', 24, 17.5),
(83, 'Walk through historical Haarlem-Dutch', '2023-07-29', '10:00:00', '12:30:00', 'history', 24, 17.5),
(84, 'Walk through historical Haarlem-Chinese', '2023-07-29', '10:00:00', '12:30:00', 'history', 12, 17.5),
(85, 'Walk through historical Haarlem-English', '2023-07-29', '13:00:00', '15:30:00', 'history', 36, 17.5),
(86, 'Walk through historical Haarlem-Dutch', '2023-07-29', '13:00:00', '15:30:00', 'history', 36, 17.5),
(87, 'Walk through historical Haarlem-Chinese', '2023-07-29', '13:00:00', '15:30:00', 'history', 24, 17.5),
(88, 'Walk through historical Haarlem-English', '2023-07-29', '16:00:00', '18:30:00', 'history', 12, 17.5),
(89, 'Walk through historical Haarlem-Dutch', '2023-07-29', '16:00:00', '18:30:00', 'history', 12, 17.5),
(90, 'Walk through historical Haarlem-Chinese', '2023-07-29', '16:00:00', '18:30:00', 'history', 0, 17.5),
(101, 'Friday All-Access daypass', '2023-07-27', '00:00:00', '23:59:00', 'all-access', 3000, 125),
(102, 'Saturday All-Access daypass', '2023-07-28', '00:00:00', '23:59:00', 'all-access', 3000, 150),
(103, 'Sunday All-Access daypass', '2023-07-29', '00:00:00', '23:59:00', 'all-access', 3000, 150);

-- --------------------------------------------------------

--
-- Table structure for table `jazz`
--

CREATE TABLE `jazz` (
  `id` int(11) NOT NULL,
  `venueId` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jazz`
--

INSERT INTO `jazz` (`id`, `venueId`, `event_id`) VALUES
(1, 1, 31),
(2, 1, 32),
(3, 1, 33),
(4, 2, 34),
(5, 2, 35),
(6, 2, 36),
(7, 1, 37),
(8, 1, 38),
(9, 1, 39),
(10, 2, 40),
(11, 2, 41),
(12, 2, 42),
(13, 1, 43),
(14, 1, 44),
(15, 1, 45),
(16, 3, 46),
(17, 3, 47),
(18, 3, 48),
(19, 4, 49),
(20, 4, 50),
(21, 4, 51),
(22, 4, 52),
(23, 4, 53),
(24, 4, 54);

-- --------------------------------------------------------

--
-- Table structure for table `jazzArtist`
--

CREATE TABLE `jazzArtist` (
  `id` int(11) NOT NULL,
  `jazzId` int(11) NOT NULL,
  `artistId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jazzArtist`
--

INSERT INTO `jazzArtist` (`id`, `jazzId`, `artistId`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6),
(7, 7, 7),
(8, 8, 8),
(9, 9, 9),
(10, 10, 10),
(11, 11, 11),
(12, 12, 12),
(13, 13, 13),
(14, 14, 14),
(15, 15, 15),
(16, 16, 16),
(17, 17, 17),
(18, 18, 18),
(19, 19, 19),
(20, 20, 4),
(21, 21, 2),
(22, 22, 17),
(23, 23, 1),
(24, 24, 13);

-- --------------------------------------------------------

--
-- Table structure for table `kids`
--

CREATE TABLE `kids` (
  `id` int(11) NOT NULL,
  `activity_title` varchar(300) NOT NULL,
  `activity_description` varchar(300) NOT NULL,
  `img` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kids`
--

INSERT INTO `kids` (`id`, `activity_title`, `activity_description`, `img`) VALUES
(1, 'Teyler’s secret', 'Participant areintroduced to the backstory of this challenge. A code has to be found to reveal the location of Prof. Teylers Notebook.', 'detective-icon.png'),
(2, 'The Egg problem', 'Participants get some egg-facts and must solve a science problem to find the two fresh eggs out of six using science.', 'egg-icon.png'),
(3, 'The Lost Calculator', 'Participant must solve a math problem finding and combing several numbers in each outcome.', 'calculator-icon.png'),
(4, 'The Broken Circuit', 'Participant must solve a science problem repairing an completing a circuit to make two lamps glow.', 'circuit-icon.png'),
(5, 'The Scale Problem', 'Participant must solve a science problem involving finding the right amount of water to tip a scale in a certain direction.', 'scale-icon.png'),
(6, 'The Final Enigma', 'Participant must answer questions on the museum to receive the final clue and solve the mystery.', 'enigma-icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `status` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `time_of_purchase` datetime NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `pay_later_token` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `amount`, `status`, `payment_method`, `time_of_purchase`, `payment_id`, `pay_later_token`) VALUES
(84, 2, 135, 'paid', 'ideal', '2023-04-09 15:21:23', 'tr_vfxHfUKZvx', NULL),
(85, 2, 135, 'failed', 'ideal', '2023-04-09 15:22:11', 'tr_LsdinCLWEK', 'e8eb2e59353d63ee89e566d0f724d96961eb8fc1fc61b6551837cda8c1adae9e');

-- --------------------------------------------------------

--
-- Table structure for table `order_ticket`
--

CREATE TABLE `order_ticket` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `is_scaned` tinyint(1) NOT NULL,
  `uuid` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_ticket`
--

INSERT INTO `order_ticket` (`id`, `order_id`, `event_id`, `is_scaned`, `uuid`) VALUES
(170, 84, 1, 0, ''),
(171, 84, 1, 0, ''),
(172, 84, 1, 0, ''),
(173, 85, 1, 0, ''),
(174, 85, 1, 0, ''),
(175, 85, 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `halal` tinyint(1) NOT NULL,
  `vegan` tinyint(1) NOT NULL,
  `stars` int(11) NOT NULL,
  `duration` float NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `location`, `description`, `content`, `halal`, `vegan`, `stars`, `duration`, `image`) VALUES
(1, 'Restaurant Mr&Ms', 'Lange Veerstraat 4, 2011 DB Haarlem, Nederland', 'Dutch, fish and seafood, European', 'Run by the lovely couple of Mark and Corina, Mr & Ms is a restaurant that emphasizes luxurious eating with honest ingredients, sourced locally whenever possible.\r\n By combining Mark’s cooking skills and Corina’s wine expertise, all aspects of the dinner are sure to be perfect.\r\n\r\n The restaurant offers variations on typical Dutch cuisine with an European twist,  as well as excellent seafood which will satisfy even the pickiest of eaters. They also offer vegan options which follow Halal regulations: there will be something for everyone!\r\n\r\nSessions last 1.5 hours; first session begins at 18:00.', 1, 1, 4, 1.5, 'restaurant-mr&ms.png'),
(2, 'Ratatouille', 'Spaarne 96, 2011 CL Haarlem, Nederland', 'French, fish and seafood, European', 'Chef Joshua Jaring \'s successful 4-Michelin restaurant in Haarlem is,  just like Ratatouille, a mix of French cuisine in today\'s reality with an excellent price-quality ratio in a privileged location in Haarlem.\r\n\r\nOffering one of the most diverse and exclusive wine carts in the city, Ratatouille is the perfect location to plan a date with your partner, where you will enjoy a magnificent selection of both wines and delicate plates in a truly unique dining experience.\r\n\r\nSessions last 2 hours, first session begins at 17:00', 1, 1, 4, 2, 'restaurant-ratatouille.png'),
(3, 'Restaurant ML', 'Kleine Houtstraat 70, 2011 DR Haarlem, Nederland', 'Dutch, fish and seafood, European', 'Restaurant ML is a restaurant located in Haarlem, in the Netherlands. It is a fine dining restaurant that was awarded one Michelin star in the period 2011–present. Gault Millau awarded the restaurant 13 out of 20 points. Head chef of Restaurant ML is Mark Gratama.', 1, 1, 4, 2, 'restaurant-ml.png'),
(4, 'Restaurant Fris', 'Twijnderslaan 7, 2012 BG Haarlem, Nederland', 'Dutch, fish and seafood, European', 'Warm is a better description for the modern and eclectic interior, but a look at the menu shows that this restaurant is rightly named Fris. Original textures and product combinations ensure tasty flavors and a pleasant mouthfeel. The wines round off the story nicely.', 0, 1, 4, 1.5, 'restaurant-fris.png'),
(5, 'Specktakel', 'Spekstraat 4, 2011 HM Haarlem, Nederland', 'European, international, asian', 'Specktakel is a unique World Restaurant centrally located in the heart of Haarlem. With a special covered courtyard and a terrace with a view of the historic Vleeshal and the centuries-old Bavo church. In the world kitchen, true works of art are created where every sense is stimulated.\r\n\r\nSpecktakel is all about the experience, an experience that we create together, each in his or her own role. The world wines are carefully selected so that the wine is in harmony with the aromas and spices of the dish.\r\nThe colours, aromas and flavors create a wonderful interplay that can be talked about…', 1, 1, 3, 1.5, 'restaurant-specktakel.png'),
(6, 'Grand Cafe Brinkman', 'Grote Markt 13, 2011 RC Haarlem, Nederland', 'Dutch, european, modern', 'Brinkmann is a well-known grand café that has been located on the Grote Markt in Haarlem since 1881 . In the thirties of the twentieth century, the business had grown into a large complex of entertainment venues. In the late 1970s it gave way to the Brinkmannpassage . Brinkmann has continued in a smaller form as a grand café.', 1, 1, 3, 1.5, 'restaurant-brinkmann.png');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `restaurantId` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `restaurantId`, `event_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 4),
(5, 2, 5),
(6, 2, 6),
(7, 3, 7),
(8, 3, 8),
(10, 4, 9),
(11, 4, 10),
(12, 4, 11),
(13, 5, 12),
(14, 5, 13),
(15, 5, 14),
(16, 6, 15),
(17, 6, 16),
(18, 6, 17);

-- --------------------------------------------------------

--
-- Table structure for table `tourLocations`
--

CREATE TABLE `tourLocations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tourLocations`
--

INSERT INTO `tourLocations` (`id`, `name`, `location`, `description`, `img`) VALUES
(1, 'Bavo Church', 'Grote Markt 22, 2011 RD Haarlem', 'The Grote Kerk or St.-Bavokerk is a Reformed Protestant church and former Catholic cathedral located on the central market square (Grote Markt) in the Dutch city of Haarlem. Another Haarlem church called the Cathedral of Saint Bavo now serves as the main cathedral for the Roman Catholic Diocese of Haarlem-Amsterdam.', 'st-bavo.jpeg'),
(2, 'Grote Markt', 'Grote Markt, 2011 RD Haarlem', 'The Grote Markt in Haarlem is a large square in the center of Haarlem, where a number of old and well-known buildings are located, such as the Grote or Sint-Bavokerk and the town hall.\r\nMany speak of the most beautiful square in the Netherlands. The appearance and character of the square are determined by the historic buildings. The market, fun fair and various events take place on the Grote Markt in Haarlem.', 'grote-markt.jpg'),
(3, 'De Hallen', 'Grote Markt 16, 2011 RD Haarlem', 'De Hallen Haarlem is the museum for modern and contemporary art in Haarlem.\r\nTwice a year, De Hallen Haarlem organizes an exhibition cluster about current developments in the visual arts. The museum thus offers a platform for artists from the Netherlands and abroad, with an emphasis on photography and video art.\r\nThe annual exhibition in the De Hallen Haarlem Summer Series highlights themes and people from the history of modern art (ca. 1850 - present) and focuses on a wide audience.', 'de-hallen.jpg'),
(4, 'Proveniershof', 'Grote Houtstraat 142D, 2011 SV Haarlem', 'The Proveniershof has a different appearance than the small courtyards in Haarlem. The houses of the Proveniershof were not a form of charity, but were intended for the well-to-do bourgeoisie, who bought in and could then live here at a later age. The Proveniershof is located on the busy shopping street Grote Houtstraat 144 and is freely accessible to visitors.', 'proveniershof.jpg'),
(5, 'Jopenkerk', 'Gedempte Voldersgracht 2, 2011 WD Haarlem', 'Behind the bar of the grand café of the Jopenkerk are imposing shiny brewing kettles. They form the heart of the Jopenkerk. Jopen brews both old and new classics here according to age-old recipes.\r\nGet to know the various Jopen beers in various flavors in the grand café. Order a tasting of three beers and discover your taste preferences. There is a special story behind every freshly tapped beer. Jopen also has an extensive drink menu.', 'jopenkerk.jpg'),
(6, 'Waalse Kerk', 'Begijnhof 28, 2011 HE Haarlem', 'The Waalse kerk is a Walloon church that was built in the middle of the 14th century and has an upper gallery built for the Beguines who lived there on the courtyard that still bears their name.The  sacristy dates from the 16th century, with wooden arches and a mantel from the 17th century. The organ was built in 1808 by Friederichs, and in the attic there is a mechanical clock that drives the hands on the clock of the organ. In the church tower there is a bell from 1512 with a diameter of 56.5 centimeters.', 'waalse-kerk.jpg'),
(7, 'Molen de Adriaan', 'Papentorenvest 1A, 2011 AV Haarlem', 'Molen De Adrian is a magnificent windmill, placed on the bank of Spaarne river that dates back to the year 1779. Originally, the windmill was part of a tower that defended the city center and was used to produce paint, cement and tan. Later on, it was converted into a tobacco widnmill. \r\n', 'windmill-de-adriaan1.jpg\r\n'),
(8, 'Amsterdamse Poort', '2011 BZ Haarlem', 'The Amsterdamse Poort is an old city gate of Haarlem that dates back to the XIV century. This historical landmark is the only gate that remains from the original twelve city gates. The gate is located at the end of the old route from Amsterdam to Haarlem. ', 'amsterdamse-poort1.jpg\r\n'),
(9, 'Hofje van Bakenes', 'Wijde Appelaarsteeg 11F, 2011 HB Haarlem', 'The Hofje van Bakenes or Bakenesserkamer is a Haarlem courtyard. The hofje can be found on the Bakenessergracht in the center of Haarlem. The courtyard has two entrances: one on the Bakenessergracht and one on the Wijde Appelaarsteeg. The entrance on the Wijde Appelaarsteeg is the main entrance. The Hofje van Bakenes is the oldest existing almshouse in Haarlem.', 'hof-van-bakenes.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `event_id`, `language`) VALUES
(1, 55, 'english'),
(2, 56, 'dutch'),
(3, 57, 'chinese'),
(4, 58, 'english'),
(5, 59, 'dutch'),
(6, 60, 'chinese'),
(7, 61, 'english'),
(8, 62, 'dutch'),
(9, 63, 'chinese'),
(10, 64, 'english'),
(11, 65, 'dutch'),
(12, 66, 'chinese'),
(13, 67, 'english'),
(14, 68, 'dutch'),
(15, 69, 'chinese'),
(16, 70, 'english'),
(17, 71, 'dutch'),
(18, 72, 'chinese'),
(19, 73, 'english'),
(20, 74, 'dutch'),
(21, 75, 'chinese'),
(22, 76, 'english'),
(23, 77, 'dutch'),
(24, 78, 'chinese'),
(25, 79, 'english'),
(26, 80, 'dutch'),
(27, 81, 'chinese'),
(28, 82, 'english'),
(29, 83, 'dutch'),
(30, 84, 'chinese'),
(31, 85, 'english'),
(32, 86, 'dutch'),
(33, 87, 'chinese'),
(34, 88, 'english'),
(35, 89, 'dutch'),
(36, 90, 'chinese');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `registration` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `password`, `phone`, `address`, `email`, `registration`) VALUES
(0, 'admin', 'gnas', '$2y$10$3i245PoMfgnkgnLc0YjFruWeYhmBcp1KubBKmKk9oQeCTffmAKQDy', 123456789, 'PurePainStreet, 4', 'ignas@gmail.com', '2023-02-01'),
(2, 'customer', 'stupidCatalin', '$2y$10$P4yGos0mu6EQ56vyPLF/1enCAxYML9TUv8GNKQM5ZdoIzo9hcohUS', 12365489, 'test', 'catalin@gmail.com', '2023-03-08'),
(3, 'employee', 'test', '$2y$10$JlZLGLdTcXQiCvRhbB/WAOlVpMPaH2vrlqOXe3.FMuLnno5cyZkKu', 12365489, 'test', 'sssss@gmail.com', '2023-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`id`, `name`, `location`) VALUES
(1, 'Lichtfabriek', 'Minckelersweg 2, 2031 EM Haarlem\r\n'),
(2, 'Club Stalker', 'Kromme Elleboogsteeg 20, 2011 TS Haarlem\r\n'),
(3, 'Jopenkerk', 'Gedempte Voldersgracht 2, 2011 WD Haarlem\r\n'),
(4, 'XO the Club', 'Grote Markt 8, 2011 RD Haarlem\r\n'),
(5, 'Club Ruis', 'Smedestraat 31, 2011 RE Haarlem\r\n'),
(6, 'Caprera Openluchttheater \r\n', 'Hoge Duin en Daalseweg 2, 2061 AG Bloemendaal\r\n'),
(7, 'Club blue', 'Lmedestraat 125, 2034 XA Haarlem');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artistImages`
--
ALTER TABLE `artistImages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_artistImages_artistId` (`artist_id`);

--
-- Indexes for table `dance`
--
ALTER TABLE `dance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dance_venueId` (`venueId`),
  ADD KEY `fk_dance_eventId` (`event_id`);

--
-- Indexes for table `danceArtist`
--
ALTER TABLE `danceArtist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_danceArtist_artistId` (`artistId`),
  ADD KEY `fk_danceArtist_danceId` (`danceId`);

--
-- Indexes for table `editor`
--
ALTER TABLE `editor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jazz`
--
ALTER TABLE `jazz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jazz_venueId` (`venueId`),
  ADD KEY `fk_jazz_eventId` (`event_id`);

--
-- Indexes for table `jazzArtist`
--
ALTER TABLE `jazzArtist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jazzArtist_jazzId` (`jazzId`),
  ADD KEY `fk_jazzArtist_artistId` (`artistId`);

--
-- Indexes for table `kids`
--
ALTER TABLE `kids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_userId` (`user_id`);

--
-- Indexes for table `order_ticket`
--
ALTER TABLE `order_ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orderTicket_orderId` (`order_id`),
  ADD KEY `fk_orderTicket_eventId` (`event_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sessions_restaurantId` (`restaurantId`),
  ADD KEY `fk_sessions_eventId` (`event_id`);

--
-- Indexes for table `tourLocations`
--
ALTER TABLE `tourLocations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tours_eventId` (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `artistImages`
--
ALTER TABLE `artistImages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `dance`
--
ALTER TABLE `dance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `danceArtist`
--
ALTER TABLE `danceArtist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `editor`
--
ALTER TABLE `editor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `jazz`
--
ALTER TABLE `jazz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `jazzArtist`
--
ALTER TABLE `jazzArtist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `kids`
--
ALTER TABLE `kids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `order_ticket`
--
ALTER TABLE `order_ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tourLocations`
--
ALTER TABLE `tourLocations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artistImages`
--
ALTER TABLE `artistImages`
  ADD CONSTRAINT `fk_artistImages_artistId` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dance`
--
ALTER TABLE `dance`
  ADD CONSTRAINT `fk_dance_eventId` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_dance_venueId` FOREIGN KEY (`venueId`) REFERENCES `venue` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `danceArtist`
--
ALTER TABLE `danceArtist`
  ADD CONSTRAINT `fk_danceArtist_artistId` FOREIGN KEY (`artistId`) REFERENCES `artist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_danceArtist_danceId` FOREIGN KEY (`danceId`) REFERENCES `dance` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jazz`
--
ALTER TABLE `jazz`
  ADD CONSTRAINT `fk_jazz_eventId` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jazz_venueId` FOREIGN KEY (`venueId`) REFERENCES `venue` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jazzArtist`
--
ALTER TABLE `jazzArtist`
  ADD CONSTRAINT `fk_jazzArtist_artistId` FOREIGN KEY (`artistId`) REFERENCES `artist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jazzArtist_jazzId` FOREIGN KEY (`jazzId`) REFERENCES `jazz` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_userId` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_ticket`
--
ALTER TABLE `order_ticket`
  ADD CONSTRAINT `fk_orderTicket_eventId` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orderTicket_orderId` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `fk_sessions_eventId` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sessions_restaurantId` FOREIGN KEY (`restaurantId`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tours`
--
ALTER TABLE `tours`
  ADD CONSTRAINT `fk_tours_eventId` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
