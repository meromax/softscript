-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Фев 07 2014 г., 20:40
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `softscript`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin_tbl`
--

DROP TABLE IF EXISTS `admin_tbl`;
CREATE TABLE IF NOT EXISTS `admin_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET cp1251 DEFAULT NULL,
  `email` varchar(96) CHARACTER SET cp1251 NOT NULL DEFAULT '',
  `name` varchar(255) DEFAULT NULL,
  `last_login` date DEFAULT NULL,
  `pw` varchar(15) CHARACTER SET cp1251 DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `active` int(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `admin_tbl`
--

INSERT INTO `admin_tbl` (`id`, `username`, `email`, `name`, `last_login`, `pw`, `status`, `active`) VALUES
(1, 'admin', 'admin@softscript.ru', 'admin', '2014-02-04', '1111111', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` int(11) NOT NULL DEFAULT '0',
  `lang_id` int(11) NOT NULL DEFAULT '1',
  `description` text NOT NULL,
  `description_short` text,
  `section_id` int(11) DEFAULT '0',
  `category_id` int(11) DEFAULT '0',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` text,
  `meta_link_title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `title` (`title`,`description`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `link`, `post_date`, `active`, `lang_id`, `description`, `description_short`, `section_id`, `category_id`, `meta_title`, `meta_description`, `meta_keywords`, `meta_link_title`) VALUES
(5, 'Минск: неопытный водитель хотел проехать между УАЗом и Hyundai, его Audi зажало', 'minsk-neopytnyy-voditel-hotel-proehat-mezhdu-uazom-i-hyundai-ego-audi-zazhalo.html', '2014-01-29 11:58:56', 0, 1, '<p>Молодой человек не мог выйти из Audi до прибытия сотрудников Госавтоинспекции &mdash; с обеих сторон двери его автомобиля оказались заблокированы в результате ДТП. По словам Любови Трепашко, старшего инспектора ГАИ Московского района, за рулем Audi находился трезвый водитель. Можно предположить, что он просто не рассчитал габариты своей машины из-за неопытности.</p>\r\n', '<p>Молодой человек не мог выйти из Audi до прибытия сотрудников Госавтоинспекции &mdash; с обеих сторон двери его автомобиля оказались заблокированы в результате ДТП. По словам Любови Трепашко, старшего инспектора ГАИ Московского района, за рулем Audi находился трезвый водитель. Можно предположить, что он просто не рассчитал габариты своей машины из-за неопытности.</p>\r\n', 3, 0, 'Минск: неопытный водитель хотел проехать между УАЗом и Hyundai, его Audi зажало', 'Минск: неопытный водитель хотел проехать между УАЗом и Hyundai, его Audi зажало', 'Минск: неопытный водитель хотел проехать между УАЗом и Hyundai, его Audi зажало', NULL),
(6, 'Девушка, припарковавшаяся четвертым рядом, набросилась на активистов «СтопХам» с битой', 'devushka-priparkovavshayasya-chetvertym-ryadom-nabrosilas-na-aktivistov-stopham-s-bitoy.html', '2014-01-29 12:00:16', 0, 1, '<p>Сегодня водитель Hyundai, которая припарковалась на одной из московских улиц четвертым (!) рядом, проснулась знаменитой. Она попала в ролик активистов &laquo;СтопХам&raquo; и была единственной, чью реакцию нельзя назвать адекватной. В ответ на просьбу убрать автомобиль водитель стала ругаться матом и даже набросилась на представителей движения с битой. В конфликт вмешались сотрудники ДПС.<br />\r\n<br />\r\nОднако и в разговоре с ними водитель Hyundai не захотела признавать вину. Вероятно, правила остановки и стоянки она забыла сразу после получения прав. Нужно отметить, что большинство водителей теперь реагируют на просьбу перепарковаться вполне доброжелательно.</p>\r\n', '<p>Сегодня водитель Hyundai, которая припарковалась на одной из московских улиц четвертым (!) рядом, проснулась знаменит</p>\r\n', 3, 0, 'Девушка, припарковавшаяся четвертым рядом, набросилась на активистов «СтопХам» с битой', 'Девушка, припарковавшаяся четвертым рядом, набросилась на активистов «СтопХам» с битой', 'Девушка, припарковавшаяся четвертым рядом, набросилась на активистов «СтопХам» с битой', NULL),
(9, 'Сигареты Parliament', 'sigarety-parliament.html', '2014-02-06 16:06:51', 0, 1, '<p>Табак в них довольно приятный, но слишком мягкий вкус, как такового дыма практически не чувствуется, крепости нету (на языке курильщиков &ndash; с них не накуриваешься). Хотя в этом и заключается плюс, в отличии от дешевых сортов после парламента нет неприятного горького привкуса, зато есть некая приторность.</p>\r\n\r\n<p>За что у нас любят это г*вно? Ну за что? Вкус горелой бумаги, запах жженной тряпки, ужасно сушит горло, стоимость заоблачная. Я много раз бывал за границей, там эти сигареты дешевле, чем Бонд. И такие же противные. У нас они почти самые дорогие. И любой молодой прожигатель жизни или молодая богатенькая тусовщица курит именно их. И потом жалуется, что в горле першит, а денег нет.</p>\r\n', '<p>Табак в них довольно приятный, но слишком мягкий вкус, как такового дыма практически не чувствуется, крепости нету (на языке курильщиков &ndash; с них не накуриваешься). Хотя в этом и заключается плюс, в отличии от дешевых сортов после парламента нет неприятного горького привкуса, зато есть некая приторность.</p>\r\n', 2, 1, 'Сигареты Parliament', 'Сигареты Parliament', 'Сигареты Parliament', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `articles_sections`
--

DROP TABLE IF EXISTS `articles_sections`;
CREATE TABLE IF NOT EXISTS `articles_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description_short` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` text,
  `meta_link_title` varchar(255) DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `position` int(11) NOT NULL DEFAULT '0',
  `lang_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `articles_sections`
--

INSERT INTO `articles_sections` (`id`, `title`, `description_short`, `description`, `link`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `meta_link_title`, `post_date`, `position`, `lang_id`) VALUES
(3, 'Автомобили', '', '', 'avtomobili', '', 'Автомобили', 'Автомобили', 'Автомобили', NULL, '2014-02-06 14:24:26', 1, 1),
(2, 'Сигареты', '<p>С момента своего основания в 2008-м году наша компания выполнила множество сложных и оригинальных проектов. Быстрая и качественная работа, персональный подход к каждому клиенту и надежность наших продуктов &ndash; это то, что ценят наши заказчики.</p>\r', '<p>С момента своего основания в 2008-м году наша компания выполнила множество сложных и оригинальных проектов. Быстрая и качественная работа, персональный подход к каждому клиенту и надежность наших продуктов &ndash; это то, что ценят наши заказчики.</p>\r\n', 'sigarety', '', 'Сигареты', 'Сигареты', 'Сигареты', NULL, '2014-02-06 14:24:46', 2, 1),
(4, 'Бухло', '', '', 'buhlo', '', 'Бухло', 'Бухло', 'Бухло', NULL, '2014-02-06 14:25:05', 3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `articles_sections_sub`
--

DROP TABLE IF EXISTS `articles_sections_sub`;
CREATE TABLE IF NOT EXISTS `articles_sections_sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description_short` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` text,
  `meta_link_title` varchar(255) DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lang_id` int(11) NOT NULL DEFAULT '1',
  `position` int(11) NOT NULL DEFAULT '0',
  `section_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `articles_sections_sub`
--

INSERT INTO `articles_sections_sub` (`id`, `title`, `description_short`, `description`, `link`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `meta_link_title`, `post_date`, `lang_id`, `position`, `section_id`) VALUES
(1, 'Парламент', '', '', 'parlament', '', 'Парламент', 'Парламент', 'Парламент', NULL, '2014-02-06 15:37:03', 1, 1, 2),
(4, 'Acura', '', '', 'acura', '', 'Acura', 'Acura', 'Acura', NULL, '2014-02-06 14:26:19', 1, 1, 3),
(5, 'Alfa Romeo', '', '', 'alfa-romeo', '', 'Alfa Romeo', 'Alfa Romeo', 'Alfa Romeo', NULL, '2014-02-06 14:26:44', 1, 2, 3),
(6, 'Aston Martin', '', '', 'aston-martin', '', 'Aston Martin', 'Aston Martin', 'Aston Martin', NULL, '2014-02-06 14:27:29', 1, 3, 3),
(7, 'Беломорканал', '', '', 'belomorkanal', '', 'Беломорканал', 'Беломорканал', 'Беломорканал', NULL, '2014-02-06 15:37:35', 1, 2, 2),
(8, 'Водка', '', '', 'vodka', '', 'Водка', 'Водка', 'Водка', NULL, '2014-02-06 15:38:06', 1, 1, 4),
(9, 'Виски', '', '', 'viski', '', 'Виски', 'Виски', 'Виски', NULL, '2014-02-06 15:38:28', 1, 2, 4),
(10, 'Вино', '', '', 'vino', '', 'Вино', 'Вино', 'Вино', NULL, '2014-02-06 15:39:05', 1, 3, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL DEFAULT '',
  `title` text NOT NULL,
  `description` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_link_title` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `position` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `type` int(1) DEFAULT '0',
  `lang_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  FULLTEXT KEY `title` (`title`,`description`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

--
-- Структура таблицы `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `link` varchar(255) DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` text,
  `lang_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Дамп данных таблицы `brands`
--

INSERT INTO `brands` (`id`, `title`, `description`, `link`, `post_date`, `meta_title`, `meta_description`, `meta_keywords`, `lang_id`) VALUES
(1, 'Magic Systems', '&nbsp;', 'magic-systems', '2013-01-05 22:16:26', 'Magic Systems', 'Противоугонные комплексы Magic Systems в СПб', 'ms 600, сталкер ms 600, ms 600 light, pgsm, ms 530, ms pgsm', 1),
(19, 'DF', '&nbsp;', 'df', '2013-01-05 22:35:36', 'DF', 'Автосигнализации и иммобилайзеры DF в СПб', 'df key, иммобилайзер df key, df mf, иммобилайзер df mf, df di, иммобилайзер df di', 1),
(23, 'Scher-Khan', '&nbsp;', 'scher-khan', '2013-01-21 06:30:06', 'Scher-Khan', 'Автосигнализации Scher-Khan в СПб', 'шерхан, шерхан сигнализация, scher khan, scher khan magicar, сигнализация scher khan, брелок scher khan', 1),
(24, 'StarLine', '&nbsp;', 'starline', '2013-01-21 06:31:49', 'StarLine', 'Автосигнализации и иммобилайзеры StarLine в СПб', 'starline, сигнализация starline, starline dialog, брелок starline, автосигнализация starline, купить starline', 1),
(25, 'Pandora', '&nbsp;', 'pandora', '2013-01-21 06:36:12', 'Pandora', 'Автосигнализации Pandora в СПб', 'pandora dxl, pandora 3210, pandora сигнализация, pandora 5000, pandora dxl 3210, pandora купить', 1),
(26, 'I-ROOT', '&nbsp;', 'i-root', '2013-01-21 08:51:42', 'I-ROOT', 'Противоугонные системы I-ROOT в СПб', 'i root, i root gsm, сигнализация +i root, i root gsm отзывы, сигнализация +i root gsm', 1),
(27, 'Agent', '&nbsp;', 'agent', '2013-01-21 08:54:33', 'Agent ', 'Иммобилайзеры Agent в Санкт-Петербурге', 'agent 3, agent 3 plus, agent light, agent лайт', 1),
(28, 'Pandect', '&nbsp;', 'pandect', '2013-01-22 09:25:59', 'Pandect', 'Иммобилайзеры Pandect в Санкт-Петербурге', 'pandect, иммобилайзер pandect, пандект, иммобилайзер пандект', 1),
(30, 'SkyBrake', '&nbsp;', 'skybrake', '2013-01-22 09:30:27', 'SkyBrake', 'Иммобилайзеры SkyBrake в Санкт-Петербурге', 'skybrake, skybrake dd2, иммобилайзер skybrake, skybrake dd 2', 1),
(31, 'Defen Time', '&nbsp;', 'defen-time', '2013-01-22 09:35:46', 'Defen Time', 'Замки Defen Time в Санкт-Петербурге', 'defen time, замок defen time, defen time doorlock, замок капота defen time, defen time купить', 1),
(33, 'Gearlock', '&nbsp;', 'gearlock', '2013-01-22 09:39:08', 'Gearlock', 'Замки Gearlock в Санкт-Петербурге', 'gearlock, gearlock 2, gearlock купить, замок gearlock', 1),
(34, 'Megalock', '&nbsp;', 'megalock', '2013-01-22 09:40:41', 'Megalock', 'Замки Megalock в Санкт-Петербурге', 'megalock, замок megalock, замок капота megalock, megalock купить, замок капота механический megalock', 1),
(35, 'Гарант', '&nbsp;', 'garant', '2013-01-22 09:42:58', 'Гарант', 'Замки Гарант в Санкт-Петербурге', 'гарант блок, гарант люкс, гарант блок люкс, замок гарант, гарант блокиратор', 1),
(36, 'Атлет', '&nbsp;', 'atlet', '2013-01-22 09:44:33', 'Атлет', 'Замки Атлет в Санкт-Петербурге', 'атлет neo, атлет neo electro', 1),
(37, 'FindMe', '&nbsp;', 'findme', '2013-01-23 07:30:05', 'FindMe', 'GPS маяки FindMe в Санкт-Петербурге', 'findme, маяк findme, findme gps, gps маяк findme, findme купить', 1),
(38, 'Pharaon', '&nbsp;', 'pharaon', '2013-02-11 10:04:49', 'Pharaon', 'Автосигнализации Pharaon', 'pharaon сигнализация, pharaon автосигнализация, pharaon цена, pharaon x160', 1),
(39, 'Sheriff', '&nbsp;', 'sheriff', '2013-02-11 11:20:37', 'Sheriff', 'Автосигнализации Sheriff', 'сигнализация sheriff, автосигнализация sheriff, купить sheriff, sheriff aps, sheriff zx', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `content`
--

DROP TABLE IF EXISTS `content`;
CREATE TABLE IF NOT EXISTS `content` (
  `content_id` int(10) NOT NULL AUTO_INCREMENT,
  `short_description` varchar(255) NOT NULL DEFAULT '',
  `lang_id` int(11) NOT NULL DEFAULT '1',
  `long_description` text,
  PRIMARY KEY (`content_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `content`
--

INSERT INTO `content` (`content_id`, `short_description`, `lang_id`, `long_description`) VALUES
(1, 'Homepage', 0, NULL),
(2, 'Resources', 0, NULL),
(3, 'About Us', 0, NULL),
(4, 'FAQ', 0, NULL),
(5, 'Contact Us', 0, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `cod2` varchar(2) DEFAULT NULL,
  `cod3` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=247 ;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `title`, `cod2`, `cod3`) VALUES
(1, 'Аруба\r\n', 'AW', 'ABW'),
(2, 'Афганистан\r\n', 'AF', 'AFG'),
(3, 'Ангола\r\n', 'AO', 'AGO'),
(4, 'Ангилья\r\n', 'AI', 'AIA'),
(5, 'Эландские острова\r\n', 'AX', 'ALA'),
(6, 'Албания\r\n', 'AL', 'ALB'),
(7, 'Андорра\r\n', 'AD', 'AND'),
(8, 'Нидерландские Антилы\r\n', 'AN', 'ANT'),
(9, 'Объединенные Арабские Эмираты\r\n', 'AE', 'ARE'),
(10, 'Аргентина\r\n', 'AR', 'ARG'),
(11, 'Армения\r\n', 'AM', 'ARM'),
(12, 'Американское Самоа\r\n', 'AS', 'ASM'),
(13, 'Антарктида\r\n', 'AQ', 'ATA'),
(14, 'Французские Южные территории\r\n', 'TF', 'ATF'),
(15, 'Антигуа и Барбуда\r\n', 'AG', 'ATG'),
(16, 'Австралия\r\n', 'AU', 'AUS'),
(17, 'Австрия\r\n', 'AT', 'AUT'),
(18, 'Азербайджан\r\n', 'AZ', 'AZE'),
(19, 'Бурунди\r\n', 'BI', 'BDI'),
(20, 'Бельгия\r\n', 'BE', 'BEL'),
(21, 'Бенин\r\n', 'BJ', 'BEN'),
(22, 'Буркина-Фасо\r\n', 'BF', 'BFA'),
(23, 'Бангладеш\r\n', 'BD', 'BGD'),
(24, 'Болгария\r\n', 'BG', 'BGR'),
(25, 'Бахрейн\r\n', 'BH', 'BHR'),
(26, 'Багамы\r\n', 'BS', 'BHS'),
(27, 'Босния и Герцеговина\r\n', 'BA', 'BIH'),
(28, 'Сен-Бартельми\r\n', 'BL', 'BLM'),
(29, 'Беларусь\r\n', 'BY', 'BLR'),
(30, 'Белиз\r\n', 'BZ', 'BLZ'),
(31, 'Бермуды\r\n', 'BM', 'BMU'),
(32, 'Боливия\r\n', 'BO', 'BOL'),
(33, 'Бразилия\r\n', 'BR', 'BRA'),
(34, 'Барбадос\r\n', 'BB', 'BRB'),
(35, 'Бруней-Даруссалам\r\n', 'BN', 'BRN'),
(36, 'Бутан\r\n', 'BT', 'BTN'),
(37, 'Остров Буве\r\n', 'BV', 'BVT'),
(38, 'Ботсвана\r\n', 'BW', 'BWA'),
(39, 'Центрально-Африканская Республика\r\n', 'CF', 'CAF'),
(40, 'Канада\r\n', 'CA', 'CAN'),
(41, 'Кокосовые (Килинг) острова\r\n', 'CC', 'CCK'),
(42, 'Швейцария\r\n', 'CH', 'CHE'),
(43, 'Чили\r\n', 'CL', 'CHL'),
(44, 'Китай\r\n', 'CN', 'CHN'),
(45, 'Кот д''Ивуар\r\n', 'CI', 'CIV'),
(46, 'Камерун\r\n', 'CM', 'CMR'),
(47, 'Конго, Демократическая Республика\r\n', 'CD', 'COD'),
(48, 'Конго\r\n', 'CG', 'COG'),
(49, 'Острова Кука\r\n', 'CK', 'COK'),
(50, 'Колумбия\r\n', 'CO', 'COL'),
(51, 'Коморы\r\n', 'KM', 'COM'),
(52, 'Кабо-Верде\r\n', 'CV', 'CPV'),
(53, 'Коста-Рика\r\n', 'CR', 'CRI'),
(54, 'Куба\r\n', 'CU', 'CUB'),
(55, 'Остров Рождества\r\n', 'CX', 'CXR'),
(56, 'Острова Кайман\r\n', 'KY', 'CYM'),
(57, 'Кипр\r\n', 'CY', 'CYP'),
(58, 'Чешская Республика\r\n', 'CZ', 'CZE'),
(59, 'Германия\r\n', 'DE', 'DEU'),
(60, 'Джибути\r\n', 'DJ', 'DJI'),
(61, 'Доминика\r\n', 'DM', 'DMA'),
(62, 'Дания\r\n', 'DK', 'DNK'),
(63, 'Доминиканская Республика\r\n', 'DO', 'DOM'),
(64, 'Алжир\r\n', 'DZ', 'DZA'),
(65, 'Эквадор\r\n', 'EC', 'ECU'),
(66, 'Египет\r\n', 'EG', 'EGY'),
(67, 'Эритрея\r\n', 'ER', 'ERI'),
(68, 'Западная Сахара\r\n', 'EH', 'ESH'),
(69, 'Испания\r\n', 'ES', 'ESP'),
(70, 'Эстония\r\n', 'EE', 'EST'),
(71, 'Эфиопия\r\n', 'ET', 'ETH'),
(72, 'Финляндия\r\n', 'FI', 'FIN'),
(73, 'Фиджи\r\n', 'FJ', 'FJI'),
(74, 'Фолклендские острова (Мальвинские)\r\n', 'FK', 'FLK'),
(75, 'Франция\r\n', 'FR', 'FRA'),
(76, 'Фарерские острова\r\n', 'FO', 'FRO'),
(77, 'Микронезия, Федеративные Штаты\r\n', 'FM', 'FSM'),
(78, 'Габон\r\n', 'GA', 'GAB'),
(79, 'Соединенное Королевство\r\n', 'GB', 'GBR'),
(80, 'Грузия\r\n', 'GE', 'GEO'),
(81, 'Гернси\r\n', 'GG', 'GGY'),
(82, 'Гана\r\n', 'GH', 'GHA'),
(83, 'Гибралтар\r\n', 'GI', 'GIB'),
(84, 'Гвинея\r\n', 'GN', 'GIN'),
(85, 'Гваделупа\r\n', 'GP', 'GLP'),
(86, 'Гамбия\r\n', 'GM', 'GMB'),
(87, 'Гвинея-Бисау\r\n', 'GW', 'GNB'),
(88, 'Экваториальная Гвинея\r\n', 'GQ', 'GNQ'),
(89, 'Греция\r\n', 'GR', 'GRC'),
(90, 'Гренада\r\n', 'GD', 'GRD'),
(91, 'Гренландия\r\n', 'GL', 'GRL'),
(92, 'Гватемала\r\n', 'GT', 'GTM'),
(93, 'Французская Гвиана\r\n', 'GF', 'GUF'),
(94, 'Гуам\r\n', 'GU', 'GUM'),
(95, 'Гайана\r\n', 'GY', 'GUY'),
(96, 'Гонконг\r\n', 'HK', 'HKG'),
(97, 'Остров Херд и острова Макдональд\r\n', 'HM', 'HMD'),
(98, 'Гондурас\r\n', 'HN', 'HND'),
(99, 'Хорватия\r\n', 'HR', 'HRV'),
(100, 'Гаити\r\n', 'HT', 'HTI'),
(101, 'Венгрия\r\n', 'HU', 'HUN'),
(102, 'Индонезия\r\n', 'ID', 'IDN'),
(103, 'Остров Мэн\r\n', 'IM', 'IMN'),
(104, 'Индия\r\n', 'IN', 'IND'),
(105, 'Британская территория в Индийском океане\r\n', 'IO', 'IOT'),
(106, 'Ирландия\r\n', 'IE', 'IRL'),
(107, 'Иран, Исламская Республика\r\n', 'IR', 'IRN'),
(108, 'Ирак\r\n', 'IQ', 'IRQ'),
(109, 'Исландия\r\n', 'IS', 'ISL'),
(110, 'Израиль\r\n', 'IL', 'ISR'),
(111, 'Италия\r\n', 'IT', 'ITA'),
(112, 'Ямайка\r\n', 'JM', 'JAM'),
(113, 'Джерси\r\n', 'JE', 'JEY'),
(114, 'Иордания\r\n', 'JO', 'JOR'),
(115, 'Япония\r\n', 'JP', 'JPN'),
(116, 'Казахстан\r\n', 'KZ', 'KAZ'),
(117, 'Кения\r\n', 'KE', 'KEN'),
(118, 'Киргизия\r\n', 'KG', 'KGZ'),
(119, 'Камбоджа\r\n', 'KH', 'KHM'),
(120, 'Кирибати\r\n', 'KI', 'KIR'),
(121, 'Сент-Китс и Невис\r\n', 'KN', 'KNA'),
(122, 'Южная Корея\r\n', 'KR', 'KOR'),
(123, 'Кувейт\r\n', 'KW', 'KWT'),
(124, 'Лаос\r\n', 'LA', 'LAO'),
(125, 'Ливан\r\n', 'LB', 'LBN'),
(126, 'Либерия\r\n', 'LR', 'LBR'),
(127, 'Ливийская Арабская Джамахирия\r\n', 'LY', 'LBY'),
(128, 'Сент-Люсия\r\n', 'LC', 'LCA'),
(129, 'Лихтенштейн\r\n', 'LI', 'LIE'),
(130, 'Шри-Ланка\r\n', 'LK', 'LKA'),
(131, 'Лесото\r\n', 'LS', 'LSO'),
(132, 'Литва\r\n', 'LT', 'LTU'),
(133, 'Люксембург\r\n', 'LU', 'LUX'),
(134, 'Латвия\r\n', 'LV', 'LVA'),
(135, 'Макао\r\n', 'MO', 'MAC'),
(136, 'Остров Святого Мартина\r\n', 'MF', 'MAF'),
(137, 'Марокко\r\n', 'MA', 'MAR'),
(138, 'Монако\r\n', 'MC', 'MCO'),
(139, 'Молдова, Республика\r\n', 'MD', 'MDA'),
(140, 'Мадагаскар\r\n', 'MG', 'MDG'),
(141, 'Мальдивы\r\n', 'MV', 'MDV'),
(142, 'Мексика\r\n', 'MX', 'MEX'),
(143, 'Маршалловы острова\r\n', 'MH', 'MHL'),
(144, 'Республика Македония\r\n', 'MK', 'MKD'),
(145, 'Мали\r\n', 'ML', 'MLI'),
(146, 'Мальта\r\n', 'MT', 'MLT'),
(147, 'Мьянма\r\n', 'MM', 'MMR'),
(148, 'Черногория\r\n', 'ME', 'MNE'),
(149, 'Монголия\r\n', 'MN', 'MNG'),
(150, 'Северные Марианские острова\r\n', 'MP', 'MNP'),
(151, 'Мозамбик\r\n', 'MZ', 'MOZ'),
(152, 'Мавритания\r\n', 'MR', 'MRT'),
(153, 'Монтсеррат\r\n', 'MS', 'MSR'),
(154, 'Мартиника\r\n', 'MQ', 'MTQ'),
(155, 'Маврикий\r\n', 'MU', 'MUS'),
(156, 'Малави\r\n', 'MW', 'MWI'),
(157, 'Малайзия\r\n', 'MY', 'MYS'),
(158, 'Майотта\r\n', 'YT', 'MYT'),
(159, 'Намибия\r\n', 'NA', 'NAM'),
(160, 'Новая Каледония\r\n', 'NC', 'NCL'),
(161, 'Нигер\r\n', 'NE', 'NER'),
(162, 'Остров Норфолк\r\n', 'NF', 'NFK'),
(163, 'Нигерия\r\n', 'NG', 'NGA'),
(164, 'Никарагуа\r\n', 'NI', 'NIC'),
(165, 'Ниуэ\r\n', 'NU', 'NIU'),
(166, 'Нидерланды\r\n', 'NL', 'NLD'),
(167, 'Норвегия\r\n', 'NO', 'NOR'),
(168, 'Непал\r\n', 'NP', 'NPL'),
(169, 'Науру\r\n', 'NR', 'NRU'),
(170, 'Новая Зеландия\r\n', 'NZ', 'NZL'),
(171, 'Оман\r\n', 'OM', 'OMN'),
(172, 'Пакистан\r\n', 'PK', 'PAK'),
(173, 'Панама\r\n', 'PA', 'PAN'),
(174, 'Питкерн\r\n', 'PN', 'PCN'),
(175, 'Перу\r\n', 'PE', 'PER'),
(176, 'Филиппины\r\n', 'PH', 'PHL'),
(177, 'Палау\r\n', 'PW', 'PLW'),
(178, 'Папуа-Новая Гвинея\r\n', 'PG', 'PNG'),
(179, 'Польша\r\n', 'PL', 'POL'),
(180, 'Пуэрто-Рико\r\n', 'PR', 'PRI'),
(181, 'Северная Корея\r\n', 'KP', 'PRK'),
(182, 'Португалия\r\n', 'PT', 'PRT'),
(183, 'Парагвай\r\n', 'PY', 'PRY'),
(184, 'Палестинская территория, оккупированная\r\n', 'PS', 'PSE'),
(185, 'Французская Полинезия\r\n', 'PF', 'PYF'),
(186, 'Катар\r\n', 'QA', 'QAT'),
(187, 'Реюньон\r\n', 'RE', 'REU'),
(188, 'Румыния\r\n', 'RO', 'ROU'),
(189, 'Россия\r\n', 'RU', 'RUS'),
(190, 'Руанда\r\n', 'RW', 'RWA'),
(191, 'Саудовская Аравия\r\n', 'SA', 'SAU'),
(192, 'Судан\r\n', 'SD', 'SDN'),
(193, 'Сенегал\r\n', 'SN', 'SEN'),
(194, 'Сингапур\r\n', 'SG', 'SGP'),
(195, 'Южная Джорджия и Южные Сандвичевы острова\r\n', 'GS', 'SGS'),
(196, 'Святая Елена\r\n', 'SH', 'SHN'),
(197, 'Шпицберген и Ян Майен\r\n', 'SJ', 'SJM'),
(198, 'Соломоновы острова\r\n', 'SB', 'SLB'),
(199, 'Сьерра-Леоне\r\n', 'SL', 'SLE'),
(200, 'Эль-Сальвадор\r\n', 'SV', 'SLV'),
(201, 'Сан-Марино\r\n', 'SM', 'SMR'),
(202, 'Сомали\r\n', 'SO', 'SOM'),
(203, 'Сен-Пьер и Микелон\r\n', 'PM', 'SPM'),
(204, 'Сербия\r\n', 'RS', 'SRB'),
(205, 'Сан-Томе и Принсипи\r\n', 'ST', 'STP'),
(206, 'Суринам\r\n', 'SR', 'SUR'),
(207, 'Словакия\r\n', 'SK', 'SVK'),
(208, 'Словения\r\n', 'SI', 'SVN'),
(209, 'Швеция\r\n', 'SE', 'SWE'),
(210, 'Свазиленд\r\n', 'SZ', 'SWZ'),
(211, 'Сейшелы\r\n', 'SC', 'SYC'),
(212, 'Сирийская Арабская Республика\r\n', 'SY', 'SYR'),
(213, 'Острова Теркс и Кайкос\r\n', 'TC', 'TCA'),
(214, 'Чад\r\n', 'TD', 'TCD'),
(215, 'Того\r\n', 'TG', 'TGO'),
(216, 'Таиланд\r\n', 'TH', 'THA'),
(217, 'Таджикистан\r\n', 'TJ', 'TJK'),
(218, 'Токелау\r\n', 'TK', 'TKL'),
(219, 'Туркмения\r\n', 'TM', 'TKM'),
(220, 'Тимор-Лесте\r\n', 'TL', 'TLS'),
(221, 'Тонга\r\n', 'TO', 'TON'),
(222, 'Тринидад и Тобаго\r\n', 'TT', 'TTO'),
(223, 'Тунис\r\n', 'TN', 'TUN'),
(224, 'Турция\r\n', 'TR', 'TUR'),
(225, 'Тувалу\r\n', 'TV', 'TUV'),
(226, 'Тайвань (Китай)\r\n', 'TW', 'TWN'),
(227, 'Танзания, Объединенная Республика\r\n', 'TZ', 'TZA'),
(228, 'Уганда\r\n', 'UG', 'UGA'),
(229, 'Украина\r\n', 'UA', 'UKR'),
(230, 'Малые Тихоокеанские отдаленные острова Соединенных Штатов\r\n', 'UM', 'UMI'),
(231, 'Уругвай\r\n', 'UY', 'URY'),
(232, 'Соединенные Штаты\r\n', 'US', 'USA'),
(233, 'Узбекистан\r\n', 'UZ', 'UZB'),
(234, 'Папский Престол (Государство-город Ватикан)\r\n', 'VA', 'VAT'),
(235, 'Сент-Винсент и Гренадины\r\n', 'VC', 'VCT'),
(236, 'Венесуэла\r\n', 'VE', 'VEN'),
(237, 'Виргинские острова, Британские\r\n', 'VG', 'VGB'),
(238, 'Виргинские острова, США\r\n', 'VI', 'VIR'),
(239, 'Вьетнам\r\n', 'VN', 'VNM'),
(240, 'Вануату\r\n', 'VU', 'VUT'),
(241, 'Уоллис и Футуна\r\n', 'WF', 'WLF'),
(242, 'Самоа\r\n', 'WS', 'WSM'),
(243, 'Йемен\r\n', 'YE', 'YEM'),
(244, 'Южная Африка\r\n', 'ZA', 'ZAF'),
(245, 'Замбия\r\n', 'ZM', 'ZMB'),
(246, 'Зимбабве', 'ZW', 'ZWE');

-- --------------------------------------------------------

--
-- Структура таблицы `currency`
--

DROP TABLE IF EXISTS `currency`;
CREATE TABLE IF NOT EXISTS `currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `title_short` varchar(10) DEFAULT NULL,
  `symbol` varchar(10) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `dostavka` double DEFAULT NULL,
  `nds` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT '0',
  `site_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Дамп данных таблицы `currency`
--

INSERT INTO `currency` (`id`, `title`, `title_short`, `symbol`, `price`, `dostavka`, `nds`, `position`, `site_id`) VALUES
(1, 'Россия', 'RUS', 'руб.', 990, 360, 2, 2, 1),
(2, 'Беларусь', 'BLR', 'бел.руб.', 252300, 84100, 2, 1, 1),
(3, 'Украина', 'UKR', 'грн.', 273, 99, 2, 3, 1),
(4, 'Другая', 'USA', '$', 35, 12, 2, 5, 1),
(5, 'Казахстан', 'KAZ', 'тенге', 5050, 1830, 2, 4, 1),
(7, 'Россия', 'RUS', 'руб.', 907, 302, 2, 2, 2),
(8, 'Беларусь', 'BLR', 'бел.руб.', 252300, 84100, 2, 1, 2),
(9, 'Украина', 'UKR', 'грн.', 241, 80, 2, 3, 2),
(10, 'Другая', 'USA', '$', 30, 10, 2, 5, 2),
(11, 'Россия', 'RUS', 'руб.', 990, 360, 2, 2, 3),
(12, 'Казахстан', 'KAZ', 'тенге', 4461, 1487, 2, 4, 2),
(13, 'Беларусь', 'BLR', 'бел.руб.', 276000, 98000, 2, 1, 3),
(14, 'Украина', 'UKR', 'грн.', 273, 99, 2, 3, 3),
(15, 'Другая', 'USA', '$', 35, 12, 2, 5, 3),
(16, 'Казахстан', 'KAZ', 'тенге', 5050, 1830, 2, 4, 3),
(23, 'Ирландия\r\n', 'IRL', 'none', 0, 0, NULL, 0, 1),
(22, 'Австралия\r\n', 'AUS', 'none', 0, 0, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `currency_coof`
--

DROP TABLE IF EXISTS `currency_coof`;
CREATE TABLE IF NOT EXISTS `currency_coof` (
  `currency_from` int(11) DEFAULT NULL,
  `currency_cto` int(11) DEFAULT NULL,
  `cooficient` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `currency_coof`
--

INSERT INTO `currency_coof` (`currency_from`, `currency_cto`, `cooficient`) VALUES
(1, 2, 0.1),
(1, 3, 0.2),
(1, 4, 0.3),
(1, 5, 0.4);

-- --------------------------------------------------------

--
-- Структура таблицы `deals`
--

DROP TABLE IF EXISTS `deals`;
CREATE TABLE IF NOT EXISTS `deals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description_short` text,
  `description` text NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `type` int(11) DEFAULT '1',
  `price` double DEFAULT NULL,
  `old_price` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` text,
  `meta_link_title` varchar(255) DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `position` int(11) NOT NULL DEFAULT '0',
  `active` int(1) DEFAULT '1',
  `action` int(1) NOT NULL DEFAULT '0',
  `recommend` int(1) DEFAULT '0',
  `section_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT '0',
  `brand_id` int(11) DEFAULT '0',
  `popular` int(11) DEFAULT '0',
  `main` int(11) DEFAULT '0',
  `hash` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT '0',
  `lang_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  FULLTEXT KEY `title` (`title`,`description`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

-- --------------------------------------------------------

--
-- Структура таблицы `deals_categories`
--

DROP TABLE IF EXISTS `deals_categories`;
CREATE TABLE IF NOT EXISTS `deals_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description_short` text,
  `description` text NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` text,
  `meta_link_title` varchar(255) DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lang_id` int(11) NOT NULL DEFAULT '1',
  `position` int(11) NOT NULL DEFAULT '0',
  `section_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `deals_categories`
--

INSERT INTO `deals_categories` (`id`, `title`, `description_short`, `description`, `link`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `meta_link_title`, `post_date`, `lang_id`, `position`, `section_id`) VALUES
(14, 'Футбол', '', '', 'futbol', '', 'Футбол', 'Футбол', '', NULL, '2014-02-05 13:24:53', 1, 1, 13),
(15, 'Теннис', '', '', 'tennis', '', 'Теннис', 'Теннис', 'Теннис', NULL, '2014-02-05 13:26:08', 1, 2, 13);

-- --------------------------------------------------------

--
-- Структура таблицы `deals_cities`
--

DROP TABLE IF EXISTS `deals_cities`;
CREATE TABLE IF NOT EXISTS `deals_cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description_short` text,
  `description` text NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` text,
  `meta_link_title` varchar(255) DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `position` int(11) NOT NULL DEFAULT '0',
  `lang_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Дамп данных таблицы `deals_cities`
--

INSERT INTO `deals_cities` (`id`, `title`, `description_short`, `description`, `link`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `meta_link_title`, `post_date`, `position`, `lang_id`) VALUES
(1, 'Москва', '', '', 'moskva', '', 'Москва', 'Москва', 'Москва', NULL, '2014-02-06 08:54:59', 0, 1),
(2, 'Киев', '', '', 'kiev', '', 'Киев', 'Киев', 'Киев', NULL, '2014-02-06 08:45:48', 2, 1),
(4, 'Волгоград', '', '', 'volgograd', '', 'Волгоград', 'Волгоград', 'Волгоград', NULL, '2014-02-06 08:48:07', 3, 1),
(5, 'Екатеринбург', '', '', 'ekaterinburg', '', 'Екатеринбург', 'Екатеринбург', 'Екатеринбург', NULL, '2014-02-06 08:48:36', 4, 1),
(6, 'Казань', '', '', 'kazan', '', 'Казань', 'Казань', 'Казань', NULL, '2014-02-06 08:48:55', 5, 1),
(8, 'Нижний Новгород', '', '', 'nizhniy-novgorod', '', 'Нижний Новгород', 'Нижний Новгород', 'Нижний Новгород', NULL, '2014-02-06 08:50:41', 6, 1),
(9, 'Новосибирск', '', '', 'novosibirsk', '', 'Новосибирск', 'Новосибирск', 'Новосибирск', NULL, '2014-02-06 08:51:18', 7, 1),
(10, 'Омск', '', '', 'omsk', '', 'Омск', 'Омск', 'Омск', NULL, '2014-02-06 08:53:03', 8, 1),
(11, 'Пермь', '', '', 'perm', '', 'Пермь', 'Пермь', 'Пермь', NULL, '2014-02-06 08:53:29', 9, 1),
(12, 'Ростов-на-Дону', '', '', 'rostov-na-donu', '', 'Ростов-на-Дону', 'Ростов-на-Дону', 'Ростов-на-Дону', NULL, '2014-02-06 08:53:50', 10, 1),
(13, 'Самара', '', '', 'samara', '', 'Самара', 'Самара', 'Самара', NULL, '2014-02-06 08:54:11', 11, 1),
(14, 'Санкт-Петербург', '', '', 'sankt-peterburg', '', 'Санкт-Петербург', 'Санкт-Петербург', 'Санкт-Петербург', NULL, '2014-02-06 08:54:44', 1, 1),
(15, 'Тель-Авив', '', '', 'tel-aviv', '', 'Тель-Авив', 'Тель-Авив', 'Тель-Авив', NULL, '2014-02-06 08:58:25', 12, 1),
(16, 'Уфа', '', '', 'ufa', '', 'Уфа', 'Уфа', 'Уфа', NULL, '2014-02-06 08:58:07', 13, 1),
(17, 'Харьков', '', '', 'harkov', '', 'Харьков', 'Харьков', 'Харьков', NULL, '2014-02-06 08:58:47', 14, 1),
(18, 'Челябинск', '', '', 'chelyabinsk', '', 'Челябинск', 'Челябинск', 'Челябинск', NULL, '2014-02-06 08:59:14', 15, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `deals_comments`
--

DROP TABLE IF EXISTS `deals_comments`;
CREATE TABLE IF NOT EXISTS `deals_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text,
  `deal_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) DEFAULT '0',
  `reply` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `deal_id` (`deal_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `deals_comments`
--

INSERT INTO `deals_comments` (`id`, `comment`, `deal_id`, `user_id`, `post_date`, `status`, `reply`) VALUES
(1, 'комментарий 1', 31, 1, '2012-05-02 10:08:30', 1, ''),
(2, 'комментарий 2', 31, 203, '2013-10-17 07:08:37', 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `deals_companies`
--

DROP TABLE IF EXISTS `deals_companies`;
CREATE TABLE IF NOT EXISTS `deals_companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description_short` text,
  `description` text NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` text,
  `meta_link_title` varchar(255) DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `position` int(11) NOT NULL DEFAULT '0',
  `lang_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `deals_companies`
--

INSERT INTO `deals_companies` (`id`, `title`, `description_short`, `description`, `link`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `meta_link_title`, `post_date`, `position`, `lang_id`) VALUES
(1, 'Газпром', '', '', 'gazprom', '', 'Газпром', 'Газпром', 'Газпром', NULL, '2014-02-06 10:05:36', 1, 1),
(3, 'Анталика', '', '', 'antalika', '', 'Анталика', 'Анталика', 'Анталика', NULL, '2014-02-06 10:06:47', 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `deals_coupons`
--

DROP TABLE IF EXISTS `deals_coupons`;
CREATE TABLE IF NOT EXISTS `deals_coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `starfish` int(11) DEFAULT NULL,
  `planbee_coupon` int(11) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '1',
  `code` varchar(255) DEFAULT NULL,
  `post_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `buy_date` timestamp NULL DEFAULT NULL,
  `release_date` timestamp NULL DEFAULT NULL,
  `deal_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT '0',
  `grantor_id` int(11) NOT NULL DEFAULT '0',
  `releaser_id` int(11) DEFAULT NULL,
  `pin_code` varchar(10) DEFAULT 'Y4PQ',
  `nominal_id` int(11) NOT NULL DEFAULT '0',
  `buy_bonus` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `action_id` (`deal_id`),
  KEY `nominal_id` (`nominal_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=76 ;

--
-- Дамп данных таблицы `deals_coupons`
--

INSERT INTO `deals_coupons` (`id`, `starfish`, `planbee_coupon`, `status`, `code`, `post_date`, `buy_date`, `release_date`, `deal_id`, `user_id`, `grantor_id`, `releaser_id`, `pin_code`, `nominal_id`, `buy_bonus`) VALUES
(1, 1, NULL, 1, 'RW-6961-5121', '2013-10-18 10:23:47', NULL, NULL, 1, 0, 0, NULL, '', 0, 0),
(2, 1, NULL, 1, 'RW-4449-6426', '2013-10-18 10:23:47', NULL, NULL, 1, 0, 0, NULL, '', 0, 0),
(3, 1, NULL, 1, 'RW-2772-1447', '2013-10-18 10:23:47', NULL, NULL, 1, 0, 0, NULL, '', 0, 0),
(4, 1, NULL, 1, 'RW-9416-8418', '2013-10-18 10:23:47', NULL, NULL, 1, 0, 0, NULL, '', 0, 0),
(5, 1, NULL, 1, 'RW-2547-4342', '2013-10-18 10:23:47', NULL, NULL, 1, 0, 0, NULL, '', 0, 0),
(6, 1, NULL, 1, 'RW-9468-7115', '2013-10-18 10:23:47', NULL, NULL, 1, 0, 0, NULL, '', 0, 0),
(7, 1, NULL, 1, 'RW-3747-8663', '2013-10-18 10:23:47', NULL, NULL, 1, 0, 0, NULL, '', 0, 0),
(8, 1, NULL, 1, 'RW-6938-8682', '2013-10-18 10:23:47', NULL, NULL, 1, 0, 0, NULL, '', 0, 0),
(9, 1, NULL, 1, 'RW-4444-2638', '2013-10-18 10:23:47', NULL, NULL, 1, 0, 0, NULL, '', 0, 0),
(10, 1, NULL, 1, 'RW-5897-7887', '2013-10-18 10:23:47', NULL, NULL, 1, 0, 0, NULL, '', 0, 0),
(11, 1, NULL, 1, 'RW-3929-5233', '2013-10-18 10:23:47', NULL, NULL, 1, 0, 0, NULL, '', 0, 0),
(12, 1, NULL, 1, 'RW-9575-8183', '2013-10-18 10:23:47', NULL, NULL, 1, 0, 0, NULL, '', 0, 0),
(13, 1, NULL, 1, 'RW-1357-3223', '2013-10-18 10:23:47', NULL, NULL, 1, 0, 0, NULL, '', 0, 0),
(14, 1, NULL, 1, 'RW-4737-6331', '2013-10-18 10:23:47', NULL, NULL, 1, 0, 0, NULL, '', 0, 0),
(15, 1, NULL, 1, 'RW-6473-8438', '2013-10-18 10:23:47', NULL, NULL, 1, 0, 0, NULL, '', 0, 0),
(16, 1, NULL, 1, 'RW-2289-2783', '2013-10-18 10:23:47', NULL, NULL, 1, 0, 0, NULL, '', 0, 0),
(17, 1, NULL, 1, 'RW-3754-4262', '2013-10-18 10:23:47', NULL, NULL, 1, 0, 0, NULL, '', 0, 0),
(18, 1, NULL, 1, 'RW-8599-2119', '2013-10-18 10:23:47', NULL, NULL, 1, 0, 0, NULL, '', 0, 0),
(19, 1, NULL, 1, 'RW-9245-1621', '2013-10-18 10:23:47', NULL, NULL, 1, 0, 0, NULL, '', 0, 0),
(20, 1, NULL, 1, 'RW-4821-2782', '2013-10-18 10:23:47', NULL, NULL, 1, 0, 0, NULL, '', 0, 0),
(21, 1, NULL, 1, 'RW-6736-7398', '2013-10-18 10:23:48', NULL, NULL, 1, 0, 0, NULL, '', 0, 0),
(22, 1, NULL, 1, 'RW-4972-3479', '2013-10-18 10:23:48', NULL, NULL, 1, 0, 0, NULL, '', 0, 0),
(23, 1, NULL, 1, 'RW-5743-6649', '2013-10-18 10:23:48', NULL, NULL, 1, 0, 0, NULL, '', 0, 0),
(24, 1, NULL, 1, 'RW-3123-9937', '2013-10-18 10:23:48', NULL, NULL, 1, 0, 0, NULL, '', 0, 0),
(25, 1, NULL, 1, 'RW-4112-4559', '2013-10-18 10:23:48', NULL, NULL, 1, 0, 0, NULL, '', 0, 0),
(26, 1, NULL, 1, 'RW-1391-7185', '2013-10-18 10:23:50', NULL, NULL, 2, 0, 0, NULL, '', 0, 0),
(27, 1, NULL, 1, 'RW-1473-5427', '2013-10-18 10:23:50', NULL, NULL, 2, 0, 0, NULL, '', 0, 0),
(28, 1, NULL, 1, 'RW-8967-1411', '2013-10-18 10:23:50', NULL, NULL, 2, 0, 0, NULL, '', 0, 0),
(29, 1, NULL, 1, 'RW-4721-5425', '2013-10-18 10:23:50', NULL, NULL, 2, 0, 0, NULL, '', 0, 0),
(30, 1, NULL, 1, 'RW-7326-5654', '2013-10-18 10:23:50', NULL, NULL, 2, 0, 0, NULL, '', 0, 0),
(31, 1, NULL, 1, 'RW-4467-1231', '2013-10-18 10:23:50', NULL, NULL, 2, 0, 0, NULL, '', 0, 0),
(32, 1, NULL, 1, 'RW-1548-8655', '2013-10-18 10:23:50', NULL, NULL, 2, 0, 0, NULL, '', 0, 0),
(33, 1, NULL, 1, 'RW-7218-6928', '2013-10-18 10:23:50', NULL, NULL, 2, 0, 0, NULL, '', 0, 0),
(34, 1, NULL, 1, 'RW-4191-6947', '2013-10-18 10:23:50', NULL, NULL, 2, 0, 0, NULL, '', 0, 0),
(35, 1, NULL, 1, 'RW-1672-4463', '2013-10-18 10:23:50', NULL, NULL, 2, 0, 0, NULL, '', 0, 0),
(36, 1, NULL, 1, 'RW-8936-2259', '2013-10-18 10:23:50', NULL, NULL, 2, 0, 0, NULL, '', 0, 0),
(37, 1, NULL, 1, 'RW-9191-3528', '2013-10-18 10:23:50', NULL, NULL, 2, 0, 0, NULL, '', 0, 0),
(38, 1, NULL, 1, 'RW-4998-7917', '2013-10-18 10:23:50', NULL, NULL, 2, 0, 0, NULL, '', 0, 0),
(39, 1, NULL, 1, 'RW-8656-5313', '2013-10-18 10:23:50', NULL, NULL, 2, 0, 0, NULL, '', 0, 0),
(40, 1, NULL, 1, 'RW-7989-5164', '2013-10-18 10:23:51', NULL, NULL, 2, 0, 0, NULL, '', 0, 0),
(41, 1, NULL, 1, 'RW-8962-7283', '2013-10-18 10:23:51', NULL, NULL, 2, 0, 0, NULL, '', 0, 0),
(42, 1, NULL, 1, 'RW-1347-3698', '2013-10-18 10:23:51', NULL, NULL, 2, 0, 0, NULL, '', 0, 0),
(43, 1, NULL, 1, 'RW-8611-3669', '2013-10-18 10:23:51', NULL, NULL, 2, 0, 0, NULL, '', 0, 0),
(44, 1, NULL, 1, 'RW-9816-4687', '2013-10-18 10:23:51', NULL, NULL, 2, 0, 0, NULL, '', 0, 0),
(45, 1, NULL, 1, 'RW-9571-7496', '2013-10-18 10:23:51', NULL, NULL, 2, 0, 0, NULL, '', 0, 0),
(46, 1, NULL, 1, 'RW-6872-6847', '2013-10-18 10:23:51', NULL, NULL, 2, 0, 0, NULL, '', 0, 0),
(47, 1, NULL, 1, 'RW-9677-9134', '2013-10-18 10:23:51', NULL, NULL, 2, 0, 0, NULL, '', 0, 0),
(48, 1, NULL, 1, 'RW-6748-7678', '2013-10-18 10:23:51', NULL, NULL, 2, 0, 0, NULL, '', 0, 0),
(49, 1, NULL, 1, 'RW-4948-1788', '2013-10-18 10:23:51', NULL, NULL, 2, 0, 0, NULL, '', 0, 0),
(50, 1, NULL, 1, 'RW-6822-6412', '2013-10-18 10:23:51', NULL, NULL, 2, 0, 0, NULL, '', 0, 0),
(51, 1, NULL, 1, 'RW-6632-7143', '2013-10-18 10:24:07', NULL, NULL, 3, 0, 0, NULL, '', 0, 0),
(52, 1, NULL, 1, 'RW-1644-4969', '2013-10-18 10:24:07', NULL, NULL, 3, 0, 0, NULL, '', 0, 0),
(53, 1, NULL, 1, 'RW-9874-6721', '2013-10-18 10:24:07', NULL, NULL, 3, 0, 0, NULL, '', 0, 0),
(54, 1, NULL, 1, 'RW-7917-5423', '2013-10-18 10:24:07', NULL, NULL, 3, 0, 0, NULL, '', 0, 0),
(55, 1, NULL, 1, 'RW-5215-1191', '2013-10-18 10:24:07', NULL, NULL, 3, 0, 0, NULL, '', 0, 0),
(56, 1, NULL, 1, 'RW-8842-4921', '2013-10-18 10:24:07', NULL, NULL, 3, 0, 0, NULL, '', 0, 0),
(57, 1, NULL, 1, 'RW-9678-4194', '2013-10-18 10:24:07', NULL, NULL, 3, 0, 0, NULL, '', 0, 0),
(58, 1, NULL, 1, 'RW-1798-9338', '2013-10-18 10:24:07', NULL, NULL, 3, 0, 0, NULL, '', 0, 0),
(59, 1, NULL, 1, 'RW-1363-5981', '2013-10-18 10:24:07', NULL, NULL, 3, 0, 0, NULL, '', 0, 0),
(60, 1, NULL, 1, 'RW-8392-1343', '2013-10-18 10:24:07', NULL, NULL, 3, 0, 0, NULL, '', 0, 0),
(61, 1, NULL, 1, 'RW-3793-7514', '2013-10-18 10:24:07', NULL, NULL, 3, 0, 0, NULL, '', 0, 0),
(62, 1, NULL, 1, 'RW-9697-2735', '2013-10-18 10:24:07', NULL, NULL, 3, 0, 0, NULL, '', 0, 0),
(63, 1, NULL, 1, 'RW-9768-9195', '2013-10-18 10:24:08', NULL, NULL, 3, 0, 0, NULL, '', 0, 0),
(64, 1, NULL, 1, 'RW-2563-6454', '2013-10-18 10:24:08', NULL, NULL, 3, 0, 0, NULL, '', 0, 0),
(65, 1, NULL, 1, 'RW-5218-2315', '2013-10-18 10:24:08', NULL, NULL, 3, 0, 0, NULL, '', 0, 0),
(66, 1, NULL, 1, 'RW-7741-7595', '2013-10-18 10:24:08', NULL, NULL, 3, 0, 0, NULL, '', 0, 0),
(67, 1, NULL, 1, 'RW-2894-9983', '2013-10-18 10:24:08', NULL, NULL, 3, 0, 0, NULL, '', 0, 0),
(68, 1, NULL, 1, 'RW-5933-1722', '2013-10-18 10:24:08', NULL, NULL, 3, 0, 0, NULL, '', 0, 0),
(69, 1, NULL, 1, 'RW-8546-8727', '2013-10-18 10:24:08', NULL, NULL, 3, 0, 0, NULL, '', 0, 0),
(70, 1, NULL, 1, 'RW-7484-2911', '2013-10-18 10:24:08', NULL, NULL, 3, 0, 0, NULL, '', 0, 0),
(71, 1, NULL, 1, 'RW-4522-9993', '2013-10-18 10:24:08', NULL, NULL, 3, 0, 0, NULL, '', 0, 0),
(72, 1, NULL, 1, 'RW-2328-6829', '2013-10-18 10:24:08', NULL, NULL, 3, 0, 0, NULL, '', 0, 0),
(73, 1, NULL, 1, 'RW-2955-9228', '2013-10-18 10:24:08', NULL, NULL, 3, 0, 0, NULL, '', 0, 0),
(74, 1, NULL, 1, 'RW-7338-3289', '2013-10-18 10:24:08', NULL, NULL, 3, 0, 0, NULL, '', 0, 0),
(75, 1, NULL, 1, 'RW-6794-1447', '2013-10-18 10:24:08', NULL, NULL, 3, 0, 0, NULL, '', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `deals_images`
--

DROP TABLE IF EXISTS `deals_images`;
CREATE TABLE IF NOT EXISTS `deals_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `main` int(1) DEFAULT '0',
  `deal_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `deals_nominals`
--

DROP TABLE IF EXISTS `deals_nominals`;
CREATE TABLE IF NOT EXISTS `deals_nominals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `coupon_price` float DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  `deal_id` int(11) DEFAULT '0',
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nakrutka` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `action_id` (`deal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `deals_nominals`
--

INSERT INTO `deals_nominals` (`id`, `title`, `price`, `discount`, `coupon_price`, `deleted`, `deal_id`, `post_date`, `nakrutka`) VALUES
(1, '1231212312321', 1231230000, 123, 123, 1, 31, '2014-04-01 09:00:54', 123),
(2, 'qwe', 7899, 78, 7, 1, 31, '2014-04-01 09:00:53', 89),
(3, '111111', 1111, 111, 11, 0, 31, '2014-04-02 10:08:14', 1),
(4, '22222', 2222, 222, 22, 0, 31, '2014-04-02 10:08:21', 2),
(5, '33333', 3333, 333, 33, 0, 31, '2014-04-02 10:08:32', 3),
(6, '11111', 1111, 111, 11, 0, 29, '2014-04-02 10:47:20', 1),
(7, '22222', 2222, 222, 22, 0, 29, '2014-04-02 10:47:27', 2),
(8, '33333', 3333, 333, 33, 0, 29, '2014-04-02 10:47:37', 3),
(9, '44444', 4444, 444, 44, 0, 31, '2014-04-02 12:00:38', 4),
(10, '55555', 5555, 555, 55, 0, 31, '2014-04-02 12:00:45', 5),
(11, '11111', 1111, 111, 11, 1, 30, '2014-04-08 10:45:06', 1),
(12, '22222', 2222, 222, 22, 1, 30, '2014-04-08 03:37:11', 12),
(13, '22222', 2222, 222, 22, 1, 30, '2014-04-08 10:45:07', 2),
(14, '33333', 3333, 333, 33, 1, 30, '2014-04-08 10:45:07', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `deals_original`
--

DROP TABLE IF EXISTS `deals_original`;
CREATE TABLE IF NOT EXISTS `deals_original` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description_short` text,
  `description` text,
  `discount_description` text,
  `price` int(4) DEFAULT NULL,
  `discount` int(4) DEFAULT NULL,
  `start_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `coupon_price` int(4) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keywords` text,
  `meta_description` text,
  `features` text,
  `terms` text,
  `map_url` varchar(255) DEFAULT NULL,
  `contacts` text,
  `status` int(1) DEFAULT '0',
  `purchased_coupons_count` int(11) DEFAULT '0',
  `bonuses` int(11) DEFAULT '0',
  `editor_notes` text,
  `min_coupons_count` int(11) DEFAULT '0',
  `coupons_man` int(11) NOT NULL,
  `action_length` int(11) DEFAULT NULL,
  `city_id` text,
  `post_date` timestamp NULL DEFAULT NULL,
  `coupons_start_date` timestamp NULL DEFAULT NULL,
  `expiration_date` timestamp NULL DEFAULT NULL,
  `comments_status` int(11) DEFAULT '0',
  `supplier_name` varchar(255) DEFAULT NULL,
  `supplier_url` varchar(255) DEFAULT NULL,
  `supplier_phone` varchar(255) DEFAULT NULL,
  `address_name1` varchar(255) DEFAULT NULL,
  `address_coordinates1` varchar(255) DEFAULT NULL,
  `address_name2` varchar(255) DEFAULT NULL,
  `address_coordinates2` varchar(255) DEFAULT NULL,
  `map_show` int(1) DEFAULT '0',
  `category_id` int(11) NOT NULL DEFAULT '0',
  `company_id` int(11) NOT NULL DEFAULT '0',
  `currency_id` int(11) DEFAULT '0',
  `no_limit` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `business_type` int(1) NOT NULL,
  `business_type_val` int(11) NOT NULL,
  `nakrutka` int(11) NOT NULL DEFAULT '0',
  `nakrutka_man` int(11) NOT NULL DEFAULT '0',
  `address_organization` varchar(255) DEFAULT NULL,
  `map_scale` int(2) NOT NULL DEFAULT '0',
  `mobile_terms` text,
  `size_mobile_terms` varchar(255) NOT NULL DEFAULT '{"320":"0","640":"0"}',
  `timer_option_day` int(1) NOT NULL DEFAULT '0',
  `fast_timer` int(2) NOT NULL DEFAULT '0',
  `fake_end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `prizes_message` text,
  `prizes_attachments` text,
  `lang_id` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `start_date` (`start_date`,`end_date`),
  KEY `status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `deals_original`
--

INSERT INTO `deals_original` (`id`, `link`, `title`, `description_short`, `description`, `discount_description`, `price`, `discount`, `start_date`, `end_date`, `coupon_price`, `meta_title`, `meta_keywords`, `meta_description`, `features`, `terms`, `map_url`, `contacts`, `status`, `purchased_coupons_count`, `bonuses`, `editor_notes`, `min_coupons_count`, `coupons_man`, `action_length`, `city_id`, `post_date`, `coupons_start_date`, `expiration_date`, `comments_status`, `supplier_name`, `supplier_url`, `supplier_phone`, `address_name1`, `address_coordinates1`, `address_name2`, `address_coordinates2`, `map_show`, `category_id`, `company_id`, `currency_id`, `no_limit`, `business_type`, `business_type_val`, `nakrutka`, `nakrutka_man`, `address_organization`, `map_scale`, `mobile_terms`, `size_mobile_terms`, `timer_option_day`, `fast_timer`, `fake_end_date`, `prizes_message`, `prizes_attachments`, `lang_id`) VALUES
(1, NULL, 'Термобелье с натуральным лебяжьим пухом в интернет-магазине sweethome-store.ru: 1, 3, 5 пар. Скидка от 61%!', NULL, 'Причины купить сегодня\n<ol><li>Структура ткани термоизделий позволяет сохранять естественную температуру тела в любых условиях!</li><li>Ткань, из которой изготовлены вещи, гипоаллергенна и антистатична.</li><li>Такое белье имеет плоские швы и практически не заметно под одеждой.</li><li>Широкий размерный ряд позволяет выбрать необходимые модели.</li></ol><p><p> </p><p></p><p>Термобелье, колготки, лосины будут хранить тепло вашего тела. Эти предметы одежды просто необходимы каждому, кто занимается зимними видами спорта или любит провести время на охоте или рыбалке. Да и если вы просто желаете всегда быть в тепле, вне зависимости от температуры за окном, то термобельё – отличное решение!</p></p>\n', '61%', 0, 0, '2013-10-11 15:00:00', '2013-11-25 14:59:59', 70, 'Термобелье с натуральным лебяжьим пухом в интернет-магазине sweethome-store.ru: 1, 3, 5 пар. Скидка от 61%!', '', 'Причины купить сегодня\nСтруктура ткани термоизделий позволяет сохранять естественную температуру тела в любых условиях!Ткань, из которой изготовлены вещи, гипоаллергенна и антистатична.Такое белье имеет плоские швы и практически не заметно под одеждой.Широкий размерный ряд позволяет выбрать необходимые модели. Термобелье, колготки, лосины будут хранить тепло вашего тела. Эти предметы одежды просто необходимы каждому, кто занимается зимними видами спорта или любит провести время на охоте или рыбалке. Да и если вы просто желаете всегда быть в тепле, вне зависимости от температуры за окном, то термобельё – отличное решение!\n', 'Причины купить сегодня\n<ol><li>Структура ткани термоизделий позволяет сохранять естественную температуру тела в любых условиях!</li><li>Ткань, из которой изготовлены вещи, гипоаллергенна и антистатична.</li><li>Такое белье имеет плоские швы и практически не заметно под одеждой.</li><li>Широкий размерный ряд позволяет выбрать необходимые модели.</li></ol><p><p> </p><p></p><p>Термобелье, колготки, лосины будут хранить тепло вашего тела. Эти предметы одежды просто необходимы каждому, кто занимается зимними видами спорта или любит провести время на охоте или рыбалке. Да и если вы просто желаете всегда быть в тепле, вне зависимости от температуры за окном, то термобельё – отличное решение!</p></p>\n', '<ul><li>Колготки и лосины с натуральным лебяжьим пухом в интернет-магазине sweethome-store.ru.<b>Скидка от 61%</b><ul><li>Термоколготки:\n<ul><li>1 пара.  <b>270р. вместо 700р.</b></li><li>3 пары.  <b>750р. вместо 2100р.</b></li><li>5 пар. <b>1100р. вместо 3500р.</b></li></ul></li><li>Термолосины:\n<ul><li>1 пара.  <b>270р. вместо 700р.</b></li><li>3 пары.  <b>750р. вместо 2100р.</b></li><li>5 пар.  <b>1100р. вместо 3500р.</b></li></ul></li></ul></li><li><b>Внимание!</b> Купон является первоначальным взносом от общей стоимости. Полную стоимость необходимо доплатить на месте</li><li><b>БОНУС:</b> всем владельцам купонов предоставляется дополнительная скидка 50% на все товары из разделов термобелье и колготки из бамбука</li><li>Вы можете приобрести неограниченное количество купонов для себя и в подарок</li><li>Предъявляйте распечатанный или СМС-купон на месте</li><li>Заказ необходимо оставлять на сайте sweethome-store.ru. В поле дополнительная информация указывать номер и код купона</li><li>Скидка по купону не суммируется с другими специальными предложениями компании</li><li>Состав изделий: лебяжий и овечий пух 80%, полиамид 5%, эластан 15%</li><li>Оплата и доставка</li><li>Прайс-лист</li><li>Информацию по условиям акции вы также можете уточнить по телефонам компании: <br>+7 (925) 800-54-24, +7 (499) 180-05-94</li></ul>\n', '', '7(925) 800-54-24, 7(499) 180-05-94<br/>Москва, ул. Декабристов, 45Б', 3, 0, 0, NULL, 1, 0, NULL, '1', '2013-10-18 10:23:45', '2013-10-07 15:00:00', '2013-11-25 14:59:59', 0, 'sweethome-store.ru', 'http://sweethome-store.ru/', '7(925) 800-54-24, 7(499) 180-05-94', 'Москва, ул. Декабристов, 45Б', '', '', '', 0, 17, 37, 0, 0, 1, 0, 0, 0, '', 0, NULL, '{"320":"0","640":"0"}', 0, 0, '0000-00-00 00:00:00', NULL, NULL, 1),
(2, NULL, 'Оренбургские пуховые платки и палантины от компании «Пуша»: «Самоцвет», «Паутинка», «Шарм» и другие модели и аксессуары. Бесплатная доставка! Разнообразие расцветок! Скидка от 64%!', NULL, '&lt;p&gt;Причины купить сегодня&lt;/p&gt;\r\n&lt;ol&gt;\r\n&lt;li&gt;Пуховые платки сегодня &amp;ndash; это не только тепло и уютно, это ещё и стильно, модно и оригинально!&lt;/li&gt;\r\n&lt;li&gt;Это поистине уникальное изделие &amp;ndash; пух, из которого они изготавливаются, самый тонкий в мире.&lt;/li&gt;\r\n&lt;li&gt;Шали, паутинки и палантины из оренбургского пуха невероятно нежные и мягкие!&lt;/li&gt;\r\n&lt;li&gt;Ажурные паутинки прекрасно подходят даже для праздничных и торжественных случаев, благодаря своей воздушности и сложности рисунка.&lt;/li&gt;\r\n&lt;/ol&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;Услышав о пуховых платках, невольно вспоминаются именно оренбургские платки &amp;ndash; устоявшийся символ России! Промысел зародился в Оренбурге уже более 200 лет назад. Оренбургскому пуховому платку нет равных по сохранению тепла. Поэтому даже самая тоненькая ажурная паутинка отлично согреет вас зимними холодными вечерами.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;Не стоит думать, что пуховый платок &amp;ndash; это атрибут только наших бабушек. Стоит посмотреть модные показы известных дизайнеров осень-зима 2012 &amp;ndash; и вы увидите, что во всех коллекциях в изобилии представлены вязаные платки, палантины и шали. Разнообразные цвета, искусная вязка, неповторимые узоры, уютное тепло &amp;ndash; все это сочетают в себе Оренбургские пуховые платки.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;Пуховые платки &amp;ndash; наследие русской моды!&lt;/p&gt;', '64%', 1000, 100, '2013-10-11 15:00:00', '2013-11-25 14:59:00', 900, 'Оренбургские пуховые платки и палантины от компании «Пуша»: «Самоцвет», «Паутинка», «Шарм» и другие модели и аксессуары. Бесплатная доставка! Разнообразие расцветок! Скидка от 64%!', 'qweqweqwe', 'Причины купить сегодня\r\nПуховые платки сегодня – это не только тепло и уютно, это ещё и стильно, модно и оригинально!Это поистине уникальное изделие – пух, из которого они изготавливаются, самый тонкий в мире.Шали, паутинки и палантины из оренбургского пуха невероятно нежные и мягкие!Ажурные паутинки прекрасно подходят даже для праздничных и торжественных случаев, благодаря своей воздушности и сложности рисунка. Услышав о пуховых платках, невольно вспоминаются именно оренбургские платки – устоявшийся символ России! Промысел зародился в Оренбурге уже более 200 лет назад. Оренбургскому пуховому платку нет равных по сохранению тепла. Поэтому даже самая тоненькая ажурная паутинка отлично согреет вас зимними холодными вечерами.Не стоит думать, что пуховый платок – это атрибут только наших бабушек. Стоит посмотреть модные показы известных дизайнеров осень-зима 2012 – и вы увидите, что во всех коллекциях в изобилии представлены вязаные платки, палантины и шали. Разнообразные цвета, искусная вязка, неповторимые узоры, уютное тепло – все это сочетают в себе Оренбургские пуховые платки.Пуховые платки – наследие русской моды!\r\n', '&lt;p&gt;Причины купить сегодня&lt;/p&gt;\r\n&lt;ol&gt;\r\n&lt;li&gt;Пуховые платки сегодня &amp;ndash; это не только тепло и уютно, это ещё и стильно, модно и оригинально!&lt;/li&gt;\r\n&lt;li&gt;Это поистине уникальное изделие &amp;ndash; пух, из которого они изготавливаются, самый тонкий в мире.&lt;/li&gt;\r\n&lt;li&gt;Шали, паутинки и палантины из оренбургского пуха невероятно нежные и мягкие!&lt;/li&gt;\r\n&lt;li&gt;Ажурные паутинки прекрасно подходят даже для праздничных и торжественных случаев, благодаря своей воздушности и сложности рисунка.&lt;/li&gt;\r\n&lt;/ol&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;Услышав о пуховых платках, невольно вспоминаются именно оренбургские платки &amp;ndash; устоявшийся символ России! Промысел зародился в Оренбурге уже более 200 лет назад. Оренбургскому пуховому платку нет равных по сохранению тепла. Поэтому даже самая тоненькая ажурная паутинка отлично согреет вас зимними холодными вечерами.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;Не стоит думать, что пуховый платок &amp;ndash; это атрибут только наших бабушек. Стоит посмотреть модные показы известных дизайнеров осень-зима 2012 &amp;ndash; и вы увидите, что во всех коллекциях в изобилии представлены вязаные платки, палантины и шали. Разнообразные цвета, искусная вязка, неповторимые узоры, уютное тепло &amp;ndash; все это сочетают в себе Оренбургские пуховые платки.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;Пуховые платки &amp;ndash; наследие русской моды!&lt;/p&gt;', '&lt;ul&gt;\r\n&lt;li&gt;Оренбургские пуховые платки от компании&amp;nbsp;&amp;laquo;Пуша&amp;raquo;&amp;nbsp;&lt;strong&gt;с бесплатной доставкой&lt;/strong&gt;. Скидка от 64%  \r\n&lt;ul&gt;\r\n&lt;li&gt;Палантин&amp;nbsp;&amp;laquo;Самоцвет&amp;raquo;&amp;nbsp;150см Х 70см. &amp;nbsp;&lt;strong&gt;690р. вместо 2400р.&lt;/strong&gt;&lt;/li&gt;\r\n&lt;li&gt;Два оренбургских пуховых платка&amp;nbsp;&amp;laquo;Радуга&amp;raquo;&amp;nbsp;размером 130Х130. &amp;nbsp;&lt;strong&gt;730р. вместо 2650р.&lt;/strong&gt;&amp;nbsp;&lt;br /&gt;При заказе 4-х платков пятый в подарок!&lt;/li&gt;\r\n&lt;li&gt;Оренбургский пуховый платок&amp;nbsp;.&amp;laquo;Русский Стиль&amp;raquo;&amp;nbsp;160 см Х 160 см с бесплатной доставкой по Москве. &amp;nbsp;&lt;strong&gt;850р. вместо 3000р.&lt;/strong&gt;&amp;nbsp;&lt;br /&gt;При заказе двух платков &amp;laquo;Русский Стиль&amp;raquo; в подарок предоставляется один платок &amp;laquo;Радуга&amp;raquo;&lt;/li&gt;\r\n&lt;li&gt;Палантин&amp;nbsp;&amp;laquo;Паутинка&amp;raquo;&amp;nbsp;или&amp;nbsp;&amp;laquo;Подснежник&amp;raquo;&amp;nbsp;150см Х 70см. &lt;strong&gt;890р. вместо 3000р.&lt;/strong&gt;&lt;/li&gt;\r\n&lt;li&gt;Ажурный комплект&amp;nbsp;&amp;laquo;Шапочка и перчатки&amp;raquo;. &amp;nbsp;&lt;strong&gt;1190р. вместо 5000р.&lt;/strong&gt;&amp;nbsp;&lt;br /&gt;Состав: 20 % шелк, 80% натуральный козий пух&lt;/li&gt;\r\n&lt;li&gt;Палантин&amp;nbsp;&amp;laquo;Шарм&amp;raquo;&amp;nbsp;160см Х 90см. &amp;nbsp;&lt;strong&gt;1390р. вместо 5000р.&lt;/strong&gt;&lt;/li&gt;\r\n&lt;li&gt;Платок&amp;nbsp;&amp;laquo;Павлин&amp;raquo;&amp;nbsp;или&amp;nbsp;&amp;laquo;Паутинка&amp;raquo;&amp;nbsp;150см Х 150см. К&amp;nbsp;&lt;strong&gt;1390р. вместо 5000р.&lt;/strong&gt;&lt;/li&gt;\r\n&lt;li&gt;Платок&amp;nbsp;&amp;laquo;Ландыш&amp;raquo;&amp;nbsp;160см Х 160см. &amp;nbsp;&lt;strong&gt;2490р. вместо 7000р.&lt;/strong&gt;&lt;/li&gt;\r\n&lt;li&gt;Пуховые пелерины. &amp;nbsp;&lt;strong&gt;2390р. вместо 7000р.&lt;/strong&gt;&amp;nbsp;&lt;br /&gt;Состав: 20 % шелк, 80% натуральный козий пух&lt;/li&gt;\r\n&lt;li&gt;Пончо пуховое. &lt;strong&gt;2690р. вместо 9000р.&lt;/strong&gt;&amp;nbsp;&lt;br /&gt;Состав: 20 % шелк, 80% натуральный козий пух&amp;nbsp;&lt;br /&gt;Модель&amp;nbsp;&amp;laquo;Кармен&amp;raquo;&amp;nbsp;&lt;br /&gt;Модель&amp;nbsp;&amp;laquo;Калор&amp;raquo;&lt;/li&gt;\r\n&lt;li&gt;Варежки пуховые ручной работы. &amp;nbsp;&lt;strong&gt;590р. вместо 1790р.&lt;/strong&gt;&lt;/li&gt;\r\n&lt;li&gt;Носки пуховые ручной работы. &amp;nbsp;&lt;strong&gt;590р. вместо 1790р.&lt;/strong&gt;&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Внимание!&lt;/strong&gt;&amp;nbsp;Купон является первоначальным взносом от общей стоимости. Полную стоимость необходимо доплатить на месте&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;БОНУСЫ:&lt;/strong&gt; \r\n&lt;ul&gt;\r\n&lt;li&gt;При заказе четырех платков &amp;laquo;Радуга&amp;raquo; пятый платок в подарок!&lt;/li&gt;\r\n&lt;li&gt;При заказе двух платков &amp;laquo;Русский Стиль&amp;raquo; в подарок предоставляется один платок &amp;laquo;Радуга&amp;raquo;&lt;/li&gt;\r\n&lt;li&gt;При заказе более 3 позиций из акции в подарок предоставляется один платок &amp;laquo;Радуга&amp;raquo;&lt;/li&gt;\r\n&lt;li&gt;При наличии купона &amp;mdash; скидка 40% на весь ассортимент магазина, не участвующий в акции&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;Бесплатная доставка по Москве (в пределах МКАД) и России&lt;/li&gt;\r\n&lt;li&gt;Доставка осуществляется в течение 3 &amp;mdash; 7 дней с момента получения заказа&lt;/li&gt;\r\n&lt;li&gt;Все платки завернуты в фирменную упаковку&lt;/li&gt;\r\n&lt;li&gt;Вы можете приобрести неограниченное количество купонов для себя и в подарок&lt;/li&gt;\r\n&lt;li&gt;Необходимо активировать код купона на сайте партнера&lt;/li&gt;\r\n&lt;li&gt;Необходимо оформить заказ по электронной почте&amp;nbsp;INFO@FORBESTCLIENTS.RU&amp;nbsp;или по телефону&lt;/li&gt;\r\n&lt;li&gt;Информацию по условиям акции вы также можете уточнить по телефонам компании:&amp;nbsp;&lt;br /&gt;+7 (495) 364-97-59&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Доставка по россии бесплатна&lt;/strong&gt;&lt;/li&gt;\r\n&lt;/ul&gt;', '', '&lt;p&gt;8(495) 201-39-43, 1019, 7(495) 364-97-59&lt;/p&gt;', 3, 0, 0, NULL, 1, 0, NULL, '1', '2013-10-18 10:23:48', '2013-10-07 15:00:00', '2013-11-25 14:59:00', 0, 'pusha-moda.ru', 'http://pusha-moda.ru/', '8(495) 201-39-43, 1019, 7(495) 364-97-59', '', '', '', '', 0, 12, 0, 0, 0, 1, 0, 0, 0, '', 0, '', '{&quot;320&quot;:&quot;0&quot;,&quot;640&quot;:&quot;0&quot;}', 0, 0, '0000-00-00 00:00:00', '', '', 1),
(3, NULL, 'Шара на Кубе не имеет границ! Шашлык, гриль, уха, рыбалка без ограничения улова, Шатер на берегу Днепра, теннис, бадминтон, дартс, самовар, камин, мангал, бильярд. Всего 49 грн вместо 500.', NULL, '&lt;p&gt;База Отдыха Куба на берегу Киевского моря.&lt;/p&gt;\r\n&lt;p&gt;40 км от Киева.&lt;/p&gt;\r\n&lt;p&gt;Самые низкие цены на проживание под Киевом.&lt;/p&gt;\r\n&lt;p&gt;Клубная система.&lt;/p&gt;\r\n&lt;p&gt;Рыбалка №1 в Киевском области!&lt;/p&gt;\r\n&lt;p&gt;Лучшая дорога Украины!&lt;/p&gt;', '80%', 500, 4000000, '2013-10-16 16:00:00', '2013-10-22 14:55:00', 15, 'Шара на Кубе не имеет границ! Шашлык, гриль, уха, рыбалка без ограничения улова, Шатер на берегу Днепра, теннис, бадминтон, дартс, самовар, камин, мангал, бильярд. Всего 49 грн вместо 500.', 'ertert', 'База Отдыха Куба на берегу Киевского моря.40 км от Киева.Самые низкие цены на проживание под Киевом.Клубная система.Рыбалка №1 в Киевском области!Лучшая дорога Украины!', '&lt;p&gt;&lt;strong&gt;В стоимость входит:&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;- Набор кубинца:&amp;nbsp;Шашлык,&amp;nbsp;Гриль,&amp;nbsp;Уха (общий вес 0,5 кг)&lt;/p&gt;\r\n&lt;p&gt;- Рыбалка без ограничения улова,&lt;/p&gt;\r\n&lt;p&gt;- Шатер или Терраса,&lt;/p&gt;\r\n&lt;p&gt;- Теннис,&lt;/p&gt;\r\n&lt;p&gt;- Бадминтон,&lt;/p&gt;\r\n&lt;p&gt;- Дартс,&lt;/p&gt;\r\n&lt;p&gt;- Самовар,&lt;/p&gt;\r\n&lt;p&gt;- Камин,&lt;/p&gt;\r\n&lt;p&gt;- Мангал,&lt;/p&gt;\r\n&lt;p&gt;- Бильярд.&lt;/p&gt;', '&lt;p&gt;- Купоном на скидку можно воспользоваться &lt;strong&gt;с 16 октября до 27 декабря 2013 года.&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;- Купон на &lt;strong&gt;скидку&amp;nbsp;80% &lt;/strong&gt;на программу &quot;Шара на Кубе не имеет границ&quot; на &lt;strong&gt;базе &quot;Куба&quot;&lt;/strong&gt;!&lt;/p&gt;\r\n&lt;p&gt;- Стоимость для одного человека без учета скидки - 500 грн/чел, с купоном&amp;nbsp;&lt;strong&gt;всего 49 грн/чел.&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;- Ознакомиться с программой можно в разделе &quot;Особенности&quot;&lt;/p&gt;\r\n&lt;p&gt;- Дополнительная скидка 50% на проживание.&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;&amp;nbsp;- Перед покупкой купона обязательно уточняйте наличие свободных мест на интересующую Вас дату заезда.&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;- Вы можете приобрести неограниченное количество купонов для себя или в подарок из расчета 1 купон = скидка для 1 человека.&lt;/p&gt;\r\n&lt;p&gt;- Бронирование отдыха возможно для компании не менее 5 человек или по договоренности с администрацией.&lt;/p&gt;\r\n&lt;p&gt;- Бронь необходимо осуществлять за сутки до желаемой даты заезда.&lt;/p&gt;\r\n&lt;p&gt;- Скидка не суммируется с другими действующими предложениям в этот период.&lt;/p&gt;\r\n&lt;p&gt;- Для получения скидки, сообщите номер купона при предварительной записи по тел.:&lt;strong&gt;&amp;nbsp;(095) 109-17-77, (098) 500-00-84&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;- Адрес базы: Киевская обл., Вышгородский р-н, с. Сухолучье, ул. Травнева, д. 30&lt;/strong&gt;&lt;/p&gt;', '', '&lt;p&gt;(098) 500-00-84, 38(096) 109-52-34, (095) 109-17-77&lt;br /&gt;Киевская обл., Вышгородский р-н, с. Сухолучье, ул. Травнева, д. 30;&lt;br /&gt;Киевская обл., Вышгородский р-н, с. Сухолучье, ул. Травнева, д. 73;&lt;br /&gt;Киевская обл., Вышгородский р-н, с. Сухолучье, ул. Травнева, 30&lt;/p&gt;', 3, 0, 0, NULL, 1, 0, NULL, '2,1', '2013-10-18 10:23:51', '2013-10-15 16:00:00', '2013-12-27 14:00:00', 0, 'база отдыха Куба', 'http://cubaclub.com.ua/', '(098) 500-00-84, 38(096) 109-52-34, (095) 109-17-77', 'Киевская обл., Вышгородский р-н, с. Сухолучье, ул. Травнева, д. 30', '', 'Киевская обл., Вышгородский р-н, с. Сухолучье, ул. Травнева, д. 73', '', 0, 12, 0, 0, 0, 1, 0, 0, 0, '', 0, '', '{&quot;320&quot;:&quot;0&quot;,&quot;640&quot;:&quot;0&quot;}', 0, 0, '0000-00-00 00:00:00', '', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `deals_sections`
--

DROP TABLE IF EXISTS `deals_sections`;
CREATE TABLE IF NOT EXISTS `deals_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description_short` text,
  `description` text NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` text,
  `meta_link_title` varchar(255) DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `position` int(11) NOT NULL DEFAULT '0',
  `type` int(11) DEFAULT '0',
  `delete` int(1) DEFAULT '1',
  `template` int(1) DEFAULT '0',
  `lang_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Дамп данных таблицы `deals_sections`
--

INSERT INTO `deals_sections` (`id`, `title`, `description_short`, `description`, `link`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `meta_link_title`, `post_date`, `position`, `type`, `delete`, `template`, `lang_id`) VALUES
(13, 'Спорт', '', '', 'sport', '', 'Спорт', 'Спорт', 'Спорт', NULL, '2014-02-05 11:51:24', 1, NULL, 1, NULL, 1),
(14, 'Туризм', '', '', 'turizm', '', 'Туризм', 'Туризм', 'Туризм', NULL, '2014-02-05 11:51:50', 2, NULL, 1, NULL, 1),
(15, 'Рестораны', '', '', 'restorany', '', 'Рестораны', 'Рестораны', 'Рестораны', NULL, '2014-02-05 11:52:11', 3, NULL, 1, NULL, 1),
(16, 'Активный отдых', '', '', 'aktivnyy-otdyh', '', 'Активный отдых', 'Активный отдых', 'Активный отдых', NULL, '2014-02-05 11:52:53', 4, NULL, 1, NULL, 1),
(17, 'Красота и здоровье', '', '', 'krasota-i-zdorove', '', 'Красота и здоровье', 'Красота и здоровье', 'Красота и здоровье', NULL, '2014-02-05 11:53:23', 5, NULL, 1, NULL, 1),
(18, 'Развлечения', '', '', 'razvlecheniya', '', 'Развлечения', 'Развлечения', 'Развлечения', NULL, '2014-02-05 11:53:48', 6, NULL, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `deals_settings`
--

DROP TABLE IF EXISTS `deals_settings`;
CREATE TABLE IF NOT EXISTS `deals_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` text NOT NULL,
  `lang_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `deals_settings`
--

INSERT INTO `deals_settings` (`id`, `value`, `lang_id`) VALUES
(1, '{"module":"admin","controller":"deals","action":"save-settings","menu":"0","main":"0"}', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `deals_stats_sales`
--

DROP TABLE IF EXISTS `deals_stats_sales`;
CREATE TABLE IF NOT EXISTS `deals_stats_sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deal_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `coupon_price` int(11) NOT NULL,
  `coupons_count` int(11) NOT NULL,
  `business_type` int(1) NOT NULL,
  `business_type_val` int(1) NOT NULL,
  `pay_variant` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `pay_percent` int(11) NOT NULL,
  `total_price` double(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Дамп данных таблицы `deals_stats_sales`
--

INSERT INTO `deals_stats_sales` (`id`, `post_date`, `deal_id`, `title`, `coupon_price`, `coupons_count`, `business_type`, `business_type_val`, `pay_variant`, `category_id`, `pay_percent`, `total_price`) VALUES
(1, '2013-10-11 09:42:52', 31, '111111', 11, 1, 1, 0, 'balance', 12, 0, 11.00),
(2, '2013-10-12 07:02:42', 31, '111111', 11, 1, 1, 0, 'balance', 12, 0, 11.00),
(3, '2013-10-14 05:05:58', 31, '111111', 11, 1, 1, 0, 'balance', 12, 0, 11.00),
(4, '2013-10-14 05:08:17', 30, '1, 2 или 4 экстремальных спуска в зорбе. Ощущение невесомости и невероятная скорость. Инструктаж, кофе, чай, прохладительные напитки каждому. ', 16, 1, 1, 0, 'balance', 12, 0, 16.00),
(5, '2013-10-14 05:39:59', 30, '1, 2 или 4 экстремальных спуска в зорбе. Ощущение невесомости и невероятная скорость. Инструктаж, кофе, чай, прохладительные напитки каждому. ', 16, 1, 1, 0, 'balance', 12, 0, 16.00),
(6, '2013-10-14 05:40:52', 30, '1, 2 или 4 экстремальных спуска в зорбе. Ощущение невесомости и невероятная скорость. Инструктаж, кофе, чай, прохладительные напитки каждому. ', 16, 1, 1, 0, 'balance', 12, 0, 16.00),
(7, '2013-10-14 06:28:14', 30, '1, 2 или 4 экстремальных спуска в зорбе. Ощущение невесомости и невероятная скорость. Инструктаж, кофе, чай, прохладительные напитки каждому. ', 16, 1, 1, 0, 'balance', 12, 0, 16.00),
(8, '2013-10-15 04:56:49', 31, '33333', 33, 1, 1, 0, 'balance', 12, 0, 33.00),
(9, '2013-10-15 05:18:35', 30, '1, 2 или 4 экстремальных спуска в зорбе. Ощущение невесомости и невероятная скорость. Инструктаж, кофе, чай, прохладительные напитки каждому. ', 16, 1, 1, 0, 'balance', 12, 0, 16.00),
(10, '2013-10-15 07:30:47', 30, '1, 2 или 4 экстремальных спуска в зорбе. Ощущение невесомости и невероятная скорость. Инструктаж, кофе, чай, прохладительные напитки каждому. ', 16, 1, 1, 0, 'balance', 12, 0, 16.00),
(11, '2013-10-15 07:34:10', 30, '1, 2 или 4 экстремальных спуска в зорбе. Ощущение невесомости и невероятная скорость. Инструктаж, кофе, чай, прохладительные напитки каждому. ', 16, 1, 1, 0, 'balance', 12, 0, 16.00),
(12, '2013-10-15 07:36:39', 30, '1, 2 или 4 экстремальных спуска в зорбе. Ощущение невесомости и невероятная скорость. Инструктаж, кофе, чай, прохладительные напитки каждому. ', 16, 1, 1, 0, 'balance', 12, 0, 16.00),
(13, '2013-10-15 07:38:50', 30, '1, 2 или 4 экстремальных спуска в зорбе. Ощущение невесомости и невероятная скорость. Инструктаж, кофе, чай, прохладительные напитки каждому. ', 16, 1, 1, 0, 'balance', 12, 0, 16.00),
(14, '2013-10-15 07:42:47', 30, '1, 2 или 4 экстремальных спуска в зорбе. Ощущение невесомости и невероятная скорость. Инструктаж, кофе, чай, прохладительные напитки каждому. ', 16, 1, 1, 0, 'balance', 12, 0, 16.00),
(15, '2013-10-15 07:51:13', 30, '1, 2 или 4 экстремальных спуска в зорбе. Ощущение невесомости и невероятная скорость. Инструктаж, кофе, чай, прохладительные напитки каждому. ', 16, 1, 1, 0, 'balance', 12, 0, 16.00),
(16, '2013-10-15 09:22:33', 30, '1, 2 или 4 экстремальных спуска в зорбе. Ощущение невесомости и невероятная скорость. Инструктаж, кофе, чай, прохладительные напитки каждому. ', 16, 1, 1, 0, 'balance', 12, 0, 16.00),
(17, '2013-10-15 09:23:51', 30, '1, 2 или 4 экстремальных спуска в зорбе. Ощущение невесомости и невероятная скорость. Инструктаж, кофе, чай, прохладительные напитки каждому. ', 16, 1, 1, 0, 'balance', 12, 0, 16.00),
(18, '2013-10-15 09:36:55', 26, 'Любые блюда и напитки в ресторане Don Makaron. Запеченная с травами дорада, стейк из лосося по-сицилийски, карпаччо из говядины с грушей и специями, пицца «Четыре сыра», фокачча и многое другое. Скидк', 100, 1, 1, 0, 'balance', 11, 0, 100.00);

-- --------------------------------------------------------

--
-- Структура таблицы `delivery`
--

DROP TABLE IF EXISTS `delivery`;
CREATE TABLE IF NOT EXISTS `delivery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `destination` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT '0',
  `lang_id` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `delivery`
--

INSERT INTO `delivery` (`id`, `destination`, `price`, `position`, `lang_id`) VALUES
(1, 'Самовывоз', 0, 1, 1),
(2, 'В пределах Санкт-Петербурга', 300, 2, 1),
(3, 'За пределы Санкт-Петербурга', 1000, 3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL DEFAULT '',
  `title` text NOT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` int(11) NOT NULL DEFAULT '0',
  `lang_id` int(11) NOT NULL DEFAULT '1',
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `position` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  FULLTEXT KEY `title` (`title`,`description`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `files`
--

INSERT INTO `files` (`id`, `file_name`, `title`, `date`, `active`, `lang_id`, `description`, `image`, `position`) VALUES
(3, 'eccbc87e4b5ce2fe28308fd9f2a7baf3_cert3.jpg', 'Eмкости полиэтиленовые. Cертификат соответствия', '2013-12-15 20:39:44', 0, 1, '&nbsp;', NULL, 1),
(4, 'a87ff679a2f3e71d9181a67b7542122c_doc10.pdf', 'Муфта для прохода через ж/б колодец. Паспорт', '2013-12-17 00:52:41', 0, 1, '&nbsp;', NULL, 2),
(5, 'e4da3b7fbbce2345d7772b0674a318d5_doc14.pdf', 'Септик Горизонтальный СГ-2-3000. Паспорт', '2013-12-17 00:54:07', 0, 1, '&nbsp;', NULL, 3),
(6, '1679091c5a880faf6fb5e6087eb1b2dc_doc3.pdf', 'Колодец дождеприемный ø315мм. Паспорт', '2013-12-17 00:54:59', 0, 1, '&nbsp;', NULL, 4),
(7, '8f14e45fceea167a5a36dedd4bea2543_doc15.pdf', 'Модульный полиэтиленовый колодец КМ-315 хозяйственно бытовая канализация. Паспорт', '2013-12-17 01:35:57', 0, 1, '&nbsp;', NULL, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description_short` text,
  `description` text,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` text,
  `active` int(1) DEFAULT '0',
  `lang_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `forum_comments`
--

DROP TABLE IF EXISTS `forum_comments`;
CREATE TABLE IF NOT EXISTS `forum_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `forum_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `active` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `forum_comments`
--

INSERT INTO `forum_comments` (`id`, `description`, `post_date`, `forum_id`, `user_id`, `username`, `active`) VALUES
(1, 'Сигналка очень достойная. Пользуюсь ей уже почти два года, никаких нареканий по поводу работы нет. Программируется очень легко и просто, даже никакой помощи от ребят в сервисе не понадобилось, главное инструкцию внимательно изучить и все окей. Радиус действия замечательный, в городских условиях супер.', '2012-12-13 04:27:54', 2, 31, 'Андрей', 1),
(7, 'Загадка комплексов видео контроля скорости разгадана! В продажу поступили абсолютно новые радар-детекторы серий STR-9000EX, STR-9020EX и STR-8020EX, которые способны реагировать на комплекс Стрелка!', '2012-12-13 04:27:54', 2, 30, 'Андрей', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `lang_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `short_title` varchar(10) NOT NULL DEFAULT '0',
  `short_title_lower` varchar(10) DEFAULT '0',
  `flag_image` varchar(100) NOT NULL DEFAULT '',
  `position` int(11) NOT NULL DEFAULT '0',
  `title_binary` binary(1) DEFAULT NULL,
  PRIMARY KEY (`lang_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Дамп данных таблицы `languages`
--

INSERT INTO `languages` (`lang_id`, `title`, `short_title`, `short_title_lower`, `flag_image`, `position`, `title_binary`) VALUES
(1, 'Русский', 'RU', 'ru', 'russia', 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `new_id` int(11) NOT NULL AUTO_INCREMENT,
  `new_image` varchar(255) NOT NULL DEFAULT '',
  `new_title` text NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `new_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` int(11) NOT NULL DEFAULT '0',
  `lang_id` int(11) NOT NULL DEFAULT '1',
  `new_description` text NOT NULL,
  `new_description_short` text,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` text,
  `meta_link_title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`new_id`),
  FULLTEXT KEY `new_title` (`new_title`,`new_description`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`new_id`, `new_image`, `new_title`, `link`, `new_date`, `active`, `lang_id`, `new_description`, `new_description_short`, `meta_title`, `meta_description`, `meta_keywords`, `meta_link_title`) VALUES
(27, '02e74f10e0327ad868d138f2b4fdd6f0', 'Новый алгоритм внедрён в скрипт проверки сайтов', 'Новый алгоритм внедрён в скрипт проверки сайтов', '2013-10-28 00:28:47', 0, 1, '<div>Во время апробации в сервисе &quot;проверка текста&quot;, новый алгоритм оказался настолько более продвинутым, что мы стали получать отзывы от пользователей, которым приходилось копировать текст со страниц и проверять через &quot;проверку текста&quot;, вместо того, чтобы просто проверить страницу по адресу. Мы, в свою очередь, тоже остались довольны результатами тестов и теперь внедрили новый алгоритм в модуль проверки сайтов.</div>\r\n<div>Проверка на тестовом наборе страниц показала значительный прирост качества без заметных последствий для быстродействия.</div>\r\n<div>В ближайшее время ожидайте некоторые изменения в интерфейсе раздела &quot;проверка сайта&quot;, а также новый функционал &mdash; возможность проверить страницы списком, добавив урлы в текстовое поле.</div>\r\n<div>Надеемся на Ваше активное участие в развитии проекта, каждый отзыв имеет значение!</div>', '<div>Во время апробации в сервисе &quot;проверка текста&quot;, новый алгоритм оказался настолько более продвинутым, что мы стали получать отзывы от пользователей, которым приходилось копировать текст со страниц и проверять через &quot;проверку текста&quot;, вместо того, чтобы просто проверить страницу по адресу. Мы, в свою очередь, тоже остались довольны результатами тестов и теперь внедрили новый алгоритм в модуль проверки сайтов.</div>', 'Новый алгоритм внедрён в скрипт проверки сайтов', 'Новый алгоритм внедрён в скрипт проверки сайтов', 'Новый алгоритм внедрён в скрипт проверки сайтов', ''),
(28, '33e75ff09dd601bbe69f351039152189', 'Новый PocketBookTouchLux 2 можно купить в Беларуси', 'novyy-pocketbooktouchlux-2-mozhno-kupit-v-belarusi.html', '2014-01-21 13:35:23', 0, 1, '<div>Компания PocketBook представляет усовершенствованную модель PocketBookTouchLux &ndash; PocketBookTouchLux 2, которая по сравнению со своими предшественниками получила более тонкий корпус и увеличенный объем батареи.</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>PocketBookTouchLux 2 дает возможность читать в любых условиях независимо от освещения, благодаря встроенной диодной подсветке и уникальным свойствам EInk экрана. 6-дюймовый E InkPearlHD дисплей отображает тексты еще более ярко и контрастно. E Ink экран не бликует на солнце, использует только отраженный свет, что позволяет читать даже под действием прямых солнечных лучей, а диодная подсветка позволяет с комфортом читать даже в условиях низкой освещенности.</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Кроме того, новый PocketBookTouchLux 2 еще удобнее ложится в ладонь, а покрытие soft-touch задней панели облегчает удерживание одной рукой.&nbsp;</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Мощный процессор с тактовой частотой 1 ГГц и 256 МБ оперативной памяти обеспечат плавное перелистывание и быстрый отклик любого приложения. Благодаря мультисенсорному дисплею и интуитивно понятному интерфейсу управлять ридером невероятно комфортно.</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Увеличенный объем батареи дает возможность читать недели напролет, не думая о подзарядке, а 4 ГБ встроенной памяти, с возможностью расширения до 32 ГБ позволит создать целую библиотеку, которая всегда под рукой.</div>\r\n', '<p>Компания PocketBook представляет усовершенствованную модель PocketBookTouchLux &ndash; PocketBookTouchLux 2, которая по сравнению со своими предшественниками получила более тонкий корпус и увеличенный объем батареи.</p>\r\n', 'Новый PocketBookTouchLux 2 можно купить в Беларуси', 'Новый PocketBookTouchLux 2 можно купить в Беларуси', 'Новый PocketBookTouchLux 2 можно купить в Беларуси', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `position` int(11) DEFAULT '0',
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` text,
  `lang_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `options_properties`
--

DROP TABLE IF EXISTS `options_properties`;
CREATE TABLE IF NOT EXISTS `options_properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `position` int(11) DEFAULT '0',
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` text,
  `option_id` int(11) DEFAULT NULL,
  `lang_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cd_count` int(11) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `sprice` varchar(100) DEFAULT '0',
  `skidka` int(11) DEFAULT '0',
  `dostavka` varchar(100) DEFAULT NULL,
  `total_price` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL DEFAULT '2',
  `host` varchar(100) DEFAULT NULL,
  `products` text,
  `user_id` int(11) DEFAULT NULL,
  `comment` text,
  `payed` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `cd_count`, `price`, `sprice`, `skidka`, `dostavka`, `total_price`, `name`, `country`, `country_id`, `zip`, `city`, `address`, `email`, `phone`, `post_date`, `status`, `host`, `products`, `user_id`, `comment`, `payed`) VALUES
(1, 5, '6310', '6310', 0, NULL, '6310', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-01-20 13:25:49', 1, NULL, '[{"id":"7","title":"\\u0420\\u0430\\u0441\\u0448\\u0438\\u0440\\u0435\\u043d\\u043d\\u044b\\u0439 \\u043c\\u043e\\u0434\\u0443\\u043b\\u044c \\u043e\\u0431\\u0440\\u0430\\u0442\\u043d\\u043e\\u0433\\u043e \\u043e\\u0442\\u0441\\u0447\\u0435\\u0442\\u0430","description":"A simple, but complete and responsive, countdown system with progress bar based on admin input or elapsed time. Also you can contact your subscribed users and, if your server supports the function, automaticly contact them when the site is ready.","addinfo":"","addinfo2":"&nbsp;","video":"&nbsp;","link":"rasshirennyy-modul-obratnogo-otscheta","image":"a97da629b098b75c294dffdc3e463904","price":"30","old_price":"40","discount":"25","meta_title":"\\u0420\\u0430\\u0441\\u0448\\u0438\\u0440\\u0435\\u043d\\u043d\\u044b\\u0439 \\u043c\\u043e\\u0434\\u0443\\u043b\\u044c \\u043e\\u0431\\u0440\\u0430\\u0442\\u043d\\u043e\\u0433\\u043e \\u043e\\u0442\\u0441\\u0447\\u0435\\u0442\\u0430","meta_description":"\\u0420\\u0430\\u0441\\u0448\\u0438\\u0440\\u0435\\u043d\\u043d\\u044b\\u0439 \\u043c\\u043e\\u0434\\u0443\\u043b\\u044c \\u043e\\u0431\\u0440\\u0430\\u0442\\u043d\\u043e\\u0433\\u043e \\u043e\\u0442\\u0441\\u0447\\u0435\\u0442\\u0430","meta_keywords":"\\u0420\\u0430\\u0441\\u0448\\u0438\\u0440\\u0435\\u043d\\u043d\\u044b\\u0439 \\u043c\\u043e\\u0434\\u0443\\u043b\\u044c \\u043e\\u0431\\u0440\\u0430\\u0442\\u043d\\u043e\\u0433\\u043e \\u043e\\u0442\\u0441\\u0447\\u0435\\u0442\\u0430","meta_link_title":"","post_date":"2013-11-01 20:50:54","position":"1","active":"1","action":"0","recommend":"0","section_id":"1","category_id":"10","brand_id":"0","popular":"0","main":"1","user_id":"0","lang_id":"1","image_title":"\\u0420\\u0430\\u0441\\u0448\\u0438\\u0440\\u0435\\u043d\\u043d\\u044b\\u0439 \\u043c\\u043e\\u0434\\u0443\\u043b\\u044c \\u043e\\u0431\\u0440\\u0430\\u0442\\u043d\\u043e\\u0433\\u043e \\u043e\\u0442\\u0441\\u0447\\u0435\\u0442\\u0430","images":[{"id":"107","title":"\\u0420\\u0430\\u0441\\u0448\\u0438\\u0440\\u0435\\u043d\\u043d\\u044b\\u0439 \\u043c\\u043e\\u0434\\u0443\\u043b\\u044c \\u043e\\u0431\\u0440\\u0430\\u0442\\u043d\\u043e\\u0433\\u043e \\u043e\\u0442\\u0441\\u0447\\u0435\\u0442\\u0430","image":"a97da629b098b75c294dffdc3e463904","main":"1","product_id":"7"}],"count":"1","total_price":30},{"id":"1","title":"\\u041a\\u0430\\u043b\\u0435\\u043d\\u0434\\u0430\\u0440\\u044c \\u0441\\u043e\\u0431\\u044b\\u0442\\u0438\\u0439","description":"Events Calendar allows you to easily add to your website a powerful interactive calendar to present your events.","addinfo":"","addinfo2":"<br \\/>","video":"&nbsp;","link":"kalendar-sobytiy","image":"a3c65c2974270fd093ee8a9bf8ae7d0b","price":"40","old_price":"45","discount":"12","meta_title":"\\u041a\\u0430\\u043b\\u0435\\u043d\\u0434\\u0430\\u0440\\u044c \\u0441\\u043e\\u0431\\u044b\\u0442\\u0438\\u0439","meta_description":"\\u041a\\u0430\\u043b\\u0435\\u043d\\u0434\\u0430\\u0440\\u044c \\u0441\\u043e\\u0431\\u044b\\u0442\\u0438\\u0439","meta_keywords":"\\u041a\\u0430\\u043b\\u0435\\u043d\\u0434\\u0430\\u0440\\u044c \\u0441\\u043e\\u0431\\u044b\\u0442\\u0438\\u0439","meta_link_title":"","post_date":"2013-10-21 00:20:55","position":"2","active":"1","action":"0","recommend":"0","section_id":"1","category_id":"9","brand_id":"0","popular":"0","main":"1","user_id":"0","lang_id":"1","image_title":"\\u041a\\u0430\\u043b\\u0435\\u043d\\u0434\\u0430\\u0440\\u044c \\u0441\\u043e\\u0431\\u044b\\u0442\\u0438\\u0439","images":[{"id":"108","title":"\\u041a\\u0430\\u043b\\u0435\\u043d\\u0434\\u0430\\u0440\\u044c \\u0441\\u043e\\u0431\\u044b\\u0442\\u0438\\u0439","image":"a3c65c2974270fd093ee8a9bf8ae7d0b","main":"1","product_id":"1"}],"count":"1","total_price":40},{"id":"2","title":"Grouponza Pro v.2.0","description":"Grouponza - \\u043f\\u043b\\u0430\\u0442\\u0444\\u043e\\u0440\\u043c\\u0430 \\u21161 \\u0434\\u043b\\u044f \\u043a\\u0443\\u043f\\u043e\\u043d\\u043d\\u044b\\u0445 \\u0441\\u0430\\u0439\\u0442\\u043e\\u0432 \\u0432 \\u0421\\u041d\\u0413","addinfo":"","addinfo2":"<div>&nbsp;<\\/div>\\r\\n<ul>\\r\\n    <li>\\u0413\\u043e\\u0442\\u043e\\u0432\\u044b\\u0439 \\u0448\\u0430\\u0431\\u043b\\u043e\\u043d \\u0434\\u0438\\u0437\\u0430\\u0439\\u043d\\u0430 \\u0438\\u0437 3-\\u0445 \\u0432\\u0430\\u0440\\u0438\\u0430\\u043d\\u0442\\u043e\\u0432 \\u043d\\u0430 \\u0432\\u044b\\u0431\\u043e\\u0440<\\/li>\\r\\n    <li>\\u0412\\u043e\\u0437\\u043c\\u043e\\u0436\\u043d\\u043e\\u0441\\u0442\\u044c \\u0438\\u0437\\u043c\\u0435\\u043d\\u044f\\u0442\\u044c \\u0433\\u043e\\u0442\\u043e\\u0432\\u044b\\u0439 \\u0448\\u0430\\u0431\\u043b\\u043e\\u043d \\u0434\\u0438\\u0437\\u0430\\u0439\\u043d\\u0430 \\u0432 \\u0441\\u0438\\u0441\\u0442\\u0435\\u043c\\u0435 \\u0443\\u043f\\u0440\\u0430\\u0432\\u043b\\u0435\\u043d\\u0438\\u044f<\\/li>\\r\\n    <li>\\u0420\\u0430\\u0431\\u043e\\u0442\\u0430 \\u0432 \\u043d\\u0435\\u043e\\u0433\\u0440\\u0430\\u043d\\u0438\\u0447\\u0435\\u043d\\u043d\\u043e\\u043c \\u0447\\u0438\\u0441\\u043b\\u0435 \\u0433\\u043e\\u0440\\u043e\\u0434\\u043e\\u0432<\\/li>\\r\\n    <li>\\u041a\\u0443\\u043f\\u0438\\u0442\\u044c \\u043a\\u0443\\u043f\\u043e\\u043d \\u0434\\u0440\\u0443\\u0433\\u0443 (\\u043a\\u0443\\u043f\\u043e\\u043d \\u0432 \\u043f\\u043e\\u0434\\u0430\\u0440\\u043e\\u043a)<\\/li>\\r\\n    <li>\\u043d\\u0442\\u0435\\u0433\\u0440\\u0430\\u0446\\u0438\\u044f c Robokassa<\\/li>\\r\\n    <li>\\u041d\\u0430\\u043b\\u0438\\u0447\\u0438\\u0435 \\u0438\\u043d\\u0442\\u0435\\u0433\\u0440\\u0430\\u0446\\u0438\\u0438 c Masterbank.ru<\\/li>\\r\\n    <li>\\u0412\\u043e\\u0437\\u043c\\u043e\\u0436\\u043d\\u043e\\u0441\\u0442\\u044c \\u043f\\u043e\\u043b\\u0443\\u0447\\u0430\\u0442\\u044c \\u043a\\u043e\\u0434 \\u043a\\u0443\\u043f\\u043e\\u043d\\u0430 \\u043f\\u043e sms<\\/li>\\r\\n    <li>\\u041a\\u0430\\u0440\\u0442\\u044b Yandex \\/ Google<\\/li>\\r\\n    <li>\\u0412\\u043e\\u0437\\u043c\\u043e\\u0436\\u043d\\u043e\\u0441\\u0442\\u044c \\u0443\\u043a\\u0430\\u0437\\u044b\\u0432\\u0430\\u0442\\u044c \\u0432\\u0430\\u043b\\u044e\\u0442\\u0443, \\u0432 \\u043a\\u043e\\u0442\\u043e\\u0440\\u043e\\u0439 \\u0440\\u0430\\u0431\\u043e\\u0442\\u0430\\u0435\\u0442 \\u0441\\u0430\\u0439\\u0442\\t\\t\\t\\t \\u0424\\u043e\\u0440\\u043c\\u0430 \\u043e\\u0431\\u0440\\u0430\\u0442\\u043d\\u043e\\u0439 \\u0441\\u0432\\u044f\\u0437\\u0438<\\/li>\\r\\n    <li>\\u041c\\u0430\\u0440\\u043a\\u0435\\u0442\\u0438\\u043d\\u0433\\u043e\\u0432\\u044b\\u0439 \\u043d\\u0430\\u043a\\u0440\\u0443\\u0442\\u0447\\u0438\\u043a \\u0441\\u0447\\u0435\\u0442\\u0447\\u0438\\u043a\\u0430 \\u043f\\u043e\\u043a\\u0443\\u043f\\u043e\\u043a (\\u0447\\u0438\\u0441\\u043b\\u043e \\u043a\\u0443\\u043f\\u043b\\u0435\\u043d\\u043d\\u044b\\u0445 \\u043a\\u0443\\u043f\\u043e\\u043d\\u043e\\u0432, \\u0441\\u043a\\u043e\\u043b\\u044c\\u043a\\u043e \\u043b\\u044e\\u0434\\u0435\\u0439 \\u043a\\u0443\\u043f\\u0438\\u043b\\u043e)<\\/li>\\r\\n    <li>\\u041f\\u043e\\u0434\\u0434\\u0435\\u0440\\u0436\\u043a\\u0430 \\u0432\\u0445\\u043e\\u0434\\u0430 \\u043d\\u0430 \\u0441\\u0430\\u0439\\u0442 \\u0447\\u0435\\u0440\\u0435\\u0437 \\u0441\\u043e\\u0446\\u0438\\u0430\\u043b\\u044c\\u043d\\u044b\\u0435 \\u0441\\u0435\\u0442\\u0438: Facebook, Vkontakte<\\/li>\\r\\n    <li>\\u041f\\u0440\\u0438\\u0433\\u043b\\u0430\\u0441\\u0438 \\u0434\\u0440\\u0443\\u0433\\u0430 \\u0438 \\u043f\\u043e\\u043b\\u0443\\u0447\\u0438 100 \\u0440\\u0443\\u0431\\u043b\\u0435\\u0439 \\u043d\\u0430 \\u0441\\u0447\\u0435\\u0442 (\\u0432\\u043e\\u0437\\u043c\\u043e\\u0436\\u043d\\u043e\\u0441\\u0442\\u044c \\u043e\\u0442\\u043a\\u043b\\u044e\\u0447\\u0430\\u0442\\u044c \\u044d\\u0442\\u0443 \\u043e\\u043f\\u0446\\u0438\\u044e, \\u0430 \\u0442\\u0430\\u043a\\u0436\\u0435 \\u043c\\u0435\\u043d\\u044f\\u0442\\u044c \\u0441\\u0443\\u043c\\u043c\\u0443 \\u0432\\u043e\\u0437\\u043d\\u0430\\u0433\\u0440\\u0430\\u0436\\u0434\\u0435\\u043d\\u0438\\u044f)<\\/li>\\r\\n    <li>\\u041e\\u043a\\u043d\\u043e \\u0434\\u043b\\u044f \\u043e\\u0431\\u044f\\u0437\\u0430\\u0442\\u0435\\u043b\\u044c\\u043d\\u043e\\u0439 \\u0440\\u0435\\u0433\\u0438\\u0441\\u0442\\u0440\\u0430\\u0446\\u0438\\u0438 \\u043d\\u0430 \\u0441\\u0430\\u0439\\u0442\\u0435.<\\/li>\\r\\n    <li>Wish list. \\u041c\\u043e\\u0434\\u0443\\u043b\\u044c, \\u043a\\u043e\\u0442\\u043e\\u0440\\u044b\\u0439 \\u043f\\u043e\\u0437\\u0432\\u043e\\u043b\\u044f\\u0435\\u0442 \\u043f\\u043e\\u043b\\u044c\\u0437\\u043e\\u0432\\u0430\\u0442\\u0435\\u043b\\u044f\\u043c \\u0443\\u043a\\u0430\\u0437\\u0430\\u0442\\u044c \\u043a\\u0430\\u0442\\u0435\\u0433\\u043e\\u0440\\u0438\\u0438 \\u0430\\u043a\\u0446\\u0438\\u0439, \\u043a\\u043e\\u0442\\u043e\\u0440\\u044b\\u0435 \\u043e\\u043d\\u0438 \\u0431\\u044b \\u0445\\u043e\\u0442\\u0435\\u043b\\u0438 \\u0432\\u0438\\u0434\\u0435\\u0442\\u044c \\u043d\\u0430 \\u0441\\u0430\\u0439\\u0442\\u0435.<\\/li>\\r\\n    <li>\\u041a\\u0430\\u0431\\u0438\\u043d\\u0435\\u0442 \\u0431\\u0438\\u0437\\u043d\\u0435\\u0441 \\u043f\\u0430\\u0440\\u0442\\u043d\\u0435\\u0440\\u0430 \\u0434\\u043b\\u044f \\u0443\\u0447\\u0435\\u0442\\u0430 \\u043f\\u043e\\u0433\\u0430\\u0448\\u0435\\u043d\\u043d\\u044b\\u0445 \\u043a\\u0443\\u043f\\u043e\\u043d\\u043e\\u0432<\\/li>\\r\\n    <li>\\u041a\\u0430\\u0431\\u0438\\u043d\\u0435\\u0442 \\u043a\\u0430\\u0441\\u0441\\u0438\\u0440\\u0430<\\/li>\\r\\n    <li>\\u041a\\u0430\\u0442\\u0435\\u0433\\u043e\\u0440\\u0438\\u0438 \\u0430\\u043a\\u0446\\u0438\\u0439<\\/li>\\r\\n    <li>\\u0412\\u044b\\u0433\\u0440\\u0443\\u0437\\u043a\\u0430 \\u0434\\u0430\\u043d\\u043d\\u044b\\u0445 \\u0432 KuponGid.ru<\\/li>\\r\\n    <li>\\u0411\\u0435\\u0441\\u043f\\u043b\\u0430\\u0442\\u043d\\u0430\\u044f \\u043d\\u0430\\u0441\\u0442\\u0440\\u043e\\u0439\\u043a\\u0430 \\u043f\\u043e\\u0447\\u0442\\u043e\\u0432\\u043e\\u0439 \\u0440\\u0430\\u0441\\u0441\\u044b\\u043b\\u043a\\u0438<\\/li>\\r\\n    <li>\\u0422\\u0438\\u043f\\u043e\\u0432\\u043e\\u0439 \\u0434\\u043e\\u0433\\u043e\\u0432\\u043e\\u0440 \\u0434\\u043b\\u044f \\u0440\\u0430\\u0431\\u043e\\u0442\\u044b \\u0441 \\u043f\\u043e\\u0441\\u0442\\u0430\\u0432\\u0449\\u0438\\u043a\\u0430\\u043c\\u0438 \\u0443\\u0441\\u043b\\u0443\\u0433<\\/li>\\r\\n    <li>\\u0428\\u0430\\u0431\\u043b\\u043e\\u043d \\u0434\\u0438\\u0437\\u0430\\u0439\\u043d\\u0430 \\u043a\\u043e\\u043c\\u043c\\u0435\\u0440\\u0447\\u0435\\u0441\\u043a\\u043e\\u0433\\u043e \\u043f\\u0440\\u0435\\u0434\\u043b\\u043e\\u0436\\u0435\\u043d\\u0438\\u044f \\u0434\\u043b\\u044f \\u0440\\u0430\\u0431\\u043e\\u0442\\u044b \\u0441 \\u043f\\u0430\\u0440\\u0442\\u043d\\u0435\\u0440\\u0430\\u043c\\u0438<\\/li>\\r\\n    <li>\\u0420\\u0435\\u043a\\u043e\\u043c\\u0435\\u043d\\u0434\\u0430\\u0446\\u0438\\u0438 \\u0438 \\u0441\\u043e\\u0432\\u0435\\u0442\\u044b \\u043f\\u043e \\u0440\\u0430\\u0441\\u043a\\u0440\\u0443\\u0442\\u043a\\u0435 \\u0441\\u0435\\u0440\\u0432\\u0438\\u0441\\u0430 \\u043a\\u043e\\u043b\\u043b\\u0435\\u043a\\u0442\\u0438\\u0432\\u043d\\u044b\\u0445 \\u043f\\u043e\\u043a\\u0443\\u043f\\u043e\\u043a<\\/li>\\r\\n    <li>\\u041e\\u0442\\u043a\\u0430\\u0437\\u043e\\u0443\\u0441\\u0442\\u043e\\u0439\\u0447\\u0438\\u0432\\u043e\\u0441\\u0442\\u044c: \\u043f\\u043e\\u0434\\u0434\\u0435\\u0440\\u0436\\u043a\\u0430 \\u0440\\u0430\\u0431\\u043e\\u0442\\u044b \\u0441 2+ \\u0441\\u0435\\u0440\\u0432\\u0435\\u0440\\u0430\\u043c\\u0438 \\u0431\\u0430\\u0437 \\u0434\\u0430\\u043d\\u043d\\u044b\\u0445\\t\\t\\t\\t iPhone-\\u043f\\u0440\\u0438\\u043b\\u043e\\u0436\\u0435\\u043d\\u0438\\u0435 \\u0432 \\u043a\\u043e\\u043c\\u043f\\u043b\\u0435\\u043a\\u0442\\u0435<\\/li>\\r\\n    <li>\\u041f\\u043e\\u0434\\u0434\\u0435\\u0440\\u0436\\u043a\\u0430 \\u0440\\u0430\\u0441\\u0441\\u044b\\u043b\\u043a\\u0438 \\u043f\\u043e \\u0431\\u043e\\u043b\\u0435\\u0435 \\u0447\\u0435\\u043c 100.000 \\u0430\\u0434\\u0440\\u0435\\u0441\\u043e\\u0432<\\/li>\\r\\n<\\/ul>","video":"<iframe width=\\"560\\" height=\\"315\\" frameborder=\\"0\\" src=\\"http:\\/\\/www.youtube.com\\/embed\\/zm3LwTzbAnk\\" allowfullscreen=\\"\\"><\\/iframe>","link":"grouponza-pro-v20","image":"2723d092b63885e0d7c260cc007e8b9d","price":"780","old_price":"880","discount":"12","meta_title":"Grouponza Pro v.2.0","meta_description":"Grouponza Pro v.2.0","meta_keywords":"Grouponza Pro v.2.0","meta_link_title":"","post_date":"2013-10-23 02:38:06","position":"3","active":"1","action":"0","recommend":"0","section_id":"10","category_id":"0","brand_id":"0","popular":"0","main":"1","user_id":"0","lang_id":"1","image_title":"Grouponza Pro v.2.0","images":[{"id":"109","title":"Grouponza Pro v.2.0","image":"2723d092b63885e0d7c260cc007e8b9d","main":"1","product_id":"2"},{"id":"115","title":"","image":"2b44928ae11fb9384c4cf38708677c48","main":"0","product_id":"2"},{"id":"116","title":"","image":"c45147dee729311ef5b5c3003946c48f","main":"0","product_id":"2"},{"id":"117","title":"","image":"eb160de1de89d9058fcb0b968dbbbd68","main":"0","product_id":"2"}],"count":"1","total_price":780},{"id":"9","title":"Grouponza Premium","description":"Grouponza - \\u043f\\u043b\\u0430\\u0442\\u0444\\u043e\\u0440\\u043c\\u0430 \\u21161 \\u0434\\u043b\\u044f \\u043a\\u0443\\u043f\\u043e\\u043d\\u043d\\u044b\\u0445 \\u0441\\u0430\\u0439\\u0442\\u043e\\u0432 \\u0432 \\u0421\\u041d\\u0413","addinfo":"","addinfo2":"&nbsp;","video":"&nbsp;","link":"grouponza-premium","image":"698d51a19d8a121ce581499d7b701668","price":"1980","old_price":"3950","discount":"50","meta_title":"Grouponza Premium","meta_description":"Grouponza Premium","meta_keywords":"Grouponza Premium","meta_link_title":"","post_date":"2013-11-01 21:40:38","position":"5","active":"1","action":"0","recommend":"0","section_id":"10","category_id":"0","brand_id":"0","popular":"0","main":"1","user_id":"0","lang_id":"1","image_title":"Grouponza Premium","images":[{"id":"111","title":"Grouponza Premium","image":"698d51a19d8a121ce581499d7b701668","main":"1","product_id":"9"}],"count":"1","total_price":1980},{"id":"12","title":"Scandy Enterprise","description":"<p style=\\"margin: 0px 0px 15px; padding: 0px; border: 0px; font-size: 13px; color: rgb(81, 94, 108); font-family: ''PT Sans'', Arial; line-height: 21px;\\">Scandy - \\u044d\\u0442\\u043e \\u043f\\u043b\\u0430\\u0442\\u0444\\u043e\\u0440\\u043c\\u0430 \\u0434\\u043b\\u044f \\u0441\\u043e\\u0437\\u0434\\u0430\\u043d\\u0438\\u044f \\u0430\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d\\u043e\\u0432. \\u0421\\u0438\\u0441\\u0442\\u0435\\u043c\\u0430 \\u0438\\u0437\\u043d\\u0430\\u0447\\u0430\\u043b\\u044c\\u043d\\u043e \\u0440\\u0430\\u0437\\u0440\\u0430\\u0431\\u0430\\u0442\\u044b\\u0432\\u0430\\u043b\\u0430\\u0441\\u044c \\u0442\\u043e\\u043b\\u044c\\u043a\\u043e \\u0434\\u043b\\u044f \\u0441\\u043a\\u0430\\u043d\\u0434\\u0438\\u043d\\u0430\\u0432\\u0441\\u043a\\u0438\\u0445 \\u0430\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d\\u043e\\u0432. \\u041f\\u043e \\u043c\\u0435\\u0440\\u0435 \\u0440\\u0430\\u0437\\u0432\\u0438\\u0442\\u0438\\u044f \\u043f\\u0440\\u043e\\u0434\\u0443\\u043a\\u0442\\u0430 \\u0434\\u043e\\u0431\\u0430\\u0432\\u043b\\u044f\\u043b\\u0438\\u0441\\u044c \\u043d\\u043e\\u0432\\u044b\\u0435 \\u0442\\u0438\\u043f\\u044b \\u0430\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d\\u043e\\u0432.<\\/p>","addinfo":"","addinfo2":"<p style=\\"margin: 0px 0px 15px; padding: 0px; border: 0px; font-size: 13px; color: rgb(81, 94, 108); font-family: ''PT Sans'', Arial; line-height: 21px;\\">Scandy - \\u044d\\u0442\\u043e \\u043f\\u043b\\u0430\\u0442\\u0444\\u043e\\u0440\\u043c\\u0430 \\u0434\\u043b\\u044f \\u0441\\u043e\\u0437\\u0434\\u0430\\u043d\\u0438\\u044f \\u0430\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d\\u043e\\u0432. \\u0421\\u0438\\u0441\\u0442\\u0435\\u043c\\u0430 \\u0438\\u0437\\u043d\\u0430\\u0447\\u0430\\u043b\\u044c\\u043d\\u043e \\u0440\\u0430\\u0437\\u0440\\u0430\\u0431\\u0430\\u0442\\u044b\\u0432\\u0430\\u043b\\u0430\\u0441\\u044c \\u0442\\u043e\\u043b\\u044c\\u043a\\u043e \\u0434\\u043b\\u044f \\u0441\\u043a\\u0430\\u043d\\u0434\\u0438\\u043d\\u0430\\u0432\\u0441\\u043a\\u0438\\u0445 \\u0430\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d\\u043e\\u0432. \\u041f\\u043e \\u043c\\u0435\\u0440\\u0435 \\u0440\\u0430\\u0437\\u0432\\u0438\\u0442\\u0438\\u044f \\u043f\\u0440\\u043e\\u0434\\u0443\\u043a\\u0442\\u0430 \\u0434\\u043e\\u0431\\u0430\\u0432\\u043b\\u044f\\u043b\\u0438\\u0441\\u044c \\u043d\\u043e\\u0432\\u044b\\u0435 \\u0442\\u0438\\u043f\\u044b \\u0430\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d\\u043e\\u0432. \\u041d\\u0430 \\u0434\\u0430\\u043d\\u043d\\u044b\\u0439 \\u043c\\u043e\\u043c\\u0435\\u043d\\u0442 \\u0432 \\u0441\\u0438\\u0441\\u0442\\u0435\\u043c\\u0435 8 \\u0442\\u0438\\u043f\\u043e\\u0432 \\u0430\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d\\u043e\\u0432:<\\/p>\\r\\n<ul style=\\"margin: 0px 0px 15px; padding: 0px; border: 0px; font-size: 13px; list-style: none; color: rgb(81, 94, 108); font-family: ''PT Sans'', Arial; line-height: 21px;\\">\\r\\n    <ol style=\\"margin: 0px; padding: 0px; border: 0px; font-weight: inherit; font-style: inherit; list-style: none;\\">\\r\\n        <li style=\\"margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http:\\/\\/new.antalika.com\\/templates\\/themes\\/default\\/css\\/themes\\/blue\\/images\\/lists\\/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;\\">1) \\u041a\\u043b\\u0430\\u0441\\u0441\\u0438\\u0447\\u0435\\u0441\\u043a\\u0438\\u0439 \\u0430\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d \\u043d\\u0430 \\u043f\\u043e\\u0432\\u044b\\u0448\\u0435\\u043d\\u0438\\u0435<\\/li>\\r\\n        <li style=\\"margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http:\\/\\/new.antalika.com\\/templates\\/themes\\/default\\/css\\/themes\\/blue\\/images\\/lists\\/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;\\">2) \\u0421\\u043a\\u0430\\u043d\\u0434\\u0438\\u043d\\u0430\\u0432\\u0441\\u043a\\u0438\\u0439 \\u0430\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d<\\/li>\\r\\n        <li style=\\"margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http:\\/\\/new.antalika.com\\/templates\\/themes\\/default\\/css\\/themes\\/blue\\/images\\/lists\\/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;\\">3) \\u041e\\u0431\\u0440\\u0430\\u0442\\u043d\\u044b\\u0439 \\u0430\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d \\u0441 \\u0437\\u0430\\u043a\\u0440\\u044b\\u0442\\u043e\\u0439 \\u0446\\u0435\\u043d\\u043e\\u0439<\\/li>\\r\\n        <li style=\\"margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http:\\/\\/new.antalika.com\\/templates\\/themes\\/default\\/css\\/themes\\/blue\\/images\\/lists\\/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;\\">4) \\u0413\\u043e\\u043b\\u043b\\u0430\\u043d\\u0434\\u0441\\u043a\\u0438\\u0439 (\\u043a\\u0430\\u043a \\u0441\\u043a\\u0430\\u043d\\u0434\\u0438\\u043d\\u0430\\u0432\\u0441\\u043a\\u0438\\u0439, \\u0442\\u043e\\u043b\\u044c\\u043a\\u043e \\u043d\\u0430 \\u043f\\u043e\\u043d\\u0438\\u0436\\u0435\\u043d\\u0438\\u0435)<\\/li>\\r\\n        <li style=\\"margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http:\\/\\/new.antalika.com\\/templates\\/themes\\/default\\/css\\/themes\\/blue\\/images\\/lists\\/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;\\">5) \\u0417\\u0430\\u043a\\u0440\\u044b\\u0442\\u044b\\u0439 \\u0430\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d<\\/li>\\r\\n        <li style=\\"margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http:\\/\\/new.antalika.com\\/templates\\/themes\\/default\\/css\\/themes\\/blue\\/images\\/lists\\/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;\\">6) \\u0410\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d &quot;\\u0413\\u0440\\u043e\\u0448-\\u0446\\u0435\\u043d\\u0430&quot;<\\/li>\\r\\n        <li style=\\"margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http:\\/\\/new.antalika.com\\/templates\\/themes\\/default\\/css\\/themes\\/blue\\/images\\/lists\\/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;\\">7) \\u0410\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d \\u043c\\u0438\\u043d\\u0438\\u043c\\u0430\\u043b\\u044c\\u043d\\u043e\\u0439 \\u0443\\u043d\\u0438\\u043a\\u0430\\u043b\\u044c\\u043d\\u043e\\u0439 \\u0441\\u0442\\u0430\\u0432\\u043a\\u0438<\\/li>\\r\\n        <li style=\\"margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http:\\/\\/new.antalika.com\\/templates\\/themes\\/default\\/css\\/themes\\/blue\\/images\\/lists\\/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;\\">8) \\u0410\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d \\u0434\\u043b\\u044f \\u043d\\u0443\\u043c\\u0438\\u0437\\u043c\\u0430\\u0442\\u043e\\u0432<\\/li>\\r\\n    <\\/ol>\\r\\n<\\/ul>\\r\\n<span style=\\"color: rgb(81, 94, 108); font-family: ''PT Sans'', Arial; font-size: 13px; line-height: 21px;\\">\\u041a\\u0430\\u0436\\u0434\\u044b\\u0439 \\u0442\\u0438\\u043f \\u0430\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d\\u0430 - \\u044d\\u0442\\u043e \\u0441\\u0432\\u043e\\u044f \\u0431\\u0438\\u0437\\u043d\\u0435\\u0441 \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c. \\u041e\\u043f\\u0438\\u0441\\u0430\\u043d\\u0438\\u0435 \\u043a\\u0430\\u0436\\u0434\\u043e\\u0439 \\u0431\\u0438\\u0437\\u043d\\u0435\\u0441-\\u043c\\u043e\\u0434\\u0435\\u043b\\u0438 \\u0432\\u044b \\u0441\\u043c\\u043e\\u0436\\u0435\\u0442\\u0435 \\u0443\\u0432\\u0438\\u0434\\u0435\\u0442\\u044c \\u043d\\u0438\\u0436\\u0435<\\/span>&nbsp;","video":"&nbsp;","link":"scandy-enterprise","image":"5fd0b37cd7dbbb00f97ba6ce92bf5add","price":"3480","old_price":"3990","discount":"13","meta_title":"Scandy Enterprise","meta_description":"Scandy Enterprise","meta_keywords":"Scandy Enterprise","meta_link_title":"","post_date":"2013-11-01 21:57:33","position":"11","active":"1","action":"0","recommend":"0","section_id":"8","category_id":"0","brand_id":"0","popular":"0","main":"1","user_id":"0","lang_id":"1","image_title":"Scandy Enterprise","images":[{"id":"114","title":"Scandy Enterprise","image":"5fd0b37cd7dbbb00f97ba6ce92bf5add","main":"1","product_id":"12"}],"count":"1","total_price":3480}]', 30, NULL, 0),
(2, 3, '2740', '2740', 0, NULL, '2740', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-01-20 13:30:23', 2, NULL, '[{"id":"8","title":"Grouponza Otima v.2.0","description":"Grouponza - \\u043f\\u043b\\u0430\\u0442\\u0444\\u043e\\u0440\\u043c\\u0430 \\u21161 \\u0434\\u043b\\u044f \\u043a\\u0443\\u043f\\u043e\\u043d\\u043d\\u044b\\u0445 \\u0441\\u0430\\u0439\\u0442\\u043e\\u0432 \\u0432 \\u0421\\u041d\\u0413","addinfo":"\\u0441\\u0435\\u043f\\u0442\\u0438\\u043a \\u0434\\u043b\\u044f \\u043f\\u043e\\u0441\\u0442\\u043e\\u044f\\u043d\\u043d\\u043e\\u0433\\u043e \\u043f\\u0440\\u043e\\u0436\\u0438\\u0432\\u0430\\u043d\\u0438\\u044f \\u0441\\u0435\\u043c\\u044c\\u0438 \\u0438\\u0437 3-5 \\u0447\\u0435\\u043b\\u043e\\u0432\\u0435\\u043a","addinfo2":"&nbsp;","video":"&nbsp;","link":"grouponza-otima-v20","image":"5f93f983524def3dca464469d2cf9f3e","price":"480","old_price":"780","discount":"39","meta_title":"Grouponza Otima v.2.0","meta_description":"Grouponza Otima v.2.0","meta_keywords":"Grouponza Otima v.2.0","meta_link_title":"","post_date":"2013-11-01 21:30:36","position":"4","active":"1","action":"0","recommend":"0","section_id":"10","category_id":"0","brand_id":"0","popular":"0","main":"1","user_id":"0","lang_id":"1","image_title":"Grouponza Otima v.2.0","images":[{"id":"110","title":"Grouponza Otima v.2.0","image":"5f93f983524def3dca464469d2cf9f3e","main":"1","product_id":"8"}],"count":"1","total_price":480},{"id":"2","title":"Grouponza Pro v.2.0","description":"Grouponza - \\u043f\\u043b\\u0430\\u0442\\u0444\\u043e\\u0440\\u043c\\u0430 \\u21161 \\u0434\\u043b\\u044f \\u043a\\u0443\\u043f\\u043e\\u043d\\u043d\\u044b\\u0445 \\u0441\\u0430\\u0439\\u0442\\u043e\\u0432 \\u0432 \\u0421\\u041d\\u0413","addinfo":"","addinfo2":"<div>&nbsp;<\\/div>\\r\\n<ul>\\r\\n    <li>\\u0413\\u043e\\u0442\\u043e\\u0432\\u044b\\u0439 \\u0448\\u0430\\u0431\\u043b\\u043e\\u043d \\u0434\\u0438\\u0437\\u0430\\u0439\\u043d\\u0430 \\u0438\\u0437 3-\\u0445 \\u0432\\u0430\\u0440\\u0438\\u0430\\u043d\\u0442\\u043e\\u0432 \\u043d\\u0430 \\u0432\\u044b\\u0431\\u043e\\u0440<\\/li>\\r\\n    <li>\\u0412\\u043e\\u0437\\u043c\\u043e\\u0436\\u043d\\u043e\\u0441\\u0442\\u044c \\u0438\\u0437\\u043c\\u0435\\u043d\\u044f\\u0442\\u044c \\u0433\\u043e\\u0442\\u043e\\u0432\\u044b\\u0439 \\u0448\\u0430\\u0431\\u043b\\u043e\\u043d \\u0434\\u0438\\u0437\\u0430\\u0439\\u043d\\u0430 \\u0432 \\u0441\\u0438\\u0441\\u0442\\u0435\\u043c\\u0435 \\u0443\\u043f\\u0440\\u0430\\u0432\\u043b\\u0435\\u043d\\u0438\\u044f<\\/li>\\r\\n    <li>\\u0420\\u0430\\u0431\\u043e\\u0442\\u0430 \\u0432 \\u043d\\u0435\\u043e\\u0433\\u0440\\u0430\\u043d\\u0438\\u0447\\u0435\\u043d\\u043d\\u043e\\u043c \\u0447\\u0438\\u0441\\u043b\\u0435 \\u0433\\u043e\\u0440\\u043e\\u0434\\u043e\\u0432<\\/li>\\r\\n    <li>\\u041a\\u0443\\u043f\\u0438\\u0442\\u044c \\u043a\\u0443\\u043f\\u043e\\u043d \\u0434\\u0440\\u0443\\u0433\\u0443 (\\u043a\\u0443\\u043f\\u043e\\u043d \\u0432 \\u043f\\u043e\\u0434\\u0430\\u0440\\u043e\\u043a)<\\/li>\\r\\n    <li>\\u043d\\u0442\\u0435\\u0433\\u0440\\u0430\\u0446\\u0438\\u044f c Robokassa<\\/li>\\r\\n    <li>\\u041d\\u0430\\u043b\\u0438\\u0447\\u0438\\u0435 \\u0438\\u043d\\u0442\\u0435\\u0433\\u0440\\u0430\\u0446\\u0438\\u0438 c Masterbank.ru<\\/li>\\r\\n    <li>\\u0412\\u043e\\u0437\\u043c\\u043e\\u0436\\u043d\\u043e\\u0441\\u0442\\u044c \\u043f\\u043e\\u043b\\u0443\\u0447\\u0430\\u0442\\u044c \\u043a\\u043e\\u0434 \\u043a\\u0443\\u043f\\u043e\\u043d\\u0430 \\u043f\\u043e sms<\\/li>\\r\\n    <li>\\u041a\\u0430\\u0440\\u0442\\u044b Yandex \\/ Google<\\/li>\\r\\n    <li>\\u0412\\u043e\\u0437\\u043c\\u043e\\u0436\\u043d\\u043e\\u0441\\u0442\\u044c \\u0443\\u043a\\u0430\\u0437\\u044b\\u0432\\u0430\\u0442\\u044c \\u0432\\u0430\\u043b\\u044e\\u0442\\u0443, \\u0432 \\u043a\\u043e\\u0442\\u043e\\u0440\\u043e\\u0439 \\u0440\\u0430\\u0431\\u043e\\u0442\\u0430\\u0435\\u0442 \\u0441\\u0430\\u0439\\u0442\\t\\t\\t\\t \\u0424\\u043e\\u0440\\u043c\\u0430 \\u043e\\u0431\\u0440\\u0430\\u0442\\u043d\\u043e\\u0439 \\u0441\\u0432\\u044f\\u0437\\u0438<\\/li>\\r\\n    <li>\\u041c\\u0430\\u0440\\u043a\\u0435\\u0442\\u0438\\u043d\\u0433\\u043e\\u0432\\u044b\\u0439 \\u043d\\u0430\\u043a\\u0440\\u0443\\u0442\\u0447\\u0438\\u043a \\u0441\\u0447\\u0435\\u0442\\u0447\\u0438\\u043a\\u0430 \\u043f\\u043e\\u043a\\u0443\\u043f\\u043e\\u043a (\\u0447\\u0438\\u0441\\u043b\\u043e \\u043a\\u0443\\u043f\\u043b\\u0435\\u043d\\u043d\\u044b\\u0445 \\u043a\\u0443\\u043f\\u043e\\u043d\\u043e\\u0432, \\u0441\\u043a\\u043e\\u043b\\u044c\\u043a\\u043e \\u043b\\u044e\\u0434\\u0435\\u0439 \\u043a\\u0443\\u043f\\u0438\\u043b\\u043e)<\\/li>\\r\\n    <li>\\u041f\\u043e\\u0434\\u0434\\u0435\\u0440\\u0436\\u043a\\u0430 \\u0432\\u0445\\u043e\\u0434\\u0430 \\u043d\\u0430 \\u0441\\u0430\\u0439\\u0442 \\u0447\\u0435\\u0440\\u0435\\u0437 \\u0441\\u043e\\u0446\\u0438\\u0430\\u043b\\u044c\\u043d\\u044b\\u0435 \\u0441\\u0435\\u0442\\u0438: Facebook, Vkontakte<\\/li>\\r\\n    <li>\\u041f\\u0440\\u0438\\u0433\\u043b\\u0430\\u0441\\u0438 \\u0434\\u0440\\u0443\\u0433\\u0430 \\u0438 \\u043f\\u043e\\u043b\\u0443\\u0447\\u0438 100 \\u0440\\u0443\\u0431\\u043b\\u0435\\u0439 \\u043d\\u0430 \\u0441\\u0447\\u0435\\u0442 (\\u0432\\u043e\\u0437\\u043c\\u043e\\u0436\\u043d\\u043e\\u0441\\u0442\\u044c \\u043e\\u0442\\u043a\\u043b\\u044e\\u0447\\u0430\\u0442\\u044c \\u044d\\u0442\\u0443 \\u043e\\u043f\\u0446\\u0438\\u044e, \\u0430 \\u0442\\u0430\\u043a\\u0436\\u0435 \\u043c\\u0435\\u043d\\u044f\\u0442\\u044c \\u0441\\u0443\\u043c\\u043c\\u0443 \\u0432\\u043e\\u0437\\u043d\\u0430\\u0433\\u0440\\u0430\\u0436\\u0434\\u0435\\u043d\\u0438\\u044f)<\\/li>\\r\\n    <li>\\u041e\\u043a\\u043d\\u043e \\u0434\\u043b\\u044f \\u043e\\u0431\\u044f\\u0437\\u0430\\u0442\\u0435\\u043b\\u044c\\u043d\\u043e\\u0439 \\u0440\\u0435\\u0433\\u0438\\u0441\\u0442\\u0440\\u0430\\u0446\\u0438\\u0438 \\u043d\\u0430 \\u0441\\u0430\\u0439\\u0442\\u0435.<\\/li>\\r\\n    <li>Wish list. \\u041c\\u043e\\u0434\\u0443\\u043b\\u044c, \\u043a\\u043e\\u0442\\u043e\\u0440\\u044b\\u0439 \\u043f\\u043e\\u0437\\u0432\\u043e\\u043b\\u044f\\u0435\\u0442 \\u043f\\u043e\\u043b\\u044c\\u0437\\u043e\\u0432\\u0430\\u0442\\u0435\\u043b\\u044f\\u043c \\u0443\\u043a\\u0430\\u0437\\u0430\\u0442\\u044c \\u043a\\u0430\\u0442\\u0435\\u0433\\u043e\\u0440\\u0438\\u0438 \\u0430\\u043a\\u0446\\u0438\\u0439, \\u043a\\u043e\\u0442\\u043e\\u0440\\u044b\\u0435 \\u043e\\u043d\\u0438 \\u0431\\u044b \\u0445\\u043e\\u0442\\u0435\\u043b\\u0438 \\u0432\\u0438\\u0434\\u0435\\u0442\\u044c \\u043d\\u0430 \\u0441\\u0430\\u0439\\u0442\\u0435.<\\/li>\\r\\n    <li>\\u041a\\u0430\\u0431\\u0438\\u043d\\u0435\\u0442 \\u0431\\u0438\\u0437\\u043d\\u0435\\u0441 \\u043f\\u0430\\u0440\\u0442\\u043d\\u0435\\u0440\\u0430 \\u0434\\u043b\\u044f \\u0443\\u0447\\u0435\\u0442\\u0430 \\u043f\\u043e\\u0433\\u0430\\u0448\\u0435\\u043d\\u043d\\u044b\\u0445 \\u043a\\u0443\\u043f\\u043e\\u043d\\u043e\\u0432<\\/li>\\r\\n    <li>\\u041a\\u0430\\u0431\\u0438\\u043d\\u0435\\u0442 \\u043a\\u0430\\u0441\\u0441\\u0438\\u0440\\u0430<\\/li>\\r\\n    <li>\\u041a\\u0430\\u0442\\u0435\\u0433\\u043e\\u0440\\u0438\\u0438 \\u0430\\u043a\\u0446\\u0438\\u0439<\\/li>\\r\\n    <li>\\u0412\\u044b\\u0433\\u0440\\u0443\\u0437\\u043a\\u0430 \\u0434\\u0430\\u043d\\u043d\\u044b\\u0445 \\u0432 KuponGid.ru<\\/li>\\r\\n    <li>\\u0411\\u0435\\u0441\\u043f\\u043b\\u0430\\u0442\\u043d\\u0430\\u044f \\u043d\\u0430\\u0441\\u0442\\u0440\\u043e\\u0439\\u043a\\u0430 \\u043f\\u043e\\u0447\\u0442\\u043e\\u0432\\u043e\\u0439 \\u0440\\u0430\\u0441\\u0441\\u044b\\u043b\\u043a\\u0438<\\/li>\\r\\n    <li>\\u0422\\u0438\\u043f\\u043e\\u0432\\u043e\\u0439 \\u0434\\u043e\\u0433\\u043e\\u0432\\u043e\\u0440 \\u0434\\u043b\\u044f \\u0440\\u0430\\u0431\\u043e\\u0442\\u044b \\u0441 \\u043f\\u043e\\u0441\\u0442\\u0430\\u0432\\u0449\\u0438\\u043a\\u0430\\u043c\\u0438 \\u0443\\u0441\\u043b\\u0443\\u0433<\\/li>\\r\\n    <li>\\u0428\\u0430\\u0431\\u043b\\u043e\\u043d \\u0434\\u0438\\u0437\\u0430\\u0439\\u043d\\u0430 \\u043a\\u043e\\u043c\\u043c\\u0435\\u0440\\u0447\\u0435\\u0441\\u043a\\u043e\\u0433\\u043e \\u043f\\u0440\\u0435\\u0434\\u043b\\u043e\\u0436\\u0435\\u043d\\u0438\\u044f \\u0434\\u043b\\u044f \\u0440\\u0430\\u0431\\u043e\\u0442\\u044b \\u0441 \\u043f\\u0430\\u0440\\u0442\\u043d\\u0435\\u0440\\u0430\\u043c\\u0438<\\/li>\\r\\n    <li>\\u0420\\u0435\\u043a\\u043e\\u043c\\u0435\\u043d\\u0434\\u0430\\u0446\\u0438\\u0438 \\u0438 \\u0441\\u043e\\u0432\\u0435\\u0442\\u044b \\u043f\\u043e \\u0440\\u0430\\u0441\\u043a\\u0440\\u0443\\u0442\\u043a\\u0435 \\u0441\\u0435\\u0440\\u0432\\u0438\\u0441\\u0430 \\u043a\\u043e\\u043b\\u043b\\u0435\\u043a\\u0442\\u0438\\u0432\\u043d\\u044b\\u0445 \\u043f\\u043e\\u043a\\u0443\\u043f\\u043e\\u043a<\\/li>\\r\\n    <li>\\u041e\\u0442\\u043a\\u0430\\u0437\\u043e\\u0443\\u0441\\u0442\\u043e\\u0439\\u0447\\u0438\\u0432\\u043e\\u0441\\u0442\\u044c: \\u043f\\u043e\\u0434\\u0434\\u0435\\u0440\\u0436\\u043a\\u0430 \\u0440\\u0430\\u0431\\u043e\\u0442\\u044b \\u0441 2+ \\u0441\\u0435\\u0440\\u0432\\u0435\\u0440\\u0430\\u043c\\u0438 \\u0431\\u0430\\u0437 \\u0434\\u0430\\u043d\\u043d\\u044b\\u0445\\t\\t\\t\\t iPhone-\\u043f\\u0440\\u0438\\u043b\\u043e\\u0436\\u0435\\u043d\\u0438\\u0435 \\u0432 \\u043a\\u043e\\u043c\\u043f\\u043b\\u0435\\u043a\\u0442\\u0435<\\/li>\\r\\n    <li>\\u041f\\u043e\\u0434\\u0434\\u0435\\u0440\\u0436\\u043a\\u0430 \\u0440\\u0430\\u0441\\u0441\\u044b\\u043b\\u043a\\u0438 \\u043f\\u043e \\u0431\\u043e\\u043b\\u0435\\u0435 \\u0447\\u0435\\u043c 100.000 \\u0430\\u0434\\u0440\\u0435\\u0441\\u043e\\u0432<\\/li>\\r\\n<\\/ul>","video":"<iframe width=\\"560\\" height=\\"315\\" frameborder=\\"0\\" src=\\"http:\\/\\/www.youtube.com\\/embed\\/zm3LwTzbAnk\\" allowfullscreen=\\"\\"><\\/iframe>","link":"grouponza-pro-v20","image":"2723d092b63885e0d7c260cc007e8b9d","price":"780","old_price":"880","discount":"12","meta_title":"Grouponza Pro v.2.0","meta_description":"Grouponza Pro v.2.0","meta_keywords":"Grouponza Pro v.2.0","meta_link_title":"","post_date":"2013-10-23 02:38:06","position":"3","active":"1","action":"0","recommend":"0","section_id":"10","category_id":"0","brand_id":"0","popular":"0","main":"1","user_id":"0","lang_id":"1","image_title":"Grouponza Pro v.2.0","images":[{"id":"109","title":"Grouponza Pro v.2.0","image":"2723d092b63885e0d7c260cc007e8b9d","main":"1","product_id":"2"},{"id":"115","title":"","image":"2b44928ae11fb9384c4cf38708677c48","main":"0","product_id":"2"},{"id":"116","title":"","image":"c45147dee729311ef5b5c3003946c48f","main":"0","product_id":"2"},{"id":"117","title":"","image":"eb160de1de89d9058fcb0b968dbbbd68","main":"0","product_id":"2"}],"count":"1","total_price":780},{"id":"11","title":"Scandy Pro","description":"<p style=\\"margin: 0px 0px 15px; padding: 0px; border: 0px; font-size: 13px; color: rgb(81, 94, 108); font-family: ''PT Sans'', Arial; line-height: 21px;\\">Scandy - \\u044d\\u0442\\u043e \\u043f\\u043b\\u0430\\u0442\\u0444\\u043e\\u0440\\u043c\\u0430 \\u0434\\u043b\\u044f \\u0441\\u043e\\u0437\\u0434\\u0430\\u043d\\u0438\\u044f \\u0430\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d\\u043e\\u0432. \\u0421\\u0438\\u0441\\u0442\\u0435\\u043c\\u0430 \\u0438\\u0437\\u043d\\u0430\\u0447\\u0430\\u043b\\u044c\\u043d\\u043e \\u0440\\u0430\\u0437\\u0440\\u0430\\u0431\\u0430\\u0442\\u044b\\u0432\\u0430\\u043b\\u0430\\u0441\\u044c \\u0442\\u043e\\u043b\\u044c\\u043a\\u043e \\u0434\\u043b\\u044f \\u0441\\u043a\\u0430\\u043d\\u0434\\u0438\\u043d\\u0430\\u0432\\u0441\\u043a\\u0438\\u0445 \\u0430\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d\\u043e\\u0432. \\u041f\\u043e \\u043c\\u0435\\u0440\\u0435 \\u0440\\u0430\\u0437\\u0432\\u0438\\u0442\\u0438\\u044f \\u043f\\u0440\\u043e\\u0434\\u0443\\u043a\\u0442\\u0430 \\u0434\\u043e\\u0431\\u0430\\u0432\\u043b\\u044f\\u043b\\u0438\\u0441\\u044c \\u043d\\u043e\\u0432\\u044b\\u0435 \\u0442\\u0438\\u043f\\u044b \\u0430\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d\\u043e\\u0432. \\u041d\\u0430 \\u0434\\u0430\\u043d\\u043d\\u044b\\u0439 \\u043c\\u043e\\u043c\\u0435\\u043d\\u0442 \\u0432 \\u0441\\u0438\\u0441\\u0442\\u0435\\u043c\\u0435 8 \\u0442\\u0438\\u043f\\u043e\\u0432 \\u0430\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d\\u043e\\u0432.<\\/p>","addinfo":"","addinfo2":"<p style=\\"margin: 0px 0px 15px; padding: 0px; border: 0px; font-size: 13px; color: rgb(81, 94, 108); font-family: ''PT Sans'', Arial; line-height: 21px;\\">Scandy - \\u044d\\u0442\\u043e \\u043f\\u043b\\u0430\\u0442\\u0444\\u043e\\u0440\\u043c\\u0430 \\u0434\\u043b\\u044f \\u0441\\u043e\\u0437\\u0434\\u0430\\u043d\\u0438\\u044f \\u0430\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d\\u043e\\u0432. \\u0421\\u0438\\u0441\\u0442\\u0435\\u043c\\u0430 \\u0438\\u0437\\u043d\\u0430\\u0447\\u0430\\u043b\\u044c\\u043d\\u043e \\u0440\\u0430\\u0437\\u0440\\u0430\\u0431\\u0430\\u0442\\u044b\\u0432\\u0430\\u043b\\u0430\\u0441\\u044c \\u0442\\u043e\\u043b\\u044c\\u043a\\u043e \\u0434\\u043b\\u044f \\u0441\\u043a\\u0430\\u043d\\u0434\\u0438\\u043d\\u0430\\u0432\\u0441\\u043a\\u0438\\u0445 \\u0430\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d\\u043e\\u0432. \\u041f\\u043e \\u043c\\u0435\\u0440\\u0435 \\u0440\\u0430\\u0437\\u0432\\u0438\\u0442\\u0438\\u044f \\u043f\\u0440\\u043e\\u0434\\u0443\\u043a\\u0442\\u0430 \\u0434\\u043e\\u0431\\u0430\\u0432\\u043b\\u044f\\u043b\\u0438\\u0441\\u044c \\u043d\\u043e\\u0432\\u044b\\u0435 \\u0442\\u0438\\u043f\\u044b \\u0430\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d\\u043e\\u0432. \\u041d\\u0430 \\u0434\\u0430\\u043d\\u043d\\u044b\\u0439 \\u043c\\u043e\\u043c\\u0435\\u043d\\u0442 \\u0432 \\u0441\\u0438\\u0441\\u0442\\u0435\\u043c\\u0435 8 \\u0442\\u0438\\u043f\\u043e\\u0432 \\u0430\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d\\u043e\\u0432:<\\/p>\\r\\n<ul style=\\"margin: 0px 0px 15px; padding: 0px; border: 0px; font-size: 13px; list-style: none; color: rgb(81, 94, 108); font-family: ''PT Sans'', Arial; line-height: 21px;\\">\\r\\n    <ol style=\\"margin: 0px; padding: 0px; border: 0px; font-weight: inherit; font-style: inherit; list-style: none;\\">\\r\\n        <li style=\\"margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http:\\/\\/new.antalika.com\\/templates\\/themes\\/default\\/css\\/themes\\/blue\\/images\\/lists\\/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;\\">1) \\u041a\\u043b\\u0430\\u0441\\u0441\\u0438\\u0447\\u0435\\u0441\\u043a\\u0438\\u0439 \\u0430\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d \\u043d\\u0430 \\u043f\\u043e\\u0432\\u044b\\u0448\\u0435\\u043d\\u0438\\u0435<\\/li>\\r\\n        <li style=\\"margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http:\\/\\/new.antalika.com\\/templates\\/themes\\/default\\/css\\/themes\\/blue\\/images\\/lists\\/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;\\">2) \\u0421\\u043a\\u0430\\u043d\\u0434\\u0438\\u043d\\u0430\\u0432\\u0441\\u043a\\u0438\\u0439 \\u0430\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d<\\/li>\\r\\n        <li style=\\"margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http:\\/\\/new.antalika.com\\/templates\\/themes\\/default\\/css\\/themes\\/blue\\/images\\/lists\\/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;\\">3) \\u041e\\u0431\\u0440\\u0430\\u0442\\u043d\\u044b\\u0439 \\u0430\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d \\u0441 \\u0437\\u0430\\u043a\\u0440\\u044b\\u0442\\u043e\\u0439 \\u0446\\u0435\\u043d\\u043e\\u0439<\\/li>\\r\\n        <li style=\\"margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http:\\/\\/new.antalika.com\\/templates\\/themes\\/default\\/css\\/themes\\/blue\\/images\\/lists\\/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;\\">4) \\u0413\\u043e\\u043b\\u043b\\u0430\\u043d\\u0434\\u0441\\u043a\\u0438\\u0439 (\\u043a\\u0430\\u043a \\u0441\\u043a\\u0430\\u043d\\u0434\\u0438\\u043d\\u0430\\u0432\\u0441\\u043a\\u0438\\u0439, \\u0442\\u043e\\u043b\\u044c\\u043a\\u043e \\u043d\\u0430 \\u043f\\u043e\\u043d\\u0438\\u0436\\u0435\\u043d\\u0438\\u0435)<\\/li>\\r\\n        <li style=\\"margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http:\\/\\/new.antalika.com\\/templates\\/themes\\/default\\/css\\/themes\\/blue\\/images\\/lists\\/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;\\">5) \\u0417\\u0430\\u043a\\u0440\\u044b\\u0442\\u044b\\u0439 \\u0430\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d<\\/li>\\r\\n        <li style=\\"margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http:\\/\\/new.antalika.com\\/templates\\/themes\\/default\\/css\\/themes\\/blue\\/images\\/lists\\/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;\\">6) \\u0410\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d &quot;\\u0413\\u0440\\u043e\\u0448-\\u0446\\u0435\\u043d\\u0430&quot;<\\/li>\\r\\n        <li style=\\"margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http:\\/\\/new.antalika.com\\/templates\\/themes\\/default\\/css\\/themes\\/blue\\/images\\/lists\\/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;\\">7) \\u0410\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d \\u043c\\u0438\\u043d\\u0438\\u043c\\u0430\\u043b\\u044c\\u043d\\u043e\\u0439 \\u0443\\u043d\\u0438\\u043a\\u0430\\u043b\\u044c\\u043d\\u043e\\u0439 \\u0441\\u0442\\u0430\\u0432\\u043a\\u0438<\\/li>\\r\\n        <li style=\\"margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http:\\/\\/new.antalika.com\\/templates\\/themes\\/default\\/css\\/themes\\/blue\\/images\\/lists\\/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;\\">8) \\u0410\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d \\u0434\\u043b\\u044f \\u043d\\u0443\\u043c\\u0438\\u0437\\u043c\\u0430\\u0442\\u043e\\u0432<\\/li>\\r\\n    <\\/ol>\\r\\n<\\/ul>\\r\\n<span style=\\"color: rgb(81, 94, 108); font-family: ''PT Sans'', Arial; font-size: 13px; line-height: 21px;\\">\\u041a\\u0430\\u0436\\u0434\\u044b\\u0439 \\u0442\\u0438\\u043f \\u0430\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d\\u0430 - \\u044d\\u0442\\u043e \\u0441\\u0432\\u043e\\u044f \\u0431\\u0438\\u0437\\u043d\\u0435\\u0441 \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c. \\u041e\\u043f\\u0438\\u0441\\u0430\\u043d\\u0438\\u0435 \\u043a\\u0430\\u0436\\u0434\\u043e\\u0439 \\u0431\\u0438\\u0437\\u043d\\u0435\\u0441-\\u043c\\u043e\\u0434\\u0435\\u043b\\u0438 \\u0432\\u044b \\u0441\\u043c\\u043e\\u0436\\u0435\\u0442\\u0435 \\u0443\\u0432\\u0438\\u0434\\u0435\\u0442\\u044c \\u043d\\u0438\\u0436\\u0435<\\/span>&nbsp;","video":"&nbsp;","link":"scandy-pro","image":"73278a4a86960eeb576a8fd4c9ec6997","price":"1480","old_price":"2480","discount":"41","meta_title":"Scandy Pro","meta_description":"Scandy Pro","meta_keywords":"Scandy Pro","meta_link_title":"","post_date":"2013-11-01 21:55:08","position":"10","active":"1","action":"0","recommend":"0","section_id":"8","category_id":"0","brand_id":"0","popular":"0","main":"1","user_id":"0","lang_id":"1","image_title":"Scandy Pro","images":[{"id":"113","title":"Scandy Pro","image":"73278a4a86960eeb576a8fd4c9ec6997","main":"1","product_id":"11"}],"count":"1","total_price":1480}]', 39, NULL, 1);
INSERT INTO `orders` (`id`, `cd_count`, `price`, `sprice`, `skidka`, `dostavka`, `total_price`, `name`, `country`, `country_id`, `zip`, `city`, `address`, `email`, `phone`, `post_date`, `status`, `host`, `products`, `user_id`, `comment`, `payed`) VALUES
(3, 3, '3240', '3240', 0, NULL, '3240', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-01-21 10:25:49', 1, NULL, '[{"id":"8","title":"Grouponza Otima v.2.0","description":"Grouponza - \\u043f\\u043b\\u0430\\u0442\\u0444\\u043e\\u0440\\u043c\\u0430 \\u21161 \\u0434\\u043b\\u044f \\u043a\\u0443\\u043f\\u043e\\u043d\\u043d\\u044b\\u0445 \\u0441\\u0430\\u0439\\u0442\\u043e\\u0432 \\u0432 \\u0421\\u041d\\u0413","addinfo":"\\u0441\\u0435\\u043f\\u0442\\u0438\\u043a \\u0434\\u043b\\u044f \\u043f\\u043e\\u0441\\u0442\\u043e\\u044f\\u043d\\u043d\\u043e\\u0433\\u043e \\u043f\\u0440\\u043e\\u0436\\u0438\\u0432\\u0430\\u043d\\u0438\\u044f \\u0441\\u0435\\u043c\\u044c\\u0438 \\u0438\\u0437 3-5 \\u0447\\u0435\\u043b\\u043e\\u0432\\u0435\\u043a","addinfo2":"&nbsp;","video":"&nbsp;","link":"grouponza-otima-v20","image":"5f93f983524def3dca464469d2cf9f3e","price":"480","old_price":"780","discount":"39","meta_title":"Grouponza Otima v.2.0","meta_description":"Grouponza Otima v.2.0","meta_keywords":"Grouponza Otima v.2.0","meta_link_title":"","post_date":"2013-11-01 21:30:36","position":"4","active":"1","action":"0","recommend":"0","section_id":"10","category_id":"0","brand_id":"0","popular":"0","main":"1","hash":"c9f0f895fb98ab9159f51fd0297e236d","user_id":"0","lang_id":"1","image_title":"Grouponza Otima v.2.0","images":[{"id":"110","title":"Grouponza Otima v.2.0","image":"5f93f983524def3dca464469d2cf9f3e","main":"1","product_id":"8"}],"count":"1","total_price":480},{"id":"2","title":"Grouponza Pro v.2.0","description":"Grouponza - \\u043f\\u043b\\u0430\\u0442\\u0444\\u043e\\u0440\\u043c\\u0430 \\u21161 \\u0434\\u043b\\u044f \\u043a\\u0443\\u043f\\u043e\\u043d\\u043d\\u044b\\u0445 \\u0441\\u0430\\u0439\\u0442\\u043e\\u0432 \\u0432 \\u0421\\u041d\\u0413","addinfo":"","addinfo2":"<div>&nbsp;<\\/div>\\r\\n<ul>\\r\\n    <li>\\u0413\\u043e\\u0442\\u043e\\u0432\\u044b\\u0439 \\u0448\\u0430\\u0431\\u043b\\u043e\\u043d \\u0434\\u0438\\u0437\\u0430\\u0439\\u043d\\u0430 \\u0438\\u0437 3-\\u0445 \\u0432\\u0430\\u0440\\u0438\\u0430\\u043d\\u0442\\u043e\\u0432 \\u043d\\u0430 \\u0432\\u044b\\u0431\\u043e\\u0440<\\/li>\\r\\n    <li>\\u0412\\u043e\\u0437\\u043c\\u043e\\u0436\\u043d\\u043e\\u0441\\u0442\\u044c \\u0438\\u0437\\u043c\\u0435\\u043d\\u044f\\u0442\\u044c \\u0433\\u043e\\u0442\\u043e\\u0432\\u044b\\u0439 \\u0448\\u0430\\u0431\\u043b\\u043e\\u043d \\u0434\\u0438\\u0437\\u0430\\u0439\\u043d\\u0430 \\u0432 \\u0441\\u0438\\u0441\\u0442\\u0435\\u043c\\u0435 \\u0443\\u043f\\u0440\\u0430\\u0432\\u043b\\u0435\\u043d\\u0438\\u044f<\\/li>\\r\\n    <li>\\u0420\\u0430\\u0431\\u043e\\u0442\\u0430 \\u0432 \\u043d\\u0435\\u043e\\u0433\\u0440\\u0430\\u043d\\u0438\\u0447\\u0435\\u043d\\u043d\\u043e\\u043c \\u0447\\u0438\\u0441\\u043b\\u0435 \\u0433\\u043e\\u0440\\u043e\\u0434\\u043e\\u0432<\\/li>\\r\\n    <li>\\u041a\\u0443\\u043f\\u0438\\u0442\\u044c \\u043a\\u0443\\u043f\\u043e\\u043d \\u0434\\u0440\\u0443\\u0433\\u0443 (\\u043a\\u0443\\u043f\\u043e\\u043d \\u0432 \\u043f\\u043e\\u0434\\u0430\\u0440\\u043e\\u043a)<\\/li>\\r\\n    <li>\\u043d\\u0442\\u0435\\u0433\\u0440\\u0430\\u0446\\u0438\\u044f c Robokassa<\\/li>\\r\\n    <li>\\u041d\\u0430\\u043b\\u0438\\u0447\\u0438\\u0435 \\u0438\\u043d\\u0442\\u0435\\u0433\\u0440\\u0430\\u0446\\u0438\\u0438 c Masterbank.ru<\\/li>\\r\\n    <li>\\u0412\\u043e\\u0437\\u043c\\u043e\\u0436\\u043d\\u043e\\u0441\\u0442\\u044c \\u043f\\u043e\\u043b\\u0443\\u0447\\u0430\\u0442\\u044c \\u043a\\u043e\\u0434 \\u043a\\u0443\\u043f\\u043e\\u043d\\u0430 \\u043f\\u043e sms<\\/li>\\r\\n    <li>\\u041a\\u0430\\u0440\\u0442\\u044b Yandex \\/ Google<\\/li>\\r\\n    <li>\\u0412\\u043e\\u0437\\u043c\\u043e\\u0436\\u043d\\u043e\\u0441\\u0442\\u044c \\u0443\\u043a\\u0430\\u0437\\u044b\\u0432\\u0430\\u0442\\u044c \\u0432\\u0430\\u043b\\u044e\\u0442\\u0443, \\u0432 \\u043a\\u043e\\u0442\\u043e\\u0440\\u043e\\u0439 \\u0440\\u0430\\u0431\\u043e\\u0442\\u0430\\u0435\\u0442 \\u0441\\u0430\\u0439\\u0442\\t\\t\\t\\t \\u0424\\u043e\\u0440\\u043c\\u0430 \\u043e\\u0431\\u0440\\u0430\\u0442\\u043d\\u043e\\u0439 \\u0441\\u0432\\u044f\\u0437\\u0438<\\/li>\\r\\n    <li>\\u041c\\u0430\\u0440\\u043a\\u0435\\u0442\\u0438\\u043d\\u0433\\u043e\\u0432\\u044b\\u0439 \\u043d\\u0430\\u043a\\u0440\\u0443\\u0442\\u0447\\u0438\\u043a \\u0441\\u0447\\u0435\\u0442\\u0447\\u0438\\u043a\\u0430 \\u043f\\u043e\\u043a\\u0443\\u043f\\u043e\\u043a (\\u0447\\u0438\\u0441\\u043b\\u043e \\u043a\\u0443\\u043f\\u043b\\u0435\\u043d\\u043d\\u044b\\u0445 \\u043a\\u0443\\u043f\\u043e\\u043d\\u043e\\u0432, \\u0441\\u043a\\u043e\\u043b\\u044c\\u043a\\u043e \\u043b\\u044e\\u0434\\u0435\\u0439 \\u043a\\u0443\\u043f\\u0438\\u043b\\u043e)<\\/li>\\r\\n    <li>\\u041f\\u043e\\u0434\\u0434\\u0435\\u0440\\u0436\\u043a\\u0430 \\u0432\\u0445\\u043e\\u0434\\u0430 \\u043d\\u0430 \\u0441\\u0430\\u0439\\u0442 \\u0447\\u0435\\u0440\\u0435\\u0437 \\u0441\\u043e\\u0446\\u0438\\u0430\\u043b\\u044c\\u043d\\u044b\\u0435 \\u0441\\u0435\\u0442\\u0438: Facebook, Vkontakte<\\/li>\\r\\n    <li>\\u041f\\u0440\\u0438\\u0433\\u043b\\u0430\\u0441\\u0438 \\u0434\\u0440\\u0443\\u0433\\u0430 \\u0438 \\u043f\\u043e\\u043b\\u0443\\u0447\\u0438 100 \\u0440\\u0443\\u0431\\u043b\\u0435\\u0439 \\u043d\\u0430 \\u0441\\u0447\\u0435\\u0442 (\\u0432\\u043e\\u0437\\u043c\\u043e\\u0436\\u043d\\u043e\\u0441\\u0442\\u044c \\u043e\\u0442\\u043a\\u043b\\u044e\\u0447\\u0430\\u0442\\u044c \\u044d\\u0442\\u0443 \\u043e\\u043f\\u0446\\u0438\\u044e, \\u0430 \\u0442\\u0430\\u043a\\u0436\\u0435 \\u043c\\u0435\\u043d\\u044f\\u0442\\u044c \\u0441\\u0443\\u043c\\u043c\\u0443 \\u0432\\u043e\\u0437\\u043d\\u0430\\u0433\\u0440\\u0430\\u0436\\u0434\\u0435\\u043d\\u0438\\u044f)<\\/li>\\r\\n    <li>\\u041e\\u043a\\u043d\\u043e \\u0434\\u043b\\u044f \\u043e\\u0431\\u044f\\u0437\\u0430\\u0442\\u0435\\u043b\\u044c\\u043d\\u043e\\u0439 \\u0440\\u0435\\u0433\\u0438\\u0441\\u0442\\u0440\\u0430\\u0446\\u0438\\u0438 \\u043d\\u0430 \\u0441\\u0430\\u0439\\u0442\\u0435.<\\/li>\\r\\n    <li>Wish list. \\u041c\\u043e\\u0434\\u0443\\u043b\\u044c, \\u043a\\u043e\\u0442\\u043e\\u0440\\u044b\\u0439 \\u043f\\u043e\\u0437\\u0432\\u043e\\u043b\\u044f\\u0435\\u0442 \\u043f\\u043e\\u043b\\u044c\\u0437\\u043e\\u0432\\u0430\\u0442\\u0435\\u043b\\u044f\\u043c \\u0443\\u043a\\u0430\\u0437\\u0430\\u0442\\u044c \\u043a\\u0430\\u0442\\u0435\\u0433\\u043e\\u0440\\u0438\\u0438 \\u0430\\u043a\\u0446\\u0438\\u0439, \\u043a\\u043e\\u0442\\u043e\\u0440\\u044b\\u0435 \\u043e\\u043d\\u0438 \\u0431\\u044b \\u0445\\u043e\\u0442\\u0435\\u043b\\u0438 \\u0432\\u0438\\u0434\\u0435\\u0442\\u044c \\u043d\\u0430 \\u0441\\u0430\\u0439\\u0442\\u0435.<\\/li>\\r\\n    <li>\\u041a\\u0430\\u0431\\u0438\\u043d\\u0435\\u0442 \\u0431\\u0438\\u0437\\u043d\\u0435\\u0441 \\u043f\\u0430\\u0440\\u0442\\u043d\\u0435\\u0440\\u0430 \\u0434\\u043b\\u044f \\u0443\\u0447\\u0435\\u0442\\u0430 \\u043f\\u043e\\u0433\\u0430\\u0448\\u0435\\u043d\\u043d\\u044b\\u0445 \\u043a\\u0443\\u043f\\u043e\\u043d\\u043e\\u0432<\\/li>\\r\\n    <li>\\u041a\\u0430\\u0431\\u0438\\u043d\\u0435\\u0442 \\u043a\\u0430\\u0441\\u0441\\u0438\\u0440\\u0430<\\/li>\\r\\n    <li>\\u041a\\u0430\\u0442\\u0435\\u0433\\u043e\\u0440\\u0438\\u0438 \\u0430\\u043a\\u0446\\u0438\\u0439<\\/li>\\r\\n    <li>\\u0412\\u044b\\u0433\\u0440\\u0443\\u0437\\u043a\\u0430 \\u0434\\u0430\\u043d\\u043d\\u044b\\u0445 \\u0432 KuponGid.ru<\\/li>\\r\\n    <li>\\u0411\\u0435\\u0441\\u043f\\u043b\\u0430\\u0442\\u043d\\u0430\\u044f \\u043d\\u0430\\u0441\\u0442\\u0440\\u043e\\u0439\\u043a\\u0430 \\u043f\\u043e\\u0447\\u0442\\u043e\\u0432\\u043e\\u0439 \\u0440\\u0430\\u0441\\u0441\\u044b\\u043b\\u043a\\u0438<\\/li>\\r\\n    <li>\\u0422\\u0438\\u043f\\u043e\\u0432\\u043e\\u0439 \\u0434\\u043e\\u0433\\u043e\\u0432\\u043e\\u0440 \\u0434\\u043b\\u044f \\u0440\\u0430\\u0431\\u043e\\u0442\\u044b \\u0441 \\u043f\\u043e\\u0441\\u0442\\u0430\\u0432\\u0449\\u0438\\u043a\\u0430\\u043c\\u0438 \\u0443\\u0441\\u043b\\u0443\\u0433<\\/li>\\r\\n    <li>\\u0428\\u0430\\u0431\\u043b\\u043e\\u043d \\u0434\\u0438\\u0437\\u0430\\u0439\\u043d\\u0430 \\u043a\\u043e\\u043c\\u043c\\u0435\\u0440\\u0447\\u0435\\u0441\\u043a\\u043e\\u0433\\u043e \\u043f\\u0440\\u0435\\u0434\\u043b\\u043e\\u0436\\u0435\\u043d\\u0438\\u044f \\u0434\\u043b\\u044f \\u0440\\u0430\\u0431\\u043e\\u0442\\u044b \\u0441 \\u043f\\u0430\\u0440\\u0442\\u043d\\u0435\\u0440\\u0430\\u043c\\u0438<\\/li>\\r\\n    <li>\\u0420\\u0435\\u043a\\u043e\\u043c\\u0435\\u043d\\u0434\\u0430\\u0446\\u0438\\u0438 \\u0438 \\u0441\\u043e\\u0432\\u0435\\u0442\\u044b \\u043f\\u043e \\u0440\\u0430\\u0441\\u043a\\u0440\\u0443\\u0442\\u043a\\u0435 \\u0441\\u0435\\u0440\\u0432\\u0438\\u0441\\u0430 \\u043a\\u043e\\u043b\\u043b\\u0435\\u043a\\u0442\\u0438\\u0432\\u043d\\u044b\\u0445 \\u043f\\u043e\\u043a\\u0443\\u043f\\u043e\\u043a<\\/li>\\r\\n    <li>\\u041e\\u0442\\u043a\\u0430\\u0437\\u043e\\u0443\\u0441\\u0442\\u043e\\u0439\\u0447\\u0438\\u0432\\u043e\\u0441\\u0442\\u044c: \\u043f\\u043e\\u0434\\u0434\\u0435\\u0440\\u0436\\u043a\\u0430 \\u0440\\u0430\\u0431\\u043e\\u0442\\u044b \\u0441 2+ \\u0441\\u0435\\u0440\\u0432\\u0435\\u0440\\u0430\\u043c\\u0438 \\u0431\\u0430\\u0437 \\u0434\\u0430\\u043d\\u043d\\u044b\\u0445\\t\\t\\t\\t iPhone-\\u043f\\u0440\\u0438\\u043b\\u043e\\u0436\\u0435\\u043d\\u0438\\u0435 \\u0432 \\u043a\\u043e\\u043c\\u043f\\u043b\\u0435\\u043a\\u0442\\u0435<\\/li>\\r\\n    <li>\\u041f\\u043e\\u0434\\u0434\\u0435\\u0440\\u0436\\u043a\\u0430 \\u0440\\u0430\\u0441\\u0441\\u044b\\u043b\\u043a\\u0438 \\u043f\\u043e \\u0431\\u043e\\u043b\\u0435\\u0435 \\u0447\\u0435\\u043c 100.000 \\u0430\\u0434\\u0440\\u0435\\u0441\\u043e\\u0432<\\/li>\\r\\n<\\/ul>","video":"<iframe width=\\"560\\" height=\\"315\\" frameborder=\\"0\\" src=\\"http:\\/\\/www.youtube.com\\/embed\\/zm3LwTzbAnk\\" allowfullscreen=\\"\\"><\\/iframe>","link":"grouponza-pro-v20","image":"2723d092b63885e0d7c260cc007e8b9d","price":"780","old_price":"880","discount":"12","meta_title":"Grouponza Pro v.2.0","meta_description":"Grouponza Pro v.2.0","meta_keywords":"Grouponza Pro v.2.0","meta_link_title":"","post_date":"2013-10-23 02:38:06","position":"3","active":"1","action":"0","recommend":"0","section_id":"10","category_id":"0","brand_id":"0","popular":"0","main":"1","hash":"c81e728d9d4c2f636f067f89cc14862c","user_id":"0","lang_id":"1","image_title":"Grouponza Pro v.2.0","images":[{"id":"109","title":"Grouponza Pro v.2.0","image":"2723d092b63885e0d7c260cc007e8b9d","main":"1","product_id":"2"},{"id":"115","title":"","image":"2b44928ae11fb9384c4cf38708677c48","main":"0","product_id":"2"},{"id":"116","title":"","image":"c45147dee729311ef5b5c3003946c48f","main":"0","product_id":"2"},{"id":"117","title":"","image":"eb160de1de89d9058fcb0b968dbbbd68","main":"0","product_id":"2"}],"count":"1","total_price":780},{"id":"9","title":"Grouponza Premium","description":"Grouponza - \\u043f\\u043b\\u0430\\u0442\\u0444\\u043e\\u0440\\u043c\\u0430 \\u21161 \\u0434\\u043b\\u044f \\u043a\\u0443\\u043f\\u043e\\u043d\\u043d\\u044b\\u0445 \\u0441\\u0430\\u0439\\u0442\\u043e\\u0432 \\u0432 \\u0421\\u041d\\u0413","addinfo":"","addinfo2":"&nbsp;","video":"&nbsp;","link":"grouponza-premium","image":"698d51a19d8a121ce581499d7b701668","price":"1980","old_price":"3950","discount":"50","meta_title":"Grouponza Premium","meta_description":"Grouponza Premium","meta_keywords":"Grouponza Premium","meta_link_title":"","post_date":"2013-11-01 21:40:38","position":"5","active":"1","action":"0","recommend":"0","section_id":"10","category_id":"0","brand_id":"0","popular":"0","main":"1","hash":"45c48cce2e2d7fbdea1afc51c7c6ad26","user_id":"0","lang_id":"1","image_title":"Grouponza Premium","images":[{"id":"111","title":"Grouponza Premium","image":"698d51a19d8a121ce581499d7b701668","main":"1","product_id":"9"}],"count":"1","total_price":1980}]', 40, NULL, 1),
(4, 1, '45000', '45000', 0, NULL, '45000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-01-29 14:45:52', 2, NULL, '[{"id":"49","title":"\\u041f\\u043b\\u0430\\u0437\\u043c\\u0430 2016 \\u0433\\u043e\\u0434\\u0430999","description":"<p>999999<\\/p>","addinfo":"9999","addinfo2":"<p>wsdefrsdfsdfsdfsd999<\\/p>\\r\\n","video":"<p>234234234999<\\/p>\\r\\n","link":"plazma-2016-goda999","image":"4c56ff4ce4aaf9573aa5dff913df997a","price":"45000","old_price":"60000","discount":"25","meta_title":"meta1","meta_description":"meta3","meta_keywords":"meta2","meta_link_title":null,"post_date":"2014-01-24 13:28:27","position":"2","active":"1","action":"0","recommend":"0","section_id":"1","category_id":"0","brand_id":"0","popular":"0","main":"1","hash":"f457c545a9ded88f18ecee47145a72c0","user_id":"30","lang_id":"1","image_title":"\\u041f\\u043b\\u0430\\u0437\\u043c\\u0430 2016 \\u0433\\u043e\\u0434\\u0430","images":[{"id":"121","title":"\\u041f\\u043b\\u0430\\u0437\\u043c\\u0430 2016 \\u0433\\u043e\\u0434\\u0430","image":"4c56ff4ce4aaf9573aa5dff913df997a","main":"1","product_id":"49"}],"count":"1","total_price":45000}]', 0, NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `link` varchar(255) DEFAULT '',
  `description_short` text,
  `text` longtext,
  `image` varchar(255) NOT NULL DEFAULT '',
  `modification_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `position` int(11) DEFAULT '0',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` text,
  `meta_link_title` varchar(255) DEFAULT NULL,
  `key` varchar(100) NOT NULL DEFAULT '',
  `lang_id` int(11) NOT NULL DEFAULT '1',
  `type` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`page_id`),
  FULLTEXT KEY `title` (`title`,`text`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`page_id`, `title`, `link`, `description_short`, `text`, `image`, `modification_date`, `position`, `meta_title`, `meta_description`, `meta_keywords`, `meta_link_title`, `key`, `lang_id`, `type`) VALUES
(1, 'О компании', 'about-company.html', '', '', '', '2014-02-03 00:00:00', 0, 'SoftScript.ru :: О компании', 'SoftScript.ru :: О компании', 'SoftScript.ru :: О компании', NULL, '', 1, 1),
(51, 'wer', 'wer.html', '', '', '', '2014-02-04 00:00:00', 0, '', '', '', NULL, '', 1, 0),
(44, 'цукцу', 'cukcu.html', '', '', '', '2014-02-04 00:00:00', 0, '', '', '', NULL, '', 1, 0),
(45, 'sdfsdfs', 'sdfsdfs.html', '', '', '', '2014-02-04 00:00:00', 0, '', '', '', NULL, '', 1, 0),
(46, '34534534', '34534534.html', '', '', '', '2014-02-04 00:00:00', 0, '', '', '', NULL, '', 1, 0),
(47, 'wer34', 'wer34.html', '', '', '', '2014-02-04 00:00:00', 0, '', '', '', NULL, '', 1, 0),
(48, 'werwerwer', 'werwerwer.html', '', '', '', '2014-02-04 00:00:00', 0, '', '', '', NULL, '', 1, 0),
(49, '345345', '345345.html', '', '', '', '2014-02-04 00:00:00', 0, '', '', '', NULL, '', 1, 0),
(50, 'werwerwe', 'werwerwe.html', '', '', '', '2014-02-04 00:00:00', 0, '', '', '', NULL, '', 1, 0),
(7, 'Как сделать заказ', 'how-do-order.html', '&nbsp;', '&nbsp;', '', '2013-07-07 00:00:00', 0, 'Заказ мебели БРВ через сайт', 'Заказ БРВ-мебели через интернет', 'Заказ мебели, БРВ-мебель, Заказать мебель БРВ в Санкт-Петербурге', '', '', 1, 1),
(3, 'Текст в футере', 'footer.html', '<a href="mailto:4383716@gmail.com">E-mail: 4383716@gmail.com</a>\r\n<p>+7(812) 964-77-04</p>', '<a href="mailto:4383716@gmail.com">E-mail: 4383716@gmail.com</a>\r\n<p>+7(812) 964-77-04</p>', '', '2013-11-03 00:00:00', 0, '', '', '', '', '', 1, 1),
(6, 'Контакты', 'contacts.html', '&nbsp;', '<p><strong class="opensans dark-clr">SOFT SCRIPT</strong>&nbsp;<br />\r\nул. Платонова, 43<br />\r\nг.Минск<br />\r\nБеларусь</p>\r\n<p><strong class="opensans dark-clr">Телефон:</strong> +375 (29) 333-1223    <br />\r\n<strong class="opensans dark-clr">Факс:</strong> +375 (17) 395-5007    <br />\r\n<strong class="opensans dark-clr">Email:</strong> <a href="mailto:info@softscript.ru">info@softscript.ru</a></p>', '', '2014-01-14 00:00:00', 0, 'Softscript.ru :: Контакты', 'Softscript.ru :: Контакты', 'Softscript.ru :: Контакты', 'Softscript.ru :: Контакты', '', 1, 1),
(24, 'Оптовикам', 'wholesalers.html', '<br />', '<table width="960" border="0" id="container" cellspacing="0" cellpadding="0" style="outline: none; color: rgb(0, 0, 0); font-family: Verdana, Arial, sans-serif; font-size: 12px;">\r\n    <tbody style="outline: none;">\r\n        <tr style="outline: none;">\r\n            <td width="640" align="left" valign="top" class="main-cell" style="outline: none; padding-right: 20px; padding-bottom: 40px;">\r\n            <h1 style="outline: none; font-size: 18px; font-weight: normal; margin-bottom: 5px; text-align: justify;">Приглашаем к сотрудничеству</h1>\r\n            <div class="nc_list nc_text" style="outline: none;">\r\n            <div class="nc_row" style="outline: none;">\r\n            <p style="outline: none; text-align: justify;"><strong style="outline: none;">Уважаемые господа!</strong></p>\r\n            <p style="outline: none; text-align: justify;"><strong style="outline: none;">ТД &quot;МирЗагородом&quot;</strong>&nbsp;приглашает Вас стать участником дилерской программы по реализации продукции нашего интернет<br />\r\n            магазина в своем регионе.&nbsp;Преимущества работы с нами:</p>\r\n            <ul style="outline: none;">\r\n                <li style="outline: none; text-align: justify;">Мы придерживаемся гибкой ценовой политики - анализируем цены на аналогичную продукцию,</li>\r\n                <li style="outline: none; text-align: justify;">Оперативно реагируем&nbsp;на динамику рынка и корректируем цены, ориентируясь на текущую рыночную ситуацию.</li>\r\n                <li style="outline: none; text-align: justify;">Вся продукция, перед тем как попаст к нам в магазин проходит технологический контроль качества.</li>\r\n                <li style="outline: none; text-align: justify;">Мы не допускаем производственных компромиссов.</li>\r\n            </ul>\r\n            <p style="outline: none; text-align: justify;">Что получаете Вы</p>\r\n            <p style="outline: none; text-align: justify;">Особенности выбора продукции и наши принципы - безопасность и экологичность, гарантируют отличное качество готовой<br />\r\n            продукции. Мы предлагаем решения и продукцию, которые являются востребованными и актуальными.</p>\r\n            <ul style="outline: none;">\r\n                <li style="outline: none; text-align: justify;">Качественный продукт, востребованный на рынке.</li>\r\n                <li style="outline: none; text-align: justify;">Расширенный ассортимент.</li>\r\n                <li style="outline: none; text-align: justify;">Эксклюзивные условия поставки и оплаты товара.</li>\r\n                <li style="outline: none; text-align: justify;">Консультации по всем аспектам текущей работы.</li>\r\n                <li style="outline: none; text-align: justify;">Рекламные материалы.</li>\r\n                <li style="outline: none; text-align: justify;">Рекомендации по товарному наполнению.</li>\r\n            </ul>\r\n            <p style="outline: none; text-align: justify;"><strong style="outline: none;">Приглашаем Вас к долговременному и взаимовыгодному сотрудничеству!</strong></p>\r\n            </div>\r\n            </div>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>', '', '2013-11-04 00:00:00', 0, 'Оптовикам', 'Оптовикам', 'Оптовикам', 'Оптовикам', '', 1, 1),
(12, 'Документы', 'documentation.html', '&nbsp;', 'Наша компания расположена в Санкт-Петербурге. Мы занимаемся производством и реализацией полимерных изделий изготовленных методом ротационного формования. Основная продукция нашей компании это изделия из полимерных материалов для ливневой, хозяйственно бытовой, дренажной канализации и средства для обеспечения навигационной обстановки. Помимо выпуска серийных изделий таких как: станции глубокой биологической очистки, септики, емкости для воды и топлива, баки для воды, модульные полиэтиленовые колодцы для различных систем канализации, буи речные и морские, чугунные люки и многое другое, мы занимаемся изготовлением изделий по чертежам и эскизам на заказ.', '', '2013-12-17 00:00:00', 0, 'Документы', 'Документы', 'Документы', 'Документы', '', 1, -1),
(13, 'Телефон в шапке', 'top-phone.html', '&nbsp;', '<p class="tel"><b><span>+7(812)</span> 964-77-04</b></p>\r\n<p class="tel"><b><span>+7(921)</span> 449-87-37</b></p>', '', '2013-11-14 00:00:00', 0, '', '', '', '', '', 1, 1),
(15, 'Ваши пожелания', 'reviews', NULL, '<span>Мы будем очень признательны за Ваше мнение о нашей работе. В этом разделе вы можете оставить любую информацию: все пожелания, рекламации и предложения не останутся без внимания!</span>', '', '2012-06-27 00:00:00', 0, 'Ваши пожелания', 'Ваши пожелания', '', '', '', 1, 1),
(17, 'Форма on-line заявки', 'order-online', NULL, 'Для оформления предварительной заявки на крепежные изделия, необходимо заполнить БЛАНК на этой странице.<br />\r\n<br />\r\nНаши специалисты свяжутся с Вами в ближайшее время.', '', '2012-03-28 00:00:00', 0, NULL, NULL, NULL, NULL, '', 1, -1),
(18, 'Ваши пожелания', 'reviews-complete', NULL, '<p style="font-family: Arial; text-align: -webkit-left; "><b>Отзыв отправлен.</b></p>\r\n<p style="font-family: Arial; text-align: -webkit-left; ">все пожелания, рекламации и предложения не останутся без внимания!</p>', '', '2012-03-28 00:00:00', 0, NULL, NULL, NULL, NULL, '', 1, -1),
(19, 'Форма on-line заявки', 'order-online-complete', NULL, '<p style="font-family: Arial; text-align: -webkit-left; "><b>Заявка отправлена.</b></p>\r\n<p style="font-family: Arial; text-align: -webkit-left; ">Наши специалисты свяжутся с Вами в ближайшее время.</p>', '', '2012-03-28 00:00:00', 0, NULL, NULL, NULL, NULL, '', 1, -1),
(21, 'Наши партнеры', 'partners.html', NULL, '<br />', '', '2012-12-11 00:00:00', 0, 'Наши партнеры', 'Наши партнеры', 'Наши партнеры', '', '', 1, 1),
(22, 'Успешная оплата', 'payment_success', NULL, '<br />', '', '2013-04-23 00:00:00', 0, '', '', '', '', '', 1, 1),
(23, 'Ваш заказ принят', 'payment-email', NULL, 'Добрый день!<br />\r\nДля того чтобы оплатить заказ №###order_number### вам необходимо перейти по ссылке ###payment_link###', '', '2012-07-11 00:00:00', 0, '', '', '', '', '', 1, 1),
(27, 'Новинки на главной', 'main-novelty', '<b><span style="color: rgb(255, 0, 0);">Новинки</span><span style="color: rgb(255, 0, 0);">! от БРВ<br />\r\n</span></b>В нашем магазине постоянно обновляется ассортимент.&nbsp;Фабрики постоянно выпускают новые коллекции&nbsp;или дополняют старые коллекции новыми модулями.<br />\r\n<br />', '&nbsp;', '', '2013-07-08 00:00:00', 0, 'Новинки от БРВ Мебель', 'Новинки от БРВ ', 'Новинки в Санкт-Петербурге', 'Новая мебель', '', 1, 1),
(29, 'Горячие предложения на главной', 'main-hot-deals', '<b><span style="color: rgb(255, 0, 0);">Горячие предложения! от БРВ<br />\r\n</span></b>Распродажа снятои мебели с производства.<br />\r\nРаспродажа больших складских остатков.<br />\r\nРаспродажа выставочных образцов.', '&nbsp;', '', '2013-07-08 00:00:00', 0, 'Распродажа мебели БРВ', 'Распродаж мебели снятой с производства', 'мебель снятая с производства, складские остатки', 'Распродажа мебели', '', 1, 1),
(28, 'Акции на главной', 'main-actions', '<b><span style="color: rgb(255, 0, 0);">Акции! от БРВ</span></b><br />\r\nБесплатная доставка<br />\r\nпо Санкт-Петербургу до подъезда <br />\r\nпри покупке на сумму от 30000 р.', 'Компания БРВ-Мебель оргонизовала акцию - бесплатная доставка. Каждый покупатель может воспользоватся данной акцией купив мебель в нашем интернет магазине на сумму больше 15000 р. и массой не больше 500 кг. Акция заключается в бесплатной доставке до подъезда в предела Санк-Петербурга', '', '2013-11-01 00:00:00', 0, 'Акция Бесплатная доставка', 'Бесплатная доставка до подъезда при покупке мебели на сумму от 15000 р.', 'Бесплатная доставка, доставка мебели, мебель БРВ', 'Бесплатная доставка Акция от БРВ Мебель', '', 1, 1),
(30, 'Акции', 'actions.html', NULL, NULL, '', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, '', 1, 1),
(32, 'Сообщеник отправлено', 'message-sent.html', 'Cообщение отправлено', 'В ближайшее время с Вами свяжутся.', '', '2014-01-15 00:00:00', 0, 'Сообщеник отправлено', 'Сообщеник отправлено', 'Сообщеник отправлено', '', '', 1, 1),
(33, 'Оплата прошла успешно!', 'payment-success.html', '&nbsp;', 'На почту вам было отправлено письмо со ссылкой на скачивание архива с электронным товаром. Так же вы може войти в свой личный кабинет и скачать оплаченный товар.<br />\r\n<br />\r\nЕсли по каким либо причинам вы не можете скачать оплаченый вами товар, обратитесь в службу поддержки перейдя по ссылке&nbsp;<a href="http://softscript.ru/feedback.htm">http://softscript.ru/feedback.html</a>&nbsp;или напишите нам на наш email: info@softscript.ru<br type="_moz" />\r\n<br />', '', '2014-01-20 00:00:00', 0, 'Оплата прошла успешно!', 'Оплата прошла успешно!', 'Оплата прошла успешно!', '', '', 1, 1),
(34, 'Произошла ошибка при оплате!', 'payment-fail.html', '&nbsp;', 'Если по каким либо причинам вы не можете оплатить товар, обратитесь в службу поддержки перейдя по ссылке&nbsp;<a href="http://softscript.ru/feedback.htm">http://softscript.ru/feedback.html</a>&nbsp;или напишите нам на наш email: info@softscript.ru<br type="_moz" />\r\n<br />', '', '2014-01-20 00:00:00', 0, 'Произошла ошибка при оплате!', 'Произошла ошибка при оплате!', 'Произошла ошибка при оплате!', '', '', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description_short` text,
  `description` text NOT NULL,
  `addinfo2` text,
  `video` text,
  `link` varchar(100) DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `price` double DEFAULT NULL,
  `old_price` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` text,
  `meta_link_title` varchar(255) DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `position` int(11) NOT NULL DEFAULT '0',
  `active` int(1) DEFAULT '1',
  `action` int(1) NOT NULL DEFAULT '0',
  `recommend` int(1) DEFAULT '0',
  `section_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT '0',
  `brand_id` int(11) DEFAULT '0',
  `popular` int(11) DEFAULT '0',
  `main` int(11) DEFAULT '0',
  `hash` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT '0',
  `lang_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  FULLTEXT KEY `title` (`title`,`description`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `description_short`, `description`, `addinfo2`, `video`, `link`, `image`, `price`, `old_price`, `discount`, `meta_title`, `meta_description`, `meta_keywords`, `meta_link_title`, `post_date`, `position`, `active`, `action`, `recommend`, `section_id`, `category_id`, `brand_id`, `popular`, `main`, `hash`, `user_id`, `lang_id`) VALUES
(1, 'Календарь событий', '<p>Events Calendar allows you to easily add to your website a powerful interactive calendar to present your events.</p>\r\n', '<p>Events Calendar allows you to easily add to your website a powerful interactive calendar to present your events.</p>\r\n', '', '', 'kalendar-sobytiy', '', 40, 45, 12, 'Календарь событий', 'Календарь событий', 'Календарь событий', NULL, '2013-10-20 21:20:55', 2, 1, 0, 0, 1, 9, 0, 0, 1, 'c4ca4238a0b923820dcc509a6f75849b', 0, 1),
(2, 'Grouponza Pro v.2.0', NULL, 'Grouponza - платформа №1 для купонных сайтов в СНГ', '<div>&nbsp;</div>\r\n<ul>\r\n    <li>Готовый шаблон дизайна из 3-х вариантов на выбор</li>\r\n    <li>Возможность изменять готовый шаблон дизайна в системе управления</li>\r\n    <li>Работа в неограниченном числе городов</li>\r\n    <li>Купить купон другу (купон в подарок)</li>\r\n    <li>нтеграция c Robokassa</li>\r\n    <li>Наличие интеграции c Masterbank.ru</li>\r\n    <li>Возможность получать код купона по sms</li>\r\n    <li>Карты Yandex / Google</li>\r\n    <li>Возможность указывать валюту, в которой работает сайт				 Форма обратной связи</li>\r\n    <li>Маркетинговый накрутчик счетчика покупок (число купленных купонов, сколько людей купило)</li>\r\n    <li>Поддержка входа на сайт через социальные сети: Facebook, Vkontakte</li>\r\n    <li>Пригласи друга и получи 100 рублей на счет (возможность отключать эту опцию, а также менять сумму вознаграждения)</li>\r\n    <li>Окно для обязательной регистрации на сайте.</li>\r\n    <li>Wish list. Модуль, который позволяет пользователям указать категории акций, которые они бы хотели видеть на сайте.</li>\r\n    <li>Кабинет бизнес партнера для учета погашенных купонов</li>\r\n    <li>Кабинет кассира</li>\r\n    <li>Категории акций</li>\r\n    <li>Выгрузка данных в KuponGid.ru</li>\r\n    <li>Бесплатная настройка почтовой рассылки</li>\r\n    <li>Типовой договор для работы с поставщиками услуг</li>\r\n    <li>Шаблон дизайна коммерческого предложения для работы с партнерами</li>\r\n    <li>Рекомендации и советы по раскрутке сервиса коллективных покупок</li>\r\n    <li>Отказоустойчивость: поддержка работы с 2+ серверами баз данных				 iPhone-приложение в комплекте</li>\r\n    <li>Поддержка рассылки по более чем 100.000 адресов</li>\r\n</ul>', '<iframe width="560" height="315" frameborder="0" src="http://www.youtube.com/embed/zm3LwTzbAnk" allowfullscreen=""></iframe>', 'grouponza-pro-v20', '', 780, 880, 12, 'Grouponza Pro v.2.0', 'Grouponza Pro v.2.0', 'Grouponza Pro v.2.0', '', '2013-10-22 23:38:06', 3, 1, 0, 0, 10, 0, 0, 0, 1, 'c81e728d9d4c2f636f067f89cc14862c', 0, 1),
(7, 'Расширенный модуль обратного отсчета', '', 'A simple, but complete and responsive, countdown system with progress bar based on admin input or elapsed time. Also you can contact your subscribed users and, if your server supports the function, automaticly contact them when the site is ready.', '', '', 'rasshirennyy-modul-obratnogo-otscheta', '', 30, 40, 25, 'Расширенный модуль обратного отсчета', 'Расширенный модуль обратного отсчета', 'Расширенный модуль обратного отсчета', '', '2013-11-01 17:50:54', 1, 1, 0, 0, 1, 10, 0, 0, 1, '8f14e45fceea167a5a36dedd4bea2543', 0, 1),
(8, 'Grouponza Otima v.2.0', NULL, 'Grouponza - платформа №1 для купонных сайтов в СНГ', '', '', 'grouponza-otima-v20', '', 480, 780, 39, 'Grouponza Otima v.2.0', 'Grouponza Otima v.2.0', 'Grouponza Otima v.2.0', '', '2013-11-01 18:30:36', 4, 1, 0, 0, 10, 0, 0, 0, 1, 'c9f0f895fb98ab9159f51fd0297e236d', 0, 1),
(9, 'Grouponza Premium', NULL, 'Grouponza - платформа №1 для купонных сайтов в СНГ', '', '', 'grouponza-premium', '', 1980, 3950, 50, 'Grouponza Premium', 'Grouponza Premium', 'Grouponza Premium', '', '2013-11-01 18:40:38', 5, 1, 0, 0, 10, 0, 0, 0, 1, '45c48cce2e2d7fbdea1afc51c7c6ad26', 0, 1),
(10, 'Scandy Optima', NULL, '<p style="margin: 0px 0px 15px; padding: 0px; border: 0px; font-size: 13px; color: rgb(81, 94, 108); font-family: ''PT Sans'', Arial; line-height: 21px;">Scandy - это платформа для создания аукционов. Система изначально разрабатывалась только для скандинавских аукционов. По мере развития продукта добавлялись новые типы аукционов.</p>', '<p style="margin: 0px 0px 15px; padding: 0px; border: 0px; font-size: 13px; color: rgb(81, 94, 108); font-family: ''PT Sans'', Arial; line-height: 21px;">Scandy - это платформа для создания аукционов. Система изначально разрабатывалась только для скандинавских аукционов. По мере развития продукта добавлялись новые типы аукционов. На данный момент в системе 8 типов аукционов:</p>\r\n<ul style="margin: 0px 0px 15px; padding: 0px; border: 0px; font-size: 13px; list-style: none; color: rgb(81, 94, 108); font-family: ''PT Sans'', Arial; line-height: 21px;">\r\n    <ol style="margin: 0px; padding: 0px; border: 0px; font-weight: inherit; font-style: inherit; list-style: none;">\r\n        <li style="margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http://new.antalika.com/templates/themes/default/css/themes/blue/images/lists/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;">1) Классический аукцион на повышение</li>\r\n        <li style="margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http://new.antalika.com/templates/themes/default/css/themes/blue/images/lists/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;">2) Скандинавский аукцион</li>\r\n        <li style="margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http://new.antalika.com/templates/themes/default/css/themes/blue/images/lists/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;">3) Обратный аукцион с закрытой ценой</li>\r\n        <li style="margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http://new.antalika.com/templates/themes/default/css/themes/blue/images/lists/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;">4) Голландский (как скандинавский, только на понижение)</li>\r\n        <li style="margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http://new.antalika.com/templates/themes/default/css/themes/blue/images/lists/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;">5) Закрытый аукцион</li>\r\n        <li style="margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http://new.antalika.com/templates/themes/default/css/themes/blue/images/lists/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;">6) Аукцион &quot;Грош-цена&quot;</li>\r\n        <li style="margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http://new.antalika.com/templates/themes/default/css/themes/blue/images/lists/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;">7) Аукцион минимальной уникальной ставки</li>\r\n        <li style="margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http://new.antalika.com/templates/themes/default/css/themes/blue/images/lists/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;">8) Аукцион для нумизматов</li>\r\n    </ol>\r\n</ul>\r\n<span style="color: rgb(81, 94, 108); font-family: ''PT Sans'', Arial; font-size: 13px; line-height: 21px;">Каждый тип аукциона - это своя бизнес модель. Описание каждой бизнес-модели вы сможете увидеть ниже</span>&nbsp;', '', 'scandy-optima', '', 980, 1300, 25, 'Scandy Optima', 'Scandy Optima', 'Scandy Optima', '', '2013-11-01 18:46:18', 6, 1, 0, 0, 8, 0, 0, 0, 1, 'd3d9446802a44259755d38e6d163e820', 0, 1),
(11, 'Scandy Pro', NULL, '<p style="margin: 0px 0px 15px; padding: 0px; border: 0px; font-size: 13px; color: rgb(81, 94, 108); font-family: ''PT Sans'', Arial; line-height: 21px;">Scandy - это платформа для создания аукционов. Система изначально разрабатывалась только для скандинавских аукционов. По мере развития продукта добавлялись новые типы аукционов. На данный момент в системе 8 типов аукционов.</p>', '<p style="margin: 0px 0px 15px; padding: 0px; border: 0px; font-size: 13px; color: rgb(81, 94, 108); font-family: ''PT Sans'', Arial; line-height: 21px;">Scandy - это платформа для создания аукционов. Система изначально разрабатывалась только для скандинавских аукционов. По мере развития продукта добавлялись новые типы аукционов. На данный момент в системе 8 типов аукционов:</p>\r\n<ul style="margin: 0px 0px 15px; padding: 0px; border: 0px; font-size: 13px; list-style: none; color: rgb(81, 94, 108); font-family: ''PT Sans'', Arial; line-height: 21px;">\r\n    <ol style="margin: 0px; padding: 0px; border: 0px; font-weight: inherit; font-style: inherit; list-style: none;">\r\n        <li style="margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http://new.antalika.com/templates/themes/default/css/themes/blue/images/lists/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;">1) Классический аукцион на повышение</li>\r\n        <li style="margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http://new.antalika.com/templates/themes/default/css/themes/blue/images/lists/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;">2) Скандинавский аукцион</li>\r\n        <li style="margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http://new.antalika.com/templates/themes/default/css/themes/blue/images/lists/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;">3) Обратный аукцион с закрытой ценой</li>\r\n        <li style="margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http://new.antalika.com/templates/themes/default/css/themes/blue/images/lists/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;">4) Голландский (как скандинавский, только на понижение)</li>\r\n        <li style="margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http://new.antalika.com/templates/themes/default/css/themes/blue/images/lists/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;">5) Закрытый аукцион</li>\r\n        <li style="margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http://new.antalika.com/templates/themes/default/css/themes/blue/images/lists/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;">6) Аукцион &quot;Грош-цена&quot;</li>\r\n        <li style="margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http://new.antalika.com/templates/themes/default/css/themes/blue/images/lists/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;">7) Аукцион минимальной уникальной ставки</li>\r\n        <li style="margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http://new.antalika.com/templates/themes/default/css/themes/blue/images/lists/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;">8) Аукцион для нумизматов</li>\r\n    </ol>\r\n</ul>\r\n<span style="color: rgb(81, 94, 108); font-family: ''PT Sans'', Arial; font-size: 13px; line-height: 21px;">Каждый тип аукциона - это своя бизнес модель. Описание каждой бизнес-модели вы сможете увидеть ниже</span>&nbsp;', '', 'scandy-pro', '', 1480, 2480, 41, 'Scandy Pro', 'Scandy Pro', 'Scandy Pro', '', '2013-11-01 18:55:08', 10, 1, 0, 0, 8, 0, 0, 0, 1, '6512bd43d9caa6e02c990b0a82652dca', 0, 1),
(12, 'Scandy Enterprise', NULL, '<p style="margin: 0px 0px 15px; padding: 0px; border: 0px; font-size: 13px; color: rgb(81, 94, 108); font-family: ''PT Sans'', Arial; line-height: 21px;">Scandy - это платформа для создания аукционов. Система изначально разрабатывалась только для скандинавских аукционов. По мере развития продукта добавлялись новые типы аукционов.</p>', '<p style="margin: 0px 0px 15px; padding: 0px; border: 0px; font-size: 13px; color: rgb(81, 94, 108); font-family: ''PT Sans'', Arial; line-height: 21px;">Scandy - это платформа для создания аукционов. Система изначально разрабатывалась только для скандинавских аукционов. По мере развития продукта добавлялись новые типы аукционов. На данный момент в системе 8 типов аукционов:</p>\r\n<ul style="margin: 0px 0px 15px; padding: 0px; border: 0px; font-size: 13px; list-style: none; color: rgb(81, 94, 108); font-family: ''PT Sans'', Arial; line-height: 21px;">\r\n    <ol style="margin: 0px; padding: 0px; border: 0px; font-weight: inherit; font-style: inherit; list-style: none;">\r\n        <li style="margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http://new.antalika.com/templates/themes/default/css/themes/blue/images/lists/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;">1) Классический аукцион на повышение</li>\r\n        <li style="margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http://new.antalika.com/templates/themes/default/css/themes/blue/images/lists/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;">2) Скандинавский аукцион</li>\r\n        <li style="margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http://new.antalika.com/templates/themes/default/css/themes/blue/images/lists/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;">3) Обратный аукцион с закрытой ценой</li>\r\n        <li style="margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http://new.antalika.com/templates/themes/default/css/themes/blue/images/lists/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;">4) Голландский (как скандинавский, только на понижение)</li>\r\n        <li style="margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http://new.antalika.com/templates/themes/default/css/themes/blue/images/lists/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;">5) Закрытый аукцион</li>\r\n        <li style="margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http://new.antalika.com/templates/themes/default/css/themes/blue/images/lists/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;">6) Аукцион &quot;Грош-цена&quot;</li>\r\n        <li style="margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http://new.antalika.com/templates/themes/default/css/themes/blue/images/lists/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;">7) Аукцион минимальной уникальной ставки</li>\r\n        <li style="margin: 0px 0px 7px; padding: 0px 0px 0px 30px; border: 0px; font-weight: inherit; font-style: inherit; background-image: url(http://new.antalika.com/templates/themes/default/css/themes/blue/images/lists/li.png); background-position: 3px 3px; background-repeat: no-repeat no-repeat;">8) Аукцион для нумизматов</li>\r\n    </ol>\r\n</ul>\r\n<span style="color: rgb(81, 94, 108); font-family: ''PT Sans'', Arial; font-size: 13px; line-height: 21px;">Каждый тип аукциона - это своя бизнес модель. Описание каждой бизнес-модели вы сможете увидеть ниже</span>&nbsp;', '', 'scandy-enterprise', '', 3480, 3990, 13, 'Scandy Enterprise', 'Scandy Enterprise', 'Scandy Enterprise', '', '2013-11-01 18:57:33', 11, 1, 0, 0, 8, 0, 0, 0, 1, 'c20ad4d76fe97759aa27a0c99bff6710', 0, 1),
(49, 'Плазма 2016 года999', NULL, '<p>999999</p>', '<p>wsdefrsdfsdfsdfsd999</p>\r\n', '<p>234234234999</p>\r\n', 'plazma-2016-goda999', '', 45000, 60000, 25, 'meta1', 'meta3', 'meta2', NULL, '2014-01-24 10:28:27', 2, 1, 0, 0, 1, 0, 0, 0, 1, 'f457c545a9ded88f18ecee47145a72c0', 30, 1),
(48, 'Телевизор LG 42LA620V', '<p>Телик - огонь! Красивый, рамка тонюсенькая. За эти деньги - лучший вариант. Переплачивать за &quot;660&quot; не вижу смысла.</p>\r\n', '<p>Телик - огонь! Красивый, рамка тонюсенькая. За эти деньги - лучший вариант. Переплачивать за &quot;660&quot; не вижу смысла. В Минске висит 55&quot; от самсунга - смотреть на него противно после LG, разочаровал. Управление со смартфона - весь экран смарта превращается в сенсорную панель, заменяет покупку пульта Magic. SmartTV радует - из коробки ivi.ru и многое другое. Вчера запустил ради интереса &quot;хранитель Времени&quot; (он же Hugo) в 3D (3d - вертикалка, 8gb .mkv) - смотрели втроем, все супер, эффект присутствия, снег, дым - все летит прямо в лицо и не напрягает глаза. Активное 3D на самсе очень уж утомляло. В общем я очень доволен! Если есть вопросы - спрашивайте.</p>\r\n', '', '', 'televizor-lg-42la620v', '', 625, 750, 17, 'Телевизор LG 42LA620V', 'Телевизор LG 42LA620V', 'Телевизор LG 42LA620V', NULL, '2014-01-24 08:57:29', 0, 1, 0, 0, 1, 0, 0, 0, 1, '642e92efb79421734881b53e1e1b18b6', 30, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `products_files`
--

DROP TABLE IF EXISTS `products_files`;
CREATE TABLE IF NOT EXISTS `products_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `filename_original` varchar(255) DEFAULT NULL,
  `ext` varchar(100) DEFAULT NULL,
  `product_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Дамп данных таблицы `products_files`
--

INSERT INTO `products_files` (`id`, `title`, `filename`, `filename_original`, `ext`, `product_id`) VALUES
(3, 'Архив с модулем обратного отсчета', '20961ef68957c19b68230bd9f12a958d.zip', 'countdown.zip', 'zip', 7),
(4, 'Архив календаря событий', 'cc5e8fa31a6bfe5afd5b90598a6f6c8d.zip', 'countdown.zip', 'zip', 1),
(5, 'Архив движка Grouponza Pro v.2.0', '9b92db60de430dcc4b58845531f966e6.zip', 'countdown.zip', 'zip', 2),
(6, 'Архив движка Grouponza Otima v.2.0', 'fa66660d945d9c36509d9b9832a066e3.zip', 'countdown.zip', 'zip', 8),
(7, 'Архив движка Grouponza Premium', 'e2f178b862803b0c46b83109b0916e58.zip', 'countdown.zip', 'zip', 9),
(8, 'Архив движка Scandy Optima', 'e48330c08308bab274536c854dace54d.zip', 'countdown.zip', 'zip', 10),
(9, 'Архив движка Scandy Pro', '49c04f35d42808769f7dca54fd500532.zip', 'countdown.zip', 'zip', 11),
(10, 'Архив движка Scandy Enterprise', '64a62e50c42d2358549c4c3a05d22ea2.zip', 'countdown.zip', 'zip', 12),
(11, 'Архив движка Scandy Pro v.2.0', 'd3e4f0cca3c2ca61710204c960af03ac.rar', '!!snowball_2.12.rar', 'rar', 11),
(16, 'фывфывфывфыв', 'de971281ba47eb14200999400749a5c4.jpg', 'Plasma_lamp_touching.jpg', 'jpg', 49),
(17, 'фывфыв', '0fb7688d8e9ea0f07ec24e57e3b962fa.jpg', 'plazma.jpg', 'jpg', 49),
(18, 'фывфыв', 'dca820004835c7c30d41b10653c0d066.jpg', '39948.jpg', 'jpg', 49),
(19, 'etert', 'e4f37945d1d3ba05997f557538643a8e.png', 'Dima2.png', 'png', 48),
(20, 'ываыва', 'fb2fee819755c7703df269810298083e.jpg', 'Robocop_03.jpg', 'jpg', 48),
(21, 'цукцук', 'f5745755c4d1fccad49a5904ef142390.jpg', 'Plasma_lamp_touching.jpg', 'jpg', 48);

-- --------------------------------------------------------

--
-- Структура таблицы `products_images`
--

DROP TABLE IF EXISTS `products_images`;
CREATE TABLE IF NOT EXISTS `products_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `main` int(1) DEFAULT '0',
  `product_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=140 ;

--
-- Дамп данных таблицы `products_images`
--

INSERT INTO `products_images` (`id`, `title`, `image`, `main`, `product_id`) VALUES
(107, 'Расширенный модуль обратного отсчета', 'a97da629b098b75c294dffdc3e463904', 1, 7),
(108, 'Календарь событий', 'a3c65c2974270fd093ee8a9bf8ae7d0b', 1, 1),
(109, 'Grouponza Pro v.2.0', '2723d092b63885e0d7c260cc007e8b9d', 0, 2),
(110, 'Grouponza Otima v.2.0', '5f93f983524def3dca464469d2cf9f3e', 1, 8),
(111, 'Grouponza Premium', '698d51a19d8a121ce581499d7b701668', 1, 9),
(112, 'Scandy Optima', '7f6ffaa6bb0b408017b62254211691b5', 1, 10),
(113, 'Scandy Pro', '73278a4a86960eeb576a8fd4c9ec6997', 1, 11),
(114, 'Scandy Enterprise', '5fd0b37cd7dbbb00f97ba6ce92bf5add', 1, 12),
(115, '', '2b44928ae11fb9384c4cf38708677c48', 1, 2),
(116, '', 'c45147dee729311ef5b5c3003946c48f', 0, 2),
(117, '', 'eb160de1de89d9058fcb0b968dbbbd68', 0, 2),
(118, 'Тестовая картинка', '5ef059938ba799aaa845e1c2e8a762bd', 1, 46),
(119, 'Тестовая картинка', '07e1cd7dca89a1678042477183b7ac3f', 1, 47),
(121, 'Плазма 2016 года', '4c56ff4ce4aaf9573aa5dff913df997a', 1, 49),
(137, 'Картинка 2', '3988c7f88ebcb58c6ce932b957b6f332', 1, 48),
(138, 'Картинка 2', '013d407166ec4fa56eb1e1f8cbe183b9', 0, 48),
(139, 'Картинка 2', 'e00da03b685a0dd18fb6a08af0923de0', 0, 48);

-- --------------------------------------------------------

--
-- Структура таблицы `products_options`
--

DROP TABLE IF EXISTS `products_options`;
CREATE TABLE IF NOT EXISTS `products_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `option_id` int(11) DEFAULT NULL,
  `property_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `products_recommended`
--

DROP TABLE IF EXISTS `products_recommended`;
CREATE TABLE IF NOT EXISTS `products_recommended` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `pr_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

--
-- Дамп данных таблицы `products_recommended`
--

INSERT INTO `products_recommended` (`id`, `product_id`, `pr_id`) VALUES
(21, 2, 8),
(22, 2, 9),
(23, 2, 10),
(24, 2, 11),
(25, 2, 12),
(53, 49, 48),
(54, 49, 9),
(55, 49, 10),
(68, 48, 11),
(69, 48, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `products_reviews`
--

DROP TABLE IF EXISTS `products_reviews`;
CREATE TABLE IF NOT EXISTS `products_reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text CHARACTER SET cp1251,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(255) CHARACTER SET cp1251 DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `products_reviews`
--

INSERT INTO `products_reviews` (`id`, `description`, `user_id`, `username`, `product_id`, `post_date`, `active`) VALUES
(3, 'Странно, что фильтры для IE < 9 не срабатывают.\r\nПринимает либо dropshadow, либо shadow. Вместе - нет. И эффекта никакого.\r\nКто пробовал? Получилось?\r\nКоммент автора был бы замечателен здесь)', 40, 'Андрей', 12, '2013-11-03 19:48:49', 1),
(13, 'цукцукцу', 30, 'Иван Иванов', 12, '2014-01-30 13:24:49', 0),
(14, 'цукцукцу', 30, 'Иван Иванов', 12, '2014-01-30 13:24:52', 0),
(9, 'Scandy - это платформа для создания аукционов. Система изначально разрабатывалась только для скандинавских аукционов. По мере развития продукта добавлялись новые типы аукционов.', 30, 'Иван Иванов', 12, '2014-01-16 10:45:45', 1),
(10, 'Scandy - это платформа для создания аукционов. Система изначально разрабатывалась только для скандинавских аукционов. По мере развития продукта добавлялись новые типы аукционов. На данный момент в системе 8 типов аукционов.', 30, 'Иван Иванов', 12, '2014-01-16 10:46:33', 1),
(11, 'Scandy - это платформа для создания аукционов. Система изначально разрабатывалась только для скандинавских аукционов. По мере развития продукта добавлялись новые типы аукционов. На данный момент в системе 8 типов аукционов.', 30, 'Иван Иванов', 12, '2014-01-16 10:46:37', 1),
(12, 'Scandy - это платформа для создания аукционов. Система изначально разрабатывалась только для скандинавских аукционов. По мере развития продукта добавлялись новые типы аукционов. На данный момент в системе 8 типов аукционов.', 30, 'Иван Иванов', 2, '2014-01-16 10:46:41', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `products_reviews_comments`
--

DROP TABLE IF EXISTS `products_reviews_comments`;
CREATE TABLE IF NOT EXISTS `products_reviews_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text,
  `review_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `active` int(1) DEFAULT '0',
  `post_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `products_reviews_comments`
--

INSERT INTO `products_reviews_comments` (`id`, `description`, `review_id`, `user_id`, `username`, `active`, `post_date`) VALUES
(1, 'Странно, что фильтры для IE < 9 не срабатывают.\r\nПринимает либо dropshadow, либо shadow. Вместе - нет. И эффекта никакого.\r\nКто пробовал? Получилось?\r\nКоммент автора был бы замечателен здесь)', 3, 40, 'Андрей', 1, '2013-11-03 19:49:06');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text,
  `user_id` int(11) DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` int(1) DEFAULT '0',
  `lang_id` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `text`, `user_id`, `post_date`, `active`, `lang_id`) VALUES
(2, 'Наша компания специализируется на производстве полимерных изделий находящих применения в различных сферах деятельности человека от промышленного до частного сектора. Вся выпускаемая нами продукция изготовлена методом Ротационного Формования который дает возможность производить относительно недорогие но в то же время надежные изделия различных форм и габаритов. Мы производим изделия из полиэтилена такие как: септики для очистки сточных вод, станции глубокой биологической очистки, аэротенки, жироуловители, канализационные колодцы, емкости для хранения сыпучих материалов и агрессивных сред, баки для воды и топлива, речные буи, понтоны для пирса и многое другое.\r\n \r\nПомимо выпуска собственной продукции мы предлагаем нашим клиентам изготовление изделий и форм по индивидуальным проектам.\r\nДинамичное развитие производства и использование инновационных решений гарантирует высокое качество всей выпускаемой нами продукции, которая в свою очередь проходит тщательный контроль, перед тем как попадет к Вам.\r\nЦель нашей компании – производство продукции высокого качества, из экологически чистых материалов для повышения уровня жизни современного человека.\r\n \r\nСегодня на ООО «РОТЕК» полным ходом идет работа по увеличению номенклатуры изделий, оборудуются дополнительные складские помещения, наращиваются производственные мощности.\r\nГрамотно построенная маркетинговая стратегия позволяет нашей торговой марке завоевывать популярность потребителей как по всему Северо-Западному региону так и по всей территории Российской Федерации. ', 30, '2013-10-27 19:02:08', 0, 1),
(3, 'Странно, что фильтры для IE < 9 не срабатывают.\r\nПринимает либо dropshadow, либо shadow. Вместе - нет. И эффекта никакого.\r\nКто пробовал? Получилось?\r\nКоммент автора был бы замечателен здесь)', 40, '2013-11-03 19:51:22', 0, 1),
(5, 'asdas', 40, '2013-11-03 19:55:21', 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `reviews_comments`
--

DROP TABLE IF EXISTS `reviews_comments`;
CREATE TABLE IF NOT EXISTS `reviews_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text,
  `review_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `sections`
--

DROP TABLE IF EXISTS `sections`;
CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description_short` text,
  `description` text NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` text,
  `meta_link_title` varchar(255) DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `position` int(11) NOT NULL DEFAULT '0',
  `type` int(11) DEFAULT '0',
  `delete` int(1) DEFAULT '1',
  `template` int(1) DEFAULT '0',
  `lang_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `sections`
--

INSERT INTO `sections` (`id`, `title`, `description_short`, `description`, `link`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `meta_link_title`, `post_date`, `position`, `type`, `delete`, `template`, `lang_id`) VALUES
(1, 'PHP скрипты', '<p>werwerwer</p>\r\n', '<p>PHP (англ. PHP: Hypertext Preprocessor &mdash; &laquo;PHP: препроцессор гипертекста&raquo;; первоначально Personal Home Page Tools[4] &mdash; &laquo;Инструменты для создания персональных веб-страниц&raquo;; произносится пи-эйч-пи) &mdash; скриптовый язык[5] программирования общего назначения, интенсивно применяемый для разработки веб-приложений. В настоящее время поддерживается подавляющим большинством хостинг-провайдеров и является одним из лидеров среди языков программирования, применяющихся для создания динамических веб-сайтов.<br />\r\n<br />\r\nОдной из сильнейших сторон PHP 3.0 была возможность расширения ядра дополнительными модулями. Впоследствии интерфейс написания расширений привлёк к PHP множество сторонних разработчиков, работающих над своими модулями, что дало PHP возможность работать с огромным количеством баз данных, протоколов, поддерживать большое число API. Большое количество разработчиков привело к быстрому развитию языка и стремительному росту его популярности. С этой версии акроним php расшифровывается как &laquo;PHP: hypertext Preprocessor&raquo;, вместо устаревшего &laquo;Personal Home Page&raquo;. К зиме 1998 года, практически сразу после официального выхода PHP 3.0, Энди Гутманс и Зеев Сураски начали переработку ядра PHP. В задачи входило увеличение производительности сложных приложений и улучшение модульности базиса кода PHP.<br />\r\n<br />\r\nНовый движок, названный Zend Engine, успешно справлялся с поставленными задачами и впервые был представлен в середине 1999 года. PHP 4.0, основанный на этом движке и принёсший с собой набор дополнительных функций, официально вышел в мае 2000 года. В дополнение к улучшению производительности, PHP 4.0 имел ещё несколько ключевых нововведений, таких как поддержка сессий, буферизация вывода, более безопасные способы обработки вводимой пользователем информации и несколько новых языковых конструкций. Пятая версия PHP была выпущена разработчиками 13 июля 2004 года. Изменения включают обновление ядра Zend (Zend Engine 2), что существенно увеличило эффективность интерпретатора. Введена поддержка языка разметки XML. Полностью переработаны функции ООП, которые стали во многом схожи с моделью, используемой в Java. В частности, введён деструктор, открытые, закрытые и защищённые члены и методы, окончательные члены и методы, интерфейсы и клонирование объектов. В последующих версиях также были введены пространства имён, замыкания и целый ряд достаточно серьёзных изменений, количественно и качественно сравнимых с теми, которые появились при переходе на PHP 5.0. Шестая версия PHP разрабатывалась[9] с октября 2006 года. Было сделано[10][11] множество нововведений, как, например, исключение из ядра регулярных выражений POSIX и &laquo;длинных&raquo; суперглобальных массивов, удаление директив safe_mode, magic_quotes_gpc и register_globals из конфигурационного файла php.ini. Одним из основных новшеств должна была стать поддержка Юникода.[12]. Однако в марте 2010 года разработка PHP6 была признана бесперспективной[13] из-за сложностей с поддержкой Юникода. Исходный код PHP6 перемещён на ветвь, а основной линией разработки стала версия 5.4.</p>\r\n', 'php-skripty', '', 'PHP скрипты', 'PHP скрипты', 'PHP скрипты', NULL, '2014-02-03 12:09:33', 1, NULL, 1, NULL, 1),
(2, 'JavaScript', NULL, '&nbsp;', 'javascript', '', 'JavaScript', 'JavaScript', 'JavaScript', '', '2014-01-15 12:30:33', 4, 1, 1, 0, 1),
(3, 'WordPress плагины', NULL, '', 'wordpress-plaginy', '', 'WordPress плагины', 'WordPress плагины', 'WordPress плагины', '', '2014-01-15 12:27:03', 2, 1, 1, 0, 1),
(4, 'eCommerce', NULL, '', 'ecommerce', '', 'eCommerce', 'eCommerce', 'eCommerce', '', '2014-01-15 12:27:48', 3, 1, 1, 0, 1),
(5, 'Мобильные приложения', NULL, '&nbsp;', 'mobilnye-prilozheniya', '', 'Мобильные приложения', 'Мобильные приложения', 'Мобильные приложения', '', '2014-01-15 12:31:42', 6, 1, 1, 0, 1),
(7, 'Facebook', NULL, '', 'facebook', '', 'Facebook', 'Facebook', 'Facebook', '', '2014-01-15 12:34:42', 10, 1, 1, 0, 1),
(10, 'Интернет-магазины', NULL, '&nbsp;', 'internet-magaziny', '', 'Интернет-магазины', 'Интернет-магазины', 'Интернет-магазины', '', '2014-01-15 12:50:19', 9, 1, 1, 0, 1),
(8, 'Аукционы', NULL, '&nbsp;', 'aukciony', '', 'Аукционы', 'Аукционы', 'Аукционы', '', '2014-01-15 13:13:45', 5, 1, 1, 0, 1),
(9, 'WordPress темы и шаблоны', NULL, '&nbsp;', 'wordpress-temy-i-shablony', '', 'WordPress темы и шаблоны', 'WordPress темы и шаблоны', 'WordPress темы и шаблоны', '', '2014-01-15 12:33:39', 8, 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `sections_options`
--

DROP TABLE IF EXISTS `sections_options`;
CREATE TABLE IF NOT EXISTS `sections_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section_id` int(11) DEFAULT NULL,
  `option_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `sections_sub`
--

DROP TABLE IF EXISTS `sections_sub`;
CREATE TABLE IF NOT EXISTS `sections_sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description_short` text,
  `description` text NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` text,
  `meta_link_title` varchar(255) DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lang_id` int(11) NOT NULL DEFAULT '1',
  `position` int(11) NOT NULL DEFAULT '0',
  `price` double NOT NULL,
  `section_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `sections_sub`
--

INSERT INTO `sections_sub` (`id`, `title`, `description_short`, `description`, `link`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `meta_link_title`, `post_date`, `lang_id`, `position`, `price`, `section_id`) VALUES
(7, 'Карты', '', '', 'karty', '', 'Карты', 'Карты', 'Карты', NULL, '2014-02-07 15:54:24', 1, 1, 0, 2),
(9, 'Календари', '<p>ertertert</p>\r\n', '<p>456456</p>\r\n', 'kalendari', '', 'Календари', 'Календари', 'Календари', NULL, '2014-02-07 15:55:03', 1, 1, 0, 1),
(10, 'Обратный отсчет', NULL, '&nbsp;', 'obratnyy-otschet', '', 'Обратный отсчет', 'Обратный отсчет', 'Обратный отсчет', '', '2014-01-15 12:29:19', 1, 2, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_id` int(11) NOT NULL DEFAULT '1',
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `lang_id`, `value`) VALUES
(1, 1, '{"module":"admin","controller":"settings","action":"update","settings_email1":"admin@mirzagorodom.ru","settings_email2":"support@mirzagorodom.ru","settings_email3":"mailrobot@mirzagorodom.ru","settings_pprice1":"20000","settings_skidka1":"2","settings_pprice2":"40000","settings_skidka2":"4","settings_pprice3":"60000","settings_skidka3":"6","settings_pprice4":"80000","settings_skidka4":"8","settings_pprice5":"100000","settings_skidka5":"10","settings_meta_title":"\\u041f\\u0440\\u043e\\u0434\\u0430\\u0436\\u0430 \\u0441\\u0435\\u043f\\u0442\\u0438\\u043a\\u043e\\u0432, \\u0431\\u0430\\u043a\\u043e\\u0432, \\u0441\\u0442\\u0430\\u043d\\u0446\\u0438\\u0438 \\u0431\\u0438\\u043e\\u043b\\u043e\\u0433\\u0438\\u0447\\u0435\\u0441\\u043a\\u043e\\u0439 \\u043e\\u0447\\u0438\\u0441\\u0442\\u043a\\u0438, \\u043b\\u044e\\u043a\\u0438, \\u0431\\u0430\\u043a\\u0438 \\u0434\\u043b\\u044f \\u0432\\u043e\\u0434\\u044b \\u0438 \\u0442\\u043e\\u043f\\u043b\\u0438\\u0432\\u0430, \\u043f\\u0435\\u0441\\u043e\\u0447\\u043d\\u0438\\u0446\\u044b, \\u0434\\u043e\\u0440\\u043e\\u0436\\u043d\\u044b\\u0435 \\u043e\\u0433\\u043e\\u0440\\u043e\\u0436\\u0434\\u0435\\u043d\\u0438\\u044f.","settings_meta_keywords":"\\u0441\\u0435\\u043f\\u0442\\u0438\\u043a\\u0438, \\u0431\\u0430\\u043a\\u0438","settings_meta_description":"\\u0418\\u043d\\u0442\\u0435\\u0440\\u043d\\u0435\\u0442-\\u043c\\u0430\\u0433\\u0430\\u0437\\u0438\\u043d \\u0441 \\u0442\\u043e\\u0432\\u0430\\u0440\\u0430\\u043c\\u0438 \\u043e\\u0442 \\u043f\\u0440\\u043e\\u0438\\u0437\\u0432\\u043e\\u0434\\u0438\\u0442\\u0435\\u043b\\u044f \\u0434\\u043b\\u044f \\u0437\\u0430\\u0433\\u043e\\u0440\\u043e\\u0434\\u043d\\u044b\\u0445 \\u0434\\u043e\\u043c\\u043e\\u0432 \\u043f\\u043e \\u0441\\u0430\\u043c\\u044b\\u043c \\u043d\\u0438\\u0437\\u043a\\u0438\\u043c \\u0446\\u0435\\u043d\\u0430\\u043c. \\u0415\\u043c\\u043a\\u043e\\u0441\\u0442\\u0438, \\u0431\\u0430\\u043a\\u0438, \\u043f\\u0435\\u0441\\u043e\\u0447\\u043d\\u0438\\u0446\\u044b. \\u0421\\u0442\\u0430\\u043d\\u0446\\u0438\\u0438 \\u0431\\u0438\\u043e\\u043b\\u043e\\u0433\\u0438\\u0447\\u0435\\u0441\\u043a\\u043e\\u0439 \\u043e\\u0447\\u0438\\u0441\\u0442\\u043a\\u0438, \\u043a\\u0440\\u043e\\u0432\\u043b\\u044f \\u0438 \\u043c\\u043d\\u043e\\u0433\\u043e\\u0435 \\u0434\\u0440\\u0443\\u0433\\u043e\\u0435.","settings_dostavka":"45","settings_payment_test_mode":"on","settings_id":"1"}');

-- --------------------------------------------------------

--
-- Структура таблицы `sites`
--

DROP TABLE IF EXISTS `sites`;
CREATE TABLE IF NOT EXISTS `sites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `domain` varchar(100) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `cel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `sites`
--

INSERT INTO `sites` (`id`, `title`, `url`, `domain`, `company_id`, `cel`) VALUES
(1, 'http://stop-varikoz.ru', 'http://stop-varikoz.ru', 'stop-varikoz.ru', 1638, 1575),
(2, 'http://antidepresnyak.ru', 'http://antidepresnyak.ru', 'antidepresnyak.ru', 1136, 1269),
(3, 'http://procellulit.ru', 'http://procellulit.ru', 'procellulit.ru', 1639, 1576),
(8, 'http://stop-akne.loc', 'http://stop-akne.loc', 'stop-akne.loc', 234, 123);

-- --------------------------------------------------------

--
-- Структура таблицы `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `payment_method` varchar(255) CHARACTER SET cp1251 DEFAULT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `transactions`
--

INSERT INTO `transactions` (`id`, `order_id`, `price`, `payment_method`, `payment_date`, `user_id`) VALUES
(1, 1, 6310, 'robokassa', '2014-01-20 13:25:50', 30),
(2, 2, 2740, 'robokassa', '2014-01-20 13:30:24', 30),
(3, 3, 3240, 'robokassa', '2014-01-21 10:25:50', 30),
(4, 4, 45000, 'robokassa', '2014-01-29 14:45:53', 30);

-- --------------------------------------------------------

--
-- Структура таблицы `translations_direction_price`
--

DROP TABLE IF EXISTS `translations_direction_price`;
CREATE TABLE IF NOT EXISTS `translations_direction_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_from_id` int(11) DEFAULT NULL,
  `lang_to_id` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `letters_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `translations_direction_price`
--

INSERT INTO `translations_direction_price` (`id`, `lang_from_id`, `lang_to_id`, `price`, `letters_count`) VALUES
(1, 1, 2, 50, 1000),
(2, 2, 1, 30, 2000),
(3, 2, 3, 60, 1000),
(4, 1, 3, 60, 3000),
(11, 1, 6, 100, 1100),
(10, 1, 5, 90, 1090),
(9, 1, 4, 70, 1070),
(12, 42, 1, 100, 100),
(13, 1, 42, 100, 100);

-- --------------------------------------------------------

--
-- Структура таблицы `translations_themes`
--

DROP TABLE IF EXISTS `translations_themes`;
CREATE TABLE IF NOT EXISTS `translations_themes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `position` int(11) DEFAULT '0',
  `lang_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `translations_themes`
--

INSERT INTO `translations_themes` (`id`, `title`, `price`, `position`, `lang_id`) VALUES
(1, 'Политика', 50, 1, 1),
(2, 'Экономика', 25, 2, 1),
(3, 'Медицина', 8, 3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL DEFAULT '',
  `last_name` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `phone` varchar(100) NOT NULL DEFAULT '',
  `member_temp_password` varchar(100) NOT NULL DEFAULT '',
  `avatar` varchar(100) NOT NULL DEFAULT '',
  `confirm_key` varchar(100) NOT NULL DEFAULT '',
  `confirmed_flag` int(11) NOT NULL DEFAULT '0',
  `creation_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `member_temp_password`, `avatar`, `confirm_key`, `confirmed_flag`, `creation_date`, `modified_date`, `active`) VALUES
(39, 'Александр', '', '4383716@gmail.com', '1932db326682a0266a6f1cbbef674e06', '8-921-4383716', '', '', '', 0, '2013-11-01 00:00:00', '0000-00-00 00:00:00', 1),
(42, 'Ivan', '', 'user@softscript3.ru', '7fa8282ad93047a4d6fe6111c93b308a', '', '', '', '', 0, '2014-01-15 00:00:00', '0000-00-00 00:00:00', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
