<?php

/**
 * sisters model
 */
class SistersModel extends AbstractModel {
    const MODEL_NAME = 'Dungeons';

    public function __construct($dbh) {
        parent::__construct($dbh);
    }

    public function getActiveSisters() {
        $sisters = array();

        try {
            $query = $this->_getActiveSistersFromDb();

            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                array_push($sisters, $row);
            }
        } catch ( Exception $exception ) {
            logger('EROR', __FUNCTION__ . ' - ' . $exception->getMessage(), 'user');
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
                roster_table.position AS position,
                roster_table.big_sister AS big_sister,
                roster_table.little_sisters AS little_sisters,
                roster_table.biography AS biography,
                roster_table.cross_date AS cross_date
            FROM
                roster_table
            WHERE
                position = 'Member'
            ORDER BY
                roster_table.line_number DESC"
        );

        $query = $this->_dbh->prepare($query);

        $query->execute();

        return $query;
    }

    public function getAlumniSisters() {
        $sisters = array();

        try {
            $query = $this->_getAlumniSistersFromDb();

            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                array_push($sisters, $row);
            }
        } catch ( Exception $exception ) {
            logger('EROR', __FUNCTION__ . ' - ' . $exception->getMessage(), 'user');
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
                roster_table.position AS position,
                roster_table.big_sister AS big_sister,
                roster_table.little_sisters AS little_sisters,
                roster_table.biography AS biography,
                roster_table.cross_date AS cross_date
            FROM
                roster_table
            WHERE
                position = 'Alumna'
            ORDER BY
                roster_table.line_number DESC"
        );

        $query = $this->_dbh->prepare($query);

        $query->execute();

        return $query;
    }
}