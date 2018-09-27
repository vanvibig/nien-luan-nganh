-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2018 at 11:54 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_banhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `yearofbirth` int(11) NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `image`, `yearofbirth`, `gender`) VALUES
(1, 'Aoyama Gosho', 'aoyama_tg.jpg', 1964, 'nam'),
(4, 'Oda Eiichiro', 'oda_tg.jpg', 1975, 'nam'),
(5, 'Kishimoto Masashi', 'masashi-kishimoto-tg.jpg', 1974, 'nam'),
(6, 'Fujiko Fujio', 'fujiko-f-fujio-doraemon-tg.jpg', 1933, 'nam'),
(7, 'Takeuchi Naoko', 'naoko-takeuchi-sailor-moon-tg.jpg', 1967, 'nam'),
(8, 'Jun Maeda', 'jun-maeda-angel-beats-clannad-tg.jpg', 1975, 'nam'),
(9, 'K V', '13010688_1793681217526743_4355835426389057155_n.jpg', 1997, 'nam'),
(10, 're tesst', 'rdyE_images1294408_chuoi4.jpg', 11111, 'nam');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(10) UNSIGNED DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `note`, `created_at`, `updated_at`) VALUES
(6, 6, '2018-09-07', 494000, 'COD', '1526357485', '2018-09-07 11:23:01', '2018-09-07 11:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `bill_details`
--

CREATE TABLE `bill_details` (
  `id_bill` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bill_details`
--

INSERT INTO `bill_details` (`id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(6, 3, 2, 22000, '2018-09-07 11:23:01', '2018-09-07 11:23:01'),
(6, 1, 2, 200000, '2018-09-07 11:23:01', '2018-09-07 11:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(6, 'Nguyen Van Vi', 'nam', 'vanvibgi2@gmail.com', '1243254365', '14325436547658', '1526357485', '2018-09-07 11:23:01', '2018-09-07 11:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `content` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `create_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `create_at`, `update_at`) VALUES
(3, 'tttttt', '<p>ssssss</p>', 'kimi-nawa.jpg', '2018-04-12 15:46:23', NULL),
(5, 'Siêu khuyến mãi', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>', 'promotion_tt.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `amount` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'số lượng',
  `unit_price` float DEFAULT NULL COMMENT 'giá gốc',
  `promotion_price` float DEFAULT NULL COMMENT 'giá khuyến mãi',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new` tinyint(4) DEFAULT '0' COMMENT 'đơn vị tính',
  `view_count` int(11) NOT NULL DEFAULT '0' COMMENT 'lượt xem',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `amount`, `unit_price`, `promotion_price`, `image`, `unit`, `new`, `view_count`, `created_at`, `updated_at`) VALUES
(1, 'Utsuro no Hako to Zero no Maria', 8, '<p>8.96 Ranked #13Popularity #62Members 58,616NovelMikage, Eiji (Story),</p>\r\n\r\n<p>Tetsuo (Art) Add to ListVolumes: 0 /7 Chapters: 0 /40 EditSynopsis Kazuki Hoshino values his everyday life above all else. He spends the days carefree with his friends at school, until the uneventful bliss suddenly comes to a halt with the transfer of the aloof beauty Aya Otonashi into his class and her cold, dramatic statement to him immediately upon arrival: \"I\'m here to break you.</p>\r\n\r\n<p>This is the 13,118th time I\'ve transferred. After so many occasions, I have to say that this is all starting to grate on me, which is why this time I\'m spicing things up with a proper declaration of war.\" And with those puzzling words, the ordinary days that Kazuki loved so dearly become a cycle of turmoil and fear—Aya\'s sudden appearance signals the unraveling of unseen mysteries surrounding Kazuki\'s seemingly normal friends, including the discovery of mysterious devices known as \"boxes.\"</p>', 5, 200000, 180000, 'utsura_sp1.jpg', 'cuốn', 1, 41, '2018-03-28 02:22:09', '2018-09-27 09:13:12'),
(2, 'Monogatari Series: First Season', 8, '<p>This is a story, a \"ghostory\" of sorts, about scars that bond, monsters that haunt, and fakes that deceive. The story of Koyomi Araragi begins through a fateful encounter with the all-powerful, blonde-haired, \"hot-blooded, iron-blooded and cold-blooded\" vampire, later introduced as Shinobu Oshino. Their tragic rendezvous results in the end of Araragi\'s life as a human and his subsequent rebirth as a vampire—a monster. However, this encounter is only the start of his meddlings with the supernatural. Koyomi\'s noble personality ultimately sees him getting further involved in the lives of others with supernatural afflictions. This is his desperate attempt at returning to a normal human life, in a paranormal world filled with nothing but tragedy, suffering, and inhumanity.</p>', 4, 150000, NULL, 'monogatari_sp2.jpg', 'cuốn', 1, 8, '2018-03-28 02:27:10', '2018-09-27 03:18:32'),
(3, 'Ookami to Koushinryou', 8, '<p>8.88 Ranked #19Popularity #178Members 30,166NovelHasekura, Isuna (Story), Ayakura, Juu (Art) Add to ListVolumes: 0 /? Chapters: 0 /? EditSynopsis A young travelling merchant, Kraft Lawrence has become accustomed to days of roaming and trading, with few companions. Or so it was until one peculiar day where the trader finds a young, naked, wolf-like girl asleep in his wagon. The beautiful girl, calling herself Holo, claims to be a local wolf deity worshipped by locals as the God of Good Harvest. Year after year, she ensured they would reap a good harvest, but she has since grown tired of fulfilling the wishes of the ungrateful locals. Holo ends up striking a deal with Kraft: if he helps her escape the villagers, she will gladly help him in his merchant endeavours. Together, they roam from town to town in search of business, and Kraft realizes both the ups and downs of travelling with a haughty and shrewd wolf goddess.</p>', 3, 22000, 21000, 'oakami_sp3.jpg', 'cuốn', 1, 19, '2018-03-28 02:28:59', '2018-09-27 09:09:51'),
(4, 'Tokyo Ghoul', 9, '<p>8.64 Ranked #71Popularity #6Members 186,260MangaYoung JumpIshida, Sui (Story &amp; Art) Add to ListVolumes: 0 /14 Chapters: 0 /144 EditSynopsis Lurking within the shadows of Tokyo are frightening beings known as \"ghouls,\" who satisfy their hunger by feeding on humans once night falls. An organization known as the Commission of Counter Ghoul (CCG) has been established in response to the constant attacks on citizens and as a means of purging these creatures. However, the problem lies in identifying ghouls as they disguise themselves as humans, living amongst the masses so that hunting prey will be easier. Ken Kaneki, an unsuspecting university freshman, finds himself caught in a world between humans and ghouls when his date turns out to be a ghoul after his flesh. Barely surviving this encounter after being taken to a hospital, he discovers that he has turned into a half-ghoul as a result of the surgery he received. Unable to satisfy his intense craving for human meat through conventional means, Kaneki is taken in by friendly ghouls who run a coffee shop in order to help him with his transition. As he begins what he thinks will be a peaceful new life, little does he know that he is about to find himself at the center of a war between his new comrades and the forces of the CCG, and that his new existence has caught the attention of ghouls all over Tokyo.</p>', 1, 30000, 25000, 'tokyo_sp4.jpg', 'cuốn', 1, 1, '2018-03-28 02:31:55', '2018-04-09 09:37:07'),
(5, 'Horimiya', 9, '<p>Although admired at school for her amiability and academic prowess, high school student Kyouko Hori has been hiding another side of her. With her parents often away from home due to work, Hori has to look after her younger brother and do the housework, leaving no chance to socialize away from school. Meanwhile, Izumi Miyamura is seen as a brooding, glasses-wearing otaku. However, in reality, he is a gentle person inept at studying. Furthermore, he has nine piercings hidden behind his long hair and a tattoo along his back and left shoulder. By sheer chance, Hori and Miyamura cross paths outside of school—neither looking as the other expects. These seemingly polar opposites become friends, sharing with each other a side they have never shown to anyone else.</p>', 0, 50000, NULL, 'hori_sp5.jpg', 'cuốn', 1, 5, '2018-03-28 02:34:56', '2018-09-27 03:18:26'),
(6, 'Shokugeki no Souma', NULL, 'Ever since he was a child, fifteen-year-old Souma Yukihira has helped his father by working as the sous chef in the restaurant his father runs and owns. Throughout the years, Souma developed a passion for entertaining his customers with his creative, skilled, and daring culinary creations. His dream is to someday own his family\'s restaurant as its head chef.\r\n\r\nYet when his father suddenly decides to close the restaurant to test his cooking abilities in restaurants around the world, he sends Souma to Tootsuki Culinary Academy, an elite cooking school where only 10 percent of the students graduate. The institution is famous for its \"Shokugeki\" or \"food wars,\" where students face off in intense, high-stakes cooking showdowns.\r\n\r\nAs Souma and his new schoolmates struggle to survive the extreme lifestyle of Tootsuki, more and greater challenges await him, putting his years of learning under his father to the test.', 6, 123, 122, 'shokugeki.jpg', 'cuốn', 1, 3, '2018-04-01 08:05:49', '2018-04-23 00:36:03'),
(7, 'Kimi no Na wa.', NULL, 'Mitsuha Miyamizu, a high school girl, yearns to live the life of a boy in the bustling city of Tokyo—a dream that stands in stark contrast to her present life in the countryside. Meanwhile in the city, Taki Tachibana lives a busy life as a high school student while juggling his part-time job and hopes for a future in architecture.\r\n\r\nOne day, Mitsuha awakens in a room that is not her own and suddenly finds herself living the dream life in Tokyo—but in Taki\'s body! Elsewhere, Taki finds himself living Mitsuha\'s life in the humble countryside. In pursuit of an answer to this strange phenomenon, they begin to search for one another.\r\n\r\nKimi no Na wa. revolves around Mitsuha and Taki\'s actions, which begin to have a dramatic impact on each other\'s lives, weaving them into a fabric held together by fate and circumstance.', 8, 111, 110, 'kimi-nawa.jpg', 'cuốn', 1, 9, '2018-04-01 08:08:14', '2018-09-27 09:05:54'),
(8, 'Steins;Gates', NULL, '<p>The self-proclaimed mad scientist Rintarou Okabe rents out a room in a rickety old building in Akihabara, where he indulges himself in his hobby of inventing prospective \"future gadgets\" with fellow lab members: Mayuri Shiina, his air-headed childhood friend, and Hashida Itaru, a perverted hacker nicknamed \"Daru.\" The three pass the time by tinkering with their most promising contraption yet, a machine dubbed the \"Phone Microwave,\" which performs the strange function of morphing bananas into piles of green gel. Though miraculous in itself, the phenomenon doesn\'t provide anything concrete in Okabe\'s search for a scientific breakthrough; that is, until the lab members are spurred into action by a string of mysterious happenings before stumbling upon an unexpected success—the Phone Microwave can send emails to the past, altering the flow of history. Adapted from the critically acclaimed visual novel by 5pb. and Nitroplus, Steins;Gate takes Okabe through the depths of scientific theory and practicality. Forced across the diverging threads of past and present, Okabe must shoulder the burdens that come with holding the key to the realm of time.</p>', 10, 1111, 111, 'steingatesp.jpg', 'cuốn', 1, 0, '2018-04-01 08:11:07', '2018-04-12 15:38:14'),
(9, 'Koe no Katachi', NULL, '<p>As a wild youth, elementary school student Shouya Ishida sought to beat boredom in the cruelest ways. When the deaf Shouko Nishimiya transfers into his class, Shouya and the rest of his class thoughtlessly bully her for fun. However, when her mother notifies the school, he is singled out and blamed for everything done to her. With Shouko transferring out of the school, Shouya is left at the mercy of his classmates. He is heartlessly ostracized all throughout elementary and middle school, while teachers turn a blind eye. Now in his third year of high school, Shouya is still plagued by his wrongdoings as a young boy. Sincerely regretting his past actions, he sets out on a journey of redemption: to meet Shouko once more and make amends. Koe no Katachi tells the heartwarming tale of Shouya\'s reunion with Shouko and his honest attempts to redeem himself, all while being continually haunted by the shadows of his past.</p>', 7, 222, 223, 'koenotachi_sps.jpg', 'cuốn', 1, 2, '2018-04-01 08:12:20', '2018-04-23 00:36:09'),
(10, 'Shigatsu wa Kimi no Uso', NULL, 'Music accompanies the path of the human metronome, the prodigious pianist Kousei Arima. But after the passing of his mother, Saki Arima, Kousei falls into a downward spiral, rendering him unable to hear the sound of his own piano.\r\n\r\nTwo years later, Kousei still avoids the piano, leaving behind his admirers and rivals, and lives a colorless life alongside his friends Tsubaki Sawabe and Ryouta Watari. However, everything changes when he meets a beautiful violinist, Kaori Miyazono, who stirs up his world and sets him on a journey to face music again.\r\n\r\nBased on the manga series of the same name, Shigatsu wa Kimi no Uso approaches the story of Kousei\'s recovery as he discovers that music is more than playing each note perfectly, and a single melody can bring in the fresh spring air of April.', 9, 333, NULL, 'am-nhac.jpg', 'cuốn', 1, 2, '2018-04-01 08:14:00', '2018-04-09 02:39:25'),
(11, 'Sword Art Online', NULL, 'In the year 2022, virtual reality has progressed by leaps and bounds, and a massive online role-playing game called Sword Art Online (SAO) is launched. With the aid of \"NerveGear\" technology, players can control their avatars within the game using nothing but their own thoughts.\r\n\r\nKazuto Kirigaya, nicknamed \"Kirito,\" is among the lucky few enthusiasts who get their hands on the first shipment of the game. He logs in to find himself, with ten-thousand others, in the scenic and elaborate world of Aincrad, one full of fantastic medieval weapons and gruesome monsters. However, in a cruel turn of events, the players soon realize they cannot log out; the game\'s creator has trapped them in his new world until they complete all one hundred levels of the game.\r\n\r\nIn order to escape Aincrad, Kirito will now have to interact and cooperate with his fellow players. Some are allies, while others are foes, like Asuna Yuuki, who commands the leading group attempting to escape from the ruthless game. To make matters worse, Sword Art Online is not all fun and games: if they die in Aincrad, they die in real life. Kirito must adapt to his new reality, fight for his survival, and hopefully break free from his virtual hell.', 11, 444, NULL, 'sao_sp.jpg', 'cuốn', 1, 5, '2018-04-01 08:16:57', '2018-09-27 09:19:00'),
(12, 'Conan', NULL, '<p><span style=\"color:rgb(0, 0, 0); font-family:verdana,arial; font-size:11px\">Hailed as the savior of the Japanese Police Department, high school detective Shinichi Kudou uses a combination of observational skills, critical thinking, and all-around knowledge to solve cases that leave the police stumped.&nbsp;</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:verdana,arial; font-size:11px\">One day, while at an outing with childhood friend Ran Mouri, Shinichi bears witness to a suspicious transaction between two men and is caught. As a result, he is forced to ingest a poison that is supposed to kill him, but unexpectedly shrinks his body to the size of a grade-schooler instead. Now believed to be dead, Shinichi takes up the alias of Conan Edogawa (a compound of the names of the famous mystery authors Arthur Conan Doyle and Ranpo Edogawa) in order to hide his identity and begins his new life as a seven-year-old living with Ran and her private detective father.&nbsp;</span><br />\r\n<br />\r\n<em>Detective Conan</em><span style=\"color:rgb(0, 0, 0); font-family:verdana,arial; font-size:11px\">&nbsp;follows Conan as he continues to solve murder cases, all while slowly working toward exposing the men who shrunk him and eventually restoring his body.</span></p>', 7, 123, 122, 'conan_sp.jpg', 'cuốn', 1, 1, '2018-04-27 04:20:52', '2018-04-27 04:23:22'),
(13, 're tesst', NULL, '<p>re tesst</p>', 12, 123, 12, 'dnY0_images1294408_chuoi4.jpg', 'sa', 1, 0, '2018-09-07 11:05:10', '2018-09-07 11:05:10'),
(16, '23454656778', NULL, '<p>4354</p>', 32432, 324, 234, 'Screenshot (5).png', '32423', 1, 0, '2018-09-10 06:40:56', '2018-09-10 06:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `product_author`
--

CREATE TABLE `product_author` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_author`
--

INSERT INTO `product_author` (`product_id`, `author_id`) VALUES
(1, 6),
(2, 7),
(3, 1),
(4, 8),
(5, 5),
(12, 1),
(13, 4),
(13, 9),
(16, 9);

-- --------------------------------------------------------

--
-- Table structure for table `product_promotion`
--

CREATE TABLE `product_promotion` (
  `sp_id` int(11) UNSIGNED NOT NULL,
  `km_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_promotion`
--

INSERT INTO `product_promotion` (`sp_id`, `km_id`) VALUES
(6, 1),
(1, 5),
(3, 5),
(5, 1),
(8, 3),
(11, 4);

-- --------------------------------------------------------

--
-- Table structure for table `product_type_detail`
--

CREATE TABLE `product_type_detail` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_type_detail`
--

INSERT INTO `product_type_detail` (`product_id`, `type_id`) VALUES
(12, 2),
(1, 3),
(1, 5),
(2, 2),
(3, 1),
(4, 3),
(5, 1),
(5, 5),
(6, 4),
(6, 11),
(6, 12),
(7, 1),
(7, 3),
(7, 6),
(7, 11),
(7, 12),
(8, 13),
(9, 3),
(9, 11),
(9, 15),
(10, 1),
(10, 3),
(10, 11),
(10, 15),
(10, 16),
(11, 1),
(11, 2),
(11, 7),
(11, 17),
(11, 18),
(12, 1),
(12, 2),
(12, 5),
(12, 8),
(12, 11),
(13, 7),
(13, 13),
(13, 19),
(16, 2);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(4) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `discount` float NOT NULL COMMENT '% off'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `name`, `status`, `start`, `end`, `discount`) VALUES
(1, 'test km', 0, '2018-09-08', '2018-10-12', 20),
(3, 'giảm 50%', 1, '2018-09-13', '2018-12-22', 50),
(4, 'giảm 10%', 1, '2018-06-28', '2018-07-29', 10),
(5, 'tết nguyên đán giảm 70%', 1, '2018-09-12', '2018-11-24', 70);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `link` varchar(100) CHARACTER SET utf8 NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `link`, `image`) VALUES
(2, '1', 'slide2.jpg'),
(3, '2', 'slide1.jpeg'),
(4, '3', 'slide_novel.jpg'),
(5, '5', 'slide_novel2.jpg'),
(6, '6', 'conan_1920x1080.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `type_details`
--

CREATE TABLE `type_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_details`
--

INSERT INTO `type_details` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Romance', '<p>Tình cảmss</p>', 'romance_tl.jpg', NULL, '2018-04-28 03:23:32'),
(2, 'Tesst km 2', '', 'acction_tl.jpg', NULL, '2018-09-08 03:29:43'),
(3, 'Drama', '<p>Bi kịch</p>', 'drama_tl.jpg', NULL, '2018-04-28 03:24:32'),
(4, 'Comedy', '<p>Hài hước</p>', 'h6hb_comdey_tl.jpg', NULL, '2018-04-28 03:24:51'),
(5, 'Trinh Thám', 'từ từ sẽ có mạng chậm quá', 'conan_1920x1080.jpg', '2018-03-30 08:29:05', '2018-03-30 08:29:05'),
(6, 'Supernatural', 'Siêu nhiên', 'utsura_sp1.jpg', '2018-04-01 07:59:37', '2018-04-01 07:59:37'),
(7, 'Adventure', 'Thám hiểm', 'conan91.png', '2018-04-01 08:00:05', '2018-04-01 08:00:05'),
(8, 'Psychological', 'Tâm lý', 'utsura_sp1.jpg', '2018-04-01 08:00:45', '2018-04-01 08:00:45'),
(9, 'Harem', 'Hậu cung', 'monogatari_sp2.jpg', '2018-04-01 08:01:06', '2018-04-01 08:01:06'),
(10, 'Ecchi', '++', 'Eromanga-sensei_sp.jpg', '2018-04-01 08:02:13', '2018-04-01 08:02:13'),
(11, 'School', 'Học đường', 'sae_sp.jpg', '2018-04-01 08:02:49', '2018-04-01 08:02:49'),
(12, 'Life', 'Cuộc sống', 'oakami_sp3.jpg', '2018-04-01 08:03:03', '2018-04-01 08:03:03'),
(13, 'Sci-Fi', 'Người máy', 'scifi_type.jpg', '2018-04-01 08:09:53', '2018-04-01 08:09:53'),
(15, 'Shounen', 'Con trai', 'sae_sp.jpg', '2018-04-01 08:11:35', '2018-04-01 08:11:35'),
(16, 'Music', 'Âm nhạc', 'am-nhac.jpg', '2018-04-01 08:13:07', '2018-04-01 08:13:07'),
(17, 'Game', 'Trò chơi', 'game.jpg', '2018-04-01 08:14:43', '2018-04-01 08:14:43'),
(18, 'Fantasy', 'Tưởng tượng', 'fantasy.jpg', '2018-04-01 08:15:24', '2018-04-01 08:15:24'),
(19, 'Seinen', 'Người lớn', 'seinen_type.jpg', '2018-04-01 08:21:12', '2018-04-01 08:21:12'),
(20, 'Mystery', 'Huyền bí', 'mystery_type.jpg', '2018-04-01 08:23:08', '2018-04-01 08:23:08'),
(21, 'Horror', 'Kinh dị', 'horror_type.jpg', '2018-04-01 08:24:38', '2018-04-01 08:24:38'),
(22, 're tesst', '<p>re tesst</p>', 'images1294408_chuoi4.jpg', '2018-09-07 11:04:19', '2018-09-07 11:04:19');

-- --------------------------------------------------------

--
-- Table structure for table `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(8, 'Light Novel', 'Light novel là một dòng tiểu thuyết Nhật Bản vốn nhằm vào giới độc giả là các học sinh trung học cơ sở hay trung học phổ thông. Từ tiếng Anh \"raito noberu\" là một họa chế Anh ngữ, tức là một từ mượn Nhật Bản có gốc từ tiếng Anh \"light novel\"', 'light_novel_type.jpg', '2018-03-28 02:03:48', '2018-03-28 02:03:48'),
(9, 'Manga', 'Manga là một cụm từ trong tiếng Nhật để chỉ các loại truyện tranh và tranh biếm họa nói chung của các nước trên thế giới.', 'manga-type.jpg', '2018-03-28 02:09:27', '2018-03-28 02:09:27'),
(10, 'Comic', 'Truyện tranh, là những câu chuyện đã xảy ra trong cuộc sống hay những chuyện được tưởng tượng ra được thể hiện qua những bức tranh có hoặc không kèm lời thoại hay các từ ngữ, câu văn kể chuyện.', 'comic_type.jpg', '2018-03-28 02:14:55', '2018-03-28 02:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0' COMMENT '1:admin 2:nhanvien 0:thuong',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `level`, `password`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Hương Hương', 'huonghuong08.php@gmail.com', 0, '$2y$10$rGY4KT6ZSMmLnxIbmTXrsu2xdgRxm8x0UTwCyYCAzrJ320kYheSRq', '23456789', 'Hoàng Diệu 2', NULL, '2017-03-23 07:17:33', '2017-03-23 07:17:33'),
(12, 'Kudo Vĩ 2', 'vanvibig@gmail.com', 1, '$2y$10$/KzP2ER9f.lKNUMqmtW81uWPw/3656b6mFRC8z69kl6kNrrVx92jy', '009876543 2', 'Cần THơ 2', 'vmHQ3Wh9pMCc14hvAmkesVVe0vvqJAhlp55EsEME0OyJDUsMiTlBeXcFbBE8', '2018-03-21 08:12:00', '2018-03-22 02:53:41'),
(13, 'Kudo Vĩ 3', 'kv@gmail.com', 2, '$2y$10$KnLSRDrx6zqnxZFJTtMi9ORT5PPBCCJEFPO.8EFC.PFWeWjHnH.om', '09876543', 'Cần THơ', 'vlfygoOIIMypfYf9338rTkCsdo4E5mytDYs7KQJLFT0AD4PF1tZ1kOz6JN9b', '2018-03-25 08:08:42', '2018-04-03 08:16:06'),
(18, 'kv3', 'kv3@gmail.com', 0, '$2y$10$/Xctj2ZewPtmQrqsL9ee1.LtEL8TnB3tFdPyt3llrfMAQ68m7Blga', '123456789', 'ct', NULL, '2018-04-28 08:15:18', '2018-04-28 08:36:11'),
(19, 'kv4', 'kv4@gmail.com', 2, '$2y$10$iCndqIjJM9eXFIri/MgHqOsX4XRwoupHYI9ZHi.jKxWqCsYf8uQe.', '012345678', 'ct', 'aeTgAogb8SWWYvvvss2UqucObRJhkhps7MUtMTs2ybjnAtsTGrR0OW3E8tly', '2018-04-28 08:22:01', '2018-04-28 08:56:45'),
(20, 're tesst', 'test@kv.com', 0, '$2y$10$.M8exxlIA8QQIcwRvVC03.d47Qlhu2ZmCN7hspsy25QlS1y/1yfJC', '123456', '111 Hai Bà Trưng, Bến Nghé, District 1, Ho Chi Minh City, Vietnam, 111, Hai Bà Trưng', NULL, '2018-09-07 11:05:49', '2018-09-07 11:05:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`id_customer`);

--
-- Indexes for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD KEY `id_bill` (`id_bill`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_author`
--
ALTER TABLE `product_author`
  ADD PRIMARY KEY (`product_id`,`author_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `product_promotion`
--
ALTER TABLE `product_promotion`
  ADD KEY `sp_id` (`sp_id`),
  ADD KEY `km_id` (`km_id`);

--
-- Indexes for table `product_type_detail`
--
ALTER TABLE `product_type_detail`
  ADD KEY `fk_to_theloai` (`type_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_details`
--
ALTER TABLE `type_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `type_details`
--
ALTER TABLE `type_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `fk_bill_to_customer` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD CONSTRAINT `fk_billdetail_to_bill` FOREIGN KEY (`id_bill`) REFERENCES `bills` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_billdetail_to_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `product_author`
--
ALTER TABLE `product_author`
  ADD CONSTRAINT `fk_to_author` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_to_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `product_promotion`
--
ALTER TABLE `product_promotion`
  ADD CONSTRAINT `fk_to_khuyenmai` FOREIGN KEY (`km_id`) REFERENCES `promotions` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_to_sanpham` FOREIGN KEY (`sp_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `product_type_detail`
--
ALTER TABLE `product_type_detail`
  ADD CONSTRAINT `fk_to_sanpham2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_to_theloai` FOREIGN KEY (`type_id`) REFERENCES `type_details` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
