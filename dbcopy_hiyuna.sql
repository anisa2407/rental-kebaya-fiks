-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2024 at 03:11 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcopy_hiyuna`
--

-- --------------------------------------------------------

--
-- Table structure for table `baju`
--

CREATE TABLE `baju` (
  `id_baju` int(11) NOT NULL,
  `nama_baju` varchar(255) NOT NULL,
  `id_merk` int(11) NOT NULL,
  `kode_baju` varchar(20) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `detail` longtext NOT NULL,
  `harga` int(11) NOT NULL,
  `img1` varchar(255) NOT NULL,
  `img2` varchar(255) NOT NULL,
  `img3` varchar(255) NOT NULL,
  `status_b` enum('active','disable') NOT NULL,
  `tgl_masuk` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tgl_perubahan` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `baju`
--

INSERT INTO `baju` (`id_baju`, `nama_baju`, `id_merk`, `kode_baju`, `deskripsi`, `detail`, `harga`, `img1`, `img2`, `img3`, `status_b`, `tgl_masuk`, `tgl_perubahan`) VALUES
(20, 'Zenaya in Light Rose', 23, 'B0001', '\"Kebaya kita bikin kamu tampil kece dan trendy!\"', 'Dengan mengguakan kebaya kami kamu akan merasa kece dan trendy. Kebaya Zenaya In Light Rose By Embara.\r\nInclude pleated inner, organza tenun outer, selendang tenun, belt \r\nUkuran all size lingkar dada 110 cm dan panjang inner 135 cm ', 250000, 'Zenaya in Light Rose2-652898e57d03f.jpeg', 'Zenaya in Light Rose1-652898e57d8c5.jpeg', 'Zenaya in Light Rose-652898e57e1a8.jpeg', 'active', '2023-10-13 01:09:57', NULL),
(21, 'Serra Dress', 12, 'B0002', 'Kamu pantas tampil eksklusif, dan kami punya kebaya yang cocok untukmu.\"\r\n', 'Dengan menggunakan kebaya kami kamu akan merasa kece dan trendy. Kebaya Serra Dress By Kina Atelier. Include inner, warna kebaya pink rose, dengan ukuran size M. Dress Kebaya ini cocok utnuk di pake saat acara kondangan, tunangan, dan cocok di berbagai tempat', 129000, 'Serra Dress-6528a72164549.jpeg', 'Serra Dress1-6528a72164c84.jpeg', 'Serra Dress2-6528a72165581.jpeg', 'active', '2023-10-13 02:10:41', NULL),
(22, 'Laura Set Kebaya', 17, 'B0003', '\"Ini dia kebaya yang nggak cuma baju biasa. Ini statement style, guys! Jadi, siapa bilang kebaya itu gak kekinian? Kita ngejawabnya dengan koleksi kebaya super modis!\"', 'Dengan menggunakan kebaya kami kamu akan merasa kece dan trendy. Laura Set Kebaya By Jaleela. Include Laura Top Grey by Jaleela, Kiara Skirit Grey by Jaleela, Inner satin longsleeve/ tanktop dan Hijab square warna senada. Sewa Kebaya Ini dijamin ga akan nyesel apalagi yang mau ke pernikahan mantan di jamin mantan nyesel dechhhh. Buruan Sewa Sekarang!!!', 189000, 'Laura Set Kebaya-6528a96b06571.jpeg', 'Laura Set Kebaya-6528a96b06de8.jpeg', 'Laura Set Kebaya2-6528a96b076f7.jpeg', 'active', '2023-10-13 03:08:30', NULL),
(23, 'Magnolia Set', 17, 'B0004', '\"Kebaya ini seperti seni yang bisa kamu pakai.\"\r\n', 'Dengan menggunakan kebaya kami kamu akan merasa kece dan trendy. Kebaya Magnolia Set By Jaleela. Include Outer dengan lingkar dada free size, Panjang Tangan 48cm, Panjang Baju 78 cm, Include Inner Hijab dengan lingkar dada 100 cm, panjang tangan 53 cm , panjang baju 67 cm dan Inner tanktop dengan lingkar dada 100 cm, panjang baju 60 cm', 189000, 'Magnolia2-6528abbdcf142.jpeg', 'Magnolia1-6528abbdcf951.jpeg', 'Magnolia-6528abbdcff3e.jpeg', 'active', '2023-10-13 02:30:21', NULL),
(24, 'Louisa Tunic', 16, 'B0005', '\"Kamu bisa tampil berkelas tanpa harus keluar banyak uang.\"', 'Dengan menggunakan kebaya kami kamu akan merasa kece dan trendy. Kebaya Louisa Tunic By Almahyra. Ukuran size s dengan Lingkar dada 92 cm.Sudah di jamin kalo memakai kebaya dari hiyuna.id ga akan nyesel. Buruan sewa sekarang sebelum tidak tersedia ', 89000, 'Louisa Tunic-6528afb670a9d.jpeg', 'Louisa Tunic 2-6528afb671edb.jpeg', 'Louisa Tunic1-6528afb67289c.jpeg', 'disable', '2023-11-17 05:49:47', NULL),
(25, 'Kyara Dress', 19, 'B0006', '\"Gak perlu capek-capek cari fashion, cukup kebaya dari kami.\"', 'Dengan menggunakan kebaya kami kamu akan merasa kece dan trendy. Kebaya Kyara Dress By Bari Attire. Size lingkar dada 100 cm. Percayakan penampilanmu pada kebaya kami yang berkelas. Dengan bahan berkualitas tinggi dan detail yang sempurna, kamu akan terlihat luar biasa. Sangat cocok di pakai untuk anak muda, dewasa agar terlihat gaul. Buruan sewa Kyara Dress di hiyuna.id dengan harga terjangkau. ', 189000, 'Kiyara Dress1-6528b1f47744e.jpeg', 'Kiyara Dress2-6528b1f477c58.jpeg', 'Kiyara Dress-6528b1f478387.jpeg', 'disable', '2023-11-17 05:49:07', NULL),
(26, 'Pink Sugar', 18, 'B0007', '\"Kebaya impian untuk gaya sehari-hari.\"\r\n', 'Dengan menggunakan kebaya kami kamu akan merasa kece dan trendy.Pink Sugar By Jenni Austin. Include Outer Tanktok dan Hijab, Size M, lingkar dada up to 95 cm, warna kebaya pink sugar cocok untuk party dress.', 189000, 'Pink Sugar1-6528b40925b74.jpeg', 'Pink Sugar-6528b4092642c.jpeg', 'Pink Sugar2-6528b40926de3.jpeg', 'disable', '2023-11-17 05:50:04', NULL),
(27, 'Sinar Asmara ', 21, 'B0008', '\"Kamu pantas tampil fabulous. Pilih kebaya kami!\"', 'Dengan menggunakan kebaya kami kamu akan merasa kece dan trendy. Kebaya Sinar Asmara Set By Batik Tepaselira. Size lingkar dada +120 cm. Percayakan penampilanmu pada kebaya kami yang berkelas. Dengan bahan berkualitas tinggi dan detail yang sempurna, kamu akan terlihat luar biasa. Sangat cocok di pakai untuk anak muda, dewasa agar terlihat gaul. Buruan sewa set top pants  di hiyuna.id dengan harga terjangkau.', 179000, 'Sinar Asmara1-6531f88e5fd5e.jpeg', 'Sinar Asmara-6531f88e68bae.jpeg', 'Sinar Asmara2-6531f88e6931c.jpeg', 'disable', '2023-11-17 05:49:43', NULL),
(28, 'Kebaya Zalina', 17, 'B0009', '\"Tampil stylish, ekonomis, dan chic dengan kebaya ini.\"', 'Dengan menggunakan kebaya kami kamu akan merasa kece dan trendy. Zalina Set Kebaya By Jaleela. Include inner dengan lingkar dada 100cm, lingkar ketiak 48cm, panjang tangan 51cm, panjang baju  66cm. Include outer dengan lingkar dada 102cm, lingkar ketiak 50cm, panjang tangan 52cm, panjang baju depan 93cm, panjang baju belakang 77cm dan Pilihan Warna Pale Mauve. Tunggu apalagi mending kalian sewa kebaya ini di jamin semua orang terpana lihat kamu memakai kebaya hiyuna.id!!', 199000, 'Kebaya Zalina-6531fd5c1e8fa.jpeg', 'Kebaya Zalina1-6531fd5c1eb56.jpeg', 'Kebaya Zalina2-6531fd5c1edc2.jpeg', 'disable', '2023-11-17 05:49:06', NULL),
(29, 'Zaara Dress', 25, 'B0010', '\"Kamu gak akan pernah salah pilih dengan kebaya kami.\"', 'Dengan menggunakan kebaya kami kamu akan merasa kece dan trendy. Zaara Dress berwarna krem dengan kerudung yang serasi untuk detail yang lebih halus By Jakahong di jamin menggunakan kebaya ini kamu nggak bakal menyesal sewa kebaya dari kami. Dengan beragam gaya dan desain, kami punya yang sesuai dengan selera kamu. Yukk gess di sewa jangan hanya di lihat. Lingkar dada  100cm dan panjang baju 135cm sudah include semuanya.', 250000, 'Zaara Dress in Beige-6531ffed872c0.jpeg', 'Zaara Dress in Beige1-6531ffed87534.jpeg', 'Zaara Dress in Beige2-6531ffed876fb.jpeg', 'disable', '2023-11-17 05:49:17', NULL),
(30, 'Lilyana Dress', 24, 'B0011', '\"Ini dia kebaya yang nggak cuma baju biasa. Ini statement style, guys! Jadi, siapa bilang kebaya itu gak kekinian? Kita ngejawabnya dengan koleksi kebaya super modis!\"', 'Dengan menggunakan kebaya kami kamu akan merasa kece dan trendy. Lilyana Dress By Klambi. Sewa Kebaya Ini dijamin ga akan nyesel apalagi yang mau ke pernikahan mantan di jamin mantan nyesel dechhhh. Buruan Sewa Sekarang!!!\r\n', 169000, 'Lilyana Dress in Lilac Taupe-6536cdc35ae7d.jpeg', 'Lilyana Dress in Lilac Taupe1-6536cdc35b149.jpeg', 'Lilyana Dress in Lilac Taupe2-6536cdc35b348.jpeg', 'disable', '2023-11-17 05:49:56', NULL),
(31, 'Coba Dulu Gaes', 20, 'B003', 'dcbsk', 'san c<v', 10000000, 'detail-65582cad31c87.png', 'shopping-cart-65582cad3218a.png', 'shopping-cart-65582cad326e7.png', 'active', '2023-11-18 03:17:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_baju` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `biaya_kirim` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `alamat_d` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `kode_booking` int(11) NOT NULL,
  `status_t` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `id_user`, `id_baju`, `email`, `tgl_mulai`, `tgl_selesai`, `biaya_kirim`, `total_harga`, `alamat_d`, `pesan`, `kode_booking`, `status_t`) VALUES
(5, 1, 21, 'ns@gmail.com', '2023-11-21', '2023-11-22', 15000, 144000, 'Jl. Cempaka Komplek Djuanda No.35 ', 'Include Inner', 81351744, '3'),
(7, 1, 22, 'ayuuu@gmail.com', '2023-11-23', '2023-11-24', 15000, 204000, 'jl apa aja', 'vada', 459304531, '0'),
(8, 1, 31, 'nsa@gmail.com', '2023-11-24', '2023-11-25', 15000, 10015000, 'JL. Cendra Komplek 21', '123', 74975903, '3'),
(11, 1, 26, 'ayuuu@gmail.com', '2023-12-08', '2023-12-14', 15000, 1149000, 'Jl. Cempaka Komplek Djuanda No.35 ', 'pesa cod', 1628441126, '2'),
(12, 1, 25, 'ayuuu@gmail.com', '2024-06-20', '2024-06-22', 15000, 393000, 'jl angin 123', 'sjhgaifgiw', 987366391, '0');

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `id_merk` int(11) NOT NULL,
  `nama_merk` varchar(100) NOT NULL,
  `tgl_masuk` timestamp NOT NULL DEFAULT current_timestamp(),
  `tgl_perubahan` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`id_merk`, `nama_merk`, `tgl_masuk`, `tgl_perubahan`) VALUES
(12, 'Kina Atelier', '2023-11-13 20:51:07', NULL),
(13, 'Aleza', '2023-10-08 07:09:23', '2023-11-13 20:52:32'),
(14, 'Zumaru', '2023-10-08 07:12:30', NULL),
(15, 'Agafia', '2023-10-08 07:13:15', NULL),
(16, 'Almahyra', '2023-10-08 07:14:10', NULL),
(17, 'Jaleela', '2023-10-08 07:17:18', NULL),
(18, 'Jenni Austin', '2023-10-08 07:19:10', NULL),
(19, 'Bari Attire', '2023-10-08 07:19:29', NULL),
(20, 'Sarah Dewanto', '2023-10-08 07:22:03', NULL),
(21, 'Batik Tepaselira', '2023-10-08 07:22:30', NULL),
(23, 'Embara', '2023-10-08 07:23:24', NULL),
(24, 'Klambi Atelier', '2023-10-08 07:50:48', NULL),
(25, 'Jakahong', '2023-10-08 07:54:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_booking` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_booking`, `nama`, `bukti`) VALUES
(1, 62, 'fitria anisa fadila', 'detail-6558503e8f95b-png'),
(2, 61, 'nisa', 'PIXECT-20231112170235-655855e5d4e78-jpg'),
(7, 5, 'fitria anisa fadila', 'shopping-cart-655b09649fc3d-png'),
(11, 11, 'fitria anisa fadila', 'activtylogin.drawio-657108581d55f.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `ktp` varchar(255) NOT NULL,
  `kk` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `tgl_registrasi` timestamp NOT NULL DEFAULT current_timestamp(),
  `tgl_update` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `password`, `no_hp`, `alamat`, `ktp`, `kk`, `role`, `tgl_registrasi`, `tgl_update`) VALUES
(11, 'adminhiyuna', 'adminyuna1@gmail.com', '$2y$10$V4wvdQZZu/HThap8brZ/OetcqjzRdhAjKpX2X5mj9Hb7DFlGT9Q4S', '081133449021', 'Jl. Garden', 'Screenshot (6)-654ecf3ca715c.png', 'Screenshot (7)-654ecf3ca7934.png', 2, '2023-11-11 00:47:56', '2024-06-20 12:54:12'),
(12, 'user cica', 'user1@gmail.com', '$2y$10$H19cgdzvKjDtSDeNuNenO.azzIoWBhsvRUw.Mau9ytAjffh.Z41qq', '081574289181', 'Jl. Sakura Glow', 'Seblak is a spicy food native to Indonesia_ Usually a portion consists of chicken feet, eggs, squid, suki etc_-654edba5830cd.jpg', 'Premium Vector _ Cute takoyaki illustration in flat design-654edba58392d.jpg', 1, '2023-11-11 01:40:53', NULL),
(13, 'hiyuna ', 'hiiyuna@gmail.com', '$2y$10$AB7iwTgW5bKWxr4jpIDNkuzHZesBYH0Yx32KISpJBMCDL8oTt3PqG', '081232170989', 'Jl. Cendra', 'class diagram puskesmas-654eed7b4452e.png', 'Screenshot (1)-654eed7b44df5.png', 1, '2023-11-11 02:56:59', NULL),
(14, 'ratu ayu', 'ayuuu@gmail.com', '$2y$10$BAqrmv6AmkvFi9pKCl5KAOGLzQJ4z4bi4aaE6LAPETTfbtDFlMoay', '089991831436', 'Jl. Mindi', 'Screenshot (3)-654ef6c084d27.png', 'Screenshot (4)-654ef6c085446.png', 1, '2023-11-11 03:36:32', NULL),
(15, 'hwang in yeop', 'hwang@gmail.com', '$2y$10$gpZYGhGbMGbnuerWVljL8Of2mliXzZ5cydN0/MlomW5AJGmAOCgMG', '089812345623', 'Jl. Korea Selatan ', 'rent.drawio-655211f196a41.png', 'usecasekebaya.drawio-655211f1991ac.png', 1, '2023-11-13 12:09:21', NULL),
(16, 'cicaaaaa', 'cicassz518@gmail.com', '$2y$10$4wfcCL07GYZ9iNpQHpwOsOs13texFVW6WRLMGnNuc9dAZwcdo8k42', '081574289181', 'Jl. Sakura Glow', 'rent.drawio-65528123c0883.png', 'usecasekebaya.drawio-65528123c0d22.png', 2, '2023-11-13 20:03:47', '2023-11-14 00:12:57'),
(17, 'zahra  nur fadilah', 'zahra@gmail.com', '$2y$10$gcZrzG0x.ZGuSHOL1TWxsOMlqDAEFoIERHvWwoDcX4CjFeDqmjRnq', '089676567612', 'Jl. Sakura Glow', 'Screenshot (1)-6552bf1991e71.png', 'Screenshot (3)-6552bf199294f.png', 1, '2023-11-14 00:28:09', NULL),
(18, 'fitria anisa fadila', 'ns@gmail.com', '$2y$10$Rp6dqNq/kvGzvHaU2gxIg.d8UQZAO92Lw9vo6dHYvAUg55ZmG0UsC', '081574289181', 'Jl. Korea Utara Gg 5', 'shopping-cart-655b06943a655.png', 'account-655b06943adc8.png', 1, '2023-11-20 07:11:16', NULL),
(19, 'fitria anisa fadila', 'nsa@gmail.com', '$2y$10$5eZ55XX0EbnR.U6culPmVe4OMXKvdmY5vmKgyn6mA/3yGwTvOyNN6', '091234758321', 'Jl. Sakura Glow', 'shopping-cart-655e990049a28.png', 'detail-655e99004caf1.png', 1, '2023-11-23 00:12:48', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baju`
--
ALTER TABLE `baju`
  ADD PRIMARY KEY (`id_baju`),
  ADD KEY `id_merk` (`id_merk`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_baju` (`id_baju`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_booking` (`id_booking`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baju`
--
ALTER TABLE `baju`
  MODIFY `id_baju` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
  MODIFY `id_merk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baju`
--
ALTER TABLE `baju`
  ADD CONSTRAINT `baju_ibfk_1` FOREIGN KEY (`id_merk`) REFERENCES `merk` (`id_merk`) ON DELETE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_booking`) REFERENCES `booking` (`id_booking`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
