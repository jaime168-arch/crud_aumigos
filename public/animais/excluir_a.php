<?php
require_once __DIR__ . '/../../infra/conexao.php';

$id = $_GET['id'] ?? null;

if ($id) {
    mysqli_query($conn, "DELETE FROM animais WHERE id = '$id'");
}

header('Location: listar_a.php');
exit;