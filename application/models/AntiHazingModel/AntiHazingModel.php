<?php

/* page displaying anti-hazing statement */
class AntiHazingModel extends Model{
    const PAGE_TITLE = 'Anti-Hazing - GSU Delta Phi Lambda';

    public function __construct() {
        $this->title = self::PAGE_TITLE;
    }

}