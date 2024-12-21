<?php
require 'classes/Database.php';
require 'classes/Task.php';

$db = (new Database())->connect();
$task = new Task($db);

$error = '';
$success = '';
$id = $_GET['id'] ?? null;

if ($id) {
    $currentTask = $task->getTasks();
    $currentTask = array_filter($currentTask, fn($t) => $t['id'] == $id);
    $currentTask = reset($currentTask);

    if (!$currentTask) {
        die('Task not found');
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = trim($_POST['title'] ?? $currentTask['title']);
        $description = trim($_POST['description'] ?? $currentTask['description']);
        $status = $_POST['status'] ?? $currentTask['status'];

        if ($task->updateTask($id, $title, $description, $status)) {
            $success = 'Task updated successfully!';
        } else {
            $error = 'Failed to update task. Please try again.';
        }
    }
} else {
    die('Task ID is required');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Task</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <h1>Edit Task</h1>
    <!-- Back to Task List Button -->
    <a href="index.php" class="back-button">
        Back to Task List
    </a>

    </form>
    <?php if (!empty($error)): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>
    <?php if (!empty($success)): ?>
        <p style="color: green;"><?= $success ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="title">Task Title:</label>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($currentTask['title']) ?>" required>
        <br>
        <label for="description">Task Description:</label>
        <textarea id="description" name="description"><?= htmlspecialchars($currentTask['description']) ?></textarea>
        <br>
        <label for="status">Status:</label>
        <select id="status" name="status" class="status-dropdown">
            <option value="0" <?= $currentTask['status'] == 0 ? 'selected' : '' ?>>Incomplete</option>
            <option value="1" <?= $currentTask['status'] == 1 ? 'selected' : '' ?>>Complete</option>
        </select>
        <br>
        <button type="submit">Update Task</button>
    </form>
</body>

</html>