CREATE DATABASE IF NOT EXISTS aumigos CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE aumigos;

CREATE TABLE IF NOT EXISTS clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS animais (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    nome VARCHAR(100) NOT NULL,
    especie VARCHAR(50) NOT NULL,
    raca VARCHAR(50) NOT NULL,
    idade INT NOT NULL,
    FOREING KEY (cliente_id) REFERENCES clientes(id) ON DELETE CASCADE
) ENGINE=InnoDB;

INSERT INTO clientes (nome, telefone, email) VALUES
('Ícaro Botelho', '(51)99901-6767', 'icaro67b@gmail.com'),
('Djennifer Silva', '(47)99643-6700', 'djennifers123@gmail.com');