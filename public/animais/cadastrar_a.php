<?php
require_once '../../infra/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO animais (cliente_id, nome, especie, raca, idade) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$_POST['cliente_id'], $_POST['nome'], $_POST['especie'], $_POST['raca'], $_POST['idade']]);
    header('Location: listar_a.php');
    exit;
}

$clientes = $pdo->query("SELECT id, nome FROM clientes ORDER BY nome")->fetchAll();
?>