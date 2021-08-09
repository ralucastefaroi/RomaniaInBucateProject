-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: iun. 26, 2021 la 09:21 PM
-- Versiune server: 10.4.18-MariaDB
-- Versiune PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `romania_in_bucate`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `comenzi`
--

CREATE TABLE `comenzi` (
  `id_comanda` int(20) NOT NULL,
  `id_utilizator` int(20) NOT NULL,
  `status_comanda` varchar(20) CHARACTER SET latin1 NOT NULL,
  `total_comanda` int(20) NOT NULL,
  `data_comanda` varchar(20) NOT NULL,
  `adresa` varchar(200) CHARACTER SET latin1 NOT NULL,
  `nr_telefon` int(10) NOT NULL,
  `tip_plata` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `detalii_comenzi`
--

CREATE TABLE `detalii_comenzi` (
  `id_detalii_comanda` int(20) NOT NULL,
  `id_comanda` int(20) NOT NULL,
  `id_produs` int(20) NOT NULL,
  `denumire_produs` varchar(60) CHARACTER SET latin1 NOT NULL,
  `cantitate` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `produse`
--

CREATE TABLE `produse` (
  `id_produs` int(20) NOT NULL,
  `denumire` varchar(50) CHARACTER SET latin1 NOT NULL,
  `descriere` mediumtext CHARACTER SET latin1 NOT NULL,
  `categorie` varchar(70) CHARACTER SET latin1 NOT NULL,
  `cantitate` int(11) NOT NULL,
  `gramaj` varchar(50) CHARACTER SET latin1 NOT NULL,
  `imagine_produs` varchar(225) CHARACTER SET latin1 NOT NULL,
  `pret` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `produse`
--

INSERT INTO `produse` (`id_produs`, `denumire`, `descriere`, `categorie`, `cantitate`, `gramaj`, `imagine_produs`, `pret`) VALUES
(9, 'Piept de pui', '', 'Carne', 2, '900 g', 'pieptdepui.jpg', 25),
(19, 'Smantana ', '', 'Lactate', 10, '900', 'Produse/smantana.jpg', 15),
(21, 'Oua de Gaina', '', 'Lactate', 10, '10 bucati', 'Produse/oua.jpg', 13),
(22, 'Morcovi', '', 'Legume', 10, '1 kg', 'Produse/morcovi.jpg', 3),
(23, 'Pastarnac', '', 'Legume', 10, '1 kg', 'Produse/pastarnac.jpg', 3),
(24, 'Carne de porc', '', 'Carne', 10, '1 kg', 'Produse/carneporc.jpg', 17),
(25, 'Carnati de porc traditionali', '', 'Carne', 10, '500 g', 'Produse/carnati.png', 20),
(26, 'Usturoi', '', 'Legume', 20, '250 g', 'Produse/usturoi.jpg', 3),
(27, 'Vin alb demisec', '', 'Bauturi', 10, '0,75 l', 'Produse/cotnari.jpg', 10),
(28, 'Boia dulce ', '', 'Condimente', 20, '100 g', 'Produse/boia dulce.png', 5),
(29, 'Scortisoara macinata ', '', 'Condimente', 20, '15 g', 'Produse/scortisoara.jpg', 1),
(30, 'Lapte ', '', 'Lactate', 10, '1 l', 'Produse/lapte.jpg', 6),
(31, 'Faina ', '', 'Alimente de baza', 20, '1 kg', 'Produse/faina.jpg', 4),
(32, 'Cartofi', '', 'Legume', 20, '1 kg', 'Produse/cartofi.jpg', 2),
(33, 'Unt', '', 'Lactate', 20, '200 g', 'Produse/unt.jpg', 10),
(34, 'Prune rosii', '', 'Fructe', 20, '1kg', 'Produse/prune.jpg', 10),
(35, 'Pesmet', '', 'Alimente de baza', 20, '500 g', 'Produse/pesmet.jpg', 4),
(36, 'Ceapa', '', 'Legume', 30, '1 kg', 'Produse/ceapa.jpg', 2),
(37, 'Tarhon', '', 'Condimente', 20, '8 g', 'Produse/tarhon.png', 2),
(38, 'Fasole alba', '', 'Legume', 20, '1 kg', 'Produse/fasolealba.jpg', 9),
(39, 'Telina', '', 'Legume', 20, '1 kg', 'Produse/telina.jpg', 6),
(40, 'Urda', '', 'Lactate', 10, '500 g', 'Produse/urda.jpg', 6),
(41, 'Iaurt grecesc', '', 'Lactate', 20, '150 g', 'Produse/iaurt.jpg', 2),
(42, 'Malai', '', 'Alimente de baza', 20, '1 kg', 'Produse/malai.jpg', 5),
(43, 'Telemea de vaca', '', 'Lactate', 20, '350 g', 'Produse/telemea.jpg', 10),
(44, 'Ulei', '', 'Alimente de baza', 20, '1 l', 'Produse/ulei.jpg', 7),
(45, 'Branza de vaca', '', 'Lactate', 20, '500 g', 'Produse/branzavaci.jpg', 9),
(46, 'Praz', '', 'Legume', 20, '1 kg', 'Produse/praz.jpg', 10),
(47, 'Cascaval', '', 'Lactate', 20, '250 g', 'Produse/cascaval.jpg', 11),
(48, 'Ciuperci', '', 'Legume', 20, '500 g', 'Produse/ciuperci.jpg', 6),
(49, 'Pastrav', '', 'Carne', 10, '1 kg', 'Produse/pastrav.jpg', 27),
(50, 'Drojdie uscata', '', 'Alimente de baza', 20, '10 g', 'Produse/drojdie.jpg', 2),
(51, 'Dovlecei', '', 'Legume', 20, '1 kg', 'Produse/dovlecei.jpg', 5),
(52, 'Vinete', '', 'Legume', 20, '1 kg', 'Produse/vinete.jpg', 9),
(53, 'Rosii', '', 'Legume', 20, '1 kg', 'Produse/rosii.jpg', 6),
(54, 'Ardei Kapia', '', 'Legume', 20, '1 kg', 'Produse/ardei.jpg', 9),
(55, 'Busuioc', '', 'Condimente', 20, '10 g', 'Produse/busuioc.png', 1),
(56, 'Praf de copt', '', 'Alimente de baza', 20, '30 g', 'Produse/praf.png', 1),
(57, 'Fasole verde pastai', '', 'Legume', 20, '1 kg', 'Produse/pastai.jpg', 12),
(58, 'Delikat', '', 'Alimente de baza', 20, '80 g', 'Produse/delikat.jpg', 5),
(59, 'Sos de soia', '', 'Produse internationale', 20, '150 ml', 'Produse/soia.jpg', 6),
(60, 'Ulei de masline', '', 'Alimente de baza', 20, '250 ml', 'Produse/uleimasline.jpg', 14),
(61, 'Ardei gras rosu', '', 'Legume', 20, '1 kg', 'Produse/ardeigras.jpg', 12),
(62, 'Bors', '', 'Alimente de baza', 20, '1 l', 'Produse/bors.jpg', 2),
(63, 'Macrou', '', 'Carne', 20, '1 kg', 'Produse/macrou.png', 30),
(64, 'Medalion crap', '', 'Carne', 10, '1 kg', 'Produse/medalioncrap.jpg', 30),
(65, 'Foi de dafin', '', 'Condimente', 20, '4 g', 'Produse/dafin.png', 1),
(66, 'Scrumbie', '', 'Carne', 20, '1 kg', 'Produse/scr.jpg', 30),
(69, 'Pulpe de pui dezosate', '', 'Carne', 20, '1 kg', 'Produse/pulpe.jpg', 15),
(72, 'Vin rosu demidulce', '', 'Bauturi', 20, '0,75 l', 'Produse/vinrosu.jpg', 30),
(73, 'Vin roze demidulce', '', 'Bauturi', 20, '0,75 l', 'Produse/vinroze.jpg', 15),
(74, 'Vin rosu sec', '', 'Bauturi', 20, '0,75 l', 'Produse/vinrosusec.jpg', 17);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `restaurante`
--

CREATE TABLE `restaurante` (
  `id_restaurant` int(20) NOT NULL,
  `denumire` varchar(50) CHARACTER SET latin1 NOT NULL,
  `adresa` varchar(70) CHARACTER SET latin1 NOT NULL,
  `imagine_restaurant` varchar(255) CHARACTER SET latin1 NOT NULL,
  `harta` longtext NOT NULL,
  `rating` varchar(225) CHARACTER SET latin1 NOT NULL,
  `regiune` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `restaurante`
--

INSERT INTO `restaurante` (`id_restaurant`, `denumire`, `adresa`, `imagine_restaurant`, `harta`, `rating`, `regiune`) VALUES
(5, 'Restaurant Traditional Popasul Vladichii', 'Radauti, Suceava', 'Restaurante/popasul.jpg', 'https://www.google.ro/maps/place/Popasul+Vladichii/@47.8211201,25.9422042,17z/data=!3m1!4b1!4m5!3m4!1s0x47344f9dfa97b2d7:0x6969f4f547aead1!8m2!3d47.8211165!4d25.9443929', '4,6/5', 'Bucovina'),
(6, 'Casa Bucovineana', 'Suceava', 'Restaurante/casa.jpg', 'https://www.google.ro/maps/place/Casa+Bucovinean%C4%83/@47.6504582,26.2526959,17z/data=!3m1!4b1!4m8!3m7!1s0x4734fc244369cbbb:0xa6fd9a0ee375d4b0!5m2!4m1!1i2!8m2!3d47.6504487!4d26.2548754', '4,5/5', 'Bucovina'),
(7, 'Perla Bucovinei', 'Gura Humorului, Suceava', 'Restaurante/perla.jpg', 'https://www.google.ro/maps/place/Perla+Bucovinei/@47.5188749,25.8599423,17z/data=!3m1!4b1!4m8!3m7!1s0x4735a61d27ee1123:0x245d39995b7eee6c!5m2!4m1!1i2!8m2!3d47.5188713!4d25.862131', '4,5/5', 'Bucovina'),
(8, 'Zama', 'Strada Napoca Nr.16, Cluj-Napoca, Cluj', 'Restaurante/zama.jpg', 'https://www.google.ro/maps/place/Zama/@46.767685,23.5850413,17z/data=!3m1!4b1!4m5!3m4!1s0x47490e82be32a559:0x3ea7bbfa63361603!8m2!3d46.7676904!4d23.5872259', '4,5/5', 'Transilvania'),
(9, 'La Ceaun - Weiss', 'Strada Michael Weiss 27, Brasov', 'Restaurante/ceaun.jpg', 'https://www.google.ro/maps/place/La+Ceaun+-+Weiss/@45.6425921,25.5890259,17z/data=!3m1!4b1!4m5!3m4!1s0x40b35b7bad8cfc35:0x90031c842945ce39!8m2!3d45.6425921!4d25.5912146', '4,6/5', 'Transilvania'),
(10, 'Casa Romaneasca', 'Pia?a Unirii 15, Brasov', 'Restaurante/casab.jpg', 'https://www.google.com/maps/place/Casa+Rom%C3%A2neasc%C4%83/@45.6361447,25.5775291,17z/data=!3m1!4b1!4m5!3m4!1s0x40b35b689b67c23d:0xfbc43fb8bc161211!8m2!3d45.6361447!4d25.5797178', '4,3/5', 'Transilvania'),
(13, 'Breb 148 - Local Food&amp;Garden', 'Nr. 148, Breb, Ocna Sugatag, Maramures', 'Restaurante/breb.jpg', 'https://www.google.ro/maps/place/Breb+148+-+Local+Food%26Garden/@47.7467699,23.89134,17z/data=!3m1!4b1!4m5!3m4!1s0x4737c9fad2246187:0xf7cea9ef038c73cb!8m2!3d47.7467663!4d23.8935287', '4,7/5', 'Maramures'),
(14, 'Casa Iurca de Calinesti', 'Strada Dragos Voda 14, Sighetu Marmatiei, Maramures', 'Restaurante/calinesti.jpg', 'https://www.google.ro/maps/place/Casa+Iurca+de+C%C4%83line%C5%9Fti/@47.9302181,23.8923669,17z/data=!3m1!4b1!4m8!3m7!1s0x4737bba8efae91d9:0xbe0bb1288a2875a8!5m2!4m1!1i2!8m2!3d47.9302181!4d23.8945556', '4,4/5', 'Maramures'),
(15, 'Casa lu\' Dochia', 'Breb 204, Ocna Sugatag, Maramures', 'Restaurante/dochia.jpg', 'https://www.google.ro/maps/place/Casa+lu\'+Dochia/@47.7430118,23.8937601,17z/data=!3m1!4b1!4m5!3m4!1s0x4737c9cf09e6c307:0x6bb8eba5655da4dd!8m2!3d47.7430118!4d23.8959488', '4,5/5', 'Maramures'),
(16, 'Pensiunea Ardealul', 'Strada Mestesugarilor 6, Oradea, Bihor', 'Restaurante/ardeal.jpg', 'https://www.google.ro/maps/place/Pensiunea+Ardealul/@47.054167,21.904491,17z/data=!3m1!4b1!4m5!3m4!1s0x474647cf2e09ce69:0x32d5602e1d0101aa!8m2!3d47.0541684!4d21.9066978', '4,4/5', 'Crisana'),
(17, 'Restaurant Ciuperca', 'Strada Graurilor nr. 80, Oradea, Bihor', 'Restaurante/ciuperca.jpg', 'https://www.google.ro/maps/place/Restaurant+Ciuperca/@47.0587961,21.9487636,17z/data=!3m1!4b1!4m5!3m4!1s0x474647fddacf255b:0xa5a6e9d3d4f09de8!8m2!3d47.0587961!4d21.9509523', '4,4/5', 'Crisana'),
(18, 'Vatra', 'Calea Moldovei 133, Bacau', 'Restaurante/va.jpg', 'https://www.google.ro/maps/place/Vatra/@46.5985759,26.9038009,17z/data=!3m1!4b1!4m5!3m4!1s0x40b5655e3b3b9d55:0x3947e4bad065d9be!8m2!3d46.5986009!4d26.9060757', '4,3/5', 'Moldova'),
(19, 'Crama Domneasca', 'Strada Vasile Alecsandri 12, Slanic Moldova, Bacau', 'Restaurante/crama.jpg', 'https://www.google.ro/maps/place/Crama+Domneasc%C4%83/@46.2067153,26.4354711,17z/data=!3m1!4b1!4m5!3m4!1s0x40b4e2120e93a2bb:0x8410780b447316b9!8m2!3d46.2067153!4d26.4376598', '4,3/5', 'Moldova'),
(20, 'Restaurant Cascada', 'DN12B, Slanic Moldova, Bacau', 'Restaurante/cascada.jpg', 'https://www.google.ro/maps/place/Restaurant+Cascada/@46.1973016,26.4193776,17z/data=!3m1!4b1!4m5!3m4!1s0x40b4e23ced884fcb:0xff6cb5a495d2ff9f!8m2!3d46.1973016!4d26.4215663', '4,5/5', 'Moldova'),
(21, 'Casa Seciu', 'Strada Podgoriei, Bolde?ti-Scaeni, Prahova', 'Restaurante/seciu.jpg', 'https://www.google.ro/maps/place/Casa+Seciu/@45.0291343,26.0496997,17z/data=!3m1!4b1!4m8!3m7!1s0x40b3b4afe03d02d5:0x51269d6ce6ea437c!5m2!4m1!1i2!8m2!3d45.0291343!4d26.0518884', '4,4/5', 'Muntenia'),
(22, 'Casa Romaneasca', 'Calea Bucurestilor 285A, Otopeni, Ilfov', 'Restaurante/casarom.jpg', 'https://www.google.ro/maps/place/Casa+Rom%C3%A2neasc%C4%83/@44.5691333,26.0672492,17z/data=!3m2!4b1!5s0x40b21b7b8a35fb3b:0x5786800871daad1c!4m8!3m7!1s0x40b21b6374b546a1:0x8ad7829351a1e87b!5m2!4m1!1i2!8m2!3d44.5691333!4d26.0694379', '4,1/5', 'Muntenia'),
(23, 'Casa Domneasca', 'Bulevardul Alexandru Ioan Cuza 87, Braila', 'Restaurante/casadom.jpg', 'https://www.google.ro/maps/place/Casa+Domneasc%C4%83/@45.2697071,27.9652235,17z/data=!3m1!4b1!4m5!3m4!1s0x40b729e469e03561:0x585a194e2d057ea7!8m2!3d45.2697099!4d27.9674776', '4,5/5', 'Muntenia'),
(24, 'Taverna Oradea', 'Strada Mihai Eminescu 2, Oradea 410019', 'Restaurante/taverna.jpg', 'https://www.google.ro/maps/place/Taverna+Oradea/@47.0588601,21.9323519,17z/data=!3m1!4b1!4m5!3m4!1s0x474647e135c4f9af:0xd8688b306c206987!8m2!3d47.058835!4d21.9344947', '4,2/5', 'Crisana'),
(25, 'Casa Ghincea', 'Strada Madona Dudu 31, Craiova, Dolj', 'Restaurante/ghincea.jpg', 'https://www.google.ro/maps/place/Casa+Ghincea/@44.3169126,23.7895756,17z/data=!3m1!4b1!4m5!3m4!1s0x4752d79eb0bdc915:0x20b3b072d597fa37!8m2!3d44.3169612!4d23.7917741', '4,4/5', 'Oltenia'),
(26, 'Hanul Domnesc', 'Bulevardul Carol I 126, Craiova, Dolj', 'Restaurante/han.jpg', 'https://www.google.ro/maps/place/Hanul+Domnesc/@44.3258402,23.8072741,17z/data=!3m1!4b1!4m5!3m4!1s0x4752d70d74d8c04b:0xb27d3b30b1db7169!8m2!3d44.3258402!4d23.8094628', '4,3/5', 'Oltenia'),
(27, 'La Boieru\'', 'Strada Viitorului nr. 20, Targu Jiu, Gorj', 'Restaurante/boier.jpg', 'https://www.google.ro/maps/place/La+Boieru\'/@45.0285248,23.2589869,17z/data=!3m1!4b1!4m5!3m4!1s0x474d8a6fdc69f5cb:0xd07ab99a2ee06f92!8m2!3d45.0285248!4d23.2611756', '4,6/5', 'Oltenia'),
(28, 'Casa Bunicii 1 Timisoara', 'Strada Maresal Alexandru Averescu 1B, Timisoara, Timis', 'Restaurante/bunic.jpg', 'https://www.google.ro/maps/place/Casa+Bunicii+1+Timisoara/@45.7325422,21.217946,17z/data=!3m1!4b1!4m5!3m4!1s0x47455d9cf3a1183b:0x5d7503b69ccc3e44!8m2!3d45.7325422!4d21.2201347', '4,3/5', 'Banat'),
(29, 'Miorita', 'Florimund Mercy, Strada Florimund Mercy 7, Timisoara, Timis', 'Restaurante/miorita.jpg', 'https://www.google.ro/maps/place/Miori%C8%9Ba/@45.7569899,21.2265565,17z/data=!3m1!4b1!4m5!3m4!1s0x474567803241817b:0x40d728a1a0e137d5!8m2!3d45.7569899!4d21.2287452', '4,3/5', 'Banat'),
(30, 'Curtea Veche', 'Bulevardul Revolutiei 85, Arad', 'Restaurante/curtea.jpg', 'https://www.google.ro/maps/place/Curtea+Veche/@46.1728248,21.314517,17z/data=!3m1!4b1!4m5!3m4!1s0x47459901d66b1ebd:0x93a4919264bb6a76!8m2!3d46.172824!4d21.3167099', '4,2/5', 'Banat'),
(31, 'Ca odinioara', 'Strada Viticulturii, Tulcea', 'Restaurante/odinioara.jpg', 'https://www.google.ro/maps/place/Ca+odinioar%C4%83/@45.1628027,28.7945115,17z/data=!3m1!4b1!4m5!3m4!1s0x40b75947572a508b:0x18c0095e8bf93e9!8m2!3d45.1628027!4d28.7967002', '4,5/5', 'Dobrogea'),
(32, 'Restaurant La Casa Dobrogeana', 'Strada Isaccei nr.125, Tulcea', 'Restaurante/casad.jpg', 'https://www.google.ro/maps/place/Restaurant+La+Casa+Dobrogeana/@45.1766891,28.7573785,17z/data=!3m1!4b1!4m5!3m4!1s0x40b75bf54625b6a3:0x4272644d834a7df7!8m2!3d45.1766891!4d28.7595672', '4,4/5', 'Dobrogea'),
(33, 'Restaurant Flacara Vie', 'Strada Republicii 19, Medgidia, Constanta', 'Restaurante/flacara.jpg', 'https://www.google.ro/maps/place/Restaurant+Flac%C4%83ra+Vie/@45.1715453,28.7865565,17z/data=!3m1!4b1!4m5!3m4!1s0x40b7596871b526a9:0xf6e43f8b039ce35c!8m2!3d45.1715431!4d28.7887329', '4,3/5', 'Dobrogea');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `retete`
--

CREATE TABLE `retete` (
  `id_reteta` int(11) NOT NULL,
  `denumire` varchar(50) CHARACTER SET latin1 NOT NULL,
  `imagine_reteta` varchar(255) CHARACTER SET latin1 NOT NULL,
  `mod_preparare` longtext NOT NULL,
  `regiune` varchar(50) CHARACTER SET latin1 NOT NULL,
  `ingredient_1` varchar(30) CHARACTER SET latin1 NOT NULL,
  `ingredient_2` varchar(30) CHARACTER SET latin1 NOT NULL,
  `ingredient_3` varchar(30) CHARACTER SET latin1 NOT NULL,
  `ingredient_4` varchar(30) CHARACTER SET latin1 NOT NULL,
  `ingredient_5` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `retete`
--

INSERT INTO `retete` (`id_reteta`, `denumire`, `imagine_reteta`, `mod_preparare`, `regiune`, `ingredient_1`, `ingredient_2`, `ingredient_3`, `ingredient_4`, `ingredient_5`) VALUES
(12, 'Ciorba radauteana', 'Retete/Bucovina/ciorbica.jpg', 'Aceasta ciorba radauteana a fost pentru mine o mare surpriza, am incercat mai demult o reteta si n-am fost chiar multumita. De atunci nu prea am mai avut alte incercari, dar primavara trecuta am facut aceasta reteta de ciorba radauteana si a devenit preferata noastra. De fiecare data se mananca pana la ultima lingura si toata lumea geme de placere langa ea :) Eu de cele mai multe ori nu pastrez legumele care au fiert in supa de carne, dar aici se potrivesc perfect si ciorba are farmecul ei. Dar si asa am taiat cubulete doar morcovul si telina - ardeiul s-a desfigurat complet si nu aveam ce taia, iar pastarnacul a fost foarte fibros.Si inca o precizare, eu de obicei acresc ciorba cu bors clasic, dar mi-a placut mult in aceasta reteta cum se combina aroma de usturoi cu cea de otet, totusi nu e mult dar isi face treaba minunat.', 'Bucovina', 'Piept de pui', 'Smantana', 'Morcovi', 'Pastarnac', ''),
(20, 'Tochitura bucovineana', 'Retete/Bucovina/tochitura.jpg', 'Cantitati: 1 kg carne de porc, 300 g cârnați, 50 ml ulei (poți folosi și untură),3 căței de usturoi, 100 ml vin alb, 1 linguriță de boia, sare și piper, după gust, 4 ouă, 400 g de brânză rasă.\r\nIn Bucovina, tochitura se pregătește din carne de porc, fără sos, și se servește cu ouă ochiuri, mămăligă din belșug și brânză rasă pe deasupra. Tochitura cu sos roșu este servită în zona Dobrogei, dar și în Ardeal. Toate tipurile de tochitură sunt la fel de gustoase și merită încercate.\r\n\r\nDacă vrei să îi bucuri pe cei de acasă cu un preparat tradițional, gustos și foarte sățios, prepare-le o tochitură bucovineană cu mai multe tipuri de carne de porc, pentru o aromă desăvârșită!\r\nPune uleiul într-o tigare antiaderentă și lasă-l să se încingă. Între timp, taie tacticos carnea de porc în cubulețe, iar cârnații îi poți face rondele mai groase. Când uleiul începe să sfârâie, pune carnea la prăjit, cu grijă să nu te frigi. Atunci când carnea începe să capete culoare, pune capac tigăii și dă focul mic.  Las-o să se prepare vreo 5 minute, apoi scoate capacul, astfel încât lichidul din tigaie să se evapore.\r\n\r\nImediat ce carnea de porc s-a prăjit, adaugă și cârnații, apoi asezonează cu sarea, piperul, boiaua și usturoiul. Toarnă și vinul pe deasupra și lasă aromele să se întrepătrundă, la foc mic.\r\n\r\nÎntre timp, poți pregăti mămăliga care va însoți tochitura. Pune la fiert 4 căni de apă cu un praf de sare și las-o să fiarbă. Toarnă 1 cană de Mălai Extra Gold Raftul Bunicii în ploaie, amestecând viguros.\r\n\r\nLasă mămăliga să fiarbă în jur de 20 de minute, apoi oprește focul și răstoarn-o pe un fund de lemn.\r\n\r\nPână ce carnea dă în ultimele clocote, prăjește repejor ouăle ochiuri. Oprește focul la tigaia cu carne de porc, pune tochitura în farfurii, iar lângă așază o bucată de mămăligă. Înnobilează preparatul cu câte un ou ochi și rade brânza peste toate porțiile de tochitură.\r\n\r\nAdună-i pe toți cei dragi în jurul mesei și servește tochitura delicioasă și sățioasă. O ceapă tăiată în 4 sau niște murături sunt se potrivesc de minune.\r\n\r\nPoftă bună!', 'Bucovina', 'Carne de porc', 'Carnati de porc', 'Oua', 'Usturoi', 'Vin alb'),
(24, 'Lapte cu tocmagi', 'Retete/Bucovina/lapte.jpg', 'Dacă ai decis să renunți la celebrele cereale cu lapte în favoarea variantei autentice românești, atunci suflecă-ți mânecile și apucă-te de frământat! Tocmagii sunt tăițeii de casă pe care bunicile din Bucovina nu-i pun doar în supe și ciorbe, ci și în lapte dulce. Primul pas este să frămânți aluatul pentru tocmagi. Iar pentru asta mestecă într-un bol făina cu oul și 3 linguri de apă.Vei obține un aluat tare pe care va trebui să-l întinzi cu sucitorul într-un strat subțire. Împăturește aluatul astfel încât să obții o fâșie lungă și taie tocmagii cu un cuțit ascuțit. Pudrează-i cu multă făină și desfă-i să vezi cât de frumoși sunt! Fierbe-i în laptele cu sare și zahăr cam 3-4 minute. Presară scorțișoară măcinată deasupra și savurează un mic dejun autentic bucovinean!  Poftă bună!', 'Bucovina', 'Faina Pambac', 'Oua de Gaina', 'Lapte Napolact', 'Scortisoara macinata Cosmin', 'none'),
(25, 'Gomboti cu prune', 'Retete/Bucovina/gomboti2.jpg', 'Gomboţii cu prune se pot doar îndrăgi. Aceasta este o mâncare tradițional – clasică a gastronomiei transilvane, având la bază un aluat moale.  Avem nevoie de: 1 kg cartofi, 10-12 linguri de făină, 1 lingura unt, 1 linguriţă de sare; 20-25 buc. prune mici, scorţișoară măcinată la alegere şi zahăr (cubic); 5-6 linguri de pesmet. Fierbem cartoful cu coaja cu tot, curăţăm şi cât este călduţ îl dăm prin răzătoarea mare sau îl zdrobim. Spălăm prunele, scoatem sâmburii şi în mijlocul fiecăruia punem zahăr (cubic) şi puţină scorţișoară. După ce s-a răcit cartoful, amestecăm cu făină, unt şi sare, facem un aluat moale care se dezlipeşte uşor de pe degete. Întindem aluatul pe o planşetă cu făină, într-o foaie de 3-4 mm grosime, şi împărţim în pătrăţele de 5×5 cm ca să încapă în mijlocul fiecăruia câte o prună. Punem în mijlocul fiecărui pătrăţel câte o prună cu zahăr (cubic) şi scorţișoară, strângem aluatul de jur împrejur până obţinem o bilă. Fierbem găluştele într-o oală cu apă puţin sărată. Rumenim pesmetul în unt, iar după aceea tăvălim găluştele în pesmetul cu zahăr şi scorţişoară Găluştele se servesc calde.  Găluştele atunci sunt gata fierte, când se ridică la suprafața apei. Aluatul nu e necesar să-l întindeţi, se prepară mai uşor dacă se rupe din aluat o bucată cât este necesar pentru o găluşcă.', 'Transilvania', 'Cartofi', 'Faina Pambac', 'Unt Napolact', 'Prune rosii', 'Pesmet'),
(26, 'Ciorba de pui cu tarhon', 'Retete/Transilvania/ciorba.jpg', 'Tarhonul este aproape nelipsit din mancarurile ardelenesti, iar parfumul pe care-l da preparatelor este absolut senzational.  Cantitati:  600 g carne de pui (pulpe sau piept), 1 &ndash; 2 linguri ulei, 1 ceapa, 1 morcov, tarhon proaspat sau in otet, 2 galbenusuri, 3 &ndash; 4 linguri smantana, 2 &ndash; 3 linguri de otet, sare.  Carnea de p ui si morcovul se taie cubulete. Ceapa se toaca marunt. Toate se calesc intr-o oala cu cele doua linguri de ulei. Dupa 3 &ndash; 4 minute, se adauga aproape trei litri de apa in oala si se lasa la fiert pana cand puiul este patruns complet, dupa care se stinge focul. Separat, intr-un alt vas, se amesteca galbenusurile cu smantana, care se toarna ulterior in oala cu ciorba. La sfarsit se adauga tarhonul dupa gust si 2 &ndash; 3 linguri de otet. Oala se acopera cu un capac, sa se &ldquo;infuzeze&rdquo;, iar dupa circa un sfert de ora poate fi servita cu pofta!', 'Transilvania', 'Piept de pui', 'Ceapa', 'Morcovi', 'Oua de Gaina', 'Smantana'),
(27, 'Fasole facaluita', 'Retete/Transilvania/fasole.jpg', 'Cantitati:  500 g fasole uscata, 2 cepe, 250 ml ulei, sare , 1 lingurita boia dulce, 3 linguri smantana. Fasolea se fierbe cu o lingurita de sare vreme de 2 – 3 ore. Se scurge de apa in care a fiert si se paseaza, iar piureul obtinut se amesteca bine cu 150 ml de ulei, sare si smantana. Ceapa se taie pestisori si se prajeste intr-o tigaie, in uleiul ramas, amestecat cu boiaua. Dupa ce s-a prajit, ceapa se intinde frumos (impreuna cu uleiul) deasupra piureului de fasole.', 'Transilvania', 'Fasole alba', 'Ceapa', 'Boia dulce ', 'Smantana ', ''),
(28, 'Coltunasi cu legume', 'Retete/Maramures/coltunasi.jpg', 'Cantitati: 400 gr faina, 250 gr unt, 200 gr morcovi, 150 gr telina, 150 gr, cartofi, otet. Maramuresenii sunt recunoscuti in mod special pentru inventivitatea in materie de gustari. Intre felurile principale sau pentru cine usoare, in Maramures doar imaginatia este limita in ceea ce priveste ce va ajunge pe masa si modul in care preparatul va fi prezentat. La o masa in Maramures oaspetele trebuie sa se astepte la surprize mereu placute si combinatii inedite de gusturi si textura. Un astfel de exemplu graitor sunt coltunasii cu legume care arata ca placintele cu branza sau ca un desert gustos dar au un gust bogat de legume inabusite. In Maramures coltunasii cu legume sunt cunoscuti si sub denumirea de scoici, o gustare delicioasa si sanatoasa total diferita de alte tipuri de placinte in aceeasi prezentare.  Singurul dezavantaj al coltunasilor este faptul ca aluatul trebuie pregatit de seara pentru ca trebuie lasat la rece aproximativ 12 ore.  Se framanta untul cu faina si se adauga 5 – 6 linguri de apa, o lingurita de otet si un praf de sare. Aluatul framantat astfel obtinut se pune la rece pentru jumatate de zi.  Cu 30 de minute inainte ca aluatul sa fie scos de la frigider se taie legumele in cubulete cat mai marunte si se pun la fiert in apa cu sare si piper.  Aluatul luat de la frigider se intinde si se taie in forma de cercuri ce se umplu cu legumele fierte se impaturesc pe jumatate si se lipesc cu apa sau cu albus de ou. Marginile coltunasilor se cresteaza cu furculita din motive de prezentare.  Scoicile de aluat cu legume se prajesc in ulei incins pana cand capata o culoare aurie.  Se servesc calde.', 'Maramures', 'Faina ', 'Unt', 'Morcovi', 'Telina', 'Cartofi'),
(29, 'Clatite cu urda si verdeata', 'Retete/Maramures/urda.jpg', 'Cantitati: 100 gr faina, 300 gr de urda, 1 pahar apa minerala, 1 cana lapte, 3 oua, jumatate de legatura marar. Clatitele cu urda si verdeata sunt o gustare de primavara pe cat de delicioasa pe atat de usor de pregatit.  Se bat ouale cu un varf de sare timp de 1 – 2 minute. Se toarna de sus si imprastiat faina pana cand se obtine un aluat fin, apoi se adauga apa minerala si laptele. Compozitia se lasa in frigider pentru 30 de minute.  Se pregateste separat umplutura din verdeata tocata marunt, urda, mararul si sare dupa gust.  Dupa ce compozitia a fost racita, se unge o tigaie cu ulei si se lasa la incins apoi se toarna cate un polonic din compozitie in maniera obisnuita pentru prepararea clatitelor.  Clatitele astfel obtinute se umplu cu crema de urda si verdeturi.  Se servesc calde.', 'Maramures', 'Faina ', 'Lapte ', 'Oua de Gaina', 'Smantana ', 'Urda'),
(30, 'Hremzli', 'Retete/Maramures/tocinei.jpg', 'Cantitati: 5 cartofi, un ou intreg, o lingura de faina alba, 2 catei de usturoi, sare, ulei pentru prajit. Aceasta reteta e una traditionala din Maramures, care isi are originile in Sighetu Marmatiei. Era preparata de evreii din Sighet, astfel incat reteta a fost adoptata si de restul populatiei din oras. Cartofii se curata, se spala si se dau pe razatoarea mica. La fel si usturoiul. Se amesteca ingredientele si apoi se adauga sarea, oul si faina si se mai amesteca pana cand compozitia devine omogena.  Pentru prajire e nevoie ca uleiul sa fie incins.  Se ia cu lingura din compozitie, se pune in tigaia cu ulei incins, se aplatizeaza si se lasa sa se prajeasca pe o parte. Apoi, se intoarce pe cealalta parte pentru a se praji bine pe ambele parti.  Pentru ca vor retine destul de mult ulei, acesti hremzli se lasa la scurs pe un servetel sau un prosop de hartie. Hartia va absorbi surplusul de ulei. Se pot consuma ca atare sau impreuna cu smantana (combinatia traditionala din Maramures), cu iaurt (varianta mai dietetica) ori cu sos de usturoi si iaurt.  Pofta buna!', 'Maramures', 'Cartofi', 'Oua de Gaina', 'Faina ', 'Usturoi', 'none'),
(31, 'Piparaica', 'Retete/Crisana/pip.jpg', 'Cantitati: capatana de usturoi, ulei, smantana, faina, iaurt dulce. O capatana de usturoi se piseaza marunt in rasnita Heinner, se pune in ulei usor incins, se trage la marginea plitei, se amesteca repede si se stinge cu putina smantana.  Se pune din nou pe foc, iar cand smantana fierbe se toarna un amestec din 4 linguri de faina si apa sau iaurt mai dulce  Se pune pe foc toata compozitia si se amesteca mereu pana devine o pasta alifioasa. Amestecul din cele 4 linguri de faina si iaurt care se adauga in cursul fierberii, in smantana, trebuie sa fie lichid, sa curga si trebuie amestecat bine ca sa nu aiba cocoloase.', 'Crisana', 'Usturoi', 'Smantana ', 'Faina ', 'Iaurt grecesc', 'none'),
(32, 'Mamaliga toponita', 'Retete/Crisana/mamaliga.jpg', 'Cantitati: 500 g Mălai Extra Gold Raftul bunicii 200 g de brânză telemea, de oaie sau de vacă 180 g cârnați, la alegere 70 g piept de porc afumat/bacon 1 ou, sare. Începe să preîncălzești cuptorul.  Pe aragaz, pune într-un ceaun apa cu sare la fiert. Cu zâmbetul pe buze, îndreaptă-te spre blatul de lucru din bucătărie și începe să tai în cuburi mărunte toate tipurile de carne. Apucă degrabă o tigaie întinsă, toarnă ulei în ea și pune-o pe un alt ochi de aragaz. În ea vei prăji cubulețele de carne.  Când apa din ceaun dă în clocot, începe să presari din abundență malai, pentru a face mămăliga. Este bine să o faci cât mai moale în această etapă.  După ce carnea s-a prăjit bine, pune cubulețele într-un alt vas. Cu o parte din untura topită rămasă în tigaie, unge tava în care vei pune la cuptor toponita. Cealaltă parte o vei adăuga în compoziție.  Pe tava tapetată cu untură, așază primul strat de mămăligă moale, cât de subțire poți. Peste acest strat, adaugă unul format din carnea friptă în tigaie. Continuă cu încă un strat de mămăligă, după care adaugă unul de brânză telemea, de oaie sau vacă, după preferințe. Peste stratul de brânză, toarnă unul de untură topită, apoi un alt strat de carne friptă, unul de mămăligă, unul de brânză, și continuă tot așa, până când observi că ai terminat ingredientele. Aplică secretul care va asigura reușita toponitei: ai grijă ca ultimul strat de deasupra să fie cel format din mămăligă.  Acum, bate oul și unge cu el mămăliga. Ia tava și așaz-o drăgăstos în cuptor, unde toponita se va rumeni voioasă, în aproximativ 20 sau 30 de minute. Servește-o cât e caldă, de preferat cu smântână rece!', 'Crisana', 'Malai', 'Telemea de vaca', 'Carnati de porc traditionali', 'Carne de porc', 'Oua de Gaina'),
(33, 'Placinta intinsa', 'Retete/Crisana/placinta.jpg', 'Cantitati: 800 g Făină, 500 ml de apă, 1 linguriță de sare, 1 linguriță de oțe,t Ulei pentru întins foaia de plăcintă, Umplutura: cu brânză. Suflecă-ți mânecile și ia cel mai încăpător vas pe care-l ai în bucătărie, pentru că vom începe cu frământarea aluatului, cu mult sârg. Ai nevoie de toate ingredientele de mai sus, mai puțin umplutura.  Unge aluatul obținut cu ulei belșug, apoi împarte-l în două și lasă jumătățile la odihnit, timp de 30 de minute.  Pe masa de lucru, pune o față de masă curată, din pânză, fiindcă urmează să întinzi foaia de plăcintă cât e masa de lungă. Ia una dintre jumătățile de aluat, unge-o bine cu ulei, așaz-o pe ambii pumni și începe să o învârți/răsucești în aer, până când mijlocul devine subțire și transparent.  Cu multă grijă, așază fâșia de aluat obținută pe mijlocul mesei de lucru, dar grijă mare să nu se formeze cute. Stropește foaia de aluat cu ulei. Acum, încarcă-te cu multă răbdare și cu delicatețe, începe să tragi de marginile fâșiei de aluat, în timp ce te plimbi în jurul mesei.  Trage cu blândețe spre marginile mesei, cât permite aluatul, fără a se rupe. Stropește din nou cu ulei și reia dansul în jurul mesei și trasul capetelor de aluat. Este ideal ca marginile foii de aluat să depășească marginile mesei de lucru.  Acum, taie cu un cuțit marginile aluatului, de jur împrejurul mesei. Este momentul ideal să adaugi umplutura!  Dacă brânza dulce ori sărată este preferata ta, presoar-o cu gingășie pe întreaga lungime a foii de aluat. Începe să rulezi cu răbdare foaia de aluat, pentru a înveli protector brânza în interiorul acesteia.  Ia o tavă încăpătoare, așterne hârtie de copt în ea, apoi așază cu gingășie plăcinta, pe care o vei stropi apoi cu ulei. Introdu tava în cuptorul preîncălzit, la 190 de grade Celsius și așteaptă cuminte ca specialitatea din Crișana să se rumenească de bucurie.  După ce scoți plăcinta din cuptor, taie-o cu grijă în bucăți mai mici, de dimensiuni egale, și așază-le pe un platou întins. Pudrează bucățile proaspăt tăiate cu zahăr praf și invită-i pe cei dragi la masă, cât plăcinta întinsă este caldă și miroase îmbietor!', 'Crisana', 'Faina ', 'Ulei', 'Branza de vaca', 'none', 'none'),
(34, 'Tarta de praz cu morcovi', 'Retete/Oltenia/tarta.jpg', 'Cantitati: 4 morcovi,  2 bucati praz,  4 ouă, 200 ml lapte,  100 g telemea după gust,  ulei,  sare şi piper. O tartă delicioasă şi unde mai pui că-i şi sănătoasă! Cum să faci şi tu tartă de praz cu morcovi:  Morcovii se răzuiesc şi se trec prin răzătoarea cu ochiuri mari. Prazul se curăţă şi se taie rondele fine.  Într-o lingură de ulei, se călesc legumele până devin translucide şi apoi se lasă să se răcească. Ouăle se bat ca pentru omletă, se adaugă laptele şi brânza trecută prin răzătoare. Se amestecă ouăle cu legumele, sare şi piper, după gust, şi se toarnă într-o formă rotundă sau o cratiţă care merge la cuptor. Se dă la copt pentru 45 de minute până ce o scobitoare introdusă iese curată.', 'Oltenia', 'Morcovi', 'Praz', 'Oua de Gaina', 'Lapte ', 'Telemea de vaca'),
(35, 'Supa crema de praz', 'Retete/Oltenia/supacrema.jpg', 'Cantitati:  2 bucati praz,  1 ceapă,  4-5 cartofi,  20 g unt,  1/2 litru apă,  200 ml lapte,  câteva fire de mărar, sare şi piper. Ceapa oltenească, prazul, are încă multe taine de preparare. Iată câteva reţete care nu vă vor dezamăgi. Cum se prepară supa-cremă de praz: În oala de fiert supa se topeşte untul şi se pun prazul tăiat rondele şi ceapa tăiată peştişori. Se amestecă şi se lasă 10 minute să se înmoaie. Se adaugă cartofii curăţaţi şi tăiaţi rondele foarte subţiri. Se lasă 2 minute să se călească uşor. Se adaugă sare, piper, lapte şi apă şi se lasă la fiert 30 de minute. Apoi, se mixează ingredientele şi se aduce supa imediat la masă presărată cu mărar.', 'Oltenia', 'Praz', 'Ceapa', 'Cartofi', 'Unt', 'Lapte '),
(36, 'Praz pane', 'Retete/Oltenia/prazpane.jpg', 'Cantitati: 2 bucati praz,  100 ml ulei,  100 g făină,  1 ou,  50 ml lapte, 2 linguri caşcaval ras, sare şi piper. Dacă poţi mânca dovlecei pane, de ce să nu poţi mânca şi praz pane? Uşor de făcut, rapid şi foarte gustos, cu iz de toamnă: Prazul se curăţă, se taie bucăţi mari şi se fierbe 10 minute în apă cu un praf de sare. Apoi se lasă să se scurgă foarte bine.  Făina, oul şi laptele se amestecă asemenea aluatului de clătite, se adaugă o linguriţă de ulei, caşcavalul şi piperul. Într-o tigaie, se încinge uleiul, prazul se taie bucăţi mai mici care se trec prin aluat şi se pun la prăjit. Se scot pe şervete de hârtie şi se aduc la masă simple sau drept garnitură.', 'Oltenia', 'Praz', 'Faina ', 'Oua de Gaina', 'Lapte ', 'Cascaval'),
(37, 'Snitel de ciuperci', 'Retete/Banat/pp.jpg', 'Cantitati: 1 kg de ciuperci cu palarie mare; 2 linguri de faina; 2 oua; sare si piper, dupa gust; ulei pentru prajit; 1 legatura de marar. Se rupe piciorul ciupercilor si se spala bine, se usuca, se presara cu sare si piper; Se toaca pasta piciorusele si apoi se bat ouale cu faina si pasta de ciuperci. Se trec palariile prin ou si se pun la prajit in ueli incins cu tuguiala in sus, iar cand s-au rumenit, se intorc si restul de umplutura se toarna in scobitura; Se acopera si se prajesc la foc foarte mic. Se serveste fierbinte cu marar tocat.', 'Banat', 'Ciuperci', 'Faina ', 'Oua de Gaina', 'Ulei', 'none'),
(38, 'Mancare de urzici', 'Retete/Banat/urzici.jpg', 'Cantitati: urzici, 3 linguri faina, jumatate de litru de lapte, 4-5 catei usturoi, 3 linguri mari de smantana, ulei, sare si piper dupa gust. Urzicile proaspat culese in dimineata insorita, la poale de corcodusi infloriti, (uitati-va cat sunt de fragede, am rupt doar varfurile ei de urzica tanara si plina de seva) se spala bine in mai multe ape reci, le mai alegeti de eventuale fire de iarba care ar fi putut sa se fi ratacit printre ele. Pe foc am pus o oala mare, incapatoare, pe jumatate plina cu apa si o lingura arsa de sare. Cand apa fierbe, parca regretandu-le fragezimea lor salbatica, arunc urzicile in oala. Pun capacul si le las sa dea cateva clocote. Nu trebuie fierte mult, urzica cea tanara e frageda si se inmoaie imediat. Le scurg si clatesc sub jet de apa rece. Urzicile fierte le-am transformat intr-un piure (am folosit un stick-blender). Intr-un vas pun la incins putin ulei, adaug 3 linguri de faina. Amestec repede, pentru ca faina sa se imbibe cu grasimea si sa nu faca eventuale cocoloase, dar in nici un caz sa nu devina bruna.Torn jumatate de litru de lapte fierbinte, amestecand continuu, si las sa fiarba putin, pana se formeaza un bechamel consistent. Adaug piureul de urzici, amestec bine, las sa fiarba putin si potrivesc gustul de sare si piper, apoi adaug 4-5 catei de usturoi tocati si 3 linguri bune de smantana grasa. Mai fierb maximum 2-3 minute, amestecand continuu, apoi mâncărica este gata de mâncat cu ouă.', 'Banat', 'Faina ', 'Lapte ', 'Usturoi', 'Smantana ', 'Ulei'),
(39, 'Peste fript ca la Clisura', 'Retete/Banat/peste.jpg', 'Cantitati: peste proaspat, bine curatat de solzi si intestine si spalat, 6 linguri de faina alba, 2 linguri de malai, 2 linguri bune de paprika dulce (se poate combina paprika dulce cu iute, daca va place), 2 catei de usturoi zdrobiti, 1 lingurita de piper proaspat macinat,  ulei pentru fript (fiti generosi cu uleiul), sare grunjoasa pentru sarat pestele. Pestele se curata cu atentie de solzi si se goleste de intestine, se spala in cateva ape reci, se scurge si se sareaza, in interior si exterior, cu sare grunjoasa. Se pregateste amestecul aromat in care se va tavali pestele – de fapt, in acest amestec sta toata „smecheria” – amestecandu-se faina alba, malaiul, sarea, piperul, paprika si usturoiul zdrobit. Pestii se tavalesc pe rand in acest amestec, sa fie bine imbracati atat pe interior cat si pe exterior. Intr-o tigaie incapatoare se tarna ulei cam de 2-3 cm. adancime. Eu nu am o tigaie suficient de mare ca sa „inoate” in ea nestingherit pestele, asa incat prajesc pestele intr-o tava emailata cu peretii grosi, pe care o asez pe aragaz astfel incat sa se incalzeasa de la doua focuri deodata. In aceasta tava am turnat uleiul de floarea soarelui (uleiul de masline nu e potrivit pentru prajit, doar pentru gatit, sotat etc.; daca aveti probleme cu colesterolul, folositi ulei de rapita), l-am incins bine apoi am pus pestii. Imediat ce uleiul a prins sa bolboroseasca cu spor imprejurul pestilor, am redus focul putin, asa incat pestele sa nu se arda la suprafata inainte de a fi bine facut. Durata de frigere este diferita in functie de dimensiunea pestilor. Odata ce pestele este bine rumenit pe o parte, se intoarce cu grija. Pe masura ce pestii sunt fripti, se aseaza intr-o tava acoperita cu hartie de copt si se pastreaza in cuptorul preincins la 100 de grade Celsius, astfel, chiar daca aveti de pregatit mai mult peste, cand il veti servi va fi tot la aceeasi temepratura. In plus, stand la cuptor chiar si nu mai mult de 3-4 minute dupa ce s-a fript, pestele va elimina uleiul in exces ramas in urma prajitului. Cand se termina toti pestii de fript, se tamponeaza cu un servet de hartie absorbanta pentru a elimina uleiul de pe suprafata si se servesc cu o garnitura si un sos la alegere.', 'Banat', 'Pastrav', 'Faina ', 'Malai', 'Boia dulce ', 'Usturoi'),
(40, 'Scovergi muntenesti', 'Retete/Muntenia/sc.jpg', 'Cantitati: 500 g faina, 300 ml lapte, 5 g drojdie uscată, 25 g unt la temperatura camerei, 20 g zahăr, un praf de sare, zahăr din belșug pentru decor. n zona Munteniei, scovergile se fac de regulă simple, fără umplutură, și se servesc cu un strat generos de zahăr tos deasupra.  Mai ales în zilele de duminică sau de sărbătoare, scovergile erau nelipsite de pe mesele gospodinelor din zona de câmpie. Încălzește laptele într-o crăticioară, la foc mic. Ai grijă să stai cu ochii pe el, iar înainte să înceapă să fiarbă, toarnă-l într-un bol încăpător.  Adaugă sarea și, încetul cu încetul, presară o jumătate din cantitatea de Făină Superioară 000 Raftul Bunicii. Frământă în voie direct cu mâinile până când devine o compoziție omogenă.  Într-un bol mic, freacă bine drojdia cu zahărul, apoi adaugă compoziția obținută peste aluatul format. Frământă cu încredere, până ce aluatul devine elastic și puțin lucios; formează o bilă și acoperă vasul cu folie de plastic. Dă-i voie aluatului să se odihnească într-un loc călduț, preț de o jumătate de oră.  După ce aluatul a crescut, încorporează făina rămasă, dar și untul moale. Vei obține o cocă foarte elastică. Dacă aceasta este lipicioasă, mai poți completa cu cel mult 2 linguri de făină, cât să o domolești.  Învelește bila de aluat în folie de plastic și las-o să mai crească cel puțin o oră.  Când timpul s-a scurs și aluatul s-a împlinit, cu ajutorul unui sucitor, întinde tacticos aluatul pe masa de lucru acoperită cu făină din belșug și împarte-l în 8 bucăți egale. Formează bile din aluat, acoperă-le cu un șervet curat și mai lasă-le încă o jumătate de ceas la dospit.  Modelează cu podul palmei bilele de aluat, astfel încât să capete forma unor turte. Nu-ți face griji dacă sunt neregulate, acesta este farmecul preparatului! Prăjește scovergile în tigaia plină cu ulei încins, apoi scoate-le pe o farfurie și tăvălește-le prin zahăr tos.  Bucură-te de amintiri din copilărie alături de cei dragi și înfulecați scovergile cât sunt calde și aburinde!  Poftă bună!', 'Muntenia', 'Faina ', 'Lapte ', 'Drojdie uscata', 'Unt', 'none'),
(41, 'Dovlecei cu sos de iaurt', 'Retete/Muntenia/dovlecei.jpg', 'Cantitati: 2 dovlecei (600-800 gr), 200 gr iaurt gras, 50 gr smântănă, 2 căței de usturoi, 1 legătură mărar, chimen, sare. Se curăță dovlecei de coajă, se taie felii  și se pun la fiert în apă clocotită cu puțină sare. După ce dovlecei s-au înmuiat se scot într-o strecurătoare mare și se lasă să se răcească și să se scurgă. Pentru a obține textura dorită și pentru a evita fierberea excesivă a dovleceilor este indicat să îi gustăm atunci când îi fierbem. După ce s-au răcit și scurs, dovleceii se pun într-un bol. Peste dovlecei punem iaurtul amestecat cu smântâna, usturoiul zdrobit, mărarul tocat și o linguriță de chimen.  Amestecăm ușor toate ingredientele și obșinem astfel salata de dovlecei cu sos de iaurt. Cantitățile de usturoi și chimen pot fi schimbate după cum poftește fiecare. Se ornează cu mărar, chimen sau pătrunjel. Plecând de la acești dovlecei cu sos de iaurt se pot face multe improvizații și adăugiri de ceapă, lămâie, ridichii, gogoșar acru, pătrunjel. Pofta buna!', 'Muntenia', 'Dovlecei', 'Iaurt grecesc', 'Smantana ', 'Usturoi', 'none'),
(42, 'Vinete cu usturoi si rosii', 'Retete/Muntenia/vinete.jpg', 'Cantitati: 2 vinete 1-1,2 kg roșii, 1 ardei roșu kapia, 2 căpăț&acirc;ni de usturoi, 1 ardei semi-iute, 1 legătură pătrunjel, 3-4 frunze de busuioc, piper, sare, ulei. &Icirc;ncingem o tigaie cu ulei, tăiem vinetele rondele groase de cca. 1 cm și le rumenim pe ambele părți. Vom face operațiunea &icirc;n două tranșe pentru că nu au loc &icirc;ntr-o singură tigaie, dec&acirc;t dacă aveți una foarte mare. După cum probabil știți, rondelele de vinete vor absorbi uleiul din tigaie ceea ce este firesc și nu afectează rețeta noastră, mai ales că uleiul ăsta ne va fi util mai t&acirc;rziu. Dacă am pus puțin ulei și a fost absorbit tot, mai adăugăm oleacă, să aibă vinetele &icirc;n ce să se prăjească. Procedăm la fel și cu a doua tranșă de vinete. Pe măsură ce se rumenesc pe o față, le &icirc;ntoarcem, și &icirc;n final scoatem feliile rumenite &icirc;ntr-un bol. C&acirc;t timp se rumenesc vinetele &icirc;n tigaie, punem roșiile &icirc;ntr-o oală și le acoperim cu apă. Punem oala pe foc și o lăsăm 5-10 minute p&acirc;nă observăm că &icirc;ncepe să plesnească ici-colo coaja la roșii. Luăm oala de pe foc și scoatem roșiile cu paleta pe o farfurie. Le lăsăm să se răcească, timp &icirc;n care pe ochiul de aragaz eliberat punem grill-ul și coacem ardeiul kapia. Curățăm roșiile de coajă și le tăiem felii. &Icirc;ntr-o tigaie &icirc;ncăpătoare (care poate fi băgată la cuptor, deci atenție la materialul din care este făcută coada tigăii) sau &icirc;ntr-o cratiță, așezăm un pat de rondele de roșii decojite, din jumătate din cantitatea de roșii. Dăm roșiilor un praf de sare și unul de piper proaspăt măcinat. Peste patul de roșii așezăm feliile de vinete prăjite, form&acirc;nd un al doilea strat. Lăsăm preparatul &icirc;n acestă fază și lucrăm la mujdei. Curățăm usturoiul, &icirc;l zdobim cu presa și &icirc;l punem &icirc;ntr-un bol. Tocăm mărunt pătrunjelul și busuiocul și le punem &icirc;n bol peste usturoi. Ardeiul kapia copt &icirc;l curățim de coaja arsă și &icirc;l tocăm c&acirc;t de mărunt din cuțit. De asemenea, &icirc;l punem &icirc;n bol. Ardeiul iute &icirc;l tocăm la fel de mărunt și &icirc;l punem peste usturoi. Adăugăm un strop de apă și amestecăm aceste cinci ingrediente: usturoi, pătrunjel, busuioc, ardei kapia tocat, ardei iute tocat. Funcție de preferințe busuiocul și ardeiul iute pot fi &icirc;nlăturate. Acest mujdei improvizat &icirc;l &icirc;mprăștiem uniform, cu o lingură, peste rondelele de vinete. &Icirc;n ultimă fază, din jumătatea de roșii rămasă, formăm un ultim strat de rondele. Mai dăm puțină sare deasupra roșiilor. Astfel cratița pregătită, o dăm la cuptor pentru 30-45 de minute sau chiar mai multișor, p&acirc;nă scade. Probabil ați observat ca nu am mai adăugat ulei &icirc;n cratiță și asta datorită faptului că feliile de vinete, prin prăjire, au suficient ulei &icirc;ncorporat, care &icirc;și va face datoria de liant. M&acirc;ncarea asta de vinete cu usturoi și roșii poate fi servită la masă, imediat ce o scoți din cuptor, adică caldă, dar recomandarea mea este să o &icirc;ncercați rece, pentru că s-ar putea să vă placă mai mult.  No, amu, vă doresc poftă mare!', 'Muntenia', 'Vinete', 'Rosii', 'Ardei Kapia', 'Usturoi', 'Busuioc'),
(43, 'Alivanca', 'Retete/Moldova/alivanca.jpg', 'Cantitati: 400 de grame malai , 1 kg de smântână, 2 ouă, 200 gr de zahăr, 10 gr praf de copt, 10 gr zahăr cu vanilie, 1 linguriță de sare, 120 ml ulei. Într-un bol generos pune smântâna, cele două ouă, uleiul, zahărul și zahărul cu vanilie. Amestecă-le bine cu un tel norocos și apoi pune mâna pe vedeta preparatului nostru, mălaiul.  Toarnă-l puțin câte puțin, ca-ntr-o ploaie mocănească de septembrie și-n tot acest timp amestecă energic cu același tel. După ce-ai încorporat minunea aurie, așterne o tavă rotundă cu hârtie de copt și toarnă compoziția acolo. Cuptorul va primi tava cu multă căldură, 180 de grade timp de 50 de minute va înfrunta alivanca pentru noi. Se va rumeni ca o fată mare după primul sărut, semn că e gata să fie savurată.  E bună și caldă și rece, dar mai ales cu dulceață de cireșe amare deasupra.  Poftă bună!', 'Moldova', 'Malai', 'Smantana ', 'Oua de Gaina', 'Praf de copt', 'none'),
(44, 'Fasole pastai cu usturoi', 'Retete/Moldova/fasole1.JPG', 'Cantitati: 1 kg fasole pastai, 1 ceapa, 1 lingura Delikat, un usturoi . Se caleste ceapa apoi se pune fasolea in oala si se caleste si aceasta un pic.Se pune Delikatul si se pun 1-2 cani de apa. Se lasa sa fiarba in jur de 20 de minute apoi se adauga usturoiul pisat.Se amesteca din cand in cand ca sa nu sa prinda de fundul oaleişse acopera oala si se lasa pe foc pana cand fierbe fasolea si pana cand s-a inmuiat.   Se serveste cu usturoi pisat si cu mamaliguta.', 'Moldova', 'Fasole verde pastai', 'Ceapa', 'Delikat', 'Usturoi', 'none'),
(45, 'Salata de ardei copti', 'Retete/Moldova/ardei.jpg', 'Cantitati: 8 buc. ardei Kapia, 2 linguri otet balsamic, 2 linguri ulei de masline, 3 catei usturoi, 1 lingurita sos de soia. Se coc ardeii si se curata. Se face mujdeiul iar apoi se amesteca cu otetul, uleiul si sosul de soia si se toarna peste ardei si se lasa cam o ora pentru a se patrunde bine ardeii.', 'Moldova', 'Ardei Kapia', 'Ulei de masline', 'Usturoi', 'Sos de soia', 'none'),
(46, 'Bors de macrou', 'Retete/Dobrogea/bors.jpg', 'Cantitati: 2 bucati macrou, 2 morcovi, 1 rădăcină pătrunjel, 1 ardei gras roşu, 2 roşii, 1 litru borş, 1 legatura pătrunjel, sare şi piper. Borşul pescăresc este un deliciu provenit de la pescarii care pleacă să prindă peştele cu noaptea-n cap. Uite cum poţi prepara şi tu un deliciu de borş de macrou, la tine acasă!  Pestele se spala si se taie bucaţ¬i nu mai late de doua degete. Ardeiul se taie fâsii, iar morcovul si radacina de patrunjel se trec prin razatoare. Se pun la fiert legumele cu 1,5 litri de apa si sare.  Între timp, se da borsul într-un clocot si se toarna în oala alaturi de legume. Se adauga pestele si rosiile, se potriveste de gust cu sare si piper si se lasa la fiert înca 10 minute. Pentru ca macroul este gras, nu se adauga ulei. Se stinge focul, se presara patrunjelul si se aduce borsul la masa.', 'Dobrogea', 'Macrou', 'Morcovi', 'Ardei gras rosu', 'Bors', 'none'),
(47, 'Saramura de crap', 'Retete/Dobrogea/saramura.jpg', 'Cantitati:  4 bucati medalioane de crap, 1 bucata ardei iute, 4 roşioare mici, 1 legatura marar uscat, 2 bucati căţei usturoi, 10 bucati boabe piper, 2 bucati frunze dafin, 1 praf sare. Într-o oală, se pune un litru de apă la fiert cu boabele de piper, sare, frunze de dafin, ardei iute tocat şi roşioare. Se lasă să fiarbă 10 minute şi se dă deoparte. Se adaugă mărarul tocat mărunt. Pe grătarul încins se frig medalioanele de peşte şi, pe măsură ce se rumenesc, se scot şi se pun într-un vas. Se presară felioare de usturoi. Se toarnă zeama fiartă cu roşiile şi se lasă 10 minute înainte de a-l aduce la masă.', 'Dobrogea', 'Medalion crap', 'Rosii', 'Usturoi', 'Foi de dafin', 'none'),
(48, 'Scrumbie fripta pe carbuni', 'Retete/Dobrogea/scrumbie.jpg', 'Cantitati:  1 kg de scrumbii curatate, spalate, uscate si date cu sare (se pastreaza capul si coada) ,100 ml de ulei, 5-6 catei de usturoi, cimbru, sare si piper. Preparatul este foarte gustos, desi reteta nu da prea multa bataie de cap: cateva ingrediente si un jar de carbuni sunt de ajuns pentru o scrumbie delicioasa facuta ca in Dobrogea. Scrumbiile se ung cu ulei pe toate partile, inclusiv in interior. Se ia o hartie de copt si se unge la randul ei cu ulei. Fiecare scrumbie se infasoara in hartia de copt si se asaza pe jar. Se frige inabusit timp de un sfert de ora, dupa care se scot, se desfac din hartia de copt si se taie capul si coada. Se mai cresteaza pe spinare longitudinal, pentru a se scoate scheletul. Se faramiteaza pestele pe un platou si se condimenteaza, dupa care se serveste cu cimbru si mujdei de usturoi.', 'Dobrogea', 'Scrumbie', 'Usturoi', 'Ulei', 'none', 'none');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `retete_favorite`
--

CREATE TABLE `retete_favorite` (
  `id_reteta_favorita` int(20) NOT NULL,
  `id_reteta` int(30) NOT NULL,
  `id_utilizator` int(11) NOT NULL,
  `denumire_reteta` varchar(30) CHARACTER SET latin1 NOT NULL,
  `imagine_reteta` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `retete_favorite`
--

INSERT INTO `retete_favorite` (`id_reteta_favorita`, `id_reteta`, `id_utilizator`, `denumire_reteta`, `imagine_reteta`) VALUES
(21, 25, 15, 'Gomboti cu prune', 'Retete/Bucovina/gomboti2.jpg'),
(23, 44, 15, 'Fasole pastai cu usturoi', 'Retete/Moldova/fasole1.JPG'),
(25, 40, 15, 'Scovergi muntenesti', 'Retete/Muntenia/sc.jpg'),
(26, 41, 15, 'Dovlecei cu sos de iaurt', 'Retete/Muntenia/dovlecei.jpg'),
(27, 42, 15, 'Vinete cu usturoi si rosii', 'Retete/Muntenia/vinete.jpg'),
(28, 37, 15, 'Snitel de ciuperci', 'Retete/Banat/pp.jpg'),
(29, 35, 15, 'Supa crema de praz', 'Retete/Oltenia/supacrema.jpg'),
(30, 36, 15, 'Praz pane', 'Retete/Oltenia/prazpane.jpg'),
(31, 31, 15, 'Piparaica', 'Retete/Crisana/pip.jpg'),
(32, 32, 15, 'Mamaliga toponita', 'Retete/Crisana/mamaliga.jpg'),
(33, 33, 15, 'Placinta intinsa', 'Retete/Crisana/placinta.jpg'),
(41, 24, 15, 'Lapte cu tocmagi', 'Retete/Bucovina/lapte.jpg'),
(43, 26, 15, 'Ciorba de pui cu tarhon', 'Retete/Transilvania/ciorba.jpg');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `utilizatori`
--

CREATE TABLE `utilizatori` (
  `id_utilizator` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 NOT NULL,
  `email_utilizator` varchar(100) CHARACTER SET latin1 NOT NULL,
  `parola` varchar(60) CHARACTER SET latin1 NOT NULL,
  `nume` varchar(40) CHARACTER SET latin1 NOT NULL,
  `prenume` varchar(40) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `utilizatori`
--

INSERT INTO `utilizatori` (`id_utilizator`, `username`, `email_utilizator`, `parola`, `nume`, `prenume`) VALUES
(15, 'raluc', 'ralucastefaroi1@yahoo.com', '$2y$10$5JCX0ju4dzjAjeCFc5hT3O6/JlIYCoclVcbC4LwqVHnwkHbgZ5EgG', 'Raluc', 'Stefaroi'),
(25, 'test123', 'test@yahoo.com', 'parola123', 'test', 'test'),
(27, 'admin', 'admin@yhaoo.com', '$2y$10$Vz7i6k01bNoeenvLcDRiJubKezAtVR2zMSuyyiC0TWVwjwNWsruoy', 'Admin', 'Admin');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `comenzi`
--
ALTER TABLE `comenzi`
  ADD PRIMARY KEY (`id_comanda`),
  ADD KEY `id_utilizator_fk` (`id_utilizator`);

--
-- Indexuri pentru tabele `detalii_comenzi`
--
ALTER TABLE `detalii_comenzi`
  ADD PRIMARY KEY (`id_detalii_comanda`),
  ADD KEY `id_comanda_fk` (`id_comanda`),
  ADD KEY `id_produs_fk` (`id_produs`);

--
-- Indexuri pentru tabele `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`id_produs`);

--
-- Indexuri pentru tabele `restaurante`
--
ALTER TABLE `restaurante`
  ADD PRIMARY KEY (`id_restaurant`);

--
-- Indexuri pentru tabele `retete`
--
ALTER TABLE `retete`
  ADD PRIMARY KEY (`id_reteta`);

--
-- Indexuri pentru tabele `retete_favorite`
--
ALTER TABLE `retete_favorite`
  ADD PRIMARY KEY (`id_reteta_favorita`),
  ADD KEY `id_reteta_fk` (`id_reteta`),
  ADD KEY `id_utilizator_favorite_fk` (`id_utilizator`);

--
-- Indexuri pentru tabele `utilizatori`
--
ALTER TABLE `utilizatori`
  ADD PRIMARY KEY (`id_utilizator`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `comenzi`
--
ALTER TABLE `comenzi`
  MODIFY `id_comanda` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pentru tabele `detalii_comenzi`
--
ALTER TABLE `detalii_comenzi`
  MODIFY `id_detalii_comanda` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pentru tabele `produse`
--
ALTER TABLE `produse`
  MODIFY `id_produs` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT pentru tabele `restaurante`
--
ALTER TABLE `restaurante`
  MODIFY `id_restaurant` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pentru tabele `retete`
--
ALTER TABLE `retete`
  MODIFY `id_reteta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pentru tabele `retete_favorite`
--
ALTER TABLE `retete_favorite`
  MODIFY `id_reteta_favorita` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pentru tabele `utilizatori`
--
ALTER TABLE `utilizatori`
  MODIFY `id_utilizator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `comenzi`
--
ALTER TABLE `comenzi`
  ADD CONSTRAINT `id_utilizator_fk` FOREIGN KEY (`id_utilizator`) REFERENCES `utilizatori` (`id_utilizator`) ON DELETE CASCADE;

--
-- Constrângeri pentru tabele `detalii_comenzi`
--
ALTER TABLE `detalii_comenzi`
  ADD CONSTRAINT `id_comanda_fk` FOREIGN KEY (`id_comanda`) REFERENCES `comenzi` (`id_comanda`) ON DELETE CASCADE,
  ADD CONSTRAINT `id_produs_fk` FOREIGN KEY (`id_produs`) REFERENCES `produse` (`id_produs`);

--
-- Constrângeri pentru tabele `retete_favorite`
--
ALTER TABLE `retete_favorite`
  ADD CONSTRAINT `id_reteta_fk` FOREIGN KEY (`id_reteta`) REFERENCES `retete` (`id_reteta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_utilizator_favorite_fk` FOREIGN KEY (`id_utilizator`) REFERENCES `utilizatori` (`id_utilizator`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
