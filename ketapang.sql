/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : ketapang

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-16 01:05:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', '2a39e1c9c6672b4f2de08bc38773f5c9');

-- ----------------------------
-- Table structure for album
-- ----------------------------
DROP TABLE IF EXISTS `album`;
CREATE TABLE `album` (
  `id_album` int(11) NOT NULL AUTO_INCREMENT,
  `nama_album` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_album`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of album
-- ----------------------------
INSERT INTO `album` VALUES ('38', 'Kasdasdsdfs', '2017-07-08 21:31:49');
INSERT INTO `album` VALUES ('39', 'test 2', '2017-07-14 09:04:33');
INSERT INTO `album` VALUES ('40', 'test 3', '2017-07-14 09:15:48');

-- ----------------------------
-- Table structure for artikel
-- ----------------------------
DROP TABLE IF EXISTS `artikel`;
CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) DEFAULT NULL,
  `judul` text NOT NULL,
  `deskripsi` text NOT NULL,
  `cover` text NOT NULL,
  `view` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_artikel`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of artikel
-- ----------------------------
INSERT INTO `artikel` VALUES ('2', '2', 'asdPembangunan Hanggar Ambruk di Bandara Makassar Dihentikan ', '<p>Konstruksi</p>\r\n', '14987256002.jpg', '9', '0', '2017-07-15 23:25:58');
INSERT INTO `artikel` VALUES ('3', '1', 'Tenaga Kerja Konstruksi Indonesia Memiliki Daya Saing Tinggi ', '<p><strong>Liputan6.com</strong>, Jakarta - Menteri Pekerjaan Umum Djoko Kirmanto berkeyakinan tenaga kerja konstruksi Indonesia memiliki daya saing kompetitif dan<br />\r\nkomparatif&nbsp; yang tinggi. Bahkan tenaga kerja konstruksi Indonesia tidak kalah dengan tenaga kerja kontruksi dari negara-negara lain di Asia Tenggara.</p>\r\n\r\n<p>&quot;Sejauh ini beberapa Badan Usaha Jasa Konstruksi Nasional telah memiliki pengalaman dan berhasil melaksanakan pekerjaan konstruksi di berbagai negara ASEAN, seperti Brunei Darussalam, Filipina, Malaysia, Myanmar, dan Timor Leste.&quot;kata&nbsp; Menteri Pekerjaan Umum Djoko Kirmanto, Senin (29/9/2014).</p>\r\n\r\n<p>Menurut Djoko, tahun ini nilai pasar konstruksi Indonesia akan menyamai pasar konstruksi di Korea Selatan, bahkan Indonesia diprediksi akan menjadi pasar perumahan ketiga terbesar di dunia. Artinya, Indonesia di samping merupakan pasar potensial, tetapi juga mampu berperan sebagai basis produksi sektor konstruksi di Kawasan ASEAN.</p>\r\n\r\n<p>Menyikapi akan segera terbentuknya Masyarakat Ekonomi Asean (MEA) pada akhir 2015, Djoko Kirmanto mengingatkan agar sektor konstruksi di Indonesia bersiap diri menghadapi keterbukaan pasar di lingkup ASEAN. Tentunya disiplin dan kerja keras semua bagian masyarakat konstruksi sangat dibutuhkan.</p>\r\n\r\n<p>&quot;Mari kita sikapi MEA secara proporsional, yang terpenting saya menghimbau para pelaku konstruksi untuk mempersiapkan diri<br />\r\nsebaik-baiknya, &quot; tutur Djoko.</p>\r\n\r\n<p>Djoko Kirmanto juga menghimbau agar perdagangan bebas dalam lingkup negara ASEAN tidak hanya dipersepsi untuk persaingan, namun justru untuk mengintegrasikan dan saling melengkapi kapasitas antara negara-negara tersebut dalam menghadapi negara-negara non ASEAN di era globalisasi yang lebih luas pada 2020 nanti.</p>\r\n\r\n<p>Pemerintah sendiri telah mengambil langkah-langkap progresif untuk mempersiapkan pelaku konstruksi nasional dalam menghadapi MEA. Salah satunya bahwa untuk melakukan usaha jasa konstruksi di Indonesia Badan Usaha Jasa Konstriksi ASEAN harus bekerja sama dengan Badan Usaha Jasa Konstruksi Nasional kualifikasi besar dalam bentuk joint operation atau joint venture.</p>\r\n\r\n<p>Kemudian, dengan penyertaan modal asing saat ini masih dibatasi maksimal sebesar 55 persen untulk kontraktor dan 51<br />\r\npersen untuk konsultan yang nantinya akan menjadi sebesar 70 persen setelah diberlakukannya MEA.</p>\r\n\r\n<p>Oleh karena itu, Badan Usaha Jasa Konstruksi Nasional harus menjadi partner yang aktif dalam bermitra dengan Badan Usaha Jasa Konstruksi ASEAN agar dapat mengambil manfaat dari kerja sama ini dengan tecerminnya kapasitas SDM, teknologi, dan permodalan Badan Usaha Jasa Konstruksi Nasional.</p>\r\n\r\n<p>Di samping itu, tenaga kerja jasa konstruksi asing yang bekerja di Indonesia masih dibatasi hanya untuk tingkat&nbsp; direktur, manajer, dan tenaga ahli serta harus tetap memebuhi ketentuan paraturan perundang-undangan ketenagakerjaan dan keimigrasian yang berlaku di Indonesia. &quot;Saya percaya sampai saat ini, tenaga kerja konstruksi Indonesia memiliki daya saing kompetitif dan komparatif yang relatif tinggi di kawasaan Asean,&quot; pungkas Djoko Kirmanto.</p>\r\n\r\n<p>Pengembangan SDM sangat krusial karena masih banyak pihak yang menilai sektor konstruksi Indonesia dinilai belum siap untuk menghadapi ketatnya persaingan dalam implementasi MEA 2015. Jumlah perusahaan konstruksi di Indonesia memang lebih banyak dibandingkan tenaga ahli yang tersedia. Sebagai perbandingan, perusahaan konstruksi di Indonesia mencapai 114.000,sementara China hanya 66.000. Perusahaan konstruksi China sebagian besar menangani skala proyek yang lebih<br />\r\nbesar.</p>\r\n\r\n<p>Untuk periode 2006-2013, pertumbuhan rata-rata tenaga kerja hanya sekitar 6 persen, sementara pertumbuhan rata-rata nilai konstruksi untuk periode yang sama sebesar 21 persen. Badan Pusat Statistik pada 2013 menyebutkan SDM konstruksi Indonesia mencapai 6,9 juta atau 5,7 persen dari tenaga kerja nasional.</p>\r\n\r\n<p>Dari jumlah tersebut, sebesar 4 persen merupakan tenaga ahli, 20 persen tenaga terampil, dan 76 persen sisanya merupakan tenaga kerja kurang terampil. (Amd/Gdn)</p>\r\n', '1498663300LOGO10.jpeg', '15', '0', '2017-07-15 23:20:15');

-- ----------------------------
-- Table structure for config
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` longtext,
  `description` longtext,
  `icon` longtext,
  `instagram` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `logo` longtext,
  `meta_deskripsi` text NOT NULL,
  `basic` int(11) DEFAULT NULL,
  `meta_keyword` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of config
-- ----------------------------
INSERT INTO `config` VALUES ('1', 'Ketapang Kuning', 'admin@ketapangkuning.com', '083849940637', 'Universitas 17 Agustus 1945 Surabaya', 'Ketapangkuning adalah sebuah desa di wilayah Kecamatan Ngusikan, Kabupaten Jombang, Provinsi Jawa Timur.<br>', 'logo.png', 'kkn10', 'kkn10', 'logo1.png', 'Kelurahan / Desa Ketapang Kuning Kecamatan Ngusikan Kabupaten / Kota Kab. Jombang Provinsi Jawa Timur Kode Pos 61454			', '5', 'Nomor kode pos di Propinsi Jawa Timur, Kota Jombang, Kecamatan Ngusikan, Ketapang Kuning,kab. jombang							\r\n											');

-- ----------------------------
-- Table structure for gambar_album
-- ----------------------------
DROP TABLE IF EXISTS `gambar_album`;
CREATE TABLE `gambar_album` (
  `id_gambar` int(11) NOT NULL AUTO_INCREMENT,
  `id_album` int(11) DEFAULT NULL,
  `gambar` text,
  PRIMARY KEY (`id_gambar`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of gambar_album
-- ----------------------------
INSERT INTO `gambar_album` VALUES ('11', '38', 'LOGO_10.jpeg');
INSERT INTO `gambar_album` VALUES ('15', '38', '2_i.jpg');
INSERT INTO `gambar_album` VALUES ('16', '39', 'Asset_1.png');
INSERT INTO `gambar_album` VALUES ('17', '39', 'usaha-keripik-pangsit.jpg');
INSERT INTO `gambar_album` VALUES ('18', '40', 'placeit.png');

-- ----------------------------
-- Table structure for header
-- ----------------------------
DROP TABLE IF EXISTS `header`;
CREATE TABLE `header` (
  `id_header` int(11) NOT NULL AUTO_INCREMENT,
  `profil` varchar(255) DEFAULT NULL,
  `artikel` varchar(255) DEFAULT NULL,
  `produk` varchar(255) DEFAULT NULL,
  `potensi` varchar(255) DEFAULT NULL,
  `gallery` varchar(255) DEFAULT NULL,
  `kontak` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_header`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of header
-- ----------------------------
INSERT INTO `header` VALUES ('1', 'profil.jpg', 'artikel.png', 'artikel1.png', 'artikel2.png', 'artikel3.PNG', 'artikel4.png');

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `deskripsi_kat` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES ('1', 'Konstruksi2', '<p>Konstruksi4</p>\r\n', '2017-06-29 16:05:38');
INSERT INTO `kategori` VALUES ('2', 'halo', 'test', '2017-07-15 23:26:08');

-- ----------------------------
-- Table structure for pejabat
-- ----------------------------
DROP TABLE IF EXISTS `pejabat`;
CREATE TABLE `pejabat` (
  `id_pejabat` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `prioritas` int(255) DEFAULT NULL,
  PRIMARY KEY (`id_pejabat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pejabat
-- ----------------------------
INSERT INTO `pejabat` VALUES ('3', 'zc 2', 'czxc 2', '150013394160_1_energetics_noni_(1).jpg', '12');

-- ----------------------------
-- Table structure for pesan
-- ----------------------------
DROP TABLE IF EXISTS `pesan`;
CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` enum('0','1') DEFAULT '0',
  `pesan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pesan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pesan
-- ----------------------------
INSERT INTO `pesan` VALUES ('2', 'sdf', 'sdf', '0', 'sdf', '2017-07-16 01:00:21');

-- ----------------------------
-- Table structure for potensi
-- ----------------------------
DROP TABLE IF EXISTS `potensi`;
CREATE TABLE `potensi` (
  `id_potensi` int(11) NOT NULL AUTO_INCREMENT,
  `judul` text NOT NULL,
  `deskripsi` text NOT NULL,
  `cover` text NOT NULL,
  `view` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_potensi`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of potensi
-- ----------------------------
INSERT INTO `potensi` VALUES ('7', 'ini test potensi', '<p>isi test potensi</p>\r\n', '14999987216-03-11_MARK_green_blueberry_fruit_after_bloom_.jpg', '5', '2017-07-15 20:43:38');
INSERT INTO `potensi` VALUES ('8', 'test potensi 2', '<p>test potensi 2</p>\r\n', '150002551460_1_energetics_noni_(1).jpg', '26', '2017-07-15 21:11:15');

-- ----------------------------
-- Table structure for produk
-- ----------------------------
DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `judul` text NOT NULL,
  `deskripsi` text NOT NULL,
  `cover` text NOT NULL,
  `view` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of produk
-- ----------------------------
INSERT INTO `produk` VALUES ('4', 'ini produk2', '<p>isi produk2</p>\r\n', '14996150512_i.jpg', '50', '2017-07-15 21:11:41');

-- ----------------------------
-- Table structure for profil
-- ----------------------------
DROP TABLE IF EXISTS `profil`;
CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL AUTO_INCREMENT,
  `nama_desa` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_profil`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of profil
-- ----------------------------
INSERT INTO `profil` VALUES ('1', 'Ketapang Kuning', 'profil7.png', 'Ketapangkuning adalah sebuah desa di wilayah Kecamatan Ngusikan, Kabupaten Jombang, Provinsi Jawa Timur.<br>');

-- ----------------------------
-- Table structure for slider
-- ----------------------------
DROP TABLE IF EXISTS `slider`;
CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL AUTO_INCREMENT,
  `judul` text NOT NULL,
  `deskripsi` text NOT NULL,
  `cover` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_slider`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of slider
-- ----------------------------
INSERT INTO `slider` VALUES ('5', 'ini slider 2', '<p>ini isi slider 2</p>\r\n', '15000532486.png', '2017-07-15 00:27:28');
