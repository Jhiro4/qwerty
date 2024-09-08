<?php
include 'db.php';

try {
    $stmt = $pdo->prepare('SELECT * FROM students');
    $stmt->execute();
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($students);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
