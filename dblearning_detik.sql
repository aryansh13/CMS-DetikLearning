-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Agu 2024 pada 12.11
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblearning_detik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `divisions`
--

INSERT INTO `divisions` (`id`, `name_division`, `created_at`, `updated_at`) VALUES
(1, 'Marketing', NULL, NULL),
(2, 'IT', NULL, NULL),
(3, 'Human Capital', NULL, NULL),
(4, 'Product', NULL, NULL),
(5, 'Redaksi', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(29, '2024_08_10_061000_create_divisions_table', 1),
(30, '2024_08_10_062010_create_training_topics_table', 2),
(61, '2014_10_12_000000_create_users_table', 3),
(62, '2014_10_12_100000_create_password_reset_tokens_table', 3),
(63, '2019_08_19_000000_create_failed_jobs_table', 3),
(64, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(65, '2024_08_10_071758_create_divisions_table', 3),
(66, '2024_08_10_071812_create_training_topics_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `training_topics`
--

CREATE TABLE `training_topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_division` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `training_topics`
--

INSERT INTO `training_topics` (`id`, `title`, `description`, `id_division`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Foto dan Jurnalistik di Era Digital', 'Kursus “Foto dan Jurnalistik di Era Digital” dalam Digital Journalism Bootcamp memberikan pemahaman mengenai perubahan praktik dan metode jurnalistik akibat perkembangan media sosial. Selain itu,', 5, 'topics/rSdLx9999FVwiMd6g4mKEmid48L4xaW9lOQbc7aM.jpg', '2024-08-10 18:26:58', '2024-08-10 18:26:58'),
(2, 'Memotret Jurnalistik dengan Telepon Genggam', 'Kursus \"Memotret Jurnalistik dengan Telepon Genggam\" dalam Digital Journalism Bootcamp memberikan pemaham mengenai cara praktikal menggunakan telepon genggam sebagai alat memotret untuk jurnalis.', 5, 'topics/rjgHqWnWgODMKsvbptSoP7E3kkUQ2gZCWvao62rA.jpg', '2024-08-10 18:45:30', '2024-08-10 18:45:30'),
(3, 'Memotret Jurnalistik dengan Telepon Genggam', 'Kursus \"Memotret Jurnalistik dengan Telepon Genggam\" dalam Digital Journalism Bootcamp memberikan pemaham mengenai cara praktikal menggunakan telepon genggam sebagai alat memotret untuk jurnalis.', 2, 'topics/vgmaQBnD1QlzdGD62R2XTwUWMaUhZWJhmm6vK7HG.png', '2024-08-10 18:52:36', '2024-08-11 02:19:51'),
(4, 'Memotret Jurnalistik dengan Telepon Genggam', 'Kursus \"Memotret Jurnalistik dengan Telepon Genggam\" dalam Digital Journalism Bootcamp memberikan pemaham mengenai cara praktikal menggunakan telepon genggam sebagai alat memotret untuk jurnalis.', 4, 'topics/zZHe5zBVFJp4WJsO3iKpZhpmwQIk6mYSqikbCWXA.png', '2024-08-10 18:56:39', '2024-08-11 02:20:54'),
(5, 'Foto dan Jurnalistik di Era Digital', 'Kursus “Foto dan Jurnalistik di Era Digital” dalam Digital Journalism Bootcamp memberikan pemahaman mengenai perubahan praktik dan metode jurnalistik akibat perkembangan media sosial. Selain itu,', 3, 'topics/oqfjo6J82iT9TDVOYVQUGhP6AW14EHuxGGg4789J.jpg', '2024-08-10 18:58:26', '2024-08-10 18:58:26'),
(6, 'Mengenal App dan Web App', 'Mari ketahui mengenai aplikasi-aplikasi\r\nyang ada di detikNetwork! Di kursus ini, kamu akan mempelajari secara mendalam mengenai\r\nfitur-fitur aplikasi dan proses pembuatannya.', 3, 'topics/RVXYxsveKmQxrNzMtugkX7fvAoc9HmJsCxae02lO.png', '2024-08-10 19:16:59', '2024-08-11 02:13:46'),
(7, 'aku jga manusia', 'aku jga manusia aku jga manusia aku jga manusia aku jga manusia aku jga manusiaaku jga manusiaaku jga manusiaaku jga manusiaaku jga manusiaaku jga manusiaaku jga manusia aku jga manusia', 2, 'topics/hcfKenLjVD1hkXFTe2rkUkhZ5Uzykgxx5NiG2MWx.png', '2024-08-10 19:44:48', '2024-08-10 19:44:48'),
(8, 'aku jga manusia', 'aku jga manusia aku jga manusiaaku jga manusiaaku jga manusiaaku jga manusiaaku jga manusia aku jga manusia aku jga manusia', 1, 'topics/W8UH0K1Zwl5Io3MvM7ASDRijFa0uEURWfxd33KNg.jpg', '2024-08-10 19:45:37', '2024-08-10 19:45:37'),
(9, 'Social Media for Journalist', 'Mari ketahui cara mengolah konten kreatif\r\nmelalui platform media sosial yang efektif agar mencapai target tertentu. Dampak\r\nsosial media yang begitu besar dapat dimanfaatkan sebaik mungkin untuk\r\nber...', 1, 'topics/tCbpLs5qeyJlRqPGvAbN3aYPvKYxYParboqteuyM.png', '2024-08-10 19:52:10', '2024-08-10 19:52:10'),
(10, 'tutup modal tutup modal', 'tutup modal tutup modal tutup modal tutup modal tutup modal tutup modal tutup modal tutup modaltutup modal tutup modaltutup modal tutup modal', 3, 'topics/BlumBJFwtaPsC6c5IUq6k915hfhBLQpfh2hB5sXw.png', '2024-08-10 19:55:56', '2024-08-10 19:55:56'),
(11, 'Organisasi Perusahaan dan Model Bisnis', 'Pentingnya mengetahui secara lebih dalam terkait organisasi dan bisnis model detikNetwork dapat memudahkan kamu, sebagai tim product untuk menjalankan peran kamu dengan role kalian masing-masing. Dala...', 4, 'topics/xUU1eBw9ZaoMFEaUruarzXgQNnAM2x3eajqty5hZ.png', '2024-08-10 21:24:10', '2024-08-10 21:24:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user@gmail.com', 'user', NULL, '$2y$12$GlX2lO.JWy9bvkwM7GawH.pk8DbiV7qpjBMEigXZsBW7NTouJsWNO', NULL, '2024-08-10 20:45:20', '2024-08-10 20:45:20'),
(2, 'admin', 'admin@gmail.com', 'admin', NULL, '$2y$12$GYh4.ofhljSt0jVIeQ5WJe4hFJG.WL5QgbFep4L02/3nQx3wyN1Wi', NULL, '2024-08-10 23:25:54', '2024-08-10 23:25:54'),
(3, 'user1', 'user1@gmail.com', 'user', NULL, '$2y$12$SDrpWTow8BnINRDCIPs6DuJglylwF/vTWKJLgopgHkmr90JTxnEOS', NULL, '2024-08-11 03:10:30', '2024-08-11 03:10:30');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `training_topics`
--
ALTER TABLE `training_topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `training_topics_id_division_foreign` (`id_division`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `training_topics`
--
ALTER TABLE `training_topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `training_topics`
--
ALTER TABLE `training_topics`
  ADD CONSTRAINT `training_topics_id_division_foreign` FOREIGN KEY (`id_division`) REFERENCES `divisions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
