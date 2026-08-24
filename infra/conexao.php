<?php
$host = 'localhost';
$db = 'aumigos';
$usuario = 'root';
$senha = 'root';

$conn = mysqli_connect($host, $usuario, $senha, $db);

if (!$conn) {
    die("Erro de conexão: " . mysqli_connect_erro());
}

mysqli_set_charset($conn, "utf8mb4");