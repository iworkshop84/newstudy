<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
define('APP', true);


include_once __DIR__ . '/model/News.php';

$news = new News();
$newsList = $news->News_getAll();




?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
</head>
<body>
<h1>Новости сайта</h1>

<?php foreach ($newsList as $val): ?>

    <h2><a href="/article.php?id=<?= $val->id?>"><?= $val->title; ?></a></h2>
    <p>Дата публикации: <?= $val->posttime; ?></p>
    <p><?= $val->text; ?></p>


<?php endforeach; ?>
</body>
</html>