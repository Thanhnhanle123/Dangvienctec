-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2021 at 07:43 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dangvien`
--

-- --------------------------------------------------------

--
-- Table structure for table `a_i_cauhois`
--

CREATE TABLE `a_i_cauhois` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cauHoi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `a_i_dapans`
--

CREATE TABLE `a_i_dapans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cauHoi_id` int(11) NOT NULL,
  `traLoi_id` int(11) NOT NULL,
  `dapAn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `a_i_tralois`
--

CREATE TABLE `a_i_tralois` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `traLoi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chibos`
--

CREATE TABLE `chibos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maChiBo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenChiBo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chibos`
--

INSERT INTO `chibos` (`id`, `maChiBo`, `tenChiBo`, `created_at`, `updated_at`) VALUES
(1, 'cba', 'Chi bộ a', '2021-10-04 11:17:22', '2021-10-04 11:17:22');

-- --------------------------------------------------------

--
-- Table structure for table `chucvus`
--

CREATE TABLE `chucvus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maChucVu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenChucVu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chucvus`
--

INSERT INTO `chucvus` (`id`, `maChucVu`, `tenChucVu`, `created_at`, `updated_at`) VALUES
(1, 'GD', 'Giám Đốc', '2021-10-04 11:17:03', '2021-10-04 11:17:03');

-- --------------------------------------------------------

--
-- Table structure for table `c_c_c_d_s`
--

CREATE TABLE `c_c_c_d_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `CCCD` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngayCap` date NOT NULL,
  `noiCap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `c_c_c_d_s`
--

INSERT INTO `c_c_c_d_s` (`id`, `CCCD`, `ngayCap`, `noiCap`, `created_at`, `updated_at`) VALUES
(1, '0123456789', '2021-10-14', 'Cần thơ', '2021-10-04 11:20:47', '2021-10-04 11:20:47'),
(2, '0123456789', '2021-10-03', 'Cần thơ', '2021-10-04 12:14:02', '2021-10-04 12:14:02');

-- --------------------------------------------------------

--
-- Table structure for table `dangvienchuyendis`
--

CREATE TABLE `dangvienchuyendis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dangVien_ma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngayChuyenDi` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dangvienchuyendis`
--

INSERT INTO `dangvienchuyendis` (`id`, `dangVien_ma`, `ngayChuyenDi`, `created_at`, `updated_at`) VALUES
(1, '1', '2021-10-05', '2021-10-04 11:45:43', '2021-10-04 11:45:43');

-- --------------------------------------------------------

--
-- Table structure for table `dangviens`
--

CREATE TABLE `dangviens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maDangVien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoLot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenGoiKhac` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioiTinh` tinyint(1) NOT NULL,
  `ngaySinh` date NOT NULL,
  `noiSinh_ma` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `CCCD_id` int(11) NOT NULL,
  `danToc_ma` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tonGiao_ma` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `quocTich` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queQuan_ma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diaChiThuongTru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noiOHienTai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dienThoaiCoQuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dienThoaiNha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dienThoaiCaNhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhTrangHonNhan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thanhPhanXuatThan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dienUuTien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nangKhieu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soTruong` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinhTrangSucKhoe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `khuyetTat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trinhDoVanHoa_ma` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ngoaiNgu_ma` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tinHoc_ma` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `chucVu_ma` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `chiBo_ma` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dangviens`
--

INSERT INTO `dangviens` (`id`, `maDangVien`, `hoLot`, `ten`, `tenGoiKhac`, `gioiTinh`, `ngaySinh`, `noiSinh_ma`, `CCCD_id`, `danToc_ma`, `tonGiao_ma`, `quocTich`, `queQuan_ma`, `diaChiThuongTru`, `noiOHienTai`, `dienThoaiCoQuan`, `dienThoaiNha`, `dienThoaiCaNhan`, `email`, `tinhTrangHonNhan`, `thanhPhanXuatThan`, `dienUuTien`, `nangKhieu`, `soTruong`, `tinhTrangSucKhoe`, `khuyetTat`, `trinhDoVanHoa_ma`, `ngoaiNgu_ma`, `tinHoc_ma`, `chucVu_ma`, `chiBo_ma`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'dv1', 'Lê', 'Thành Nhân', 'Nhân Ctec', 0, '2021-10-19', 'CT', 1, 'K', '0', '1', 'CT', 'Cờ Đỏ, Cần Thơ', 'Cờ Đỏ, Cần Thơ', NULL, NULL, '0932146687', 'lethanhnhancantho65@gmail.com', NULL, NULL, NULL, NULL, NULL, 'Tốt', NULL, '12', 'AVA', 'THG', 'GD', 'cba', '2021-10-04 11:44:11', '2021-10-04 11:45:43', '2021-10-04 11:45:43'),
(2, 'dv2', 'Lê', 'Thành Nhân', 'Nhân', 0, '2001-07-09', 'CT', 2, 'K', 'Pg', '1', 'CT', 'Cờ Đỏ, Cần Thơ', 'Cờ Đỏ, Cần Thơ', NULL, NULL, '123564867', 'lethanhnhancantho65@gmail.com', NULL, NULL, NULL, NULL, NULL, 'Tốt', NULL, '12', 'AVA', 'THG', 'GD', 'cba', '2021-10-04 12:14:02', '2021-10-04 12:14:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dantocs`
--

CREATE TABLE `dantocs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maDanToc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenDanToc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dantocs`
--

INSERT INTO `dantocs` (`id`, `maDanToc`, `tenDanToc`, `created_at`, `updated_at`) VALUES
(1, 'K', 'Kinh', '2021-10-04 11:14:45', '2021-10-04 11:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_08_16_011133_create_dantocs_table', 1),
(4, '2021_08_16_064141_create_tongiaos_table', 1),
(5, '2021_08_16_071804_create_quoctiches_table', 1),
(6, '2021_08_16_072125_create_trinhdovanhoas_table', 1),
(7, '2021_08_16_120402_create_ngoaingus_table', 1),
(8, '2021_08_16_171129_create_tinhocs_table', 1),
(9, '2021_08_17_064619_create_chucvus_table', 1),
(10, '2021_08_17_105220_create_dangviens_table', 1),
(11, '2021_08_18_070412_create_c_c_c_d_s_table', 1),
(12, '2021_08_22_111825_create_chibos_table', 1),
(13, '2021_08_22_131108_add_column_dang_vien_chuyen_di_table', 1),
(14, '2021_08_22_151731_create_dangvienchuyendis_table', 1),
(15, '2021_08_23_112952_create_thanhphos_table', 1),
(16, '2021_08_23_172647_create_quantriviens_table', 1),
(17, '2021_08_24_143655_create_a_i_cauhois_table', 1),
(18, '2021_08_24_144040_create_a_i_tralois_table', 1),
(19, '2021_08_24_144250_create_a_i_dapans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ngoaingus`
--

CREATE TABLE `ngoaingus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maNgoaiNgu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenNgoaiNgu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trinhDo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngoaingus`
--

INSERT INTO `ngoaingus` (`id`, `maNgoaiNgu`, `tenNgoaiNgu`, `trinhDo`, `created_at`, `updated_at`) VALUES
(1, 'AVA', 'Anh Văn', 'topic 650', '2021-10-04 11:16:03', '2021-10-04 11:16:03');

-- --------------------------------------------------------

--
-- Table structure for table `quantriviens`
--

CREATE TABLE `quantriviens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_show` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenNguoiDung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quantriviens`
--

INSERT INTO `quantriviens` (`id`, `userName`, `password`, `password_show`, `tenNguoiDung`, `created_at`, `updated_at`) VALUES
(2, 'admin', '$2y$10$qZnKW.gDHtQoiq5KM7XRDudpyB.At6u1XE1b4NEWerX7sJKIsp876', 'Thanhnhan12303', 'Lê Thành Nhân', '2021-10-04 12:36:51', '2021-10-04 12:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `quoctiches`
--

CREATE TABLE `quoctiches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maQuocTich` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenQuocTich` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thanhphos`
--

CREATE TABLE `thanhphos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maThanhPho` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `tenThanhPho` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thanhphos`
--

INSERT INTO `thanhphos` (`id`, `maThanhPho`, `tenThanhPho`, `created_at`, `updated_at`) VALUES
(1, 'CT', 'Cần Thơ', '2021-10-04 11:13:38', '2021-10-04 11:13:38');

-- --------------------------------------------------------

--
-- Table structure for table `tinhocs`
--

CREATE TABLE `tinhocs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maTinHoc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenTinHoc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tinhocs`
--

INSERT INTO `tinhocs` (`id`, `maTinHoc`, `tenTinHoc`, `loai`, `created_at`, `updated_at`) VALUES
(1, 'THG', 'Tin học', 'Giỏi', '2021-10-04 11:16:29', '2021-10-04 11:16:29');

-- --------------------------------------------------------

--
-- Table structure for table `tongiaos`
--

CREATE TABLE `tongiaos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maTonGiao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenTonGiao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tongiaos`
--

INSERT INTO `tongiaos` (`id`, `maTonGiao`, `tenTonGiao`, `created_at`, `updated_at`) VALUES
(1, 'Pg', 'Phật  giáo', '2021-10-04 11:15:10', '2021-10-04 11:15:10');

-- --------------------------------------------------------

--
-- Table structure for table `trinhdovanhoas`
--

CREATE TABLE `trinhdovanhoas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maTrinhDo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenTrinhDo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trinhdovanhoas`
--

INSERT INTO `trinhdovanhoas` (`id`, `maTrinhDo`, `tenTrinhDo`, `created_at`, `updated_at`) VALUES
(1, '12', '12/12', '2021-10-04 11:15:23', '2021-10-04 11:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a_i_cauhois`
--
ALTER TABLE `a_i_cauhois`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `a_i_dapans`
--
ALTER TABLE `a_i_dapans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `a_i_tralois`
--
ALTER TABLE `a_i_tralois`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chibos`
--
ALTER TABLE `chibos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chucvus`
--
ALTER TABLE `chucvus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_c_c_d_s`
--
ALTER TABLE `c_c_c_d_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dangvienchuyendis`
--
ALTER TABLE `dangvienchuyendis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dangviens`
--
ALTER TABLE `dangviens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dantocs`
--
ALTER TABLE `dantocs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ngoaingus`
--
ALTER TABLE `ngoaingus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quantriviens`
--
ALTER TABLE `quantriviens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quoctiches`
--
ALTER TABLE `quoctiches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thanhphos`
--
ALTER TABLE `thanhphos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tinhocs`
--
ALTER TABLE `tinhocs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tongiaos`
--
ALTER TABLE `tongiaos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trinhdovanhoas`
--
ALTER TABLE `trinhdovanhoas`
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
-- AUTO_INCREMENT for table `a_i_cauhois`
--
ALTER TABLE `a_i_cauhois`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `a_i_dapans`
--
ALTER TABLE `a_i_dapans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `a_i_tralois`
--
ALTER TABLE `a_i_tralois`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chibos`
--
ALTER TABLE `chibos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chucvus`
--
ALTER TABLE `chucvus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `c_c_c_d_s`
--
ALTER TABLE `c_c_c_d_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dangvienchuyendis`
--
ALTER TABLE `dangvienchuyendis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dangviens`
--
ALTER TABLE `dangviens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dantocs`
--
ALTER TABLE `dantocs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ngoaingus`
--
ALTER TABLE `ngoaingus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quantriviens`
--
ALTER TABLE `quantriviens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quoctiches`
--
ALTER TABLE `quoctiches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thanhphos`
--
ALTER TABLE `thanhphos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tinhocs`
--
ALTER TABLE `tinhocs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tongiaos`
--
ALTER TABLE `tongiaos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trinhdovanhoas`
--
ALTER TABLE `trinhdovanhoas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
