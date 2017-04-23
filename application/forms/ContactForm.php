<?php

/**
 * contact form
 */
class ContactForm extends Form implements FormInterface {
    public $form;
    public $name;
    public $emailAddress;
    public $subject;
    public $message;

    const FORM_NAME       = 'contact';
    const SUCCESS_GENERIC = array('type' => 'success', 'title' => 'Success', 'message' => 'Thank you for contacting us!');
    const ERROR_GENERIC   = array('type' => 'danger',  'title' => 'Error',   'message' => 'Unexpected error occured!');

    /**
     * constructor
     *
     * @param obj $dbh [ database handler ]
     *
     * @return void
     */
    public function __construct($dbh) {
        parent::__construct($dbh);

        $this->_setFieldRequired(array('name, email-address'));

        $this->populateForm();
    }

    /**
     * populate the form with values in POST or SESSION
     *
     * @return void
     */
    public function populateForm() {
        $this->name         = $this->_populateField('name');
        $this->emailAddress = $this->_populateField('email-address');
        $this->subject      = $this->_populateField('subject');
        $this->message      = $this->_populateField('message');
    }

    /**
     * attempt to submit the form using the populated fields
     *
     * @return boolean [ response from the database query ]
     */
    public function submitForm() {

    }
}