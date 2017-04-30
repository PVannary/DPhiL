<?php

/**
 * roster class
 */
class RosterModel extends AbstractModel {
    const MODEL_NAME = 'Roster';

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
     * get a list of the roster from database
     * 
     * @return void
     */
    public function getRoster() {
        $roster = array();
        $query  = $this->getRosterFromDb();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $sister = $row;

            array_push($roster, $sister);
        }

        return $roster;
    }

    public function getRosterFromDb() {
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
                roster_table.biography AS biography
            FROM
                roster_table"
        );

        return $this->_dbh->query($query);
    }
}