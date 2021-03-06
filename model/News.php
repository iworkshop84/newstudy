<?php
include_once __DIR__. '/../model/SQLnew.php';
include_once __DIR__. '/../model/SQLold.php';
include_once __DIR__. '/../model/Article.php';


class News
    extends Article
{
    protected static $table ='articuls';


    public function News_getAll(){
        $res = [];
        $db = new SQLnew();
        $queryresults = $db->query('SELECT * FROM articuls ORDER BY posttime DESC');
        while($row = $queryresults->fetch_object(get_called_class())) {
            $res[] = $row;
        }
        return $res;
    }

    public function News_getOne($id){
        $db = new SQLnew();
        $queryresults = $db->query('SELECT * FROM articuls WHERE id=' . $id);
        $row = $queryresults->fetch_object(get_called_class());

        return $row;
    }

    public function News_add(){
        $query ="INSERT INTO articuls (title, text, posttime) 
        VALUES ('". $this->title ."', '". $this->text. "', '". date('Y-m-d H-i-s', time()) . "')";

        $db = new SQLnew();
        return $db->query($query);
    }


    public function News_edit(){
        $query ="UPDATE articuls SET title ='". $this->title ."', text ='". $this->text. "'
        WHERE id ='". $this->id ."'";
        $db = new SQLnew();
        return $db->query($query);

    }

    public function News_delete(){
        $query ="DELETE FROM articuls WHERE id='". $this->id ."'";
        $db = new SQLnew();
        return $db->query($query);
    }
}