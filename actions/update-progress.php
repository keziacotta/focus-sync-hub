<?php
require_once('../database/conn.php');

// Define retorno como JSON
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $completed = isset($_POST['completed']) && $_POST['completed'] === 'true' ? 1 : 0;

    try {
        $stmt = $pdo->prepare("UPDATE tasks SET completed = :completed WHERE id = :id");
        $stmt->execute([
            ':completed' => $completed,
            ':id' => $id
        ]);

        echo json_encode(['success' => true]);

    } catch (PDOException $e) {
        echo json_encode([
            'success' => false,
            'error' => $e->getMessage()
        ]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Método inválido']);
}
