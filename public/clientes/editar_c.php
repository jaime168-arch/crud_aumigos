<?php
require_once __DIR__ . '/../../infra/conexao.php';

$id = $_GET['id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome     = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email    = $_POST['email'];

    $sql = "UPDATE clientes SET nome='$nome', telefone='$telefone', email='$email' WHERE id='$id'";
    mysqli_query($conn, $sql);

    header('Location: listar_c.php');
    exit;
}

$res = mysqli_query($conn, "SELECT * FROM clientes WHERE id = '$id'");
$cliente = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body class="p-4">
<div class="container" style="max-width: 450px;">
    <h3>Editar Cliente</h3>
    <form method="POST" class="card card-body">
        <input type="text" name="nome" value="<?= htmlspecialchars($cliente['nome']) ?>" class="form-control mb-2" required>
        <input type="text" name="telefone" value="<?= htmlspecialchars($cliente['telefone']) ?>" class="form-control mb-2" required>
        <input type="email" name="email" value="<?= htmlspecialchars($cliente['email']) ?>" class="form-control mb-3" required>
        <button class="btn btn-primary w-100 mb-2">Atualizar</button>
        <a href="listar_c.php" class="btn btn-light w-100">Voltar</a>
    </form>
</div>
</body>
</html>