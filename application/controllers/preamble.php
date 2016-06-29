<?php

/* preamble controller */
class Preamble extends Controller {

    // index model function when page is accessed
    public function index($params) {
        $this->_view($this->_model('Preamble', $params));
    }
}