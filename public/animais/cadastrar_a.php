<?php
require_once __DIR__ . '/../../infra/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cliente_id = $_POST['cliente_id'];
    $nome       = $_POST['nome'];
    $especie    = $_POST['especie'];
    $raca       = $_POST['raca'];
    $idade      = $_POST['idade'];

    $sql = "INSERT INTO animais (cliente_id, nome, especie, raca, idade) VALUES ('$cliente_id', '$nome', '$especie', '$raca', '$idade')";
    mysqli_query($conn, $sql);
    
    header('Location: listar_a.php');
    exit;
}

$resClientes = mysqli_query($conn, "SELECT id, nome FROM clientes ORDER BY nome");
$clientes = mysqli_fetch_all($resClientes, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Novo Animal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body class="p-4">
<div class="container" style="max-width: 450px;">
    <h3>Novo Animal</h3>
    <form method="POST" class="card card-body">
        <label class="form-label">Responsável</label>
        <select name="cliente_id" class="form-select mb-2" required>
            <option value="">Selecione o Cliente</option>
            <?php foreach ($clientes as $c): ?>
                <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['nome']) ?></option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="nome" placeholder="Nome do Pet" class="form-control mb-2" required>
        <input type="text" name="especie" placeholder="Espécie (ex: Gato)" class="form-control mb-2" required>
        <input type="text" name="raca" placeholder="Raça" class="form-control mb-2" required>
        <input type="number" name="idade" placeholder="Idade" class="form-control mb-3" required>
        <button class="btn btn-primary w-100 mb-2">Salvar</button>
        <a href="listar_a.php" class="btn btn-light w-100">Voltar</a>
    </form>
</div>
</body>
</html>