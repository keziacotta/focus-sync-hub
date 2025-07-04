<?php
require_once('../database/conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS));

    if ($id && $description !== '') {
        try {
            $stmt = $pdo->prepare("UPDATE tasks SET description = :description WHERE id = :id");
            $stmt->execute([
                ':description' => $description,
                ':id' => $id
            ]);

            // Redireciona de volta ao index
            header('Location: ../index.php');
            exit;
        } catch (PDOException $e) {
            echo "Erro ao atualizar: " . $e->getMessage();
        }
    } else {
        echo "Dados inválidos";
    }
} else {
    echo "Método inválido.";
}
