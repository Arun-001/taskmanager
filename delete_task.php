**delete_task.php**
<?php
require 'classes/Database.php';
require 'classes/Task.php';

$db = (new Database())->connect();
$task = new Task($db);

$id = $_GET['id'] ?? null;

if ($id) {
    if ($task->deleteTask($id)) {
        header("Location: index.php?message=Task deleted successfully");
        exit;
    } else {
        die("Failed to delete task");
    }
} else {
    die("Task ID is required");
}
?>