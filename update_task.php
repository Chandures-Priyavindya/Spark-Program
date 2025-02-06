<?php
require 'db.php';

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("UPDATE tasks SET status = 'completed' WHERE id = :id");
    $stmt->execute(['id' => $_GET['id']]);
}

header("Location: index.php");
exit();
?>
