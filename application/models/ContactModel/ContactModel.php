<?php

/* contact us page */
class ContactModel extends Model {
    protected $_errorArray = array();

    const PAGE_TITLE = 'Contact Us - GSU Delta Phi Lambda';

    public function __construct() {
        $this->title = self::PAGE_TITLE;

        $this->_checkForErrors();
    }

    protected function _checkForErrors() {
        if ( !empty($_POST) ) {
            $errorsArray = array();

            $name    = $_POST['inputName'];
            $email   = $_POST['inputEmail'];
            $subject = $_POST['inputSubject'];
            $message = $_POST['inputMessage'];

            if ( (empty($name)) || (empty($email)) || (empty($message)) ) {
                $errorsArray[] = 'Please enter all required fields!';
            } else {
                if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
                    $errorsArray[] = 'Please enter a valid email!';
                }

                if ( !ctype_alpha($name) ) {
                    $errorsArray[] = 'Name may only contain alphabetic characters.';
                }
            }
            //print_r($errorsArray);
            return $errorsArray;
        }
    }
}