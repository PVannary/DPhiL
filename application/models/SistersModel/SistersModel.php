<?php

/* about page displaying recruitment information about the chapter */
class SistersModel extends Model {
    protected $_contentPage;
    protected $_pageContent;
    protected $_contentTitle;
    protected $_classArray    = array();
    protected $_rosterArray   = array();
    protected $_menu          = array();
    protected $_selectedClass = '';

    const PAGE_TITLE = 'The Sisters - GSU Delta Phi Lambda';

    const ROSTER_TABLE = array(
            array('header' => 'Line Number',      'key' => 'line_number'),
            array('header' => 'Ethnicity',        'key' => 'ethnicity'),
            array('header' => 'Major',            'key' => 'major'),
            array('header' => 'Position',         'key' => 'position'),
            array('header' => 'Big Sister',       'key' => 'big_sister'),
            array('header' => 'Little Sister(s)', 'key' => 'little_sisters')
        );

    public function __construct($module, $params) {
        if ( !empty($params) ) {
            $this->_contentPage = $params[0];

            // this is an ajax call and only want the html for the right pane
            if ( !empty($params[1]) ) {
                $this->_selectedClass = ucwords(str_replace('_', ' ', $params[1]));

                $this->_getAjaxContent();

                die;
            }

            $this->_setContent();
        }

        $this->title = self::PAGE_TITLE;
    }

    protected function _getAjaxContent() {
        $this->_rosterArray = $this->_getRosterFromDataBase($this->_selectedClass);
        $classDetails       = $this->_getClassesFromDataBase($this->_selectedClass);

        $html = $this->_displayRoster($this->_rosterArray);

        echo json_encode(
            array(
                'title'   => $classDetails['style_name'],
                'content' => $html
            )
        );
    }

    protected function _displayRoster($data = '') {
        ob_start();

        include ABS_FOLD_FRAGMENTS . 'right_roster.html';

        return ob_get_clean();
    }

    protected function _setContent() {
        /* temporary code */

        switch($this->_contentPage) {
            case 'leaders':
                $this->_contentTitle = 'Gamma Chapter Leaders';
                $this->_pageContent = "";
                break;
            case 'roster':
                $this->_contentTitle = 'Gamma Chapter Roster';
                $this->_pageContent = "";
                $this->_classArray  = $this->_getClassesFromDataBase();
                $this->_rosterArray = $this->_getRosterFromDataBase();
                $this->_setMenu();
                break;
        }
    }

    protected function _setMenu() {
        $this->_menu['header']  = 'Classes';
        $this->_menu['content'] = array();

        foreach ( $this->_classArray as $classItem ) {
            $listItem = array(
                'title' => $classItem['class_name'] . ' Class (' . $classItem['semester'] . ')',
                'attribute' => strtolower(str_replace(' ', '_', $classItem['class_name']))
                );
            $this->_menu['content'][] = $listItem;
        }
    }

    protected function _getClassesFromDatabase($selectedClass = '') {
        /* Database query here */
        $dbh        = DB::getDbh();
        $classArray = array();

        $whereClause = '';

        if ( !empty($selectedClass) ) {
            $whereClause = 'WHERE class_name = "' . $selectedClass . '"';
        }

        $query = $dbh->prepare(sprintf(
            "SELECT class_id,
                    class_name,
                    style_name,
                    semester,
                    num_of_members
               FROM class_table
                    $whereClause"
                ));
        $query->execute();

        // if a specified class is present, return the row as an associaive array
        if ( !empty($selectedClass) ) {
            return $query->fetch(PDO::FETCH_ASSOC);
        } else {
            while ( $row = $query->fetch(PDO::FETCH_ASSOC) ) {
                $classArray[$row['class_id']] = $row;
            }
        }

        return $classArray;
    }

    protected function _getRosterFromDatabase($selectedClass = '') {
        /* Database query here */
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
            $imagePath    = HOST_NAME . '/public/images/roster/' . strtolower(str_replace(' ', '_', $row['class'])) . '/' . $row['line_number'] . '.jpg';
            $absImagePath = ABSOLUTE_PATH . '/public/images/roster/' . strtolower(str_replace(' ', '_', $row['class'])) . '/' . $row['line_number'] . '.jpg';

            if ( file_exists($absImagePath) ) {
                $row['image'] = $imagePath;
            } else {
                $row['image'] = IMG_DFL_PLACEHOLDER;
            }

            $rosterArray[] = $row;
        }

        return $rosterArray;
    }
}