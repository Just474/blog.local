<?php

$db = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';
require_once $_SERVER['DOCUMENT_ROOT']."/function.php";
session_start();
adminPanelProtect();

var_dump($db);
$id = $_GET['id'];

$delete = "DELETE FROM categories WHERE id = :id";

try {
    $stmt = $db->prepare($delete);
    $stmt->execute(['id' => $id]);
    header('location: ../');
} catch (PDOException $e) {
    echo "Ошибка:" . $e->getMessage();
}
