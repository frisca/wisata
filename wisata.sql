-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 20 Jan 2021 pada 18.53
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

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
-- Struktur dari tabel `data_pemesan`
--

CREATE TABLE `data_pemesan` (
  `nama_pemesan` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomor_pemesanan` varchar(200) NOT NULL,
  `hp` varchar(200) NOT NULL,
  `id_data_pemesan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pemesan`
--

INSERT INTO `data_pemesan` (`nama_pemesan`, `alamat`, `email`, `nomor_pemesanan`, `hp`, `id_data_pemesan`) VALUES
('nila', 'nila3', 'test@gmail.com', '001', '823', 34),
('ktyi', 'kiyri', 'test@gmail.com', '002', '097', 35);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
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
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `keterangan`, `status_fasilitas`, `status_delete`, `is_tiket`, `id_kateg_fasilitas`, `id_wisata`) VALUES
(1, '<p>tiket pesawat</p>', 1, 0, 1, 3, 1),
(2, '<p>tiket pesawat</p>', 1, 0, 1, 3, 2),
(3, '<p>tiekt</p>', 1, 0, 1, 1, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `itenerary`
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
-- Dumping data untuk tabel `itenerary`
--

INSERT INTO `itenerary` (`id_itenerary`, `hari`, `tujuan`, `keterangan`, `id_wisata`, `status_itenerary`, `status_delete`) VALUES
(1, '1 day', 'Bali', '<br>a.	ITENERARY PAKET WISATA PULAU NUSA PENIDA\r\nDAY 1 (Broken Beach, Angel Bilabong, Kelingking Beach, Paluang Cliff, dan Crystal bay)\r\n-	07.30 Meeting Point di Pantai Sanur Jalan Hang Tuah (Dekat Warung Makan Mak Beng) untuk pengambilan tiket speedboat dan konfirmasi kehadiran di loket boat di Sanur\r\n-	08.00 Berangkat menuju Nusa Penida dengan Speedboat dengan lama perjalanan 40 menit\r\n-	08.45 Tiba di Pulau Nusa Penida. Driver siap jemput dengan membawa papan nama tamu\r\n-	10.00 Tiba di Obyek pertama Broken Beach, melihat keunikan pantai dengan tebing yang berlubang di tengah- tengahnya\r\n-	10.30 Tiba di Obyek kedua Angel Bilabong, kolam renang alami pada cekungan tebing. Bisa ambil aktivitas berenang\r\n-	12.30 Makan siang\r\n-	13.00 Tiba di obyek ke tiga Kelingking Beach, menikmati indahnya bukit kelingking yang berbentuk seperti kepala dinosaurus. Bisa juga mengambil aktivitas menuruni bukit untuk mencapai pantai kelingking\r\n-	13.30 Tiba di obyek ke empat, Paluang Cliff. Lokasi ini menikmati pesona bukit kelingking dari Belakang.\r\n-	15.00 Lokasi obyek ke lima di Crystal Bay melihat hamparan pantai dengan panorama atol di tengah laut atau bisa juga melakukan aktivitas berenang di pantai\r\n-	16.00 Kembali ke pelabuhan Nusa Penida, check in Tiket Penyebrangan di Loket Speadboat\r\n-	17.00 Kembali ke Pantai Sanur dengan Speedboat\r\n-	17.40 Tiba di pantai Sanur\r\n\r\nb.	FASILITAS PAKET WISATA PULAU NUSA PENIDA\r\nINCLUDE\r\n-	Kendaraan\r\n-	Speedboat\r\n-	Makan 1 kali\r\n-	Tiket selama tour\r\n-	Air Mineral selama trip\r\nEXCLUDE\r\n-	Makan diluar program\r\n-	Belanja Pribadi\r\n-	Tips\r\n</br>', 1, 1, 0),
(2, '3 day', 'Bali', '<p>a. ITENERARY PAKET WISATA BALI\r\n\r\nDay 1 (GWK – Uluwatu)\r\n-	Pickup di Bandara Internasional I Gusti Ngurah Rai Bali\r\n-	Check in di Hotel\r\n-	Mengunjungi Garuda Wisnu Kencana (GWK)\r\n-	Makan siang disekitar GWK\r\n-	Menuju Uluwatu\r\n-	Makan malam disekitar Uluwatu\r\n-	Kembali ke Hotel dan istirahat\r\n\r\nDay 2 (Pantai Pandawa – Pura Petitenget – Sunset di Pantai Kuta)\r\n-	Sarapan di Hotel\r\n-	Menuju ke Pantai Pandawa\r\n-	Beralih ke Pura Petitenget\r\n-	Makan siang disekitar Kuta\r\n-	Explore ke tempat oleh-oleh \r\n-	Menikmati sunset di Pantai Kuta\r\n-	Makan malam disekitar Pantai Kuta\r\n-	Kembali ke Hotel dan istirahat\r\n\r\nDay 3 (Pantai Melasti – Pura Tanah Lot – Pulang)\r\n-	Sarapan di Hotel\r\n-	Menuju Pantai Melasti, Tanah Lot\r\n-	Beralih ke Pura Tanah Lot\r\n-	Makan siang disekitar Tanah Lot\r\n-	Kembali ke Hotel\r\n-	Siap-siap untuk menuju Bandara I Gusti Ngurah Rai\r\n\r\nb.	FASILITAS PAKET WISATA BALI\r\n\r\nINCLUDE\r\n-	Tiket Pesawat\r\n-	Penginapan 2 Malam\r\n-	Kendaraan\r\n-	Makan siang 3 kali\r\n-	Air Mineral selama trip\r\nEXCLUDE\r\n-	Tips \r\n-	Kebutuhan pribadi\r\n</p>\r\n', 2, 1, 0),
(3, '2 day', 'Jawa Timur', '<p>a.	ITENERARY PAKET WISATA BROMO\r\nDay 1 (Kedatangan, Desa Tengger)\r\n-	09.00 – 09.30 : Penjemputan (Hotel/Bandara/Stasiun di Malang).\r\n-	09.30 – 13.00 : Perjalanan ke Wonokitri.\r\n-	13.00 – 14.00 : Check In Hotel.\r\n-	14.00 – 15.00 : Istirahat, Sholat dan Makan.\r\n-	15.00 – 17.00 : Wisata Keliling desa Tengger\r\n-	17.00 – 18.00 : Kembali ke Hotel.\r\n-	18.00 – Selesai : Free Program.\r\n\r\nDay 2 (Gunung Bromo, Padang Savana, Pasir Berbisik, dan Bukit Teletubies)\r\n-	02.00 – 02.15 : Penjemputan di Hotel.\r\n-	02.15 – 03.00 : Perjalanan ke Wonokitri.\r\n-	03.00 – 06.00 Menunggu dan Menikmati indahnya sunrise Bromo.\r\n-	06.00 – 07.00 Kawah Bromo dan Pura Luhur Poten.\r\n-	07.00 – 09.00 Padang Savana, Pasir Berbisik dan Bukit Teletubies.\r\n-	09.00 – 10.00 Kembali ke Wonokitri.\r\n-	10.00 – 13.00 Kembali ke Malang/Batu/Surabaya.\r\n-	13.00 – 13.30 Drop ke Hotel/Bandara/Stasiun di kota Malang, Batu, Surabaya.\r\n-	14.00 Finish.\r\n\r\n\r\n\r\nb.	FASILITAS PAKET WISATA BROMO\r\nINCLUDE\r\n-	Transportasi antar-jemput Stasiun Malang/Bandara Abdul Rachman Saleh\r\n-	Makan sesuai program 3x\r\n-	Air mineral selama trip\r\n-	Guest House/Homestay (sharing)\r\n-	Tiket wisata\r\n-	Jeep\r\n-	Dokumentasi\r\n-	Tour guide local\r\nEXCLUDE\r\n-	Tipping Guide IDR 20.000/guest (Dikolektifkan kepada Tour Guide/Tour Leader)\r\n-	Sewa Kuda\r\n-	Hal-hal diluar fasilitas dan pengeluaran pribadi\r\n</p>', 3, 1, 0),
(4, '3 day', 'Belitung', '<p>a.	ITENERARY PAKET WISATA BELITUNG\r\nDAY 1 (Tour Laskar Pelangi)\r\n-	Penjemputan di Bandara Hanadjoedin\r\n-	Sarapan di Mie Belitung\r\n-	Menuju SD Muhammadiyah (SD Laskar Pelangi)\r\n-	Menuju Rumah Keong ( Dermaga Kirana )\r\n-	Beralih ke Museum Kata Andrea Hirata\r\n-	Mengunjungi Kampung Ahok\r\n-	Jadwal Makan Siang\r\n-	Beralih ke Vihara Dewi Khuan In\r\n-	Pergi ke Pantai Burung mandi\r\n-	Kembali ke kota Tanjung Pandan\r\n-	Tiba di hotel dan isitirahat\r\n-	Jadwal Makan malam\r\n-	Kembali ke Hotel dan istirahat.\r\n\r\nDAY 2 (Hopping Island)\r\n-	Sarapan di Hotel\r\n-	Pergi ke Pantai Tanjung Kelayang\r\n-	Persiapan ke Hopping Island\r\n-	Menuju Batu Garuda, Pulau Pasir, Pulau Batu Berlayar, dan Pulau Lengkuas\r\n-	Jadwal Makan Siang\r\n-	Snorkeling\r\n-	Menuju Pulau Kelayang + Goa Kelayang\r\n-	Kembali ke pantai Tanjung Kelayang\r\n-	Kembali Pantai Tanjung Pendam\r\n-	Kembali ke Hotel\r\n-	Jadwal makan malam\r\n-	Free Program\r\n-	Kembali ke hotel dan istirahat.\r\n\r\nDAY 3 (City Tour)\r\n-	Sarapan di Hotel\r\n-	Menuju Pantai Tanjung Tinggi (Pantai Laskar Pelangi)\r\n-	Belanja Oleh-oleh Belitung\r\n-	Mengunjungi Rumah adat Belitung\r\n-	Melihat Danau kaolin\r\n-	Coffee Break Kongdjie\r\n-	Pengantaran menuju Bandara H.AS Hanandjoedin\r\n-	Trip Selesai.\r\n\r\nb.	FASILITAS PAKET WISATA BELITUNG\r\nINCLUDE\r\n-	Transportasi selama di Belitung\r\n-	Tradisional boat\r\n-	Makan sesuai Program 3x (Include Mie Belitung dan Es Jeruk Kunci)\r\n-	Air mineral selama trip\r\n-	Akomodasi Mitra Belitung\r\n-	Tiket Wisata\r\n-	Alat Snorkeling\r\n-	Dokumentasi\r\n-	Tour guide local\r\nEXCLUDE\r\n-	Makan malam\r\n-	Donasi Museum Kata Andrea Hirata (Buku saku Laskar Pelangi) IDR 50,000\r\n-	Tipping Guide (Dikolektifkan kepada Tour Guide/Tour Leader)\r\n-	Hal-hal di luar fasilitas dan pengeluaran pribadi\r\n</p>', 4, 1, 0),
(5, '3 day', 'Nusa Tenggara Timur', '<p>a.	ITENERARY PAKET WISATA PULAU KOMODO\r\nDay 1 (Pulau Kanawa, dan Gili Lawa)\r\n-	09.00 – 10.00 : Berkumpul di area Meeting Point\r\n-	10.00 – 12.00 : Berangkat menuju ke Pulau Kanawa, Beraktivitas, dan Makan Siang\r\n-	12.00 – 14.00 : Berangkat menuju ke Manta Point\r\n-	14.00 – 15.30 : Snorkeling\r\n-	15.30 – 16.30 : Menuju ke Gili Lawa\r\n-	16.30 – 18.00 : Treking ke Puncak Gili Lawa (Lokasi Sunset View)\r\n-	18.00 – 19.00 : Kembali ke kapal\r\n-	19.00 – 20.00 : Acara Makan Malam\r\n-	20.00 – selesai : Acara bebas, beristirahat, finish hari pertama\r\nDay 2 (Pulau Padar, Pulau Komodo, Pink Beach, Pantai Namong, dan Pantai Kalong\r\n-	06.00 – 07.00 : Bangun Pagi dilanjutkan dengan sarapan pagi\r\n-	07.00 – 09.00 : Menuju ke Pulau Padar\r\n-	09.00 – 11.00 : Treking di Puncak Pulau Padar\r\n-	11.00 – 12.00 : Kembali ke kapal, Makan Siang, Menuju ke Pulau Komodo\r\n-	12.00 – 13.00 : Treking di Pulau Komodo\r\n-	13.00 – 15.00 : Menuju ke Pink Beach\r\n-	15.00 – 17.00 : Menuju ke Pantai Namong, aktifitas snorkelling\r\n-	17.00 – 18.00 : Menuju ke Pulau Kalong (Lokasi Sunset View)\r\n-	18.00 – 18.30 : Kembali ke Kapal\r\n-	18.30 – 19.30 : Istirahat, Bersih-bersih, acara makan malam\r\n-	19.00 – selesai : istirahat, finish hari kedua\r\nDay 3 (Taka Makassar, dan Pulau Kelor)\r\n-	07.00 – 08.00 : Bangun, Sarapan pagi\r\n-	08.00 – 10.00 : Menuju ke Taka Makassar\r\n-	10.00 – 12.00 : Pelaksanaan aktivitas di Taka Makassar\r\n-	12.00 – 15.00 : Kembali ke kapal, menuju ke Pulau Kelor, Makan siang\r\n-	15.00 – 17.00 : Aktivitas di Pulau Kelor (Treking & Snorkeling)\r\n-	17.00 – 18.00 : Kembali menuju ke Labuan Bajo\r\n-	18.00 – Selesai : Sampai di Labuan Bajo, perpisahan, trip selesai\r\n\r\nb.	FASILITAS PAKET WISSATA PULAU KOMODO\r\nINCLUDE\r\n-	Transport Airport – Hotel / Meeting Point 2x (return)\r\n-	Sekoci / Speed Boat\r\n-	Makan sesuai program\r\n-	Alat Snorkeling\r\n-	Mineral water free refill\r\n-	Tour Leader & Guide Lokal\r\n-	Snack, Coffee, & Tea selama trip\r\n-	Life Jacket\r\nEXCLUDE\r\n-	Transportasi dari dan menuju kota asal\r\n-	Makan dan Minum di luar Program\r\n-	Tipping Guide dan Boat crew (Dikolektifkan kepada Tour Guide / Tour Leader)\r\n-	Tiket masuk Taman Nasional Komodo\r\n-	Hal-hal yang diluar fasilitas dan pengeluaran pribadi\r\n</p>', 5, 1, 0),
(6, '1 day', 'Kepulauan Seribu', '<p>a.	ITENERARY PAKET WISATA KEPULAUAN SERIBU\r\nDay I  (Pulau Kelor, Pulau Onrust, dan Pulau Cipir)\r\n-	08.00 - 08.30 Meeting Point di Dermaga Kamal Muara, bertemu dengan team kami\r\n-	08.30 - 09.30 Menuju Pulau Kelor, photostop dan explore Pulau Kelor\r\n-	09.30 - 10.00 Menuju Pulau Onrust\r\n-	10.00 - 13.00 Tour sejarah dan explore Pulau Onrust. Istirahat, shalat, dan makan di Pulau Onrust\r\n-	13.00 - 16.00 Menuju Pulau Cipir, photostop dan explore Pulau Cipir\r\n-	16.00 - 17.00 Kembali ke Dermaga Kamal Muara, Sayonara.\r\n\r\nb.	FASILITAS PAKET WISATA KEPULAUAN SERIBU\r\nINCLUDE\r\n-	Transportasi kapal tradisional\r\n-	Biaya retribusi Pulau\r\n-	Life jacket\r\n-	Makan sesuai Program 1x\r\n-	Air mineral selama trip\r\n-	Dokumentasi\r\n-	Tour guide lokal\r\nEXCLUDE\r\n-	Tipping Guide (Dikolektifkan kepada Tour Guide/Tour Leader)\r\n-	Hal-hal diluar fasilitas dan pengeluaran pribadi\r\n</p>', 6, 1, 0),
(7, '2 day', 'Kepulauan Seribu', '<p>a.	ITENERARY PAKET WISATA PULAU TIDUNG\r\nDAY 1 (Pulau Tidung, Pantai Tanjung Barat, dan Pantai Jembatan Cinta)\r\n-	06.00-06.30 WIB: Sudah berkumpul di pelabuhan kaliadem muara angke, kapal berangkat menuju pulau tidung pukul 08.00 WIB.\r\n-	08.00 WIB: Kapal berangkat menuju pulau tidung.\r\n-	10.30 WIB: Tiba di pelabuhan pulau tidung langsung menuju homestay untuk check-in (dipandu tour guide), setelah sampai di homestay istirahat sejenak sambil menikmati welcomedrink.\r\n-	11.00-12.00 WIB: Makan siang.\r\n-	12.00-13.00 WIB: Istirahat sejenak, menunggu waktu snorkeling tiba.\r\n-	13.00-15.00 WIB: Snorkeling di perairan/laut pulau tidung kecil & pulau payung.\r\n-	15.00-16.00 WIB: Mampir ke pantai jembatan cinta. (bermain banana boat bagi yang booking paket lengkap).\r\n-	16.00-17.00 WIB: Kembali ke homestay.\r\n-	17.00-18.00 WIB: Hunting sunset di pantai tanjung barat.\r\n-	18.00-19.00 WIB: Makan malam.\r\n-	19.00-21.00 WIB: Istirahat sejenak, sambil menunggu waktu barbeque tiba.\r\n-	21.00 WIB: Barbeque time s/d selesai.\r\n\r\nDAY 2 (Pantai Saung Cemara)\r\n-	05.30-07.30 WIB: Hunting sunrise di pantai jembatan cinta & lanjut ke pantai saung cemara.\r\n-	07.30-08.30 WIB: Sarapan pagi.\r\n-	08.30-09.30 WIB: Siap packing.\r\n-	09.30-10.00 WIB: Berkumpul di pelabuhan pulau tidung.\r\n-	10.00-11.00 WIB: Kapal berangkat menuju Jakarta.\r\n\r\n\r\nb.	FASILITAS PAKET WISATA PULAU TIDUNG\r\nINCLUDE\r\n-	Tiket kapal PP Pelabuhan Kali Adem – Pulau Tidung\r\n-	Welcome drink, makan sesuai program 3x, dan barbeque\r\n-	Air mineral selama trip\r\n-	Sepeda selama di Pulau Tidung\r\n-	Guest House/Homestay (sharing)\r\n-	Tiket wisata dan Retribusi\r\n-	Alat Snorkeling\r\n-	Kamera Underwater\r\n-	Tour guide local\r\n-	Asuransi perjalanan by Mega/MSIG Insurance\r\nEXCLUDE\r\n-	Tipping Guide (Dikolektifkan kepada Tour Guide / Tour Leader)\r\n-	Hal-hal diluar fasilitas dan pengeluaran pribadi\r\n</p>', 7, 1, 0),
(8, '3 day', 'Malaysia', '<p>a.	ITENERARY PAKET WISATA MALYSIA\r\nDAY 1 (Dataran Merdeka, Masjid Negara, Cocoa Boutique dan Petronas Twin Tower)\r\n-	Tiba di Bandara KLIA, bertemu dengan Tour Guide Berlisensi Bahasa Indonesia (tamu group)\r\n-	Tour Kuala Lumpur ke Dataran Merdeka, I Love KL Boutique, en-route Masjid Negara, Cocoa Boutique & Photostop di Petronas Twin Tower KLCC\r\n-	Check in Hotel \r\n\r\nDAY 2 (Istana Raja, Batu Caves, Genting Highland, Sungei Wang, dan Bukit Bintang)\r\n-	City Tour Kuala Lumpur ke Istana Raja Malaysia, Batu Caves Patung Emas, Lokal Produk, Genting Highland (Sudah Termasuk Tiket Skyway Cable Car), Belanja di Genting Premium Outlets & Mall Sungei Wang Bukit Bintang\r\n-	Kembali ke hotel\r\n\r\nDAY 3 (Dataran Putrajaya, Masjid Putrajaya, dan Mitsui Premium Outlets)\r\n-	Check out dari hotel, City Tour Putrajaya ke Jembatan Sri Warisan, Dataran Putrajaya, Masjid Putra, Danau Putrajaya & Kantor Perdana Menteri Malaysia\r\n-	Belanja di Mitsui Premium Outlets (Jika Ada Waktu)\r\n-	Di antar ke Bandara KLIA (Min 3 jam sebelum keberangkatan)\r\n\r\nb.	FASILITAS PAKET WISATA MALAYSIA\r\nINCLUDE\r\n-	Tour Leader\r\n-	Menginap di hotel *3\r\n-	Snack dan Air Mineral\r\n-	Tiket masuk objek wisata dan Guide Lokal\r\nEXCLUDE\r\n-	Antar - jemput dari rumah ke bandara di kota asal\r\n-	Airport tax, fiskal dan tax lainnya yang berlaku di negara-negara tempat-tempat yang dikunjungi.\r\n-	Biaya pembuatan dokumen perjalanan: paspor, visa, dll.\r\n-	Asuransi perjalanan.\r\n-	Excess baggage (biaya kelebihan barang bawaan di atas 20 kg).\r\n-	Biaya bea masuk bagi barang yang dikenakan bea masuk oleh duane di Jakarta / Surabaya / negara-negara yang dikunjungi.\r\n-	Tips guide, Optional Tour, dan acara di luar itinerary\r\n-	Keperluan yang bersifat pribadi\r\n</p>', 8, 1, 0),
(9, '3 day', 'Thailand', '<p>a.	ITENERARY PAKET WISATA THAILAND\r\nDAY 1 (Wat Arun, Wat Pho, Royal Grand Palace, Wat Pha Kaew, dan Siam Niramit Show)\r\n-	Tiba di Bandara Internasional Suvarnabhumi, bertemu dengan Tour Guide Berlisensi Bahasa Indonesia (tamu group)\r\n-	Tour Thailand ke 5 Objek Wisata yaitu Wat Arun, Wat Pho, Royal Grand Palace, Wat Pha Kaew, dan Siam Niramit Show\r\n-	Check in Hotel \r\n\r\nDAY 2 (ke Jim Thompson House, Vimanek Mansion, Khao San Road serta Chinatown)\r\n-	City Tour Thailand ke Jim Thompson House, Vimanek Mansion, Khao San Road serta Chinatown\r\n-	Kembali ke hotel\r\n\r\nDAY 3 (Chatuchak Weekend Market dan MBK Shopping Mall)\r\n-	Check out dari hotel\r\n-	Belanja di Chatuchak Weekend Market atau MBK Shopping Mall\r\n-	Di antar ke Bandara Internasional Suvarnabhumi (Min 3 jam sebelum keberangkatan)\r\n\r\nb.	FASILITAS PAKET WISATA THAILAND\r\nINCLUDE\r\n-	Tour Leader\r\n-	Menginap di hotel *3\r\n-	Snack dan Air Mineral\r\n-	Tiket masuk objek wisata dan Guide Lokal\r\n \r\nEXCLUDE\r\n-	Antar - jemput dari rumah ke bandara di kota asal\r\n-	Airport tax, fiskal dan tax lainnya yang berlaku di negara-negara tempat-tempat yang dikunjungi.\r\n-	Biaya pembuatan dokumen perjalanan: paspor, visa, dll.\r\n-	Asuransi perjalanan.\r\n-	Excess baggage (biaya kelebihan barang bawaan di atas 20 kg).\r\n-	Biaya bea masuk bagi barang yang dikenakan bea masuk oleh duane di Jakarta / Surabaya / negara-negara yang dikunjungi.\r\n-	Tips guide, Optional Tour, dan acara di luar itinerary\r\n-	Keperluan yang bersifat pribadi\r\n</p>', 9, 1, 0),
(10, '3 day', 'Singapore', '<p>a.	ITENERARY PAKET WISATA SINGAPORE\r\nDAY 1 (Seputar Bugis, Merlion Park, Esplanade, Marina Bay Sands, Gardens by the Bay, Seputar Orchard Road)\r\n-	09.00 Berangkat dari Indonesia\r\n-	11.00 Tiba di Changi International Airport, Singapura\r\n-	12.00 Menuju ke hotel\r\n-	13.00 Makan siang di Kampong Glam dan belanja di seputar Bugis\r\n-	15.30 Menuju ke Merlion Park untuk foto di Patung Merlion\r\n-	16.00 Jalan kaki ke Esplanade, yang ada di seberang Merlion Park\r\n-	17.00 Menikmati sore di Gardens by the Bay, naik OCBC Skyway\r\n-	18.00 Marina Bay Sands Mall, jalan kaki dari Gardens by the Bay\r\n-	19.30 Menuju ke Orchard Road, jalan-jalan dan makan malam\r\n-	20.00 Makan malam di foodcourt 313@Somerset atau di Ion Orchard\r\n-	22.00 Balik ke hotel dan istirahat\r\n\r\nDAY 2 (Singapore Botanic Gardens, Sentosa Island, Little India, Clarke Quay, Chinatown)\r\n-	08.00 Sarapan di hotel dan persiapan jalan-jalan\r\n-	09.00 Ke Singapore Botanic Gardens dan National Orchid Garden\r\n-	12.00 Menuju ke VivoCity Mall, makan siang di foodcourt\r\n-	13.00 Ke Sentosa Island dan foto depan Universal Studios Singapore\r\n-	14.00 Keliling Sentosa Island\r\n-	17.00 Ke Little India, jalan-jalan dan foto seputar daerah ini\r\n-	18.00 Ke Clarke Quay, menikmati suasana seputar Singapore River\r\n-	20.00 Keliling Chinatown, makan malam dan belanja oleh-oleh\r\n-	23.00 Balik ke hotel, istirahat\r\n\r\nDAY 3 (Pulau Ubin atau hanya di Changi International Airport, kembali ke Indonesia)\r\n-	08.00 Sarapan di hotel dan check-out\r\n-	09.00 Jika mau, ke Pulau Ubin – Kampong terakhir di Singapura\r\n-	11.00 Balik dari Pulau Ubin menuju ke Changi Airport\r\n-	13.00 Makan siang di Changi Airport dan siap-siap balik ke Indonesia\r\n\r\nc.	FASILITAS PAKET WISATA SINAGPORE\r\nINCLUDE\r\n-	Tour Leader\r\n-	Menginap di hotel *3\r\n-	Snack dan Air Mineral\r\n-	Tiket masuk objek wisata dan Guide Lokal\r\n \r\nEXCLUDE\r\n-	Antar - jemput dari rumah ke bandara di kota asal\r\n-	Airport tax, fiskal dan tax lainnya yang berlaku di negara-negara tempat-tempat yang dikunjungi.\r\n-	Biaya pembuatan dokumen perjalanan: paspor, visa, dll.\r\n-	Asuransi perjalanan.\r\n-	Excess baggage (biaya kelebihan barang bawaan di atas 20 kg).\r\n-	Biaya bea masuk bagi barang yang dikenakan bea masuk oleh duane di Jakarta / Surabaya / negara-negara yang dikunjungi.\r\n-	Tips guide, Optional Tour, dan acara di luar itinerary\r\n-	Keperluan yang bersifat pribadi\r\n\r\n</p>', 10, 1, 0),
(11, '6 day', 'Thailand, Singapore, Malaysia', '<p>a. ITENERARY PAKET WISATA 3 NEGARA ASIA Day 1 ( Explore Malaka, Johor Bahru) - Berkumpul di bandara Soekarno Hatta - Tiba di Kuala Lumpur bertemu dengan perwakilan kami - Makan siang di Restorant Lokal - Perjalanan menuju Johor Bahru via MALAKA - Setelah tiba di malaka di ajak city tour mengunjungi kota sejarah seperti : Benteng Portugis, Gedung Merah, Gereja Malaka, Kincir Air Belanda, Forta D&rsquo;santiago, Patung Santo Francis Savier, Gereja Santo Paulus, Kota A&rsquo;famosa, Street Harmoni / Jongker Street - Makan malam di Restorant Lokal - Setelah itu perjalanan ke Johor Bahru - Check in hotel - Acara bebas DAY 2 (Johor Bahru &ndash; Fullday Singapore &ndash; Malaka) - Sarapan pagi di hotel - Berangkat menuju Singapore via Second Link. - Tiba di Singapore, kemudian Anda di ajak mengunjungi : Patung Merlion dan Garden By The Bay - Setelah itu makan siang di Restorant Lokal - Kemudian perjalanan di lanjutkan ke: Bugis &amp; Orchard Road, Sentosa Island, Universal Studio - Sore hari berangkat kembali ke Malaysia - Makan malam di rest area menuju Malaka - Check in hotel - Acara Bebas DAY 3 (Malaka &ndash; Kuala Lumpur &ndash; Ipoh &ndash; Kedah) - Sarapan agi pagi di hotel - Berangkat menuju Kuala Lumpur untuk mengunjungi : Dataran Merdeka, Petronas Twin Tower, Chocolate Factory, Istana Merdeka - Setelah makan siang, melanjutkan perjalanan menuju Kedah - Tiba di Ipoh untuk mengunjungi : Kellies Castle, Kek Loh Tong - Makan malam di Kedah - Check in hotel, Acara bebas DAY 4 (Kedah &ndash; Hat Yai) - Sarapan pagi di hotel, berangkat menuju Hatyai via perbatasan Malaysia &ndash; Thailand yaitu Sadao Border untuk penukaran mata uang lokal dan pengisian imigration card &amp; check - Tiba di Hatyai kemudian berangkat menuju Songkla - Kemudian acara city tour di lanjutkan menuju : Sleeping Budha, Mermaid Statue, Shopping Ke Kaysorn Souvenir, Reenu Local Product - Lalu berangkat menuju Hat Yai Floating Market - Makan malam dan check-in hotel - Acara bebas dan menikmati kuliner malam dan shopping bazzar di kawasan Lee Garden Plaza DAY 5 (Hat Yai &ndash; Kuala Lumpur) - Sarapan pagi di hotel, berangkat menuju Kuala Lumpur kurang lebih 7 jam pejalanan - Tiba di Kuala Lumpur City, kemudian Anda di ajak City Tour mengunjungi : Batu Cave yang merupakan kuil India terbesar di Malaysia, menaiki anak tangga untuk mencapai gua - Makan siang di Restorant Lokal - Setelah itu belanja di sungai Wang Plaza - Makan malam di Restorant Lokal - Check in hotel - Acara Bebas DAY 6 (Kuala Lumpur &ndash; Genting Highland &ndash; Airport) - Sarapan pagi di hotel - Berangkat menuju Genting Highland yang merupakan pusat hiburan keluarga dan arena bermain serta kasino dengan menggunakan Cable Car - Kembali ke Kuala Lumpur - Makan siang di restorant local - Mengunjungi Putrajaya - Berangkat ke Bandara KLIA untuk kembali ke Indonesia - Paket Tour 3 Negara Malaysia, Singapore, Thailand 6 Hari 5 Malam selesai, b. FASILITAS PAKET WISATA 3 NEGARA ASIA INCLUDE - Tiket Pesawat Jakarta &ndash; Kuala Lumpur PP - Hotel 5 malam di Hotel Bintang 3 - Bagasi Sesuai Maskapai - Transportasi Bus pariwisata AC - Makan Sesuai Jadwal (pagi, siang dan malam) - Tiket biaya masuk wisata yang tercantum - Air Mineral 600ml 1x 1 hari EXCLUDE - Tipping Guide dan Adm IDR 200.000 / Orang - Tourism Tax +- MYR 20 / Orang - Depart Tax +- MYR 8 / Orang - Hal hal yang tidak disebutkan dalam program acara - Makan dan minum diluar program - Kelebihan bagasi - Biaya pengeluaran pribadi selama tour berlangsung - Biaya pembuatan pasport baru atau perpanjang</p>', 11, 0, 0),
(12, 'uu', 'hh', '<p>jkk</p>', 2, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_fasilitas`
--

CREATE TABLE `kategori_fasilitas` (
  `id_kateg_fasilitas` int(11) NOT NULL,
  `kategori_wisata` varchar(50) NOT NULL,
  `status_delete` int(11) NOT NULL,
  `status_kateg_fasilitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_fasilitas`
--

INSERT INTO `kategori_fasilitas` (`id_kateg_fasilitas`, `kategori_wisata`, `status_delete`, `status_kateg_fasilitas`) VALUES
(1, 'include', 0, 1),
(2, 'exclude', 0, 0),
(3, 'testing', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `nama_komentar` varchar(20) NOT NULL,
  `isi` varchar(500) NOT NULL,
  `tgl_komentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `nama_komentar`, `isi`, `tgl_komentar`) VALUES
(1, 'lina', 'testing sekarang', '2021-01-11'),
(2, 'test', 'ok lah', '2021-01-11'),
(3, 'Ani', 'pelayanan baik', '2021-01-18'),
(4, 'Ani', 'pelayanan baik', '2021-01-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `lokasi` varchar(200) NOT NULL,
  `status_lokasi` int(11) NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `lokasi`, `status_lokasi`, `status_delete`) VALUES
(1, 'Bali', 1, 0),
(2, 'Pulau Nusa Dua', 1, 0),
(3, 'Thailand', 1, 0),
(4, 'Singapur', 0, 1),
(6, 'Jawa Timur', 1, 0),
(7, 'Bangka Belitung', 1, 0),
(8, 'Nusa Tenggara Timur', 1, 0),
(9, 'Kepulauan Seribu', 1, 0),
(10, 'Malaysia', 1, 0),
(11, 'Thai,SG,KL', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `oborolan`
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
-- Struktur dari tabel `paket_wisata`
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
-- Dumping data untuk tabel `paket_wisata`
--

INSERT INTO `paket_wisata` (`id_wisata`, `nama_wisata`, `id_lokasi`, `waktu`, `harga`, `id_trip`, `status_wisata`, `status_delete`, `image`, `jumlah_orang`) VALUES
(1, 'Pulau Nusa Penida', 2, '1D', 699000, 1, 1, 1, 'nusa.png', 5),
(2, 'Bali Island', 1, '3D2N', 1950000, 2, 1, 0, 'bali.jpg', 4),
(3, 'Bromo Mountain', 6, '2D1N', 600000, 2, 0, 0, 'bromo.png', 4),
(4, 'Belitung Island', 7, '3D2N', 950000, 2, 0, 0, 'belitung.png', 5),
(5, 'Komodo Island', 8, '3D2N', 2300000, 2, 0, 0, 'komodo.png', 4),
(6, 'Kepulauan Seribu', 9, '1D', 120000, 1, 0, 0, 'seribu.png', 5),
(7, 'Tidung Island', 9, '2D1N', 385000, 2, 0, 0, 'tidung.png', 4),
(8, 'Malaysia', 10, '3D2N', 1800000, 3, 1, 0, 'malaysia.png', 5),
(9, 'Thailand', 3, '3D2N', 1950000, 3, 1, 0, 'thai.png', 5),
(10, 'Singapore', 4, '3D2N', 1900000, 3, 1, 0, 'singapore.png', 5),
(11, 'Thailand, Malaysia, Singapore', 11, '6D5N', 5400000, 3, 1, 0, 'thaisgkl.png', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
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
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pengguna`, `nama`, `email`, `username`, `password`, `alamat`, `tgl_lahir`) VALUES
(1, 'lina', 'lina@gmail.com', 'lina', '12345', 'jakarta', '2021-01-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `nomor_pemesanan` varchar(200) NOT NULL,
  `status_pemesanan` int(11) NOT NULL,
  `tgl_pemesanan` datetime NOT NULL,
  `total` int(11) NOT NULL,
  `pembayaran` int(11) NOT NULL,
  `bukti_pembayaran` varchar(200) DEFAULT NULL,
  `tgl_wisata` date DEFAULT NULL,
  `status_delete` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `status_approve` int(11) NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `id_pemesanan` bigint(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`nomor_pemesanan`, `status_pemesanan`, `tgl_pemesanan`, `total`, `pembayaran`, `bukti_pembayaran`, `tgl_wisata`, `status_delete`, `id_pelanggan`, `nama_pelanggan`, `status_approve`, `jumlah_bayar`, `status`, `id_pemesanan`) VALUES
('001', 2, '2021-01-20 00:00:00', 1800000, 2, '1611158035.png', NULL, 0, 6, 'Ani', 2, 540000, 0, 48),
('002', 2, '2021-01-20 23:52:22', 1950000, 2, '1611161592.jpeg', NULL, 0, 6, 'Ani', 2, 585000, 0, 49);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan_detail`
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
-- Dumping data untuk tabel `pemesanan_detail`
--

INSERT INTO `pemesanan_detail` (`id_pemesanan_detail`, `nama_wisata`, `jumlah`, `nomor_pemesanan`, `lokasi`, `trip`, `waktu`, `status_delete`, `id_wisata`, `dari_tgl_wisata`, `sampai_tgl_wisata`) VALUES
(86, 'Malaysia', 1800000, '001', 'Malaysia', 'International Trip', '3D2N', 0, 8, '2021-02-07', '2021-02-09'),
(87, 'Thailand', 1950000, '002', 'Thailand', 'International Trip', '3D2N', 0, 9, '2021-05-10', '2021-05-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `refund`
--

CREATE TABLE `refund` (
  `nomor_pemesanan` varchar(100) NOT NULL,
  `total_sebelum` int(11) NOT NULL,
  `total_refund` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `trip` varchar(100) NOT NULL,
  `status_approve` int(11) NOT NULL,
  `dari_tgl_wisata` date NOT NULL,
  `sampai_tgl_wisata` date NOT NULL,
  `nama_wisata` varchar(100) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tgl_refund` date NOT NULL,
  `id_refund` bigint(20) NOT NULL,
  `tgl_pemesan` datetime NOT NULL,
  `status_refund` int(11) NOT NULL,
  `rek` varchar(50) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `refund`
--

INSERT INTO `refund` (`nomor_pemesanan`, `total_sebelum`, `total_refund`, `nama_pelanggan`, `waktu`, `lokasi`, `trip`, `status_approve`, `dari_tgl_wisata`, `sampai_tgl_wisata`, `nama_wisata`, `id_pelanggan`, `tgl_refund`, `id_refund`, `tgl_pemesan`, `status_refund`, `rek`, `hp`) VALUES
('001', 1800000, 450000, 'nila', '3D2N', 'Malaysia', 'International Trip', 1, '2021-09-10', '2021-08-09', 'Malaysia', 6, '2021-01-20', 2, '2021-01-20 00:00:00', 1, '8798', '076'),
('002', 1950000, 487500, 'ktyi', '3D2N', 'Thailand', 'International Trip', 2, '2021-05-10', '2021-05-13', 'Thailand', 6, '2021-01-20', 7, '2021-01-20 23:52:22', 1, '54545', '98867');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reschedule`
--

CREATE TABLE `reschedule` (
  `id_reschedule` int(11) NOT NULL,
  `nomor_pemesanan` int(11) NOT NULL,
  `total_sebelum` int(11) NOT NULL,
  `total_reschedule` int(11) NOT NULL,
  `status_delete` int(11) NOT NULL,
  `from_tgl_wisata` date NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `to_tgl_wisata` date NOT NULL,
  `new_tgl_wisata` varchar(200) DEFAULT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `nama_wisata` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `status_approve` int(11) NOT NULL,
  `status_reschedule` int(11) NOT NULL,
  `hp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reschedule`
--

INSERT INTO `reschedule` (`id_reschedule`, `nomor_pemesanan`, `total_sebelum`, `total_reschedule`, `status_delete`, `from_tgl_wisata`, `id_pelanggan`, `to_tgl_wisata`, `new_tgl_wisata`, `nama_pelanggan`, `nama_wisata`, `lokasi`, `status_approve`, `status_reschedule`, `hp`) VALUES
(1, 1, 1800000, 1800000, 0, '2021-09-10', 6, '2021-08-09', '2021-02-07 - 2021-02-09', 'nila', 'Malaysia', 'Malaysia', 2, 1, '9232'),
(2, 2, 1950000, 1950000, 0, '2021-05-10', 6, '2021-05-13', NULL, 'ktyi', 'Thailand', 'Thailand', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reschedule_detail`
--

CREATE TABLE `reschedule_detail` (
  `id_reschedule_detail` int(11) NOT NULL,
  `nama_wisata` varchar(200) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `trip` varchar(100) NOT NULL,
  `waktu` varchar(150) NOT NULL,
  `status_delete` int(11) NOT NULL,
  `id_reschedule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `syarat`
--

CREATE TABLE `syarat` (
  `id_syarat` int(10) NOT NULL,
  `keterangan` varchar(5000) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `status_syarat` int(11) NOT NULL,
  `status_delete` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `syarat`
--

INSERT INTO `syarat` (`id_syarat`, `keterangan`, `id_wisata`, `status_syarat`, `status_delete`, `judul`) VALUES
(1, 'PEMBAYARAN\r\n-	Pembayaran dapat dilakukan dengan membayar DP sebesar 30% terlebih dahulu\r\n-	Pelunasan dilakukan h-3 sebelum berangkat. Nanti akan terdapat alert pelunasan.\r\n-	Pembayaran bisa dilakukan dengan Transfer Bank yang dipilih, wajib melakukan konfirmasi pembayaran di halaman konfirmasi atau mengiriman Bukti Transfer via whatsapp Alfa Tour and Travel.\r\n-	Setelah melakukan transfer, pihak Alfa Tour and Travel akan mengirimkan invoice ke email atau Whatsapp.\r\n-	Alfa Tour and Travel akan konfirmasi untuk perjalanan anda\r\n', 1, 0, 0, ''),
(2, '<p>qe</p>', 2, 1, 0, 'yr');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggal_wisata`
--

CREATE TABLE `tanggal_wisata` (
  `dari_tanggal` date NOT NULL,
  `sampai_tanggal` date NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `status_delete` int(11) NOT NULL,
  `id_tanggal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tanggal_wisata`
--

INSERT INTO `tanggal_wisata` (`dari_tanggal`, `sampai_tanggal`, `id_wisata`, `status_delete`, `id_tanggal`) VALUES
('2021-01-11', '2021-01-13', 2, 1, 1),
('2021-01-11', '0201-01-12', 1, 1, 2),
('2021-02-04', '2021-02-05', 3, 0, 3),
('2021-03-15', '2021-03-17', 4, 0, 4),
('2021-05-07', '2021-05-08', 6, 1, 5),
('2021-09-26', '2021-09-28', 5, 0, 6),
('2021-12-25', '2021-12-26', 7, 0, 7),
('2021-02-07', '2021-02-09', 8, 0, 8),
('2021-09-10', '2021-08-09', 8, 0, 9),
('2021-01-15', '2021-01-16', 1, 0, 10),
('2021-02-07', '2021-02-08', 1, 0, 11),
('2021-02-07', '2021-02-08', 6, 1, 12),
('2021-03-07', '2021-03-08', 6, 1, 13),
('2021-02-07', '2021-02-08', 6, 1, 14),
('2021-02-09', '2021-02-11', 2, 1, 15),
('2021-02-19', '2021-02-21', 2, 0, 16),
('2021-02-20', '2021-02-21', 3, 0, 17),
('2021-04-02', '2021-04-04', 4, 0, 18),
('2021-05-10', '2021-05-13', 9, 0, 19),
('2021-08-10', '2021-08-13', 10, 0, 20),
('2021-10-01', '2021-10-06', 11, 0, 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket_pemesanan`
--

CREATE TABLE `tiket_pemesanan` (
  `id_tiket_pemesanan` int(11) NOT NULL,
  `nama_pemesanan` varchar(200) NOT NULL,
  `nomor_pemesanan` int(11) NOT NULL,
  `status_delete` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `nama_wisata` varchar(100) NOT NULL,
  `ktp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tiket_pemesanan`
--

INSERT INTO `tiket_pemesanan` (`id_tiket_pemesanan`, `nama_pemesanan`, `nomor_pemesanan`, `status_delete`, `id_wisata`, `nama_wisata`, `ktp`) VALUES
(14, 'adf', 1, 0, 8, 'Malaysia', '31'),
(15, 'uy', 1, 0, 8, 'Malaysia', '23'),
(16, 'we', 1, 0, 8, 'Malaysia', '13141');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trip`
--

CREATE TABLE `trip` (
  `id_trip` int(10) NOT NULL,
  `trip` varchar(50) NOT NULL,
  `status_trip` int(10) NOT NULL,
  `status_delete` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `trip`
--

INSERT INTO `trip` (`id_trip`, `trip`, `status_trip`, `status_delete`) VALUES
(1, 'One Day Trip', 1, 0),
(2, 'Domestic Trip', 1, 0),
(3, 'International Trip', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `activation_code`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Ani', 'opam.qweiop@gmail.com', '$2b$10$bDnIPjxBp.ScsKGutDg61uWA5GirxYRQcWZhB7087twzzwsYD4N0O', '', 1, 'oOz0uXhMswez9nubDAVzbrbtQz0bCA7JSXNlmrvDb284bxds9IKW16Xnx99g', '2015-07-19 14:12:20', '2015-07-19 14:13:10'),
(7, 'Admin', 'admin@gmail.com', '$2y$10$qhtL.SNj9beiX46VLG3Li.ENIis1tmtxAf8.5n5pOFpnl9hLnspUC', '1', 1, 'BwCLmFybKcw6aqpffwMH0qlntpSgxXnyGQIw7Ehjgb6EDkX0ziHRtFZfu5CT', '2021-01-10 14:04:39', '2021-01-11 14:04:44'),
(8, 'test', 'test@gmail.com', '$2y$10$I/xVrN52VrhDeFM6TYFlAe0AdK5EZO6IkAWGuvl4U8DTmQld5Kusu', '2', 1, '2aIg7vjXtMAkk1kCmzlzrSABJi4yblcv2CQonl82JhJtzz74gjLa1jwKyHLm', '2021-01-10 07:15:11', '2021-01-10 07:15:11'),
(12, 'nani', 'nani.com', '$2y$10$5T9KIwWxH7Bzr0Gxf8JaMe9h4y3lBm3N7GFsKwHl1cLguf9fWZtvu', '2', 1, NULL, '2021-01-19 05:40:16', '2021-01-19 05:40:16'),
(16, 'nani', 'nanii.com', '$2y$10$Cwow3embQHjjWfeE8wEO9uFcsfPCgNTTcSuFdPBajb3Ml8y8qqGsi', '2', 1, NULL, '2021-01-19 05:41:17', '2021-01-19 05:41:17'),
(17, 'budi', 'budi.com', '$2y$10$bcgwYVbXeooW9pyUJquhG.lLOwXmErYs19bl19oat0YxJcZwO6tiW', '2', 1, NULL, '2021-01-19 05:43:39', '2021-01-19 05:43:39'),
(18, 'test1', 'test1@gmail.com', '$2y$10$IS.170jNdhYx/vFnGrlwrulK37GjONW.NbqvUyun0P5vEuR8BHi5O', '2', 1, 'KcJk0gCvkw8ZCWcXQklXSTTHH4INDULRMwLaq5YBb0onxDVjNJk7G7HCi7DA', '2021-01-19 05:58:15', '2021-01-19 05:58:15'),
(19, 'Ali', 'ali@gmail.com', '$2y$10$jkCkxLs7VFjM5y0CZimb..ukhC4yUI2d1GtI2jkpq4SDR0avmqw5C', '2', 1, 'LeYkvb6oQRESvXgpfOqWSYs2VK4Mos8QPjnByhUBMFYIAAPyHKj218y2af3J', '2021-01-19 07:46:27', '2021-01-19 07:46:27'),
(20, 'Audrey', 'audrey07@gmail.com', '$2y$10$nCQUz4ulsqe/0a3vHKXtke4Ypq4oNBQredDj0mD2TR2.cv7wdsoRq', '2', 1, 'hazjvPBlIIJBFcA8ohUrLgYnl1db5ylqviqgASeqMBrXpk14lQzZT5Tr09bi', '2021-01-19 08:53:49', '2021-01-19 08:53:49'),
(21, 'Ahmad', 'ahmad@gmail.com', '$2y$10$efKSUz3VpcHre9UrI4EPNu7Il89Rqc.Wi9QaPVasW0h/k1Kr3J33i', '2', 1, 'vPRcSjMP3CpTriAO4M3SUqsiNEJCPmMbRxgszsTR1hViPf7sj4XQW9CD68yV', '2021-01-19 09:50:27', '2021-01-19 09:50:27'),
(22, 'mutia', 'mutia@gmail.com', '$2y$10$9wxi7E0a4wxabMx6WfxyjOucJVoHHv12vFUMhV5MTCeGDGWJN.5RG', '2', 1, 'k3KY5h0WpcpfMxGecNDo2sBbS6RRZ9njFu1BZQtgGUsUdX5iwwPXCE9fdzrK', '2021-01-19 11:05:29', '2021-01-19 11:05:29');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_pemesan`
--
ALTER TABLE `data_pemesan`
  ADD PRIMARY KEY (`id_data_pemesan`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indeks untuk tabel `itenerary`
--
ALTER TABLE `itenerary`
  ADD PRIMARY KEY (`id_itenerary`);

--
-- Indeks untuk tabel `kategori_fasilitas`
--
ALTER TABLE `kategori_fasilitas`
  ADD PRIMARY KEY (`id_kateg_fasilitas`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `oborolan`
--
ALTER TABLE `oborolan`
  ADD PRIMARY KEY (`id_oborolan`);

--
-- Indeks untuk tabel `paket_wisata`
--
ALTER TABLE `paket_wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indeks untuk tabel `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
  ADD PRIMARY KEY (`id_pemesanan_detail`);

--
-- Indeks untuk tabel `refund`
--
ALTER TABLE `refund`
  ADD PRIMARY KEY (`id_refund`);

--
-- Indeks untuk tabel `reschedule`
--
ALTER TABLE `reschedule`
  ADD PRIMARY KEY (`id_reschedule`);

--
-- Indeks untuk tabel `reschedule_detail`
--
ALTER TABLE `reschedule_detail`
  ADD PRIMARY KEY (`id_reschedule_detail`);

--
-- Indeks untuk tabel `syarat`
--
ALTER TABLE `syarat`
  ADD PRIMARY KEY (`id_syarat`);

--
-- Indeks untuk tabel `tanggal_wisata`
--
ALTER TABLE `tanggal_wisata`
  ADD PRIMARY KEY (`id_tanggal`);

--
-- Indeks untuk tabel `tiket_pemesanan`
--
ALTER TABLE `tiket_pemesanan`
  ADD PRIMARY KEY (`id_tiket_pemesanan`);

--
-- Indeks untuk tabel `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`id_trip`);

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
-- AUTO_INCREMENT untuk tabel `data_pemesan`
--
ALTER TABLE `data_pemesan`
  MODIFY `id_data_pemesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `itenerary`
--
ALTER TABLE `itenerary`
  MODIFY `id_itenerary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kategori_fasilitas`
--
ALTER TABLE `kategori_fasilitas`
  MODIFY `id_kateg_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `oborolan`
--
ALTER TABLE `oborolan`
  MODIFY `id_oborolan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `paket_wisata`
--
ALTER TABLE `paket_wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` bigint(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
  MODIFY `id_pemesanan_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT untuk tabel `refund`
--
ALTER TABLE `refund`
  MODIFY `id_refund` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `reschedule`
--
ALTER TABLE `reschedule`
  MODIFY `id_reschedule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `reschedule_detail`
--
ALTER TABLE `reschedule_detail`
  MODIFY `id_reschedule_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `syarat`
--
ALTER TABLE `syarat`
  MODIFY `id_syarat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tanggal_wisata`
--
ALTER TABLE `tanggal_wisata`
  MODIFY `id_tanggal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tiket_pemesanan`
--
ALTER TABLE `tiket_pemesanan`
  MODIFY `id_tiket_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `trip`
--
ALTER TABLE `trip`
  MODIFY `id_trip` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
