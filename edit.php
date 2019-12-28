<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
define('APP', true);

include_once __DIR__ . '/core/sql.php';
//$res = NULL;


if(isset($_GET['id']) and !empty($_GET['id'])){
    $res = News_getOne($_GET['id']);

}else{
    header('Location: /index.php');
}


if(!empty($_POST)){

    if(!empty($_POST['title'])){

        $_POST['id'] = $_GET['id'];
        $postnews = News_edit($_POST);
        header('Location: /edit.php?id='.$_GET['id']);

    }

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
<p>Посмотреть: <a href="/article.php?id=<?= $_GET['id']; ?>" title="Статья"><?= $res['title']; ?></a></p>
<p><a href="/delete.php?id=<?= $_GET['id']; ?>" title="Удалить">Удалить новость</a></p>

<form action="/edit.php?id=<?= $_GET['id'];?>" method="post" enctype="application/x-www-form-urlencoded">
    <p>Название статьи:</p>
    <input type="text" name="title" value="<?= $res['title']?>">

    <p>Текст статьи:</p>
    <textarea rows="10" cols="70" name="text"><?= $res['text']?></textarea>


    <p><input type="submit" name="send" value="Опубликовать"></p>

</form>
</body>
</html>
