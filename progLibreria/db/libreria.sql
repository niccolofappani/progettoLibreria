-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 14, 2021 alle 17:51
-- Versione del server: 10.4.11-MariaDB
-- Versione PHP: 7.4.3

DROP DATABASE IF EXISTS Libreria;
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
  IDAutore int NOT NULL AUTO_INCREMENT,
  Nome varchar(50) NOT NULL,
  Cognome varchar(50) NOT NULL,
  DataNascita date NOT NULL,
  Nazionalità varchar(50) NOT NULL,
  PRIMARY KEY (IDAutore)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Struttura della tabella Libro
--

CREATE TABLE Libro (
  IDLibro int NOT NULL AUTO_INCREMENT,
  ISBN10 varchar(100) NOT NULL,
  Titolo varchar(100) NOT NULL,
  Genere varchar(50) NOT NULL,
  CasaEditrice varchar(50) NOT NULL,
  NumeroPagine int NOT NULL,
  Lingua varchar(20) NOT NULL,
  CodAutore int NOT NULL,
  Foto varchar (300) NOT NULL,
   PRIMARY KEY (IDLibro),
   FOREIGN KEY (CodAutore) REFERENCES Autore(IDAutore)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Struttura della tabella Libro da vendere
--

CREATE TABLE LibroVendita (
  IDVendita int NOT NULL,
  QuantitaVendita int NOT NULL,
  Prezzo float NOT NULL,
  PRIMARY KEY (IDVendita),
  FOREIGN KEY (IDVendita) REFERENCES Libro(IDLibro)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Struttura della tabella libro usato
--

CREATE TABLE LibroUsato (
  IDUsato int NOT NULL,
  PrezzoUsato float NOT NULL,
  QuantitaUsato int NOT NULL,
  PRIMARY KEY (IDUsato),
  FOREIGN KEY (IDusato) REFERENCES Libro(IDLibro)
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
  IDCarrello int() NOT NULL,
  PRIMARY KEY (CodFiscale),
  FOREIGN KEY (IDCarrello) REFERENCES Carrello(ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Struttura della tabella Libro da prestare
--

CREATE TABLE Prestito (
  IDPrestito int NOT NULL AUTO_INCREMENT,
  IDutente varchar(100) NOT NULL,
  IDlibroUsato int NOT NULL,
  DataInizio date NOT NULL,
  DataFine date NOT NULL,
  PRIMARY KEY (IDPrestito),
  FOREIGN KEY (IDutente) REFERENCES Utente(CodFiscale),
  FOREIGN KEY (IDlibroUsato) REFERENCES LibroUsato(IDUsato)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Struttura della tabella Vendite
--

CREATE TABLE Vendite(
  IDVendite int NOT NULL AUTO_INCREMENT,
  IDutente varchar(100) NOT NULL,
  IDlibroVendita int NOT NULL,
  DataAcquisto date NOT NULL,
  PRIMARY KEY (IDVendite),
  FOREIGN KEY (IDutente) REFERENCES Utente(CodFiscale),
  FOREIGN KEY (IDlibroVendita) REFERENCES LibroVendita(IDVendita)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Struttura della tabella Voto
--

CREATE TABLE Voto(
  IDVoto int NOT NULL AUTO_INCREMENT,
  NumeroStelle int NOT NULL,
  PRIMARY KEY (IDVoto)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Struttura della tabella Commento
--

CREATE TABLE Commento(
  IDCommento int NOT NULL AUTO_INCREMENT,
  Corpo varchar(200) NOT NULL,
  IDVoto int NOT NULL,
  IDUtente varchar(100) NOT NULL,
  IDLibro int NOT NULL,
  PRIMARY KEY (IDCommento),
  FOREIGN KEY (IDVoto) REFERENCES Voto(IDVoto),
  FOREIGN KEY (IDUtente) REFERENCES Utente(CodFiscale),
  FOREIGN KEY (IDLibro) REFERENCES Libro(IDLibro)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Struttura della tabella Metodo di pagamento
--

CREATE TABLE MetodoPagamento(
  IDMetodo int NOT NULL AUTO_INCREMENT,
  IDUtente varchar(100) NOT NULL,
  Tipo varchar(10),
  NumeroCarta varchar(50) NOT NULL,
  CVC int NOT NULL,
  DataScadenza date NOT NULL,
  PRIMARY KEY (IDMetodo),
  FOREIGN KEY (IDUtente) REFERENCES Utente(CodFiscale)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Struttura della tabella Carrello
--

CREATE TABLE Carrello(
  IDCarrello int NOT NULL AUTO_INCREMENT,
  IDUtente varchar(100) NOT NULL,
  PRIMARY KEY (IDCarrello),
  FOREIGN KEY (IDUtente) Utente(CodFiscale)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Struttura della tabella Carrello libri
--

CREATE TABLE CarrelloLibri(
  IDCarrelloLibri int NOT NULL AUTO_INCREMENT,
  IDLibro int NOT NULL,
  Quantita int NOT NULL,
  IDCarrello int NOT NULL,
  PRIMARY KEY (IDCarrelloLibri),
  FOREIGN KEY (IDLibro) REFERENCES Libro(IDLibro),
  FOREIGN KEY (IDCarrello) REFERENCES Carrello(IDCarrello)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


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
  ('Luigi', 'Pirandello', '1867-06-28', 'Italia'),
 ('Lucinda', 'Riley', '1966-02-14', 'Irlanda del Nord');

-- --------------------------------------------------------

--
-- Inserimenti tabella Libro
--

INSERT INTO Libro(ISBN10, Titolo, Genere, CasaEditrice, NumeroPagine, Lingua, CodAutore, Foto)
  VALUES (8806220632, 'La metamorfosi', 'Narrativa fantasy', 'Einaudi', 70, 'Italiano', 1, "C:\xampp\htdocs\progLibreria\books\lametamorfosi.png"),
  (8804632631, 'Il visconte dimezzato', 'Narrativa', 'Mondadori', 119, 'Italiano', 2, "a"),
  (8804668237, '1984', 'Fantascienza', 'Mondadori', 333, 'Italiano', 3, "a"),
  (8807892790, 'Il buio oltre la siepe', 'Romanzo sociopolitico', 'Feltrinelli', 352, 'Italiano', 4, "a"),
  (8804667923, 'La fattoria degli animali', 'Satira politica', 'Mondadori', 141, 'Inglese', 3, "a"),
  (8806221965, 'Uno, nessuno e centomila', 'Narrativa', 'Einaudi', 234, 'Italiano', 5, "a"),
  (8817016195, 'Il fu Mattia Pascal', 'Narrativa', 'BUR', 324, 'Italiano', 5, "a"),
  (8809843525, 'La sorella perduta', 'Romanzo rosa', 'Giunti', 864, 'Italiano', 6, "a");

-- --------------------------------------------------------

--
-- Inserimenti tabella Utente
--
  INSERT INTO Utente(CodFiscale, Nome, Cognome, Email, Psw, Via, NumeroCivico, CAP, Citta)
  VALUES ('.', 'Admin', '.', 'admin@gmail.com', 'admin', '.', '.', '.', '.');

-- --------------------------------------------------------

--
-- Inserimenti tabella LibroVendita
--

INSERT INTO LibroVendita (IDVendita, QuantitaVendita, Prezzo)
  VALUES (1, 5, 8.55),
  (2, 11, 12.00),
  (3, 24, 11.40),
  (4, 1, 9.50),
  (5, 1, 9.50),
  (6, 20, 9.50),
  (7, 0, 7.60),
  (8, 70, 18.81);

-- --------------------------------------------------------

--
-- Inserimenti tabella LibroUsato
--

INSERT INTO LibroUsato (IDUsato, PrezzoUsato, QuantitaUsato)
  VALUES (1, 4.28, 3),
  (2, 6, 2),
  (3, 5.7, 4),
  (4, 4.75, 1),
  (5, 4.75, 7),
  (6, 4.75, 0),
  (7, 3.8, 15),
  (8, 9.4, 0);