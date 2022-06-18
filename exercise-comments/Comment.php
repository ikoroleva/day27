<?php


class Comment

{
    public $author = null;
    public $dateTime = null;
    public $text = null;



    public function __construct($author = null, $dateTime=null, $text = null)
    {
        $this->author = $author;
        $this->dateTime = $dateTime;
        $this->text = $text;
    }
 

}
