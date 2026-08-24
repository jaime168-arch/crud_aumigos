<?php
// Index.php (Raiz do projeto)
?>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet shop dos AUmigos</title>
    <!-- Bootstrap 5 CSS & Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel= "stylesheet" href="style/style.css">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Hero Header -->
    <div class="bg-primary text-white py-5 text-center shadow-sm">
        <div class="container py-3">
            <h1 class="display-4 fw-bold"><i class="bi bi-heart-pulse-fill me-2"></i>Pet shop dos AUmigos</h1>
            <p class="lead mb-0"> Sistema integrado de gestão de animais e clientes</p>
        </div>
    </div>
    
    <!-- Navegação em Cards / Dashboard Slim -->
    <div class="container my-auto py-5">
        <div class="row g-4 justify-content-center">
            
            <!-- Módulo de Clientes -->
            <div class="col-md-5 col-lg-4">
                <div class="card h-100 shadow-sm border-0 text-center p-4">
                    <div class="card-body d-flex flex-column align-items-center">
                        <div class="bg-primary-subtle text-primary rounded-circle p-3 mb-3" style="width: 70px; height: 70px;">
                            <i class="bi bi-people-fill fs-2"></i>
                        </div>
                        <h4 class="card-title fw-bold text-dark">Clientes</h4>
                        <p class="card-text text-muted mb-4">Gerencie os tutores, informações de contato e visualize os seus pets cadastrados.</p>
                        <a href="public/clientes/listar_c.php" class="btn btn-primary w-100 mt-auto">
                            Acessar Clientes <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

<!-- Módulo de Animais -->
            <div class="col-md-5 col-lg-4">
                <div class="card h-100 shadow-sm border-0 text-center p-4">
                    <div class="card-body d-flex flex-column align-items-center">
                        <div class="bg-info-subtle text-info rounded-circle p-3 mb-3" style="width: 70px; height: 70px;">
                            <i class="bi bi-award-fill fs-2"></i>
                        </div>
                        <h4 class="card-title fw-bold text-dark">Animais</h4>
                        <p class="card-text text-muted mb-4">Cadastre novos pets, edite fichas médicas e vincule cada animal ao seu devido dono.</p>
                        <a href="public/animais/listar_a.php" class="btn btn-outline-primary w-100 mt-auto">
                            Acessar Animais <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Rodapé -->
    <footer class="bg-white text-center text-muted py-3 border-top mt-auto">
        <small>&copy; <?= date('Y') ?> AUmigos Pet Shop — Todos os direitos reservados</small>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
