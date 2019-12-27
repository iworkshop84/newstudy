<?php

error_reporting(E_ALL );
ini_set('display_errors', 1);

include_once __DIR__ . '/core/sql.php';


if(!empty($_GET['id'])){
    $newsOne = News_getOne($_GET['id']);

}




?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $newsOne['title']?></title>
</head>
<body>
<h1><?= $newsOne['title']?></h1>
<p>Опубликована: <?= $newsOne['posttime']?></p>
<p><?= $newsOne['text']?></p>


</body>
</html>
