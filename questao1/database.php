<?php
$db = new SQLite3('livraria.db');

// Criação da tabela, se não existir
$db->exec("CREATE TABLE IF NOT EXISTS livros (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    titulo TEXT NOT NULL,
    autor TEXT NOT NULL,
    ano INTEGER NOT NULL
)");
?>