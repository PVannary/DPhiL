<?php

/* national history controller */
class NationalHistory extends Controller {

    // index model function when page is accessed
    public function index($params) {
        $this->_view($this->_model('NationalHistory', $params));
    }
}