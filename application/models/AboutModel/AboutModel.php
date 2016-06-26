<?php

/* about page displaying chapter history */
class AboutModel extends Model{
    const PAGE_TITLE = 'About - GSU Delta Phi Lambda';

    public function __construct() {
        $this->title = self::PAGE_TITLE;
    }

}