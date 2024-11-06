<?php
    $db = require_once "../db.php";
    require_once "../function.php";
    session_start();
    userVerification();

    $sql = ("SELECT articles.*, categories.name as category_name  FROM articles LEFT JOIN categories  ON category_id = categories.id  WHERE is_moderated = '1' " );
    $categories = $db->query("SELECT * FROM categories ")->fetchAll(PDO::FETCH_ASSOC);

    $category_id = (Isset($_GET['category_id'])) ? (int)$_GET['category_id'] : 0;
    if ($category_id > 0) {
        $sql .= " AND category_id = '$category_id'";
    }

    $articles = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="get">
    <select name="category_id">
        <option value="0">Все категории</option>
        <?php foreach ($categories as $category):?>
            <option <?php echo($category_id==$category['id']) ?"selected" : ""?> value="<?=$category['id']?>"><?=$category['name']?></option>
        <?php endforeach;?>
    </select>
    <input type="submit" value="Отсортировать">
</form>
<a href="articles/">Мои статьи</a>
<a href="../auth/logout.php">Выйти из аккаунта</a>

    <?php foreach ($articles as $article):?>
        <a href="../article.php?id=<?=$article['id']?>">
    <div class="container">
        <h2><?=$article['name']?></h2>
        <h4><?=$article['category_name']?></h4>
        <p><?=$article['text']?></p>
        <p><?=$article['created_at']?></p>
    </div>
        </a>
    <?php endforeach;?>
</body>
</html>
