<?php
include 'db.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['id'], $data['name'], $data['email'], $data['age'], $data['class'])) {
    $id = $data['id'];
    $name = $data['name'];
    $email = $data['email'];
    $age = $data['age'];
    $class = $data['class'];

    try {
        $stmt = $pdo->prepare('UPDATE students SET name = :name, email = :email, age = :age, class = :class WHERE id = :id');
        $stmt->execute(['name' => $name, 'email' => $email, 'age' => $age, 'class' => $class, 'id' => $id]);

        echo json_encode(['status' => 'success']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
}
?>
