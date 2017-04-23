<?php

/**
 * contact controller
 */
class Contact extends AbstractController {
    const CONTROLLER_NAME  = 'Contact';
    const PAGE_TITLE       = 'Contact Us';
    const PAGE_DESCRIPTION = 'Contact Us Description';

    /**
     * constructor
     *
     * @return void
     */
    public function __construct() {
        parent:: __construct();
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
        $formsModel = $this->_loadModal('forms');

        $form = $formsModel->getForms(array('contact'));

        $this->_data['forms'] = $form;

        $this->_loadPageView('contact/index', $this->_data);
    }
}