<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'database.php';

    $titulo = $_POST['titulo'] ?? '';
    $autor = $_POST['autor'] ?? '';
    $ano = $_POST['ano'] ?? '';

    if (!empty($titulo) && !empty($autor) && is_numeric($ano)) {
        $stmt = $db->prepare("INSERT INTO livros (titulo, autor, ano) VALUES (:titulo, :autor, :ano)");
        $stmt->bindValue(':titulo', $titulo);
        $stmt->bindValue(':autor', $autor);
        $stmt->bindValue(':ano', $ano);
        $stmt->execute();
    }
}

header('Location: index.php');
exit();
?>