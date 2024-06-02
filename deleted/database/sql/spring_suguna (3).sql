-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 17, 2022 at 07:31 PM
-- Server version: 5.7.36-0ubuntu0.18.04.1
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spring_suguna`
--

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `date` date DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_params` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `title`, `alias`, `meta`, `description`, `date`, `url`, `extra_params`, `created_at`, `updated_at`) VALUES
(1, 'Painless storage and management of all your files in one place. Get 100 MB for free.', 'painless-storage-and-management-of-all-your-files-in-one-place-get-100-mb-for-free', '{\"title\":\"ewqe\",\"descrition\":\"ewqewq\",\"keywords\":\"dsadsad,dsad,sad,sa,dsadsald,sadsalds,ad,sad,as,ds,a\"}', '<p>dsadad</p>\r\n<p>ad</p>\r\n<p>sa</p>\r\n<p>da</p>\r\n<p>sd</p>\r\n<p><img src=\"https://www.tiny.cloud/images/illustrations/spot/tiny/illustration-spot-tiny-images.svg\" alt=\"\" width=\"705\" height=\"628\" /></p>', '2022-02-20', 'https://charlottes-closet.com/collections/endless-new-arrivals/products/butterfly-sweatshirt-black-1', NULL, '2021-12-28 06:09:34', '2022-01-08 06:42:34');

-- --------------------------------------------------------

--
-- Table structure for table `csr`
--

CREATE TABLE `csr` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `extra_params` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `csr`
--

INSERT INTO `csr` (`id`, `title`, `alias`, `meta`, `content`, `image`, `extra_params`, `created_at`, `updated_at`) VALUES
(6, 'Infrastructural support to primary & government schools in villages near our poultry farms.', 'infrastructural-support-to-primary-government-schools-in-villages-near-our-poultry-farms', '{\"title\":null,\"descrition\":null,\"keywords\":\"infrastructural-\"}', '<p><img src=\"http://suguna.group/assets/img/up_benches.jpg\" alt=\"\" /></p>\r\n<p>&nbsp;</p>\r\n<p>Education aids the development of an individual&rsquo;s cognitive, psychological and intellectual faculties that ultimately shapes his or her personality. To create a comfortable learning environment for the under privileged students, the necessary support is provided to the Primary and Government schools to develop the necessary infrastructure which in turn would make the students learn comfortably (donated tables, benches, desks &amp; notebooks).</p>\r\n<p>&nbsp;</p>\r\n<p>To create a better infrastructure and an atmosphere conducive for the school staff to work, this Programme provides infrastructural support to government schools &ndash; desks, chairs, tables &amp; cupboards</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><img src=\"http://suguna.group/assets/img/press/AP-Note-and-mask.jpg\" alt=\"\" width=\"1067\" height=\"600\" /></p>', 'csr/6/csr_school.jpg', NULL, '2021-12-28 09:09:32', '2022-01-12 06:08:53'),
(7, 'Promoting Health Care & Sanitation', 'promoting-health-care-sanitation', '{\"title\":null,\"descrition\":null,\"keywords\":null}', '<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://suguna.group/assets/img/TN-HealthCamp-1.jpg\" alt=\"\" width=\"910\" height=\"682\" /></p>\r\n<p>&nbsp;</p>\r\n<p>Majority of the schools in villages are without proper access to safe drinking water. Considering the importance of providing pure drinking water to the school children where the facilities are not there, drinking water Purifiers were provided.</p>\r\n<p>&nbsp;</p>\r\n<p>To inculcate good health &amp; hygiene habits among the students, especially for girl students to maintain good hygiene, coin operated Sanitary napkin vending machines along with napkins stock for 6 months to Government Schools.</p>\r\n<p>&nbsp;</p>\r\n<p>To eradicate malnutrition for the economically backward children and for those who cannot afford nutritious food, Milk and Table eggs were provided - to Orphanages and Primary schools near our farms.</p>\r\n<p>&nbsp;</p>\r\n<p>To fight against COVID-19, and to prevent from getting affected, face masks and sanitizers were provided to School Children, School Staff members, Villagers and to Primary Health Centres. Awareness of using face mask and sanitizers during the pandemic was also carried out in schools and villages.</p>\r\n<p>&nbsp;</p>\r\n<p>Supporting health care infrastructure - Considering the dire need for oxygen supplies for Covid patients due to the short supply of Oxygen cylinders which affected severely in many hospitals, Oxygen Generation Plant and Oxygen cylinders were provided to Government Hospitals.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://suguna.group/assets/img/BH-Tableeggs.jpg\" alt=\"\" width=\"1000\" height=\"461\" /></p>', 'csr/7/health_care.jpg', NULL, '2021-12-28 09:10:42', '2022-01-12 06:33:49'),
(8, 'Ensuring Environmental Sustainability and Ecological Balance', 'ensuring-environmental-sustainability-and-ecological-balance', '{\"title\":null,\"descrition\":null,\"keywords\":null}', '<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://suguna.group/assets/img/GJ-Sapligns.jpg\" alt=\"\" width=\"1000\" height=\"461\" /></p>\r\n<p>&nbsp;</p>\r\n<p>To create awareness among School children on the importance of making our environment green and to increase the green cover, tree saplings were distributed to school children. Also to enhance the environmental awareness levels in the community, tree saplings were distributed to the villagers and to our Broiler farmer</p>\r\n<p>&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://suguna.group/assets/img/BT-Saplilngs.jpg\" alt=\"\" width=\"902\" height=\"676\" /></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 'csr/8/ensuring.jpg', NULL, '2022-01-12 06:12:22', '2022-01-12 06:33:16');

-- --------------------------------------------------------

--
-- Table structure for table `entities`
--

CREATE TABLE `entities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `media_resources`
--

CREATE TABLE `media_resources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_params` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `media_resources`
--

INSERT INTO `media_resources` (`id`, `title`, `alias`, `meta`, `image`, `file`, `extra_params`, `created_at`, `updated_at`) VALUES
(1, 'PR Activity October 2021', 'pr-activity-october-2021', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'media_resource/1/suguna-media.png', 'media_resource/1/Empty.pdf', NULL, '2021-12-28 06:28:38', '2022-01-12 06:04:17'),
(2, 'PR Activity September 2021', 'pr-activity-september-2021', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'media_resource/2/suguna-media.png', 'media_resource/2/Empty.pdf', NULL, '2022-01-12 06:04:59', '2022-01-12 06:04:59'),
(3, 'PR Activity August 2021', 'pr-activity-august-2021', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'media_resource/3/suguna-media.png', 'media_resource/3/Empty.pdf', NULL, '2022-01-12 06:05:23', '2022-01-12 06:05:23'),
(4, 'PR Activity July 2021', 'pr-activity-july-2021', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'media_resource/4/suguna-media.png', 'media_resource/4/Empty.pdf', NULL, '2022-01-12 06:05:42', '2022-01-12 06:05:42'),
(5, 'PR Activity June 2021', 'pr-activity-june-2021', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'media_resource/5/suguna-media.png', 'media_resource/5/Empty.pdf', NULL, '2022-01-12 06:06:05', '2022-01-12 06:06:05'),
(6, 'PR Annual Report', 'pr-annual-report', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'media_resource/6/suguna-media.png', 'media_resource/6/Empty.pdf', NULL, '2022-01-12 06:06:23', '2022-01-12 06:06:23'),
(7, 'Group Logo (svg, png, jpeg)', 'group-logo-svg-png-jpeg', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'media_resource/7/suguna-media.png', 'media_resource/7/Empty.pdf', NULL, '2022-01-12 06:06:42', '2022-01-12 06:06:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_22_144618_create_permission_tables', 1),
(5, '2021_04_14_044507_create_settings_table', 1),
(6, '2021_06_15_022916_create_user_infos_table', 1),
(19, '2021_12_16_114056_create_entities_table', 5),
(20, '2021_12_16_114048_create_media_resources_table', 6),
(21, '2021_12_16_114051_create_news_table', 6),
(22, '2021_12_16_114053_create_press_releases_table', 6),
(23, '2021_12_16_114054_create_c_s_r_s_table', 6),
(24, '2021_12_16_114055_create_careers_table', 6),
(25, '2021_12_22_141456_create_pages_table', 6),
(27, '2022_01_10_131329_add_additional_columns_to_pages_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci,
  `extra_params` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `alias`, `meta`, `image`, `date`, `link`, `extra_params`, `created_at`, `updated_at`) VALUES
(1, 'Top poultry player Suguna Foods goes for brand revamp with all new Delfrez', 'top-poultry-player-suguna-foods-goes-for-brand-revamp-with-all-new-delfrez', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'news/1/poultry-player.jpg', '2021-12-01', 'https://www.business-standard.com/article/companies/top-poultry-player-suguna-foods-goes-for-brand-revamp-with-all-new-delfrez-121121600792_1.html', NULL, '2022-01-08 06:55:39', '2022-01-12 05:23:26'),
(2, 'Poultry firm Suguna unveils Delfrez brand', 'poultry-firm-suguna-unveils-delfrez-brand', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'news/2/TH17BUSUGUNA.jpg', '2021-12-01', 'https://economictimes.indiatimes.com/industry/cons-products/food/suguna-foods-announces-its-new-click-and-mortar-brand-delfrez/articleshow/88317526.cms?from=mdr', NULL, '2022-01-12 05:14:35', '2022-01-12 05:23:33'),
(3, 'Suguna Foods announces its new click and mortar brand  Delfrez', 'suguna-foods-announces-its-new-click-and-mortar-brand-delfrez', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'news/3/mobile-phone-thinkstock.jpg', '2021-12-01', 'https://economictimes.indiatimes.com/industry/cons-products/food/suguna-foods-announces-its-new-click-and-mortar-brand-delfrez/articleshow/88317526.cms?from=mdr', NULL, '2022-01-12 05:16:27', '2022-01-12 05:23:42'),
(4, 'Suguna Foods launches its first click and mortar business Delfrez as part of brand restructuring', 'suguna-foods-launches-its-first-click-and-mortar-business-delfrez-as-part-of-brand-restructuring', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'news/4/dec_21.jpg', '2021-12-01', 'https://www.cityairnews.com/content/suguna-foods-launches-its-first-click-and-mortar-business-delfrez-as-part-of-brand-restructuring', NULL, '2022-01-12 05:17:42', '2022-01-12 05:24:05'),
(7, 'Suguna Institute of Poultry Management ties up with Government of India New Delhi', 'suguna-institute-of-poultry-management-ties-up-with-government-of-india-new-delhi', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'news/7/SIPM.png', '2021-11-01', 'https://republicnewsindia.com/suguna-institute-of-poultry-management-ties-up-with-the-government-of-india-new-delhi/', NULL, '2022-01-12 05:21:03', '2022-01-12 05:28:07'),
(8, 'Suguna Feeds launched cattle feed at affordable price', 'suguna-feeds-launched-cattle-feed-at-affordable-price', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'news/8/cattle_feed.jpeg', '2021-09-01', 'https://republicnewsindia.com/suguna-feeds-launches-cattle-feed-at-affordable-price/', NULL, '2022-01-12 05:22:35', '2022-01-12 05:26:16'),
(9, 'Suguna Institute of Poultry Management to start admissions for undergraduate and diploma programmes', 'suguna-institute-of-poultry-management-to-start-admissions-for-undergraduate-and-diploma-programmes', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'news/9/poultry_management.jpeg', '2021-08-01', 'http://mediabulletins.com/education/suguna-institute-of-poultry-management-to-start-admissions-for-undergraduate-and-diploma-programmes/', NULL, '2022-01-12 05:27:24', '2022-01-12 05:27:24'),
(10, 'Farm to Fork a healthy journey from the house of Suguna foods', 'farm-to-fork-a-healthy-journey-from-the-house-of-suguna-foods', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'news/10/newsfood.jpg', '2021-08-01', 'https://businessreporter.in/farm-to-fork-a-healthy-journey-from-the-house-of-suguna-foods/', NULL, '2022-01-12 05:29:12', '2022-01-12 05:29:12'),
(11, 'Starting with Rs 5000 how Coimbatore based Suguna Foods became Rs 8700 Cr turnover poultry company', 'starting-with-rs-5000-how-coimbatore-based-suguna-foods-became-rs-8700-cr-turnover-poultry-company', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'news/11/jul.jpg', '2021-07-01', 'https://yourstory.com/smbstory/indian-poultry-industry-suguna-foods-coimbatore/amp', NULL, '2022-01-12 05:30:43', '2022-01-12 05:30:43'),
(12, 'Vitamin D deficiency in patients recove1 from COVID19', 'vitamin-d-deficiency-in-patients-recove1-from-covid19', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'news/12/vitamin-d-3.jpg', '2021-06-01', 'https://www.femina.in/tamil/health/diet/vitamin-d-deficiency-in-patients-recove1-from-covid-19_-2583.html', NULL, '2022-01-12 05:32:13', '2022-01-12 05:32:13');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `editable_route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resource` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `meta` longtext COLLATE utf8mb4_unicode_ci,
  `extra_params` longtext COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `route`, `editable_route`, `resource`, `path`, `alias`, `content`, `meta`, `extra_params`, `status`, `created_at`, `updated_at`) VALUES
(1, 'home', 'front.cms.store', NULL, NULL, NULL, NULL, '{\"homeSection2Title1\":\"One Group\",\"homeSection2Title2\":\"One Purpose\",\"homeSection2Title3\":\"One Vision\",\"homeSection2Desciption\":\"Times change. Market evolves. New challenges are born. But what stays constant are our purpose and vision. While our purpose fuels the work we do, our vision navigates us in the pursuit of global nutritional security.&nbsp;\",\"homeSection2EmployeeCount\":\"700+\",\"homeSection2EmployeeText\":\"Employees\",\"homeSection2CountriesCount\":\"04\",\"homeSection2CountriesText\":\"Countries\",\"homeSection2EntitiesCount\":\"07\",\"homeSection2EntitiesText\":\"Employees\",\"homeSection2CroresCount\":\"₹9,700+\",\"homeSection2CroresText\":\"Crores turnover in<br> FY 2020-21\",\"homeSection2LegacyCount\":\"₹9,000\",\"homeSection2LegacyText\":\"Decades of Legacy\",\"homeSection2FarmerCount\":\"40,000+\",\"homeSection2FarmerText\":\"Farmers Benefitted\",\"homeSection3Image\":[\"http://127.0.0.1:8000/front-end/assets/img/contributing.jpg\"],\"homeSection3Title\":\"Contributing to global nutritional security holistically.\",\"homeSection3Des\":\"For a long time, food security had been a major concern around the world. Today, <b>nutritional security</b> has become a crippling health crisis that many parts of the world face. Many people don’t get access to a wide range of foods that promises all the essential nutrients required for an active day. <br>Since nutritional security is influenced by various factors, addressing it takes a holistic approach. For more than three decades, Suguna Group contributes to nutritional security in India and overseas by…\",\"homeSection3list1\":\"Making essential nutrients accessible and affordable to the common people.\",\"homeSection3list2\":\"Addressing malnutrition with various sources of nutrients, and not just proteins.\",\"homeSection3list3\":\"Educating and encouraging young minds to contribute to nutritional security by creating career opportunities in the agro-food industry.\",\"homeSection4Title\":\"Our brands\",\"homeSection4Des\":\"The rings of a global value chain\",\"homeSection5Title\":\"Corporate Social Responsibility\",\"homeSection5Des\":\"Making commitments for a better society.\",\"homeSection6Subhead\":\"Careers\",\"homeSection6Head\":\"Work With Us\",\"homeSection6Des\":\"Work With Us\",\"homeSection6Anchor\":[\"See Openings\",\"http://127.0.0.1:8000/home/careers.php\"],\"homeSection7Subhead\":\"A Multinational Corporation\",\"homeSection7Head\":\"From being a native Indian to<br> becoming a global leader.\",\"homeSection7Des\":\"In a journey that spans more than three decades, we have progressed<br> from one milestone to another, earning a global reputation.\",\"homeSection8Subhead\":\"LATEST UPDATES\",\"homeSection8Head\":\"In the news\"}', '{\"title\":\"Suguna - Home1\",\"descrition\":\"Suguna - Home\",\"keywords\":\"Suguna - Home\"}', '{\"homeSection2Title1\":\"One Group\",\"homeSection2Title2\":\"One Purpose\",\"homeSection2Title3\":\"One Vision\",\"homeSection2Desciption\":\"Times change. Market evolves. New challenges are born. But what stays constant are our purpose and vision. While our purpose fuels the work we do, our vision navigates us in the pursuit of global nutritional security.&nbsp;\",\"homeSection2EmployeeCount\":\"700+\",\"homeSection2EmployeeText\":\"Employees\",\"homeSection2CountriesCount\":\"04\",\"homeSection2CountriesText\":\"Countries\",\"homeSection2EntitiesCount\":\"07\",\"homeSection2EntitiesText\":\"Employees\",\"homeSection2CroresCount\":\"₹9,700+\",\"homeSection2CroresText\":\"Crores turnover in<br> FY 2020-21\",\"homeSection2LegacyCount\":\"₹9,000\",\"homeSection2LegacyText\":\"Decades of Legacy\",\"homeSection2FarmerCount\":\"40,000+\",\"homeSection2FarmerText\":\"Farmers Benefitted\",\"homeSection3Image\":[\"http://127.0.0.1:8000/front-end/assets/img/contributing.jpg\"],\"homeSection3Title\":\"Contributing to global nutritional security holistically.\",\"homeSection3Des\":\"For a long time, food security had been a major concern around the world. Today, <b>nutritional security</b> has become a crippling health crisis that many parts of the world face. Many people don’t get access to a wide range of foods that promises all the essential nutrients required for an active day. <br>Since nutritional security is influenced by various factors, addressing it takes a holistic approach. For more than three decades, Suguna Group contributes to nutritional security in India and overseas by…\",\"homeSection3list1\":\"Making essential nutrients accessible and affordable to the common people.\",\"homeSection3list2\":\"Addressing malnutrition with various sources of nutrients, and not just proteins.\",\"homeSection3list3\":\"Educating and encouraging young minds to contribute to nutritional security by creating career opportunities in the agro-food industry.\",\"homeSection4Title\":\"Our brands\",\"homeSection4Des\":\"The rings of a global value chain\",\"homeSection5Title\":\"Corporate Social Responsibility\",\"homeSection5Des\":\"Making commitments for a better society.\",\"homeSection6Subhead\":\"Careers\",\"homeSection6Head\":\"Work With Us\",\"homeSection6Des\":\"Work With Us\",\"homeSection6Anchor\":[\"See Openings\",\"http://127.0.0.1:8000/careers.php\"],\"homeSection7Subhead\":\"A Multinational Corporation\",\"homeSection7Head\":\"From being a native Indian to<br> becoming a global leader.\",\"homeSection7Des\":\"In a journey that spans more than three decades, we have progressed<br> from one milestone to another, earning a global reputation.\",\"homeSection8Subhead\":\"LATEST UPDATES\",\"homeSection8Head\":\"In the news\"}', 1, '2021-12-31 22:42:33', '2022-01-10 08:55:24'),
(2, 'about', 'front.cms.store', NULL, NULL, NULL, NULL, '{\"homeSection2Title1\":\"One Group\",\"homeSection2Title2\":\"One Purpose\",\"homeSection2Title3\":\"One Vision\",\"homeSection2Desciption\":\"Times change. Market evolves. New challenges are born. But what stays constant are our purpose and vision. While our purpose fuels the work we do, our vision navigates us in the pursuit of global nutritional security.&nbsp;\",\"homeSection2EmployeeCount\":\"700+\",\"homeSection2EmployeeText\":\"Employees\",\"homeSection2CountriesCount\":\"04\",\"homeSection2CountriesText\":\"Countries\",\"homeSection2EntitiesCount\":\"07\",\"homeSection2EntitiesText\":\"Employees\",\"homeSection2CroresCount\":\"₹9,700+\",\"homeSection2CroresText\":\"Crores turnover in<br> FY 2020-21\",\"homeSection2LegacyCount\":\"₹9,000\",\"homeSection2LegacyText\":\"Decades of Legacy\",\"homeSection2FarmerCount\":\"40,000+\",\"homeSection2FarmerText\":\"Farmers Benefitted\",\"homeSection3Image\":[\"http://127.0.0.1:8000/front-end/assets/img/contributing.jpg\"],\"homeSection3Title\":\"Contributing to global nutritional security holistically.\",\"homeSection3Des\":\"For a long time, food security had been a major concern around the world. Today, <b>nutritional security</b> has become a crippling health crisis that many parts of the world face. Many people don’t get access to a wide range of foods that promises all the essential nutrients required for an active day. <br>Since nutritional security is influenced by various factors, addressing it takes a holistic approach. For more than three decades, Suguna Group contributes to nutritional security in India and overseas by…\",\"homeSection3list1\":\"Making essential nutrients accessible and affordable to the common people.\",\"homeSection3list2\":\"Addressing malnutrition with various sources of nutrients, and not just proteins.\",\"homeSection3list3\":\"Educating and encouraging young minds to contribute to nutritional security by creating career opportunities in the agro-food industry.\",\"homeSection4Title\":\"Our brands\",\"homeSection4Des\":\"The rings of a global value chain\",\"homeSection5Title\":\"Corporate Social Responsibility\",\"homeSection5Des\":\"Making commitments for a better society.\",\"homeSection6Subhead\":\"Careers\",\"homeSection6Head\":\"Work With Us\",\"homeSection6Des\":\"Work With Us\",\"homeSection6Anchor\":[\"See Openings\",\"http://127.0.0.1:8000/home/careers.php\"],\"homeSection7Subhead\":\"A Multinational Corporation\",\"homeSection7Head\":\"From being a native Indian to<br> becoming a global leader.\",\"homeSection7Des\":\"In a journey that spans more than three decades, we have progressed<br> from one milestone to another, earning a global reputation.\",\"homeSection8Subhead\":\"LATEST UPDATES\",\"homeSection8Head\":\"In the news\"}', '{\"title\":\"Suguna - Home1\",\"descrition\":\"Suguna - Home\",\"keywords\":\"Suguna - Home\"}', '{\"homeSection2Title1\":\"One Group\",\"homeSection2Title2\":\"One Purpose\",\"homeSection2Title3\":\"One Vision\",\"homeSection2Desciption\":\"Times change. Market evolves. New challenges are born. But what stays constant are our purpose and vision. While our purpose fuels the work we do, our vision navigates us in the pursuit of global nutritional security.&nbsp;\",\"homeSection2EmployeeCount\":\"700+\",\"homeSection2EmployeeText\":\"Employees\",\"homeSection2CountriesCount\":\"04\",\"homeSection2CountriesText\":\"Countries\",\"homeSection2EntitiesCount\":\"07\",\"homeSection2EntitiesText\":\"Employees\",\"homeSection2CroresCount\":\"₹9,700+\",\"homeSection2CroresText\":\"Crores turnover in<br> FY 2020-21\",\"homeSection2LegacyCount\":\"₹9,000\",\"homeSection2LegacyText\":\"Decades of Legacy\",\"homeSection2FarmerCount\":\"40,000+\",\"homeSection2FarmerText\":\"Farmers Benefitted\",\"homeSection3Image\":[\"http://127.0.0.1:8000/front-end/assets/img/contributing.jpg\"],\"homeSection3Title\":\"Contributing to global nutritional security holistically.\",\"homeSection3Des\":\"For a long time, food security had been a major concern around the world. Today, <b>nutritional security</b> has become a crippling health crisis that many parts of the world face. Many people don’t get access to a wide range of foods that promises all the essential nutrients required for an active day. <br>Since nutritional security is influenced by various factors, addressing it takes a holistic approach. For more than three decades, Suguna Group contributes to nutritional security in India and overseas by…\",\"homeSection3list1\":\"Making essential nutrients accessible and affordable to the common people.\",\"homeSection3list2\":\"Addressing malnutrition with various sources of nutrients, and not just proteins.\",\"homeSection3list3\":\"Educating and encouraging young minds to contribute to nutritional security by creating career opportunities in the agro-food industry.\",\"homeSection4Title\":\"Our brands\",\"homeSection4Des\":\"The rings of a global value chain\",\"homeSection5Title\":\"Corporate Social Responsibility\",\"homeSection5Des\":\"Making commitments for a better society.\",\"homeSection6Subhead\":\"Careers\",\"homeSection6Head\":\"Work With Us\",\"homeSection6Des\":\"Work With Us\",\"homeSection6Anchor\":[\"See Openings\",\"http://127.0.0.1:8000/careers.php\"],\"homeSection7Subhead\":\"A Multinational Corporation\",\"homeSection7Head\":\"From being a native Indian to<br> becoming a global leader.\",\"homeSection7Des\":\"In a journey that spans more than three decades, we have progressed<br> from one milestone to another, earning a global reputation.\",\"homeSection8Subhead\":\"LATEST UPDATES\",\"homeSection8Head\":\"In the news\"}', 1, '2021-12-31 22:42:33', '2022-01-10 08:55:24'),
(3, 'leadership', 'front.cms.store', NULL, NULL, NULL, NULL, '{\"homeSection2Title1\":\"One Group\",\"homeSection2Title2\":\"One Purpose\",\"homeSection2Title3\":\"One Vision\",\"homeSection2Desciption\":\"Times change. Market evolves. New challenges are born. But what stays constant are our purpose and vision. While our purpose fuels the work we do, our vision navigates us in the pursuit of global nutritional security.&nbsp;\",\"homeSection2EmployeeCount\":\"700+\",\"homeSection2EmployeeText\":\"Employees\",\"homeSection2CountriesCount\":\"04\",\"homeSection2CountriesText\":\"Countries\",\"homeSection2EntitiesCount\":\"07\",\"homeSection2EntitiesText\":\"Employees\",\"homeSection2CroresCount\":\"₹9,700+\",\"homeSection2CroresText\":\"Crores turnover in<br> FY 2020-21\",\"homeSection2LegacyCount\":\"₹9,000\",\"homeSection2LegacyText\":\"Decades of Legacy\",\"homeSection2FarmerCount\":\"40,000+\",\"homeSection2FarmerText\":\"Farmers Benefitted\",\"homeSection3Image\":[\"http://127.0.0.1:8000/front-end/assets/img/contributing.jpg\"],\"homeSection3Title\":\"Contributing to global nutritional security holistically.\",\"homeSection3Des\":\"For a long time, food security had been a major concern around the world. Today, <b>nutritional security</b> has become a crippling health crisis that many parts of the world face. Many people don’t get access to a wide range of foods that promises all the essential nutrients required for an active day. <br>Since nutritional security is influenced by various factors, addressing it takes a holistic approach. For more than three decades, Suguna Group contributes to nutritional security in India and overseas by…\",\"homeSection3list1\":\"Making essential nutrients accessible and affordable to the common people.\",\"homeSection3list2\":\"Addressing malnutrition with various sources of nutrients, and not just proteins.\",\"homeSection3list3\":\"Educating and encouraging young minds to contribute to nutritional security by creating career opportunities in the agro-food industry.\",\"homeSection4Title\":\"Our brands\",\"homeSection4Des\":\"The rings of a global value chain\",\"homeSection5Title\":\"Corporate Social Responsibility\",\"homeSection5Des\":\"Making commitments for a better society.\",\"homeSection6Subhead\":\"Careers\",\"homeSection6Head\":\"Work With Us\",\"homeSection6Des\":\"Work With Us\",\"homeSection6Anchor\":[\"See Openings\",\"http://127.0.0.1:8000/home/careers.php\"],\"homeSection7Subhead\":\"A Multinational Corporation\",\"homeSection7Head\":\"From being a native Indian to<br> becoming a global leader.\",\"homeSection7Des\":\"In a journey that spans more than three decades, we have progressed<br> from one milestone to another, earning a global reputation.\",\"homeSection8Subhead\":\"LATEST UPDATES\",\"homeSection8Head\":\"In the news\"}', '{\"title\":\"Suguna - Home1\",\"descrition\":\"Suguna - Home\",\"keywords\":\"Suguna - Home\"}', '{\"homeSection2Title1\":\"One Group\",\"homeSection2Title2\":\"One Purpose\",\"homeSection2Title3\":\"One Vision\",\"homeSection2Desciption\":\"Times change. Market evolves. New challenges are born. But what stays constant are our purpose and vision. While our purpose fuels the work we do, our vision navigates us in the pursuit of global nutritional security.&nbsp;\",\"homeSection2EmployeeCount\":\"700+\",\"homeSection2EmployeeText\":\"Employees\",\"homeSection2CountriesCount\":\"04\",\"homeSection2CountriesText\":\"Countries\",\"homeSection2EntitiesCount\":\"07\",\"homeSection2EntitiesText\":\"Employees\",\"homeSection2CroresCount\":\"₹9,700+\",\"homeSection2CroresText\":\"Crores turnover in<br> FY 2020-21\",\"homeSection2LegacyCount\":\"₹9,000\",\"homeSection2LegacyText\":\"Decades of Legacy\",\"homeSection2FarmerCount\":\"40,000+\",\"homeSection2FarmerText\":\"Farmers Benefitted\",\"homeSection3Image\":[\"http://127.0.0.1:8000/front-end/assets/img/contributing.jpg\"],\"homeSection3Title\":\"Contributing to global nutritional security holistically.\",\"homeSection3Des\":\"For a long time, food security had been a major concern around the world. Today, <b>nutritional security</b> has become a crippling health crisis that many parts of the world face. Many people don’t get access to a wide range of foods that promises all the essential nutrients required for an active day. <br>Since nutritional security is influenced by various factors, addressing it takes a holistic approach. For more than three decades, Suguna Group contributes to nutritional security in India and overseas by…\",\"homeSection3list1\":\"Making essential nutrients accessible and affordable to the common people.\",\"homeSection3list2\":\"Addressing malnutrition with various sources of nutrients, and not just proteins.\",\"homeSection3list3\":\"Educating and encouraging young minds to contribute to nutritional security by creating career opportunities in the agro-food industry.\",\"homeSection4Title\":\"Our brands\",\"homeSection4Des\":\"The rings of a global value chain\",\"homeSection5Title\":\"Corporate Social Responsibility\",\"homeSection5Des\":\"Making commitments for a better society.\",\"homeSection6Subhead\":\"Careers\",\"homeSection6Head\":\"Work With Us\",\"homeSection6Des\":\"Work With Us\",\"homeSection6Anchor\":[\"See Openings\",\"http://127.0.0.1:8000/careers.php\"],\"homeSection7Subhead\":\"A Multinational Corporation\",\"homeSection7Head\":\"From being a native Indian to<br> becoming a global leader.\",\"homeSection7Des\":\"In a journey that spans more than three decades, we have progressed<br> from one milestone to another, earning a global reputation.\",\"homeSection8Subhead\":\"LATEST UPDATES\",\"homeSection8Head\":\"In the news\"}', 1, '2021-12-31 22:42:33', '2022-01-10 08:55:24'),
(4, 'news', 'front.cms.store', NULL, NULL, NULL, NULL, '{\"homeSection2Title1\":\"One Group\",\"homeSection2Title2\":\"One Purpose\",\"homeSection2Title3\":\"One Vision\",\"homeSection2Desciption\":\"Times change. Market evolves. New challenges are born. But what stays constant are our purpose and vision. While our purpose fuels the work we do, our vision navigates us in the pursuit of global nutritional security.&nbsp;\",\"homeSection2EmployeeCount\":\"700+\",\"homeSection2EmployeeText\":\"Employees\",\"homeSection2CountriesCount\":\"04\",\"homeSection2CountriesText\":\"Countries\",\"homeSection2EntitiesCount\":\"07\",\"homeSection2EntitiesText\":\"Employees\",\"homeSection2CroresCount\":\"₹9,700+\",\"homeSection2CroresText\":\"Crores turnover in<br> FY 2020-21\",\"homeSection2LegacyCount\":\"₹9,000\",\"homeSection2LegacyText\":\"Decades of Legacy\",\"homeSection2FarmerCount\":\"40,000+\",\"homeSection2FarmerText\":\"Farmers Benefitted\",\"homeSection3Image\":[\"http://127.0.0.1:8000/front-end/assets/img/contributing.jpg\"],\"homeSection3Title\":\"Contributing to global nutritional security holistically.\",\"homeSection3Des\":\"For a long time, food security had been a major concern around the world. Today, <b>nutritional security</b> has become a crippling health crisis that many parts of the world face. Many people don’t get access to a wide range of foods that promises all the essential nutrients required for an active day. <br>Since nutritional security is influenced by various factors, addressing it takes a holistic approach. For more than three decades, Suguna Group contributes to nutritional security in India and overseas by…\",\"homeSection3list1\":\"Making essential nutrients accessible and affordable to the common people.\",\"homeSection3list2\":\"Addressing malnutrition with various sources of nutrients, and not just proteins.\",\"homeSection3list3\":\"Educating and encouraging young minds to contribute to nutritional security by creating career opportunities in the agro-food industry.\",\"homeSection4Title\":\"Our brands\",\"homeSection4Des\":\"The rings of a global value chain\",\"homeSection5Title\":\"Corporate Social Responsibility\",\"homeSection5Des\":\"Making commitments for a better society.\",\"homeSection6Subhead\":\"Careers\",\"homeSection6Head\":\"Work With Us\",\"homeSection6Des\":\"Work With Us\",\"homeSection6Anchor\":[\"See Openings\",\"http://127.0.0.1:8000/home/careers.php\"],\"homeSection7Subhead\":\"A Multinational Corporation\",\"homeSection7Head\":\"From being a native Indian to<br> becoming a global leader.\",\"homeSection7Des\":\"In a journey that spans more than three decades, we have progressed<br> from one milestone to another, earning a global reputation.\",\"homeSection8Subhead\":\"LATEST UPDATES\",\"homeSection8Head\":\"In the news\"}', '{\"title\":\"Suguna - Home1\",\"descrition\":\"Suguna - Home\",\"keywords\":\"Suguna - Home\"}', '{\"homeSection2Title1\":\"One Group\",\"homeSection2Title2\":\"One Purpose\",\"homeSection2Title3\":\"One Vision\",\"homeSection2Desciption\":\"Times change. Market evolves. New challenges are born. But what stays constant are our purpose and vision. While our purpose fuels the work we do, our vision navigates us in the pursuit of global nutritional security.&nbsp;\",\"homeSection2EmployeeCount\":\"700+\",\"homeSection2EmployeeText\":\"Employees\",\"homeSection2CountriesCount\":\"04\",\"homeSection2CountriesText\":\"Countries\",\"homeSection2EntitiesCount\":\"07\",\"homeSection2EntitiesText\":\"Employees\",\"homeSection2CroresCount\":\"₹9,700+\",\"homeSection2CroresText\":\"Crores turnover in<br> FY 2020-21\",\"homeSection2LegacyCount\":\"₹9,000\",\"homeSection2LegacyText\":\"Decades of Legacy\",\"homeSection2FarmerCount\":\"40,000+\",\"homeSection2FarmerText\":\"Farmers Benefitted\",\"homeSection3Image\":[\"http://127.0.0.1:8000/front-end/assets/img/contributing.jpg\"],\"homeSection3Title\":\"Contributing to global nutritional security holistically.\",\"homeSection3Des\":\"For a long time, food security had been a major concern around the world. Today, <b>nutritional security</b> has become a crippling health crisis that many parts of the world face. Many people don’t get access to a wide range of foods that promises all the essential nutrients required for an active day. <br>Since nutritional security is influenced by various factors, addressing it takes a holistic approach. For more than three decades, Suguna Group contributes to nutritional security in India and overseas by…\",\"homeSection3list1\":\"Making essential nutrients accessible and affordable to the common people.\",\"homeSection3list2\":\"Addressing malnutrition with various sources of nutrients, and not just proteins.\",\"homeSection3list3\":\"Educating and encouraging young minds to contribute to nutritional security by creating career opportunities in the agro-food industry.\",\"homeSection4Title\":\"Our brands\",\"homeSection4Des\":\"The rings of a global value chain\",\"homeSection5Title\":\"Corporate Social Responsibility\",\"homeSection5Des\":\"Making commitments for a better society.\",\"homeSection6Subhead\":\"Careers\",\"homeSection6Head\":\"Work With Us\",\"homeSection6Des\":\"Work With Us\",\"homeSection6Anchor\":[\"See Openings\",\"http://127.0.0.1:8000/careers.php\"],\"homeSection7Subhead\":\"A Multinational Corporation\",\"homeSection7Head\":\"From being a native Indian to<br> becoming a global leader.\",\"homeSection7Des\":\"In a journey that spans more than three decades, we have progressed<br> from one milestone to another, earning a global reputation.\",\"homeSection8Subhead\":\"LATEST UPDATES\",\"homeSection8Head\":\"In the news\"}', 1, '2021-12-31 22:42:33', '2022-01-10 08:55:24'),
(5, 'press_release', 'front.cms.store', NULL, NULL, NULL, NULL, '{\"homeSection2Title1\":\"One Group\",\"homeSection2Title2\":\"One Purpose\",\"homeSection2Title3\":\"One Vision\",\"homeSection2Desciption\":\"Times change. Market evolves. New challenges are born. But what stays constant are our purpose and vision. While our purpose fuels the work we do, our vision navigates us in the pursuit of global nutritional security.&nbsp;\",\"homeSection2EmployeeCount\":\"700+\",\"homeSection2EmployeeText\":\"Employees\",\"homeSection2CountriesCount\":\"04\",\"homeSection2CountriesText\":\"Countries\",\"homeSection2EntitiesCount\":\"07\",\"homeSection2EntitiesText\":\"Employees\",\"homeSection2CroresCount\":\"₹9,700+\",\"homeSection2CroresText\":\"Crores turnover in<br> FY 2020-21\",\"homeSection2LegacyCount\":\"₹9,000\",\"homeSection2LegacyText\":\"Decades of Legacy\",\"homeSection2FarmerCount\":\"40,000+\",\"homeSection2FarmerText\":\"Farmers Benefitted\",\"homeSection3Image\":[\"http://127.0.0.1:8000/front-end/assets/img/contributing.jpg\"],\"homeSection3Title\":\"Contributing to global nutritional security holistically.\",\"homeSection3Des\":\"For a long time, food security had been a major concern around the world. Today, <b>nutritional security</b> has become a crippling health crisis that many parts of the world face. Many people don’t get access to a wide range of foods that promises all the essential nutrients required for an active day. <br>Since nutritional security is influenced by various factors, addressing it takes a holistic approach. For more than three decades, Suguna Group contributes to nutritional security in India and overseas by…\",\"homeSection3list1\":\"Making essential nutrients accessible and affordable to the common people.\",\"homeSection3list2\":\"Addressing malnutrition with various sources of nutrients, and not just proteins.\",\"homeSection3list3\":\"Educating and encouraging young minds to contribute to nutritional security by creating career opportunities in the agro-food industry.\",\"homeSection4Title\":\"Our brands\",\"homeSection4Des\":\"The rings of a global value chain\",\"homeSection5Title\":\"Corporate Social Responsibility\",\"homeSection5Des\":\"Making commitments for a better society.\",\"homeSection6Subhead\":\"Careers\",\"homeSection6Head\":\"Work With Us\",\"homeSection6Des\":\"Work With Us\",\"homeSection6Anchor\":[\"See Openings\",\"http://127.0.0.1:8000/home/careers.php\"],\"homeSection7Subhead\":\"A Multinational Corporation\",\"homeSection7Head\":\"From being a native Indian to<br> becoming a global leader.\",\"homeSection7Des\":\"In a journey that spans more than three decades, we have progressed<br> from one milestone to another, earning a global reputation.\",\"homeSection8Subhead\":\"LATEST UPDATES\",\"homeSection8Head\":\"In the news\"}', '{\"title\":\"Suguna - Home1\",\"descrition\":\"Suguna - Home\",\"keywords\":\"Suguna - Home\"}', '{\"homeSection2Title1\":\"One Group\",\"homeSection2Title2\":\"One Purpose\",\"homeSection2Title3\":\"One Vision\",\"homeSection2Desciption\":\"Times change. Market evolves. New challenges are born. But what stays constant are our purpose and vision. While our purpose fuels the work we do, our vision navigates us in the pursuit of global nutritional security.&nbsp;\",\"homeSection2EmployeeCount\":\"700+\",\"homeSection2EmployeeText\":\"Employees\",\"homeSection2CountriesCount\":\"04\",\"homeSection2CountriesText\":\"Countries\",\"homeSection2EntitiesCount\":\"07\",\"homeSection2EntitiesText\":\"Employees\",\"homeSection2CroresCount\":\"₹9,700+\",\"homeSection2CroresText\":\"Crores turnover in<br> FY 2020-21\",\"homeSection2LegacyCount\":\"₹9,000\",\"homeSection2LegacyText\":\"Decades of Legacy\",\"homeSection2FarmerCount\":\"40,000+\",\"homeSection2FarmerText\":\"Farmers Benefitted\",\"homeSection3Image\":[\"http://127.0.0.1:8000/front-end/assets/img/contributing.jpg\"],\"homeSection3Title\":\"Contributing to global nutritional security holistically.\",\"homeSection3Des\":\"For a long time, food security had been a major concern around the world. Today, <b>nutritional security</b> has become a crippling health crisis that many parts of the world face. Many people don’t get access to a wide range of foods that promises all the essential nutrients required for an active day. <br>Since nutritional security is influenced by various factors, addressing it takes a holistic approach. For more than three decades, Suguna Group contributes to nutritional security in India and overseas by…\",\"homeSection3list1\":\"Making essential nutrients accessible and affordable to the common people.\",\"homeSection3list2\":\"Addressing malnutrition with various sources of nutrients, and not just proteins.\",\"homeSection3list3\":\"Educating and encouraging young minds to contribute to nutritional security by creating career opportunities in the agro-food industry.\",\"homeSection4Title\":\"Our brands\",\"homeSection4Des\":\"The rings of a global value chain\",\"homeSection5Title\":\"Corporate Social Responsibility\",\"homeSection5Des\":\"Making commitments for a better society.\",\"homeSection6Subhead\":\"Careers\",\"homeSection6Head\":\"Work With Us\",\"homeSection6Des\":\"Work With Us\",\"homeSection6Anchor\":[\"See Openings\",\"http://127.0.0.1:8000/careers.php\"],\"homeSection7Subhead\":\"A Multinational Corporation\",\"homeSection7Head\":\"From being a native Indian to<br> becoming a global leader.\",\"homeSection7Des\":\"In a journey that spans more than three decades, we have progressed<br> from one milestone to another, earning a global reputation.\",\"homeSection8Subhead\":\"LATEST UPDATES\",\"homeSection8Head\":\"In the news\"}', 1, '2021-12-31 22:42:33', '2022-01-10 08:55:24'),
(6, 'media_resources', 'front.cms.store', NULL, NULL, NULL, NULL, '{\"homeSection2Title1\":\"One Group\",\"homeSection2Title2\":\"One Purpose\",\"homeSection2Title3\":\"One Vision\",\"homeSection2Desciption\":\"Times change. Market evolves. New challenges are born. But what stays constant are our purpose and vision. While our purpose fuels the work we do, our vision navigates us in the pursuit of global nutritional security.&nbsp;\",\"homeSection2EmployeeCount\":\"700+\",\"homeSection2EmployeeText\":\"Employees\",\"homeSection2CountriesCount\":\"04\",\"homeSection2CountriesText\":\"Countries\",\"homeSection2EntitiesCount\":\"07\",\"homeSection2EntitiesText\":\"Employees\",\"homeSection2CroresCount\":\"₹9,700+\",\"homeSection2CroresText\":\"Crores turnover in<br> FY 2020-21\",\"homeSection2LegacyCount\":\"₹9,000\",\"homeSection2LegacyText\":\"Decades of Legacy\",\"homeSection2FarmerCount\":\"40,000+\",\"homeSection2FarmerText\":\"Farmers Benefitted\",\"homeSection3Image\":[\"http://127.0.0.1:8000/front-end/assets/img/contributing.jpg\"],\"homeSection3Title\":\"Contributing to global nutritional security holistically.\",\"homeSection3Des\":\"For a long time, food security had been a major concern around the world. Today, <b>nutritional security</b> has become a crippling health crisis that many parts of the world face. Many people don’t get access to a wide range of foods that promises all the essential nutrients required for an active day. <br>Since nutritional security is influenced by various factors, addressing it takes a holistic approach. For more than three decades, Suguna Group contributes to nutritional security in India and overseas by…\",\"homeSection3list1\":\"Making essential nutrients accessible and affordable to the common people.\",\"homeSection3list2\":\"Addressing malnutrition with various sources of nutrients, and not just proteins.\",\"homeSection3list3\":\"Educating and encouraging young minds to contribute to nutritional security by creating career opportunities in the agro-food industry.\",\"homeSection4Title\":\"Our brands\",\"homeSection4Des\":\"The rings of a global value chain\",\"homeSection5Title\":\"Corporate Social Responsibility\",\"homeSection5Des\":\"Making commitments for a better society.\",\"homeSection6Subhead\":\"Careers\",\"homeSection6Head\":\"Work With Us\",\"homeSection6Des\":\"Work With Us\",\"homeSection6Anchor\":[\"See Openings\",\"http://127.0.0.1:8000/home/careers.php\"],\"homeSection7Subhead\":\"A Multinational Corporation\",\"homeSection7Head\":\"From being a native Indian to<br> becoming a global leader.\",\"homeSection7Des\":\"In a journey that spans more than three decades, we have progressed<br> from one milestone to another, earning a global reputation.\",\"homeSection8Subhead\":\"LATEST UPDATES\",\"homeSection8Head\":\"In the news\"}', '{\"title\":\"Suguna - Home1\",\"descrition\":\"Suguna - Home\",\"keywords\":\"Suguna - Home\"}', '{\"homeSection2Title1\":\"One Group\",\"homeSection2Title2\":\"One Purpose\",\"homeSection2Title3\":\"One Vision\",\"homeSection2Desciption\":\"Times change. Market evolves. New challenges are born. But what stays constant are our purpose and vision. While our purpose fuels the work we do, our vision navigates us in the pursuit of global nutritional security.&nbsp;\",\"homeSection2EmployeeCount\":\"700+\",\"homeSection2EmployeeText\":\"Employees\",\"homeSection2CountriesCount\":\"04\",\"homeSection2CountriesText\":\"Countries\",\"homeSection2EntitiesCount\":\"07\",\"homeSection2EntitiesText\":\"Employees\",\"homeSection2CroresCount\":\"₹9,700+\",\"homeSection2CroresText\":\"Crores turnover in<br> FY 2020-21\",\"homeSection2LegacyCount\":\"₹9,000\",\"homeSection2LegacyText\":\"Decades of Legacy\",\"homeSection2FarmerCount\":\"40,000+\",\"homeSection2FarmerText\":\"Farmers Benefitted\",\"homeSection3Image\":[\"http://127.0.0.1:8000/front-end/assets/img/contributing.jpg\"],\"homeSection3Title\":\"Contributing to global nutritional security holistically.\",\"homeSection3Des\":\"For a long time, food security had been a major concern around the world. Today, <b>nutritional security</b> has become a crippling health crisis that many parts of the world face. Many people don’t get access to a wide range of foods that promises all the essential nutrients required for an active day. <br>Since nutritional security is influenced by various factors, addressing it takes a holistic approach. For more than three decades, Suguna Group contributes to nutritional security in India and overseas by…\",\"homeSection3list1\":\"Making essential nutrients accessible and affordable to the common people.\",\"homeSection3list2\":\"Addressing malnutrition with various sources of nutrients, and not just proteins.\",\"homeSection3list3\":\"Educating and encouraging young minds to contribute to nutritional security by creating career opportunities in the agro-food industry.\",\"homeSection4Title\":\"Our brands\",\"homeSection4Des\":\"The rings of a global value chain\",\"homeSection5Title\":\"Corporate Social Responsibility\",\"homeSection5Des\":\"Making commitments for a better society.\",\"homeSection6Subhead\":\"Careers\",\"homeSection6Head\":\"Work With Us\",\"homeSection6Des\":\"Work With Us\",\"homeSection6Anchor\":[\"See Openings\",\"http://127.0.0.1:8000/careers.php\"],\"homeSection7Subhead\":\"A Multinational Corporation\",\"homeSection7Head\":\"From being a native Indian to<br> becoming a global leader.\",\"homeSection7Des\":\"In a journey that spans more than three decades, we have progressed<br> from one milestone to another, earning a global reputation.\",\"homeSection8Subhead\":\"LATEST UPDATES\",\"homeSection8Head\":\"In the news\"}', 1, '2021-12-31 22:42:33', '2022-01-10 08:55:24'),
(7, 'suguna-food', 'front.cms.store', NULL, NULL, NULL, NULL, '{\"homeSection2Title1\":\"One Group\",\"homeSection2Title2\":\"One Purpose\",\"homeSection2Title3\":\"One Vision\",\"homeSection2Desciption\":\"Times change. Market evolves. New challenges are born. But what stays constant are our purpose and vision. While our purpose fuels the work we do, our vision navigates us in the pursuit of global nutritional security.&nbsp;\",\"homeSection2EmployeeCount\":\"700+\",\"homeSection2EmployeeText\":\"Employees\",\"homeSection2CountriesCount\":\"04\",\"homeSection2CountriesText\":\"Countries\",\"homeSection2EntitiesCount\":\"07\",\"homeSection2EntitiesText\":\"Employees\",\"homeSection2CroresCount\":\"₹9,700+\",\"homeSection2CroresText\":\"Crores turnover in<br> FY 2020-21\",\"homeSection2LegacyCount\":\"₹9,000\",\"homeSection2LegacyText\":\"Decades of Legacy\",\"homeSection2FarmerCount\":\"40,000+\",\"homeSection2FarmerText\":\"Farmers Benefitted\",\"homeSection3Image\":[\"http://127.0.0.1:8000/front-end/assets/img/contributing.jpg\"],\"homeSection3Title\":\"Contributing to global nutritional security holistically.\",\"homeSection3Des\":\"For a long time, food security had been a major concern around the world. Today, <b>nutritional security</b> has become a crippling health crisis that many parts of the world face. Many people don’t get access to a wide range of foods that promises all the essential nutrients required for an active day. <br>Since nutritional security is influenced by various factors, addressing it takes a holistic approach. For more than three decades, Suguna Group contributes to nutritional security in India and overseas by…\",\"homeSection3list1\":\"Making essential nutrients accessible and affordable to the common people.\",\"homeSection3list2\":\"Addressing malnutrition with various sources of nutrients, and not just proteins.\",\"homeSection3list3\":\"Educating and encouraging young minds to contribute to nutritional security by creating career opportunities in the agro-food industry.\",\"homeSection4Title\":\"Our brands\",\"homeSection4Des\":\"The rings of a global value chain\",\"homeSection5Title\":\"Corporate Social Responsibility\",\"homeSection5Des\":\"Making commitments for a better society.\",\"homeSection6Subhead\":\"Careers\",\"homeSection6Head\":\"Work With Us\",\"homeSection6Des\":\"Work With Us\",\"homeSection6Anchor\":[\"See Openings\",\"http://127.0.0.1:8000/home/careers.php\"],\"homeSection7Subhead\":\"A Multinational Corporation\",\"homeSection7Head\":\"From being a native Indian to<br> becoming a global leader.\",\"homeSection7Des\":\"In a journey that spans more than three decades, we have progressed<br> from one milestone to another, earning a global reputation.\",\"homeSection8Subhead\":\"LATEST UPDATES\",\"homeSection8Head\":\"In the news\"}', '{\"title\":\"Suguna - Home1\",\"descrition\":\"Suguna - Home\",\"keywords\":\"Suguna - Home\"}', '{\"homeSection2Title1\":\"One Group\",\"homeSection2Title2\":\"One Purpose\",\"homeSection2Title3\":\"One Vision\",\"homeSection2Desciption\":\"Times change. Market evolves. New challenges are born. But what stays constant are our purpose and vision. While our purpose fuels the work we do, our vision navigates us in the pursuit of global nutritional security.&nbsp;\",\"homeSection2EmployeeCount\":\"700+\",\"homeSection2EmployeeText\":\"Employees\",\"homeSection2CountriesCount\":\"04\",\"homeSection2CountriesText\":\"Countries\",\"homeSection2EntitiesCount\":\"07\",\"homeSection2EntitiesText\":\"Employees\",\"homeSection2CroresCount\":\"₹9,700+\",\"homeSection2CroresText\":\"Crores turnover in<br> FY 2020-21\",\"homeSection2LegacyCount\":\"₹9,000\",\"homeSection2LegacyText\":\"Decades of Legacy\",\"homeSection2FarmerCount\":\"40,000+\",\"homeSection2FarmerText\":\"Farmers Benefitted\",\"homeSection3Image\":[\"http://127.0.0.1:8000/front-end/assets/img/contributing.jpg\"],\"homeSection3Title\":\"Contributing to global nutritional security holistically.\",\"homeSection3Des\":\"For a long time, food security had been a major concern around the world. Today, <b>nutritional security</b> has become a crippling health crisis that many parts of the world face. Many people don’t get access to a wide range of foods that promises all the essential nutrients required for an active day. <br>Since nutritional security is influenced by various factors, addressing it takes a holistic approach. For more than three decades, Suguna Group contributes to nutritional security in India and overseas by…\",\"homeSection3list1\":\"Making essential nutrients accessible and affordable to the common people.\",\"homeSection3list2\":\"Addressing malnutrition with various sources of nutrients, and not just proteins.\",\"homeSection3list3\":\"Educating and encouraging young minds to contribute to nutritional security by creating career opportunities in the agro-food industry.\",\"homeSection4Title\":\"Our brands\",\"homeSection4Des\":\"The rings of a global value chain\",\"homeSection5Title\":\"Corporate Social Responsibility\",\"homeSection5Des\":\"Making commitments for a better society.\",\"homeSection6Subhead\":\"Careers\",\"homeSection6Head\":\"Work With Us\",\"homeSection6Des\":\"Work With Us\",\"homeSection6Anchor\":[\"See Openings\",\"http://127.0.0.1:8000/careers.php\"],\"homeSection7Subhead\":\"A Multinational Corporation\",\"homeSection7Head\":\"From being a native Indian to<br> becoming a global leader.\",\"homeSection7Des\":\"In a journey that spans more than three decades, we have progressed<br> from one milestone to another, earning a global reputation.\",\"homeSection8Subhead\":\"LATEST UPDATES\",\"homeSection8Head\":\"In the news\"}', 1, '2021-12-31 22:42:33', '2022-01-10 08:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `press_releases`
--

CREATE TABLE `press_releases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_params` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `press_releases`
--

INSERT INTO `press_releases` (`id`, `title`, `alias`, `category`, `meta`, `file`, `extra_params`, `created_at`, `updated_at`) VALUES
(3, 'SHPL Annual Return 2018 to 19', 'shpl-annual-return-2018-to-19', 'Suguna Group', '{\"title\":\"infrastructural-\",\"descrition\":\"dsasdsad\",\"keywords\":\"gfdgfdg\"}', 'press_release/3/Representation_encrypted_-(6).pdf', NULL, '2022-01-08 07:32:13', '2022-01-12 05:33:41'),
(4, 'SHPL Annual Return 2019 to 20', 'shpl-annual-return-2019-to-20', 'Suguna Group', '{\"title\":\"try\",\"descrition\":\"yrt\",\"keywords\":\"ytr\"}', 'press_release/4/SHPL_Annual-Return_2019-20.pdf', NULL, '2022-01-11 01:36:45', '2022-01-12 05:34:38'),
(7, 'Suguna foods annual report FY 2021 to 22', 'suguna-foods-annual-report-fy-2021-to-22', 'Suguna Group', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'press_release/7/PR-Annual-Report.pdf', NULL, '2022-01-12 05:37:41', '2022-01-12 05:37:42'),
(8, 'Suguna foods annual report FY 2021  to 22', 'suguna-foods-annual-report-fy-2021-to-22', 'Suguna Group', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'press_release/8/Empty.pdf', NULL, '2022-01-12 05:41:08', '2022-01-12 05:41:08'),
(9, 'Suguna foods annual report FY 2021 to 22', 'suguna-foods-annual-report-fy-2021-to-22', 'Suguna Foods', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'press_release/9/Empty.pdf', NULL, '2022-01-12 05:41:31', '2022-01-12 05:41:31'),
(10, 'Suguna foods annual report FY 2021 to 22', 'suguna-foods-annual-report-fy-2021-to-22', 'Suguna Foods', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'press_release/10/Empty.pdf', NULL, '2022-01-12 05:42:10', '2022-01-12 05:42:10'),
(11, 'Suguna foods annual report FY 2021 to 22', 'suguna-foods-annual-report-fy-2021-to-22', 'Suguna Foods', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'press_release/11/Empty.pdf', NULL, '2022-01-12 05:42:34', '2022-01-12 05:43:09'),
(12, 'Suguna foods annual report FY 2021 to 22', 'suguna-foods-annual-report-fy-2021-to-22', 'Suguna Foods', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'press_release/12/Empty.pdf', NULL, '2022-01-12 05:42:56', '2022-01-12 05:42:56'),
(13, 'Suguna foods annual report FY 2021 to 22', 'suguna-foods-annual-report-fy-2021-to-22', 'Suguna Group', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'press_release/13/Empty.pdf', NULL, '2022-01-12 05:43:48', '2022-01-12 05:43:48'),
(14, 'Globion annual report FY 2021 to 22', 'globion-annual-report-fy-2021-to-22', 'Globion', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'press_release/14/Empty.pdf', NULL, '2022-01-12 05:44:31', '2022-01-12 05:44:31'),
(15, 'Globion annual report FY 2021 to 22', 'globion-annual-report-fy-2021-to-22', 'Globion', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'press_release/15/Empty.pdf', NULL, '2022-01-12 05:45:03', '2022-01-12 05:45:03'),
(16, 'Globion annual report FY 2021 to 22', 'globion-annual-report-fy-2021-to-22', 'Globion', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'press_release/16/Empty.pdf', NULL, '2022-01-12 05:45:03', '2022-01-12 05:45:03'),
(17, 'Globion annual report FY 2021 to 22', 'globion-annual-report-fy-2021-to-22', 'Globion', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'press_release/17/Empty.pdf', NULL, '2022-01-12 05:45:35', '2022-01-12 05:45:41'),
(18, 'Globion annual report FY 2021 to 22', 'globion-annual-report-fy-2021-to-22', 'Globion', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'press_release/18/Empty.pdf', NULL, '2022-01-12 05:46:45', '2022-01-12 05:46:45'),
(19, 'Globion annual report FY 2021 to 22', 'globion-annual-report-fy-2021-to-22', 'Globion', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'press_release/19/Empty.pdf', NULL, '2022-01-12 05:47:33', '2022-01-12 05:47:33'),
(20, 'Globion annual report FY 2021 to 22', 'globion-annual-report-fy-2021-to-22', 'Globion', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'press_release/20/Empty.pdf', NULL, '2022-01-12 05:49:33', '2022-01-12 05:49:33'),
(21, 'Suguna Dairy annual report FY 2021 to 22', 'suguna-dairy-annual-report-fy-2021-to-22', 'Suguna Dairy', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'press_release/21/Empty.pdf', NULL, '2022-01-12 05:51:18', '2022-01-12 05:51:18'),
(22, 'Suguna Dairy annual report FY 2021 to 22', 'suguna-dairy-annual-report-fy-2021-to-22', 'Suguna Dairy', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'press_release/22/Empty.pdf', NULL, '2022-01-12 05:52:03', '2022-01-12 05:52:11'),
(23, 'Suguna Dairy annual report FY 2021 to 22', 'suguna-dairy-annual-report-fy-2021-to-22', 'Suguna Dairy', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'press_release/23/Empty.pdf', NULL, '2022-01-12 05:52:28', '2022-01-12 05:52:28'),
(24, 'Suguna Dairy annual report FY 2021 to 22', 'suguna-dairy-annual-report-fy-2021-to-22', 'Suguna Group', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'press_release/24/Empty.pdf', NULL, '2022-01-12 05:53:34', '2022-01-12 05:53:34'),
(25, 'Suguna Dairy annual report FY 2021 to 22', 'suguna-dairy-annual-report-fy-2021-to-22', 'Suguna Group', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'press_release/25/Empty.pdf', NULL, '2022-01-12 05:54:50', '2022-01-12 05:54:50'),
(26, 'Suguna Dairy annual report FY 2021 to 22', 'suguna-dairy-annual-report-fy-2021-to-22', 'Suguna Dairy', '{\"title\":null,\"descrition\":null,\"keywords\":null}', 'press_release/26/Empty.pdf', NULL, '2022-01-12 06:01:18', '2022-01-12 06:01:18');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Leilani', 'Block', 'demo@demo.com', '2021-12-16 04:24:33', '$2y$10$2Da/3BLnVyz7SJ8iepg/UO8j3XCmdBgBksCVm6gAiEtX..7/MJYT2', NULL, '2021-12-16 04:24:33', '2021-12-16 04:24:33'),
(2, 'Bonita', 'Kling', 'windler.wilber@example.org', '2021-12-16 04:24:33', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MUGTubfTCO', '2021-12-16 04:24:33', '2021-12-16 04:24:33'),
(3, 'Paxton', 'Mayer', 'lafayette60@example.net', '2021-12-16 04:24:33', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'fcsOtBPV6Z', '2021-12-16 04:24:33', '2021-12-16 04:24:33'),
(4, 'Willis', 'Nikolaus', 'tbeier@example.com', '2021-12-16 04:24:33', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'nZ93raoOGU', '2021-12-16 04:24:34', '2021-12-16 04:24:34'),
(5, 'Justus', 'Kunde', 'pauline.johnston@example.org', '2021-12-16 04:24:33', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'isiF1Xpabd', '2021-12-16 04:24:34', '2021-12-16 04:24:34'),
(6, 'Dandre', 'Rempel', 'aubrey29@example.org', '2021-12-16 04:24:33', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2SzWUBAMQ5', '2021-12-16 04:24:34', '2021-12-16 04:24:34'),
(7, 'Henriette', 'Stark', 'linnea.wilkinson@example.org', '2021-12-16 04:24:33', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'sdcixAJfMR', '2021-12-16 04:24:34', '2021-12-16 04:24:34'),
(8, 'Jakob', 'Moen', 'kristin22@example.net', '2021-12-16 04:24:33', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NOuGsksTTT', '2021-12-16 04:24:34', '2021-12-16 04:24:34'),
(9, 'Luciano', 'Metz', 'reuben.wiza@example.org', '2021-12-16 04:24:33', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MLcrkxhdnv', '2021-12-16 04:24:34', '2021-12-16 04:24:34'),
(10, 'Christelle', 'Ullrich', 'ayden.nicolas@example.net', '2021-12-16 04:24:33', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'LnPVdbj2QV', '2021-12-16 04:24:34', '2021-12-16 04:24:34'),
(11, 'Osborne', 'Wilderman', 'strosin.waylon@example.com', '2021-12-16 04:24:33', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'rVfE3KDVqR', '2021-12-16 04:24:34', '2021-12-16 04:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_infos`
--

CREATE TABLE `user_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `communication` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marketing` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user_infos`
--

INSERT INTO `user_infos` (`id`, `user_id`, `avatar`, `company`, `phone`, `website`, `country`, `language`, `timezone`, `currency`, `communication`, `marketing`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Labadie, O\'Keefe and Leffler', '+1.401.324.3228', 'https://christiansen.com/nemo-sed-nesciunt-minima-aliquid-quia-ea.html', 'ES', 'sk', 'Alaska', NULL, 'a:2:{s:5:\"email\";s:1:\"0\";s:5:\"phone\";s:1:\"0\";}', 0, '2021-12-16 04:24:33', '2021-12-16 04:53:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `csr`
--
ALTER TABLE `csr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entities`
--
ALTER TABLE `entities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `media_resources`
--
ALTER TABLE `media_resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `press_releases`
--
ALTER TABLE `press_releases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `settings_key_index` (`key`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_infos`
--
ALTER TABLE `user_infos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `csr`
--
ALTER TABLE `csr`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `entities`
--
ALTER TABLE `entities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `media_resources`
--
ALTER TABLE `media_resources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `press_releases`
--
ALTER TABLE `press_releases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user_infos`
--
ALTER TABLE `user_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
