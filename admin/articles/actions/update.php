<?php
$db = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$id = $_POST['id'];
$is_moderated = $_POST['is_moderated'] ?? 0;

$query = ("UPDATE articles SET is_moderated = :is_moderated WHERE id = :id");
$stmt = $db->prepare($query);
$stmt -> execute([
    'is_moderated' => $is_moderated,
    'id' => $id,
]);
header('Location: ../index.php');
