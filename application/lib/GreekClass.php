<?php

/* greek class data object*/

class GreekClass {
    protected $_classId;
    protected $_className;
    protected $_classDescription;
    protected $_semester;
    protected $_numOfMembers;
    protected $_image;

    public function __construct($params) {
        $this->_classId          = $params['class_id'];
        $this->_className        = trim($params['class_name']);
        $this->_classDescription = $params['class_description'];
        $this->_semester         = $params['semester'];
        $this->_numOfMembers     = $params['num_of_members'];
        $this->_image            = ImageLoader::loadImage($this->_className, $this->_className);
    }

    public function getClassId() {
        if ( isset($this->_classId) ) {
            return $this->_classId;
        }
    }

    public function getClassName() {
        if ( isset($this->_className) ) {
            return $this->_className;
        }
    }

    public function getClassDescription() {
        if ( isset($this->_classDescription) ) {
            return $this->_classDescription;
        }
    }

    public function getSemester() {
        if ( isset($this->_semester) ) {
            return $this->_semester;
        }
    }

    public function getNumOfMembers() {
        if ( isset($this->_numOfMembers) ) {
            return $this->_numOfMembers;
        }
    }

    public function getImage() {
        if ( isset($this->_image) ) {
            return $this->_image;
        }
    }
}