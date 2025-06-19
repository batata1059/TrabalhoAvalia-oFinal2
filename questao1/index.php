<?php
require 'database.php';

// Consulta todos os livros
$result = $db->query("SELECT * FROM livros");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Livraria</title>
</head>
<body>
    <h1>Cadastro de Livros</h1>

    <h2>Adicionar Livro</h2>
    <form action="add_book.php" method="post">
        <label>Título: <input type="text" name="titulo" required></label><br>
        <label>Autor: <input type="text" name="autor" required></label><br>
        <label>Ano: <input type="number" name="ano" required></label><br>
        <button type="submit">Adicionar</button>
    </form>

    <h2>Lista de Livros</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th><th>Título</th><th>Autor</th><th>Ano</th><th>Ação</th>
        </tr>
        <?php while ($row = $result->fetchArray(SQLITE3_ASSOC)): ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['titulo']) ?></td>
            <td><?= htmlspecialchars($row['autor']) ?></td>
            <td><?= htmlspecialchars($row['ano']) ?></td>
            <td>
                <form action="delete_book.php" method="post" style="display:inline">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <button type="submit" onclick="return confirm('Deseja excluir este livro?')">Excluir</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>