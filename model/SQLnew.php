<?php
include_once __DIR__ . '/../core/dbconfig.php';

class SQLnew extends mysqli
{
    private $link = NULL;

    public function __construct($host = DB_HOST, $username = DB_USER, $passwd = DB_PASSWORD, $dbname = DB_NAME, $port = null, $socket = null)
    {
        parent::__construct($host, $username, $passwd, $dbname, $port, $socket);
    }



}