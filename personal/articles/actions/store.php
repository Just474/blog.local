<?php
$db = require_once $_SERVER["DOCUMENT_ROOT"] . '/db.php';

session_start();

$user_id = $_SESSION['user_id'];
$title = $_POST['title'];
$text = $_POST['text'];
$category = $_POST['category'];


$articleInsert = "INSERT INTO articles ( name, text, created_at, is_moderated, category_id, user_id) VALUES ( :title, :text, NOW(), '0', :category, :user_id)";

if (!empty($title) && !empty($text) && !empty($category) && !empty($user_id)) {
    $stmt = $db->prepare($articleInsert);
    $stmt ->execute([
        ':title' => $title,
        ':text' => $text,
        ':category' => $category,
        ':user_id' => $user_id
    ]);
    header("location: ../index.php");
}else{
        echo "Введены не все поля";
    }


