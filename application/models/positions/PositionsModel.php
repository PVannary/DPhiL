<?php

/**
 * positions class
 */
class PositionsModel extends AbstractModel {
    const MODEL_NAME = 'Positions';

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
     * get a list of all positions from database
     * 
     * @return void
     */
    public function getPositions() {
        $positions = array();
        $query     = $this->getPositionsFromDb();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $position = $row;

            array_push($positions, $position);
        }

        return $positions;
    }

    public function getPositionsFromDb() {
        $query = sprintf(
            "SELECT
                position_table.position_id AS id,
                position_table.title AS title,
                position_table.type AS type
            FROM
                position_table"
        );

        return $this->_dbh->query($query);
    }
}