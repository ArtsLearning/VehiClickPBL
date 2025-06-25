-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 25, 2025 at 07:05 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehiclickdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` enum('Motor','Mobil') COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int NOT NULL,
  `rating` decimal(2,1) NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas` int NOT NULL,
  `nomor_plat` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_barang` int NOT NULL,
  `foto_barang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `nama_barang`, `kategori`, `stok`, `rating`, `deskripsi`, `kapasitas`, `nomor_plat`, `harga_barang`, `foto_barang`, `created_at`, `updated_at`) VALUES
(23, 'Toyota All New Avanza G', 'Mobil', 1, '5.0', 'Mobil serbaguna dengan desain elegan dan kabin yang luas. Cocok untuk perjalanan keluarga atau antar kota', 7, 'AB 1234 CD', 390000, 'foto-barang/a4b01df8-d19a-4ce6-8819-606dd17cf38a.png', '2025-06-18 12:46:17', '2025-06-18 12:46:17'),
(24, 'Honda Beat', 'Motor', 0, '4.1', 'Motor matic yang irit dan ringan, cocok untuk penggunaan di jalanan padat.', 2, 'EF 5678 GH', 100000, 'foto-barang/819dbcb3-557c-479c-911e-ef2896f4cc0c.png', '2025-06-18 12:47:35', '2025-06-23 21:30:16'),
(25, 'Toyota Calya', 'Mobil', 0, '4.9', 'Mobil ramah lingkungan yang ideal untuk liburan bersama keluarga.', 7, 'IJ 9012 KL', 370000, 'foto-barang/d16a127c-e120-47a1-8797-6730f676803b.png', '2025-06-18 12:48:49', '2025-06-23 21:47:58'),
(26, 'Daihatsu Xenia', 'Mobil', 0, '4.2', 'Mobil serbaguna yang handal dengan mesin irit dan kabin yang lega.', 7, 'MN 3456 OP', 380000, 'foto-barang/4c82b731-3274-4471-b0ca-91b97c00beac.png', '2025-06-18 12:49:40', '2025-06-22 05:02:54'),
(27, 'Toyota Innova Reborn', 'Mobil', 0, '4.8', 'Mobil serbaguna premium dengan kenyamanan maksimal dan performa tangguh. Cocok untuk perjalanan jauh.', 8, 'QR 7890 ST', 550000, 'foto-barang/790e8a9a-d596-4b0a-9b4e-e1f153bb2110.png', '2025-06-18 12:51:11', '2025-06-23 21:33:12'),
(28, 'Honda Scoopy', 'Motor', 0, '0.0', 'Motor matic dengan gaya Retro Modern yang stylish dan nyaman. Ideal untuk pemuda.', 2, 'UV 1234 WX', 85000, 'foto-barang/d7720d45-402d-466a-af51-ee1e7f331bf1.png', '2025-06-18 12:52:11', '2025-06-23 21:50:35'),
(29, 'Yamaha Mio', 'Motor', 0, '4.7', 'Motor matic klasik. Performa stabil, bahan bakar irit.', 2, 'YZ 5678 AB', 95000, 'foto-barang/ee624c67-b5b1-4dc7-8e60-8090e5cb6628.png', '2025-06-18 12:53:12', '2025-06-24 21:03:37'),
(30, 'Honda Brio', 'Mobil', 0, '4.4', 'Mobil yang lincah, irit bahan bakar, dan mudah diparkir.', 5, 'CD 9012 EF', 260000, 'foto-barang/82285d27-72e8-4aa9-a209-7bc00b2c7023.png', '2025-06-18 12:58:36', '2025-06-23 22:17:08'),
(31, 'Toyota Agya', 'Mobil', 0, '4.6', 'Mobil yang hemat akan bahan bakar. Cocok untuk penggunaan dalam kota.', 5, 'GH 3456 IJ', 255000, 'foto-barang/7a52dc81-2b6f-4e48-bbc9-2e9fe491c06d.png', '2025-06-18 12:59:53', '2025-06-24 23:16:37'),
(32, 'Daihatsu Ayla', 'Mobil', 1, '4.5', 'Mobil ramah lingkungan yang cocok untuk perjalanan praktis.', 5, 'KL 7890 MN', 270000, 'foto-barang/609d06f2-2a16-4492-9c99-2fd8d6e0a13a.png', '2025-06-18 13:01:11', '2025-06-18 13:01:11'),
(33, 'Honda Vario', 'Motor', 1, '4.0', 'Motor matic dengan tenaga besar dan bagasi luas. Aman untuk penggunaan jarak menengah.', 2, 'OP 1234 QR', 110000, 'foto-barang/12c32f06-a927-4276-bf7f-a479c06e4bc3.png', '2025-06-18 13:02:28', '2025-06-18 13:02:28'),
(34, 'Suzuki Ertiga', 'Mobil', 1, '4.2', 'Mobil serbaguna yang nyaman dengan suspensi yang stabil. Cocok untuk perjalanan jarak menengah.', 7, 'ST 5678 UV', 410000, 'foto-barang/0fc6d8e4-f932-4311-9ad5-aab2b727c508.png', '2025-06-18 13:03:46', '2025-06-18 13:03:46'),
(35, 'Yamaha Fino', 'Motor', 0, '4.3', 'Motor matic dengan nuansa Vintage', 2, 'WX 9012 YZ', 90000, 'foto-barang/207067d6-f637-4c65-8feb-32f48b2ba232.png', '2025-06-18 13:04:42', '2025-06-23 22:42:38'),
(36, 'Honda PCX', 'Motor', 0, '4.5', 'Motor mewah dengan kenyamanan tinggi. Aman untuk perjalanan jauh.', 2, 'AB 3456 CD', 125000, 'foto-barang/0771f207-fc85-4f7c-8b8d-9bbb8faf18d9.png', '2025-06-18 13:05:50', '2025-06-23 21:46:15'),
(37, 'Mitsubishi Xpander', 'Mobil', 1, '4.5', 'Mobil serbaguna dengan Ground Clearance yang tinggi. Aman dibawa ke dataran yang tidak rata.', 7, 'EF 7890 GH', 440000, 'foto-barang/3aac3d89-c2e6-4349-84a7-8e35fac2a701.png', '2025-06-18 13:06:49', '2025-06-18 13:06:49'),
(38, 'Yamaha NMAX', 'Motor', 1, '4.6', 'Motor matic besar yang sporty. Cocok untuk jalan-jalan dengan gaya.', 2, 'IJ 1234 KL', 120000, 'foto-barang/fecf1676-19a2-45e4-be76-d8b7adcd6c00.png', '2025-06-18 13:07:55', '2025-06-18 13:07:55'),
(39, 'Yamaha Aerox', 'Motor', 1, '4.7', 'Motor sporty yang performanya tinggi, dan desainnya garang.', 2, 'MN 5678 OP', 135000, 'foto-barang/8d0ccda5-6ca5-490b-b3fa-2beed313384a.png', '2025-06-18 13:09:03', '2025-06-18 13:09:03');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `nama_customer`, `email_customer`, `telepon`, `alamat`, `foto_customer`, `created_at`, `updated_at`) VALUES
(4, 'arthur12', 'Muhammad Arthur Putra G.', 'arthur@gmail.com', '08764859012', 'Jalan Pemuda', 'foto_customer/01JWP1F14CC4ST9FYT10G7SEBW.jpeg', '2025-06-01 08:23:48', '2025-06-01 08:23:48');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_01_061150_create_barangs_table', 2),
(5, '2025_06_01_065545_create_customer_table', 3),
(6, '2025_06_01_153857_create_ulasan_table', 4),
(9, '2025_06_03_084817_create_produk_table', 5),
(10, '2025_06_03_090716_create_ulasan_table', 6),
(11, '2025_06_13_084226_create_pesan_table', 6),
(12, '2025_06_03_084817_create_barangs_table', 7),
(13, '2025_06_03_090716_create_ulasans_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id` bigint UNSIGNED NOT NULL,
  `pemesanan_id` bigint UNSIGNED NOT NULL,
  `metode` varchar(255) NOT NULL,
  `nominal` bigint NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanans`
--

CREATE TABLE `pemesanans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pickup_method` enum('delivery','pickup') NOT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kabupaten` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kelurahan` varchar(255) DEFAULT NULL,
  `kodepos` varchar(255) DEFAULT NULL,
  `alamat_detail` varchar(255) DEFAULT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `durasi` int NOT NULL,
  `total_harga` bigint NOT NULL,
  `nama_kendaraan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `barang_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pemesanans`
--

INSERT INTO `pemesanans` (`id`, `nama`, `email`, `pickup_method`, `provinsi`, `kabupaten`, `kecamatan`, `kelurahan`, `kodepos`, `alamat_detail`, `tanggal_mulai`, `tanggal_selesai`, `durasi`, `total_harga`, `nama_kendaraan`, `status`, `created_at`, `updated_at`, `user_id`, `barang_id`) VALUES
(2, 'arthur', 'arthur@gmail.com', 'pickup', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-22', '2025-06-22', 1, 100000, 'Honda Beat', 'process', '2025-06-19 11:42:14', '2025-06-19 11:42:14', 0, 0),
(3, 'arthur', 'arthur@gmail.com', 'pickup', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-21', '2025-06-21', 1, 100000, 'Honda Beat', 'pending', '2025-06-19 12:07:14', '2025-06-19 12:07:14', 0, 0),
(4, 'arthur', 'arthur@gmail.com', 'pickup', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-21', '2025-06-21', 1, 100000, 'Honda Beat', 'pending', '2025-06-19 12:10:03', '2025-06-19 12:10:03', 0, 0),
(5, 'arthur', 'arthur@gmail.com', 'pickup', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-22', '2025-06-22', 1, 100000, 'Honda Beat', 'pending', '2025-06-19 12:31:08', '2025-06-19 12:31:08', 0, 0),
(6, 'arthur', 'arthur@gmail.com', 'delivery', '15', '204', '3049', '43442', '76121', 'kopken', '2025-06-21', '2025-06-21', 1, 100000, 'Honda Beat', 'pending', '2025-06-19 13:11:28', '2025-06-19 13:11:28', 0, 0),
(7, 'arthur', 'arthur@gmail.com', 'delivery', '15', '204', '3049', '43442', '76121', 'kopken', '2025-06-21', '2025-06-21', 1, 100000, 'Honda Beat', 'pending', '2025-06-19 13:13:27', '2025-06-19 13:13:27', 0, 0),
(8, 'arthur', 'arthur@gmail.com', 'pickup', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-21', '2025-06-21', 1, 100000, 'Honda Beat', 'pending', '2025-06-19 13:22:09', '2025-06-19 13:22:09', 0, 0),
(9, 'arthur', 'arthur@gmail.com', 'pickup', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-21', '2025-06-22', 2, 200000, 'Honda Beat', 'pending', '2025-06-19 13:37:33', '2025-06-19 13:37:33', 0, 0),
(11, 'arthur', 'arthur@gmail.com', 'pickup', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-21', '2025-06-21', 1, 100000, 'Honda Beat', 'pending', '2025-06-19 13:49:08', '2025-06-19 13:49:08', 0, 0),
(12, 'arthur', 'arthur@gmail.com', 'pickup', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-21', '2025-06-21', 1, 100000, 'Honda Beat', 'pending', '2025-06-19 13:56:35', '2025-06-19 13:56:35', 0, 0),
(13, 'arthur', 'arthur@gmail.com', 'pickup', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-21', '2025-06-21', 1, 100000, 'Honda Beat', 'pending', '2025-06-19 14:00:43', '2025-06-19 14:00:43', 0, 0),
(14, 'arthur', 'arthur@gmail.com', 'pickup', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-21', '2025-06-21', 1, 390000, 'Toyota All New Avanza G', 'pending', '2025-06-19 14:05:12', '2025-06-19 14:05:12', 0, 0),
(15, 'arthur', 'arthur@gmail.com', 'delivery', '8', '60', '693', '7954', '36553', 'kopken', '2025-06-21', '2025-06-27', 7, 2730000, 'Toyota All New Avanza G', 'pending', '2025-06-19 14:14:27', '2025-06-19 14:14:27', 0, 0),
(16, 'arthur', 'arthur@gmail.com', 'delivery', '12', '173', '2726', '39068', '78554', 'kopken', '2025-06-21', '2025-06-27', 7, 700000, 'Honda Beat', 'pending', '2025-06-19 14:17:45', '2025-06-19 14:17:45', 0, 0),
(17, 'arthur', 'arthur@gmail.com', 'delivery', '11', '137', '2153', '30353', '62262', 'kopken', '2025-06-21', '2025-06-21', 1, 390000, 'Toyota All New Avanza G', 'pending', '2025-06-19 14:24:00', '2025-06-19 14:24:00', 0, 0),
(18, 'arthur', 'arthur@gmail.com', 'delivery', '2', '10', '59', '776', '33253', 'kopken', '2025-06-21', '2025-06-21', 1, 390000, 'Toyota All New Avanza G', 'pending', '2025-06-19 14:33:50', '2025-06-19 14:33:50', 0, 0),
(19, 'arthur', 'arthur@gmail.com', 'delivery', '13', '188', '2895', '41662', '70812', 'kopken', '2025-06-21', '2025-06-21', 1, 390000, 'Toyota All New Avanza G', 'pending', '2025-06-19 14:42:27', '2025-06-19 14:42:27', 0, 0),
(20, 'arthur', 'arthur@gmail.com', 'pickup', '13', '188', '2895', '41662', '70812', 'kopken', '2025-06-21', '2025-06-21', 1, 390000, 'Toyota All New Avanza G', 'pending', '2025-06-19 14:42:41', '2025-06-19 14:42:41', 0, 0),
(21, 'arthur', 'arthur@gmail.com', 'delivery', '1', '2', '7', '66', '80611', 'kopken', '2025-06-21', '2025-06-21', 1, 390000, 'Toyota All New Avanza G', 'pending', '2025-06-19 14:43:23', '2025-06-19 14:43:23', 0, 0),
(22, 'arthur12', 'arthur@gmail.com', 'delivery', '15', '210', '3126', '44249', '76252', 'kopken', '2025-06-21', '2025-06-21', 1, 370000, 'Toyota Calya', 'pending', '2025-06-19 15:49:22', '2025-06-19 15:49:22', 0, 0),
(23, 'arthur12', 'arthur@gmail.com', 'pickup', '2', '11', '67', NULL, NULL, NULL, '2025-06-21', '2025-06-23', 3, 1170000, 'Toyota All New Avanza G', 'pending', '2025-06-20 06:26:40', '2025-06-20 06:26:40', 0, 0),
(24, 'arthur12', 'arthur@gmail.com', 'pickup', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-24', '2025-06-24', 1, 380000, 'Daihatsu Xenia', 'pending', '2025-06-22 05:02:54', '2025-06-22 05:02:54', 0, 0),
(25, 'arthur12', 'arthur@gmail.com', 'pickup', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-25', '2025-06-25', 1, 100000, 'Honda Beat', 'completed', '2025-06-23 21:30:16', '2025-06-23 21:30:16', 7, 24),
(26, 'arthur12', 'arthur@gmail.com', 'delivery', '12', '174', '2736', '39198', '79584', 'kopken', '2025-06-27', '2025-06-27', 1, 550000, 'Toyota Innova Reborn', 'process', '2025-06-23 21:33:12', '2025-06-23 21:33:12', 7, 27),
(27, 'arthur12', 'arthur@gmail.com', 'pickup', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-26', '2025-06-27', 2, 250000, 'Honda PCX', 'completed', '2025-06-23 21:46:15', '2025-06-23 21:46:15', 7, 36),
(28, 'arthur12', 'arthur@gmail.com', 'pickup', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-26', '2025-06-26', 1, 370000, 'Toyota Calya', 'pending', '2025-06-23 21:47:58', '2025-06-23 21:47:58', 7, 25),
(29, 'arthur12', 'arthur@gmail.com', 'pickup', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-25', '2025-06-25', 1, 85000, 'Honda Scoopy', 'completed', '2025-06-23 21:50:35', '2025-06-23 21:50:35', 7, 28),
(30, 'arthur12', 'arthur@gmail.com', 'pickup', '2', NULL, NULL, NULL, NULL, NULL, '2025-06-25', '2025-06-25', 1, 260000, 'Honda Brio', 'pending', '2025-06-23 22:17:08', '2025-06-23 22:17:08', 7, 30),
(31, 'arthur12', 'arthur@gmail.com', 'pickup', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-25', '2025-06-25', 1, 90000, 'Yamaha Fino', 'process', '2025-06-23 22:42:38', '2025-06-24 21:10:13', 7, 35),
(32, 'arthur12', 'arthur@gmail.com', 'pickup', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-26', '2025-06-26', 1, 95000, 'Yamaha Mio', 'process', '2025-06-24 21:03:37', '2025-06-24 21:17:13', 7, 29),
(33, 'falih', 'faihilmy@gmail.com', 'delivery', '13', '187', '2883', '41424', NULL, 'kopken', '2025-06-28', '2025-06-28', 1, 255000, 'Toyota Agya', 'process', '2025-06-24 23:16:37', '2025-06-24 23:19:17', 10, 31);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id`, `email`, `pesan`, `created_at`, `updated_at`) VALUES
(15, 'rifqy@gmail.com', 'Harga nya sangat murah', '2025-06-16 22:57:34', '2025-06-16 22:57:34'),
(16, 'abay@gmail.com', 'Tampilannya menarik', '2025-06-16 22:59:43', '2025-06-16 22:59:43'),
(18, 'arthur@gmail.com', 'cuki cuki', '2025-06-22 05:56:03', '2025-06-22 05:56:03'),
(19, 'arthur@gmail.com', 'kok keren banget sih webnya', '2025-06-23 22:20:23', '2025-06-23 22:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9Y1ifFPOjEb873weTLV7oW8YIW0jqrFmfsnz095E', 10, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 13; Pixel 7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Mobile Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiTXFnNWJVSVoxSEVtRjZkbzRuYlgwZ0ZkS3BacnZWM2NTRXNLWUR4aCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEwO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTIkRlVSalR6dURJMkxxTkYxTnZhUGd2dVcxbUZBbWlma1pHYVUzMFFRMlJSU3lLODFJT3BlZDIiO3M6ODoiZmlsYW1lbnQiO2E6MDp7fX0=', 1750833937),
('k4yLO8Vh5e5MnYaxNrfd6naG7utj3aBLSZssNTIV', NULL, '127.0.0.1', 'PostmanRuntime/7.44.1', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoidGR6VG5ZY3IyREh1TmxWS2pGWE1CcVdnUkVxZVVIMVAxZG03TzBxMCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1750832357),
('ZGfl2rSrds4CZ6U3rZg8JsP4lvs8G4IokS3IQXBw', NULL, '127.0.0.1', 'PostmanRuntime/7.44.1', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoidWJSSUE3cm85VXJGS2NHS1V6NEIxOVBjcXFXWHluaXprVjJBZ3ByTiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1750825033);

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `id_produk` bigint UNSIGNED NOT NULL,
  `id_pesanan` bigint UNSIGNED NOT NULL,
  `rating` tinyint UNSIGNED NOT NULL COMMENT 'Rating dari 1 sampai 5',
  `komentar` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id`, `id_user`, `id_produk`, `id_pesanan`, `rating`, `komentar`, `created_at`, `updated_at`) VALUES
(1, 4, 23, 23, 5, 'Pelayanannya memuaskan dan kendaraannya dalam kondisi prima!', '2025-06-23 20:29:43', '2025-06-23 20:29:43'),
(2, 7, 24, 25, 5, 'seru', '2025-06-23 21:32:39', '2025-06-23 21:32:39'),
(3, 7, 28, 29, 5, 'tes tes cihuy', '2025-06-23 21:52:37', '2025-06-23 21:52:37'),
(4, 7, 36, 27, 3, 'mogok jir tengah jalan', '2025-06-24 21:12:10', '2025-06-24 21:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'customer',
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_sim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_verifikasi_sim` enum('belum','menunggu','terverifikasi','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `telepon`, `alamat`, `foto_customer`, `remember_token`, `created_at`, `updated_at`, `role`, `google_id`, `avatar`, `foto_sim`, `status_verifikasi_sim`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$PxGvWJlTx9JOnq2r8QpDLOt6uKaRXY5ARudW5DoN9QQa7DHDelTqm', '0', '', '', NULL, '2025-05-31 23:05:56', '2025-05-31 23:05:56', 'admin', NULL, NULL, NULL, 'belum'),
(5, 'Ahmad Ilham', 'ahmad@gmail.com', NULL, '$2y$12$GO/QNAE7soOhaJIS33jQrO3ySvK7FUg/3//64ghdG/1SIoXGlbdOS', NULL, NULL, NULL, NULL, '2025-06-07 03:47:25', '2025-06-07 03:47:25', 'customer', NULL, NULL, NULL, 'belum'),
(7, 'arthur12', 'arthur@gmail.com', NULL, '$2y$12$a1vvIUcv2Myd5EdHDf8hXefheVsK8g9t8oz6dooWooT80mACmywXe', '082268299016', 'sini', '1750739779_WIN_20240913_10_52_28_Pro.jpg', NULL, '2025-06-19 10:15:33', '2025-06-24 23:09:10', 'customer', NULL, NULL, 'verifikasi/sim/1SmInF9rxUlDZruWKNGuzdly3uAFGpVgYLx4xo6X.jpg', 'terverifikasi'),
(8, 'Arthur Pg', 'arthursabs354@gmail.com', NULL, '$2y$12$IpMpceUTC3fJ5L1vyQ15Cu0TiQWCATkWw3omzvbJMYkTfHeBsPqwi', NULL, NULL, NULL, NULL, '2025-06-23 23:00:46', '2025-06-23 23:00:46', 'customer', '113173914484627418848', 'https://lh3.googleusercontent.com/a/ACg8ocJFeJuyBRNWg1pKVPlAQHd7yQutiezzv6sZytpXFkhpGRFjxMY=s96-c', NULL, 'belum'),
(9, 'Arthur', 'givemegoodstandpls02@gmail.com', NULL, '$2y$12$LgIcf.E4Gg2XuNUCFAxFKueZbErO08fJ5/Vz2mtE.Lr09FpYlJzHi', '082268299016', 'sini', '1750748113_WIN_20240913_10_52_28_Pro.jpg', NULL, '2025-06-23 23:54:47', '2025-06-23 23:55:13', 'customer', '115880458813335030425', 'https://lh3.googleusercontent.com/a/ACg8ocL2BVXmj8sVsDq4YT5V0tzh-Q8jU9SJtzs7CeLuGGg_X6M8kiA=s96-c', NULL, 'belum'),
(10, 'falih', 'faihilmy@gmail.com', NULL, '$2y$12$FURjTzuDI2LqNF1NvaPgvuW1mFAmifkZGaU30QQ2RRSyK81IOped2', NULL, NULL, NULL, NULL, '2025-06-24 23:11:47', '2025-06-24 23:13:12', 'customer', NULL, NULL, 'verifikasi/sim/thngwufywFCd3jGrvdD9zHLwNmFPCOuMRgtlBBHW.jpg', 'terverifikasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayarans_pemesanan_id_foreign` (`pemesanan_id`);

--
-- Indexes for table `pemesanans`
--
ALTER TABLE `pemesanans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ulasan_id_user_foreign` (`id_user`),
  ADD KEY `ulasan_id_produk_foreign` (`id_produk`),
  ADD KEY `ulasan_id_pesanan_foreign` (`id_pesanan`);

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
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemesanans`
--
ALTER TABLE `pemesanans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD CONSTRAINT `pembayarans_pemesanan_id_foreign` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanans` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
