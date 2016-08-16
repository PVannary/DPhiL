<?php

/* gallery page */
class GalleryModel extends Model{
    protected $_contentPage;
    protected $_contentTitle;

    const PAGE_TITLE = 'Gallery - GSU Delta Phi Lambda';

    public function __construct($module, $params) {
        $this->title = self::PAGE_TITLE;
    }

}