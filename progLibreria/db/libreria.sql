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
-- Database: `libreria`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `autore`
--

CREATE TABLE `Autore` (
  `Codice` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Cognome` varchar(50) NOT NULL,
  `DataNascita` date NOT NULL,
  `Nazionalità` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `libro`
--

CREATE TABLE `Libro` (
  `ID` varchar(100) NOT NULL,
  `ISBN` varchar(100) NOT NULL,
  `Titolo` varchar(100) NOT NULL,
  `Categoria` varchar(50) NOT NULL,
  `CasaEditrice` varchar(50) NOT NULL,
  `Copie` int(11) NOT NULL,
  `NumeroPagine` int(11) NOT NULL,
  `Lingua` varchar(20) NOT NULL,
  `CodAutore` int(11) NOT NULL,
  `Prezzo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `libro da vendere`
--

CREATE TABLE `LibroVendita` (
  `ID` varchar(100) NOT NULL,
  `Quantita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `libro da prestare`
--

CREATE TABLE `Prestito` (
  `ID` int(100) NOT NULL,
  `IDutente` int(100) NOT NULL,
  `IDlibroUsato` int(100) NOT NULL,
  `DataInizio` date NOT NULL,
  `DataFine` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `libro usato`
--

CREATE TABLE `LibroUsato` (
  `ID` varchar(100) NOT NULL,
  `Prezzo` int(11) NOT NULL,
  `Quantita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
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

CREATE TABLE `Vendite`(
  `ID` int(100) NOT NULL,
  `IDutente` int(100) NOT NULL,
  `IDlibroVendita` int(100) NOT NULL,
  `DataAcquisto` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `autore`
--
ALTER TABLE `Autore`
  ADD PRIMARY KEY (`Codice`);


--
-- Indici per le tabelle `libro`
--
ALTER TABLE `LibroVendita`
  ADD PRIMARY KEY (`ID`),
  ADD FOREIGN KEY (IDlibro) REFERENCES libro(ID);

--
-- Indici per le tabelle `libro`
--
ALTER TABLE `Prestito`
  ADD PRIMARY KEY (`ID`),
  ADD FOREIGN KEY (IDutente) REFERENCES Utente(CodFiscale),
  ADD FOREIGN KEY (IDlibroUsato) REFERENCES LibroUsato(ID);
--
-- Indici per le tabelle `libro`
--
ALTER TABLE `LibroUsato`
  ADD PRIMARY KEY (`ID`),
  ADD FOREIGN KEY (ID) REFERENCES libro(ID);
  
--
-- Indici per le tabelle `utente`
--

ALTER TABLE `Utente`
  ADD PRIMARY KEY (`CodFiscale`);
COMMIT;

--
-- Indici per le tabelle `vendite`
--

ALTER TABLE `Vendite`
  ADD PRIMARY KEY (`ID`),
  ADD FOREIGN KEY (IDutente) REFERENCES Utente(CodFiscale),
  ADD FOREIGN KEY (IDlibroVendita) REFERENCES LibroVendita(ID);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;