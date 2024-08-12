-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: db:3306
-- Время создания: Авг 12 2024 г., 13:00
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
(6, '2024_08_08_084030_create_products_table', 2),
(9, '2024_08_08_095822_create_properties_table', 3),
(10, '2024_08_09_084019_create_orders_table', 4),
(11, '2024_08_09_090916_create_order_product_table', 4),
(13, '2024_08_12_095423_add_column_role_to_users_table', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
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

INSERT INTO `orders` (`id`, `user_id`, `email`, `phone`, `summa`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, 0, '2024-08-10 07:37:35', '2024-08-10 07:37:35'),
(2, NULL, 'admin@com.org', '234', 523, 1, '2024-08-11 06:47:37', '2024-08-11 10:32:54'),
(3, 1, 'admin@com.org', '456456', 284, 1, '2024-08-11 10:33:46', '2024-08-11 10:34:12'),
(4, 1, NULL, NULL, NULL, 0, '2024-08-11 10:38:40', '2024-08-11 10:38:40'),
(5, NULL, 'jufal@mailinator.com', '+1 (595) 558-6214', 260, 1, '2024-08-11 15:22:55', '2024-08-11 15:45:24');

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
(1, 1, 1, 1, 61, '8', '2024-08-10 07:37:35', '2024-08-10 07:37:35'),
(2, 2, 1, 4, 61, '8', '2024-08-11 06:47:37', '2024-08-11 07:51:51'),
(3, 2, 4, 3, 93, '8', '2024-08-11 06:51:38', '2024-08-11 07:51:53'),
(5, 3, 12, 2, 58, '6', '2024-08-11 10:33:57', '2024-08-11 10:33:58'),
(6, 4, 4, 4, 93, '8', '2024-08-11 10:38:40', '2024-08-11 10:52:02'),
(7, 4, 2, 1, 11, '7', '2024-08-11 10:51:45', '2024-08-11 10:51:45'),
(8, 4, 29, 1, 87, '10', '2024-08-11 10:51:54', '2024-08-11 10:51:54'),
(12, 5, 23, 4, 65, '3', '2024-08-11 15:41:51', '2024-08-11 15:43:43');

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
  `descriptions` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
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
(1, 'Leatha Bode', 'Soluta libero dolore voluptas consequatur dolorem. Itaque tenetur qui ea sit inventore minima doloremque ea. Autem deleniti sunt est rerum.', 'leatha-bode', 61, 49, 8, '2024-08-08 07:03:07', '2024-08-08 07:03:07'),
(2, 'Dr. Hubert Erdman', 'Et dolor debitis non ab. Quisquam nulla itaque nesciunt quia minima iure explicabo. Explicabo ut voluptatem non voluptatem voluptatem ducimus.', 'dr-hubert-erdman', 11, 33, 7, '2024-08-08 07:03:07', '2024-08-08 07:03:07'),
(3, 'Dr. Keyshawn Gusikowski II', 'Quod tempora eligendi tempore libero voluptatum officiis et. Porro et placeat sint accusantium occaecati asperiores. Omnis eum provident eius quia.', 'dr-keyshawn-gusikowski-ii', 19, 24, 4, '2024-08-08 07:03:07', '2024-08-08 07:03:07'),
(4, 'Dr. Joshua Grady MD', 'Id in ut iusto. Dolorem sed expedita culpa. Iusto et sapiente qui. Aut ea quam ut delectus libero molestias eum.', 'dr-joshua-grady-md', 93, 13, 8, '2024-08-08 07:03:07', '2024-08-08 07:03:07'),
(5, 'Wendell Goodwin PhD', 'Voluptate a eligendi et et necessitatibus et. Facere voluptas doloremque ab aperiam error et voluptatum. Amet atque minima in ducimus rerum quia.', 'wendell-goodwin-phd', 12, 20, 8, '2024-08-08 07:03:07', '2024-08-08 07:03:07'),
(6, 'Orie Konopelski', 'Ut impedit rerum quaerat. Velit fuga laudantium minus dolores sunt minima ut. Quae voluptatem ut natus nobis. Rem qui iusto eum ullam quod sapiente repellendus.', 'orie-konopelski', 35, 19, 3, '2024-08-08 07:03:08', '2024-08-08 07:03:08'),
(7, 'Kaylie Muller', 'Saepe id consequatur sint laboriosam sit ut provident. Sed quia voluptas tempore ut nostrum sunt voluptas aut. Et non aut et voluptatem pariatur. Saepe itaque eaque adipisci enim sint doloribus id.', 'kaylie-muller', 36, 9, 6, '2024-08-08 07:03:08', '2024-08-08 07:03:08'),
(8, 'Emma Klocko Sr.', 'Debitis consequatur inventore eligendi laboriosam dolorum cum aliquam. Quasi quia officia officiis sequi. Ipsa rerum assumenda veniam. Est ab et id quisquam.', 'emma-klocko-sr', 95, 43, 8, '2024-08-08 07:03:08', '2024-08-08 07:03:08'),
(9, 'Esmeralda Reichert', 'Quae non cumque fuga sit quaerat nulla veniam. Nam et suscipit tempora itaque sunt possimus sit. Consequatur odio impedit magnam aut adipisci. Facere tempore sint reprehenderit ipsam maxime.', 'esmeralda-reichert', 48, 49, 5, '2024-08-08 07:03:08', '2024-08-08 07:03:08'),
(10, 'Orin Roob', 'Aut quidem et pariatur itaque magni atque. Quod velit delectus ut et et aliquam. Excepturi saepe aliquam voluptas ut est labore. Commodi aspernatur aut nihil et.', 'orin-roob', 84, 15, 9, '2024-08-08 07:03:08', '2024-08-08 07:03:08'),
(11, 'Rahul Kassulke', 'Laudantium debitis nemo illo vero beatae officiis. Odio sunt natus alias ab et. Reprehenderit qui quidem tenetur nulla neque quas ut sunt. Est debitis ut sed ut. Totam reprehenderit modi atque ut.', 'rahul-kassulke', 61, 12, 3, '2024-08-08 07:03:08', '2024-08-08 07:03:08'),
(12, 'Abdul Greenfelder V', 'Accusamus et voluptatem sit sunt quis sed. Dignissimos ut eius corporis. Dolor vel temporibus numquam. Explicabo id deleniti sed natus rem sit ea ducimus.', 'abdul-greenfelder-v', 58, 21, 6, '2024-08-08 07:03:08', '2024-08-08 07:03:08'),
(13, 'Kaya Skiles', 'Iure dignissimos culpa minima. Excepturi dolor aut suscipit et ullam praesentium asperiores ratione. Labore ex rem mollitia eaque. Corrupti laborum id et voluptatem. Quaerat quas ipsam eligendi sit.', 'kaya-skiles', 27, 23, 3, '2024-08-08 07:03:08', '2024-08-08 07:03:08'),
(14, 'Mya Price', 'Quod qui at molestias ullam. Odio modi hic quia. Omnis nesciunt maiores sapiente fugit unde.', 'mya-price', 17, 43, 10, '2024-08-08 07:03:08', '2024-08-08 07:03:08'),
(15, 'Bell Gusikowski', 'Et voluptatem velit facilis consequuntur architecto. Consequatur est repellat commodi voluptate aut magni itaque. Libero qui nesciunt voluptatem quaerat id autem.', 'bell-gusikowski', 67, 14, 3, '2024-08-08 07:03:08', '2024-08-08 07:03:08'),
(16, 'Maybell Daniel', 'Qui esse voluptatum aspernatur qui animi veritatis libero. Provident velit esse quas. Nihil explicabo incidunt eligendi voluptatem magnam libero recusandae. Fugit ut quidem dolor adipisci.', 'maybell-daniel', 18, 18, 9, '2024-08-08 07:03:08', '2024-08-08 07:03:08'),
(17, 'Prince Schuster', 'Atque reiciendis nisi blanditiis explicabo blanditiis. Delectus praesentium qui rem. Possimus cupiditate aliquam molestiae quis non dolorum voluptas.', 'prince-schuster', 41, 46, 7, '2024-08-08 07:03:08', '2024-08-08 07:03:08'),
(18, 'Sydnie Pfeffer', 'Nihil autem eum id omnis corporis est molestiae enim. Quod est vel in libero eius.', 'sydnie-pfeffer', 12, 33, 7, '2024-08-08 07:03:08', '2024-08-08 07:03:08'),
(19, 'Dr. Jacinthe Kerluke IV', 'Modi quas voluptatem tempore rerum. Voluptatem in eum qui sit quos. Dolor qui qui dolorem et suscipit distinctio veniam. Accusantium voluptas delectus rem et ut rerum.', 'dr-jacinthe-kerluke-iv', 96, 16, 8, '2024-08-08 07:03:08', '2024-08-08 07:03:08'),
(20, 'Mr. Santa Rice', 'Incidunt rerum fugiat labore ut minus saepe enim. Optio qui consequuntur et necessitatibus ut ea beatae.', 'mr-santa-rice', 40, 6, 7, '2024-08-08 07:03:09', '2024-08-08 07:03:09'),
(21, 'Yasmine Lubowitz DDS', 'Magni vero et sunt quo. Soluta eos exercitationem non doloribus corporis aperiam fugiat sed. Et est dolorem architecto illum rem quia maiores.', 'yasmine-lubowitz-dds', 36, 29, 4, '2024-08-08 07:03:09', '2024-08-08 07:03:09'),
(22, 'Dr. Alford Buckridge', 'Et ut quo adipisci. Impedit officia id molestiae debitis expedita aliquid.', 'dr-alford-buckridge', 32, 32, 9, '2024-08-08 07:03:09', '2024-08-08 07:03:09'),
(23, 'Nathaniel Boyle', 'Autem incidunt eum est. Dolores neque nihil et id cum in. Ut autem maiores et perspiciatis tempora magni. Assumenda occaecati unde cum sapiente.', 'nathaniel-boyle', 65, 8, 3, '2024-08-08 07:03:09', '2024-08-08 07:03:09'),
(24, 'Dario Zboncak', 'Accusantium quam omnis reprehenderit eaque totam occaecati. Nam et ipsam consectetur quasi unde et voluptatem dolor. Consequuntur nihil dolores iste quam voluptate. Libero hic eos sit sed.', 'dario-zboncak', 11, 35, 6, '2024-08-08 07:03:09', '2024-08-08 07:03:09'),
(25, 'Thurman Jacobson PhD', 'Placeat consequatur aut consequatur aut nostrum eaque ratione. Excepturi autem assumenda maxime consequatur iure atque et quaerat. Ab id amet debitis repudiandae et.', 'thurman-jacobson-phd', 16, 27, 6, '2024-08-08 07:03:09', '2024-08-08 07:03:09'),
(26, 'Jasen Walker', 'Voluptatem cum ratione et. Quaerat fuga commodi voluptatem alias nihil. Qui quis beatae quia commodi harum. Laboriosam dolorem voluptatum necessitatibus voluptatum ipsam quis.', 'jasen-walker', 62, 15, 3, '2024-08-08 07:03:09', '2024-08-08 07:03:09'),
(27, 'Graham Herman', 'Autem explicabo non dolorem id. Dolorum tempore quis placeat reiciendis sunt in adipisci. Eveniet accusantium amet et nulla.', 'graham-herman', 65, 43, 3, '2024-08-08 07:03:09', '2024-08-08 07:03:09'),
(28, 'Rollin Hermiston', 'Quidem ut nulla quia pariatur. Impedit saepe perspiciatis recusandae. Et natus architecto atque dolore quo et. Ut voluptatem quisquam odit dolorum.', 'rollin-hermiston', 21, 40, 3, '2024-08-08 07:03:09', '2024-08-08 07:03:09'),
(29, 'Freddy Leffler', 'At vel quo sapiente. Natus repellat ut minus reprehenderit sint nisi. Qui ut rerum similique sit enim et placeat sint.', 'freddy-leffler', 87, 42, 10, '2024-08-08 07:03:09', '2024-08-08 07:03:09'),
(30, 'Calista Marks', 'Natus dolorum rerum sit et maxime. Omnis quas aut rerum non eligendi necessitatibus. Officia exercitationem dolor vel eos. Nam non praesentium debitis blanditiis saepe eveniet praesentium.', 'calista-marks', 55, 46, 7, '2024-08-08 07:03:09', '2024-08-08 07:03:09');

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
(1, 'red', 'small', 'undefined', 1, '2024-08-08 07:03:07', '2024-08-08 07:03:07'),
(2, 'red', 'middle', 'new', 2, '2024-08-08 07:03:07', '2024-08-08 07:03:07'),
(3, 'yellow', 'small', 'secondHand', 3, '2024-08-08 07:03:07', '2024-08-08 07:03:07'),
(4, 'yellow', 'large', 'secondHand', 4, '2024-08-08 07:03:07', '2024-08-08 07:03:07'),
(5, 'green', 'large', 'undefined', 5, '2024-08-08 07:03:07', '2024-08-08 07:03:07'),
(6, 'yellow', 'small', 'undefined', 6, '2024-08-08 07:03:08', '2024-08-08 07:03:08'),
(7, 'red', 'large', 'new', 7, '2024-08-08 07:03:08', '2024-08-08 07:03:08'),
(8, 'green', 'middle', 'new', 8, '2024-08-08 07:03:08', '2024-08-08 07:03:08'),
(9, 'red', 'middle', 'undefined', 9, '2024-08-08 07:03:08', '2024-08-08 07:03:08'),
(10, 'green', 'middle', 'new', 10, '2024-08-08 07:03:08', '2024-08-08 07:03:08'),
(11, 'yellow', 'middle', 'undefined', 11, '2024-08-08 07:03:08', '2024-08-08 07:03:08'),
(12, 'green', 'middle', 'new', 12, '2024-08-08 07:03:08', '2024-08-08 07:03:08'),
(13, 'red', 'large', 'new', 13, '2024-08-08 07:03:08', '2024-08-08 07:03:08'),
(14, 'yellow', 'small', 'secondHand', 14, '2024-08-08 07:03:08', '2024-08-08 07:03:08'),
(15, 'red', 'small', 'undefined', 15, '2024-08-08 07:03:08', '2024-08-08 07:03:08'),
(16, 'green', 'middle', 'secondHand', 16, '2024-08-08 07:03:08', '2024-08-08 07:03:08'),
(17, 'yellow', 'middle', 'new', 17, '2024-08-08 07:03:08', '2024-08-08 07:03:08'),
(18, 'yellow', 'middle', 'secondHand', 18, '2024-08-08 07:03:08', '2024-08-08 07:03:08'),
(19, 'yellow', 'middle', 'new', 19, '2024-08-08 07:03:09', '2024-08-08 07:03:09'),
(20, 'yellow', 'large', 'undefined', 20, '2024-08-08 07:03:09', '2024-08-08 07:03:09'),
(21, 'green', 'small', 'new', 21, '2024-08-08 07:03:09', '2024-08-08 07:03:09'),
(22, 'red', 'large', 'new', 22, '2024-08-08 07:03:09', '2024-08-08 07:03:09'),
(23, 'red', 'small', 'undefined', 23, '2024-08-08 07:03:09', '2024-08-08 07:03:09'),
(24, 'red', 'small', 'new', 24, '2024-08-08 07:03:09', '2024-08-08 07:03:09'),
(25, 'yellow', 'small', 'new', 25, '2024-08-08 07:03:09', '2024-08-08 07:03:09'),
(26, 'green', 'large', 'undefined', 26, '2024-08-08 07:03:09', '2024-08-08 07:03:09'),
(27, 'green', 'middle', 'undefined', 27, '2024-08-08 07:03:09', '2024-08-08 07:03:09'),
(28, 'yellow', 'large', 'undefined', 28, '2024-08-08 07:03:09', '2024-08-08 07:03:09'),
(29, 'red', 'small', 'undefined', 29, '2024-08-08 07:03:09', '2024-08-08 07:03:09'),
(30, 'red', 'middle', 'undefined', 30, '2024-08-08 07:03:09', '2024-08-08 07:03:09');

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
(1, 'admin', 'admin@com.org', 'admin', NULL, '$2y$10$FOTGQ.Xh0WRJU6qGA09j.ebvhLPho/b7AZ0ZKQuZQit6NCUrTr/cO', NULL, '2024-08-07 09:00:35', '2024-08-07 09:00:35');

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
