<?php
include 'db.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['name'], $data['email'], $data['age'], $data['class'])) {
    $name = $data['name'];
    $email = $data['email'];
    $age = $data['age'];
    $class = $data['class'];

    try {
        $stmt = $pdo->prepare('INSERT INTO students (name, email, age, class) VALUES (:name, :email, :age, :class)');
        $stmt->execute(['name' => $name, 'email' => $email, 'age' => $age, 'class' => $class]);

        echo json_encode(['status' => 'success']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
}
?>
