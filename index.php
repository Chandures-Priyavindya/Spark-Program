<?php
require 'db.php';

// Fetch all tasks
$stmt = $pdo->query("SELECT * FROM tasks ORDER BY id DESC");
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body class="container mt-5">

    <h2 class="mb-4 text-center">To-Do List</h2>

    <form action="add_task.php" method="POST" class="input-group mb-4">
        <input type="text" name="task" class="form-control" placeholder="Enter a new task" required>

        <button type="submit" class="pushable">
            <span class="shadow"></span>
            <span class="edge"></span>
            <span class="front"> Add Task </span>
        </button>

    </form>

    <table class="table table-bordered rounded-3">
        <thead>
            <tr>
                <th>Task</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= htmlspecialchars($task['task']); ?></td>
                    <td><?= $task['status'] === 'completed' ? '✅ Completed' : '⏳ Pending'; ?></td>
                    <td>
                        <?php if ($task['status'] === 'pending'): ?>
                            <a href="update_task.php?id=<?= $task['id']; ?>" class="btn btn-success btn-sm">Complete</a>
                        <?php endif; ?>
                        <a href="delete_task.php?id=<?= $task['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    

</body>

</html>