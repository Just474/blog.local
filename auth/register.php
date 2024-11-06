<?php

$db = require "../db.php";
session_start();
$login = $_POST["login"];
$pass = $_POST["pass"];

$queryInsert = "INSERT INTO users (login, pass) VALUES (:login, :pass)";
$sqlValidation = $db->query("SELECT `login` FROM users WHERE login = '$login'")->rowCount() > 0;

if (empty($login) || empty($pass)) {
    echo "Заплните все поля";
    exit();
}elseif ($sqlValidation) {
    echo "Такой логин уже занят";
    exit();
}else{
    try {
        $stmt = $db->prepare($queryInsert);
        $stmt->execute([
            ":login" => $login,
            ":pass" => $pass
        ]);
        $user = $db -> query("SELECT * FROM users WHERE login = '$login'")->fetch(PDO::FETCH_ASSOC);
        $_SESSION["user_id"] = $user['id'];
        header("location: ../personal/");
    }   catch (PDOException $e) {
        echo "Неизвестная ошибка".$e->getMessage();
    }
}



