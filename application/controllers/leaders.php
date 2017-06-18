<?php

/**
 * leaders controller
 */
class Leaders extends AbstractController {
    const CONTROLLER_NAME  = 'Leaders';
    const PAGE_TITLE       = 'Leaders';
    const PAGE_DESCRIPTION = 'Executive Board';

    /**
     * constructor
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
        $this->_setPageTitle();
        $this->_setPageDescription();
    }

    /**
     * index page of controller
     *
     * @param array [ url GET parameters ]
     *
     * @return void
     */
    public function index() {
        $this->view();
    }

    /**
     * leaders view page
     *
     * @return void
     */
    public function view() {
        $this->_loadPageView('leaders/index', $this->_data);
    }
}