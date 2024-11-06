<?php
$db = require_once $_SERVER["DOCUMENT_ROOT"] . '/db.php';

$id = $_POST['id'];
$title = $_POST['title'];
$text = $_POST['text'];
$category = $_POST['category'];
$query = ("UPDATE articles SET  name = :name, text = :text , is_moderated ='0',category_id = :category WHERE id = :id");

if(!empty($title) && !empty($text) && !empty($category) && !empty($id) ){
    $stmt = $db->prepare($query);
    $stmt -> execute([
        ':name' => $title,
        ':text' => $text,
        ':category' => $category,
        ':id' => $id
    ]);
    header("location: ../index.php");
} else{
    echo "Неизвестная ошибка";
}
