<?php

/**
 * gallery controller
 */
class Gallery extends AbstractController {
    const CONTROLLER_NAME  = 'Gallery';
    const PAGE_TITLE       = 'Gallery';
    const PAGE_DESCRIPTION = 'Gallery Description';

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
        $this->view();
    }

    /**
     * gallery view page
     *
     * @return void
     */
    public function view() {
        $this->_loadPageView('gallery/index', $this->_data);
    }
}