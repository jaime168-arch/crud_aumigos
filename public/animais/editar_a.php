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
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Animal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body class="p-4">
<div class="container" style="max-width: 450px;">
    <h3>Editar Animal</h3>
    <form method="POST" class="card card-body">
        <label class="form-label">Responsável</label>
        <select name="cliente_id" class="form-select mb-2" required>
            <?php foreach ($clientes as $c): ?>
                <option value="<?= $c['id'] ?>" <?= $pet['cliente_id'] == $c['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($c['nome']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="nome" value="<?= htmlspecialchars($pet['nome']) ?>" class="form-control mb-2" required>
        <input type="text" name="especie" value="<?= htmlspecialchars($pet['especie']) ?>" class="form-control mb-2" required>
        <input type="text" name="raca" value="<?= htmlspecialchars($pet['raca']) ?>" class="form-control mb-2" required>
        <input type="number" name="idade" value="<?= $pet['idade'] ?>" class="form-control mb-3" required>
        <button class="btn btn-primary w-100 mb-2">Atualizar</button>
        <a href="listar_a.php" class="btn btn-light w-100">Voltar</a>
    </form>
</div>
</body>
</html>