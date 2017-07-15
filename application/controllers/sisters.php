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

        $subView = (!empty($this->_params[1]) ? urldecode($this->_params[1]) : '');

        switch ( $subView ) {
            case 'active_house':
                $this->_data['sisters'] = $sistersModel->getActiveSisters();
                $this->_loadPageView('sisters/active-house', $this->_data);
                break;
            case 'alumnas':
                $sisters = $sistersModel->getAlumniSisters();
                $sisters = $sistersModel->sortSistersByClass($sisters);

                $this->_data['sisters'] = $sisters;
                $this->_loadPageView('sisters/alumni', $this->_data);
                break;
        }
    }
}