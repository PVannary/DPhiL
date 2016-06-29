<?php

/* about page displaying chapter history */
class PreambleModel extends Model{
    const PAGE_TITLE = 'Preamble - GSU Delta Phi Lambda';

    public function __construct() {
        $this->title = self::PAGE_TITLE;
    }

}