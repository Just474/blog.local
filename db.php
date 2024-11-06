<?php

$login = "root";
$password = "";
$database = "blog";
$host = "MySQL-8.2";

try {
    $db = new PDO ("mysql:host=$host;dbname=$database", $login, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db; // Вернуть объект PDO
} catch (PDOException $e) {
    echo "Ошибка подключения: " . $e->getMessage();
    return false; // Или вызвать exit(), если нужно
}
