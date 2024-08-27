-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: db:3306
-- Время создания: Авг 27 2024 г., 17:11
-- Версия сервера: 8.0.36
-- Версия PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `home`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'category1', NULL, NULL, NULL),
(2, 'category2', NULL, NULL, NULL),
(3, 'category3', 1, NULL, NULL),
(4, 'category4', 2, NULL, NULL),
(5, 'category5', 1, NULL, NULL),
(6, 'category6', 2, NULL, NULL),
(7, 'category7', 3, NULL, NULL),
(8, 'category8', 4, NULL, NULL),
(9, 'category9', 3, NULL, NULL),
(10, 'category10', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_08_07_082233_create_categories_table', 1),
(6, '2024_08_08_084030_create_products_table', 1),
(7, '2024_08_08_095822_create_properties_table', 1),
(8, '2024_08_09_084019_create_orders_table', 1),
(9, '2024_08_09_090916_create_order_product_table', 1),
(10, '2024_08_12_095423_add_column_role_to_users_table', 1),
(13, '2024_08_27_103225_add_column_api_id_to_orders_table', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
  `api_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summa` double DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `api_id`, `email`, `phone`, `summa`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, NULL, 'albert.marvin@example.org', '', 210, 0, '2024-08-19 06:20:43', '2024-08-19 06:20:44'),
(2, 13, NULL, 'bcummings@example.org', '', 337, 0, '2024-08-19 06:20:43', '2024-08-19 06:20:44'),
(3, 10, NULL, 'bartell.raheem@example.com', '', 745, 1, '2024-08-19 06:20:43', '2024-08-19 06:20:44'),
(4, 11, NULL, 'renner.amalia@example.com', '', 614, 1, '2024-08-19 06:20:43', '2024-08-19 06:20:44'),
(5, 13, NULL, 'bcummings@example.org', '', 246, 1, '2024-08-19 06:20:44', '2024-08-19 06:20:45'),
(6, 13, NULL, 'bcummings@example.org', '', 326, 1, '2024-08-19 06:20:44', '2024-08-19 06:20:45'),
(7, 16, NULL, 'elody88@example.com', '', 458, 1, '2024-08-19 06:20:44', '2024-08-19 06:20:45'),
(8, 2, NULL, 'raquel67@example.net', '', 166, 1, '2024-08-19 06:20:44', '2024-08-19 06:20:45'),
(9, 18, NULL, 'rubie49@example.org', '', 389, 1, '2024-08-19 06:20:44', '2024-08-19 06:20:45'),
(10, 6, NULL, 'cleta54@example.org', '', 556, 0, '2024-08-19 06:20:44', '2024-08-19 06:20:45'),
(20, 24, NULL, 'asd@org.com', '123123123', 418, 1, '2024-08-26 08:38:13', '2024-08-26 08:45:31'),
(21, 24, NULL, 'asd@org.com', '123123123', 199, 1, '2024-08-26 09:11:00', '2024-08-26 09:18:21'),
(22, 24, NULL, 'asd@org.com', '123123123', 118, 1, '2024-08-26 09:18:42', '2024-08-26 09:19:02'),
(23, 25, NULL, 'zxc@org.com', '123123123', 278, 1, '2024-08-26 15:07:58', '2024-08-26 15:09:00'),
(24, 23, NULL, 'qwe@org.com', '123123123', 110, 1, '2024-08-27 06:25:50', '2024-08-27 06:26:29');

-- --------------------------------------------------------

--
-- Структура таблицы `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `count` int NOT NULL,
  `price` double NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `count`, `price`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 2, 76, '8', '2024-08-19 06:20:44', '2024-08-19 06:20:44'),
(2, 1, 27, 2, 10, '3', '2024-08-19 06:20:44', '2024-08-19 06:20:44'),
(3, 1, 30, 1, 38, '3', '2024-08-19 06:20:44', '2024-08-19 06:20:44'),
(4, 2, 8, 4, 55, '4', '2024-08-19 06:20:44', '2024-08-19 06:20:44'),
(5, 2, 16, 1, 82, '7', '2024-08-19 06:20:44', '2024-08-19 06:20:44'),
(6, 2, 17, 1, 35, '5', '2024-08-19 06:20:44', '2024-08-19 06:20:44'),
(7, 3, 16, 5, 82, '7', '2024-08-19 06:20:44', '2024-08-19 06:20:44'),
(8, 3, 21, 4, 60, '10', '2024-08-19 06:20:44', '2024-08-19 06:20:44'),
(9, 3, 22, 1, 95, '6', '2024-08-19 06:20:44', '2024-08-19 06:20:44'),
(10, 4, 3, 4, 44, '8', '2024-08-19 06:20:44', '2024-08-19 06:20:44'),
(11, 4, 10, 2, 39, '8', '2024-08-19 06:20:44', '2024-08-19 06:20:44'),
(12, 4, 23, 5, 72, '5', '2024-08-19 06:20:44', '2024-08-19 06:20:44'),
(13, 5, 5, 3, 13, '8', '2024-08-19 06:20:44', '2024-08-19 06:20:44'),
(14, 5, 8, 1, 55, '4', '2024-08-19 06:20:45', '2024-08-19 06:20:45'),
(15, 5, 9, 2, 76, '8', '2024-08-19 06:20:45', '2024-08-19 06:20:45'),
(16, 6, 1, 2, 42, '7', '2024-08-19 06:20:45', '2024-08-19 06:20:45'),
(17, 6, 25, 3, 64, '3', '2024-08-19 06:20:45', '2024-08-19 06:20:45'),
(18, 6, 27, 5, 10, '3', '2024-08-19 06:20:45', '2024-08-19 06:20:45'),
(19, 7, 11, 5, 22, '3', '2024-08-19 06:20:45', '2024-08-19 06:20:45'),
(20, 7, 19, 4, 57, '10', '2024-08-19 06:20:45', '2024-08-19 06:20:45'),
(21, 7, 29, 5, 24, '3', '2024-08-19 06:20:45', '2024-08-19 06:20:45'),
(22, 8, 11, 3, 22, '3', '2024-08-19 06:20:45', '2024-08-19 06:20:45'),
(23, 8, 20, 2, 40, '3', '2024-08-19 06:20:45', '2024-08-19 06:20:45'),
(24, 8, 27, 2, 10, '3', '2024-08-19 06:20:45', '2024-08-19 06:20:45'),
(25, 9, 7, 3, 53, '10', '2024-08-19 06:20:45', '2024-08-19 06:20:45'),
(26, 9, 20, 5, 40, '3', '2024-08-19 06:20:45', '2024-08-19 06:20:45'),
(27, 9, 27, 3, 10, '3', '2024-08-19 06:20:45', '2024-08-19 06:20:45'),
(28, 10, 6, 3, 98, '4', '2024-08-19 06:20:45', '2024-08-19 06:20:45'),
(29, 10, 8, 2, 55, '4', '2024-08-19 06:20:45', '2024-08-19 06:20:45'),
(30, 10, 30, 4, 38, '3', '2024-08-19 06:20:45', '2024-08-19 06:20:45'),
(48, 20, 8, 2, 55, '4', '2024-08-26 08:39:26', '2024-08-26 08:39:28'),
(49, 20, 9, 2, 76, '8', '2024-08-26 08:39:32', '2024-08-26 08:39:34'),
(50, 20, 2, 2, 78, '6', '2024-08-26 08:39:38', '2024-08-26 08:39:40'),
(51, 21, 3, 1, 44, '8', '2024-08-26 09:11:00', '2024-08-26 09:11:00'),
(52, 21, 5, 2, 13, '8', '2024-08-26 09:11:08', '2024-08-26 09:12:39'),
(53, 21, 7, 1, 53, '10', '2024-08-26 09:13:08', '2024-08-26 09:13:08'),
(54, 21, 9, 1, 76, '8', '2024-08-26 09:13:55', '2024-08-26 09:13:55'),
(55, 22, 1, 1, 42, '7', '2024-08-26 09:18:42', '2024-08-26 09:18:42'),
(56, 22, 9, 1, 76, '8', '2024-08-26 09:18:47', '2024-08-26 09:18:47'),
(57, 23, 1, 2, 42, '7', '2024-08-26 15:07:59', '2024-08-26 15:08:05'),
(58, 23, 3, 2, 44, '8', '2024-08-26 15:08:12', '2024-08-26 15:08:14'),
(60, 23, 7, 2, 53, '10', '2024-08-26 15:08:24', '2024-08-26 15:08:26'),
(61, 24, 8, 2, 55, '4', '2024-08-27 06:25:50', '2024-08-27 06:26:13'),
(62, 25, 8, 1, 55, '4', '2024-08-27 07:49:37', '2024-08-27 07:49:37'),
(63, 26, 8, 1, 55, '4', '2024-08-27 07:57:48', '2024-08-27 07:57:48'),
(64, 27, 8, 2, 55, '4', '2024-08-27 08:00:55', '2024-08-27 08:05:34'),
(65, 28, 8, 1, 55, '4', '2024-08-27 08:04:15', '2024-08-27 08:04:15'),
(66, 29, 8, 1, 55, '4', '2024-08-27 08:04:57', '2024-08-27 08:04:57'),
(67, 30, 8, 1, 55, '4', '2024-08-27 08:08:12', '2024-08-27 08:08:12'),
(68, 31, 8, 1, 55, '4', '2024-08-27 08:09:02', '2024-08-27 08:09:02');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptions` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `count` int NOT NULL DEFAULT '0',
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `descriptions`, `slug`, `price`, `count`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Erik Robel', 'Distinctio amet voluptatem ea eum voluptas facere. Numquam rerum nulla fugiat quo in. In voluptatem est aliquam a ea alias.', 'erik-robel', 42, 30, 7, '2024-08-19 06:20:41', '2024-08-19 06:20:41'),
(2, 'Rebecca Russel', 'Et quos magnam earum voluptas nam excepturi. Et laudantium est iure. Sunt provident tempora esse quod.', 'rebecca-russel', 78, 38, 6, '2024-08-19 06:20:41', '2024-08-19 06:20:41'),
(3, 'Johnpaul Halvorson IV', 'Beatae ut quod modi quia quis atque hic. Eveniet optio magnam tenetur dolor nulla quis.', 'johnpaul-halvorson-iv', 44, 45, 8, '2024-08-19 06:20:41', '2024-08-19 06:20:41'),
(4, 'Dr. Forest Heathcote DVM', 'Deserunt aspernatur omnis pariatur eos aut. Cupiditate quae error provident a. Distinctio tempora nam voluptas animi. Iure corporis laudantium quis omnis repellat asperiores.', 'dr-forest-heathcote-dvm', 93, 22, 5, '2024-08-19 06:20:41', '2024-08-19 06:20:41'),
(5, 'Summer Gaylord', 'Doloribus a ex vitae. Rerum facilis quia totam exercitationem quod fuga. Sequi adipisci dolorem totam et sint. Libero autem rem quas illum. Sint illo eius similique doloribus debitis iusto.', 'summer-gaylord', 13, 14, 8, '2024-08-19 06:20:41', '2024-08-19 06:20:41'),
(6, 'Lorna Parker', 'Cumque quos facere ut et non. Accusantium non nam vel praesentium assumenda. Soluta eveniet mollitia laudantium non quibusdam et.', 'lorna-parker', 98, 23, 4, '2024-08-19 06:20:42', '2024-08-19 06:20:42'),
(7, 'Prof. Wilhelm Harris V', 'Enim quis quis illum harum voluptatibus velit. Inventore voluptatem odit ducimus rerum dolorem. Et sed quo adipisci ratione voluptate.', 'prof-wilhelm-harris-v', 53, 23, 10, '2024-08-19 06:20:42', '2024-08-19 06:20:42'),
(8, 'Therese Smitham', 'Est sed rerum harum quis minima. At sequi et consequatur cupiditate dicta molestiae veniam cum. Minus assumenda nihil molestiae id. Aut sed quis libero suscipit quia voluptatem.', 'therese-smitham', 55, 19, 4, '2024-08-19 06:20:42', '2024-08-19 06:20:42'),
(9, 'Pinkie Hessel', 'Id id molestias voluptates voluptas veniam aut. Aut debitis deleniti quia vel et. Est rerum et qui vel. Voluptate odio omnis quaerat.', 'pinkie-hessel', 76, 31, 8, '2024-08-19 06:20:42', '2024-08-19 06:20:42'),
(10, 'Itzel Koch IV', 'Et provident dolor dolor dolorum. Debitis voluptates quidem ea soluta temporibus. Facilis accusamus nulla consequatur.', 'itzel-koch-iv', 39, 48, 8, '2024-08-19 06:20:42', '2024-08-19 06:20:42'),
(11, 'Dr. Salvatore Bins', 'Quo dolore ut eos a quis. Voluptatem sint et numquam recusandae adipisci non. Libero maxime eum provident aut nobis quia quia. Praesentium sint dolores quidem est libero temporibus.', 'dr-salvatore-bins', 22, 48, 3, '2024-08-19 06:20:42', '2024-08-19 06:20:42'),
(12, 'Gerson Jenkins', 'Voluptatem beatae quia dolore necessitatibus commodi sit iusto qui. Sit dolorum atque doloribus aut. Id similique velit consequuntur sunt unde rerum.', 'gerson-jenkins', 41, 21, 4, '2024-08-19 06:20:42', '2024-08-19 06:20:42'),
(13, 'Ms. Ruth Littel DDS', 'Minima eius saepe sint voluptatem. Saepe amet eveniet officia sit vel. Qui velit ipsam dignissimos pariatur et ea vel. Et et error in fugiat qui ea.', 'ms-ruth-littel-dds', 37, 49, 5, '2024-08-19 06:20:42', '2024-08-19 06:20:42'),
(14, 'Joshua Schuppe IV', 'Hic hic similique ducimus. Qui ad ut nihil ipsam perspiciatis facilis. Repudiandae ab consequatur quis sed soluta dolore facere optio. Fuga eveniet fugiat et quisquam.', 'joshua-schuppe-iv', 64, 15, 7, '2024-08-19 06:20:42', '2024-08-19 06:20:42'),
(15, 'Marta Trantow', 'Sit et et quod vel temporibus sit excepturi. Dolorum molestiae delectus natus. Numquam autem quia sit aut sunt.', 'marta-trantow', 89, 11, 9, '2024-08-19 06:20:42', '2024-08-19 06:20:42'),
(16, 'Prof. Yvette Hansen', 'Consectetur eligendi ipsam voluptatem possimus ut cumque ipsam. Ut molestiae est porro tempore. Ab quia vel quam.', 'prof-yvette-hansen', 82, 48, 7, '2024-08-19 06:20:42', '2024-08-19 06:20:42'),
(17, 'Dr. Keegan Daniel', 'Assumenda eum suscipit molestias blanditiis aliquam ut id. Quo dolore delectus eveniet nulla et.', 'dr-keegan-daniel', 35, 19, 5, '2024-08-19 06:20:42', '2024-08-19 06:20:42'),
(18, 'Mr. Stewart Murazik', 'Officiis quia id blanditiis quam totam. Aut dolorem repellendus iure maiores quos aspernatur quae. Labore laborum delectus dolor sint. Quis quasi qui nostrum animi voluptatem porro.', 'mr-stewart-murazik', 43, 24, 7, '2024-08-19 06:20:42', '2024-08-19 06:20:42'),
(19, 'Dr. Abbey Roob IV', 'Aut impedit sint rerum velit. Deserunt delectus magnam qui expedita. Nihil molestiae magni similique maiores.', 'dr-abbey-roob-iv', 57, 9, 10, '2024-08-19 06:20:42', '2024-08-19 06:20:42'),
(20, 'Marquis Thompson', 'Saepe aliquam distinctio magni nisi esse. Sed corrupti sit ut sapiente commodi. Eum sed perferendis cum necessitatibus sunt. Dolorum et est consequatur voluptatum nihil ea.', 'marquis-thompson', 40, 15, 3, '2024-08-19 06:20:43', '2024-08-19 06:20:43'),
(21, 'Miss Laila Lowe III', 'Temporibus est eos et amet quam cupiditate ut. Molestias est atque quasi aut. Earum eum nihil autem veniam laudantium eum. Eos animi aut ut optio ut veniam eum.', 'miss-laila-lowe-iii', 60, 8, 10, '2024-08-19 06:20:43', '2024-08-19 06:20:43'),
(22, 'Dr. Chadd Wisozk PhD', 'Ut perferendis magnam repudiandae facere reiciendis. Porro possimus cum ipsam et qui iusto sint harum. Nihil et dolore eum. Non assumenda optio est quis consectetur eos.', 'dr-chadd-wisozk-phd', 95, 10, 6, '2024-08-19 06:20:43', '2024-08-19 06:20:43'),
(23, 'Alayna Beahan', 'Consectetur quas enim blanditiis est ut quia et. Aut molestias rerum repellendus qui impedit. Aspernatur et sit ullam quibusdam. Architecto quas culpa fugiat consequatur.', 'alayna-beahan', 72, 13, 5, '2024-08-19 06:20:43', '2024-08-19 06:20:43'),
(24, 'Prof. Britney Stanton III', 'Illo dolor modi voluptas tenetur harum. Ipsam aut maiores placeat minima. Quia dignissimos est est.', 'prof-britney-stanton-iii', 85, 21, 8, '2024-08-19 06:20:43', '2024-08-19 06:20:43'),
(25, 'Prof. Janiya Ziemann I', 'Fugit et sit corporis nobis fugiat repudiandae accusamus. Quae perspiciatis tempora libero veritatis et minus soluta. Officia magni tenetur rerum illo tempora.', 'prof-janiya-ziemann-i', 64, 27, 3, '2024-08-19 06:20:43', '2024-08-19 06:20:43'),
(26, 'Dr. Nora Reinger', 'Suscipit veniam libero nostrum laboriosam dolorum ut. Dicta sit quas atque veniam est consequatur et molestiae. Aliquid consequatur velit est explicabo quo eos et.', 'dr-nora-reinger', 60, 11, 3, '2024-08-19 06:20:43', '2024-08-19 06:20:43'),
(27, 'Keenan Quitzon', 'Numquam quis magni amet ut. Sed consequatur qui perferendis. Minima corporis sunt sint non placeat non unde.', 'keenan-quitzon', 10, 16, 3, '2024-08-19 06:20:43', '2024-08-19 06:20:43'),
(28, 'Eusebio Thompson', 'Tempore magni repellat sunt itaque pariatur. Est aperiam et fugiat nobis expedita eum soluta eum.', 'eusebio-thompson', 36, 14, 3, '2024-08-19 06:20:43', '2024-08-19 06:20:43'),
(29, 'Roselyn DuBuque DVM', 'Eos magni quidem ut quo voluptas expedita. Amet fuga vitae eaque id corporis. Ut nulla quibusdam ut officiis totam minus esse. Accusantium ut amet sed libero.', 'roselyn-dubuque-dvm', 24, 47, 3, '2024-08-19 06:20:43', '2024-08-19 06:20:43'),
(30, 'Michale Schuster', 'Molestiae velit quis temporibus ut non beatae. Ut alias rerum molestiae ea. Molestiae fuga aut non sed consectetur. Aut quibusdam est sint.', 'michale-schuster', 38, 21, 3, '2024-08-19 06:20:43', '2024-08-19 06:20:43');

-- --------------------------------------------------------

--
-- Структура таблицы `properties`
--

CREATE TABLE `properties` (
  `id` bigint UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `properties`
--

INSERT INTO `properties` (`id`, `color`, `size`, `state`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'red', 'middle', 'new', 1, '2024-08-19 06:20:41', '2024-08-19 06:20:41'),
(2, 'green', 'middle', 'undefined', 2, '2024-08-19 06:20:41', '2024-08-19 06:20:41'),
(3, 'green', 'large', 'new', 3, '2024-08-19 06:20:41', '2024-08-19 06:20:41'),
(4, 'green', 'large', 'undefined', 4, '2024-08-19 06:20:41', '2024-08-19 06:20:41'),
(5, 'red', NULL, NULL, 5, '2024-08-19 06:20:41', '2024-08-27 05:43:12'),
(6, 'red', 'small', 'undefined', 6, '2024-08-19 06:20:42', '2024-08-19 06:20:42'),
(7, 'green', 'large', 'secondHand', 7, '2024-08-19 06:20:42', '2024-08-19 06:20:42'),
(8, 'yellow', 'large', 'secondHand', 8, '2024-08-19 06:20:42', '2024-08-19 06:20:42'),
(9, 'red', 'middle', 'secondHand', 9, '2024-08-19 06:20:42', '2024-08-19 06:20:42'),
(10, 'yellow', 'small', 'new', 10, '2024-08-19 06:20:42', '2024-08-19 06:20:42'),
(11, 'yellow', 'large', 'new', 11, '2024-08-19 06:20:42', '2024-08-19 06:20:42'),
(12, 'red', 'small', 'new', 12, '2024-08-19 06:20:42', '2024-08-19 06:20:42'),
(13, 'yellow', 'large', 'new', 13, '2024-08-19 06:20:42', '2024-08-19 06:20:42'),
(14, 'yellow', 'small', 'new', 14, '2024-08-19 06:20:42', '2024-08-19 06:20:42'),
(15, 'red', 'small', 'undefined', 15, '2024-08-19 06:20:42', '2024-08-19 06:20:42'),
(16, 'yellow', 'large', 'undefined', 16, '2024-08-19 06:20:42', '2024-08-19 06:20:42'),
(17, 'green', 'small', 'new', 17, '2024-08-19 06:20:42', '2024-08-19 06:20:42'),
(18, 'green', 'small', 'new', 18, '2024-08-19 06:20:42', '2024-08-19 06:20:42'),
(19, 'red', 'middle', 'undefined', 19, '2024-08-19 06:20:42', '2024-08-19 06:20:42'),
(20, 'green', 'small', 'new', 20, '2024-08-19 06:20:43', '2024-08-19 06:20:43'),
(21, 'yellow', 'middle', 'new', 21, '2024-08-19 06:20:43', '2024-08-19 06:20:43'),
(22, 'green', 'middle', 'undefined', 22, '2024-08-19 06:20:43', '2024-08-19 06:20:43'),
(23, 'red', 'large', 'undefined', 23, '2024-08-19 06:20:43', '2024-08-19 06:20:43'),
(24, 'red', 'middle', 'new', 24, '2024-08-19 06:20:43', '2024-08-19 06:20:43'),
(25, 'green', 'large', 'new', 25, '2024-08-19 06:20:43', '2024-08-19 06:20:43'),
(26, 'red', 'large', 'secondHand', 26, '2024-08-19 06:20:43', '2024-08-19 06:20:43'),
(27, 'red', 'middle', 'undefined', 27, '2024-08-19 06:20:43', '2024-08-19 06:20:43'),
(28, 'yellow', 'middle', 'secondHand', 28, '2024-08-19 06:20:43', '2024-08-19 06:20:43'),
(29, 'green', 'middle', 'secondHand', 29, '2024-08-19 06:20:43', '2024-08-19 06:20:43'),
(30, 'yellow', 'small', 'undefined', 30, '2024-08-19 06:20:43', '2024-08-19 06:20:43');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ordinary_user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Marlon Hettinger', 'xfritsch@example.net', 'ordinary_user', '2024-08-19 06:20:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Vf74s6XmX4', '2024-08-19 06:20:40', '2024-08-19 06:20:40'),
(2, 'Prof. Kiana Schumm', 'raquel67@example.net', 'ordinary_user', '2024-08-19 06:20:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mlIWY0UusA', '2024-08-19 06:20:40', '2024-08-19 06:20:40'),
(3, 'Shanny Streich', 'wilfred.bradtke@example.com', 'ordinary_user', '2024-08-19 06:20:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '71oOK7RbpD', '2024-08-19 06:20:40', '2024-08-19 06:20:40'),
(4, 'Gabrielle Leuschke', 'ibrekke@example.org', 'ordinary_user', '2024-08-19 06:20:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kwJhYMLYGJ', '2024-08-19 06:20:40', '2024-08-19 06:20:40'),
(5, 'Houston Friesen', 'fritsch.catalina@example.com', 'ordinary_user', '2024-08-19 06:20:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'uo2aJ579cz', '2024-08-19 06:20:40', '2024-08-19 06:20:40'),
(6, 'Juwan Robel', 'cleta54@example.org', 'ordinary_user', '2024-08-19 06:20:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ZQvjwpOx30', '2024-08-19 06:20:40', '2024-08-19 06:20:40'),
(7, 'Polly Sawayn', 'gwill@example.com', 'ordinary_user', '2024-08-19 06:20:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Bmx66VbYNn', '2024-08-19 06:20:40', '2024-08-19 06:20:40'),
(8, 'Marjorie Kreiger', 'albert.marvin@example.org', 'ordinary_user', '2024-08-19 06:20:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FHdnLHh6Wn', '2024-08-19 06:20:40', '2024-08-19 06:20:40'),
(9, 'Miss Angelina Harris', 'golda.ebert@example.org', 'ordinary_user', '2024-08-19 06:20:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'LC5DBerhV2', '2024-08-19 06:20:40', '2024-08-19 06:20:40'),
(10, 'Eda McLaughlin', 'bartell.raheem@example.com', 'ordinary_user', '2024-08-19 06:20:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xf08atyCYh', '2024-08-19 06:20:40', '2024-08-19 06:20:40'),
(11, 'Brandon Bashirian', 'renner.amalia@example.com', 'ordinary_user', '2024-08-19 06:20:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3PnAia72x3', '2024-08-19 06:20:40', '2024-08-19 06:20:40'),
(12, 'Mr. Ewell Jast', 'kristofer83@example.com', 'ordinary_user', '2024-08-19 06:20:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ME7ZpEFV76', '2024-08-19 06:20:40', '2024-08-19 06:20:40'),
(13, 'Jada Larkin', 'bcummings@example.org', 'ordinary_user', '2024-08-19 06:20:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'g13sYGAuhU', '2024-08-19 06:20:40', '2024-08-19 06:20:40'),
(14, 'Antonetta Ratke', 'mekhi.ratke@example.net', 'ordinary_user', '2024-08-19 06:20:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5JoYFgUzzK', '2024-08-19 06:20:40', '2024-08-19 06:20:40'),
(15, 'Jonathan Goldner', 'hilario79@example.net', 'ordinary_user', '2024-08-19 06:20:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'jMfN9wwCyL', '2024-08-19 06:20:40', '2024-08-19 06:20:40'),
(16, 'Jon Bechtelar Sr.', 'elody88@example.com', 'ordinary_user', '2024-08-19 06:20:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'wpeh4k52bS', '2024-08-19 06:20:40', '2024-08-19 06:20:40'),
(17, 'Antoinette Littel II', 'karine.boyer@example.net', 'ordinary_user', '2024-08-19 06:20:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BAVv5KbZDU', '2024-08-19 06:20:40', '2024-08-19 06:20:40'),
(18, 'Catalina Willms', 'rubie49@example.org', 'ordinary_user', '2024-08-19 06:20:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'r43fJsnbVI', '2024-08-19 06:20:41', '2024-08-19 06:20:41'),
(19, 'Alexandra Stoltenberg', 'hettie.luettgen@example.net', 'ordinary_user', '2024-08-19 06:20:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2EwgkzrHW8', '2024-08-19 06:20:41', '2024-08-19 06:20:41'),
(20, 'Minnie Harvey', 'ggrimes@example.com', 'ordinary_user', '2024-08-19 06:20:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'KfYqyLslgu', '2024-08-19 06:20:41', '2024-08-19 06:20:41'),
(21, 'admin', 'admin@com.org', 'admin', NULL, '$2y$10$eCzy2ZROY.B.dXXgAEpwV.i6/tQLbGA1gEEeMjxnrUmJHFhEQYhZG', NULL, NULL, NULL),
(23, 'qwe', 'qwe@org.com', 'ordinary_user', NULL, '$2y$10$ncj/nKqj8JTGWxTgpb0wGuTOPWzgNXrlpU2rl1EBVy9AiyZM1vFIS', NULL, '2024-08-20 06:57:03', '2024-08-20 06:57:03'),
(24, 'asd', 'asd@org.com', 'ordinary_user', NULL, '$2y$10$j.W13/kIx5mutk/iDL/hIeiKnsbLhvUwQtDDbed1vuiQgUw.jU/qW', NULL, '2024-08-21 04:43:38', '2024-08-21 04:43:38'),
(25, 'zxc', 'zxc@org.com', 'ordinary_user', NULL, '$2y$10$JkZYC6IKSfFMSpLroHSHoOXkNLB4.gEo0JKs1jRGZodPNcGSSIRjK', NULL, '2024-08-26 15:07:35', '2024-08-26 15:07:35');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_order_id_foreign` (`order_id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Индексы таблицы `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `properties_product_id_foreign` (`product_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`);

--
-- Ограничения внешнего ключа таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
