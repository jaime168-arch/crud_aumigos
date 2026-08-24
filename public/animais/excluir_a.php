<?php
require_once '../../infra/conexao.php';

if (!empty($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM animais WHERE id = ?");
    $stmt->execute([$_GET['id']]);
}

header('Location: listar_a.php');
exit;