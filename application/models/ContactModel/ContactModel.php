<?php

/* contact us page */
class ContactModel extends Model {
    protected $_name;
    protected $_email;
    protected $_subject;
    protected $_message;
    protected $_formFields;
    protected $_errorArray = array();

    const PAGE_TITLE = 'Contact Us - GSU Delta Phi Lambda';
    const EMAIL_TO   = 'vannarypov447@hotmail.com';

    public function __construct() {
        $this->title = self::PAGE_TITLE;

        $this->_formFields = new ContactFormFields();

        if ( !empty($_POST) ) {
            $this->_formFields->populateFormFields();

            $this->_errorArray = $this->_checkForErrors();

            if ( empty($this->_errorArray) ) {
                $this->_sendMessage();
            }
        }
    }

    protected function _sendMessage() {
        if (mail('vannarypov447@hotmail.com', $this->_formFields->subject, $this->_formFields->message, 'From: ' . $this->_formFields->email)) {
            echo 'SUCCESS';
        }
    }

    protected function _checkForErrors() {
        $errorsArray = array();

        if ( (empty($this->_formFields->name)) || (empty($this->_formFields->email)) || (empty($this->_formFields->message)) ) {
            $errorsArray[] = 'Please enter all required fields.';
        } else {
            if ( !filter_var($this->_formFields->email, FILTER_VALIDATE_EMAIL) ) {
                $errorsArray[] = 'Please enter a valid email.';
            }

            if ( !ctype_alpha($this->_formFields->name) ) {
                $errorsArray[] = 'Name may only contain alphabetic characters.';
            }
        }
        return $errorsArray;
    }
}