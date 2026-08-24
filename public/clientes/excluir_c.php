<?php
require_once '../../infra/conexao.php';

if (!empty($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM clientes WHERE id = ?");
    $stmt->execute([$_GET['id']]);
}

header('Location: listar_c.php');
exit;