<?php
require_once '../../infra/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO clientes (nome, telefone, email) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['nome'], $_POST['telefone'], $_POST['email']]);
    header('Location: listar_c.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Novo Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body class="p-4">
<div class="container" style="max-width: 450px;">
    <h3>Novo Cliente</h3>
    <form method="POST" class="card card-body">
        <input type="text" name="nome" placeholder="Nome Completo" class="form-control mb-2" required>
        <input type="text" name="telefone" placeholder="Telefone" class="form-control mb-2" required>
        <input type="email" name="email" placeholder="E-mail" class="form-control mb-3" required>
        <button class="btn btn-primary w-100 mb-2">Salvar</button>
        <a href="listar_c.php" class="btn btn-light w-100">Voltar</a>
    </form>
</div>
</body>
</html>