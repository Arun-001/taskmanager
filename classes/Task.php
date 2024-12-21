<?php

class Task
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function addTask($title, $description)
    {
        $sql = "INSERT INTO tasks (title, description, status, created_at) VALUES (:title, :description, 0, NOW())";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        return $stmt->execute();
    }

    public function getTasks()
    {
        $sql = "SELECT * FROM tasks";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateTask($id, $title, $description, $status)
    {
        $sql = "UPDATE tasks SET title = :title, description = :description, status = :status, updated_at = NOW() WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function deleteTask($id)
    {
        $sql = "DELETE FROM tasks WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function markComplete($id)
    {
        $sql = "UPDATE tasks SET status = 1 WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
