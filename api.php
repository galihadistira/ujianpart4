<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $result = $conn->query("SELECT * FROM todos ORDER BY created_at DESC");
    $todos = [];
    while ($row = $result->fetch_assoc()) {
        $todos[] = $row;
    }
    echo json_encode($todos);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $task = $conn->real_escape_string($data['task']);
    $conn->query("INSERT INTO todos (task, status) VALUES ('$task', 0)");
    echo json_encode(['success' => true]);
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents('php://input'), true);
    $id = (int) $data['id'];
    $conn->query("UPDATE todos SET status = 1 WHERE id = $id");
    echo json_encode(['success' => true]);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents('php://input'), true);
    $id = (int) $data['id'];
    $conn->query("DELETE FROM todos WHERE id = $id");
    echo json_encode(['success' => true]);
}
?>
