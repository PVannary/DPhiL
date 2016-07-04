<?php

/* philanthropy controller */
class Philanthropy extends Controller {

    // index model function when page is accessed
    public function index($params) {
        $this->_view($this->_model('Philanthropy', $params));
    }
}