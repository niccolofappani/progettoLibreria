DROP DATABASE IF EXISTS Db_Libreria;
CREATE DATABASE Db_Libreria;

USE Db_Libreria; 

CREATE TABLE Libro (
    titolo INT,
    prezzo INT,
    autore VARCHAR(50),
    genere VARCHAR(20),
    nazionalita VARCHAR(50),
    data_uscita DATE,
    num_pag INT,
    CONSTRAINT PrimaryKey PRIMARY KEY (Id_Libro)
);
CREATE TABLE Utente (
    Id_Genere INT,
    nome VARCHAR(50),
    cognome VARCHAR(50),
    email VARCHAR(50),
    telefono INT(50),
    CONSTRAINT PrimaryKey PRIMARY KEY (nome_utente)
    
);

CREATE TABLE Transazione (
	tipo_pagamento VARCHAR(50),
    
    CONSTRAINT PrimaryKey PRIMARY KEY (Id_Transazione),
    CONSTRAINT LibroAcquistato FOREIGN KEY (Id_Libro)
		REFERENCES Libro (Id_Libro),
	CONSTRAINT UtentePagante FOREIGN KEY (nome_utente)
		REFERENCES Utente (nome_utente)
);
CREATE TABLE Carrello (
    
    
    CONSTRAINT CarrelloUtente FOREIGN KEY (nome_utente)
		REFERENCES Utente (nome_utente),
    CONSTRAINT PrimaryKey PRIMARY KEY (Id_Carrello)
    
);
CREATE TABLE Ordine (
    destinazione VARCHAR(50),
    prezzo INT,
    
    
    CONSTRAINT PrimaryKey PRIMARY KEY (Id_Ordine),
    CONSTRAINT DettagliTransazione FOREIGN KEY (Id_Transazione)
        REFERENCES Transazione (Id_Transazione),
        
    CONSTRAINT OrdineUtente FOREIGN KEY (Id_Utente)
        REFERENCES Utente (Id_Utente)
      
);

/*
insert into 
values 
*/