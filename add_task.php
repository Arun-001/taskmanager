<?php
require 'classes/Database.php';
require 'classes/Task.php';

// Initialize Database Connection
$db = (new Database())->connect();
$task = new Task($db);

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');

    // Validate input
    if (empty($title)) {
        $error = 'Title is required.';
    } else {
        // Add task using the Task class
        if ($task->addTask($title, $description)) {
            $success = 'Task added successfully!';
        } else {
            $error = 'Failed to add task. Please try again.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>
    <link rel="stylesheet" href="styles.css"> <!-- Optional: Add a stylesheet for better UI -->
</head>

<body>
    <h1>Add a New Task</h1>

    <!-- Back to Task List Button -->
    <a href="index.php" class="back-button">
        Back to Task List
    </a>



    <!-- Display messages -->
    <?php if (!empty($error)): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>
    <?php if (!empty($success)): ?>
        <p style="color: green;"><?= $success ?></p>
    <?php endif; ?>

    <!-- Add Task Form -->
    <form method="POST" action="">
        <label for="title">Task Title:</label>
        <input type="text" id="title" name="title" placeholder="Enter task title" required>
        <br><br>

        <label for="description">Task Description:</label>
        <textarea id="description" name="description" placeholder="Enter task description"></textarea>
        <br><br>

        <button type="submit">Add Task</button>
    </form>
</body>

</html>