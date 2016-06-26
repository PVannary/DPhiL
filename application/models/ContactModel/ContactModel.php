<?php

/* contact us page */
class ContactModel extends Model{
    const PAGE_TITLE = 'Contact Us - GSU Delta Phi Lambda';

    public function __construct() {
        $this->title = self::PAGE_TITLE;
    }

}