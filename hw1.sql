CREATE TABLE utenti(
    id integer primary key auto_increment,
    nome varchar(255) not NULL,
    cognome varchar(255) not NULL,
    username varchar(255) not NULL UNIQUE,
    email varchar(255) not NULL UNIQUE,
    password varchar(255) not NULL
)engine='innodb';

SELECT * FROM utenti;

CREATE TABLE libro(
    id_libro integer primary key auto_increment,
    username varchar(255) not NULL,
    titolo varchar(255) not NULL,
    autore varchar(255) not NULL,
    immagine varchar(255) not NULL,
    FOREIGN KEY(username) REFERENCES utenti(username) on delete CASCADE on update CASCADE
)engine='innodb';

SELECT * FROM libro;

CREATE TABLE recensione(
    id_recensione integer primary key auto_increment,
    username varchar(255) not NULL,
    titolo varchar(255) not NULL,
    autore varchar(255) not NULL,
    testo text(65535) not NULL,
    FOREIGN KEY(username) REFERENCES utenti(username) on delete CASCADE on update CASCADE
)engine='innodb';

SELECT * FROM recensione;