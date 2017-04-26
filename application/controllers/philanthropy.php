<?php

/**
 * philanthropy controller
 */
class Philanthropy extends AbstractController {
    const CONTROLLER_NAME  = 'Philanthrophy';
    const PAGE_TITLE       = 'Philanthrophy';
    const PAGE_DESCRIPTION = 'Philanthrophy Description';

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
    public function index($params = array()) {
        $this->_loadPageView('philanthropy/index', $this->_data);
    }
}