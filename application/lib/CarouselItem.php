<?php

class CarouselItem {
    public $title;
    public $description;
    public $image;
    public $active;

    public function __construct($row) {
        $this->title       = $row['title'];
        $this->description = $row['description'];
        $this->image       = '/site-dphil/public/images/' . $row['image'];
        $this->active      = '';
    }
}