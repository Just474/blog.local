    <?php
    $db = require_once "db.php";
    require_once "function.php";
    session_start();
    userVerification();

    $id = $_GET['id'];

    $sql = ("SELECT articles.*, categories.name as category_name  FROM articles LEFT JOIN categories  ON category_id = categories.id  WHERE is_moderated = '1' AND articles.id = :id" );

    $stmt = $db->prepare($sql);
    $stmt->execute([
            'id' => $id
    ]);

    $article = $stmt->fetch(PDO::FETCH_ASSOC);
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
        <?php if ($article):?>
            <div class="container">
                <h2><?=$article['name']?></h2>
                <h4><?=$article['category_name']?></h4>
                <p><?=$article['text']?></p>
                <p><?=$article['created_at']?></p>
            </div>
        <?php else:?>
        <h2>Такая статья не найдена</h2>
        <?php endif;?>
        <a href="personal/index.php">Вернуться</a>
    </body>
    </html>
