-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 16, 2023 at 02:33 AM
-- Server version: 5.7.41-0ubuntu0.18.04.1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shameer_laravel_baby_ama_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `appoinments`
--

CREATE TABLE `appoinments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `doctor_id` int(11) NOT NULL DEFAULT '0',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialists` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appoinment_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appoinment_session` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `appoinments`
--

INSERT INTO `appoinments` (`id`, `user_id`, `doctor_id`, `first_name`, `last_name`, `specialists`, `appoinment_date`, `appoinment_session`, `father_phone`, `mother_phone`, `phone`, `otp`, `created_at`, `updated_at`) VALUES
(1, 3, 0, 'Sembian', 'paediatrician', 'General Paediatric', '2023-04-06', 'evening', NULL, NULL, NULL, '1234', '2023-03-04 12:23:25', '2023-03-04 12:23:25'),
(2, 4, 0, 'Bava', NULL, 'paedodonist', '2023-03-06', 'afternoon', NULL, NULL, NULL, '1234', '2023-03-04 12:34:11', '2023-03-04 12:34:11'),
(3, 4, 0, 'Vijay', NULL, 'General Paediatric', '2023-01-06', 'afternoon', NULL, NULL, NULL, '1234', '2023-03-04 12:34:11', '2023-03-04 12:34:11'),
(4, 3, 0, 'Bharath', NULL, 'paedodonist', '2023-01-06', 'afternoon', NULL, NULL, NULL, '1234', '2023-03-04 12:34:11', '2023-03-04 12:34:11'),
(5, 3, 0, 'Bava', NULL, 'physiotherapist', '2023-03-08', 'afternoon', NULL, NULL, NULL, '9828', '2023-03-05 12:59:56', '2023-03-05 12:59:56');

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
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dosage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_per_item` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instruction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_params` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `name`, `type`, `dosage`, `stock`, `price_per_item`, `instruction`, `caution`, `extra_params`, `created_at`, `updated_at`) VALUES
(1, 'PARACITOMAL', 'tablet', '350 MG', '500', '1', NULL, NULL, NULL, NULL, NULL),
(2, 'CLIO', 'syrup', '100 ML', '100', '36', NULL, NULL, NULL, NULL, NULL),
(3, 'FFFF', 'drops', '5 ML', '100', '36', NULL, NULL, NULL, NULL, NULL);

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
(7, '2023_02_25_182756_create_patients_table', 1),
(9, '2023_03_04_174609_create_appoinments_table', 2),
(12, '2023_03_05_190632_create_prescriptions_table', 3),
(13, '2023_03_05_190638_create_medicines_table', 3),
(14, '2023_03_11_201039_create_prescription_medicines_table', 3),
(15, '2023_03_11_203125_create_pediatric_forms_table', 4),
(16, '2023_03_11_204047_create_patient_pediatric_forms_table', 4),
(17, '2023_03_15_202121_create_patient_vaccination_forms_table', 5);

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

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4);

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
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `umr_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `father_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_o_b` date DEFAULT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `extra_params` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `user_id`, `umr_no`, `first_name`, `last_name`, `father_name`, `mother_name`, `address`, `father_phone`, `mother_phone`, `email`, `gender`, `phone`, `d_o_b`, `blood_group`, `weight`, `height`, `status`, `extra_params`, `created_at`, `updated_at`) VALUES
(1, 3, '112122', 'Bava', 'Shiek', 'Thameem Nasari', 'Megraj Begum', 'North strtt old anaykudi palan 6245613', '9626874643', '9025444360', 'bavamca@gmail.com', 'Male', NULL, '2023-03-01', 'A+', '10', '56', 1, NULL, '2023-03-04 18:57:11', '2023-03-04 18:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `patient_pediatric_forms`
--

CREATE TABLE `patient_pediatric_forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `patient_id` int(11) NOT NULL DEFAULT '0',
  `pediatric_form_id` int(11) NOT NULL DEFAULT '0',
  `answer` longtext COLLATE utf8mb4_unicode_ci,
  `options` text COLLATE utf8mb4_unicode_ci,
  `is_checked` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `patient_pediatric_forms`
--

INSERT INTO `patient_pediatric_forms` (`id`, `user_id`, `patient_id`, `pediatric_form_id`, `answer`, `options`, `is_checked`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 0, '{\"chief_complaints\":\"COMPLAINTS\",\"h_o_pi\":\"jhjkhkhkj\",\"antenatal_h_o\":\"jhhjghjghjg\",\"natal_h_o\":\"joioio\",\"post_natal_h_o\":\"kkkk\",\"treatment_h_o\":\"ooooooooooo\",\"development_h_o\":\"54545\",\"nutrition_h_o\":\"iiiiiiiiiiiiii\",\"immunization_h_o\":\"khjkhjk\",\"family_h_o\":\"ppo9099\",\"summary\":\"099089080\",\"gen_examination\":[\"Alert\",\"Awake\",\"Afebrile\",\"Pallor \\/ Cyanosis \\/ Clubbing \\/ Icterus \\/ Edema\",\"Generalised Lymphadenopathy\"],\"food_examination_head\":\"jkhjkh\",\"food_examination_eyes\":\"jh\",\"food_examination_end\":\"jj\",\"food_examination_extremities\":\"jh\",\"food_examination_spine\":\"j\",\"food_examination_genitals\":\"j\",\"vitals_hr\":\"12\",\"vitals_rr\":\"13\",\"vitals_bb\":\"14\",\"anthrapometry_wt\":\"56\",\"anthrapometry_ht\":\"55\",\"anthrapometry_hc\":\"54\",\"systemic_examination_cvs\":\"77\",\"systemic_examination_rs\":\"77\",\"systemic_examination_pa\":\"99\",\"systemic_examination_cns\":\"88\",\"diagnosis\":\"TEST  FROM BAVA\",\"management\":\"nbbmbhbhkTEST  FROM BAVA\",\"follow_up_advice\":\"TEST  FROM BAVA\",\"gross_motor_head_control\":\"on\",\"gross_motor_head_control_dq\":null,\"gross_motor_rollover\":\"on\",\"gross_motor_rollover_dq\":\"20\",\"gross_motor_sits_with_support\":\"on\",\"gross_motor_sits_with_support_dq\":null,\"gross_motor_sits_with_out_support_dq\":null,\"gross_motor_stands_c_support_dq\":null,\"gross_motor_creeps_crawl_dq\":null,\"gross_motor_walk_alone_dq\":null,\"gross_motor_run_dq\":null,\"gross_motor_walk_up_and_down_stairs_dq\":null,\"gross_motor_2_feat_step_dq\":null,\"gross_motor_jump_dq\":null,\"gross_motor_hops_dq\":null,\"finr_motor_bidextrous_reach_dq\":null,\"finr_motor_unidextrous_reach_dq\":null,\"finr_motor_immature_pincer_grasp_dq\":null,\"finr_motor_mature_grasp_dq\":null,\"finr_motor_scribbling_tower_2_blocks_dq\":null,\"finr_motor_scribble_tower_3_blocks_dq\":null,\"finr_motor_tower_6_blocks_dq\":null,\"finr_motor_tower_9_blocks_copies_circle_dq\":null,\"finr_motor_copies_cross_bridge_c_blocks_dq\":null,\"finr_motor_copies_triangle_gate_c_blocks_dq\":null,\"social_adaptive_strainger_anxiety\":\"on\",\"language_milestone_alerts_to_sound_dq\":null,\"language_milestone_coos_dq\":null,\"language_milestone_laugh_loud_dq\":null,\"language_milestone_monosyllables_dq\":null,\"language_milestone_bisyllables_dq\":null,\"language_milestone_1_2_word_with_meaning_dq\":null,\"language_milestone_8_10_vocabulary_dq\":null,\"language_milestone_2_3_word_sentence_dq\":null,\"language_milestone_ask_questions\":\"on\",\"language_milestone_ask_questions_dq\":null,\"language_milestone_song_poem_tell_storys\":\"on\",\"language_milestone_song_poem_tell_storys_dq\":null,\"language_milestone_ask_meaning\":\"on\",\"language_milestone_ask_meaning_dq\":null}', NULL, '0', '2023-03-13 21:06:16', '2023-03-15 14:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `patient_vaccination_forms`
--

CREATE TABLE `patient_vaccination_forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `patient_id` int(11) NOT NULL DEFAULT '0',
  `doctor_id` int(11) NOT NULL DEFAULT '0',
  `vaccination_form_id` int(11) NOT NULL DEFAULT '0',
  `answer` longtext COLLATE utf8mb4_unicode_ci,
  `options` text COLLATE utf8mb4_unicode_ci,
  `is_checked` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `patient_vaccination_forms`
--

INSERT INTO `patient_vaccination_forms` (`id`, `user_id`, `patient_id`, `doctor_id`, `vaccination_form_id`, `answer`, `options`, `is_checked`, `created_at`, `updated_at`) VALUES
(2, 0, 1, 0, 0, '{\"vaccination_birth\":[\"BCG\",\"OPV\",\"IPV- 1,Hib- 1\"],\"vaccination_birth_date\":\"2023-03-10\",\"vaccination_week_6_date\":null,\"vaccination_week_10_date\":null,\"vaccination_week_14_date\":null,\"vaccination_month_6\":[\"Influenza (IIV)-1\"],\"vaccination_month_6_date\":\"2023-03-27\",\"vaccination_month_7_date\":null}', NULL, '0', '2023-03-15 15:15:38', '2023-03-15 15:29:46');

-- --------------------------------------------------------

--
-- Table structure for table `pediatric_forms`
--

CREATE TABLE `pediatric_forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `main_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `options` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `ordering` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `pediatric_forms`
--

INSERT INTO `pediatric_forms` (`id`, `main_title`, `title`, `description`, `prefix`, `type`, `options`, `status`, `ordering`, `created_at`, `updated_at`) VALUES
(1, 'CHEIF COMPLAINTS', 'CHEIF COMPLAINTS', NULL, 'section1', 'textbox', NULL, 1, 1, NULL, NULL),
(2, 'H/O PI', 'H/O PI', NULL, 'section1', 'textbox', NULL, 1, 2, NULL, NULL),
(3, 'ANTENATAL H/O', 'ANTENATAL H/O', NULL, 'section1', 'textbox', NULL, 1, 3, NULL, NULL),
(4, 'NATAL H/O', 'NATAL H/O', NULL, 'section1', 'textbox', NULL, 1, 4, NULL, NULL),
(5, 'POST NATAL H/O', 'POST NATAL H/O', NULL, 'section1', 'textbox', NULL, 1, 5, NULL, NULL),
(6, 'TREATMENT H/O', 'TREATMENT H/O', NULL, 'section1', 'textbox', NULL, 1, 6, NULL, NULL),
(7, 'DEVELOPMENT H/O', 'DEVELOPMENT H/O', NULL, 'section1', 'textbox', NULL, 1, 7, NULL, NULL),
(8, 'NUTRITION H/O', 'NUTRITION H/O', NULL, 'section1', 'textbox', NULL, 1, 8, NULL, NULL),
(9, 'IMMUNIZATION H/O', 'IMMUNIZATION H/O', NULL, 'section1', 'textbox', NULL, 1, 9, NULL, NULL),
(10, 'FAMILY H/O', 'FAMILY H/O', NULL, 'section1', 'textbox', NULL, 1, 10, NULL, NULL),
(11, 'SUMMARY', 'SUMMARY', NULL, 'section1', 'textbox', NULL, 1, 11, NULL, NULL),
(12, 'GEN. EXAMINATION', 'Alert', NULL, 'section2', 'select', '[\"Alert\",\"Awake\",\"Afebrile\",\"Pallor \\/ Cyanosis \\/ Clubbing \\/ Icterus \\/ Edema\",\"Generalised Lymphadenopathy\"]', 1, 11, NULL, NULL),
(13, 'GEN. EXAMINATION', 'Awake', NULL, 'section2', 'select', '[\"Alert\",\"Awake\",\"Afebrile\",\"Pallor \\/ Cyanosis \\/ Clubbing \\/ Icterus \\/ Edema\",\"Generalised Lymphadenopathy\"]', 1, 12, NULL, NULL),
(14, 'GEN. EXAMINATION', 'Afebrile', NULL, 'section2', 'select', '[\"Alert\",\"Awake\",\"Afebrile\",\"Pallor \\/ Cyanosis \\/ Clubbing \\/ Icterus \\/ Edema\",\"Generalised Lymphadenopathy\"]', 1, 13, NULL, NULL),
(15, 'GEN. EXAMINATION', 'Pallor / Cyanosis / Clubbing / Icterus / Edema', NULL, 'section2', 'select', '[\"Alert\",\"Awake\",\"Afebrile\",\"Pallor \\/ Cyanosis \\/ Clubbing \\/ Icterus \\/ Edema\",\"Generalised Lymphadenopathy\"]', 1, 14, NULL, NULL),
(16, 'GEN. EXAMINATION', 'Generalised Lymphadenopathy', NULL, 'section2', 'select', '[\"Alert\",\"Awake\",\"Afebrile\",\"Pallor \\/ Cyanosis \\/ Clubbing \\/ Icterus \\/ Edema\",\"Generalised Lymphadenopathy\"]', 1, 15, NULL, NULL);

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
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `patient_id` int(11) NOT NULL DEFAULT '0',
  `doctor_id` int(11) NOT NULL DEFAULT '0',
  `medicine_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instruction` text COLLATE utf8mb4_unicode_ci,
  `diagnosis` text COLLATE utf8mb4_unicode_ci,
  `advice` text COLLATE utf8mb4_unicode_ci,
  `extra_params` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `prescription_medicines`
--

CREATE TABLE `prescription_medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prescription_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `medicine_id` int(11) NOT NULL DEFAULT '0',
  `dosage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intake_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timing_when` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timing_how` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

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

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'web', '2023-02-28 10:52:50', '2023-02-28 10:52:50'),
(2, 'admin', 'web', '2023-02-28 10:52:50', '2023-02-28 10:52:50'),
(3, 'pharmacy', 'web', '2023-02-28 10:52:50', '2023-02-28 10:52:50'),
(4, 'doctor', 'web', '2023-02-28 10:52:50', '2023-02-28 10:52:50'),
(5, 'patient', 'web', '2023-02-28 10:52:50', '2023-02-28 10:52:50');

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
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jacky', 'Hagenes', 'demo@demo.com', '2023-02-28 10:52:50', '$2y$10$87k1CIo7gE1eovItlS0wkOmaesVyDFDBtlTg9jLUIF9GMqep0NBPm', NULL, '2023-02-28 10:52:50', '2023-02-28 10:52:50'),
(2, 'Doctor', '12', 'doctor1@gmail.com', NULL, NULL, NULL, '2023-02-28 11:02:45', '2023-02-28 11:23:56'),
(3, 'we', 'wewe', 'wewe@sds.fddf', NULL, NULL, NULL, '2023-02-28 11:09:46', '2023-02-28 11:09:46'),
(4, 'asas', 'asas', 'asas@jhdsd.sdsd', NULL, NULL, NULL, '2023-02-28 11:11:25', '2023-02-28 11:11:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_infos`
--

CREATE TABLE `user_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp_verified_at` datetime DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialist_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_params` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user_infos`
--

INSERT INTO `user_infos` (`id`, `user_id`, `avatar`, `company`, `phone`, `otp`, `otp_verified_at`, `website`, `country`, `language`, `timezone`, `specialist_type`, `extra_params`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Johnson Group', '1234567890', NULL, NULL, 'http://pouros.com/aut-dolores-expedita-in-aperiam', 'EE', 'lu', NULL, NULL, NULL, '2023-02-28 10:52:50', '2023-02-28 10:52:50'),
(2, 2, NULL, NULL, '9025444360', NULL, NULL, NULL, NULL, NULL, NULL, '[\"gynaecologist\",\"cardiologist\",\"massage-therapist\"]', NULL, '2023-02-28 11:02:45', '2023-02-28 11:14:09'),
(3, 3, NULL, NULL, '3232333333', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-28 11:09:46', '2023-02-28 11:09:46'),
(4, 4, NULL, NULL, '3433444444', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-28 11:11:25', '2023-02-28 11:11:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appoinments`
--
ALTER TABLE `appoinments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_pediatric_forms`
--
ALTER TABLE `patient_pediatric_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_vaccination_forms`
--
ALTER TABLE `patient_vaccination_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pediatric_forms`
--
ALTER TABLE `pediatric_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription_medicines`
--
ALTER TABLE `prescription_medicines`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_infos_phone_unique` (`phone`),
  ADD KEY `user_infos_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appoinments`
--
ALTER TABLE `appoinments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient_pediatric_forms`
--
ALTER TABLE `patient_pediatric_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient_vaccination_forms`
--
ALTER TABLE `patient_vaccination_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pediatric_forms`
--
ALTER TABLE `pediatric_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescription_medicines`
--
ALTER TABLE `prescription_medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_infos`
--
ALTER TABLE `user_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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

--
-- Constraints for table `user_infos`
--
ALTER TABLE `user_infos`
  ADD CONSTRAINT `user_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
