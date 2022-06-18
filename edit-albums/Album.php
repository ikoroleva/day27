<?php

class Album 
{
    public $title = null;
    public $cover_image = null;
    public $author = null;
    public $tracks = [];
    public $year_of_release = null;

    public function __construct($title = null, $year = null) 
    {
        $this->title = $title;
        $this->year = $year;
    }

    public function setAuthor(Author $author)
    {
        $this->author = $author;
    }
    
    public function setTrack(Track $track)
    {
        $this->tracks[] = $track;
    }

    public function setCoverImage ($cover_image) 
    {
        $this->cover_image = $cover_image;
    }

    public function getNrOfTracks ()  
    {
        return count($this->tracks);
    }

    public function getTitle() 
    {
        return $this->title;
    }

    public function getTitleOfFirstTrack() 
        
    {

        if ($this -> getNrOfTracks() > 0) {
        return $this->tracks[0]->title;
        } else {
        return null;
    }
    }


    


}