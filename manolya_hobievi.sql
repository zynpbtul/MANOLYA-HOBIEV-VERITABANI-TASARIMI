-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 24 May 2026, 22:42:11
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `manolya_hobievi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_ad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_ad`) VALUES
(1, 'Amigurumi'),
(2, 'Atkı & Eldiven'),
(3, 'Çanta'),
(4, 'Bebek Hırkası');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `musteri`
--

CREATE TABLE `musteri` (
  `musteri_id` int(11) NOT NULL,
  `ad` varchar(50) NOT NULL,
  `soyad` varchar(50) NOT NULL,
  `e_posta` varchar(100) NOT NULL,
  `acik_adres` text NOT NULL,
  `telefon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `musteri`
--

INSERT INTO `musteri` (`musteri_id`, `ad`, `soyad`, `e_posta`, `acik_adres`, `telefon`) VALUES
(1, 'Ahmet', 'Yılmaz', 'ahmet@mail.com', 'Kavaklıdere Mah. Çankaya / Ankara', '05551112233'),
(2, 'Ayşe', 'Kaya', 'ayse@mail.com', 'Mavişehir / İzmir', '05322223344');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis`
--

CREATE TABLE `siparis` (
  `siparis_id` int(11) NOT NULL,
  `siparis_tarih` datetime DEFAULT current_timestamp(),
  `toplam_tutar` decimal(10,2) NOT NULL,
  `musteri_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `siparis`
--

INSERT INTO `siparis` (`siparis_id`, `siparis_tarih`, `toplam_tutar`, `musteri_id`) VALUES
(1, '2026-05-19 14:30:00', 950.00, 1),
(2, '2026-05-19 15:15:00', 450.00, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis_detay`
--

CREATE TABLE `siparis_detay` (
  `siparis_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `adet` int(11) NOT NULL,
  `birim_fiyat` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `siparis_detay`
--

INSERT INTO `siparis_detay` (`siparis_id`, `urun_id`, `adet`, `birim_fiyat`) VALUES
(1, 1, 1, 500.00),
(1, 11, 1, 450.00),
(2, 11, 1, 450.00);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun`
--

CREATE TABLE `urun` (
  `urun_id` int(11) NOT NULL,
  `urun_ad` varchar(150) NOT NULL,
  `urun_fiyat` decimal(10,2) NOT NULL,
  `urun_stok` int(11) NOT NULL,
  `urun_aciklama` text DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `urun`
--

INSERT INTO `urun` (`urun_id`, `urun_ad`, `urun_fiyat`, `urun_stok`, `urun_aciklama`, `kategori_id`) VALUES
(1, 'Gül motifli çanta', 500.00, 15, 'El emeği gül motifli şık örgü çanta', 3),
(2, 'Yıldız çanta', 400.00, 12, 'Yıldız desenli modern tasarım çanta', 3),
(3, 'Vintage çanta', 530.00, 8, 'Retro tarzı el örgüsü vintage çanta', 3),
(4, 'Lale çanta', 460.00, 10, 'Lale motifleriyle süslenmiş şık çanta', 3),
(5, 'Popcorn çanta', 500.00, 14, 'Popcorn örgü modelli kabartmalı çanta', 3),
(6, 'Mini kalp çanta', 450.00, 20, 'Kalp detaylı sevimli mini örgü çanta', 3),
(7, 'Renkli motif çanta', 400.00, 11, 'Canlı renklerden oluşan motifli çanta', 3),
(8, 'Kahverengi motif çanta', 550.00, 7, 'Sonbahar tonlarında kahverengi örgü çanta', 3),
(9, 'Çiçek motif çanta', 500.00, 9, 'Çiçek desenli el yapımı şık çanta', 3),
(10, 'Çiçek çanta', 400.00, 13, 'Zarif çiçek tasarımlı günlük örgü çanta', 3),
(11, 'Kalpli bej hırka', 450.00, 10, 'Kalp motifli sevimli bej bebek hırkası', 4),
(12, 'Çiçekli hırka', 400.00, 12, 'Çiçek işlemeli el örgüsü bebek hırkası', 4),
(13, 'Güllü hırka', 450.00, 8, 'Zarif gül detaylı örgü bebek hırkası', 4),
(14, 'Mavi işlemeli hırka', 550.00, 15, 'Mavi iplikle işlenmiş şık hırka', 4),
(15, 'Pembe işlemeli hırka', 450.00, 11, 'Pembe detaylı el emeği hırka', 4),
(16, 'Fırfırlı mavi hırka', 500.00, 9, 'Modern fırfır detaylı mavi bebek hırkası', 4),
(17, 'Çiçekli pudra hırka', 500.00, 14, 'Pudra tonlarında çiçek işlemeli hırka', 4),
(18, 'Kiremit hırka', 450.00, 7, 'Sonbahar renklerinde örgü kiremit hırka', 4),
(19, 'Yakalı kahverengi hırka', 600.00, 5, 'Özel yakalı şık kahverengi bebek hırkası', 4),
(20, 'İşlemeli bej hırka', 500.00, 13, 'Geleneksel işlemeli bej örgü hırka', 4),
(21, 'Bordo Atkı', 800.00, 10, 'Yumuşacık dokulu, el örgüsü bordo renkli klasik atkı', 2),
(22, 'Çiçekli Atkı', 850.00, 8, 'Üzeri el emeği çiçek motifleriyle işlenmiş zarif atkı', 2),
(23, 'Bej Atkı', 800.00, 12, 'Her kombine uyum sağlayan bej tonlarında örgü atkı', 2),
(24, 'Kalp Desenli Atkı', 900.00, 7, 'Kış günleri için sevimli kalp motifli örgü atkı', 2),
(25, 'Ay&Yıldız Desenli Atkı', 900.00, 15, 'Özel tasarım Ay ve Yıldız motifli el emeği atkı', 2),
(26, 'Kalpli eldiven', 300.00, 14, 'Üzerinde minik kalp detayı bulunan örgü eldiven', 2),
(27, 'Fiyonklu pembe eldiven', 200.00, 20, 'Fiyonk süslemeli, şık pembe renkli parmaksız eldiven', 2),
(28, 'Fiyonklu bej eldiven', 200.00, 18, 'Zarif fiyonk detaylı, kullanışlı bej örgü eldiven', 2),
(29, 'Çiçekli eldiven', 200.00, 11, 'Çiçek nakışlarıyla süslenmiş el yapımı eldiven', 2),
(30, 'Motif eldiven', 250.00, 9, 'Geleneksel motiflerle bezenmiş kalın kışlık eldiven', 2),
(31, 'Aksesuarlı tavşan', 250.00, 12, 'Özel kıyafet ve aksesuarlarıyla el örgüsü sevimli tavşan', 1),
(32, 'Çilek', 150.00, 25, 'Anahtarlık veya dekoratif amaçlı amigurumi çilek', 1),
(33, 'Pelerinli kedi', 250.00, 8, 'Özel tasarım pelerinli amigurumi kedi oyuncağı', 1),
(34, 'Balık şapkalı kedi', 200.00, 10, 'Balık şeklinde şapkasıyla sevimli örgü kedi', 1),
(35, 'Mini patiler', 200.00, 15, 'Örgü kedi/köpek patisi şeklinde mini figürler', 1),
(36, 'Minik ayılar', 200.00, 14, 'Yumuşak dokulu el emeği minik amigurumi ayıcık', 1),
(37, 'Pembe fiyonk', 100.00, 30, 'Saç aksesuarı veya süsleme için örgü pembe fiyonk', 1),
(38, 'Mini denizanası', 200.00, 18, 'Renkli kollarıyla sarkan amigurumi denizanası', 1),
(39, 'Aşçı civciv', 200.00, 9, 'Aşçı şapkalı el örgüsü sevimli civciv figürü', 1),
(40, 'Mini tavşan', 200.00, 22, 'Avuç içine sığan el yapımı mini amigurumi tavşancık', 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `musteri`
--
ALTER TABLE `musteri`
  ADD PRIMARY KEY (`musteri_id`);

--
-- Tablo için indeksler `siparis`
--
ALTER TABLE `siparis`
  ADD PRIMARY KEY (`siparis_id`),
  ADD KEY `musteri_id` (`musteri_id`);

--
-- Tablo için indeksler `siparis_detay`
--
ALTER TABLE `siparis_detay`
  ADD PRIMARY KEY (`siparis_id`,`urun_id`),
  ADD KEY `urun_id` (`urun_id`);

--
-- Tablo için indeksler `urun`
--
ALTER TABLE `urun`
  ADD PRIMARY KEY (`urun_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `musteri`
--
ALTER TABLE `musteri`
  MODIFY `musteri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `siparis`
--
ALTER TABLE `siparis`
  MODIFY `siparis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `urun`
--
ALTER TABLE `urun`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `siparis`
--
ALTER TABLE `siparis`
  ADD CONSTRAINT `siparis_ibfk_1` FOREIGN KEY (`musteri_id`) REFERENCES `musteri` (`musteri_id`);

--
-- Tablo kısıtlamaları `siparis_detay`
--
ALTER TABLE `siparis_detay`
  ADD CONSTRAINT `siparis_detay_ibfk_1` FOREIGN KEY (`siparis_id`) REFERENCES `siparis` (`siparis_id`),
  ADD CONSTRAINT `siparis_detay_ibfk_2` FOREIGN KEY (`urun_id`) REFERENCES `urun` (`urun_id`);

--
-- Tablo kısıtlamaları `urun`
--
ALTER TABLE `urun`
  ADD CONSTRAINT `urun_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
