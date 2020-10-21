-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2020 at 03:55 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `italianfood`
--

-- --------------------------------------------------------

--
-- Table structure for table `anketa`
--

CREATE TABLE `anketa` (
  `id` int(10) NOT NULL,
  `korisnikId` int(10) NOT NULL,
  `odgovor` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ikone`
--

CREATE TABLE `ikone` (
  `id` int(10) NOT NULL,
  `tekst` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `idSlikaI` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ikone`
--

INSERT INTO `ikone` (`id`, `tekst`, `opis`, `idSlikaI`) VALUES
(1, 'Crno vino', 'Merlot je vrsta crnog grožđa tamno plave boje. Ima mala zrna sa tankom kožom, a ukus ima tragove borovnice i mente. Zajedno sa sortama kaberne sovinjon, kaberne frank, malbek i pti verdo, to je jedna od osnovnih sorti koje se gaje u vinogradarskoj oblasti Bordoa na jugozapadu Francuske. Godine 2004. sorta merlo je gajena na 260.000 hektara u svetu, sa tendencijom povećanja.', 1),
(2, 'Belo vino', 'Šardone - Beli šardone je verovatno najtraženije grožđe na svetu. Bolje uspeva na siromašnijem zemljištu, ali se prilagođava i drugim tipovima. Daje male grozdove tanke kože. Rano cveta i zri. Danas se gaji u svakoj zemlji u kojoj se pravi vino.', 2),
(3, 'Brandy viski', 'Čivas Regal je mešani Škotski viski proizveden od strane braće Čivas, Koja je deo Pernod Ričarda. Čivas Regal vuče korene još iz 1801. Nastanak Čivas Regala je Stratisla destilerija u Keit, Morej u Stratspej, Škotska, najstarija operativna destilerija viskija, koja je osnovana 1786.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `id` int(10) NOT NULL,
  `naziv` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`id`, `naziv`) VALUES
(1, 'Sve'),
(2, 'Pica'),
(3, 'Pasta'),
(4, 'Salata');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(10) NOT NULL,
  `ime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sifra` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idUloga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime`, `prezime`, `email`, `sifra`, `idUloga`) VALUES
(1, 'Nikola', 'Batakovic', 'nikola@gmail.com', 'cb4c863bddbe833028001db8ac3a1883', 1);

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE `meni` (
  `id` int(10) NOT NULL,
  `naziv` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `href` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meni`
--

INSERT INTO `meni` (`id`, `naziv`, `href`) VALUES
(1, 'Home', 'index.php'),
(2, 'Proizvodi', 'proizvodi.php'),
(3, 'Kontakt', 'contact.php'),
(4, 'Autor', 'autor.php');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `id` int(10) NOT NULL,
  `naziv` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cena` decimal(10,0) NOT NULL,
  `idSlika` int(10) NOT NULL,
  `idKategorija` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`id`, `naziv`, `opis`, `cena`, `idSlika`, `idKategorija`) VALUES
(1, 'Pica', 'Capricciosa — paradajz-pire, gauda, šunka, šampinjoni, masline.', '500', 2, 2),
(2, 'Carbonara', 'Carbonara — špagete, mesnata slanina, pavlaka, parmezan, tvrdi žuti sir, beli luk, maslinovo ulje, peršun.', '400', 4, 3),
(3, 'Cezar salata', 'Cezar salata — dimljene slanine, belo pileće meso, parmezan, beli luk, tost hleb, glavica zelene salate, čeri paradajz, limun, pavlaka, majonez, maslinovo ulje.', '450', 3, 4),
(4, 'Bolognese', 'Bolognese — špagete, mleveno meso, paradajz pire, crni luk, origano, bosiljak, majoran, kačkavalj, parmezan.', '360', 1, 3),
(5, 'Šopska salata', 'Šopska salata — zelena paprika, krastavac, paradajz, crni luk, ljute papričice, punomasni sir.', '250', 12, 4),
(6, 'Quattro stagione', 'Quattro stagione (Četiri godišnja doba) — paradajz, mocarela, pečurke, školjke, račići, paprika, šunka, crne masline, maslinovo ulje, limunov sok.', '600', 5, 2),
(7, 'All \'Amatriciana', 'Pasta All\'Amatriciana — slanina, sir, maslinovo ulje, belo vino, konzervirani paradajz, ljuta papričica.', '470', 7, 3),
(8, 'Kineska salata sa piletinom', 'Kineska salata sa piletinom — pileće belo meso, šargarepa, crni luk, koren celera, krastavac,soja sos, susam, đumbir, cimet, ulje, jabukovo sirće.', '550', 9, 4),
(9, 'Margarita', 'Margarita — oljušteni paradajz, mocarela, maslinovo ulje, bosiljak.', '560', 8, 2),
(10, 'Grčka salata', 'Grčka salata — paprika (crvena i zelena), krastavac, veći crveni luk, paradajz, crne masline, feta, origano, maslinovo ulje.', '420', 6, 4),
(11, 'Penne All\'Arrabbiata', 'Penne All\'Arrabbiata — penne testenina, sveže ili suve ljute papričice, beli luk, paradajz,  g pekorino sir, svež bosiljak, maslinovo ulje.', '700', 10, 3),
(12, 'Napoletana', 'Napoletana — paradajz, svež sir, salama, maslinovo ulje.', '480', 11, 2),
(13, 'Italijanska salata', 'Italijanska salata - šargarepa, čeri paradajz, beli luk, crni luk, so, peršun, zelena salata.', '540', 15, 4),
(14, 'Pasta sa junetinom', 'Pasta sa junetinom i maslinovim uljem - mleveno juneće meso, seckani paradajz, crni luk, iseckan, beli luk, parmezan, maslinovo ulje, so, biber.', '480', 13, 3),
(15, 'Sicilijana', 'Sicilijana — umak od paradajza, mocarela, paprika, suve kobasice, šampinjoni.', '640', 14, 2),
(16, 'Engleska salata', 'Engleska salata - krompira, celer, jaje, kisela jabuka, ulje, so, crni biber.', '330', 18, 4),
(17, 'Pasta sa bundevom i parmezanom', 'Pasta sa bundevom i parmezanom - crni luk, beli luk, putera, origano, pasirana bundeva, mleko, parmezan.', '490', 16, 3),
(18, 'Vesuvio', 'Vezuvio — umak od paradajza, kačkavalj, šunka.', '360', 17, 2),
(19, 'Meksička salata', 'Meksička salata - crveni pasulj, kukuruz, crveni luk, zelena salata, med, ulje, limun, ljute papricice.\r\n', '470', 21, 4),
(20, 'Pasta sa tikvicama i slaninom', 'Pasta sa tikvicama i slaninom - tikvice, sečena slanina, beli luk, maslinovo ulje, so, bosiljak.', '500', 19, 3),
(21, 'Partenopea', 'Partenopea — paradajz, mocarela, svež sir, pikantna salama, kapar, maslinovo ulje.', '410', 20, 2),
(22, 'Egipatska salata', 'Egipatska salata - sir, crni luk, krastavac, limun, paradajz, zelena salata, maslinovo ulje.', '400', 24, 4),
(23, 'Heljdina pasta sa povrćem', 'Heljdina pasta sa povrćem - patlidžan, paradajza, crni luk, maslinovo ulje, so, biber, kleka, mediteranska mešavina, čeri paradajz, parmezan.', '580', 22, 3),
(24, 'Sorpreza', 'Sorpreza — umak od paradajza, kačkavalj, slanina, pečurke, jaje, luk, feferone.', '550', 23, 2);

-- --------------------------------------------------------

--
-- Table structure for table `slike`
--

CREATE TABLE `slike` (
  `id` int(10) NOT NULL,
  `putanja` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slike`
--

INSERT INTO `slike` (`id`, `putanja`, `alt`) VALUES
(1, 'pasta1.jpg', 'pasta1'),
(2, 'pica1.jpg', 'pica1'),
(3, 'salata1.jpg', 'salata1'),
(4, 'pasta2.jpg', 'pasta2'),
(5, 'pica2.jpg', 'pica2'),
(6, 'salata2.jpg', 'salata2'),
(7, 'pasta3.jpg', 'pasta3'),
(8, 'pica3.jpg', 'pica3'),
(9, 'salata3.jpg', 'salata3'),
(10, 'pasta4.jpg', 'pasta4'),
(11, 'pica4.jpg', 'pica4'),
(12, 'salata4.jpg', 'salata4'),
(13, 'pasta5.jpg', 'pasta5'),
(14, 'pica5.jpg', 'pica5'),
(15, 'salata5.jpg', 'salata5'),
(16, 'pasta6.jpg', 'pasta6'),
(17, 'pica6.jpg', 'pica6'),
(18, 'salata6.jpg', 'salata6'),
(19, 'pasta7.jpg', 'pasta7'),
(20, 'pica7.jpg', 'pica7'),
(21, 'salata7.jpg', 'salata7'),
(22, 'pasta8.jpg', 'pasta8'),
(23, 'pica8.jpg', 'pica8'),
(24, 'salata8.jpg', 'salata8'),
(36, '1585238618_salata2.jpg', 'Salata123'),
(37, '1585255063_salata1.jpg', 'Salata123'),
(38, '1585258607_', 'Neka pica'),
(39, '1585258641_', 'Neka pica');

-- --------------------------------------------------------

--
-- Table structure for table `slikei`
--

CREATE TABLE `slikei` (
  `id` int(11) NOT NULL,
  `putanja` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slikei`
--

INSERT INTO `slikei` (`id`, `putanja`, `alt`) VALUES
(1, 'vino1.jpg', 'vino1'),
(2, 'vino2.jpg', 'vino2'),
(3, 'vino3.jpg', 'vino3');

-- --------------------------------------------------------

--
-- Table structure for table `slikez`
--

CREATE TABLE `slikez` (
  `id` int(10) NOT NULL,
  `putanja` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slikez`
--

INSERT INTO `slikez` (`id`, `putanja`, `alt`) VALUES
(1, 'zaposleni1.jpg', 'zaposleni1'),
(2, 'zaposleni2.jpg', 'zaposleni2'),
(3, 'zaposleni3.jpg', 'zaposleni3'),
(4, 'zaposleni4.jpg', 'zaposleni4');

-- --------------------------------------------------------

--
-- Table structure for table `uloge`
--

CREATE TABLE `uloge` (
  `id` int(10) NOT NULL,
  `naziv` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloge`
--

INSERT INTO `uloge` (`id`, `naziv`) VALUES
(1, 'admin'),
(2, 'korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `zaposleni`
--

CREATE TABLE `zaposleni` (
  `id` int(10) NOT NULL,
  `ime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `radnoMesto` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idSlikaZ` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `zaposleni`
--

INSERT INTO `zaposleni` (`id`, `ime`, `prezime`, `radnoMesto`, `opis`, `idSlikaZ`) VALUES
(1, 'Marko', 'Marković', 'Šef kuhinje', 'On je onaj deo naše kuhinjske simfonije koji naša jela čini jedinstvenim i dobro uklopljenim.', 1),
(2, 'Ivan', 'Ivanović', 'Pomoćni kuvar', 'Gospodin koji daje dušu ovom mestu. Uvek tu i uvek spreman.', 3),
(3, 'Ana', 'Pavlović', 'Šankerica', 'Pruža profesionalne i kvalitetne usluge, po instrukcijama menadžera restorana. Priprema i izdaje piće kolegi konobaru, pravi koktele i dekoracije.', 2),
(4, 'Darko', 'Jevtić', 'Konobar', 'Prepoznatljiv po izuzetnom oku za detalje i odličnim osećajem za želje gostiju.', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anketa`
--
ALTER TABLE `anketa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `korisnikId` (`korisnikId`);

--
-- Indexes for table `ikone`
--
ALTER TABLE `ikone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idSlikaI` (`idSlikaI`);

--
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUloga` (`idUloga`);

--
-- Indexes for table `meni`
--
ALTER TABLE `meni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idSlika` (`idSlika`),
  ADD KEY `idKategorija` (`idKategorija`);

--
-- Indexes for table `slike`
--
ALTER TABLE `slike`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slikei`
--
ALTER TABLE `slikei`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slikez`
--
ALTER TABLE `slikez`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uloge`
--
ALTER TABLE `uloge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zaposleni`
--
ALTER TABLE `zaposleni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idSlikaZ` (`idSlikaZ`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anketa`
--
ALTER TABLE `anketa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ikone`
--
ALTER TABLE `ikone`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategorije`
--
ALTER TABLE `kategorije`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `slike`
--
ALTER TABLE `slike`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `slikei`
--
ALTER TABLE `slikei`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slikez`
--
ALTER TABLE `slikez`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `uloge`
--
ALTER TABLE `uloge`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zaposleni`
--
ALTER TABLE `zaposleni`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anketa`
--
ALTER TABLE `anketa`
  ADD CONSTRAINT `anketa_ibfk_1` FOREIGN KEY (`korisnikId`) REFERENCES `korisnici` (`id`);

--
-- Constraints for table `ikone`
--
ALTER TABLE `ikone`
  ADD CONSTRAINT `ikone_ibfk_1` FOREIGN KEY (`idSlikaI`) REFERENCES `slikei` (`id`);

--
-- Constraints for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD CONSTRAINT `korisnici_ibfk_1` FOREIGN KEY (`idUloga`) REFERENCES `uloge` (`id`);

--
-- Constraints for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD CONSTRAINT `proizvodi_ibfk_1` FOREIGN KEY (`idKategorija`) REFERENCES `kategorije` (`id`),
  ADD CONSTRAINT `proizvodi_ibfk_2` FOREIGN KEY (`idSlika`) REFERENCES `slike` (`id`);

--
-- Constraints for table `zaposleni`
--
ALTER TABLE `zaposleni`
  ADD CONSTRAINT `zaposleni_ibfk_1` FOREIGN KEY (`idSlikaZ`) REFERENCES `slikez` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
