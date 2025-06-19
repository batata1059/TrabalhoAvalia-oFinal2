<?php
require 'database.php';

$tarefas = $db->query("SELECT * FROM tarefas ORDER BY vencimento ASC");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciador de Tarefas</title>
</head>
<body>
    <h1>Gerenciador de Tarefas</h1>

    <h2>Adicionar Tarefa</h2>
    <form action="add_tarefa.php" method="post">
        <label>Descrição: <input type="text" name="descricao" required></label><br>
        <label>Data de Vencimento: <input type="date" name="vencimento" required></label><br>
        <button type="submit">Adicionar</button>
    </form>

    <h2>Tarefas Não Concluídas</h2>
    <ul>
    <?php while ($tarefa = $tarefas->fetchArray(SQLITE3_ASSOC)): ?>
        <?php if (!$tarefa['concluida']): ?>
        <li>
            <?= htmlspecialchars($tarefa['descricao']) ?> (<?= htmlspecialchars($tarefa['vencimento']) ?>)
            <form action="update_tarefa.php" method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?= $tarefa['id'] ?>">
                <button type="submit">Concluir</button>
            </form>
            <form action="delete_tarefa.php" method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?= $tarefa['id'] ?>">
                <button type="submit" onclick="return confirm('Excluir esta tarefa?')">Excluir</button>
            </form>
        </li>
        <?php endif; ?>
    <?php endwhile; ?>
    </ul>

    <h2>Tarefas Concluídas</h2>
    <ul>
    <?php
    $tarefas->reset();
    $tarefas = $db->query("SELECT * FROM tarefas ORDER BY vencimento ASC");
    while ($tarefa = $tarefas->fetchArray(SQLITE3_ASSOC)):
        if ($tarefa['concluida']):
    ?>
        <li>
            <s><?= htmlspecialchars($tarefa['descricao']) ?> (<?= htmlspecialchars($tarefa['vencimento']) ?>)</s>
            <form action="delete_tarefa.php" method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?= $tarefa['id'] ?>">
                <button type="submit" onclick="return confirm('Excluir esta tarefa?')">Excluir</button>
            </form>
        </li>
    <?php endif; endwhile; ?>
    </ul>
</body>
</html>