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
     * @return void
     */
    public function index() {
        $this->view();
    }

    /**
     * about view page
     *
     * @return void
     */
    public function view() {
        $documentsModel = $this->_loadModal('documents');

        $subView = (!empty($this->_params[1]) ? urldecode($this->_params[1]) : '');

        switch ( $subView ) {
            case 'chapter_history':
                $this->_data['document'] = $documentsModel->getDocumentsByName('Chapter History');
                $this->_loadPageView('about/chapter-history', $this->_data);
                break;
            case 'national_history':
                $this->_data['document'] = $documentsModel->getDocumentsByName('National History');
                $this->_loadPageView('about/national-history', $this->_data);
                break;
            case 'preamble':
                $this->_data['document'] = $documentsModel->getDocumentsByName('Preamble');
                $this->_loadPageView('about/preamble', $this->_data);
                break;
            case 'policies':
                $this->_data['document'] = $documentsModel->getDocumentsByName('Policies');
                $this->_loadPageView('about/policies', $this->_data);
                break;
        }
    }
}