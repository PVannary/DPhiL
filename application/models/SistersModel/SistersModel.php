<?php

/* about page displaying recruitment information about the chapter */
class SistersModel extends Model {
    protected $_contentPage;
    protected $_pageContent;
    protected $_contentTitle;
    protected $_classArray       = array();
    protected $_rosterArray      = array();
    protected $_selectedClass    = '';

    const PAGE_TITLE = 'The Sisters - GSU Delta Phi Lambda';

    const ROSTER_TABLE = array(
            array('header' => 'Line Number',      'key' => 'getLineNumber'),
            array('header' => 'Ethnicity',        'key' => 'getEthnicity'),
            array('header' => 'Major',            'key' => 'getMajor'),
            array('header' => 'Position',         'key' => 'getPosition'),
            array('header' => 'Big Sister',       'key' => 'getBigSister'),
            array('header' => 'Little Sister(s)', 'key' => 'getLittleSisters')
        );

    public function __construct($module, $params) {
        if ( !empty($params) ) {
            $this->_contentPage = $params[0];
            // this is an ajax call and only want the html for the right pane
            if ( !empty($params[1]) && $params[0] == 'roster') {
                $this->_getRosterAjaxContent($params[1]);

                die;
            }

            $this->_setContent();
        }

        $this->title = self::PAGE_TITLE;
    }

    protected function _getRosterAjaxContent($selectedClass) {
        $className = ucwords(str_replace('_', ' ', $selectedClass));

        $this->_selectedClass = $this->_getClassesFromDatabase($className);

        $this->_rosterArray['roster'] = $this->_getRosterFromDatabase($className);
        $this->_rosterArray['class_image'] = $this->_selectedClass->getImage();

        $html = $this->_displayRoster($this->_rosterArray);
/*
        echo json_encode(
            array(
                "title" => "The Test Title",
                "content" => 'MOOMOO'
            )
        );
*/
        
        echo json_encode(
            array(
                "title" => "The " . $this->_selectedClass->getClassDescription() . " (" . $this->_selectedClass->getClassName() . " Class)",
                "content" => $html
            )
        );
        
    }

    protected function _displayRoster($data = '') {
        ob_start();

        include ABS_FOLD_FRAGMENTS . 'right_roster.html';

        return ob_get_clean();
    }

    protected function _setContent() {
         //temporary code

        switch($this->_contentPage) {
            case 'roster':
                // set the content using ajax to keep the page consistent in its effects
                $this->_contentTitle = 'Meet the Sisters';
                $this->_pageContent  = "";

                $this->_classArray    = $this->_getClassesFromDataBase();

                break;

            case 'leaders':
                $this->_contentTitle = 'Fall 2016 Executive Board';
                $this->_pageContent  = "";

                break;
        }
    }

    protected function _getClassesFromDatabase($selectedClass = '') {
        //Database query here
        $dbh        = DB::getDbh();
        $classArray = array();

        $whereClause = '';

        if ( !empty($selectedClass) ) {
            $whereClause = 'WHERE class_name = "' . $selectedClass . '"';
        }

        $query = $dbh->prepare(sprintf(
            "SELECT class_id,
                    class_name,
                    class_description,
                    semester,
                    num_of_members
               FROM class_table
                    $whereClause
           ORDER BY date ASC"
                ));
        $query->execute();

        // if a specified class is present, return the row as GreekClass object
        if ( !empty($selectedClass) ) {
            $row = $query->fetch(PDO::FETCH_ASSOC);

            return new GreekClass($row);
        } else {
            while ( $row = $query->fetch(PDO::FETCH_ASSOC) ) {
                $classArray[$row['class_id']] = new GreekClass($row);
            }
        }
        return $classArray;
    }

    protected function _getRosterFromDatabase($selectedClass = '') {
        //Database query here
        $dbh         = DB::getDbh();
        $rosterArray = array();

        $whereClause = '';

        if ( !empty($selectedClass) ) {
            $whereClause = 'WHERE class = "' . $selectedClass . '"';
        }

        $query = $dbh->prepare(sprintf(
            "SELECT line_number,
                    first_name,
                    last_name,
                    position,
                    biography,
                    cross_date,
                    class,
                    line_name,
                    ethnicity,
                    major,
                    big_sister,
                    little_sisters
               FROM roster_table
                    $whereClause"
                ));
        $query->execute();

        while ( $row = $query->fetch(PDO::FETCH_ASSOC) ) {
            $rosterArray[] = new Sister($row);
        }

        return $rosterArray;
    }
}