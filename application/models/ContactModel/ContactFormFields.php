<?php

/* contact us form */

class ContactFormFields {
    public $name;
    public $email;
    public $subject;
    public $message;

    public function populateFormFields() {
        $this->name    = $_POST['inputName'];
        $this->email   = $_POST['inputEmail'];
        $this->subject = $_POST['inputSubject'];
        $this->message = $_POST['inputMessage'];
    }
}