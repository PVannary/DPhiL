<?php

/**
 * about controller
 */
class About extends AbstractController {
    const CONTROLLER_NAME  = 'About';
    const PAGE_TITLE       = 'About';
    const PAGE_DESCRIPTION = 'About Description';

    /**
     * constructor
     *
     * @return void
     */
    public function __construct($params) {
        parent::__construct();
        $this->_setPageTitle();
        $this->_setPageDescription();
        $this->_setParameters($params);
    }

    /**
     * index page of controller
     *
     * @param array [ url GET parameters ]
     *
     * @return void
     */
    public function view($params = array()) {
        $documentsModel = $this->_loadModal('documents');

        $this->_data['documents'] = $documentsModel->getDocuments();

        $subView = (!empty($this->_params[1]) ? urldecode($this->_params[1]) : '');

        switch ( $subView ) {
            case 'chapter_history':
                $this->_loadPageView('about/chapter-history', $this->_data);
                break;
            case 'national_history':
                $this->_loadPageView('about/national-history', $this->_data);
                break;
            case 'preamble':
                $this->_loadPageView('about/preamble', $this->_data);
                break;
            case 'policies':
                $this->_loadPageView('about/policies', $this->_data);
                break;
        }
    }
}