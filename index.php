<?php
require 'classes/Database.php';
require 'classes/Task.php';

$db = (new Database())->connect();
$task = new Task($db);

$tasks = $task->getTasks();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Task Manager</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>Task Manager</h1>

    <!-- Add Task Button -->
    <a href="add_task.php" class="back-button">
        Add Task
    </a>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= $task['id'] ?></td>
                <td><?= $task['title'] ?></td>
                <td><?= $task['description'] ?></td>
                <td><?= $task['status'] ? 'Complete' : 'Incomplete' ?></td>
                <td>
                    <a href="edit_task.php?id=<?= $task['id'] ?>">Edit</a>
                    <a href="delete_task.php?id=<?= $task['id'] ?>">Delete</a>
                    <a href="complete_task.php?id=<?= $task['id'] ?>">Mark Complete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>