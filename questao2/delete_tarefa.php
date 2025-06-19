<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'database.php';

    $id = $_POST['id'] ?? '';
    if (is_numeric($id)) {
        $stmt = $db->prepare("DELETE FROM tarefas WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}

header('Location: index.php');
exit();
?>