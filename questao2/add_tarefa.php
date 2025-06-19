<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'database.php';

    $descricao = $_POST['descricao'] ?? '';
    $vencimento = $_POST['vencimento'] ?? '';

    if (!empty($descricao) && !empty($vencimento)) {
        $stmt = $db->prepare("INSERT INTO tarefas (descricao, vencimento) VALUES (:descricao, :vencimento)");
        $stmt->bindValue(':descricao', $descricao);
        $stmt->bindValue(':vencimento', $vencimento);
        $stmt->execute();
    }
}

header('Location: index.php');
exit();
?>