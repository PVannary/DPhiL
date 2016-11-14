<?php

class LeadersModel extends model {
    const PAGE_TITLE = 'Executive Board - GSU Delta Phi Lambda';

    public function __construct() {
        $this->title = self::PAGE_TITLE;
    }
}