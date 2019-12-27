<?php

include_once __DIR__ . '/dbconfig.php';

function dbConnect(){
    $link = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if (!$link) {
        return  "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL .
            "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL .
            "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    }else{
        return $link;
    }
}

function dbQuery($query){

    $results = mysqli_query(dbConnect(), $query);
    if($results){
        return $results;
    }else{
        return false;
    }

}

function dbFetchAssocSingle($queryresults){
    $row = mysqli_fetch_array($queryresults, MYSQLI_ASSOC);

    return $row;
}


function dbFetchAssoc($query){
    $res = [];
    $queryresults = dbQuery($query);
    while($row = mysqli_fetch_assoc($queryresults)) {
        $res[] = $row;
    }
    return $res;
}


function News_getAll(){
    $res = [];
    $queryresults = dbQuery('SELECT * FROM artucles');
    while($row = mysqli_fetch_assoc($queryresults)) {
        $res[] = $row;
    }
    return $res;
}