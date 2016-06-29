<?php

/* about page displaying preamble */
class PreambleModel extends Model{
    const PAGE_TITLE = 'Preamble - GSU Delta Phi Lambda';

    public function __construct() {
        $this->title = self::PAGE_TITLE;
    }

}