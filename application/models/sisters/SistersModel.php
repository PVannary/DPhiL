<?php

/**
 * sisters model
 */
class SistersModel extends AbstractModel {
    const MODEL_NAME = 'Sisters';

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
     * get a list of all active sisters from database
     *
     * @return void
     */
    public function getActiveSisters() {
        $sisters = array();

        try {
            $query = $this->_getActiveSistersFromDb();

            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                array_push($sisters, $row);
            }
        } catch ( Exception $exception ) {
            logger('ERROR', __FUNCTION__ . ' - ' . $exception->getMessage(), 'user');
        }

        return $sisters;
    }

    private function _getActiveSistersFromDb() {
        $query = sprintf(
            "SELECT
                roster_table.roster_id AS id,
                roster_table.line_number AS line_number,
                roster_table.first_name AS first_name,
                roster_table.last_name AS last_name,
                roster_table.nickname AS nickname,
                roster_table.ethnicity AS ethnicity,
                roster_table.major AS major,
                roster_table.class AS class,
                roster_table.status as status,
                roster_table.position AS position,
                roster_table.big_sister AS big_sister,
                roster_table.little_sisters AS little_sisters,
                roster_table.biography AS biography,
                roster_table.cross_date AS cross_date,
                class_table.class_description as class_description,
                class_table.semester as semester
            FROM
                roster_table
            LEFT JOIN
                class_table
            ON
                roster_table.class_id = class_table.class_id
            WHERE
                roster_table.status = 'Active'
            ORDER BY
                roster_table.roster_id DESC"
        );

        $query = $this->_dbh->prepare($query);

        $query->execute();

        return $query;
    }

    /**
     * get a list of all alumni sisters from database
     *
     * @return void
     */
    public function getAlumniSisters() {
        $sisters = array();

        try {
            $query = $this->_getAlumniSistersFromDb();

            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                array_push($sisters, $row);
            }
        } catch ( Exception $exception ) {
            logger('ERROR', __FUNCTION__ . ' - ' . $exception->getMessage(), 'user');
        }

        return $sisters;
    }

    private function _getAlumniSistersFromDb() {
        $query = sprintf(
            "SELECT
                roster_table.roster_id AS id,
                roster_table.line_number AS line_number,
                roster_table.first_name AS first_name,
                roster_table.last_name AS last_name,
                roster_table.nickname AS nickname,
                roster_table.ethnicity AS ethnicity,
                roster_table.major AS major,
                roster_table.class AS class,
                roster_table.status as status,
                roster_table.position AS position,
                roster_table.big_sister AS big_sister,
                roster_table.little_sisters AS little_sisters,
                roster_table.biography AS biography,
                roster_table.cross_date AS cross_date,
                class_table.class_description as class_description,
                class_table.semester as semester
            FROM
                roster_table
            LEFT JOIN
                class_table
            ON
                roster_table.class_id = class_table.class_id
            WHERE
                roster_table.status = 'Alumna'
            ORDER BY
                roster_table.roster_id DESC"
        );

        $query = $this->_dbh->prepare($query);

        $query->execute();

        return $query;
    }

    /**
     * get sisters by class
     *
     * @return array [ list of sisters grouped by their class ]
     */
    public function sortSistersByClass($sisters) {
        $newSisterArray = array();

        foreach ( $sisters as $sister ) {
            $sisterClass    = $sister['class'];
            $sisterSemester = $sister['semester'];

            if ( !isset($newSisterArray[$sisterClass]) ) {
                $newSisterArray[$sisterClass]               = array();
                $newSisterArray[$sisterClass]['name']       = $sisterClass;
                $newSisterArray[$sisterClass]['semester']   = $sisterSemester;
                $newSisterArray[$sisterClass]['roster']     = array();
            }

            array_push($newSisterArray[$sisterClass]['roster'], $sister);
        }

        return $newSisterArray;
    }
}