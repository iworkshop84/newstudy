<?php


abstract class Article
{
    public $id;
    public $title;
    public $text;
    public $posttime;
    public $updatetime;

    protected static $table;
    //public $data = [];

}