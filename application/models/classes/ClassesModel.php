<?php

/**
 * classes model
 */
class ClassesModel extends AbstractModel {
    const MODEL_NAME = 'Classes';

    /**
     * constructor
     *
     * @param obj   $dbh    [ database handler ]
     * @param array $params [ parameters sent by the url ]
     *
     * @return void
     */
    public function __construct($dbh) {
        parent::__construct($dbh);
    }

    /**
     * get a list of all classes from database
     * 
     * @return void
     */
    public function getClasses() {
        $classes = array();
        $query   = $this->getRosterFromDb();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $class = $row;

            array_push($classes, $class);
        }

        return $classes;
    }

    public function getClassesFromDb() {
        $query = sprintf(
            "SELECT
                class_table.class_id AS id,
                class_table.class_name AS name,
                class_table.class_description AS class_description,
                class_table.semester AS semester,
                class_table.num_of_members AS num_of_members
            FROM
                class_table"
        );

        return $this->_dbh->query($query);
    }
}