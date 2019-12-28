<?php
error_reporting(E_ALL );
ini_set('display_errors', 1);
define('APP', true);

include_once __DIR__ . '/core/sql.php';


if(!empty($_GET['id'])){
    $newsOne = News_getOne($_GET['id']);

}

if(isset($_GET['id']) and !empty($_GET['delete'])){

    News_delete($_GET['id']);
    header('Location: /index.php');
}


if(!empty($_POST) and isset($_POST['delete'])){

       News_delete($_GET['id']);
       header('Location: /index.php');

}

if(!empty($_POST) and isset($_POST['send'])){

    echo 'Проверка прошла успешно';

}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Удалить <?= $newsOne['title']?></title>
</head>
<body>

<h1>Удалить запись: <?= $newsOne['title']?></h1>
<p><a href="/index.php" title="Главная">Главная</a></p>
<p><a href="/edit.php?id=<?= $_GET['id']; ?>" title="Редактировать">Редактировать</a></p>
<p><a href="/delete.php?id=<?= $_GET['id']; ?>&delete=yes" title="Удалить">Удалить ссылкой</a></p>

<form action="/delete.php?id=<?= $_GET['id'];?>" method="post" enctype="application/x-www-form-urlencoded">
    <p>Удаление кнопкой помимо сабмита:</p>
    <input type="text" name="title">


    <p><input type="submit" name="send" value="Тестовый сенд"></p>
    <p><input type="submit" name="delete" value="Удалить статью"></p>


</form>

</body>
</html>
