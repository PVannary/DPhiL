<?php

/* about page displaying recruitment information about the chapter */
class RecruitmentModel extends Model {
    protected $_contentPage;
    protected $_pageContent;
    protected $_contentTitle;

    const PAGE_TITLE = 'About - GSU Delta Phi Lambda';

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
            case 'faqs':
                $this->_contentTitle = 'Recruitment FAQs';
                $this->_pageContent = "";
                break;
        }
    }

    protected function _getContentFromDatabase() {
        /* Database query here */
    }
}