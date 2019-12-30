<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
define('APP', true);

include_once __DIR__ . '/model/News.php';



if(isset($_GET['id']) and !empty($_GET['id'])){
    $news = new News();
    $res = $news->News_getOne($_GET['id']);

}else{
    header('Location: /index.php');
}


if(!empty($_POST) and isset($_POST['send'])){

        $news = new News();
        $news->id = $_GET['id'];
        $news->title = $_POST['title'];
        $news->text = $_POST['text'];

        $news->News_edit();
        header('Location: /edit.php?id='.$_GET['id']);

}

if(!empty($_POST) and isset($_POST['delete'])){

    $news = new News();
    $news->id = $_GET['id'];

    $news->News_delete();
    header('Location: /index.php');

}



?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Редактировать новость</title>
</head>
<body>
<h1>Редактировать новость</h1>
<p><a href="/index.php" title="Главная">Главная</a></p>
<p>Посмотреть: <a href="/article.php?id=<?= $_GET['id']; ?>" title="Статья"><?= $res->title; ?></a></p>
<p><a href="/add.php" title="Добавить">Добавить новость</a></p>



<form action="/edit.php?id=<?= $_GET['id'];?>" method="post" enctype="application/x-www-form-urlencoded">
    <p>Название статьи:</p>
    <input type="text" name="title" value="<?= $res->title; ?>">

    <p>Текст статьи:</p>
    <textarea rows="10" cols="70" name="text"><?= $res->text; ?></textarea>


    <p><input type="submit" name="send" value="Редактировать">
    <input type="submit" name="delete" value="Удалить статью"></p>

</form>
</body>
</html>
