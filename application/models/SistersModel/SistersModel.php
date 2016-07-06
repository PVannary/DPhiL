<?php

/* about page displaying recruitment information about the chapter */
class SistersModel extends Model {
    protected $_contentPage;
    protected $_pageContent;
    protected $_contentTitle;

    const PAGE_TITLE = 'The Sisters - GSU Delta Phi Lambda';

    public function __construct($module, $params) {
        if ( !empty($params) ) {
            $this->_contentPage = $params[0];
            $this->_setContent();
        }

        $this->title = self::PAGE_TITLE;
    }

    protected function _setContent() {
        /* temporary code */

        switch($this->_contentPage) {
            case 'leaders':
                $this->_contentTitle = 'Sister Leadership';
                $this->_pageContent = "";
                break;
            case 'roster':
                $this->_contentTitle = 'Active Sisters';
                $this->_pageContent = "";
                break;
        }
    }

    protected function _getContentFromDatabase() {
        /* Database query here */
    }
}