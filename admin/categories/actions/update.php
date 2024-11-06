<?php
$db = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$id = $_POST['id'];
$name = $_POST['name'];

$queryUpdate = "UPDATE categories SET name = :name WHERE id = :id";

if (!empty($name)) {
    try {
        $stmt = $db->prepare($queryUpdate);
        $stmt->execute([
            ':name' => $name,
            ':id' => $id
        ]);
        header('location: ../');
    } catch (PDOException $e) {
        echo "Ошибка:" . $e->getMessage();
    }
} else {
    echo "Введите название";
}
