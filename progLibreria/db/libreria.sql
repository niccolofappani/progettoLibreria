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



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: Libreria
--

-- --------------------------------------------------------

--
-- Struttura della tabella Autore
--

CREATE TABLE Autore (
  ID int NOT NULL AUTO_INCREMENT,
  Nome varchar(50) NOT NULL,
  Cognome varchar(50) NOT NULL,
  DataNascita date NOT NULL,
  Nazionalità varchar(50) NOT NULL,
  PRIMARY KEY (ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella Libro
--

CREATE TABLE Libro (
  ID int NOT NULL AUTO_INCREMENT,
  ISBN10 varchar(100) NOT NULL,
  Titolo varchar(100) NOT NULL,
  Genere varchar(50) NOT NULL,
  CasaEditrice varchar(50) NOT NULL,
  NumeroPagine int NOT NULL,
  Lingua varchar(20) NOT NULL,
  Prezzo float NOT NULL,
  CodAutore int NOT NULL,
   PRIMARY KEY (ID),
   FOREIGN KEY (CodAutore) REFERENCES Autore(ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella Libro da vendere
--

CREATE TABLE LibroVendita (
  ID int NOT NULL,
  Quantita int NOT NULL,
  PRIMARY KEY (ID),
  FOREIGN KEY (ID) REFERENCES Libro(ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella libro usato
--

CREATE TABLE LibroUsato (
  ID int NOT NULL,
  Prezzo float NOT NULL,
  Quantita int NOT NULL,
  PRIMARY KEY (ID),
  FOREIGN KEY (ID) REFERENCES Libro(ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella Utente
--

CREATE TABLE Utente (
  CodFiscale varchar(100) NOT NULL,
  Nome varchar(50) NOT NULL,
  Cognome varchar(50) NOT NULL,
  Email varchar(100) NOT NULL,
  Psw varchar(500) NOT NULL,
  Via varchar(50) NOT NULL,
  NumeroCivico varchar(10) NOT NULL,
  CAP varchar(20) NOT NULL,
  Citta varchar(50) NOT NULL,
  PRIMARY KEY (CodFiscale)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella Libro da prestare
--

CREATE TABLE Prestito (
  ID int NOT NULL AUTO_INCREMENT,
  IDutente varchar(100) NOT NULL,
  IDlibroUsato int NOT NULL,
  DataInizio date NOT NULL,
  DataFine date NOT NULL,
  PRIMARY KEY (ID),
  FOREIGN KEY (IDutente) REFERENCES Utente(CodFiscale),
  FOREIGN KEY (IDlibroUsato) REFERENCES LibroUsato(ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella Vendite
--

CREATE TABLE Vendite(
  ID int NOT NULL AUTO_INCREMENT,
  IDutente varchar(100) NOT NULL,
  IDlibroVendita int NOT NULL,
  DataAcquisto date NOT NULL,
  PRIMARY KEY (ID),
  FOREIGN KEY (IDutente) REFERENCES Utente(CodFiscale),
  FOREIGN KEY (IDlibroVendita) REFERENCES LibroVendita(ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------
-- --------------------------------------------------------
-- --------------------------------------------------------

--
-- Inserimenti tabella Autore
--

INSERT INTO Autore(Nome, Cognome, DataNascita, Nazionalità)
  VALUES('Franz', 'Kafka', '1883-07-03', 'Repubblica Ceca'),
  ('Italo', 'Calvino', '1923-10-15', 'Italia'),
  ('George', 'Orwell', '1903-06-25', 'Inghilterra'),
  ('Harper', 'Lee', '1926-04-28', 'Stati Uniti'),
  ('Luigi', 'Pirandello', '1867-06-28', 'Italia');

-- --------------------------------------------------------

--
-- Inserimenti tabella Libro
--

INSERT INTO Libro(ISBN10, Titolo, Genere, CasaEditrice, NumeroPagine, Lingua, Prezzo, CodAutore)
  VALUES (8806220632, 'La metamorfosi', 'Narrativa fantasy', 'Einaudi', 70, 'Italiano', 8.55, 1),
  (8804632631, 'Il visconte dimezzato', 'Narrativa', 'Mondadori', 119, 'Italiano', 12.00, 2),
  (8804668237, '1984', 'Fantascienza', 'Mondadori', 333, 'Italiano', 11.40, 3),
  (8807892790, 'Il buio oltre la siepe', 'Romanzo sociopolitico', 'Feltrinelli', 352, 'Italiano', 9.50, 4),
  (8804667923, 'La fattoria degli animali', 'Satira politica', 'Mondadori', 141, 'Inglese', 9.50, 3),
  (8806221965, 'Uno, nessuno e centomila', 'Narrativa', 'Einaudi', 234, 'Italiano', 9.50, 5),
  (8817016195, 'Il fu Mattia Pascal', 'Narrativa', 'BUR', 324, 'Italiano', 7.60, 5);