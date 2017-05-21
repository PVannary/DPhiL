<?php

/**
 * recruitment controller
 */
class Recruitment extends AbstractController {
    const CONTROLLER_NAME  = 'Recruitment';
    const PAGE_TITLE       = 'Recruitment';
    const PAGE_DESCRIPTION = 'Recruitment Description';

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
     * default page
     *
     * @return void
     */
    public function index() {
        $this->faqs();
    }

    /**
     * faq page
     *
     * @return void
     */
    public function faqs() {
        $this->_loadPageView('recruitment/faqs', $this->_data);
    }

    /**
     * antihaze page
     *
     * @return void
     */
    public function antihaze() {
        $this->_loadPageView('recruitment/antihaze', $this->_data);
    }
}