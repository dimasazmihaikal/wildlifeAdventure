-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2024 at 05:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wdav`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'ujang', 'ujang123');

-- --------------------------------------------------------

--
-- Table structure for table `fakta_hewan`
--

CREATE TABLE `fakta_hewan` (
  `id_fakta` int(11) NOT NULL,
  `nama_fakta` varchar(255) NOT NULL,
  `deskripsi_fakta` text NOT NULL,
  `gambar_fakta` varchar(255) NOT NULL,
  `id_hewan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fakta_hewan`
--

INSERT INTO `fakta_hewan` (`id_fakta`, `nama_fakta`, `deskripsi_fakta`, `gambar_fakta`, `id_hewan`) VALUES
(24, 'GADING GAJAH', 'gading gajah memiliki banyak fungsi, lo! Gajah menggunakan gadingnya untuk mengangkat benda, mengumpulkan makanan dan bahkan untuk mengupas kayu dari pohon untuk dimakan. O iya, gading gajah juga berguna untuk pertahanan mereka serta berfungsi untuk melindungi belalai.', '580464a3e4262968eab17c6ed9d0504c.jpg', 48),
(25, 'GAJAH DAN LEBAH', 'Gajah sangat tidak menyukai lebah lo!. Sengatan lebah pasti tidak dapat tembus kulit gajah yang paling tebal. Tetapi bila lebah-lebah berkerubung, karena itu mereka dapat menusuk hewan besar itu di wilayah paling peka seperti belalai, mulut, dan mata. Sengatan beberapa ratus lebah itu akan membuat gajah kesakitan.', 'download.jpg', 48),
(26, 'PAGAR LEBAH', 'Banyak negara di afrika telah memperkenalkan cara yang manusiawi untuk mengusir lebah dengan memanfaatkan ketakutan gajah akan lebah, mereka menggunakan pagar yang terbuat dari sarang lebah agar tidak merusak lahan mereka', 'DSCN3948small.jpg', 48),
(27, 'INDUK FLAMINGO', 'Induk flamingo dapat mengenali tangisan anak mereka dalam kerumunan ribuan flamingo lainnya.', 'flock-pink-flamingos-walvis-bay-namibia_1150-21648.avif', 49),
(28, 'KANIBAL', 'Komodo bersifat kanibalistik 10% dari makanan komodo dewasa adalah komodo remaja.', 'komodo-dragon-close-up_181624-28835.avif', 50),
(29, 'STATUS KEPUNAHAN', 'Polusi adalah salah satu faktor yang sangat merugikan axolotl. Pembungan limbah yang buruk dan meningkatnya pariwisata di Mexico berarti bahwa sampah, plastik, logam berat, dan amonia tingkat tinggi yang tumpah dari pabrik pengolahan limbah menyumbat kanal tempat tinggal mereka.', 'images.jpg', 51),
(30, 'REGENERASI', 'Axolotl dapat menumbuhkan kembali sumsum tulang belakang, rahang, kulit ovarium dan organ vital, seperti jantung dan otak. Regenerasi bagian tubuh tersebut dapat dilakukan secara sempurna dan tidak meninggalkan bekas.', 'Screenshot 2024-08-02 092910.png', 51),
(31, 'IKAN PREDATOR TERBESAR', 'Dilansir dari National Geographic, menyebut spesies ini sebagai ikan predator terbesar di dunia, mengacu pada panjangnya yang bisa mencapai 6,1 meter dan bobotnya yang mencapai 2,2 ton.', 'ybbawkg8minnavfe4z2arj-0bb832d01bf4bbeb7b616c8120da51f6.jpg', 52),
(32, 'RATUSAN GIGI', 'selain ukuran tubuhnya yang besar hiu ini memiliki 300 gigi yang tajam di dalam mulutnya, dan bila gigi tersebut rusak atau lepas maka gigi yang baru akan terus muncul selama mereka hidup.', '648578f7dc12a67648-22762915583-e90fa13c85-k-0faf57679e055e89d8e329f285eaa248.jpg', 52),
(36, 'GARIS ZEBRA', 'ZEBRA MENGENALI SATU SAMA LAIN DENGAN POLA YANG MEREKA MILIKI', 'download (1).jpg', 64),
(37, 'TIDUR YANG UNIK', 'Zebra dapat tidur dengan cara berdiri untuk tetap bersiaga dari predator yang mengintainya', 'zebra-couple-4461150-1280-34ad38a2ffe93ff890d5524b702be458-d0e69c447695758ca8c87edd04373054.jpg', 64),
(38, 'POLA GARIS ZEBRA', 'Pola garis-garis pada zebra masih diperdebatkan, mungkin untuk kamuflase di rerumputan, untuk membingungkan predator ketika kawanan berjalan, ataupun untuk pengakuan social', 'images (1).jpg', 64);

-- --------------------------------------------------------

--
-- Table structure for table `hewan`
--

CREATE TABLE `hewan` (
  `nama_hewan` varchar(80) NOT NULL,
  `nama_latin` varchar(80) NOT NULL,
  `kalimat_pengantar` varchar(255) NOT NULL,
  `asal_hewan` varchar(100) NOT NULL,
  `daerah_dijumpai` varchar(100) NOT NULL,
  `id_hewan` int(11) NOT NULL,
  `link_video` text NOT NULL,
  `kelas_hewan` varchar(30) NOT NULL,
  `deskripsi_hewan` text NOT NULL,
  `status_hewan` varchar(30) NOT NULL,
  `jenis_makanan` varchar(30) NOT NULL,
  `populasi` varchar(50) NOT NULL,
  `gambar_hewan` varchar(255) NOT NULL,
  `gambar_penyebaran` varchar(255) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hewan`
--

INSERT INTO `hewan` (`nama_hewan`, `nama_latin`, `kalimat_pengantar`, `asal_hewan`, `daerah_dijumpai`, `id_hewan`, `link_video`, `kelas_hewan`, `deskripsi_hewan`, `status_hewan`, `jenis_makanan`, `populasi`, `gambar_hewan`, `gambar_penyebaran`, `id_admin`) VALUES
('GAJAH AFRIKA', ' Loxodonta Africana', 'MAMALIA BESAR YANG BERASAL DARI AFRIKA', 'AFRIKA', 'SUB SAHARA AFRIKA : KENYA, TANZANIA, BOTSWANA, ZIMBABWE, NAMIBIA, ANGOLA', 48, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Aw6GkiCvcWs\" title=\"Elephants 101 | Nat Geo Wild\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'Mamalia', 'BERASAL DARI SABANA, HUTAN DAN PEGUNUNGAN SUB AFRIKA SUB SAHARA, GAJAH INI ADALAHAM MAMALIA YANG SANGAT BESAR DENGAN KULIT BERWARNA ABU-ABUNYA MEMILIKI KECERDASAN DI ATAS RATA RATA HEWAN LAINNYA DAN MEMILIKI IKATAN YANG SANGAT ERAT DENGAN KELOMPOKNYA. CIRI KHAS DARI GAJAH INI ADALAH GADINGNYA DAN BELALAI YANG PANJANG, BELALAINYA DIGUNAKAN UNTUK BERNAPAS, MANDI, MEMASUKAN AIR KE DALAM MULUTNYA, BAHKAN UNTUK MENGAMBIL MAKANAN. SAYANGNYA HEWAN YANG BESAR INI DALAM ANCAMAP KEPUNAHAN DIKARENAKAN MARAKNYA PEMBURUAN GAJAH UNTUK DI AMBIL GADINGNYA DAN PERLUASAN KEHIDUPAN MANUSIA YANG MERUSAK HABITATNYA. MEREKA DAPAT BERUMUR HINGGA 60-70 TAHUN LAMANYA.', 'Terancam Punah', 'Omnivora', '415,000', 'gajah.png', 'African_Elephant_distribution_map_without_borders.svg.png', 1),
('FLAMINGO', 'Phoenicopterus Roseus', 'SI MERAH MUDA YANG CANTIK', 'Afrika, Asia, Eropa', 'Bangladesh, Pakistan, India, Sri Lanka, Turkey. Israel, Lebanon, United Arab Emirates, Kuwait, Bahra', 49, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/QLV_K7DVeyU\" title=\"These Flamingos Have Sweet Dance Moves | Wild Argentina\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'Aves', 'Flamingo adalah spesies burung berkaki jenjang yang hidup berkelompok. Mereka berasal dari genus Phoenicopterus dan familia Phoenicopteridae. Burung ini ditemukan di belahan bumi barat dan timur, namun lebih banyak terdapat di belahan timur. ciri khas burung ini adalah kakinya yang panjang, warnanya yang sangat indah yakni merah muda dan hidup dalam kelompok besar.', 'Terancam Punah', 'Omnivora', '790,000(diperkirakan)', 'flaminggo - Copy.png', 'Map-of-the-global-distribution-of-flamingo-habitats-and-haloarchaeal-isolation-sites.png', 1),
('KOMODO', 'Varanus Komodoensis', 'MAKHLUK PRASEJARAH YANG MASIH HIDUP SAMPAI SEKARANG', 'ASIA', 'Indonesia (di Pulau Komodo, Rinca, Flores, Gili Motang, dan Gili Dasami)', 50, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/C20t4OJDpVA\" title=\"Living Among Ancient Dragons | National Geographic\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'Reptilia', 'Komodo adalah spesies reptil besar yang hidup di Pulau Komodo, Rinca, Flores, Gili Motang, dan Gili Dasami di Provinsi Nusa Tenggara Timur, Indonesia. Hewan ini oleh penduduk asli pulau Komodo juga disebut dengan nama setempat ora. Komodo merupakan spesies terbesar dari familia Varanidae, sekaligus kadal terbesar di dunia, dengan rata-rata panjang 2-3 meter dan beratnya bisa mencapai 100 kg dengan warna hijau-coklat.', 'Terancam Punah', 'Omnivora', '1,400', 'komodo.png', 'komodo_-_range_map7820442960229633811.jpg', 1),
('AXOLOTL', 'Ambystoma Mexicanium', 'SATWA LUCU YANG SELALU TERSENYUM', 'AMERIKA', 'MEKSIKO (Danau Xochimilco)', 51, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/lL87xhk63FM\" title=\"Named for an Aztec God, This Species Is Critically Endangered | National Geographic\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'Amphibia', 'Axolotl adalah amfibi yang ditemukan secara eksklusif di danau air tawar Meksiko, dengan danau Xochimilco sebagai habitat aslinya. jenis liarnya berwarna hijau dan coklat, dengan bintik bintik gelap di sekujur tubuhnya tidak seperti yang diperdagangkan yang memiliki warna cerah. mereka memiliki kipas insang yang menonjol dari leher mereka.', 'Terancam Punah', 'Karnivora', 'TIDAK DIKETAHUI', 'axolotl.png', 'xochimilco map.jpg', 1),
('HIU PUTIH', 'Carcharadon carcharias', 'IKAN BESAR YANG SANGAT GANAS', 'hampir di seluruh dunia', 'perairan beriklim sedang dan tropis di seluruh dunia.', 52, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/O2FInaOCqoo\" title=\"Great White Shark | National Geographic\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'Pisces', 'Hiu putih, sering dikenal sebagai hiu putih besar (Carcharodon carcharias) yang merupakan ikan predator terbesar di dunia. Menurut Museum Sejarah Alam Florida, hiu putih adalah bagian dari keluarga hiu \"berdarah panas\" yang disebut Lamnidae atau hiu mackerel. Spesies ini dapat mempertahankan suhu tubuh internal yang lebih hangat daripada lingkungan eksternal mereka, tidak seperti hiu \"berdarah dingin\" lainnya. Hiu putih besar betina memiliki panjang rata-rata 4,6 hingga 4,9 meter. Sedangkan hiu jantan rata-rata berukuran 3,4 hingga 4 meter. Hiu putih besar adalah predator puncak yang yang memakan berbagai mangsa, termasuk ikan, anjing laut, penyu, dan burung laut.', 'Terancam Punah', 'Omnivora', '628 ekor pada tahun 2015 di laut mediteranian', 'hiuputih.png', 'Pteroplatytrygon_violacea_rangemap.png', 1),
('ZEBRA', 'Equus Quagga', 'SI BELANG YANG MENARIK DARI AFRIKA', 'AFRIKA', 'AFRIKA TIMUR DAN SELATAN', 64, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/8xqSQ20DWDA\" title=\"Zebras Risk Their Lives to Reach This Place Every Year | Nat Geo Wild\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'Mamalia', 'ZEBRA ATAU(EQUUS QUAGGA) BERASAL DARI AFRIKA TIMUR DAN SELATAN, MEREKA LEBIH SUKA HIDUP DIMANA TERDAPAT BANYAK AIR UNTUK KEBUTUHAN MEREKA DI SABANA. POPULASI UNTUK SPESIES INI CUKUP DTABIL, TETAPI STATUS HAMPIR TERANCAM PUNAH DIKARENAKAN PERBURUAN LIAR YANG DILAKUKAN. ZEBRA JUGA MENGANDALKAN JALUR MIGRASI YANG TERHALANG OLEH HUNIAN MANUSIA MENCEGAH MEREKA UNTUK DATANG KE TEMPAT MEREKA MENDAPAT MAKANAN DAN AIR SELAMA MUSIM KEMARAU.. SEKARANG BANYAK ZEBRA YANG HIDUP DI TAMAN NASIONAL DIMANA MEREKA DILINDUNGI. zebra dapat hidup berkisar 20-25 tahun di alam liar.', 'Tidak Terancam', 'Herbivora', '150,000-250,000', '1.png', 'Plains_Zebra_area.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fakta_hewan`
--
ALTER TABLE `fakta_hewan`
  ADD PRIMARY KEY (`id_fakta`),
  ADD KEY `id_hewan` (`id_hewan`);

--
-- Indexes for table `hewan`
--
ALTER TABLE `hewan`
  ADD PRIMARY KEY (`id_hewan`),
  ADD KEY `id_admin` (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fakta_hewan`
--
ALTER TABLE `fakta_hewan`
  MODIFY `id_fakta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `hewan`
--
ALTER TABLE `hewan`
  MODIFY `id_hewan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fakta_hewan`
--
ALTER TABLE `fakta_hewan`
  ADD CONSTRAINT `fakta_hewan_ibfk_1` FOREIGN KEY (`id_hewan`) REFERENCES `hewan` (`id_hewan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hewan`
--
ALTER TABLE `hewan`
  ADD CONSTRAINT `hewan_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
