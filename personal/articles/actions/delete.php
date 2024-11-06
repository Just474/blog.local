<?php
$db = require_once $_SERVER['DOCUMENT_ROOT'].'/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/function.php';
session_start();
userVerification();

$id = $_GET['id'];

$query = "DELETE FROM articles WHERE id = :id AND user_id = :user_id";

if (!empty($id)) {
    $stmt = $db->prepare($query);
    $stmt->execute([
            'id' => $id,
            'user_id' => $_SESSION['user_id']
        ]);
    header('Location: ../');
} else{
    echo "Неизвестная ошибка";
}
