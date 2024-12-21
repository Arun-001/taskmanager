<?php
require 'classes/Database.php';
require 'classes/Task.php';

$db = (new Database())->connect();
$task = new Task($db);

$id = $_GET['id'] ?? null;

if ($id) {
    if ($task->markComplete($id)) {
        header("Location: index.php?message=Task marked as complete");
        exit;
    } else {
        die("Failed to mark task as complete");
    }
} else {
    die("Task ID is required");
}
