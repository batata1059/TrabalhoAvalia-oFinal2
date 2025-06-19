<?php
if (isset($_GET['id'])) {
    require 'database.php';

    $id = $_GET['id'];

    $stmt = $db->prepare("DELETE FROM livros WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: index.php");
    exit();
}
?>