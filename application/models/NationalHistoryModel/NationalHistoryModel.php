<?php

/* about page displaying national history */
class NationalHistoryModel extends Model{
    const PAGE_TITLE = 'National History - GSU Delta Phi Lambda';

    public function __construct() {
        $this->title = self::PAGE_TITLE;
    }

}