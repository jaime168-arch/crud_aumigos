<?php
require_once '../../infra/conexao.php';

$id = $_GET['id'] ?? null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE animais SET cliente_id=?, nome=?, especie=?, raca=?, idade=? WHERE id=?");
    $stmt->execute([$_POST['cliente_id'], $_POST['nome'], $_POST['especie'], $_POST['raca'], $_POST['idade'], $id]);
    header('Location: listar_a.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM animais WHERE id = ?");
$stmt->execute([$id]);
$pet = $stmt->fetch();
$clientes = $pdo->query("SELECT id, nome FROM clientes ORDER BY nome")->fetchAll();
?>