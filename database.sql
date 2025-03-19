CREATE DATABASE book;
USE book;

CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(128) NOT NULL,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    photo_de_profil VARCHAR(255)
);

CREATE TABLE favoris (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) NOT NULL,
    book_id VARCHAR(50) NOT NULL,
    title VARCHAR(255) NOT NULL,
    author TEXT NOT NULL,
    image_url TEXT,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
