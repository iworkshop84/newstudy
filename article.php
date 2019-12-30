<?php
error_reporting(E_ALL );
ini_set('display_errors', 1);
define('APP', true);

include_once __DIR__ . '/model/News.php';


if(!empty($_GET['id'])){
    $news = new News();
    $newsOne = $news->News_getOne($_GET['id']);
}


?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $newsOne->title?></title>
</head>
<body>

<h1><?= $newsOne->title?></h1>
<p><a href="/index.php" title="Главная">Главная</a></p>
<p><a href="/edit.php?id=<?= $_GET['id']; ?>" title="Редактировать">Редактировать</a></p>
<p><a href="/add.php" title="Добавить">Добавить новость</a></p>

<p>Опубликована: <?= $newsOne->posttime; ?></p>
<p><?= $newsOne->text; ?></p>


</body>
</html>