-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2022 at 07:19 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furnituredatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 23, '2022-03-09 16:22:10', '2022-03-09 16:22:10', NULL),
(9, 23, '2022-03-09 16:24:00', '2022-03-09 16:24:00', NULL),
(11, 23, '2022-03-09 16:27:15', '2022-03-09 16:27:15', NULL),
(12, 21, '2022-03-09 16:28:02', '2022-03-09 16:28:02', NULL),
(13, 21, '2022-03-09 16:44:42', '2022-03-09 16:44:42', NULL),
(14, 21, '2022-03-10 08:37:56', '2022-03-10 08:37:56', NULL),
(15, 21, '2022-03-10 08:51:37', '2022-03-10 08:51:37', NULL),
(16, 21, '2022-03-12 19:14:39', '2022-03-12 19:14:39', NULL),
(17, 24, '2022-03-13 09:22:42', '2022-03-13 09:22:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'chair', NULL, NULL, NULL),
(2, 'couche', NULL, NULL, NULL),
(3, 'wardrobe', NULL, NULL, NULL),
(4, 'table', NULL, NULL, NULL),
(5, 'shelve', NULL, NULL, NULL),
(6, 'mirror', NULL, NULL, NULL),
(7, 'dwdwHAHA', '2022-03-10 21:34:44', '2022-03-10 21:34:55', '2022-03-10 21:34:55'),
(8, 'maja', '2022-03-10 21:37:34', '2022-03-10 21:38:28', '2022-03-10 21:38:28');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menuses`
--

CREATE TABLE `menuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menuses`
--

INSERT INTO `menuses` (`id`, `name`, `route`, `order`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Home', 'home', 1, 1, NULL, '2022-03-10 16:27:04', NULL),
(2, 'Shop', 'products', 2, 1, NULL, '2022-03-10 16:27:32', NULL),
(3, 'Contact', 'contactForm', 3, 2, NULL, NULL, NULL),
(4, 'Admin Panel', 'adminPanel', 4, 3, NULL, NULL, NULL),
(5, 'Login', 'loginForm', 6, 0, NULL, NULL, NULL),
(6, 'Register', 'registerForm', 5, 0, NULL, NULL, NULL),
(7, 'Logout', 'logout', 8, 2, NULL, NULL, NULL),
(8, 'Cart', 'cart', 7, 2, NULL, '2022-03-11 11:45:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `users_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(21, 'Hej, cao kako smo', 20, '2022-03-06 19:48:06', '2022-03-06 19:48:06', NULL),
(22, 'Caooooooooooooo', 20, '2022-03-06 19:50:05', '2022-03-06 19:50:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_02_145740_create_products_table', 1),
(6, '2022_03_02_150014_create_categories_table', 1),
(7, '2022_03_02_150406_create_prices_table', 1),
(8, '2022_03_02_150427_create_menuses_table', 1),
(9, '2022_03_02_150918_create_roles_table', 1),
(10, '2022_03_03_185318_create_orders_table', 1),
(11, '2022_03_03_185754_create_carts_table', 1),
(12, '2022_03_06_184245_create_messages_table', 2),
(13, '2022_03_12_113531_create_users_activities_table', 3),
(14, '2022_03_12_122332_create_users_activities_table', 4),
(15, '2022_03_12_170643_create_users_activities_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `products_id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `quantity`, `products_id`, `cart_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 1, 2, 8, '2022-03-09 16:22:10', '2022-03-09 16:22:10', NULL),
(6, 1, 1, 9, '2022-03-09 16:24:00', '2022-03-09 16:24:00', NULL),
(8, 1, 4, 11, '2022-03-09 16:27:15', '2022-03-09 16:27:15', NULL),
(9, 1, 28, 11, '2022-03-09 16:27:15', '2022-03-09 16:27:15', NULL),
(10, 1, 4, 12, '2022-03-09 16:28:02', '2022-03-09 16:28:02', NULL),
(11, 3, 3, 12, '2022-03-09 16:28:02', '2022-03-09 16:28:02', NULL),
(12, 2, 12, 13, '2022-03-09 16:44:42', '2022-03-09 16:44:42', NULL),
(13, 1, 11, 13, '2022-03-09 16:44:42', '2022-03-09 16:44:42', NULL),
(14, 1, 22, 14, '2022-03-10 08:37:57', '2022-03-10 08:37:57', NULL),
(15, 2, 4, 15, '2022-03-10 08:51:37', '2022-03-10 08:51:37', NULL),
(16, 1, 3, 15, '2022-03-10 08:51:37', '2022-03-10 08:51:37', NULL),
(17, 1, 7, 16, '2022-03-12 19:14:40', '2022-03-12 19:14:40', NULL),
(18, 1, 28, 17, '2022-03-13 09:22:42', '2022-03-13 09:22:42', NULL),
(19, 2, 25, 17, '2022-03-13 09:22:42', '2022-03-13 09:22:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `products_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `price`, `products_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 228, 1, NULL, '2022-03-11 22:08:48', NULL),
(2, 453, 2, NULL, NULL, NULL),
(3, 488, 3, NULL, NULL, NULL),
(4, 822, 4, NULL, NULL, NULL),
(5, 224, 5, NULL, NULL, NULL),
(6, 377, 6, NULL, NULL, NULL),
(7, 391, 7, NULL, NULL, NULL),
(8, 790, 8, NULL, NULL, NULL),
(9, 876, 9, NULL, NULL, NULL),
(10, 601, 10, NULL, NULL, NULL),
(11, 448, 11, NULL, NULL, NULL),
(12, 481, 12, NULL, NULL, NULL),
(13, 763, 13, NULL, NULL, NULL),
(14, 420, 14, NULL, NULL, NULL),
(15, 750, 15, NULL, NULL, NULL),
(16, 368, 16, NULL, NULL, NULL),
(17, 466, 17, NULL, NULL, NULL),
(18, 695, 18, NULL, NULL, NULL),
(19, 545, 19, NULL, NULL, NULL),
(20, 558, 20, NULL, NULL, NULL),
(21, 898, 21, NULL, NULL, NULL),
(22, 496, 22, NULL, NULL, NULL),
(23, 560, 23, NULL, NULL, NULL),
(24, 286, 24, NULL, NULL, NULL),
(25, 788, 25, NULL, NULL, NULL),
(26, 622, 26, NULL, NULL, NULL),
(27, 359, 27, NULL, NULL, NULL),
(28, 473, 28, NULL, NULL, NULL),
(29, 453, 39, '2022-03-11 23:06:39', '2022-03-11 23:13:58', '2022-03-11 23:13:58'),
(30, 444, 40, '2022-03-11 23:14:34', '2022-03-11 23:14:44', '2022-03-11 23:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `main` tinyint(1) NOT NULL,
  `categories_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `description`, `main`, `categories_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Grey Velvet', 'chair1.jpg', 'This wingback chair leans into a glam look with its rich velvet upholstery and sleek gold legs. Its frame is made from solid and engineered wood, and it\'s built on flared legs for a mid-century modern design in your living room or den. This chair showcases rolled arms and a wingback silhouette with diamond button tufting for an iconic look in your space. It\'s also filled with foam for the right amount of support during movie night. Plus, we love that this chair has detailed stitching and piped edges for a tailored touch.', 0, 2, NULL, '2022-03-11 21:58:38', NULL),
(2, 'Dark Black ', 'wardrobe6.jpg', 'This armoire has high gloss fronts with a matte body. Manufactured in and imported from the European Union. Modern and unique contemporary design. Perfect for those in need of living room storage space. Flat packed and ready to ship', 0, 3, NULL, NULL, NULL),
(3, 'Simple Wood ', 'chair5.jpg', 'Add elegance to your fine dining establishment with this classically styled chiavari chair. Chiavari chairs demonstrate warmth and can be used as is around banquet tables or in rows at outdoor wedding ceremonies. Embellish by adding white or colorful chair covers to match your event colors and seal with a sash', 0, 1, NULL, NULL, NULL),
(4, 'Mustard ', 'couch3.jpg', 'Form meets function with this vintage-inspired loveseat. Made in the USA, it features a solid oak frame with four dowel legs that add a modern vibe to your space. This loveseat is also wrapped in faux leather upholstery for a lived-in look, and it comes in a rich brown hue that blends in with a variety of color schemes. Foam filling gives you extra support whenever you need some time to relax.', 0, 2, NULL, NULL, NULL),
(5, 'Simple Wood ', 'mirror1.jpg', 'This freestanding full-length mirror is a great way to make your bedroom or walk-in closet feel a little fancy. The perfect pick for lending a glint of French country glamour to your decor, it showcases a wooden frame in a silver finish hue, and adorned with rhinestone accents. A metal support flips out from the back of the mirror, allowing it to stand on its own in any corner of your room. Or, flip it back in if you’d rather lean the mirror up against the wall – it’s up to you! ', 0, 6, NULL, NULL, NULL),
(6, 'White Wood ', 'shelves2.jpg', 'Find yourself questioning your perception of modern functionality with this Modern Accent Shelf, crafted to perfection with the modern home in mind. Featuring not 1, not 2, but 3 fully functional split shelves to ensure storage in the most decadent fashion. This shelf was built to specification to have a fine-tuned structural integrity while flaunting a lack of modesty. This beautiful piece is perfectly scaled to nearly any home or office environmen', 0, 5, NULL, NULL, NULL),
(7, 'Grey Minimalistic', 'table2.jpg', 'Minima dignissimos impedit omnis doloremque perferendis. Aliquam occaecati magnam est repellat quibusdam nesciunt nostrum.With its practical design and easy-going style, this product offers an ideal workspace solution for home offices. Save floor space in compact areas by placing the Desk in a corner or make use of the fully finished back to take a prominent position in the middle of the room. The durable work surface is spacious enough to spread out with a computer, paperwork, and more when taking on your task of the day or just browsing the web. A sturdy post leg design with unique X pattern accents on the side panels creates a relaxed, open appearance while thoughtful construction and quality materials allow the corner desk to support up to 200 pounds. ', 0, 4, NULL, NULL, NULL),
(8, 'Simple Wood', 'wardrobe3.jpg', 'Its measurements are perfect for the new concept of homes, which feature increasingly smaller spaces for bedrooms. Its compact shelves, drawers, and aluminum rods allow you to neatly fold or hang items to keep things organized, and out of sight. With everything you could need in one neat condensed space, this modern wardrobe with sleek chrome handles that take up the bottom half of the doors is perfect for any smaller bedroom', 0, 3, NULL, NULL, NULL),
(9, 'Small, but Unique Wood', 'chair2.jpg', 'The Hillsdale Furniture Canal Street Vanity Stool blends art deco design with uptown style. Features a classic geometric oval-designed chairback. Finished in your choice of Golden Bronze, Pewter, or White and accented by an elegant cream upholstered seat, this vanity seat can jazz up your bathroom, bedroom, or any room in your home where extra seating is needed. Some assembly is required.', 0, 1, NULL, NULL, NULL),
(10, 'Big Dark Yellow', 'chair6.jpg', 'Adorn your living room or office in mid-century modern style with this 2-piece set of armchairs. Crafted from solid and engineered wood with sinuous spring seats, each chair features splayed, gold-colored legs for a retro feel. They\'re upholstered in velvet with cozy foam-filled cushions. We love how their scalloped backs and channel tufting add a polished look to your space. These chairs require partial assembly but come with everything needed to make setup a breeze.', 0, 1, NULL, NULL, NULL),
(11, ' Defined White', 'couch4.jpg', 'Indulge your mid-century modern nostalgia with a contemporary twist loveseat. Shown in an attractive upholstery in a timeless texture. Contemporary tapered peg legs and a linear profile lend themselves to serene comfort perfect addition to small spaces.', 0, 2, NULL, NULL, NULL),
(12, 'Wood ', 'mirror2.jpg', 'Perfect for dorms, first apartments, and bedrooms short on space, this over-the-door jewelry armoire makes a great gift or addition to your space. Crafted from manufactured wood and a glass mirror, this design opens to reveal an LED-illuminated jewelry cabinet with two drawers, five shelves, 32 necklace and bracelet hooks, 48 earring holes, and 90 earring slots, sure to accommodate even the most robust jewelry collection.', 0, 6, NULL, NULL, NULL),
(13, 'Big Wood ', 'shelves3.jpg', 'Show off framed family photos, plants, movies, and more with this set of two floating box-shaped wall shelves, the perfect pick for smaller rooms that don\'t have any floor space to spare. These clean-lined shelves are crafted from solid alder wood in a light walnut finish that helps to highlight their natural knots, grains, and character. And since each shelf has two surfaces, there\'s plenty of room to display all your favorite knickknacks. Each shelf can support up to 10 lbs.', 0, 5, NULL, NULL, NULL),
(14, 'White', 'table3.jpg', 'A symbol for family togetherness, home-cooked meals, and conversation, dining tables are a must-have for every home. And, with so many styles out there, you’re bound to find the piece that reflects your own unique personality. Take this table, for instance: Crafted from manufactured wood with solid wood veneers, this clean-lined table is found atop four flared legs and features a neutral finish that won’t clash with your current color palette.', 0, 4, NULL, NULL, NULL),
(15, 'Unique', 'wardrobe4.jpg', 'Aria modern high gloss wardrobe armoire with all mirror fronts. Glass fronts with the matte body. Manufactured in and imported from the European Union.', 0, 3, NULL, NULL, NULL),
(16, 'Dark Wood', 'chair3.jpg', 'Minimally designed, the Malcolm Solid Wood Dining Chair is casually styled to complement both traditional and contemporary decors. It features immaculate lines and detailed cuts that spruce up the look of these chairs. Simple yet striking. Alternately, these Malcolm Solid Wood Dining chairs can also be used near the kitchen counter to sit and enjoy a warm meal as it gets cooked. The Malcolm Solid Wood Dining Chair is constructed out of solid para-wood to ensure unrivaled strength and durability. ', 0, 1, NULL, NULL, NULL),
(17, 'Dark Black', 'couch1.jpg', 'Add vintage and classic charm to your living room, study, or watch a movie with the Classic Sofa. With a sturdy wooden frame for durability, this upholstered sofa with curved sides features a padded backrest and seat that keep you comfortable as you sit back and rela', 0, 2, NULL, NULL, NULL),
(18, 'Defined Mustard', 'couch5.jpg', 'The soft foam padding and web suspension offer you the ultimate comfort and support whether you are enjoying your morning cup of coffee, entertaining your friends, or working from home. Hand-stitched corded edges and button tufting offer the couch its finishing touches, giving it a look that is worthy of being the centerpiece of your living room. Crafted for luxury, the sofa boasts a solid wooden frame with gorgeous pecan-finished legs and faux leather upholstery.\r\n', 0, 2, NULL, NULL, NULL),
(19, 'Round Wood', 'mirror3.jpg', 'This round mirror gives you a sleek accent piece for your walls while showcasing a mix of modern and rustic styles. It has a classic wood frame with a medium chestnut finish for an eye-catching look. With a diameter of 28\", this wall mirror equally stands out in your entryway or over your fireplace mantel. We also love that it has fog-free glass, so condensation doesn\'t cloud the surface. D-ring attachments on the back make it a cinch to hang this mirror up right when it arrives.', 0, 6, NULL, NULL, NULL),
(20, 'Simple Wood', 'shelves4.jpg', 'This 4-piece accent shelf allows you to display picture frames, books, and other decor in any room of your home, wherever you have space on your walls. Each piece features an open iron frame in a black hue that surrounds distressed, engineered wood shelves for an industrial look. Frame shapes include a long rectangle, a tall double-shelf rectangle, and two squares. Best of all, you have the freedom to hang these accent shelves in many configurations to create the desired effect you want', 0, 5, NULL, NULL, NULL),
(21, 'Dark Wood', 'wardrobe1.jpg', 'House your wardrobe in handsome style with this pine wood armoire, showcasing a Shaker-style design and an adjustable shelf.', 0, 3, NULL, NULL, NULL),
(22, 'Grey Simple', 'wardrobe5.jpg', 'This beautifully spacious armoire features 2 doors and 2 spacious drawers. A covered hanging rod will help you store anything you will need. It´s an ideal fit for your bedroom, garage, living room, or kitchen. It is the perfect solution for extra storage in limited space rooms.', 0, 3, NULL, NULL, NULL),
(23, 'Black Wire', 'chair4.jpg', 'The CosmoLiving Astrid Wire Dining Chair is giving us all the coolest ~vibes~. It features a geometric pattern on the backrest to elevate this design and make this dining chair anything but basic. Strong and sturdy, the metal electroplated frame will last through endless nights of gossiping with your squad over a glass of wine (or two). What more could you want? Pair with the matching CosmoLiving Astrid Wire Counter Stool to get the complete look and liven up your kitchen and dining room #goals.', 0, 1, NULL, NULL, NULL),
(24, 'White Puff', 'couch2.jpg', 'This convertible sofa is powerful and has three adjustment angles. It can be switched between sofa and bed at any time. It is suitable for many occasions such as bedroom, living room, study, and office, and does not take up too much space. The outriggers are made of high-quality metal, are strong and durable, and have a long service life.', 0, 2, NULL, NULL, NULL),
(25, 'Washed White', 'couch6.jpg', 'From entertaining guests to helping us host the perfect movie night, sofas are a staple in our living room decor. Take this one for example: crafted from solid and manufactured wood, it’s perched atop tapered legs and showcases a clean-lined construction, so it works well in any contemporary setting. Upholstered in foam-filled faux leather for an inviting feel, this piece sports tufted detailing and piped seams for a look that stays on-trend. Designed by Meirxifeng furniture design.', 0, 2, NULL, NULL, NULL),
(26, 'Small Cube', 'shelves1.jpg', 'Whether you want to organize your favorite leather-bound tomes or give your little one a place to create a mini library, this lovely bookcase is the perfect pick. A simple, clean-lined design, it is crafted from manufactured wood.', 0, 5, NULL, NULL, NULL),
(27, 'Black Wire', 'table1.jpg', 'Second, only to your sofa, coffee tables are living room icons that lend you a handy surface that also help tie together your ensemble\'s style. This table, for example, is a great option for space-conscious ensembles thanks to its nesting design. Crafted from metal with a tempered glass surface, this piece features two nesting tables with a circular silhouette.\r\nProduct Details\r\nBase Material: Metal\r\nLevel of Assembly: Full Assembly Needed\r\nNumber of Tables Included: 2\r\nTop Material\r\nTop Material: Glass\r\nTop Glass Type: Tempered Glass', 0, 4, NULL, NULL, NULL),
(28, 'Simple Dark Washed Wood', 'wardrobe2.jpg', 'In need of more storage? This modern armoire gives you extra space for all your favorite things. Its frame is made from solid pine wood in a crisp, versatile finish that goes with everything! A mirrored door gives you a convenient spot to check out your look and open up your room. It opens up to three open and adjustable shelves and a hanging rod that can house hats, sweaters, and ties. Three drawers open up on roller glides, allowing you to tuck away socks and delicates. Plus, one large open spa', 0, 3, NULL, NULL, NULL),
(31, 'main1', 'pic1.jpg', 'Want one? Come check it now', 1, 2, NULL, NULL, NULL),
(32, 'main2', 'pic2.jpg', 'I know you need it, look now', 1, 1, NULL, NULL, NULL),
(33, 'main3', 'pic3.jpg', 'Your clothes is in need for a new home? Check it now', 1, 3, NULL, NULL, NULL),
(34, 'main4', 'pic4.jpg', 'Check it now-we know you need this', 1, 4, NULL, NULL, NULL),
(35, 'main5', 'pic5.jpg', 'Take a look at our mirror options', 1, 6, NULL, NULL, NULL),
(36, 'main6', 'pic6.jpg', 'You need a storage space? Check our new collection now', 1, 5, NULL, NULL, NULL),
(39, 'Asadasd', 'WIN_20210309_16_19_25_Pro1647043599.jpg', 'dada', 0, 3, '2022-03-11 23:06:39', '2022-03-11 23:13:58', '2022-03-11 23:13:58'),
(40, 'SSSA', 'WIN_20210309_16_19_22_Pro1647044074.jpg', 'DDDDD', 0, 2, '2022-03-11 23:14:34', '2022-03-11 23:14:44', '2022-03-11 23:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', NULL, NULL, NULL),
(2, 'user', NULL, NULL, NULL),
(3, 'daddwd', '2022-03-11 18:04:18', '2022-03-11 18:05:58', '2022-03-11 18:05:58'),
(4, 'dwdw', '2022-03-11 18:06:05', '2022-03-11 18:06:29', '2022-03-11 18:06:29'),
(5, 'fef', '2022-03-13 10:03:00', '2022-03-13 10:03:04', '2022-03-13 10:03:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `roles_id` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `email_verified_at`, `roles_id`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(21, 'Kiki', 'Kikic', 'kiki@gmail.com', NULL, 2, 'f1dc735ee3581693489eaf286088b916', NULL, '2022-03-04 17:58:43', '2022-03-13 10:01:59', NULL),
(23, 'Marija', 'Vucicevic', 'marija.vucicevic.18.19@ict.edu.rs', NULL, 1, '474f5d4cac3a8cef024c0b4bece7a592', NULL, '2022-03-06 19:53:42', '2022-03-13 10:53:32', NULL),
(24, 'Bojan', 'Stefanovski', 'youtube.bojans@gmail.com', NULL, 2, 'f1dc735ee3581693489eaf286088b916', NULL, '2022-03-09 10:12:03', '2022-03-12 15:21:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_activities`
--

CREATE TABLE `users_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `dateLogin` date DEFAULT NULL,
  `dateLoggingOut` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_activities`
--

INSERT INTO `users_activities` (`id`, `users_id`, `dateLogin`, `dateLoggingOut`, `created_at`, `updated_at`) VALUES
(1, 23, NULL, '2022-03-12', '2022-03-12 16:13:06', '2022-03-12 16:13:06'),
(2, 23, '2022-03-12', NULL, '2022-03-12 16:13:24', '2022-03-12 16:13:24'),
(3, 23, NULL, '2022-03-12', '2022-03-12 19:13:13', '2022-03-12 19:13:13'),
(4, 21, '2022-03-12', NULL, '2022-03-12 19:13:42', '2022-03-12 19:13:42'),
(5, 21, NULL, '2022-03-12', '2022-03-12 19:14:49', '2022-03-12 19:14:49'),
(6, 23, '2022-03-12', NULL, '2022-03-12 19:14:57', '2022-03-12 19:14:57'),
(7, 23, NULL, '2022-03-13', '2022-03-12 23:05:04', '2022-03-12 23:05:04'),
(8, 23, '2022-03-13', NULL, '2022-03-12 23:24:47', '2022-03-12 23:24:47'),
(9, 24, '2022-03-13', NULL, '2022-03-13 09:21:23', '2022-03-13 09:21:23'),
(10, 24, NULL, '2022-03-13', '2022-03-13 09:22:54', '2022-03-13 09:22:54'),
(11, 23, '2022-03-13', NULL, '2022-03-13 09:23:00', '2022-03-13 09:23:00'),
(12, 23, NULL, '2022-03-13', '2022-03-13 12:17:59', '2022-03-13 12:17:59'),
(13, 23, '2022-03-13', NULL, '2022-03-13 13:45:20', '2022-03-13 13:45:20'),
(14, 23, NULL, '2022-03-13', '2022-03-13 14:19:40', '2022-03-13 14:19:40'),
(15, 23, '2022-03-13', NULL, '2022-03-13 14:32:00', '2022-03-13 14:32:00'),
(16, 23, NULL, '2022-03-13', '2022-03-13 14:38:56', '2022-03-13 14:38:56'),
(17, 23, '2022-03-13', NULL, '2022-03-13 14:39:50', '2022-03-13 14:39:50'),
(18, 23, NULL, '2022-03-13', '2022-03-13 14:51:12', '2022-03-13 14:51:12'),
(19, 23, '2022-03-13', NULL, '2022-03-13 14:52:10', '2022-03-13 14:52:10'),
(20, 23, NULL, '2022-03-13', '2022-03-13 14:56:28', '2022-03-13 14:56:28'),
(21, 23, '2022-03-13', NULL, '2022-03-13 14:56:34', '2022-03-13 14:56:34'),
(22, 23, NULL, '2022-03-13', '2022-03-13 14:56:56', '2022-03-13 14:56:56'),
(23, 23, '2022-03-13', NULL, '2022-03-13 15:02:37', '2022-03-13 15:02:37'),
(24, 23, NULL, '2022-03-13', '2022-03-13 17:14:10', '2022-03-13 17:14:10'),
(25, 23, '2022-03-13', NULL, '2022-03-13 17:14:35', '2022-03-13 17:14:35'),
(26, 23, NULL, '2022-03-13', '2022-03-13 17:14:41', '2022-03-13 17:14:41'),
(27, 21, '2022-03-13', NULL, '2022-03-13 17:15:12', '2022-03-13 17:15:12'),
(28, 21, NULL, '2022-03-13', '2022-03-13 17:15:18', '2022-03-13 17:15:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `menuses`
--
ALTER TABLE `menuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_activities`
--
ALTER TABLE `users_activities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menuses`
--
ALTER TABLE `menuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users_activities`
--
ALTER TABLE `users_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
