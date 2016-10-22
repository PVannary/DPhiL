<?php

/* home page displaying main content */
class HomeModel extends Model{
    const PAGE_TITLE = 'Home - GSU Delta Phi Lambda';

    public function __construct() {
        $this->title = self::PAGE_TITLE;
    }
}