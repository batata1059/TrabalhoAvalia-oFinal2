<?php
$db = new SQLite3('tarefas.db');

// Criação da tabela, se não existir
$db->exec("CREATE TABLE IF NOT EXISTS tarefas (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    descricao TEXT NOT NULL,
    vencimento DATE NOT NULL,
    concluida INTEGER DEFAULT 0
)");
?>