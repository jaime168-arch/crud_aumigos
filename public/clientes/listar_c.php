<?php
require_once __DIR__ . '/../../infra/conexao.php';

$detalhes_id = $_GET['detalhes_id'] ?? null;
$cliente = null;
$animais = [];

if ($detalhes_id) {
    $resCli = mysqli_query($conn, "SELECT * FROM clientes WHERE id = '$detalhes_id'");
    $cliente = mysqli_fetch_assoc($resCli);

    $resAnimais = mysqli_query($conn, "SELECT * FROM animais WHERE cliente_id = '$detalhes_id'");
    $animais = mysqli_fetch_all($resAnimais, MYSQLI_ASSOC);
}

$resClientes = mysqli_query($conn, "SELECT * FROM clientes ORDER BY id DESC");
$clientes = mysqli_fetch_all($resClientes, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body class="p-4">
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h2>Clientes</h2>
        <div>
            <a href="cadastrar_c.php" class="btn btn-primary">+ Novo Cliente</a>
            <a href="../animais/listar_a.php" class="btn btn-outline-secondary">Animais</a>
        </div>
    </div>

    <?php if ($cliente): ?>
    <div class="card p-3 mb-3 border-primary">
        <div class="d-flex justify-content-between">
            <h5>Pets de <?= htmlspecialchars($cliente['nome']) ?></h5>
            <a href="listar_c.php" class="btn-close"></a>
        </div>
        <?php if ($animais): ?>
            <ul class="mb-0">
                <?php foreach ($animais as $a): ?>
                    <li><strong><?= htmlspecialchars($a['nome']) ?></strong> - <?= htmlspecialchars($a['especie']) ?> (<?= htmlspecialchars($a['raca']) ?>)</li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="text-muted mb-0">Nenhum animal cadastrado.</p>
        <?php endif; ?>
    </div>
    <?php endif; ?>

    <table class="table table-hover card">
        <thead class="table-light">
            <tr><th>#</th><th>Nome</th><th>Telefone</th><th>E-mail</th><th>Ações</th></tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $c): ?>
            <tr>
                <td><?= $c['id'] ?></td>
                <td><strong><?= htmlspecialchars($c['nome']) ?></strong></td>
                <td><?= htmlspecialchars($c['telefone']) ?></td>
                <td><?= htmlspecialchars($c['email']) ?></td>
                <td>
                    <a href="listar_c.php?detalhes_id=<?= $c['id'] ?>" class="btn btn-sm btn-info text-white">Ver Pets</a>
                    <a href="editar_c.php?id=<?= $c['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="excluir_c.php?id=<?= $c['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Excluir?')">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>