# Pet Shop AUmigos — Sistema de Gerenciamento

Sistema web desenvolvido em PHP e MySQL para cadastro e gerenciamento dos clientes e seus respectivos animais de estimação para a pet shop **AUmigos**.

---

## Estrutura do Projeto


```text
aumigos/
├── database/
│   └── banco.sql            # Script de criação do banco e tabelas
├── infra/
│   └── conexao.php          # Arquivo de conexão com o MySQL
├── public/
│   ├── animais/             # Módulo CRUD de Animais
│   │   ├── cadastrar_a.php
│   │   ├── editar_a.php
│   │   ├── excluir_a.php
│   │   └── listar_a.php
│   └── clientes/            # Módulo CRUD de Clientes
│       ├── cadastrar_c.php
│       ├── editar_c.php
│       ├── excluir_c.php
│       └── listar_c.php
├── style/
│   └── style.css            # Estilos customizados da aplicação
├── index.php                # Redirecionamento inicial
└── readme.md                # Documentação do projeto