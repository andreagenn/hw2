create database palestra;
use palestra;

CREATE TABLE utenti (
    username varchar(20) unique not null,
    password varchar(16) not null,
    email varchar(50) not null,
    nome varchar(20) not null ,
    cognome varchar(20) not null,
    abbonamento varchar(6) null,
    primary key(username, password)
)engine=InnoDb;

CREATE TABLE schede (
    username varchar(20) not null,
    esercizio varchar(50) not null,
    primary key(username, esercizio)
)engine=InnoDb;

CREATE TABLE abbonamenti (
    titolo varchar(40) ,
    immagine varchar(100),
    primary key(titolo)
)engine=InnoDb;

insert into abbonamenti(titolo,immagine) values("1 Month Membership", "images/1month.png"),
("3 Months Membership", "images/3month.png"),
("6 Months Membership", "images/6month.png");

CREATE TABLE ListaEsercizi (
    titolo varchar(40),
    immagine varchar(100),
    primary key(titolo)
)engine=InnoDb;

insert into ListaEsercizi(titolo, immagine) values("Chest Press", "images/panca_piana.jpg"),
("Leg Press", "images/pressa.jpg"),
("Push Up", "images/pushups.jpg"),
("Squat", "images/squat.jpg"),
("Biceps Curl", "images/curl_bilanciere.jpg"),
("Dumbbell Press", "images/distensioni_manubri.jpg"),
("Leg Curl", "images/leg_curl.jpg"),
("Leg Extension", "images/leg_extension.jpg"),
("Crosses", "images/croci_manubri_pancainclinata.jpg");