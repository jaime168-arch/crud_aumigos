<?php
require_once __DIR__ . '/../../infra/conexao.php';

$sql = "SELECT animais.*, clientes.nome AS dono 
        FROM animais 
        INNER JOIN clientes ON animais.cliente_id = clientes.id 
        ORDER BY animais.id DESC";
$result = mysqli_query($conn, $sql);
$animais = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Animais</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body class="p-4">
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h2>Animais</h2>
        <div>
            <a href="cadastrar_a.php" class="btn btn-primary">+ Novo Animal</a>
            <a href="../clientes/listar_c.php" class="btn btn-outline-secondary">Clientes</a>
        </div>
    </div>
    
    <table class="table table-hover card">
        <thead class="table-light">
            <tr><th>Pet</th><th>Espécie</th><th>Raça</th><th>Idade</th><th>Responsável</th><th>Ações</th></tr>
        </thead>
        <tbody>
            <?php foreach ($animais as $a): ?>
            <tr>
                <td><strong><?= htmlspecialchars($a['nome']) ?></strong></td>
                <td><?= htmlspecialchars($a['especie']) ?></td>
                <td><?= htmlspecialchars($a['raca']) ?></td>
                <td><?= $a['idade'] ?> ano(s)</td>
                <td><span class="badge bg-info text-dark"><?= htmlspecialchars($a['dono']) ?></span></td>
                <td>
                    <a href="editar_a.php?id=<?= $a['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="excluir_a.php?id=<?= $a['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Excluir?')">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>