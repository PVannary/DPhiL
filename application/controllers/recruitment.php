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
        $this->view();
    }

    /**
     * recruitment view page
     *
     * @return void
     */
    public function view() {
        $faqsModel = $this->_loadModal('faqs');
        $subView = (!empty($this->_params[1]) ? urldecode($this->_params[1]) : '');

        switch ( $subView ) {
            case 'faqs':
                $this->_data['faqs'] = $faqsModel->getFaqs();
                $this->_loadPageView('recruitment/faqs', $this->_data);
                break;
            case 'antihaze':
                $this->_loadPageView('recruitment/antihaze', $this->_data);
                break;
        }
    }
}