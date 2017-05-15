<?php

/**
 * documents class
 */
class DocumentsModel extends AbstractModel {
    const MODEL_NAME = 'Documents';

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
     * get a list of all documents from database
     *
     * @return void
     */
    public function getDocuments() {
        $documents = array();
        $query     = $this->getDocumentsFromDb();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $document = $row;

            array_push($documents, $document);
        }

        return $documents;
    }

    public function getDocumentsFromDb() {
        $query = sprintf(
            "SELECT
                documents_table.document_id AS id,
                documents_table.title AS title,
                documents_table.content AS content
            FROM
                documents_table"
        );

        return $this->_dbh->query($query);
    }
}