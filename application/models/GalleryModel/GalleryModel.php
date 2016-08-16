<?php

/* gallery page */
class GalleryModel extends Model{
    protected $_contentPage;
    protected $_contentTitle;
    protected $_menu = array();
    protected $_imageArray = array();

    const PAGE_TITLE = 'Gallery - GSU Delta Phi Lambda';

    public function __construct($module, $params) {
        $this->title = self::PAGE_TITLE;
        $this->_imageArray = $this->_getImages();
        $this->_setMenu();
        $this->_setContent();
    }

    protected function _setMenu() {
    	$this->_menu['header']  = 'Category';
    	$this->_menu['content'] = array();

    	$subCategory = ['Sisterhood', 'Events', 'Mixers', 'Philantrophy'];

    	foreach ( $subCategory as $categoryItem ) {
    		$listItem = array (
    			'title' => $categoryItem,
    			'attribute' => ''
    			);
    		$this->_menu['content'][] = $listItem;
    	}
    }

    protected function _setContent() {
    	$this->_contentTitle = 'Gallery';
    }

    protected function _getImages() {
    	$imagePath     = HOST_NAME . '/public/images/';
        $absImagePath  = ABSOLUTE_PATH . '/public/images/';
        $image 		   = '';
        $imageArray    = array();

        foreach ( glob($absImagePath . '*.jpg') as $fileName ) {
        	$image = $imagePath . (basename($fileName));
        	$imageArray[] = $image;
        }
        return $imageArray;
    }
}