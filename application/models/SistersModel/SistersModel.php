<?php

/* about page displaying recruitment information about the chapter */
class SistersModel extends Model {
    protected $_contentPage;
    protected $_pageContent;
    protected $_contentTitle;
    protected $_classArray  = array();
    protected $_rosterArray = array();
    protected $_menu        = array();

    const PAGE_TITLE = 'The Sisters - GSU Delta Phi Lambda';

    public function __construct($module, $params) {
        if ( !empty($params) ) {
            $this->_contentPage = $params[0];
            $this->_setContent();
        }

        $this->title = self::PAGE_TITLE;
    }

    protected function _setContent() {
        /* temporary code */

        switch($this->_contentPage) {
            case 'leaders':
                $this->_contentTitle = 'Sister Leadership';
                $this->_pageContent = "";
                break;
            case 'roster':
                $this->_contentTitle = 'Active Sisters';
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
            $listItem = array('title' => $classItem['class_name'] . ' Class (' . $classItem['semester'] . ')');
            $this->_menu['content'][] = $listItem;
        }
    }

    protected function _getClassesFromDatabase() {
        /* Database query here */
        $dbh        = DB::getDbh();
        $classArray = array();

        $query = $dbh->prepare(sprintf(
            "SELECT class_id,
                    class_name,
                    style_name,
                    semester,
                    num_of_members
               FROM class_table"
                ));
        $query->execute();

        while ( $row = $query->fetch(PDO::FETCH_ASSOC) ) {
            $classArray[$row['class_id']] = $row;
        }

        return $classArray;
    }

    protected function _getRosterFromDatabase() {
        /* Database query here */
        $dbh         = DB::getDbh();
        $rosterArray = array();

        $query = $dbh->prepare(sprintf(
            "SELECT roster_id,
                    first_name,
                    last_name,
                    position,
                    biography,
                    cross_date,
                    class,
                    line_name
               FROM roster_table"
                ));
        $query->execute();

        while ( $row = $query->fetch(PDO::FETCH_ASSOC) ) {
            $rosterArray[$row['roster_id']] = $row;
        }

        return $rosterArray;
    }
}