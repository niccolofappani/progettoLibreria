-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 14, 2021 alle 17:51
-- Versione del server: 10.4.11-MariaDB
-- Versione PHP: 7.4.3

CREATE DATABASE Libreria;
USE Libreria;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Libreria`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Autore`
--

CREATE TABLE `Autore` (
  `Codice` int NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Cognome` varchar(50) NOT NULL,
  `DataNascita` date NOT NULL,
  `Nazionalità` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `Libro`
--

CREATE TABLE `Libro` (
  `ID` varchar(100) NOT NULL,
  `ISBN10` int NOT NULL,
  `Titolo` varchar(100) NOT NULL,
  `Genere` varchar(50) NOT NULL,
  `CasaEditrice` varchar(50) NOT NULL,
  `NumeroPagine` int NOT NULL,
  `Lingua` varchar(20) NOT NULL,
  `Prezzo` float NOT NULL,
  `CodAutore` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `Libro da vendere`
--

CREATE TABLE `LibroVendita` (
  `ID` varchar(100) NOT NULL,
  `Quantita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `Libro da prestare`
--

CREATE TABLE `Prestito` (
  `ID` int NOT NULL,
  `IDutente` int NOT NULL,
  `IDlibroUsato` int NOT NULL,
  `DataInizio` date NOT NULL,
  `DataFine` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `libro usato`
--

CREATE TABLE `LibroUsato` (
  `ID` varchar(100) NOT NULL,
  `Prezzo` int NOT NULL,
  `Quantita` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- --------------------------------------------------------

--
-- Struttura della tabella `Utente`
--

CREATE TABLE `Utente` (
  `CodFiscale` varchar(100) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Cognome` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Psw` varchar(500) NOT NULL,
  `Via` varchar(50) NOT NULL,
  `NumeroCivico` varchar(10) NOT NULL,
  `CAP` varchar(20) NOT NULL,
  `Citta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- --------------------------------------------------------

--
-- Struttura della tabella `Vendite`
--

CREATE TABLE `Vendite`(
  `ID` int NOT NULL,
  `IDutente` int NOT NULL,
  `IDlibroVendita` int NOT NULL,
  `DataAcquisto` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- --------------------------------------------------------
-- --------------------------------------------------------

--
-- Indici per le tabelle scaricate
--

-- --------------------------------------------------------
--
-- Indici per le tabelle `Autore`
--
ALTER TABLE `Autore`
  ADD PRIMARY KEY (`Codice`);

-- --------------------------------------------------------
--
-- Indici per le tabelle `Libro`
--
ALTER TABLE `Libro`
  ADD PRIMARY KEY (`ID`);
  ADD FOREIGN KEY (CodAutore) REFERENCES Autore(Codice);
-- --------------------------------------------------------

--
-- Indici per le tabelle `LibroVendita`
--
ALTER TABLE `LibroVendita`
  ADD PRIMARY KEY (`ID`),
  ADD FOREIGN KEY (IDlibro) REFERENCES Libro(ID);

-- --------------------------------------------------------

--
-- Indici per le tabelle `Prestito`
--
ALTER TABLE `Prestito`
  ADD PRIMARY KEY (`ID`),
  ADD FOREIGN KEY (IDutente) REFERENCES Utente(CodFiscale),
  ADD FOREIGN KEY (IDlibroUsato) REFERENCES LibroUsato(ID);

-- --------------------------------------------------------

--
-- Indici per le tabelle `LibroUsato`
--
ALTER TABLE `LibroUsato`
  ADD PRIMARY KEY (`ID`),
  ADD FOREIGN KEY (ID) REFERENCES Libro(ID);

-- --------------------------------------------------------

--
-- Indici per le tabelle `Utente`
--

ALTER TABLE `Utente`
  ADD PRIMARY KEY (`CodFiscale`);
COMMIT;

-- --------------------------------------------------------

--
-- Indici per le tabelle `Vendite`
--

ALTER TABLE `Vendite`
  ADD PRIMARY KEY (`ID`),
  ADD FOREIGN KEY (IDutente) REFERENCES Utente(CodFiscale),
  ADD FOREIGN KEY (IDlibroVendita) REFERENCES LibroVendita(ID);

-- --------------------------------------------------------
-- --------------------------------------------------------
-- --------------------------------------------------------

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */

INSERT INTO Autore(Codice, Nome, Cognome, DataNascita, Nazionalità)
  VALUES(1, 'Franz', 'Kafka', '1883-07-03', 'Repubblica Ceca'),
  (2, 'Italo', 'Calvino', '1923-10-15', 'Italia'),
  (3, 'George', 'Orwell', '1903-06-25', 'Inghilterra'),
  (4, 'Harper', 'Lee', '1926-04-28', 'Stati Uniti'),
  (5, 'Luigi', 'Pirandello', '1867-06-28', 'Italia');

INSERT INTO Libro(ISBN10, Titolo, Genere, CasaEditrice, NumeroPagine, Lingua, Prezzo, CodAutore)
  VALUES (8806220632, 'La metamorfosi', 'Narrativa fantasy', 'Einaudi', 70, 'Italiano', 8.55, 1),
  (8804632631, 'Il visconte dimezzato', 'Narrativa', 'Mondadori', 119, 'Italiano', 12.00, 2),
  (8804668237, '1984', 'Fantascienza', 'Mondadori', 333, 'Italiano', 11.40, 3),
  (8807892790, 'Il buio oltre la siepe', 'Romanzo sociopolitico', 'Feltrinelli', 352, 'Italiano', 9.50, 4),
  (8804667923, 'La fattoria degli animali', 'Satira politica', 'Mondadori', 141, 'Inglese', 9.50, 3),
  (8806221965, 'Uno, nessuno e centomila', 'Narrativa', 'Einaudi', 234, 'Italiano', 9.50, 5),
  (8817016195, 'Il fu Mattia Pascal', 'Narrativa', 'BUR', 324, 'Italiano', 7.60, 5);