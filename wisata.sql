-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2021 at 12:16 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `keterangan` varchar(5000) NOT NULL,
  `status_fasilitas` int(11) NOT NULL,
  `status_delete` int(11) NOT NULL,
  `is_tiket` int(11) NOT NULL,
  `id_kateg_fasilitas` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `keterangan`, `status_fasilitas`, `status_delete`, `is_tiket`, `id_kateg_fasilitas`, `id_wisata`) VALUES
(1, '<p>tiket pesawat</p>', 1, 0, 1, 3, 1),
(2, '<p>tiket pesawat</p>', 1, 1, 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `itenerary`
--

CREATE TABLE `itenerary` (
  `id_itenerary` int(11) NOT NULL,
  `hari` varchar(100) NOT NULL,
  `tujuan` varchar(500) NOT NULL,
  `keterangan` varchar(5000) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `status_itenerary` int(11) NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itenerary`
--

INSERT INTO `itenerary` (`id_itenerary`, `hari`, `tujuan`, `keterangan`, `id_wisata`, `status_itenerary`, `status_delete`) VALUES
(1, '2 day', 'jakarta', '<p>jakaarta</p>', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_fasilitas`
--

CREATE TABLE `kategori_fasilitas` (
  `id_kateg_fasilitas` int(11) NOT NULL,
  `kategori_wisata` varchar(50) NOT NULL,
  `status_delete` int(11) NOT NULL,
  `status_kateg_fasilitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_fasilitas`
--

INSERT INTO `kategori_fasilitas` (`id_kateg_fasilitas`, `kategori_wisata`, `status_delete`, `status_kateg_fasilitas`) VALUES
(1, 'include', 0, 1),
(2, 'exclude', 0, 0),
(3, 'testing', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `nama_komentar` varchar(20) NOT NULL,
  `isi` varchar(500) NOT NULL,
  `tgl_komentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `lokasi` varchar(200) NOT NULL,
  `status_lokasi` int(11) NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `lokasi`, `status_lokasi`, `status_delete`) VALUES
(1, 'Bali', 1, 0),
(2, 'Pulau Nusa Dua', 1, 0),
(4, 'Thailand', 0, 0),
(5, 'Singapur', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oborolan`
--

CREATE TABLE `oborolan` (
  `id_oborolan` int(11) NOT NULL,
  `nama_pengirim` int(11) NOT NULL,
  `nama_penerima` int(11) NOT NULL,
  `oborolan` varchar(200) NOT NULL,
  `status_oborolan` int(11) NOT NULL,
  `tgl_oboralan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `paket_wisata`
--

CREATE TABLE `paket_wisata` (
  `id_wisata` int(11) NOT NULL,
  `nama_wisata` varchar(500) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `id_trip` int(11) DEFAULT NULL,
  `status_wisata` int(11) NOT NULL,
  `status_delete` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `jumlah_orang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket_wisata`
--

INSERT INTO `paket_wisata` (`id_wisata`, `nama_wisata`, `id_lokasi`, `waktu`, `harga`, `id_trip`, `status_wisata`, `status_delete`, `image`, `jumlah_orang`) VALUES
(1, 'Pulau Nusa', 1, '3d2n', 10000, 1, 1, 0, '1610206985.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pengguna`, `nama`, `email`, `username`, `password`, `alamat`, `tgl_lahir`) VALUES
(1, 'lina', 'lina@gmail.com', 'lina', '12345', 'jakarta', '2021-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `nomor_pemesanan` varchar(200) NOT NULL,
  `status_pemesanan` int(11) NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `total` int(11) NOT NULL,
  `pembayaran` int(11) NOT NULL,
  `bukti_pembayaran` varchar(200) DEFAULT NULL,
  `tgl_wisata` date NOT NULL,
  `status_delete` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `status_approve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `nomor_pemesanan`, `status_pemesanan`, `tgl_pemesanan`, `total`, `pembayaran`, `bukti_pembayaran`, `tgl_wisata`, `status_delete`, `id_pelanggan`, `nama_pelanggan`, `status_approve`) VALUES
(1, 'S001', 1, '2021-01-10', 10000, 1, '0', '2021-01-04', 0, 1, 'lina', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_detail`
--

CREATE TABLE `pemesanan_detail` (
  `id_pemesanan_detail` int(11) NOT NULL,
  `nama_wisata` varchar(200) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nomor_pemesanan` varchar(200) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `trip` varchar(100) NOT NULL,
  `waktu` varchar(50) NOT NULL,
  `status_delete` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `dari_tgl_wisata` date NOT NULL,
  `sampai_tgl_wisata` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan_detail`
--

INSERT INTO `pemesanan_detail` (`id_pemesanan_detail`, `nama_wisata`, `jumlah`, `nomor_pemesanan`, `lokasi`, `trip`, `waktu`, `status_delete`, `id_wisata`, `dari_tgl_wisata`, `sampai_tgl_wisata`) VALUES
(2, 'Pulau Nusa Dua', 10000, 'S001', 'Bali', 'One Day', '3d2n', 0, 1, '2021-01-10', '2021-01-24');

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
  `id_refund` int(11) NOT NULL,
  `nomor_pemesanan` varchar(100) NOT NULL,
  `total_sebelum` int(11) NOT NULL,
  `total_refund` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `trip` int(100) NOT NULL,
  `status_approve` int(11) NOT NULL,
  `datri_tgl_wisata` date NOT NULL,
  `sampai_tgl_wisata` date NOT NULL,
  `nama_wisata` varchar(100) NOT NULL,
  `id_pelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reschedule`
--

CREATE TABLE `reschedule` (
  `id_reschedule` int(11) NOT NULL,
  `nomor_pemesanan` varchar(100) NOT NULL,
  `total_sebelum` int(11) NOT NULL,
  `total_reschedule` int(11) NOT NULL,
  `status_delete` int(11) NOT NULL,
  `dari_tgl_wisata` date NOT NULL,
  `sampai_tgl_wisata` date NOT NULL,
  `nama_wisata` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `trip` varchar(100) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `status_approve` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `id_pelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reschedule`
--

INSERT INTO `reschedule` (`id_reschedule`, `nomor_pemesanan`, `total_sebelum`, `total_reschedule`, `status_delete`, `dari_tgl_wisata`, `sampai_tgl_wisata`, `nama_wisata`, `lokasi`, `trip`, `waktu`, `status_approve`, `nama_pelanggan`, `id_pelanggan`) VALUES
(1, 'S002', 10000, 5000, 0, '2021-01-10', '2021-01-19', 'Pulau Nusa Dua', 'Bali', 'One Day', '3d2n', 0, 'lina', 1);

-- --------------------------------------------------------

--
-- Table structure for table `syarat`
--

CREATE TABLE `syarat` (
  `id_syarat` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `keterangan` varchar(5000) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `status_syarat` int(11) NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `syarat`
--

INSERT INTO `syarat` (`id_syarat`, `judul`, `keterangan`, `id_wisata`, `status_syarat`, `status_delete`) VALUES
(1, 'Pembayaran', '<p>- testing</p>', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tanggal_wisata`
--

CREATE TABLE `tanggal_wisata` (
  `dari_tanggal` date NOT NULL,
  `sampai_tanggal` date NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `status_delete` int(11) NOT NULL,
  `id_tanggal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanggal_wisata`
--

INSERT INTO `tanggal_wisata` (`dari_tanggal`, `sampai_tanggal`, `id_wisata`, `status_delete`, `id_tanggal`) VALUES
('2020-01-08', '2020-01-31', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tiket_pemesanan`
--

CREATE TABLE `tiket_pemesanan` (
  `id_tiket_pemesanan` int(11) NOT NULL,
  `nama_pemesanan` varchar(200) NOT NULL,
  `nomor_pemesanan` int(11) NOT NULL,
  `status_delete` int(11) NOT NULL,
  `nama_wisata` varchar(100) NOT NULL,
  `id_wisata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

CREATE TABLE `trip` (
  `id_trip` int(11) NOT NULL,
  `trip` varchar(200) NOT NULL,
  `status_trip` int(11) NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`id_trip`, `trip`, `status_trip`, `status_delete`) VALUES
(1, 'One Day', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `activation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `activation_code`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Ani', 'admin@gmail.com', '$2y$10$qhtL.SNj9beiX46VLG3Li.ENIis1tmtxAf8.5n5pOFpnl9hLnspUC', '', 1, 'XOXcdAczPn99QiVGNdudmF3DxIz9oSXysPHrnTkmQQk9vZUKr9LwZqcXjYT3', '2015-07-19 14:12:20', '2015-07-19 14:13:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `itenerary`
--
ALTER TABLE `itenerary`
  ADD PRIMARY KEY (`id_itenerary`);

--
-- Indexes for table `kategori_fasilitas`
--
ALTER TABLE `kategori_fasilitas`
  ADD PRIMARY KEY (`id_kateg_fasilitas`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `oborolan`
--
ALTER TABLE `oborolan`
  ADD PRIMARY KEY (`id_oborolan`);

--
-- Indexes for table `paket_wisata`
--
ALTER TABLE `paket_wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
  ADD PRIMARY KEY (`id_pemesanan_detail`);

--
-- Indexes for table `reschedule`
--
ALTER TABLE `reschedule`
  ADD PRIMARY KEY (`id_reschedule`);

--
-- Indexes for table `syarat`
--
ALTER TABLE `syarat`
  ADD PRIMARY KEY (`id_syarat`);

--
-- Indexes for table `tanggal_wisata`
--
ALTER TABLE `tanggal_wisata`
  ADD PRIMARY KEY (`id_tanggal`);

--
-- Indexes for table `tiket_pemesanan`
--
ALTER TABLE `tiket_pemesanan`
  ADD PRIMARY KEY (`id_tiket_pemesanan`);

--
-- Indexes for table `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`id_trip`);

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
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `itenerary`
--
ALTER TABLE `itenerary`
  MODIFY `id_itenerary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori_fasilitas`
--
ALTER TABLE `kategori_fasilitas`
  MODIFY `id_kateg_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `oborolan`
--
ALTER TABLE `oborolan`
  MODIFY `id_oborolan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paket_wisata`
--
ALTER TABLE `paket_wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
  MODIFY `id_pemesanan_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reschedule`
--
ALTER TABLE `reschedule`
  MODIFY `id_reschedule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `syarat`
--
ALTER TABLE `syarat`
  MODIFY `id_syarat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tanggal_wisata`
--
ALTER TABLE `tanggal_wisata`
  MODIFY `id_tanggal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tiket_pemesanan`
--
ALTER TABLE `tiket_pemesanan`
  MODIFY `id_tiket_pemesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trip`
--
ALTER TABLE `trip`
  MODIFY `id_trip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
