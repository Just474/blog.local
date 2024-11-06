<?php
$db = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$name = $_POST['name'];

$queryInsert = "INSERT INTO categories(name) VALUES (:name)";
$categoriesUniq = $db->query("SELECT name FROM categories WHERE name = '$name'")->rowCount() < 1;


if ($categoriesUniq) {
    $stmt = $db -> prepare($queryInsert);
    $stmt -> execute([
        "name" => $name
    ]);
    header("Location: ../");
}   else{
    echo 'Данная категория уже существует';
}



