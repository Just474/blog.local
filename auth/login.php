<?php

$db = require_once "../db.php";
require "../function.php";
session_start();

$login = $_POST['login'];
$pass = $_POST['pass'];

$queryLoginUser = $db->query("SELECT * FROM users WHERE login = '$login' AND pass = '$pass'")->rowCount()>0;
$queryLoginAdmin = $db->query("SELECT * FROM users WHERE login = '$login' AND pass = '$pass' AND is_admin = 1")->rowCount()>0;
$user = $db -> query("SELECT * FROM users WHERE login = '$login'")->fetch(PDO::FETCH_ASSOC);

if (!$queryLoginUser) {
    echo "Неверный пароль или логин";
}elseif ($queryLoginAdmin) {
    $_SESSION['is_admin'] = 1;
    header('Location: ../admin/index.php');
} else {
    $_SESSION['user_id'] = $user['id'];
    header("location: ../personal/");
}