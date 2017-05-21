<?php

/**
 * sisters controller
 */
class Sisters extends AbstractController {
    const CONTROLLER_NAME  = 'Sisters';
    const PAGE_TITLE       = 'Sisters';
    const PAGE_DESCRIPTION = 'Sisters Description';

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
     * sisters view page
     *
     * @return void
     */
    public function view() {
        $sistersModel = $this->_loadModal('sisters');

        $this->_data['sisters'] = $sistersModel->getActiveSisters();

        $this->_loadPageView('sisters/index', $this->_data);
    }
}