<?php

include_once __DIR__ . '/core/sql.php';



$newsList = News_getAll();

var_dump($newsList);