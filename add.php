<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
define('APP', true);

include_once __DIR__ . '/model/News.php';


if(!empty($_POST)){

        $news = new News();
        $news->title = $_POST['title'];
        $news->text = $_POST['text'];

        $postnews = $news->News_add();
        if($postnews){
            header('Location: /index.php');
        
    }

}


?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить новость</title>
</head>
<body>
<h1>Добавить новость</h1>
<p><a href="/index.php" title="Главная">Главная</a></p>
<form action="/add.php" method="post" enctype="application/x-www-form-urlencoded">
    <p>Название статьи:</p>
    <input type="text" name="title">

    <p>Текст статьи:</p>
    <textarea rows="10" cols="70" name="text"></textarea>


    <p><input type="submit" name="send" value="Опубликовать"></p>

</form>
</body>
</html>
