<?php
include_once __DIR__ . '/../core/dbconfig.php';

class SQLold
{
    private $link = NULL;


    public function __construct() {
        $this->link = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if (mysqli_connect_error()) {
            die('Ошибка подключения (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
        }
    }

    protected function query($q){
        return $this->link->query($q);
    }

    public function News_getAll(){
        $res = [];
        $queryresults = $this->query('SELECT * FROM articuls ORDER BY posttime DESC');
        while($row = mysqli_fetch_assoc($queryresults)) {
            $res[] = $row;
        }
        return $res;
    }


    function News_getOne($id){
        $queryresults = $this->query('SELECT * FROM articuls WHERE id=' . $id);
        $row = mysqli_fetch_array($queryresults, MYSQLI_ASSOC);

        return $row;
    }

    public function News_add($data){
        $query ="INSERT INTO articuls (title, text, posttime) 
        VALUES ('". $data['title'] ."', '". $data['text']. "', '". date('Y-m-d H-i-s', time()) . "')";

        return $this->query($query);
    }


    public function News_edit($data){
        $query ="UPDATE articuls SET title ='". $data['title'] ."', text ='". $data['text']. "'
        WHERE id ='". $data['id'] ."'";

        return $this->query($query);

    }

    public function News_delete($id){
        $query ="DELETE FROM articuls WHERE id='". $id ."'";

        return $this->query($query);
    }

}