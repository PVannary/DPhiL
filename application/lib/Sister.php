<?php

/* sister data object */

class Sister {
    protected $_sisterId;
    protected $_lineNumber;
    protected $_firstName;
    protected $_lastName;
    protected $_lineName;
    protected $_ethnicity;
    protected $_major;
    protected $_class;
    protected $_position;
    protected $_bigSister;
    protected $_littleSisters;
    protected $_biography;
    protected $_crossDate;
    protected $_fullLineName;
    protected $_image;

    public function __construct($params) {
        $this->_lineNumber    = $params['line_number'];
        $this->_firstName     = $params['first_name'];
        $this->_lastName      = $params['last_name'];
        $this->_lineName      = $params['line_name'];
        $this->_ethnicity     = $params['ethnicity'];
        $this->_major         = $params['major'];
        $this->_class         = trim($params['class']);
        $this->_position      = $params['position'];
        $this->_bigSister     = $params['big_sister'];
        $this->_littleSisters = $params['little_sisters'];
        $this->_biography     = $params['biography'];
        $this->_crossDate     = $params['cross_date'];
        $this->_fullLineName  = $params['first_name'] . ' "' . $params['line_name'] . '" ' . $params['last_name'];
        $this->_image         = ImageLoader::loadImage($this->_class, $this->_lineNumber);
    }

    public function getLineNumber() {
        if ( isset($this->_lineNumber) ) {
            return $this->_lineNumber;
        }
    }

    public function getFirstName() {
        if ( isset($this->_firstName) ) {
            return $this->_firstName;
        }
    }

    public function getLastName() {
        if ( isset($this->_lastName) ) {
            return $this->_lastName;
        }
    }

    public function getLineName() {
        if ( isset($this->_lineName) ) {
            return $this->_lineName;
        }
    }

    public function getEthnicity() {
        if ( isset($this->_ethnicity) ) {
            return $this->_ethnicity;
        }
    }

    public function getMajor() {
        if ( isset($this->_major) ) {
            return $this->_major;
        }
    }

    public function getClass() {
        if ( isset($this->_class) ) {
            return $this->_class;
        }
    }

    public function getPosition() {
        if ( isset($this->_position) ) {
            return $this->_position;
        }
    }

    public function getBigSister() {
        if ( isset($this->_bigSister) ) {
            return $this->_bigSister;
        }
    }

    public function getLittleSisters() {
        if ( isset($this->_littleSisters) ) {
            return $this->_littleSisters;
        }
    }

    public function getBiography() {
        if ( isset($this->_biography) ) {
            return $this->_biography;
        }
    }

    public function getCrossDate() {
        if ( isset($this->_crossDate) ) {
            return $this->_crossDate;
        }
    }

    public function getFullLineName() {
        if ( isset($this->_fullLineName) ) {
            return $this->_fullLineName;
        }
    }

    public function getImage() {
        if ( isset($this->_image) ) {
            return $this->_image;
        }
    }
}