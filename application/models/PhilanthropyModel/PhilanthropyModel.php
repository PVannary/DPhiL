<?php

/* page displaying national philanthropy */
class PhilanthropyModel extends Model{
    const PAGE_TITLE = 'Philanthropy - GSU Delta Phi Lambda';

    public function __construct() {
        $this->title = self::PAGE_TITLE;
    }

}